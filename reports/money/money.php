<?php
  $pageTitle = "إيصالات";
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
    if (isset($_POST['studentName']) && !empty($_POST['studentName'])) {

      $studentName = filter_var(trim($_POST['studentName']), FILTER_SANITIZE_STRING);
      $moneyNum = $_POST['moneyNum'];

      try {
        $sql = $db->prepare(
          "SELECT 
            std_name, 
            g1, 
            g2, 
            g3, 
            g4, 
            g5, 
            g6, 
            g7, 
            CURDATE() AS date
          FROM 
            inputs 
          WHERE 
            `std_name` = :name 
        ");
        $sql->execute([":name" => $studentName]);
        $studentDate = $sql->fetchAll(PDO::FETCH_ASSOC);

      } catch (PDOException $e) {

        echo $e->getMassage();
      }

      // The number of money
      $gNumber = $moneyNum[1];
      
      if ($sql->rowCount() <= 0) {
        echo "
            <h1 class='display-1 text-center pt-5'>🤔</h1>
            <h4 class='display-3 text-center'>لايوجد طالب بهذا الإسم</h4>
          ";
      } else {
        foreach ($studentDate as $student) :?>
        <div class="container text-center vh-100 p-4">
          <header class="mb-5">
            <span>بسم الله الرحمن الرحيم</span>
            <h1 class="my-3">مؤسسة المدرسة الإلكترونية</h1>
            <h5>إستلام نقدية</h5>
          </header>

          <span class="studentDate d-flex justify-content-between mb-3">
            <p>السيد ولي أمر التلميذ/ة : <b><?=$student['std_name']?></b></p>
            <p><?=$student['date']?></p>
          </span>

          <table class="table border ">
            <thead>
              <tr>
                <th class="border">المبلغ</th>
                <th>البيان</th>
              </tr>
            </thead>
            <tbody class="border">
              <tr class="border p-5">
                <td class="border p-5">
                  <h5><?=number_format($student["$moneyNum"])?> جنيه</h5>
                </td>
                <td class="border p-5">
                  <h5>عبارة عن رسوم دراسية (القسط <?=$gNumber?>)</h5>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="money-write mt-5 d-flex justify-content-between">
            <p>
              المبلغ كتابة : ..............................................................................................
            </p>
            توقيع الحسابات : ........................................
          </div>
        </div>
      <?php endforeach;
      }
    } else {
      Auth::forbidden();
    }
    endif;?>
    </body>
</html>