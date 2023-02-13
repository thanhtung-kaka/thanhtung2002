<!-- văn 07/07 -->
<?php 
   
           if(isset($_GET['id']))
           {
               $edit= new Admin();
               $result =$edit->Get_one_employee($_GET['id']);
               $id=$_GET['id'];
               $hoten_nv=$result['hoten_nv'];
               $ngay_sinh=$result['ngay_sinh'];
               $gioi_tinh_nv=$result['gioi_tinh_nv'];
               $sdt_nv=$result['sdt_nv'];
               $email_nv=$result['email_nv'];
               $dia_chi_nv=$result['dia_chi_nv'];
               $avatar=$result['avatar'];
               $pass_dn=$result['pass_dn'];
               $role=$result['role'];
               $status=$result['status'];
               $ngay_tao=$result['ngay_tao'];
               $statusAcc=$result['statusAcc'];
              //  echo $statusAcc;
           }
           if(isset($id))
{
    $staAcc= new Admin();
    $results=$staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
}
if($results['statusAcc']!=0):
        ?>

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.php?action=sanpham&act=sanpham">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?action=login&act=manage_employee">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    <form class="form" method="POST">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4" style="height: 100%;">
          <div class="card-body text-center" style="margin-top: 59px;">

            <label for="file"><img src="<?php echo $avatar; ?>" alt="" title="click change"  id="image_url" class="rounded-circle img-fluid" style="width: 150px; height: 160px;"></label>
            <input type="text" id="link_url" value="<?php echo $avatar ?>" hidden name="link_url">
            <input type="file" id="file" hidden accept=".png,.jpeg,.jpg,.gif" name="avatar">
            <br>
            <br>
            <div id="upload_img" class="btn btn-success mb-1" title="save avatar">Lưu avatar <i class="fas fa-download"></i></div>
            <h5 class="my-3"><?php echo $hoten_nv; ?></h5>
            <h6 style="color: red;"><?php if ($gioi_tinh_nv=='nữ') {
                echo '<i class="fas fa-venus"></i> Nữ';
              } elseif ($gioi_tinh_nv=='nam') {
                echo '<i class="fas fa-venus-mars"></i> Nam';
              } else {
                echo ' <i class="fas fa-ankh"></i> Khác';
              }?></h6>
            <p class="text-muted mb-1 text-uppercase" ><?php if($role==1){echo "Quản trị viên";}else echo "Nhân viên cửa hàng";?></p>
            <p class="text-muted mb-4"></p>

          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h5 class="mb-0" style="font-size:17px ; font-weight: bold;"><i class="fas fa-user-graduate"></i> Họ và tên :</h5>
              </div>
              <div class="col-sm-9">
                <input class="w3-input w3-hover-dark text-muted mb-0" id="hoten_nv" name="hoten_nv" type="text" value="<?php echo $hoten_nv  ?>">  
                
              </div>
             
            </div>
            <hr>
            <h5 class="" style="font-size:17px ; font-weight: bold;"><i class="fas fa-child"></i> Giới tính :</h5>

            <div class="col-sm-9" style="float: right;">
                <select class="w3-input w3-hover-dark text-muted mb-0" name="gioi_tinh_nv" id="gioi_tinh_nv" style="width: 27%; margin-top: -38px;">
                      <option value="nam" selected>nam</option>
                      <option value="nữ" >nữ</option>
                      <option value="khác" >khác</option>
                  </select>
              </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h5 class="mb-0" style="font-size:17px ; font-weight: bold;"><i class="fas fa-envelope"></i> Email đăng nhập :</h5>
              </div>
              <div class="col-sm-9">
               <input class="w3-input w3-hover-dark text-muted mb-0" id="email_nv" name="email_nv" type="email" value="<?php  echo $email_nv;  ?>">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3" >
                <h5 class="mb-0" style="font-size:17px ; font-weight: bold;"><i class="fas fa-address-book"></i> Số điện thoại :</h5>
              </div>
              <div class="col-sm-9">
               <input class="w3-input w3-hover-dark text-muted mb-0" id="sdt_nv" name="sdt_nv" type="number" value="<?php  echo $sdt_nv; ?>">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h5 class="mb-0"  style="font-size:17px ; font-weight: bold;"><i class="fas fa-calendar-alt"></i> Ngày sinh :</h5>
              </div>
              <div class="col-sm-9">
              <input class="w3-input w3-hover-dark text-muted mb-0" id="ngay_sinh" name="ngay_sinh" type="date" value="<?php echo $ngay_sinh; ?>">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3" >
                <h5 class="mb-0" style="font-size:17px ; font-weight: bold;"><i class="fas fa-map-marker-alt"></i> Địa chỉ  :</h5>
              </div>
              <div class="col-sm-9">
               <input class="w3-input w3-hover-dark text-muted mb-0" id="dia_chi_nv" name="dia_chi_nv" type="text" value="<?php echo $dia_chi_nv; ?>">
              </div>
            </div>
          </div>
          <hr>
          <a class="text-center"><i onclick="update_profile('<?php echo $id; ?>')" class="btn btn-primary" >Cập Nhật<i class="fas fa-user-check"></i></i></a>
        </div>
        <?php
        if(isset($_SESSION['role']) && $_SESSION['role']==2) :
        ?>
        <!--  -->
        <div class="row">
          <div class="col-md-14">
            <div class="card mb-4 mb-md-0 text-center">
            <div class="text-center  p-3" style="background-color: rgba(0, 0, 0, 0.2);">
               © nhân viên gặp thắc mắc cần :<a style="color: blue;" href="mailto:admin@gmail.com"> @hỗ trợ</a>
          </div>
            </div>
          </div>
          
        </div>
        <?php
        else: 
      ?>
      <?php
      //đóng if
      endif;
      ?>
        <!--  -->
      </div>
    </div>
  </form>
  </div>
</section>
<!-- <script>
  function update_profile(id) {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      var form_data = new FormData();
      //thêm files vào trong form data
      form_data.append('hoten_nv', $("#hoten_nv").val());
      form_data.append('ngay_sinh', $("#ngay_sinh").val());
      form_data.append('gioi_tinh_nv', $("#gioi_tinh_nv").val());
      form_data.append('sdt_nv', $("#sdt_nv").val());
      form_data.append('email_nv', $("#email_nv").val());
      form_data.append('dia_chi_nv', $("#dia_chi_nv").val());
      form_data.append('link_url', $("#link_url").val());
      $.ajax({
        url: './index.php?action=login&act=update_profile&id='+ id, // gửi đến file cập nhật
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (res) {
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          })
          setTimeout(() => {  
            document.location = "index.php?action=login&act=manage_employee"
          }, 1500);
        }
      });
    } 
} -->
</script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php
else : 
    echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
endif;
?>
