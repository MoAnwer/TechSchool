<?php

  class User {

    /*get users || specific user by id */
    public function getUsers($id = "") {
      global $db;
      if ($id != "") {
        $sql = $db->prepare("SELECT * FROM users WHERE id = ?");
        $sql->execute([$id]);
        $users = $sql->fetch(PDO::FETCH_ASSOC);
        return $users;
      } else {
        $sql = $db->prepare("SELECT * FROM users WHERE UserName != ?");
        $sql->execute([$_SESSION['username']]);
        $users = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $users;
      }
    }

    /* get specific user by his data */
    public function getUser($arg) {
      global $db;
      $sql = $db->prepare("SELECT * FROM users WHERE id = ? OR UserName = ? OR UserEmail = ? OR UserPassword = ?");
      $sql->execute([$arg, $arg, $arg, $arg]);
      $user = $sql->fetch(PDO::FETCH_ASSOC);
      return $user;
    }

    // get user id if it was hashed from url $_GET['usd'] => "USER T"
    public function getUserId() {
      global $db;
      if (isset($_GET['usd'])) {
        $usd = $_GET['usd'];
        // GET user id and hashed id
        $hashId = $db->query("SELECT id, SHA1(id) AS hashId FROM users");
        $hashId->execute();
        $hashId = $hashId->fetchAll(PDO::FETCH_ASSOC);
        // user id
        static $userId;
        // compare the hash id with the user id
        if ($hashId) :
          foreach($hashId as $id) :
            if ($usd == $id['hashId']) :
              // get id from database and set it in the '$userId' to continue process
              $userId = $id['id'];
              $sql = $db->prepare("SELECT * FROM users WHERE id = ?");
              $sql->execute([$userId]);
              $students = $sql->fetch(PDO::FETCH_ASSOC);
            endif;
          endforeach;
        endif;
        // hashed id from $usd
        $hashed = $usd;
        
        return [
          "id" => $userId, 
          "hash_id" => $hashed
        ];

      } else {
        header("HTTP/1.1 403");
        exit();
      }
    }

    public function getUserEmail($id) {
      global $db;
      $sql = $db->prepare("SELECT UserEmail FROM users WHERE id = ?");
      $sql->execute([$id]);
      $email = $sql->fetch(PDO::FETCH_ASSOC);
      return $email;
    }

    // add new user method
    public function addUser($username, $password, $email, $admin){
      global $db;
      $adding;
      if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          // skip bad chars
          $username = quotemeta($_POST['username']);
          $email = $_POST['email'];
          // hash password
          $password = sha1($_POST['password']);
          $admin = "no";
          // check if the 'admin' is set to make it admin or no
          if (isset($_POST['admin']) == "on") {
            $admin = "yes";
          } else {
            $admin = "no";
          }
          // insert statement
          try {
            $sql = $db->prepare("INSERT INTO users (Username, UserPassword, UserEmail, IsAdmin) VALUES (?, ?, ?, ?)");
            $adding = $sql->execute([$username, $password, $email, $admin]);
          } catch (PDOException $e) {

            // if username already exist then make `$adding = false` to display "Duplicate User Name" alert
            // 23000 == Duplicate Entry .
            if ($e->getCode() == 23000) {
              $adding = false;
            }

          }
        }
        return $adding;
      } else {
        header("HTTP/1.1 403");
        exit();
      }
    }

    // edit user
    public static function editUser($username, $email, $admin, $id) {
      global $db;
      if (isset($_POST['username']) && isset($_POST['email'])) {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $username = quotemeta($_POST['username']);
          $email = $_POST['email'];
          // check if the 'admin' is set to make it admin or no
          $admin = "no";
          if (isset($_POST['admin']) == "on") {
            $admin = "yes";
          } else {
            $admin = "no";
          }
          // update statement
          $sql = "UPDATE users 
              SET Username = :name,
                UserEmail = :mail, 
                IsAdmin = :admin 
              WHERE 
                id = :id";
          $statement = $db->prepare($sql);

          try {
            $update = $statement->execute([
              ":name" => $username,
              ":mail" => $email, 
              ":admin" => $admin, 
              ":id" => $id
            ]);
          } catch (PDOException $e) {

            // if username already exist then make `$update = false` to display "Duplicate User Name" alert
            // 23000 == Code Mean Duplicate Entry .
            if ($e->getCode() == 23000) {
              $update = false;
            }
          }
        }
        //  return $update to know value of him
        return $update;
      } else {
        header("HTTP/1.1 403");
        exit();
      }
    }

    // delete user
    public function deleteUser() {
      global $db;
      $id = $this->getUserId()['id'];
      $statement = $db->prepare("DELETE FROM users WHERE id = ?");
      $statement->execute([$id]);
    }

  }

  $user = new User();