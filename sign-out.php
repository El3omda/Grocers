<?php

if (!isset($_SESSION['UserEmail'])) {
    header('Location:index.php');
}

require_once 'config.php';

session_start();

// Make User Offline

$UserEmail = $_SESSION['UserEmail'];

$sqlUOFF = "UPDATE users SET Online = 'No' WHERE Email = '$UserEmail'";

if (mysqli_query($conn,$sqlUOFF)) {
    session_destroy();
    header('Location:index.php');
} else {
    header('Location:shop.php');
}


