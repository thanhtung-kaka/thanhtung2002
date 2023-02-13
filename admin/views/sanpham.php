<!--trang sản phẩm của admin dũng 15062022 -->
<?php
if (isset($_GET['act'])) {
    if ($_GET['act'] == 'search') {
        $ac = 'search';
    } else {
        $ac = 'sanpham';
    }
    $limit = isset($_GET['limit']) && $_GET['limit'] != '' ? $_GET['limit'] : 25;
}
//xin phép bạn dũng văn bắt trạng thái tài khoản ở đây 
if (isset($id)) {
    $staAcc = new Admin();
    $results = $staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
}
if ($results['statusAcc'] != 0) :

?>
    <div>
        <div class="text-center mt-3">
            <h3>Quản lý sản phẩm </h3>
        </div>
        <hr>
        <div class="row mt-4 mb-4 ms-4">
            <?php if ($ac == "sanpham") { ?>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Tác vụ</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            <?php } ?>
            <!-- search -->
            <div class="col-md-3">

                <form action="index.php?action=sanpham&act=search" class="form" method='post'>
                    <div class="input-group">
                        <input type="text" class="form-control" name="searchQuery" id="">
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>

            <?php
            //nếu act là sản phẩm thì hiện ra 
            if ($ac == "sanpham") {

            ?>
                <!-- filter theo loại sản phẩm -->
                <div class="col-md-3">
                    <select class="form-select" style="text-transform: capitalize;" id="filter_loai_sp" onchange="f_filter_loai_sp()">
                        <option selected value="">Loại sản phẩm</option>
                        <?php
                        $sp = new sanpham();
                        $res = $sp->getListLoaiSp();
                        while ($set = $res->fetch()) :
                        ?>
                            <option value="<?php echo $set['maloai_sp'] ?>" <?php if (isset($_GET['filter_loaisp']) && $_GET['filter_loaisp'] == $set['maloai_sp']) {
                                                                                echo 'selected';
                                                                            } ?>>
                                <?php echo $set['tenloai'] ?>
                            </option>
                        <?php endwhile; ?>
                        <option value="0" <?php if (isset($_GET['filter_loaisp']) && $_GET['filter_loaisp'] == 0) {
                                                echo 'selected';
                                            } ?>>Chưa phân loại</option>
                    </select>
                </div>
                <!-- hiển thị số sản phẩm trong một trang  -->
                <div class="col-md-2">
                    <select class="form-select" id="limitpage" onchange="function_limit_page()">
                        <option value="25">Hiển thị số sản phẩm</option>
                        <option value="50" <?php if (isset($_GET['limit']) && $_GET['limit'] == 50) {
                                                echo 'selected';
                                            } ?>>50</option>
                        <option value="100" <?php if (isset($_GET['limit']) && $_GET['limit'] == 100) {
                                                echo 'selected';
                                            } ?>>100</option>
                        <option value="250" <?php if (isset($_GET['limit']) && $_GET['limit'] == 250) {
                                                echo 'selected';
                                            } ?>>250</option>
                        <option value="500" <?php if (isset($_GET['limit']) && $_GET['limit'] == 500) {
                                                echo 'selected';
                                            } ?>>500</option>

                    </select>
                </div>
            <?php
            }
            ?>
            <!-- them sp -->
            <div class="col-md-2">

                <button type="button" class="button-30" data-bs-toggle="modal" data-bs-target="#modalsProduct">
                    <a></a><i class="fas fa-plus "></i> Thêm mới
                </button>

                <?php include 'modals/modal-sanpham.php' ?>
            </div>

        </div>
        <hr>
        <div class="text-end me-5">
            <div class="mb-3 d-inline-block ">
                <div class="button-30" data-bs-toggle="modal" data-bs-target="#import-data">import data</div>
                <!-- modal import -->
                <div class="modal fade text-start" id="import-data" tabindex="-1" aria-labelledby="import-label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="import-label"> <i class="fas fa-file-import fs-4 text-success"></i> Import Products</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="w-100">
                                    <tr>
                                        
                                        <td class="w-25 text-center" style="font-size: 20px;font-weight:400;">File</td>
                                        <td>
                                            <input type="text" disabled value class="input-import form-control d-inline-block w-75" id="tenFile">
                                            <label for="file"><span class="btn button-42" role="button"><i class="fas fa-upload"></i></span></label>
                                            <input type="file" hidden name="import-product" id="files" accept=".xls,.xlsx">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="save-files">Start</button>
                                <button type="button" class="btn btn-primary"  data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- export data-->
            <div class="mt-1 d-inline-block">
                <form action="models/export.php" method="post">
                    <button class="button-30" type="submit" name="export-data-product">Export</button>
                </form>
            </div>
        </div>
            
        <div class="table-responsive" id="sanpham_table">
            <!-- bang hien thi san pham -->
            <table class="table table-hover">
                <thead class="text-center bg bg-primary text-light" role="rowgroup">
                    <tr>
                        <th>STT</th>
                        <th><a class="column_sort_sp text-light" id="tensp" data-sort="desc" data-limit="<?php echo $limit ?>" href="#">Tên sản phẩm</a></th>

                        <th><a href="#" class="column_sort_sp text-light" id="maloai_sp" data-sort="desc" data-limit="<?php echo $limit ?>">Loại sản phẩm</a></th>


                        <th><a href="#" class="column_sort_sp text-light" id="soluotxem" data-sort="desc" data-limit="<?php echo $limit ?>">Số lượt xem</a></th>
                        <th>Sửa chữa</th>
                    </tr>
                </thead>



                <tbody class="text-center text-secondary">
                    <?php

                    $sp = new sanpham();
                    $p = new Page();


                    $start = $p->findStart($limit);
                    if ($ac == 'search') {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $namesearch = $_POST['searchQuery'];

                            $results = $sp->searchSp($namesearch);
                            $countSearch = $results->rowCount();
                            echo '<h6 class="ms-2 mb-3">Đã tìm thấy ' . $countSearch . ' sản phẩm</h6>';
                        }
                    } else {

                        if (isset($_GET['filter_loaisp']) && $_GET['filter_loaisp'] != '') {
                            $loai_sp = $_GET['filter_loaisp'];
                            $results = $sp->getlistsp_loai($loai_sp);
                            //lấy số sản phẩm hiện có
                            $count = $results->rowCount();
                            //lấy các sản phẩm của trang
                            $results = $sp->getListPage_loai($start, $limit, $loai_sp);
                        } else {

                            $results = $sp->getlistsp();
                            //lấy số sản phẩm hiện có
                            $count = $results->rowCount();
                            //lấy các sản phẩm của trang
                            $results = $sp->getListPage($start, $limit);
                        }

                        //lấy số trang
                        $page = $p->findPage($count, $limit);
                        //lấy trang hiện tại
                        $current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
                    }
                    $stt = 1;
                    while ($set = $results->fetch()) :
                    ?>
                        <tr>
                            <td><?php echo $stt++ ?></td>
                            <td><?php echo $set['tensp'] ?></td>
                            <td style="text-transform: capitalize;">
                                <?php
                                if (!empty($set['maloai_sp'])) {
                                    $loai_sp = $sp->getLoaisp($set['maloai_sp']);
                                    if (isset($loai_sp['tenloai']) && $loai_sp['tenloai'] != '') {
                                        echo $loai_sp['tenloai'];
                                    } else {
                                        echo 'rỗng';
                                    }
                                }
                                ?>
                            </td>


                            <td><?php echo $set['soluotxem'] ?></td>
                            <td class="text-center">
                                <?php
                                if ($set['status'] == 0) {
                                    echo '<span class="trangthai" id="status' . $set['masp'] . '"><span class="me-2 status" data-status="0" data-masp="' . $set['masp'] . '"><i class="fas fa-eye-slash" ></i></span></span>';
                                } else {
                                    echo '<span class="trangthai" id="status' . $set['masp'] . '"><span class="me-2 status" data-status="1" data-masp="' . $set['masp'] . '"><i class="fas fa-eye" ></i></span></span>';
                                }
                                ?>

                                <a href="index.php?action=sanpham&act=thuoctinh_sp&masp=<?php echo $set['masp'] ?>" class="me-2"><i class="fas fa-dolly text-success"></i></a>

                                <i class="fas fa-edit me-2 text-warning" data-bs-toggle="modal" data-bs-target="#modalsProduct<?php echo $set['masp'] ?>"></i>

                                <?php include 'modals/modal-sanpham.php' ?>
                                <span onclick="remove('index.php?action=sanpham&act=xoasp&masp=<?php echo $set['masp'] ?>')"><i class="fas fa-trash-alt text-danger"></i></span>
                            </td>
                        </tr>


                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php
            if ($ac == "sanpham") {
                include 'pagination.php';
            }
            ?>
        </div>

    </div>
    </div>
    </div>
<?php
else :
    echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
endif;
?>

<script>
    function function_limit_page() {
        var limitpage = document.getElementById('limitpage').value;
        window.location = 'http://shopgiay.local/admin/index.php?action=sanpham&act=sanpham&limit=' + limitpage;
    }

    function f_filter_loai_sp() {
        var filter_loai_sp = document.getElementById('filter_loai_sp').value;
        window.location = 'http://shopgiay.local/admin/index.php?action=sanpham&act=sanpham&filter_loaisp=' + filter_loai_sp + '&limit=<?php if (isset($_GET['limit']) && $_GET['limit'] != '') {
                                                                                                                                            echo $_GET['limit'];
                                                                                                                                        } else {
                                                                                                                                            echo 25;
                                                                                                                                        } ?>';
    }
</script>