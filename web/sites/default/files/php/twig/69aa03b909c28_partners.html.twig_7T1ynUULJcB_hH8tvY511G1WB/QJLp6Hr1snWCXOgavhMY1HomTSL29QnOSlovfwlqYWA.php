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

/* modules/custom/base_structure/templates/blocks/partners.html.twig */
class __TwigTemplate_ec500cbcc4dd447f908da3a6353f77bd extends Template
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
        yield "<!-- Block: Partners -->

";
        // line 3
        if (($context["data"] ?? null)) {
            // line 4
            yield "
\t<div id='partners-block' class=\"front-block\" data-aos=\"fade-right\">
\t
\t\t<h1 class=\"block-title\"> ";
            // line 7
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Partners"));
            yield " </h1>
\t    
\t\t<div class=\"block-content\">
\t\t\t<div class=\"field field--name-body field--type-text-with-summary field--label-hidden field-item\">
\t\t\t\t<div id=\"partners-slider\" class=\"services owl-carousel owl-theme owl-loaded owl-drag\">

\t\t\t\t\t<!-- Partners -->
\t\t\t\t\t";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                yield "\t

\t\t\t\t\t\t<div class=\"partners-item\">
\t\t\t\t\t\t\t<a href=\"";
                // line 17
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_link"], "method", false, false, true, 17), "uri", [], "any", false, false, true, 17), "html", null, true);
                yield "\" target=\"_blank\">
\t\t\t\t\t\t\t\t<img src=";
                // line 18
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_image"], "method", false, false, true, 18), "entity", [], "any", false, false, true, 18), "uri", [], "any", false, false, true, 18), "value", [], "any", false, false, true, 18)), "html", null, true);
                yield " alt=\"partner\">
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>

\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            yield "
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t</div>
  
";
        }
        // line 30
        yield "\t";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/base_structure/templates/blocks/partners.html.twig";
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
        return array (  98 => 30,  88 => 23,  77 => 18,  73 => 17,  65 => 14,  55 => 7,  50 => 4,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/base_structure/templates/blocks/partners.html.twig", "/var/www/html/magnus/web/modules/custom/base_structure/templates/blocks/partners.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 3, "for" => 14];
        static $filters = ["t" => 7, "escape" => 17];
        static $functions = ["file_url" => 18];

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
