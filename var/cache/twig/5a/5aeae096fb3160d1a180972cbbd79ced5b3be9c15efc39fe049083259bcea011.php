<?php

/* layout.html.twig */
class __TwigTemplate_64c016477760b898c6b746cfa8fb11d53fe8ce78df5f1bb2a6d0678d9730ad2e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Homepage"), "html", null, true);
        echo "</title>

    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), array("vendor/bootstrap/css/bootstrap.min.css")), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t<link href=\"";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), array("css/style.css")), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
  </head>
  <body>
    <nav class=\"navbar navbar-default\">
      <div class=\"container-fluid\">
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getUrl("homepage");
        echo "\">Ticket Sistemi</a>
          </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
          <ul class=\"nav navbar-nav\">
            <li ";
        // line 31
        if (("homepage" == (isset($context["active"]) ? $context["active"] : $this->getContext($context, "active")))) {
            echo "class=\"active\"";
        }
        echo "><a href=\"";
        echo $this->env->getExtension('routing')->getUrl("homepage");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Homepage"), "html", null, true);
        echo "</a></li>
            <li ";
        // line 32
        if (("form" == (isset($context["active"]) ? $context["active"] : $this->getContext($context, "active")))) {
            echo "class=\"active\"";
        }
        echo "><a href=\"";
        echo $this->env->getExtension('routing')->getUrl("form");
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Ticket"), "html", null, true);
        echo "</a></li>
            <li class=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Hesaplar <span class=\"caret\"></span></a>
              <ul class=\"dropdown-menu\">
                ";
        // line 36
        if ($this->env->getExtension('security')->isGranted("ROLE_USER")) {
            // line 37
            echo "                  <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\">Çıkış</a></li>
                ";
        } else {
            // line 39
            echo "                  <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\">Giriş</a></li>
                  <li><a href=\"#\">Kayıt</a></li>
                ";
        }
        // line 42
        echo "              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class=\"container\">
      ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => "info", 1 => "success", 2 => "warning", 3 => "danger"));
        foreach ($context['_seq'] as $context["_key"] => $context["alert"]) {
            // line 51
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "getFlashBag", array()), "get", array(0 => $context["alert"]), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 52
                echo "              <div class=\"alert alert-";
                echo twig_escape_filter($this->env, $context["alert"], "html", null, true);
                echo " alert-dismissible\" role=\"alert\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                ";
                // line 54
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["message"]), "html", null, true);
                echo "
              </div>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['alert'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "      ";
        $this->displayBlock('content', $context, $blocks);
        // line 59
        echo "
      <footer>
        &nbsp;
      </footer>
    </div>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
    <script src=\"";
        // line 65
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset')->getCallable(), array("vendor/bootstrap/js/bootstrap.min.js")), "html", null, true);
        echo "\"></script>
  </body>
</html>
";
    }

    // line 58
    public function block_content($context, array $blocks = array())
    {
        echo "";
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 58,  153 => 65,  145 => 59,  142 => 58,  136 => 57,  127 => 54,  121 => 52,  116 => 51,  112 => 50,  102 => 42,  95 => 39,  89 => 37,  87 => 36,  74 => 32,  64 => 31,  56 => 26,  37 => 10,  33 => 9,  28 => 7,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/*   <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*     <title>{{ 'Homepage'|trans }}</title>*/
/* */
/*     <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">*/
/* 	<link href="{{ asset('css/style.css') }}" rel="stylesheet">*/
/*     <!--[if lt IE 9]>*/
/*       <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>*/
/*       <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>*/
/*     <![endif]-->*/
/*   </head>*/
/*   <body>*/
/*     <nav class="navbar navbar-default">*/
/*       <div class="container-fluid">*/
/*         <div class="navbar-header">*/
/*           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">*/
/*             <span class="sr-only">Toggle navigation</span>*/
/*             <span class="icon-bar"></span>*/
/*             <span class="icon-bar"></span>*/
/*             <span class="icon-bar"></span>*/
/*           </button>*/
/*           <a class="navbar-brand" href="{{ url('homepage') }}">Ticket Sistemi</a>*/
/*           </div>*/
/*         <!-- Collect the nav links, forms, and other content for toggling -->*/
/*         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">*/
/*           <ul class="nav navbar-nav">*/
/*             <li {% if 'homepage' == active %}class="active"{% endif %}><a href="{{ url('homepage') }}">{{ 'Homepage'|trans }}</a></li>*/
/*             <li {% if 'form' == active %}class="active"{% endif %}><a href="{{ url('form') }}">{{ 'Ticket'|trans }}</a></li>*/
/*             <li class="dropdown">*/
/*               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hesaplar <span class="caret"></span></a>*/
/*               <ul class="dropdown-menu">*/
/*                 {% if is_granted('ROLE_USER') %}*/
/*                   <li><a href="{{ path('logout') }}">Çıkış</a></li>*/
/*                 {% else %}*/
/*                   <li><a href="{{ path('login') }}">Giriş</a></li>*/
/*                   <li><a href="#">Kayıt</a></li>*/
/*                 {% endif %}*/
/*               </ul>*/
/*             </li>*/
/*           </ul>*/
/*         </div>*/
/*       </div>*/
/*     </nav>*/
/* */
/*     <div class="container">*/
/*       {% for alert in [ 'info', 'success', 'warning', 'danger'] %}*/
/*           {% for message in app.session.getFlashBag.get(alert) %}*/
/*               <div class="alert alert-{{ alert }} alert-dismissible" role="alert">*/
/*                 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>*/
/*                 {{ message|trans }}*/
/*               </div>*/
/*           {% endfor %}*/
/*       {% endfor %}*/
/*       {% block content '' %}*/
/* */
/*       <footer>*/
/*         &nbsp;*/
/*       </footer>*/
/*     </div>*/
/*     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>*/
/*     <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>*/
/*   </body>*/
/* </html>*/
/* */
