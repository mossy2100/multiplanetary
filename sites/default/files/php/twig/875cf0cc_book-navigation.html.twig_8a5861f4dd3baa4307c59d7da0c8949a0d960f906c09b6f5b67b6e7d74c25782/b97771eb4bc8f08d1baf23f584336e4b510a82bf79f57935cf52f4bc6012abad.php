<?php

/* themes/custom/multiplanetary/templates/navigation/book-navigation.html.twig */
class __TwigTemplate_f65f4a158667cceab3abe34c0f862f740792821b736da464773052138bac215e extends Twig_Template
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
        $tags = array("if" => 31);
        $filters = array("t" => 35);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
                array('t'),
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

        // line 31
        if (((isset($context["tree"]) ? $context["tree"] : null) || (isset($context["has_links"]) ? $context["has_links"] : null))) {
            // line 32
            echo "  <nav id=\"book-navigation-";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["book_id"]) ? $context["book_id"] : null), "html", null, true));
            echo "\" class=\"book-navigation";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((((isset($context["tree"]) ? $context["tree"] : null)) ? (" has-tree") : (""))));
            echo "\" role=\"navigation\" aria-labelledby=\"book-label-";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["book_id"]) ? $context["book_id"] : null), "html", null, true));
            echo "\">
    ";
            // line 33
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["tree"]) ? $context["tree"] : null), "html", null, true));
            echo "
    ";
            // line 34
            if ((isset($context["has_links"]) ? $context["has_links"] : null)) {
                // line 35
                echo "      <h2 class=\"visually-hidden\" id=\"book-label-";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["book_id"]) ? $context["book_id"] : null), "html", null, true));
                echo "\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Book traversal links for")));
                echo " ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["book_title"]) ? $context["book_title"] : null), "html", null, true));
                echo "</h2>
      <ul class=\"book-pager\">
      ";
                // line 37
                if ((isset($context["prev_url"]) ? $context["prev_url"] : null)) {
                    // line 38
                    echo "        <li class=\"book-pager__item book-pager__previous\">
          <a href=\"";
                    // line 39
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["prev_url"]) ? $context["prev_url"] : null), "html", null, true));
                    echo "\" class=\"book-pager__link\" rel=\"prev\" title=\"";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Go to previous page")));
                    echo "\">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["prev_title"]) ? $context["prev_title"] : null), "html", null, true));
                    echo "</a>
        </li>
      ";
                }
                // line 42
                echo "      ";
                if ((isset($context["parent_url"]) ? $context["parent_url"] : null)) {
                    // line 43
                    echo "        <li class=\"book-pager__item book-pager__up\">
          <a href=\"";
                    // line 44
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["parent_url"]) ? $context["parent_url"] : null), "html", null, true));
                    echo "\" class=\"book-pager__link\" title=\"";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Go to parent page")));
                    echo "\">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Up")));
                    echo "</a>
        </li>
      ";
                }
                // line 47
                echo "      ";
                if ((isset($context["next_url"]) ? $context["next_url"] : null)) {
                    // line 48
                    echo "        <li class=\"book-pager__item book-pager__next\">
          <a href=\"";
                    // line 49
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["next_url"]) ? $context["next_url"] : null), "html", null, true));
                    echo "\" class=\"book-pager__link\" rel=\"next\" title=\"";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Go to next page")));
                    echo "\">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["next_title"]) ? $context["next_title"] : null), "html", null, true));
                    echo "</a>
        </li>
      ";
                }
                // line 52
                echo "    </ul>
    ";
            }
            // line 54
            echo "  </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/multiplanetary/templates/navigation/book-navigation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 54,  117 => 52,  107 => 49,  104 => 48,  101 => 47,  91 => 44,  88 => 43,  85 => 42,  75 => 39,  72 => 38,  70 => 37,  60 => 35,  58 => 34,  54 => 33,  45 => 32,  43 => 31,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override to navigate books.*/
/*  **/
/*  * Presented under nodes that are a part of book outlines.*/
/*  **/
/*  * Available variables:*/
/*  * - tree: The immediate children of the current node rendered as an unordered*/
/*  *   list.*/
/*  * - current_depth: Depth of the current node within the book outline. Provided*/
/*  *   for context.*/
/*  * - prev_url: URL to the previous node.*/
/*  * - prev_title: Title of the previous node.*/
/*  * - parent_url: URL to the parent node.*/
/*  * - parent_title: Title of the parent node. Not printed by default. Provided*/
/*  *   as an option.*/
/*  * - next_url: URL to the next node.*/
/*  * - next_title: Title of the next node.*/
/*  * - has_links: Flags TRUE whenever the previous, parent or next data has a*/
/*  *   value.*/
/*  * - book_id: The book ID of the current outline being viewed. Same as the node*/
/*  *   ID containing the entire outline. Provided for context.*/
/*  * - book_url: The book/node URL of the current outline being viewed. Provided*/
/*  *   as an option. Not used by default.*/
/*  * - book_title: The book/node title of the current outline being viewed.*/
/*  **/
/*  * @see template_preprocess_book_navigation()*/
/*  *//* */
/* #}*/
/* {% if tree or has_links %}*/
/*   <nav id="book-navigation-{{ book_id }}" class="book-navigation{{ tree ? ' has-tree' : ''}}" role="navigation" aria-labelledby="book-label-{{ book_id }}">*/
/*     {{ tree }}*/
/*     {% if has_links %}*/
/*       <h2 class="visually-hidden" id="book-label-{{ book_id }}">{{ 'Book traversal links for'|t }} {{ book_title }}</h2>*/
/*       <ul class="book-pager">*/
/*       {% if prev_url %}*/
/*         <li class="book-pager__item book-pager__previous">*/
/*           <a href="{{ prev_url }}" class="book-pager__link" rel="prev" title="{{ 'Go to previous page'|t }}">{{ prev_title }}</a>*/
/*         </li>*/
/*       {% endif %}*/
/*       {% if parent_url %}*/
/*         <li class="book-pager__item book-pager__up">*/
/*           <a href="{{ parent_url }}" class="book-pager__link" title="{{ 'Go to parent page'|t }}">{{ 'Up'|t }}</a>*/
/*         </li>*/
/*       {% endif %}*/
/*       {% if next_url %}*/
/*         <li class="book-pager__item book-pager__next">*/
/*           <a href="{{ next_url }}" class="book-pager__link" rel="next" title="{{ 'Go to next page'|t }}">{{ next_title }}</a>*/
/*         </li>*/
/*       {% endif %}*/
/*     </ul>*/
/*     {% endif %}*/
/*   </nav>*/
/* {% endif %}*/
/* */
