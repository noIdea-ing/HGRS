<?php
    session_start();
    $_SESSION['page'] = "My Account";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Profile Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include('header.php')?>
    <?php include 'notification.php';?>
    <div class="form-section">
        <h2>My Account</h2>
        <form action="editprofile.php">
            <button type="submit" class="btn">Edit Profile</button>
        </form>
        <form action="logout.php">
            <button type="submit" class="btn-logout" ><a href="logout.php">Log Out</a></button>
        </form>
    </div>
</body>
</html></div>