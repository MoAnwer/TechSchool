<?php 

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $userName = filter_var($_POST['username'], FILTER_SANITIZE_STRING);    
    $hashPassword = sha1($_POST['password']);

    $sql = $db->prepare("SELECT * FROM users WHERE UserName = ? AND UserPassword = ?");
  
    // $login is result of the execution of $sql (true || false)
    $login = $sql->execute([$userName, $hashPassword]);
  
    $userInfo = $sql->fetch(PDO::FETCH_ASSOC);
    
    if ($sql->rowCount() > 0) {
  
      // set username in session
      $_SESSION['username'] = $userInfo['UserName'];

      // store user id in session value named "USI" => "USER ID"
      $_SESSION['USI'] = $userInfo['id'];

      // check if the user is admin to set "admin" value in $_SESSION redirect it to dashboard
      if ($userInfo['IsAdmin'] == "yes") {
        $_SESSION['admin'] = $userInfo['IsAdmin'];
        header("location: dashboard");
      } else {
        header("location: inputs");
        exit();
      }

    } else {
      // return $login to know value of him
      return $login;
    }
    
  }