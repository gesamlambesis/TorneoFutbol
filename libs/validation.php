<?php

namespace libs;
class Validation{
	//Definimos un arreglo para colocar los errores de validacion
	private $errors = array();

	/**
	*Validamos texto con o sin espacios, y la posibilidad de enviar longitud minima y maxima
	*/
	public function validaTexto($text, $min = false, $max=false, $espacios = true, $mensaje="", $indice){
		
		if(is_numeric($min)){
			if(strlen($text) < $min){
				$this->errors[$indice] = $mensaje.". MINIMO ".$text;
				return false;
			}
		}
		if(is_numeric($max)){
			if(strlen($text) > $min){
				$this->errors[$indice] = $mensaje.". MAXIMO: ".$text;
				return false;
			}
		}

		

		if($espacios){
			$res = ereg("^[A-Za-z0-9\ ]+$", $test);
		}
		else{
			$res = ereg("^[A-Za-z0-9]+$", $test);	
		}

		if($res){
			return true;
		}
		else{
			$this->errors[$indice] = $mensaje.". CARACTER ESPECIAL: ".$text;
			return false;
		}



	}

	public function validaDatos($text, $mensaje="" , $indice, $longitud) {

		//echo $text.'hola';
		$text = preg_replace('/\s+/', '', $text);
		//echo $text.'hola';
		//echo "LLEGO";
		if (empty($text)) {
			//echo "ENTRO";
			$this->errors[$indice] = $mensaje.". El campo está vacio: ".$text;
			return false;
		}

		else if(strlen($text)>$longitud){
			$this->errors[$indice] = $mensaje.". El nombre es demasiado largo: ".$text;
			return false;
		}

	}

	//Validacion de direcciones email
	public function validaEmail($email, $dominio='', $mensaje=''){
		$res = ereg("^[^@ ]+@[^@ ]+\.[^@ \.]+$", trim($email));
		if($res){
			return true;
		}
		else{
			$this->errors[] = $mensaje.". El valor del campo es: ".$email;
			return false;
		}

	}

	//Validacion de numeros
	public function validaNumeros($num, $min=false, $max=false, $mensaje='', $indice){
		if(is_numeric($num) && is_numeric($min) && is_numeric($max)){
			if($num < $min ){
				$this->errors[$indice] = $mensaje.". El numero tiene menos digitos de los esperados. ".$num;
				return false;
			}

			else if($num > $max) {
				$this->errors[$indice] = $mensaje.". El numero tiene mas digitos de los esperados. ".$num;
				return false;
			}
			return true;
		}
		else{
			$this->errors[$indice] = $mensaje.". No se aceptan letras u otros caracteres. ".$num;
			return false;
		}
	}

	//Validacion de fechas
	public function validaFecha($fecha, $mensaje=''){
		if(strtotime($fecha) === false){
			$this->errors[] = $mensaje.". El valor del campo es: ".$fecha;
			return false;
		}
		return true;
	}

	public function validaFichero($file, $max_size=false, $ext=array(), $mensaje=''){

	}

	public function getErroresValidacion(){
		return $this->errors;
	}
		
}

?>