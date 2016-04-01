<?php

/* login.html.twig */
class __TwigTemplate_530a12df00c494bd6a5821785588b8bc583070c8ef41f0ffa9cd064d51d8835e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "login.html.twig", 1);
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
        $context["active"] = "account";
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    <h1>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Login"), "html", null, true);
        echo "</h1>

    ";
        // line 9
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 10
            echo "        <div class=\"alert alert-danger\">
            ";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "
        </div>
        <div class=\"alert alert-info\">
            <strong>Hint:</strong> Try <code>alice</code>/<code>password</code>
        </div>

    ";
        }
        // line 18
        echo "
    <form action=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"POST\">
      <div class=\"form-group\">
        <label for=\"username\">Username</label>
        <input type=\"text\" class=\"form-control\" id=\"username\" placeholder=\"Username\" name=\"_username\">
      </div>
      <div class=\"form-group\">
        <label for=\"password\">Password</label>
        <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Password\" name=\"_password\">
      </div>
      <button type=\"submit\" class=\"btn btn-default\">Submit</button>
    </form>

";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 19,  57 => 18,  47 => 11,  44 => 10,  42 => 9,  37 => 7,  34 => 6,  31 => 5,  27 => 1,  25 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.html.twig' %}*/
/* */
/* {% set active = 'account' %}*/
/* */
/* {% block content %}*/
/* */
/*     <h1>{{ 'Login'|trans }}</h1>*/
/* */
/*     {% if error %}*/
/*         <div class="alert alert-danger">*/
/*             {{ error.message }}*/
/*         </div>*/
/*         <div class="alert alert-info">*/
/*             <strong>Hint:</strong> Try <code>alice</code>/<code>password</code>*/
/*         </div>*/
/* */
/*     {% endif %}*/
/* */
/*     <form action="{{ path('login_check') }}" method="POST">*/
/*       <div class="form-group">*/
/*         <label for="username">Username</label>*/
/*         <input type="text" class="form-control" id="username" placeholder="Username" name="_username">*/
/*       </div>*/
/*       <div class="form-group">*/
/*         <label for="password">Password</label>*/
/*         <input type="password" class="form-control" id="password" placeholder="Password" name="_password">*/
/*       </div>*/
/*       <button type="submit" class="btn btn-default">Submit</button>*/
/*     </form>*/
/* */
/* {% endblock %}*/
/* */
