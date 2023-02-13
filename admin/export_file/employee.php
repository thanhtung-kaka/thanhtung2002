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
$activeSheet->getColumnDimension('B')->setWidth(20);
$activeSheet->getColumnDimension('C')->setWidth(25);
$activeSheet->getColumnDimension('D')->setWidth(10);
$activeSheet->getColumnDimension('E')->setWidth(20);
$activeSheet->getColumnDimension('F')->setWidth(20);
$activeSheet->getColumnDimension('G')->setWidth(20);
$activeSheet->getColumnDimension('H')->setWidth(20);
$activeSheet->getColumnDimension('I')->setWidth(20);
$activeSheet->getColumnDimension('J')->setWidth(20);
$activeSheet->getColumnDimension('K')->setWidth(20);
$activeSheet->getColumnDimension('L')->setWidth(20);
$activeSheet->getColumnDimension('M')->setWidth(20);


$activeSheet->getStyle('A1:M1')->getFont()->setBold(true);
$activeSheet->setCellValue('A1', 'ID nhân viên');
$activeSheet->setCellValue('B1', 'Họ Tên ');
$activeSheet->setCellValue('C1', 'Ngày sinh');
$activeSheet->setCellValue('D1', 'giới tính  ');
$activeSheet->setCellValue('E1', 'Số điện thoại ');
$activeSheet->setCellValue('F1', 'Email');
$activeSheet->setCellValue('G1', 'Địa chỉ ');
$activeSheet->setCellValue('H1', 'Link avatar');
$activeSheet->setCellValue('I1', 'Mật khẩu ');
$activeSheet->setCellValue('J1', 'Chức vụ');
$activeSheet->setCellValue('K1', 'Trạng thái làm việc');
$activeSheet->setCellValue('L1', 'Ngày tham gia');
$activeSheet->setCellValue('M1', 'Trạng thái tài khoản');
$dsn='mysql:host=localhost;dbname=shopgiay';
$user='root';
$pass='';
$db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
$select = "select * from admin";
$res=$db->query($select);
$count = $res->rowCount();
if ($count > 0) {
    $i = 2;
    while ($row = $res->fetch()) {
        $activeSheet->setCellValue('A' . $i, $row['id']);
        $activeSheet->setCellValue('B' . $i, $row['hoten_nv']);
        $activeSheet->setCellValue('C' . $i, $row['ngay_sinh']);
        $activeSheet->setCellValue('D' . $i, $row['gioi_tinh_nv']);
        $activeSheet->setCellValue('E' . $i, $row['sdt_nv']);
        $activeSheet->setCellValue('F' . $i, $row['email_nv']);
        $activeSheet->setCellValue('G' . $i, $row['dia_chi_nv']);
        $activeSheet->setCellValue('H' . $i, $row['avatar']);
        $activeSheet->setCellValue('I' . $i, $row['pass_dn']);
        $activeSheet->setCellValue('J' . $i, $row['role']);
        $activeSheet->setCellValue('K' . $i, $row['status']);
        $activeSheet->setCellValue('L' . $i, $row['ngay_tao']);
        $activeSheet->setCellValue('M' . $i, $row['statusAcc']);
        $i++;
    }
} else {
    $excelData = 'Không có dòng nào cả';
}
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ds_nhan_vien_shopgiay.xlsx");
header("Pragma: no-cache");
header("Expires: 0");
// $writer= IOFactory::createWriter($spreadsheet, 'Xlsx');
$Excel_writer->save('php://output');