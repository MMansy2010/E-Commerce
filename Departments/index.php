<?php
include_once "../Includes/vars.php";


$departments = mysqli_query($connection, "SELECT * FROM department");

if (!$departments) {
    die("Query failed: " . mysqli_error($connection));
}
include_once "../Includes/header.php";
session_start();

if (isset($_SESSION['success'])) {
    echo '
    <div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
        ' . $_SESSION['success'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>';
    
    unset($_SESSION['success']);
}
?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Departments Table</h1>
        <a href="add.php" class="btn btn-dark d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Add New
        </a>
    </div>

    <table class="table table-bordered table-striped table-hover text-center">
        <thead class="table-dark">
            <tr class="fs-5">
                <th>ID</th>
                <th>Name</th>
                <th colspan="3" class="table-dark">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($departments as $department) {
                echo "<tr>
                        <td>{$department['ID']}</td>
                        <td>{$department['Name']}</td>
                        <td><a class='btn btn-dark' href='view.php?id={$department['ID']}'>View</a></td>
                        <td><a class='btn btn-secondary' href='edit.php?id={$department['ID']}'>Edit</a></td>
                        <td><a class='btn btn-danger' href='delete.php?id={$department['ID']}' onclick='return confirm(\"Are you sure you want to delete this department?\")'>Delete</a></td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

</div>


</body>

</html>