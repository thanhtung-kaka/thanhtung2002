<!-- quản lý nhân sự Văn -->
<?php
if (isset($id)) {
    // nếu tồn tại id thì trả về kết quả của statusAcc trong mảng
    $staAcc = new Admin();
    $results = $staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
    // echo $results['role'];
  } else {
  }
  if(isset($results['statusAcc']) && $results['role']){
    //kiểm tra nếu statusAcc (trạng thái tài khoản) không bằng 0 thì cho sử dụng tiếp 
    if ($results['statusAcc'] != 0) :
    //kiểm tra nếu role bằng 1 thì cho vào 
      if($results['role']==1) :
      ?>
    <div class="table-responsive">
        <div class="table-wrapper">
                    <br>
    <div class="text-center mt-3">
        <h3 style="margin-top: -52px;">Quản lý Nhân Viên </h3>
    </div>
    <?php
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'search_employee') {
            $act = 'search_employee';

        } else {
            $act = 'manage_employee';
        }
        $limit = isset($_GET['limit']) && $_GET['limit'] != '' ? $_GET['limit'] : 10;
      }
    ?>
    <hr>
    <div class="row mt-4 mb-4">
        <div class="col-md-3">
            <form action="index.php?action=login&act=search_employee" class="form" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" name="Search_name_employee" placeholder="nhập tên nhân viên...">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="col-md-2">
                <select class="form-select" id="limitpage_admin" onchange="function_limit_page_admin()">
                    <option value="">Hiển thị</option>
                    <option value="10" <?php if (isset($_GET['limit']) && $_GET['limit'] == 10) {
                                            echo 'selected';
                                        } ?>>Hiển thị 10</option>
                    <option value="15" <?php if (isset($_GET['limit']) && $_GET['limit'] == 15) {
                                            echo 'selected';
                                        } ?>>Hiển thị 15</option>
                    <option value="20" <?php if (isset($_GET['limit']) && $_GET['limit'] == 20) {
                                            echo 'selected';
                                        } ?>>Hiển thị 20</option>
                    <option value="25" <?php if (isset($_GET['limit']) && $_GET['limit'] == 25) {
                                            echo 'selected';
                                        } ?>>Hiển thị 25</option>
                </select>
        </div>
    </div>
    <div style="float: right; margin-top: -62px; margin-right: 575px;"><button type="button" class="btn btn-primary">
        <a href="index.php?action=login&act=add_employee" style="color: white ;"><i class="fas fa-user-plus"></i> Nhân Viên</a> 
        </button>
    </div>
    <div style="    float: right; margin-top: -23px; margin-left: 31px">
         <form action="export_file/employee.php"  method="post">
        <button type="submit" class="btn btn-primary">
         <i class="fas fa-file-export"></i> Export to Excel
        </button>
        </form>	
    </div>
    <div style="float: right; margin-top: -23px; margin-left: 31px">
    <div class="col-xs-7">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#import_data_employee"><i class="fas fa-upload"></i>  <span> Import nhân viên</span></button>					
    </div>
     <!-- models import employee -->
     <div class="modal fade text-start" id="import_data_employee" tabindex="-1" aria-labelledby="import-label" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="import-label"> <i class="fas fa-file-import fs-4 text-success"></i> Import nhân viên</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <table class="w-100">
                          <tr>
                              
                              <td class="w-25 text-center" style="font-size: 20px;font-weight:400;">Chọn file</td>
                              <td>
                                  <input type="text" value class="input-import form-control d-inline-block w-75" id="tenFile"  >
                                  <label for="file"><span class="btn button-42" role="button"><i class="fas fa-upload"></i></span></label>
                                  <input type="file" hidden  id="file" accept=".xls,.xlsx" title="click chọn file">
                              </td>
                          </tr>
                      </table>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" id="save-files_employee">import file</button>
                      <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <hr>
    <table class="table table-hover table-bordered">
        <thead class=" text-center bg bg-primary text-white ">
            <tr>
                <th>STT</th>
                <th>ID </th>
                <th>Họ tên </th>
                <th style="width:110px ;">Ngày sinh</th>
                <th>Số điện thoại </th>						
                <th>Email </th>
                <th style="width:140px ;">Địa chỉ </th>
                <th>Avatar</th>
                <th style="width:145px ;">Chức vụ</th>
                <th style="width:135px ;">Trạng thái NV</th>
                <th style="width:110px ;">Ngày tạo</th>
                <th style="width:140px ;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // limit = 10 một trang hiển thị 10 liê hệ 
            $p = new Page();
            $cont = new Admin();
            // $limit = 10;
            $start = $p->findStart($limit);
            $i = 1;
            /// kiểm tra biến act nếu là search_login thì trả về kết quả tìm kiếm ,nhập trong ip
            if ($act == 'search_employee') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                ///SearchNamelogin   name của thẻ input
                $input_Search = $_POST['Search_name_employee'];
                $results = $cont->search_employee($input_Search);
                $countSearch = $results->rowCount();
       
                // nút reload 
                echo '<div class="ms-3 text-start text-primary" >
                        <a href="index.php?action=login&act=manage_employee" class="fas fa-angle-left" style="font-size:30px"></a>
                        </div>
                        <div >
                        <p><h5>Kết quả tìm kiếm thấy ' . $countSearch . ' nhân viên tên ' . $input_Search . '</h5></p>
                        </div>';
                $results = $cont->search_employee($input_Search);
                }
            } else {
                $results = $cont->getList_admin();
                //lấy tất cả row trong table liên hệ
                $count = $results->rowCount();
                $results = $cont->get_page_admin($start, $limit);
                //lấy số trang
                $page = $p->findPage($count, $limit);
                //lấy trang hiện tại
                $current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            }
            // kết nối lấy oàn bộ danh sách liên hệ để hiển thị
            while ($row = $results->fetch()) :
                $id = $row['id'];
            ?>
            <tr>
                <td><?php echo $i++ ;?></td>
                <td> <?php echo $row['id'] ?></td>
                <td><?php  echo $row['hoten_nv'] ?></td>
                <td><?php  echo $row['ngay_sinh'] ?></td>
                <td><?php echo '+84-'. $row['sdt_nv'] ?> </td>
                <td><?php  echo $row['email_nv'] ?></td>
                <td><?php  echo $row['dia_chi_nv'] ?></td>
                <td><img width="48px" height="41px" style="border-radius: 50%;" src="<?php if (isset($row['avatar'])) { echo $row['avatar']; } else {echo "../assets/images/avatar_img/no_ava.jpg";} ?>" alt=""></td>
                <td><?php if($row['role']==1)echo "Quản trị viên"; else{echo "Nhân viên ";} ?>
                 <i class="fas fa-pen-square me-2 text-dark"  data-bs-toggle="modal" data-bs-target="#edit_role<?php echo $row['id'] ?>" title="chức vụ">
                 </i>
                 <?php include "update_role_employee.php"; ?>
                </td>
               
                <td><?php if($row['status']==1)echo '<span class="status text-success">&bull;</span>đang làm' ;else{ echo '<span class="status text-danger">&bull;</span> nghĩ làm '; }?>
                <i class="fas fa-pen-square me-2 text-dark"  data-bs-toggle="modal" data-bs-target="#edit_status<?php echo $row['id'] ?>" title="công việc">
                </i>
                <?php include "update_status_employee.php"; ?>
                </td>
                
                
                <td> <?php echo $row['ngay_tao']  ;?></td>                        
                <td>
                    <a href="index.php?action=login&act=setting_employee&id=<?php echo $row['id'] ?>"  title="Settings" > <i class="fas fa-cog text-primary" ></i></a> 
                    <a onclick="Delete_Employee('<?php echo $row['id']; ?>')" title="Delete"><i class="fas fa-trash-alt text-danger"></i></a>
                    <i class="fas fa-key me-2 text-dark" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_pass<?php echo $row['id'] ?>" title="password" ></i>
                    <?php include "update_pass_employee.php"; ?>
                    <!-- <a href="index.php?action=account&act=view_pass_account&id=<?php //echo $row['id'] ?>"><i class="fas fa-key text-dark"></i></a> -->
                    |<?php
                        if ($row['statusAcc'] == 0) {
                            echo ' <span id="statusAcc'.$row['id'].'"><span class="me-2 status_account" data-sos="0" data-id="' . $row['id'] . '"><i class="fas fa-lock" title="ngừng truy cập"></i></span></span>';
                        } else {
                            echo ' <span id="statusAcc'.$row['id'].'"><span class="me-2 status_account" data-sos="1" data-id="' . $row['id'] . '"><i class="fas fa-lock-open" title="được phép truy cập"></i></span></span>';
                        }
                    ?>
                </td>

            </tr>
                <?php
                endwhile;
                ?>
        </tbody>
    </table>
        <div class="clearfix">
            <!-- <div class="hint-text">hiển thì <b>10</b> out of <b>25</b> entries</div> -->
            <nav class="page-nav" style="float: right;">
            <ul class="pagination ">
                <?php
                if ($act == "manage_employee") :
                if ($current_page > 1 && $page > 1) {
                    echo '<li><a href="index.php?action=login&act=manage_employee&page=' . ($current_page - 1) . '" class="page-link text-secondary">Prev</a></li>';
                }
                for ($i = 1; $i <= $page; $i++) {
                ?>
                    <li><a href="index.php?action=login&act=manage_employee&page=<?php echo $i ?>" class="page-link text-secondary"><?php echo $i ?></a></li>
                <?php
                }
                //next
                if ($current_page < $page && $page > 1) {
                    echo '<li><a href="index.php?action=login&act=manage_employee&page=' . ($current_page + 1) . '" class="page-link text-secondary">Next</a></li>';
                }
                endif;
                ?>
            </ul>
            </nav>
        </div>
    </div>
