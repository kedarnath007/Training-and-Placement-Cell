<?php
session_start();
if (isset($_SESSION['placement_role_id'])){
	if (isset($_SESSION['placement_username'])){
		$role_id  = $_SESSION['placement_role_id'];
		if ($role_id == '3'){
		$username = $_SESSION['placement_username'];
		include 'config.php';
		?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/select.js"></script>
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
	$sql = mysql_query("select * from student where rollno='$username'");
	$count = mysql_num_rows($sql);
	while ($row = mysql_fetch_assoc($sql)){
		$id = $row['id'];
	}
	if ($count == '0'){
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
	
	<form action="forminsert.php" method="post"
		enctype="multipart/form-data" align="left">
		
		<div>
			&nbsp<label>Academic Year:&nbsp</label><select name="academic">
				<option value="">Select Academic Year</option>
				<?php 
				$sql1 = mysql_query("select year from academic");
				while ($row1 = mysql_fetch_assoc($sql1)){
				?>
				<option value="<?php echo $row1['year'];?>"><?php echo $row1['year'];?></option>
				<?php 				
				}
				?>
			</select>
		</div>
		<div>
			&nbsp<label>Qualification:</label>&nbsp<select id="selectField" name="grad">
				<option value="btech">B.Tech</option>
				<option value="mtech">M.Tech</option>
			</select>
		</div>
		<div class="box" id="btech">
			
			&nbsp<label>Branch</label>
		
				<select name="bbranch">
					<option value=" ">Select</option>
					<option value="cse">CSE</option>
					<option value="ece">ECE</option>
					<option value="eee">EEE</option>
					<option value="it">IT</option>
					<option value="mech">MECH</option>
					<option value="civil">CIVIL</option>
				</select>
		&nbsp<label>Current Semister</label>
				<select name="bsem">
					<option value=" ">Select</option>
					<option value="first">1st year</option>
					<option value="twoone">2-1</option>
					<option value="twotwo">2-2</option>
					<option value="threeone">3-1</option>
					<option value="threeotwo">3-2</option>
					<option value="fourone">4-1</option>
					<option value="fourtwo">4-2</option>
				</select>
		</div>
		<div class="box" id="mtech">
			
		&nbsp	<label>Branch</label>
			
				<select name="mbranch">
					<option value=" ">Select</option>
					<option value="cse">CSE</option>
					<option value="ece">ECE</option>
					<option value="eee">EEE</option>

				</select>
			&nbsp<label>Current Semister</label>
			
				<select name="msem">
					<option value=" ">Select</option>
					<option value="first">1st Semister</option>
					<option value="second">2nd Semister</option>
					<option value="third">3rd Semister</option>
					<option value="fourth">4th Semister</option>
				</select>
			
			
		</div>
			
		&nbsp<label>Upload Photo</label>
		
			<input type="file" name="photo" id="photo">
		
                 <div>&nbsp<label>Student Name:</label>
		
                       <input type="text" name="name" id="name">
                 </div>
                 <div>
		&nbsp<label>Father's Name:</label>
		
			<input type="text" name="fathername" id="fathername">
	            </div>	
                 <div>
		&nbsp<label>Mother's Name:</label>
		
			<input type="text" name="mothername" id="mothername">
	          </div>	
                 <div>
		&nbsp<label>Date of Birth</label>
		
			<input type="text" name="dob" id="dob">
			(YYYY-MM-DD)
                  </div>
	
	&nbsp	<label>Local Address</label><div>
		
			<textarea cols="20" rows="5" name="localadd"></textarea>
	</div>
                     	
		&nbsp<label>Pin Code</label>
		
			<input type="text" name="localpin" id="localpin">
		
            <div>
             &nbsp  <label>Permanent Address</label><div>
		
			<textarea cols="20" rows="5" name="permanentadd"></textarea>
                   </div>
		&nbsp<label>Pin Code</label>
		
			<input type="text" name="permanentpin" id="permanentpin">
		</div>
                    <div>
		&nbsp<label>Mobile No(Student)</label>
		
			<input type="text" name="studentmobile" id="studentmobile">
		</div>
               <div>
		&nbsp<label>Father's Mobile No</label>
		
			<input type="text" name="fathermobile" id="fathermobile">
		</div>
<div>
		&nbsp<label>Email</label>
		
			<input type="text" name="email" id="email">
		</div>
<div>
		&nbsp<label>Identification Mark</label>
		
			<input type="text" name="identification" id="identification">
	</div>
<div>	
		&nbsp<label>10th Class(%)</label>
	
			<input type="text" name="tenth" id="tenth">
		</div>
<div>
		&nbsp<label>Select(12th Class)</label>
	
			<select name="twelve" id="selectField1">
				<option value="inter">Inter</option>
				<option value="diploma">Diploma</option>
			</select>
		</div>
		<div id="inter" class="box1">
		&nbsp	<label>Inter(%)</label>
			
				<input type="text" name="inter" id="inter">
			
			<div>
				<b>B.Tech</b>
			</div>
			&nbsp<label>1st Year(%)</label>
			
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="first" id="first">
			
		</div>
		<div id="diploma" class="box1">
		&nbsp	<label>Diploma(%)</label>
			
				<input type="text" name="diploma" id="diploma">
			
			<div>
				<b>B.Tech</b>
			</div>
		</div>
		&nbsp<label>2-1 Semister(%)</label>
		
			<input type="text" name="twoone" id="twoone">
		<div>
		&nbsp<label>2-2 Semister(%)</label>
		
			<input type="text" name="twotwo" id="twotwo">
		</div><div>
		&nbsp<label>3-1 Semister(%)</label>
		
			<input type="text" name="threeone" id="threeone">
		</div><div>
		&nbsp<label>3-2 Semister(%)</label>
		
			<input type="text" name="threetwo" id="threetwo">
		</div><div>
		&nbsp<label>4-1 Semister(%)</label>
		
			<input type="text" name="fourone" id="fourone">
		</div><div>
		&nbsp<label>4-2 Semister(%)</label>
		
			<input type="text" name="fourtwo" id="fourtwo">
		</div><div>
		&nbsp<label>btech aggregate(%)</label>
		
			<input type="text" name="btechaggregate" id="btechaggregate">
		</div><div>
		
			<b>M.Tech</b>
		</div><div>
		&nbsp<label>1st Semister(%)</label>
		
			<input type="text" name="mfirst" id="mfirst">
		</div><div>
	&nbsp	<label>2nd Semister(%)</label>
		
			<input type="text" name="second" id="second">
		</div><div>
	&nbsp	<label>3rd Semister(%)</label>
		
			<input type="text" name="third" id="third">
		</div><div>
		&nbsp<label>4th Semister(%)</label>
		
			<input type="text" name="fourth" id="fourth">
		</div><div>
		&nbsp<label>Mtech Aggregate(%)</label>
		
			<input type="text" name="mtechaggregate" id="mtechaggregate">
		</div><div>
		&nbsp<label>Backlogs(B.tech)</label>
		
			<select name="bbacklog" id="selectField2">
				<option value="no">NO</option>
				<option value="past">Past</option>
				<option value="active">Active</option>
			</select>
		</div><div>
		<b id="no" class="box2"></b>
		<div id="past" class="box2">
		&nbsp	<label>No.of Backlogs</label>
			
				<input type="text" name="bpastback" id="bpastback">
			</div>
		</div><div>
		<div id="active" class="box2">
		&nbsp	<label>No.of Backlogs</label>
			
				<input type="text" name="bactiveback" id="bactiveback">
			</div>
		</div>
	
<div>
		&nbsp<label>Backlogs(M.tech)</label>
		
			<select name="mbacklog" id="selectField3">
				<option value="mno">NO</option>
				<option value="mpast">Past</option>
				<option value="mactive">Active</option>
			</select>
		</div><div>
		<b id="mno" class="box3"></b>
		<div id="mpast" class="box3">
		&nbsp	<label>No.of Backlogs</label>
			
				<input type="text" name="mpastback" id="mpastback">
			</div>
		</div><div>
		<div id="mactive" class="box3">
		&nbsp	<label>No.of Backlogs</label>
		
				<input type="text" name="mactiveback" id="mactiveback">
			</div>
		</div><div>
		&nbsp<label>10th Marksheet</label>
		
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="file" name="tenthmark" />
		</div><div>
		&nbsp<label>12th(Inter) Marksheet</label>
		
			<input type="file" name="intermark" />
		</div><div>
		&nbsp<label>Diploma Marksheet</label>
		
			<input type="file" name="diplomamark" />
		</div>
		<div>
			<b>B.Tech</b>
		</div><div>
		&nbsp<label>1st Year Marksheet</label>
		
			<input type="file" name="bfirstmark" />
		</div><div>
		&nbsp<label>2-1 Marksheet</label>
		
			<input type="file" name="twoonemark" />
		</div><div>
		&nbsp<label>2-2 Marksheet</label>
		
			<input type="file" name="twotwomark" />
		</div><div>
		&nbsp<label>3-1 Marksheet</label>
		
			<input type="file" name="threeonemark" />
		</div><div>
		&nbsp<label>3-2 Marksheet</label>
		
			<input type="file" name="threetwomark" />
		</div><div>
		&nbsp<label>4-1 Marksheet</label>
		
			<input type="file" name="fouronemark" />
		</div><div>
		&nbsp<label>4-2 Marksheet</label>
		
			<input type="file" name="fourtwomark" />
		</div><div>
		
			<b>M.Tech</b>
		</div><div>
		&nbsp<label>1st Sem Marksheet</label>
		
			<input type="file" name="mfirstmark" />
		</div><div>
		&nbsp<label>2nd Sem Marksheet</label>
		
			<input type="file" name="secondmark" />
		</div><div>
		&nbsp<label>3rd SemMarksheet</label>
		
			<input type="file" name="thirdmark" />
		</div><div>
		&nbsp<label>4th  Sem Marksheet</label>
		
			<input type="file" name="fourthmark" />
		</div align="center">
		<br> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit">
	</form>
	<?php 
	}else {
		header("location:studentdetails.php?id=$id&roll=$username");
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