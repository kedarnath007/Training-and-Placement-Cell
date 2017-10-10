<?php
session_start();
if (isset($_SESSION['placement_role_id'])){
	if (isset($_SESSION['placement_username'])){
		$role_id  = $_SESSION['placement_role_id'];
		$username = $_SESSION['placement_username'];
		include 'config.php';


$rollno = $_SESSION['placement_username'];
//echo $rollno;

if (isset($_POST['academic'])){
	$academic    = $_POST['academic'];
}

$graduation = $_POST['grad'];

if (isset($_POST['bsem'])){
	$bsem    = $_POST['bsem'];	
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

//$dob = date('Y-m-d',$dob1);

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
if (isset($_POST['first']))
{
	$first = $_POST['first'];
	
}
if (isset($_POST['twoone']))
{
	$twoone = $_POST['twoone'];
	
}
if (isset($_POST['twotwo']))
{
	$twotwo = $_POST['twotwo'];

}
if (isset($_POST['threeone']))
{
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
	move_uploaded_file($photo_tmp , "images/".$photo);
}if (empty($photo))
	{
	$photo= 'sample.png';
	}

$btechtotal =  $_POST['btechaggregate'];
if ($graduation == 'mtech')
{
$mtechtotal = $_POST['mtechaggregate'];
}
else 
{
	$mtechtotal = 0;
}
$insert = "insert into student values(null,'$academic','$rollno','$graduation','$bsem','$bbranch','$msem','$mbranch','$studentname','$fname','$mname','$dob','$localadd','$localpin','$permanentadd','$permanentpin','$studentmobile','$fathermobile','$email','$identification','$tenthper','$twelve','$inter','$diploma','$first','$twoone','$twotwo','$threeone','$threetwo','$fourone','$fourtwo','$btechtotal','$mfirst','$second','$third','$fourth','$mtechtotal','$bbacklog','$bpastback','$bactiveback','$mbacklog','$mpastback','$mactiveback','$photo',0,NOW())";
//echo $insert;
$sql = mysql_query($insert);

if (!$sql){
	header('location:'.$_SERVER['HTTP_REFERER'].'&msg=0');
}else {

	$sql = mysql_query("select id from student where studentname='$studentname' and fathername='$fname' and email='$email'");
	while ($row = mysql_fetch_assoc($sql)){

		$std_id = $row['id'];

	}

		if (isset($_FILES['tenthmark']['name'])){
			$file_name1 = $_FILES['tenthmark']['name'];
			$file_tmp1 =$_FILES['tenthmark']['tmp_name'];
        }
        if (isset($_FILES['intermark']['name'])){
        	$file_name2 = $_FILES['intermark']['name'];
        	$file_tmp2 =$_FILES['intermark']['tmp_name'];
        }
        if (isset($_FILES['diplomamark']['name'])){
        	$file_name3 = $_FILES['diplomamark']['name'];
        	$file_tmp3 =$_FILES['diplomamark']['tmp_name'];
        }
        if (isset($_FILES['bfirstmark']['name'])){
        	$file_name4 = $_FILES['bfirstmark']['name'];
        	$file_tmp4 =$_FILES['bfirstmark']['tmp_name'];
        }
        if (isset($_FILES['twoonemark']['name'])){
        	$file_name5 = $_FILES['twoonemark']['name'];
        	$file_tmp5 =$_FILES['twoonemark']['tmp_name'];
        }
	if (empty($file_name5))
	{
	$file_name5= 'certificate.png';
	}
        if (isset($_FILES['twotwomark']['name'])){
        	$file_name6 = $_FILES['twotwomark']['name'];
        	$file_tmp6 =$_FILES['twotwomark']['tmp_name'];
        }
	if (empty($file_name6))
	{
	$file_name6= 'certificate.png';
	}
        if (isset($_FILES['threeonemark']['name'])){
        	$file_name7 = $_FILES['threeonemark']['name'];
        	$file_tmp7 =$_FILES['threeonemark']['tmp_name'];
        }
	if (empty($file_name7))
	{
	$file_name7= 'certificate.png';
	}
        if (isset($_FILES['threetwomark']['name'])){
        	$file_name8 = $_FILES['threetwomark']['name'];
        	$file_tmp8 =$_FILES['threetwomark']['tmp_name'];
        }
	if (empty($file_name8))
	{
	$file_name8= 'certificate.png';
	}
        if (isset($_FILES['fouronemark']['name'])){
        	$file_name9 = $_FILES['fouronemark']['name'];
        	$file_tmp9 =$_FILES['fouronemark']['tmp_name'];
        }
	if (empty($file_name9))
	{
	$file_name9= 'certificate.png';
	}
        if (isset($_FILES['fourtwomark']['name'])){
        	$file_name10 = $_FILES['fourtwomark']['name'];
        	$file_tmp10 =$_FILES['fourtwomark']['tmp_name'];
        }
	if (empty($file_name10))
	{
	$file_name10= 'certificate.png';
	}
        if (isset($_FILES['mfirstmark']['name'])){
        	$file_name11 = $_FILES['mfirstmark']['name'];
        	$file_tmp11 =$_FILES['mfirstmark']['tmp_name'];
        }
        if (isset($_FILES['secondmark']['name'])){
        	$file_name12 = $_FILES['secondmark']['name'];
        	$file_tmp12 =$_FILES['secondmark']['tmp_name'];
        }
        if (isset($_FILES['thirdmark']['name'])){
        	$file_name13 = $_FILES['thirdmark']['name'];
        	$file_tmp13 =$_FILES['thirdmark']['tmp_name'];
        }
        if (isset($_FILES['fourthmark']['name'])){
        	$file_name14 = $_FILES['fourthmark']['name'];
        	$file_tmp14 =$_FILES['fourthmark']['tmp_name'];
        }
			
        $file = "INSERT into certificates VALUES(null,$std_id,'$rollno','$file_name1','$file_name2','$file_name3','$file_name4','$file_name5','$file_name6','$file_name7','$file_name8','$file_name9','$file_name10','$file_name11','$file_name12','$file_name13','$file_name14',NOW())";

           // echo $file;
            $query=mysql_query($file);
            
			if (!$query){
                    header('location:'.$_SERVER['HTTP_REFERER']);
			}else {
				
				move_uploaded_file($file_tmp1 , "images/".$file_name1);
				move_uploaded_file($file_tmp2 , "images/".$file_name2);
				move_uploaded_file($file_tmp3 , "images/".$file_name3);
				move_uploaded_file($file_tmp4 , "images/".$file_name4);
				move_uploaded_file($file_tmp5 , "images/".$file_name5);
				move_uploaded_file($file_tmp6 , "images/".$file_name6);
				move_uploaded_file($file_tmp7 , "images/".$file_name7);
				move_uploaded_file($file_tmp8 , "images/".$file_name8);
				move_uploaded_file($file_tmp9 , "images/".$file_name9);
				move_uploaded_file($file_tmp10 , "images/".$file_name10);
				move_uploaded_file($file_tmp11 , "images/".$file_name11);
				move_uploaded_file($file_tmp12 , "images/".$file_name12);
				move_uploaded_file($file_tmp13 , "images/".$file_name13);
				move_uploaded_file($file_tmp14 , "images/".$file_name14);
				
				header('location:'.$_SERVER['HTTP_REFERER']);
			}
			header('location:'.$_SERVER['HTTP_REFERER']);
}
	}else {
header('location:login.php');
}
}else {
header('location:login.php');
}