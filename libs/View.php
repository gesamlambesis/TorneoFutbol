<?php
namespace libs;

class View{

	private $errores;
	private static $global_errors;
	private $datos;
	
	public function render($controler, $view, $data=null, $errors=array()){
		$this->errores = $errors;
		$this->datos = $data;

		$view = "views".DS.$controler.DS.$view.".php";
		if(file_exists($view)){
			require_once($view);
		}
		else{
			throw new \Exception("No existe una vista asociada a esta petición: $view no existe", 1);
			
		}
	}
	public function getErrores(){
		return $this->errores;
	}

	public function getDatos(){
		return $this->datos;
	}

	public static function renderErrors($errors){
		self::$global_errors = $errors;
		$view = "views".DS."errorPage.php";
		
		
		if(file_exists($view)){
			require_once($view);
		}
		else{
			throw new \Exception("No existe una vista de error", 1);
			
		}
	}

	public static function getGlobalErrors(){
		return self::$global_errors;
	}
}
?>