<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Inicio</title>
        <meta name="generator" content="Bootply" />
    
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

       
     <!--   <link href="<?php echo URL_BASE."/public/css/bootstrap.min.css";?>" rel="stylesheet" media="screen">
        <link href="<?php echo URL_BASE."/public/css/estilos.css";?>" rel="stylesheet" media="screen">
        <link href="<?php echo URL_BASE."/public/css/styles.css";?>" rel="stylesheet"> -->

      <!--  <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/estilos.css"> -->


       <link href="<?php echo URL_BASE."/public/css/bootstrap.min.css";?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE."/public/css/estilos.css";?>"> 

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
        <a class="navbar-brand" href="<?php echo URL_INDEX?>">Inicio</a>
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
           

     
        </div>

    </div>

  </div><!-- /container -->




</div><!-- /navbar wrapper -->

</br></br></br>
<div class="container">
    <h1 class="well">Registro Partido</h1>
  <div class="col-lg-12 well">
  <div class="row">
        <form role="form" class="form" id="form1" method="POST" action="">                
              <!--  <div class="form-group <?php if (isset($this->errores['nombre_equipo'])) echo 'has-error' ; ?>">
                    <label for="nombre_equipo">Nombre Equipo:</label>

                    <input type="text" required autofocus class="form-control" name="nombre_equipo" id="nombre_equipo" value="1" placeholder="1" min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['nombre_equipo'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['nombre_equipo'];?></span><?php endif;?>

                </div>                
                <div class="form-group <?php if (isset($this->errores['patrocinadores'])) echo 'has-error' ; ?>">
                    <label for="patrocinadores">Patrocinadores:</label>

                    <input type="text" required class="form-control"  value="1" name="patrocinadores" id="patrocinadores" placeholder="1" min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['patrocinadores'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['patrocinadores'];?></span><?php endif;?>

                </div>            

                 <div class="form-group <?php if (isset($this->errores['categoria'])) echo 'has-error' ; ?>">
                    <label for="categoria">Categoria:</label>

                    <input type="text" required class="form-control"  value="1" name="categoria" id="categoria" placeholder="1" min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['categoria'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['categoria'];?></span><?php endif;?>

                </div>                
    

                <div class="form-group <?php if (isset($this->errores['camiseta1'])) echo 'has-error' ; ?>">
                    <label for="camiseta1">Camiseta 1:</label>

                    <input type="text" required class="form-control"  value="1" name="camiseta1" id="camiseta1" placeholder="1" min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['camiseta1'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['camiseta1'];?></span><?php endif;?>

                </div>

                 <div class="form-group <?php if (isset($this->errores['camiseta2'])) echo 'has-error' ; ?>">
                    <label for="camiseta2">Camiseta 2:</label>

                    <input type="text" required class="form-control"  value="1" name="camiseta2" id="camiseta2" placeholder="1" min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['camiseta2'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['camiseta2'];?></span><?php endif;?>

                </div> 
                                            
                <button name="enviarDatos" id="sendBtn" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Enviar</button> -->



                <div class="col-sm-12">
            <div class="row">

             <div class="col-sm-6  form-group <?php if (isset($this->errores['resultado'])) echo 'has-error' ; ?>">
                    <label for="resultado">Resultado:</label>

                    <input type="text" required autofocus class="form-control" name="resultado" id="resultado" value="" placeholder="resultado..." min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['resultado'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['resultado'];?></span><?php endif;?>

                </div>      
            
            </div>  

            <div class="form-group <?php if (isset($this->errores['estadio'])) echo 'has-error' ; ?>">
                    <label for="estadio">Estadio:</label>

                    <input type="text" required class="form-control"  value="" name="estadio" id="estadio" placeholder="Estadio..." min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['estadio'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['estadio'];?></span><?php endif;?>

                </div>    

            <div class="row">

                    <div class="col-sm-4 form-group <?php if (isset($this->errores['arbitro'])) echo 'has-error' ; ?>">
                    <label for="arbitro">Arbitro:</label>

                    <input type="text" required class="form-control"  value="" name="arbitro" id="arbitro" placeholder="Arbitro..." min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['arbitro'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['arbitro'];?></span><?php endif;?>

                </div>    
               
              </div>  

              <div class="row">
                
                  <div class="col-sm-4 form-group <?php if (isset($this->errores['incidencia'])) echo 'has-error' ; ?>">
                    <label for="incidencia">Incidencia:</label>
                
              

                      <textarea rows="4" cols="50" placeholder=" Describa la incidencia..." id="incidencia" step="1" name="incidencia" id="incidencia"></textarea>
                       <?php if(isset($this->errores['incidencia'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['incidencia'];?></span><?php endif;?>
                </div>    
               
              </div>  

               <button  name="enviarDatos" id="sendBtn" type="submit" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-plus"></span>Guardar</button>

              </div>


            
             

              

             
            </div>
                       
          


                    
                </form>
        </div>
  </div>
  </div>
    <!-- script references -->
        
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="<?php echo URL_BASE."/public/js/bootstrap.min.js";?>"></script>

   
    </body>
</html>