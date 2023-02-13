<?php
  
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'search') {
            $ac = 'search';
        } else {
            $ac = 'manage_news';
        }
    }
if(isset($id))
{
    $staAcc= new Admin();
    $results=$staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
}
if($results['statusAcc']!=0):
?>

<section id="manage-news">
  <div class="container">
    <h3 class="text-center fw-bolder mt-2">Quản Lý Tin Tức</h3>
    <hr>
    <div class="function-news">
      <div class="row">
        <div class="col-md-3">
          <form action="index.php?action=manage_news&act=search" class="form" method="post">
            <div class="input-group">
              <input type="text" class="form-control" name="searchQuery" id="">
              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
          </form>
        </div>
        <div class="col-md-2">
          <select class="form-select"  aria-label="Default select example" id="filter_loai" onchange="filter_loai()">
            <option selected value="" >Danh Mục</option>
            <?php
                $item=new manageNews();
                $results=$item->getloainews();
                while ($set = $results->fetch()) :
              ?>
            <option value="<?php echo $set['loai_tintuc_id'];?>"
                <?php if (isset($_GET['filter']) && $_GET['filter'] == $set['loai_tintuc_id']) {
                            echo 'selected';
                          } ?>>
              <?php echo $set['ten_loai_tintuc'];?>
            </option>
            <?php 
              endwhile;
            ?>
          </select>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertNews">
            <i class="fas fa-plus "></i> <b>Thêm Tin Mới</b>
          </button>
          <div class="modal fade" id="insertNews" tabindex="-1" aria-labelledby="insertNewsLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60% !important;">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="insertNewsLabel">
                    <b>Thêm Tin Mới</b>
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="m-3 ">
                    <div class="form" name="form" method="post" enctype='multipart/form-data'>
                      <div class="row">
                        <table class="col-md-12">
                          <tr>
                            <td class="w-20 fw-bold">Loại tin tức</td>
                            <td>
                              <select class="form-select m-2" style="max-width:180px;"
                                aria-label="Default select example" name="loai" id="loai">
                                <?php
                                $item=new manageNews();
                                $results=$item->getloainews();
                                while ($set = $results->fetch()) :
                                ?>
                                <option value="<?php echo $set['loai_tintuc_id'];?>"
                                  <?php if($set['loai_tintuc_id']==0){ ?>selected<?php }?>>
                                  <?php echo $set['ten_loai_tintuc'];?>
                                </option>
                                <?php
                                endwhile
                                ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td class="w-20 fw-bold">Tiêu đề bài viết:</td>
                            <td><input type="text" class="form-control w-75 m-2" id="tieude" name="tieude"
                                placeholder="Nhập tên tiêu đề bài viết">
                            </td>
                          </tr>
                          <tr>
                            <td class="w-20 fw-bold">Mô tả</td>
                            <td>
                              <textarea type="text" class="form-control w-75 m-2" placeholder="Nhập mô tả ngắn tin tức" id="mota_ngan"
                                style="resize:none" rows="4" name="mota_ngan"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td class="w-20 fw-bold">Nội Dung</td>
                            <td>
                              <textarea type="text" class="form-control w-75 m-2 content-pane" id="noi_dung"
                                placeholder="Nhập nội dung tin tức" style="resize:none" rows="4"
                                name="noi_dung"></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td class="w-20 fw-bold">Ảnh bìa</td>
                            <td>
                              <img id="image_url" src="assets/images/image.jpg" height="180" alt="" class="img m-2" />
                              <input type="text" id="link_url" name="link_url" hidden value="" />
                              <div class="input-group  w-75 m-2">
                                <input type="file" class="form-control" id="file" name="image" aria-label="Upload">
                                <a class="btn btn-outline-secondary" id="upload_img">Lưu</a>
                              </div>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="text-center mt-4">
                        <button class="btn btn-primary fw-bold" type="submit" id="insert_news" name="submit">Thêm Tin Tức</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row list-news">
      <table class="table table-news ">
        <thead>
          <tr class="text-center">
            <th width="80px">ID</th>
            <th width="120px">Ảnh</th>
            <th width="120px">Loại tin tức</th>
            <th width="80px">Lượt xem</th>
            <th width="250px">Tiêu đề tin tức</th>
            <th width="400px">Mô tả ngắn</th>
            <th width="120px">Thời gian cập nhật</th>
            <th width="170px">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $item=new manageNews();
            $p = new Page();
            $limit = 6;
            $start = $p->findStart($limit);
            if ($ac == 'search') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $search = $_POST['searchQuery'];
                    $results = $item->searchNews($search);
                }
            } else {
              if (isset($_GET['filter']) && $_GET['filter'] != '') {
                $loai=$_GET['filter'];
                $results = $item->getnews_loai($loai);
                //lấy số sản phẩm hiện có
                $count = $results->rowCount();
                //lấy các sản phẩm của trang
                $results = $item->getListPage_loai($start, $limit, $loai);
              }else{
                $results=$item->getnews();
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
            <td><?php echo $set['tintuc_id']; ?></td>
            <td><img src="<?php echo $set['image_tintuc']; ?>" width="100"></td>
            <?php 
              $result=$item->getloai_news($set['loai_tintuc_id']);
              $loai_tintuc=$result[1];
              ?>
            <td><?php echo $loai_tintuc; ?></td>
            <td><?php echo $set['luot_xem']; ?></td>
            <td><?php echo $set['tieu_de']; ?></td>
            <td><?php echo $set['mota_ngan']; ?></td>
            <td><?php echo $set['date_update']; ?></td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <?php
                if($set['status']==0){
                    echo '<span id="status-news' . $set['tintuc_id'] . '"><span class="btn btn-success status-news" data-status="0" data-newsid="' . $set['tintuc_id'] . '"><i class="fas fa-eye-slash" ></i></span></span>';
                } else {
                    echo '<span id="status-news' . $set['tintuc_id'] . '"><span class="btn btn-success status-news" data-status="1" data-newsid="' . $set['tintuc_id'] . '"><i class="fas fa-eye" ></i></span></span>';
                  }
                ?>
                  <a class="btn btn-warning" href="index.php?action=manage_news&act=edit_news&id=<?php echo $set['tintuc_id'];?>">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                <button class="btn btn-danger" onclick="return confirm('Bấm vào nút OK để tiếp tục');">
                  <a href="index.php?action=manage_news&act=remove_news&id=<?php echo $set['tintuc_id'];?>"><i
                      class="fas fa-trash-alt"></i></a>
                </button>
              </div>
            </td>
          </tr>
          <?php 
          endwhile
          ?>
        </tbody>
      </table>
    </div>
    <div class="text-end mb-5 mt-2 me-5">
      <nav class="page-nav">
        <ul class="pagination">
          <?php
            //prev
            if ($ac == "manage_news") :
              if ($current_page > 1 && $page > 1) {
                if(isset($_GET['filter'])&&$_GET['filter']!=''){
                  echo '<li><a href="index.php?action=manage_news&act=manage_news&filter='.$_GET['filter'].'&page='.($current_page - 1).'" class="page-link text-secondary">Prev</a></li>';
                }else{
                echo '<li><a href="index.php?action=manage_news&act=manage_news&page='.($current_page - 1).'" class="page-link text-secondary">Prev</a></li>';
                }
              }
              for ($i = 1; $i <= $page; $i++) {
          ?>
          <li>
            <a href="index.php?action=manage_news&act=manage_news<?php if(isset($_GET['filter'])&&$_GET['filter']!=''){echo '&filter='.$_GET['filter'];}?>&page=<?php echo $i ?>"
              class="page-link text-secondary"><?php echo $i ?></a>
          </li>
          <?php
              }
              //next
              if ($current_page < $page && $page > 1) {
                if(isset($_GET['filter'])&&$_GET['filter']!=''){
                  echo '<li><a href="index.php?action=manage_news&act=manage_news&filter='.$_GET['filter'].'&page=' . ($current_page + 1) . '" class="page-link text-secondary">Next</a></li>';
                }else{
                  echo '<li><a href="index.php?action=manage_news&act=manage_news&page=' . ($current_page + 1) . '" class="page-link  text-secondary">Next</a></li>';
                }
              }
            endif;
          ?>
        </ul>
      </nav>
    </div>
  </div>
</section>
<?php
else : 
    echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
endif;
?>

<script>
  function  filter_loai(){
    var filter_loai = document.getElementById('filter_loai').value;
    if(filter_loai!=''){
      location.href='index.php?action=manage_news&act=manage_news&filter='+filter_loai;
    }else{
      location.href='index.php?action=manage_news&act=manage_news';
    }

    
  }

</script>