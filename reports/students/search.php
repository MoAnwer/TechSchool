<?php
  include "../../views/init.php";
  include "../${funcs}Auth.php";
  
  if (isset($_POST['search'])) {
    // include main components
    include "../${funcs}db.php";
    include "../${funcs}Student.php";
    
    // get the result of search
    $students = $student->search(htmlspecialchars($_POST['search']));
    
    if (Auth::isLog()) :?>
    <!DOCTYPE html>
      <html lang="en" dir="rtl">
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= "../${css}bootstrap.min.css"?>">
        <link rel="stylesheet" href="<?= "../${css}backend.css"?>">
          <link rel="shortcut icon" href="../<?=$imgs?>rome.svg" type="image/x-icon">
        <script src="<?= "../${js}jquery.min.js"?>"></script>
        <script src="<?= "../${js}bootstrap.min.js"?>"></script>
        <title>نتائج البحث</title>
      </head>
      <body>
        <?php
        // check the searchStatue 
        if ($student->searchStatue) {
        ?>
        <h2 class="p-3 text-center">
          <div class="badge bg-primary">
            نتائج البحث
          </div>
        </h2>
        <table class="table text-center">
          <thead>
            <tr>
            <th class="bg-light border">اسم الطالب</th>
            <th class="bg-light border">المرحلة</th>
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
          <?php foreach ($students as $student) :?>
          <tr>
                <td class="border"><?=$student['std_name']?></td>
                <td class="border"><?=$student['stage']?></td>
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
                  <a class="btn btn-success p-1" href="edit?std=<?=$student['id']?>&s=students">تعديل</a> | <a class="btn btn-danger p-1" href="delete?std=<?=$student['id']?>">حذف</a>
                </td>
              </tr>
        <?php endforeach;
        } else {
          echo "
                <h1 class='display-1 text-center pt-5'>🤔</h1>
                <div class='display-2 text-center'>لا توجد نتائج<div>
            ";
        }
      endif; 
  } else {
    Auth::forbidden();
  }
    ?>
    </tbody>
  </table>
</body>
</html>