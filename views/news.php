<section id="news" class="block-news">
  <div class="item-cate-news">
    <ul class="row">
      <?php
        $news=new news();
        $results=$news->getloainews();
        foreach($results as $key => $set):
      ?>
      <li class="col-md-3 col-sm-4 col-xs-6" <?php if($key==0){echo 'hidden';} ?>>
        <h2><a href="index.php?action=news&act=news&type=<?php echo $set['loai_tintuc_id']; ?>"  title="<?php echo $set['ten_loai_tintuc']; ?>">
          <i class="fa fa-angle-double-right" aria-hidden="true"></i>
            <?php echo $set['ten_loai_tintuc']; ?></a></h2>
      </li>
      <?php
        endforeach;
      ?>
    </ul>
  </div>
  <div class="block-title">
    <h2 class="title"><a style="pointer-events: none;">TIN TỨC</a></h2>
  </div>
  <div class="block-content">
    <div class="row">
      <!-- gọi dữ liệu -->
      <?php
        $p = new Page();
        $limit = 4;
        $start = $p->findStart($limit);
        if (isset($_GET['type']) && $_GET['type'] != '') {
          $type=$_GET['type'];
          $results = $news->getnews_loai($type);
          //lấy số sản phẩm hiện có
          $count = $results->rowCount();
          //lấy các sản phẩm của trang
          $results = $news->getListPage_loai($start, $limit, $type);
        }else{
          $results=$news->getnews();
          //lấy số sản phẩm hiện có
          $count = $results->rowCount();
          //lấy các sản phẩm của trang
          $results = $news->getListPage($start, $limit);
        }
          //lấy số trang
          $page = $p->findPage($count, $limit);
          //lấy trang hiện tại
          $current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
          while ($set = $results->fetch()) :
      ?>
      <!-- thông tin tin tức -->
      <div class="col-md-3 col-sm-6 col-xs-12 wrap-item">
        <div class="item">
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
  <div class="text-center mb-5 mt-2 me-5" <?php if($page<2) echo 'hidden'; ?>>
      <nav class="page-nav" style="display: inline-block;">
        <ul class="pagination">
          <?php
            //prev
            if ($current_page > 1 && $page > 1) {
              if(isset($_GET['type'])&&$_GET['type']!=''){
                echo '<li><a href="index.php?action=news&act=news&type='.$_GET['type'].'&page='.($current_page - 1).'" class="page-link text-secondary">Prev</a></li>';
              }else{
              echo '<li><a href="index.php?action=news&act=news&page='.($current_page - 1).'" class="page-link text-secondary">Prev</a></li>';
              }
            }
            for ($i = 1; $i <= $page; $i++) {
          ?>
          <li>
            <a href="index.php?action=news&act=news<?php if(isset($_GET['type'])&&$_GET['type']!=''){echo '&type='.$_GET['type'];}?>&page=<?php echo $i ?>"
              class="page-link text-secondary"><?php echo $i ?></a>
          </li>
          <?php
            }
            //next
            if ($current_page < $page && $page > 1) {
              if(isset($_GET['type'])&&$_GET['type']!=''){
                echo '<li><a href="index.php?action=news&act=news&type='.$_GET['type'].'&page=' . ($current_page + 1) . '" class="page-link text-secondary">Next</a></li>';
              }else{
                echo '<li><a href="index.php?action=news&act=news&page=' . ($current_page + 1) . '" class="page-link  text-secondary">Next</a></li>';
              }
            }
          ?>
        </ul>
      </nav>
    </div>
</section>