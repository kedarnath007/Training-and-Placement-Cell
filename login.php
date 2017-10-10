<?php include 'config.php';?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html
	lang="en">
<!--<![endif]-->
<head>


<link href="css/popup.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="website.css"></link>
<link rel="stylesheet" type="text/css" href="website1.css"></link>
<title>Dreamz Login</title>
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
		<a href="map.html">Reaching MGIT</a>&nbsp
		<a href="ourrecruiters.html">OurRecruiters  </a>&nbsp
		<a href="brouchers.html">Brouchers  </a>&nbsp
		<a href="placementproceedure.html">PlacementProceedure</a>&nbsp</strong>
	</div>
	</div>
	<div class="bodypart1">
	
<!-- PopUp1 Window-->

	<a href="#x" class="overlay" id="join_form1"></a>
	<div class="popup">

		<form action="forgotpassword.php" method="post">
			<div class="modal-header" align="center">
				<h3>Forgot Password</h3>
			</div>
			<div class="modal-body" style="min-height: 100px" align="center">
				
			
				<div class="control-group">
					<label class="control-label">Enter Email registered with Placement Cell:</label><br><br>

					<div class="controls">
						<input type="email" class="input-large" name="email">
					</div>
				</div>

				<div class="space10"></div>
			</div>
			<div class="modal-footer" align="center">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
			<?php 
			$msg=isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';			
			if ($msg == '3'){
				echo "<b>Password successfully sent to your mail</b>";
			}
			if ($msg == '2'){
				echo "<b>Password sending Failed</b>";
			}
			?>
		</form>
		<a class="close" href="#close"></a>
	</div>
	<!-- End PopUp1 Window-->	
		<div style="text-align: center;"><br><br><br>
	<form action='login_db.php' method=post>
<table border='0' cellspacing='0' cellpadding='0' align=center>
<tr id='cat'>
<tr> <td bgcolor='#f1f1f1' ><font face='verdana, arial, helvetica' size='2' align='center'>  Login ID    
</font></td> <td bgcolor='#f1f1f1' align='center'><font face='verdana, arial, helvetica' size='2' >
<input type ='text' class='bginput' name='username' ></font></td></tr>

<tr> <td bgcolor='#ffffff' ><font face='verdana, arial, helvetica' size='2' align='center'>  Password 
</font></td> <td bgcolor='#ffffff' align='center'><font face='verdana, arial, helvetica' size='2' >
<input type ='text' class='bginput' name='password' ></font></td></tr>

<tr> <td bgcolor='#f1f1f1' colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'> 
<input type='submit' value='Submit'> <input type='reset' value='Reset'>
</font></td> </tr>

<tr> <td bgcolor='#ffffff' ><font face='verdana, arial, helvetica' size='2' align='center'></font></td> <td bgcolor='#ffffff' align='center'><font face='verdana, arial, helvetica' size='2' > <a href="#join_form1" id="join_pop">Forgot Password?</a><br><br><br><br></font></td></tr>

<tr> <td bgcolor='#f1f1f1' colspan='2' align='center'><font face='verdana, arial, helvetica' size='2' align='center'> 
 </font></td> </tr>

</table></center></form>
</div>
		<div align="center">
			<?php 			
		       $msg = isset($_REQUEST['msg']) ? $_REQUEST['msg'] : '';
		       if ($msg == '0'){
		       ?>
		       <h3><?php echo 'Invalid Username Or Password';?></h3>
		       <?php 
		       }
		       ?>
		</div>

<!-- END BODY -->
</html>
