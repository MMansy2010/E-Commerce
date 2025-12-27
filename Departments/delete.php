<?php
include_once "../Includes/vars.php";
session_start();

if (isset($_GET['id'])) {
    $customerId = intval($_GET['id']);

    $deleteQuery = "DELETE FROM department WHERE ID = $customerId";

    if (mysqli_query($connection, $deleteQuery)) {
        $_SESSION['success'] = "Department deleted successfully.";

        header("Location: index.php");
        exit();
    } else {
        die("Error deleting record: " . mysqli_error($connection));
    }
} else {
    die("Invalid request");
}
