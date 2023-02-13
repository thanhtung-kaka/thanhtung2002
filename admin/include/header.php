<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center" href="#">ADMIN</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
   
    <div>
          <?php
 
          ?>
            <div class="dropdown text-capitalize me-5">
              <button style="color:blue;" class="btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #053da3;">
                <img width="35px" src="<?php echo $_SESSION['avatar_admin'] ;?>" height="35px" style="border-radius:45%;">
              </button>
               <?php
               echo $_SESSION['hoten_nv']; 
              //  echo $_SESSION['id'];
               $id=$_SESSION['id_admin'];
              ?> 
              <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1" >
                <li><a class="dropdown-item " href="index.php?action=login&act=setting_profile&id=<?php echo $id ;?>"  title="xem thông tin của tài khoản">setting profile</a></li>
                <li><a class="dropdown-item" href="index.php?action=login&act=logout"  title="Đăng xuất tài khoản của bạn">Đăng xuất</a></li>
              </ul>
            </div>
          <?php

          ?>
          <?php
          ?>
        </div>
</header>

    
