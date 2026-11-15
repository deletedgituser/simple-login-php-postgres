<?php
session_start();
// If user is already logged in, redirect them straight to the welcome page
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: welcome.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login System</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 300px;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            box-sizing: border-box;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            margin-bottom: 10px;
            color: red;
            font-size: 14px;
            text-align: center;
        }
        .success {
            margin-bottom: 10px;
            color: green;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Login</h2>
    
    <!-- Display error message if redirected back with an error -->
    <?php if (isset($_GET['error'])): ?>
        <div class="error"><?= htmlspecialchars($_GET["error"]); ?></div>
    <?php elseif(isset($_GET['success'])): ?>
        <div class="success"><?= htmlspecialchars($_GET["success"]); ?></div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Log In</button>
        <a href="register.php" style="display: block; text-align: center; margin-top: 10px; color: #007bff; text-decoration: none;">Don't have an account? Register</a>
    </form>
</div>

</body>
</html>
