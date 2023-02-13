<!-- sắp xếp loại sản phẩm dũng 22/06/2022 -->
<?php
include 'connect.php';
include 'sanpham.php';
$output = '';
$sort = $_POST['sort'];
$column_name = $_POST['column_name'];
if ($sort == 'desc') {
    $sort = 'asc';
} else {
    $sort = 'desc';
}

$output .= '
<table class="text-center mt-2 table">
<tr class="bg bg-primary text-white">
    <th>STT</th>
    <th><a href="#" class="column_sort_loai text-light" id="tenloai" data-sort="' . $sort . '">Tên loại sản phẩm</a></th>
    <th ><a href="#" class="column_sort_loai text-light" id="madm_sp" data-sort="' . $sort . '">Danh mục sản phẩm</a></th>
    <th>Sửa chữa</th>
</tr>';
$sp = new sanpham();
$res = $sp->sort_loai_sp($column_name, $sort);
$sttl = 1;
while ($set = $res->fetch()) :
    $danhmuc = $sp->getDm($set['madm_sp']);
    $tendm = $danhmuc['tendm'];
    $output .= '
    <tr class="bg bg-light text-dark">
        <td >' . $sttl++ . '</td>
        <td style="text-transform: capitalize;">' . $set['tenloai'] . '</td>
        <td style="text-transform: capitalize;">
            ' . $tendm . '
        </td>
        <td>
            <!-- update loại sản phẩm -->
            <i class="fas fa-edit me-2 text-warning" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themloai' . $set['maloai_sp'] . '"></i>';
        include '../views/modals/modal-loai-sp.php';
    $output .= '<span onclick=' . 'remove("index.php?action=sanpham&act=xoaLoai_sp&maloai_sp=' . $set['maloai_sp'] . '")' . '><i class="fas fa-trash-alt text-danger"></i></span>
        </td>
    </tr>';
endwhile;
$output .= '</table>';
echo $output;
