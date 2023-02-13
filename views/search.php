<section id="search">
  <div class="content-product">
    <div class="container">
      <?php //echo $_GET['table']; exit();?>
      <?php 
        if(isset($_GET['table']) && $_GET['table']=='sanpham'):
          $colum='tensp';
          $table=$_GET['table'];
          $search=$_GET['name'];
          $timkiem=new home();
          $results=$timkiem->search($table,$colum,$search);
          $count=$results->rowCount();
      ?>
      <div class="block-title text-center">
        <h2 class="title"><a href="" title="kết quả tìm kiếm"><?php echo 'Đã tìm thấy '.$count.' sản phẩm' ?></a></h2>
      </div>
      <div class="content">
        <div class="block-content">
          <div class="row">
          <?php
            if($count==0){
              echo '<h2 class="notsearch">không có sản phẩm bạn cần tìm</h2>';
            }else{
            while ($set = $results->fetch()) :
          ?>
            <div class="col-md-3 col-sm-6 col-xs-6 item">
              <div class="iframe">
                <div class="img">
                  <a href="index.php?action=sanpham&act=sp_detail&masp=<?php echo $set['masp'] ?>" 
                    title=""><img src="admin/<?php echo $set['hinh'];?>" alt=""></a>
                </div>
                <div class="info">
                  <h3>
                    <a href="index.php?action=sanpham&act=sp_detail&masp=<?php echo $set['masp'] ?>"
                       title="<?php echo $set['tensp'];?>"></a><?php echo $set['tensp'];?>
                  </h3>
                  <p><b class="price"><?php echo number_format($set['dongia']);?> Vnđ</b></p>
                  <a href="#" class="btn btn-primary ">Add to cart</a>
                </div>
              </div>
            </div>
            <?php
              endwhile;
            }
            ?>
          </div>
        </div>
      </div>
      <?php
        elseif(isset($_GET['table'])&&$_GET['table']=='tintuc'):
          $colums='tieu_de';
          $table=$_GET['table'];
          $search=$_GET['name'];
          $timkiem=new home();
          $results=$timkiem->search($table,$colums,$search);
          $sosp=$results->rowCount();
      ?>
      <div class="block-title text-center">
        <h2 class="title"><a href="" title="kết quả tìm kiếm"><?php echo 'Đã tìm thấy '.$sosp.' tin tức' ?></a></h2>
      </div>
      <div class="content">
        <div class="block-content">
          <div class="row">
            <?php
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
      <?php
        endif
      ?>
    </div>
  </div>
</section>