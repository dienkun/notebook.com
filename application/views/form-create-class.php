<!DOCTYPE html>
<html lang="en" class="app">
	<head>
		<meta charset="utf-8" />
		<title>Notebook | Web Application</title>
		<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/app.v2.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/font.css" type="text/css" cache="false" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/js/fuelux/fuelux.css" type="text/css" cache="false"/>
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
							<section class="scrollable padder">
								<div class="m-b-md">
									<h3 class="m-b-none">Form wizard</h3>
								</div>
								<div class="panel panel-default">
									<div class="wizard clearfix" id="form-wizard">
										<ul class="steps">
											<li data-target="#step1" class="active">
												<span class="badge badge-info">1</span>Step 1
											</li>
											<li data-target="#step2">
												<span class="badge">2</span>Step 2
											</li>
											<li data-target="#step3">
												<span class="badge">3</span>Step 3
											</li>
											<li data-target="#step4">
												<span class="badge">4</span>Step 4
											</li>
											<li data-target="#step5">
												<span class="badge">5</span>Step 5
											</li>
											<li data-target="#step6">
												<span class="badge">6</span>Step 6
											</li>											
										</ul>
									</div>
									<div class="step-content">
										<form action="<?php echo base_url(); ?>index.php/c_class/create_class_submit" method="post">
											<div class="step-pane active" id="step1">																																															
													<p>
														Subject
													</p>
													<select name="subject_id" class="form-control">
														<?php
											 			$subject_num =count($subjects);
														for ($j=1; $j< $subject_num; $j++) {															
															echo "<option value=\"".$subjects[$j]['id']."\">".$subjects[$j]['name']."</option>";
														}
														?>
													</select>	
													<br>						 																			
													<p>
														Room
													</p>															
													<select name="room_id" class="form-control">
													<?php
										 			$room_num =count($rooms);
													for ($j=1; $j< $room_num; $j++) {														
														echo "<option value=\"".$rooms[$j]['id']."\">".$rooms[$j]['room']."</option>";
													}
													?>		
													</select>														
																																									

											</div>
											<div class="step-pane" id="step2">
												<p>
													Start date
												</p>																																															
												<input type="text" class="form-control" id="start_date" name="start_date" data-trigger="change" data-required="true" data-type="dateIso"  placeholder="YYYY-MM-DD">																										
											</div>
											<div class="step-pane" id="step3">
												<p>
													Weeks
												</p>													
												<input type="text" id= "weeks" class="form-control" data-type="number" data-trigger="change" data-required="true" name= "weeks"  >
											</div>
											<div class="step-pane" id="step4">
											<p>
												Max student
											</p>													
											<input type="text" class="form-control" id= "max_student" data-type="number" name ="max_student" data-trigger="change"  data-required="true">
											</div>
											<div class="step-pane" id="step5">
												<br>
											<p>
												Enter number of periods per week
											</p>													
											<input type="text" class="form-control" onchange="dayChange()" id= "days" data-type="number" name ="days" data-trigger="change"  data-required="true">
											</div>
											<div class="step-pane" id="step6">
												<p id="display_days">

												</p>
											</div>
											<div id="buttonhidden" style="display: none;"> <input id="submit_button" type="submit"></div>

										</form>
										<div class="actions m-t">
											<button type="button" class="btn btn-default btn-sm btn-prev" data-target="#form-wizard" data-wizard="previous" disabled="disabled">
												Prev
											</button>
											<button type="submit" class="btn btn-default btn-sm btn-next" onclick="checkTime()"  data-target="#form-wizard" data-wizard="next" data-last="Finish">
												Next
											</button>
										</div>
									</div>
								</div>
							</section>	
						</section>
					</section>
				</section>
			</section>
		</section>
		<script src="<?php echo base_url(); ?>public/js/app.v2.js"></script>
		<script src="<?php echo base_url(); ?>public/js/fuelux/fuelux.js" cache="false"></script>		
		<script src="<?php echo base_url(); ?>public/js/parsley/parsley.min.js" cache="false"></script>
		<div>
		
	</div>
	
	<script type="text/javascript">
	function checkTime() {		
		txt=document.getElementById('texthidden').innerHTML;
		if(txt=="true"){						
			days=document.getElementById('days').value;
			var Msg="";
			var error="false";
			for (var i = 1; i <= days; i++) {
				var h1 = document.getElementById('beginHour'+i).value;
				var m1 = document.getElementById('beginMin'+i).value;
				var h2 = document.getElementById('endHour'+i).value;
				var m2 = document.getElementById('endMin'+i).value;
				var t = h2 * 60 + m2 - h1 * 60 - m1;
				if (t <= 0) {
					error="true";
					Msg+="Day "+i+ ": The ending time must be greater than the beginning time!\n";			
					document.getElementById('endHour'+i).value = h1;
					document.getElementById('endHour'+i).value = m1;
				}
			}
			if(error=="true")alert(Msg);
			else document.getElementById("submit_button").click();	
		}
		else alert("Please select time!");	
	}
	</script>

	<script type="text/javascript">
	function check(sel){
		document.getElementById('texthidden').innerHTML="true";
		//alert(document.getElementById('texthidden').innerHTML);
	}
	</script>


	<script type="text/javascript">
	function dayChange() {
		days=document.getElementById('days').value;
		//document.getElementById('day').value = "abcdefgh";

		var tab="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
		var tab2="&nbsp;&nbsp;&nbsp;&nbsp;"
		var day="Day";		
		var begin="Begin time";
		var end="End time";
		var select_open1="<select onchange=\"check(this);\" name=\"";
		var select_open2="\"id=\"";
		var select_open3="\">"
		var select_open4="<select name=\"";
		var select_close="</select>";
		var option_open="<option>";
		var option_close="</option>";
		var dayweek="dayofweek";
		var bh="beginHour";
		var bm="beginMin";
		var eh="endHour";
		var em="endMin";
		var br="<br><br>";
		var temp = "<input type=\"text\" value=\"abcdef\"><br> ";
		var temp1 = "&nbsp;";		
		/*
		temp2="&nbsp;&nbsp;&nbsp;abc<br>";
		for (var i=0; i<days; i++) {
			temp1 += "day"+i;
		}
		*/
		for (var i=1; i<=days; i++) {
			temp1 += br+day+' '+i+br;
			temp1 += tab+"Day of week"+tab+tab+begin+tab+tab+tab+end+br;
			temp1 +=select_open4+dayweek+i+select_open2+dayweek+i+select_open3;
			
			temp1+=option_open+"Monday"+option_close;
			temp1+=option_open+"Tuesday"+option_close;
			temp1+=option_open+"Wednesday"+option_close;
			temp1+=option_open+"Thursday"+option_close;
			temp1+=option_open+"Friday"+option_close;
			temp1+=option_open+"Saturday"+option_close;
			temp1+=option_open+"Sunday"+option_close;

			temp1+=select_close+tab;

			temp1 +=select_open1+bh+i+select_open2+bh+i+select_open3;
			for(var j=0;j<24;j++){
				temp1+=option_open+j+option_close;
			}
			temp1+=select_close;

			temp1 +=select_open1+bm+i+select_open2+bm+i+select_open3;
			for(var j=0;j<60;j++){
				temp1+=option_open+j+option_close;
			}
			temp1+=select_close;

			temp1+=tab+tab;

			temp1 +=select_open1+eh+i+select_open2+eh+i+select_open3;
			for(var j=0;j<24;j++){
				temp1+=option_open+j+option_close;
			}
			temp1+=select_close;
			temp1 +=select_open1+em+i+select_open2+em+i+select_open3;
			for(var j=0;j<60;j++){
				temp1+=option_open+j+option_close;
			}
			temp1+=select_close+br;
		}

		temp1+="<div id=\"texthidden\" style=\"display: none;\">false</div>"
		document.getElementById('display_days').innerHTML = temp1;
	}
	</script>		
	</body>
</html>

								