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
    <title>My Reservations</title>
    <link rel="stylesheet" type="text/css" href="showRooms.css">
    <script src="jquery-3.7.1.js"></script>
    <script src="showReservation.js"></script>
</head>

<body>
    <button id="backToRooms" onclick="window.location.href='showRooms.php'">
        Back to Rooms
    </button>
    <div class="container">
        <table>
            <tr>
                <th> Room Number </th>
                <th> Start Date </th>
                <th> End Date </th>
            </tr>
        </table>
    </div>

</html>