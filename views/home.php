<?php include 'include/slide.php';?>
<section id="home">
  <div class="content-product">
    <div class="container">
      <div class="block-title text-center">
        <h2 class="title"><a href="index.php?action=sanpham&act=sanpham" title="">Sảm Phẩm</a></h2>
      </div>
      <div class="content">
        <div class="block-content">
          <div class="row">
            <?php
              $table='sanpham';
              $limit=8;
              $home=new home();
              $results=$home->get_selecthome($table,$limit);
              while ($set = $results->fetch()) :
            ?>
            <div class="col-md-3 col-sm-6 col-xs-6 item">
              <div class="iframe">
                <div class="img">
                  <a href="index.php?action=sanpham&act=sp_detail&masp=<?php echo $set['masp'] ?>&matt=<?php echo $set['matt'] ?>" 
                    title=""><img src="admin/<?php echo $set['hinh'];?>" alt=""></a>
                </div>
                <div class="info">
                  <h3>
                    <a href="index.php?action=sanpham&act=sp_detail&masp=<?php echo $set['masp'] ?>&matt=<?php echo $set['matt'] ?>"
                       title="<?php echo $set['tensp'];?>"></a><?php echo $set['tensp'];?>
                  </h3>
                  <p><b class="price"><?php echo number_format($set['dongia']);?><sup><u>đ</u></sup></b></p>
                  <!-- <a href="#" class="btn btn-primary ">Add to cart</a> -->
                </div>
              </div>
            </div>
            <?php
              endwhile;
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
      <!-- <div class="container">
        <div class="row justify-content-center text-center mb-4">
          <div class="col-5">
          <div class="block-title text-center">
        <h2 class="title"><a href="#" title="">Đối tác</a></h2>
      </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4 col-sm-4 col-md-2">
            <a href="#" class="client-logo"><img src="assets/img/logo-adobe.png" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-4 col-sm-4 col-md-2">
            <a href="#" class="client-logo"><img src="assets/img/logo-uber.png" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-4 col-sm-4 col-md-2">
            <a href="#" class="client-logo"><img src="assets/img/logo-apple.png" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-4 col-sm-4 col-md-2">
            <a href="#" class="client-logo"><img src="assets/img/logo-netflix.png" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-4 col-sm-4 col-md-2">
            <a href="#" class="client-logo"><img src="assets/img/logo-nike.png" alt="Image" class="img-fluid"></a>
          </div>
          <div class="col-4 col-sm-4 col-md-2">
            <a href="#" class="client-logo"><img src="assets/img/logo-google.png" alt="Image" class="img-fluid"></a>
          </div>

        </div>
      </div>
    -->
  <div class="content-product">
    <div class="container">
      <div class="block-title text-center">
        <h2 class="title"><a href="index.php?action=news&act=news" title="">Tin Tức</a></h2>
      </div>
      <div class="content">
        <div class="block-content">
          <div class="row">
            <?php
              $table='tintuc';
              $limit=8;
              $home=new home();
              $results=$home->get_selecthome($table,$limit);
              while ($set = $results->fetch()) :
            ?>
            <div class="col-md-3 col-sm-6 col-xs-12 wrap-item"> 
              <div class="item">
                <div class="item-content">
                  <a href="index.php?action=news&act=news_detail&id=<?php echo $set['tintuc_id']; ?>" class="img" >
                  <img src="<?php echo $set['image_tintuc']; ?>" class="item-img" alt="...">
                  </a>
                  <div class="item-body">
                    <h3 class="item-title" >
                      <a href="index.php?action=news&act=news_detail&id=<?php echo $set['tintuc_id']; ?>">
                        <?php echo $set['tieu_de'] ?>
                      </a>
                    </h3>
                    <div class="item-time">
                      <i class="fas fa-clock" aria-hidden="true"></i> <?php echo $set['date_update'] ?>
                    </div>
                    <div class="item-info"><?php echo $set['mota_ngan'] ?></div>
                    <div class="view_all">
                      <a href="index.php?action=news&act=news_detail&id=<?php echo $set['tintuc_id']; ?>" >
                        Xem thêm
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
              endwhile;
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>