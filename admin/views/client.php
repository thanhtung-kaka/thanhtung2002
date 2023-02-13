<!-- khách hàng văn 23/06 -->
<?php
if(isset($id))
{
    $staAcc= new Admin();
    $results=$staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
}
if($results['statusAcc']!=0):
?>
<div>
    <br>
    <button class="btn btn-outline-primary" onclick="tai_lai_trang()">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"></path>
            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"></path>
        </svg>
    </button>
    <div class="text-center mt-3">
        <h3 style="margin-top: -52px;">Quản lý khách hàng </h3>
    </div>
    <?php
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'search_client') {
            $act = 'search_client';
        } else {
            $act = 'get_client';
        }
        $limit = isset($_GET['limit']) && $_GET['limit'] != '' ? $_GET['limit'] : 10;
      }
    ?>
    <hr>
    <div class="row mt-4 mb-4">
        <div class="col-md-3">
            <form action="index.php?action=client&act=search_client" class="form" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" name="search_Name_Client" placeholder="nhập tên khách hàng...">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="col-md-2">
                <select class="form-select" id="limitpage_client" onchange="function_limit_page_client()">
                    <option value="">Hiển thị số khách hàng</option>
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
    <div style="float: right; margin-top: -62px; margin-right: 591px;"><button type="button" class="btn btn-primary">
        <a href="index.php?action=client&act=view_add_client" style="color: white ;"><i class="fas fa-plus"></i> khách hàng</a> 
        </button>
    </div>
    <div style=" float: right; margin-top: -23px; margin-left: 31px"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#import_data_client">
       <i class="fas fa-upload"></i> import file Excel
        </button>
    </div>
    <!-- models import client -->
    <div class="modal fade text-start" id="import_data_client" tabindex="-1" aria-labelledby="import-label" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="import-label"> <i class="fas fa-file-import fs-4 text-success"></i> Import khách hàng</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <table class="w-100">
                          <tr>
                              
                              <td class="w-25 text-center" style="font-size: 20px;font-weight:400;">Chọn file</td>
                              <td>
                                  <input type="text" value class="input-import form-control d-inline-block w-75" id="tenFile"  >
                                  <label for="file"><span class="btn button-42" role="button"><i class="fas fa-upload"></i></span></label>
                                  <input type="file" hidden  id="file" accept=".xls,.xlsx">
                              </td>
                          </tr>
                      </table>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" id="save-files_client">import file</button>
                      <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
    <div style="    float: right; margin-top: -23px; margin-left: 31px">
        <form action="export_file/client.php"  method="post">
        <button type="submit" class="btn btn-primary">
         <i class="fas fa-file-export"></i> Export to Excel
        </button>
        </form>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="text-center bg bg-primary text-white" role="rowgroup">
                <tr>
                    <th>STT</th>
                    <th>id kh</th>
                    <th>Họ & Tên</th>
                    <th>Giới tính</th>
                    <th>Avatar</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đăng ký</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-center text-secondary">
                <?php
                $i = 1;
                $p = new Page();
                // $limit = 10;
                $start = $p->findStart($limit);
                $cli = new Client();
                if ($act == 'search_client') {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $input_Search = $_POST['search_Name_Client'];
                        $results = $cli->search_client($input_Search);
                        $countSearch = $results->rowCount();
                        echo '<div class="ms-3 text-start text-primary" >
                        <a href="index.php?action=client&act=get_client" class="fas fa-angle-left" style="font-size:30px"></a>
                      </div>
                      <div >
                        <p><h5>Kết quả tìm kiếm thấy ' . $countSearch . ' khách hàng tên ' . $input_Search . '</h5></p>
                      </div>';
                    }
                } else {
                    $results = $cli->getList_client();
                    
                    $count = $results->rowCount();
                    $results = $cli->get_page_client($start, $limit);
                    //lấy số trang
                    $page = $p->findPage($count, $limit);
                    //lấy trang hiện tại
                    $current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                }
                while ($row = $results->fetch()) :
                ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['ten_kh'] ?></td>
                        <td><?php if (isset($row['gioi_tinh_kh'])) {
                                echo $row['gioi_tinh_kh'];
                            } else {
                                echo "<h6>chưa cập nhật</h6>";
                            } ?></td>
                        <td><img width="48px" height="41px" style="border-radius: 50%;" src="<?php if (isset($row['avatar'])) { echo $row['avatar']; } else {echo "../assets/images/avatar_img/no_ava.jpg";} ?>" alt=""></td>
                        <td><?php if (isset($row['sdt_kh'])) {
                                echo "+84 " . $row['sdt_kh'];
                            } else {
                                echo "<h6>chưa cập nhật</h6>";
                            } ?></td>
                        <td><?php if (isset($row['email_kh'])) {
                                echo $row['email_kh'];
                            } else {
                                echo "<h6>chưa cập nhật</h6>";
                            } ?></td>
                        <td><?php if (isset($row['dia_chi_kh'])) {
                                echo $row['dia_chi_kh'];
                            } else {
                                echo "<h6>chưa cập nhật</h6>";
                            } ?></td>
                        <td><?php echo $row['ngay_dk'] ?></td>

                        <td>

                        <?php
                            if ($row['status'] == 0) {
                                echo '<span id="status' . $row['id'] . '"><span class="me-2 status_client" data-status="0" data-id="' . $row['id'] . '"><i class="fas fa-times" title="ngừng truy cập"></i></span></span>';
                            } else {
                                echo '<span id="status' . $row['id'] . '"><span class="me-2 status_client" data-status="1" data-id="' . $row['id'] . '" ><i class="fas fa-check" title="được phép truy cập"></i></span></span>';
                            }
                        ?>
                           | <a onclick="Delete_Client('<?php echo $row['id']; ?>')"> <i class="fas fa-trash-alt text-danger"></i></a> |
                            <a href="index.php?action=client&act=edit_client&id=<?php echo $row['id'] ?>"><i class="fas fa-edit text-warning"></i></a> |
                            <i class="fas fa-key me-2 text-dark" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_pass<?php echo $row['id'] ?>" title="password" ></i>
                            <?php include "update_pass_client.php"; ?>
                            <div class="modal fade" id="view_pass<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="view_passLabel <?php echo $row['id'];?>" >
                        </td>

                    </tr>
                <?php
                endwhile;
                ?>
            </tbody>
        </table>
        <div class="text-end mb-5 mt-2 me-5">
            <nav class="page-nav">
                <ul class="pagination ">
                    <?php
                    if ($act == "get_client") :
                        if ($current_page > 1 && $page > 1) {
                            echo '<li><a href="index.php?action=client&act=get_client&page=' . ($current_page - 1) . '" class="page-link text-secondary">Prev</a></li>';
                        }
                        for ($i = 1; $i <= $page; $i++) {
                    ?>
                            <li><a href="index.php?action=client&act=get_client&page=<?php echo $i ?>" class="page-link text-secondary"><?php echo $i ?></a></li>
                    <?php
                        }
                        //next
                        if ($current_page < $page && $page > 1) {
                            echo '<li><a href="index.php?action=client&act=get_client&page=' . ($current_page + 1) . '" class="page-link text-secondary">Next</a></li>';
                        }
                    endif;
                    ?>
                </ul>
            </nav>

        </div>
    </div>
</div>
<?php
else : 
    echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
endif;
?>
<script>
    function function_limit_page_client() {
        var limitpage_client = document.getElementById('limitpage_client').value;
        window.location = 'http://shopgiay.local/admin/index.php?action=client&act=get_client&limit=' + limitpage_client;
    }

</script>