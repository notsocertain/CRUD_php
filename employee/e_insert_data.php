<?php include('../header_footer/header.php'); ?>
<?php include('../dbconnection.php') ?>
<link href="../css/add_employee.css" rel="stylesheet" type="text/css" />
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

if (isset($_POST['add_employee'])) 
{
	$e_name = $_POST['e_name'];
	$e_salary = $_POST['e_salary'];
	$e_dob = $_POST['e_dob'];
	$e_company = $_POST['e_company'];

	$query = "insert into `Employee`(`name`,`salary`,`dateOfBirth`,`company`)values('$e_name','$e_salary','$e_dob','$e_company')";
	$result = mysqli_query($conn,$query);

	if(!$result)
	{
		die("Query Failed".mysqli_error());
	}
	else
	{
		header('location:employee.php?e_insert_msg=YOUR DATA HAS BEEN ADDED SUCCESSFULLY!');
	}
}
?>



<div class="container">
	<div class="row justify-content-center">
		<form id="e_form" action="e_insert_data.php" method="post" class="col-lg-4 col-md-6 col-sm-8 mx-auto">
			<h1>Create New Employee</h1>
			<div class="mb-3">
				<label for="e_name" class="form-label">Name</label>
				<input type="text" class="form-control" id="e_name" name="e_name">
			</div>
			<div class="mb-3">
				<label for="e_salary" class="form-label">Salary</label>
				<input type="number" class="form-control" id="e_salary" name="e_salary">
			</div>
			<div class="mb-3">
				<label for="e_dob" class="form-label">Date of Birth</label>
				<input type="date" class="form-control" id="e_dob" name="e_dob">
			</div>
			<div class="mb-3">
				<label for="e_company" class="form-label">Company</label>
				<input type="text" class="form-control" id="e_company" name="e_company">
			</div>
			<button type="submit" class="btn btn-primary" name="add_employee">ADD EMPLOYEE</button>
		</form>
		<div id="e_error" style="color: red;"></div>
	</div>
</div>

<?php include('../header_footer/footer.php'); ?>
