<?php include('header.php'); ?>
<?php include('../dbconnection.php') ?>
<link href="../css/add_company.css" rel="stylesheet" type="text/css" />

<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION["username"])) {
  header("Location: ../index.php"); // Redirect to login page if not logged in
  exit;
}
?>

<?php 
include '../dbconnection.php';

if (isset($_POST['add_company'])) {
	$c_name = $_POST['c_name'];
	$c_address = $_POST['c_address'];

	$query = "insert into `company`(`companyName`,`address`)values('$c_name','$c_address')";
	$result = mysqli_query($conn,$query);

	if(!$result)
	{
		die("Query Failed".mysqli_error());
	}
	else
	{
		header('location:company.php?insert_msg=YOUR DATA HAS BEEN ADDED SUCCESSFULLY!');
	}
}
?>

<div class="container">
	<div class="row justify-content-center">
		<form id="c_form" action="insert_data.php" method="post" class="col-lg-4 col-md-6 col-sm-8 mx-auto">
			<h1>Create New Company</h1>
			<div class="mb-3">
				<label for="c_name" class="form-label">Company Name</label>
				<input type="text" class="form-control" id="c_name" name="c_name">
			</div>
			<div class="mb-3">
				<label for="c_address" class="form-label">Address</label>
				<input type="text" class="form-control" id="c_address" name="c_address">
			</div>
			<button type="submit" class="btn btn-primary" name="add_company">ADD COMPANY</button>
		</form>
	</div>
	<div id="c_error" style="color: red;"></div>
</div>

<?php include('footer.php'); ?>
