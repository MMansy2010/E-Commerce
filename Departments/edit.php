<?php
include_once "../Includes/vars.php";
include_once "../Includes/header.php";

$customerId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['fullName'];
    $age      = intval($_POST['age']);
    $gender = $_POST['gender'];
    $address  = $_POST['address'];
    $phone    = $_POST['phone'];
    $password = $_POST['password'];

    $updateQuery = "
        UPDATE customer SET
            fullName = '$fullName',
            age = $age,
            gender = '$gender',
            address = '$address',
            phone = '$phone',
            password = '$password'
        WHERE ID = $customerId
    ";

    if (mysqli_query($connection, $updateQuery)) {
        echo "<div class='alert alert-success text-center'>Customer updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger text-center'>Error: " . mysqli_error($connection) . "</div>";
    }
}

$customerQuery = mysqli_query($connection, "SELECT * FROM customer WHERE ID = $customerId");
$customer = mysqli_fetch_assoc($customerQuery);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
  body { background-color: #f5f5f5; }

  .edit-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 14px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
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

  .form-control { border-radius: 8px; padding: 8px 10px; }

  .password-wrapper { position: relative; }
  .password-wrapper i {
    position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
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

  .submit-btn:hover { background-color: #333; }
</style>

<div class="edit-card">
  <div class="card-header">Edit Customer</div>

  <form action="" method="POST">
    <div class="row mb-3">
      <div class="col-md-6">
        <label>ID</label>
        <input type="text" name="ID" class="form-control" value="<?= $customer['ID']; ?>" readonly>
      </div>
      <div class="col-md-6">
        <label>Name</label>
        <input type="text" name="fullName" class="form-control" value="<?= $customer['fullName']; ?>" required>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label>Age</label>
        <input type="number" name="age" class="form-control" value="<?= $customer['age']; ?>" required>
      </div>
      <div class="col-md-6">
        <label>Gender</label>
        <input type="text" name="gender" class="form-control" value="<?= $customer['gender']; ?>" required>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6">
        <label>Address</label>
        <input type="text" name="address" class="form-control" value="<?= $customer['address']; ?>" required>
      </div>
      <div class="col-md-6">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="<?= $customer['phone']; ?>" required>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-12">
        <label>Password</label>
        <div class="password-wrapper">
          <input type="password" name="password" id="passwordField" class="form-control" value="<?= $customer['password']; ?>" required>
          <i id="togglePassword" class="bi bi-eye"></i>
        </div>
      </div>
    </div>

    <button type="submit" class="submit-btn">Update Customer</button>
  </form>
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