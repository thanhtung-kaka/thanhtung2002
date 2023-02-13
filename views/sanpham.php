<!-- sản phẩm dung(16062022) -->
<div class="text-center mt-5 mb-3">
    <h3 class="title_sp ">
        <span class="bg bg-light text-danger ">
            <img src="assets/images/product-removebg-preview.png" height="30px" width="30px" alt="">
            <span class="text">Products</span>
        </span>
    </h3>
</div>
<div class="row">
    <div class="col-md-3">
        <div>
            <div class="text-center">
                <h4>Filter Product</h4>
            </div>
            <div class="list-group mt-3">
                <h3>Price</h3>
                <input type="hidden" id="hidden_minimum_price" value="0" />
                <input type="hidden" id="hidden_maximum_price" value="2000000" />
                <p id="price_show">1,000<sup>đ</sup> - 2,000,000<sup>đ</sup></p>
                <div class="price-range-slider mb-3 text-center">
                    <div id="slider-range" class="range-bar"></div>
                </div>

            </div>
            <div class="list-group text-start">
                <h3>Category</h3>
                <div class="category_pd hidden-scrollbar display-scrollbar">
                    <?php
                    $sp = new SanPham();
                    $res = $sp->getListCategory();
                    foreach ($res as $row) {
                    ?>
                        <div class="list-group-item checkbox text-capitalize">
                            <label><input type="checkbox" class="common_selector category" value="<?php echo $row['madm_sp']; ?>"> <?php echo $row['tendm']; ?></label>
                            <div>
                                <?php
                                $result = $sp->getListProductType($row['madm_sp']);
                                foreach ($result as $set) {
                                ?>
                                    <div class="list-group-item checkbox text-capitalize">
                                        <label><input type="checkbox" class="common_selector productType" value="<?php echo $set['maloai_sp']; ?>"> <?php echo $set['tenloai']; ?></label>
                                    </div>
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                    <?php
                    }

                    ?>
                </div>
            </div>
            <div class="list-group text-start mt-2">
                <h3>Size</h3>
                <div class="size_pd hidden-scrollbar display-scrollbar">
                    <?php
                    $sp = new SanPham();
                    $res = $sp->getAllSize();
                    foreach ($res as $row) {
                    ?>
                        <div class="list-group-item checkbox text-capitalize">
                            <label><input type="checkbox" class="common_selector filterSize" value="<?php echo $row['ma_size']; ?>"> <?php echo $row['so_size']; ?></label>
                        </div>
                    <?php
                    }

                    ?>
                </div>
            </div>
            <div class="list-group text-start mt-2">
                <h3>Màu sắc</h3>
                <div class="color-product hidden-scrollbar display-scrollbar">

                    <?php
                    $sp = new SanPham();
                    $res = $sp->getAllColor();
                    foreach ($res as $row) {
                    ?>
                        <div class="list-group-item checkbox text-capitalize">
                            <label><input type="checkbox" class="common_selector filterColor" value="<?php echo $row['mamau']; ?>"> <?php echo $row['tenmau']; ?></label>
                        </div>
                    <?php
                    }

                    ?>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-9">
        <div class="content-product ">

            <div class="content">
                <div class="block-content">
                    <div class="row filter-data">
                        <?php

                        $p = new Page();
                        $limit = 12;
                        $start = $p->findStart($limit);
                        //tìm số sản phẩm có trong data
                        $res = $sp->getlistsp();
                        //lấy số sản phẩm hiện có 
                        $count = $res->rowCount();
                        //tìm số trang 
                        $page = $p->findPage($count, $limit);
                        $results = $sp->getlistPage($start, $limit);
                        //kiểm tra đang đứng ở trang nào
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        while ($set = $results->fetch()) :
                        ?>
                            <div class="col-md-3 col-sm-6 col-xs-6 item">
                                <div class="iframe">
                                    <div class="img">
                                        <a href="index.php?action=sanpham&act=sp_detail&masp=<?php echo $set['masp'] ?>&matt=<?php echo $set['matt'] ?>" title=""><img src="<?php echo $set['hinh']; ?>" alt=""></a>
                                    </div>
                                    <div class="info">
                                        <h3>
                                            <a class="h6" href="index.php?action=sanpham&act=sp_detail&masp=<?php echo $set['masp'] ?>&matt=<?php echo $set['matt'] ?>" title="<?php echo $set['tensp']; ?>"><?php echo $set['tensp']; ?></a>
                                        </h3>
                                        <div class="mt-2"><span class="text-capitalize "><?php echo $set['tenmau']; ?> </span></div>
                                        <p><b class="price"><?php echo number_format($set['dongia']); ?> <sup>đ</sup></b></p>
                                        <!-- <button id="add-to-cart" class="btn btn-primary ">Add to cart</button> -->
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        ?>
                        <div class="text-center mt-3 mb-4" <?php if($page<2) echo 'hidden'; ?>>
                            <nav class="nav-page">
                                <ul class="pagination m-auto">
                                    <?php

                                    if ($current_page > 1 && $page > 1) {
                                        echo '<li><a href="index.php?action=sanpham&act=sanpham&page=' . ($current_page - 1) . '" class="page-link text-secondary">Prev</a></li>';
                                    }
                                    for ($i = 1; $i <= $page; $i++) {
                                    ?>
                                        <li><a href="index.php?action=sanpham&act=sanpham&page=<?php echo $i ?>" class="page-link text-secondary"><?php echo $i ?></a></li>
                                    <?php
                                    }
                                    //next
                                    if ($current_page < $page && $page > 1) {
                                        echo '<li><a href="index.php?action=sanpham&act=sanpham&page=' . ($current_page + 1) . '" class="page-link text-secondary">Next</a></li>';
                                    }

                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>