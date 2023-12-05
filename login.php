<?php
// login.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection setup
    $dbHost = "capstone.project";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "capstone";

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Start the session
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, email FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // User found, retrieve user ID and store in the session
            $stmt->bind_result($user_id, $user_email);
            $stmt->fetch();

            $_SESSION['email'] = $user_email;
            $_SESSION['id'] = $user_id;  // Store user information in the session

            // var_dump($_SESSION['email']);
            // var_dump($_SESSION['id']);
            // die;
            // Remove the 'die' statement here

            // Redirect to a success page
            header("Location: welcome.php");
            exit;
        } else {
            // User not found or incorrect password
            echo "Invalid or empty credentials. Please try again.";
        }

        $stmt->close();
    }
}
?>
