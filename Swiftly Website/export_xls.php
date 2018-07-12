<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Export(xls) | Quiz Time University</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- ICONS -->
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/icon.png">
</head>
<!--SESSION START-->
<?php
	session_start();
	$user = $_SESSION['fullname'];
	$user_question = $_SESSION['user_question'];
?>
<body>
	<form id="form1" action="export_xls.php" method="POST" enctype="multipart/form-data">
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- VIEWER CONTENT -->
		<div class="main-content">
			<div class="container">
				<div class="row">
					<div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="panel panel-scrolling">
              <div class="panel-heading">
                <h3 class="panel-title">Export(.xls)</h3>
              </div>
              <div class="panel-body">
                
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
</form>
</body>

</html>
