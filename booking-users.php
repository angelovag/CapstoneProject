<?php
// booking-users.php

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
        <meta name="description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
        <meta name="keywords" content="practo clone, doccure, doctor appointment, Practo clone html template, doctor booking template">
        <meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
        
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
<!--                            <div class="menu-header">
                                <a href="index.html" class="menu-logo">
                                    <img src="img/logo.png" class="img-fluid" alt="Logo">
                                </a>
                                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div> -->
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

<!--                                 <li>
                                    <a href="contact-us.php">Contact us</a>
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
                            <h2 class="breadcrumb-title">Booking</h2>
                            <nav aria-label="breadcrumb" class="page-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="welcome.php">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Booking</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Breadcrumb -->
            
            <!-- Page Content -->
            <div class="content">
                <div class="container">
                
                    <div class="row">
                        <div class="col-12">
                        
                            <!-- Schedule Widget -->
                            <div class="card booking-schedule schedule-widget">
                            
                                <!-- Schedule Header -->
                                <div class="schedule-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <!-- Add this section to display error messages -->
                                            <div id="error-message">
                                                <?php
                                                    // Check if there is an error parameter in the URL
                                                    if (isset($_GET['error'])) {
                                                        $error_message = urldecode($_GET['error']);
                                                        echo "<p style='color: red;'>Error: $error_message</p>";
                                                    }
                                                ?>
                                            </div>
                                        
                                            <!-- Day Slot -->
                                            <form action="process-date-time.php" method="post">
                                            <div class="day-slot">
                                                <ul>
                                                    <li class="left-arrow">
                                                        <a href="javascript:void(0)">
                                                            <i class="fa fa-chevron-left"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <span>Mon</span>
                                                        <span class="slot-date">4 Dec <small class="slot-year">2023</small></span>
                                                    </li>
                                                    <li>
                                                        <span>Tue</span>
                                                        <span class="slot-date">5 Dec <small class="slot-year">2023</small></span>
                                                    </li>
                                                    <li>
                                                        <span>Wed</span>
                                                        <span class="slot-date">6 Dec <small class="slot-year">2023</small></span>
                                                    </li>
                                                    <li>
                                                        <span>Thu</span>
                                                        <span class="slot-date">7 Dec <small class="slot-year">2023</small></span>
                                                    </li>
                                                    <li>
                                                        <span>Fri</span>
                                                        <span class="slot-date">8 Dec <small class="slot-year">2023</small></span>
                                                    </li>
                                                    <li>
                                                        <span>Sat</span>
                                                        <span class="slot-date">9 Dec <small class="slot-year">2023</small></span>
                                                    </li>
                                                    <li>
                                                        <span>Sun</span>
                                                        <span class="slot-date">10 Dec <small class="slot-year">2023</small></span>
                                                    </li>
                                                    <li class="right-arrow">
                                                        <a href="javascript:void(0)">
                                                            <i class="fa fa-chevron-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /Day Slot -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /Schedule Header -->
                                
                                <!-- Schedule Content -->
                                <div class="schedule-cont">
                                    <div class="row">
                                        <div class="col-md-12">                               

                                            <!-- Time Slot -->
                                            <div class="time-slot">
                                                <ul class="clearfix">
                                                    <li data-date="2023-12-04">
                                                        <a class="timing" href="#">
                                                            <span>9:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>10:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>11:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>12:00</span> <span>PM</span>
                                                        </a>
                                                    </li>

                                                    <li data-date="2023-12-05">
                                                        <a class="timing" href="#">
                                                            <span>9:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>10:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>11:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>12:00</span> <span>PM</span>
                                                        </a>
                                                    </li>

                                                    <li data-date="2023-12-06">
                                                        <a class="timing" href="#">
                                                            <span>9:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>10:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>11:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>12:00</span> <span>PM</span>
                                                        </a>
                                                    </li>

                                                    <li data-date="2023-12-07">
                                                        <a class="timing" href="#">
                                                            <span>9:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>10:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>11:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>12:00</span> <span>PM</span>
                                                        </a>
                                                    </li>

                                                    <li data-date="2023-12-08">
                                                        <a class="timing" href="#">
                                                            <span>9:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>10:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>11:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>12:00</span> <span>PM</span>
                                                        </a>
                                                    </li>

                                                    <li data-date="2023-12-09">
                                                        <a class="timing" href="#">
                                                            <span>9:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>10:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>11:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>12:00</span> <span>PM</span>
                                                        </a>
                                                    </li>

                                                    <li data-date="2023-12-10">
                                                        <a class="timing" href="#">
                                                            <span>9:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>10:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>11:00</span> <span>AM</span>
                                                        </a>
                                                        <a class="timing" href="#">
                                                            <span>12:00</span> <span>PM</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /Time Slot -->

                                        </div>
                                    </div>
                                </div>
                                <!-- /Schedule Content -->
                                
                            </div>
                            <!-- /Schedule Widget -->

                            <!-- Add hidden input fields for date and time -->
                            <input type="hidden" name="selectedDate" id="selectedDate" value="">
                            <input type="hidden" name="selectedTime" id="selectedTime" value="">


                            <!-- Submit Section -->
                            <div class="submit-section proceed-btn text-end">
                                <input type="submit" class="btn btn-primary submit-btn" value="Next">
                            </div>
                            <!-- /Submit Section -->

                        </form>
                            
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
<!--                                     <div class="copyright-menu">
                                        <ul class="policy-menu">
                                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                            <li><a href="terms-condition.html">Terms and Conditions</a></li>
                                            <li><a href="login.php">Login & Register</a></li>
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

        <script>
        // JavaScript code to handle time slot clicks
        const timeSlots = document.querySelectorAll('.timing');

        timeSlots.forEach(slot => {
            slot.addEventListener('click', function() {
                // Remove 'selected' class from all time slots
                timeSlots.forEach(slot => {
                    slot.classList.remove('selected');
                });

                // Add 'selected' class to the clicked time slot
                this.classList.add('selected');

                // Retrieve the date from the data-date attribute
                const selectedDate = this.closest('li').dataset.date;
                const selectedTime = this.querySelector('span:first-child').textContent.trim();

                // Update hidden input fields
                document.getElementById("selectedDate").value = selectedDate;
                document.getElementById("selectedTime").value = selectedTime;
            });
        });        
        </script>  

    </body>
</html>