<?php
//xin phép bạn an  văn bắt trạng thái tài khoản ở đây 
if(isset($id))
{
    $staAcc= new Admin();
    $results=$staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
}
if($results['statusAcc']!=0):
?>
<section id="edit_news">
  <div class="container">
    <div class="row title">
      <button class="btn btn-warning col-1 mt-3" onclick="history.back();">
        <i class="fas fa-arrow-alt-circle-left fa-1x"></i><b> Back</b>
      </button>
      <h3 class="text-center fw-bolder mt-4 col-11">Edit Tin Tức</h3>
    </div>
    <hr>
    <?php
      if (isset($_GET['id'])) {
        $tintuc_id= $_GET['id'];
        $news=new manageNews();
        $result = $news -> getnews_detail($tintuc_id); 
        $loai_tintuc_id=$result['loai_tintuc_id'];
        $tieu_de=$result['tieu_de'];
        $luot_xem=$result['luot_xem'];
        $mota_ngan=$result['mota_ngan'];
        $noi_dung=$result['noi_dung'];
        $image=$result['image_tintuc'];
        $status=$result['status'];
      }
    ?>
    <div class="row justify-content-center">
      <div class="col-9">
        <div class="form" name="form" method="post" enctype='multipart/form-data'>
          <input type="hidden" value="<?php echo $tintuc_id; ?>" name="tintuc_id" id="tintuc_id">
          <div class="col-md-12 col-sm-12">
            <div class="mb-2 row">
              <label class="col-sm-2 col-form-label fw-bold">Loại tin tức:</label>
              <div class="col-sm-9">
                <select class="form-select m-2" style="max-width:180px;" aria-label="Default select example" name="loai" id="loai">
                  <!-- gọi dữ liệu loại danh mục về -->
                  <?php
                    $item=new manageNews();
                    $results=$item->getloainews();
                    while ($set = $results->fetch()) :
                  ?>
                  <option value="<?php echo $set['loai_tintuc_id'];?>" 
                  <?php if( $set['loai_tintuc_id']==$loai_tintuc_id ){ ?>selected<?php }?> >
                    <?php echo $set['ten_loai_tintuc'];?>
                  </option>
                  <?php
                    endwhile
                  ?>
                </select>
              </div>
            </div>
            <div class="mb-2 row">
              <label class="col-sm-2 col-form-label fw-bold">Tiêu đề bài viết:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control w-75 m-2" name="tieude" id="tieude" placeholder="Nhập tên tiêu đề bài viết" value="<?php echo $tieu_de; ?>">
              </div>
            </div>
            <div class="mb-2 row">
              <label class="col-sm-2 col-form-label fw-bold">Mô tả ngắn:</label>
              <div class="col-sm-9">
                <textarea type="text" class="form-control w-75 m-2" placeholder="Nhập mô tả ngắn tin tức" style="resize:none" rows="4" name="mota_ngan" id="mota_ngan"><?php echo $mota_ngan; ?></textarea>
              </div>
            </div>
            <div class="mb-2 row">
              <label class="col-sm-2 col-form-label fw-bold">Ảnh bìa:</label>
              <div class="col-sm-9">
                <img id="image_url" src="<?php echo $image; ?>" height="170px" alt="" class="img m-2" />
                <input type="text" id="link_url" name="link_url" id="link_url" hidden value="<?php echo $image; ?>" />
                <div class="input-group w-75 m-2">
                  <input type="file" class="form-control" id="file" name="image" style="max-width:460px;" aria-label="Upload">
                  <a class="btn btn-outline-secondary" id="upload_img">Lưu</a>
                </div>
              </div>
            </div>
            <div class="mb-2 row">
              <label class="col-sm-2 col-form-label fw-bold">Nội dung:</label>
              <div class="col-sm-9">
                <textarea type="text" class="form-control w-75 m-2 content-pane" placeholder="Nhập kết luận tin tức"
                  style="resize:none" rows="4" name="noi_dung" id="noi_dung"><?php echo $noi_dung; ?></textarea>
              </div>
            </div>
            <div class="text-center mt-4">
              <button class="btn btn-primary" type="submit" id="update_news" name="submit">Update Tin Tức</button>
            </div>
          </div>
        </div>
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