<!-- văn -->
<?php 
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
require_once '../models/connect.php';
require_once '../models/contact.php';
$cont=new Contact();
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
        $hoten='';
        if(isset($spreadSheetAry[$i][0])){
            $hoten=$spreadSheetAry[$i][0];
        }
        $sdt='';
        if(isset($spreadSheetAry[$i][1])){
            $sdt=$spreadSheetAry[$i][1];
        }
        $email='';
        if(isset($spreadSheetAry[$i][2])){
            $email=$spreadSheetAry[$i][2];
        }
        $noidung='';
        if(isset($spreadSheetAry[$i][3])){
            $noidung=$spreadSheetAry[$i][3];
        }
        $date = new DateTime("now");
        $thoigian = $date->format("y-m-d");
        $thoigian=$spreadSheetAry[$i][4];
        $cont->add_contact($hoten, $sdt, $email, $noidung, $thoigian);
        // }else{
        //     echo 'lỗi rồi em ơi dữ liệu trống kìa';
        // }
    }
}else{
    echo 'lỗi file nhé';
}