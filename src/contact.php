<?php 
    session_start(); // Start the session if not already started
    $_SESSION['page'] = "Contact Us";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Contact Us</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include("header.php");?>
    <main>
        <section class="form-section-contactUs">
            <h2>We'd Love to Hear from You</h2>
        </section>
    </main>
    <footer>
        &copy; 2025 SI GEBUS Petshop. All rights reserved.
    </footer>
</body>
</html>
