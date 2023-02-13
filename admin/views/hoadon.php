<?php
  if (isset($_GET['act'])) {
    if ($_GET['act'] == 'search') {
        $ac = 'search';
    } else {
        $ac = 'hoadon';
    }
}
?>
<section id="manage-order">
  <div class="container">
    <h3 class="text-center fw-bolder mt-2">Quản Lý Hóa Đơn</h3>
    <hr>
    <div class="function-order">
      <div class="row">
        <div class="col-md-3">
          <form action="index.php?action=hoadon&act=search" class="form" method="post">
            <div class="input-group">
              <input type="text" class="form-control" name="searchQuery" id="" placeholder="nhập mã hóa đơn">
              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
          </form>
        </div>
        <div class="col-md-2">
          <select class="form-select"  aria-label="Default select example" id="filter_trangthai"
          onchange="filter_trangthai()">
            <option selected value="" >Trạng thái</option>
            <option value="Đang xử lý" 
              <?php if (isset($_GET['filter']) && $_GET['filter'] == 'Đang xử lý'){echo 'selected';}?>
              >Đang xử lý</option>
            <option value="Giao thành công"
              <?php if (isset($_GET['filter']) && $_GET['filter'] == 'Giao thành công'){echo 'selected';}?>
              >Giao thành công</option>
          </select>
        </div>
      </div>
    </div>
    <hr>
    <div class="row list-order">
      <table class="table table-order ">
        <thead>
          <tr >
            <th width="80px">ID</th>
            <th width="200px">Tên người mua</th>
            <!-- <th width="120px">Mail</th> -->
            <th width="150px">Số điện thoại</th>
            <!-- <th width="200px">Địa chỉ</th> -->
            <th width="200px">Hình thức thanh toán</th>
            <th width="150px">Tổng tiền</th>
            <th width="200px">Ghi chú</th>
            <th width="150px">Trạng thái</th>
            <th width="150px">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $item = new hoadon();
            $p = new Page();
            $limit = 6;
            $start = $p->findStart($limit);
            if ($ac == 'search') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $search = $_POST['searchQuery'];
                    $results = $item->searchOrder($search);
                }
            } else {
              if (isset($_GET['filter']) && $_GET['filter'] != '') {
                $trangthai=$_GET['filter'];
                $results = $item->gethoadon_trangthai($trangthai);
                //lấy số sản phẩm hiện có
                $count = $results->rowCount();
                //lấy các sản phẩm của trang
                $results = $item->getListPage_trangthai($start, $limit, $trangthai);
              }else{
                $results=$item->getOrder();
                //lấy số sản phẩm hiện có
                $count = $results->rowCount();
                //lấy các sản phẩm của trang
                $results = $item->getListPage($start, $limit);
              }
                //lấy số trang
                $page = $p->findPage($count, $limit);
                //lấy trang hiện tại
                $current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            }
            while ($set = $results->fetch()) :
          ?>
          <tr>
            <td><?php echo $set['mahd'] ?></td>
            <td><?php echo $set['hoten'] ?></td>
            <td><?php echo '+84 '.$set['sdt'] ?></td>
            <td><?php echo $set['payment'] ?></td>
            <td><?php echo number_format($set['tongtien']) ?></td>
            <td><?php echo $set['ghichu'] ?></td>
            <td><?php echo $set['trangthai'] ?></td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <a class="btn btn-warning" href="index.php?action=hoadon&act=edit_hoadon&id=<?php echo $set['mahd'];?>">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <button class="btn btn-danger" onclick="return confirm('Bấm vào nút OK để tiếp tục');">
                  <a href="index.php?action=hoadon&act=remove_hoadon&id=<?php echo $set['mahd'];?>"><i
                      class="fas fa-trash-alt"></i></a>
                </button>
                </td>
              </div>
            </td>
          </tr>
          <?php
            endwhile;
          ?>
        </tbody>
      </table>
    </div>
    <div class="text-end mb-5 mt-2 me-5" <?php if($page<2) echo 'hidden'; ?>>
      <nav class="page-nav">
        <ul class="pagination">
          <?php
            //prev
            if ($ac == "hoadon") :
              if ($current_page > 1 && $page > 1) {
                if(isset($_GET['filter'])&&$_GET['filter']!=''){
                  echo '<li><a href="index.php?action=hoadon&act=hoadon&filter='.$_GET['filter'].'&page='.($current_page - 1).'" class="page-link text-secondary">Prev</a></li>';
                }else{
                echo '<li><a href="index.php?action=hoadon&act=hoadon&page='.($current_page - 1).'" class="page-link text-secondary">Prev</a></li>';
                }
              }
              for ($i = 1; $i <= $page; $i++) {
          ?>
          <li>
            <a href="index.php?action=hoadon&act=hoadon<?php if(isset($_GET['filter'])&&$_GET['filter']!=''){echo '&filter='.$_GET['filter'];}?>&page=<?php echo $i ?>"
              class="page-link text-secondary"><?php echo $i ?></a>
          </li>
          <?php
              }
              //next
              if ($current_page < $page && $page > 1) {
                if(isset($_GET['filter'])&&$_GET['filter']!=''){
                  echo '<li><a href="index.php?action=hoadon&act=hoadon&filter='.$_GET['filter'].'&page=' . ($current_page + 1) . '" class="page-link text-secondary">Next</a></li>';
                }else{
                  echo '<li><a href="index.php?action=hoadon&act=hoadon&page=' . ($current_page + 1) . '" class="page-link  text-secondary">Next</a></li>';
                }
              }
            endif;
          ?>
        </ul>
      </nav>
    </div>
  </div>
</section>
<script>
  function filter_trangthai(){
    var filter_trangthai = document.getElementById('filter_trangthai').value;
    if(filter_trangthai!=''){
      location.href='index.php?action=hoadon&act=hoadon&filter='+filter_trangthai;
    }else{
      location.href='index.php?action=hoadon&act=hoadon';
    }
  }
</script>