<div class="row text-center  ">
    <div class="col-md-12">
        <h2> Modificar jugador</h2>
        
    </div>
</div>
<div class="row">
    
    <div class="col-md-12 col-sm-12 ">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Jugador</strong>
            </div>
            
            <?php $datos = $this->getDatos();
             print_r($datos);
             foreach ($datos as $key => $jugador):?>
            
           

                        
            <div class="panel-body">
                <form role="form" class="form" id="form1" method="POST" action="<?php echo URL_BASE;?>/index.php/jugador/actualizar_jugador">
                   
                   <div class="form-group input-group <?php if (isset($this->errores['id_jugador'])) echo 'has-error' ; ?>">
                        <!--<span class="input-group-addon"><i class="fa fa-genderless"></i></span>-->
                        <input class="form-control" name="id_jugador" id="id_jugador" placeholder="id_jugador" type="hidden" value="<?php  echo $jugador->id_jugador?>">
                        <?php if(isset($this->errores['id_jugador'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['id_jugador'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['nombre'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="nombre" id="nombre" placeholder="Nombre jugador" type="text" value="<?php  echo $jugador->nombre?>">
                        <?php if(isset($this->errores['nombre'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['nombre'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['apellidos'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="apellidos" id="apellidos" placeholder="apellidos" type="text" value="<?php  echo $jugador->apellidos?>">
                        <?php if(isset($this->errores['apellidos'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['apellidos'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['direccion'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="direccion" id="direccion" placeholder="representante Legal" type="text" value="<?php  echo $jugador->direccion?>">
                        <?php if(isset($this->errores['direccion'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['direccion'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['telefono'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="telefono" id="telefono" placeholder="telefono" type="text" value="<?php  echo $jugador->telefono?>" >
                        <?php if(isset($this->errores['telefono'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['telefono'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['fecha_nacimiento'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="fecha_nacimiento" type="text" value="<?php  echo $jugador->fecha_nacimiento?>" >
                        <?php if(isset($this->errores['fecha_nacimiento'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['fecha_nacimiento'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['dorsal'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="dorsal" id="dorsal" placeholder="dorsal" type="text" value="<?php  echo $jugador->num_dorsal?>" >
                        <?php if(isset($this->errores['dorsal'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['dorsal'];?></span><?php endif;?>
                    </div>

                     

                     <?php endforeach; ?>
                   
                    
                    
                    
                    <button name="enviarDatos" id="sendBtn" type="submit" class="btn btn-warning btn-lg" style="width: 100%"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                    
                    
                </form>
            </div>
            
        </div>
    </div>
    
    
</div>