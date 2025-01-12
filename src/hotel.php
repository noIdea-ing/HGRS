<?php 
session_start();
$_SESSION['page'] = "Hotel Reservations";
date_default_timezone_set('Asia/Kuala_Lumpur');
if (isset($_SESSION['username'])) {
    echo "Favorite color is " . $_SESSION["username"] . ".<br>";
    echo "Favorite animal is " . $_SESSION["userid"] . ".";
    include("mutator.php"); 
    include("accessor.php"); 
    handleHotelFormSubmission();
    $petName="";
    $checkin="";
    $checkout="";
    $roomtype="";
    $notes="";
    $userid="";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Hotel Reservation</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include("header.php"); ?>   
    <?php if (isset($_SESSION['username'])): ?>
    <main>
        <section class="form-section">
            <h2>Book a Stay for Your Pet</h2>
            <form method="POST">
                <label for="name">Name</label><br>
                <input type="text" id="name" name="name" placeholder="<?php echo $_SESSION['username']?>" disabled><br>

                <label for="pet-name">Pet's Name</label><br>
                <input type="text" id="pet-name" name="pet_name" required><br>

                <label for="check-in">Check-In Date</label><br>
                <input type="datetime-local" id="check-in" name="check_in" required><br>

                <label for="check-out">Check-Out Date</label><br>
                <input type="datetime-local" id="check-out" name="check_out" required><br>

                <label for="room-type">Room Type</label><br>
                <select id="room-type" name="room_type" required>
                    <option value="standard">Standard</option>
                    <option value="deluxe">Deluxe</option>
                    <option value="suite">Suite</option>
                </select><br>

                <label for="notes">Special Requests</label><br>
                <textarea id="notes" name="notes" rows="4"></textarea>

                <button type="submit">Submit Reservation</button>
            </form>
            <h2>Previous Appointment</h2>
            <?php $result= getHotelReservation();?>
            <?php if (empty($result)): ?>
                <p>No previous appointment found.</p>
            <?php else:?>
                <table>
                <thead>
                    <tr>
                        <th>Pet Name</th>
                        <th>Check in</th>
                        <th>Check out</th>
                        <th>Room Type</th>
                        <th>Notes</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row): ?>
                        <tr>
                            <td><?php echo $row['petname']; ?></td>
                            <td><?php echo $row['checkinTime']; ?></td>
                            <td><?php echo $row['checkoutTime']; ?></td>
                            <td><?php echo $row['roomtype']; ?></td>
                            <td><?php echo $row['notes']; ?></td>
                            <td>Accepted</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </section>
    </main>
    <?php else: ?>
        <main>
            <div class="form-section">
                <h2><strong>Please log in to schedule a hotel reservation.</strong></h2>
                <form action="login.php">
                    <button type="submit" class="btn btn-primary">Log In</button>
                </form>
            </div>
        </main>
    <?php endif; ?>
    <footer>
        &copy; 2025 SI GEBUS Petshop. All rights reserved.
    </footer>
</body>
</html>
