<?php
session_start();
if (isset($_SESSION['placement_role_id'])){
	if (isset($_SESSION['placement_username'])){
		$role_id  = $_SESSION['placement_role_id'];
		$username = $_SESSION['placement_username'];
		include 'config.php';
		?>
<html>
<head>
<link href="css/popup.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="website.css"></link>
<link rel="stylesheet" type="text/css" href="website1.css"></link>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/select.js"></script>
<style type="text/css">
		
p.small {
font-variant:small-caps;
}

</style>
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
		<a href="map.html">Reaching MGIT</a>&nbsp
		<a href="ourrecruiters.html">OurRecruiters  </a>&nbsp
		<a href="brouchers.html">Brouchers  </a>&nbsp
		<a href="placementproceedure.html">PlacementProceedure</a>&nbsp</strong>
	</div>
	</div>
	<div class="bodypart1">
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
<form action="update.php?data=details" method="post"
		enctype="multipart/form-data">
		<?php 
		$sql = mysql_query("select * from student where rollno='$username'");
		while ($row = mysql_fetch_assoc($sql)){
			$graduation = $row['graduation'];
			$bsem       = $row['btechsem'];
			$bbranch    = $row['btechbranch'];
			$msem       = $row['mtechsem'];
			$mbranch    = $row['mtechbranch'];
			$bbranch    = $row['btechbranch'];
			$twelve     = $row['12th'];
			$bbacklog   = $row['bbacklog'];
			$mbacklog   = $row['mbacklog'];
			//echo $msem;         
		?>
		<label>Qualification</label>
		<div>
			<select id="selectField" name="grad">
			    <?php 
			    if ($graduation == 'btech'){
			    ?>
			    <option value="btech">B.Tech</option>
			    <option value="mtech">M.Tech</option>
			    <?php 
			    }else {
			    ?>
			    <option value="mtech">M.Tech</option>
			    <option value="btech">B.Tech</option>
			    <?php 
			    }
			    ?>
				
				
			</select>
		</div>
		<?php 
		//if ($graduation == 'btech'){
		?>
		<div class="box" id="btech">
		<label>Current Semister</label>
		<div>
			<select name="bsem">
			<?php 
			if ($bsem == 'first'){
			?>		
				<option value="first">1st year</option>
				<option value="twoone">2-1</option>
				<option value="twotwo">2-2</option>
				<option value="threeone">3-1</option>
				<option value="threeotwo">3-2</option>
				<option value="fourone">4-1</option>
				<option value="fourtwo">4-2</option>
			<?php 
			}
			if ($bsem == 'twoone'){
			?>
			    <option value="twoone">2-1</option>
			    <option value="first">1st year</option>				
				<option value="twotwo">2-2</option>
				<option value="threeone">3-1</option>
				<option value="threeotwo">3-2</option>
				<option value="fourone">4-1</option>
				<option value="fourtwo">4-2</option>
			<?php 
			}
			if ($bsem == 'twotwo'){
			?>
			<option value="twotwo">2-2</option>			
			    <option value="first">1st year</option>
			    <option value="twoone">2-1</option>
				<option value="threeone">3-1</option>
				<option value="threeotwo">3-2</option>
				<option value="fourone">4-1</option>
				<option value="fourtwo">4-2</option>
			<?php 
			}
			if ($bsem == 'threeone'){
			?>
			<option value="threeone">3-1</option>
			<option value="first">1st year</option>
				<option value="twoone">2-1</option>
				<option value="twotwo">2-2</option>				
				<option value="threeotwo">3-2</option>
				<option value="fourone">4-1</option>
				<option value="fourtwo">4-2</option>
			<?php 
			}
			if ($bsem == 'threeotwo'){
			?>
			<option value="threeotwo">3-2</option>
			<option value="first">1st year</option>
				<option value="twoone">2-1</option>
				<option value="twotwo">2-2</option>
				<option value="threeone">3-1</option>				
				<option value="fourone">4-1</option>
				<option value="fourtwo">4-2</option>
			<?php 
			}
			if ($bsem == 'fourone'){
			?>
			<option value="fourone">4-1</option>
			<option value="first">1st year</option>
				<option value="twoone">2-1</option>
				<option value="twotwo">2-2</option>
				<option value="threeone">3-1</option>
				<option value="threeotwo">3-2</option>
				<option value="fourtwo">4-2</option>
			<?php 
			}
			if ($bsem == 'fourtwo'){
			?>
			<option value="fourtwo">4-2</option>
			<option value="first">1st year</option>
				<option value="twoone">2-1</option>
				<option value="twotwo">2-2</option>
				<option value="threeone">3-1</option>
				<option value="threeotwo">3-2</option>
				<option value="fourone">4-1</option>
				
			<?php 
			}
			?>					
			</select>
		</div>
		<label>Branch</label>
		<div>
			<select name="bbranch">
				<option value="<?php echo $bbranch;?>"><p class="small"><?php echo $bbranch;?></p></option>
				<option value="cse">CSE</option>
				<option value="ece">ECE</option>
				<option value="eee">EEE</option>
				<option value="it">IT</option>
				<option value="mech">MECH</option>
				<option value="civil">CIVIL</option>
			</select>
		</div>
		</div>
		<?php 
		//}
		//if ($graduation == 'mtech'){
		?>
		<div class="box" id="mtech">
		<label>Current Semister</label>
		<div>
		
			<select name="msem">
			<?php 
		if ($graduation == 'btech'){
		?>
		<option value=" ">Select</option>
		<option value="first">1st Semister</option>
				<option value="second">2nd Semister</option>
				<option value="third">3rd Semister</option>
				<option value="fourth">4th Semister</option>
		<?php 	
		}
		?>
			<?php 
			if ($msem == 'first'){				
			?>
				<option value="first">1st Semister</option>
				<option value="second">2nd Semister</option>
				<option value="third">3rd Semister</option>
				<option value="fourth">4th Semister</option>
			<?php 
			} 
			if ($msem == 'second'){				
			?>
				<option value="second">2nd Semister</option>
				<option value="first">1st Semister</option>
				<option value="third">3rd Semister</option>
				<option value="fourth">4th Semister</option>
			<?php 
			}			 
			if ($msem == 'third'){				
			?>
				<option value="third">3rd Semister</option>
				<option value="second">2nd Semister</option>
				<option value="first">1st Semister</option>
				<option value="fourth">4th Semister</option>
			<?php 
			}			 
			if ($msem == 'fourth'){				
			?>
				<option value="fourth">4th Semister</option>
				<option value="third">3rd Semister</option>
				<option value="second">2nd Semister</option>
				<option value="first">1st Semister</option>
				
			<?php 
			}
			?>
			</select>
		</div>
		<label>Branch</label>
		<div>
			<select name="mbranch">
				<option value="<?php echo $mbranch;?>"><p class="small"><?php echo $mbranch;?></p></option>
				<option value="cse">CSE</option>
				<option value="ece">ECE</option>
				<option value="eee">EEE</option>
				
			</select>
		</div>
		</div>
		<?php 
		//}
		?>
		
		<label>Student Name</label>
		<div>
			<input type="text" name="name" id="name" value="<?php echo $row['studentname'];?>">
		</div>
		<label>Father's Name</label>
		<div>
			<input type="text" name="fathername" id="fathername" value="<?php echo $row['fathername'];?>">
		</div>
		<label>Mother's Name</label>
		<div>
			<input type="text" name="mothername" id="mothername" value="<?php echo $row['mothername'];?>">
		</div>
		<label>Date of Birth</label>
		<div>
			<input type="text" name="dob" id="dob" value="<?php echo $row['dob'];?>">
		</div>
		<label>Local Address</label>
		<div>
			<textarea cols="20" rows="5" name="localadd"><?php echo $row['localadd'];?></textarea>
		</div>
		<label>Pin Code</label>
		<div>
			<input type="text" name="localpin" id="localpin" value="<?php echo $row['localpin'];?>">
		</div>
		<label>Permanent Address</label>
		<div>
			<textarea cols="20" rows="5" name="permanentadd"><?php echo $row['permanentadd'];?></textarea>
		</div>
		<label>Pin Code</label>
		<div>
			<input type="text" name="permanentpin" id="permanentpin" value="<?php echo $row['permanentpin'];?>">
		</div>
		<label>Mobile No(Student)</label>
		<div>
			<input type="text" name="studentmobile" id="studentmobile" value="<?php echo $row['studentmobile'];?>">
		</div>
		<label>Father's Mobile No</label>
		<div>
			<input type="text" name="fathermobile" id="fathermobile" value="<?php echo $row['fathermobile'];?>">
		</div>
		<label>Email</label>
		<div>
			<input type="text" name="email" id="email" value="<?php echo $row['email'];?>">
		</div>
		<label>Identification Mark</label>
		<div>
			<input type="text" name="identification" id="identification" value="<?php echo $row['identification'];?>">
		</div>
		<label>10th Class(%)</label>
		<div>
			<input type="text" name="tenth" id="tenth" value="<?php echo $row['10th'];?>">
		</div>
		<label>Select(12th Class)</label>
		<div>
			<select name="twelve" id="selectField1">
			<?php 
			if ($twelve == 'inter'){
			?>
			    <option value="inter">Inter</option>
				<option value="diploma">Diploma</option>
			<?php 	
			}else {
            ?>
            <option value="diploma">Diploma</option>
            <option value="inter">Inter</option>
            <?php 
			}
			?>
				
			</select>
		</div>
		<div id="inter" class="box1">
			<label>Inter(%)</label>
			<div>
				<input type="text" name="inter" id="inter" value="<?php echo $row['inter'];?>">
			</div>
			<div><b>B.Tech</b></div>
			<label>1st Year(%)</label>
			<div>
				<input type="text" name="first" id="first" value="<?php echo  $row['btech1st'];?>">
			</div>
		</div>
		<div id="diploma" class="box1">
		<label>Diploma(%)</label>
		<div>
			<input type="text" name="diploma" id="diploma"  value="<?php echo  $row['diploma'];?>">
		</div>
		<div><b>B.Tech</b></div>
		</div>
		<label>2-1 Semister(%)</label>
		<div>
			<input type="text" name="twoone" id="twoone"  value="<?php echo  $row['btech21'];?>">
		</div>
		<label>2-2 Semister(%)</label>
		<div>
			<input type="text" name="twotwo" id="twotwo" value="<?php echo  $row['btech22'];?>">
		</div>
		<label>3-1 Semister(%)</label>
		<div>
			<input type="text" name="threeone" id="threeone" value="<?php echo  $row['btech31'];?>">
		</div>
		<label>3-2 Semister(%)</label>
		<div>
			<input type="text" name="threetwo" id="threetwo" value="<?php echo  $row['btech32'];?>">
		</div>
		<label>4-1 Semister(%)</label>
		<div>
			<input type="text" name="fourone" id="fourone" value="<?php echo  $row['btech41'];?>">
		</div>
		<label>4-2 Semister(%)</label>
		<div>
			<input type="text" name="fourtwo" id="fourtwo" value="<?php echo  $row['btech42'];?>">
		</div>
		<label>Btech Aggregate(%)</label>
		<div>
			<input type="text" name="btechaggregate" id="btechaggregate" value="<?php echo  $row['btechtotal'];?>">
		</div>
		<div><b>M.Tech</b></div>
		<label>1st Semister(%)</label>
		<div>
			<input type="text" name="mfirst" id="mfirst" value="<?php echo  $row['mtech1'];?>">
		</div>
		<label>2nd Semister(%)</label>
		<div>
			<input type="text" name="second" id="second" value="<?php echo  $row['mtech2'];?>">
		</div>
		<label>3rd Semister(%)</label>
		<div>
			<input type="text" name="third" id="third" value="<?php echo  $row['mtech3'];?>">
		</div>
		<label>4th Semister(%)</label>
		<div>
			<input type="text" name="fourth" id="fourth" value="<?php echo  $row['mtech4'];?>">
		</div>
		<label>Mtech Aggregate(%)</label>
		<div>
			<input type="text" name="mtechaggregate" id="mtechaggregate" value="<?php echo  $row['mtechtotal'];?>">
		</div>
		<label>Backlogs(B.tech)</label>
		<div>
			<select name="bbacklog" id="selectField2">
			   <option value="<?php echo $row['bbacklog'];?>"><?php echo $row['bbacklog'];?></option>
				<option value="no">NO</option>
				<option value="past">Past</option>
				<option value="active">Active</option>
			</select>
		</div>
		<b id="no" class="box2"></b>
		<div id="past" class="box2">
		<label>No.of Backlogs</label>
		<div>
			<input type="text" name="bpastback" id="bpastback" value="<?php echo  $row['bpastbacklog'];?>">
		</div>
		</div>
		<div id="active" class="box2">
		<label>No.of Backlogs</label>
		<div>
			<input type="text" name="bactiveback" id="bactiveback" value="<?php echo  $row['bactivebacklog'];?>">
		</div>
		</div>
		<label>Backlogs(M.tech)</label>
		<div>
			<select name="mbacklog" id="selectField3">
			<option value="<?php echo $row['mbacklog'];?>"><?php echo $row['mbacklog'];?></option>
				<option value="mno">NO</option>
				<option value="mpast">Past</option>
				<option value="mactive">Active</option>
			</select>
		</div>
		<b id="mno" class="box3"></b>
		<div id="mpast" class="box3">
		<label>No.of Backlogs</label>
		<div>
			<input type="text" name="mpastback" id="mpastback" value="<?php echo  $row['mpastbacklog'];?>">
		</div>
		</div>
		<div id="mactive" class="box3">
		<label>No.of Backlogs</label>
		<div>
			<input type="text" name="mactiveback" id="mactiveback" value="<?php echo  $row['mactivebacklog'];?>">
		</div>
		</div>
		
		<?php 
		}
		?>
		<br> <input type="submit">
	</form>
	<h3>Acadamic Documents :</h3>
<?php 
$sql1 = mysql_query("select * from certificates where rollno='$username'");
while ($row1 = mysql_fetch_assoc($sql1)){
?>

<table>
<tr>
<?php 
if ($row1['10th'] != NULL || $row1['10th'] != ''){
?>
<td>
<form id="g15" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb15');">Edit</p>
		<input type="hidden" name="value" value="10th">
		<input type="file" onChange="attempt('g15')" id="gb15"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['10th'];?>" height="150" width="150"> </td>
<?php 
}
if ($row1['inter'] != NULL || $row1['inter'] != ''){
?>
<td>
<form id="g16" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb16');">Edit</p>
		<input type="hidden" name="value" value="inter">
		<input type="file" onChange="attempt('g16')" id="gb16"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['inter'];?>" height="150" width="150"></td>
<?php 
}
 
if ($row1['diploma'] != NULL || $row1['diploma'] != ''){
?>
<td>
<form id="g17" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb17');">Edit</p>
		<input type="hidden" name="value" value="diploma">
		<input type="file" onChange="attempt('g17')" id="gb17"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['diploma'];?>" height="150" width="150"></td>
<?php 
}
if ($row1['b1st'] != NULL || $row1['b1st'] != ''){
?>
<td>
<form id="g18" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb18');">Edit</p>
		<input type="hidden" name="value" value="b1st">
		<input type="file" onChange="attempt('g18')" id="gb18"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['b1st'];?>" height="150" width="150"></td>
<?php 
}
if ($row1['b21'] != NULL || $row1['b21'] != ''){
	?>
<td>
<form id="g19" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb19');">Edit</p>
		<input type="hidden" name="value" value="b21">
		<input type="file" onChange="attempt('g19')" id="gb19"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['b21'];?>" height="150" width="150"></td>
<?php 
}
?>
</tr>
<tr>
<?php 
if ($row1['b22'] != NULL || $row1['b22'] != ''){
	?>
<td>
<form id="g20" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb20');">Edit</p>
		<input type="hidden" name="value" value="b22">
		<input type="file" onChange="attempt('g20')" id="gb20"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['b22'];?>" height="150" width="150"></td>
<?php 
}
if ($row1['b31'] != NULL || $row1['b31'] != ''){
	?>
<td>
<form id="g21" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb21');">Edit</p>
		<input type="hidden" name="value" value="b31">
		<input type="file" onChange="attempt('g21')" id="gb21"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['b31'];?>" height="150" width="150"></td>
<?php 
}
if ($row1['b32'] != NULL || $row1['b32'] != ''){
	?>
<td>
<form id="g22" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb22');">Edit</p>
		<input type="hidden" name="value" value="b32">
		<input type="file" onChange="attempt('g22')" id="gb22"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['b32'];?>" height="150" width="150"></td>
<?php 
}
if ($row1['b41'] != NULL || $row1['b41'] != ''){
	?>
<td>
<form id="g23" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb23');">Edit</p>
		<input type="hidden" name="value" value="b41">
		<input type="file" onChange="attempt('g23')" id="gb23"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['b41'];?>" height="150" width="150"></td>
<?php 
}
?>
</tr>
<tr>
<?php
if ($row1['b42'] != NULL || $row1['b42'] != ''){
	?>
<td>
<form id="g24" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb24');">Edit</p>
		<input type="hidden" name="value" value="b42">
		<input type="file" onChange="attempt('g24')" id="gb24"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['b42'];?>" height="150" width="150"></td>
<?php 
}

if ($row1['m1st'] != NULL || $row1['m1st'] != ''){
	?>
<td>
<form id="g25" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb25');">Edit</p>
		<input type="hidden" name="value" value="m1st">
		<input type="file" onChange="attempt('g25')" id="gb25"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['m1st'];?>" height="150" width="150"></td>
<?php 
}

if ($row1['m2nd'] != NULL || $row1['m2nd'] != ''){
	?>
<td>
<form id="g26" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb26');">Edit</p>
		<input type="hidden" name="value" value="m2nd">
		<input type="file" onChange="attempt('g26')" id="gb26"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['m2nd'];?>" height="150" width="150"></td>
<?php 
}
if ($row1['m3rd'] != NULL || $row1['m3rd'] != ''){
	?>
<td>
<form id="g27" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb27');">Edit</p>
		<input type="hidden" name="value" value="m3rd">
		<input type="file" onChange="attempt('g27')" id="gb27"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['m3rd'];?>" height="150" width="150"></td>
<?php 
}
if ($row1['m4th'] != NULL || $row1['m4th'] != ''){
	?>
<td>
<form id="g28" action="update.php?data=images" method="post"
			enctype="multipart/form-data">
		<p class="text" onClick="getFilePathFromDialog('gb28');">Edit</p>
		<input type="hidden" name="value" value="m4th">
		<input type="file" onChange="attempt('g28')" id="gb28"
			name="fileBrowser" style="visibility: hidden; display: none;" /></form>
<img alt="" src="images/<?php echo $row1['m4th'];?>" height="150" width="150"></td>
<?php 
}

?>

</tr>

</table>
<?php 
}
?>
<script type="text/javascript">
function getFilePathFromDialog(name) {
	//alert('Sure You Want to Edit Image');
	confirm('Are you sure you want Change Image?');
    document.getElementById(name).click();
    document.getElementById('filePath').value = document.getElementById(name).value;
}
function attempt(name) {

        document.getElementById(name).submit();
}

</script>
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
?>