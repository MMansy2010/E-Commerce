<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Commerce | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-dark text-light">

<?php include_once "../Includes/header.php"; ?>
<div class="container d-flex flex-column justify-content-center align-items-center text-center" style="min-height: 80vh;">
    
    <h1 class="fw-bold mb-3">Welcome to E-Commerce Dashboard</h1>
    <p class="text-secondary mb-4">
        Manage customers, products, orders, and staff easily
    </p>

    <div class="row g-3 justify-content-center">
        <div class="col-md-3 col-6">
            <a href="../Customers/index.php" class="btn btn-outline-light w-100">
                <i class="bi bi-people"></i> Customers
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="../Products/index.php" class="btn btn-outline-light w-100">
                <i class="bi bi-box"></i> Products
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="../Orders/index.php" class="btn btn-outline-light w-100">
                <i class="bi bi-cart"></i> Orders
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="../Admins/index.php" class="btn btn-outline-light w-100">
                <i class="bi bi-shield-lock"></i> Admins
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="../Departments/index.php" class="btn btn-outline-light w-100">
                <i class="bi bi-diagram-3"></i> Departments
            </a>
        </div>
        <div class="col-md-3 col-6">
            <a href="../Employees/index.php" class="btn btn-outline-light w-100">
                <i class="bi bi-person-badge"></i> Employees
            </a>
        </div>
        <p>By: Mohamed Mansy</p>
    </div>

</div>

</body>
</html>
