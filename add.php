<?php
include 'config.php';

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



if (isset($_REQUEST['placement'])){
	
	$placement = $_REQUEST['placement'];
	
	if ($placement == '1'){
	
	$password= random_password(8);
	
	$pass_encrypt = Encryption::encrypt($password);
	
	if (isset($_POST['puname'])){
		$puname = $_POST['puname'];
	}
	
	if (isset($_POST['email'])){
		$email = $_POST['email'];
	}
	
	$sql = mysql_query("insert into login values(null,2,'$puname','$pass_encrypt',NOW())");
	if (!$sql){
		header('location:'.$_SERVER['HTTP_REFERER'].'&msg=0#join_form');
	}else {
		
		$to = $email;
		//$txt = "Username = ".$puname."\n\n Password = ".$password;
		//$headers = "From: 123@example.com" . "\r\n";
		
		//mail($to,$subject,$txt,$headers);
		 //$headers4="kedarnath1234@gmail.com";   Change this address within quotes to your address
 
//$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;// for html mail 

 if(mail("$to","Authentication Deatils","This is in response to your request for login detailst at
 Placements cell \n \nLogin ID: $puname \n 
Password: $password \n\n Thank You \n \n siteadmin(kedarnath & Sowmya)"))
{echo "<center><b>THANK YOU</b> <br>Your password is posted to your emil address . 
Please check your mail after some time. </center>";}

else{// there is a system problem in sending mail
 echo " <center>There is some system problem in sending login details to your address. 
Please contact site-admin. <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center>";}
     } 
	}
	if ($placement == '2'){
	
		if (isset($_REQUEST['id'])){
			$pid = $_REQUEST['id'];
				
			$sql = mysql_query("delete from login where id='$pid'");
			if (!$sql){
				header('location:'.$_SERVER['HTTP_REFERER']);
			}else {				
				header('location:'.$_SERVER['HTTP_REFERER']);
			}
		}
	
	}
}
if (isset($_REQUEST['student'])){
	
	$student = $_REQUEST['student'];
	
	if ($student == '1'){
	$password= random_password(8);
	
	$pass_encrypt = Encryption::encrypt($password);
	
	if (isset($_POST['suname'])){
		$suname = $_POST['suname'];
	}
	if (isset($_POST['email'])){
		$email = $_POST['email'];
	}
	
	$sql = mysql_query("insert into login values(null,3,'$suname','$pass_encrypt',NOW())");
	if (!$sql){
		header('location:'.$_SERVER['HTTP_REFERER'].'&msg=2#join_form1');
	}else {
	
		$to = $email;
		//$subject = "Authentication Deatils";
		//$txt = "Username = ".$suname."\n\n Password = ".$password;
		//$headers = "From: kedarnath1234@gmail.com" . "\r\n";
	
		//mail($to,$subject,$txt,$headers);
	
		//header('location:'.$_SERVER['HTTP_REFERER'].'&msg=3#join_form1');
	$headers4="kedarnath1234@gmail.com";  // Change this address within quotes to your address
 
//$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;// for html mail 

 if(mail("$email","Your Request for login details","This is in response to your request for login detailst at
 Placements cell \n \nLogin ID: $suname \n 
Password: $password \n\n Thank You \n \n siteadmin(kedarnath & sowmya"))
{echo "<center><b>THANK YOU</b> <br>Your password is posted to your emil address . 
Please check your mail after some time. </center>";}

else{// there is a system problem in sending mail
 echo " <center>There is some system problem in sending login details to your address. 
Please contact site-admin. <br><br><input type='button' value='Retry' onClick='history.go(-1)'></center>";}
     } 
	}
	if ($student == '2'){

		if (isset($_REQUEST['roll'])){
			$roll = $_REQUEST['roll'];
			
			$sql = mysql_query("delete from login where username='$roll'");
			if (!$sql){
				header('location:'.$_SERVER['HTTP_REFERER']);
			}else {
				$sql = mysql_query("delete from student where rollno='$roll'");
				header('location:'.$_SERVER['HTTP_REFERER']);
			}
		}
	
	}
}

if (isset($_REQUEST['per'])){
	
	$per = $_REQUEST['per'];
	if ($per == '1'){
		mysql_query("update student set status=1");
		
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
	if ($per == '0'){
		mysql_query("update student set status=0");
		
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
}