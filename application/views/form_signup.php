<!DOCTYPE html>
<html lang="en" class="bg-dark">
	<head>
		<meta charset="utf-8" />
		<title>Notebook | Web Application</title>
		<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/app.v2.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/font.css" type="text/css" cache ="false"/>
		<!--[if lt IE 9]> <script src="js/ie/html5shiv.js" cache="false"></script> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/excanvas.js" cache="false"></script> <![endif]-->
	</head>
	<body>
		<section id="content" class="m-t-lg wrapper-md animated fadeInDown">
			<div class="container aside-xxl">
				<a class="navbar-brand block" href="index.html">Notebook</a>

				<section class="panel panel-default bg-white m-t-lg">
					<header class="panel-heading text-center">
						<strong>Sign up</strong>
					</header>					
					<form data-validate="parsley" action="<?php echo base_url(); ?>index.php/signup/submit" method="post" class="panel-body wrapper-lg">
						<div class="panel-body">							
							<?php
							if(isset($register_error))
								echo "<p><font color=\"red\">".$register_error."</font></p>";
							unset($register_error);
							?>
							<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" name= "email" data-type="email" data-required="true">
							</div>
							<div class="form-group pull-in clearfix">
							<div class="col-sm-6">
							<label>Enter password</label>
							<input type="password" class="form-control" name= "password" data-required="true" id="pwd">
							</div>
							<div class="col-sm-6">
							<label>Confirm password</label>
							<input type="password" class="form-control" name = "re-password"data-equalto="#pwd" data-required="true">
							</div>
							</div>
							<div class="form-group">
							<label>Your name</label>
							<input type="text" class="form-control" data-required="true" name="name">
							</div>
							<div class="checkbox">
							<label>
							<input type="checkbox" name="check" checked data-required="true">
							I agree to the <a href="#" class="text-info">Terms of Service</a> </label>
							</div>
						</div>
						<div align="center">
							<button type="submit" class="btn btn-primary">
								Sign up
							</button>
						</div>

						<div class="line line-dashed"></div>
						<p class="text-muted text-center">
							<small>Already have an account?</small>
						</p>
						<a href="<?php echo base_url(); ?>index.php/signin" class="btn btn-default btn-block">Sign in</a>
						</br>
					</form>
				</section>

			</div>
		</section>
		<!-- footer -->
		<footer id="footer">
			<div class="text-center padder clearfix">
				<p>
					<small>Web app framework base on Bootstrap
						<br>
						&copy; 2013</small>
				</p>
			</div>
		</footer>
		<!-- / footer -->
		<script src="<?php echo base_url(); ?>public/js/app.v2.js"></script>
		<script src="<?php echo base_url(); ?>public/js/parsley/parsley.min.js" cache="false"></script>
		<script src="<?php echo base_url(); ?>public/js/parsley/parsley.extend.js" cache="false"></script>
		<!-- Bootstrap -->
		<!-- App -->
	</body>
</html>