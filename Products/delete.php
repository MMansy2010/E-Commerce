<?php
include_once "../Includes/vars.php";

if (isset($_GET['id'])) {
    $customerId = intval($_GET['id']);

    $deleteQuery = "DELETE FROM customer WHERE ID = $customerId";

    if (mysqli_query($connection, $deleteQuery)) {
        header("Location: index.php");
        exit();
    } else {
        die("Error deleting record: " . mysqli_error($connection));
    }
} else {
    die("Invalid request");
}
