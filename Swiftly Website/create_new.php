<!doctype html>
<html lang="en">

<head>
	<title>Create New | Quiz Time University</title>
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
									<li><a href="create_new.php" class="active"><i class="lnr lnr-pencil"></i><span>Create New</span></a></li>
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
					<h3 class="page-title">Create New</h3>
					<!-- START MULTIPLE CHOICE -->
					<section id="panel1">
						<div class="row">
							<div class="col-md-12">
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Multiple Choice</h3>
										<div class="right">
											<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
											<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
										</div>
									</div>
									<div class="panel-body">
										<form id="form1" action="create_new.php#panel1" method="POST" enctype="multipart/form-data">
											<div class="col-md-6">
												<label><font>Header</font></label><br/>
												<input type="text" class="form-control" name="qHeader1" placeholder="Enter question header here..."/>
											</div>
											<div class="col-md-6">
												<label><font>Subject</font></label><br/>
												<input type="text" class="form-control" name="qSubject1" placeholder="Enter question subject here..."/><br/>
											</div>
											<div class="col-md-12">
												<textarea class="form-control" name="qQuestion1" placeholder="Enter question here.." rows="5"></textarea>
											</div>
											<div class="col-md-12"><br/></div>
											<div class="col-md-12">
												<label class="fancy-radio">
													<input type="radio" name="answer" value="A">
													<span><i></i>Choice A</span>
												</label>
												<input type="text" class="form-control" name="ans_a" placeholder="Enter choice A here.."/><br/>
												<label class="fancy-radio">
													<input type="radio" name="answer" value="B">
													<span><i></i>Choice B</span>
												</label>
												<input type="text" class="form-control" name="ans_b" placeholder="Enter choice B here.."/><br/>
												<label class="fancy-radio">
													<input type="radio" name="answer" value="C">
													<span><i></i>Choice C</span>
												</label>
												<input type="text" class="form-control" name="ans_c" placeholder="Enter choice C here.."/><br/>
												<label class="fancy-radio">
													<input type="radio" name="answer" value="D">
													<span><i></i>Choice D</span>
												</label>
												<input type="text" class="form-control" name="ans_d" placeholder="Enter choice D here.."/><br/>
											</div>
											<div class="col-md-12 text-right">
												<button type="submit" class="btn btn-success" name="btn_save1"><i class="fa fa-check-circle"></i> Save Question</button>
											</div>

											<?php
												if(isset($_POST['btn_save1']))
												{
													if($_POST['qHeader1'] != null && $_POST['qSubject1'] != null && $_POST['qQuestion1'] != null && $_POST['ans_a'] != null && $_POST['ans_b'] != null && $_POST['ans_c'] != null && $_POST['ans_d'] != null && $_POST['answer'] != null)
													{
														$INSERT="INSERT INTO multiquest_tb(Header,Subject,Question,Ans_A, Ans_B, Ans_C, Ans_D, Answer, Provider) VALUES('". $_POST['qHeader1'] ."','". $_POST['qSubject1'] ."','". $_POST['qQuestion1'] ."','". $_POST['ans_a'] ."','". $_POST['ans_b'] ."','". $_POST['ans_c'] ."','". $_POST['ans_d'] ."','". $_POST['answer'] ."','". $user ."')";
														$INSERT_QUERY=mysql_query($INSERT,$datacon);

														if(mysql_affected_rows() == 1)
														{
															echo '<script type="text/javascript">alert("Multiple choice question save successfuly!")</script>';
														}
														else
														{
															echo '<script type="text/javascript">alert("There was an error saving multiple choice question. Please check your entry for mistakes!")</script>';
														}
													}
													else
													{
														echo '<script type="text/javascript">alert("Please fill up all the given fields!")</script>';
													}
												}
											?>

										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- END MULTIPLE CHOICE -->
					<!-- START IDENTIFICATION -->
					<section id="panel2">
						<div class="row">
							<div class="col-md-12">
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Identification</h3>
										<div class="right">
											<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
											<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
										</div>
									</div>
									<div class="panel-body">
										<form id="form2" action="create_new.php#panel2" method="POST" enctype="multipart/form-data">
											<div class="col-md-6">
												<label><font>Header</font></label><br/>
												<input type="text" class="form-control" name="qHeader2" placeholder="Enter question header here..."/>
											</div>
											<div class="col-md-6">
												<label><font>Subject</font></label><br/>
												<input type="text" class="form-control" name="qSubject2" placeholder="Enter question subject here..."/><br/>
											</div>
											<div class="col-md-12">
												<textarea class="form-control" name="qQuestion2" placeholder="Enter question here.." rows="5"></textarea>
											</div>
											<div class="col-md-12"><br/></div>
											<div class="col-md-12">
												<textarea class="form-control" name="ans_iden" placeholder="Enter question answer.." rows="3"></textarea>
											</div>
											<div class="col-md-12"><br/></div>
											<div class="col-md-12 text-right">
												<button type="submit" class="btn btn-success" name="btn_save2"><i class="fa fa-check-circle"></i> Save Question</button>
											</div>

											<?php
													if(isset($_POST['btn_save2']))
													{
														if($_POST['qHeader2'] != null && $_POST['qSubject2'] != null && $_POST['qQuestion2'] != null && $_POST['ans_iden'] != null)
														{
															$INSERT="INSERT INTO iden_tb(Header,Subject,Question, Answer, Provider) VALUES('". $_POST['qHeader2'] ."','". $_POST['qSubject2'] ."','". $_POST['qQuestion2'] ."','". $_POST['ans_iden'] ."','". $user ."')";
															$INSERT_QUERY=mysql_query($INSERT,$datacon);

															if(mysql_affected_rows() == 1)
				                      {
				                        echo '<script type="text/javascript">alert("Identification question save successfuly!")</script>';
				                      }
															else
															{
																echo '<script type="text/javascript">alert("There was an error saving Identification question. Please check your entry for mistakes!")</script>';
															}
														}
														else
														{
															echo '<script type="text/javascript">alert("Please fill up all the given fields!")</script>';
														}
													}
											 ?>

										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- END IDENTIFICATION -->
					<!-- START MATCHING TYPE -->
					<section id="panel3">
						<div class="row">
							<div class="col-md-12">
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Matching Type</h3>
										<div class="right">
											<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
											<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
										</div>
									</div>
									<div class="panel-body">
										<form id="form3" action="create_new.php#panel3" method="POST" enctype="multipart/form-data">
											<div class="col-md-6">
												<label><font>Header</font></label><br/>
												<input type="text" class="form-control" name="qHeader3" placeholder="Enter question header here..."/>
											</div>
											<div class="col-md-6">
												<label><font>Subject</font></label><br/>
												<input type="text" class="form-control" name="qSubject3" placeholder="Enter question subject here..."/><br/>
											</div>
											<div class="col-md-12">
												<textarea class="form-control" name="qQuestion3" placeholder="Enter 1st match here.." rows="5"></textarea>
											</div>
											<div class="col-md-12"><br/></div>
											<div class="col-md-12">
												<textarea class="form-control" name="ans_matching" placeholder="Enter 2nd match here.." rows="5"></textarea>
											</div>
											<div class="col-md-12"><br/></div>
											<div class="col-md-12 text-center">

											</div>
											<div class="col-md-12 text-right">
												<button type="submit" class="btn btn-success" name="btn_save3"><i class="fa fa-check-circle"></i> Save Question</button>
											</div>

											<?php
													if(isset($_POST['btn_save3']))
													{
														if($_POST['qHeader3'] != null && $_POST['qSubject3'] != null && $_POST['qQuestion3'] != null && $_POST['ans_matching'] != null)
														{
															$INSERT="INSERT INTO match_tb(Header,Subject,Question, Answer, Provider) VALUES('". $_POST['qHeader3'] ."','". $_POST['qSubject3'] ."','". $_POST['qQuestion3'] ."','". $_POST['ans_matching'] ."','". $user ."')";
															$INSERT_QUERY=mysql_query($INSERT,$datacon);

															if(mysql_affected_rows() == 1)
				                      {
				                        echo '<script type="text/javascript">alert("Matching type question save successfuly!")</script>';
				                      }
															else
															{
																echo '<script type="text/javascript">alert("There was an error saving Matching type question. Please check your entry for mistakes!")</script>';
															}
														}
														else
														{
															echo '<script type="text/javascript">alert("Please fill up all the given fields!")</script>';
														}
													}
											 ?>

										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- END MATCHING TYPE -->
					<!-- START TRUE OR FALSE -->
					<section id="panel4">
						<div class="row">
							<div class="col-md-12">
								<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">True or False</h3>
										<div class="right">
											<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
											<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
										</div>
									</div>
									<div class="panel-body">
										<form id="form4" action="create_new.php#panel4" method="POST" enctype="multipart/form-data">
											<div class="col-md-6">
												<label><font>Header</font></label><br/>
												<input type="text" class="form-control" name="qHeader4" placeholder="Enter question header here..."/>
											</div>
											<div class="col-md-6">
												<label><font>Subject</font></label><br/>
												<input type="text" class="form-control" name="qSubject4" placeholder="Enter question subject here..."/><br/>
											</div>
											<div class="col-md-12">
												<textarea class="form-control" name="qQuestion4" placeholder="Enter question here.." rows="5"></textarea>
											</div>
											<div class="col-md-12"><br/></div>
											<div class="col-lg-4"></div>
											<div class="col-lg-4">
												<div class="col-md-6">
													<label class="fancy-radio">
														<input type="radio" name="ans_tf" value="True">
														<span><i></i><font size="6">True</font></span>
													</label>
												</div>
												<div class="col-md-6">
													<label class="fancy-radio">
														<input type="radio" name="ans_tf" value="False">
														<span><i></i><font size="6">False</font></span>
													</label>
												</div>
											</div>
											<div class="col-lg-4"></div>
											<div class="col-md-12 text-right">
												<button type="submit" class="btn btn-success" name="btn_save4"><i class="fa fa-check-circle"></i> Save Question</button>
											</div>

											<?php
			                    if(isset($_POST['btn_save4']))
			                    {
														if($_POST['qHeader4'] != null && $_POST['qSubject4'] != null && $_POST['qQuestion4'] != null && $_POST['ans_tf'] != null)
														{
															$INSERT="INSERT INTO tf_tb(Header,Subject,Question, Answer, Provider) VALUES('". $_POST['qHeader4'] ."','". $_POST['qSubject4'] ."','". $_POST['qQuestion4'] ."','". $_POST['ans_tf'] ."','". $user ."')";
				                      $INSERT_QUERY=mysql_query($INSERT,$datacon);

				                      if(mysql_affected_rows() == 1)
				                      {
				                         echo '<script type="text/javascript">alert("True or False question save successfuly!")</script>';
				                      }
															else
															{
																echo '<script type="text/javascript">alert("There was an error saving True or False question. Please check your entry for mistakes!")</script>';
															}
														}
														else
														{
															echo '<script type="text/javascript">alert("Please fill up all the given fields!")</script>';
														}
													}

			                 ?>

										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- END TRUE OR FALSE -->
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
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>

</body>

</html>
