

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Index</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">-->
      <link href="<?php echo URL_BASE."/public/css/bootstrap.min.css";?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE."/public/css/estilos.css";?>"> 
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="css/styles.css" rel="stylesheet">
  </head>
  <body>

<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-inverse navbar-static-top">
      
        <div class="navbar-header">
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
        <a class="navbar-brand" href="">Inicio</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
           
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jugadores <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo URL_BASE?>/index.php/Jugador/crear">Registro de jugadores</a></li>
                <li><a href="<?php echo URL_BASE?>/index.php/Jugador/listar">Lista de Jugadores</a></li>
                
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Equipos <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo URL_BASE?>/index.php/Equipo/crear">Registro de Equipos</a></li>
                <li><a href="<?php echo URL_BASE?>/index.php/Equipo/listar">Lista de Equipos</a></li>
                
              </ul>
            </li>

             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Juegos <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo URL_BASE?>/index.php/Partido/crear">Registro de Juegos</a></li>
                <li><a href="<?php echo URL_BASE?>/index.php/Partido/listar">Lista de Juegos</a></li>
                
              </ul>
            </li>



          </ul>
           <a class="navbar-brand" href="<?php echo URL_LOGIN ?>">Cerrar Sesión</a>
           
            <?php
               $visit = $_COOKIE['lastVisit'];
               $timeframe = 90 * 60 * 24 * 60 + time();
              setcookie('lastVisit', date("G:i - m/d/y"), $timeframe);
              if(isset($_COOKIE['lastVisit']))
              $visit = $_COOKIE['lastVisit'];
              else
              echo "Welcome to out web page!";
              echo "Último acceso: ". $visit;
                                                ?>

     
        </div>

    </div>

  </div><!-- /container -->




</div><!-- /navbar wrapper -->


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo URL_IMAGENES?>/chivas.jpg" style="width:100%" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
         
        </div>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo URL_IMAGENES?>/barsa.jpg" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
         
        </div>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo URL_IMAGENES?>/tri.jpg" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          
        </div>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
  </a>  
</div>
<!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->
 <br>

 

<div class="container marketing">

  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="col-md-4 text-center">
      <img class="img-circle" src="<?php echo URL_IMAGENES?>/messi1.jpg">
      <h2>Lionel Messi</h2>
      <p>Pertenece al F.C Barcelona y lleva
        más de 25 goles en la liga</p>
     
    </div>
    <div class="col-md-4 text-center">
      <img class="img-circle" src="<?php echo URL_IMAGENES?>/cristiano.jpeg">
      <h2>Cristiano Ronaldo</h2>
      <p>Juega para el Madrid y lleva más de
        25 goles en la liga</p>
     
    </div>
    <div class="col-md-4 text-center">
      <img class="img-circle" src="<?php echo URL_IMAGENES?>/neymar.jpg">
      <h2>Neymar Jr</h2>
      <p>Pertenece al F.C Barcelona y lleva
        más de 20 goles en la liga</p>
     
    </div>
  </div><!-- /.row -->


  <!-- START THE FEATURETTES -->

  <section class="main">
     <section class="articles">

<hr class="featurette-divider">

  <div >
  <!--  <img class="featurette-image img-circle pull-right" src="http://placehold.it/512">-->
  <h2 class="featurette-heading">Percance</h2>
    <p class="lead">Al término del partido hubo
      una pequeña riña porque el arbitro no
      marcó un penal</p>
  <img src="<?php echo URL_IMAGENES ?>/porra.jpg"  heigth="400" width="600">
    
  </div>

  <hr class="featurette-divider">

  <div >
   <!-- <img class="featurette-image img-circle pull-left" src="http://placehold.it/512">-->
    <h2 class="featurette-heading">Mosaico </h2>
    <p class="lead">La afición del F.C Barcelona
      organizó un mosaico con el mensaje
     We are ready</p>
      <img src="<?php echo URL_IMAGENES?>/mosaico.jpg" heigth="400" width="600">
  </div>

  <hr class="featurette-divider">

  <div >
   <!-- <img class="featurette-image img-circle pull-right" src="http://placehold.it/512">-->
    <h2 class="featurette-heading">Invaden cancha aficionados</h2>
    <p class="lead">Los aficionados del Atlas
      gracias a la frustración decidieron invadir
      la cancha del estadio Jalisco.</p>
       <img src="<?php echo URL_IMAGENES?>/cancha.jpg" heigth="400" width="600">
  </div>

  <hr class="featurette-divider">


 
     </section>

     <br>
     <br>
     <br>
     <br>
     <br>
    <aside>

<h2> Tabla General</h2>
  <img src="<?php echo URL_IMAGENES?>/tabla.jpg"  heigth="200" width="400">

  </aside>



   </section>

  
  <!-- /END THE FEATURETTES -->



  

</div><!-- /.container -->
  <!-- script references -->

  <!-- FOOTER -->
  <footer>
    </p>
     <p class="footer">Torneo Interno de Fútbol Soccer Mantense</p>
     <p class="footer">Instituto Tecnológico Superior De El Mante</p>
     <p class="footer"> <a href="">torneo_tecmante@gmail.com</a></p>
     <p class="footer">Ciudad Mante México 2015.</p>
  <p class="pull-right"><a href="#">Back to top</a>
   
   
  </footer>

    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="<?php echo URL_BASE."/public/js/bootstrap.min.js";?>"></script>
  </body>
</html>