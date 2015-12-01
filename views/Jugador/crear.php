
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
      <?php $errores = $this->getErrores();

     
            ?>
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
                    <?php if(isset($this->errores['direccion'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['direccion'];?></span><?php endif;?>

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

                    <div>
                    <select aria-label="Día" name="dia" id="dia" title="Día" class="_5dba"><option value="0" selected="1">Día</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>
                    <select aria-label="Mes" name="mes" id="mes" title="Mes" class="_5dba"><option value="0" selected="1">Mes</option><option value="1">ene</option><option value="2">feb</option><option value="3">mar</option><option value="4">abr</option><option value="5">may</option><option value="6">jun</option><option value="7">jul</option><option value="8">ago</option><option value="9">sep</option><option value="10">oct</option><option value="11">nov</option><option value="12">dic</option></select>
                    <select aria-label="Año" name="año" id="año" title="Año" class="_5dba"><option value="0" selected="1">Año</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option></select>
                   
                    </div>
                    

                   <!-- <input type="text" required class="form-control"  value="" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de Nacimiento..." min="1" max="10000000" step="1">
                    <?php if(isset($this->errores['fecha_nacimiento'])) :?> <span id="helpBlock" class="help-block"><?php echo $this->errores['fecha_nacimiento'];?></span><?php endif;?>-->

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
               <select id="equipo" required name="equipo" class="form-control">
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