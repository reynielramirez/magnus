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

/* themes/custom/vani/templates/navigation/menu--main.html.twig */
class __TwigTemplate_a2cb17e4a17a0f28dcd65721a85f9b58 extends Template
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
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 10
        yield "
";
        // line 11
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_menu_links", $context, 11, $this->getSourceContext())->macro_menu_links(...[($context["items"] ?? null), ($context["attributes"] ?? null), 0]));
        yield "

";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_self", "items", "attributes", "menu_level"]);        yield from [];
    }

    // line 13
    public function macro_menu_links($items = null, $attributes = null, $menu_level = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "items" => $items,
            "attributes" => $attributes,
            "menu_level" => $menu_level,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 14
            yield "  ";
            $macros["menus"] = $this;
            // line 15
            yield "  ";
            if (($context["items"] ?? null)) {
                // line 16
                yield "    ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 17
                    yield "      <ul";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["main-menu"], "method", false, false, true, 17), "html", null, true);
                    yield ">
    ";
                } else {
                    // line 19
                    yield "      <ul class=\"submenu\">
    ";
                }
                // line 21
                yield "    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 22
                    yield "      ";
                    // line 23
                    $context["item_classes"] = ["main-menu-item", ((CoreExtension::getAttribute($this->env, $this->source,                     // line 25
$context["item"], "is_expanded", [], "any", false, false, true, 25)) ? ("expanded") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,                     // line 26
$context["item"], "is_collapsed", [], "any", false, false, true, 26)) ? ("collapsed") : ("")), ((CoreExtension::getAttribute($this->env, $this->source,                     // line 27
$context["item"], "in_active_trail", [], "any", false, false, true, 27)) ? ("active") : (""))];
                    // line 30
                    yield "      ";
                    if (((($context["menu_level"] ?? null) == 0) && CoreExtension::getAttribute($this->env, $this->source, $context["item"], "is_collapsed", [], "any", false, false, true, 30))) {
                        // line 31
                        yield "        <li ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 31), "addClass", [($context["item_classes"] ?? null)], "method", false, false, true, 31), "html", null, true);
                        yield ">
        <a href=\"";
                        // line 32
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 32), "html", null, true);
                        yield "\">";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 32), "html", null, true);
                        yield " <span class=\"dropdown-arrow\">+</span></a>
      ";
                    } elseif (((                    // line 33
($context["menu_level"] ?? null) == 0) && CoreExtension::getAttribute($this->env, $this->source, $context["item"], "is_expanded", [], "any", false, false, true, 33))) {
                        // line 34
                        yield "        <li ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 34), "addClass", [($context["item_classes"] ?? null)], "method", false, false, true, 34), "html", null, true);
                        yield ">
        <a href=\"";
                        // line 35
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 35), "html", null, true);
                        yield "\">";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 35), "html", null, true);
                        yield " <span class=\"dropdown-arrow\">+</span></a>
      ";
                    } else {
                        // line 37
                        yield "        <li";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 37), "addClass", [($context["item_classes"] ?? null)], "method", false, false, true, 37), "html", null, true);
                        yield ">
        ";
                        // line 38
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 38), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 38)), "html", null, true);
                        yield "
      ";
                    }
                    // line 40
                    yield "      ";
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 40)) {
                        // line 41
                        yield "        ";
                        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["menus"]->getTemplateForMacro("macro_menu_links", $context, 41, $this->getSourceContext())->macro_menu_links(...[CoreExtension::getAttribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 41), CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "removeClass", ["nav", "navbar-nav"], "method", false, false, true, 41), (($context["menu_level"] ?? null) + 1)]));
                        yield "
      ";
                    }
                    // line 43
                    yield "      </li>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 45
                yield "    </ul>
  ";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/vani/templates/navigation/menu--main.html.twig";
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
        return array (  163 => 45,  156 => 43,  150 => 41,  147 => 40,  142 => 38,  137 => 37,  130 => 35,  125 => 34,  123 => 33,  117 => 32,  112 => 31,  109 => 30,  107 => 27,  106 => 26,  105 => 25,  104 => 23,  102 => 22,  97 => 21,  93 => 19,  87 => 17,  84 => 16,  81 => 15,  78 => 14,  64 => 13,  55 => 11,  52 => 10,  50 => 9,  47 => 8,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/vani/templates/navigation/menu--main.html.twig", "/var/www/html/magnus/web/themes/custom/vani/templates/navigation/menu--main.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["import" => 9, "macro" => 13, "if" => 15, "for" => 21, "set" => 23];
        static $filters = ["escape" => 17];
        static $functions = ["link" => 38];

        try {
            $this->sandbox->checkSecurity(
                ['import', 'macro', 'if', 'for', 'set'],
                ['escape'],
                ['link'],
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
