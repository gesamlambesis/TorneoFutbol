<?php
namespace libs;

class CookieUtils{
	const expirationTime = 3600; //Tiempo de expiracion constante de las cookies en segundos
	public static $expiration;


	public static function getCookie($name){
		if(isset($_COOKIE[$name])){
			return $_COOKIE[$name];
		}
		else{
			return null;
		}
	}

	public static function existsCookie($name){
		if(isset($_COOKIE[$name]) && !empty($_COOKIE[$name])){
			return true;
		}
		else{
			return false;
		}

	}


	public static function setCookie($name, $value, $expiration = null, $path=URL_BASE, $domain=null){
		$val = false;
		
		if(!headers_sent()){
			
			if(is_null($domain)){
				$domain = $_SERVER['HTTP_HOST'];
			}

			
			if(is_null($expiration)){				
				self::$expiration = time() + self::expirationTime; //Expira una hora despues de la hora actual
			}
			elseif(is_numeric($expiration)){				
				if($expiration == -1 or $expiration ==0 ){
					//Expira el 14 de enero 2030
					self::$expiration = 1894656000;
				}
				else{
					//Expira $expiration horas despues de la hora actual
					self::$expiration = time() + self::expirationTime * $expiration;
				}
					
			}
			else{
				
				self::$expiration = strtotime($expiration);
			}

			$val = setcookie($name, $value, self::$expiration, $path, $domain);
		}

		return $val;
	}

	public static function deleteCookie($name, $path="/", $domain = null){
		$val = false;
		if(!headers_sent()){
			if(is_null($domain)){
				$domain = $_SERVER['HTTP_HOST'];
			}

			$val = @setcookie($name, "", time()-42000, $path, $domain);
			unset($_COOKIE[$name]);
		}
	}


	public static function getAllCookies(){
		if(!empty($_COOKIE)){
			return array_keys($_COOKIE);
		}
		else{
			return false;
		}
	}

}
?>