<?php
  $pageTitle = "التقارير";
  include "init.php";
  include $funcs . "Auth.php";
  if (Auth::isLog()) :
    // include main components
    include $funcs . "getTitle.php";
    include $tmp . "header.php";
    include $tmp . "sidebar.php";

    ?>
    <div class="main-page mt-4 mx-2">
      <h2 class="position-relative mb-5">التقارير
        <i class="bi bi-journal-bookmark-fill px-2"></i>
      </h2>
      <div class="container row gap-3">
        <div class="card h-100 border-0 col-lg-2 px-0">
          <h5 class="card-header border text-center">التلاميذ</h5>
          <div class="list-group rounded-0">
            <a href="<?=$reports?>students/students" class="list-group-item">التلاميذ</a>
            <a href="<?=$reports?>students/baby" class="list-group-item">الروضة</a>
            <a href="<?=$reports?>students/base" class="list-group-item">الإبتدائي</a>
            <a href="<?=$reports?>students/middle" class="list-group-item">المتوسط</a>
            <a href="<?=$reports?>students/secondary" class="list-group-item">الثانوي</a>
            <button type="button" data-toggle="modal" data-target="#searchModel" class="list-group-item text-end text-success rounded-bottom">
              <i class="bi bi-search"></i>
              بحث
            </button>
          </div>

            <!-- Search Modal -->
            <div class="modal fade mt-5" id="searchModel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
              <div class="modal-dialog mt-5" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                      </button>
                        <h5 class="modal-title text-center">البحث</h5>
                    </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <form method="post" action="<?= $reports?>students/search">
                        <h5><label for="search">ابحث عن :</label></h5>
                        <input type="text" name="search" id="search" class="form-control mt-4"/>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <input type="submit" class="btn btn-success" value="بحث">
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Search Modal -->
        </div>
        <div class="card h-100 border-0 col-lg-3 px-0">
          <h5 class="card-header border text-center">الإيرادات</h5>
            <div class="list-group  rounded-0">
              <a href="<?=$reports?>inputs/publicInput" class="list-group-item">إيراد عام</a>
              <a type="button" data-toggle="modal" data-target="#inputModel" class="list-group-item" >إيراد يوم محدد</a>
              <a type="button" data-toggle="modal" data-target="#inputsDateModel" class="list-group-item">إيراد فترة محددة</a>
              <a href="<?=$reports?>inputs/babyInput" class="list-group-item">إيراد الروضة</a>
              <a href="<?=$reports?>inputs/baseInput" class="list-group-item">إيراد الإبتدائي</a>
              <a href="<?=$reports?>inputs/middleInput" class="list-group-item">إيراد المتوسط</a>
              <a href="<?=$reports?>inputs/secondaryInput" class="list-group-item">إيراد الثانوي</a>
              <a type="button" data-toggle="modal" data-target="#lastMoney" class="list-group-item rounded-bottom">مطالبة بالإسم</a>
          </div>

          <!-- Input Day Modal -->
          <div class="modal fade mt-5" id="inputModel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog mt-5" role="document">
              <div class="modal-content ">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    </button>
                      <h5 class="modal-title text-center">إيراد يوم محدد</h5>
                  </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <form method="post" action="<?= $reports?>inputs/inputDay">
                      <h5><label for="day">ادخل اليوم :</label></h5>
                      <input type="date" name="date" id="day" class="form-control mt-4"/>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                  <input type="submit" class="btn btn-success" value="بحث">
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Input Day Modal -->

            <!-- Inputs in specific date Modal -->
            <div class="modal fade mt-5" id="inputsDateModel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
              <div class="modal-dialog mt-5" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                      </button>
                        <h5 class="modal-title text-center">إيراد فترة محدد</h5>
                    </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <form method="post" action="<?= $reports?>inputs/inputsInSpecificDate">
                        <h5><label for="startDate">ادخل تاريخ البداية :</label></h5>
                        <input required type="date" name="startDate" id="startDate" class="form-control my-4"/>
                        <h5><label for="endDate">ادخل تاريخ النهاية :</label></h5>
                        <input required type="date" name="endDate" id="endDate" class="form-control mt-4"/>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <input type="submit" class="btn btn-success" value="بحث">
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Input in specific date Modal -->

            
            <!-- Last Money Modal -->
            <div class="modal fade mt-5" id="lastMoney" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
              <div class="modal-dialog mt-5" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                      </button>
                        <h5 class="modal-title text-center">مطالبة بمتأخرات مالية</h5>
                    </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <form method="post" action="<?= $reports?>inputs/lastMoney">
                        <h5><label for="last_money"> إسم الطالب :</label></h5>
                      <input type="text" name="last_money" id="last_money" class="form-control mt-4"/>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <input type="submit" class="btn btn-success" value="بحث">
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Last Money Modal -->
        </div>
        <div class="card h-100 border-0 col-lg-3 px-0">
          <h5 class="card-header border text-center">المنصرفات</h5>
          <div class="list-group rounded-0">
            <a href="<?=$reports?>outputs/publicOutput" class="list-group-item">منصرف عام</a>
            <a type="button" data-toggle="modal" data-target="#OutputModel" class="list-group-item">منصرف يوم محدد</a>
            <a type="button" data-toggle="modal" data-target="#OutputDateModel" class="list-group-item rounded-bottom">منصرف فترة محددة</a>
          </div>
          <!-- Output Day Modal -->
            <div class="modal fade mt-5" id="OutputModel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
              <div class="modal-dialog mt-5" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                      </button>
                        <h5 class="modal-title">منصرف يوم محدد</h5>
                    </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <form method="post" action="<?= $reports?>outputs/outputDay">
                        <h5><label for="outputDay">ادخل اليوم :</label></h5>
                        <input type="date" name="date" id="outputDay" class="form-control mt-4"/>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <input type="submit" class="btn btn-success" value="بحث">
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Output Day Modal -->

            <!-- Output in specific date Modal -->
            <div class="modal fade mt-5" id="OutputDateModel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
              <div class="modal-dialog mt-5" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                      </button>
                        <h5 class="modal-title text-center">منصرف فترة محدد</h5>
                    </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <form method="post" action="<?= $reports?>outputs/outputsInSpecificDate">
                        <h5><label for="outputStartDate">ادخل تاريخ البداية :</label></h5>
                        <input required type="date" name="startDate" id="outputStartDate" class="form-control my-4"/>
                        <h5><label for="outputEndDate">ادخل تاريخ النهاية :</label></h5>
                        <input required type="date" name="endDate" id="outputEndDate" class="form-control mt-4"/>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <input type="submit" class="btn btn-success" value="بحث">
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Output in specific date Modal -->
        </div>
        <div class="card border-0 h-100 col-lg-3 px-0">
          <h5 class="card-header border text-center">الإيصالات</h5>
          <div class="container py-3 border rounded-bottom">
            <form action="<?=$reports?>money/money" method="post">
              <h6><label for="studentName">إسم الطالب (رباعي) :</label></h6>
              <input type="text" name="studentName" id="studentName" class="form-control" required/>
              <h6 class="mt-2"><label for="gNum"> القسط رقم :</label></h6>
              <select name="moneyNum" id='gNum' class="form-select">
                <option value="g1">القسط الأول</option>
                <option value="g2">القسط الثاني</option>
                <option value="g3">القسط الثالث</option>
                <option value="g4">القسط الرابع</option>
                <option value="g5">القسط الخامس</option>
                <option value="g6">القسط السادس</option>
                <option value="g7">القسط السابع</option>
              </select>
              <button type="submit" class="btn btn-success mt-3 w-100">بحث</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<?php endif;?>