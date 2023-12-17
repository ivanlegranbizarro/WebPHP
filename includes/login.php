<?php

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  try {
    require_once 'db.php';
    require_once 'login_controller.php';
    require_once 'login_model.php';


    // Error handlers

    $errors = [];

    if (is_input_empty($username, $password)) {
      $errors["empty_input"] = "Fill in all fields";
    }

    $result = get_user_from_db($conn, $username);

    if (is_username_wrong($result)) {
      $errors["login_incorrect"] = "Incorrect login info";
    }

    if (!is_username_wrong($result) and is_password_wrong($password, $result["password"])) {
      $errors["login_incorrect"] = "Incorrect login info";
    }


    require_once 'config.php';

    if ($errors) {
      $_SESSION["errors_login"] = $errors;

      header("Location: ../index.php");
      die();
    }

    $new_session_id = session_create_id();
    $session_id = $new_session_id . '-' . $result["id"];
    session_id($session_id);

    $_SESSION["user_id"] = $result["id"];
    $_SESSION["user_username"] = htmlspecialchars($result["username"]);
    $_SESSION["last_regeneration"] = time();

    header("Location: ../index.php?login=success");
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
