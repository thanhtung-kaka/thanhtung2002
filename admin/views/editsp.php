
<?php
// if(isset($id))
// {
//     $staAcc= new Admin();
//     $results=$staAcc->get_one_statusAcc($id);
//     // echo $results['statusAcc'];
// }
// if($results['statusAcc']!=0):
?>
<div class="content">
    <div class="mt-3 text-center">
        <div class="ms-3 text-start text-primary" onclick="history.back()"><i class="fas fa-angle-left" style="font-size:30px"></i></div>
        <h3 class="text-warning">
            Sửa sản phẩm
        </h3>
    </div>
    <div class="mt-4">
        <div class="m-3 ">
            <?php
            //lấy dữ liệu sản phẩm cần sửa ra để sửa
            if (isset($_GET['masp'])) {
                $sp = new sanpham();
                $result = $sp->getOneSP($_GET['masp']);
                $masp = $result['masp'];
                $tensp = $result['tensp'];
                $mota = $result['mota'];
                $maloai_sp = $result['maloai_sp'];
                $status = $result['status'];
            }
            ?>
            <form action="index.php?action=sanpham&act=updatesp&masp=<?php echo $masp ?>" class="form" name="form" method="post" enctype='multipart/form-data'>
                <div class="row">
                    <table class="col-md-12">
                        <input type="hidden" name="masp" readonly>
                        <tr>
                            <td class="w-25">Tên sản phẩm</td>
                            <td><input type="text" class="form-control w-75 mb-3" name="tensp" placeholder="Nhập tên sản phẩm" value="<?php echo $tensp  ?>">
                                <span class="error "><?php if (isset($Err_tensp)) echo $Err_tensp; ?></span>
                            </td>

                        </tr>
                        <!-- loại -->
                        <tr>
                            <td class="w-25">Loại sản phẩm</td>
                            <td>
                                <select class="form-select w-75  mt-3" name="loaisp" style="text-transform: capitalize;">
                                    <option selected value="">Chọn loại sản phẩm</option>
                                    <?php
                                    $sp = new sanpham();
                                    $res = $sp->getListLoaiSp();
                                    while ($set = $res->fetch()) :
                                    ?>

                                        <option value="<?php echo $set['maloai_sp'] ?>" <?php if ($maloai_sp == $set['maloai_sp']) { ?>selected<?php } ?>><?php echo $set['tenloai'] ?></option>
                                    <?php endwhile; ?>
                                </select>

                                <span class="error "><?php if (isset($Err_maloai)) echo $Err_maloai; ?></span>
                            </td>
                        </tr>
                        <!-- trạng thái -->
                        <tr>
                            <td class="w-25">Trạng thái</td>
                            <td>
                                <select class="form-select w-75 mt-3 mb-3" style="text-transform: capitalize;" name="status">
                                    <option selected value="">Trạng thái</option>
                                    <option value="1" <?php if($status==1){echo 'selected';}?> >Hiển thị sản phẩm</option>
                                    <option value="0" <?php if($status==0){echo 'selected';}?> >Ẩn sản phẩm</option>
                                </select>
                            </td>
                        </tr>
                        <!-- mô tả -->
                        <tr>
                            <td class="w-25">Mô tả</td>
                            <td><textarea type="text" class="form-control w-75" placeholder="Nhập thông tin chi tiết sản phẩm ở đây" style="resize:none" rows="4" name="mota"><?php echo $mota  ?></textarea>
                        </tr>
                    </table>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" type="submit" id="savesp" name="submit">Save</button>
                    <!-- <button class="btn btn-primary" data-bs-dismiss="modal">Thoát</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<?php
// else : 
//     echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
//     echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
// endif;
?>