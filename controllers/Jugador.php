<?php
	namespace controllers;	
	use libs\Controller;

	class Jugador extends Controller {

		public function __construct(){
			parent::__construct();
			$this->loadModel();

			
		}

		/*public function listarInventarios() {

			$inventarios = $this->model->listarInventarios();
			$this->view->render(explode("\\",get_class($this))[1],"listar",$inventarios,$this->getErrores());


		}*/

		public function crear($params=array()){


			
			//$valor_equipos = $this->model->listarValores();

			//Llamando al metodo del modelo
			if(isset($params['nombre_jugador']) && isset($params['apellidos']) && isset($params['direccion']) && isset($params['telefono']) && isset($params['fecha_nacimiento']) && isset($params['num_dorsal']) && isset($params['equipo']) ){
				$this->crearJugador($params);
				
			}

			//print_r($params);

		//	if (isset($params['nombre_equipo']) && isset($params['txtarea']) && isset($params['categoria']) && isset($params['camiseta1']) && isset($params['camiseta2']))
				# code...
		//		$this->crearInventario($params);
		//	}


			$equipos = $this->model->listarEquipos();
			//print_r($equipos);
			//Renderizando la vista asociada
			$this->view->render(explode("\\",get_class($this))[1], "crear",$equipos, $this->getErrores());

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

		public function crearJugador($params){
			
		    //$dia = $params['dia'];
		    //$produccion = $params['produccion'];
		    //$demanda = $params['demanda'];

			//echo "<pre>";
			//print_r($params);

			
		    $nombre= $params['nombre_jugador'];
		    $apellidos = $params['apellidos'];
		    $direccion = $params['direccion'];
		    $telefono = $params['telefono'];
		    $fecha_nacimiento = $params['fecha_nacimiento'];
		    $num_dorsal = $params['num_dorsal'];
		    $equipo = $params['equipo'];
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
		        	$this->model->guardar($nombre,$apellidos, $direccion, $telefono, $fecha_nacimiento, $num_dorsal, $equipo, $usuario, $fecha_creacion, $fecha_modificacion);
		        	//echo "no hay error";
		    	}
		    	catch(\Exception $e){
					$this->errores['global']=$e->getMessage();
				}
		    }
				
		}
	}

?>