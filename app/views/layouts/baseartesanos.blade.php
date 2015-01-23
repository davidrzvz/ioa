<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <title> @yield('titulo') </title>
<!--<link rel="stylesheet" href="../css/jquery.jqzoom.css" type="text/css">-->
    <meta http-equiv="Content-Type">
    {{HTML::style('css/bootstrap.css')}}
    {{HTML::style('css/style.css')}}
    {{HTML::style('css/bootstrap-theme.css')}}
    {{HTML::style('font-awesome/css/font-awesome.css');  }}
    {{HTML::script('js/jquery-1.11.1.js');}}
    {{HTML::script('js/bootstrap.js');}}
    {{HTML::script('js/moment.js');}}
    {{HTML::script('js/bootstrap-datetimepicker.js');}}
    {{HTML::script('js/bootstrap-datetimepicker.es.js');}}
    {{HTML::style('css/bootstrap-datetimepicker.min.css');}}
    {{HTML::script('js/sweet-alert.js');}}
    {{HTML::style('css/sweet-alert.css');}}
    <!-- Añadí estos -->
    {{  HTML::script('js/chart/morris.min.js')}}
    {{  HTML::script('js/chart/raphael-min.js')}}
    {{  HTML::script('js/tables/jquery.dataTables.min.js')}}
    {{  HTML::script('js/dataTables.tableTools.min.js')}}
    {{  HTML::style('css/jquery.dataTables.css')}}
    {{  HTML::style('css/dataTables.tableTools.css')}}
    <!-- Dave -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blog windows chrome ch" data-twttr-rendered="true" style="">﻿﻿
    

<div id="wrapper" class="hfeed">
    <div id="header">
        
        <div id="branding">
            
            
        </div><!--  #branding -->
        <div id="access">
          
            <div class="menu">
                <ul id="menu-menu-1" class="sf-menu sf-js-enabled sf-shadow">
                    <li id="menu-item-48096" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-48096">
                        <a href="inicio" class="sf-with-ul">INICIO<span class="sf-sub-indicator"></span></a>
                    </li>
                    <li id="menu-item-48155" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-48155">
                        <a href="artesano" class="sf-with-ul">REGISTRO<span class="sf-sub-indicator"></span></a>
                    </li>
                    <li id="menu-item-48164" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-48164">
                        <a href="taller" class="sf-with-ul">TALLERES<span class="sf-sub-indicator"> »</span></a>
                    </li>
                    <li id="menu-item-48175" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-48175">
                        <a href="concurso" class="sf-with-ul">CONCURSOS<span class="sf-sub-indicator"> »</span></a>
                    </li>
                    <li id="menu-item-49489" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-49489">
                        <a href="feria">FERIAS<span class="sf-sub-indicator"> »</span></a>
                    </li>
                    <li id="menu-item-48188" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-48188">
                        <a href="organizacion" class="smcf-link sf-with-ul">REPORTES<span class="sf-sub-indicator"> »</span></a>
                    </li>
                </ul>
            </div>
            <div class="izquierda">
                
                
            </div>
        </div><!-- #access -->
    </div><!-- #header-->
</div>
<div class="content">
    @yield('contenido')
      
      
    </div>

</body>
@yield('scripts')
</html>