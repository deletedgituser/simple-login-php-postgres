<?php
require_once 'db.php'; // Include the database connection file

session_start();

// // Define hardcoded credentials lets assume its from the db
// $valid_username = "Wendel";
// $valid_password = "password123";


$pdo = connection(); // Get the PDO connection


try {
    // Check if the form was submitted via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");

        $stmt->execute(['username' => $username, 'password' => $password]);

        $user = $stmt->fetch();

        // Validate credentials
        if ($user) {
            session_regenerate_id(true); // Regenerate session ID to prevent session fixation attacks

            // Authentication successful: set session variables
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id']; // Store user ID in session for future use
            $_SESSION['email'] = $user['email']; // Store user email in session for future use
            // Redirect to the protected dashboard page
            header("Location: welcome.php");
            exit;
        } else {
            // Authentication failed: redirect back to index.php with an error message
            header("Location: index.php?error=Invalid username or password");
            exit;
        }
    } else {
        // If someone accesses login.php directly without submitting the form, redirect them away
        header("Location: index.php");
        exit;
    }

} catch (PDOException $e) {
    // Handle database connection or query errors   

    error_log("Database error: " . $e->getMessage()); // Log the error for debugging
    header("Location: index.php?error=An unexpected error occurred. Please try again later.");
    exit;
}
?>


