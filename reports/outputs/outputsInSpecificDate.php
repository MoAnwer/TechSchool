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
      $sql = $db->prepare("SELECT * FROM outputs WHERE `date` BETWEEN ? AND ?");
      $sql->execute([$startDate, $endDate]);
      $reportResultArray = $sql->fetchAll(PDO::FETCH_ASSOC);
      
      // total Sum
      $totalSum = $db->prepare("SELECT SUM(total) AS totalSum FROM outputs WHERE `date` BETWEEN ? AND ?");
      $totalSum->execute([$startDate, $endDate]);
      $totalSum = $totalSum->fetch(PDO::FETCH_ASSOC);

      if ($sql->rowCount() > 0) {?>
        <h2 class="p-3 text-center">
          <div class="badge bg-danger">
          منصرف  <?= $_POST['startDate']?> حتى <?= $_POST['endDate']?>
          </div>
        </h2> 
        <div class="border position-absolute top-0 start-0 mt-4 mx-1 p-2">
          <?=number_format($totalSum['totalSum'])?>
        </div>
      <table class="table">
        <thead>
          <thead>
            <th class="bg-light border">التاريخ</th>
            <th class="bg-light border">كهرباء و ماء</th>
            <th class="bg-light border">إيجارات</th>
            <th class="bg-light border">ادوات مكتبية</th>
            <th class="bg-light border">قماش</th>
            <th class="bg-light border">تفصيل</th>
            <th class="bg-light border">رسوم إدارية</th>
            <th class="bg-light border">تأمين إجتماعي</th>
            <th class="bg-light border">مشتروات</th>
            <th class="bg-light border"> تصوير و طباعة </th>
            <th class="bg-light border">تكريم و إحتفالات</th>
            <th class="bg-light border">صيانة</th>
            <th class="bg-light border">ملاحظات</th>
            <th class="bg-light border">بند مدير</th>
            <th class="bg-light border">إجمالي</th>
          </thead>
        </thead>
      <tbody>
        <?php foreach ($reportResultArray as $reportResult) :?>
        <tr>
          <td class="border"><?=$reportResult['date']?></td>
          <td class="border"><?=number_format($reportResult['electric_water'])?></td>
          <td class="border"><?=number_format($reportResult['home_money']) ?></td>
          <td class="border"><?=number_format($reportResult['desk_tools']) ?></td>
          <td class="border"><?=number_format($reportResult['gomash']) ?></td>
          <td class="border"><?=number_format($reportResult['tafseel']) ?></td>
          <td class="border"><?=number_format($reportResult['mangal_money']) ?></td>
          <td class="border"><?=number_format($reportResult['social_protection']) ?></td>
          <td class="border"><?=number_format($reportResult['buy']) ?></td>
          <td class="border"><?=number_format($reportResult['print_scan']) ?></td>
          <td class="border"><?=number_format($reportResult['events']) ?></td>
          <td class="border"><?=number_format($reportResult['maintains']) ?></td>
          <td class="border"><?=$reportResult['notes']?></td>
          <td class="border"><?=number_format($reportResult['manger_rule']) ?></td>
          <td class="border"><?=number_format($reportResult['total'])?></td>
        </tr>
        <?php endforeach;
      } else {
        echo "<h1 class='text-center display-2 pt-5'>لاتوجد نتائج<h1>";
      }
    } else {
      Auth::forbidden();
    }
    endif;
    ?>
    </tbody>
  </table>
</body>
</html>