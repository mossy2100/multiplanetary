<?php

/* themes/custom/multiplanetary/templates/navigation/book-tree.html.twig */
class __TwigTemplate_6120b177489b5688a3a772b0ed862bd7dfc7f41b19540f64fdd8f515cbce969d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("import" => 21, "macro" => 29, "if" => 31, "set" => 34, "for" => 45);
        $filters = array("clean_class" => 52, "render" => 52);
        $functions = array("cycle" => 43, "link" => 56);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('import', 'macro', 'if', 'set', 'for'),
                array('clean_class', 'render'),
                array('cycle', 'link')
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 21
        $context["book_tree"] = $this;
        // line 22
        echo "
";
        // line 27
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["book_tree"]->getbook_links((isset($context["items"]) ? $context["items"] : null), (isset($context["attributes"]) ? $context["attributes"] : null), 0)));
        echo "

";
    }

    // line 29
    public function getbook_links($__items__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 30
            echo "  ";
            $context["book_tree"] = $this;
            // line 31
            echo "  ";
            if ((isset($context["items"]) ? $context["items"] : null)) {
                // line 32
                echo "    ";
                if (((isset($context["menu_level"]) ? $context["menu_level"] : null) == 0)) {
                    // line 33
                    echo "      ";
                    // line 34
                    $context["menu_classes"] = array(0 => "menu", 1 => "menu--book-tree", 2 => "odd", 3 => "menu-level-1");
                    // line 41
                    echo "      <ul";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["menu_classes"]) ? $context["menu_classes"] : null)), "method"), "html", null, true));
                    echo ">
    ";
                } else {
                    // line 43
                    echo "      <ul class=\"menu ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), (isset($context["menu_level"]) ? $context["menu_level"] : null)), "html", null, true));
                    echo " ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, ("menu-level-" . ((isset($context["menu_level"]) ? $context["menu_level"] : null) + 1)), "html", null, true));
                    echo "\">
    ";
                }
                // line 45
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 46
                    echo "      ";
                    // line 47
                    $context["classes"] = array(0 => "menu__item", 1 => (($this->getAttribute(                    // line 49
$context["item"], "is_expanded", array())) ? ("menu__item--expanded") : ("")), 2 => (($this->getAttribute(                    // line 50
$context["item"], "is_collapsed", array())) ? ("menu__item--collapsed") : ("")), 3 => (($this->getAttribute(                    // line 51
$context["item"], "in_active_trail", array())) ? ("menu__item--active-trail") : ("")), 4 => ("menu-title-" . \Drupal\Component\Utility\Html::getClass($this->env->getExtension('drupal_core')->renderVar($this->getAttribute(                    // line 52
$context["item"], "title", array())))));
                    // line 55
                    echo "      <li";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "attributes", array()), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
                    echo ">
        ";
                    // line 56
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->getLink($this->getAttribute($context["item"], "title", array()), $this->getAttribute($context["item"], "url", array())), "html", null, true));
                    echo "
        ";
                    // line 57
                    if ($this->getAttribute($context["item"], "below", array())) {
                        // line 58
                        echo "          ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["book_tree"]->getbook_links($this->getAttribute($context["item"], "below", array()), (isset($context["attributes"]) ? $context["attributes"] : null), ((isset($context["menu_level"]) ? $context["menu_level"] : null) + 1))));
                        echo "
        ";
                    }
                    // line 60
                    echo "      </li>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 62
                echo "    </ul>
  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "themes/custom/multiplanetary/templates/navigation/book-tree.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 62,  126 => 60,  120 => 58,  118 => 57,  114 => 56,  109 => 55,  107 => 52,  106 => 51,  105 => 50,  104 => 49,  103 => 47,  101 => 46,  96 => 45,  88 => 43,  82 => 41,  80 => 34,  78 => 33,  75 => 32,  72 => 31,  69 => 30,  55 => 29,  48 => 27,  45 => 22,  43 => 21,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override to display a book tree.*/
/*  **/
/*  * Returns HTML for a wrapper for a book sub-tree.*/
/*  **/
/*  * Available variables:*/
/*  * - items: A nested list of book items. Each book item contains:*/
/*  *   - attributes: HTML attributes for the book item.*/
/*  *   - below: The book item child items.*/
/*  *   - title: The book link title.*/
/*  *   - url: The book link URL, instance of \Drupal\Core\Url.*/
/*  *   - is_expanded: TRUE if the link has visible children within the current*/
/*  *     book tree.*/
/*  *   - is_collapsed: TRUE if the link has children within the current book tree*/
/*  *     that are not currently visible.*/
/*  *   - in_active_trail: TRUE if the link is in the active trail.*/
/*  *//* */
/* #}*/
/* {% import _self as book_tree %}*/
/* */
/* {#*/
/*   We call a macro which calls itself to render the full tree.*/
/*   @see http://twig.sensiolabs.org/doc/tags/macro.html*/
/* #}*/
/* {{ book_tree.book_links(items, attributes, 0) }}*/
/* */
/* {% macro book_links(items, attributes, menu_level) %}*/
/*   {% import _self as book_tree %}*/
/*   {% if items %}*/
/*     {% if menu_level == 0 %}*/
/*       {%*/
/*         set menu_classes = [*/
/*           'menu',*/
/*           'menu--book-tree',*/
/*           'odd',*/
/*           'menu-level-1',*/
/*         ]*/
/*       %}*/
/*       <ul{{ attributes.addClass(menu_classes) }}>*/
/*     {% else %}*/
/*       <ul class="menu {{ cycle(["odd", "even"], menu_level) }} {{ 'menu-level-' ~ (menu_level + 1) }}">*/
/*     {% endif %}*/
/*     {% for item in items %}*/
/*       {%*/
/*         set classes = [*/
/*           'menu__item',*/
/*           item.is_expanded ? 'menu__item--expanded',*/
/*           item.is_collapsed ? 'menu__item--collapsed',*/
/*           item.in_active_trail ? 'menu__item--active-trail',*/
/*           'menu-title-' ~ item.title|render|clean_class,*/
/*         ]*/
/*       %}*/
/*       <li{{ item.attributes.addClass(classes) }}>*/
/*         {{ link(item.title, item.url) }}*/
/*         {% if item.below %}*/
/*           {{ book_tree.book_links(item.below, attributes, menu_level + 1) }}*/
/*         {% endif %}*/
/*       </li>*/
/*     {% endfor %}*/
/*     </ul>*/
/*   {% endif %}*/
/* {% endmacro %}*/
/* */
