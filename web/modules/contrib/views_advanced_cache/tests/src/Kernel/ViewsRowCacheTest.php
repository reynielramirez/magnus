<?php

declare(strict_types=1);

namespace Drupal\Tests\views_advanced_cache\Kernel;

use Drupal\Component\Serialization\Json;
use Drupal\Component\Utility\Html;
use Drupal\Core\Session\AccountInterface;
use Drupal\Tests\user\Traits\UserCreationTrait;
use Drupal\Tests\views\Kernel\ViewsKernelTestBase;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
use Drupal\node\NodeInterface;
use Drupal\views\Entity\View;
use Drupal\views\Views;

/**
 * Tests row render caching.
 *
 * @see Drupal\Tests\views\Kernel\Plugin\RowRenderCacheTest.
 *
 * @group views_advanced_cache
 */
class ViewsRowCacheTest extends ViewsKernelTestBase {

  use UserCreationTrait;

  /**
   * Disable config schema checking temporarily until schema added.
   *
   * @var bool
   *
   * @phpcs:disable DrupalPractice.Objects.StrictSchemaDisabled.StrictConfigSchema
   */
  protected $strictConfigSchema = FALSE;
  // phpcs:enable

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'user',
    'node',
    'views_advanced_cache',
  ];

  /**
   * Views used by this test.
   *
   * @var array
   */
  public static $testViews = [
    'test_row_render_cache',
    'test_row_render_cache_none',
  ];

  /**
   * An editor user account.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $editorUser;

  /**
   * A power user account.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $powerUser;

  /**
   * A regular user account.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $regularUser;

  /**
   * {@inheritdoc}
   */
  protected function setUpFixtures() {
    parent::setUpFixtures();

    $this->installEntitySchema('user');
    $this->installEntitySchema('node');
    $this->installSchema('node', 'node_access');

    NodeType::create([
      'type' => 'test',
      'name' => 'Test',
    ])->save();

    $this->editorUser = $this->createUser(['bypass node access']);
    $this->powerUser = $this->createUser([
      'access content',
      'create test content',
      'edit own test content',
      'delete own test content',
    ]);
    $this->regularUser = $this->createUser(['access content']);

    // Create some test entities.
    for ($i = 0; $i < 5; $i++) {
      Node::create([
        'title' => 'b' . $i . $this->randomMachineName(),
        'type' => 'test',
      ])->save();
    }

    // Create a power user node.
    Node::create([
      'title' => 'z' . $this->randomMachineName(),
      'uid' => $this->powerUser->id(),
      'type' => 'test',
    ])->save();
  }

  /**
   * Tests caching tags are altered and access works for different users.
   */
  public function testAdvancedCaching(): void {
    // Test the users using normal caching.
    $this->doTestRenderedOutput($this->editorUser, TRUE, FALSE);
    $this->doTestRenderedOutput($this->powerUser, TRUE, FALSE);
    $this->doTestRenderedOutput($this->regularUser, TRUE, FALSE);

    // Setup caching on test view to use VAC.
    /** @var Drupal\views\Entity\View $view */
    $view = View::load('test_row_render_cache');
    $display = &$view->getDisplay('default');
    $cache_options = $display['display_options']['cache']['options'] ?? [];
    $cache_options['cache_tags'] = ['node_test'];
    $cache_options['cache_tags_exclude'] = [];
    $cache_options['cache_tags_exclude_regex'] = [];
    $cache_options['cache_contexts'] = [];
    $cache_options['cache_contexts_exclude'] = [];
    $cache_options['cache_tags_for_row'] = TRUE;
    $display['display_options']['cache']['type'] = 'advanced_views_cache';
    $display['display_options']['cache']['options'] = $cache_options;
    // View must be valid.
    $violations = iterator_to_array($view->getTypedData()->validate());
    $this->assertTrue(empty($violations), (string) ($violations[0] ?? ''));
    $view->save();

    // Test that row field output is cached with the extra tags.
    $this->doTestRenderedOutput($this->editorUser, TRUE, TRUE);
    $this->doTestRenderedOutput($this->powerUser, TRUE, TRUE);
    $this->doTestRenderedOutput($this->regularUser, TRUE, TRUE);

    // Alter the result set order and check that counter is still working
    // correctly.
    /** @var \Drupal\node\NodeInterface $node */
    $node = Node::load(6);
    $node->setTitle('a' . $this->randomMachineName());
    $node->save();
    $this->doTestRenderedOutput($this->editorUser, TRUE, TRUE);
  }

  /**
   * Tests that rows are not cached when the none cache plugin is used.
   */
  public function testNoCaching(): void {

    $this->setCurrentUser($this->regularUser);
    $view = Views::getView('test_row_render_cache_none');
    $view->setDisplay();
    $view->preview();

    /** @var \Drupal\Core\Render\RenderCacheInterface $render_cache */
    $render_cache = $this->container->get('render_cache');

    /** @var \Drupal\views\Plugin\views\cache\CachePluginBase $cache_plugin */
    $cache_plugin = $view->display_handler->getPlugin('cache');

    foreach ($view->result as $row) {
      $keys = $cache_plugin->getRowCacheKeys($row);
      $cache = [
        '#cache' => [
          'keys' => $keys,
          'contexts' => ['languages:language_interface', 'theme', 'user.permissions'],
        ],
      ];
      $element = $render_cache->get($cache);
      $this->assertFalse($element);
    }
  }

  /**
   * Check whether the rendered output matches expectations.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user account to tests rendering with.
   * @param bool $check_cache
   *   (optional) Whether explicitly test render cache entries.
   * @param bool $is_vac
   *   (optional) Whether caching must be Views Advanced Cache (VAC).
   */
  protected function doTestRenderedOutput(
    AccountInterface $account,
    ?bool $check_cache = FALSE,
    ?bool $is_vac = FALSE,
  ) {
    $this->setCurrentUser($account);
    $view = Views::getView('test_row_render_cache');
    $view->setDisplay();
    $view->preview();

    /** @var \Drupal\Core\Render\RenderCacheInterface $render_cache */
    $render_cache = $this->container->get('render_cache');

    /** @var \Drupal\views\Plugin\views\cache\CachePluginBase $cache_plugin */
    $cache_plugin = $view->display_handler->getPlugin('cache');
    $this->assertSame(
      $is_vac ? 'advanced_views_cache' : 'tag',
      $cache_plugin->getPluginId()
    );

    // Retrieve nodes and sort them in alphabetical order to match view results.
    $nodes = Node::loadMultiple();
    usort($nodes, function (NodeInterface $a, NodeInterface $b) {
      return strcmp($a->label(), $b->label());
    });

    $index = 0;
    foreach ($nodes as $node) {
      $nid = $node->id();
      $access = $node->access('update');

      $counter = $index + 1;
      $expected = "$nid: $counter (just in case: $nid)";
      $counter_output = $view->style_plugin->getField($index, 'counter');
      $this->assertSame($expected, (string) $counter_output);

      $node_url = $node->toUrl()->toString();
      $expected = "<a href=\"$node_url\"><span class=\"da-title\">{$node->label()}</span> <span class=\"counter\">$counter_output</span></a>";
      $output = $view->style_plugin->getField($index, 'title');
      $this->assertSame($expected, (string) $output);

      $expected = $access ? "<a href=\"$node_url/edit?destination=/\" hreflang=\"en\">edit</a>" : "";
      $output = $view->style_plugin->getField($index, 'edit_node');
      $this->assertSame($expected, (string) $output);

      $expected = $access ? "<a href=\"$node_url/delete?destination=/\" hreflang=\"en\">delete</a>" : "";
      $output = $view->style_plugin->getField($index, 'delete_node');
      $this->assertSame($expected, (string) $output);
      // @todo Remove work-around when minimum supported version is D11.1.
      if (version_compare(\Drupal::VERSION, '11.1', '>=')) {
        $expected = $access ? '  <div class="dropbutton-wrapper" data-drupal-ajax-container>' . PHP_EOL . '    <div class="dropbutton-widget"><ul class="dropbutton">' .
          '<li><a href="' . $node_url . '/edit?destination=/" aria-label="Edit ' . $node->label() . '" hreflang="en">Edit</a></li>' .
          '<li><a href="' . $node_url . '/delete?destination=/" aria-label="Delete ' . $node->label() . '" class="use-ajax" data-dialog-type="modal" data-dialog-options="' . Html::escape(Json::encode(['width' => 880])) . '" hreflang="en">Delete</a></li>' .
          '</ul></div>' . PHP_EOL . '  </div>' : '';
      }
      else {
        $expected = $access ? '  <div class="dropbutton-wrapper" data-drupal-ajax-container><div class="dropbutton-widget"><ul class="dropbutton">' .
          '<li><a href="' . $node_url . '/edit?destination=/" aria-label="Edit ' . $node->label() . '" hreflang="en">Edit</a></li>' .
          '<li><a href="' . $node_url . '/delete?destination=/" aria-label="Delete ' . $node->label() . '" class="use-ajax" data-dialog-type="modal" data-dialog-options="' . Html::escape(Json::encode(['width' => 880])) . '" hreflang="en">Delete</a></li>' .
          '</ul></div></div>' : '';
      }
      $output = $view->style_plugin->getField($index, 'operations');
      $this->assertSame($expected, (string) $output);

      if ($check_cache) {
        $keys = $cache_plugin->getRowCacheKeys($view->result[$index]);
        $cache = [
          '#cache' => [
            'keys' => $keys,
            'contexts' => ['languages:language_interface', 'theme', 'user.permissions'],
          ],
        ];
        $element = $render_cache->get($cache);
        $this->assertNotEmpty($element);

        // If VAC is caching, expect there to be extra tags.
        $tags = $cache_plugin->getRowCacheTags($view->result[$index]);
        $this->assertNotEmpty($tags, 'No row tags present when expected');
        if ($is_vac) {
          $this->assertTrue(
            in_array('node_test', $tags),
            'Tag node_test was missing from row cache tags.'
          );
        }
        else {
          $this->assertFalse(
            in_array('node_test', $tags),
            'Tag node_test was present when it should not have been.'
          );
        }
      }

      $index++;
    }
  }

  /**
   * Tests removing tags using a regex.
   */
  public function testRegexExclude(): void {
    // Test caching without AVC or regex exclude.
    $this->doCheckCacheTags($this->editorUser, FALSE, [
      'config:views.view.test_row_render_cache',
      'node_list',
      'node:6',
      'node:5',
      'node:4',
      'node:3',
      'node:2',
      'node:1',
    ], [
      ['node:1'],
      ['node:2'],
      ['node:3'],
      ['node:4'],
      ['node:5'],
      ['node:6'],
    ]);

    // Setup caching on test view to use VAC without anything special.
    /** @var Drupal\views\Entity\View $view */
    $view = View::load('test_row_render_cache');
    $display = &$view->getDisplay('default');
    $cache_options = $display['display_options']['cache']['options'] ?? [];
    $cache_options['cache_tags'] = ['node_test'];
    $cache_options['cache_tags_exclude'] = [''];
    $cache_options['cache_tags_exclude_regex'] = [];
    $cache_options['cache_contexts'] = [];
    $cache_options['cache_contexts_exclude'] = [];
    $cache_options['cache_tags_for_row'] = TRUE;
    $display['display_options']['cache']['type'] = 'advanced_views_cache';
    $display['display_options']['cache']['options'] = $cache_options;
    // View must be valid.
    $violations = iterator_to_array($view->getTypedData()->validate());
    $this->assertTrue(empty($violations), (string) ($violations[0] ?? ''));
    $view->save();

    // Test caching with AVC, but without regex exclude.
    $this->doCheckCacheTags($this->editorUser, TRUE, [
      'config:views.view.test_row_render_cache',
      'node_list',
      'node:6',
      'node:5',
      'node:4',
      'node:3',
      'node:2',
      'node:1',
      'node_test',
    ], [
      ['node:1', 'node_test'],
      ['node:2', 'node_test'],
      ['node:3', 'node_test'],
      ['node:4', 'node_test'],
      ['node:5', 'node_test'],
      ['node:6', 'node_test'],
    ]);

    // Test caching with AVC and regex exclude. View must be reloaded or no
    // changes will take effect. I'm sure there's a reason.
    $view = View::load('test_row_render_cache');
    $display = &$view->getDisplay('default');
    $cache_options = $display['display_options']['cache']['options'] ?? [];
    $cache_options['cache_tags_exclude_regex'] = ['/node\:[0-9]+/'];
    $display['display_options']['cache']['options'] = $cache_options;
    // View must be valid.
    $violations = iterator_to_array($view->getTypedData()->validate());
    $this->assertTrue(empty($violations), (string) ($violations[0] ?? ''));
    $view->save();

    $this->doCheckCacheTags($this->editorUser, TRUE, [
      'config:views.view.test_row_render_cache',
      'node_list',
      'node_test',
    ], [
      ['node_test'],
      ['node_test'],
      ['node_test'],
      ['node_test'],
      ['node_test'],
      ['node_test'],
    ]);
  }

  /**
   * Check the cache tags for a view and each row against expected values.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user account to tests rendering with.
   * @param bool $expect_vac
   *   Expect the caching to be done by Advanced Views Cache.
   * @param array|null $expect_tags
   *   Tags to expect on the view cache.
   * @param array|null $expect_row_tags
   *   Tags to expect on each row of the view.
   */
  protected function doCheckCacheTags(
    AccountInterface $account,
    ?bool $expect_vac = FALSE,
    ?array $expect_tags = [],
    ?array $expect_row_tags = [],
  ): void {
    $this->setCurrentUser($account);
    $view = Views::getView('test_row_render_cache');
    $view->setDisplay();
    $view->preview();

    /** @var \Drupal\Core\Render\RenderCacheInterface $render_cache */
    $render_cache = $this->container->get('render_cache');

    /** @var \Drupal\views\Plugin\views\cache\CachePluginBase $cache_plugin */
    $cache_plugin = $view->display_handler->getPlugin('cache');
    $this->assertSame(
      $expect_vac ? 'advanced_views_cache' : 'tag',
      $cache_plugin->getPluginId()
    );

    // Check the whole view tags are as expected. Sort to avoid ordering as
    // this is not important.
    $cache_tags = $cache_plugin->getCacheTags();
    sort($expect_tags);
    sort($cache_tags);
    $this->assertSame($expect_tags, $cache_tags);

    // Retrieve nodes and sort them in alphabetical order to match view results.
    $nodes = Node::loadMultiple();
    usort($nodes, function (NodeInterface $a, NodeInterface $b) {
      return strcmp($a->label(), $b->label());
    });

    $index = 0;
    foreach ($nodes as $node) {
      $nid = $node->id();

      // Check that the correct node is going to be tested for.
      $counter = $index + 1;
      $expected = "$nid: $counter (just in case: $nid)";
      $counter_output = $view->style_plugin->getField($index, 'counter');
      $this->assertSame($expected, (string) $counter_output);

      // Confirm row is cached.
      $keys = $cache_plugin->getRowCacheKeys($view->result[$index]);
      $cache = [
        '#cache' => [
          'keys' => $keys,
          'contexts' => [
            'languages:language_interface',
            'theme',
            'user.permissions',
          ],
        ],
      ];
      $element = $render_cache->get($cache);
      $this->assertNotEmpty($element);

      // Confirm the row tags are changed as expected.
      $row_tags = $cache_plugin->getRowCacheTags($view->result[$index]);
      sort($row_tags);
      $this->assertNotEmpty($row_tags, 'No row tags present when expected');
      $this->assertNotEmpty($expect_row_tags[$index], 'Missing expected tags');
      sort($expect_row_tags[$index]);
      $this->assertSame($expect_row_tags[$index], $row_tags);
      if ($expect_vac) {
        $this->assertTrue(
          in_array('node_test', $row_tags),
          'Tag node_test was missing from row cache tags.'
        );
      }
      else {
        $this->assertFalse(
          in_array('node_test', $row_tags),
          'Tag node_test was present when it should not have been.'
        );
      }

      $index++;
    }
  }

}
