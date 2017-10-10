<?php
session_start();
if (isset($_SESSION['placement_role_id'])){
	if (isset($_SESSION['placement_username'])){
		$role_id  = $_SESSION['placement_role_id'];
		//if ($role_id == '1'){
		$username = $_SESSION['placement_username'];
		include 'config.php';
		?>
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
				echo "<b>Old password Does'n match</b>";
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
	<h1>Search</h1>
	<form action="<?php $_SERVER['PHP_SELF'];?>" method="get">
	<label>Academic Year</label>
		<div>
			<select name="academic">
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
		<label>Qualification</label>
		<div>
			<select id="selectField" name="grad">
				<option value="btech">B.Tech</option>
				<option value="mtech">M.Tech</option>
			</select>
		</div>
		<div class="box" id="btech">
			<label>Current Semister</label>
			<div>
				<select name="bsem">
					<option value="0">Select</option>
					<option value="first">1st year</option>
					<option value="twoone">2-1</option>
					<option value="twotwo">2-2</option>
					<option value="threeone">3-1</option>
					<option value="threeotwo">3-2</option>
					<option value="fourone">4-1</option>
					<option value="fourtwo">4-2</option>
				</select>
			</div>
			<label>Branch</label>
			<div>
				<select name="bbranch">
					<option value="0">Select</option>
					<option value="cse">CSE</option>
					<option value="ece">ECE</option>
					<option value="eee">EEE</option>
					<option value="it">IT</option>
					<option value="mech">MECH</option>
					<option value="civil">CIVIL</option>
				</select>
			</div>

			<label>B.Tech % (>=)</label>
			<div>
				<input type="text" name="btechaggregate1" id="btechaggregate1">
			</div>
			<label>Backlogs(B.tech)</label>
			<div>
				<select name="bbacklog" id="selectField2">
					<option value="no">NO</option>
					<option value="past">Past</option>
					<option value="active">Active</option>
				</select>
			</div>
			<b id="no" class="box2"></b>
			<div id="past" class="box2" align="left">
				<label>No.of Backlogs</label>
				<div>
					<input type="text" name="bpastback">
				</div>
			</div>
			<div id="active" class="box2">
				<label>No.of Backlogs</label>
				<div>
					<input type="text" name="bactiveback">
				</div>
			</div>
		</div>
		<div class="box" id="mtech">
			<label>Current Semister</label>
			<div>
				<select name="msem">
					<option value="0">Select</option>
					<option value="first">1st Semister</option>
					<option value="second">2nd Semister</option>
					<option value="third">3rd Semister</option>
					<option value="fourth">4th Semister</option>
				</select>
			</div>
			<label>Branch</label>
			<div>
				<select name="mbranch">
					<option value="0">Select</option>
					<option value="cse">CSE</option>
					<option value="ece">ECE</option>
					<option value="eee">EEE</option>

				</select>
			</div>

			<label>B.Tech % (>=)</label>
			<div>
				<input type="text" name="btechaggregate" id="btechaggregate">
			</div>
			<label>M.Tech % (>=)</label>
			<div>
				<input type="text" name="mtechaggregate" id="mtechaggregate>
			</div>
			<label>Backlogs(B.tech)</label>
			<div>
				<select name="bbacklog" id="selectField4">
					<option value="no1">NO</option>
					<option value="past1">Past</option>
					<option value="active1">Active</option>
				</select>
			</div>
			<b id="no1" class="box2"></b>
			<div id="past1" class="box2">
				<label>No.of Backlogs</label>
				<div>
					<input type="text" name="bpastback">
				</div>
			</div>
			<div id="active1" class="box2">
				<label>No.of Backlogs</label>
				<div>
					<input type="text" name="bactiveback">
				</div>
			</div>
			<label>Backlogs(M.tech)</label>
			<div>
				<select name="mbacklog" id="selectField3">
					<option value="mno">NO</option>
					<option value="mpast">Past</option>
					<option value="mactive">Active</option>
				</select>
			</div>
			<b id="mno" class="box3"></b>
			<div id="mpast" class="box3">
				<label>No.of Backlogs</label>
				<div>
					<input type="text" name="mpastback" id="mpastback">
				</div>
			</div>
			<div id="mactive" class="box3">
				<label>No.of Backlogs</label>
				<div>
					<input type="text" name="mactiveback" id="mactiveback">
				</div>
			</div>
		</div>

		<label>10th % (>=)</label>
		<div>
			<input type="text" name="tenth" id="tenth">
		</div>
		<label>Select(12th Class)</label>
		<div>
			<select name="twelve" id="selectField1">
				<option value="inter">Inter</option>
				<option value="diploma">Diploma</option>
			</select>
		</div>
		<div id="inter" class="box1">
			<label>Inter % (>=)</label>
			<div>
				<input type="text" name="inter" id="inter">
			</div>

		</div>
		<div id="diploma" class="box1">
			<label>Diploma % (>=)</label>
			<div>
				<input type="text" name="diploma" id="diploma">
			</div>
		</div>
		<div>
			<input type="hidden" name="search" value="search"> <input
				type="submit" value="Search">
		</div>
	</form>

	<?php 
	if (isset($_GET['search'])){
			
		$sql = "select * from student where id!=0";
        
		if (isset($_GET['academic'])){
			$academic = $_GET['academic'];
			if (!empty($academic)){
				$sql .= " and academic='$academic'";
			}
		}
		
		if (isset($_GET['grad'])){
			$grad = $_GET['grad'];
			if (!empty($grad)){
				$sql .= " and graduation='$grad'";
			}
		}
		if (isset($_GET['bsem'])){
			$bsem = $_GET['bsem'];
			if (!empty($bsem)){
				$sql .= " and btechsem='$bsem'";
			}
		}
		if (isset($_GET['msem'])){
			$msem = $_GET['msem'];
			if (!empty($msem)){
				$sql .= " and mtechsem='$msem'";
			}
		}
		if (isset($_GET['bbranch'])){
			$bbranch = $_GET['bbranch'];
			if (!empty($bbranch)){
				$sql .= " and btechbranch='$bbranch'";
			}
		}
		if (isset($_GET['mbranch'])){
			$mbranch = $_GET['mbranch'];
			if (!empty($mbranch)){
				$sql .= " and mtechbranch='$mbranch'";
			}
		}
		if (isset($_GET['btechaggregate'])){
			$btechaggregate = $_GET['btechaggregate'];
			if (!empty($btechaggregate)){
				$sql .= " and btechtotal>='$btechaggregate'";
			}
		}
		if (isset($_GET['btechaggregate1'])){
			$btechaggregate = $_GET['btechaggregate1'];
			if (!empty($btechaggregate)){
				$sql .= " and btechtotal>='$btechaggregate'";
			}
		}
		if (isset($_GET['mtechaggregate'])){
			$mtechaggregate = $_GET['mtechaggregate'];
			if (!empty($mtechaggregate)){
				$sql .= " and mtechtotal>='$mtechaggregate'";
			}
		}
		if (isset($_GET['bbacklog'])){
			$bbacklog = $_GET['bbacklog'];
			if ($bbacklog == 'no' || $bbacklog == 'no1'){
				$sql .= " and bbacklog='no'";
			}
			if ($bbacklog == 'past' || $bbacklog == 'past1'){
				if (isset($_GET['bpastback'])){
					$bpastback = $_GET['bpastback'];
					$sql .= " and bbacklog='past'";

					if ($bpastback != NULL || $bpastback != ''){
						$sql .= " and bpastbacklog='$bpastback'";
					}
				}
			}
			if ($bbacklog == 'active' || $bbacklog == 'active1'){
				if (isset($_GET['bactiveback'])){
					$bactiveback = $_GET['bactiveback'];
					$sql .= " and bbacklog='active'";

					if ($bactiveback != NULL || $bactiveback != ''){
						$sql .= " and bpastbacklog='$bactiveback'";
					}
				}
			}
		}
		if (isset($_GET['mbacklog'])){
			$mbacklog = $_GET['mbacklog'];
			if ($mbacklog == 'mno'){
				$sql .= " and mbacklog='mno'";
			}
			if ($mbacklog == 'mpast'){
				if (isset($_GET['mpastback'])){
					$mpastback = $_GET['mpastback'];
					$sql .= " and mbacklog='mpast'";

					if ($mpastback != NULL || $mpastback != ''){
						$sql .= " and mpastbacklog='$mpastback'";
					}
				}
			}
			if ($mbacklog == 'mactive'){
				if (isset($_GET['mactiveback'])){
					$mactiveback = $_GET['mactiveback'];
					$sql .= " and mbacklog='mactive'";

					if ($mactiveback != NULL || $mactiveback != ''){
						$sql .= " and mpastbacklog='$mactiveback'";
					}
				}
			}
		}
		if (isset($_GET['tenth'])){
			$tenth = $_GET['tenth'];
			if (!empty($tenth)){
				$sql .= " and 10th>='$tenth'";
			}
		}
		if (isset($_GET['twelve'])){
			$twelve = $_GET['twelve'];
			if ($twelve == 'inter'){
				if (isset($_GET['inter'])){
					$inter = $_GET['inter'];
					if ($inter != NULL || $inter != ''){
						$sql .= " and 12th='inter' and inter>='$inter'";
					}
				}
			}
			if ($twelve == 'diploma'){
				if (isset($_GET['diploma'])){
					$diploma = $_GET['diploma'];
					if ($diploma != NULL || $diploma != ''){
						$sql .= " and 12th='diploma' and diploma='$diploma'";
					}
				}
			}
		}

		$sql .= " ORDER BY datetime DESC";
		//echo $sql;
		$sql1 = mysql_query($sql);

		$count = mysql_num_rows($sql1);
		if (!empty($count)){
			?>
	<fieldset>
		<form action="addselect.php" method="get">
			<select name="selectfrom[]" id="select-from" multiple size="10">
				<?php 
				$sql2 = mysql_query('select * from select1');
				while ($row1 = mysql_fetch_assoc($sql2)){
					?>
				<option value="<?php echo $row1['id'];?>">
					<?php echo $row1['data'];?>
				</option>
				<?php 
				}
				?>
			</select> <input type="submit" value="Add">
		
			<select name="selectto[]" id="select-to" multiple size="10">
				<?php 
				$sql3 = mysql_query("select select_id from select2 where username='$username'");
				while ($row2 = mysql_fetch_assoc($sql3)){
					$selectid = $row2['select_id'];
					$sql4 = mysql_query("select * from select1 where id='$selectid'");
					while ($row3 = mysql_fetch_assoc($sql4)){
						?>

				<option value="<?php echo $row3['id'];?>">
					<?php echo $row3['data'];?>
				</option>
				<?php
					}
				}
				?>
			</select> <input type="submit" value="Remove">
		</form>
	</fieldset>

	<?php   

	//if (isset($_GET['add'])){
	?>

	<?php 
	$add = "select graduation,studentname,";

	?>
	<?php 
	$sql5 = mysql_query("select * from select2 where username='$username'");
	while ($row4 = mysql_fetch_assoc($sql5)){
		$select_id = $row4['select_id'];
		$sql6 = mysql_query("select value from select1 where id='$select_id'");
		while ($row5 = mysql_fetch_assoc($sql6)){
			$value = $row5['value'];


			if ($value == '12th'){
				if ($twelve == 'inter'){
					$value= "inter";
				}
				if ($twelve == 'diploma'){
					$value= "diploma";
				}
					
			}

			if ($value == 'bbacklog'){
				$value= "bbacklog,bpastbacklog,bactivebacklog";
			}
			if ($value == 'mbacklog'){
				$value= "mbacklog,mpastbacklog,mactivebacklog";
			}


			$add .= "$value,";
		}
	}
	//echo $add;
	?>

	<?php 
	if ($grad == 'btech'){
		$add .= "btechsem,btechbranch";
	}
	if ($grad == 'mtech'){
		$add .= "mtechsem,mtechbranch";
	}

	$add .= " from student where id!=0";
	
	if (!empty($academic)){
		$add .= " and academic='$academic'";
	}

	if (isset($_GET['grad'])){
		$grad = $_GET['grad'];
		if (!empty($grad)){
			$add .= " and graduation='$grad'";
		}
	}
	if (isset($_GET['bsem'])){
		$bsem = $_GET['bsem'];
		if (!empty($bsem)){
			$add .= " and btechsem='$bsem'";
		}
	}
	if (isset($_GET['msem'])){
		$msem = $_GET['msem'];
		if (!empty($msem)){
			$add .= " and mtechsem='$msem'";
		}
	}
	if (isset($_GET['bbranch'])){
		$bbranch = $_GET['bbranch'];
		if (!empty($bbranch)){
			$add .= " and btechbranch='$bbranch'";
		}
	}
	if (isset($_GET['mbranch'])){
		$mbranch = $_GET['mbranch'];
		if (!empty($mbranch)){
			$add .= " and mtechbranch='$mbranch'";
		}
	}
	if (isset($_GET['btechaggregate'])){
		$btechaggregate = $_GET['btechaggregate'];
		if (!empty($btechaggregate)){
			$add .= " and btechtotal>='$btechaggregate'";
		}
	}
	if (isset($_GET['btechaggregate1'])){
		$btechaggregate = $_GET['btechaggregate1'];
		if (!empty($btechaggregate)){
			$add .= " and btechtotal>='$btechaggregate'";
		}
	}
	if (isset($_GET['mtechaggregate'])){
		$mtechaggregate = $_GET['mtechaggregate'];
		if (!empty($mtechaggregate)){
			$add .= " and mtechtotal>='$mtechaggregate'";
		}
	}
	if (isset($_GET['bbacklog'])){
		$bbacklog = $_GET['bbacklog'];
		if ($bbacklog == 'no' || $bbacklog == 'no1'){
			$add .= " and bbacklog='no'";
		}
		if ($bbacklog == 'past' || $bbacklog == 'past1'){
			if (isset($_GET['bpastback'])){
				$bpastback = $_GET['bpastback'];
				$add .= " and bbacklog='past'";

				if ($bpastback != NULL || $bpastback != ''){
					$add .= " and bpastbacklog='$bpastback'";
				}
			}
		}
		if ($bbacklog == 'active' || $bbacklog == 'active1'){
			if (isset($_GET['bactiveback'])){
				$bactiveback = $_GET['bactiveback'];
				$add .= " and bbacklog='active'";

				if ($bactiveback != NULL || $bactiveback != ''){
					$add .= " and bpastbacklog='$bactiveback'";
				}
			}
		}
	}
	if (isset($_GET['mbacklog'])){
		$mbacklog = $_GET['mbacklog'];
		if ($mbacklog == 'mno'){
			$add .= " and mbacklog='mno'";
		}
		if ($mbacklog == 'mpast'){
			if (isset($_GET['mpastback'])){
				$mpastback = $_GET['mpastback'];
				$add .= " and mbacklog='mpast'";

				if ($mpastback != NULL || $mpastback != ''){
					$add .= " and mpastbacklog='$mpastback'";
				}
			}
		}
		if ($mbacklog == 'mactive'){
			if (isset($_GET['mactiveback'])){
				$mactiveback = $_GET['mactiveback'];
				$add .= " and mbacklog='mactive'";

				if ($mactiveback != NULL || $mactiveback != ''){
					$add .= " and mactivebacklog='$mactiveback'";
				}
			}
		}
	}
	if (isset($_GET['tenth'])){
		$tenth = $_GET['tenth'];
		if (!empty($tenth)){
			$add .= " and 10th>='$tenth'";
		}
	}
	if (isset($_GET['twelve'])){
		$twelve = $_GET['twelve'];
		if ($twelve == 'inter'){
			if (isset($_GET['inter'])){
				$inter = $_GET['inter'];
				if ($inter != NULL || $inter != ''){
					$add .= " and 12th='inter' and inter>='$inter'";
				}
			}
		}
		if ($twelve == 'diploma'){
			if (isset($_GET['diploma'])){
				$diploma = $_GET['diploma'];
				if ($diploma != NULL || $diploma != ''){
					$add .= " and 12th='diploma' and diploma='$diploma'";
				}
			}
		}
	}

	$add .= " ORDER BY datetime DESC";
//echo $add;
	$download = $add;

	//}else {
	//$download = $sql;
	//}
	//echo $download;
	?>
	<form action="downloadexcel.php" method="get">
		<input type="hidden" name="download" value="<?php echo $download;?>">
		<input type="submit" value="Download">
	</form>
	<?php 
	$k=1;
	while ($row = mysql_fetch_assoc($sql1)){
		if ($grad == 'btech'){
			$id = $row['id'];
			$roll = $row['rollno'];
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
		<tbody>


			<tr class="">
				<td><?php echo $k;?></td>
				<td><?php echo $row['studentname'];?></td>
				<td><?php echo $row['fathername'];?></td>
				<td><?php echo $row['graduation'];?></td>
				<td><?php echo $row['btechbranch'];?></td>
				<td><?php 
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
				?>
				</td>
				<td><a
					href="studentdetails.php?id=<?php echo $id;?>&roll=<?php echo $roll;?>">View
						Details</a>
				</td>
			</tr>


		</tbody>
	</table>
	<?php 

		}
		if ($grad == 'mtech'){
			$id = $row['id'];
			$roll = $row['rollno'];
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
		<tbody>


			<tr class="">
				<td><?php echo $k;?></td>
				<td><?php echo $row['studentname'];?></td>
				<td><?php echo $row['fathername'];?></td>
				<td><?php echo $row['graduation'];?></td>
				<td><?php echo $row['mtechbranch'];?></td>
				<td><?php echo $row['mtechsem'];?></td>
				<td><a
					href="studentdetails.php?id=<?php echo $id;?>&roll=<?php echo $roll;?>">View
						Details</a>
				</td>
			</tr>


		</tbody>
	</table>
	<?php 

		}
		$k++;
	}
		}else {
			echo '<h2>No Results Found !</h2>';
		}

	}
	?>
</div>
</body>
</html>
<?php 
//}else {
//	header('location:login.php');
//}
	}else {
header('location:login.php');
}
}else {
header('location:login.php');
}
?>