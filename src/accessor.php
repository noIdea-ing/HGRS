<?php
    include("database.php"); 
    function login($username, $password) {
        try {
            global $pdo;
            $stmt = $pdo->prepare('SELECT * FROM "user" WHERE username = :username AND password = :password');
            $stmt->execute([':username' => $username,':password' => $password]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result; 
        }
        catch (mysqli_sql_exception $e) {
            echo $e->getMessage();
        }
    }

    
    function getGroomingReservation() {
        try {
            global $pdo;
            $stmt = $pdo->prepare("SELECT r.* FROM groomingreservation r JOIN \"user\" u ON r.userID = u.ID WHERE u.username = :username");
            $stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }
    function getHotelReservation() {
        try {
            global $pdo;
            $stmt = $pdo->prepare("SELECT r.* FROM hotelreservation r JOIN \"user\" u ON r.userID = u.ID WHERE u.username = :username");
            $stmt->bindParam(':username', $_SESSION['username'], PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    function getAllGroomingReservation() {
        try {
            global $pdo;
            $stmt = $pdo->prepare("SELECT r.*, u.username FROM groomingreservation r JOIN \"user\" u ON r.userid = u.id");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    function getAllHotelReservation() {
        try {
            global $pdo;
            $stmt = $pdo->prepare("SELECT r.*, u.username FROM hotelreservation r JOIN \"user\" u ON r.userid = u.id");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }
?>