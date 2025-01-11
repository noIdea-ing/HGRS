<?php
    include("database.php"); 

    function handleGroomingFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST["owner_name"];
            $petName=$_POST["name"];
            $date=$_POST["grooming_date"];
            $service=$_POST["service"];
            $notes=$_POST["notes"];
            try {
                global $conn; 
                $stmt = $conn->prepare("INSERT INTO reservation (NAME,PETNAME,DATE,SERVICES,NOTES) VALUES (?,?,?,?,?)");
                $stmt->bind_param("sssss", $name, $petName, $date, $service, $notes);
                $stmt->execute();
            } catch (mysqli_sql_exception $e) {
                echo $e->getMessage();
            }
        }
    }
?>