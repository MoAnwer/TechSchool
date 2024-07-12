<?php

  $pass = "";
  $user = "root";

  try {

    $db = new PDO("mysql:host=localhost;dbname=techSchool;user=$user;password=$pass") or die("CONNECTION_ERROR");
    return $db;

  } catch (PDOException $e) {

    echo $e->getMessage();

  }
