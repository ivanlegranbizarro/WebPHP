<?php

declare(strict_types=1);


function get_username_from_db(object $conn, string $username)
{
  $query = "SELECT username FROM users WHERE username = :username;";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(":username", $username);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}

function get_email_from_db(object $conn, string $email)
{
  $query = "SELECT email FROM users WHERE email = :email;";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(":email", $email);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;
}


function set_user(object  $conn, string $username, string $email, string $password)
{
  $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password);";
  $stmt = $conn->prepare($query);
  $password = password_hash($password, PASSWORD_DEFAULT);
  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":email", $email);
  $stmt->bindParam(":password", $password);
  $stmt->execute();
}
