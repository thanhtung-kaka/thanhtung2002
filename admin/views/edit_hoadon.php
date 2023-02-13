<section id="mage">
  <div class="container">
    <div class="row title">
      <button class="btn btn-warning col-1 mt-3" onclick="history.back();">
        <i class="fas fa-arrow-alt-circle-left fa-1x"></i><b> Back</b>
      </button>
      <h3 class="text-center fw-bolder mt-4 mb-3 col-11">Edit Đơn Hàng</h3>
      <hr>
      <div class="row justify-content-center">
        <div class="col-9">
        <?php
          if (isset($_GET['id'])) {
            $mahd= $_GET['id'];
            $hd=new hoadon();
            $result = $hd -> getOrder_detail($mahd); 
            $mahd=$result['mahd'];
            $makh=$result['makh'];
            $hoten=$result['hoten'];
            $mail=$result['mail'];
            $sdt=$result['sdt'];
            $diachi=$result['diachi'];
            $payment=$result['payment'];
            $tongtien=$result['tongtien'];
            $ghichu=$result['ghichu'];
            $trangthai=$result['trangthai'];
            $ngaydat=$result['ngaydat'];
          }
        ?>
          <div class="form" name="form" method="post" enctype='multipart/form-data'>
            <input type="text" hidden value="<?php echo $mahd; ?>" name="mahd" id="mahd">
            <input type="text" hidden value="<?php echo $makh; ?>" name="makh" id="makh">
            <input type="text" hidden value="<?php echo $ngaydat; ?>" name="ngaydat" id="ngaydat">
            <div class="col-md-12 col-sm-12">
              <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Tên người mua:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control w-75 m-2" name="hoten" id="hoten" placeholder="Nhập tên người mua" value="<?php echo $hoten; ?>" disabled>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Mail:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control w-75 m-2" name="mail" id="mail" placeholder="Nhập tên người mua" value="<?php echo $mail; ?>" disabled>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Số điện thoại:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control w-75 m-2" name="sdt" id="sdt" placeholder="Nhập số điện thoại" value="<?php echo $sdt; ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Địa chỉ:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control w-75 m-2" name="diachi" id="diachi" placeholder="Nhập địa chỉ" value="<?php echo $diachi; ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Hình thức thanh toán:</label>
                <div class="col-sm-9">
                  <select class="form-select m-2" style="max-width:200px;" aria-label="Default select example" name="payment" id="payment" disabled>
                    <option value="<?php echo $payment; ?>" selected><?php echo $payment; ?></option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Tổng tiền:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control w-75 m-2" name="tongtien" id="tongtien" placeholder="Nhập tổng tiền đơn hàng" value="<?php echo number_format($tongtien); ?>" disabled>
                </div>
              </div>
              
              <div class="mb-3 row">
                <label class="col-sm-3 col-form-label fw-bold">Trạng thái:</label>
                <div class="col-sm-9">
                  <select class="form-select m-2" style="max-width:180px;" aria-label="Default select example" name="trangthai" id="trangthai">
                    <option value="Đang xử lý" selected>Đang xử lý</option>
                    <option value="Giao thành công">Giao thành công</option>
                  </select>
                </div>
              </div>
              <div class="text-center mt-4">
                <button class="btn btn-primary" type="submit" id="update_order" name="submit">Cập Nhật</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>