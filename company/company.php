<?php include('header.php'); ?>
<?php include('../dbconnection.php') ?>

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
  header("Location: ../index.php"); // Redirect to login page if not logged in
  exit;
}
?>

<link href="../css/company.css" rel="stylesheet" type="text/css" />

<div class="container mt-5">
    <div class="row justify-content-end add-button">
        <div class="col-auto">
            <a href="insert_data.php" class="btn btn-success">ADD COMPANY</a>
        </div>
    </div>
</div>

<?php
	if(isset($_GET['insert_msg'])){
		echo "<h6>".htmlspecialchars($_GET['insert_msg'])."</h6>";
	}
?>

<br><br>
<div class="box1">
  <h2>Company Detail</h2>
</div>

<?php
	if(isset($_GET['update_msg'])){
		echo "<h6>".htmlspecialchars($_GET['update_msg'])."</h6>";
	}
?>

<?php
	if(isset($_GET['delete_msg'])){
		echo "<h6>".htmlspecialchars($_GET['delete_msg'])."</h6>";
	}
?>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Company</th>
			<th>Address</th>
			<th colspan="2">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$query = "select * from company";

			$result = mysqli_query($conn, $query);

			if(!$result){
				die("Query Failed: ".mysqli_error());
			}
			else{
				while($row = mysqli_fetch_assoc($result)){
					?>
						<tr>
							<td> <?php echo $row['companyName']; ?> </td>
							<td> <?php echo $row['address']; ?> </td>
							<td><a href="c_update_page.php?id=<?php echo $row['id']; ?> " class="btn btn-success">Update</a></td>
							<td><a href="c_delete_page.php?id=<?php echo $row['id']; ?> " class="btn btn-danger">Delete</a></td>
						</tr>
					<?php
				}
			}
		 ?>
	</tbody>
</table>

<?php include('footer.php'); ?>
