<nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block sidebar collapse ms-2 navbar">
  <div class="position-sticky pt-3">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="dropdown nav-item ms-3 mb-2">
        <a class="dropdown-toggle text-dark" href="index.php?action=sanpham&act=sanpham" role="button" id="dropdownMenuLink"
          data-bs-toggle="dropdown" aria-expanded="false">
          Quản lý sản phẩm
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="index.php?action=sanpham&act=sanpham">Quản lý sản phẩm</a></li>
          <li><a class="dropdown-item" href="index.php?action=sanpham&act=danhmuc">Quản lý danh mục sản phẩm</a></li>
          <li><a class="dropdown-item" href="index.php?action=sanpham&act=loaisp">Quản lý loại sản phẩm</a></li>
          <li><a class="dropdown-item" href="index.php?action=sanpham&act=mausac">Quản lý màu sắc</a></li>
          <li><a class="dropdown-item" href="index.php?action=sanpham&act=size">Quản lý size sản phẩm</a></li>
        </ul>
      </li>
      <li class="dropdown nav-item ms-3 m-1">
        <a class="dropdown-toggle text-dark" href="" role="button" id="dropdownNews"
          data-bs-toggle="dropdown" aria-expanded="false">
          Quản Lý Tin Tức
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownNews">
          <li><a class="dropdown-item" href="index.php?action=manage_news&act=manage_news">Quản Lý Tin Tức</a></li>
          <li><a class="dropdown-item" href="index.php?action=manage_danhmuc">Quản lý Danh Mục Tin Tức</a></li>
        </ul>
      </li>
      <!-- <li>
        <a href="index.php?action=comment&act=comment" class="nav-link link-dark">
          Quản Lý Bình Luận
        </a>
      </li> -->
      <li>
        <a href="index.php?action=hoadon&act=hoadon" class="nav-link link-dark">
          Quản Lý Hóa Đơn
        </a>
      </li>
      <li>
        <a href="index.php?action=client&act=get_client" class="nav-link link-dark">
          Quản Lý Khách Hàng
        </a>
      </li>
      <li>
        <a href="index.php?action=contact&act=contact" class="nav-link link-dark">
          Quản Lý Liên Hệ
        </a>
      </li>
      <?php
      // if(isset($id)){
      //   // nếu tồn tại id thì trả về kết quả của role trong mảng
      //  $rol = new Admin();
      //  $results = $rol->get_one_role($id);
      //  echo $id;
      //  exit();
      //  }else {

      //  } 
      // lấy ra cái role rồi đk
        // echo $_SESSION['role'];
      if(isset($_SESSION['email_nv']) && isset($_SESSION['role']) && $_SESSION['role']==1) :
      ?>
        <li>
        <a href="index.php?action=login&act=manage_employee" class="nav-link link-dark">
          Quản Lý Nhân Viên
        </a>
      </li>
      <?php
    else: 
      
      ?>
      <?php
      //đóng if
      endif;
      ?>

    </ul>
  </div>
</nav>