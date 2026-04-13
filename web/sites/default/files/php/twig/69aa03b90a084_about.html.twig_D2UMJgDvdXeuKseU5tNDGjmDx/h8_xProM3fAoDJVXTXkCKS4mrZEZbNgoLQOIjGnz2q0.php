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

/* modules/custom/base_structure/templates/views/about.html.twig */
class __TwigTemplate_17da4731f9ac21e33ce1c4610737bb7a extends Template
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
        yield "<!-- View: About Us -->

";
        // line 3
        if (($context["data"] ?? null)) {
            // line 4
            yield "
\t<div id='about-view' data-aos=\"fade-right\">
\t
\t\t";
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

\t\t<div class=\"container\">

\t\t\t<div class=\"separator\"></div>
\t\t\t";
            // line 15
            yield "
\t\t\t";
            // line 16
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "description", [], "any", false, false, true, 16)) {
                // line 17
                yield "\t\t\t\t<div class='about-description'>
\t\t\t\t\t<p>  ";
                // line 18
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "description", [], "any", false, false, true, 18), "html", null, true);
                yield "  </p>
\t\t\t\t</div>
\t\t\t";
            }
            // line 20
            yield "\t

\t\t\t<div class='about-items view-content container'>

\t\t\t\t<div class=\"about-view-grid horizontal cols-3 clearfix\">
\t\t\t\t\t<div class=\"items\">
\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t<div class=\"about-icon\">
\t\t\t\t\t\t\t\t<img class=\"svg-icon\" src=";
            // line 28
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "mission_img", [], "any", false, false, true, 28)), "html", null, true);
            yield ">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<h3> ";
            // line 30
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Mission"));
            yield " </h3>
\t\t\t\t\t\t\t<p class=\"summary\"> ";
            // line 31
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "mission", [], "any", false, false, true, 31), "html", null, true);
            yield " </p>\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t<div class=\"about-icon\">
\t\t\t\t\t\t\t\t<img class=\"svg-icon\" src=";
            // line 35
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "vision_img", [], "any", false, false, true, 35)), "html", null, true);
            yield ">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<h3> ";
            // line 37
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Vision"));
            yield " </h3>
\t\t\t\t\t\t\t<p class=\"summary\"> ";
            // line 38
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "vision", [], "any", false, false, true, 38), "html", null, true);
            yield " </p>\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t<div class=\"about-icon\">
\t\t\t\t\t\t\t\t<img class=\"svg-icon\" src=";
            // line 42
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "purpose_img", [], "any", false, false, true, 42)), "html", null, true);
            yield ">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<h3> ";
            // line 44
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Purpose"));
            yield " </h3>
\t\t\t\t\t\t\t<p class=\"summary\"> ";
            // line 45
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "purpose", [], "any", false, false, true, 45), "html", null, true);
            yield " </p>\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t
\t\t\t\t</div>

\t\t\t</div>

\t\t\t<h2 class=\"view-title values-title\"> ";
            // line 52
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Values"));
            yield " </h2>

\t\t\t<div class='about-items view-content container'>

\t\t\t\t<div class=\"about-view-grid horizontal cols-3 clearfix\">
\t\t\t\t\t<div class=\"items\">
\t\t\t\t
\t\t\t\t\t\t<!-- Values -->
\t\t\t\t\t\t";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "items", [], "any", false, false, true, 60));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                yield "\t

\t\t\t\t\t\t\t<div class=\"item\">
\t\t\t\t\t\t\t\t<div class=\"about-icon\">
\t\t\t\t\t\t\t\t\t<img class=\"svg-icon\" src=";
                // line 64
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_image"], "method", false, false, true, 64), "entity", [], "any", false, false, true, 64), "uri", [], "any", false, false, true, 64), "value", [], "any", false, false, true, 64)), "html", null, true);
                yield ">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<h3> ";
                // line 66
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["title"], "method", false, false, true, 66), "value", [], "any", false, false, true, 66), "html", null, true);
                yield " </h3>
\t\t\t\t\t\t\t\t<p class=\"summary\"> ";
                // line 67
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_description"], "method", false, false, true, 67), "value", [], "any", false, false, true, 67), "html", null, true);
                yield " </p>\t\t\t
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            yield "
\t\t\t\t\t</div>\t
\t\t\t\t</div>

\t\t\t</div>\t\t

\t\t</div>
\t\t
\t</div>
  
";
        }
        // line 81
        yield "\t";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/base_structure/templates/views/about.html.twig";
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
        return array (  199 => 81,  186 => 71,  176 => 67,  172 => 66,  167 => 64,  158 => 60,  147 => 52,  137 => 45,  133 => 44,  128 => 42,  121 => 38,  117 => 37,  112 => 35,  105 => 31,  101 => 30,  96 => 28,  86 => 20,  80 => 18,  77 => 17,  75 => 16,  72 => 15,  65 => 9,  57 => 8,  55 => 7,  50 => 4,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/base_structure/templates/views/about.html.twig", "/var/www/html/magnus/web/modules/custom/base_structure/templates/views/about.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 3, "for" => 60];
        static $filters = ["escape" => 8, "t" => 8];
        static $functions = ["file_url" => 8];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape', 't'],
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
