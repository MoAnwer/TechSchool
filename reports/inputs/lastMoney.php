<?php
  $pageTitle = "مطالبة بمتأخرات مالية";
  include "../../views/init.php";
  include "../${funcs}Auth.php";
  if (Auth::isLog()) :
    $css = "../${css}";
    $imgs = "../${imgs}";
    $js = "../${js}";

    // to disable grid system in page
    $noGrid = True;

    // include main files
    include "../${funcs}db.php";
    include "../${funcs}getTitle.php";
    include "../${tmp}header.php";

    if (isset($_POST['last_money'])) :
      $lastMoney = filter_var(trim($_POST['last_money']), FILTER_SANITIZE_STRING);
      $sql = $db->prepare("SELECT std_name, class, CURDATE() AS date, last_money FROM inputs WHERE std_name = ?");
      $sql->execute([$lastMoney]);
      $student = $sql->fetch(PDO::FETCH_ASSOC);
      if ($sql->rowCount() <= 0) {
        echo "
              <h1 class='display-1 text-center pt-5'>🤔</h1>
              <h4 class='display-3 text-center'>لايوجد طالب بهذا الإسم</h4>";
      } else {?>
        <div class="container text-center vh-100 p-4">
          <header class="mb-5">
            <span>بسم الله الرحمن الرحيم</span>
            <h1 class="my-3">مؤسسة المدرسة الإلكترونية</h1>
            <h5>متأخرات مالية </h5>
          </header>
          <div class="container col-lg-8">
            <p><?=$student['class']?></p>
            <span class="studentDate d-flex justify-content-between mt-3">
              <p>السيد ولي أمر التلميذ/ة : <b><?=$student['std_name']?></b></p>
              <p><?=$student['date']?></p>
            </span>
            <hr>
            <p class="mt-5 mb-4">الرجاء التكرم بسداد الاقساط المتبقية وهي مبلغ  ( <?=number_format($student["last_money"])?> جنيه ) </p>
              <p>(______________________________________________) فقط</p>
              <p class="my-4">في فترة لا تتجاوز اسبوع من تاريخه</p>
              
              <p class="mt-4 fs-4">في حالة عدم  السداد سيتم ايقاف الطالب عن الدراسة ويحرم من الجلوس للامتحان النهائي</p>
              <div class="mt-5 mb-2 fs-5">وجزاكم الله خيراً</div>
              <div>ادارة المؤسسة</div>
            </div>
          </div>
        <?php
      }?>
    <?php endif;
  endif;?>
</body>
</html>