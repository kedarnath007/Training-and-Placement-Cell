<?php
session_start();
if (isset($_SESSION['placement_role_id'])){
	if (isset($_SESSION['placement_username'])){
		$role_id  = $_SESSION['placement_role_id'];
		$username = $_SESSION['placement_username'];
		include 'config.php';

$data = $_REQUEST['data'];
if ($data == 'details'){	
$rollno = $_SESSION['placement_username'];
//echo $rollno;
$graduation = $_POST['grad'];

if (isset($_POST['bsem'])){
	$bsem1    = $_POST['bsem'];	
}

if (isset($_POST['bbranch'])){
	$bbranch = $_POST['bbranch'];
}

if (isset($_POST['msem'])){
	$msem    = $_POST['msem'];
}

if (isset($_POST['mbranch'])){
	$mbranch = $_POST['mbranch'];
}

$studentname = $_POST['name'];

$fname = $_POST['fathername'];

$mname = $_POST['mothername'];

$dob   = $_POST['dob'];

//$dob = date('Y-m-d',strtodate($dob1));

$localadd = $_POST['localadd'];

$localpin = $_POST['localpin'];

$permanentadd = $_POST['permanentadd'];

$permanentpin = $_POST['permanentpin'];

$studentmobile= $_POST['studentmobile'];

$fathermobile = $_POST['fathermobile'];

$email = $_POST['email'];

$identification = $_POST['identification'];

$tenthper = $_POST['tenth'];

$twelve = $_POST['twelve'];

if (isset($_POST['inter'])){
	$inter  = $_POST['inter'];
}

if (isset($_POST['diploma'])){
	$diploma = $_POST['diploma'];
}

if (isset($_POST['first'])){
	$first = $_POST['first'];
}
if (isset($_POST['twoone'])){
$twoone = $_POST['twoone'];
}
if (isset($_POST['twotwo'])){
$twotwo = $_POST['twotwo'];
}
if (isset($_POST['threeone'])){
	$threeone = $_POST['threeone'];
}

if (isset($_POST['threetwo'])){
	$threetwo = $_POST['threetwo'];
	
}

if (isset($_POST['fourone'])){
	$fourone  = $_POST['fourone'];
	
}

if (isset($_POST['fourtwo'])){
	$fourtwo  = $_POST['fourtwo'];
	
}

if (isset($_POST['mfirst'])){
	$mfirst   = $_POST['mfirst'];
	
}

if (isset($_POST['second'])){
	$second   = $_POST['second'];
}

if (isset($_POST['third'])){
	$third    = $_POST['third'];
	
}

if (isset($_POST['fourth'])){
	$fourth   = $_POST['fourth'];

}

$bbacklog = $_POST['bbacklog'];
if (isset($_POST['bpastback'])){
	$bpastback= $_POST['bpastback'];
}

if (isset($_POST['bactiveback'])){
	$bactiveback = $_POST['bactiveback'];
	
}

if (isset($_POST['mbacklog'])){
	$mbacklog = $_POST['mbacklog'];
}

if (isset($_POST['mpastback'])){
	$mpastback= $_POST['mpastback'];
}

if (isset($_POST['mactiveback'])){
	$mactiveback = $_POST['mactiveback'];
}

if (isset($_FILES['photo']['name'])){
	$photo = $_FILES['photo']['name'];
	$photo_tmp =$_FILES['photo']['tmp_name'];
}else {
	$photo = 'sample.png';
}

//echo $msem;

$btechtotal = $_POST['btechaggregate'];
if ($graduation == 'mtech'){
$mtechtotal = $_POST['mtechaggregate'];
}else {
	$mtechtotal = 0;
}
$insert = "update student set graduation='$graduation',btechsem='$bsem1',btechbranch='$bbranch',mtechsem='$msem',mtechbranch='$mbranch',studentname='$studentname',fathername='$fname',mothername='$mname',dob='$dob',localadd='$localadd',localpin='$localpin',permanentadd='$permanentadd',permanentpin='$permanentpin',studentmobile='$studentmobile',fathermobile='$fathermobile',email='$email',identification='$identification',10th='$tenthper',12th='$twelve',inter='$inter',diploma='$diploma',btech1st='$first',btech21='$twoone',btech22='$twotwo',btech31='$threeone',btech32='$threetwo',btech41='$fourone',btech42='$fourtwo',btechtotal='$btechtotal',mtech1='$mfirst',mtech2='$second',mtech3='$third',mtech4='$fourth',mtechtotal='$mtechtotal',bbacklog='$bbacklog',bpastbacklog='$bpastback',bactivebacklog='$bactiveback',mbacklog='$mbacklog',mpastbacklog='$mpastback',mactivebacklog='$mactiveback' where rollno='$username'";
//echo $insert;
$sql = mysql_query($insert);

if (!$sql){
	//echo 'no';
	header('location:'.$_SERVER['HTTP_REFERER'].'?msg=0');
}else {
	
			header('location:'.$_SERVER['HTTP_REFERER'].'?msg=1'); 
}
}
if ($data == 'images'){
	
	if(isset($_FILES['fileBrowser']))
	{
		$val = $_POST['value'];
		$errors= array();
		$file_name = $_FILES['fileBrowser']['name'];
		$file_size =$_FILES['fileBrowser']['size'];
		$file_tmp =$_FILES['fileBrowser']['tmp_name'];
		$file_type=$_FILES['fileBrowser']['type'];
		$explode=explode('.',$_FILES['fileBrowser']['name']);
		$end = end($explode);
		$file_ext=strtolower($end);
		$expensions= array("jpeg","jpg","png","gif");
		if(in_array($file_ext,$expensions)=== false){
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		if($file_size > 20971520){
			$errors[]='File size must be excately 20 MB';
		}
		if(empty($errors)==true){
			$sql = "update certificates set $val='$file_name' where rollno='$username'";
			//echo $sql;
			$result = mysql_query($sql);
			if (!$sql){
				header('location:'.$_SERVER['HTTP_REFERER']);
			}else {
				move_uploaded_file($file_tmp,"images/".$file_name);
				header('location:'.$_SERVER['HTTP_REFERER']);
			}
			
			
		}else{
			print_r($errors);
		}
	}
}
if ($data == 'delete'){
	$val = $_REQUEST['val'];
	$sql = mysql_query("update certificates set $val=''");
	header('location:'.$_SERVER['HTTP_REFERER']);
}
	}else {
header('location:'.$_SERVER['HTTP_REFERER']);
}
}else {
header('location:'.$_SERVER['HTTP_REFERER']);
}