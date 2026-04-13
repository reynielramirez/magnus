<?php

declare(strict_types=1);

namespace Drupal\views_advanced_cache\Plugin\views\cache;

use Drupal\Component\Datetime\TimeInterface;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Cache\CacheableDependencyInterface;
use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Url;
use Drupal\Core\Utility\Token;
use Drupal\views\Attribute\ViewsCache;
use Drupal\views\Plugin\views\cache\CachePluginBase;
use Drupal\views\ResultRow;
use Drupal\views\Views;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Advanced cache metadata views cache plugin.
 *
 * Advanced caching of query results for Views displays allowing the
 * specification of cache tags, cache contexts, and output / results cache
 * lifetime (which is used to calculate max-age).
 *
 * @ingroup views_cache_plugins
 */
#[ViewsCache(
  id: 'advanced_views_cache',
  title: new TranslatableMarkup('Advanced Caching'),
  help: new TranslatableMarkup('Caching based on tags, context, and max-age. Caches will persist until any related cache tags are invalidated or the max-age is reached.'),
)]
class AdvancedViewsCache extends CachePluginBase {

  /**
   * {@inheritdoc}
   */
  protected $usesOptions = TRUE;

  /**
   * {@inheritdoc}
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    protected DateFormatterInterface $dateFormatter,
    protected TimeInterface $time,
    protected Token $token,
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(
    ContainerInterface $container,
    array $configuration,
    $plugin_id,
    $plugin_definition,
  ) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('date.formatter'),
      $container->get('datetime.time'),
      $container->get('token')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function summaryTitle(): string {
    // Display a summary of: cache tags.
    $num_cache_tags = count(array_merge(
      $this->options['cache_tags'],
      $this->options['cache_tags_exclude'],
      $this->options['cache_tags_exclude_regex'],
    ) ?: []);
    $cache_tags = '';
    if ($num_cache_tags > 0) {
      $cache_tags = $this->t('@num_cache_tags tags', [
        '@num_cache_tags' => $num_cache_tags,
      ]);
    }

    // Cache contexts.
    $num_cache_contexts = count(array_merge($this->options['cache_contexts'], $this->options['cache_contexts_exclude']) ?: []);
    $cache_contexts = '';
    if ($num_cache_contexts > 0) {
      $cache_contexts = $this->t('@num_cache_contexts contexts', [
        '@num_cache_contexts' => $num_cache_contexts,
      ]);
    }

    // And max-age.
    $results_lifespan = $this->getLifespan('results');
    $output_lifespan = $this->getLifespan('output');
    $lifetime = '';
    if ($results_lifespan >= 0 || $output_lifespan >= 0) {
      $lifetime = implode('/', [
        $this->dateFormatter->formatInterval($results_lifespan, 1),
        $this->dateFormatter->formatInterval($output_lifespan, 1),
      ]);
    }
    return implode(' | ', array_filter([
      $cache_tags,
      $cache_contexts,
      $lifetime,
    ])) ?: (string) $this->t('Always cache');
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions(): array {
    $options = parent::defineOptions();

    // Cache Tags.
    $options['cache_tags'] = ['default' => []];
    $options['cache_tags_exclude'] = ['default' => []];
    $options['cache_tags_exclude_regex'] = ['default' => []];
    $options['cache_tags_for_row'] = ['default' => FALSE];

    // Cache Contexts.
    $options['cache_contexts'] = ['default' => []];
    $options['cache_contexts_exclude'] = ['default' => []];

    // Max Age.
    $options['results_lifespan'] = ['default' => -1];
    $options['results_lifespan_custom'] = ['default' => NULL];
    $options['output_lifespan'] = ['default' => -1];
    $options['output_lifespan_custom'] = ['default' => NULL];

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    self::buildCacheTagOptions($form, $form_state);
    self::buildCacheContextOptions($form, $form_state);
    self::buildLifespanOptions($form, $form_state);
  }

  /**
   * Build the cache metadata options form.
   *
   * Removing cache tags should be used sparingly but may be useful to resolve
   * issues unnecessary cache tags added by other modules:
   * eg. https://www.drupal.org/project/drupal/issues/2352175
   *
   * @see https://www.drupal.org/project/views_custom_cache_tag
   */
  public function buildCacheTagOptions(
    array &$form,
    FormStateInterface $form_state,
  ): void {

    // Generate links to documentation.
    $cache_tags_docs = Link::fromTextAndUrl(
      'documentation',
      Url::fromUri('https://www.drupal.org/docs/8/api/cache-api/cache-tags')
    )->toString();
    $modules_docs = Link::fromTextAndUrl(
      'module documentation',
      Url::fromUri('https://git.drupalcode.org/project/views_advanced_cache#override-the-node_list-cache-tag')
    )->toString();

    // Filter out some of the default irrelevant cache tags. End result should
    // be the entity_type list cache tags eg. node_list.
    $default_cache_tags = array_diff(
      parent::getCacheTags(),
      ['extensions', 'config:views.view.' . $this->view->id()]
    );
    $cache_tags = !empty($this->options['cache_tags'])
      ? $this->options['cache_tags'] : $default_cache_tags;

    $form['cache_tags'] = [
      '#type' => 'details',
      '#title' => $this->t('Cache Tags'),
      '#description' => $this->t('Modify cache tags for fine-grained view cache invalidation. See @project_docs for instructions and examples, and the official @docs for more information regarding cache tags. Note that this module does not trigger the invalidation of the custom tags.', [
        '@project_docs' => $modules_docs,
        '@docs' => $cache_tags_docs,
      ]),
      '#open' => TRUE,
    ];

    $cache_tags_for_row = !empty($this->options['cache_tags_for_row'])
      ? $this->options['cache_tags_for_row'] : FALSE;
    $form['cache_tags']['cache_tags_for_row'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Also apply modifications to each views row.'),
      '#default_value' => $cache_tags_for_row,
    ];

    $form['cache_tags']['cache_tags'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Cache tags to add'),
      '#description' => $this->t('List of cache tags (separated by new lines) to add to the view. eg. my_custom:node_list:page'),
      '#default_value' => implode("\n", $cache_tags),
    ];

    $form['cache_tags']['cache_tags_exclude'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Cache tags to exclude'),
      '#description' => $this->t('List of cache tags (separated by new lines) to remove from view when the match exactly. eg. node_list'),
      '#default_value' => implode("\n", $this->options['cache_tags_exclude']),
    ];

    $form['cache_tags']['cache_tags_exclude_regex'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Cache tags to exclude via regular expression'),
      '#description' => $this->t('List of regular expressions (separated by new lines) which remove any matching cache tags. eg. /node\:[0-9]+/'),
      '#default_value' => implode(
        "\n",
        $this->options['cache_tags_exclude_regex']
      ),
    ];

    $options = [];
    // $globalTokens = $this->getAvailableGlobalTokens(FALSE, ['current-user']);
    $options['current-user']['[current-user:uid]']
      = $this->t('Current User: The current user id.');

    $optgroup_arguments = (string) $this->t('Arguments');
    $argument_handlers = $this->view->display_handler->getHandlers('argument');
    foreach ($argument_handlers as $arg => $handler) {
      $options[$optgroup_arguments]["{{ arguments.$arg }}"] = $this->t(
        '@argument title', [
          '@argument' => $handler->adminLabel(),
        ]
      );
      $options[$optgroup_arguments]["{{ raw_arguments.$arg }}"] = $this->t(
        '@argument input', [
          '@argument' => $handler->adminLabel(),
        ]
      );
    }

    // We have some options, so make a list.
    $items = [];
    if (!empty($options)) {
      $output['description'] = [
        '#markup' => '<p>' . $this->t("The following replacement tokens are available for this field. Note that due to rendering order, you cannot use fields that come after this field; if you need a field not listed here, rearrange your fields.") . '</p>',
      ];
      foreach (array_keys($options) as $type) {
        if (!empty($options[$type])) {
          foreach ($options[$type] as $key => $value) {
            $items[] = $key . ' == ' . $value;
          }
        }
      }
      $item_list = [
        '#theme' => 'item_list',
        '#items' => $items,
      ];
      $output['list'] = $item_list;
      $form['cache_tags']['tokens'] = $output;
    }
  }

