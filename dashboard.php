<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
  header("Location: index.php"); // Redirect to login page if not logged in
  exit;
}
?>

<?php include('header_footer/header.php'); ?>
<link href="css/dashboard.css" rel="stylesheet" type="text/css" />


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2>Choose an Action:</h2>
      <div class="d-grid gap-2">
        <!-- Company Button -->
        <a href="company/company.php" class="btn btn-primary btn-lg mb-3 btn-box">Company Detail</a>

        <!-- Employee Button -->
        <a href="employee/employee.php" class="btn btn-success btn-lg btn-box">Employee Detail</a>
      </div>
      <a href="logout.php" class="btn btn-danger" style="float: right;">Logout</a>
    </div>
  </div>
</div>

<?php include('header_footer/footer.php'); ?>
