<?php

namespace controllers;

use libs\Controller;

	class Login extends Controller {
		
		public function __construct(){
			parent::__construct();
			$this->loadModel();

			
		}



        public function index() {
      $a = explode("\\", get_class($this))[1];
      //echo $a;
      $this->errores[0] = "Pepito lol";
      $this->view->render($a,"Login", $this->getErrores());
    //  $this->view->render($a,"index",$this->getErrores());
    }


}


?>