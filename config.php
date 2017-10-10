<?php
	
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "placement";

	$conn = mysql_connect($host, $user, $password);
	if($conn)
	{
		$select_db = mysql_select_db($database);
		if(!$select_db)
		{
			echo 'Database Error:'. mysql_error();
		}
	}else
	{
		echo 'Connection Error:'. mysql_error();
	}
	
	