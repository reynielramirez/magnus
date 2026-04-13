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

/* modules/custom/base_structure/templates/views/products.html.twig */
class __TwigTemplate_b8e7f8f05cec173aa7dae989d73daca3 extends Template
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
        yield "<!-- View: Products -->

";
        // line 3
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "items", [], "any", false, false, true, 3)) {
            // line 4
            yield "
\t<div id='products-view' data-aos=\"fade-right\">
\t
\t    ";
            // line 7
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "banner", [], "any", false, false, true, 7)) {
                // line 8
                yield "\t\t\t<img src=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "banner", [], "any", false, false, true, 8)), "html", null, true);
                yield "\" alt=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Banner"));
                yield "\">
\t    ";
            }
            // line 9
            yield "\t

\t\t<div class=\"separator\"></div>
\t\t";
            // line 13
            yield "\t\t
\t\t<div class='products-items view-content container'>

\t\t\t<div class=\"views-view-grid horizontal cols-3 clearfix\">
\t\t\t\t<div class=\"items\">

\t\t\t\t\t<!-- Products -->
\t\t\t\t\t";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "items", [], "any", false, false, true, 20));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 21
                yield "
\t\t\t\t\t\t<div class=\"product service\">
\t\t\t\t\t\t\t<h3> ";
                // line 23
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["title"], "method", false, false, true, 23), "value", [], "any", false, false, true, 23), "html", null, true);
                yield " </h3>
\t\t\t\t\t\t\t<div class=\"product-icon\">
\t\t\t\t\t\t\t\t<img src=";
                // line 25
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_image"], "method", false, false, true, 25), "entity", [], "any", false, false, true, 25), "uri", [], "any", false, false, true, 25), "value", [], "any", false, false, true, 25)), "html", null, true);
                yield " alt=\"product name\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<p class=\"summary\"> ";
                // line 27
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_summary"], "method", false, false, true, 27), "value", [], "any", false, false, true, 27), "html", null, true);
                yield " </p>
\t\t\t\t\t\t\t<p><a class=\"button\" href=\"";
                // line 28
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("entity.node.canonical", ["node" => CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 28)]), "html", null, true);
                yield "\"> 
\t\t\t\t\t\t\t\t";
                // line 29
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Read more"));
                yield " 
\t\t\t\t\t\t\t</a></p>
\t\t\t\t\t\t</div>

\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            yield "
\t\t\t\t</div>
\t\t\t</div>

\t\t</div>
\t\t
\t</div>
  
";
        }
        // line 42
        yield "\t";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/base_structure/templates/views/products.html.twig";
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
        return array (  127 => 42,  116 => 34,  105 => 29,  101 => 28,  97 => 27,  92 => 25,  87 => 23,  83 => 21,  79 => 20,  70 => 13,  65 => 9,  57 => 8,  55 => 7,  50 => 4,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/base_structure/templates/views/products.html.twig", "/var/www/html/magnus/web/modules/custom/base_structure/templates/views/products.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 3, "for" => 20];
        static $filters = ["escape" => 8, "t" => 8];
        static $functions = ["file_url" => 8, "url" => 28];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape', 't'],
                ['file_url', 'url'],
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
