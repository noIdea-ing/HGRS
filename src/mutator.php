<?php
    include("database.php"); 
    function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            global $pdo;
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $role = 'user';

            if ($password !== $confirm_password) {
                $_SESSION['notification'] = "Password and Confirm Password do not match!";
                return;
            }

            try {
                // Check if username exists
                $stmt = $pdo->prepare('SELECT * FROM "user" WHERE username = :username');
                $stmt->execute(['username' => $username]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    $_SESSION['notification'] = "Username already exists!";
                    return;
                }

                // Insert new user
                $stmt = $pdo->prepare('INSERT INTO "user" (username, password, role) VALUES (:username, :password, :role)');
                $stmt->execute([
                    'username' => $username,
                    'password' => $password,
                    'role'     => $role
                ]);

                // Optionally log in immediately
                $stmt = $pdo->prepare('SELECT * FROM "user" WHERE username = :username');
                $stmt->execute(['username' => $username]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $_SESSION['username'] = $result['username'];
                $_SESSION['userid']   = $result['id'];
                $_SESSION['role']     = $result['role'];
                $_SESSION['notification'] = "Registration successful!";
                header('Location: index.php');
                exit;

            } catch (PDOException $e) {
                error_log( $e->getMessage());
            }
        }
    }

    function editProfile() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            global $pdo;
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $userid = $_SESSION['userid'];

            if ($username !== "" && $password == "" && $confirm_password == "") {
                // Update only username
                $stmt = $pdo->prepare('SELECT * FROM "user" WHERE username = :username');
                $stmt->execute([':username' => $username]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    $_SESSION['notification'] = "Username already exists!";
                } else {
                    $stmt = $pdo->prepare('UPDATE "user" SET username = :username WHERE id = :id');
                    $stmt->execute([':username' => $username, ':id' => $userid]);
                    $_SESSION['username'] = $username;
                    $_SESSION['notification'] = "Username updated successfully!";
                }

            } elseif ($username == "" && $password !== "" && $confirm_password !== "") {
                // Update only password
                if ($password !== $confirm_password) {
                    $_SESSION['notification'] = "Password and Confirm Password do not match!";
                } else {
                    $stmt = $pdo->prepare('UPDATE "user" SET password = :password WHERE id = :id');
                    $stmt->execute([':password' => $password, ':id' => $userid]);
                    $_SESSION['notification'] = "Password updated successfully!";
                }

            } elseif ($username !== "" && $password !== "" && $confirm_password !== "") {
                // Update both username and password
                $stmt = $pdo->prepare('SELECT * FROM "user" WHERE username = :username');
                $stmt->execute([':username' => $username]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    $_SESSION['notification'] = "Username already exists!";
                } else {
                    if ($password !== $confirm_password) {
                        $_SESSION['notification'] = "Password and Confirm Password do not match!";
                    } else {
                        $stmt = $pdo->prepare('UPDATE "user" SET username = :username, password = :password WHERE id = :id');
                        $stmt->execute([
                            ':username' => $username,
                            ':password' => $password,
                            ':id' => $userid
                        ]);
                        $_SESSION['username'] = $username;
                        $_SESSION['notification'] = "Username & Password updated successfully!";
                    }
                }
            } else {
                $_SESSION['notification'] = "Please fill in the required field!";
            }
        }
    }

    function handleGroomingFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            global $pdo;
            $petName = $_POST["name"];
            $date = $_POST["grooming_date"];
            $service = isset($_POST['service']) ? implode(", ", $_POST['service']) : '';
            $notes = $_POST["notes"];
            $time = $_POST["grooming-time"];
            $userid = $_SESSION['userid'];
            $status = "Unprocessed";

            try {
                $stmt = $pdo->prepare('
                    INSERT INTO groomingreservation (petname, date, services, notes, time, userid, status)
                    VALUES (:petname, :date, :services, :notes, :time, :userid, :status)
                ');

                $stmt->execute([
                    ':petname' => $petName,
                    ':date' => $date,
                    ':services' => $service,
                    ':notes' => $notes,
                    ':time' => $time,
                    ':userid' => $userid,
                    ':status' => $status
                ]);

                $_SESSION['notification'] = "Reservation submitted successfully!";
            } catch (PDOException $e) {
                error_log( $e->getMessage());
            }
        }
    }
    function handleHotelFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $petName = $_POST["pet_name"];
            $checkin = $_POST["check_in"];
            $checkout = $_POST["check_out"];
            $roomtype = $_POST["room_type"];
            $notes = $_POST["notes"];
            $userid = $_SESSION['userid'];
            $status = "Unprocessed";
            
            try {
                global $pdo;
                // PostgreSQL is case-sensitive, so use the exact case of column names in your database
                // If your column names are lowercase in database, use lowercase here
                // If your column names are uppercase in database, use uppercase here with double quotes
                $stmt = $pdo->prepare("INSERT INTO hotelreservation (\"petname\", \"checkintime\", \"checkouttime\", \"roomtype\", \"notes\", \"userid\", \"status\") 
                VALUES (:petName, :checkin, :checkout, :roomtype, :notes, :userid, :status)");
                
                $stmt->bindParam(':petName', $petName, PDO::PARAM_STR);
                $stmt->bindParam(':checkin', $checkin, PDO::PARAM_STR);
                $stmt->bindParam(':checkout', $checkout, PDO::PARAM_STR);
                $stmt->bindParam(':roomtype', $roomtype, PDO::PARAM_STR);
                $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
                $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
                $stmt->bindParam(':status', $status, PDO::PARAM_STR);
                
                $stmt->execute();
                $_SESSION['notification'] = "Reservation submitted successfully!";
            } catch (PDOException $e) {
                error_log( $e->getMessage());
            }
        }
    }


    function handleReservationStatus($reservation) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($reservation == 1) {
                $reservationId = $_POST['reservation_id'];
                if (isset($_POST['accept'])) {
                    $status = 'Accepted';
                } elseif (isset($_POST['decline'])) {
                    $status = 'Declined';
                }

                if (isset($status)) {
                    try {
                        global $pdo;
                        $stmt = $pdo->prepare("UPDATE hotelreservation SET \"status\" = :status WHERE \"id\" = :id");
                        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
                        $stmt->bindParam(':id', $reservationId, PDO::PARAM_INT);
                        $stmt->execute();
                        $_SESSION['notification'] = "Updated successfully!";
                    } catch (PDOException $e) {
                        error_log( $e->getMessage());
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
                        global $pdo;
                        $stmt = $pdo->prepare("UPDATE groomingreservation SET \"status\" = :status WHERE \"id\" = :id");
                        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
                        $stmt->bindParam(':id', $reservationId, PDO::PARAM_INT);
                        $stmt->execute();
                        $_SESSION['notification'] = "Updated successfully!";
                    } catch (PDOException $e) {
                        error_log( $e->getMessage());
                    }

                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                }
            }
        }
    }
    
    function updateReservationstatus($reservation) {
        try {
            global $pdo;
            if ($reservation == 1) {
                $stmt = $pdo->prepare("
                    UPDATE hotelreservation 
                    SET status = 'Expired'
                    WHERE checkinTime < CURRENT_DATE 
                    AND (status = 'Unprocessed' OR status = 'Accepted')
                ");
                $stmt->execute();
            }

            if ($reservation == 2) {
                $stmt = $pdo->prepare("
                    UPDATE groomingreservation 
                    SET status = 'Expired' 
                    WHERE date < CURRENT_DATE 
                    AND (status = 'Unprocessed' OR status = 'Accepted')
                ");
                $stmt->execute();
            }
        } catch (PDOException $e) {
            error_log( $e->getMessage());
        }
    }
    
?>