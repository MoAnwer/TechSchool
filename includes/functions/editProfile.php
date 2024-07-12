<?php

  // to be accessible from all scopes
  static $update;

  if(Auth::isLog()) :
    $id = $_SESSION['USI'];
    $sql = $db->prepare("SELECT * FROM users WHERE id = ?");
    $sql->execute([$id]);
    $userData = $sql->fetch(PDO::FETCH_ASSOC);

    // user date
    $username = $userData['UserName'];
    $email = $userData['UserEmail'];
    $id = $userData['id'];

    if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
      $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

      // update statement
      $sql = "UPDATE users 
          SET 
            Username = :name,
            UserEmail = :mail
          WHERE 
            id = :id";
      $statement = $db->prepare($sql);

      try {

        $update = $statement->execute([
          ":name" => $username,
          ":mail" => $email, 
          ":id" => $id
        ]);

          if ($update) {
            // update username session variable to show the new username if it is changed
            $_SESSION['username'] = $username;
            return $update;
          }

      } catch (PDOException $e) {
  
        // if username already exist then make `$update = false` to display "Duplicate User Name" alert
        // 23000 == Duplicate Entry .
  
        if ($e->getCode() == 23000) {
          $update = false;
        }
        header("refresh:3");
      }
    }
endif;