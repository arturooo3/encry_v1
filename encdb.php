<?php

final class Encry_db {
	private static $oInst = false;
	
	public static function get() {
		if( self::$oInst == false ) {
			self::$oInst = new Encry_db();
		}
		return self::$oInst;
	}
	private function __construct() {}

	
	function getlogin() {
		$gimme_database_login = 'GwNAyZwnayt6-HTr6s8ON_9Lr2e5j5UOy4WqxL1FdLw';
		return $gimme_database_login;
	}

	function getpass() {
		$gimme_database_pass = 'DkHSFfL8ryHyJeaSzfNhgShsGxaAC3nt57crNy39zA0';
		return $gimme_database_pass;
	}
}

?>