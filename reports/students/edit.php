<?php
  include "../../views/init.php";
  include "../{$funcs}Auth.php";
  if (Auth::isLog()) :
    // include main components
    include "../{$funcs}db.php";
    include "../{$funcs}Student.php";
    include "../{$funcs}Validator.php";
    include "../{$funcs}addSuccess.php";
    include "../{$funcs}editStudent.php";

    if (!isset($_GET['std']) || empty($_GET['std']) || !isset($_GET['s']) || empty($_GET['s'])) {
      Auth::forbidden();
    } else {
      $std = htmlspecialchars($_GET['std']);
      $stage = htmlspecialchars($_GET['s']);
      /*
      انا خليت  دالة التعديل اول عشان لمن يحصل تعديل يكون الظاهر في الحقول هو القيم المعدلة
      لانو لو خليت الإستعلام بتاع جلب بيانات الطالب اول حا اضطر اضغط مرتين على زر التعديل لانو الضغطة الاولى
      التعديل بيحصل لكن ما بيظهر التعديل الا مع الضغطة االتانية
      */
      $update = updating();
      // Get student info when $std = id of student
      $studentInfo = $student->getStudent($std);


      ?>
      <!DOCTYPE html>
      <html lang="en" dir="rtl">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= "../${css}bootstrap.min.css"?>">
        <link rel="stylesheet" href="<?= "../${css}bootstrap-icons.css"?>">
        <link rel="stylesheet" href="<?= "../${css}backend.css"?>">
        <link rel="shortcut icon" href="../<?=$imgs?>rome.svg" type="image/x-icon">
        <title>تعديل</title>
      </head>
      <body>
        <div class="main-page pt-3">
          <form method="post" class="container pt-2" action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?std=<?=$std?>&s=<?=$stage?>">
            <?php updateSuccess($update);?>
              <!-- student -->
              <h5>بيانات الطالب :</h5>
                <div class="container row gap-2 bg-light py-4 px-2 rounded">
                  <div class="col-lg-2">
                    <input type="text" name="std_name" class="form-control" value="<?=$studentInfo['std_name']?>">
                  </div>
                  <div class="col-lg-1 p-0">
                    <select name="stage" class="form-select">
                      <option value="<?=$studentInfo['stage']?>"><?=$studentInfo['stage']?></option>
                      <option value="الروضة">الروضة</option>
                      <option value="الإبتدائي">الإبتدائي</option>
                      <option value="المتوسط">المتوسط</option>
                      <option value="الثانوي">الثانوي</option>
                    </select>
                  </div>
                  <div class="col-lg-1 p-0">
                    <select name="class" class="form-select">
                      <option value="<?=$studentInfo['class']?>"><?=$studentInfo['class']?></option>
                      <option value="الأول">الأول</option>
                      <option value="الثاني">الثاني</option>
                      <option value="الثالث">الثالث</option>
                      <option value="الرابع">الرابع</option>
                      <option value="الخامس">الخامس</option>
                      <option value="السادس">السادس</option>
                      <option value="الأول المتوسط">الأول المتوسط</option>
                      <option value="الثاني المتوسط">الثاني المتوسط</option>
                      <option value="الثالث المتوسط">الثالث المتوسط</option>
                      <option value="الأول الثانوي">الأول الثانوي</option>
                      <option value="الثاني الثانوي">الثاني الثانوي</option>
                      <option value="الثالث الثانوي">الثالث الثانوي</option>
                    </select>
                  </div>
                  <div class="col-lg-2 p-0">
                    <input type="text" name="parent" class="form-control" value="<?=$studentInfo['parent']?>">
                  </div>
                  <div class="col-lg-2 p-0">
                    <input type="number" name="phone" class="form-control" value="<?=$studentInfo['phone']?>">
                  </div>
                  <div class="col-lg-1 p-0">
                    <input type="text" name="address" class="form-control" value="<?=$studentInfo['address']?>">
                  </div>
                  <div class="col-lg-2 p-0">
                    <input type="text" name="notes" class="form-control" value="<?=$studentInfo['notes']?>">
                  </div>
                </div>
        
                <!-- enroll -->
                <h5 class="my-4">بيانات التسجيل :</h5>
                <div class="container row gap-2 bg-light py-4 px-2 rounded">
                  <div class="col-lg-2 p-0">
                    <input type="number" name="enroll_money" class="form-control" value="<?=$studentInfo['enroll_money']?>">
                  </div>
                  <div class="col-lg-2 p-0">
                    <input type="number" name="study_money" class="form-control" value="<?=$studentInfo['study_money']?>">
                  </div>
                  <div class="col-lg-2 p-0">
                    <input type="number" name="offer" class="form-control" value="<?=$studentInfo['offer']?>">
                  </div>
                  <div class="col-lg-2 p-0">
                    <input type="number" name="last_money" class="form-control" value="<?=$studentInfo['last_money']?>">
                  </div>
                  <div class="col-lg-3 p-0">
                    <input type="number"  name="total" class="form-control" value="<?=$studentInfo['total']?>" readonly>
                  </div>
                </div>
        
                <!-- money -->
                <h5 class="my-4">الأقساط :</h5>
                <div class="money-g container row gap-1 bg-light py-2 px-2 rounded">
                  <div class="col-lg-2 p-0">
                    <input type="number" name="g1" class="form-control my-2" value="<?=$studentInfo['g1']?>">
                    <input type="date" name="d1" class="form-control my-2"  value="<?=$studentInfo['d1']?>">
                  </div>
                  <div class="col-lg-2 p-0">
                    <input type="number" name="g2" class="form-control my-2" value="<?=$studentInfo['g2']?>">
                    <input type="date" name="d2" class="form-control my-2"  value="<?=$studentInfo['d2']?>">
                  </div>
                  <div class="col-lg-2 p-0">
                    <input type="number" name="g3" class="form-control my-2" value="<?=$studentInfo['g3']?>">
                    <input type="date" name="d3" class="form-control my-2" value="<?=$studentInfo['d3']?>" >
                  </div>
                  <div class="col-lg-1 p-0">
                    <input type="number" name="g4" class="form-control my-2" value="<?=$studentInfo['g4']?>">
                    <input type="date" name="d4" class="form-control my-2" value="<?=$studentInfo['d4']?>">
                  </div>
                  <div class="col-lg-1 p-0">
                    <input type="number" name="g5" class="form-control my-2" value="<?=$studentInfo['g5']?>">
                    <input type="date" name="d5" class="form-control my-2"  value="<?=$studentInfo['d5']?>">
                  </div>
                  <div class="col-lg-1 p-0">
                    <input type="number" name="g6" class="form-control my-2"  value="<?=$studentInfo['g6']?>">
                    <input type="date" name="d6" class="form-control my-2"  value="<?=$studentInfo['d6']?>">
                  </div>
                  <div class="col-lg-1 p-0">
                    <input type="number" name="g7" class="form-control my-2" value="<?=$studentInfo['g7']?>">
                    <input type="date" name="d7" class="form-control my-2" value="<?=$studentInfo['d7']?>">
                  </div>
                  <div class="col-lg-1 p-0">
                    <input type="number" name="pulled"  class="form-control my-2"  value="<?=$studentInfo['total']?>" readonly>
                    <input type="number" name="result"  class="form-control my-2"  value="<?=$studentInfo['last_money']?>" readonly>
                  </div>
                </div>
                <div class="row gap-2 mt-4">
                  <button type="submit" class="col-lg-2 btn btn-success">إضافة</button>
                  <a href="<?= $stage?>" class="col-lg-2 btn btn-secondary">العودة</a>
                </div>
                <input type='hidden' name='std' value='<?=$std?>'>
            </form>
        </div>
        <script src="<?="../${js}inputs.js"?>"></script>
      </body>
    </html>
      <?php 
    }
  endif;