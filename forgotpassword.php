<?php
include 'config.php';
if (isset($_POST['email'])){
		$email = $_POST['email'];
	}
function random_password( $length = 8 ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$password = substr( str_shuffle( $chars ), 0, $length );
	return $password;
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

$query="SELECT username,password FROM login WHERE username IN (SELECT rollno FROM student WHERE email='$email')";
$st=mysql_query($query);
 $recs=mysql_num_rows($st);

 if ($recs == 0) { // No records returned, so no email address in our table
// let us show the error message
 echo "<center><font face='Verdana' size='2' color=red><b>No Password</b><br>
 Sorry Your address is not there in our database . You can signup and login to use our site. 
<BR><BR><a href='login.php'> Sign UP </a> </center>"; 
exit;}



	$password= random_password(8);
	
	$pass_encrypt = Encryption::encrypt($password);
	
	
	
	$sql = mysql_query("update login set password='$pass_encrypt' where username in (SELECT rollno FROM student WHERE email='$email')");
	if (!$sql){
		header('location:'.$_SERVER['HTTP_REFERER'].'&msg=2#join_form1');
	}else
{
	

        $headers4="kedarnath1234@gmail.com";  // Change this address within quotes to your address
 
//$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;// for html mail 

 if(mail("$email","Your Request for login details","This is in response to your request for login detailst at
 Placements cell \n \n 
Password: $password \n\n Thank You \n \n siteadmin","$headers4"))
{echo "<center><b>THANK YOU</b> <br>Your password is posted to your emil address . 
Please check your mail after some time. </center>";}

else{// there is a system problem in sending mail
 echo " <center>There is some system problem in sending login details to your address. 
Please contact site-admin. <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center>";}
     } 