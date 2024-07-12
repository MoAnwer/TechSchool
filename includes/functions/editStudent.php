<?php 

  function updating() {
    global $db;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $id = filter_var($_POST['std'], FILTER_SANITIZE_NUMBER_INT);
      $std_name = filter_var($_POST['std_name'], FILTER_SANITIZE_STRING);
      $stage = filter_var($_POST['stage'], FILTER_SANITIZE_STRING);
      $class = filter_var($_POST['class'], FILTER_SANITIZE_STRING);
      $parent = filter_var($_POST['parent'], FILTER_SANITIZE_STRING);
      $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
      $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
      $enroll_money = filter_var($_POST['enroll_money'], FILTER_SANITIZE_NUMBER_FLOAT);
      $study_money = filter_var($_POST['study_money'], FILTER_SANITIZE_NUMBER_FLOAT);
      $offer = filter_var($_POST['offer'], FILTER_SANITIZE_NUMBER_FLOAT);
      $last_money = filter_var($_POST['last_money'], FILTER_SANITIZE_NUMBER_FLOAT);
      $total = filter_var($_POST['total'], FILTER_SANITIZE_NUMBER_FLOAT);
      $g1 = filter_var($_POST['g1'], FILTER_SANITIZE_NUMBER_FLOAT);
      $d1 = $_POST['d1'];
      $g2 = filter_var($_POST['g2'], FILTER_SANITIZE_NUMBER_FLOAT);
      $d2 = $_POST['d2'];
      $g3 = filter_var($_POST['g3'], FILTER_SANITIZE_NUMBER_FLOAT);
      $d3 = $_POST['d3'];
      $g4 = filter_var($_POST['g4'], FILTER_SANITIZE_NUMBER_FLOAT);
      $d4 = $_POST['d4'];
      $g5 = filter_var($_POST['g5'], FILTER_SANITIZE_NUMBER_FLOAT);
      $d5 = $_POST['d5'];
      $g6 = filter_var($_POST['g6'], FILTER_SANITIZE_NUMBER_FLOAT);
      $d6 = $_POST['d6'];
      $g7 = filter_var($_POST['g7'], FILTER_SANITIZE_NUMBER_FLOAT);
      $d7 = $_POST['d7'];
      $pulled = filter_var($_POST['pulled'], FILTER_SANITIZE_NUMBER_FLOAT);
      $result = filter_var($_POST['result'], FILTER_SANITIZE_NUMBER_FLOAT);
      $notes = filter_var($_POST['notes'], FILTER_SANITIZE_STRING);


      $sql = "UPDATE inputs 
            SET std_name = :std_name,
              class = :class,
              stage = :stage,
              parent = :parent,
              phone = :phone,
              address = :address,
              enroll_money = :enroll_money,
              study_money = :study_money,
              offer = :offer,
              last_money = :last_money,
              total = :total,
              g1 = :g1,
              d1 = :d1,
              g2 = :g2,
              d2 = :d2,
              g3 = :g3,
              d3 = :d3,
              g4 = :g4,
              d4 = :d4,
              g5 = :g5,
              d5 = :d5,
              g6 = :g6,
              g7 = :g7,
              d6 = :d6,
              d7 = :d7,
              pulled = :pulled,
              result = :result,
              notes = :notes
            WHERE id = :id";
    
      // prepare statement
      $statement = $db->prepare($sql);
      $update = $statement->execute([
        "std_name" => $std_name,
        ":stage" => $stage,
        ":class"  => $class,
        ":parent" => $parent,
        ":phone" => $phone,
        ":address"  =>  $address, 
        ":enroll_money" => $enroll_money,
        ":study_money" => $study_money,
        ":offer" => $offer,
        ":last_money" => $last_money,
        ":total" => $total,
        ":g1" => $g1,
        ":d1" => $d1,
        ":g2" => $g2,
        ":d2" => $d2,
        ":g3" => $g3,
        ":d3" => $d3,
        ":g4" => $g4, 
        ":d4" => $d4, 
        ":g5" => $g5, 
        ":d5" => $d5, 
        ":g6" => $g6,
        ":d6" => $d6,
        ":g7" => $g7,
        ":d7" => $d7,
        ":pulled" => $pulled,
        ":result" => $result,
        ":notes" => $notes,
        ":id" => $id
      ]);
      return $update;
    } 
  }