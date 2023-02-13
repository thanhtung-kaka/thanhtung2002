<!-- trang quản lý loại sản phẩm dung(20/06/2922) -->
<?php
// if(isset($id))
// {
//     $staAcc= new Admin();
//     $results=$staAcc->get_one_statusAcc($id);
//     // echo $results['statusAcc'];
// }
// if($results['statusAcc']!=0):
?>
<div class="row">
    <div class="text-center mt-3">
        <h3>Quản lý loại sản phẩm </h3>
    </div>
    <!-- loại sản phẩm -->
    <div class="col-md-12">
        <!-- <div>
            <h6>Bảng loại sản phẩm</h6>
        </div> -->
        <div>
            <div class=" text-end mb-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themloai">
                 <i class="fas fa-plus"></i> Thêm loại sản phẩm
                </button>
                <?php include 'modals/modal-loai-sp.php'; ?>
            </div>
            <!-- hiện danh mục các sản phẩm -->
            <div id="loai_sp" class="table-responsive" >
                <table class="text-center mt-2 table" >
                    <tr class="bg bg-primary text-white">
                        <th>STT</th>
                        <th ><a href="#" class="column_sort_loai text-light" id="tenloai" data-sort="desc">Tên loại sản phẩm</a></th>
                        <th ><a href="#" class="column_sort_loai text-light" id="madm_sp" data-sort="desc">Danh mục sản phẩm</a></th>
                        <th >Sửa chữa</th>
                    </tr>
                    <?php
                    $sp = new sanpham();
                    $res = $sp->getListLoaiSp();

                    $sttl = 1;
                    while ($set = $res->fetch()) :
                    ?>
                        <tr class="bg bg-light text-dark">
                            <td ><?php echo $sttl++ ?></td>
                            <td style="text-transform: capitalize;"><?php echo $set['tenloai'] ?></td>
                            <td style="text-transform: capitalize;">
                                <?php
                                if (isset($set['madm_sp']) && $set['madm_sp'] != 0) {
                                    $danhmuc = $sp->getDm($set['madm_sp']);
                                    echo $danhmuc['tendm'];
                                }else{
                                    echo 'rỗng';
                                }
                                ?>
                            </td>
                            <td>
                                <!-- update loại sản phẩm -->
                                <i class="fas fa-edit me-2 text-warning" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themloai<?php echo $set['maloai_sp'] ?>"></i>
                                <?php include 'modals/modal-loai-sp.php'; ?>
                                <!-- xóa loại sản phẩm-->
                                <span onclick="remove('index.php?action=sanpham&act=xoaLoai_sp&maloai_sp=<?php echo $set['maloai_sp'] ?>')"><i class="fas fa-trash-alt text-danger"></i></span>
                            </td>
                        </tr>
                    <?php endwhile;  ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
// else : 
//     echo  "<script>alert ('Tài khoản đã bị khóa !');</script>";
//     echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login&act=logout"/>';
// endif;
?>