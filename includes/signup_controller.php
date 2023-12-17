<?php

declare(strict_types=1);

function is_input_empty(string $username, string $email, string $password)
{
  if (empty($username) or empty($email) or empty($password)) {
    return true;
  } else {
    return false;
  }
};

function is_email_invalid(string $email)
{
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
};

function is_username_taken(object $conn, string $username)
{
  if (get_username_from_db($conn, $username)) {
    return true;
  } else {
    return false;
  }
}


function is_email_registered(object $conn, string $email)
{
  if (get_email_from_db($conn, $email)) {
    return true;
  } else {
    return false;
  }
}


function create_user(object $conn, string $username, string $email, string $password)
{
  set_user($conn, $username, $email, $password);
};
