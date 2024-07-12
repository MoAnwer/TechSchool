<?php
  $pageTitle = "إيراد الروضة";
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

    try {
      $sql = $db->query("
          SELECT 
            `std_name`,
            `enroll_money`,
            `study_money`,
            `offer`,
            `last_money`,
            `total`,
            `g1`,`d1`,`g2`,`d2`,`g3`,`d3`,`g4`,`d4`,`g5`,`d5`,`g6`,`d6`,`g7`,`d7`,
            `pulled`,
            `result` 
          FROM 
            inputs 
          WHERE `stage` = 'الروضة' ORDER BY id DESC
        ");

      $students = $sql->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

      echo $e->getMassage();
    }

    try {
      $totalSum = $db->query("SELECT SUM(total) AS totalSum FROM inputs WHERE `stage` = 'الروضة'");
      $totalSum = $totalSum->fetch(PDO::FETCH_ASSOC)['totalSum'];
    } catch (PDOException $e) {
      echo $e->getMassage();
    }

    ?>
      <h2 class="p-3 text-center">
        <div class="badge bg-primary">
          <?=$pageTitle?>
        </div>
      </h2>
      <div class="border position-absolute top-0 start-0 mt-4 mx-1 p-2">
          <?=number_format($totalSum)?>
        </div>
      <table class="table">
          <thead>
            <th class="bg-light border">إسم الطالب</th>
            <th class="bg-light border">رسوم التسجيل</th>
            <th class="bg-light border">رسوم الدراسة</th>
            <th class="bg-light border">التخفيض</th>
            <th class="bg-light border">المتأخرات</th>
            <th class="bg-light border">القسط1</th>
            <th class="bg-light border">تاريخة</th>
            <th class="bg-light border">القسط2</th>
            <th class="bg-light border">تاريخة</th>
            <th class="bg-light border">القسط3</th>
            <th class="bg-light border">تاريخة</th>
            <th class="bg-light border">القسط4</th>
            <th class="bg-light border">تاريخة</th>
            <th class="bg-light border">القسط5</th>
            <th class="bg-light border">تاريخة</th>
            <th class="bg-light border">القسط6</th>
            <th class="bg-light border">تاريخة</th>
            <th class="bg-light border">القسط7</th>
            <th class="bg-light border">تاريخة</th>
            <th class="bg-light border">الاجمالي</th>
          </thead>
        <tbody>
      <?php 

      $sql->execute();
      $students = $sql->fetchAll(PDO::FETCH_ASSOC);

      if ($students) : foreach ($students as $student) :?>
        <tr>
          <td class="border"><?=$student['std_name']?></td>
          <td class="border"><?=number_format($student['enroll_money'])?></td>
          <td class="border"><?=number_format($student['study_money']) ?></td>
          <td class="border"><?=number_format($student['offer']) ?></td>
          <td class="border"><?=number_format($student['last_money']) ?></td>
          <td class="border"><?=number_format($student['g1']) ?></td>
          <td class="border"><?=$student['d1']?></td>
          <td class="border"><?=number_format($student['g2']) ?></td>
          <td class="border"><?=$student['d2']?></td>
          <td class="border"><?=number_format($student['g3']) ?></td>
          <td class="border"><?=$student['d3']?></td>
          <td class="border"><?=number_format($student['g4']) ?></td>
          <td class="border"><?=$student['d4']?></td>
          <td class="border"><?=number_format($student['g5']) ?></td>
          <td class="border"><?=$student['d5']?></td>
          <td class="border"><?=number_format($student['g6']) ?></td>
          <td class="border"><?=$student['d6']?></td>
          <td class="border"><?=number_format($student['g7']) ?></td>
          <td class="border"><?=$student['d7']?></td>
          <td class="border"><?=number_format($student['total'])?></td>
        </tr>
        <?php endforeach;
      endif; 
    endif;
    ?>
    </table>
    </tbody>
  </body>
</html>