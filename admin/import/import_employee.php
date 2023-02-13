<!-- văn -->
<?php 
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
require_once '../models/connect.php';
require_once '../models/admin.php';
$cont=new Admin();
require_once ('../vendor/autoload.php');
$allowedFileType=[
    'application/vnd.ms-excel',
    'text/xls',
    'text/xlsx',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
];
if(in_array($_FILES['file']['type'],$allowedFileType)){
    $targetPath='../assets/uploads/'.$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],$targetPath);
    $Reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadSheet=$Reader->load($targetPath);
    $excelSheet=$spreadSheet->getActiveSheet();
    $spreadSheetAry=$excelSheet->toArray();
    $sheetCount=count($spreadSheetAry);
    for($i=0;$i<=$sheetCount;$i++){
        $hoten_nv='';
        if(isset($spreadSheetAry[$i][0])){
            $hoten_nv=$spreadSheetAry[$i][0];
        }
        $ngay_sinh='';
        if(isset($spreadSheetAry[$i][1])){
            $ngay_sinh=$spreadSheetAry[$i][1];
        }
        $gioi_tinh_nv='';
        if(isset($spreadSheetAry[$i][2])){
            $gioi_tinh_nv=$spreadSheetAry[$i][2];
        }
        $sdt_nv='';
        if(isset($spreadSheetAry[$i][3])){
            $sdt_nv=$spreadSheetAry[$i][3];
        }
        $email_nv='';
        if(isset($spreadSheetAry[$i][4])){
            $email_nv=$spreadSheetAry[$i][4];
        }
        $dia_chi_nv='';
        if(isset($spreadSheetAry[$i][5])){
            $dia_chi_nv=$spreadSheetAry[$i][5];
        }
        $avatar='';
        if(isset($spreadSheetAry[$i][6])){
            $avatar=$spreadSheetAry[$i][6];
        }
        $pass_dn='';
        if(isset($spreadSheetAry[$i][7])){
            $pass_dn=$spreadSheetAry[$i][7];
        }
        $role='';
        if(isset($spreadSheetAry[$i][8])){
            $role=$spreadSheetAry[$i][8];
        }
        $status='';
        if(isset($spreadSheetAry[$i][9])){
            $status=$spreadSheetAry[$i][9];
        }
        $ngay_tao='';
        if(isset($spreadSheetAry[$i][10])){
            $ngay_tao=$spreadSheetAry[$i][10];
        }
        $cont->add_employee($hoten_nv, $ngay_sinh, $gioi_tinh_nv, $sdt_nv, $email_nv, $dia_chi_nv, $avatar, $pass_dn, $role, $status, $ngay_tao);
    }
}else{
    echo 'lỗi file nhé';
}