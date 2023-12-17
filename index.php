<?php
require_once 'includes/config.php';
require_once 'includes/signup_view.php';
require_once 'includes/login_view.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SignUp PHP</title>
</head>

<body>

  <h3>
    <?php
    output_username();
    ?>
  </h3>
  <br />

  <?php
  if (!isset($_SESSION["user_id"])) { ?>
    <h3>Login</h3>
    <hr />
    <br />
    <form action="includes/login.php" method="post">
      <input type="text" name="username" placeholder="Username" required />
      <br />
      <input type="password" name="password" placeholder="Password" required />
      <br />
      <button name="login">Login</button>
    </form>
  <?php
  }
  ?>

  <?php
  check_login_errors();
  ?>
  <br />
  <br />
  <h3>Signup</h3>
  <hr />
  <br />
  <form action="includes/signup.php" method="post">
    <?php
    signup_inputs();
    ?>
  </form>

  <?php
  check_signup_errors();
  ?>

  <h3>Logout</h3>

  <form action="includes/logout.php" method="post">
    <button>Logout</button>
  </form>



</body>

</html>
