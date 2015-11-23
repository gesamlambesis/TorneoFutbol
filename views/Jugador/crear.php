<!--<?php

  
  session_start();

 // $fecha_modificacion = date('d-m-Y h:i:s', time());

  if (!isset($_SESSION["ultima_entrada"])) {
    $_SESSION["ultima_entrada"] = 1;
  } else {
    $_SESSION["ultima_entrada"]++;
  }

 ?>-->

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
    <h1 class="well">Registro Jugador</h1>
  <div class="col-lg-12 well">
  <div class="row">
        <form role="form" class="form" id="form1" method="POST" action="">                
             

                <div class="col-sm-12">
            <div class="row">

             <div class="col-sm-6  form-group <?php if (isset($this->errores['nombre_jugador'])) echo 'has-error' ; ?>">
                    <label for="nombre_jugador">Nombre Jugador:</label>

                    <input type="text" required autofocus class="form-control" name="nombre_jugador" id="nombre_jugador" value="" placeholder="Nombre del Jugador..." min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['nombre_jugador'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['nombre_jugador'];?></span><?php endif;?>

                </div>      
            
            </div>  

            <div class="form-group <?php if (isset($this->errores['apellidos'])) echo 'has-error' ; ?>">
                    <label for="apellidos">Apellidos:</label>

                    <input type="text" required class="form-control"  value="" name="apellidos" id="apellidos" placeholder="Apellidos..." min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['apellidos'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['apellidos'];?></span><?php endif;?>

                </div>  


           


            <div class="row">

              <div class="col-sm-4 form-group <?php if (isset($this->errores['direccion'])) echo 'has-error' ; ?>">
                    <label for="direccion">Direccion:</label>

                    <input type="text" required class="form-control"  value="" name="direccion" id="direccion" placeholder="Direccion..." min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['direccion'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['Direccion'];?></span><?php endif;?>

                </div>    
                
               
              </div>  

              <div class="row">

              <div class="col-sm-6  form-group <?php if (isset($this->errores['telefono'])) echo 'has-error' ; ?>">
                    <label for="telefono">Telefono:</label>

                    <input type="text" required class="form-control"  value="" name="telefono" id="telefono" placeholder="Introduzca numero telefónico..." min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['telefono'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['telefono'];?></span><?php endif;?>

                </div>

              

            </div>

            <div class="row">
                <div class="col-sm-6 form-group <?php if (isset($this->errores['fecha_nacimiento'])) echo 'has-error' ; ?>">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>

                    <input type="text" required class="form-control"  value="" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de Nacimiento..." min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['fecha_nacimiento'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['fecha_nacimiento'];?></span><?php endif;?>

                </div> 
            </div>

            <div class="row">
                <div class="col-sm-6 form-group <?php if (isset($this->errores['num_dorsal'])) echo 'has-error' ; ?>">
                    <label for="num_dorsal">Número del dorsal:</label>

                    <input type="text" required class="form-control"  value="" name="num_dorsal" id="num_dorsal" placeholder="Número Dorsal..." min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['num_dorsal'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['num_dorsal'];?></span><?php endif;?>

                </div> 
            </div>


            <div class="row" >
              

              <div class="form-group">
              
              <div class="col-md-4">

                  
                  <label for="equipo">Equipo:</label>
               <select id="equipo" name="equipo" class="form-control">
                <option value="">-- Seleccione un Equipo --</option>
                

              <?php $datos = $this->getDatos(); 

              foreach ($datos as $key => $equipo):?>                 
                 <?php echo $equipo->nombre_equipo;
                 echo "<option value=".$equipo->id_equipo.">".$equipo->nombre_equipo."</option>";
                 ?>                
                <?php endforeach; ?>
                 
                   </select>


                  </div>

  

                </div>

            

            </div>

            
            <button  name="enviarDatos" id="sendBtn" type="submit" class="btn btn-lg btn-info button_padding"><span class="glyphicon glyphicon-plus"></span>Guardar</button>
             
  
               
             
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