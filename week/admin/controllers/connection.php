<?php
class DbContext
{
	public static function Connect()
	{
		$db=new mysqli('localhost','root','','week');
		if(!$db->connect_errno)
			return $db;
		return FALSE;
	}
}

?>