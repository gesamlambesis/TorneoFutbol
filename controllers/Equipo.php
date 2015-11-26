<?php
	namespace controllers;	
	use libs\Controller;
	use libs\Validation;
	use libs\View;
	

	class Equipo extends Controller {

		private $valida;

		public function __construct(){
			parent::__construct();
			$this->loadModel();
			$this->valida = new Validation();

			
		}

		public function listarEquipos() {

			$equipos = $this->model->listarEquipos();
			$this->view->render(explode("\\",get_class($this))[1],"listar",$equipos,$this->getErrores());


		}

		public function crear($params=array()){


			
			if(isset($params['nombre_equipo']) && isset($params['patrocinadores']) && isset($params['categoria']) && isset($params['camiseta1']) && isset($params['camiseta2'])){
				
				try {
					$this->crearEquipo($params);
					$this->view->render(explode("\\",get_class($this))[1], "crear",$this->getErrores());
				} catch (\Exception $e) {

					View::renderErrors(array($e->getMessage()));
					
				}

				
				
			}

			else {
					$this->view->render(explode("\\",get_class($this))[1], "crear",null,$this->getErrores());	
			}

			
			

		}

		public function listar () {

		    $equipos = $this->model->listarEquipos();
			$this->view->render(explode("\\",get_class($this))[1], "listar",$equipos,$this->getErrores());

		}


		public function modificar() {

				if(isset($params['nombre_equipo']) && isset($params['patrocinadores']) && isset($params['categoria']) && isset($params['camiseta1']) && isset($params['camiseta2'])){
				$this->crearEquipo($params);				
				}

		}

		public function crearEquipo($params){
			
		    //$dia = $params['dia'];
		    //$produccion = $params['produccion'];
		    //$demanda = $params['demanda'];

		    $nombre_equipo = $params['nombre_equipo'];
		    $patrocinadores = $params['patrocinadores'];
		    $categoria = $params['categoria'];
		    $camiseta1 = $params['camiseta1'];
		    $camiseta2 = $params['camiseta2'];
		    $usuario = "pancho";
		    $fecha_creacion = "12/12/2014";
		    $fecha_modificacion ="12/12/2014";

		  	$this->valida->validaDatos($nombre_equipo,"El nombre del equipo no está escrito correctamente.",'nombre_equipo',25);
		  	$this->valida->validaDatos($patrocinadores,"Los patrocinadores no están escritos correctamente.",'patrocinadores',25);
		  	$this->valida->validaDatos($categoria,"La categoria no está escrita correctamente.", 'categoria',25);
		  	$this->valida->validaDatos($camiseta1,"La camiseta1 no está escrita correctamente.",'camiseta1', 25);
		  	$this->valida->validaDatos($camiseta2,"La camiseta2 no está escrita correctamente.", 'camiseta2', 25);

		  	
			
		    if(count($this->valida->getErroresValidacion()) == 0 ){

		    	if(count($this->errores) ==0 ){
		    	try{
		        	$this->model->guardar($nombre_equipo,$patrocinadores,$categoria,$camiseta1,$camiseta2,$usuario,$fecha_creacion,$fecha_modificacion);
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

		public function modificar_equipo($params=array()){
			try{
				if(count($params) > 0){
					$p = $this->model->getEquipoById($params['identificador']);
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

		public function actualizar_equipo($params=array()){
			try {
				if(isset($params['id_equipo']) && isset($params['nombre_equipo']) && isset($params['patrocinador']) && isset($params['categoria']) && isset($params['camiseta1']) && isset($params['camiseta2']) ){
					//$this->guardarDireccion($params1);

					//print_r($params);
					$this->updateEquipo($params);
					echo "<script language='javascript'>"; 
					echo "alert('Proveedor actualizado correctamente.')"; 
					echo "</script>";
					$this->listar();
				
				}
			} catch (Exception $e) {
				View::renderErrors(array($e->getMessage()));
			}
		}

		public function updateEquipo($params){
			try {
				echo "<script language='javascript'>"; 
				echo "alert('HOLI.')"; 
				echo "</script>";

				$id_equipo = $params['id_equipo'];
				$nombre_equipo = $params['nombre_equipo'];
				$patrocinador = $params['patrocinador'];
				$categoria = $params['categoria'];
				$camiseta1 = $params['camiseta1'];
				$camiseta2 = $params['camiseta2'];

				

			    if(count($this->errores) ==0 ){
			    	try{
			        	$this->model->actualizarEquipo($id_equipo, $nombre_equipo, $patrocinador, $categoria, $camiseta1, $camiseta2);
			    	}
			    	catch(\Exception $e){
						$this->errores['global']=$e->getMessage();
					}
		    	}			
			} catch (Exception $e) {
				View::renderErrors(array($e->getMessage()));
			}
		}

		public function eliminar_equipo($params=array()){
			try {

				

				$this->model->eliminarEquipo($params['identificadorr']);
				echo "<script language='javascript'>"; 
				echo "alert('LOOOOOOOOOOOOOL')"; 
				echo "</script>";
				
				$this->listar();
			} catch (Exception $e) {
				View::renderErrors(array($e->getMessage()));
			}
		}	


	}

?>