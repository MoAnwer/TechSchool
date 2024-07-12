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

    if (isset($_POST['date'])) {

      $date;
      $date = $_POST['date'];

      $sql = $db->prepare("SELECT * FROM outputs WHERE `date` = ?");
      $sql->execute([$date]);
      $outputs = $sql->fetch(PDO::FETCH_ASSOC);
      
      if ($sql->rowCount() > 0) {?>
        <h2 class="p-3 text-center">
          <div class="badge bg-danger">
          منصرف يوم <?= $date?>
          </div>
        </h2> 
        <table class="table">
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
        <tbody>
        <tr>
          <td class="border"><?=$outputs['date']?></td>
          <td class="border"><?=number_format($outputs['electric_water'])?></td>
          <td class="border"><?=number_format($outputs['home_money']) ?></td>
          <td class="border"><?=number_format($outputs['desk_tools']) ?></td>
          <td class="border"><?=number_format($outputs['gomash']) ?></td>
          <td class="border"><?=number_format($outputs['tafseel']) ?></td>
          <td class="border"><?=number_format($outputs['mangal_money']) ?></td>
          <td class="border"><?=number_format($outputs['social_protection']) ?></td>
          <td class="border"><?=number_format($outputs['buy']) ?></td>
          <td class="border"><?=number_format($outputs['print_scan']) ?></td>
          <td class="border"><?=number_format($outputs['events']) ?></td>
          <td class="border"><?=number_format($outputs['maintains']) ?></td>
          <td class="border"><?=$outputs['notes']?></td>
          <td class="border"><?=number_format($outputs['manger_rule']) ?></td>
          <td class="border"><?=number_format($outputs['total'])?></td>
        </tr>
        
    <?php 
    } else {
      echo "<h1 class='text-center display-2 mt-5'>لاتوجد نتائج</h1>";
    }
  } else {
    Auth::forbidden();
  }
  endif;?>
  </tbody>
</table>
</body>
</html>