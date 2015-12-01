<?php
	namespace controllers;	
	use libs\Controller;
	use libs\Validation;
	use libs\View;
	use libs\Security;

	class Jugador extends Controller {

		private $valida;
		private $xss;

		public function __construct(){
			parent::__construct();
			$this->loadModel();
			$this->valida = new Validation();
			$this->xss = new Security();
			
		}

		/*public function listarInventarios() {

			$inventarios = $this->model->listarInventarios();
			$this->view->render(explode("\\",get_class($this))[1],"listar",$inventarios,$this->getErrores());


		}*/

		public function crear($params=array()){


			
			//$valor_equipos = $this->model->listarValores();

			//Llamando al metodo del modelo
			if(isset($params['nombre_jugador']) && isset($params['apellidos']) && isset($params['direccion']) && isset($params['telefono']) && isset($params['num_dorsal']) && isset($params['equipo']) && isset($params['dia']) && isset($params['mes']) && isset($params['año']) ){
				
				try {

					$nombre_jugador = $this->xss->xss($params['nombre_jugador']);			
					$apellidos = $this->xss->xss($params['apellidos']);
					$direccion = $this->xss->xss($params['direccion']);
					$telefono = $this->xss->xss($params['telefono']);
					$fecha_nacimiento = $this->xss->xss($params['fecha_nacimiento']);
					$num_dorsal = $this->xss->xss($params['num_dorsal']);
					$equipo = $this->xss->xss($params['equipo']);

					$fecha_nacimiento = $params['año']."-".$params['mes']."-".$params['dia'];

					echo "EPALEEE";
					
					
					$this->crearJugador($nombre_jugador,$apellidos,$direccion,$telefono,$fecha_nacimiento,$num_dorsal,$equipo);
					$equipos = $this->model->listarEquipos();
					$this->view->render(explode("\\",get_class($this))[1], "crear",$equipos, $this->getErrores());
					
					
				} catch (Exception $e) {
					View::renderErrors(array($e->getMessage()));
				}

				
				
			}

			else {
				$equipos = $this->model->listarEquipos();
				$this->view->render(explode("\\",get_class($this))[1], "crear",$equipos, $this->getErrores());
			}

			//print_r($params);

		//	if (isset($params['nombre_equipo']) && isset($params['txtarea']) && isset($params['categoria']) && isset($params['camiseta1']) && isset($params['camiseta2']))
				# code...
		//		$this->crearInventario($params);
		//	}


			
			//print_r($equipos);
			//Renderizando la vista asociada
			

		}

		public function listar () {

			//$this->view->render(explode("\\",get_class($this))[1], "listar",$this->getErrores());
			$jugadores = $this->model->listarJugadores();
			$this->view->render(explode("\\",get_class($this))[1], "listar",$jugadores,$this->getErrores());

		}




		public function modificar() {
				if(isset($params['nombre_equipo']) && isset($params['patrocinadores']) && isset($params['categoria']) && isset($params['camiseta1']) && isset($params['camiseta2'])){
				$this->crearEquipo($params);				
				}
		}

		public function crearJugador($nombre_jugador,$apellidos,$direccion,$telefono,$fecha_nacimiento,$num_dorsal, $equipo){
			
		    //$dia = $params['dia'];
		    //$produccion = $params['produccion'];
		    //$demanda = $params['demanda'];

			//echo "<pre>";
			//print_r($params);

			
		    /*$nombre= $params['nombre_jugador'];
		    $apellidos = $params['apellidos'];
		    $direccion = $params['direccion'];
		    $telefono = $params['telefono'];
		    $fecha_nacimiento = $params['fecha_nacimiento'];
		    $num_dorsal = $params['num_dorsal'];*/
		   // $equipo = $params['equipo'];
		    $usuario = "pancho";
		    $fecha_creacion = "12/12/2014";
		    $fecha_modificacion ="12/12/2014";

		    $this->valida->validaDatos($nombre_jugador,"El nombre del equipo no está escrito correctamente.",'nombre_jugador',25);
		  	$this->valida->validaDatos($apellidos,"Los apellidos no están escritos correctamente.",'apellidos',25);
		  	$this->valida->validaDatos($direccion,"La direccion no está escrita correctamente.", 'direccion',60);

		  	$this->valida->validaNumeros($telefono, $min=10, $max=10000000000, $mensaje="El telefono no está escrito correctamente",'telefono');
		  	$this->valida->validaNumeros($num_dorsal, $min=1, $max=1000, $mensaje="El telefono no está escrito correctamente",'num_dorsal');
		  //	$this->valida->validaDatos($camiseta2,"La camiseta2 no está escrita correctamente.", 'camiseta2', 25);

		  	 if(count($this->valida->getErroresValidacion()) == 0 ){

		  	 	  if(count($this->errores) ==0 ){
		    	try{
		        	$this->model->guardar($nombre_jugador,$apellidos, $direccion, $telefono, $fecha_nacimiento, $num_dorsal, $equipo, $usuario, $fecha_creacion, $fecha_modificacion);
		        	//echo "no hay error";
		    	}
		    	catch(\Exception $e){
					$this->errores['global']=$e->getMessage();
				}
		    }

		    	
		    }

		    

		    else {
		    	$this->view->render(explode("\\",get_class($this))[1], "crear",null,$this->valida->getErroresValidacion());
		    }
   


		    


		    /*if(!is_numeric($dia)){
		        $this->errores['dia']="Oye el dia no es un numero, no seas bobo chico";
		        
		    }
		    
		    if(!is_numeric($demanda)){
		        $this->errores['demanda']="Oye la demanda no es un numero, no seas bobo chico";
		        
		    }

		    if(!is_numeric($produccion)){
		        $this->errores['produccion']="Oye la produccion no es un numero, analiza";
		        
		    }*/

		  
				
		}

		public function modificar_jugador($params=array()){
			try{
				if(count($params) > 0){
					$p = $this->model->getJugadorById($params['identificador']);
                    //d = $this->model->getProveedorDireccionById($params['identificador']);
					$var = $params['identificador'];

					//var_dump($d);
					if(empty($p)){
						View::renderErrors(array("No existe el proveedor con identificador ".$params['identificador']));
					}
					else{
					//	$this->view->render(explode("\\",get_class($this))[1], "modificar", $p[0], $d[0],$params, $this->getErrores());
						//print_r($p);
						$this->view->render(explode("\\",get_class($this))[1], "modificar",$p,$this->getErrores());

						//if(isset($params['nombre']) && isset($params['aPaterno']) && isset($params['aMaterno']) && isset($params['fechaNacimiento']) && isset($params['ciudad']) && isset($params['cp']) && isset($params['colonia']) && isset($params['calle']) && isset($params['numero']) && isset($params['detalle'])/*/*&& isset($params['DIRECCION_idDireccion'])*/){
							//$this->guardarDireccion($params1);

						/*	print_r($params);
							$this->updateCliente($params);
					
						}*/
					}
					
				}
				else{
					
					View::renderErrors(array("No se envio el identificador del cliente"));	
				}
			}
			catch (Exception $e) {
				View::renderErrors(array($e->getMessage()));
			}
			
		}

		public function actualizar_jugador($params=array()){
			try {
				if(isset($params['id_jugador']) && isset($params['nombre']) && isset($params['apellidos']) && isset($params['direccion']) && isset($params['telefono']) && isset($params['fecha_nacimiento']) && isset($params['dorsal']) ){
					//$this->guardarDireccion($params1);

					//print_r($params);
					$this->updateJugador($params);
					echo "<script language='javascript'>"; 
					echo "alert('Proveedor actualizado correctamente.')"; 
					echo "</script>";
					$this->listar();
				
				}
			} catch (Exception $e) {
				View::renderErrors(array($e->getMessage()));
			}
		}

		public function updateJugador($params){
			try {
				echo "<script language='javascript'>"; 
				echo "alert('HOLI.')"; 
				echo "</script>";

				$id_jugador = $params['id_jugador'];
				$nombre = $params['nombre'];
				$apellidos = $params['apellidos'];
				$direccion = $params['direccion'];
				$telefono = $params['telefono'];
				$fecha_nacimiento = $params['fecha_nacimiento'];
				$num_dorsal = $params['dorsal'];

				

			    if(count($this->errores) ==0 ){
			    	try{
			        	$this->model->actualizarJugador($id_jugador, $nombre, $apellidos, $direccion, $telefono, $fecha_nacimiento, $num_dorsal);
			    	}
			    	catch(\Exception $e){
						$this->errores['global']=$e->getMessage();
					}
		    	}			
			} catch (Exception $e) {
				View::renderErrors(array($e->getMessage()));
			}
		}	

		public function eliminar_jugador($params=array()){
			try {

				

				$this->model->eliminarJugador($params['identificadorr']);
				echo "<script language='javascript'>"; 
				echo "alert('Jugador eliminado correctamente.')"; 
				echo "</script>";
				$this->listar();
			} catch (Exception $e) {
				View::renderErrors(array($e->getMessage()));
			}
		}


	}

?>