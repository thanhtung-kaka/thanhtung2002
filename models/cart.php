<?php
// thêm sản phẩm vào giỏ hàng
function add_cart($masp,$qty,$mausac,$size){
  // lấy thông tin sản phẩm theo masp mausac và size
  $sp=new sanpham();
  $sanpham = $sp -> getProductAddToCart($masp,$mausac,$size);
  $matt=$sanpham['matt'];
 
  // kiểm tra xem mã sp có tồn tại hay chưa
  if(isset($_SESSION['cart'][$matt])){
    $qty+=$_SESSION['cart'][$matt]['quantity'];
    update_cart($matt,$qty);
    return;
  }
  // khai báo biến
  $price=$sanpham['dongia'];
  $name=$sanpham['tensp'];
  $image=$sanpham['hinh'];
  $slton=$sanpham['soluongton'];
  $mausacsp=$sanpham['tenmau'];
  $sizesp=$sanpham['so_size'];
  $total=$price*$qty;
  // khai báo mảng
  $item=array(
    'masp'=>$masp,
    'matt'=>$matt,
    'hinh'=>$image,
    'tensp'=>$name,
    'mausac'=>$mausacsp,
    'size'=>$sizesp,
    'price'=>$price,
    'quantity'=>$qty,
    'soluongton'=>$slton,
    'total'=>$total
  );
  
  $_SESSION['cart'][$matt]=$item;
}
// update lại giỏ hàng
function update_cart($matt,$qty){
  if($qty<=0){
    unset($_SESSION['cart'][$matt]);
  }else{
    $_SESSION['cart'][$matt]['quantity']=$qty;
    $newtotal=$_SESSION['cart'][$matt]['quantity']*$_SESSION['cart'][$matt]['price'];
    $_SESSION['cart'][$matt]['total']=$newtotal;
  }
}
// tính tổng tiền
function get_subtotal(){
    $subtotal=0;
    foreach($_SESSION['cart'] as $item)
    {
        $subtotal+=$item['total'];
    }
    $subtotal=number_format($subtotal);
    return $subtotal;
}