  /**
   * Specify cache contexts to be used by the view.
   */
  public function buildCacheContextOptions(
    &$form,
    FormStateInterface $form_state,
  ): void {

    // Generate links to documentation.
    $cache_context_docs = Link::fromTextAndUrl(
      'documentation',
      Url::fromUri('https://www.drupal.org/docs/8/api/cache-api/cache-contexts')
    )->toString();
    $modules_docs = Link::fromTextAndUrl(
      'module documentation',
      Url::fromUri('https://git.drupalcode.org/project/views_advanced_cache#add--remove-cache-contexts')
    )->toString();

    $form['cache_contexts'] = [
      '#type' => 'details',
      '#title' => $this->t('Cache Contexts'),
      '#description' => $this->t('Modify cache contexts for the view. See @project_docs for instructions and examples, and the official @docs for more information regarding cache contexts.', [
        '@project_docs' => $modules_docs,
        '@docs' => $cache_context_docs,
      ]),
      '#open' => TRUE,
    ];

    $form['cache_contexts']['cache_contexts'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Cache contexts to add'),
      '#description' => $this->t('List cache contexts to add, separated by new lines.'),
      '#default_value' => implode("\n", $this->options['cache_contexts']),
    ];

    $form['cache_contexts']['cache_contexts_exclude'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Cache contexts to exclude'),
      '#description' => $this->t('List cache contexts to exclude if found, separated by new lines.'),
      '#default_value' => implode(
        "\n",
        $this->options['cache_contexts_exclude']
      ),
    ];
  }

