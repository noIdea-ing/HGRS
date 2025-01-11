<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Hotel Reservation</title>
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
            <h2>Book a Stay for Your Pet</h2>
            <form action="process_hotel_reservation.php" method="POST">
                <label for="owner-name">Your Name</label>
                <input type="text" id="owner-name" name="owner_name" required>

                <label for="pet-name">Pet's Name</label>
                <input type="text" id="pet-name" name="pet_name" required>

                <label for="check-in">Check-In Date</label>
                <input type="date" id="check-in" name="check_in" required>

                <label for="check-out">Check-Out Date</label>
                <input type="date" id="check-out" name="check_out" required>

                <label for="room-type">Room Type</label>
                <select id="room-type" name="room_type" required>
                    <option value="standard">Standard</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="suite">Suite</option>
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
