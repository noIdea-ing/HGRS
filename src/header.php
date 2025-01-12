<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Contact Us</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1><?php echo isset($_SESSION['page']) ? $_SESSION['page'] : 'Default Page'; ?></h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="hotel.php">Hotel Reservations</a>
        <a href="grooming.php">Grooming Reservations</a>
        <a href="catalog.php">Product Catalog</a>
        <a href="contact.php">Contact Us</a>
        <?php if (!isset($_SESSION['username'])): ?>
            <a href="login.php">Log In</a>
        <?php else: ?>
  
            <a href="logout.php">Log Out</a>
        <?php endif; ?>
    </nav>
</body>   
</html>