<?php
// welcome.php

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
		
		<meta charset="utf-8">
		<title>PawPoint</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		
		<!-- Favicons -->
		<link href="img/new_favicon.png" rel="icon">
		
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
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header header-custom header-fixed header-one">
				<div class="container">
					<nav class="navbar navbar-expand-lg header-nav">
						<div class="navbar-header">
							<a id="mobile_btn" href="javascript:void(0);">
								<span class="bar-icon">
									<span></span>
									<span></span>
									<span></span>
								</span>
							</a>
							<a href="welcome.php" class="navbar-brand logo">
								<img src="img/new_logo.png" class="img-fluid" alt="Logo">
							</a>
						</div>
						<div class="main-menu-wrapper">
							<ul class="main-nav">
							
								<li>
									<a href="welcome.php">Home</a>
								</li>

								<li>
									<a href="how-it-works-users.php">How it works?</a>
								</li>

								<li>
									<a href="booking-users.php">Start a consult</a>
								</li>

							</ul>
						</div>
						<ul class="nav header-navbar-rht">

							<!-- User Menu -->
							<li class="nav-item dropdown has-arrow logged-item">
								<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
									<span class="user-img">
										<img class="rounded-circle" src="img/patients/patient.jpg" width="31" alt="Darren Elder">
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="user-header">
										<div class="avatar avatar-sm">
											<img src="img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
										</div>
										<div class="user-text">
											<h6><?php echo $_SESSION['email']; ?></h6>
											<p class="text-muted mb-0">Patient</p>
										</div>
									</div>
									<a class="dropdown-item" href="patient-dashboard.php">Dashboard</a>
									<a class="dropdown-item" href="profile-settings.html">Profile Settings</a>
									<a class="dropdown-item" href="logout.php">Logout</a>
								</div>
							</li>
							<!-- /User Menu -->
							
						</ul>
					</nav>
				</div>
			</header>
			<!-- /Header -->

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar-two">
				<div class="container">
					<div class="row align-items-center inner-banner">
						<div class="col-md-12 col-12 text-center">
							<h2 class="breadcrumb-title">Booking</h2>
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item" aria-current="page">Booking</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content success-page-cont">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-lg-6">
						
							<!-- Success Card -->
							<div class="card success-card">
								<div class="card-body">
									<div class="success-cont">
										<i class="fas fa-check"></i>
										<h3>Appointment booked Successfully!</h3>
										<p>Appointment booked with <strong>Dr. Ruby Perrin</strong></p>
										<!-- <br> on <strong>12 Nov 2023 5:00PM to 6:00PM</strong></p> -->
										<!-- <a href="invoice-view.html" class="btn btn-primary view-inv-btn">View Invoice</a> -->
									</div>
								</div>
							</div>
							<!-- /Success Card -->
							
						</div>
					</div>
					
				</div>
			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer footer-one">
				<div class="footer-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-4">
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<a href="index.html"><img src="img/new_logo.png" alt="logo"></a>
									</div>
									<div class="footer-about-content">
										<p>Take advantage of the convenience of online consultations with a veterinarian! Gain access to professional advice, treatment guidelines, second opinions, and answers to all your pet-related questions from the comfort of your home.</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-3 col-md-4">
										<div class="footer-widget footer-menu">
											<h2 class="footer-title">Company</h2>
											<ul>
												<li><a href="welcome.php">Home</a></li>
												<li><a href="how-it-works-users.php">How it works?</a></li>
												<li><a href="booking-users.php">Consult</a></li>
											</ul>
										</div>
									</div>
									<div class="col-lg-6 col-md-4">
										<div class="footer-widget footer-contact">
											<h2 class="footer-title">Contact Us</h2>
											<div class="footer-contact-info">
												<div class="footer-address">
													<p><i class="feather-map-pin"></i> 3556 Beech Street, USA</p>
												</div>
												<div class="footer-address">
													<p><i class="feather-phone-call"></i> +1 234 567 8912</p>
												</div>
												<div class="footer-address mb-0">
													<p><i class="feather-mail"></i> pawpoint@example.com</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-7">
								<div class="footer-widget">
									<div class="social-icon">
										<ul>
											<li>
												<a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i> </a>
											</li>
											<li>
												<a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
											</li>
											<li>
												<a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i> </a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bottom">
					<div class="container">
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0"> Copyright © 2023 All Rights Reserved</p>
									</div>
								</div>
								<!-- <div class="col-md-6 col-lg-6"> -->
								
									<!-- Copyright Menu -->
<!-- 									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="privacy-policy.html">Privacy Policy</a></li>
											<li><a href="terms-condition.html">Terms and Conditions</a></li>
										</ul>
									</div> -->
									<!-- /Copyright Menu -->
									
								<!-- </div> -->
							</div>
						</div>
						<!-- /Copyright -->					
					</div>
				</div>
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="js/jquery-3.7.0.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="js/bootstrap.bundle.min.js"></script>
		
		<!-- Custom JS -->
		<script src="js/script.js"></script>
		
	</body>
</html>