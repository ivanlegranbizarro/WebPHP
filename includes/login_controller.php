<?php

declare(strict_types=1);

function is_username_wrong(bool|array $result)
{
  if (!$result) {
    return true;
  } else {
    return false;
  }
}


function is_password_wrong(string $password, string $hashed_password)
{
  if (!password_verify($password, $hashed_password)) {
    return true;
  } else {
    return false;
  }
}

function is_input_empty(string $username, string $password)
{
  if (empty($username) or empty($password)) {
    return true;
  } else {
    return false;
  }
}
