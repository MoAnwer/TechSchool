<?php
  $pageTitle = "لوحة التحكم";
  include "init.php";
  include $funcs . "Auth.php";
  if (Auth::isAdmin()) :
    // include main components and files
    include $funcs . "getTitle.php";
    include $funcs . "monthName.php";
    include $tmp . "header.php";
    include $tmp . "sidebar.php";
    include $funcs . "db.php";

    // Total input
    $totalInputQuery = $db->query("
      SELECT 
          SUM(total) AS totalInput 
      FROM 
          inputs 
      WHERE 
          MONTH(date) = MONTH(CURRENT_DATE()) 
      AND 
          YEAR(date) = YEAR(CURRENT_DATE())
    ");

    $totalOfInput = $totalInputQuery->fetch(PDO::FETCH_ASSOC)['totalInput'];

    // Total output
    $totalOutputQuery = $db->query("
      SELECT 
        SUM(total) AS totalOutput 
      FROM 
        outputs 
      WHERE 
        MONTH(date) = MONTH(CURRENT_DATE()) 
      AND 
        YEAR(date) = YEAR(CURRENT_DATE())
    ");

    $totalOfOutput = $totalOutputQuery->fetch(PDO::FETCH_ASSOC)['totalOutput'];

    // Totally Of Inputs = total inputs - total outputs
    $totalInputs = $totalOfInput - $totalOfOutput;

    // Student Count
    $stdCountQuery = $db->query("
      SELECT 
        COUNT(*) AS stdCount 
      FROM 
        inputs 
      WHERE 
        MONTH(`date`) = MONTH(CURRENT_DATE()) 
      AND 
        YEAR(`date`) = YEAR(CURRENT_DATE())
    ");

    $stdCount = $stdCountQuery->fetch(PDO::FETCH_ASSOC)['stdCount'];

  ?>
  <div class="main-page mt-4 mx-2">
    <h2 class="position-relative mb-5">لوحة التحكم 
      <i class="bi bi-database px-2"></i>
    </h2>
    <h3 class="mb-4">إحصائيات شهر <?= $monthName?> :</h3>
    <div class="container row gap-1">
      <div class="bg-success bg-opacity-75 col-lg-4 card text-center text-light p-0">
        <h4 class="card-header py-3">
          <i class="bi bi-money-bill-wave mx-1"></i>
          <span>الإيرادات الكلية</span>
        </h4>
        <div class="card-body text-center">
          <h1 class="mt-4"><?=number_format($totalInputs)?></h1>
          <span class="fs-4">جنيه</span>
        </div>
      </div>
      <div class="bg-warning col-lg-3 text-center card p-0">
        <h4 class="card-header py-3">
          <i class="bi bi-user-circle mx-1"></i>
          <span> الطلاب الجدد</span>
        </h4>
        <div class="card-body text-center">
          <h1 class="mt-4"><?=number_format($stdCount)?></h1>
          <span class="fs-4">طالب</span>
        </div>
      </div>
      <div class="bg-danger col-lg-4 card p-0 text-center text-light">
        <h5 class="card-header py-3">
          <i class="bi bi-money-bill-transfer"></i>
          <span>مجموع المنصرفات</span>
        </h5>
        <div class="card-body text-center">
          <h1 class="mt-4"><?=number_format($totalOfOutput)?></h1>
          <span class="fs-4">جنيه</span>
        </div>
      </div>
      <h3 class="my-4">المستخدمين :</h3>
    
      <div class="row gap-2 ">
        <a href="<?=$admin?>users/usersList" class="card bg-warning text-decoration-none border border-secondary text-dark  col-lg-5 text-center py-5">
          <i class="bi bi-people fs-1 mb-2"></i>
          <h4>المستخدمين</h4>
        </a>
        <a href="<?=$admin?>users/addUser" class="card bg-success bg-opacity-75 text-decoration-none border border-light text-light  col-lg-6 text-center py-5">
          <i class="bi bi-person-plus-fill fs-1 mb-2"></i>
          <h4>إضافة مستخدم</h4>
        </a>
      </div>
    </div>
  </div>
</body>
</html><?php endif;