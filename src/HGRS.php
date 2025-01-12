<?php 
    session_start();
    $_SESSION['page'] = "Home";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS Petshop Hotel & Grooming Reservations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #0056b3;
        }
        nav a {
            color: white;
            padding: 0.75rem 1rem;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #003d80;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1rem 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php include("header.php"); ?>
    <p>CLICK HOME TO START EXPLORING SI GEBUS PETSHOP HOTEL AND GROOMING RESERVATIONS</p>
    <img src="/assets/title.jpg">
    <footer>
        &copy; 2025 SI GEBUS Petshop Hotel & Grooming. All rights reserved.
    </footer>
</body>
</html>
