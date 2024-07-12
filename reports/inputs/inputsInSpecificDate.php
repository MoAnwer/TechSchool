<?php 
  $pageTitle = "نتائج البحث";
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

    // check if the data sended to page
    if (isset($_POST['startDate']) && isset($_POST['endDate'])) {

      $startDate = $_POST['startDate'];
      $endDate = $_POST['endDate'];

      // sql statement
      $sql = $db->prepare("SELECT * FROM inputs WHERE `date` BETWEEN ? AND ?");
      $sql->execute([$startDate, $endDate]);
      $reportResultArray = $sql->fetchAll(PDO::FETCH_ASSOC);
      
      $totalInput = $db->prepare("
        SELECT 
        SUM(total) AS totalInput
       FROM 
        inputs
       WHERE 
         date BETWEEN ? AND ?
       ");

      $totalOutput = $db->prepare("
          SELECT 
            SUM(total) AS totalOutput
          FROM 
            outputs
          WHERE 
            date BETWEEN ? AND ?
        "); 
      
      $totalInput->execute([$startDate, $endDate]);
      $totalInput = $totalInput->fetch(PDO::FETCH_ASSOC)['totalInput'];

      $totalOutput->execute([$startDate, $endDate]);
      $totalOutput = $totalOutput->fetch(PDO::FETCH_ASSOC)['totalOutput'];

      $totalInputs = $totalInput - $totalOutput;
      ?>
    <?php if ($sql->rowCount() > 0) {?>
        <h2 class="p-3 text-center">
          <div class="badge bg-primary">
          إيراد  <?= $_POST['startDate']?> حتى <?= $_POST['endDate']?>
          </div>
        </h2>
        <div class="border position-absolute top-0 start-0 mt-4 mx-1 p-2">
          <?=number_format($totalInputs)?>
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
        <?php foreach ($reportResultArray as $reportResult) :?>
        <tr>
          <td class="border"><?=$reportResult['std_name']?></td>
          <td class="border"><?=number_format($reportResult['enroll_money'])?></td>
          <td class="border"><?=number_format($reportResult['study_money']) ?></td>
          <td class="border"><?=number_format($reportResult['offer']) ?></td>
          <td class="border"><?=number_format($reportResult['last_money']) ?></td>
          <td class="border"><?=number_format($reportResult['g1']) ?></td>
          <td class="border"><?=$reportResult['d1']?></td>
          <td class="border"><?=number_format($reportResult['g2']) ?></td>
          <td class="border"><?=$reportResult['d2']?></td>
          <td class="border"><?=number_format($reportResult['g3']) ?></td>
          <td class="border"><?=$reportResult['d3']?></td>
          <td class="border"><?=number_format($reportResult['g4']) ?></td>
          <td class="border"><?=$reportResult['d4']?></td>
          <td class="border"><?=number_format($reportResult['g5']) ?></td>
          <td class="border"><?=$reportResult['d5']?></td>
          <td class="border"><?=number_format($reportResult['g6']) ?></td>
          <td class="border"><?=$reportResult['d6']?></td>
          <td class="border"><?=number_format($reportResult['g7']) ?></td>
          <td class="border"><?=$reportResult['d7']?></td>
          <td class="border"><?=number_format($reportResult['total']) ?></td>
        </tr>
        <?php endforeach;
      } else {
        echo "<h1 class='text-center display-2 pt-5'>لاتوجد نتائج<h1>";
      }
    } else {
      header("HTTP/1.1 403");
      exit();
    }
    endif;
    ?>
    </tbody>
  </table>
</body>
</html>