  /**
   * Build the lifespan options array used in ::buildLifespanOptions().
   *
   * @return array
   *   An array used in the #options parameter of a select type field.
   */
  protected function buildLifespanOptionsArray(): array {
    // Seconds used to build select field options for cache lifetime.
    $lifespans = [
      60,
      300,
      900,
      1800,
      3600,
      21600,
      43200,
      86400,
      604800,
    ];

    $lifespanOptions = array_map(
      [$this->dateFormatter, 'formatInterval'],
      array_combine($lifespans, $lifespans)
    );
    $lifespanOptions
      = [-1 => $this->t('Always cache'), 0 => $this->t('Never cache')]
      + $lifespanOptions
      + ['custom' => $this->t('Custom')];

    return $lifespanOptions;
  }

  /**
   * Specify output and results cache lifetimes.
   *
   * @see \Drupal\views\Plugin\cache\Time
   */
  public function buildLifespanOptions(
    &$form,
    FormStateInterface $form_state,
  ): void {
    $form['cache_lifespan'] = [
      '#type' => 'details',
      '#title' => $this->t('Max-Age and Results Cache'),
      '#description' => $this->t('Set caching of the view results and rendered html output. If set the <em>max-age</em> will be determined by the output lifetime.'),
      '#open' => TRUE,
    ];

    $lifespanOptions = $this->buildLifespanOptionsArray();
    $form['cache_lifespan']['results_lifespan'] = [
      '#type' => 'select',
      '#title' => $this->t('Query results'),
      '#description' => $this->t('The length of time raw query results should be cached. When using display suite these results will only contain the node ids and other fields added to the view. The rendered entity will use the render cache.'),
      '#options' => $lifespanOptions,
      '#default_value' => $this->options['results_lifespan'],
    ];

    $form['cache_lifespan']['results_lifespan_custom'] = [
      '#type' => 'number',
      '#title' => $this->t('Seconds'),
      '#size' => '25',
      '#min' => -1,
      '#maxlength' => '30',
      '#description' => $this->t('Length of time in seconds raw query results should be cached.'),
      '#default_value' => $this->options['results_lifespan_custom'],
      '#states' => [
        'visible' => [
          ':input[name="cache_options[cache_lifespan][results_lifespan]"]' => ['value' => 'custom'],
        ],
      ],
    ];

    $form['cache_lifespan']['output_lifespan'] = [
      '#type' => 'select',
      '#title' => $this->t('Rendered output'),
      '#description' => $this->t('The length of time rendered HTML output should be cached.'),
      '#options' => $lifespanOptions,
      '#default_value' => $this->options['output_lifespan'],
    ];

    $form['cache_lifespan']['output_lifespan_custom'] = [
      '#type' => 'number',
      '#title' => $this->t('Seconds'),
      '#size' => '25',
      '#min' => -1,
      '#maxlength' => '30',
      '#description' => $this->t('Length of time in seconds rendered HTML output should be cached.'),
      '#default_value' => $this->options['output_lifespan_custom'],
      '#states' => [
        'visible' => [
          ':input[name="cache_options[cache_lifespan][output_lifespan]"]' => ['value' => 'custom'],
        ],
      ],
    ];
  }

