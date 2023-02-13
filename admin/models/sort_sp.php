<?php


//sort sản phẩm dung 21/06/2022
session_start();
include 'connect.php';
include 'sanpham.php';
include 'page.php';
$output = '';
$sort = $_POST['sort'];
$column_name = $_POST['column_name'];
$limit = $_POST['limit'];
// echo $limit;
// exit();
if ($sort == 'desc') {
    $sort = 'asc';
} else {
    $sort = 'desc';
}
$output .= ' <table class="table table-hover">
<thead class="text-center bg bg-primary text-white" role="rowgroup">
    <tr>
        <th>STT</th>
        <th><a href="#" class="column_sort_sp text-light" id="tensp" data-sort="' . $sort . '" data-limit="' . $limit . '">Tên sản phẩm</a></th>
        <th ><a href="#" class="column_sort_sp text-light" id="maloai_sp" data-sort="' . $sort . '" data-limit="' . $limit . '">Loại sản phẩm</a></th>
        <th ><a href="#" class="column_sort_sp text-light" id="soluotxem" data-sort="' . $sort . '" data-limit="' . $limit . '">Số lượt xem</a></th>
        <th>Sửa chữa</th>
    </tr>
</thead>    
<tbody class="text-center text-secondary">';

$sp = new sanpham();
$p = new Page();



$start = $p->findStart($limit);
$results = $sp->getlistsp();
//lấy số sản phẩm hiện có
$count = $results->rowCount();
//lấy các sản phẩm của trang
$results = $sp->sort_sp($start, $limit, $column_name, $sort);
//lấy số trang
$page = $p->findPage($count, $limit);
//lấy trang hiện tại
$current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$stt = 1;
while ($set = $results->fetch()) {
    //loại
    if (!empty($set['maloai_sp'])) {
        $loai_sp = $sp->getLoaisp($set['maloai_sp']);
        $tenloai = $loai_sp['tenloai'];
    } else {
        $tenloai = 'Rỗng';
    }

    $output .= '<tr>
        <td>' . $stt++ . '</td>
        <td >' . $set['tensp'] . '</td>
        
        <td style="text-transform: capitalize;">
            ' . $tenloai . '
        </td>
       
        <td>' . $set['soluotxem'] . '</td>
        <td class="text-center">';
        if ($set['status'] == 0) {
            $output.='<span class="trangthai" id="status' . $set['masp'] . '"><span class="me-2 status" data-status="0" data-masp="' . $set['masp'] . '"><i class="fas fa-eye-slash" ></i></span></span>';
        } else {
            $output.='<span class="trangthai" id="status' . $set['masp'] . '"><span class="me-2 status" data-status="1" data-masp="' . $set['masp'] . '"><i class="fas fa-eye" ></i></span></span>';
        }
        $output.='<a href="index.php?action=sanpham&act=thuoctinh_sp&masp='.$set['masp'].'" class="me-2"><i class="fas fa-dolly text-success"></i></a>
        <i class="fas fa-edit me-2 text-warning" data-bs-toggle="modal" data-bs-target="#modalsProduct'.$set['masp'].'"></i>';
        include '../views/modals/modal-sanpham.php';
        $output.='<span onclick=remove("index.php?action=sanpham&act=xoasp&masp=' . $set['masp'] . '")' . '><i class="fas fa-trash-alt text-danger"></i></span>
        </td>
    </tr>';
}
$output .= '
</tbody>
</table>';
echo $output;
include '../views/pagination.php';
