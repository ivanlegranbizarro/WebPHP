<?php

if (isset($_POST["signup"])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  try {
    require_once 'db.php';
    require_once 'signup_model.php';
    require_once 'signup_controller.php';

    // Error handlers

    $errors = [];

    if (is_input_empty($username, $email, $password)) {
      $errors["empty_input"] = "Fill in all fields";
    }

    if (is_email_invalid($email)) {
      $errors["invalid_email"] = "Please, use a valid email";
    }

    if (is_username_taken($conn, $username)) {
      $errors["invalid_username"] = "Sorry, that username is already taken";
    }
    if (is_email_registered($conn, $email)) {
      $errors["invalid_email"] = "Sorry, that email is already registered";
    }

    require_once 'config.php';

    if ($errors) {
      $_SESSION["errors_signup"] = $errors;
      $signup_data = [
        "username" => $username,
        "email" => $email
      ];

      $_SESSION["signup_data"] = $signup_data;

      header("Location: ../index.php");
      die();
    }

    create_user($conn, $username, $email, $password);
    header("Location: ../index.php?signup=success");
    $conn = null;
    $stmt = null;
    die();
  } catch (PDOException $e) {
    die('Query failed' . $e->getMessage());
  }
} else {
  header("Location: ../index.php");
  die();
}
