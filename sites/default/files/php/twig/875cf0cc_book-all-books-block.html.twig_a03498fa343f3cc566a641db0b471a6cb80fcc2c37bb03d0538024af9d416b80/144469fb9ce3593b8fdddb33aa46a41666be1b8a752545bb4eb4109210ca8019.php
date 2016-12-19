<?php

/* themes/custom/multiplanetary/templates/navigation/book-all-books-block.html.twig */
class __TwigTemplate_b035588d0b90c0ba13c944b0aba1dd3926a639507ffecbf2aecab65fd02fe97e extends Twig_Template
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
        $tags = array("for" => 18, "trans" => 19);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('for', 'trans'),
                array(),
                array()
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

        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["book_menus"]) ? $context["book_menus"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["book"]) {
            // line 19
            echo "  <nav id=\"book-block-menu-";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["book"], "id", array()), "html", null, true));
            echo "\" class=\"book-block-menu\" role=\"navigation\" aria-label=\"";
            echo t("Book outline for @book.title", array("@book.title" => $this->getAttribute($context["book"], "title", array()), ));
            echo "\">
    ";
            // line 20
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["book"], "menu", array()), "html", null, true));
            echo "
  </nav>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['book'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "themes/custom/multiplanetary/templates/navigation/book-all-books-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 20,  47 => 19,  43 => 18,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for rendering book outlines within a block.*/
/*  **/
/*  * This template is used only when the block is configured to "show block on all*/
/*  * pages", which presents multiple independent books on all pages.*/
/*  **/
/*  * Available variables:*/
/*  * - book_menus: Book outlines.*/
/*  *   - id: The parent book ID.*/
/*  *   - title: The parent book title.*/
/*  *   - menu: The top-level book links.*/
/*  **/
/*  * @see template_preprocess_book_all_books_block()*/
/*  *//* */
/* #}*/
/* {% for book in book_menus %}*/
/*   <nav id="book-block-menu-{{ book.id }}" class="book-block-menu" role="navigation" aria-label="{% trans %}Book outline for {{ book.title }}{% endtrans %}">*/
/*     {{ book.menu }}*/
/*   </nav>*/
/* {% endfor %}*/
/* */
