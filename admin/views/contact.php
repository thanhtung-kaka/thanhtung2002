<!-- quản lý liên hệ văn -->
<?php
if (isset($id)) {
    // nếu tồn tại id thì trả về kết quả của statusAcc trong mảng
    $staAcc = new Admin();
    $results = $staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
  } else {
    // ngược lại
    //  echo '<script>alert ("Tài khoản đã bị vô hiệu hóa !");</script>' ;
  }
  if(isset($results['statusAcc'])){
    //kiểm tra nếu statusAcc không bằng 0 thì cho sử dụng tiếp 
    if ($results['statusAcc'] != 0) :
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
        <h3 style="margin-top: -52px;">Quản lý liên hệ </h3>
    </div>
    <hr>
<?php
// nếu act=contact load trang contact 
// if (isset($_GET['act'])) {
//   if ($_GET['act'] == 'contact') {
//     $act = 'contact';
//   } else if ($_GET['act'] == 'search_contact') {
//     $act = 'search_contact';
//   }
// }
if (isset($_GET['act'])) {
  if ($_GET['act'] == 'search_contact') {
      $act = 'search_contact';
  } else {
      $act = 'contact';
  }
  $limit = isset($_GET['limit']) && $_GET['limit'] != '' ? $_GET['limit'] : 10;
}
?>
 <div class="row mt-4 mb-4">
        <div class="col-md-3">
            <form action="index.php?action=contact&act=search_contact" class="form" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" name="SearchNameContact" placeholder="nhập họ tên người liên hệ ...">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="col-md-2">
                <select class="form-select" id="limitpage_contact" onchange="function_limit_page_contact()">
                    <option value="">Hiển thị </option>
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

    <div style="float: right; margin-top: -62px; margin-right:622px;"><button type="button" class="btn btn-primary">
        <a href="index.php?action=contact&act=view_add_contact" style="color: white ;"><i class="fas fa-plus"></i> Liên hệ</a> 
        </button>
    </div>
    <div style="    float: right; margin-top: -23px; margin-left: 31px"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#import_data_contact">
       <i class="fas fa-upload"></i> import file Excel
        </button>
    </div>
    <!-- models import  -->
      <div class="modal fade text-start" id="import_data_contact" tabindex="-1" aria-labelledby="import-label" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="import-label"> <i class="fas fa-file-import fs-4 text-success"></i> Import liên hệ</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <table class="w-100">
                          <tr>
                              
                              <td class="w-25 text-center" style="font-size: 20px;font-weight:400;">Chọn file</td>
                              <td>
                                  <input type="text" value class="input-import form-control d-inline-block w-75" id="tenFile"  disabled>
                                  <label for="file"><span class="btn button-42" role="button"><i class="fas fa-upload"></i></span></label>
                                  <input type="file" hidden id="file" accept=".xls,.xlsx">
                              </td>
                          </tr>
                      </table>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" id="save-files_contact">import file</button>
                      <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
    <div style="float: right; margin-top: -23px; margin-left: 31px">
    <form action="export_file/contact.php"  method="post">
        <button type="submit" class="btn btn-primary">
         <i class="fas fa-file-export"></i> Export to Excel
        </button>
        </form>
    </div>

    <hr>
<div class="mt-3 "> &emsp;
  <!-- <div class="searchbar">
    <form  method="POST" style="margin-top: -17px;">
      <input type="search" name="SearchNameContact" placeholder="nhập họ tên người liên hệ ...">
      <i class="fa fa-search" id="search-icon"></i>
    </form>
  </div> -->
  <table class="table table-hover table-bordered">
    <thead class=" text-center bg bg-primary text-white">
      <tr>
        <th>STT</th>
        <th>Id</th>
        <th>Họ và Tên</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Nội Dung </th>
        <th>Ngày gửi </th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // limit = 10 một trang hiển thị 10 liê hệ 
      $p = new Page();
      $cont = new Contact();
      // $limit = 10;
      $start = $p->findStart($limit);
      $i = 1;
      /// kiểm tra biến act nếu là search_contact thì trả về kết quả tìm kiếm ,nhập trong ip
      if ($act == 'search_contact') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          ///SearchNameContact   name của thẻ input
          $input_Search = $_POST['SearchNameContact'];
          $results = $cont->search_contact($input_Search);
          $countSearch = $results->rowCount();
          // nút reload 
          echo '<div class="ms-3 text-start text-primary" >
                  <a href="index.php?action=contact&act=contact" class="fas fa-angle-left" style="font-size:30px"></a>
                </div>
                <div >
                  <p><h5>Kết quả tìm kiếm thấy ' . $countSearch . ' liên hệ tên ' . $input_Search . '</h5></p>
                </div>';
        }
      } else {
        $results = $cont->getList_contact();
        //lấy tất cả row trong table liên hệ
        $count = $results->rowCount();
        $results = $cont->get_page_contact($start, $limit);
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
          <td><?php echo $i++ ?></td>
          <td><?php echo  $id ?></td>
          <td><?php echo $row['hoten']  ?></td>
          <td><?php echo "+84 " . $row['sdt']  ?></td>
          <td><?php echo $row['email']  ?></td>
          <td><?php echo $row['noidung']  ?></td>
          <td><?php echo $row['thoigian']  ?></td>
          <!-- <td>// if (isset($row['ngaysua'])) { echo $row['ngaysua']; } else {echo "<h6>chưa tác động</h6>";} </td> -->
          <td>
            <a> <i onclick="Delete_Contact('<?php echo $id; ?>')" class="fas fa-trash-alt text-danger"></i></a> |
            <a href="index.php?action=contact&act=edit_contact&id=<?php echo $row['id'] ?>"> <i class="fas fa-edit text-warning"></i></a>
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
        if ($act == "contact") :
          if ($current_page > 1 && $page > 1) {
            echo '<li><a href="index.php?action=contact&act=contact&page=' . ($current_page - 1) . '" class="page-link text-secondary">Prev</a></li>';
          }
          for ($i = 1; $i <= $page; $i++) {
        ?>
            <li><a href="index.php?action=contact&act=contact&page=<?php echo $i ?>" class="page-link text-secondary"><?php echo $i ?></a></li>
        <?php
          }
          //next
          if ($current_page < $page && $page > 1) {
            echo '<li><a href="index.php?action=contact&act=contact&page=' . ($current_page + 1) . '" class="page-link text-secondary">Next</a></li>';
          }
        endif;
        ?>
      </ul>
    </nav>

  </div>
</div>
<?php
/// ngược lại status = 0 thì đá logout luôn 
else : 
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
?>
<?php
endif;
}else {

}
?>
<script>
    function function_limit_page_contact() {
        var limitpage_contact = document.getElementById('limitpage_contact').value;
        window.location = 'http://shopgiay.local/admin/index.php?action=contact&act=contact&limit=' + limitpage_contact;
    }
</script>