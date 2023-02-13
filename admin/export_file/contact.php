<!-- văn -->
<?php
require_once "../vendor/autoload.php";


// use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$Excel_writer = new Xlsx($spreadsheet);

$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();
///
// xét chiều rộng nếu muốn set height thì dùng setRowHeight()
$activeSheet->getColumnDimension('A')->setWidth(10);
$activeSheet->getColumnDimension('B')->setWidth(30);
$activeSheet->getColumnDimension('C')->setWidth(25);
$activeSheet->getColumnDimension('D')->setWidth(25);
$activeSheet->getColumnDimension('E')->setWidth(40);
$activeSheet->getColumnDimension('F')->setWidth(20);


$activeSheet->getStyle('A1:F1')->getFont()->setBold(true);
$activeSheet->setCellValue('A1', 'ID Liên Hệ');
$activeSheet->setCellValue('B1', 'Họ Tên ');
$activeSheet->setCellValue('C1', 'Số Điện Thoại');
$activeSheet->setCellValue('D1', 'Email ');
$activeSheet->setCellValue('E1', 'Nội Dung Liên Hệ');
$activeSheet->setCellValue('F1', 'Ngày Gửi');
$dsn='mysql:host=localhost;dbname=shopgiay';
$user='root';
$pass='';
$db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
$select = "select * from lienhe";
$res=$db->query($select);
$count = $res->rowCount();
if ($count > 0) {
    $i = 2;
    while ($row = $res->fetch()) {
        $activeSheet->setCellValue('A' . $i, $row['id']);
        $activeSheet->setCellValue('B' . $i, $row['hoten']);
        $activeSheet->setCellValue('C' . $i, $row['sdt']);
        $activeSheet->setCellValue('D' . $i, $row['email']);
        $activeSheet->setCellValue('E' . $i, $row['noidung']);
        $activeSheet->setCellValue('F' . $i, $row['thoigian']);
        $i++;
    }
} else {
    $excelData = 'Không có dòng nào cả';
}
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ds_lien_he_shopgiay.xlsx");
header("Pragma: no-cache");
header("Expires: 0");
// $writer= IOFactory::createWriter($spreadsheet, 'Xlsx');
$Excel_writer->save('php://output');