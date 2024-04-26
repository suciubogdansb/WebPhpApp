<?php
require_once 'configuration.php';
session_start();
$userId = $_SESSION['userId'];

$sql_query = "SELECT * FROM `Reservation` WHERE guestId = ?";
global $connection;
$stmt = mysqli_prepare($connection, $sql_query);

mysqli_stmt_bind_param($stmt, "i", $userId);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $number_of_rows = mysqli_num_rows($result);
    $requested_rooms = array();
    for ($i = 0; $i < $number_of_rows; $i++) {
        $row = mysqli_fetch_array($result);
        array_push($requested_rooms, array($row['id'], $row['guestId'], $row['roomId'], $row['startDate'], $row['endData']));
    }
    mysqli_free_result($result);
    echo json_encode($requested_rooms);
}

mysqli_stmt_close($stmt);
mysqli_close($connection);
