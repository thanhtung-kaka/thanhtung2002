<!-- trang quản lý danh mục sản phẩm dung(21/06/2922) -->
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
<div class="row">
    <!-- danh muc san pham -->
    <div class="text-center mt-3">
        <h3>Quản lý danh mục</h3>
    </div>
    <div >
        <div class="col-md-12">
            <!-- <div>
                <h6>Bảng danh mục sản phẩm</h6>
            </div> -->
            <div>
                <div class="text-end mb-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themmuc">
                    <i class="fas fa-plus"></i> Thêm mục
                    </button>
                    <?php include 'modals/modal-danhmuc-sanpham.php' ?>
                    
                </div>
                <!-- hiện danh mục các sản phẩm -->
                <div id="danhmuc_sp" class="table-responsive">
                    <table class="text-center mt-2 table">
                        <tr class="bg bg-primary text-white">
                            <th >STT</th>
                            <th class="column_sort" id="tendm" data-sort="desc">Tên danh mục sản phẩm</th>
                            <th >Sửa chữa</th>
                        </tr>
                        <?php
                        $sp = new sanpham();
                        $res = $sp->getListDM();
                        $sttdm = 1;
                        while ($set = $res->fetch()) :

                        ?>
                            <tr class="bg bg-light text-dark">
                                <td ><?php echo $sttdm++ ?></td>
                                <td style="text-transform: capitalize;"><?php echo $set['tendm'] ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themmuc"> -->
                                    <i class="fas fa-edit me-2 text-warning" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themmuc<?php echo $set['madm_sp'] ?>"></i>
                                    <!-- </button> -->

                                    <!-- Modal -->
                                    <?php include "modals/modal-danhmuc-sanpham.php" ?>
                                    <span onclick="remove('index.php?action=sanpham&act=xoadm&madm_sp=<?php echo $set['madm_sp'] ?>')"><i class="fas fa-trash-alt text-danger"></i></span>
                                </td>
                            </tr>
                        <?php endwhile; ?>
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