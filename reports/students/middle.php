<?php
  include "../../views/init.php";
  include "../${funcs}Auth.php";
  if (Auth::isLog()) :
    // include main components
    include "../${funcs}db.php";
    include "../${funcs}Student.php";

    // get students in the middle stage and count of them
    $students = $student->getStudents("المتوسط");
    $CountOfStudents = $student->CountOfStudents("المتوسط");

    // file name to pass it as 's' in query string in the edit page "it is require to redirect process"
    $stage = pathinfo(__FILE__, PATHINFO_FILENAME);
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="rtl">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="<?= "../${css}bootstrap.min.css"?>">
      <link rel="stylesheet" href="<?= "../${css}backend.css"?>">
      <link rel="shortcut icon" href="../<?=$imgs?>rome.svg" type="image/x-icon">
      <title>المتوسط</title>
    </head>
      <h2 class="p-3 text-center">
        <div class="badge bg-primary">
          المتوسط
        </div>
      </h2>
    <body>
      <table class="table">
        <thead>
          <tr>
            <th class="bg-light border">اسم الطالب</th>
            <th class="bg-light border">الصف</th>
            <th class="bg-light border">ولي الامر</th>
            <th class="bg-light border">التلفون</th>
            <th class="bg-light border">السكن</th>
            <th class="bg-light border">رسوم التسجيل</th>
            <th class="bg-light border">رسوم الدراسة</th>
            <th class="bg-light border">التخفيض</th>
            <th class="bg-light border">المتأخرات</th>
            <th class="bg-light border">الاجمالي</th>
            <th class="bg-light border">ملاحظات</th>
            <th class="bg-light border">تعديل</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($students) : foreach ($students as $student) :?>
            <tr>
              <td class="border"><?=$student['std_name']?></td>
              <td class="border"><?=$student['class']?></td>
              <td class="border"><?=$student['parent']?></td>
              <td class="border"><?=$student['phone']?></td>
              <td class="border"><?=$student['address']?></td>
              <td class="border"><?=number_format($student['enroll_money']). " ج"?></td>
              <td class="border"><?=number_format($student['study_money']) . " ج"?></td>
              <td class="border"><?=number_format($student['offer']) . " ج"?></td>
              <td class="border"><?=number_format($student['last_money']) . " ج"?></td>
              <td class="border"><?=number_format($student['total']) . " ج"?></td>
              <td class="border"><?=$student['notes']?></td>
              <td class="border">
              <a class="btn btn-success p-1" href="edit?std=<?=$student['id']?>&s=students">تعديل</a> | <a href="delete?std=<?=$student['id']?>" class="btn btn-danger p-1">حذف</a>
              </td>
            </tr>
            <?php endforeach; endif;?>
            <tr>
              <td class="border"> عدد الطلاب: <?=$CountOfStudents?> طالب </td>
            </tr>
        </tbody>
      </table>
    </body>
    </html>
  <?php endif;?>