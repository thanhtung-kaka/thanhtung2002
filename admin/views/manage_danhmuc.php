
<?php
 //xin phép bạn An cho văn bắt trạng thái tài khoản ở đây 
 if(isset($id))
 {
     $staAcc= new Admin();
     $results=$staAcc->get_one_statusAcc($id);
    //  echo $results['statusAcc'];
 }
 if($results['statusAcc']!=0):
?>
<section id="manage-loainews">
  <div class="container">
    <h3 class="text-center fw-bolder mt-3">Quản Lý Danh Mục Tin Tức</h3>
    <hr>
    <div class="function-news">
      <div class="row">
        <div class="col-md-3">
          <form action="" class="form" method="post">
            <div class="input-group">
              <input type="text" class="form-control" name="searchQuery" id="">
              <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
          </form>
        </div>
        
        <div class="col-md-3">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#insertDanhmuc">
            <i class="fas fa-plus "></i> <b>Thêm Danh Mục</b>
          </button>

          <!-- Modal -->
          <div class="modal fade" id="insertDanhmuc" tabindex="-1" aria-labelledby="insertDanhmucLabel"
            aria-hidden="true" style="padding-top: 130px;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title fw-bold" id="insertDanhmucLabel">Thêm Danh Mục</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <form action="index.php?action=manage_danhmuc&act=insert_loainews" method="post">
                      <table class="col-md-12 col-sm-12">
                        <tr>
                          <td class="w-20 fw-bold">Loại tin tức</td>
                          <td><input type="text" name="loai_tintuc" class="form-control w-75 m-2"
                          placeholder="Nhập danh mục tin tức mới"></td>
                        </tr>
                        <tr>
                          <td colspan="2" class="text-center">
                            <button type="submit" class="btn btn-primary fw-bold">Thêm Danh Mục</button>
                          </td>
                        </tr>
                      </table>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="list-loainews">
        <table class="table table-loainews text-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên Danh Mục Tin Tức</th>
              <th>Chức năng</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $item=new manageNews();
              $results=$item->getloainews();
              while ($set = $results->fetch()) :
            ?>
            <tr>
              <td><?php echo $set['loai_tintuc_id']; ?></td>
              <td><?php echo $set['ten_loai_tintuc']; ?></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                  <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editDanhmuc<?php echo $set['loai_tintuc_id']; ?>">
                      <i class="fas fa-pencil-alt"></i>Sửa
                  </button>
                  <div class="modal fade" id="editDanhmuc<?php echo $set['loai_tintuc_id']; ?>" tabindex="-1" aria-labelledby="editDanhmucLabel"
                    aria-hidden="true" style="padding-top: 130px;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fw-bold" id="editDanhmucLabel">Thêm Danh Mục</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <form action="index.php?action=manage_danhmuc&act=remove_loainews&id=<?php echo $set['loai_tintuc_id']; ?>" method="post">
                              <table class="col-md-12 col-sm-12">
                                <tr>
                                  <td class="w-20 fw-bold">Loại tin tức</td>
                                  <td><input type="text" name="loai_tintuc" class="form-control w-75 m-2"
                                  placeholder="Nhập danh mục tin tức mới" value="<?php echo $set['ten_loai_tintuc']; ?>"></td>
                                </tr>
                                <tr>
                                  <td colspan="2" class="text-center">
                                    <button type="submit" class="btn btn-primary fw-bold">Update Danh Mục</button>
                                  </td>
                                </tr>
                              </table>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-danger" onclick="return confirm('Bấm vào nút OK để tiếp tục');">
                    <a href="index.php?action=manage_danhmuc&act=remove_loainews&id=<?php echo $set['loai_tintuc_id'];?>">
                      <i class="fas fa-trash-alt"></i>Xóa</a>
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
    </div>
  </div>
</section>
<?php
else : 
    echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
endif;
?>