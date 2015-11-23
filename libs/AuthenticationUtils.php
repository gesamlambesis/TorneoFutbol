<?php
namespace libs;
use libs\CookieUtils;
use libs\Session;
use libs\DBConexion;
require_once("libs/password.php");

class AuthenticationUtils extends CookieUtils{
	private static $loggedIn = false;
	private static $arrUsuario = array();

	
	public static function getUserInfo(){
		return self::$arrUsuario;
	}

	public static function isAuthenticated(){

		if(!self::checkCookie()){
			self::checkSession();
		}

		if(!self::$loggedIn)
			self::logout();

		return self::$loggedIn;

	}

	private static function checkCookie(){
		if(self::existsCookie('session_id') && self::existsCookie('token')) {			
			return self::checkLogin(self::getCookie('session_id'), self::getCookie('token'));
		}
		else{
			return false;
		}
	}

	private static function checkSession(){
		if(Session::exists('session_id') && Session::exists('token')){
			return self::checkLogin(Session::getValue('session_id'), Session::getValue('token'));
		}
		else{
			return false;
		}
	}

	private static function checkLogin($session_id, $token){
		self::$loggedIn = false;	

		try{
			$con = DBConexion::getInstance();
			$res= $con->executeQuery('SELECT * FROM sesion WHERE sesion.session_id=? AND sesion.session_data = ?;',	array($session_id, $token));
		}
		catch(\Exception $e){
			throw $e;
		}

		

		if(count($res)>0){
			//Si ya expiro la sesion, es decir, si la fecha de expiracion es menor que la fecha actual entonces, responde false, si no es true
			if(strtotime($res[0]->expire_date) < time()){
				self::$loggedIn = false;
				return false;
			}
			self::$loggedIn = true;
			return true;
		}
		return false;
	}

	private function generateHash($passwd){
		/**
		 * Note that the salt here is randomly generated.
		 * Never use a static salt or one that is not randomly generated.
		 *
		 * For the VAST majority of use-cases, let password_hash generate the salt randomly for you
		 */
		//Generara un hash del password de una longitud fija de 60 caracteres
		$options = [
		    'cost' => 10, //Costo en tiempo de ejecución del algoritmo (8-10 recomendado)
		    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM), //Generando la semilla del generador de hash dinamicamente
		];
		return password_hash($passwd, PASSWORD_BCRYPT, $options);
	}

	public static function login($user, $passwd){
		
			try{
				$con = DBConexion::getInstance();
				$usuario_bd= $con->executeQuery('SELECT * FROM usuario WHERE usuario=?;',array($user));
			}
			catch(\Exception $e){
				throw $e;
			}
			
		
			
			
			
			if(isset($usuario_bd) && count($usuario_bd) > 0){
				$usuario_bd = $usuario_bd[0];

				if(password_verify($user.$passwd, $usuario_bd->contrasena)){
					
					self::$loggedIn = true;
					self::$arrUsuario['auth_user'] = $user;

					Session::regenerateSessionId();
					
					$token = sha1($_SERVER['HTTP_USER_AGENT'].$user.session_id());

					Session::setValue('session_id', session_id());
					Session::setValue('token', $token);

					//Por defecto la cookie se guarda una hora despues de la hora actual
					self::setCookie('session_id', session_id());
					//Por defecto la cookie se guarda una hora despues de la hora actual
					self::setCookie('token', $token);

					//Salvamos los datos de la sesion en bd
					$query= vsprintf("INSERT INTO sesion(session_id, session_data, expire_date) VALUES('%s', '%s', '%s');", array(session_id(), $token, date("Y-m-d H:i:s", self::$expiration)));

					$res= $con->executeUpdate(array($query));

					return true;
				}
				else{
					Session::setValue('loginErrors', "Usuario o contrase&ntilda;a incorrectos");
					self::$arrUsuario = array();
					self::$loggedIn = false;
					return false;

				}
			}
			return false;		
	}

	public static function logout(){
		$con = DBConexion::getInstance();
		
		$query = vsprintf("DELETE FROM sesion WHERE session_id='%s' AND session_data = '%s';", array(self::getCookie('session_id'), self::getCookie('token')));

		$res= $con->executeUpdate(array($query));

		//Cerrando conexion con BD
		$con->destroy();
		//Destruyendo los valores guardados en la cookie.
		self::deleteCookie('session_id');
		self::deleteCookie('token');
		unset($_COOKIE);
		$_COOKIE=array();
		//Destruyendo la sesion de las cookies del navegador y la sesion como tal
		Session::destroy();
		
		self::$arrUsuario = array();

	}
	

}
?>