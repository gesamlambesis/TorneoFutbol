<div class="row text-center  ">
    <div class="col-md-12">
        <h2> Modificar Equipo</h2>
        
    </div>
</div>
<div class="row">
    
    <div class="col-md-12 col-sm-12 ">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Equipo</strong>
            </div>
            
            <?php $datos = $this->getDatos();
               // print_r($datos);
             foreach ($datos as $key => $equipo):?>
            
           

                        
            <div class="panel-body">
                <form role="form" class="form" id="form1" method="POST" action="<?php echo URL_BASE;?>/index.php/Equipo/actualizar_equipo">
                   
                   <div class="form-group input-group <?php if (isset($this->errores['id_equipo'])) echo 'has-error' ; ?>">
                        <!--<span class="input-group-addon"><i class="fa fa-genderless"></i></span>-->
                        <input class="form-control" name="id_equipo" id="id_equipo" placeholder="id_equipo" type="hidden" value="<?php  echo $equipo->id_equipo?>">
                        <?php if(isset($this->errores['id_equipo'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['id_equipo'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['nombre_equipo'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="nombre_equipo" id="nombre_equipo" placeholder="Nombre equipo" type="text" value="<?php  echo $equipo->nombre_equipo?>">
                        <?php if(isset($this->errores['nombre_equipo'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['nombre'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['patrocinador'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="patrocinador" id="patrocinador" placeholder="patrocinador" type="text" value="<?php  echo $equipo->patrocinador?>">
                        <?php if(isset($this->errores['patrocinador'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['patrocinador'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['categoria'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="categoria" id="categoria" placeholder="representante Legal" type="text" value="<?php  echo $equipo->categoria?>">
                        <?php if(isset($this->errores['categoria'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['categoria'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['camiseta1'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="camiseta1" id="camiseta1" placeholder="camiseta1" type="text" value="<?php  echo $equipo->color_camiseta1?>" >
                        <?php if(isset($this->errores['camiseta1'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['camiseta1'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['camiseta2'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="camiseta2" id="camiseta2" placeholder="camiseta2" type="text" value="<?php  echo $equipo->color_camiseta2?>" >
                        <?php if(isset($this->errores['camiseta2'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['camiseta2'];?></span><?php endif;?>
                    </div>

                     

                     <?php endforeach; ?>
                   
                    
                    
                    
                    <button name="enviarDatos" id="sendBtn" type="submit" class="btn btn-warning btn-lg" style="width: 100%"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                    
                    
                </form>
            </div>
            
        </div>
    </div>
    
    
</div>