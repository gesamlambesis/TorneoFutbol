<!DOCTYPE html>
<html>
    <head>
        <title>LISTADO DE JUGADORES</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Url tracker system"/>
        <meta name="author" content="author@gmail.com"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Fonts-->
        <link rel="stylesheet" type="text/css" href="css?family=Tangerine">

        <!-- Bootstrap -->
        <link href="<?php echo URL_BASE."/public/css/bootstrap.min.css";?>" rel="stylesheet" media="screen">
        <link href="<?php echo URL_BASE."/public/css/custom.css";?>" rel="stylesheet" media="screen">

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
        <a class="navbar-brand" href="#">Inicio</a>
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

  

<div class="container">

<h3 class="text-center"> Lista de Jugadores</h3>
 <hr>

  <div class="row">
    
        
        <div class="col-md-12">
        
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   
                   <th>Resultados</th>
                    <th>Estadio</th>
                     <th>Arbitro</th>
                     <th>Incidencia</th>
                     
                      <th>Editar</th>                      
                       <th>Eliminar</th>
                   </thead>
   <tbody>
                 <?php $datos = $this->getDatos(); foreach ($datos as $key => $partido):?>
                 <tr>
                 <td><?php echo $partido->resultados;?></td>
                 <td><?php echo $partido->estadio;?></td>
                 <td><?php echo $partido->arbitro;?></td>
                 <td><?php echo $partido->incidencia;?></td>
                 <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs prueba" data-title="Edit" data-toggle="modal" value="<?php echo $partido->id_partido;?>" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs prueba1" data-title="Delete" data-toggle="modal" value="<?php echo $partido->id_partido;?>" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
        
</table>


                
            </div>
            
        </div>
  </div>
</div>


 <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <!--<h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>-->
                          </div>
                          <div class="modal-body" id="modal-edit">
                            <div class="form-group">
                              <!--<input class="form-control " type="text" placeholder="<?php //echo $proveedor->rfc;?>">-->
                            </div>
                            <div class="form-group">
                              
                              <input class="form-control " type="text" placeholder="Irshad">
                            </div>
                            <div class="form-group">
                              <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
                              
                              
                            </div>
                          </div>
                          <!--<div class="modal-footer ">-->
                          <!--<button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>-->
                          <!--</div>-->
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    
                    
                    
                    <!--<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                          </div>
                          <div class="modal-body">
                            
                            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                            
                          </div>
                          <div class="modal-footer ">
                            <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                          </div>
                        </div>
                        /.modal-content 
                      </div>
                      /.modal-dialog 
                    </div>-->
                    <!-- /. ROW  -->
                    
                    <!-- /. PAGE INNER  -->
                  </div>
                  <!-- /. PAGE WRAPPER  -->
                </div>






















    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" scr="<?php echo URL_BASE."/public/js/bootstrap.min.js";?>" ></script>
    <script type="text/javascript" scr="<?php echo URL_BASE."/public/js/hola.js";?>" ></script> -->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="<?php echo URL_BASE."/public/js/bootstrap.min.js";?>"></script>


    <script type="text/javascript">
                $(".prueba1").on("click",function(){
                  $("#modal-edit").load("<?php echo URL_BASE;?>/index.php/Partido/eliminar_partido",{identificadorr:$(this).val()});
                });                

                $(".prueba").on("click", function(){                
                  $("#modal-edit").load("<?php echo URL_BASE;?>/index.php/Partido/modificar_partido", {identificador:$(this).val()});                               
                });
                </script>
   
      



    </body>
    </html>