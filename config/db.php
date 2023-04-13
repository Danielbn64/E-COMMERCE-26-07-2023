<?php

class Database
{
	public static function connect()
	{
		$db = new mysqli('localhost', 'root', 'daniel123164', 'tienda_master');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}
