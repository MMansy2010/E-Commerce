<?php
include_once "../Includes/vars.php";

$customers = mysqli_query($connection, "SELECT * FROM customer");

if (!$customers) {
    die("Query failed: " . mysqli_error($connection));
}
include_once "../Includes/header.php";
?>


<body>

<div class="container mt-5">

    <h1 class="mb-4 text-center">Customers Table</h1>

    <table class="table table-bordered table-striped table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
           foreach ($customers as $customer) {
                echo "<tr>
                        <td>{$customer['ID']}</td>
                        <td>{$customer['fullName']}</td>
                        <td>{$customer['address']}</td>
                        <td>{$customer['phone']}</td>
                        <td>{$customer['age']}</td>
                        <td>{$customer['gender']}</td>
                        <td>{$customer['password']}</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

</div>

</body>
</html>
