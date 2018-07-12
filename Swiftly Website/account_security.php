<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Account Security | Quiz Time University</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/icon.png">
</head>
<!--SESSION & CONNECTION START-->
<?php
session_start();
$id=$_SESSION['id'];
$user = $_SESSION['fullname'];
$password = $_SESSION['password'];
include 'connection.php';
?>
<!--SESSION & CONNECTION END-->
<body>
	<form id="form1" action="account_security.php" method="POST" enctype="multipart/form-data">
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- VIEWER CONTENT -->
		<div class="main-content">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="panel panel-scrolling wow animated bounceInLeft">
							<div class="panel-heading">
								<h3 class="panel-title">Account Security <i class="lnr lnr-lock"></i></h3>
							</div>
							<div class="panel-body">
								<div class="col-lg-12">
									<div class="col-lg-3"></div>
									<div class="col-lg-6">
										<h4>Enter Old Password</h4>
										<input type="password" class="form-control" name="oldPass"/>
									</div>
									<div class="col-lg-3"></div>
								</div>

								<div class="col-lg-12"><br/></div>

								<div class="col-lg-12">
									<div class="col-lg-3"></div>
									<div class="col-lg-6">
										<h4>Enter New Password</h4>
										<input type="password" class="form-control" name="newPass"/>
									</div>
									<div class="col-lg-3"></div>
								</div>

								<div class="col-lg-12"><br/></div>

								<div class="col-lg-12">
									<div class="col-lg-3"></div>
									<div class="col-lg-6">
										<h4>Confirm New Password</h4>
										<input type="password" class="form-control" name="conPass"/>
									</div>
									<div class="col-lg-3"></div>
								</div>

								<div class="col-lg-12"><br/></div>
								<div class="col-lg-12"><br/></div>

								<div class="text-center">
									<button type="submit" class="btn btn-success" name="btn_change"><i class="lnr lnr-magic-wand"></i> Change</button>
									<button type="submit" class="btn btn-default" name="btn_cancel"><font class="text-success"><i class="lnr lnr-undo"></i> Cancel</font></button>
								</div>
							</div>
							</div>
						</div>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
		<!-- END VIEWER CONTENT -->
	</div>
	<!-- END WRAPPER -->

	<?php
	if(isset($_POST['btn_change']))
	{
		$old=$_POST['oldPass'];
		$new=$_POST['newPass'];
		$con=$_POST['conPass'];
		if($old != "" AND $new != "" AND $con != "")
		{
			if($old == $password)
			{
				if($con == $new)
				{
					$UPDATE="UPDATE user_tb SET Password='$new' WHERE Id='$id'";
					$UPDATE_QUERY=mysql_query($UPDATE,$datacon);

					if(mysql_affected_rows() == 1)
					{
						echo '<script type="text/javascript">alert("Password Updated Successfully! You will now be redirected to the Log In page to log in again.")</script>';
						echo '<script type="text/javascript">window.location="LogIn.php"</script>';
					}
					else
					{
						echo '<script type="text/javascript">alert("Update Failed!")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Password Mismatch!")</script>';
				}
			}
			else
			{
				echo '<script type="text/javascript">alert("Entered old password cannot be recognize!")</script>';
			}
		}
		else
		{
			echo '<script type="text/javascript">alert("You are required fill all the given fields!")</script>';
		}
	}
	else if(isset($_POST['btn_cancel']))
	{
		echo '<script type="text/javascript">window.location="dashboard.php"</script>';
	}
	?>
</form>
</body>

</html>
