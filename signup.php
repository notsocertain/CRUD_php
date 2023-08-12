<?php include('header_footer/header.php'); ?>
<link href="css/signup.css" rel="stylesheet" type="text/css" />


<div class="container">
  <div class="row justify-content-center">
    <form id="signup_form" action="signup_push.php" method="post">
      <h1 id="login_form_title">Sign Up Here</h1>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="s_username" name="s_username">
        <div id="u_signup_error" style="color: red;"></div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="s_password" name="s_password">
        <div id="p_signup_error" style="color: red;"></div>
      </div>
      <button type="submit" class="btn btn-primary" name="signup">Sign Up</button>
    </form>
  </div>
  <div class="row justify-content-center"> <!-- New row for the "Go Back to Login" button -->
    <div class="col-auto">
      <a href="index.php" class="btn btn-info">Go Back to Login</a>
    </div>
  </div>
</div>

<?php include('header_footer/footer.php'); ?>
