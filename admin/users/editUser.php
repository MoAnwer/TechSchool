<?php
  include "../../views/init.php";
  include "../{$funcs}db.php";
  include "../{$funcs}Auth.php";
  include "../{$funcs}addSuccess.php";
  include "../functions/User.php";
  include "../functions/editUser.php";

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
        <link rel="stylesheet" href="../<?=$css?>bootstrap-icons.css">
        <script src="<?= "../${js}jquery.min.js"?>"></script>
        <script src="<?= "../${js}bootstrap.min.js"?>"></script>
        <link rel="shortcut icon" href="../<?=$imgs?>rome.svg" type="image/x-icon">
        <title>تعديل مستخدم</title>
      </head>
      <body>
        <div class="container col-lg-5 py-4">
          <?php updateSuccess($update);?>
          <?php isset($_POST['adminPass']) ? wrongPassword(!$update) : false;?>
          <form action="<?=htmlspecialchars("editUser")?>?usd=<?=$hashId?>" method="post" class="border rounded p-3">
            <h1 class="text-center mb-4 border pb-3 pt-2 rounded">تعديل مستخدم</h1>
              <label for="name" class="text-secondary">إسم المستخدم : </label>
              <input type="text" id="name" class="form-control mb-3 mt-2" name="username" value="<?=$user['UserName']?>" required>
              <label for="mail" class="text-secondary">البريد الإلكتروني : </label>
              <input type="email" id="mail" class="form-control mb-3 mt-2" name="email"  value="<?=$user['UserEmail']?>" required>
              <?php 
                if ($user['IsAdmin'] == "yes") {
                  echo '<input type="checkbox" checked id="admin" name="admin" class="mx-2">';
                  echo '<label for="admin">أدمن </label>';
                } else {
                  echo '<input type="checkbox" id="admin" name="admin" class="mx-2">';
                  echo '<label for="admin">أدمن</label>';
                }?>

                <input type="hidden" name="usd" value="<?=$hashId?>">

                <a class="btn btn-success mt-3 w-100" type="button" data-toggle="modal" data-target="#edit">تعديل</a>
                <!-- Modal -->
                <div class="modal fade mt-5" id="edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
              <div class="modal-dialog mt-5" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                      </button>
                        <h5 class="modal-title text-center">كلمة المرور</h5>
                      </div>
                      <div class="modal-body">
                        <div class="container-fluid">
                          <form action="../functions/edit.php?usd=<?=$hashId?>" method="post">
                            <h6>الرجاء كتابة كلمة المرور الخاصة بك <?=$_SESSION['username']?> لإكمال التعديل:</h6>
                            <input type="password" class="form-control mt-4" name="adminPass" placeholder="كلمة المرور" required>
                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">إغلاق</button>
                        <input type="submit" value="تعديل" class="btn btn-success w-100">
                      </div>
                    </form>
                  </form>
                </div>
              </div>
            </div>
            <!-- Modal -->
          </div>
        </body>
      </html>
    <?php endif;
  endif;