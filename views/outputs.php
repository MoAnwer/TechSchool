<?php

  $pageTitle = "المنصرفات";

  include "init.php";
  include $funcs . "Auth.php";

  if (Auth::isLog()) :
  // include main components
  include $funcs . "getTitle.php";
  include $tmp . "header.php";
  include $tmp . "sidebar.php";
  include $funcs . "db.php";
  include $funcs . "Validator.php";
  include $funcs . "addSuccess.php";
  // adding query result
  static $adding;


  if ($_SERVER['REQUEST_METHOD'] == "POST") :
    $date = $_POST['date'];
    $electric_water = $_POST['electric_water'];
    $desk_tools = $_POST['desk_tools'];
    $home_money = $_POST['home_money'];
    $mangal_money = $_POST['mangal_money'];
    $social_protection = $_POST['social_protection'];
    $buy = $_POST['buy'];
    $print_scan = $_POST['print_scan'];
    $maintains = $_POST['maintains'];
    $notes = $_POST['notes'];
    $gomash = $_POST['gomash'];
    $tafseel = $_POST['tafseel'];
    $events = $_POST['events'];
    $manger_rule = $_POST['manger_rule'];
    $total = $_POST['total'];

    $sql = $db->prepare("INSERT INTO outputs 
      (date, electric_water, home_money, desk_tools, gomash, tafseel, mangal_money, social_protection, buy, print_scan, events, maintains, notes, manger_rule, total)
      VALUES (
        ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
      )
    ");

      $adding = $sql->execute([
        $date,
        $electric_water,
        $home_money,
        $desk_tools,
        $gomash,
        $tafseel,
        $mangal_money,
        $social_protection,
        $buy,
        $print_scan,
        $events,
        $maintains,
        $notes,
        $manger_rule,
        $total
      ]);

  endif;
?>
<div class="main-page mt-4 mx-2">
  <?php addSuccess($adding)?>
  <h2 class="position-relative mb-5">
    المنصرفات 
    <i class="bi bi-cash px-2"></i>
  </h2>
  <form method="post" class="w-100">
  <div class="row rounded align-items-center">
    <label for="date" class="col-lg-1">التاريخ :</label>
    <input type="date" id="date" name="date" class="form-control w-25" required>
  </div>
  <hr>
  <div class="container">
      <div class="row gap-2 bg-light py-4 px-2 rounded">
        <div class="col-lg-2 p-0 m-0">
          <input type="number" name="electric_water" class="form-control" placeholder="كهرباء وماء" required>
        </div>
        <div class="col-lg-2 p-0 m-0">
          <input type="number" name="desk_tools" class="form-control" placeholder="ادوات مكتبية" required>
        </div>
        <div class="col-lg-2 p-0 m-0">
          <input type="number" name="home_money" class="form-control" placeholder="ايجارات"  required>
        </div>
        <div class="col-lg-2 p-0 m-0">
          <input type="number" name="mangal_money" class="form-control" placeholder="رسوم ادارية" required>
        </div>
        <div class="col-lg-2 p-0 m-0">
          <input type="number"  name="social_protection" class="form-control" placeholder="تأمين اجتماعي" required>
        </div>
        <div class="col-lg-2 p-0 m-0">
          <input type="number"  name="buy" class="form-control" placeholder="مشتروات"  required>
        </div>
        <div class="col-lg-2 p-0 m-0">
          <input type="number"  name="print_scan" class="form-control" placeholder="تصوير وطباعة" required>
        </div>
        <div class="col-lg-2 p-0 m-0">
          <input type="number"  name="maintains" class="form-control" placeholder="صيانة" required>
        </div>
        <div class="col-lg-4 p-0 m-0">
          <textarea  name="notes" rows="1" class="form-control" placeholder="ملاحظات"  required></textarea>
        </div>
      </div>

      <h5 class="my-4">الزي المدرسي :</h5>
      <div class="row gap-1 bg-light py-2 px-2 rounded">
          <div class="col-lg-2 p-0 m-0">
            <input type="number" name="gomash" class="form-control my-2" placeholder="القماش">
          </div>
          <div class="col-lg-2 p-0 m-0">
            <input type="number" name="tafseel" class="form-control my-2" placeholder="التفصيل">
          </div>
          <div class="col-lg-2 p-0 m-0">
            <input type="number" name="events" class="form-control my-2" placeholder="التكريم والاحتفالات">
          </div>
          <div class="col-lg-2 p-0 m-0">
            <input type="number" name="manger_rule" class="form-control my-2" placeholder="بند مدير">
          </div>
      </div>

      </div>
      <!-- buttons -->
      <div class="px-3 row align-items-end justify-content-end mt-4">
        <input type="number" name="total" class="form-control w-25" placeholder="الاجمالي" readonly>
      </div>
      <div class="row gap-2 mt-4 px-3">
        <button type="submit" class="col-lg-2 btn btn-success">إضافة</button>
        <button type="reset" class="col-lg-2 btn btn-danger">حذف</button>
      </div>
    </div>
  </form>
</body>
</html>
<script src="<?= $js?>outputs.js"></script>
<?php endif;?>