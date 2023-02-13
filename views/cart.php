<!-- văn văn -->
<?php
if (isset($id)) {
  // nếu tồn tại id thì trả về kết quả của status trong mảng
  $sta = new User();
  $results = $sta->get_one_status($id);
} else {
  // ngược lại
  //  echo '<script>alert ("Tài khoản đã bị vô hiệu hóa !");</script>' ;
}
if(isset($results['status'])){
//kiểm tra nếu status không bằng 0 thì cho sử dụng tiếp 
if ($results['status'] != 0) :

  // echo $results['status'];
  // if ($_SESSION['id']!=0):
  // $id=$_SESSION['id'];
  // echo $_SESSION['status'];
?>
  <section class="cart order cart_checkout">
    <div class="wrap-block-title">
      <div class="block-title">
        <h3>Thông tin đơn hàng</h3>
      </div>
    </div>
    <div class="white-box">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
          <div class="right">
            <h3>Giỏ hàng</h3>
            <div class="table-responsive">
              <table class="table ">
                <thead>
                  <tr>
                    <th class="nowrap">Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th class="nowrap">Size</th>
                    <th class="nowrap">Số lượng</th>
                    <th class="nowrap">Giá bán</th>
                    <th class="nowrap" style="width: 150px !important;">Thành tiền</th>
                  </tr>
                </thead>
                <tbody id="lProduct">
                  <?php
                  if (!isset($_SESSION['cart']) || $_SESSION['cart'] == null) {
                  ?>
                    <tr>
                      <td colspan="6">
                        <b style="display: block;margin: 20px 0px 0px 0px;text-align: center;">Không có sản phẩm nào trong giỏ hàng</b>
                      </td>
                    </tr>
                  <?php
                  } else {
                  ?>
                    <?php
                    foreach ($_SESSION['cart'] as $key => $item) :
                      $price = number_format($item['price']);
                      $total = number_format($item['total']);
                    ?>
                      <tr>
                        <td>
                          <img src="<?php echo $item['hinh']; ?>" width="80" />
                        </td>
                        <td>
                          <a title="<?php echo $item['tensp']; ?>" style="text-transform: capitalize;"><?php echo $item['tensp'] . ' - ' . $item['mausac']; ?></a>
                        </td>
                        <td>
                          <a title="<?php echo $item['size']; ?>"><?php echo $item['size'] ?></a>
                        </td>
                        <td>
                          <div class="input-group soluong mb-2">
                            <div class="input-group-text plus is-form" id="plus<?php echo $item['matt'] ?>" data-matt="<?php echo $item['matt'] ?>"><i class="fas fa-plus"></i></div>
                            <input type="number" class="quantity" id="quantity<?php echo $item['matt']; ?>" data-matt="<?php echo $item['matt'] ?>" min="1" max=<?php echo $item['soluongton'] ?> value="<?php echo $item['quantity']; ?>">
                            <div class="input-group-text minus is-form" id="minus<?php echo $item['matt'] ?>" data-matt="<?php echo $item['matt'] ?>"><i class="fas fa-minus"></i></div>
                          </div>

                        </td>
                        <td class="nowrap"><?php echo $price; ?><sup>đ</sup></td>
                        <td class="nowrap">
                          <b><?php echo $total; ?><sup>đ</sup></b>&nbsp;&nbsp;
                          <span onclick="myClickFunc(<?php echo $item['matt'] ?>)"><span class="fa-stack delete" data-id="<?php echo $item['matt'] ?>" data-size="0" data-manufacture="15147">
                              <i class="fas fa-times-circle fa-stack-2x" id="delete_item"></i>
                            </span></span>
                        </td>
                      </tr>
                    <?php
                    endforeach;
                    ?>
                    <tr class="hide">
                      <td colspan="6">
                        <b>Thông tin đơn hàng</b>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="5">Tổng giá bán</td>
                      <td><?php echo get_subtotal(); ?><sup>đ</sup></td>

                    </tr>

                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          <a href="index.php?action=sanpham" title="" class="cart-change">Tiếp tục xem sản phẩm</a>
        </div>
        <div class="text-end">
          <a href="index.php?action=thanhtoan&act=order" class="btn btn-cart fw-bold 
          <?php if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0) echo 'disabled'; ?>"  id="submitOrder" name="continue">Thanh toán</a>
        </div>
      </div>
  </section>

<?php
/// ngược lại status = 0 thì đá logout luôn 
else : 
 
?>
<?php
endif;
}else {
  echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=log_out"/>';
}
?>

<script>
  function myClickFunc(id) {
    Swal.fire({
      title: 'Bạn có chắc chắn muốn xóa không',
      text: "Bạn sẽ không để hoàn nguyên điều này",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Xóa nó!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Đã xóa',
          'Sản phẩm của bạn đã được xóa khỏi giỏ hàng',
          'success',
          setTimeout(()=>{document.location="index.php?action=cart&act=remove_cart&matt="+id},2000)
        )
        
      }
    })
  }
</script>