<?php

declare(strict_types=1);


function signup_inputs()
{
  // <input type="text" name="username" placeholder="Username" required />
  // <br />
  // <input type="email" name="email" placeholder="Email" required />
  // <br />
  // <input type="password" name="password" placeholder="Password" required />
  // <br />
  // <button name="signup">Signup</button>
  if (isset($_SESSION["signup_data"]["username"]) and !isset($_SESSION["errors_signup"]["invalid_username"])) {
    echo '<input type="text" name="username" placeholder="Username" required value=" ' . $_SESSION["signup_data"]["username"] . '" />
  <br />';
  } else {
    echo '<input type="text" name="username" placeholder="Username" required />
  <br />';
  }
  if (isset($_SESSION["signup_data"]["email"]) and !isset($_SESSION["errors_signup"]["invalid_email"])) {
    echo '<input type="email" name="email" placeholder="Email" required value=" ' . $_SESSION["signup_data"]["email"] . '" />
  <br />';
  } else {
    echo '<input type="email" name="email" placeholder="Email" required />
  <br />';
  }
  echo '<input type="password" name="password" placeholder="Password" required />
  <br />';
  echo '<button name="signup">Signup</button>';
};

function check_signup_errors()
{
  if (isset($_SESSION["errors_signup"])) {
    $errors = $_SESSION["errors_signup"];

    echo '<br>';

    foreach ($errors as $error) {
      echo '<p style="color: red;">' . $error . '</p>';
    }

    unset($_SESSION["errors_signup"]);
  } elseif (isset($_GET["signup"]) and $_GET["signup"] == "success") {
    echo '<br>';
    echo '<p style="color: green;">Signup successful</p>';
  }
};
