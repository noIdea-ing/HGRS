<?php
    session_start();    
    $_SESSION['page'] = "Manage Hotel Reservations";
    include("accessor.php");
    include("mutator.php");
    if (isset($_SESSION['username'])) {
        updateReservationstatus(1);
        handleReservationStatus(1);
    }
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Manage Grooming Reservation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include("header.php"); ?> 
    <?php include("notification.php"); ?>
    <main>
        <div class="form-section-manage">
            <h2>Manage Hotel Reservations</h2>
            <h4>Unprocessed Hotel Reservations</h4>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Pet Name</th>
                    <th>Check In Time</th>
                    <th>Check Out Time</th>
                    <th>Room Type</th>
                    <th>Notes</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php 
                    $hotelReservations = getAllHotelReservation();
                    foreach ($hotelReservations as $reservation) {
                        if($reservation['status'] == "Unprocessed"){
                            echo "<tr>";
                            echo "<td>".$reservation['id']."</td>";
                            echo "<td>".$reservation['username']."</td>";
                            echo "<td>".$reservation['petname']."</td>";
                            echo "<td>".$reservation['checkinTime']."</td>";
                            echo "<td>".$reservation['checkoutTime']."</td>";
                            echo "<td>".$reservation['roomtype']."</td>";
                            echo "<td>".$reservation['notes']."</td>";
                            echo "<td>".$reservation['status']."</td>";
                            echo "<td>";
                            echo "<form method='post' action=''>";
                            echo "<input type='hidden' name='reservation_id' value='".$reservation['id']."'>";
                            echo "<button type='submit' name='accept' class='btn-accept' value='Accept'>Accept</button>";
                            echo "<button type='submit' name='decline' class='btn-decline' value='Decline'>Decline</button>";
                            echo "</form>";
                            echo "</td>";
            
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
            <h4>Accepted Grooming Reservations</h4>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Pet Name</th>
                    <th>Check In Time</th>
                    <th>Check Out Time</th>
                    <th>Room Type</th>
                    <th>Notes</th>
                    <th>Status</th>
                </tr>
                <?php 
                    $hotelReservations = getAllHotelReservation();
                    foreach ($hotelReservations as $reservation) {
                        if($reservation['status'] == "Accepted"){
                            echo "<tr>";
                            echo "<td>".$reservation['id']."</td>";
                            echo "<td>".$reservation['username']."</td>";
                            echo "<td>".$reservation['petname']."</td>";
                            echo "<td>".$reservation['checkinTime']."</td>";
                            echo "<td>".$reservation['checkoutTime']."</td>";
                            echo "<td>".$reservation['roomtype']."</td>";
                            echo "<td>".$reservation['notes']."</td>";
                            echo "<td>".$reservation['status']."</td>";
                            echo "</tr>";
                            continue;
                        }
                    }
                ?>
            </table>
            <h4>Declined Grooming Reservations</h4>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Pet Name</th>
                    <th>Check In Time</th>
                    <th>Check Out Time</th>
                    <th>Room Type</th>
                    <th>Notes</th>
                    <th>Status</th>
                </tr>
                <?php 
                    $hotelReservations = getAllHotelReservation();
                    foreach ($hotelReservations as $reservation) {
                        if($reservation['status'] == "Declined"){
                            echo "<tr>";
                            echo "<td>".$reservation['id']."</td>";
                            echo "<td>".$reservation['username']."</td>";
                            echo "<td>".$reservation['petname']."</td>";
                            echo "<td>".$reservation['checkinTime']."</td>";
                            echo "<td>".$reservation['checkoutTime']."</td>";
                            echo "<td>".$reservation['roomtype']."</td>";
                            echo "<td>".$reservation['notes']."</td>";
                            echo "<td>".$reservation['status']."</td>";
                            echo "</tr>";
                            continue;
                        }
                    }
                ?>
            </table>
            <h4>Expired Grooming Reservations</h4>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Pet Name</th>
                    <th>Check In Time</th>
                    <th>Check Out Time</th>
                    <th>Room Type</th>
                    <th>Notes</th>
                    <th>Status</th>
                </tr>
                <?php 
                    $hotelReservations = getAllHotelReservation();
                    foreach ($hotelReservations as $reservation) {
                        if($reservation['status'] == "Expired"){
                            echo "<tr>";
                            echo "<td>".$reservation['id']."</td>";
                            echo "<td>".$reservation['username']."</td>";
                            echo "<td>".$reservation['petname']."</td>";
                            echo "<td>".$reservation['checkinTime']."</td>";
                            echo "<td>".$reservation['checkoutTime']."</td>";
                            echo "<td>".$reservation['roomtype']."</td>";
                            echo "<td>".$reservation['notes']."</td>";
                            echo "<td>".$reservation['status']."</td>";
                            echo "</tr>";
                            continue;
                        }
                    }
                ?>
            </table>
        </div>
    </main>
</body>
</html>