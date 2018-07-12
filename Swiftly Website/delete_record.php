<!doctype html>
<html lang="en">

<head>
	<title>Delete Record | Quiz Time University</title>
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
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- ICONS -->
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
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go!</button></span>
					</div>
				</form>
				<div class="navbar-btn navbar-btn-right">
					<a class="btn btn-success update-pro" href="https://www.swifly.com" title="Download App" target="_blank"><i class="fa fa-download"></i> <span>Download App</span></a>
				</div>

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
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
								$select = mysql_query("SELECT * FROM messages_tb WHERE Reciever='$user' GROUP BY Sender LIMIT 10",$datacon);
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
								<li><a href="notifications.php" class="more">You don't have any new messages yet!</a></li>
								<?php
								}
								?>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<?php
								$select = mysql_query("SELECT * FROM notification_tb WHERE Reciever='$user'",$datacon);
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
								$select = mysql_query("SELECT * FROM notification_tb WHERE Reciever='$user' LIMIT 10",$datacon);
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
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Account Security</a></li>
								<li><a href="#">Managing Accounts</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo '<img src="data:image/jpeg;base64,'. base64_encode($avatar) .'" class="img-circle" alt="Avatar">'; ?>
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
						<li><a href="dashboard.php" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="quizzes.php" class=""><i class="lnr lnr-database"></i> <span>Quizzes</span></a></li>
						<li><a href="questions.php" class=""><i class="lnr lnr-question-circle"></i> <span>Question Bank</span></a></li>
						<li>
							<a href="#subPages1" data-toggle="collapse" class="collapsed active"><i class="lnr lnr-screen"></i> <span>Manage Questions</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages1" class="collapse ">
								<ul class="nav">
									<li><a href="create_new.php" class=""><i class="lnr lnr-pencil"></i><span>Create New</span></a></li>
									<li><a href="update_record.php" class=""><i class="lnr lnr-magic-wand"></i> <span>Update Record</span></a></li>
									<li><a href="delete_record.php" class="active"><i class="lnr lnr-trash"></i><span>Delete Record</span></a></li>
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
					<h3 class="page-title">Delete Record</h3>
					<div class="row">
						<!-- TABBED CONTENT -->
						<div class="custom-tabs-line tabs-line-bottom left-aligned">
							<ul class="nav" role="tablist">
								<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Multiple Choice</a></li>
								<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Identification</span></a></li>
								<li><a href="#tab-bottom-left3" role="tab" data-toggle="tab">Matching Type</span></a></li>
								<li><a href="#tab-bottom-left4" role="tab" data-toggle="tab">True or False</span></a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab-bottom-left1">
								<!-- START MULTIPLE CHOICE TABLE -->
								<section id="Multiple">
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-scrolling">
												<div class="panel-heading">
													<h3 class="panel-title">Multiple Choice Questions</h3>
													<div class="right">
														<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
														<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
													</div>
												</div>
												<div class="panel-body">
													<form id="form1" action="delete_record.php" method="POST" enctype="multipart/form-data">

													<?php
														$select = mysql_query("SELECT * FROM multiquest_tb WHERE Provider='$user' ORDER BY Header DESC",$datacon);
														while($row=mysql_fetch_array($select))
														{
													?>

														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<table class="table table-hover">
																<tr>
																	<td>
																		<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
																			<?php echo "".$row[3]."" ?>
																		</div>
																		<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
																			<button type="submit" class="btn btn-primary" name="btn_delete1" value="<?php echo "".$row[0]."" ?>"><i class="lnr lnr-trash"></i></button>
																		</div>
																	</td>
																</tr>
															</table>
														</div>

													<?php
														}

														if(isset($_POST['btn_delete1']))
														{
															$id=$_POST['btn_delete1'];
															$DELETE="DELETE FROM multiquest_tb WHERE Id='$id'";
															$DELETE_QUERY=mysql_query($DELETE,$datacon);

															if(mysql_affected_rows() == 1)
															{
																echo '<script type="text/javascript">alert("Question record successfuly deleted!")</script>';
																echo '<script type="text/javascript">window.location="delete_record.php"</script>';
															}
														}
													?>

												 	</form>
												</div>
												<div class="panel-footer text-center">
													<h5>End Of Multiple Choice</h5>
												</div>
											</div>
										</div>
									</div>
								</section>
								<!-- END MULTIPLE CHOICE TABLE -->
							</div>
							<div class="tab-pane fade" id="tab-bottom-left2">
								<!-- START IDENTIFICATION TABLE -->
								<section id="Identification">
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-scrolling">
												<div class="panel-heading">
													<h3 class="panel-title">Identification Questions</h3>
													<div class="right">
														<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
														<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
													</div>
												</div>
												<div class="panel-body">
													<form id="form1" action="delete_record.php" method="POST" enctype="multipart/form-data">

														<?php
														$select = mysql_query("SELECT * FROM iden_tb WHERE Provider='$user' ORDER BY Header DESC",$datacon);
														while($row=mysql_fetch_array($select))
														{
														?>

															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<table class="table table-hover">
																	<tr>
																		<td>
																			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
																				<?php echo "".$row[3]."" ?>
																			</div>
																			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
																				<button type="submit" class="btn btn-primary" name="btn_delete2" value="<?php echo "".$row[0]."" ?>"><i class="lnr lnr-trash"></i></button>
																			</div>
							                      </td>
																		</td>
																	</tr>
																</table>
															</div>

															<?php
																}

																if(isset($_POST['btn_delete2']))
																{
																	$id=$_POST['btn_delete2'];
																	$DELETE="DELETE FROM iden_tb WHERE Id='$id'";
																	$DELETE_QUERY=mysql_query($DELETE,$datacon);

																	if(mysql_affected_rows() == 1)
																	{
																		echo '<script type="text/javascript">alert("Question record successfuly deleted!")</script>';
																		echo '<script type="text/javascript">window.location="delete_record.php"</script>';
																	}
																}
															?>

													</form>
												</div>
												<div class="panel-footer text-center">
													<h5>End Of Identification</h5>
												</div>
											</div>
										</div>
									</div>
								</section>
								<!-- END IDENTIFICATION TABLE -->
							</div>
							<div class="tab-pane fade" id="tab-bottom-left3">
								<!-- START MATCHING TABLE -->
								<section id="Matching Type">
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-scrolling">
												<div class="panel-heading">
													<h3 class="panel-title">Matching Type Questions</h3>
													<div class="right">
														<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
														<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
													</div>
												</div>
												<div class="panel-body">
													<form id="form1" action="delete_record.php" method="POST" enctype="multipart/form-data">

														<?php
														$select = mysql_query("SELECT * FROM match_tb WHERE Provider='$user' ORDER BY Header DESC",$datacon);
														while($row=mysql_fetch_array($select))
														{
														?>

															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<table class="table table-hover">
																	<tr>
																		<td>
																			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
																				<?php echo "".$row[3]."" ?>
																			</div>
																			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
																				<button type="submit" class="btn btn-primary" name="btn_delete3" value="<?php echo "".$row[0]."" ?>"><i class="lnr lnr-trash"></i></button>
																			</div>
							                      </td>
																		</td>
																	</tr>
																</table>
															</div>

															<?php
																}

																if(isset($_POST['btn_delete3']))
																{
																	$id=$_POST['btn_delete3'];
																	$DELETE="DELETE FROM match_tb WHERE Id='$id'";
																	$DELETE_QUERY=mysql_query($DELETE,$datacon);

																	if(mysql_affected_rows() == 1)
																	{
																		echo '<script type="text/javascript">alert("Question record successfuly deleted!")</script>';
																		echo '<script type="text/javascript">window.location="delete_record.php"</script>';
																	}
																}
															?>

													</form>
												</div>
												<div class="panel-footer text-center">
													<h5>End Of Matching Type</h5>
												</div>
											</div>
										</div>
									</div>
								</section>
								<!-- END MATCHING TABLE -->
							</div>
							<div class="tab-pane fade" id="tab-bottom-left4">
								<!-- START TRUE OR FALSE TABLE -->
								<section id="TrueOrFalse">
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-scrolling">
												<div class="panel-heading">
													<h3 class="panel-title">True or False Questions</h3>
													<div class="right">
														<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
														<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
													</div>
												</div>
												<div class="panel-body">
													<form id="form1" action="delete_record.php" method="POST" enctype="multipart/form-data">

														<?php
														$select = mysql_query("SELECT * FROM tf_tb WHERE Provider='$user' ORDER BY Header DESC",$datacon);
														while($row=mysql_fetch_array($select))
															{
														?>

															<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																<table class="table table-hover">
																	<tr>
																		<td>
																			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
																				<?php echo "".$row[3]."" ?>
																			</div>
																			<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
																				<button type="submit" class="btn btn-primary" name="btn_delete4" value="<?php echo "".$row[0]."" ?>"><i class="lnr lnr-trash"></i></button>
																			</div>
							                      </td>
																		</td>
																	</tr>
																</table>
															</div>

															<?php
																}

																if(isset($_POST['btn_delete4']))
																{
																	$id=$_POST['btn_delete4'];
																	$DELETE="DELETE FROM tf_tb WHERE Id='$id'";
																	$DELETE_QUERY=mysql_query($DELETE,$datacon);

																	if(mysql_affected_rows() == 1)
																	{
																		echo '<script type="text/javascript">alert("Question record successfuly deleted!")</script>';
																		echo '<script type="text/javascript">window.location="delete_record.php"</script>';
																	}
																}
															?>

													</form>
												</div>
												<div class="panel-footer text-center">
													<h5>End Of True or False</h5>
												</div>
											</div>
										</div>
									</div>
								</section>
								<!-- END TRUE OR FALSE TABLE -->
							</div>
						</div>
						<!-- END TABBED CONTENT -->
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
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
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
