<?php
//file sắp xếp tên danh mục theo tên dũng(21/06/2022)
include 'connect.php';
include 'sanpham.php';

$output = '';
$sort = $_POST["sort"];
$column_name = $_POST["column_name"];
if ($sort == 'desc') {
    $sort = 'asc';
} else {
    $sort = 'desc';
}
$sp = new sanpham();
$res = $sp->sort_dm($column_name, $sort);
$sttdm = 1;
$output = '<table class="text-center mt-2 table">
<tr class="bg bg-primary text-white">
    <th>STT</th>
    <th class="column_sort" id="tendm" data-sort="'.$sort.'">Tên danh mục sản phẩm</th>
    <th >Sửa chữa</th>
</tr>';
while ($set = $res->fetch()) {

$output .= '
<tr class="bg bg-light text-dark">
    <td >'. $sttdm++ .'</td>
    <td style="text-transform: capitalize;">'.$set['tendm'] .'</td>
    <td>
        <i class="fas fa-edit me-2 text-warning" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themmuc'. $set['madm_sp'].'"></i>';
        
         include "../views/modals/modal-danhmuc-sanpham.php";

        $output.='<span onclick='.'remove("'.'index.php?action=sanpham&act=xoadm&madm_sp='.$set['madm_sp'] .'")'.'><i class="fas fa-trash-alt text-danger"></i></span>
    </td>
</tr>';



}
$output .='</table>';
echo $output;
?>