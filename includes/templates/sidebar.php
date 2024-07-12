<aside class="sidebar bg-light py-3 ">
  <nav class="links mt-4">
  <div class="logo mb-5 p-0">
    <a href="../docs/tech_school.pdf">
      <img src="<?= $imgs?>tech_school.png" width="120%">
    </a>
    <hr>
  </div>
    <ul class="list-group px-3 gap-1">
      <?php if(isset($_SESSION['admin'])) :?>
        <li class="list-group-item border rounded px-4"><a href="dashboard"> 
        <i class="bi bi-database px-2"></i> لوحة التحكم</a></li>
        <?php endif;?>
      <li class="list-group-item border rounded px-4"><a href="inputs"> 
        <i class="bi bi-cash-coin px-2"></i> الإيرادات</a>
      </li>
      <li class="list-group-item border rounded px-4"><a href="outputs"> 
        <i class="bi bi-cash px-2"></i> المنصرفات</a>
      </li>
      <li class="list-group-item border rounded px-4"><a href="reports"> 
        <i class="bi bi-journal-bookmark-fill px-2"></i> تقارير</a>
      </li>
      <li class="list-group-item border rounded px-4"><a href="../profile/Details"> 
        <i class="bi bi-person-circle px-2"></i><?=$_SESSION['username']?></a>
      </li>
    </ul>
  </nav>
  <div class="logout">
    <hr>
    <a href="<?= $funcs . "logout"?>" class="btn btn-danger py-2 w-75 mx-4">خروج</a>
  </div>
</aside>