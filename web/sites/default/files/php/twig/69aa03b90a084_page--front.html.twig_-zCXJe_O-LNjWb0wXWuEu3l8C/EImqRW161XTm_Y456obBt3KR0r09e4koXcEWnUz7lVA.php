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

/* themes/custom/vani/templates/layout/page--front.html.twig */
class __TwigTemplate_121fad35a8e87ec0d51dfb3e32a1b934 extends Template
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
        // line 9
        yield from $this->loadTemplate("@vani/template-parts/header.html.twig", "themes/custom/vani/templates/layout/page--front.html.twig", 9)->unwrap()->yield($context);
        // line 10
        yield "
<div id=\"main-margin-top\">
</div>

<div id=\"highlighted-front\">
  ";
        // line 15
        yield from $this->loadTemplate("@vani/template-parts/highlighted.html.twig", "themes/custom/vani/templates/layout/page--front.html.twig", 15)->unwrap()->yield($context);
        // line 16
        yield "</div>

";
        // line 18
        yield from $this->loadTemplate("@vani/template-parts/content_home.html.twig", "themes/custom/vani/templates/layout/page--front.html.twig", 18)->unwrap()->yield($context);
        // line 19
        yield "
";
        // line 20
        yield from $this->loadTemplate("@vani/template-parts/footer.html.twig", "themes/custom/vani/templates/layout/page--front.html.twig", 20)->unwrap()->yield($context);
        // line 21
        yield "
";
        // line 22
        if (($context["slider_show"] ?? null)) {
            // line 23
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("atlas/slider"), "html", null, true);
            yield "
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["slider_show"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/vani/templates/layout/page--front.html.twig";
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
        return array (  77 => 23,  75 => 22,  72 => 21,  70 => 20,  67 => 19,  65 => 18,  61 => 16,  59 => 15,  52 => 10,  50 => 9,  47 => 8,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/vani/templates/layout/page--front.html.twig", "/var/www/html/magnus/web/themes/custom/vani/templates/layout/page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 9, "if" => 22];
        static $filters = ["escape" => 23];
        static $functions = ["attach_library" => 23];

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['escape'],
                ['attach_library'],
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