  /**
   * Perform validation and cleanup of plugin configuration.
   */
  public function validateOptionsForm(
    &$form,
    FormStateInterface $form_state,
  ): void {
    $lifespan = [];
    $cache_lifespan = $form_state
      ->getValue(['cache_options', 'cache_lifespan']);
    // Validate lifespan format.
    foreach (['output_lifespan', 'results_lifespan'] as $field) {
      $custom = $cache_lifespan[$field] == 'custom';
      if ($custom && !is_numeric($cache_lifespan[$field . '_custom'])) {
        $form_state->setError(
          $form['cache_lifespan'][$field . '_custom'],
          $this->t('Custom time values must be numeric.')
        );
      }
      else {
        $lifespan[$field] = (int) ($custom ? $cache_lifespan[$field . '_custom'] : $cache_lifespan[$field]);
      }
    }

    // Require that output lifetime is < results lifetime.
    if (
      !empty($lifespan['output_lifespan'])
      && !empty($lifespan['results_lifespan'])
      && $lifespan['results_lifespan'] >= 0
      && $lifespan['output_lifespan'] > $lifespan['results_lifespan']
    ) {
      $form_state->setError(
        $form['cache_lifespan']['output_lifespan'],
        $this->t('Output lifespan must not be greater than results lifespan.')
      );
    }

    // Parse cache tags and cache contexts into arrays and separate out
    // the excluded tags and contexts.
    $this->processTextboxIntoArray(
      $form_state,
      ['cache_options', 'cache_tags', 'cache_tags']
    );
    $this->processTextboxIntoArray(
      $form_state,
      ['cache_options', 'cache_tags', 'cache_tags_exclude']
    );
    $this->processTextboxIntoArray(
      $form_state,
      ['cache_options', 'cache_tags', 'cache_tags_exclude_regex']
    );
    // Run preg_match on each of these and make sure that it compiles.
    $exclude_regex = $form_state
      ->getValue(['cache_options', 'cache_tags', 'cache_tags_exclude_regex']);
    foreach ($exclude_regex as $regex) {
      if ((@preg_match($regex, 'irrelevant')) === FALSE) {
        $form_state->setError(
          $form['cache_tags']['cache_tags_exclude_regex'],
          $this->t('Regular expression @regex failed to compile.', [
            '@regex' => $regex,
          ])
        );
      }
    }

    $this->processTextboxIntoArray(
      $form_state,
      ['cache_options', 'cache_contexts', 'cache_contexts']
    );
    $this->processTextboxIntoArray(
      $form_state,
      ['cache_options', 'cache_contexts', 'cache_contexts_exclude']
    );
  }

  /**
   * Process a textbox into target value.
   *
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Form state to retrieve from and set values to.
   * @param array $key
   *   Nested key to process.
   */
  protected function processTextboxIntoArray(
    FormStateInterface $form_state,
    array $key,
  ): void {
    // Retrieve the value from form state.
    $value = $form_state->getValue($key);

    // Convert to array and trim all values down.
    $value = preg_split('/\r\n|[\r\n]+/', $value) ?: [];
    $value = array_filter(array_map('trim', $value));

    // Set the value back to form state to be saved.
    $form_state->setValue($key, $value);
  }

