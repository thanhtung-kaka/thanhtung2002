<!-- trang quản lý loại sản phẩm dung(20/06/2922) -->
<?php
if(isset($id))
{
    $staAcc= new Admin();
    $results=$staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
}
if($results['statusAcc']!=0):
?>
<div class="row">
    <div class="text-center mt-3">
        <h3>Thuộc tính sản phẩm</h3>
    </div>
    <!-- loại sản phẩm -->
    <div class="col-md-12">
        <!-- <div>
            <h6>Bảng loại sản phẩm</h6>
        </div> -->
        <div>
            <div class=" mb-2">
                <!-- them sp -->
                <div>
                    <div class="text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <a></a><i class="fas fa-plus "></i> Thêm thuộc tính mới
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60% !important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Thêm thuộc tính sản phẩm
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="m-3 ">

                                        <form action="index.php?action=sanpham&act=add_attr_sp" class="form" name="form" method="post" enctype='multipart/form-data'>
                                            <div class="row">
                                                <table class="col-md-12">
                                                    <input type="hidden" name="masp" value="<?php if (isset($_GET['masp']) && $_GET['masp'] != '') {
                                                                                                echo $_GET['masp'];
                                                                                            } ?>" readonly>
                                                    <tr>
                                                        <td class="w-25">Giá</td>
                                                        <td>
                                                            <input type="number" name="dongia" class="form-control w-75 mt-3" placeholder="Nhập giá">
                                                            <span class="error "><?php if (isset($Err_dongia)) echo $Err_dongia; ?></span>
                                                        </td>
                                                    </tr>
                                                    <!-- khuyến mãi -->
                                                    <tr>
                                                        <td class="w-25">Khuyến mãi</td>
                                                        <td><input type="number" class="form-control w-75 mt-3" name="giamgia" placeholder="Nhập giá khuyến mãi nếu có">
                                                            <span class="error "><?php if (isset($Err_giamgia)) echo $Err_giamgia; ?></span>
                                                        </td>
                                                    </tr>
                                                    <!-- số lượng tồn -->
                                                    <tr class="">
                                                        <td class="w-25">Số lượng tồn</td>
                                                        <td><input type="number" class="form-control w-75 mt-3" name="soluongton" placeholder="Nhập số lượng tồn">
                                                            <span class="error "><?php if (isset($Err_slton)) echo $Err_slton; ?></span>
                                                        </td>
                                                    </tr>
                                                    <!-- size -->
                                                    <tr>
                                                        <td class="w-25">Kích cỡ</td>
                                                        <td>
                                                            <select class="form-select w-75  mt-3 " style="text-transform: capitalize;" name="size" id="">
                                                                <option selected value="">Chọn size</option>
                                                                <?php

                                                                $sp = new sanpham();
                                                                $res = $sp->getListSize();
                                                                while ($set = $res->fetch()) :
                                                                ?>

                                                                    <option value="<?php echo $set['ma_size'] ?>"><?php echo $set['so_size'] ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                            <span class="error "><?php if (isset($Err_size)) echo $Err_size; ?></span>
                                                        </td>

                                                    </tr>
                                                    <!-- color -->
                                                    <tr>
                                                        <td class="w-25">Màu sắc</td>
                                                        <td>
                                                            <select class="form-select w-75  mt-3 " style="text-transform: capitalize;" name="mausac" id="">
                                                                <option selected value="">Chọn màu</option>
                                                                <?php

                                                                $sp = new sanpham();
                                                                $res = $sp->getListMau();
                                                                while ($set = $res->fetch()) :
                                                                ?>

                                                                    <option value="<?php echo $set['mamau'] ?>"><?php echo $set['tenmau'] ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                            <span class="error "><?php if (isset($Err_mausac)) echo $Err_mausac; ?></span>
                                                        </td>
                                                    </tr>
                                                    <!-- trạng thái -->
                                                    <tr>
                                                        <td class="w-25">Trạng thái</td>
                                                        <td>
                                                            <select class="form-select w-75 mb-3 mt-3" style="text-transform: capitalize;" name="status">
                                                                <option selected value="0">Trạng thái</option>
                                                                <option value="1">Hiển thị thuộc tính</option>
                                                                <option value="0">Ẩn thuộc tính</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- hình -->
                                                    <tr>
                                                        <td class="w-25">Hình</td>
                                                        <td><label for="file"><img src="assets/images/image.jpg" id="image_url" alt="...ảnh hư" class="txt_img"></label>
                                                            <input type="text" name="link_url" value="" hidden id="link_url">
                                                            <input type="file" name="file" accept=".png,.jpg,.jpeg,.gif" hidden id="file">
                                                            <span class="error "><?php if (isset($Err_hinh)) echo $Err_hinh; ?></span>
                                                            <br>
                                                            <div id="upload_img" class="btn btn-success mb-2">Lưu ảnh</div>
                                                        </td>

                                                    </tr>


                                                </table>
                                            </div>
                                            <div class="text-center mt-4">
                                                <button class="btn btn-primary" type="submit" name="submit">Lưu</button>
                                                <div class="btn btn-primary" data-bs-dismiss="modal">Thoát</div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- hiện danh mục các sản phẩm -->
            <div class="table-responsive" id="thuoctinh_table">
                <!-- bang hien thi san pham -->
                <table class="table table-hover">
                    <thead class="text-center bg bg-primary text-light" role="rowgroup">
                        <tr>
                            <th>STT</th>
                            <th><a href="#" class="column_sort_attr text-light" id="dongia" data-sort="desc" data-masp="<?php echo $_GET['masp']?>">Đơn giá</a></th>
                            <th><a href="#" class="column_sort_attr text-light" id="giamgia" data-sort="desc" data-masp="<?php echo  $_GET['masp']?>">Giảm giá</a></th>
                            <th><a href="#" class="column_sort_attr text-light" id="soluongton" data-sort="desc" data-masp="<?php echo $_GET['masp']?>">Số lượng tồn</a></th>
                            <th><a href="#" class="column_sort_attr text-light" id="masize" data-sort="desc" data-masp="<?php echo $_GET['masp']?>">Size</a></th>
                            <th><a href="#" class="column_sort_attr text-light" id="mamau" data-sort="desc" data-masp="<?php echo $_GET['masp']?>">Màu sắc</a></th>
                            <th>Hình ảnh</th>
                            <th>Sửa chữa</th>
                        </tr>
                    </thead>



                    <tbody class="text-center text-secondary">
                        <?php

                        $sp = new sanpham();
                        if (isset($_GET['masp']) && $_GET['masp'] != '') :
                            $masp = $_GET['masp'];
                            //lấy các sản phẩm của trang
                            $results = $sp->getListAttrSp($masp);
                            $stt = 1;
                            while ($set = $results->fetch()) :
                        ?>
                                <tr>
                                    <td><?php echo $stt++ ?></td>
                                    <td><?php echo number_format($set['dongia']) ?><sup>đ</sup></td>
                                    <td><?php echo number_format($set['giamgia']) ?><sup>đ</sup></td>
                                    <td><?php echo $set['soluongton'] ?> </td>
                                    <td style="text-transform: capitalize;">
                                        <?php
                                        if (!empty($set['masize'])) {
                                            $size = $sp->getSizeSp($set['masize']);
                                            if (isset($size['so_size']) && $size['so_size'] != '') {
                                                echo $size['so_size'];
                                            } else {
                                                echo 'null';
                                            }
                                        } else {
                                            echo 'rỗng';
                                        }

                                        ?>
                                    </td>
                                    <td style="text-transform: capitalize;">
                                        <?php
                                        if (!empty($set['mamau'])) {
                                            $mausac = $sp->getMauSp($set['mamau']);
                                            if (isset($mausac['tenmau']) && $mausac['tenmau' != '']) {
                                                echo $mausac['tenmau'];
                                            } else {
                                                echo 'null';
                                            }
                                        } else {
                                            echo 'rỗng';
                                        }
                                        ?>
                                    </td>


                                    <td><img src="<?php echo $set['hinh'] ?>" alt="" height=50px width=50px></td>

                                    <td class="text-center">
                                        <?php
                                        if ($set['status'] == 0) {
                                            echo '<span id="status_attr' . $set['matt'] . '"><span class="me-2 status_attr" data-status="0" data-matt="' . $set['matt'] . '" data-masp="'.$set['masp'].'"><i class="fas fa-eye-slash" ></i></span></span>';
                                        } else {
                                            echo '<span id="status_attr' . $set['matt'] . '"><span class="me-2 status_attr" data-status="1" data-matt="' . $set['matt'] . '" data-masp="'.$set['masp'].'"><i class="fas fa-eye" ></i></span></span>';
                                        }
                                        ?>
                                        <a href="index.php?action=sanpham&act=edit_attr&matt=<?php echo $set['matt'] ?>"><i class="fas fa-edit me-2 text-warning"></i></a>
                                        <span onclick="remove('index.php?action=sanpham&act=remove_attr_sp&masp=<?php echo $_GET['masp'] ?>&matt=<?php echo $set['matt'] ?>')"><i class="fas fa-trash-alt text-danger"></i></span>
                                    </td>
                                </tr>


                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
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