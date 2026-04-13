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

/* modules/custom/base_structure/templates/blocks/values.html.twig */
class __TwigTemplate_91e6b061befd2085a0450082712f186a extends Template
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
        yield "<!-- Block: Values -->

";
        // line 3
        if (($context["data"] ?? null)) {
            // line 4
            yield "
\t<div id='values-block' class=\"front-block views-element-container block\">
\t\t<div class=\"container\">

\t\t\t<div data-aos=\"fade-right\">

\t\t\t\t<h2 class=\"block-title\"> ";
            // line 10
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Values"));
            yield " </h2>

\t\t\t\t<div class=\"block-content\">

\t\t\t\t\t<div class=\"field field--name-body field--type-text-with-summary field--label-hidden field-item\">
\t\t\t\t\t\t<div id=\"values-slider\" class=\"services owl-carousel owl-theme owl-loaded owl-drag\">

\t\t\t\t\t\t\t<!-- Values -->
\t\t\t\t\t\t\t";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                yield "\t

\t\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t\t\t<div class=\"about-icon\">
\t\t\t\t\t\t\t\t\t\t<img class=\"svg-icon\" src=";
                // line 22
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_image"], "method", false, false, true, 22), "entity", [], "any", false, false, true, 22), "uri", [], "any", false, false, true, 22), "value", [], "any", false, false, true, 22)), "html", null, true);
                yield ">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<h3> ";
                // line 24
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["title"], "method", false, false, true, 24), "value", [], "any", false, false, true, 24), "html", null, true);
                yield " </h3>\t
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
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
        // line 39
        yield "\t";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/base_structure/templates/blocks/values.html.twig";
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
        return array (  107 => 39,  93 => 28,  83 => 24,  78 => 22,  69 => 18,  58 => 10,  50 => 4,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/base_structure/templates/blocks/values.html.twig", "/var/www/html/magnus/web/modules/custom/base_structure/templates/blocks/values.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 3, "for" => 18];
        static $filters = ["t" => 10, "escape" => 22];
        static $functions = ["file_url" => 22];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['t', 'escape'],
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
