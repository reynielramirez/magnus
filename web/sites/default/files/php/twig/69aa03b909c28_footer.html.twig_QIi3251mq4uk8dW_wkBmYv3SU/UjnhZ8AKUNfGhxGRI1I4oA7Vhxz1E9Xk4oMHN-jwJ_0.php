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

/* @vani/template-parts/footer.html.twig */
class __TwigTemplate_e645ceb3b4e651d6b1f011e5c0ef2810 extends Template
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
<footer id=\"contacto\" class=\"footer clear\">

  ";
        // line 4
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 4) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 4))) {
            // line 5
            yield "  
    <div class=\"footer-container\">
  
\t\t<section class=\"clear footer-section\">
\t\t 
\t\t\t  ";
            // line 10
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 10)) {
                // line 11
                yield "\t\t\t\t";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 11), "html", null, true);
                yield "
\t\t\t  ";
            }
            // line 13
            yield "\t\t  
\t\t</section> <!--/footer-blocks -->
\t\t
\t\t<section class=\"clear footer-section\">
\t\t 
\t\t\t  ";
            // line 18
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 18)) {
                // line 19
                yield "\t\t\t\t";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 19), "html", null, true);
                yield "
\t\t\t  ";
            }
            // line 21
            yield "\t\t 
\t\t</section> <!--/footer-blocks -->
\t
\t</div>
\t
  ";
        }
        // line 26
        yield " ";
        // line 27
        yield "
  ";
        // line 28
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 28) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 28))) {
            // line 29
            yield "  
    <div class=\"footer-container\">
  
\t\t<section class=\"clear footer-section\">
\t\t 
\t\t\t  ";
            // line 34
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 34)) {
                // line 35
                yield "\t\t\t\t";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 35), "html", null, true);
                yield "
\t\t\t  ";
            }
            // line 37
            yield "\t\t  
\t\t</section> <!--/footer-blocks -->
\t\t
\t\t<section class=\"clear footer-section\">
\t\t
\t\t\t  ";
            // line 42
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 42)) {
                // line 43
                yield "\t\t\t\t";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 43), "html", null, true);
                yield "
\t\t\t  ";
            }
            // line 45
            yield "\t\t 
\t\t</section> <!--/footer-blocks -->
\t
\t</div>
\t
  ";
        }
        // line 50
        yield " ";
        // line 51
        yield "  
   <section id=\"footer-bottom-last\" class=\"clear\">
\t <div class=\"container clear\">
\t\t <div class=\"footer-bottom-last\">  
\t\t   <div class=\"copyright\">
\t\t\t&copy; ";
        // line 56
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " ";
        yield "Magnus TI S.A. de C.V.";
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Developed by MultiSoft."));
        yield " ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("All rights reserved."));
        yield "
\t\t   </div>
\t\t </div> <!-- /.container -->
\t </div> <!-- /.container -->
   </section> <!-- /footer-bottom-last -->

</footer>\t\t
\t\t
";
        // line 64
        if (($context["scrolltotop_on"] ?? null)) {
            // line 65
            yield "
  <div title=\"Ir arriba\" class=\"scrolltop\"><div class=\"scrolltop-icon\">&#x2191;</div></div>

";
        }
        // line 69
        yield "
<!-- End: Footer -->

";
        // line 72
        if (($context["font_icon_fontawesome"] ?? null)) {
            // line 73
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("atlas/fontawesome"), "html", null, true);
            yield "
";
        }
        // line 75
        if (($context["font_icon_material"] ?? null)) {
            // line 76
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("atlas/material"), "html", null, true);
            yield "
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "scrolltotop_on", "font_icon_fontawesome", "font_icon_material"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@vani/template-parts/footer.html.twig";
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
        return array (  182 => 76,  180 => 75,  175 => 73,  173 => 72,  168 => 69,  162 => 65,  160 => 64,  143 => 56,  136 => 51,  134 => 50,  126 => 45,  120 => 43,  118 => 42,  111 => 37,  105 => 35,  103 => 34,  96 => 29,  94 => 28,  91 => 27,  89 => 26,  81 => 21,  75 => 19,  73 => 18,  66 => 13,  60 => 11,  58 => 10,  51 => 5,  49 => 4,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@vani/template-parts/footer.html.twig", "/var/www/html/magnus/web/themes/custom/vani/templates/template-parts/footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 4];
        static $filters = ["escape" => 11, "date" => 56, "t" => 56];
        static $functions = ["attach_library" => 73];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'date', 't'],
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
