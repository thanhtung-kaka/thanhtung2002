
<?php
$action = 'sanpham';
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case "sanpham":
        include "views/sanpham.php";
        break;
    case "themsp":

        $tensp = $_POST['tensp'];
        $mota = $_POST['mota'];
        $maloai_sp = $_POST['loaisp'];
        if (isset($_POST['status'])) {
            $status = $_POST['status'];
        }else{
            $status=0;
        }
        $flag = false;
        function test_data($data_sp)
        {
            $data_sp = trim($data_sp);
            $data_sp = htmlspecialchars(($data_sp));
            return $data_sp;
        }
        $sp = new sanpham();
        $tensp = test_data($tensp);
        $productName = $sp->getProductName();
        foreach ($productName as $pd) {
            if ($pd['tensp'] == $tensp) {
                $flag = true;
            }
        }
        if ($flag) {
            $res['status'] = 403;
            $res['message'] = 'Sản phẩm đã tồn tại';
            $res['data'] = null;
        } else {
            $sp->insertsp($tensp, $mota, $maloai_sp, $status);
            $res['status'] = 200;
            $res['message'] = 'Lưu sản phẩm thành công nhé bạn';
            $res['data'] = null;
        }
        echo '####', json_encode($res), '####';
        break;
    case 'editsp':
        include 'views/editsp.php';
        break;
    case 'updatesp':
        //update san pham
        $masp = $_POST['masp'];
        $tensp = $_POST['tensp'];
        $mota = $_POST['mota'];
        $maloai_sp = $_POST['loaisp'];
        $status=$_POST['status'];
        $flag = false;
        $txt_tensp = '';
        function test_data($data_sp)
        {
            $data_sp = trim($data_sp);
            $data_sp = htmlspecialchars(($data_sp));
            return $data_sp;
        }
        $sp = new sanpham();
        $tensp = test_data($tensp);
        $productName = $sp->getProductName();
        foreach ($productName as $pd) {
            if ($pd['tensp'] == $tensp && $pd['masp'] != $masp && $pd['maloai_sp'] == $maloai_sp) {
                $flag = true;
            }
        }
        if ($flag) {
            $res['status'] = 403;
            $res['message'] = 'Sản phẩm đã tồn tại';
            $res['data'] = null;
        } else {
            $txt_tensp = test_data($tensp);
            $sp->updateSp($masp, $txt_tensp, $mota, $maloai_sp, $status);
            $res['status'] = 200;
            $res['message'] = 'Lưu sản phẩm thành công nhé bạn';
            $res['data'] = null;
        }
        echo '####', json_encode($res), '####';
        break;
    case 'xoasp':
        //xoa san pham
        if (isset($_GET['masp'])) {
            $masp = $_GET['masp'];
            $sp = new sanpham();
            try {
                $sp->xoasp($masp);
                // echo "<script>alert('Xóa thành công')</script>";
                // echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=sanpham&act=sanpham"/>';
            } catch (PDOException $e) {
                echo $e;
                die($e->getMessage());
            }
        }
        // include 'views/sanpham.php';
        echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=sanpham&act=sanpham"/>';
        break;
    case 'search':
        // if(isset($_POST['submit'])){
        //     $search=$_POST['n']
        // }
        include 'views/sanpham.php';
        break;
    case 'thuoctinh_sp':
        include 'views/thuoctinh_sp.php';
        break;
    case 'add_attr_sp':
        if (isset($_POST['submit'])) {
            $masp = $_POST['masp'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            $slton = $_POST['soluongton'];
            $size = $_POST['size'];
            $mausac = $_POST['mausac'];
            $link_hinh = $_POST['link_url'];
            $status = $_POST['status'];
            $sp = new sanpham();
            $Err_dongia = $Err_giamgia = $Err_slton = $Err_size = $Err_mausac = $Err_hinh = '';
            $txt_dongia = $txt_giamgia = $txt_slton = "";
            function test_data($data)
            {
                $data = trim($data);
                $data = htmlspecialchars(($data));
                return $data;
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //kiểm tra đơn giá
                if (empty($dongia)) {
                    $Err_dongia = "* Vui lòng nhập đơn giá của sản phẩm";
                } else {
                    $txt_dongia = test_data($dongia);
                }
                //kiểm tra giảm giá

                if (!empty($giamgia)) {
                    if ($giamgia >= $dongia) {
                        $Err_giamgia = "Giảm giá không được lớn hơn đơn giá của sản phẩm";
                    } elseif ($giamgia < 0) {
                        $giamgia = 0;
                    } else {
                        $txt_giamgia = test_data($giamgia);
                    }
                }
                //kiểm tra số lượng tồn của sản phẩm
                if (empty($slton)) {
                    $Err_slton = "* Vui lòng nhập số lượng tồn của sản phẩm";
                } else {
                    $txt_slton = test_data($slton);
                }
                //kiểm tra size
                if (empty($size)) {
                    $Err_size = "* Vui lòng chọn kích cỡ của sản phẩm";
                }
                //kiểm tra màu sắc của sản phẩm
                if (empty($mausac)) {
                    $Err_mausac = "* Vui lòng chọn màu sắc của sản phẩm";
                }
                //kiểm tra hình của sản phẩm
                if (empty($link_hinh)) {
                    $Err_hinh = "* Vui lòng chọn hình cho sản phẩm và bấm lưu hình";
                }
                if (!$Err_dongia && !$Err_giamgia && !$Err_slton && !$Err_size && !$Err_mausac && !$Err_hinh) {
                    try {
                        $sp->insert_attr_sp($masp, $txt_dongia, $txt_giamgia, $txt_slton, $size, $mausac, $link_hinh, $status);

                        echo "<script>alert('Thêm thuộc tính thành công')</script>";
                        echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=sanpham&act=thuoctinh_sp&masp=' . $masp . '"/>';
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }
                } else {
                    echo "<script>alert('Đã có lỗi xảy ra')</script>";
                    // echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=sanpham&act=thuoctinh_sp&masp=' . $masp . '"/>';

                }
            }
        }
        include 'views/thuoctinh_sp.php';
        break;
    case 'remove_attr_sp':
        if (isset($_GET['matt']) && $_GET['matt'] != '') {
            $matt = $_GET['matt'];
            $sp = new sanpham();
            try {
                $sp->remove_attr_sp($matt);
            } catch (PDOException $e) {
                echo $e;
                die($e->getMessage());
            }
        }
        echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=sanpham&act=thuoctinh_sp&masp=' . $_GET['masp'] . '"/>';
        break;
    case 'edit_attr':
        include 'views/edit_attr.php';
        break;
    case 'edit_attr_sp':
        if (isset($_POST['submit'])) {
            $matt = $_POST['matt'];
            $masp = $_POST['masp'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            $slton = $_POST['soluongton'];
            $size = $_POST['size'];
            $mausac = $_POST['mausac'];
            $link_hinh = $_POST['link_url'];
            $status = $_POST['status'];
            $sp = new sanpham();
            $Err_dongia = $Err_giamgia = $Err_slton = $Err_size = $Err_mausac = $Err_hinh = '';
            $txt_dongia = $txt_giamgia = $txt_slton = 0;
            function test_data($data)
            {
                $data = trim($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                //kiểm tra đơn giá
                if (empty($dongia)) {
                    $Err_dongia = "* Vui lòng nhập đơn giá của sản phẩm";
                } else {
                    $txt_dongia = test_data($dongia);
                }
                //kiểm tra giảm giá
                // if (isset($_POST['giamgia'])) {
                //     $txt_giamgia = test_data($giamgia);
                // }
                if (!empty($giamgia)) {
                    if ($giamgia >= $dongia) {
                        $Err_giamgia = "Giảm giá không được lớn hơn đơn giá của sản phẩm";
                    } elseif ($giamgia < 0) {
                        $giamgia = 0;
                    } else {
                        $txt_giamgia = test_data($giamgia);
                    }
                }
                //kiểm tra số lượng tồn của sản phẩm
                if (empty($slton)) {
                    $Err_slton = "* Vui lòng nhập số lượng tồn của sản phẩm";
                } else {
                    $txt_slton = test_data($slton);
                }
                //kiểm tra size
                if (empty($size)) {
                    $Err_size = "* Vui lòng chọn kích cỡ của sản phẩm";
                }
                //kiểm tra màu sắc của sản phẩm
                if (empty($mausac)) {
                    $Err_mausac = "* Vui lòng chọn màu sắc của sản phẩm";
                }
                //kiểm tra hình của sản phẩm
                if (empty($link_hinh)) {
                    $Err_hinh = "* Vui lòng chọn hình cho sản phẩm và bấm lưu hình";
                }
                if (!$Err_dongia  && !$Err_giamgia &&  !$Err_slton && !$Err_size && !$Err_mausac && !$Err_hinh) {
                    try {
                        $sp->update_attr_sp($matt, $txt_dongia, $txt_giamgia, $txt_slton, $size, $mausac, $link_hinh, $status);

                        echo "<script>alert('Sửa thuộc tính thành công')</script>";
                        echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=sanpham&act=thuoctinh_sp&masp=' . $masp . '"/>';
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    }
                } else {
                    echo "<script>alert('Đã có lỗi xảy ra')</script>";
                }
            }
        }
        // echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=sanpham&act=edit_attr&matt=' . $matt . '"/>';
        include 'views/edit_attr.php';
        break;
    case 'update_status_attr':
        $matt = $_POST['matt'];
        $status = $_POST['status'];

        $sp = new sanpham();
        if ($status == 0) {
            $status = 1;
            $icon = '<i class="fas fa-eye" ></i>';
        } else {
            $status = 0;
            $icon = '<i class="fas fa-eye-slash" ></i>';
        }
        $sp->update_status_attr($matt, $status);
        $res['data'] = '<span class="status_attr me-2" data-status="' . $status . '" data-matt="' . $matt . '">' . $icon . '</span>';
        echo '####', json_encode($res), '####';
        break;
    case 'danhmuc':
        include 'views/danhmuc_sp.php';
        break;
    case 'themdm':
        // $madm_sp = $_POST['madmsp'];
        $tendm = $_POST['tendm'];
        $sp = new sanpham();
        $txt_tendm = '';
        function test_data($data)
        {
            $data = trim($data);
            $data = htmlspecialchars(($data));
            $data = strtolower($data);
            return $data;
        }
        $list_danhmuc = $sp->getListDM();
        $flag = true;
        foreach ($list_danhmuc as $danhmuc) {
            if ($danhmuc['tendm'] == $tendm) {
                $flag = false;
            }
        }
        if ($flag == false) {
            $res['status'] = 403;
            $res['message'] = "Danh mục này đã tồn tại rồi nha";
            $res['data'] = null;
        } else {
            $txt_tendm = test_data($tendm);
            $sp->themDM($txt_tendm);
            $res['status'] = 200;
            $res['message'] = "Thêm thành công";
            $res['data'] = null;
        }
        echo '####', json_encode($res), '####';

        break;
    case 'xoadm':
        if (isset($_GET['madm_sp'])) {
            $madm_sp = $_GET['madm_sp'];
            $sp = new sanpham();
            try {
                $sp->xoadm($madm_sp);
            } catch (PDOException $e) {
                echo $e;
                die($e->getMessage());
            }
        }
        // include 'views/sanpham.php';
        echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=sanpham&act=danhmuc"/>';
        break;
    case 'update_dmsp':
        $madm_sp = $_POST['madm_sp'];
        $tendm = $_POST['tendm'];
        $sp = new sanpham();
        $txt_tendm = '';
        function test_data($data)
        {
            $data = trim($data);
            $data = htmlspecialchars(($data));
            $data = strtolower($data);
            return $data;
        }
        $list_danhmuc = $sp->getListDM();
        $flag = true;
        foreach ($list_danhmuc as $danhmuc) {
            if ($danhmuc['tendm'] == $tendm && $danhmuc['madm_sp'] != $madm_sp) {
                $flag = false;
            }
        }
        if ($flag == false) {
            $res['status'] = 403;
            $res['message'] = "Danh mục này đã tồn tại rồi nha";
            $res['data'] = null;
        } else {
            $txt_tendm = test_data($tendm);
            $sp->UploadDM($madm_sp, $txt_tendm);
            $res['status'] = 200;
            $res['message'] = "Sửa thành công";
            $res['data'] = null;
        }
        echo '####', json_encode($res), '####';
        break;
    case "loaisp":
        include 'views/loai_sp.php';
        break;
    case 'themloai':
        $tenloai = $_POST['tenloai'];
        $madm_sp = $_POST['madm_sp'];
        $sp = new sanpham();
        $txt_tenloai = '';
        function test_data($data)
        {
            $data = trim($data);
            $data = htmlspecialchars(($data));
            $data = strtolower($data);
            return $data;
        }
        $flag = true;
        $list_loai = $sp->getListLoaiSp();
        foreach ($list_loai as $loaisp) {
            if ($loaisp['tenloai'] == $tenloai && $loaisp['madm_sp'] == $madm_sp) {
                $flag = false;
            }
        }
        if ($flag == false) {
            $res['status'] = 403;
            $res['message'] = 'Loại sản phẩm này đã tồn tại rồi';
            $res['data'] = null;
        } else {
            $txt_tenloai = test_data($tenloai);
            $sp->themLoaiSp($txt_tenloai, $madm_sp);
            $res['status'] = 200;
            $res['message'] = 'Thêm thành công';
            $res['data'] = null;
        }
        echo '####', json_encode($res), '####';
        break;
    case 'xoaLoai_sp':
        if (isset($_GET['maloai_sp'])) {
            $maloai_sp = $_GET['maloai_sp'];
            $sp = new sanpham();
            try {
                $sp->xoaLoaiSp($maloai_sp);
            } catch (PDOException $e) {
                echo $e;
                die($e->getMessage());
            }
        }
        // include 'views/sanpham.php';
        echo '<meta http-equiv="refresh"  content="0; url=./index.php?action=sanpham&act=loaisp"/>';
        break;
    case 'update_loaisp':
        $maloai_sp = $_POST['ma_loai'];
        $tenloai = $_POST['tenloai'];
        $madm_sp = $_POST['madm_sp'];
        $sp = new sanpham();
        $txt_tenloai = '';
        function test_data($data)
        {
            $data = trim($data);
            $data = htmlspecialchars(($data));
            $data = strtolower($data);
            return $data;
        }
        $flag = true;
        $list_loai = $sp->getListLoaiSp();
        foreach ($list_loai as $loaisp) {
            if ($loaisp['tenloai'] == $tenloai && $loaisp['madm_sp'] == $madm_sp && $loaisp['maloai_sp'] != $maloai_sp) {
                $flag = false;
            }
        }
        if ($flag == false) {
            $res['status'] = 403;
            $res['message'] = 'Loại sản phẩm này đã tồn tại rồi';
            $res['data'] = null;
        } else {
            $txt_tenloai = test_data($tenloai);
            $sp->UploadLoaiSp($maloai_sp, $txt_tenloai, $madm_sp);
            $res['status'] = 200;
            $res['message'] = 'Sửa thành công';
            $res['data'] = null;
        }
        echo '####', json_encode($res), '####';
        break;
    case 'mausac':
        include 'views/mausac.php';
        break;
    case 'themmau':
        $tenmau = $_POST['tenmau'];
        $txt_tenmau = '';
        function test_data($data)
        {
            $data = trim($data);
            $data = htmlspecialchars(($data));
            $data = strtolower($data);
            return $data;
        }
        $sp = new sanpham();
        $list_color = $sp->getListMau();
        $flag = true;
        foreach ($list_color as $mausac) {
            if ($mausac['tenmau'] == $tenmau) {
                $flag = false;
            }
        }
        if ($flag == false) {
            $res['status'] = 403;
            $res['message'] = "Màu sắc này đã tồn tại rồi nha";
            $res['data'] = null;
        } else {
            $txt_tenmau = test_data($tenmau);
            $sp->themmau($txt_tenmau);
            $res['status'] = 200;
            $res['message'] = "Thêm thành công";
            $res['data'] = null;
        }
        echo '####', json_encode($res), '####';
        break;
    case 'update_mausac':
        $mamau = $_POST['mamau'];
        $tenmau = $_POST['tenmau'];
        $txt_tenmau = '';
        function test_data($data)
        {
            $data = trim($data);
            $data = htmlspecialchars(($data));
            $data = strtolower($data);
            return $data;
        }
        $sp = new sanpham();
        $list_color = $sp->getListMau();
        $flag = true;
        foreach ($list_color as $mausac) {
            if ($mausac['tenmau'] == $tenmau && $mausac['mamau'] != $mamau) {
                $flag = false;
            }
        }
        if ($flag == false) {
            $res['status'] = 403;
            $res['message'] = "Màu sắc này đã tồn tại rồi nha";
            $res['data'] = null;
        } else {
            $txt_tenmau = test_data($tenmau);
            $sp->update_mausac_sp($mamau, $tenmau);
            $res['status'] = 200;
            $res['message'] = "Thêm thành công";
            $res['data'] = null;
        }
        echo '####', json_encode($res), '####';
        break;

    case 'xoamau':
        if (isset($_GET['mamau'])) {
            $mamau = $_GET['mamau'];
            $sp = new sanpham();
            try {
                $sp->remove_mausac($mamau);
            } catch (PDOException $e) {
                echo $e;
                die($e->getMessage());
            }
        }
        include 'views/mausac.php';
        break;
    case 'size':
        include 'views/size.php';
        break;
    case 'themsize':
        $so_size = $_POST['so_size'];
        $txt_so_size = '';
        function test_data($data)
        {
            $data = trim($data);
            $data = htmlspecialchars(($data));
            $data = strtolower($data);
            return $data;
        }
        $sp = new sanpham();
        $flag = true;
        $list_size = $sp->getListSize();
        foreach ($list_size as $size) {
            if ($size['so_size'] == $so_size) {
                $flag = false;
            }
        }
        if ($flag == false) {
            $res['status'] = 403;
            $res['message'] = 'Size này đã tồn tại rồi bạn nhé';
            $res['data'] = null;
        } else {
            $txt_so_size = test_data($so_size);
            $sp->themsize($txt_so_size);
            $res['status'] = 200;
            $res['message'] = 'Thêm thành công';
            $res['data'] = null;
        }
        echo '####', json_encode($res), '####';
        break;
    case 'update_size':
        $ma_size = $_POST['ma_size'];
        $so_size = $_POST['so_size'];
        $txt_so_size = '';
        function test_data($datas)
        {
            $datas = trim($datas);
            $datas = htmlspecialchars(($datas));
            $datas = strtolower($datas);
            return $datas;
        }
        $sp = new sanpham();
        $flag = true;
        $list_size = $sp->getListSize();
        foreach ($list_size as $size) {
            if ($size['so_size'] == $so_size && $size['ma_size'] != $ma_size) {
                $flag = false;
            }
        }
        if ($flag == false) {
            $res['status'] = 403;
            $res['message'] = 'Size này đã tồn tại rồi bạn nhé';
            $res['data'] = null;
        } else {
            $txt_so_size = test_data($so_size);
            $sp->update_size($ma_size, $txt_so_size);
            $res['status'] = 200;
            $res['message'] = 'Sửa thành công';
            $res['data'] = null;
        }
        echo '####', json_encode($res), '####';
        break;
    case 'xoa_size':
        if (isset($_GET['ma_size'])) {
            $ma_size = $_GET['ma_size'];
            $sp = new sanpham();
            try {
                $sp->remove_size($ma_size);
            } catch (PDOException $e) {
                echo $e;
                die($e->getMessage());
            }
        }
        include 'views/size.php';
        break;
}
