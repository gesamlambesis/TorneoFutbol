<?php
	namespace controllers;	
	use libs\Controller;
	use libs\Validation;
	use libs\View;
	

	class Partido extends Controller {

		private $valida;

		public function __construct(){
			parent::__construct();
			$this->loadModel();
			$this->valida = new Validation();

			
		}

		/*public function listarInventarios() {

			$inventarios = $this->model->listarInventarios();
			$this->view->render(explode("\\",get_class($this))[1],"listar",$inventarios,$this->getErrores());


		}*/

		public function crear($params=array()){


			//Llamando al metodo del modelo
			if(isset($params['resultado']) && isset($params['estadio']) && isset($params['arbitro']) && isset($params['incidencia']) ){
				
				
				try {
					$this->crearPartido($params);
					$this->view->render(explode("\\",get_class($this))[1], "crear",$this->getErrores());
				} catch (\Exception $e) {

					View::renderErrors(array($e->getMessage()));
					
				}


			}

			else {
				$this->view->render(explode("\\",get_class($this))[1], "crear",$this->getErrores());
			}
			//print_r($params);

		//	if (isset($params['nombre_equipo']) && isset($params['txtarea']) && isset($params['categoria']) && isset($params['camiseta1']) && isset($params['camiseta2']))
				# code...
		//		$this->crearInventario($params);
		//	}

			//Renderizando la vista asociada
			

		}

		public function listar () {

			$partidos = $this->model->listarPartidos();
			$this->view->render(explode("\\",get_class($this))[1], "listar",$partidos,$this->getErrores());


		}


		public function modificar() {
				if(isset($params['resultado']) && isset($params['patrocinadores']) && isset($params['categoria']) && isset($params['camiseta1']) && isset($params['camiseta2'])){
				$this->crearEquipo($params);				
				}
		}

		public function crearPartido($params){
			
		    //$dia = $params['dia'];
		    //$produccion = $params['produccion'];
		    //$demanda = $params['demanda'];

		    $resultado = $params['resultado'];
		    $estadio = $params['estadio'];
		    $arbitro = $params['arbitro'];
		    $incidencia = $params['incidencia'];

		    $usuario = "pancho";
		    $fecha_creacion = "12/12/2014";
		    $fecha_modificacion ="12/12/2014";

		    $this->valida->validaDatos($resultado,"El resultado no está escrito correctamente.",'resultado',10);
		  	$this->valida->validaDatos($estadio,"Los estadio no están escritos correctamente.",'estadio',30);
		  	$this->valida->validaDatos($arbitro,"La arbitro no está escrita correctamente.", 'arbitro',25);
		  	$this->valida->validaDatos($incidencia,"La incidencia no está escrita correctamente.",'incidencia', 70);

		  	if(count($this->valida->getErroresValidacion()) == 0 ){

		    	 if(count($this->errores) ==0 ){
		    	try{
		        	$this->model->guardar($resultado, $estadio, $arbitro, $incidencia, $usuario, $fecha_creacion, $fecha_modificacion );
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

		public function modificar_partido($params=array()){
			try{
				if(count($params) > 0){
					$p = $this->model->getPartidoById($params['identificador']);
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

		public function actualizar_partido($params=array()){
			try {
				if(isset($params['id_partido']) && isset($params['resultados']) && isset($params['estadio']) && isset($params['arbitro']) && isset($params['incidencia'])){
					//$this->guardarDireccion($params1);

					//print_r($params);
					$this->updatePartido($params);
					echo "<script language='javascript'>"; 
					echo "alert('Proveedor actualizado correctamente.')"; 
					echo "</script>";
					$this->listar();
				
				}
			} catch (Exception $e) {
				View::renderErrors(array($e->getMessage()));
			}
		}

		public function updatePartido($params){
			try {
				echo "<script language='javascript'>"; 
				echo "alert('HOLI.')"; 
				echo "</script>";

				$id_partido = $params['id_partido'];
				$resultados = $params['resultados'];
				$estadio = $params['estadio'];
				$arbitro = $params['arbitro'];
				$incidencia = $params['incidencia'];
				

				

			    if(count($this->errores) ==0 ){
			    	try{
			        	$this->model->actualizarPartido($id_partido,$resultados, $estadio, $arbitro, $incidencia);
			    	}
			    	catch(\Exception $e){
						$this->errores['global']=$e->getMessage();
					}
		    	}			
			} catch (Exception $e) {
				View::renderErrors(array($e->getMessage()));
			}
		}	

		public function eliminar_partido($params=array()){
			try {

				

				$this->model->eliminarPartido($params['identificadorr']);
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