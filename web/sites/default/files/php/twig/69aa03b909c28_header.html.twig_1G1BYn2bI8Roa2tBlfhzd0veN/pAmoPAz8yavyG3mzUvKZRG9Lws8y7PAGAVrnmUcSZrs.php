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

/* @vani/template-parts/header.html.twig */
class __TwigTemplate_57d250b705bf84bf5a39b2611325fe8a extends Template
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
        yield "<header class=\"header clear\">
  <div class=\"container\">
    <div class=\"header-main\">
      ";
        // line 4
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "site_branding", [], "any", false, false, true, 4)) {
            // line 5
            yield "        <div class=\"site-brand\">
          ";
            // line 6
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "site_branding", [], "any", false, false, true, 6), "html", null, true);
            yield "
        </div> <!--/.site-branding -->
      ";
        }
        // line 9
        yield "      ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 9) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "search_box", [], "any", false, false, true, 9))) {
            // line 10
            yield "        <div class=\"header-main-right\">
          ";
            // line 11
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 11)) {
                // line 12
                yield "            <div class=\"mobile-menu\"><i class=\"icon-menu\"></i></div> ";
                // line 13
                yield "            <div class=\"primary-menu-wrapper\">
              <div class=\"menu-wrap\">
                <div class=\"close-mobile-menu\">x</div>
                ";
                // line 16
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 16), "html", null, true);
                yield "
              </div> <!-- /.menu-wrap -->
            </div> <!-- /.primary-menu-wrapper -->
          ";
            }
            // line 20
            yield "          ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "search_box", [], "any", false, false, true, 20)) {
                // line 21
                yield "            ";
                yield from $this->loadTemplate("@vani/template-parts/search.html.twig", "@vani/template-parts/header.html.twig", 21)->unwrap()->yield($context);
                // line 22
                yield "          ";
            }
            // line 23
            yield "        </div> <!-- /.header-right -->
      ";
        }
        // line 25
        yield "    </div><!-- /header-main -->
  </div><!-- /container -->
  ";
        // line 27
        if ((($context["is_front"] ?? null) && ($context["slider_show"] ?? null))) {
            // line 28
            yield "    <div class=\"slider-show\">
      ";
            // line 29
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "slider_show", [], "any", false, false, true, 29), "html", null, true);
            yield "
    </div> <!--/.slider-show -->
  ";
        } elseif ( !        // line 31
($context["is_front"] ?? null)) {
            // line 32
            yield "    ";
            yield from $this->loadTemplate("@vani/template-parts/page_header.html.twig", "@vani/template-parts/header.html.twig", 32)->unwrap()->yield($context);
            // line 33
            yield "  ";
        }
        // line 34
        yield "</header>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "is_front", "slider_show"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@vani/template-parts/header.html.twig";
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
        return array (  117 => 34,  114 => 33,  111 => 32,  109 => 31,  104 => 29,  101 => 28,  99 => 27,  95 => 25,  91 => 23,  88 => 22,  85 => 21,  82 => 20,  75 => 16,  70 => 13,  68 => 12,  66 => 11,  63 => 10,  60 => 9,  54 => 6,  51 => 5,  49 => 4,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@vani/template-parts/header.html.twig", "/var/www/html/magnus/web/themes/custom/vani/templates/template-parts/header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 4, "include" => 21];
        static $filters = ["escape" => 6];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include'],
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
