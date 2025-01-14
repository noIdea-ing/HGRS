<?php 
    session_start(); // Start the session if not already started
    $_SESSION['page'] = "Grooming Reservations";
    date_default_timezone_set('Asia/Kuala_Lumpur');
    if (isset($_SESSION['username'])) {
        include("mutator.php"); 
        include("accessor.php"); 
        updateReservationstatus(2);
        handleGroomingFormSubmission();
        $petName="";
        $date="";
        $service="";
        $notes="";
        $time="";

    }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Grooming Reservation</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php include("header.php"); ?> 
    <?php include("notification.php"); ?>
    <?php if (isset($_SESSION['username'])): ?>
    <main>
        <section class="form-section">
            <h2>Schedule a Grooming Appointment</h2>
            <form method="POST">
                <label for="name">Name</label><br>
                <input type="text" id="name" name="name" placeholder="<?php echo $_SESSION['username']?>" disabled><br>

                <label for="pet-name">Pet's Name</label><br>
                <input type="text" id="name" name="name" required><br>

                <label for="grooming-date">Preferred Grooming Date</label><br>
                <input type="date" id="grooming-date" name="grooming_date" min="<?=date('Y-m-d'); ?>" required><br>
                <label for="grooming-time">Preferred Grooming Time</label><br>
                <input type="time" id="grooming-time" name="grooming-time" min="09:00" max="18:00" required><br>
                <label>Select the Grooming Service</label><br>
                <div class="checkbox">
                    <input type="checkbox" id="service1" name="service[]" value="Bath">
                    <label for="service1">Bath</label><br>      
                    <input type="checkbox" id="service2" name="service[]" value="Haircut">
                    <label for="service2">Haircut</label><br>
                    <input type="checkbox" id="service3" name="service[]" value="Nail Trim">
                    <label for="service3">Nail Trim</label><br>
                </div>
                <label for="notes">Special Requests</label><br>
                <textarea id="notes" name="notes" rows="4"></textarea>
                <button type="submit">Submit Reservation</button>
            </form>
            <h2>Previous Appointment</h2>
            <?php $result= getGroomingReservation();?>
            <?php if (empty($result)): ?>
                <p>No previous appointment found.</p>
            <?php else:?>
                <table>
                <thead>
                    <tr>
                        <th>Pet Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Services</th>
                        <th>Notes</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row): ?>
                        <tr>
                            <td><?php echo $row['petname']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['services']; ?></td>
                            <td><?php echo $row['notes']; ?></td>
                            <td><?php echo $row['status']; ?></td>
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
                <h2><strong>Please log in to schedule a grooming appointment.</strong></h2>
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
