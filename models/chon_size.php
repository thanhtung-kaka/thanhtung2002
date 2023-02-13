<?php
include 'connect.php';
include 'sanpham.php';

$masize=$_POST['size'];
$masp=$_POST['masp'];
$sp=new SanPham();
$result=$sp->selectSize($masp,$masize);
$output ='';
while($res=$result->fetch()){
    $output .='
    <div class="text-danger fw-bold mb-2" id="dongia">

    '.number_format($res['dongia']).'<sup><u>đ</u></sup>
    </div>
    <div class="mb-3">';
    $output.='<select class="form-select select w-50 text-capitalize bg bg-outline-dark mausac" name="mausac">
    ';
        $listmau = $sp->selectColorOfSize($masp,$masize);
        foreach ($listmau as $key=>$set) {
            if($key==0){ $selected='selected'; }else{
                $selected='';
            }
            $output.='<option value="'. $set['mamau'].'"'.$selected.'>'.$set['tenmau'].'</option>';
        }
    $output.='</select>';
    $output.='</div>
    <div class="mb-3">
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">';
        $listSize = $sp->getListSize($res['masp']);
        foreach ($listSize as $key => $size) {
            if($masize==$size['ma_size']){
                $checked='checked';
            }else{
                $checked='';
            }
        $output.='
            <input type="radio" class="btn-check sizesp" name="size" id="btnSize'.$size['so_size'].'" data-masp="'.$res['masp'].'" value="'.$size['ma_size'].'"  '.$checked.' autocomplete="off">
            <label class="btn btn-outline-dark" for="btnSize'. $size['so_size'].'">'.$size['so_size'].'</label>';
        }
    $output.='</div>
    <div>
        <div class="input-group soluong mb-2 mt-3">
            <div class="input-group-text plus is-form"><i class="fas fa-plus"></i></div>
            <input type="number" name="quantity" id="quantity" min="1" max=' . $res['soluongton'] . ' value="1">
            <div class="input-group-text minus is-form"><i class="fas fa-minus"></i></div>
            <div class="input-group-text ms-4">Còn ' . $res['soluongton'] . ' sản phẩm</div>
        </div>

                                
    </div>
    </div>';
        }
echo $output;