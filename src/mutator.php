<?php
    include("database.php"); 
    function register(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $role = 'user';
            if ($password !== $confirm_password) {
                $_SESSION['notification'] = "Password and Confirm Password do not match!";
            } else {
                try{
                    global $conn;
                    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $user = $result->fetch_assoc();
                    if($user['username'] == $username){
                        $_SESSION['notification'] = "Username already exists!";
                    }
                    else{
                        try {
                            global $conn;
                            $stmt = $conn->prepare("INSERT INTO user (username, password, role) VALUES (?, ?, ?)");
                            $stmt->bind_param("sss", $username, $password, $role);
                            $stmt->execute();
                            include("accessor.php");
                            $result = login($username, $password);
                            $_SESSION['username'] = $username;
                            $_SESSION['userid'] = $result[0]['id'];
                            $_SESSION['role'] = $result[0]['role'];
                            header('Location: index.php');
                            $_SESSION['notification'] = "Registration successful!";
                            echo $e->getMessage();
                        } catch (mysqli_sql_exception $e) {
                            echo $e->getMessage();
                        }
                    }
                }
                catch (mysqli_sql_exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }

    function editProfile(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $userid = $_SESSION['userid'];
            if($username!=="" && $password == "" && $confirm_password == ""){
                try{
                    global $conn;
                    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $user = $result->fetch_assoc();
                    if(isset($user['username'])){
                        $_SESSION['notification'] = "Username already exists!";
                    }
                    else{
                        try {
                            global $conn;
                            $stmt = $conn->prepare("UPDATE user SET username= ? WHERE id = ?");
                            $stmt->bind_param("ss", $username, $userid);
                            $stmt->execute();
                            $_SESSION['notification'] = "Username updated successfully!";
                            $_SESSION['username'] = $username;
                        } catch (mysqli_sql_exception $e) {
                            echo $e->getMessage();
                        }
                    }
                } catch (mysqli_sql_exception $e) {
                    echo $e->getMessage();
                }
            }
            elseif($username=="" && $password !== "" && $confirm_password !== ""){
                if ($password !== $confirm_password) {
                    $_SESSION['notification'] = "Password and Confirm Password do not match!";
                } 
                else{
                    try {
                        global $conn;
                        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE id = ?");
                        $stmt->bind_param("ss", $password, $userid);
                        $stmt->execute();
                        $_SESSION['notification'] = "Password updated successfully!";
                    } catch (mysqli_sql_exception $e) {
                        echo $e->getMessage();
                    }
                }
            }
            elseif ($username!=="" && $password !== "" && $confirm_password !== "   ") {
                try{
                    global $conn;
                    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $user = $result->fetch_assoc();
                    if(isset($user['username'])){
                        $_SESSION['notification'] = "Username already exists!";
                    }
                    else{
                        if ($password !== $confirm_password) {
                            $_SESSION['notification'] = "Password and Confirm Password do not match!";
                        } 
                        else{
                            try {
                                global $conn;
                                $stmt = $conn->prepare("UPDATE user SET username = ?, password = ? WHERE id = ?");
                                $stmt->bind_param("sss", $username, $password, $userid);
                                $stmt->execute();
                                $_SESSION['username'] = $username;
                                $_SESSION['notification'] = "Username & Password updated successfully!";
                            } catch (mysqli_sql_exception $e) {
                                echo $e->getMessage();
                            }
                        }
                    }
                } catch (mysqli_sql_exception $e) {
                    echo $e->getMessage();
                }
            }
            else{
                $_SESSION['notification'] = "Please fill in the required field!";
            }
        }
    }

    function handleGroomingFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $petName=$_POST["name"];
            $date=$_POST["grooming_date"];
            $service= isset($_POST['service']) ? implode(", ", $_POST['service']) : '';
            $notes=$_POST["notes"];
            $time=$_POST["grooming-time"];
            $userid=$_SESSION['userid'];
            $status = "Unprocessed";
            try {
                global $conn; 
                $stmt = $conn->prepare("INSERT INTO groomingreservation (PETNAME,DATE,SERVICES,NOTES,TIME,USERID,STATUS) VALUES (?,?,?,?,?,?,?)");
                $stmt->bind_param("sssssis", $petName, $date, $service, $notes, $time, $userid, $status);
                $stmt->execute();
                $_SESSION['notification'] = "Reservation submitted successfully!";
            } catch (mysqli_sql_exception $e) {
                echo $e->getMessage();
            }
        }
    }

    function handleHotelFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $petName=$_POST["pet_name"];
            $checkin=$_POST["check_in"];
            $checkout=$_POST["check_out"];
            $roomtype= $_POST["room_type"];
            $notes=$_POST["notes"];
            $userid=$_SESSION['userid'];
            $status = "Unprocessed";
            try {
                global $conn; 
                $stmt = $conn->prepare("INSERT INTO hotelreservation (PETNAME,CHECKINTIME,CHECKOUTTIME,ROOMTYPE,NOTES,USERID,STATUS) VALUES (?,?,?,?,?,?,?)");
                $stmt->bind_param("sssssis", $petName, $checkin, $checkout, $roomtype, $notes,$userid, $status);
                $stmt->execute();
                $_SESSION['notification'] = "Reservation submitted successfully!";
            } catch (mysqli_sql_exception $e) {
                echo $e->getMessage();
            }
        }
    }

    function handleReservationStatus($reservation) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo $reservation;
            if ($reservation == 1) {
                $reservationId = $_POST['reservation_id'];
                if (isset($_POST['accept'])) {
                    $status = 'Accepted';
                } elseif (isset($_POST['decline'])) {
                    $status = 'Declined';
                }
    
                if (isset($status)) {
                    try {
                        global $conn;
                        $stmt = $conn->prepare("UPDATE hotelreservation SET status = ? WHERE Id = ?");
                        $stmt->bind_param("si", $status, $reservationId); // 'si' stands for string and integer types
                        $stmt->execute();
                        $_SESSION['notification'] = "Updated successfully!";
                    } catch (mysqli_sql_exception $e) {
                        echo "Error: " . $e->getMessage();
                    }
    
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }
            } elseif ($reservation == 2) {  
                $reservationId = $_POST['reservation_id'];
                if (isset($_POST['accept'])) {
                    $status = 'Accepted';
                } elseif (isset($_POST['decline'])) {
                    $status = 'Declined';
                }
    
                if (isset($status)) {
                    try {
                        global $conn;
                        $stmt = $conn->prepare("UPDATE groomingreservation SET status = ? WHERE Id = ?");
                        $stmt->bind_param("si", $status, $reservationId); // 'si' stands for string and integer types
                        $stmt->execute();
                        $_SESSION['notification'] = "Updated successfully!";
                    } catch (mysqli_sql_exception $e) {
                        echo "Error: " . $e->getMessage();
                    }
    
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }
            }
        }
    }
    
    function updateReservationstatus($reservation) {
        if($reservation==1){
            try {
                global $conn;
                $stmt = $conn->prepare("UPDATE hotelreservation SET status = 'Expired' WHERE checkinTime < CURDATE() AND (status = 'Unprocessed' OR status = 'Accepted')");
                $stmt->execute();
            } catch (mysqli_sql_exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        if($reservation==2){
            try {
                global $conn;
                $stmt = $conn->prepare("UPDATE groomingreservation SET status = 'Expired' WHERE date < CURDATE() AND (status = 'Unprocessed' OR status = 'Accepted')");  
                $stmt->execute();
            } catch (mysqli_sql_exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
     }
    
?>