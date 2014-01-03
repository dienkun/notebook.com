<!DOCTYPE html>
<html lang="en" class="bg-dark">
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
		<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
			<div class="container aside-xxl">
				<a class="navbar-brand block" href="index.html">Notebook</a>
				<section class="panel panel-default bg-white m-t-lg">
					<header class="panel-heading text-center">
						<strong>Sign in</strong>
					</header>
					<form data-validate="parsley" action="<?php echo base_url(); ?>index.php/signin/submit" method="post" class="panel-body wrapper-lg">
						<div class="panel-body">
							<?php
							if(isset($login_error))
								echo "<p><font color=\"red\">".$login_error."</font></p>";
							unset($login_error);
							?>
							<div class="form-group">
								<label class="control-label">Email</label>
								<input type="text" class="form-control input-lg" name= "email" data-type="email" data-required="true">
							</div>
							<div class="form-group">
								<label class="control-label">Password</label>
								<input type="password" class="form-control input-lg" name= "password" data-required="true">
							</div>
						</div>
						<div align="center">
							<button type="submit" class="btn btn-primary">
								Sign in
							</button>
						</div>

						<p class="text-muted text-center">
							<small>Do not have an account?</small>
						</p>
						<a href="<?php echo base_url(); ?>index.php/signup" class="btn btn-default btn-block">Create an account</a>
						</br>
					</form>
				</section>
			</div>
		</section>
		<!-- footer -->
		<footer id="footer">
			<div class="text-center padder">
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