<?php
  include "db.php";
  include "Auth.php";

  if (Auth::isLog()) :
    if (isset($_POST['std']) && !empty($_POST['std'])) {
      $id = htmlspecialchars($_POST['std']);
      $statement = $db->prepare("DELETE FROM inputs WHERE id = :id");
      $statement->execute([":id" => $id]);
      header("location: ../../reports/students/students");
    } else {
      Auth::forbidden();
    }
  endif;