<?php
//// ENCRY by arturooo3 v. 1.0 (C) 18.10.2012
//// PHP5 version
//// arturooo3 [[[[   ]]]] o2[HERECOMES_DOT]pl

/*
	Change $skey to any super top secret key string.
*/

class Encry_singleton {
	var $skey = "my_super_extra_key_!@#$%^&*()"; // change it
	private static $oInst = false;

	public static function get() {
		if( self::$oInst == false ) {
			self::$oInst = new Encry_singleton();
		}
		return self::$oInst;
	}
	private function __construct() {}

	/*public */function safe_b64encode($string) {
		$data = base64_encode($string);
		$data = str_replace(array('+','/','='),array('-','_',''),$data);
		return $data;
	}

	/*public */function safe_b64decode($string) {
		$data = str_replace(array('-','_'),array('+','/'),$string);
		$mod4 = strlen($data) % 4;
		if ($mod4) {
			$data .= substr('====', $mod4);
		}
		return base64_decode($data);
	}

	/*public  */function encode($value){ 
		if(!$value){return false;}
		$text = $value;
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
		return trim($this->safe_b64encode($crypttext)); 
	}

	/*public */function decode($value){
		if(!$value){return false;}
		$crypttext = $this->safe_b64decode($value); 
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
		return trim($decrypttext);
	}
}

?>