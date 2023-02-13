<section id="mage">
  <div class="container">
    <div class="row title">
      <button class="btn btn-warning col-1 mt-3" onclick="history.back();">
        <i class="fas fa-arrow-alt-circle-left fa-1x"></i><b> Back</b>
      </button>
      <h3 class="text-center fw-bolder mt-4 mb-3 col-11">Edit Bình Luận</h3>
      <hr>
      <div class="row justify-content-center">
        <div class="col-9">
        <?php
          if (isset($_GET['id'])) {
            $id_cmt= $_GET['id'];
            $cmt=new comment();
            $result = $cmt -> getComment_detail($id_cmt); 
            $masp=$result['masp'];
            $id_kh=$result['id_kh'];
            $ten_kh=$result['ten_kh'];
            $desc=$result['desc'];
            $date_cmt=$result['date_cmt'];
          }
        ?>
          <div class="form" name="form" method="post" enctype='multipart/form-data'>
            <input type="text" hidden value="<?php echo $id_cmt; ?>" name="id_cmt" id="id_cmt">
            <input type="text" hidden value="<?php echo $masp; ?>" name="masp" id="masp">
            <input type="text" hidden value="<?php echo $id_kh; ?>" name="id_kh" id="id_kh">
            <input type="text" hidden value="<?php echo $date_cmt; ?>" name="date_cmt" id="date_cmt">
            <div class="col-md-12 col-sm-12">
              <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Tên khách hàng:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control w-75 m-2 " name="ten_kh" id="ten_kh" placeholder="Nhập tên khách hàng" disabled value="<?php echo $ten_kh; ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Nội dung bình luận:</label>
                <div class="col-sm-9">
                  <textarea type="text" class="form-control w-75 m-2" placeholder="Nhập nội dung bình luận" style="resize:none" rows="3" name="desc" id="desc"><?php echo $desc; ?></textarea>
                </div>
              </div>
              <div class="text-center mt-4">
                <button class="btn btn-primary" type="submit" id="update_comment" name="submit">Cập Nhật</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>