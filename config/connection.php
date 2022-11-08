<?php

class Database{
	public static function connect(){
		$db = new mysqli("localhost", "root", "12345", "tickets");
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}