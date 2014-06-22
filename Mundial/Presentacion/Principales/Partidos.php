<!DOCTYPE html>
<!--
*************************************
Template designed by Austin Gregory of
AwfulMedia.com. Before using or modifying this file
please read the included license
*************************************
Date: 6/7/2012
Author: Austin Gregory
Website: AwfulMedia.com
*************************************
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>APUESTA MUNDIAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../../../css/bootstrap.css" rel="stylesheet">
    <link href="../../../css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../../../ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../ico/apple-touch-icon-57-precomposed.png">
  <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="../../../js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="../../../css/jquery.dataTables.css" />
<script type="text/javascript" src="../../../js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
  $('#example').dataTable( {
    "order": [[ 1, "desc" ]]
  } );
} );

  </script>
  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="../../../engine1/style.css" />
  <script type="text/javascript" src="../../../engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
  </head>

  <body>

   <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php"></a>
          <div class="nav-collapse">
            <ul class="nav pull-right">
            <li ><a href="../../../index.html">Home</a></li>
            <li><a href="Partidos.php">Partidos</a></li>
            <li><a href="Posiciones.php">Posiciones</a>
            <li><a href="../Administracion/Admin_User.php">Apuestas</a> 
      
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  <div class="container">
  <!--Start Carousel-->
     <div id="myCarousel" class="carousel slide">
            <!-- Start WOWSlider.com BODY section -->
                <div id="wowslider-container1">
                <div class="ws_images">
                    <ul>
                        <li><img src="../../../data1/images/mundialbrasil2014.jpg" alt="Mundial-Brasil-2014" title="Mundial Brasil 2014" id="wows1_0"/></li>
                        <li><img src="../../../data1/images/brazuca.jpg" alt="brazuca" title="brazuca" id="wows1_1"/></li>
                        <li><img src="../../../data1/images/brazucabrasil2014balnoficialfifa.jpg" alt="brazuca-brasil-2014-baln-oficial-fifa" title="brazuca: Balón Oficial" id="wows1_2"/></li>
                        <li><img src="../../../data1/images/datosmundial2014brasil.jpg" alt="datos-mundial-2014-brasil" title="Mundial Brasil 2014" id="wows1_3"/></li>
                        <li><img src="../../../data1/images/easportscopamundialdelafifabrasil2014.jpg" alt="EA-SPORTS-Copa-Mundial-de-la-FIFA-Brasil-2014" title="Mundial Brasil 2014" id="wows1_4"/></li>
                    </ul>
                </div>
                <div class="ws_bullets">
                    <div>
                        <a href="#" title="Mundial Brasil 2014"><img src="../../../data1/tooltips/mundialbrasil2014.jpg" alt="Mundial-Brasil-2014"/>1</a>
                        <a href="#" title="brazuca"><img src="../../../data1/tooltips/brazuca.jpg" alt="brazuca"/>2</a>
                        <a href="#" title="brazuca: Balón oficial"><img src="../../../data1/tooltips/brazucabrasil2014balnoficialfifa.jpg" alt="brazuca-brasil-2014-baln-oficial-fifa"/>3</a>
                        <a href="#" title="Mundial Brasil 2014"><img src="../../../data1/tooltips/datosmundial2014brasil.jpg" alt="datos-mundial-2014-brasil"/>4</a>
                        <a href="#" title="Mundial Brasil 2014"><img src="../../../data1/tooltips/easportscopamundialdelafifabrasil2014.jpg" alt="EA-SPORTS-Copa-Mundial-de-la-FIFA-Brasil-2014"/>5</a>
                    </div>
                </div>
                <!--        <span class="wsl"><a href="http://wowslider.com">html slider</a> by WOWSlider.com v5.4</span>-->
                <div class="ws_shadow"></div>
                </div>
                <script type="text/javascript" src="../../../engine1/wowslider.js"></script>
                <script type="text/javascript" src="../../../engine1/script.js"></script>
                <!-- End WOWSlider.com BODY section -->
          </div>
  <!--End Carousel-->
   <a name="mundial">  <div align="center"> </a><h2>Brasil 2014</h2></br></a></div>
   
  <hr>
      <h1>Partidos</h1>
         <?php
           $ID_torneo= base64_decode(@$_GET['id_torneo']);    
           $ID_jornada=  base64_decode(@$_GET['id_jornada']);
         
          ?>
            
            
        <div class="row" >
        <div class="span4"  style="text-align: center">
            <form method="post" enctype="multipart/form-data">
                                                    <p> 
                                       
                                                  <select id="Torneo" onchange="location.href = this.value">
                                                  <option value="Partidos.php">Seleccione Torneo</option>
                                                   <?php
                                                        require('../../Negocio/Negocio_Torneo.php');
                                                        $objN_Gestionar_Torneo=new Negocio_Torneo();
                                                        $objN_Gestionar_Torneo->Combo_Torneo($ID_torneo);
                                                    ?>
                                                    </select>
                                                   <select id="Jornada"  onchange="location.href = this.value">
                                                    <?php
                                                     require('../../Negocio/Negocio_Jornada.php');
                                                      $objN_Gestionar_Jornada=new Negocio_Jornada();
                                                      $objN_Gestionar_Jornada->Combo_Jornada($ID_torneo,$ID_jornada);
                                                    ?>
                                                    </select>     
                                                      


                                                </p>

                                                </form>
                                                

                                                <?php

                                                    

                                                if($ID_torneo>0 && $ID_jornada>0){
                                                     require('../../Negocio/Negocio_Partidos.php');
                                                        $objN_Gestionar_Partidos=new Negocio_Partidos();
                                                $objN_Gestionar_Partidos->Tabla_Partidos($ID_jornada);
                                              }
                                                ?>



                                                               

                                              </div>
                                              <div class="span4"  style="text-align: center">
                                              </br>
                                              </br>
                                              </br>
                                                 <h2>Equipos</h2>
                                                
                                                  <?php
                                                            require('../../Negocio/Negocio_Equipos.php');
                                                            $objN_Gestionar_Equipos=new Negocio_Equipos();
                                                            $consulta_Combo=$objN_Gestionar_Equipos->Tabla_Equipos_Partidos($ID_torneo);
                                                            
                                                            ?>
            
                                            
                                              </div>
                                              </div>
    <!--Start second row of columns-->
    

      <hr>

    <footer class="row">
     
     
    
      <!--Design by <a href="http:/www.awfulmedia.com">AwfulMedia.com</a>-->
      </p>
    </footer>
    </div><!-- /container -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="../../../js/bootstrap-transition.js"></script>
  <script src="../../../js/bootstrap-carousel.js"></script>
    <script src="../../../js/bootstrap-alert.js"></script>
    <script src="../../../js/bootstrap-modal.js"></script>
  <script src="../../../js/bootstrap-dropdown.js"></script>
    <script src="../../../js/bootstrap-scrollspy.js"></script>
   <script src="../../../js/bootstrap-tab.js"></script>
    <script src="../../../js/bootstrap-tooltip.js"></script>
     <script src="../../../js/bootstrap-popover.js"></script>
    <script src="../../../js/bootstrap-button.js"></script>
    <script src="../../../js/bootstrap-collapse.js"></script>
   <script src="../../../js/bootstrap-typeahead.js"></script>
  <script src="../../../js/jquery-ui-1.8.18.custom.min.js"></script>
  <script src="../../../js/jquery.smooth-scroll.min.js"></script>
  <script src="../../../js/lightbox.js"></script>
    <script>
$('.carousel').carousel({
  interval: 8000
})
</script>
  </body>
</html>
