<?php
include_once "../Includes/vars.php";
include_once "../Includes/header.php";

$customerId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$customerQuery = mysqli_query($connection, "SELECT * FROM admins WHERE ID = $customerId");
$customer = mysqli_fetch_assoc($customerQuery);
?>
<style>
    a{
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
            Email : <?= $customer['Email']; ?>
        </div>

        <div class="card-body px-4">

            <div class="info-row">
                <span class="label">ID</span>
                <span class="value"><?= $customer['ID']; ?></span>
            </div>

            <div class="info-row">
                <span class="label">Email</span>
                <span class="value"><?= $customer['Email']; ?></span>
            </div>

            <div class="info-row">
                <span class="label">EmployeeID</span>
                <span class="value"><?= $customer['employeeId']; ?></span>
            </div>

            <div class="info-row">
                <span class="label">Password</span>
                <span class="value" style="display: flex; align-items: center;">
                    <input type="password" id="passwordField" value="<?= $customer['password']; ?>" readonly
       style="border: none; background: transparent; font-weight: 600; color: inherit; width: <?= strlen($customer['password']); ?>ch;">
                    <i id="togglePassword" class="bi bi-eye" style="cursor: pointer; margin-left: 8px;"></i>
                </span>
            </div>


            <div class="text-center mt-4">
<a class="action-btn" href="edit.php?id=<?= $customer['ID']; ?>">Edit Profile</a>
            </div>

        </div>
    </div>
</div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const passwordField = document.querySelector('#passwordField');

    togglePassword.addEventListener('click', function () {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);

        
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
</script>
</body>