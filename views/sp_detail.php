<?php
$sp = new SanPham();
if (isset($_GET['masp']) && isset($_GET['matt'])) {
    $masp = $_GET['masp'];
    $matt = $_GET['matt'];
    $now = time();
    //views
    if (!isset($_SESSION['masp' . $masp])) {
        $_SESSION['expire' . $masp] = $now + 900;
        $_SESSION['masp' . $masp] = $masp;
        $views = $sp->getViews($masp);
        $sp->updateView($masp, $views['soluotxem']);
    } else {
        if ($now > $_SESSION['expire' . $masp]) {
            unset($_SESSION['masp' . $masp]);
            unset($_SESSION['expire' . $masp]);
        }
    }

    $res = $sp->getSPDetail($masp, $matt);

?>
    <div class="row mt-3">
        <div class="text-center mt-5 mb-5">
            <h3 class="title_sp ">
                <span class="bg bg-light text-danger"><i class="fab fa-battle-net"></i> Chi tiết sản phẩm <i class="fab fa-battle-net"></i></span>
            </h3>
        </div>
        <div class="col-md-6">
            <div class="text-end ">
                <div id="wrapper">
                    <div id="slider-wrap">
                        <ul id="slider">

                            <?php
                            $listhinh = $sp->getListHinh($res['masp']);
                            while ($set = $listhinh->fetch()) :
                                // if($set['hinh']==$res['hinh']){ 
                            ?>
                                <li data-color="#1abc9c">
                                    <div class="mt-2 text-center" style="text-transform: capitalize;">
                                        <h6>Màu <?php echo $set['tenmau'] ?></h6>

                                    </div>
                                    <a data-fancybox="gallery" href="<?php echo $set['hinh'] ?>"><img src="<?php echo $set['hinh'] ?>" class="img_spdetail"></a>
                                </li>
                            <?php
                            // }
                            endwhile;
                            ?>



                        </ul>

                        <!--controls-->
                        <div class="btns" id="next"><i class="fa fa-arrow-right"></i></div>
                        <div class="btns" id="previous"><i class="fa fa-arrow-left"></i></div>
                        <div id="counter"></div>

                        <div id="pagination-wrap">
                            <ul>
                            </ul>
                        </div>
                        <!--controls-->

                    </div>

                </div>



                <!-- cuối slide -->

            </div>
        </div>
        <div class=" ms-5 col-md-4">
            <div>
                <!-- mã sản phẩm và mà thuộc tính -->
                <input type="text" value="<?php echo $res['masp'] ?>" hidden id="masp">
                <div>
                    <h6 style="font-weight:600; font-size:18px">
                        <?php echo $res['tensp']; ?>
                    </h6>
                </div>
                <div>
                    <span>Số lượt xem: <?php echo $res['soluotxem'] ?></span>
                </div>
                <div id="attr_sp">
                    <div class="text-danger fw-bold mb-2" id="dongia">
                        <?php echo number_format($res['dongia']) ?><sup><u>đ</u></sup>
                    </div>
                    <div class="mb-3">
                        <select class="form-select select w-50 text-capitalize bg bg-outline-dark mausac" name="mausac" data-masp="<?php echo $res['masp'] ?>" id="mausac">
                            <!-- <option selected>Chọn màu</option> -->

                            <?php
                            $listmau = $sp->getListMau($res['masp']);
                            while ($set = $listmau->fetch()) :
                                if ($res['mamau'] == $set['mamau']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                            ?>
                                <option value="<?php echo $set['mamau']; ?>" <?php echo $selected ?>><?php echo $set['tenmau']; ?></option>

                            <?php endwhile;  ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <?php
                            $listSize = $sp->getListSize($res['masp']);
                            foreach ($listSize as $key => $size) {
                                if ($res['masize'] == $size['ma_size']) {
                                    $checked = 'checked';
                                } else {
                                    $checked = '';
                                }
                            ?>
                                <input type="radio" class="btn-check sizesp" name="size" id="btnSize<?php echo $size['so_size'] ?>" data-masp="<?php echo $res['masp'] ?>" <?php echo $checked ?> value="<?php echo $size['ma_size'] ?>" autocomplete="off">
                                <label class="btn btn-outline-dark" for="btnSize<?php echo $size['so_size'] ?>"><?php echo $size['so_size']; ?></label>
                            <?php } ?>

                        </div>

                    </div>
                    <!-- số lượng -->
                    <div>
                        <div class="input-group soluong mb-2">
                            <div class="input-group-text plus is-form"><i class="fas fa-plus"></i></div>
                            <input type="number" name="quantity" id="quantity" min="1" max=<?php
                                                                                            echo $res['soluongton'] ?> value="1">
                            <div class="input-group-text minus is-form"><i class="fas fa-minus"></i></div>
                            <div class="input-group-text ms-4">Còn <?php echo $res['soluongton'] ?> sản phẩm</div>
                        </div>


                    </div>
                </div>

            </div>


            <div class="mb-3">
                <div class="text-end mb-2">

                    <span style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#exampleModalChonSize">
                        Hướng dẫn chọn size
                    </span>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalChonSize" tabindex="-1" aria-labellespy="exampleModalLabelChonSize" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" style="max-width: 50% !important;">
                            <div class="modal-content">
                                <div class="modal-header ">
                                    <h4>Hướng dẫn chọn size giày</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="text-center fw-bold modal-body">
                                    B1: Đặt chân lên tờ giấy trắng và dùng bút vẽ bo hết 1 vòng bàn chân
                                    <div class="mt-4 mb-4">
                                        <img src="assets/images/b1.png" alt="">
                                    </div>
                                    B2: Dùng dây hoặc thước dây đo 1 vòng chân vị trí phần khớp hoặc phần rộng nhất lúc đang đức hoặc ngồi
                                    <div class="mt-3 mb-4">
                                        <img src="assets/images/b2.png" alt="">
                                    </div>
                                    B3: So sánh chiều dài và rộng với bảng size dưới đây
                                    <div class="text-center" style="display:inline-block;">
                                        <table id="customers">
                                            <tr>
                                                <th>Size</th>
                                                <th>Chiều dài (cm)</th>
                                                <th>Chiều rộng (cm)</th>
                                            </tr>
                                            <tr>
                                                <td>35</td>
                                                <td>21,7</td>
                                                <td>20,4</td>
                                            </tr>
                                            <tr>
                                                <td>36</td>
                                                <td>22,5</td>
                                                <td>20,9</td>
                                            </tr>
                                            <tr>
                                                <td>37</td>
                                                <td>23,1</td>
                                                <td>21,4</td>
                                            </tr>
                                            <tr>
                                                <td>38</td>
                                                <td>23,7</td>
                                                <td>21,9</td>
                                            </tr>
                                            <tr>
                                                <td>39</td>
                                                <td>24,4</td>
                                                <td>22,3</td>
                                            </tr>
                                            <tr>
                                                <td>40</td>
                                                <td>25,1</td>
                                                <td>22,9</td>
                                            </tr>
                                            <tr>
                                                <td>41</td>
                                                <td>25,9</td>
                                                <td>23,5</td>
                                            </tr>
                                            <tr>
                                                <td>42</td>
                                                <td>26,6</td>
                                                <td>24,1</td>
                                            </tr>
                                            <tr>
                                                <td>43</td>
                                                <td>27,3</td>
                                                <td>24,7</td>
                                            </tr>
                                            <tr>
                                                <td>44</td>
                                                <td>28,1</td>
                                                <td>25,5</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['id']) && $_SESSION['id'] != '') {
                    $addtocart = 'id="add-to-cart"';
                    $message = "";
                } else {
                    $addtocart = '';
                    // $message='onclick="return confirm('."'Vui lòng đăng nhập để mua hàng'".')"';
                    $message = "onclick='alertCheckLogin()'";
                }
                ?>
                <button type="button" class="text-uppercase btn btn-dark w-100" <?php echo $addtocart, $message; ?>>mua ngay</button>
            </div>

            <!-- </form> -->
            <div class="ship">
                <div class="fw-bold mb-3 text-uppercase">
                    Phí vận chuyển toàn quốc
                </div>
                <div class="mb-3">
                    <div class="fw-bold mb-2 text-uppercase">
                        Đổi trả miễn phí
                    </div>
                    <div>
                        Hỗ trợ dổi trả sản phẩm trong vòng 3 đến 5 ngày, nếu không vừa size, sản phẩm bị lỗi (giữ sản phẩm sạch và chưa qua sử dụng) bạn sẽ đổi hoặc trả sản phẩm mà không tốn phí.
                    </div>
                </div>
                <div class="">
                    <div class="fw-bold mb-1 text-uppercase">
                        Thanh toán
                    </div>
                    <div>
                        (Thanh toán khi nhận hàng)
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <!-- do something -->
        </div>
        <div class="col-md-10 txt_mota mt-4">
            <div>
                <span class="title_mota"><i class="fab fa-modx"></i> Mô tả</span>
                <div>
                    <?php echo $res['mota'] ?>
                </div>
            </div>

        </div>
        <div class="wrap_comment" id="comment">
            <div class="title_comment">
                <h5 class="fw-bold"><i class="fa fa-comments"></i> Bình Luận</h5>
            </div>
            <?php
            if (isset($_SESSION['id'])) {
            ?>
                <div class="editcmt">
                    <form action="index.php?action=comment&act=add_comment" method="post">
                        <input type="hidden" name="matt" value="<?php echo $matt; ?>">
                        <input type="hidden" name="masp" value="<?php echo $masp; ?>">
                        <input type="hidden" name="id_kh" value="<?php echo $_SESSION['id']; ?>">
                        <input type="hidden" name="ten_kh" value="<?php echo $_SESSION['ten_kh']; ?>">
                        <textarea name="desc" id="content" class="txtEditor" rows="" cols="" name="" placeholder="Mời bạn để lại bình luận..."></textarea>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary btn-comment">Đăng</button>
                        </div>
                    </form>
                </div>
            <?php
            } else {
            ?>
                <span class="notcmt">
                    <a href="index.php?action=login&act=login">Đăng nhập để bình luận sản phẩm</a>
                </span>
            <?php
            }
            $cmt = new comment();
            $results = $cmt->getcomment_sp($masp);
            $sount = $results->rowCount();
            ?>
            <div class="midcmt">
                <span class="totalcmt">
                    <?php echo $sount; ?> Bình luận
                </span>
            </div>
            <ul class="listcomment">
                <?php
                while ($set = $results->fetch()) :
                ?>
                    <li class="comment_ark">
                        <div class="rowuser">
                            <a>
                                <div>
                                <?php
                                    $us = new User();
                                    $result = $us->get_one_client($set['id_kh']);
                                    $img = $result['avatar'];
                                    if ($img != null || $img != '') {
                                        echo '<img src="' . $img . '" alt="" width="40px" height="40px" style="border-radius:20px; object-fit: cover;">';
                                    } else {
                                        echo '<img src="../assets/images/avatar_img/no-avatar.png" width="40px" height="40px" style="border-radius:20px; object-fit: cover;" alt="">';
                                    }
                                ?>
                                </div>
                                <strong><?php echo $set['ten_kh'] ?></strong>
                            </a>
                        </div>
                        <div class="question">
                            <?php echo $set['desc']; ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div>
            <div class="text-center mt-4 mb-3">
                <h3>Sản phẩm tương tự</h3>
            </div>
            <div class="row">
                <?php
                $similarProduct = $sp->getSimilarProduct($res['maloai_sp']);
                while ($set = $similarProduct->fetch()) {
                ?>
                    <div class="card me-2  text-center col-md-3" style="width:18rem">
                        <a href="index.php?action=sanpham&act=sp_detail&masp=<?php echo $set['masp'] ?>&matt=<?php echo $set['matt'] ?>"><img src="<?php echo $set['hinh'] ?>" class="card-img-top" alt="..." ></a>
                        <div class="card-body">
                            <a href="index.php?action=sanpham&act=sp_detail&masp=<?php echo $set['masp'] ?>&matt=<?php echo $set['matt'] ?>" title="<?php echo $set['tensp']; ?>">
                                <h6 class="card-title"><?php echo $set['tensp']; ?></h6>
                            </a>
                            <p class="card-text text-danger"><b><?php echo number_format($set['dongia']) ?><sup><u>đ</u></sup></b></p>
                        </div>
                        <!-- <div class="card-footer">
                                <button class="btn btn-primary ">Add to cart</button>
                            </div> -->
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    </div>
<?php
}
?>

</div>
<script>
    function alertCheckLogin() {
        Swal.fire({
            title: 'Vui lòng đăng nhập để mua hàng',
            showCancelButton: true,
            confirmButtonColor:'#009966',
            cancelButtonColor:'	#FF3333',
            confirmButtonText: 'Login',
            cancelButtonText: `Cancel`,
        }).then((result) => {
            if (result.isConfirmed) {
                document.location='index.php?action=login';
            }
        })
    }
</script>
