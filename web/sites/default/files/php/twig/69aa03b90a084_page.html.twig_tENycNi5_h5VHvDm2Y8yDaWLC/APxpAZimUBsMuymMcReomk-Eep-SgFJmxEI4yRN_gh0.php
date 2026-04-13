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

/* themes/custom/vani/templates/layout/page.html.twig */
class __TwigTemplate_3d3d1b317f42db92fe3781f6545b4e11 extends Template
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
        yield from $this->loadTemplate("@vani/template-parts/header.html.twig", "themes/custom/vani/templates/layout/page.html.twig", 9)->unwrap()->yield($context);
        // line 10
        yield "
<div id=\"main-margin-top\">
</div>

<div id=\"highlighted-front\">
  ";
        // line 15
        yield from $this->loadTemplate("@vani/template-parts/highlighted.html.twig", "themes/custom/vani/templates/layout/page.html.twig", 15)->unwrap()->yield($context);
        // line 16
        yield "</div>

<div id=\"main-wrapper\" class=\"main-wrapper\">
  <div class=\"container clear\">
  <div class=\"main-container\">
    <main id=\"main\" class=\"page-content\">
      <a id=\"main-content\" tabindex=\"-1\"></a>
      <div class=\"node-content\">
        ";
        // line 24
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 24), "html", null, true);
        yield "
      </div>
    </main>
\t
\t";
        // line 28
        if (($context["front_sidebar"] ?? null)) {
            // line 29
            yield "      ";
            yield from $this->loadTemplate("@vani/template-parts/sidebar_left.html.twig", "themes/custom/vani/templates/layout/page.html.twig", 29)->unwrap()->yield($context);
            // line 30
            yield "      ";
            yield from $this->loadTemplate("@vani/template-parts/sidebar_right.html.twig", "themes/custom/vani/templates/layout/page.html.twig", 30)->unwrap()->yield($context);
            // line 31
            yield "    ";
        }
        // line 32
        yield "    
  </div> 
  </div> 
</div>

";
        // line 37
        yield from $this->loadTemplate("@vani/template-parts/footer.html.twig", "themes/custom/vani/templates/layout/page.html.twig", 37)->unwrap()->yield($context);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "front_sidebar"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/vani/templates/layout/page.html.twig";
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
        return array (  96 => 37,  89 => 32,  86 => 31,  83 => 30,  80 => 29,  78 => 28,  71 => 24,  61 => 16,  59 => 15,  52 => 10,  50 => 9,  47 => 8,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/vani/templates/layout/page.html.twig", "/var/www/html/magnus/web/themes/custom/vani/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 9, "if" => 28];
        static $filters = ["escape" => 24];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['escape'],
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
