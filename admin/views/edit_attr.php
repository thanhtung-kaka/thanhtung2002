
<?php
//xin phép bạn dũng văn bắt trạng thái tài khoản ở đây 
if(isset($id))
{
    $staAcc= new Admin();
    $results=$staAcc->get_one_statusAcc($id);
    // echo $results['statusAcc'];
}
if($results['statusAcc']!=0):
?>
<div class="content">
    <div class="mt-3 text-center">
        <div class="ms-3 text-start text-primary" onclick="history.back()"><i class="fas fa-angle-left" style="font-size:30px"></i></div>
        <h3 class="text-warning">
            Sửa thuộc tính sản phẩm
        </h3>
    </div>
    <div class="mt-4">
        <div class="m-3 ">

            <?php
            //lấy dữ liệu sản phẩm cần sửa ra để sửa
            if (isset($_GET['matt']) && $_GET['matt']!='') {
                $sp = new sanpham();
                
                $result = $sp->getOneAttr($_GET['matt']);
                $masp = $result['masp'];
                $dongia = $result['dongia'];
                $giamgia = $result['giamgia'];
                $slton = $result['soluongton'];
                $size = $result['masize'];
                $mausac = $result['mamau'];
                $hinh = $result['hinh'];
                $status = $result['status'];
                $matt=$result['matt'];
            }
            ?>
            <form action="index.php?action=sanpham&act=edit_attr_sp" class="form" name="form" method="post" enctype='multipart/form-data'>
                <div class="row">
                    <table class="col-md-12">
                        <input type="hidden" name="masp" value="<?php echo $masp ?>" readonly>
                        <input type="hidden" name="matt" value="<?php echo $matt ?>" readonly>
                        <tr>
                            <td class="w-25">Giá</td>
                            <td><input type="number" name="dongia" class="form-control w-75 mt-3" placeholder="Nhập giá" value="<?php echo $dongia  ?>">
                                <span class="error "><?php if (isset($Err_dongia)) echo $Err_dongia; ?></span>
                            </td>
                        </tr>
                        <!-- khuyến mãi -->
                        <tr>
                            <td class="w-25">Khuyến mãi</td>
                            <td><input type="number" class="form-control w-75 mt-3" name="giamgia" value="<?php echo $giamgia  ?>" placeholder="Nhập giá khuyến mãi nếu có">
                                <span class="error "><?php if (isset($Err_giamgia)) echo $Err_giamgia; ?></span>
                            </td>
                        </tr>
                        <!-- số lượng tồn -->
                        <tr class="">
                            <td class="w-25">Số lượng tồn</td>
                            <td><input type="number" class="form-control w-75 mt-3" name="soluongton" placeholder="Nhập số lượng tồn" value="<?php echo $slton  ?>">
                                <span class="error "><?php if (isset($Err_slton)) echo $Err_slton; ?></span>
                            </td>
                        </tr>
                        <!-- kích cỡ -->
                        <tr>
                            <td class="w-25">Kích cỡ</td>
                            <td>
                                <select class="form-select w-75  mt-3" name="size" style="text-transform: capitalize;">
                                    <option selected value="">Chọn size sản phẩm</option>
                                    <?php
                                    $sp = new sanpham();
                                    $res = $sp->getListSize();
                                    while ($set = $res->fetch()) :
                                    ?>

                                        <option value="<?php echo $set['ma_size'] ?>" <?php if ($size == $set['ma_size']) { ?>selected<?php } ?>><?php echo $set['so_size'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <span class="error "><?php if (isset($Err_size)) echo $Err_size; ?></span>
                            </td>
                        </tr>
                        <!-- màu sắc -->
                        <tr>
                            <td class="w-25">Màu sắc</td>
                            <td>
                                <select class="form-select w-75  mt-3 mb-3" name="mausac" style="text-transform: capitalize;">
                                    <option selected value="">Chọn màu sản phẩm</option>
                                    <?php
                                    $sp = new sanpham();
                                    $res = $sp->getListMau();
                                    while ($set = $res->fetch()) :
                                    ?>

                                        <option value="<?php echo $set['mamau'] ?>" <?php if ($mausac == $set['mamau']) { ?>selected<?php } ?>><?php echo $set['tenmau'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                                <span class="error "><?php if (isset($Err_mausac)) echo $Err_mausac; ?></span>
                            </td>
                            </td>
                        </tr>
                        <!-- trạng thái -->
                        <tr>
                            <td class="w-25">Trạng thái</td>
                            <td>
                                <select class="form-select w-75 mt-3 mb-3" style="text-transform: capitalize;" name="status">
                                    <option selected value="">Trạng thái</option>
                                    <option value="1" <?php if($status==1){echo 'selected';}?> >Hiển thị thuộc tính</option>
                                    <option value="0" <?php if($status==0){echo 'selected';}?> >Ẩn thuộc tính</option>
                                </select>
                            </td>
                        </tr>
                        <!-- Hình -->
                        <tr>
                            <td class="w-25">Hình</td>
                            <td>
                                <label for="file"><img src="<?php echo $hinh ?>" alt="" id="image_url" class="txt_img"></label>
                                <input type="text" id="link_url" value="<?php echo $hinh ?>" hidden name="link_url">
                                <input type="file" id="file" hidden accept=".png,.jpeg,.jpg,.gif" name="hinh">

                                <!-- <span class="status ms-4 text-danger"></span> -->
                                <span class="error "><?php if (isset($Err_hinh)) echo $Err_hinh; ?></span>
                                <br>
                                <div id="upload_img" class="btn btn-success mb-3 ">Lưu hình</div>

                            </td>
                        </tr>
                        
                    </table>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit" name="submit">Lưu</button>
                    <!-- <button class="btn btn-primary" data-bs-dismiss="modal">Thoát</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<?php
else : 
    echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
endif;
?>