<?php
    include("database.php"); 
    function login($username, $password) {
        try {
            global $conn;
            $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        catch (mysqli_sql_exception $e) {
            echo $e->getMessage();
        }
    }
    function getGroomingReservation() {
        try{
            global $conn;
            $stmt = $conn->prepare("SELECT r.* FROM groomingreservation r JOIN user u ON r.userID = u.ID WHERE u.username = ?");
            $stmt->bind_param("s", $_SESSION['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        catch (mysqli_sql_exception $e) {
            echo $e->getMessage();
        }

    }

    function getHotelReservation() {
        try{
            global $conn;
            $stmt = $conn->prepare("SELECT r.* FROM hotelreservation r JOIN user u ON r.userID = u.ID WHERE u.username = ?");
            $stmt->bind_param("s", $_SESSION['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        catch (mysqli_sql_exception $e) {
            echo $e->getMessage();
        }

    }

    function getAllGroomingReservation() {
        try{
            global $conn;
            $stmt = $conn->prepare("SELECT r.*, u.username FROM groomingreservation r JOIN user u ON r.userID = u.ID");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        catch (mysqli_sql_exception $e) {
            echo $e->getMessage();
        }

    }

    
    function getAllHotelReservation() {
        try{
            global $conn;
            $stmt = $conn->prepare("SELECT r.*, u.username FROM hotelreservation r JOIN user u ON r.userID = u.ID");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        catch (mysqli_sql_exception $e) {
            echo $e->getMessage();
        }

    }
?>