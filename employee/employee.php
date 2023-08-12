<?php include('../header_footer/header.php'); ?>
<?php include('../dbconnection.php') ?>

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
  header("Location: ../index.php"); // Redirect to login page if not logged in
  exit;
}
?>
<link href="../css/employee.css" rel="stylesheet" type="text/css" />


<div class="container mt-5">
  <div class="row justify-content-end">
    <div class="col-auto">
      <a href="e_insert_data.php" class="btn btn-success">CREATE EMPLOYEE</a>
    </div>
  </div>
</div>

<?php
if(isset($_GET['e_insert_msg'])){
	echo "<h6>".htmlspecialchars($_GET['e_insert_msg'])."</h6>";
}
?>

<br><br>
<div class="box1">
  <h2>Employee Detail</h2>
</div>

<?php
	if(isset($_GET['e_update_msg'])){
		echo "<h6>".htmlspecialchars($_GET['e_update_msg'])."</h6>";
	}
?>

<?php
	if(isset($_GET['e_delete_msg'])){
		echo "<h6>".htmlspecialchars($_GET['e_delete_msg'])."</h6>";
	}
?>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Salary</th>
			<th>Date Of Birth</th>
			<th>Company</th>
			<th colspan="2">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$query = "select * from `Employee`";

			$result = mysqli_query($conn, $query);

			if(!$result){
				die("query Failed".mysqli_error());
			}
			else{
				while($row = mysqli_fetch_assoc($result)){
					?>
						<tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['salary']; ?></td>
							<td><?php echo $row['dateOfBirth']; ?></td>
							<td><?php echo $row['company']; ?></td>
							<td><a href="e_update_page.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
							<td><a href="e_delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
						</tr>
					<?php
				}
			}
		 ?>
	</tbody>
</table>

<?php include('../header_footer/footer.php'); ?>
