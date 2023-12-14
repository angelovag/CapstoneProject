<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $messageContent = $_POST["message"];

    $error_message_name = "";
    $error_message_email = "";    
    $error_message_phone = "";
    $error_message_content = "";


    if (empty($name)) {
        $error_message_name = "Name is required.";
    } else {
        // First name is valid
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message_email = "Invalid or empty email address.";
    } else {
        // Email is valid
    }

    if (empty($phone) || !preg_match("/^\d{10}$/", $phone)) {
        $error_message_phone = "Invalid or empty phone number.";
    } else {
        // Phone is valid
    }


    if (empty($messageContent)) {
        $error_message_content = "Message is required.";
    } else {
        // Message is valid
    }

    if (empty($error_message_name) && empty($error_message_email) && empty($error_message_phone) && empty($error_message_content)) {

        $to       = 'gerganaangelova1994@gmail.com';
        $subject  = 'New Inquiry: PawPoint';

        // Construct the message by concatenating the values
        $message = "<p><strong>Name:</strong> $name</p>";
        $message .= "<p><strong>Email:</strong> $email</p>";
        $message .= "<p><strong>Phone:</strong> $phone</p>";
        $message .= "<p><strong>Message:</strong> $messageContent</p>";

        $headers  = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
                    'MIME-Version: 1.0' . "\r\n" .
                    'Content-type: text/html; charset=utf-8';
                        
        if(mail($to, $subject, $message, $headers)) {
            header("Location: contact-success.html");
        }else{
            echo "Email sending failed";
        }
    }
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
		
		<!-- Daterangepikcer CSS -->
		<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<link rel="stylesheet" href="css/styles.css">
	
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
							<a href="index.html" class="navbar-brand logo">
								<img src="img/new_logo.png" class="img-fluid" alt="Logo">
							</a>
						</div>
						<div class="main-menu-wrapper">

							<ul class="main-nav">
								<li>
									<a href="index.html">Home</a>
								</li>

								<li>
									<a href="how-it-works.html">How it works?</a>
								</li>

<!-- 								<li>
									<a href="booking.html">Start a consult</a>
								</li> -->

								<li>
									<a href="contact-us.php">Contact us</a>
								</li>
								
								<li class="register-btn">
									<a href="signup.php" class="btn reg-btn"><i class="feather-user"></i>Register</a>
								</li>
								<li class="register-btn">
									<a href="login.html" class="btn btn-primary log-btn"><i class="feather-lock"></i>Login</a>
								</li>
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
							<h2 class="breadcrumb-title">Contact Us</h2>
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item" aria-current="page">Contact Us</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Contact Us -->
			<section class="contact-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-12">
							<div class="section-inner-header contact-inner-header">
								<h6>Get in touch</h6>
								<h2>Have Any Question?</h2>
							</div>
							<div class="card contact-card">
								<div class="card-body">
									<div class="contact-icon">
										<i class="feather-map-pin"></i>
									</div>
									<div class="contact-details">
										<h4>Address</h4>
										<p>3556 Beech Street, USA</p>
									</div>
								</div>
							</div>
							<div class="card contact-card">
								<div class="card-body">
									<div class="contact-icon">
										<i class="feather-phone"></i>
									</div>
									<div class="contact-details">
										<h4>Phone Number</h4>
										<p>+1 234 567 8912</p>
									</div>
								</div>
							</div>
							<div class="card contact-card">
								<div class="card-body">
									<div class="contact-icon">
										<i class="feather-mail"></i>
									</div>
									<div class="contact-details">
										<h4>Email Address</h4>
										<p>pawpoint@example.com</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7 col-md-12 d-flex">
							<div class="card contact-form-card w-100">
								<div class="card-body">
									<form action="" method="post">
										<div class="row">
											<div class="col-md-6">
												<div class="mb-3">
													<label class="mb-2">Name</label>
													<input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
													<?php
											        if (!empty($error_message_name)) {
											        	echo '<div class="red-italic-text">' . $error_message_name . '</div>';
											        }
											        ?>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="mb-2">Email Address</label>
													<input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address">	
													<?php
													if (!empty($error_message_email)) {
											            echo '<div class="red-italic-text">' . $error_message_email . '</div>';
											        }
											        ?>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="mb-2">Phone Number</label>
													<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
													<?php
													if (!empty($error_message_phone)) {
											            echo '<div class="red-italic-text">' . $error_message_phone . '</div>';
											        }
											        ?>
												</div>
											</div>
											<div class="col-md-12">
												<div class="mb-3">
													<label class="mb-2">Message</label>
													<textarea class="form-control" id="message" name="message" placeholder="Enter your comments"></textarea>
													<?php
													if (!empty($error_message_content)) {
											            echo '<div class="red-italic-text">' . $error_message_content . '</div>';
											        }
											        ?>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group-btn mb-0">
													<button type="submit" class="btn btn-primary prime-btn">Send Message</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Contact Us -->
   
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
												<li><a href="index.html">Home</a></li>
												<li><a href="how-it-works.html">How it works?</a></li>
												<!-- <li><a href="booking.html">Consult</a></li> -->
												<li><a href="contact-us.php">Contact us</a></li>
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
									<div class="copyright-menu">
										<ul class="policy-menu">
<!-- 											<li><a href="privacy-policy.html">Privacy Policy</a></li>
											<li><a href="terms-condition.html">Terms and Conditions</a></li> -->
											<li><a href="login.html">Login & Register</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
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
		
		<!-- Daterangepikcer JS -->
		<script src="js/moment.min.js"></script>
		<script src="plugins/daterangepicker/daterangepicker.js"></script>
		
		<!-- Custom JS -->
		<script src="js/script.js"></script>
		
	</body>
</html>