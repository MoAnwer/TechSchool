<?php
  include "../../views/init.php";
  include "../${funcs}Auth.php";
  if (Auth::isLog()) :

    if (isset($_GET['std']) && !empty($_GET['std'])) {
      $id = htmlspecialchars($_GET['std']);
    } else {
      Auth::forbidden();
    }?>
    <!DOCTYPE html>
    <html lang="en" dir="rtl">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="<?= "../${css}bootstrap.min.css"?>">
      <link rel="stylesheet" href="<?= "../${css}backend.css"?>">
      <title>حذف</title>
    </head>
    <body>
      <div class="container pt-4 text-center">
        <h1>حذف طالب</h1>
        <span>
          هل انت متأكد من هذا ؟
        </span>
        <form action="../<?=$funcs?>deleteStudent?std=" method="post">
          <input type="hidden" name="std" value="<?=$id?>">
          <a href="students" class="btn btn-secondary mt-3">إلغاء</a>
          <input type="submit" value="حذف" class="btn btn-danger mt-3">
        </form>
      </div>
    </body>
    </html>
<?php endif;