<?php
  $pageTitle = "الإيرادات";
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

    // add date into date base
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $std_name = filter_var($_POST['std_name'], FILTER_SANITIZE_STRING);
      $stage = filter_var($_POST['stage'], FILTER_SANITIZE_STRING);
      $class = filter_var($_POST['class'], FILTER_SANITIZE_STRING);
      $parent = filter_var($_POST['parent'], FILTER_SANITIZE_STRING);
      $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
      $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
      $enroll_money = $_POST['enroll_money'];
      $study_money = $_POST['study_money'];
      $offer = $_POST['offer'];
      $last_money = $_POST['last_money'];
      $total = $_POST['total'];
      $g1 = $_POST['g1'];
      $d1 = $_POST['d1'];
      $g2 = $_POST['g2'];
      $d2 = $_POST['d2'];
      $g3 = $_POST['g3'];
      $d3 = $_POST['d3'];
      $g4 = $_POST['g4'];
      $d4 = $_POST['d4'];
      $g5 = $_POST['g5'];
      $d5 = $_POST['d5'];
      $g6 = $_POST['g6'];
      $d6 = $_POST['d6'];
      $g7 = $_POST['g7'];
      $d7 = $_POST['d7'];
      $pulled = $_POST['pulled'];
      $result = $_POST['result'];
      $date = $_POST['date'];
      $notes = $_POST['notes'];

      // Prepare the sql query
      $sql = $db->prepare(
        "INSERT INTO inputs 
          (std_name, stage, class, parent, phone, address, enroll_money, study_money, offer, last_money,  total, g1, d1, g2, d2, g3, d3, g4, d4, g5, d5, g6, d6, g7, d7, pulled, result, date, notes)
          VALUES (
            ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
          )
        ");

      $adding = $sql->execute([
        $std_name,
        $stage, 
        $class, 
        $parent, 
        $phone, 
        $address, 
        $enroll_money, 
        $study_money, 
        $offer, 
        $last_money, 
        $total, $g1, $d1, $g2, $d2, $g3, $d3, $g4, $d4, $g5, $d5, $g6, $d6, $g7, $d7, $pulled, $result, $date, $notes
      ]);
    }
    ?>
    <div class="main-page mt-4 mx-2">
        <?php addSuccess($adding)?>
      <h2 class="position-relative mb-5">الإيرادات 
        <i class="bi bi-cash-coin px-2"></i>
      </h2>
      <form method="post" class="w-100">
        <!-- student -->
        <h5 class="my-3">بيانات الطالب :</h5>
          <div class="row gap-2 bg-light py-4 px-2 rounded">
            <div class="col-lg-2 p-0 m-0">
              <input type="text" name="std_name" class="form-control" placeholder="إسم الطالب">
            </div>
            <div class="col-lg-1 p-0 m-0">
              <select name="stage" class="form-select">
                <option value="الروضة">الروضة</option>
                <option value="الإبتدائي">الإبتدائي</option>
                <option value="المتوسط">المتوسط</option>
                <option value="الثانوي">الثانوي</option>
              </select>
            </div>
            <div class="col-lg-1 p-0 m-0">
              <select name="class" class="form-select">
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
            <div class="col-lg-2 p-0 m-0">
              <input type="text" name="parent" class="form-control" placeholder="إسم ولي الأمر">
            </div>
            <div class="col-lg-2 p-0 m-0">
              <input type="number" name="phone" class="form-control" placeholder=" الهاتف">
            </div>
            <div class="col-lg-1 p-0 m-0">
              <input type="text" name="address" class="form-control" placeholder="السكن">
            </div>
            <div class="col-lg-2 p-0 m-0">
              <textarea  name="notes" rows="1" class="form-control" placeholder="ملاحظات"></textarea>
            </div>
          </div>
  
          <!-- enroll -->
          <h5 class="my-3">بيانات التسجيل :</h5>
          <div class="recording row gap-2 bg-light py-4 px-2 rounded">
            <div class="col-lg-2 p-0 m-0">
              <input type="number" name="enroll_money" class="form-control" placeholder="رسوم التسجيل">
            </div>
            <div class="col-lg-2 p-0 m-0">
              <input type="number" name="study_money" class="form-control" placeholder="رسوم الدراسة">
            </div>
            <div class="col-lg-2 p-0 m-0">
              <input type="number" name="offer" class="form-control" placeholder="التخفيض">
            </div>
            <div class="col-lg-2 p-0 m-0">
              <input type="number" name="last_money" class="form-control" placeholder="المتأخرات">
            </div>
            <div class="col-lg-3 p-0 m-0">
              <input type="number"  name="total" class="form-control" placeholder="الإجمالي" readonly>
            </div>
          </div>
  
          <!-- money -->
          <h5 class="my-3">الأقساط :</h5>
          <div class="money-g row gap-1 bg-light py-2 px-2 rounded">
            <div class="col-lg-2 p-0 m-0">
              <input type="number" name="g1" class="form-control my-2" placeholder="القسط 1">
              <input type="date" name="d1" class="form-control my-2" >
            </div>
            <div class="col-lg-2 p-0 m-0">
              <input type="number" name="g2" class="form-control my-2" placeholder="القسط 2">
              <input type="date" name="d2" class="form-control my-2" >
            </div>
            <div class="col-lg-2 p-0 m-0">
              <input type="number" name="g3" class="form-control my-2" placeholder="القسط 3">
              <input type="date" name="d3" class="form-control my-2" >
            </div>
            <div class="col-lg-1 p-0 m-0">
              <input type="number" name="g4" class="form-control my-2" placeholder="القسط 4">
              <input type="date" name="d4" class="form-control my-2" >
            </div>
            <div class="col-lg-1 p-0 m-0">
              <input type="number" name="g5" class="form-control my-2" placeholder="القسط 5">
              <input type="date" name="d5" class="form-control my-2" >
            </div>
            <div class="col-lg-1 p-0 m-0">
              <input type="number" name="g6" class="form-control my-2" placeholder="القسط 6">
              <input type="date" name="d6" class="form-control my-2" >
            </div>
            <div class="col-lg-1 p-0 m-0">
              <input type="number" name="g7" class="form-control my-2" placeholder="القسط 7">
              <input type="date" name="d7" class="form-control my-2">
            </div>
            <div class="col-lg-1 p-0 m-0">
              <input type="number" name="pulled"  class="form-control my-2" placeholder="المدفوع" readonly>
              <input type="number" name="result"  class="form-control my-2" placeholder="المتبقي" readonly>
            </div>
            <div class="col-lg-11 p-0 m-0 d-flex align-items-center gap-3">
              <h6><label for="date">التاريخ:</label></h6>
              <input name="date" id="date" class="form-control my-2" value="<?=date("d/m/Y");?>"  type="date">
            </div>
          </div>
          <!-- buttons -->
          <div class="row gap-2 mt-4">
            <button type="submit" class="col-lg-2 btn btn-success">إضافة</button>
            <button type="reset" class="col-lg-2 btn btn-danger">حذف</button>
          </div>
        </form>
    </div>
  </body>
</html>
    <script src="<?= $js?>inputs.js"></script>
  <?php endif;?>