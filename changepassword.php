<?php
session_start();
$placemet_role_id = $_SESSION['placement_role_id'];
$username = $_SESSION['placement_username'];

include 'config.php';
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

$oldpass = $_POST['oldpass'];

$newpass = $_POST['newpass'];

$repass  = $_POST['renewpass'];

if ($placemet_role_id == '1'){
$oldpassword = mysql_get_var("select password from login where username='$username'");
	$pass_encrypt3 = Encryption::encrypt($oldpass);
	if ($oldpassword == $pass_encrypt3){

if ($newpass == $repass){
	
	$pass_encrypt = Encryption::encrypt($newpass);
	$pass_encrypt1 = Encryption::encrypt($oldpass);
	
	$sql = mysql_query("update login set password='$pass_encrypt' where role_id='1' and username='$username' and password='$pass_encrypt1'");
	if (!$sql){
		echo "<center><h2>password changing failed</h2></center>";
		//header('location:'.$_SERVER['HTTP_REFERER'].'#join_form2');
	}else {
		echo "<center><h2>password changed successfully</h2></center>";
		//header('location:'.$_SERVER['HTTP_REFERER'].'#join_form2');
	}	
}else {
	echo "<center><h2>password didnot match</h2></center>";
	//header('location:'.$_SERVER['HTTP_REFERER'].'#join_form2');
}
}
else{
		echo "<center><h2>Old password Entered is Wrong</h2></center>";
		//header('location:'.$_SERVER['HTTP_REFERER'].'#join_form2');
	}
}
if ($placemet_role_id == '2'){
	$oldpassword = mysql_get_var("select password from login where username='$username'");
	$pass_encrypt3 = Encryption::encrypt($oldpass);
	if ($oldpassword == $pass_encrypt3){
	if ($newpass == $repass){

		$pass_encrypt = Encryption::encrypt($newpass);
		$pass_encrypt1 = Encryption::encrypt($oldpass);

		$sql = mysql_query("update login set password='$pass_encrypt' where role_id='2' and username='$username' and password='$pass_encrypt1'");
		if (!$sql){
			echo "<center><h2>password changing failed</h2></center>";
			//header('location:'.$_SERVER['HTTP_REFERER'].'&msg=5#join_form');
		}else {
			echo "<center><h2>password changed successfully</h2></center>";
			//header('location:'.$_SERVER['HTTP_REFERER'].'&msg=6#join_form');
		}
	}else {
		echo "<center><h2>password didnot match</h2></center>";
		//header('location:'.$_SERVER['HTTP_REFERER'].'&mgs=4#join_form');
	}
	}
	else{
		echo "<center><h2>Old password didnot match</h2></center>";
		//header('location:'.$_SERVER['HTTP_REFERER'].'&msg=3#join_form');
	}
}

if ($placemet_role_id == '3'){
	$oldpassword = mysql_get_var("select password from login where username='$username'");
	$pass_encrypt3 = Encryption::encrypt($oldpass);
	if ($oldpassword == $pass_encrypt3){
	if ($newpass == $repass){

		$pass_encrypt = Encryption::encrypt($newpass);
		$pass_encrypt1 = Encryption::encrypt($oldpass);

		$sql = mysql_query("update login set password='$pass_encrypt' where role_id='3' and username='$username' and password='$pass_encrypt1'");
		if (!$sql){
			
			header('location:'.$_SERVER['HTTP_REFERER'].'&msg=5#join_form');
		}else {
			
			header('location:'.$_SERVER['HTTP_REFERER'].'&msg=6#join_form');
		}
	}else {
		
		header('location:'.$_SERVER['HTTP_REFERER'].'&msg=4#join_form');
	}
	}
	else{
		
		header('location:'.$_SERVER['HTTP_REFERER'].'&msg=3#join_form');
	}
}

