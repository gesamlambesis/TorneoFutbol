<div class="row text-center  ">
    <div class="col-md-12">
        <h2> Modificar Partido</h2>
        
    </div>
</div>
<div class="row">
    
    <div class="col-md-12 col-sm-12 ">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>partido</strong>
            </div>
            
            <?php $datos = $this->getDatos();
             print_r($datos);
             foreach ($datos as $key => $partido):?>
            
           

                        
            <div class="panel-body">
                <form role="form" class="form" id="form1" method="POST" action="<?php echo URL_BASE;?>/index.php/partido/actualizar_partido">
                   
                   <div class="form-group input-group <?php if (isset($this->errores['id_partido'])) echo 'has-error' ; ?>">
                        <!--<span class="input-group-addon"><i class="fa fa-genderless"></i></span>-->
                        <input class="form-control" name="id_partido" id="id_partido" placeholder="id_partido" type="hidden" value="<?php  echo $partido->id_partido?>">
                        <?php if(isset($this->errores['id_partido'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['id_partido'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['resultados'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="resultados" id="resultados" placeholder="resultados partido" type="text" value="<?php  echo $partido->resultados?>">
                        <?php if(isset($this->errores['resultados'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['resultados'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['estadio'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="estadio" id="estadio" placeholder="estadio" type="text" value="<?php  echo $partido->estadio?>">
                        <?php if(isset($this->errores['estadio'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['estadio'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['arbitro'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="arbitro" id="arbitro" placeholder="representante Legal" type="text" value="<?php  echo $partido->arbitro?>">
                        <?php if(isset($this->errores['arbitro'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['arbitro'];?></span><?php endif;?>
                    </div>

                    <div class="form-group input-group <?php if (isset($this->errores['incidencia'])) echo 'has-error' ; ?>">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <input class="form-control" name="incidencia" id="incidencia" placeholder="incidencia" type="text" value="<?php  echo $partido->incidencia?>" >
                        <?php if(isset($this->errores['incidencia'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['incidencia'];?></span><?php endif;?>
                    </div>

                  

                     

                     <?php endforeach; ?>
                   
                    
                    
                    
                    <button name="enviarDatos" id="sendBtn" type="submit" class="btn btn-warning btn-lg" style="width: 100%"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                    
                    
                </form>
            </div>
            
        </div>
    </div>
    
    
</div>