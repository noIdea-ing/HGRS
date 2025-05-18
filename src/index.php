<?php
    include("database.php");
    session_start(); 
    $_SESSION['page'] = "SI GEBUS Pet Shop";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Home</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include("header.php"); ?>
    <?php include("notification.php");?>
    
    <div class="section-home">
        <div class="section-home-image">
            <img src="/assets/title.jpg" alt="Pet Shop">
        </div>
        <div class="section-home-text">
            <?php if (isset($_SESSION['username'])): ?>
                <h2>Welcome back, <?php echo $_SESSION['username']; ?>!</h2>
            <?php endif ?>
            <h1>SI GEBUS: Your One-Stop Pet Care Solution</h1>
            <p>At SI GEBUS, we provide high-quality services to keep your pets happy and healthy.</p>
        </div>
    </div>


    <footer>
        &copy; 2025 SI GEBUS Petshop. All rights reserved.
    </footer>
</body>
</html>