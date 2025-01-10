<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Home</title>
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
        main {
            padding: 2rem;
            text-align: center;
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
    <header>
        <h1>Welcome to SI GEBUS Petshop</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="hotel.html">Hotel Reservations</a>
        <a href="grooming.html">Grooming Reservations</a>
        <a href="catalog.html">Product Catalog</a>
        <a href="contact.html">Contact Us</a>
    </nav>
    <main>
        <h2>Your One-Stop Pet Care Solution</h2>
        <p>At SI GEBUS, we provide high-quality services to keep your pets happy and healthy.</p>
        <p>Choose from our luxurious hotel stays or professional grooming services today!</p>
    </main>
    <footer>
        &copy; 2025 SI GEBUS Petshop. All rights reserved.
    </footer>
</body>
</html>