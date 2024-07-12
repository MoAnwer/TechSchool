<?php
  include "../../views/init.php";
  include "../" . $funcs . "Auth.php";
  include "../" . $funcs . "db.php";
  include "../functions/User.php";
  
  $users = $user->getUsers();

  if (Auth::isAdmin()) :?>
  <!DOCTYPE html>
    <html lang="en" dir="rtl">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../<?=$css?>bootstrap.min.css">
      <link rel="stylesheet" href="../<?=$css?>backend.css">
      <script src="<?= "../${js}jquery.min.js"?>"></script>
      <script src="<?= "../${js}bootstrap.min.js"?>"></script>
      <link rel="shortcut icon" href="../<?=$imgs?>rome.svg" type="image/x-icon">
      <title>المستخدمين</title>
    </head>
    <body>
      <div class="container">
        <h2 class="p-3 text-center">
        <div class="badge bg-primary">
          المستخدمين
        </div>
      </h2>
        <table class="table border text-center">
          <thead>
            <tr class="bg-light">
              <th class="border"> إسم المستخدم</th>
              <th class="border">البريد الإلكتروني</th>
              <th class="border">ادمن</th>
              <th class="border">تعديل</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user) :?>
  <tr>
                <td class="border"><?=$user['UserName']?></td>
                <td class="border"><?=$user['UserEmail']?></td>
                <td class="border"><?=$user['IsAdmin']?></td>
                <td>
                  <a href="editUser?usd=<?=sha1($user['id'])?>" class="btn btn-success p-0 px-2">تعديل</a> |
                  <a href="deleteUser?usd=<?=sha1($user['id'])?>" class="btn btn-danger p-0 px-2">حذف</a>
                </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
    </body>
  </html>
  <?php endif;