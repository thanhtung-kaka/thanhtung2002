<section id="thanhtoan" class="cart payment cart_payment">
  <div class="wrap-block-title">
    <div class="block-title">
      <h3>Thông tin đơn hàng</h3>
    </div>
  </div>
  <div class="content">
    <div class="content-address" id="form_content_address">
      <h3>Thông tin giao hàng</h3>
      <p>Bạn hãy điền thông tin bên dưới nhé!
      </p>
      <div class="form-default">
        <?php
          $us=new User();
          $user=$us->get_one_client($_SESSION['id']);
          $hoten=$user['ten_kh'];
          $email=$user['email_kh'];
          $sdt=$user['sdt_kh'];
          $diachi=$user['dia_chi_kh'];
        ?>
        <div>
          <div class="form-group">
            <label>Họ và tên <font color="#e5101d">*</font></label>
            <input type="text" class="form-control" id="fullname" name="fullname" maxlength="45" autocomplete="off" placeholder="Họ và tên" value="<?php echo $hoten;?>" disabled>
          </div>
          <div class="form-group">
            <label>Email <font color="#e5101d">*</font></label>
            <input type="text" class="form-control" id="email" name="email" maxlength="100" autocomplete="off" placeholder="Email" value="<?php echo $email;?>" >
          </div>
          <div class="form-group">
            <label>Số điện thoại <font color="#e5101d">*</font></label>
            <input type="text" class="form-control" id="phone" name="phone" maxlength="15" autocomplete="off" placeholder="Số điện thoại" value="<?php echo $sdt;?>">
          </div>
          
          <div class="form-group">
            <label>Địa chỉ:<font color="#e5101d">*</font></label>
            <input type="text" class="form-control" id="address" name="address" maxlength="100" autocomplete="off" value="" placeholder="Địa chỉ" value="<?php echo $diachi;?>">
          </div>
        </div>
      </div>

    </div>
    <div class="content-payment">
      <p class="title"><i class="fa fa-cube" aria-hidden="true"></i> Sản phẩm</p>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Hình ảnh</th>
              <th>Tên sản phẩm</th>
              <th class="text-center nowrap">Số lượng</th>
              <th>Giá bán</th>
              <th class="text-end nowrap">Thành tiền</th>
            </tr>
          </thead>
          <tbody id="lProduct">
          <?php
          foreach ($_SESSION['cart'] as $key => $item) :
            $price = number_format($item['price']);
            $total = number_format($item['total']);
          ?>
            <tr>
              <td><img src="<?php echo $item['hinh']; ?>" width="80"></td>
              <td><a class="name" title="<?php echo $item['tensp']; ?>"><?php echo $item['tensp']; ?></a>
                <p class="name_attr"><?php echo $item['size'] . ' / ' . $item['mausac']; ?></p>
              </td>
              <td class="text-center nowrap"><?php echo $item['quantity']; ?></td>
              <td class="nowrap"><?php echo $price; ?><sup>đ</sup></td>
              <td class="text-end nowrap"><b><?php echo $total; ?><sup>đ</sup></b></td>
            </tr>
          <?php
          endforeach;
          ?>
          
          </tbody>
          <tbody>
            <tr>
            <tr class="total1 total_last">
              <td class="text-end" colspan="4">Tổng giá bán</td>
              <td class="text-end nowrap"><?php echo get_subtotal(); ?><sup>đ</sup></td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td colspan="6" class="rb-zeplin-selected"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <a href="index.php?action=cart&act=cart"><b>QUAY LẠI GIỎ HÀNG</b></a>
    </div>
    <div class="content-payment">
      <p class="title"><i class="fas fa-university"></i></i> Hình thức thanh toán</p>
      <ul class="">
        <li class="active">
          <label class="wrap-ace">
            <input class="ace" type="radio" name="payment" id="payment" checked value="Thanh toán khi nhận hàng">
            <span class="lbl"><img src="https://dolomen.vn/web_erpv2/public/images/icon-payment-cod.svg" alt="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</span>
          </label>
        </li>
      </ul>
      <div class="total-payment row">
        <div class="col-sm-6">
          <div class="form-group">
            <label class="show">Ghi chú</label>
            <textarea class="form-control" rows="4" id="note" name="note"></textarea>
          </div>
        </div>
        <div class="col-sm-6 mt-2">
          <ul id="total_payment">
            <li><span>Tổng tiền hàng:</span>
              <p><?php echo get_subtotal(); ?></p>
            </li>
            <li><span>Phí vận chuyển:</span>
              <p>Miễn Phí</p><input type="text" hidden="" id="ship_fee" value="0">
            </li>
            <li><span style="position: relative;top: 4px;">Tổng thanh toán:</span>
              <p><?php echo get_subtotal(); ?></p>
            </li>
          </ul>
          <div class="text-end">
            <a class="btn btn-cart fw-bold" id="submitthanhtoan">ĐẶT HÀNG</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>