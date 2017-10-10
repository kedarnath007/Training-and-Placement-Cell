<?php
session_start();
if (isset($_SESSION['placement_role_id'])){
	if (isset($_SESSION['placement_username'])){
		$role_id  = $_SESSION['placement_role_id'];
		if ($role_id == '1'){
		$username = $_SESSION['placement_username'];
		include 'config.php';
		?>
<html>
<head>
<link href="css/popup.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="website.css"></link>
<link rel="stylesheet" type="text/css" href="website1.css"></link>
</head>
<body onload="javascript:hideTable()">
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
	<div class="bodypart1">

	<!-- PopUp1 Window-->

	<a href="#x" class="overlay" id="join_form1"></a>
	<div class="popup">

		<form action="add.php?student=1" method="post">
			<div class="modal-header" align="center">
				<h3>Add Student</h3>
			</div>
			<div class="modal-body" style="min-height: 100px" align="center">
				<div class="control-group">
					<label class="control-label">Enter Username(College Id)</label>

					<div class="controls">
						<input type="text" class="input-large" name="suname">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">Enter Email</label>

					<div class="controls">
						<input type="text" class="input-large" name="email">
					</div>
				</div>

				<div class="space10"></div>
			</div>
			<div class="modal-footer" align="center">
				<button type="submit" class="btn btn-success">Add</button>
			</div>
			<?php 
			$msg=isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
			
			if ($msg == '2'){
				echo "<b>Student Addition Failed</b>";
			}			
			if ($msg == '8'){
				echo "<b>Password didnot Match</b>";
			}
			if ($msg == '9'){
				echo "<b>Wrong password entered</b>";
			}
			?>
		</form>
		<a class="close" href="#close"></a>
	</div>
	<!-- End PopUp1 Window-->

	<!-- PopUp2 Window-->

	<a href="#x" class="overlay" id="join_form"></a>
	<div class="popup">

		<form action="add.php?placement=1" method="post">
			<div class="modal-header" align="center">
				<h3>Add Placement Officer</h3>
			</div>
			<div class="modal-body" style="min-height: 100px" align="center">
				<div class="control-group">
					<label class="control-label">Enter Username</label>

					<div class="controls">
						<input type="text" class="input-large" name="puname">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label">Enter Email</label>

					<div class="controls">
						<input type="text" class="input-large" name="email">
					</div>
				</div>

				<div class="space10"></div>
			</div>
			<div class="modal-footer" align="center">
				<button type="submit" class="btn btn-success">Add</button>
			</div>
			<?php 
			if ($msg == '1'){
				echo "<b>Placement Officer Successfully Added</b>";
			}
			if ($msg == '0'){
				echo "<b>Placement Officer Addition Failed</b>";
			}			
			?>
		</form>
		<a class="close" href="#close"></a>
	</div>
	<!-- End PopUp2 Window-->
	
		<!-- PopUp3 Window-->

	<a href="#x" class="overlay" id="join_form2"></a>
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
			if ($msg == '8'){
				echo "<b>Password Doesn't Match</b>";
			}
			if ($msg == '1'){
				echo "<b>Password Changing Failed</b>";
			}
			if ($msg == '2'){
				echo "<b>Password Successfully Changed</b>";
			}
			if ($msg == '9'){
				echo "<b>Wrong Password Entered</b>";
			}			
			?>
		</form>
		<a class="close" href="#close"></a>
	</div>
	<!-- End PopUp3 Window-->
	<div>
		<div>
		<table border="0" width="100%" cellpadding="5" cellspacing="0">

<td class="uitop_menu" align="right">
<style type="text/css">
.vline { background-color: #404040; width: 2px; height: 20px; vertical-align: middle; }
.menu_name { color:#404040 !important; font-weight: bold; }
</style>
<table border="0" cellspacing="2">
    <tr>
        
                
        <td><a href="#join_form2" id="join_pop"><span class="menu_name">Change Password</span></a></td>
                
        
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
	
	<div>
		
			<li><a href="<?php $_SERVER['PHP_SELF'];?>?student=1"> Manage
					Students</a></li>
			<li><a href="<?php $_SERVER['PHP_SELF'];?>?placement=1"> Manage Placement Officer</a>
			</li>
			<li><a href="add.php?per=1" onclick="return confirm('Are You Sure to Give Permission ?')">Give Permission to Edit Details</a>
			</li>
			<li><a href="add.php?per=0" onclick="return confirm('Are You Sure to Stop Permission ?')">Stop Permission to Edit Details</a>
			</li><br><br>
			
		
	</div>


	<?php 
	if (isset($_GET['student'])){
		?>
	<div>
		<a href="#join_form1" id="join_pop">Add New Student</a>
		<?php 
		$sql1 = mysql_query("select * from login where role_id=3 ORDER BY datetime DESC");
		$count1 = mysql_num_rows($sql1);
		if ($count1 !=0 ){
		?>
			<table>
			<thead>
				<tr>
					<th width="10px">S.No</th>
					<th>Student Name</th>
					<th>Father's Name</th>
					<th>Qualification</th>
					<th>Branch</th>
					<th>Current Semister</th>
					<th>Other</th>
				</tr>
			</thead>
		<?php
		$k=1;
		while ($row1 = mysql_fetch_assoc($sql1)){
			$rollno = $row1['username'];
		$sql = mysql_query("select * from student where rollno='$rollno'");
		$count = mysql_num_rows($sql);
		if ($count !=0 ){
			
			while ($row = mysql_fetch_assoc($sql)){
				$id   = $row['id'];
				$roll = $row['rollno'];
				$grad = $row['graduation'];
				?>

	
			<tbody>


				<tr class="">
					<td><?php echo $k;?></td>
					<td><?php echo $row['studentname'];?></td>
					<td><?php echo $row['fathername'];?></td>
					<td><?php echo $row['graduation'];?></td>
					<td><?php 
					if ($grad == 'btech'){
						echo $row['btechbranch'];
					}
					if ($grad == 'mtech'){
						echo $row['mtechbranch'];
					}
					?>
					</td>
					<td><?php 
					if ($grad == 'btech'){
						$bsem1 = $row['btechsem'];
						if ($bsem1 == 'first'){
							echo '1st Year';
						}
						if ($bsem1 == 'twoone'){
							echo '2-1';
						}
						if ($bsem1 == 'twotwo'){
							echo '2-2';
						}
						if ($bsem1 == 'threeone'){
							echo '3-1';
						}
						if ($bsem1 == 'threeotwo'){
							echo '3-2';
						}
						if ($bsem1 == 'fourone'){
							echo '4-1';
						}
						if ($bsem1 == 'fourtwo'){
							echo '4-2';
						}
					}
					if ($grad == 'mtech'){
						echo $row['mtechsem'];
					}
					?>
					</td>
					<td><a
						href="studentdetails.php?id=<?php echo $id;?>&roll=<?php echo $roll;?>">View
							Details</a>
						<a
						href="add.php?student=2&roll=<?php echo $roll;?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
					</td>
				</tr>


			</tbody>
		
		<?php 
			}
		}
		?>
	</div>
	<?php 
	$k++;
	}
	?>
	</table>
	<?php 
	}
	}
	if (isset($_REQUEST['placement'])){
	?>
	<a href="#join_form" id="join_pop">Add Placement Officer</a>
	<?php 
		$sql = mysql_query("select * from login where role_id=2 ORDER BY datetime DESC");
		
		?>
			<table>
			<thead>
				<tr>
					<th width="10px">S.No</th>
					<th>UserName</th>
					<th>Other</th>
				</tr>
			</thead>
			<tbody>
<?php 
$i=1;
while ($row = mysql_fetch_assoc($sql)){
	$pid = $row['id'];
?>

				<tr class="">
					<td><?php echo $i;?></td>
					<td><?php echo $row['username'];?></td>
					<td>
						<a
						href="add.php?placement=2&id=<?php echo $pid;?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
					</td>
				</tr>
<?php 
$i++;
}
?>

			</tbody>
		</table>
		<?php 
		
	}
?>
</div>
</body>
</html>
<?php 
		}else {
header('location:login.php');
}
}else {
header('location:login.php');
}
}else {
header('location:login.php');
}
?>