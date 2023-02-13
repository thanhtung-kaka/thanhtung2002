<!-- phân trang sản phẩm dung 22/06/2022-->
<div class="text-end mb-5 mt-2 me-5">
    <nav class="page-nav">
        <ul class="pagination ">

            <?php
            //prev

            if ($current_page > 1 && $page > 1) {
            ?>
                <li><a href="index.php?action=sanpham&act=sanpham&page=<?php echo $current_page - 1; ?>&limit=<?php echo $limit ?><?php if(isset($_GET['filter_loaisp'])&& $_GET['filter_loaisp']!=''){ echo '&filter_loaisp='.$_GET['filter_loaisp']; } ?>" class="page-link text-secondary">Prev</a></li>
            <?php
            }
            for ($i = 1; $i <= $page; $i++) {
            ?>
                <li><a href="index.php?action=sanpham&act=sanpham&page=<?php echo $i ?>&limit=<?php echo $limit ?><?php if(isset($_GET['filter_loaisp'])&& $_GET['filter_loaisp']!=''){ echo '&filter_loaisp='.$_GET['filter_loaisp']; } ?>" class="page-link text-secondary"><?php echo $i ?></a></li>
            <?php
            }
            //next
            if ($current_page < $page && $page > 1) {
            ?>
                <li><a href="index.php?action=sanpham&act=sanpham&page=<?php echo $current_page + 1 ?>&limit=<?php echo $limit ?><?php if(isset($_GET['filter_loaisp'])&& $_GET['filter_loaisp']!=''){ echo '&filter_loaisp='.$_GET['filter_loaisp']; } ?>" class="page-link text-secondary">Next</a></li>
            <?php

            }

            ?>
        </ul>
    </nav>
</div>