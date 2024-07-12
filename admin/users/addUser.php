<?php
  include "../../views/init.php";
  include "../{$funcs}Auth.php";
  include "../{$funcs}addSuccess.php";
  include "../functions/addUser.php";
  
  if(Auth::isAdmin()) :?>
    <!DOCTYPE html>
    <html lang="en" dir="rtl">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../<?=$css?>bootstrap.min.css">
      <link rel="stylesheet" href="../<?=$css?>bootstrap-icons.css">
      <link rel="stylesheet" href="../<?=$css?>backend.css">
      <link rel="shortcut icon" href="../<?=$imgs?>rome.svg" type="image/x-icon">
      <title>إضافة مستخدم</title>
    </head>
    <body>
      <div class="container col-lg-5 pt-4">
        <?php addSuccess($adding);?>
        <?php isset($_POST['add']) ? duplicateUserName(!$adding) : false;?>
        <form action="<?=htmlspecialchars("addUser")?>" method="post" class="border rounded p-3">
          <h1 class="text-center mb-4 border pb-3 pt-2 rounded">إضافة مستخدم</h1>
            <input type="text" class="form-control mb-3" name="username" placeholder="إسم المستخدم" required>
            <input type="password" class="form-control mb-3" name="password" placeholder="كلمة السر" required>
            <input type="email" class="form-control mb-3" name="email" placeholder="email@exampl.com" required>
            <input type="checkbox" id="admin" name="admin">
            <label for="admin">أدمن</label><br>
            <input type="submit" name="add" value="إضافة" class="btn btn-success mt-3 w-100">
          </form>
      </div>
    </body>
    </html>
  <?php endif;