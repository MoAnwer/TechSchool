<?php
  session_start();
  include "init.php";
  include $funcs . "db.php";
  include $funcs . "addSuccess.php";
  include $funcs . "Validator.php";
  include $funcs . "login.php";
  // the login query result
  static $login;
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=$css?>bootstrap.min.css">
  <link rel="stylesheet" href="<?=$css?>bootstrap-icons.css">
  <link rel="stylesheet" href="<?=$css?>backend.css">
  <title>تسجيل دخول</title>
</head>
<body class="login-body">
<?php
    if (isset($_SESSION['username']) && !isset($_SESSION['admin'])) {

      header("location: inputs");
      exit();
      
    } elseif (isset($_SESSION['username']) && isset($_SESSION['admin'])) {

      header("location: dashboard");
      exit();

    } else {?>
      <div class="rounded mx-auto col-lg-4 col-sm-12 col-md-6 login">
        <?php isset($_POST['login']) ? loginError(!$login) : false;?>
        <form action="<?=htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <h1 class="p-2 mb-2 text-center">تسجيل الدخول</h1>
            <div id="label"></div>
            <div class="p-3">
              <input type="text" class="form-control mt-1 p-2" name="username" id="UserName" required placeholder= "اسم المستخدم "/>
              <input type="password" class="form-control mt-1 p-2" name="password" id="Password" required placeholder="كلمة السر"/>
              <input type="submit" class="btn btn-primary mt-2 p-2 w-100" name="login" value="تسجيل">
            </div>
        </form>
      </div>
    </body>
  </html>
  <?php } ?>