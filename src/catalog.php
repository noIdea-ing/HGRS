<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Start the session if not already started
    }
    $_SESSION['page'] = "Product Catalog";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Pet Products Catalog</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include("header.php");?>    
    <main>
        <h2>Explore Our Products</h2>
        <section class="product-grid">
            <div class="product-card">
                <img src="/assets/product1.jpg" alt="Dog Food">
                <h3>Premium Dog Food</h3>
                <p>Price: RM25.00</p>
            </div>
            <div class="product-card">
                <img src="/assets/product2.jpg" alt="Cat Toy">
                <h3>Interactive Cat Toy</h3>
                <p>Price: RM15.00</p>
            </div>
            <div class="product-card">
                <img src="/assets/product3.jpg" alt="Pet Bed">
                <h3>Cozy Pet Bed</h3>
                <p>Price: RM45.00</p>
            </div>
            <div class="product-card">
                <img src="/assets/product4.jpg" alt="Grooming Kit">
                <h3>Pet Grooming Kit</h3>
                <p>Price: RM30.00</p>
            </div>
        </section>
    </main>
    <footer>
        &copy; 2025 SI GEBUS Petshop. All rights reserved.
    </footer>
</body>
</html>
