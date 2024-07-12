<?php

  class Student {

    public $searchStatue;

    public function getStudents(string $stage = "") {
      global $db;
      if ($stage != "") {
        $sql = $db->prepare(
          "SELECT id, std_name, stage, class, parent, phone, address, enroll_money, study_money, offer, last_money, total, notes 
          FROM 
            inputs 
          WHERE 
            stage = ? ORDER BY id DESC
        ");
        $sql->execute([$stage]);
        $students = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $students;
      } else {
        $sql = $db->query("SELECT id, std_name, stage, class, parent, phone, address, enroll_money, study_money, offer, last_money, total, notes FROM inputs ORDER BY id DESC");
        $sql->execute();
        $students = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $students;
      }  
    }
    
    // get student by ID
    public function getStudent(int $id) {
      global $db;
      $sql = $db->prepare("SELECT * FROM inputs WHERE id = ?  ORDER BY id DESC");
      $sql->execute([$id]);
      $student = $sql->fetch(PDO::FETCH_ASSOC);
      return $student;
    }

    // get count of students
    public static function CountOfStudents(string $stage = "") {
      global $db;
      if ($stage != "") {
        $countOfStudents = $db->query("SELECT COUNT(std_name) AS countOfStudents FROM inputs WHERE stage = '$stage'");
        $countOfStudents->execute();
        $countOfStudents = $countOfStudents->fetch(PDO::FETCH_ASSOC);
        return $countOfStudents['countOfStudents'];
      } else {
        $countOfStudents = $db->prepare("SELECT COUNT(std_name) AS countOfStudents FROM inputs");
        $countOfStudents->execute();
        $countOfStudents = $countOfStudents->fetch(PDO::FETCH_ASSOC);
        return $countOfStudents['countOfStudents'];
      }
    }

    public function search($searchNeedle) {
      global $db;
      $search = filter_var($searchNeedle, FILTER_SANITIZE_STRING);
      $sql = $db->query(
        "SELECT id, std_name, stage, class, parent, phone, address, 
          enroll_money, study_money, offer, last_money, total, notes
          FROM
            inputs
          WHERE 
            `std_name` LIKE '$search%'
          OR
            `stage` LIKE '$search'
          OR 
            `class` LIKE '$search'
          OR
            `phone` LIKE '$search'
          OR
            `address` LIKE '%$search'"
      );

      $sql->execute();
      $students = $sql->fetchAll(PDO::FETCH_ASSOC);
  
      // if there is students returned from search query then make the 'searchStatues' is true else set false in it .
      if ($sql->rowCount() > 0) {
        $this->searchStatue = true;
        return $students;
      } else {
        $this->searchStatue = false;
      }
    }
  }

  $student = new Student();