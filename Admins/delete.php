<?php
include_once "../Includes/vars.php";
session_start();

if (isset($_GET['id'])) {
    $adminId = intval($_GET['id']);

    $deleteQuery = "DELETE FROM admins WHERE ID = $adminId";

    if (mysqli_query($connection, $deleteQuery)) {
        $_SESSION['success'] = "Admin deleted successfully.";

        header("Location: index.php");
        exit();
    } else {
        die("Error deleting record: " . mysqli_error($connection));
    }
} else {
    die("Invalid request");
}
