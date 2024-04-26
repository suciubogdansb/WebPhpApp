<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Deleting Reservation...</title>
    </head>
    <body style="background-color: #f2f2f2; text-align: center; padding-top: 20px; font-family: Arial, sans-serif;">
        <?php
            if(!$_GET['id'])
            {
                header("Location: showReservation.php");
            }
            else
            {
                $id = $_GET["id"];
                require_once("configuration.php");
                global $connection;
                $sql_query = "DELETE FROM `Reservation` WHERE id = ?";
                $stmt = mysqli_prepare($connection, $sql_query);
                $stmt->bind_param("i", $id);
                $stmt->execute();

                $result = $stmt->get_result();
                if (!$result) {
                    echo "Reservation successfully deleted.";
                    header("refresh:2;url=showReservation.php");
                } else {
                    echo "Failed to delete reservation.";
                    header("refresh:2;url=showReservation.php");
                }
            }
        ?>
    </body>
</html>