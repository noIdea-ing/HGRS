<?php
    session_start();
    $_SESSION['page'] = "Edit Profile";
    include("mutator.php");
    editProfile();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI GEBUS - Edit Profile</title>
</head>
<body>
    <?php include("header.php"); ?>
    <?php include("notification.php"); ?>
    <div class="form-section">
        <h2>Edit Profile</h2>
        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="<?php echo $_SESSION['username'];?>">
            </div>
            <div class="form-group">
                <label for="password">Change New Password</label>
                <input type="password" id="password" name="password" placeholder="Leave this field empty if you don't want to change your password">

            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Leave this field empty if you don't want to change your password">
            </div>
            <button type="submit">Edit Profile</button>
        </form>
    </div>
</body>
</html>