<?php

  static $update;

  $id = $user->getUserId()["id"];
  $userDate = $user->getUsers($id);
  $getPass = $db->prepare("SELECT UserPassword FROM users WHERE UserName = ?");
  $getPass->execute([$_SESSION['username']]);
  $fetchAdminPass = $getPass->fetch(PDO::FETCH_ASSOC);

  $adminPass = $fetchAdminPass['UserPassword'];

  if ($_SERVER['REQUEST_METHOD'] == "POST") :
    if ($adminPass == sha1($_POST["adminPass"])) :
      $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $admin = "no";
      $update = $user->editUser($username, $email, $admin, $id);
      header("refresh:3;url:../users/usersList.php");
    endif;
  endif;

  return $update;