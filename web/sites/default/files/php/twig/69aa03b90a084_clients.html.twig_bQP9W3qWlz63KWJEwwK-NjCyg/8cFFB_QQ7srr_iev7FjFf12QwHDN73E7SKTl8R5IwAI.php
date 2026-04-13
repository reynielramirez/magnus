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

/* modules/custom/base_structure/templates/blocks/clients.html.twig */
class __TwigTemplate_65e2d3f5aff1615dbdef65ff07ee3556 extends Template
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
        yield "<!-- Block: Clients -->

";
        // line 3
        if (($context["data"] ?? null)) {
            // line 4
            yield "
\t<div id='clients-block' class=\"front-block\" data-aos=\"fade-right\">
\t
\t\t<h1 class=\"block-title\"> ";
            // line 7
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Customers"));
            yield " </h1>
\t    
\t\t<div class=\"block-content\">
\t\t\t<div class=\"field field--name-body field--type-text-with-summary field--label-hidden field-item\">
\t\t\t\t<div id=\"clients-slider\" class=\"services owl-carousel owl-theme owl-loaded owl-drag\">

\t\t\t\t\t";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["data"] ?? null));
            foreach ($context['_seq'] as $context["i"] => $context["item"]) {
                yield "\t\t
\t\t\t\t\t<!-- Clients -->

\t\t\t\t\t\t<div class=\"clients-item\">
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                // line 18
                if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_description"], "method", false, false, true, 18), "value", [], "any", false, false, true, 18)) {
                    // line 19
                    yield "
\t\t\t\t\t\t\t\t<button nire-dialog='";
                    // line 20
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["i"], "html", null, true);
                    yield "'>
\t\t\t\t\t\t\t\t\t<img src=";
                    // line 21
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_image"], "method", false, false, true, 21), "entity", [], "any", false, false, true, 21), "uri", [], "any", false, false, true, 21), "value", [], "any", false, false, true, 21)), "html", null, true);
                    yield " alt=\"client\">
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t<h4 nire-dialog-title='";
                    // line 23
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["i"], "html", null, true);
                    yield "'> ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["title"], "method", false, false, true, 23), "value", [], "any", false, false, true, 23), "html", null, true);
                    yield " </h4>
\t\t\t\t\t\t\t\t<p nire-dialog-content='";
                    // line 24
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["i"], "html", null, true);
                    yield "'> ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_description"], "method", false, false, true, 24), "value", [], "any", false, false, true, 24), "html", null, true);
                    yield " </p>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                } else {
                    // line 26
                    yield "\t

\t\t\t\t\t\t\t\t<button>
\t\t\t\t\t\t\t\t\t<img src=";
                    // line 29
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "get", ["field_image"], "method", false, false, true, 29), "entity", [], "any", false, false, true, 29), "uri", [], "any", false, false, true, 29), "value", [], "any", false, false, true, 29)), "html", null, true);
                    yield " alt=\"client\">
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                }
                // line 32
                yield "\t

\t\t\t\t\t\t</div>
\t
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['i'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            yield "
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t
\t</div>
  
";
        }
        // line 44
        yield "\t";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/base_structure/templates/blocks/clients.html.twig";
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
        return array (  134 => 44,  124 => 37,  114 => 32,  107 => 29,  102 => 26,  94 => 24,  88 => 23,  83 => 21,  79 => 20,  76 => 19,  74 => 18,  64 => 13,  55 => 7,  50 => 4,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/base_structure/templates/blocks/clients.html.twig", "/var/www/html/magnus/web/modules/custom/base_structure/templates/blocks/clients.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 3, "for" => 13];
        static $filters = ["t" => 7, "escape" => 20];
        static $functions = ["file_url" => 21];

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
