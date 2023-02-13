<section >
  <div class="page-content container bill" id="bill">
    <div class="container px-0">
      <div class="row mt-4 justify-content-center" >
        <div class="col-12 col-lg-12 " style="max-width: 1000px; background-color: #f3f3f3;">
          <div class="wrap-block-title">
            <div class="block-title">
              <h3>HÓA ĐƠN</h3>
            </div>
          </div>
          <!-- .row -->

          <hr class="row brc-default-l1 mx-n1 mb-4" />

          <div class="row">
            <?php 
            if(isset($_GET['id'])){
              $bill_id=$_GET['id'];
              $bl=new hoadon();
              $result=$bl->getbill($bill_id);
              $hoten=$result['hoten'];
              $mail=$result['mail'];
              $sdt=$result['sdt'];
              $diachi=$result['diachi'];
              $tongtien=$result['tongtien'];
              $ghichu=$result['ghichu'];
              $ngay = new DateTime($result['ngaydat']);
            }
            ?>
            <div class="col-sm-6">
              <div class="text-start">
                <span class="text-sm align-middle fw-bold">Người mua:</span>
                <span class="align-middle"><?php echo $hoten; ?></span>
              </div>
              <div class="text-grey-m2">
                <div class="my-1">
                  <?php echo $mail; ?>
                </div>
                <div class="my-1">
                  <?php echo $diachi; ?>
                </div>
                <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">+84 <?php echo $sdt; ?></b></div>
              </div>
            </div>
            <!-- /.col -->

            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
              <hr class="d-sm-none" />
              <div class="text-grey-m2">
                <div class="mt-1 mb-2 fw-bold">
                  Hóa Đơn
                </div>

                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID: #</span><?php echo $bill_id ?></div>

                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Date:</span> <?php echo $ngay->format('d-m-Y h:i:s'); ?></div>

              </div>
            </div>
            <!-- /.col -->
          </div>
          
          <div class="mt-4">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tên sản phẩm</th>
                  <th class="text-center nowrap">Số lượng</th>
                  <th>Giá bán</th>
                  <th class="text-end nowrap">Thành tiền</th>
                </tr>
              </thead>
              <tbody id="lProduct">
                <?php
                  $i=1;
                  $item=new hoadon();
                  $results=$item->getbill_detail($bill_id);
                  while ($set = $results->fetch()) :
                ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><a class="name fw-bold" title="<?php echo $set['tensp']; ?>"><?php echo $set['tensp']; ?></a>
                    <p class="name_attr">size <?php echo $set['size'] . ' / ' . $set['mausac']; ?></p>
                  </td>
                  <td class="text-center nowrap"><?php echo $set['soluongmua']; ?></td>
                  <td class="nowrap"><?php echo number_format($set['dongia']); ?><sup>đ</sup></td>
                  <td class="text-end nowrap"><b><?php echo number_format($tongtien); ?><sup>đ</sup></b></td>
                </tr>
                <?php
                  endwhile;
                ?>
              </tbody>
              <tbody>
                <tr>
                <tr class="total1 total_last">
                  <td class="text-end" colspan="4">Tổng giá bán</td>
                  <td class="text-end nowrap"><?php echo number_format($tongtien); ?><sup>đ</sup></td>
                </tr>
              </tbody>
              <tbody>
                <tr>
                  <td colspan="6" class="rb-zeplin-selected"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="total-payment row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="show fw-bold">Ghi chú:</label><br>
                <span id="note"><?php echo $ghichu; ?> </span>
              </div>
            </div>
            <div class="col-sm-6 mt-2">
              <ul id="total_payment">
                <li><span class="fw-bold">Tổng tiền hàng:</span>
                  <p><?php echo number_format($tongtien); ?></p>
                </li>
                <li><span class="fw-bold">Phí vận chuyển:</span>
                  <p>Miễn Phí</p><input type="text" id="ship_fee" value="0">
                </li>
                <li><span class="fw-bold" style="position: relative;top: 4px;">Tổng thanh toán:</span>
                  <p><?php echo number_format($tongtien); ?></p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
  /* @page{
 size: A4;
 margin: 0;
  }
  @media print {
  @page {
  margin: 0;
  border: initial;
  border-radius: initial;
  width: initial;
  min-height: initial;
  box-shadow: initial;
  background: initial;
  page-break-after: always;
  }
} */
</style>