<!DOCTYPE html>
<html>
    <head>
        <title>Error de Sistema</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Url tracker system"/>
        <meta name="author" content="author@gmail.com"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Fonts-->
        <link rel="stylesheet" type="text/css" href="css?family=Tangerine">

        <!-- Bootstrap -->
        <link href="<?php echo URL_BASE."/public/css/bootstrap.min.css";?>" rel="stylesheet" media="screen">


        <link href="<?php echo URL_BASE."/public/css/errorPage.css";?>" rel="stylesheet" media="screen">

        </head>
    <body>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-icon">
                    <span class="fa fa-4x fa-cogs"></span>
                </div>
                <div class="info">
                    <h4 class="text-center text-uppercase">Error en el sistema</h4>
                    <p class="lead text-center">
                        <?php $errores = libs\View::getGlobalErrors(); foreach ($errores as $error):?>
                            <b><?php echo $error;?></b>
                        <?php endforeach;?>
                    </p>
                    <a href="http://localhost/ProyectoEjemplo/index.php/inventario/crear" class="btn">Volver a inicio</a>
                </div>
            </div>
        </div>
        
        
	</div>
</div>


    </body>
    </html>