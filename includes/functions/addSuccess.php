<?php

  function addSuccess($adding) {
    if ($adding) :?>
      <div class='alert alert-success'>
        <i class='bi bi-check-circle mx-2'></i>
        تم الإضافة بنجاح
      </div>
      <script>
        setTimeout(() => {
          document.querySelector(".alert").remove();
        }, 3000);
      </script>
    <?php endif;
  }

  function updateSuccess($update) {
    if ($update) :?>
      <div class='alert alert-success mb-4'>
        <i class='bi bi-check-circle mx-2'></i>
        تم التعديل بنجاح
      </div>
      <script>
        setTimeout(() => {
          document.querySelector(".alert").remove();
        }, 3000);
      </script>
    <?php endif;
  }

  function wrongPassword($password) {
    if ($password) :?>
      <div class='alert alert-danger mb-4'>
        <i class='bi bi-xmark-circle mx-2'></i>
        كلمة السر غير صحيحة , حاول مرة أخرى
      </div>
      <script>
        setTimeout(() => {
          document.querySelector(".alert").remove();
        }, 3000);
      </script>
    <?php endif;
  }

  function loginError($login) {
    if ($login) :?>
      <div class='alert alert-danger mb-4'>
        <i class='bi bi-person-fill-x mx-2'></i>
        إسم المستخدم او كلمة السر غير صحيحة , حاول مرة أخرى 
      </div>
      <script>
        setTimeout(() => {
          document.querySelector(".alert").remove();
        }, 3000);
      </script>
    <?php endif;
  }

  function duplicateUserName($query) {
    if ($query) :?>
      <div class='alert alert-danger mb-4'>
        <i class='bi bi-xmark-circle mx-2'></i>
        إسم المستخدم هذا موجود بالفعل , حاول إستخدام إسم اخر
      </div>
      <script>
        setTimeout(() => {
          document.querySelector(".alert").remove();
        }, 3000);
      </script>
    <?php endif;
  }