<?php

// Include the configuration file
include("config.php");

// Start a session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $error_message_first_name = "";
    $error_message_last_name = "";    
    $error_message_email = "";
    $error_message_password = "";

    // Retrieve form data
    $role_id = $_POST["role-id"];
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate input
    if (empty($first_name)) {
        $error_message_first_name = "First name is required.";
    } elseif (!preg_match("/^[A-Za-z]+$/", $first_name)) {
        $error_message_first_name = "First name should only contain letters.";
    } elseif (strlen($first_name) < 2 || strlen($first_name) > 50) {
        $error_message_first_name = "First name length should be between 2 and 50 characters.";
    } else {        
    // First name is valid
    }

    if (empty($last_name)) {
        $error_message_last_name = "Last name is required.";
    } elseif (!preg_match("/^[A-Za-z]+$/", $last_name)) {
        $error_message_last_name = "Last name should only contain letters.";
    } elseif (strlen($last_name) < 2 || strlen($last_name) > 50) {
        $error_message_last_name = "Last name length should be between 2 and 50 characters.";
    } else {
    // Last name is valid
    }

    if (empty($email)) {
        $error_message_email = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message_email = "Invalid email address format.";
    } else {
    // Email is valid
    }

    if (empty($password)) {
        $error_message_password = "Password is required.";
    } elseif (strlen($password) < 6) {
        $error_message_password = "Password should be at least 6 characters long.";
    } elseif (!preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/[0-9]/", $password)) {
        $error_message_password = "Password should contain at least one uppercase letter, one lowercase letter, and one digit.";
    } else {
    // Password is valid
    }

    // Only proceed with insertion if there are no validation errors
    if (empty($error_message_first_name) && empty($error_message_last_name) && empty($error_message_email) && empty($error_message_password)) {

        // Insert user data
        $sql = "INSERT INTO users (role_id, first_name, last_name, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issss", $role_id, $first_name, $last_name, $email, $password);

        if ($stmt->execute()) {
        	// Store user information in the session
            $_SESSION["id"] = $stmt->insert_id;
            $_SESSION["email"] = $email;
            $_SESSION["first_name"] = $first_name;

            header("Location: signup-success.php");
            exit;
        } else {
            echo "Error inserting data: " . $conn->error;
        }

    } 
    $conn->close();
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

    	<!-- Mobile CSS-->
		<link rel="stylesheet" href="plugins/intltelinput/css/intlTelInput.css">
    	<link rel="stylesheet" href="plugins/intltelinput/css/demo.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<link rel="stylesheet" href="css/styles.css">

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
									<img src="img/new-logo.png" class="img-fluid" alt="Logo">
								</a>
								<a id="menu_close" class="menu-close" href="javascript:void(0);">
									<i class="fas fa-times"></i>
								</a>
							</div> -->
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

					<!-- Patient Signup -->
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
<!-- 									<div class="login-back">
										<a href="index.html"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
									</div> -->
									<div class="login-title">
										<h3>Signup</h3>
										<p class="mb-0">Please enter your details.</p>
									</div>
									<form action="" method="post" novalidate>	
										<div class="mb-3">
											<label class="mb-2" for="first-name">First Name</label>
											<input type="text" class="form-control" id="first-name" name="first-name" placeholder="Enter Your First Name">
											<?php
									        if (!empty($error_message_first_name)) {
									            echo '<div class="red-italic-text">' . $error_message_first_name . '</div>';
									        }
									        ?>
										</div>
										<div class="mb-3">
											<label class="mb-2" for="last-name">Last Name</label>
											<input type="text" class="form-control" id="last-name" name="last-name" placeholder="Enter Your Last Name">
											<?php
									        if (!empty($error_message_last_name)) {
									            echo '<div class="red-italic-text">' . $error_message_last_name . '</div>';
									        }
									        ?>
										</div>
										<div class="mb-3">
											<label class="mb-2" for="email">Email</label>
											<input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email Address">
											<?php
									        if (!empty($error_message_email)) {
									            echo '<div class="red-italic-text">' . $error_message_email . '</div>';
									        }
									        ?>
										</div>
										<div class="mb-3">
											<label class="mb-2" for="password">Password</label>
											<input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
											<?php
									        if (!empty($error_message_password)) {
									            echo '<div class="red-italic-text">' . $error_message_password . '</div>';
									        }
									        ?>
										</div>
										<div class="hidden-input">
    										<input type="hidden" id="role-id" name="role-id" value="2">
										</div>

										<div class="mb-3">
											<button class="btn w-100" type="submit">Register Now</button>
										</div>

										<div class="account-signup">
											<p>Already a Member? <a href="login.html">Sign in</a></p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- /Patient Signup -->

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

		<!-- Mobile Input -->
		<script src="plugins/intltelinput/js/intlTelInput.js"></script>

		<!-- Custom JS -->
		<script src="js/script.js"></script>
	
	</body>
</html>