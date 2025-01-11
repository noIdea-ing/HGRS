<?php 
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['username'])) {
            include("login.php");
        exit();
    }
    else{
        echo "Favorite color is " . $_SESSION["username"] . ".<br>";
        include("mutator.php"); 
        $name="";
        $petName="";
        $date="";
        $service="";
        $notes="";
        handleGroomingFormSubmission();     
    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Grooming Reservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        main {
            padding: 2rem;
        }
        .form-section {
            background-color: #ffffff;
            padding: 2rem;
            margin: 1rem auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }
        .form-section input, .form-section select, .form-section button {
            width: 100%;
            margin: 0.5rem 0;
            padding: 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .form-section button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-section button:hover {
            background-color: #0056b3;
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
    <main>
        <section class="form-section">
            <h2>Schedule a Grooming Appointment</h2>
            <form method="POST">
                <label for="owner-name">Your Name</label>
                <input type="text" id="owner-name" name="owner_name" required>

                <label for="pet-name">Pet's Name</label>
                <input type="text" id="name" name="name" required>

                <label for="grooming-date">Preferred Grooming Date</label>
                <input type="date" id="grooming-date" name="grooming_date" required>

                <label for="service">Grooming Service</label>
                <select id="service" name="service" required>
                    <option value="bath">Bath</option>
                    <option value="haircut">Haircut</option>
                    <option value="nail_trim">Nail Trim</option>
                </select>

                <label for="notes">Special Requests</label>
                <textarea id="notes" name="notes" rows="4"></textarea>

                <button type="submit">Submit Reservation</button>
            </form>
        </section>
    </main>
    <footer>
        &copy; 2025 SI GEBUS Petshop. All rights reserved.
    </footer>
</body>
</html>
