<?php

namespace libs;

class Security {


	public function xss($variable) {

		$variable = strip_tags($variable);

		return $variable;		
	}


}


?>