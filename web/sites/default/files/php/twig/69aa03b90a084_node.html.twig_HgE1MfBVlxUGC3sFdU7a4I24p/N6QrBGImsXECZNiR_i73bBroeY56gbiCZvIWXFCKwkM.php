<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/custom/vani/templates/content/node.html.twig */
class __TwigTemplate_eb42448cd404a681c5f9f23da16d1fd5 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "
";
        // line 8
        yield "
";
        // line 10
        $context["node_classes"] = ["node", ("node-type-" . \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,         // line 12
($context["node"] ?? null), "bundle", [], "any", false, false, true, 12))), ((CoreExtension::getAttribute($this->env, $this->source,         // line 13
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 13)) ? ("node-promoted") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,         // line 14
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 14)) ? ("node-sticky") : ("")), (( !CoreExtension::getAttribute($this->env, $this->source,         // line 15
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 15)) ? ("node-unpublished") : ("")), ((        // line 16
($context["view_mode"] ?? null)) ? (("node-view-mode-" . \Drupal\Component\Utility\Html::getClass(($context["view_mode"] ?? null)))) : (""))];
        // line 19
        yield "
<article";
        // line 20
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["node_classes"] ?? null)], "method", false, false, true, 20), "html", null, true);
        yield ">
";
        // line 21
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 22
        if ( !($context["page"] ?? null)) {
            // line 23
            yield "    <h2";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["node-title"], "method", false, false, true, 23), "html", null, true);
            yield ">
      <a href=\"";
            // line 24
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["url"] ?? null), "html", null, true);
            yield "\" rel=\"bookmark\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
            yield "</a>
    </h2>
  ";
        }
        // line 27
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

";
        // line 29
        if (($context["display_submitted"] ?? null)) {
            // line 30
            yield "  <header class=\"node-header clear\">
\t<h2";
            // line 31
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", ["node-title view-title"], "method", false, false, true, 31), "html", null, true);
            yield "> ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
            yield " </h2>
    ";
            // line 32
            if (($context["node_author_pic"] ?? null)) {
                // line 33
                yield "      <div class=\"author-picture\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["author_picture"] ?? null), "html", null, true);
                yield "</div>
    ";
            }
            // line 35
            yield "    <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["author_attributes"] ?? null), "addClass", ["node-submitted-details"], "method", false, false, true, 35), "html", null, true);
            yield ">
      ";
            // line 36
            $context["createdDate"] = $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "getCreatedTime", [], "any", false, false, true, 36), "j F Y");
            // line 37
            yield "      ";
            yield t("<span><i class=\"icon-user user-icon\"></i> @author_name</span><span><i class=\"icon-calendar\"></i> @createdDate</span>", array("@author_name" => ($context["author_name"] ?? null), "@createdDate" => ($context["createdDate"] ?? null), ));
            // line 38
            yield "      ";
            if (($context["node_tags"] ?? null)) {
                // line 39
                yield "      ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_tags", [], "any", false, false, true, 39)) {
                    // line 40
                    yield "        <span><i class=\"icon-hashtag\"></i>
        ";
                    // line 41
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_tags", [], "any", false, false, true, 41));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 42
                        yield "          ";
                        if ((($_v0 = $context["item"]) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#title"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context["item"], "#title", [], "array", false, false, true, 42))) {
                            // line 43
                            yield "            <a href=\"";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($_v1 = $context["item"]) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1["#url"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context["item"], "#url", [], "array", false, false, true, 43)), "html", null, true);
                            yield "\">";
                            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($_v2 = $context["item"]) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2["#title"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context["item"], "#title", [], "array", false, false, true, 43)), "html", null, true);
                            yield "</a>";
                            yield ",";
                            yield "
          ";
                        }
                        // line 45
                        yield "        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 46
                    yield "      </span>
      ";
                }
                // line 48
                yield "      ";
            }
            // line 49
            yield "      ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["metadata"] ?? null), "html", null, true);
            yield "
    </div>
  </header>
";
        }
        // line 53
        yield "  <div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", ["node-content clear"], "method", false, false, true, 53), "html", null, true);
        yield ">
    ";
        // line 54
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true);
        yield "
  </div>
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "view_mode", "attributes", "title_prefix", "page", "title_attributes", "url", "label", "title_suffix", "display_submitted", "node_author_pic", "author_picture", "author_attributes", "author_name", "node_tags", "content", "metadata", "content_attributes"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/vani/templates/content/node.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  169 => 54,  164 => 53,  156 => 49,  153 => 48,  149 => 46,  143 => 45,  133 => 43,  130 => 42,  126 => 41,  123 => 40,  120 => 39,  117 => 38,  114 => 37,  112 => 36,  107 => 35,  101 => 33,  99 => 32,  93 => 31,  90 => 30,  88 => 29,  83 => 27,  75 => 24,  70 => 23,  68 => 22,  64 => 21,  60 => 20,  57 => 19,  55 => 16,  54 => 15,  53 => 14,  52 => 13,  51 => 12,  50 => 10,  47 => 8,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/vani/templates/content/node.html.twig", "/var/www/html/magnus/web/themes/custom/vani/templates/content/node.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 10, "if" => 22, "trans" => 37, "for" => 41];
        static $filters = ["clean_class" => 12, "escape" => 20, "date" => 36];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'trans', 'for'],
                ['clean_class', 'escape', 'date'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
