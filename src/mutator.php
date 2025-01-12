<?php
    include("database.php"); 

    function handleGroomingFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $petName=$_POST["name"];
            $date=$_POST["grooming_date"];
            $service= isset($_POST['service']) ? implode(", ", $_POST['service']) : '';
            $notes=$_POST["notes"];
            $time=$_POST["grooming-time"];
            $userid=$_SESSION['userid'];
            try {
                global $conn; 
                $stmt = $conn->prepare("INSERT INTO groomingreservation (PETNAME,DATE,SERVICES,NOTES,TIME,USERID) VALUES (?,?,?,?,?,?)");
                $stmt->bind_param("sssssi", $petName, $date, $service, $notes, $time,$userid);
                $stmt->execute();
            } catch (mysqli_sql_exception $e) {
                echo $e->getMessage();
            }
        }
    }

    function handleHotelFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $petName=$_POST["pet_name"];
            $checkin=$_POST["check_in"];
            echo $checkin;
            $checkout=$_POST["check_out"];
            $roomtype= $_POST["room_type"];
            $notes=$_POST["notes"];
            $userid=$_SESSION['userid'];
            try {
                global $conn; 
                $stmt = $conn->prepare("INSERT INTO hotelreservation (PETNAME,CHECKINTIME,CHECKOUTTIME,ROOMTYPE,NOTES,USERID) VALUES (?,?,?,?,?,?)");
                $stmt->bind_param("sssssi", $petName, $checkin, $checkout, $roomtype, $notes,$userid);
                $stmt->execute();
            } catch (mysqli_sql_exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>