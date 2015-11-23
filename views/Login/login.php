<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Inicio</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		

     <link href="<?php echo URL_BASE."/public/css/bootstrap.min.css";?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE."/public/css/estilos.css";?>"> 
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
  <div class="modal-content div_class">
      <div class="modal-header div_class">
         
         <img class="img_class" src="<?php echo URL_IMAGENES?>/balon.png" width="70px" heigth="70px">

          <h1 class="text-center color_login">Login</h1>
      </div>
      <div class="modal-body">
          <form action="action_page.php" class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Usuario">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Contraseña">
            </div>
            <div class="form-group">
              <div class="checkbox">
    <label for="checkboxes-0"><input class="color_login" name="checkboxes" id="checkboxes-0" value="1" type="checkbox">   <p class="text-center color_login">Recordar contraseña</p></label>
  </div>
             
              <a href="<?php echo URL_INDEX?>"><button type="button" href="#" class="btn btn-default btn-lg btn-block">Iniciar Sesion</button></a>
              
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
	

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="<?php echo URL_BASE."/public/js/bootstrap.min.js";?>"></script>
	</body>
</html>