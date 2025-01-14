<?php
if (isset($_SESSION['notification'])) {
    echo '<div class="notification-bar">' . $_SESSION['notification'] . '</div>';
    unset($_SESSION['notification']);
} 

?>