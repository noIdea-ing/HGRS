<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        $_SESSION['page'] = "Login";
    }
    include("accessor.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];     
        $result= login($username, $password);    
        if ($result) {
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['id'];
            $_SESSION['role'] = $result['role'];
            header('Location: /index.php');
            $_SESSION['notification'] = "Login successful!";
            exit();
        } else {
            $_SESSION['notification'] = "Invalid username or password!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Login Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php include('header.php')?>
<?php include 'notification.php';?>
<body>

    <form method="POST" class="form-section">
        <h2 class="mb-3"><strong>Login</strong></h2>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label><br>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label><br>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Submit</button>
        <p>Don't have an account? <a href="register.php">Register here </a></p>
    </form>

    
</body>
</html>