<?php

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
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
		<meta name="keywords" content="practo clone, doccure, doctor appointment, Practo clone html template, doctor booking template">
		<meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">

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

<body>

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

<!-- 							<li>
								<a href="contact-us.php">Contact us</a>
							</li>

							<li class="register-btn">
								<a href="signup.php" class="btn reg-btn"><i class="feather-user"></i>Register</a>
							</li>
							<li class="register-btn">
								<a href="login.html" class="btn btn-primary log-btn"><i
										class="feather-lock"></i>Login</a>
							</li> -->

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
									<!-- <a class="dropdown-item" href="doctor-dashboard.html">Dashboard</a> -->
									<a class="dropdown-item" href="profile-settings.html">Profile Settings</a>
									<a class="dropdown-item" href="logout.php">Logout</a>
								</div>
							</li>
							<!-- /User Menu -->

						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!-- /Header -->

		<!-- Breadcrumb -->
		<div class="breadcrumb-bar-two">
			<div class="container">
				<div class="row align-items-center inner-banner">
					<div class="col-md-12 col-12 text-center">
						<h2 class="breadcrumb-title">How It Works?</h2>
						<nav aria-label="breadcrumb" class="page-breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
								<li class="breadcrumb-item" aria-current="page">How It Works?</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<!-- /Breadcrumb -->

		<!-- About Us -->
		<section class="about-section">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-12">
						<div class="about-img-info">
							<div class="row">
								<div class="col-md-6">
									<div class="about-inner-img">
										<div class="about-img">
											<img src="img/about-img1.jpg" class="img-fluid" alt="about-image">
										</div>
									</div>
								</div>
<!-- 								<div class="col-md-6">
									<div class="about-inner-img">
										<div class="about-box">
											<h4>Over 10+ Years Experience</h4>
										</div>
										<div class="about-img">
											<img src="img/about-img3.jpg" class="img-fluid" alt="about-image">
										</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="section-inner-header about-inner-header">
							<h6>Easy and affordable</h6>
							<h3>How it works?</h3>
						</div>
						<div class="about-content">
							<div class="about-content-details">
								<p>- To get started, simply create an account to unlock the full range of services and connect with experienced veterinarians online.</p>
								<p>- Choose a convenient date and time from our veterinarian's calendar.</p>
								<p>- Fill out a brief questionnaire regarding your pet's condition and the reason for the consultation.</p>
								<p>- Securely make payment for your appointments using a payment gateway such as PayPal.</p>
								<p>- Receive an email confirmation and an invitation for an online meeting on the Google Meets platform.</p>
								<p>With the ease of online consultations, you can ensure the well-being of your furry friends without the need for physical visits. Sign up today to access expert guidance and personalized care for your pets</p>
							</div>
							<div class="about-contact">
								<div class="about-contact-icon">
									<span><img src="img/icons/phone-icon.svg" alt="phone-image"></span>
								</div>
								<div class="about-contact-text">
									<p>Need Emergency?</p>
									<h4>+1 234 567 8912</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /About Us -->

		<!-- Why Choose Us -->
		<section class="why-choose-section">
		  <div class="container">
		    <div class="row">
		      <div class="col-md-12">
		        <div class="section-inner-header text-center">
		          <h2>Why Choose Us?</h2>
		        </div>
		      </div>
		    </div>
		    <div class="row justify-content-center">
		      <div class="col-lg-3 col-md-6 d-flex">
		        <div class="card why-choose-card w-100">
		          <div class="card-body">
		            <div class="why-choose-icon">
		              <span><img src="img/icons/choose-01.svg" alt="choose-image"></span>
		            </div>
		            <div class="why-choose-content">
		              <h4>Easy Access</h4>
		              <p>You get professional guidance to deal with everyday and emergency situations faster, more flexibly and more accessible.</p>
		            </div>
		          </div>
		        </div>
		      </div>
		      <div class="col-lg-3 col-md-6 d-flex">
		        <div class="card why-choose-card w-100">
		          <div class="card-body">
		            <div class="why-choose-icon">
		              <span><img src="img/icons/choose-02.svg" alt="choose-image"></span>
		            </div>
		            <div class="why-choose-content">
		              <h4>24/7 Vet Service</h4>
		              <p>We understand that your pet's health can be a cause for concern at any hour of the day or night. That's why we provide a 24/7 vet service to address the unique needs of your beloved animals.</p>
		            </div>
		          </div>
		        </div>
		      </div>
		      <div class="col-lg-3 col-md-6 d-flex">
		        <div class="card why-choose-card w-100">
		          <div class="card-body">
		            <div class="why-choose-icon">
		              <span><img src="img/icons/choose-04.svg" alt="choose-image"></span>
		            </div>
		            <div class="why-choose-content">
		              <h4>Save Time From Visits To Clinics</h4>
		              <p>Our veterinarian knows your pet and always offers solutions tailored to their needs and history.</p>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>
		<!-- Why Choose Us -->


		<!-- Footer -->
		<footer class="footer footer-one">
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<div class="footer-widget footer-about">
								<div class="footer-logo">
									<a href="welcome.php"><img src="img/new_logo.png" alt="logo"></a>
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
											<!-- <li><a href="contact-us.php">Contact us</a></li> -->
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
							<div class="col-md-6 col-lg-6">
							
								<!-- Copyright Menu -->
<!-- 								<div class="copyright-menu">
									<ul class="policy-menu">
										<li><a href="privacy-policy.html">Privacy Policy</a></li>
										<li><a href="terms-condition.html">Terms and Conditions</a></li>
										<li><a href="login.html">Login & Register</a></li>
									</ul>
								</div> -->
								<!-- /Copyright Menu -->
								
							</div>
						</div>
					</div>
					<!-- /Copyright -->					
				</div>
			</div>
		</footer>
		<!-- /Footer -->

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

	<!-- Slick JS -->
	<script src="js/slick.js"></script>

	<!-- Counter JS -->
	<script src="js/counter.js"></script>

	<!-- Custom JS -->
	<script src="js/script.js"></script>

</body>

</html>