</div>   
<?php
else: 
echo  "<script>alert ('Chỉ quản trị viên mới được phép ');</script>";
echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanpham"/>';
//đóng if
endif;
/// ngược lại status = 0 thì đá logout luôn
else : 
    echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
endif;
}else {

}
?>
<script>
    function function_limit_page_admin() {
        var limitpage_admin = document.getElementById('limitpage_admin').value;
        window.location = 'http://shopgiay.local/admin/index.php?action=login&act=manage_employee&limit=' + limitpage_admin;
    }
      function Delete_Employee(id) {
    Swal.fire({
      title: 'Bạn có chắc xóa nhân viên này không?',
      text: "Bạn sẽ không thể hoàn nguyên điều này !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
        setTimeout(() => {
          document.location = "index.php?action=login&act=delete_employee&id=" + id
        }, 1000);
      }
    })
  }

</script>  
    <style>
    .table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
		padding-bottom: 15px;
		background: #299be4;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn {
		color: #566787;
		float: right;
		font-size: 13px;
		background: #fff;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}


	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}

    table.table td:last-child i {
		opacity: 0.9;
		font-size: 17px;
        margin: 0 1px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
	}


	.status {
		font-size: 30px;
		margin: 2px 2px 0 0;
		display: inline-block;
		vertical-align: middle;
		line-height: 10px;
	}
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }

    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }


</style>
