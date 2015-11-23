<?php
	namespace controllers;	
	use libs\Controller;

	class Partido extends Controller {

		public function __construct(){
			parent::__construct();
			$this->loadModel();

			
		}

		/*public function listarInventarios() {

			$inventarios = $this->model->listarInventarios();
			$this->view->render(explode("\\",get_class($this))[1],"listar",$inventarios,$this->getErrores());


		}*/

		public function crear($params=array()){


			//Llamando al metodo del modelo
			if(isset($params['resultado']) && isset($params['estadio']) && isset($params['arbitro']) && isset($params['incidencia']) ){
				$this->crearPartido($params);
				
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
		        	$this->model->guardar($resultado, $estadio, $arbitro, $incidencia, $usuario, $fecha_creacion, $fecha_modificacion );
		        	//echo "no hay error";
		    	}
		    	catch(\Exception $e){
					$this->errores['global']=$e->getMessage();
				}
		    }
				
		}
	}

?>