  /**
   * {@inheritdoc}
   */
  public function submitOptionsForm(
    &$form,
    FormStateInterface $form_state,
  ): void {
    // Remap values onto the top of the tree in 'cache_options'.
    foreach (['cache_tags', 'cache_contexts', 'cache_lifespan'] as $key) {
      $values = $form_state->getValue(['cache_options', $key]);
      $form_state->unsetValue(['cache_options', $key]);
      foreach ($values as $option => $value) {
        $form_state->setValue(['cache_options', $option], $value);
      }
    }

    parent::submitOptionsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheTags(): array {
    $cache_tags = $this->options['cache_tags'] ?: [];
    // @see Drupal\views\ViewExecutable::_postExecute
    // By default only handlers (ex. argument, filter, sort) are invoked after
    // view execution to update the cache tags based on rows.
    // We are also checking if a plugin is a CacheableDependencyInterface then
    // add it's cache_tags.
    foreach (Views::getPluginTypes('plugin') as $plugin_type) {
      $plugin = $this->view->display_handler->getPlugin($plugin_type);
      if ($plugin instanceof CacheableDependencyInterface) {
        $cache_tags = Cache::mergeTags($cache_tags, $plugin->getCacheTags());
      }
    }
    if (!empty($cache_tags)) {
      $default_cache_tags = parent::getCacheTags();
      $cache_tags = array_map(function ($tag) {
        $value = $this->view->getStyle()->tokenizeValue($tag, 0);
        return $this->token->replace($value);
      }, $cache_tags);
      $cache_tags = Cache::mergeTags($cache_tags, $default_cache_tags);
    }
    else {
      $cache_tags = parent::getCacheTags();
    }

    // Remove cache tags marked for exclusion.
    if (!empty($this->options['cache_tags_exclude'])) {
      $this->excludeCacheTags($cache_tags);
    }

    return $cache_tags;
  }

  /**
   * Returns the row cache tags.
   *
   * @param \Drupal\views\ResultRow $row
   *   A result row.
   *
   * @return string[]
   *   The row cache tags.
   */
  public function getRowCacheTags(ResultRow $row): array {
    $row_cache_tags = parent::getRowCacheTags($row);

    if (!$this->options['cache_tags_for_row']) {
      return $row_cache_tags;
    }

    $cache_tags = $this->options['cache_tags'] ?: [];
    $tags = Cache::mergeTags($row_cache_tags, $cache_tags);

    // Remove cache tags marked for exclusion.
    if (!empty($this->options['cache_tags_exclude'])) {
      $this->excludeCacheTags($tags);
    }

    return $tags;
  }

  /**
   * Compare the array of cache tags with the list of cache tags to exclude.
   *
   * If a cache tag matches the exclude pattern, it is removed from the array.
   *
   * @param array $cache_tags
   *   The array of cache tags to be filtered.
   */
  protected function excludeCacheTags(array &$cache_tags): void {
    if (empty($this->options['cache_tags_exclude'])) {
      return;
    }

    $cache_exclude = $this->options['cache_tags_exclude'];
    $cache_exclude_regex = $this->options['cache_tags_exclude_regex'];

    // Filters the array of cache tags to exclude the tags that match the
    // exclude pattern.
    $cache_tags = array_filter(
      $cache_tags,
      function ($tag) use ($cache_exclude, $cache_exclude_regex): bool {

        // Exact match exclude.
        foreach ($cache_exclude as $exclude) {
          if ($tag == $exclude) {
            return FALSE;
          }
        }

        // Regular expression exclude.
        foreach ($cache_exclude_regex as $regex) {
          $match = @preg_match($regex, $tag);
          // Regular expression compile or other error means ignore it.
          if ($match === FALSE) {
            continue;
          }

          // Regex matched tag to exclude.
          if ($match) {
            return FALSE;
          }
        }

        // Not excluded.
        return TRUE;
      }
    );
  }

  /**
   * {@inheritdoc}
   */
  public function alterCacheMetadata(CacheableMetadata $cache_metadata): void {
    if (!empty($this->options['cache_contexts'])) {
      $cache_metadata->addCacheContexts($this->options['cache_contexts']);
    }
    if (!empty($this->options['cache_contexts_exclude'])) {
      $contexts = $cache_metadata->getCacheContexts();
      $contexts = array_diff(
        $contexts,
        $this->options['cache_contexts_exclude']
      );
      $cache_metadata->setCacheContexts($contexts);
    }
  }

  /**
   * Get the cache lifetime for results or output.
   *
   * @param string|int $type
   *   A value of "results" or "output" for the corresponding cache.
   *
   * @return int
   *   The cache lifespan.
   */
  protected function getLifespan($type): int {
    $lifespan = $this->options[$type . '_lifespan'] == 'custom'
      ? $this->options[$type . '_lifespan_custom']
      : $this->options[$type . '_lifespan'];
    return (int) $lifespan;
  }

  /**
   * {@inheritdoc}
   */
  protected function cacheExpire($type): ?int {
    $lifespan = $this->getLifespan($type);
    if ($lifespan >= 0) {
      $cutoff = $this->time->getRequestTime() - $lifespan;
      return $cutoff;
    }
    else {
      return NULL;
    }
  }

  /**
   * {@inheritdoc}
   */
  protected function cacheSetMaxAge($type): int {
    $lifespan = $this->getLifespan($type);
    if ($lifespan >= 0) {
      return $lifespan;
    }
    else {
      return Cache::PERMANENT;
    }
  }

  /**
   * {@inheritdoc}
   */
  protected function getDefaultCacheMaxAge(): int {
    // The max age, unless overridden by some other piece of the rendered code
    // is determined by the output time setting.
    return (int) $this->cacheSetMaxAge('output');
  }

}
