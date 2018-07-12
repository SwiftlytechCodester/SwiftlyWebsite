<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Quiz Time University!</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/Custom-Cs.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.fancybox.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/slit-slider.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/main.css">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- ICON -->
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/brand_icon.png">
</head>
<!--SESSION & CONNECTION START-->
<?php
session_start();
$user = $_SESSION['fullname'];
$avatar = $_SESSION['avatar'];
include 'connection.php';
?>
<!--SESSION & CONNECTION END-->
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
			<nav class="navbar navbar-default navbar-fixed-top wow animated fadeInDown">
			<div class="brand">
				<a href="dashboard.php"><img src="assets/img/brand.png" alt="Quiz Time University Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary"><i class="lnr lnr-magnifier"></i></button></span>
					</div>
				</form>
				<div class="navbar-btn navbar-btn-right">
					<a class="btn btn-success update-pro" href="https://www.swifly.com" title="Download App" target="_blank"><i class="fa fa-download"></i> <span>Download App</span></a>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<!-- START MESSAGES -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-envelope"></i>
								<?php
								$unread="Unread";
								$select = mysql_query("SELECT * FROM messages_tb WHERE Reciever='$user' AND Stat='$unread' GROUP BY Sender",$datacon);
								$rownum=mysql_num_rows($select);
								if($rownum != 0)
								{
								?>
								<span class="badge bg-danger"><?php echo "" . $rownum . "" ?></span>
								<?php
								}
								?>
							</a>
							<ul class="dropdown-menu notifications">
								<?php
								$select = mysql_query("SELECT * FROM messages_tb WHERE Reciever='$user' AND Stat='$unread' GROUP BY Sender LIMIT 10",$datacon);
								while($row=mysql_fetch_array($select))
								{
								?>

								<li><a href="#" class="notification-item"><span class="dot bg-success"></span><?php echo "".$row[3]."" ?></a></li>

								<?php
								}
								if($rownum != 0)
								{
								?>
								<li><a href="messages.php" class="more">See all messages</a></li>
								<?php
								}
								else if($rownum == 0)
								{
								?>
								<li><a href="messages.php" class="more">You don't have any new messages yet!</a></li>
								<?php
								}
								?>
							</ul>
						</li>
						<!-- END MESSAGES -->
						<!-- START NOTIFICATION -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<?php
								$select = mysql_query("SELECT * FROM notification_tb WHERE Reciever='$user'", $datacon);
								$rownum=mysql_num_rows($select);
								if($rownum != 0)
								{
								?>
								<span class="badge bg-danger"><?php echo "" . $rownum . "" ?></span>
								<?php
								}
								?>
							</a>
							<ul class="dropdown-menu notifications">
								<?php
								$select = mysql_query("SELECT * FROM notification_tb WHERE Reciever='$user' ORDER BY Id DESC LIMIT 10",$datacon);
								while($row=mysql_fetch_array($select))
								{
								?>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span><?php echo "" . $row[2] . "" ?></a></li>
								<?php
								}
								if($rownum != 0)
								{
								?>
								<li><a href="notifications.php" class="more">See all notifications</a></li>
								<?php
								}
								else if($rownum == 0)
								{
								?>
								<li><a href="notifications.php" class="more">You don't have any new notifications yet!</a></li>
								<?php
								}
								?>
							</ul>
						</li>
						<!-- END NOTIFICATION -->
						<!-- START HELP -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Account Security</a></li>
								<li><a href="#">Managing Accounts</a></li>
							</ul>
						</li>
						<!-- END HELP -->
						<!-- START USER -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php
								echo '<img src="data:image/jpeg;base64,'. base64_encode($avatar) .'" class="img-circle" alt="Avatar">';
								?>
								<span><?php echo $user ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="terms_and_policies.php"><i class="lnr lnr-file-empty"></i> <span>Terms And Policies</span></a></li>
								<li><a href="about.php"><i class="lnr lnr-flag"></i> <span>About</span></a></li>
								<li><hr/></li>
								<li><a href="profile_viewer.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="account_security.php"><i class="lnr lnr-lock"></i> <span>Account Security</span></a></li>
								<li><a href="SignUp.php"><i class="lnr lnr-pencil"></i> <span>Sign Up</span></a></li>
								<li><a href="LogIn.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- END USER -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar wow animated bounceInUp">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="dashboard.php" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="quizzes.php" class=""><i class="lnr lnr-database"></i> <span>Quizzes</span></a></li>
						<li><a href="questions.php" class=""><i class="lnr lnr-question-circle"></i> <span>Question Bank</span></a></li>
						<li>
							<a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-screen"></i> <span>Manage Questions</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages1" class="collapse ">
								<ul class="nav">
									<li><a href="create_new.php" class=""><i class="lnr lnr-pencil"></i><span>Create New</span></a></li>
									<li><a href="update_record.php" class=""><i class="lnr lnr-magic-wand"></i> <span>Update Record</span></a></li>
									<li><a href="delete_record.php" class=""><i class="lnr lnr-trash"></i><span>Delete Record</span></a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-select"></i> <span>Set Quiz</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="multiple_choice.php" class=""><i class="lnr lnr-list"></i><span>Multiple Choice</span></a></li>
									<li><a href="identification.php" class=""><i class="lnr lnr-list"></i><span>Identification</span></a></li>
									<li><a href="matching_type.php" class=""><i class="lnr lnr-list"></i><span>Matching Type</span></a></li>
									<li><a href="true_or_false.php" class=""><i class="lnr lnr-list"></i><span>True or False</span></a></li>
								</ul>
							</div>
						</li>
						<li><a href="notifications.php" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
						<li><a href="messages.php" class=""><i class="lnr lnr-envelope"></i> <span>Messages</span></a></li>
						<li><a href="export.php" class=""><i class="lnr lnr-download"></i> <span>Export</span></a></li>
						<li><a href="forum.php" class=""><i class="lnr lnr-bubble"></i> <span>Forum</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main wow animated bounceInRight">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading wow animated fadeInDown">
							<h3 class="panel-title">Dashboard</h3>
							<p class="panel-subtitle">Insights</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4 wow animated fadeInUp">
									<div class="metric">
										<span class="icon"><i class="fa fa-question-circle"></i></span>
										<p>
											<?php
											$select = mysql_query("SELECT * FROM set_title_tb WHERE Provider='$user'",$datacon);
											$quizzes=mysql_num_rows($select);
											?>
											<span class="number"><?php echo "" . $quizzes . "" ?></span>
											<span class="title">Quiz Set</span>
										</p>
									</div>
								</div>
								<div class="col-md-4 wow animated fadeInUp">
									<div class="metric">
										<span class="icon"><i class="fa fa-envelope"></i></span>
										<p>
											<?php
											$select = mysql_query("SELECT * FROM messages_tb WHERE Reciever='$user' OR Sender='$user'",$datacon);
											$messages=mysql_num_rows($select);
											?>
											<span class="number"><?php echo "" . $messages . "" ?></span>
											<span class="title">Question Set</span>
										</p>
									</div>
								</div>
								<div class="col-md-4 wow animated fadeInUp">
									<div class="metric">
										<span class="icon"><i class="fa fa-bell"></i></span>
										<p>
											<?php
											$select = mysql_query("SELECT * FROM quiz_activity_log_tb WHERE Provider='$user'",$datacon);
											$log=mysql_num_rows($select);
											?>
											<span class="number"><?php echo "" . $log . "" ?></span>
											<span class="title">Quiz Activity</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-6">
							<!-- TASKS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Scores Percentage</h3>
									<div class="right">
										<span class="icon"><i class="fa fa-bookmark text-success"></i></span>
									</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled task-list">
										<li>
											<?php
											$quiz_ttl_select = mysql_query("SELECT * FROM quiz_activity_log_tb WHERE Taker='$user'",$datacon);
											$quiz_ttl=mysql_num_rows($quiz_ttl_select);

											$stat="EXCELENT SCORE!";
											$quiz_cnt_select = mysql_query("SELECT * FROM quiz_activity_log_tb WHERE Taker='$user' AND Status='$stat'",$datacon);
											$quiz_cnt=mysql_num_rows($quiz_cnt_select);

											if($quiz_cnt != 0 && $quiz_ttl != 0)
											{
											$progress = ($quiz_cnt / $quiz_ttl) * 100;

											if($progress <= 25)
											{
											?>
											<p>Excelent Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 26 AND $progress <= 50)
											{
											?>
											<p>Excelent Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 51 AND $progress <= 75)
											{
											?>
											<p>Excelent Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 76 AND $progress <= 100)
											{
											?>
											<p>Excelent Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}
											}
											else
											{
											?>
											<p>Excelent Score<span class="label-percent">0%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only">0% Average</span>
												</div>
											</div>
											<?php
											}
											?>
										</li>
										<li>
											<?php
											$quiz_ttl_select = mysql_query("SELECT * FROM quiz_activity_log_tb WHERE Taker='$user'",$datacon);
											$quiz_ttl=mysql_num_rows($quiz_ttl_select);

											$stat="GOOD SCORE!";
											$quiz_cnt_select = mysql_query("SELECT * FROM quiz_activity_log_tb WHERE Taker='$user' AND Status='$stat'",$datacon);
											$quiz_cnt=mysql_num_rows($quiz_cnt_select);

											if($quiz_cnt != 0 && $quiz_ttl != 0)
											{
											$progress = ($quiz_cnt / $quiz_ttl) * 100;

											if($progress <= 25)
											{
											?>
											<p>Good Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 26 AND $progress <= 50)
											{
											?>
											<p>Good Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 51 AND $progress <= 75)
											{
											?>
											<p>Good Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 76 AND $progress <= 100)
											{
											?>
											<p>Good Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}
											}
											else
											{
											?>
											<p>Good Score<span class="label-percent">0%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only">0% Average</span>
												</div>
											</div>
											<?php
											}
											?>
										</li>
										<li>
											<?php
											$quiz_ttl_select = mysql_query("SELECT * FROM quiz_activity_log_tb WHERE Taker='$user'",$datacon);
											$quiz_ttl=mysql_num_rows($quiz_ttl_select);

											$stat="AVERAGE SCORE!";
											$quiz_cnt_select = mysql_query("SELECT * FROM quiz_activity_log_tb WHERE Taker='$user' AND Status='$stat'",$datacon);
											$quiz_cnt=mysql_num_rows($quiz_cnt_select);

											if($quiz_cnt != 0 && $quiz_ttl != 0)
											{
											$progress = ($quiz_cnt / $quiz_ttl) * 100;

											if($progress <= 25)
											{
											?>
											<p>Average Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 26 AND $progress <= 50)
											{
											?>
											<p>Average Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 51 AND $progress <= 75)
											{
											?>
											<p>Average Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 76 AND $progress <= 100)
											{
											?>
											<p>Average Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}
											}
											else
											{
											?>
											<p>Average Score<span class="label-percent">0%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only">0% Average</span>
												</div>
											</div>
											<?php
											}
											?>
										</li>
										<li>
											<?php
											$quiz_ttl_select = mysql_query("SELECT * FROM quiz_activity_log_tb WHERE Taker='$user'",$datacon);
											$quiz_ttl=mysql_num_rows($quiz_ttl_select);

											$stat="FAILED SCORE!";
											$quiz_cnt_select = mysql_query("SELECT * FROM quiz_activity_log_tb WHERE Taker='$user' AND Status='$stat'",$datacon);
											$quiz_cnt=mysql_num_rows($quiz_cnt_select);

											if($quiz_cnt != 0 && $quiz_ttl != 0)
											{
											$progress = ($quiz_cnt / $quiz_ttl) * 100;

											if($progress <= 25)
											{
											?>
											<p>Failed Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 26 AND $progress <= 50)
											{
											?>
											<p>Failed Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 51 AND $progress <= 75)
											{
											?>
											<p>Failed Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}

											else if($progress >= 76 AND $progress <= 100)
											{
											?>
											<p>Failed Score<span class="label-percent"><?php echo "" .$progress. "" ?>%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo "" .$progress. "" ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only"><?php echo "" .$progress. "" ?>% Average</span>
												</div>
											</div>
											<?php
											}
											}
											else
											{
											?>
											<p>Failed Score<span class="label-percent">0%</span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo "" .$progress. "" ?>%">
													<span class="sr-only">0% Average</span>
												</div>
											</div>
											<?php
											}
											?>
										</li>
									</ul>
								</div>
							</div>
							<!-- END TASKS -->
						</div>
						<div class="col-md-6">
							<!-- VISIT CHART -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Account Visits</h3>
									<div class="right">
										<span class="icon"><i class="fa fa-bookmark text-success"></i></span>
									</div>
								</div>
								<div class="panel-body">
									<div id="visits-chart" class="ct-chart"></div>
								</div>
							</div>
							<!-- END VISIT CHART -->
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- START MY ACTIVITY -->
							<div class="panel panel-scrolling">
								<div class="panel-heading">
									<h3 class="panel-title">Recent Activity <i class="fa fa-flag text-success"></i></h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									</div>
									<p class="subtitle">Taken quizzes results provided by other users.</p>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled activity-list">
										<!--<li>
											<img src="assets/img/user.png" alt="Avatar" class="img-circle pull-left avatar">
											<p><a href="#">Joel N. Labaddan Jr.</a> has achieved 80% of his completed tasks <span class="timestamp">20 minutes ago</span></p>
										</li>-->
										<?php
										$select = mysql_query("SELECT * FROM quiz_activity_log_tb WHERE Taker='$user' ORDER BY Id DESC",$datacon);
										while($row=mysql_fetch_array($select))
										{
										?>
										<li>
											<?php
											$select_img = mysql_query("SELECT * FROM user_tb WHERE FullName='$row[6]'",$datacon);
											while($row_img=mysql_fetch_array($select_img))
											{
												 echo '<img src="data:image/jpeg;base64,'. base64_encode($row_img[12]) .'" class="img-circle pull-left avatar" alt="Avatar" width="45" height="45">';
											}

											if($row[5] == "FAILED SCORE!")
											{
											?>
											<p><a href="#">You</a> have achieved a <font class="text-danger"><?php echo "" . $row[5] . "" ?> (<?php echo "" . $row[4] . "" ?>)</font> from <?php echo "" . $row[1] . "" ?> (<?php echo "" . $row[2] . "" ?>) provided by <font class="text-success"><?php echo "" . $row[6] . "" ?></font><span class="timestamp">20 minutes ago</span></p>
											<?php
											}
											else if($row[5] == "AVERAGE SCORE!")
											{
											?>
											<p><a href="#">You</a> have achieved a <font class="text-warning"><?php echo "" . $row[5] . "" ?> (<?php echo "" . $row[4] . "" ?>)</font> from <?php echo "" . $row[1] . "" ?> (<?php echo "" . $row[2] . "" ?>) provided by <font class="text-success"><?php echo "" . $row[6] . "" ?></font><span class="timestamp">20 minutes ago</span></p>
											<?php
											}
											else if($row[5] == "GOOD SCORE!")
											{
											?>
											<p><a href="#">You</a> have achieved a <font class="text-primary"><?php echo "" . $row[5] . "" ?> (<?php echo "" . $row[4] . "" ?>)</font> from <?php echo "" . $row[1] . "" ?> (<?php echo "" . $row[2] . "" ?>) provided by <font class="text-success"><?php echo "" . $row[6] . "" ?></font><span class="timestamp">20 minutes ago</span></p>
											<?php
											}
											else if($row[5] == "EXCELENT SCORE!")
											{
											?>
											<p><a href="#">You</a> have achieved a <font class="text-success"><?php echo "" . $row[5] . "" ?> (<?php echo "" . $row[4] . "" ?>)</font> from <?php echo "" . $row[1] . "" ?> (<?php echo "" . $row[2] . "" ?>) provided by <font class="text-success"><?php echo "" . $row[6] . "" ?></font><span class="timestamp">20 minutes ago</span></p>
											<?php
											}
											?>
										</li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>
							<!-- END MY ACTIVITY -->
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- START USER ACTIVITY -->
							<div class="panel panel-scrolling">
								<div class="panel-heading">
									<h3 class="panel-title">User Recent Activity <i class="fa fa-flag text-success"></i></h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									</div>
									<p class="subtitle">Quiz results by other users from quizzes you provided.</p>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled activity-list">
										<?php
										$select = mysql_query("SELECT * FROM quiz_activity_log_tb WHERE Provider='$user' ORDER BY Id DESC",$datacon);
										while($row=mysql_fetch_array($select))
										{
										?>
										<li>
											<?php
											$select_img = mysql_query("SELECT * FROM user_tb WHERE FullName='$row[3]'",$datacon);
											while($row_img=mysql_fetch_array($select_img))
											{
												 echo '<img src="data:image/jpeg;base64,'. base64_encode($row_img[12]) .'" class="img-circle pull-left avatar" alt="Avatar" width="45" height="45">';
											}

											if($row[5] == "FAILED SCORE!")
											{
											?>
											<p><font class="text-success"><?php echo "" . $row[3] . "" ?></font> has achieved a <font class="text-danger"><?php echo "" . $row[5] . "" ?> (<?php echo "" . $row[4] . "" ?>)</font> from <?php echo "" . $row[1] . "" ?> (<?php echo "" . $row[2] . "" ?>) that you provided.</p>
											<?php
											}
											if($row[5] == "AVERAGE SCORE!")
											{
											?>
											<p><font class="text-success"><?php echo "" . $row[3] . "" ?></font> has achieved a <font class="text-warning"><?php echo "" . $row[5] . "" ?> (<?php echo "" . $row[4] . "" ?>)</font> from <?php echo "" . $row[1] . "" ?> (<?php echo "" . $row[2] . "" ?>) that you provided.</p>
											<?php
											}
											if($row[5] == "GOOD SCORE!")
											{
											?>
											<p><font class="text-success"><?php echo "" . $row[3] . "" ?></font> has achieved a <font class="text-primary"><?php echo "" . $row[5] . "" ?> (<?php echo "" . $row[4] . "" ?>)</font> from <?php echo "" . $row[1] . "" ?> (<?php echo "" . $row[2] . "" ?>) that you provided.</p>
											<?php
											}
											if($row[5] == "EXCELENT SCORE!")
											{
											?>
											<p><font class="text-success"><?php echo "" . $row[3] . "" ?></font> has achieved a <font class="text-success"><?php echo "" . $row[5] . "" ?> (<?php echo "" . $row[4] . "" ?>)</font> from <?php echo "" . $row[1] . "" ?> (<?php echo "" . $row[2] . "" ?>) that you provided.</p>
											<?php
											}
											?>
										</li>
										<?php
										}
										?>
									</ul>
								</div>
							</div>
							<!-- END USER ACTIVITY -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="col-xs-12"><br/></div>
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid text-center">
				<p>&copy; 2017 Websterlancer. All rights reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->

	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {
		var data, options;

		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun',],
			series: [
				[200, 380, 350, 320, 410, 450, 570,],
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);

	});
	</script>
</body>

</html>
