<?php
// include 'connect.php';
// include 'sanpham.php';
require_once "../vendor/autoload.php";


// use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$Excel_writer = new Xlsx($spreadsheet);

$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();
// $activeSheet->setCellValue('A1', 'Id');
// $activeSheet->setCellValue('B1', 'Task');
// $activeSheet->setCellValue('C1', 'Status');
// $activeSheet->setCellValue('A2', 'sdasdas');
// $activeSheet->setCellValue('B2', 'dasdasgerg');
// $activeSheet->setCellValue('C2', 'dasdasdsadwegegerger');
$activeSheet->setCellValue('A1', 'Mã sản phẩm');
$activeSheet->setCellValue('B1', 'Tên sản phẩm');
$activeSheet->setCellValue('C1', 'Mô tả');
$activeSheet->setCellValue('D1', 'Ngày nhập');
$activeSheet->setCellValue('E1', 'Ngày sửa');
$activeSheet->setCellValue('F1', 'Số lượt xem');
$activeSheet->setCellValue('G1', 'Mã loại');
$activeSheet->setCellValue('H1', 'Status');
$dsn='mysql:host=localhost;dbname=shopgiay';
$user='root';
$pass='';
$db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
$select = "select * from sanpham";
$res=$db->query($select);
$count = $res->rowCount();
if ($count > 0) {
    $i = 2;
    while ($row = $res->fetch()) {
        $activeSheet->setCellValue('A' . $i, $row['masp']);
        $activeSheet->setCellValue('B' . $i, $row['tensp']);
        $activeSheet->setCellValue('C' . $i, $row['mota']);
        $activeSheet->setCellValue('D' . $i, $row['ngaynhap']);
        $activeSheet->setCellValue('E' . $i, $row['ngaysua']);
        $activeSheet->setCellValue('F' . $i, $row['soluotxem']);
        $activeSheet->setCellValue('G' . $i, $row['maloai_sp']);
        $activeSheet->setCellValue('H' . $i, $row['status']);
        $i++;
    }
} else {
    $excelData = 'Không có dòng nào cả';
}

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=product-data.xlsx");
header("Pragma: no-cache");
header("Expires: 0");
// $writer= IOFactory::createWriter($spreadsheet, 'Xlsx');
$Excel_writer->save('php://output');