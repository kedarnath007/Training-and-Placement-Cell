<?php
include 'config.php';

class Encryption
{
	private static $key = "I@Sravan#005$$$";
	public static function encrypt($string)
	{
		$key = Encryption::$key;
		$result = "";
		for ($i = 0; $i < strlen($string); $i++)
		{
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key)) - 1, 1);
			$char = chr(ord($char) + ord($keychar));
			$result.= $char;
		}
		return base64_encode($result);
	}
	public static function decrypt($string)
	{
		$key = Encryption::$key;
		$result = "";
		$string = base64_decode($string);
		for ($i = 0; $i < strlen($string); $i++)
		{
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key)) - 1, 1);
			$char = chr(ord($char) - ord($keychar));
			$result.=$char;
		}
		return $result;
	}
}

  /* $sql = mysql_query("select password from login where login_id=5");

while ($row = mysql_fetch_assoc($sql)){
	$password = $row['password'];
}  

// generate encryption uname
echo  $pass_encrypt = Encryption::decrypt($password); */

echo  $pass_encrypt = Encryption::encrypt("123");
