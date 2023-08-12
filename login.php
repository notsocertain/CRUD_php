<?php include('dbconnection.php') ?>


<?php
// Check if the form is submitted
if(isset($_POST['login'])) 
{
  // Get the user input from the form
  $username = $_POST["username"];
  $password = $_POST["password"];



  // Prepare a SQL statement to fetch the user's data from the database
  //$query = "SELECT * FROM users WHERE username = `$username`";
  // $result = mysqli_query($conn, $query);

  // if(mysqli_num_rows($result)===1)
  // {
  //   session_start();
  //   $_SESSION['auth']='true';
  //   header('location:company.php');
  // }else
  // {
  //   header('location:index.php');
  // }
  $sql = "SELECT * FROM users WHERE username = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) 
  {
    // If the user is found in the database, verify the password
    $row = $result->fetch_assoc();
    if ($password == $row["password"]) {
      // Authentication successful, set session variables, etc.
      // For example, you can use $_SESSION["username"] to store the username for future use.
      session_start();
      $_SESSION["username"] = $username;
      header("Location: dashboard.php"); // Redirect to the dashboard or protected area
      exit;
    } else {
      // Password is incorrect
      header('location:index.php?invalid_password_msg=INVALID PASSWORD!');
    }
  } else {
    // User not found
    header('location:index.php?no_user_msg=USER NOT FOUND!');
  }

}
?>
