<?php
include_once "../Includes/vars.php";

$query = "SELECT * FROM employees";
$customers = mysqli_query($connection, $query);

if ($_GET && isset($_GET['search'])) {
    $search = mysqli_real_escape_string($connection, $_GET['search']);
    $filter = mysqli_real_escape_string($connection, $_GET['filter']);
    $query = "SELECT * FROM employees WHERE $filter LIKE '%$search%' ";
    $customers = mysqli_query($connection, $query);
}

if (!$customers) {
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

<div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
  <form class="d-flex mx-auto mt-4 align-items-center" role="search" style="width:50%;" onsubmit="return validateFilter()">
    <div class="dropdown me-2">
      <button class="btn btn-secondary rounded-pill px-3 d-flex align-items-center" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false" required>
        <i class="bi bi-filter me-2"></i> Filter
      </button>
      <ul class="dropdown-menu" aria-labelledby="filterDropdown">
        <li><a class="dropdown-item" data-value="id">ID</a></li>
        <li><a class="dropdown-item" data-value="name">Name</a></li>
        <li><a class="dropdown-item" data-value="departmentId">Department ID</a></li>
        <li><a class="dropdown-item" data-value="salary">Salary</a></li>
      </ul>
      <input type="hidden" id="filterSelect" required>
    </div>


<?php include_once "../Includes/SearchBar.php"; ?>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Employees Table</h1>
        <a href="add.php" class="btn btn-dark d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> Add New
        </a>
    </div>

    <table class="table table-bordered table-striped table-hover text-center">
        <thead class="table-dark">
            <tr class="fs-5">
                <th>ID</th>
                <th>Name</th>
                <th>Department ID</th>
                <th>Salary</th>
                <th colspan="3" class="table-dark">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($customers as $customer) {
                echo "<tr>
                        <td>{$customer['ID']}</td>
                        <td>{$customer['Name']}</td>
                        <td>{$customer['departmentId']}</td>
                        <td>{$customer['Salary']}</td>
                        <td><a class='btn btn-dark' href='view.php?id={$customer['ID']}'>View</a></td>
                        <td><a class='btn btn-secondary' href='edit.php?id={$customer['ID']}'>Edit</a></td>
                        <td><a class='btn btn-danger' href='delete.php?id={$customer['ID']}' onclick='return confirm(\"Are you sure you want to delete this employee?\")'>Delete</a></td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

</div>


</body>

</html>