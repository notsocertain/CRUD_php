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

	<?php 
		if(isset($_GET['id'])){
			$id = $_GET['id'];

			$query = "select * from company where `id` = '$id' ";

			$result = mysqli_query($conn, $query);

			if(!$result){
				die("query Failed".mysqli_error());
			}
			else{
				$row = mysqli_fetch_assoc($result);
			}	
		}
	?>


	<?php


		if(isset($_POST['update_company']))
		{
			if(isset($_GET['id_new']))
			{
				$id_new = $_GET['id_new'];
			}

			$c_name = $_POST['c_name'];
			$c_address = $_POST['c_address'];


			$query = "update company set `companyName`='$c_name', `address` ='$c_address' where `id`= '$id_new'";

			$result = mysqli_query($conn, $query);

			if(!$result)
			{
				die("query Failed".mysqli_error());
			}
			else
			{
				header('location:company.php?update_msg=UPDATED SUCCESSFULLY!');;
				exit();
			}
		}


	?>

	<div class="container">
	<form action="c_update_page.php?id_new=<?php echo $id; ?>" method="post">
	  <div class="mb-3">
	    <label for="c_name" class="form-label" >Company Name</label>
	    <input type="text" class="form-control" name="c_name" value="<?php echo $row['companyName'] ?>">
	  </div>
	  <div class="mb-3">
	    <label for="c_address" class="form-label">Address</label>
	    <input type="text" class="form-control" name="c_address" value="<?php echo $row['address'] ?>">
	  </div>
	  <button type="submit" class="btn btn-primary" name="update_company">UPDATE</button>
	</form>
	</div>



<?php include('footer.php'); ?>