<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header("Location: loginPage.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Available Rooms</title>
    <link rel="stylesheet" type="text/css" href="showRooms.css">
    <script src="jquery-3.7.1.js"></script>
    <script src="showRooms.js"></script>
</head>

<body>
    <div class="filters">
        <input type="text" placeholder="Type:" id="type" />
        <input type="number" placeholder="Price:" id="price" />
        <button onclick="window.location.href='showReservation.php'">
            My Reservations
        </button>
    </div>
    <div class="container">
        <table>
            <tr>
                <th> Room Number </th>
                <th> Room Type </th>
                <th> Price </th>
            </tr>
        </table>
    </div>
</body>

</html>