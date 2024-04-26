<?php
require_once 'configuration.php';
$sql_query = "select * from `Room`";
    global $connection;
$result = mysqli_query($connection, $sql_query);

if ($result) {
    $number_of_rows = mysqli_num_rows($result);
    $requested_rooms = array();
    $type = $_GET["type"];
    $price = $_GET["price"];
    for ($i = 0; $i < $number_of_rows; $i++) {
        $row = mysqli_fetch_array($result);
        if (str_contains($row["type"], $type) && $row["price"] > $price)
            array_push($requested_rooms, array($row['id'], $row['type'], $row['price']));
    }
    mysqli_free_result($result);
    echo json_encode($requested_rooms);
}
mysqli_close($connection);
