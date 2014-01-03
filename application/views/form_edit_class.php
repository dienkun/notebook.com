<!DOCTYPE html>
<html lang="en" class="app">
	<head>
		<meta charset="utf-8" />
		<title>Notebook | Web Application</title>
		<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/app.v2.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/font.css" type="text/css" cache="false" />
		<!--[if lt IE 9]> <script src="js/ie/html5shiv.js" cache="false"></script> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/excanvas.js" cache="false"></script> <![endif]-->
	</head>
	<body>
		<section class="vbox">
			<header class="bg-dark dk header navbar navbar-fixed-top-xs">
				<div class="navbar-header aside-md">
					<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a><a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="<?php echo base_url(); ?>public/images/logo.png" class="m-r-sm">Notebook</a><a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a>
				</div>

				<ul class="nav navbar-nav navbar-right hidden-xs nav-user">
					<li class="hidden-xs">
						<a href="#" class="dropdown-toggle dk" data-toggle="dropdown"> <i class="fa fa-bell"></i> <span class="badge badge-sm up bg-danger m-l-n-sm count">2</span> </a>
						<section class="dropdown-menu aside-xl">
							<section class="panel bg-white">
								<header class="panel-heading b-light bg-light">
									<strong>You have <span class="count">2</span> notifications</strong>
								</header>
								<div class="list-group list-group-alt animated fadeInRight">
									<a href="#" class="media list-group-item"> <span class="pull-left thumb-sm"> <img src="<?php echo base_url(); ?>public/images/avatar.jpg" alt="John said" class="img-circle"> </span> <span class="media-body block m-b-none"> Use awesome animate.css
										<br>
										<small class="text-muted">10 minutes ago</small> </span> </a><a href="#" class="media list-group-item"> <span class="media-body block m-b-none"> 1.0 initial released
										<br>
										<small class="text-muted">1 hour ago</small> </span> </a>
								</div>
								<footer class="panel-footer text-sm">
									<a href="#" class="pull-right"><i class="fa fa-cog"></i></a><a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
								</footer>
							</section>
						</section>
					</li>

					<li class="dropdown">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="<?php echo base_url(); ?>public/images/avatar_default.jpg"> </span> <?php echo $account['name']; ?>
						<b class="caret"></b> </a>
						<ul class="dropdown-menu animated fadeInRight">
							<span class="arrow top"></span>
							<li>
								<a href="#"> <span class="badge bg-danger pull-right">3</span> Notifications </a>
							</li>
							<li>
								<a href="#">Help</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?php echo base_url(); ?>index.php/logout">Logout</a>
							</li>
						</ul>
					</li>
				</ul>
			</header>
			<section>
				<section class="hbox stretch">
					<!-- .aside -->
					<aside class="bg-dark lter aside-md hidden-print" id="nav">
						<section class="vbox">

							<section class="w-f scrollable">
								<div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
									<!-- nav -->
									<nav class="nav-primary hidden-xs">
										<ul class="nav">
											<li class="active">
												<a href="<?php echo base_url(); ?>index.php/signin" class="active"> <i class="fa fa-calendar icon"> <b class="bg-danger"></b> </i> <span>Calendar</span> </a>
											</li>
											<li >
												<a href="#layout" > <i class="fa fa-search icon"> <b class="bg-warning"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Lookup</span> </a>
												<ul class="nav lt">
													<li >
														<a href="<?php echo base_url(); ?>index.php/c_class" > <i class="fa fa-angle-right"></i> <span>Class</span> </a>
													</li>
													<li >
														<a href="<?php echo base_url(); ?>index.php/subject" > <i class="fa fa-angle-right"></i> <span>Subject</span> </a>
													</li>
													<li >
														<a href="<?php echo base_url(); ?>index.php/room" > <i class="fa fa-angle-right"></i> <span>Room</span> </a>
													</li>
												</ul>
											</li>

											<li >
												<a href="mail.html" > <b class="badge bg-danger pull-right">3</b> <i class="fa fa-envelope-o icon"> <b class="bg-primary dker"></b> </i> <span>Message</span> </a>
											</li>
											<li >
												<a href="notebook.html" > <i class="fa fa-pencil icon"> <b class="bg-info"></b> </i> <span>Notes</span> </a>
											</li>
										</ul>
									</nav>
									<!-- / nav -->
								</div>
							</section>
						</section>
					</aside>
					<!-- /.aside -->

					<section id="content">
						<section class="vbox">
							<div class="col-sm-6" >
								<br>
								<form data-validate="parsley" action="<?php echo base_url();?>index.php/c_class/edit_class_submit" method="post">
									<section class="panel panel-default">

										<header class="panel-heading">
											<span class="h4">Edit</span>
										</header>
										<div class="panel-body">
											<p class="text-muted">
												<a href="<?php echo base_url();?>index.php/c_class" class="text-info">Go back</a>
											</p>
											<div class="form-group">
												<label>Subject</label>
												<select name="subject_id" class="form-control m-b">
													<?php
										 			$subject_num =count($subjects);
													for ($j=1; $j< $subject_num; $j++) {
														if($class_info['subject_id']==$subjects[$j]['id'])
															echo "<option value=\"".$subjects[$j]['id']."\" selected>".$subjects[$j]['name']."</option>";
														else echo "<option value=\"".$subjects[$j]['id']."\">".$subjects[$j]['name']."</option>";
													}
													?>
												</select>							 																			
											</div>
											<div class="form-group">																								
												<label>Room</label>
												<select name="room_id" class="form-control m-b">
												<?php
									 			$room_num =count($rooms);
												for ($j=1; $j< $room_num; $j++) {
													if($class_info['room_id']==$rooms[$j]['id'])
														echo "<option value=\"".$rooms[$j]['id']."\" selected>".$rooms[$j]['room']."</option>";
													else echo "<option value=\"".$rooms[$j]['id']."\">".$rooms[$j]['room']."</option>";
												}
												?>		
												</select>											
											</div>
											<div class="form-group">												
													<label>Start date</label>
													<input type="text" id="start_date" name="start_date"  data-required="true" data-type="dateIso" class="form-control m-b" placeholder="YYYY-MM-DD" value="<?php echo $class_info['start_date'];?>">																								
											</div>
											<div class="form-group">
												<label>Weeks</label>
												<input type="text" id= "weeks" class="form-control m-b" name= "weeks"  data-type="number" data-required="true" value="<?php echo $class_info['weeks'];?>">
											</div>
											<div class="form-group">
												<label>Max student</label>												
												<input type="text" id= "max_student" name ="max_student"  data-type="number" class="form-control m-b" data-required="true" value="<?php echo $class_info['max_student'];?>">
												<input type="hidden" id= "class_id" name="class_id" class="form-control m-b" value="<?php echo $class_info['id'];?>">

											</div>
										</div>
										<footer class="panel-footer text-right bg-light lter">																			
											<button type="submit" class="btn btn-success btn-s-xs">
												Save changes
											</button>
										</footer>
									</section>
								</form>
							
							</div>
						</section>
					</section>
				</section>
			</section>
		</section>
		<script src="<?php echo base_url(); ?>public/js/app.v2.js"></script>
		<script src="<?php echo base_url(); ?>public/js/parsley/parsley.min.js" cache="false"></script>
		<script src="<?php echo base_url(); ?>public/js/parsley/parsley.extend.js" cache="false"></script>
	</body>
</html>