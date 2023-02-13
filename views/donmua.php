<section>
  <div class="block-title mt-4">
    <h2 class="title"><a style="pointer-events: none;">Đơn hàng của tôi</a></h2>
  </div>
  <div class="row justify-content-center">
    <?php
    $id=$_GET['id'];
    $item=new hoadon();
    
    $results=$item->getbill_user($id);
    while ($set = $results->fetch()) :
      $ngay= new DateTime($set['ngaydat']);
    ?>
    <div class="purchase-order m-3" style="max-width: 1000px;">
      <h4>#<?php echo $set['mahd'] ?><span> - Ngày </span><?php echo $ngay->format('d/m/Y'); ?></h4>
      <p>Tổng hóa đơn: <b><?php echo number_format($set['tongtien']);?></b> / Thành tiền: <b><?php echo number_format($set['tongtien']);?></b></p>
      <p>Tình trạng đơn hàng: <mark><?php echo $set['trangthai'] ?></mark></p>
      <div class="alert alert-primary" >
        <a href="index.php?action=thanhtoan&act=bill&id=<?php echo $set['mahd'] ?>" class="link-bill">Xem chi tiết</a>
      </div>
    </div>
    <?php
      endwhile;
    ?>
  </div>
</section>