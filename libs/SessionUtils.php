<?php
namespace libs;

class SessionUtils extends CookieUtils {

	private static $loggedin = false;
	public static $arrUsuario = array();

	//Datos de prueba

	private static $user = 'test';
	private static $password = 'test';

	public function auth() {
		self::$loggedin = false;
		if (!self::checkCookie()) {
			# code...
			self::checkSession();
		}

		return self::$loggedin;
	}

	private function checkCookie() {

		if (!empty($_COOKIE['auth_user']) && !empty($_COOKIE['auth_pass'])) {

			return self:: checkLogin($_COOKIE['auth_user'], $_COOKIE['auth_pass']);

					}

		else {
			return false;
		}
	}

	private function checkSession() {
		if (!empty($_SESSION['auth_user']) && !empty($_SESSION['auth_pass'])) {
			return self::checkLogin($_SESSION['auth_user'],$_SESSION['auth_pass']);
		}

		else {
			return false;
		}

	}

	public function checkLogin($usr='',$pass='') {

		/*inicialmente validaremos contra datos preestablecidos que podrían venir por ejemplo, de una base de datos*/
		if ($usr == self::$user && $pass == self::$password) {
			self::$loggedin = true;
			self::$arrUsuario['user'] = self::$user;
			$_SESSION['auth_user'] = self::$user;
			$_SESSION['auth_pass'] = self::$password;
			parent::set("auth_user",self::$user);
			parent::set("auth_pass",self::$password);

			return true;
		}

		else {
			echo "Hola, el usuario y/o la contraseña es incorrecto";
			self::$arrUsuario = array();
			self::$loggedin = false;
			return false;
		}

		/*$auth = new SessionUtils();
		if ($auth->checkLogin('test','test')) {
			echo "ok";

			print_r($_SESSION);
			print_r($_COOKIE);
		}

		else {
			echo "fail";
		}*/


	}

	public function logout() {
		self::$arrUsuario = array();
		unset($_SESSION['auth_user']);
		unset($_SESSION['auth_pass']);
		parent::delete('auth_user');
		parent::delete('auth_pass');

		self::$loggedin = false;
	}


}