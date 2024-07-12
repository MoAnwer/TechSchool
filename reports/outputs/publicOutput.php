<?php
  $pageTitle = "منصرف عام";
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

    $sql = $db->query("SELECT * FROM outputs");
    $outputs = $sql->fetchAll(PDO::FETCH_ASSOC);

    // total Sum
    $totalSum = $db->query("SELECT SUM(total) AS totalSum FROM outputs");
    $totalSum = $totalSum->fetch(PDO::FETCH_ASSOC)['totalSum'];

    ?>
      <h2 class="p-3 text-center">
        <div class="badge bg-danger">
          <?=$pageTitle?>
        </div>
      </h2>
      <div class="border position-absolute top-0 start-0 mt-4 mx-1 p-2">
          <?=number_format($totalSum)?>
      </div>
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
      <?php 

      if ($outputs) : foreach ($outputs as $output) :?>
        <tr>
          <td class="border"><?=$output['date']?></td>
          <td class="border"><?=number_format($output['electric_water'])?></td>
          <td class="border"><?=number_format($output['home_money']) ?></td>
          <td class="border"><?=number_format($output['desk_tools']) ?></td>
          <td class="border"><?=number_format($output['gomash']) ?></td>
          <td class="border"><?=number_format($output['tafseel']) ?></td>
          <td class="border"><?=number_format($output['mangal_money']) ?></td>
          <td class="border"><?=number_format($output['social_protection']) ?></td>
          <td class="border"><?=number_format($output['buy']) ?></td>
          <td class="border"><?=number_format($output['print_scan']) ?></td>
          <td class="border"><?=number_format($output['events']) ?></td>
          <td class="border"><?=number_format($output['maintains']) ?></td>
          <td class="border"><?=$output['notes']?></td>
          <td class="border"><?=number_format($output['manger_rule']) ?></td>
          <td class="border"><?=number_format($output['total'])?></td>
        </tr>
        <?php endforeach;
      endif; 
    endif;
    ?>
    </table>
    </tbody>
  </body>
</html>