<?php
  include "../views/init.php";
  include "${funcs}Auth.php";
  include "${funcs}db.php";
  include "${funcs}addSuccess.php";
  include "${admin}functions/User.php";
  include "${funcs}editProfile.php";

  if(Auth::isLog()) :?>
    <!DOCTYPE html>
    <html lang="en" dir="rtl">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="<?=$css?>bootstrap.min.css">
      <link rel="stylesheet" href="<?=$css?>bootstrap-icons.css">
      <link rel="stylesheet" href="<?=$css?>backend.css">
      <link rel="shortcut icon" href="<?=$imgs?>rome.svg" type="image/x-icon">
      <title>تعديل الملف الشخصي</title>
    </head>
    <body>
      <div class="container col-lg-5 pt-4">
        <?php updateSuccess($update);?>
        <form action="<?=htmlspecialchars("editProfile")?>" method="post" class="border rounded p-3">
          <h1 class="text-center mb-4 border pb-3 pt-2 rounded">
            <?php isset($_POST['update']) ? duplicateUserName(!$update) : false;?>
            تعديل الملف الشخصي
            <i class="bi bi-parson-circle"></i>
          </h1>
            <input type="text" class="form-control mb-3" name="username" value="<?= $username?>" placeholder="إسم المستخدم" required>
            <input type="email" class="form-control mb-3" name="email" value="<?= $email?>" placeholder="email@exampl.com" required>
            <input type="submit" value="تعديل" name="update" class="btn btn-success mt-3 w-100">
            <a href="Details" class="btn btn-secondary mt-1 w-100">عودة للملف الشخصي</a>
        </form>
      </div>
    </body>
  </html>
  <?php endif;