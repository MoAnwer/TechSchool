<?php
  include "../../views/init.php";
  include "../".$funcs."db.php";
  include "../".$funcs."Auth.php";
  include "User.php";

  if (isset($_POST['adminPass'])) {
    if (Auth::isAdmin()) {
      $id = $user->getUserId()["id"];
      $userDate = $user->getUsers($id);
  
      $getPass = $db->prepare("SELECT UserPassword FROM users WHERE UserName = ?");
      $getPass->execute([$_SESSION['username']]);
      $fetchAdminPass = $getPass->fetch(PDO::FETCH_ASSOC);
  
      $adminPass = $fetchAdminPass['UserPassword'];
  
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($adminPass == sha1($_POST["adminPass"])) {
          $user->deleteUser();
          header("location: ../users/usersList");
        }
      }
    }
  } else {
    Auth::forbidden();
  }