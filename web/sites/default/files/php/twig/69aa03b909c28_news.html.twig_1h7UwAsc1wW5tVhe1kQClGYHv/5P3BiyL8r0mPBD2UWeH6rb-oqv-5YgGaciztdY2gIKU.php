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

/* modules/custom/base_structure/templates/blocks/news.html.twig */
class __TwigTemplate_180f73cc8c0f0ea7726e71506c8edc56 extends Template
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
        yield "<!-- Block: News -->

";
        // line 3
        if (($context["data"] ?? null)) {
            // line 4
            yield "
<div id='news-block' class=\"front-block block\" data-aos=\"fade-right\">

\t<div class=\"main-wrapper container\">

\t\t<h2 class=\"block-title\"> ";
            // line 9
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Our Latest Blog"));
            yield " </h2>

\t\t<div class=\"block-content\">

\t\t\t<div class=\"views-view-grid horizontal cols-3 clearfix\">
\t\t\t\t<div class=\"items\">

\t\t\t\t\t<!-- News -->
\t\t\t\t\t";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                yield "\t

\t\t\t\t\t\t";
                // line 19
                $context["link"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 19)]);
                // line 20
                yield "\t\t\t\t\t\t
\t\t\t\t\t\t<div class=\"box\">
\t\t\t\t\t\t\t<div class=\"views-field views-field-field-image\">
\t\t\t\t\t\t\t\t<div class=\"field-content\"> 
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 24
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["link"] ?? null), "html", null, true);
                yield "\">
\t\t\t\t\t\t\t\t\t\t<img src=";
                // line 25
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_image"], "method", false, false, true, 25), "entity", [], "any", false, false, true, 25), "uri", [], "any", false, false, true, 25), "value", [], "any", false, false, true, 25)), "html", null, true);
                yield " loading=\"lazy\" width=\"800\" height=\"350\" alt=\"image\" class=\"image-field\">
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"views-field views-field-title\">
\t\t\t\t\t\t\t\t<span class=\"field-content\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 31
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["link"] ?? null), "html", null, true);
                yield "\">
\t\t\t\t\t\t\t\t\t\t";
                // line 32
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["title"], "method", false, false, true, 32), "value", [], "any", false, false, true, 32), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t<p> ";
                // line 38
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_summary"], "method", false, false, true, 38), "value", [], "any", false, false, true, 38), "html", null, true);
                yield " </p>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            yield "
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<p class=\"read-more text-center\">
\t\t\t\t<a href=";
            // line 49
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("base_structure.news"));
            yield " class=\"button\"> 
\t\t\t\t\t";
            // line 50
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Visit Our Blog"));
            yield " 
\t\t\t\t</a>
\t\t\t</p>

\t\t</div>
\t</div>

</div>

";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/base_structure/templates/blocks/news.html.twig";
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
        return array (  132 => 50,  128 => 49,  121 => 44,  109 => 38,  100 => 32,  96 => 31,  87 => 25,  83 => 24,  77 => 20,  75 => 19,  68 => 17,  57 => 9,  50 => 4,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/base_structure/templates/blocks/news.html.twig", "/var/www/html/magnus/web/modules/custom/base_structure/templates/blocks/news.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 3, "for" => 17, "set" => 19];
        static $filters = ["t" => 9, "escape" => 24];
        static $functions = ["url" => 19, "file_url" => 25, "path" => 49];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['t', 'escape'],
                ['url', 'file_url', 'path'],
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
