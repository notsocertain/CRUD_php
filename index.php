<?php include('header_footer/header.php'); ?>
<link href="css/index.css" rel="stylesheet" type="text/css" />

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 col-sm-8">
      <h2 id="welcome_message">Welcome Back!</h2>
      <form id="login_form" action="login.php" method="post">
        <h3 id="login_form_title">Login</h3>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="login">Log In</button>
      </form>
      <a href="signup.php" class="btn btn-info">Sign Up</a>
    </div>
  </div>
  <div id="login_error" style="color: red;"></div>
</div>

<?php
  if(isset($_GET['invalid_password_msg'])){
    echo "<h6>".htmlspecialchars($_GET['invalid_password_msg'])."</h6>";
  }

  if(isset($_GET['no_user_msg'])){
    echo "<h6>".htmlspecialchars($_GET['no_user_msg'])."</h6>";
  }
?>

<?php include('header_footer/footer.php'); ?>
