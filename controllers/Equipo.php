<?php
	namespace controllers;	
	use libs\Controller;

	class Equipo extends Controller {

		public function __construct(){
			parent::__construct();
			$this->loadModel();

			
		}

		public function listarEquipos() {

			$equipos = $this->model->listarEquipos();
			$this->view->render(explode("\\",get_class($this))[1],"listar",$equipos,$this->getErrores());


		}

		public function crear($params=array()){


			//Llamando al metodo del modelo
			if(isset($params['nombre_equipo']) && isset($params['patrocinadores']) && isset($params['categoria']) && isset($params['camiseta1']) && isset($params['camiseta2'])){
				$this->crearEquipo($params);
				
			}

			//print_r($params);

		//	if (isset($params['nombre_equipo']) && isset($params['txtarea']) && isset($params['categoria']) && isset($params['camiseta1']) && isset($params['camiseta2']))
				# code...
		//		$this->crearInventario($params);
		//	}

			//Renderizando la vista asociada
			$this->view->render(explode("\\",get_class($this))[1], "crear",$this->getErrores());

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



		    /*if(!is_numeric($dia)){
		        $this->errores['dia']="Oye el dia no es un numero, no seas bobo chico";
		        
		    }
		    
		    if(!is_numeric($demanda)){
		        $this->errores['demanda']="Oye la demanda no es un numero, no seas bobo chico";
		        
		    }

		    if(!is_numeric($produccion)){
		        $this->errores['produccion']="Oye la produccion no es un numero, analiza";
		        
		    }*/

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
	}

?>