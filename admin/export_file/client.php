<!-- văn 12/07 -->
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
///
// xét chiều rộng nếu muốn set height thì dùng setRowHeight()
$activeSheet->getColumnDimension('A')->setWidth(10);
$activeSheet->getColumnDimension('B')->setWidth(30);
$activeSheet->getColumnDimension('C')->setWidth(25);
$activeSheet->getColumnDimension('D')->setWidth(25);
$activeSheet->getColumnDimension('E')->setWidth(40);
$activeSheet->getColumnDimension('F')->setWidth(20);
$activeSheet->getColumnDimension('G')->setWidth(20);
$activeSheet->getColumnDimension('H')->setWidth(20);
$activeSheet->getColumnDimension('I')->setWidth(20);
$activeSheet->getColumnDimension('J')->setWidth(20);

$activeSheet->getStyle('A1:J1')->getFont()->setBold(true);
$activeSheet->setCellValue('A1', 'ID khách hàng');
$activeSheet->setCellValue('B1', 'Tên khách hàng');
$activeSheet->setCellValue('C1', 'email');
$activeSheet->setCellValue('D1', 'Số điện thoại ');
$activeSheet->setCellValue('E1', 'Địa chỉ khách hàng');
$activeSheet->setCellValue('F1', 'Giới tính khách hàng');
$activeSheet->setCellValue('G1', 'Tên đăng nhập');
$activeSheet->setCellValue('H1', 'Mật Khẩu ');
$activeSheet->setCellValue('I1', 'Ngày đăng ký ');
$activeSheet->setCellValue('J1', 'Trạng thái ');
$dsn='mysql:host=localhost;dbname=shopgiay';
$user='root';
$pass='';
$db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
$select = "select * from khach_hang";
$res=$db->query($select);
$count = $res->rowCount();
if ($count > 0) {
    $i = 2;
    while ($row = $res->fetch()) {
        $activeSheet->setCellValue('A' . $i, $row['id']);
        $activeSheet->setCellValue('B' . $i, $row['ten_kh']);
        $activeSheet->setCellValue('C' . $i, $row['email_kh']);
        $activeSheet->setCellValue('D' . $i, $row['sdt_kh']);
        $activeSheet->setCellValue('E' . $i, $row['dia_chi_kh']);
        $activeSheet->setCellValue('F' . $i, $row['gioi_tinh_kh']);
        $activeSheet->setCellValue('G' . $i, $row['ten_dn']);
        $activeSheet->setCellValue('H' . $i, $row['pass_dn']);
        $activeSheet->setCellValue('I' . $i, $row['ngay_dk']);
        $activeSheet->setCellValue('J' . $i, $row['status']);
        $i++;
    }
} else {
    $excelData = 'Không có dòng nào cả';
}
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ds_khach_hang_shopgiay.xlsx");
header("Pragma: no-cache");
header("Expires: 0");
// $writer= IOFactory::createWriter($spreadsheet, 'Xlsx');
$Excel_writer->save('php://output');