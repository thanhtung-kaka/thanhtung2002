<!-- trang quản lý danh mục sản phẩm dung(21/06/2922) -->
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
    <!-- danh muc san pham -->
    <div class="text-center mt-3">
        <h3>Quản lý màu sắc</h3>
    </div>
    <div >
        <div class="col-md-12">
            <!-- <div>
                <h6>Bảng danh mục sản phẩm</h6>
            </div> -->
            <div>
                <div class="text-end mb-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themmau">
                        <i class="fas fa-plus"></i> Thêm màu sắc
                    </button>

                    <?php include 'modals/modal-mausac-sp.php' ?>
                </div>
                <!-- hiện danh mục các sản phẩm -->
                <div class="table-responsive" id="mausac">
                    <table class="text-center mt-2 table">
                        <tr class="bg bg-primary text-white">
                            <th width="100px">STT</th>
                            <th width="350px" class="column_sort_mau" id="tenmau" data-sort="desc">Màu sắc</th>
                            <th width="200px" height="50px">Sửa chữa</th>
                        </tr>
                        <?php
                        $sp = new sanpham();
                        $res = $sp->getListMau();
                        $stt = 1;
                        while ($set = $res->fetch()) :

                        ?>
                            <tr class="bg bg-light text-dark">
                                <td ><?php echo $stt++ ?></td>
                                <td style="text-transform: capitalize;"><?php echo $set['tenmau'] ?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themmuc"> -->
                                    <i class="fas fa-edit me-2 text-warning" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themmau<?php echo $set['mamau'] ?>"></i>
                                    <!-- </button> -->

                                    <!-- Modal -->
                                    <?php include 'modals/modal-mausac-sp.php' ?>
                                    <span onclick="remove('index.php?action=sanpham&act=xoamau&mamau=<?php echo $set['mamau'] ?>')"><i class="fas fa-trash-alt text-danger"></i></span>
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