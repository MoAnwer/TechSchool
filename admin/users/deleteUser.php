<?php
  include "../../views/init.php";
  include "../" . $funcs . "db.php";
  include "../" . $funcs . "Auth.php";
  include "../functions/User.php";

  // get the user id from db where hashed id it is equal $_GET['utd']
  $id = $user->getUserId()["id"];
  // get the hashed user id from query
  $hashId = $user->getUserId()["hash_id"];
  // get user where id = $id
  $user = $user->getUsers($id);

  if(Auth::isLog()) :
    if(Auth::isAdmin()) :?>
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
        <title>حذف مستخدم</title>
      </head>
      <body>
        <div class="container col-lg-5 py-4">
          <form action="../functions/deleteUser?usd=<?=$hashId?>" method="post" class="border rounded p-3">
            <h1 class="text-center mb-4 border pb-3 pt-2 rounded">حذف مستخدم</h1>
              <h6>الرجاء كتابة كلمة المرور الخاصة بك <?=$_SESSION['username']?> لإكمال الحذف:</h6>
                <input type="password" class="form-control mt-4" name="adminPass" placeholder="كلمة المرور" required>
                <input type="hidden" name="usd" value="<?=$hashId?>">
                <input type="submit" value="تعديل" class="btn btn-success w-100 mt-3">

          </div>
        </body>
      </html>
    <?php endif;
  endif;