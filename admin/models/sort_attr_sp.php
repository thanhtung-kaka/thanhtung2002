<?php


//sort sản phẩm dung 21/06/2022
session_start();
include 'connect.php';
include 'sanpham.php';
$output = '';
$sort = $_POST['sort'];
$column_name = $_POST['column_name'];
$masp=$_POST['masp'];
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
        <th ><a href="#" class="column_sort_attr text-light" id="dongia" data-sort="' . $sort . '" data-masp="'.$masp.'" >Đơn giá</a></th>
        <th ><a href="#" class="column_sort_attr text-light" id="giamgia" data-sort="' . $sort . '" data-masp="'.$masp.'">Giảm giá</a></th>
        <th ><a href="#" class="column_sort_attr text-light" id="soluongton" data-sort="' . $sort . '" data-masp="'.$masp.'">Số lượng tồn</a></th>
        <th ><a href="#" class="column_sort_attr text-light" id="masize" data-sort="' . $sort . '" data-masp="'.$masp.'">Size</a></th>
        <th ><a href="#" class="column_sort_attr text-light" id="mamau" data-sort="' . $sort . '" data-masp="'.$masp.'">Màu sắc</a></th>
        <th>Hình ảnh</th>
        <th>Sửa chữa</th>
    </tr>
</thead>    
<tbody class="text-center text-secondary">';

$sp = new sanpham();
$results=$sp->sort_attr($masp,$column_name, $sort);
$stt = 1;
while ($set = $results->fetch()) {
    
    // size
    if (!empty($set['masize'])) {
        $size = $sp->getSizeSp($set['masize']);
        $so_size=$size['so_size'];
    } else {
        $so_size='rỗng';
    }
    //màu
    if (!empty($set['mamau'])) {
        $mausac = $sp->getMauSp($set['mamau']);
        $tenmau= $mausac['tenmau'];
    } else {
        $tenmau='rỗng';
    }

    $output .= '<tr>
        <td>' . $stt++ . '</td>
        <td>' . number_format($set['dongia']) . '<sup>đ</sup></td>
        <td>' . $set['giamgia'] . '</td>
        <td>' . $set['soluongton'] . '</td>
        <td style="text-transform: capitalize;">
            ' . $so_size . '
        </td>
        <td style="text-transform: capitalize;">
            ' . $tenmau . '
        </td>
        <td><img src="' . $set['hinh'] . '" alt="" height=50px width=50px></td>
        <td class="text-center">
            <a href="index.php?action=sanpham&act=edit_attr&matt=' . $set['matt'] . '"><i class="fas fa-edit me-2 text-warning"></i></a>
            <span onclick=remove("index.php?action=sanpham&act=re_attr_sp&masp='.$set['masp'].'&matt='.$set['matt'].'")' . '><i class="fas fa-trash-alt text-danger"></i></span>
        </td>
    </tr>';
}
$output .= '
</tbody>
</table>';
echo $output;
?>
