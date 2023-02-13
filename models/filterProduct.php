<?php
include 'connect.php';
if (isset($_POST['action'])) {
    $select = "select * from sanpham a, thuoctinh_sp b,loai_sp c  where a.masp=b.masp and a.maloai_sp=c.maloai_sp and a.status=1 and b.status=1 ";
    if (isset($_POST['minimum_price'], $_POST['maximum_price']) && !empty($_POST['minimum_price']) && !empty($_POST['maximum_price'])) {
        $select .= " and b.dongia between " . $_POST['minimum_price'] . " and " . $_POST['maximum_price']."";
    }
    if (isset($_POST['category'])) {
        $category_filter = implode("','", $_POST['category']);
        $select .= " and c.madm_sp in('" . $category_filter . "')";
    }
    if (isset($_POST['productType'])) {
        $productType_filter = implode("','", $_POST['productType']);
        $select .= " and c.maloai_sp in('".$productType_filter."')";
    }
    if (isset($_POST['filterSize'])) {
        $filterSize = implode("','", $_POST['filterSize']);
        $select .= " and b.masize in('" . $filterSize . "')";
    }
    if (isset($_POST['filterColor'])) {
        $filterColor = implode("','", $_POST['filterColor']);
        $select .= " and b.mamau in('" . $filterColor . "')";
    }
    $select .=' group by b.masp';
    $db = new connect();
    $result = $db->getList($select);
    $count = $result->rowCount();
    $output = '';
    if ($count > 0) {
        foreach ($result as $row) {
            $output .= '
            <div class="col-md-3 col-sm-6 col-xs-6 item">
                <div class="iframe">
                        <div class="img">
                            <a href="index.php?action=sanpham&act=sp_detail&masp=' . $row['masp'] . '&matt='. $row['matt'].'" title=""><img src="' . $row['hinh'] . '" alt=""></a>
                        </div>
                        <div class="info">
                        <h3>
                            <a href="index.php?action=sanpham&act=sp_detail&masp=' . $row['masp'] . '&matt='. $row['matt'].'" title="' . $row['tensp'] . '">' . $row['tensp'] . '</a>
                        </h3>
                        <p><b class="price">' . number_format($row['dongia']) . '<sup>đ</sup></b></p>.
                        <a href="#" class="btn btn-primary ">Add to cart</a>
                    </div>
                </div>
            </div>
            ';
        }
    }else{
        $output='<div class="text-center text-secondary"><h3>No data found</h3></div>';
    }
    echo $output;
}
