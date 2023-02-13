<!-- văn -->
<?php 
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
require_once '../models/connect.php';
require_once '../models/client.php';
$client=new Client();
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

        $ten_kh='';
        if(isset($spreadSheetAry[$i][0])){
            $ten_kh=$spreadSheetAry[$i][0];
        }
        /////
        $email_kh='';
        if(isset($spreadSheetAry[$i][1])){
            $email_kh=$spreadSheetAry[$i][1];
        }
        /////
        $sdt_kh='';
        if(isset($spreadSheetAry[$i][2])){
            $sdt_kh=$spreadSheetAry[$i][2];
        }
        ////
        $dia_chi_kh='';
        if(isset($spreadSheetAry[$i][3])){
            $dia_chi_kh=$spreadSheetAry[$i][3];
        }
        ///
        $gioi_tinh_kh='';
        if(isset($spreadSheetAry[$i][4])){
            $gioi_tinh_kh=$spreadSheetAry[$i][4];
        }
        ///
        $ten_dn='';
        if(isset($spreadSheetAry[$i][5])){
            $ten_dn=$spreadSheetAry[$i][5];
        }
        /////
        $pass_dn='';
        if(isset($spreadSheetAry[$i][6])){
            $pass_dn=$spreadSheetAry[$i][6];
        }
        //  ngày đk
        $date = new DateTime("now");
        $ngay_dk = $date->format("y-m-d");
        $ngay_dk=$spreadSheetAry[$i][7];

        $avatar='';
        if(isset($spreadSheetAry[$i][8])){
            $avatar=$spreadSheetAry[$i][8];
        }
        $status='';
        if(isset($spreadSheetAry[$i][9])){
            $status=$spreadSheetAry[$i][9];
        }

        $client->insert_Client($ten_kh, $email_kh, $sdt_kh, $dia_chi_kh, $gioi_tinh_kh, $ten_dn, $pass_dn, $ngay_dk, $avatar, $status);
    }
}else{
    echo 'lỗi file nhé';
}