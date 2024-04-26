<?php
require_once "configuration.php";

$username = $_POST['username'];
if(strlen($username) == 0 || strlen($username) >= 15) {
    die("Invalid username");
}

global $connection;
$row = null;
$selectQuery = "SELECT id FROM `SiteUser` WHERE userName = '$username'";
$result = mysqli_query($connection, $selectQuery);
if(mysqli_num_rows($result) == 0) {
    $insertQuery = "INSERT INTO `SiteUser` (userName) VALUES ('$username')";
    $result = mysqli_query($connection, $insertQuery);
    $result = mysqli_query($connection, $selectQuery);
}
$row = mysqli_fetch_assoc($result);

session_start();
$_SESSION['userId'] = $row['id'];
header('Location: showRooms.php');