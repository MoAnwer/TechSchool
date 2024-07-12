<?php

  $dsn = "mysql:host=localhost;dbname=techschool";
  $user = "root";
  

  try {
    
    $pdo = new PDO($dsn, $user, "");

    $sql = "SELECT * FROM `users`";
    $statement = $pdo->query($sql);
    $date = $statement->fetchAll(PDO::FETCH_ASSOC);

    function get_json($date)
    { 
      header("content-type: application/json");
      $json = json_encode($date);
      echo $json;
    }
    $json = get_json($date);

  } catch (Exception $e) {
    echo $e->getMessage();
  }
