<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Terms and Policies | Quiz Time University</title>
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
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/icon.png">
</head>
<!--SESSION & CONNECTION START-->
<?php
session_start();
include 'connection.php';
?>
<!--SESSION & CONNECTION END-->
<body>
	<form id="form1" action="about.php" method="POST" enctype="multipart/form-data">
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- VIEWER CONTENT -->
		<div class="main-content">
			<div class="container">
				<div><br/></div><div><br/></div>
				<div><br/></div><div><br/></div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel wow animated fadeInDown">
							<div class="panel-heading text-center">
								<h2>About</h2>
							</div>
							<div class="panel-body">
								<p class="text-center">
									Swiftly is an ONLINE QUIZ SYSTEM that empowers users to engage with different kinds of questions that has been provided by other SWIFTLY USERS. It has a managing tool for creating, updating, and deleting questions in a created quiz set. Swiftly is very simple and easy to use. It is also a responsive website, means it will fit on different screen sizes on phones, tablets and laptops.<br/><br/>
									© 2017 Swiftly Community. All right reserved.
								</p>

								<div class="text-right">
									<button type="submit" class="btn btn-success" name="btn_main"><i class="lnr lnr-chevron-left"></i> Back To Main</button>
								</div>
								<?php
								if(isset($_POST['btn_main']))
								{
									echo '<script type="text/javascript">window.location="dashboard.php"</script>';
								}
								?>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END VIEWER CONTENT -->
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->

</form>
</body>

</html>
