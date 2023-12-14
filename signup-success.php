<?php
// signup-success.php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">

		<title>PawPoint</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="img/new_favicon.png" type="image/x-icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="css/feather.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="css/custom.css">

	</head>		
	<body class="login-body">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
			
			<!-- Header -->
			<header class="header header-custom header-fixed header-one">
				<div class="container">
					<nav class="navbar navbar-expand-lg header-nav">
						<div class="navbar-header">
							<a id="mobile_btn">
								<span class="bar-icon">
									<span></span>
									<span></span>
									<span></span>
								</span>
							</button>
							<a href="index.html" class="navbar-brand logo">
								<img src="img/new_logo.png" class="img-fluid" alt="Logo">
							</a>
						</div>
						<div class="main-menu-wrapper">
<!-- 							<div class="menu-header">
								<a href="index.html" class="menu-logo">
									<img src="img/logo.png" class="img-fluid" alt="Logo">
								</a>
								<a id="menu_close" class="menu-close" href="javascript:void(0);">
									<i class="fas fa-times"></i>
								</a>
							</div> -->
							<ul class="main-nav">
								<li>
									<a href="index.html">Home </a>
								</li>
								<li>
									<a href="how-it-works.html">How it works? </a>
								</li>
<!-- 								<li>
									<a href="booking.html">Start a consult </a>
								</li> -->
								<li>
									<a href="contact-us.php">Contact us </a>
								</li>

								<li class="register-btn">
									<a href="signup.php" class="btn reg-btn"><i class="feather-user"></i>Register</a>
								</li>
								<li class="register-btn">
									<a href="login.html" class="btn btn-primary log-btn"><i
											class="feather-lock"></i>Login</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</header>
			<!-- /Header -->

			<!-- Page Content -->
			<div class="login-content-info">
				<div class="container">

					<!-- Signup Success -->
					<div class="row justify-content-center">
						<div class="col-lg-4 col-md-6">
							<div class="account-content">
								<div class="login-shapes">
									<div class="shape-img-left">
										<img src="img/shape-01.png" alt="shape-image">
									</div>
									<div class="shape-img-right">
										<img src="img/shape-02.png" alt="shape-image">
									</div>
								</div>
								<div class="account-info">
									<div class="login-success-icon">
										<i class="fas fa-circle-check"></i>
									</div>
									<div class="login-title">
										<h3>Success</h3>
										<p class="mb-0">Your account has been successfully created!</p>
									</div>
									<form action="login.html">
										<div class="mb-0">
											<button class="btn w-100" type="submit">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /Signup Success -->

				</div>
			</div>		
			<!-- /Page Content -->

			<!-- Cursor -->
			<div class="mouse-cursor cursor-outer"></div>
			<div class="mouse-cursor cursor-inner"></div>
			<!-- /Cursor -->	

		</div>		
		<!-- /Main Wrapper -->
	
		<!-- jQuery -->
		<script src="js/jquery-3.7.0.min.js"></script>
		
		<!-- Bootstrap Bundle JS -->
		<script src="js/bootstrap.bundle.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="js/feather.min.js"></script>

		<!-- Custom JS -->
		<script src="js/script.js"></script>
	
	</body>
</html>