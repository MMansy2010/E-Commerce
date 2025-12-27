<?php
include_once "../Includes/vars.php";
include_once "../Includes/header.php";

$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$productQuery = mysqli_query($connection, "SELECT * FROM products WHERE ID = $productId");
$product = mysqli_fetch_assoc($productQuery);
?>
<style>
    a {
        text-decoration: none;
    }

    body {
        background-color: #f5f5f5;
    }

    .cool-card {
        background-color: #ffffff;
        color: #000;
        border: 1px solid #ddd;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    .cool-card .card-header {
        background-color: #000;
        color: #fff;
        border-radius: 14px 14px 0 0;
        font-size: 1.05rem;
        letter-spacing: 0.5px;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        font-size: 0.95rem;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .label {
        color: #666;
    }

    .value {
        font-weight: 600;
    }

    .action-btn {
        background-color: #000;
        color: #fff;
        border: none;
        padding: 8px 26px;
        border-radius: 22px;
        transition: 0.2s ease;
    }

    .action-btn:hover {
        background-color: #333;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card cool-card" style="max-width: 420px; width: 100%;">

        <div class="card-header text-center fw-semibold py-3">
            Name : <?= $product['Name']; ?>
        </div>

        <div class="card-body px-4">

            <div class="info-row">
                <span class="label">ID</span>
                <span class="value"><?= $product['ID']; ?></span>
            </div>

            <div class="info-row">
                <span class="label">Name</span>
                <span class="value"><?= $product['Name']; ?></span>
            </div>

            <div class="info-row">
                <span class="label">Category</span>
                <span class="value"><?= $product['Category']; ?></span>
            </div>

            <div class="info-row">
                <span class="label">Price</span>
                <span class="value"><?= $product['Price']; ?></span>
            </div>


            <div class="text-center mt-4">
                <a class="action-btn" href="edit.php?id=<?= $product['ID']; ?>">Edit Product</a>
            </div>

        </div>
    </div>
</div>
</body>