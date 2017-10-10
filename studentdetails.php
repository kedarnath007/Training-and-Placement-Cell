<?php
session_start();
if (isset($_SESSION['placement_role_id'])){
	if (isset($_SESSION['placement_username'])){
		$role_id  = $_SESSION['placement_role_id'];
	//if ($role_id == '3'){
		$username = $_SESSION['placement_username'];
		include 'config.php';
?>
<html>
<head>
<link href="css/popup.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="website.css"></link>
<link rel="stylesheet" type="text/css" href="website1.css"></link>
</head>
<body>
	<center>
	<div class="page">
	<div class="header">
        <h1>MAHATMA GANDHI INSTITUTE OF TECHNOLOGY</h1><br>
	<h3>Training & Placement Cell</h3>

		<div class=sublinks>
			
			<a href="contact.html">Contact  us</a>&nbsp
			<a href="gallery.html">Gallery</a>
			 <br>
			
		</div>
	</div>
	<div class="linkspart"><strong>
		<a href="index.html">Home  </a>&nbsp

		<a href="reachingmgit.html">About  </a>&nbsp
		<a href="map.html">Reaching MGIT </a>&nbsp
		<a href="ourrecruiters.html">OurRecruiters  </a>&nbsp
		<a href="brouchers.html">Brouchers  </a>&nbsp
		<a href="placementproceedure.html">PlacementProceedure</a>&nbsp</strong>
	</div>
	</div>
	<div class="bodypart1">
<?php 

$id = $_REQUEST['id'];
$roll = $_REQUEST['roll'];

$sql = mysql_query("select * from student where id='$id' and rollno='$roll'");
?>
	<!-- PopUp3 Window-->

	<a href="#x" class="overlay" id="join_form"></a>
	<div class="popup">

		<form action="changepassword.php" method="post">
			<div class="modal-header" align="center">
				<h3>Change Password</h3>
			</div>
			<div class="modal-body" style="min-height: 100px" align="center">
			
			<div class="control-group">
					<label class="control-label">Old Password</label>

					<div class="controls">
						<input type="password" class="input-large" name="oldpass">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">Enter New Password</label>

					<div class="controls">
						<input type="password" class="input-large" name="newpass">
					</div>
				</div>

				<div class="space10"></div>
				
				<div class="control-group">
					<label class="control-label">Re-Enter Password</label>

					<div class="controls">
						<input type="password" class="input-large" name="renewpass">
					</div>
				</div>
			</div>
			<div class="modal-footer" align="center">
				<button type="submit" class="btn btn-success">Change</button>
			</div>
			<?php 
			$msg=isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
			if ($msg == '3'){
				echo "<b>Old password Incorrect</b>";
			}
			if ($msg == '4'){
				echo "<b>Password Doesn't Match</b>";
			}
			if ($msg == '5'){
				echo "<b>Password Changing Failed</b>";
			}
			if ($msg == '6'){
				echo "<b>Password Successfully Changed</b>";
			}			
			?>
		</form>
		<a class="close" href="#close"></a>
	</div>
	<!-- End PopUp3 Window-->
	
	<div >
		<div>
		<table border="0" width="100%" cellpadding="5" cellspacing="0">

<td class="uitop_menu" align="right">
<style type="text/css">
.vline { background-color: #404040; width: 2px; height: 20px; vertical-align: middle; }
.menu_name { color:#404040 !important; font-weight: bold; }
</style>
<table border="0" cellspacing="2">
    <tr>
        
                
        <td><a href="#join_form" id="join_pop"><span class="menu_name">Change Password</span></a></td>
                
        
                <td><div class="vline"></div></td>
        <td><a href="logout.php"><span class="menu_name">Log Out</span></a></td>
    </tr>
</table>

										</td>
			</tr>
		</table>
	</div>
	<div class="clr"></div>
	</div>
<h2>Personal Details :</h2>
<?php 
while ($row = mysql_fetch_assoc($sql)){
$status = $row['status'];
if ($role_id == '3'){
if ($status == '1'){
?>

<a href="editdetails.php">Edit Details</a>
<?php 
} 
}
?>
<div>
<img alt="" src="images/<?php echo $row['photo'];?>" height="100px" width="100px">
</div>
<table>

<tr>
<td>Student Name</td>
<td>:</td>
<td><?php echo $row['studentname'];?></td>
</tr>
<tr>
<td>Father's Name</td>
<td>:</td>
<td><?php echo $row['fathername'];?></td>
</tr>
<tr>
<td>Mother's Name</td>
<td>:</td>
<td><?php echo $row['mothername'];?></td>
</tr>
<tr>
<td>Email Id</td>
<td>:</td>
<td><?php echo $row['email'];?></td>
</tr>
<tr>
<td>Student Mobile Number</td>
<td>:</td>
<td><?php echo $row['studentmobile'];?></td>
</tr>
<tr>
<td>Father Mobile Number</td>
<td>:</td>
<td><?php echo $row['fathermobile'];?></td>
</tr>
<tr>
<td>Date Of Birth</td>
<td>:</td>
<td><?php echo $row['dob'];?></td>
</tr>
</table>
<?php 
}
?>
<h2>Academic Details :</h2>
<?php
$sql9 = mysql_query("select * from student where id='$id' and rollno='$roll'");
while ($row9 = mysql_fetch_assoc($sql9)){
?>
<table>
<tr>
<td>Tenth</td>
<td>:</td>
<td><?php echo $row9['10th'];?>%</td>
</tr>
<tr>
<?php 
if ($row9['inter'] != NULL || $row9['inter'] != ''){
?>
<td>Intermediate</td>
<td>:</td>
<td><?php echo $row9['inter'];?>%</td>
</tr>
<?php
}
?>
<tr>
<?php 
if ($row9['diploma'] != NULL || $row9['diploma'] != ''){
?>
<td>Diploma</td>
<td>:</td>
<td><?php echo $row9['diploma'];?>%</td>
</tr>
<tr>
<?php
} 
if ($row9['btech1st'] != NULL || $row9['btech1st'] != ''){
?>
<td>B.Tech 1st year</td>
<td>:</td>
<td><?php echo $row9['btech1st'];?>%</td>
</tr>
<?php
} 
if ($row9['btech21'] != NULL || $row9['btech21'] != ''){
?>
<td>B.Tech 2-1</td>
<td>:</td>
<td><?php echo $row9['btech21'];?>%</td>
</tr>
<?php
} 
if ($row9['btech22'] != NULL || $row9['btech22'] != ''){
?>
<td>B.Tech 2-2</td>
<td>:</td>
<td><?php echo $row9['btech22'];?>%</td>
</tr>
<?php
} 
if ($row9['btech31'] != NULL || $row9['btech31'] != ''){
?>
<td>B.Tech 3-1</td>
<td>:</td>
<td><?php echo $row9['btech31'];?>%</td>
</tr>
<?php
} 
if ($row9['btech32'] != NULL || $row9['btech32'] != ''){
?>
<td>B.Tech 3-2</td>
<td>:</td>
<td><?php echo $row9['btech32'];?>%</td>
</tr>
<?php
} 
if ($row9['btech41'] != NULL || $row9['btech41'] != ''){
?>
<td>B.Tech 4-1</td>
<td>:</td>
<td><?php echo $row9['btech41'];?>%</td>
</tr>
<?php
} 
if ($row9['btech42'] != NULL || $row9['btech42'] != ''){
?>
<td>B.Tech 4-2</td>
<td>:</td>
<td><?php echo $row9['btech42'];?>%</td>
</tr>
<?php
} 
if ($row9['btechtotal'] != NULL || $row9['btechtotal'] != ''){
?>
<td><strong>B.Tech Aggregate</strong></td>
<td>:</td>
<td><?php echo $row9['btechtotal'];?>%</td>
</tr>
<?php
}
?>
</table>
<?php 
}
?>
<h2>Acadamic Documents :</h2>
<?php 
$sql1 = mysql_query("select * from certificates where student_id='$id' and rollno='$roll'");
while ($row1 = mysql_fetch_assoc($sql1)){
?>

<table>
<tr>
<?php 
if ($row1['10th'] != NULL || $row1['10th'] != ''){
?>

<td><label> 10th </label><a href="images/<?php echo $row1['10th'];?>"><img alt="" src="images/<?php echo $row1['10th'];?>" height="150" width="150"></a></td>
<?php 
} 
if ($row1['inter'] != NULL || $row1['inter'] != ''){
?>
<td><label>Intermediate</label><a href="images/<?php echo $row1['inter'];?>"><img alt="" src="images/<?php echo $row1['inter'];?>" height="150" width="150"></a></td>
<?php 
} 
if ($row1['diploma'] != NULL || $row1['diploma'] != ''){
?>
<td><label> diploma</label><a href="images/<?php echo $row1['diploma'];?>"><img alt="" src="images/<?php echo $row1['diploma'];?>" height="150" width="150"></a></td></tr>
<?php 
}
if ($row1['b1st'] != NULL || $row1['b1st'] != ''){
?>
<tr><td><label>B.tech 1st year</label><a href="images/<?php echo $row1['b1st'];?>"><img alt="" src="images/<?php echo $row1['b1st'];?>" height="150" width="150"></a></td></tr>
<?php 
}
if ($row1['b21'] != NULL || $row1['b21'] != ''){
	?>
<tr><td><label>B.tech 2-1</label><a href="images/<?php echo $row1['b21'];?>"><img alt="" src="images/<?php echo $row1['b21'];?>" height="150" width="150"></a></td>
<?php 
}
?>
<?php 
if ($row1['b22'] != NULL || $row1['b22'] != ''){
	?>
<td><label>B.tech 2-2</label><a href="images/<?php echo $row1['b22'];?>"><img alt="" src="images/<?php echo $row1['b22'];?>" height="150" width="150"></a></td></tr>
<?php 
}
if ($row1['b31'] != NULL || $row1['b31'] != ''){
	?>
<tr><td><label>B.tech 3-1</label><a href="images/<?php echo $row1['b31'];?>"><img alt="" src="images/<?php echo $row1['b31'];?>" height="150" width="150"></a></td>
<?php 
}
if ($row1['b32'] != NULL || $row1['b32'] != ''){
	?>
<td><label>B.tech 3-2</label><a href="images/<?php echo $row1['b32'];?>"><img alt="" src="images/<?php echo $row1['b32'];?>" height="150" width="150"></a></td></tr>
<?php 
}
if ($row1['b41'] != NULL || $row1['b41'] != ''){
	?>
<tr><td><label>B.tech 4-1</label><a href="images/<?php echo $row1['b41'];?>"><img alt="" src="images/<?php echo $row1['b41'];?>" height="150" width="150"></a></td>
<?php 
}
?>
<?php
if ($row1['b42'] != NULL || $row1['b42'] != ''){
	?>
<td><label>B.tech 4-2</label><a href="images/<?php echo $row1['b42'];?>"><img alt="" src="images/<?php echo $row1['b42'];?>" height="150" width="150"></a></td></tr>

<?php 
}
if ($row1['m1st'] != NULL || $row1['m1st'] != ''){
	?>
<tr><td><label>Mtech 1st year</label><a href="images/<?php echo $row1['m1st'];?>"><img alt="" src="images/<?php echo $row1['m1st'];?>" height="150" width="150"></a></td>
<?php 
}

if ($row1['m2nd'] != NULL || $row1['m2nd'] != ''){
	?>
<td><label>Mtech 2nd year</label><a href="images/<?php echo $row1['m2nd'];?>"><img alt="" src="images/<?php echo $row1['m2nd'];?>" height="150" width="150"></a></td></tr>
<?php 
}
if ($row1['m3rd'] != NULL || $row1['m3rd'] != ''){
	?>
<tr><td><label>Mtech 3rd year</label><a href="images/<?php echo $row1['m3rd'];?>"><img alt="" src="images/<?php echo $row1['m3rd'];?>" height="150" width="150"></a></td>
<?php 
}
if ($row1['m4th'] != NULL || $row1['m4th'] != ''){
	?>
<td><label>Mtech 4th year</label><a href="images/<?php echo $row1['m4th'];?>"><img alt="" src="images/<?php echo $row1['m4th'];?>" height="150" width="150"></a></td></tr>
<?php 
}
?>

</table><br><br>
</div>
</body>
</html>
<?php 
}
//}else {
	//header('location:login.php');
//}
}else {
	header('location:login.php');
}
}else {
	header('location:login.php');
}
?>