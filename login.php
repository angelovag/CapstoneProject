<?php

// Include the configuration file
include("config.php");

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
        $_SESSION['id'] = $user_id;

        // Redirect to a success page
        header("Location: welcome.php");
        exit;
        } else {
            // User not found or incorrect password
            echo "Invalid or empty credentials. Please try again.";
        }

    $stmt->close();
}

?>
