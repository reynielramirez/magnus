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

/* modules/custom/base_structure/templates/blocks/contacts.html.twig */
class __TwigTemplate_9b55da35e0a3c31dc65104b9bb7104ed extends Template
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
        yield "<!-- Block: Contact -->
";
        // line 2
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "address", [], "any", false, false, true, 2) || CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "phone", [], "any", false, false, true, 2)) || CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "email", [], "any", false, false, true, 2))) {
            // line 3
            yield "
    <div id=\"contacts-block\">

        <h2 class=\"block-title\">";
            // line 6
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Contact Us"));
            yield "</h2>

        <div class=\"contact-items\">
            <img src=\"";
            // line 9
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl(CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "logo", [], "any", false, false, true, 9)), "html", null, true);
            yield "\" alt=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Contact"));
            yield "\">
            <h4 class=\"contact-address\"> ";
            // line 10
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "address", [], "any", false, false, true, 10), "html", null, true);
            yield " </h4>
            <h4 class=\"contact-phone\"> ";
            // line 11
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Phone:"));
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "phone", [], "any", false, false, true, 11), "html", null, true);
            yield " </h4>
            <h4 class=\"contact-email\"> ";
            // line 12
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Email:"));
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "email", [], "any", false, false, true, 12), "html", null, true);
            yield " </h4>

            <ul class=\"social-icons\">

                ";
            // line 16
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "facebook", [], "any", false, false, true, 16)) {
                // line 17
                yield "                    <li><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "facebook", [], "any", false, false, true, 17), "html", null, true);
                yield "\" target=\"_blank\"><i class=\"icon-facebook\"></i></a></li>
                ";
            }
            // line 18
            yield "\t
                
                ";
            // line 20
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "twitter", [], "any", false, false, true, 20)) {
                // line 21
                yield "                    <li><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "twitter", [], "any", false, false, true, 21), "html", null, true);
                yield "\" target=\"_blank\"><i class=\"icon-twitter\"></i></a></li>
                ";
            }
            // line 22
            yield "\t

                ";
            // line 24
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "instagram", [], "any", false, false, true, 24)) {
                // line 25
                yield "                    <li><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "instagram", [], "any", false, false, true, 25), "html", null, true);
                yield "\" target=\"_blank\"><i class=\"icon-instagram\"></i></a></li>
                ";
            }
            // line 26
            yield "\t

                ";
            // line 28
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "linkedin", [], "any", false, false, true, 28)) {
                // line 29
                yield "                    <li><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "linkedin", [], "any", false, false, true, 29), "html", null, true);
                yield "\" target=\"_blank\"><i class=\"icon-linkedin\"></i></a></li>
                ";
            }
            // line 30
            yield "\t

                ";
            // line 32
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "youtube", [], "any", false, false, true, 32)) {
                // line 33
                yield "                    <li><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "youtube", [], "any", false, false, true, 33), "html", null, true);
                yield "\" target=\"_blank\"><i class=\"icon-youtube\"></i></a></li>
                ";
            }
            // line 34
            yield "\t

                ";
            // line 36
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "vimeo", [], "any", false, false, true, 36)) {
                // line 37
                yield "                    <li><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "vimeo", [], "any", false, false, true, 37), "html", null, true);
                yield "\" target=\"_blank\"><i class=\"icon-vimeo\"></i></a></li>
                ";
            }
            // line 38
            yield "\t

                ";
            // line 40
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "telegram", [], "any", false, false, true, 40)) {
                // line 41
                yield "                    <li><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "telegram", [], "any", false, false, true, 41), "html", null, true);
                yield "\" target=\"_blank\"><i class=\"icon-telegram\"></i></a></li>
                ";
            }
            // line 42
            yield "\t

                ";
            // line 44
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "whatsapp", [], "any", false, false, true, 44)) {
                // line 45
                yield "                    <li><a href=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["data"] ?? null), "whatsapp", [], "any", false, false, true, 45), "html", null, true);
                yield "\" target=\"_blank\"><i class=\"icon-whatsapp\"></i></a></li>
                ";
            }
            // line 46
            yield "\t

            </ul>    

        </div>

        <a class=\"button\" href=\"/Contacto\">";
            // line 52
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Send message"));
            yield "</a>

    </div>

";
        }
        // line 56
        yield "\t";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["data"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "modules/custom/base_structure/templates/blocks/contacts.html.twig";
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
        return array (  193 => 56,  185 => 52,  177 => 46,  171 => 45,  169 => 44,  165 => 42,  159 => 41,  157 => 40,  153 => 38,  147 => 37,  145 => 36,  141 => 34,  135 => 33,  133 => 32,  129 => 30,  123 => 29,  121 => 28,  117 => 26,  111 => 25,  109 => 24,  105 => 22,  99 => 21,  97 => 20,  93 => 18,  87 => 17,  85 => 16,  76 => 12,  70 => 11,  66 => 10,  60 => 9,  54 => 6,  49 => 3,  47 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "modules/custom/base_structure/templates/blocks/contacts.html.twig", "/var/www/html/magnus/web/modules/custom/base_structure/templates/blocks/contacts.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 2];
        static $filters = ["t" => 6, "escape" => 9];
        static $functions = ["file_url" => 9];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
