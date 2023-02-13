<!-- văn 06/06 -->
<?php
if(isset($id))
{
    $staAcc= new Admin();
    $results=$staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
}
if($results['statusAcc']!=0):
?>
<div class="container rounded bg-white mt-5 mb-5">
<div class="ms-3 text-start text-primary" onclick="history.back()"><i class="fas fa-angle-left" style="font-size:30px"></i></div>
                    <h3 class="text-center text-w">Nhân Viên Settings</h3>
                    <hr>
<form class="form" method="POST">
<div class="row">
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
           }
        ?>
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <label for="file"><img class="rounded-circle mt-5" width="106px" height="130px"  src="<?php if (isset($avatar)) { echo $avatar; } else {echo "assets/images/avatar_img/5581332.png";} ?>" alt="" id="image_url" ></label>
            <input type="text" id="link_url" value="<?php echo $avatar ?>" hidden name="link_url">
            <input type="file" id="file" hidden accept=".png,.jpeg,.jpg,.gif" name="avatar">
            <br>
            <div id="upload_img" class="btn btn-success">Lưu avatar <i class="fas fa-check-double"></i></div>
            <span class="font-weight-bold"><?php echo $hoten_nv; ?></span><span class="text-black-50"><?php echo $email_nv; ?></span>
            <span class="font-weight-bold" style="color:blue;font-weight:bold"><?php if($role==1)echo "Quản trị viên"; else{echo "Nhân viên cửa hàng";} ?></span>
            </div>
        </div>
        <div class="col-md-5 border-right" style="border-right: 1px solid; border-left: 1px solid;">
            <div class="p-3 py-5">
                
                <div class="row mt-2">
                    <div class="col-md-6"><h6 class="labels"><i class="fas fa-user-graduate"></i> Họ và tên :</h6><input type="text" class="form-control" id="hoten_nv" name="hoten_nv"  value="<?php echo $hoten_nv; ?>"></div>
                    <div class="col-md-6">
                        <h6 class="labels"><i class="fas fa-calendar-alt"></i> Ngày sinh :</h6>
                        <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="<?php echo $ngay_sinh; ?>" >
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <h6 class="labels"><i class="fas fa-child"></i> Giới tính  :</h6>
                        <select name="gioi_tinh_nv" id="gioi_tinh_nv">
                                    <option value="nam" selected>nam</option>
                                    <option value="nữ" >nữ</option>
                                    <option value="khác" >khác</option>
                                </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><h6 class="labels"> <i class="fas fa-address-book"></i> Số điện thoại :</h6>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">+ 84</span>
                    </div>
                    <input type="text" class="form-control" id="sdt_nv" name="sdt_nv" value="<?php echo $sdt_nv; ?>" aria-describedby="inputGroup-sizing-default">
                    </div>
                </div>

                    
                    <div class="col-md-12"><h6 class="labels"><i class="fas fa-map-marker-alt"></i> Địa chỉ :</h6><textarea type="text" class="form-control" id="dia_chi_nv" name="dia_chi_nv"><?php echo $dia_chi_nv ; ?></textarea></div>
                    <div class="col-md-12"><h6 class="labels"><i class="fas fa-calendar-alt"></i> Ngày tham gia :</h6><input type="date" class="form-control" value="<?php echo $ngay_tao; ?>" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6 class="labels"><i class="fas fa-shield-alt"></i> Chức vụ :</h6>
                        <select class="form-select w-75 mb-3 form-control" style="text-transform: capitalize;" id="role" name="role">
                            <option value="1">Quản trị viên</option>
                            <option value="2">nhân viên cửa hàng</option>
                            <option value="3" disabled>nhân viên tư vấn</option>
                            <option value="4" disabled>nhân viên sale</option>
                        </select>
                </div>
                    <div class="col-md-6">
                        <h6 class="labels"> <i class="fas fa-briefcase"></i> Trạng thái :</h6>
                        <select class="form-select w-75 mb-3 form-control" style="text-transform: capitalize;" id="status" name="status">
                            <option value="1">hoạt động</option>
                            <option value="2">tắt hoạt động</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><button class="border px-3 p-1 add-experience" style=" border-radius: 43%; color: #c38383; font-size: 18px;" disabled>
                <i class="fas fa-lock-open"></i>&nbsp;Chỉnh sửa email đăng nhập</button></div><br>
                <div class="col-md-12">
                    <label class="labels"><i class="fas fa-envelope"></i> Email :</label>
                    <input type="email" class="form-control" id="email_nv" name="email_nv" value="<?php echo $email_nv ?>">
                </div> <br>
                <div class="col-md-12">
                <div class="card-body">
                <h5 class="mb-4"><span class="text-black font-italic me-1">Thông tin chỉ tiêu nhân viên <i class="fab fa-buffer"></i></span> </h5>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div> <br>
                
            </div>
        </div>
        <!-- <div ><button class="btn btn-primary profile-button"  type="submit">Lưu</button></div> -->
        <a class="mt-5 text-center"><i onclick="update_employee('<?php echo $id; ?>')" class="btn btn-primary profile-button" style="margin-top: -55px; margin-left: -335px;">Cập Nhật <i class="fas fa-user-check"></i></i></a>
</div>
</form>
</div>
</div>
<?php
else : 
    echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
endif;
?>
