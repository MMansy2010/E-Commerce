<?php
include_once "../Includes/vars.php";
include_once "../Includes/header.php";

$customerId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Name = $_POST['Name'];

    $updateQuery = "
        INSERT INTO `department`(`Name`) VALUES ('$Name')
    ";

    if (mysqli_query($connection, $updateQuery)) {
        echo '
    <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
        Department added successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>';
    } else {
        echo "<div class='alert alert-danger text-center'>Error: " . mysqli_error($connection) . "</div>";
    }
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body {
        background-color: #f5f5f5;
    }

    .edit-card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        max-width: 700px;
        width: 100%;
        padding: 20px 30px;
        margin: 40px auto;
    }

    .card-header {
        background-color: #000;
        color: #fff;
        font-size: 1.2rem;
        text-align: center;
        padding: 12px;
        border-radius: 14px 14px 0 0;
        margin: -20px -30px 20px -30px;
    }

    .form-control {
        border-radius: 8px;
        padding: 8px 10px;
    }

    .password-wrapper {
        position: relative;
    }

    .password-wrapper i {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .submit-btn {
        background-color: #000;
        color: #fff;
        border: none;
        padding: 10px 28px;
        border-radius: 22px;
        display: block;
        margin: 20px auto 0 auto;
        transition: 0.2s;
    }

    .submit-btn:hover {
        background-color: #333;
    }
</style>

<div class="edit-card">
    <div class="card-header">Add Department</div>

    <form action="" method="POST">
        <div class="row mb-3">
            <div class="col-md-12">
                <label>Name</label>
                <input type="text" name="Name" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="submit-btn">Add Department</button>
    </form>
</div>
</body>