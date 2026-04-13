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

/* modules/custom/base_structure/templates/blocks/testimonials.html.twig */
class __TwigTemplate_75d5ae2b3317c121484cf778ca90841c extends Template
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
        yield "<!-- Block: Testimonials -->

";
        // line 3
        if (($context["data"] ?? null)) {
            // line 4
            yield "
\t<div id='testimonials-block' class=\"front-block views-element-container block\">
\t\t<div class=\"container\">

\t\t\t<div data-aos=\"fade-right\">

\t\t\t\t<h2 class=\"block-title\"> ";
            // line 10
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Testimonials"));
            yield " </h2>

\t\t\t\t<div class=\"block-content\">

\t\t\t\t\t<div class=\"field field--name-body field--type-text-with-summary field--label-hidden field-item\">
\t\t\t\t\t\t<div id=\"testimonials-slider\" class=\"services owl-carousel owl-theme owl-loaded owl-drag\">

\t\t\t\t\t\t\t<!-- Testimonials -->
\t\t\t\t\t\t\t";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                yield "\t

\t\t\t\t\t\t\t\t<div class=\"box-item\">
\t\t\t\t\t\t\t\t\t<div class=\"box-top\">
\t\t\t\t\t\t\t\t\t\t<div class=\"icon\">
\t\t\t\t\t\t\t\t\t\t\t<img src=";
                // line 23
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_image"], "method", false, false, true, 23), "entity", [], "any", false, false, true, 23), "uri", [], "any", false, false, true, 23), "value", [], "any", false, false, true, 23)), "html", null, true);
                yield " alt=\"testimonial\">
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"info\">
\t\t\t\t\t\t\t\t\t\t\t<h4> ";
                // line 26
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["title"], "method", false, false, true, 26), "value", [], "any", false, false, true, 26), "html", null, true);
                yield " </h4>\t
\t\t\t\t\t\t\t\t\t\t\t<h6 class=\"date\"> ";
                // line 27
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->env->getFilter('format_date')->getCallable()($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_date"], "method", false, false, true, 27), "value", [], "any", false, false, true, 27), "U"), "custom", "D, j M Y"), "html", null, true);
                yield " </h6>
\t\t\t\t\t\t\t\t\t\t\t<h6> ";
                // line 28
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_name"], "method", false, false, true, 28), "value", [], "any", false, false, true, 28), "html", null, true);
                yield " 
\t\t\t\t\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t\t\t\t\t( ";
                // line 30
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_position"], "method", false, false, true, 30), "entity", [], "any", false, false, true, 30), "label", [], "any", false, false, true, 30), "html", null, true);
                yield " )
\t\t\t\t\t\t\t\t\t\t\t\t</span> 
\t\t\t\t\t\t\t\t\t\t\t</h6>\t
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t\t<p class=\"summary\"> ";
                // line 36
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_summary"], "method", false, false, true, 36), "value", [], "any", false, false, true, 36), "html", null, true);
                yield " </p>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            yield "
\t\t\t\t\t\t</div>
\t
\t\t\t\t\t</div>

\t\t\t\t</div>
\t\t\t</div>

\t\t</div>
\t</div>
  
";
        }
        // line 51
        yield "\t";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/base_structure/templates/blocks/testimonials.html.twig";
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
        return array (  131 => 51,  117 => 40,  107 => 36,  98 => 30,  93 => 28,  89 => 27,  85 => 26,  79 => 23,  69 => 18,  58 => 10,  50 => 4,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/base_structure/templates/blocks/testimonials.html.twig", "/var/www/html/magnus/web/modules/custom/base_structure/templates/blocks/testimonials.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 3, "for" => 18];
        static $filters = ["t" => 10, "escape" => 23, "format_date" => 27, "date" => 27];
        static $functions = ["file_url" => 23];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['t', 'escape', 'format_date', 'date'],
                ['file_url'],
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
