<?php
  include "../views/init.php";
  include  $funcs . "Auth.php";
  include  $funcs . "db.php";
  include "../admin/functions/User.php";

  if (Auth::isLog()) :

  // get current user in system by 'USI' => 'USER ID'
  $userDate = $user->getUser($_SESSION['USI']);

  // declare the user info
  $username = $userDate['UserName'];
  $email = $userDate['UserEmail'];

  // admin or user
  $admin = isset($_SESSION['admin']) ? "أدمن" : "مستخدم";
  ?>
  
  <!DOCTYPE html>
  <html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$css?>bootstrap.min.css">
    <link rel="stylesheet" href="<?=$css?>backend.css">
    <link rel="stylesheet" href="<?=$css?>bootstrap-icons.css">
    <script src="<?= "${js}jquery.min.js"?>"></script>
    <script src="<?= "${js}bootstrap.min.js"?>"></script>
    <link rel="shortcut icon" href="<?=$imgs?>rome.svg" type="image/x-icon">
    <title><?= $username?></title>
    <body>
      <div class="container pt-5 d-flex justify-content-center">
        <div class="card text-center col-11 col-sm-10 col-md-9 col-lg-9">
          <h4 class="card-header d-flex gap-3 align-items-center py-3">
            <i class="bi bi-person-circle bi-3x text-success"></i>
            <?=$username?> 
          </h4>
          <div class="list-group rounded-0 gap-0 text-end">
            <p class="list-group-item m-0 py-3" title="إسم المستخدم">
              <i class="bi bi-person-circle text-success px-2"></i> 
              <?=$username?>
            </p>
            <p class="list-group-item m-0 py-3" title="email"><i class="bi bi-envelope-fill text-success px-2"></i>
              <?=$email?>
            </p>
            <p class="list-group-item m-0 py-3 rounded-0" title="المنصب">
              <i class="bi bi-person-fill-gear text-success px-2"></i>
              <?= $admin?>
            </p>
            <a href="editProfile" class="btn btn-success py-2 fs-5 rounded-0">تعديل</a>
          </div>
        </div>
    </body>
  </html>
<?php endif;