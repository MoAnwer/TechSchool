<?php
  include "../{$funcs}db.php";
  include "User.php";

  static $adding;
  
  if ($_SERVER['REQUEST_METHOD'] == "POST") :
    if (Auth::isAdmin()) :
      $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $password = sha1($_POST['password']);
      $admin = "no";
      $adding = $user->addUser($username, $password, $email, $admin);
      return $adding;
    endif;
  endif;