<?php
namespace libs;
use libs\Session;

class Captcha{
	private static $characters = "abcdefghijklmñopqrstuvwxyz0123456789";

	private function texto($long = 6){
		$texto = "";
		for ($i=0; $i < $long; $i++) {
			$texto .= self::$characters[rand(0, strlen(self::$characters))];
		}

		return $texto;
	}

	public function generateCaptcha($w= 350, $h = 60){
		unlink(getcwd()."/public/uploads/captcha.png");
		Session::setValue('captcha', self::texto());

		$captcha = \imagecreatetruecolor ($w, $h);

		$colorFondo = \imagecolorallocate($captcha, 0, 0, 255);
		$colorTexto = \imagecolorallocate($captcha, 255, 255, 0);
		$colorLinea = \imagecolorallocate($captcha, 255, 105, 180);
		\imageline($captcha, 120, 39, 250, 39, $colorLinea);
		\imageline($captcha, 120, 45, 250, 45, $colorLinea);
		\imageline($captcha, 120, 50, 250, 50, $colorLinea);

		\imagestring($captcha, 5, 150, 35, Session::getValue('captcha'), $colorTexto);

		imagepng($captcha, getcwd()."/public/uploads/captcha.png");
		imagedestroy($captcha);

	}
}
?>