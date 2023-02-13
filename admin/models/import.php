<?php

use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once 'connect.php';
require_once 'sanpham.php';
$sp = new sanpham();
require_once('../vendor/autoload.php');
$allowedFileType = [
    'application/vnd.ms-excel',
    'text/xls',
    'text/xlsx',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
];
if (in_array($_FILES['file']['type'], $allowedFileType)) {
    $targetPath = '../../assets/uploads/' . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
    $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadSheet = $Reader->load($targetPath);
    $excelSheet = $spreadSheet->getActiveSheet();
    $spreadSheetAry = $excelSheet->toArray();
    $sheetCount = count($spreadSheetAry);

    $flag = false;
    for ($i = 0; $i <= $sheetCount; $i++) {
        $tensp = '';
        if (isset($spreadSheetAry[$i][0])) {
            $tensp = $spreadSheetAry[$i][0];
        }
        $mota = '';
        if (isset($spreadSheetAry[$i][1])) {
            $mota = $spreadSheetAry[$i][1];
        }

        $maloai_sp = '';
        if (isset($spreadSheetAry[$i][2])) {
            $maloai_sp = $spreadSheetAry[$i][2];
        }
        $status = '';
        if (isset($spreadSheetAry[$i][3])) {
            $status = $spreadSheetAry[$i][3];
        }
        if (!empty($tensp) || !empty($mota) || !empty($maloai_sp) || !empty($status)) {
            $sp->insertsp($tensp, $mota, $maloai_sp, $status);
            $res['status'] = 200;
            $res['message'] = 'Import thành công';
            $res['data'] = null;
        } else {
            $res['status'] = 403;
            $res['message'] = 'Dòng này thiếu dữ liệu';
            $res['data'] = null;
        }
    }
} else {
    $res['status'] = 403;
    $res['message'] = 'File không đúng định dạng';
    $res['data'] = null;
}
echo '####',json_encode($res),'####';
