<?php

/* index.html.twig */
class __TwigTemplate_5e191e5f61fef5ecc7a8512bf0157b71a96778b203bbf99a54fd39ce51988213 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "index.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["active"] = "homepage";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    <div class=\"jumbotron\">
        <h1>
            Merhaba <br>
\t\t\tTicket Sistemine hoşgeldiniz
            ";
        // line 10
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 11
            echo "                ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "security", array()), "token", array()), "username", array()), "html", null, true);
            echo "
            ";
        }
        // line 13
        echo "        </h1>
        <p>
            ";
        // line 15
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 16
            echo "                Giriş yaptınız.
                <a href=\"";
            // line 17
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\" class=\"btn btn-primary btn-lg\" role=\"button\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Logout"), "html", null, true);
            echo "</a>
            ";
        } else {
            // line 19
            echo "                Giriş yapılmamıştır. Lütfen <a href=\"";
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("connect"), "html", null, true);
            echo "</a>
            ";
        }
        // line 21
        echo "        </p>
    </div>
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 21,  64 => 19,  57 => 17,  54 => 16,  52 => 15,  48 => 13,  42 => 11,  40 => 10,  34 => 6,  31 => 5,  27 => 1,  25 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.html.twig' %}*/
/* */
/* {% set active = 'homepage' %}*/
/* */
/* {% block content %}*/
/*     <div class="jumbotron">*/
/*         <h1>*/
/*             Merhaba <br>*/
/* 			Ticket Sistemine hoşgeldiniz*/
/*             {% if is_granted('ROLE_USER') %}*/
/*                 {{ app.security.token.username }}*/
/*             {% endif %}*/
/*         </h1>*/
/*         <p>*/
/*             {% if is_granted('ROLE_USER') %}*/
/*                 Giriş yaptınız.*/
/*                 <a href="{{ path('logout') }}" class="btn btn-primary btn-lg" role="button">{{ 'Logout'|trans }}</a>*/
/*             {% else %}*/
/*                 Giriş yapılmamıştır. Lütfen <a href="{{ path('login') }}">{{ 'connect'|trans }}</a>*/
/*             {% endif %}*/
/*         </p>*/
/*     </div>*/
/* {% endblock %}*/
/* */
