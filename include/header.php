<div id="header">
  <div id="menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php" title="Logo cửa hàng">
          <img src="assets/images/logo.png" id="logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php" title="trang chủ cửa hàng">TRANG CHỦ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=sanpham&act=sanpham" title="tất cả sản phẩm">SẢN PHẨM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=news&act=news" title="tất cả tin tức mới nhất">TIN TỨC</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=contact" title="liên hệ ngay với chúng tôi">LIÊN HỆ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=home&act=introduce">GIỚI THIỆU</a>
            </li>
          </ul>
        </div>
        <div class="form-search">
          <div class="container">
            <div class="relative">
              <form action="index.php?action=home&act=timkiem" method="post" name="form">
                <div class="search input-group">
                  <select name="table" id="search_option">
                    <option value="sanpham">Sản phẩm</option>
                    
                    <option value="tintuc">Tin tức</option>
                  </select>
                  
                  <input class="form-control" type="search" placeholder="Search" name="searchQuery" aria-label="Search">
                  <button class="btn btn-search" type="submit" id="btn_search_option">
                    <i class="fa fa-search"></i>
                  </button>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
        
        <!-- Modal -->
        <div class="btn-cart" onclick="window.location='index.php?action=cart&act=cart'">
          <i class='fa fa-shopping-cart'></i>
          <span id="quantity_cart"><?php if(isset($_SESSION['cart'])){echo count($_SESSION['cart']);}
                                          else{echo '0';}?></span>
        </div>
        <div>
        
          <?php
          if (isset($id)) {
            // nếu tồn tại id thì trả về kết quả của status trong mảng
            $sta = new User();
            $results = $sta->get_one_status($id);
          } else {
            // ngược lại
            //  echo '<script>alert ("Tài khoản đã bị vô hiệu hóa !");</script>' ;
          }
          if (isset($_SESSION['id'])) :
            $id = $_SESSION['id'];
            $avatar = $_SESSION['avatar'];
          ?>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #053da3;">
                <img width="35px" height="35px" style="border-radius:45%;" src="<?php if (isset($avatar)) {
                                                                                  echo $avatar;
                                                                                } else {
                                                                                  echo "../assets/images/avatar_img/no-avatar.png";
                                                                                } ?>">
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="index.php?action=login&act=profile&id=<?php echo $id; ?>" title="xem thông tin của tài khoản">Profile</a></li>
                <li><a class="dropdown-item" href="index.php?action=login&act=log_out" title="Đăng xuất tài khoản của bạn">Đăng xuất</a></li>
              </ul>
            </div>
          <?php
          else :
            echo '<div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #053da3;">
              <i class="fas fa-user-circle"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="index.php?action=login" title=""><i class="fa fa-unlock-alt"> Đăng nhập </i></a></li>
                <li> <a class="dropdown-item" href="index.php?action=register" title=""><i class="fa fa-user-plus"> Đăng ký</i> </a></li>
              </ul>
            </div>';
          ?>
          <?php
          endif;
          ?>
        </div>
      </div>
    </nav>
  </div>
</div>
<style>
  /* Nut chat messenger */

#myBtn2 {
	position: fixed;
	bottom: 10px;
	right: 10px;
	z-index: 99;
	border: none;
	outline: none;
	color: white;
	cursor: pointer;
	border-radius: 30px;
	background-color: #00cc00;
	width: 60px;
	height: 60px;
	padding: 10px;
	opacity: 0.9;
}

#myBtn2:hover {
	background-color: #555;
}
</style>