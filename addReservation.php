<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Reservation</title>
    <link rel="stylesheet" type="text/css" href="addReservation.css">
</head>

<body>
    <button id="backToRooms" onclick="window.location.href='showRooms.php'">
        Back to Rooms
    </button>

    <div class="container">
        <h1>Add Reservation</h1>
        <form action="addReservationBackend.php" method="post">
            <input type="hidden" name="roomNumber" value="<?php 
                if($_GET['id']){
                    echo $_GET['id'];
                }
                else {
                    header("Location: showRooms.php");
                }
            ?>"> <br>
            Start date: <input type="date" name="startDate" placeholder="Start Date:" min="<?php echo date('Y-m-d'); ?>" max="2024-12-31" value="<?php echo date('Y-m-d'); ?>"> <br>
            End Date: <input type="date" name="endDate" placeholder="End Date:" min="<?php echo date('Y-m-d'); ?>" max="2024-12-31" value="<?php echo date('Y-m-d'); ?>"> <br>
            <button type="submit">Add Reservation</button>
        </form>
    </div>

</html>