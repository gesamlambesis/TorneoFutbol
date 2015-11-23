<?php
namespace libs;

abstract class Controller{
	protected $view;
	protected $model;
	protected $errores;

	public function __construct(){
		
		/* AJAX check  */
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			/* special ajax here */
			
		}else{
			//Iniciamos la sesion PHP		
			Session::init();
		}

		//Dos cabeceras enviadas al navegador para que no use la cache para almacenar
		//las respuestas (quitar estas lineas cuando el sistema entre en produccion).
		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

		$this->view = new View();		
		$this->errores=array();
	}


	public function loadModel(){
		$class= get_class($this);
		$model = explode("\\",$class)[1]."Model";
		$modelPath = "models".DS.$model.".php";

		$model = "models\\".$model;
		if(file_exists($modelPath)){
			require_once($modelPath);
			$this->model = new $model();
		}
		else{
			throw new \Exception("No existe el modelo $modelPath", 1);
			
		}
	}

	public function getErrorstoString(){
		return implode("\n", $this->errores);
	}

	public function getErrores(){
		return $this->errores;
	}
}
?>