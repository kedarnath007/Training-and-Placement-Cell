<?php
session_start();
$username = $_SESSION['placement_username'];
include 'config.php';

//echo $username;



if (isset($_GET['selectfrom'])){
	foreach ($_GET['selectfrom'] as $selectedOption){
		//echo $selectedOption."<br>";
	$sss = mysql_query("select * from select2 where select_id='$selectedOption'");
	$count = mysql_num_rows($sss);
	//echo $count;
	if ($count == 0){
	$sql1="insert into select2 values(null,$selectedOption,'$username')";
	//echo $sql1;
	$sql = mysql_query($sql1);
	}
	}
	header('location:'.$_SERVER['HTTP_REFERER']);
}

if (isset($_GET['selectto'])){
	foreach ($_GET['selectto'] as $selectedOption){
		//echo $selectedOption."<br>";
		
			$sql = mysql_query("delete from select2 where select_id='$selectedOption'");
		
	}
	header('location:'.$_SERVER['HTTP_REFERER']);
}