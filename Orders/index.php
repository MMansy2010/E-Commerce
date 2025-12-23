<?php
include_once "../Includes/vars.php";

$customers = mysqli_query($connection, "SELECT * FROM customer");

if (!$customers) {
    die("Query failed: " . mysqli_error($connection));
}
include_once "../Includes/header.php";
?>

<div class="container mt-5">

    <h1 class="mb-4 text-center">Customers Table</h1>

    <table class="table table-bordered table-striped table-hover text-center">
        <thead class="table-dark">
            <tr class="fs-5">
                <th>ID</th>
                <th>Full Name</th>
                <th>Age</th>
                <th colspan="3" class="table-dark">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($customers as $customer) {
                echo "<tr>
                        <td>{$customer['ID']}</td>
                        <td>{$customer['fullName']}</td>
                        <td>{$customer['age']}</td>
                        <td><a class='btn btn-dark' href='view.php?id={$customer['ID']}'>View</a></td>
                        <td><a class='btn btn-secondary' href='edit.php?id={$customer['ID']}'>Edit</a></td>
                        <td><a class='btn btn-danger' href='delete.php?id={$customer['ID']}' onclick='return confirm(\"Are you sure you want to delete this customer?\")'>Delete</a></td>
</tr>";
            }
            ?>
        </tbody>
    </table>

</div>

</body>

</html>