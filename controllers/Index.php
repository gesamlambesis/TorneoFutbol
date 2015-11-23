<?php

namespace controllers;

use libs\Controller;

	class Index extends Controller {

		
		public function __construct(){
			parent::__construct();
			
			
		}

        public function index() {      


 		$a = explode("\\", get_class($this))[1];
     $this->errores[0] = "Pepito lol";
     $this->view->render($a,"Index",$this->getErrores());

    }

    /*public function showLogin(){
			$a = explode("\\",get_class($this))[1];
			
			$this->errores[0] = "Pepito no vino a la escuela";
			$this->view->render($a, "showLogin",null, $this->getErrores());
		}

		*/
	/*ublic function autenticar($user, $password) {
			$auth = new SessionUtils();
		if ($auth->checkLogin($user,$password)) {
			echo "ok";

			print_r($_SESSION);
			print_r($_COOKIE);
		}

		else {
			echo "fail";
		}

		}*/

}


?>