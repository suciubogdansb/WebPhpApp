<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Adding Reservation...</title>
</head>


<body style="background-color: #f2f2f2; text-align: center; padding-top: 20px; font-family: Arial, sans-serif;">
    <?php
    require_once ("configuration.php");
    global $connection;
    session_start();
    $userId = $_SESSION['userId'];
    $roomId = $_POST['roomNumber'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    if ($startDate > $endDate) {
        echo "<p>Invalid date range. Please select a start date before the end date.</p>";
        header("refresh:2;url=showRooms.php");
        exit;
    }


    $sql_select_query = "SELECT * FROM `Reservation` WHERE ( ( startDate BETWEEN ? AND ? ) OR ( endData BETWEEN ? AND ?) ) AND roomId = ?";
    $select_stmt = mysqli_prepare($connection, $sql_select_query);
    mysqli_stmt_bind_param($select_stmt, "ssssi", $startDate, $endDate, $startDate, $endDate, $roomId);
    mysqli_stmt_execute($select_stmt);

    $select_result = $select_stmt->get_result();
    if ($select_result->num_rows > 0) {
        echo "<p>Room is already reserved during this time period. Please select another room or time period.</p>";
        header("refresh:2;url=showRooms.php");
    } else {
        $sql_insert_query = "INSERT INTO `Reservation` (guestId, roomId, startDate, endData) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $sql_insert_query);
        mysqli_stmt_bind_param($stmt, "iiss", $userId, $roomId, $startDate, $endDate);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            echo "<p>Reservation was successful!</p>";
            header("refresh:2;url=showRooms.php");
        } else {
            echo "<p>Reservation failed. Please try again.</p>";
            header("refresh:2;url=showRooms.php");
        }
    }
    ?>
</body>

</html>