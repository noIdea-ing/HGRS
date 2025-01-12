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
            $_SESSION['userid'] = $result[0]['id'];
            header('Location: index.php');
            exit();
        } else {
            $error = "Invalid username or password!";
            if(isset($error)){
                echo "<p style='color: red;'>$error</p>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php include('header.php')?>
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
    </form>
</body>
</html>