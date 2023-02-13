<!-- lấy dữ liệu của tin tức được gọi -->
<?php
  if (isset($_GET['id'])) {
    $tintuc_id= $_GET['id'];
    $item=new news();
    $result  = $item -> getnews_detail($tintuc_id);
    $loai_tintuc_id=$result['loai_tintuc_id'];
    $tieu_de=$result['tieu_de'];
    $luot_xem=$result['luot_xem'];
    $mota_ngan=$result['mota_ngan'];
    $noi_dung=$result['noi_dung'];
    $date_update=$result['date_update'];
  }
  // tính thời gian để tính 1 lượt xem
  $now=time();
  if(isset($_SESSION['news_'.$tintuc_id])){
    if($now > $_SESSION['news_'.$tintuc_id]){
      $_SESSION['news_'.$tintuc_id] = $now + 1800;
      $luot_xem=$luot_xem+1; //tăng 1 view
      $result = $item -> update_luotxem($tintuc_id,$luot_xem);
    }
  }else{
    $_SESSION['news_'.$tintuc_id] = $now + 1800;
    $luot_xem=$luot_xem+1; //tăng 1 view
    $result = $item -> update_luotxem($tintuc_id,$luot_xem);
  }
?>


<section class="detail-news">
  <div class="container">
    <div class="row pt-3">
      <div class="col-md-9 col-sm-9 col-xs-12 left">
        <div class="news-detail">
          <div class="detail">
            <h1 class="title"><?php echo $tieu_de; ?></h1>
            <p class="info">Ngày đăng: <?php echo $date_update; ?> - Lượt xem: <?php echo $luot_xem; ?></p>
            <div class="content_news"><?php echo $noi_dung;?></div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3 col-xs-12 pt-3 right">
        <section class="sidebar-block-right">
          <h3>Tin tức nổi bật</h3>
          <ul class="sidebar-content">
            <?php
            $results = $item->get_hotnews();
            while ($set = $results->fetch()) :
            ?>
            <li>
              <article>
                <a class="img" href="index.php?action=news&act=news_detail&id=<?php echo $set['tintuc_id']; ?>">
                  <img src="<?php echo $set['image_tintuc'];?>" alt="">
                </a>
                <h3>
                  <a href="index.php?action=news&act=news_detail&id=<?php echo $set['tintuc_id']; ?>">
                    <?php echo $set['tieu_de']; ?>
                  </a>
                </h3>
              </article>
            </li>

            <?php
            endwhile
            ?>

          </ul>
        </section>
      </div>
    </div>
    <section id="news" class="block-news">
      <div class="block-title">
        <h2 class="title"><a style="pointer-events: none;">Tin tức cùng danh mục</a></h2>
      </div>
      <div class="block-content">
        <div class="row">
          <!-- gọi dữ liệu ngẫu nhiên cùng danh mục -->
          <?php
          $news = new news();
          $results = $news->gettype_news($loai_tintuc_id);
          while ($set = $results->fetch()) :
          ?>
            <!-- thông tin tin tức -->
          <div class="col-md-3 col-sm-6 col-xs-12 wrap-item">
            <div class="item">
              <span hidden="hidden"><?php echo $set['loai_tintuc_id'].$set['tintuc_id']; ?></span>
              <div class="item-content">
                <a href="index.php?action=news&act=news_detail&id=<?php echo $set['tintuc_id']; ?>" class="img">
                  <img src="<?php echo $set['image_tintuc']; ?>" class="item-img" alt="...">
                </a>
                <div class="item-body">
                  <h3 class="item-title">
                    <a href="index.php?action=news&act=news_detail&id=<?php echo $set['tintuc_id']; ?>">
                      <?php echo $set['tieu_de'] ?>
                    </a>
                  </h3>
                  <div class="item-time">
                    <i class="fas fa-clock" aria-hidden="true"></i> <?php echo $set['date_update'] ?>
                  </div>
                  <div class="item-info"><?php echo $set['mota_ngan'] ?></div>
                  <div class="view_all">
                    <a href="index.php?action=news&act=news_detail&id=<?php echo $set['tintuc_id']; ?>">
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
    </section>
  </div>
</section>