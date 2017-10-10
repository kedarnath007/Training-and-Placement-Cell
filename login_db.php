<?php
session_start();

include 'config.php';
$username=$_POST['username'];
$password=$_POST['password'];
function mysql_get_var($query,$y=0){
       $res = mysql_query($query);
       $row = mysql_fetch_array($res);
       mysql_free_result($res);
       $rec = $row[$y];
       return $rec;
}

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
}
// generate encryption uname
$pass_encrypt = Encryption::encrypt($password);

$sql = "select * from login where username='$username' and password='$pass_encrypt'";

$login=mysql_query($sql);
$row=mysql_fetch_assoc($login);
if ($row == NULL || $row == ''){

	header("location:".$_SERVER['HTTP_REFERER']."?msg=0");

}else {
	$_SESSION['placement_username'] = $username;
	$role_id = mysql_get_var("select role_id from login where username='$username'");
	$_SESSION['placement_role_id'] = $role_id;	
	//echo $_SESSION['placement_role_id'].'<br>';
	//echo $_SESSION['placement_username'];
	
	if ($role_id == '1'){
		//echo 'hiii';
	header("location: admin.php");
	}
	if ($role_id == '2'){
		header("location: placement.php");
	}
	if ($role_id == '3'){
		header("location: student.php");
	}
}