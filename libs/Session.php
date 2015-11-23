<?php
namespace libs;
class Session{
	static function init(){
		session_name ("PROYSESSION");
		session_start();
	}

	static function destroy(){

		// Destruir todas las variables de sesión.
		$_SESSION = array();
		// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
		// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}

		//Finalmente destruir la sesion
		session_destroy();
	}

	static function setValue($clave, $valor){
		$_SESSION[$clave] = $valor;
	}

	static function getValue($clave){
		return $_SESSION[$clave];
	}

	static function exists($clave){
		if(!isset($_SESSION[$clave]) && !empty($_SESSION[$clave]))
			return true;
		return false;
	}

	static function regenerateSessionId(){
		//$id_sesion_antigua = session_id();

		session_regenerate_id();

		//$id_sesion_nueva = session_id();

		//echo "Sesión Antigua: $id_sesion_antigua<br />";
		//echo "Sesión Nueva: $id_sesion_nueva<br />";
	}

}
?>