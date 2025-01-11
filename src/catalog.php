<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Pet Products Catalog</title>
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
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .product-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            text-align: center;
        }
        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        .product-card h3 {
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }
        .product-card p {
            font-size: 1rem;
            color: #555;
        }
        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
        }
    </style>
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
