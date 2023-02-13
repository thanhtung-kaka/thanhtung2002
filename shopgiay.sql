-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 11, 2022 lúc 11:49 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopgiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL COMMENT 'id admin',
  `hoten_nv` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'họ và tên ',
  `ngay_sinh` date DEFAULT NULL COMMENT 'ngày tháng năm sinh của nhân viên',
  `gioi_tinh_nv` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'giới tính của nhân viên',
  `sdt_nv` int(11) DEFAULT NULL COMMENT 'số điện thoại  ',
  `email_nv` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'email',
  `dia_chi_nv` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'địa chỉ ',
  `avatar` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ảnh địa diện',
  `pass_dn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'mật khẩu để đăng nhập ',
  `role` tinyint(1) DEFAULT NULL COMMENT 'phân quyền tài khoản ',
  `status` tinyint(1) DEFAULT NULL COMMENT 'trạng thái tài khoản',
  `ngay_tao` date DEFAULT NULL COMMENT 'ngày tạo tài khoản',
  `ngay_sua` date DEFAULT NULL COMMENT 'ngày admin chỉnh sửa ',
  `statusAcc` tinyint(1) NOT NULL COMMENT 'trạng thái tài khoản '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `hoten_nv`, `ngay_sinh`, `gioi_tinh_nv`, `sdt_nv`, `email_nv`, `dia_chi_nv`, `avatar`, `pass_dn`, `role`, `status`, `ngay_tao`, `ngay_sua`, `statusAcc`) VALUES
(2, 'Nguyễn Yến Nhi', '2022-07-31', 'nữ', 2147483647, 'yennhi@gmail.com', 'Thọ Xuân-Thanh Hóa', '../assets/images/update_img/1656987947_Mau-anh-the-dep-cua-con-gai.jpg', '5bfbc68e52d751d76597bf962006d169', 2, 1, '2022-07-05', '2022-07-07', 1),
(3, 'admin lê văn', '2019-06-20', 'nam', 23232321, 'admin@gmail.com', 'TP.HCM Việt Nam', '../assets/images/update_img/1657100851_td.jpg', '202cb962ac59075b964b07152d234b70', 1, 1, '2022-07-05', '2022-07-07', 1),
(4, 'lê văn văn', '2022-07-14', 'khác', 4646456, 'van@gmail.com', 'Hà nội', '../assets/images/update_img/1656987831_dino-studio-anh-vien-cho-be-va-gia-dinh-317623.jpg', '698d51a19d8a121ce581499d7b701668', 2, 2, '2022-07-05', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_cmt` int(11) NOT NULL COMMENT 'id comment',
  `masp` int(11) NOT NULL COMMENT 'id sản phẩm',
  `id_kh` int(11) NOT NULL COMMENT 'id khách hàng',
  `ten_kh` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên khách hàng',
  `desc` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung bình luận',
  `date_cmt` datetime NOT NULL COMMENT 'thời gian khách hàng bình luận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_cmt`, `masp`, `id_kh`, `ten_kh`, `desc`, `date_cmt`) VALUES
(3, 70, 24, 'Lê văn', 'Dũng vipro\r\n', '2022-06-27 02:06:33'),
(4, 70, 24, 'Lê văn', 'đẹp quá anh ơi ', '2022-07-06 10:07:09'),
(5, 70, 24, 'LÊ VĂN VĂN', 'giày đẹp\r\n', '2022-07-09 09:07:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `mahd` int(11) NOT NULL COMMENT 'mã hóa đơn',
  `masp` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `matt` int(11) NOT NULL COMMENT 'mã thuộc tính của sản phẩm',
  `soluongmua` int(11) NOT NULL COMMENT 'số lượng sản phẩm đã mua',
  `mausac` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'màu sắc của sản phẩm',
  `size` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'size của sản phẩm',
  `thanhtien` double NOT NULL COMMENT 'thành tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`mahd`, `masp`, `matt`, `soluongmua`, `mausac`, `size`, `thanhtien`) VALUES
(78, 70, 61, 1, 'vàng', '36', 250000),
(78, 70, 63, 1, 'Đỏ', '38', 243000),
(78, 70, 68, 1, 'Đỏ', '39', 243000),
(79, 70, 68, 1, 'Đỏ', '39', 243000),
(80, 70, 63, 1, 'Đỏ', '38', 243000),
(81, 70, 62, 2, 'kem', '36', 486000),
(82, 70, 35, 1, 'Xám', '39', 243000),
(83, 70, 61, 2, 'vàng', '36', 500000),
(84, 70, 62, 1, 'kem', '36', 243000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc_sp`
--

CREATE TABLE `danhmuc_sp` (
  `madm_sp` int(11) NOT NULL COMMENT 'mã danh mục',
  `tendm` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `danhmuc_sp`
--

INSERT INTO `danhmuc_sp` (`madm_sp`, `tendm`) VALUES
(2, 'giày nam'),
(4, 'giày nữ'),
(10, 'phụ kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` int(11) NOT NULL COMMENT 'mã hóa đơn',
  `makh` int(11) NOT NULL COMMENT 'mã khách hàng',
  `hoten` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên người đặt',
  `mail` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'mail người đặt',
  `sdt` int(11) NOT NULL COMMENT 'số điện thoạt người đặt',
  `diachi` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'địa chỉ người đặt',
  `payment` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'phương thức thanh toán',
  `tongtien` float NOT NULL COMMENT 'tổng tiền của đơn hàng',
  `ghichu` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ghi chú của khách hàng',
  `trangthai` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'trạng thái đơn hàng',
  `ngaydat` datetime NOT NULL COMMENT 'ngày đặt hàng',
  `ngaycaphat` datetime DEFAULT NULL COMMENT 'ngày cập nhật đơn hàg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `makh`, `hoten`, `mail`, `sdt`, `diachi`, `payment`, `tongtien`, `ghichu`, `trangthai`, `ngaydat`, `ngaycaphat`) VALUES
(78, 24, 'h', 'h', 0, 'h', 'Thanh toán khi nhận hàng', 736000, 'sz', 'Đang xử lý', '2022-07-07 02:33:32', NULL),
(79, 24, 'j', 'y', 0, 'n', 'Thanh toán khi nhận hàng', 243000, 'fsxzsxs', 'Đang xử lý', '2022-07-07 03:45:44', NULL),
(80, 24, 'q', 'h', 0, 'h', 'Thanh toán khi nhận hàng', 243000, 'sdce', 'Đang xử lý', '2022-07-08 11:34:01', NULL),
(81, 24, 'Dũng', 'dung@gmail.com', 2147483647, 'TÂY THIÊN', 'Thanh toán khi nhận hàng', 486000, 'NGU', 'Đang xử lý', '2022-07-08 03:47:06', NULL),
(82, 24, 'Ngu', 'ngu@gmail.com', 987654321, 'hahaha', 'Thanh toán khi nhận hàng', 243000, 'ngu', 'Đang xử lý', '2022-07-08 03:59:10', NULL),
(83, 24, 'ụy ', 'gIUG', 948857492, 'điểm G', 'Thanh toán khi nhận hàng', 500000, 'VSÁCCZSC', 'Đang xử lý', '2022-07-09 09:37:20', '2022-07-11 04:37:00'),
(84, 24, 'gig8', 'ùy', 321987654, 'nhà dũng heo', 'Thanh toán khi nhận hàng', 243000, '', 'Đang xử lý', '2022-07-09 09:59:53', '2022-07-11 04:26:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL COMMENT 'id khách hàng ',
  `ten_kh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'họ tên khách hàng ',
  `email_kh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'email của khách hàng',
  `sdt_kh` int(11) DEFAULT NULL COMMENT 'số điện thoại của khách hàng',
  `dia_chi_kh` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'địa chỉ của khách hàng',
  `gioi_tinh_kh` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'giới tính của khách hàng ',
  `ten_dn` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tên đăng nhập của khách hàng',
  `pass_dn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'mật khẩu để đăng nhập của khách hàng ',
  `ngay_dk` date DEFAULT NULL COMMENT 'ngày đăng ký tài khoản của khách hàng ',
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình ảnh đại diện của khách hàng ',
  `ngay_sua` date DEFAULT NULL COMMENT 'ngày admin chỉnh sửa',
  `status` tinyint(1) DEFAULT NULL COMMENT 'trạng thái '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ten_kh`, `email_kh`, `sdt_kh`, `dia_chi_kh`, `gioi_tinh_kh`, `ten_dn`, `pass_dn`, `ngay_dk`, `avatar`, `ngay_sua`, `status`) VALUES
(20, 'Bùi tiến dũng', 'dung@gmail.com', 2147483647, 'Thanh Hóa', 'nam', 'dung123', 'e65f866832d4da9a51c8e2324b4b8e83', '2022-06-30', '../assets/images/update_img/1656663118_td.jpg', '2022-07-07', 1),
(21, 'Đặng Văn Lâm', 'Lam@gmail.com', 2147483647, 'Nga ', 'nam', 'lamtay', '54a2ec5f4421fa24bfa9bf6461e649a2', '2022-06-30', '../assets/images/update_img/1656811158_lam.jpg', '2022-07-07', 1),
(24, 'LÊ VĂN VĂN', 'levoduyan02@gmail.com', 123456789, 'ở mãi cà mau', 'nam', 'Van202', '202cb962ac59075b964b07152d234b70', '2022-07-07', '../assets/images/update_img/1657187138_ava2.jpg', '2022-07-07', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL COMMENT 'số thứ tự người gửi liên hệ  ,auto',
  `hoten` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'họ tên người gủi liên hệ ',
  `sdt` int(11) NOT NULL COMMENT 'số điện thoại người liên hệ ',
  `email` char(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email người liên hệ ',
  `noidung` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung liên hệ/phản hồi',
  `thoigian` date DEFAULT NULL COMMENT 'ngày liên hệ ',
  `ngaysua` date DEFAULT NULL COMMENT 'ngày admin chỉnh  sửa '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `hoten`, `sdt`, `email`, `noidung`, `thoigian`, `ngaysua`) VALUES
(56, 'Võ Duy An', 982828211, '02@gmail.com', 'test mãi ', '2022-06-17', '2022-06-20'),
(58, 'Lê văn văn', 928436522, 'om202@gmail.com', 'cố lên người ae', '2022-06-17', '2022-06-17'),
(63, 'Công Phượng jpr', 973743433, 'phuong@gmail.com', 'vô địch world cup 2022', '2022-06-17', '2022-06-17'),
(64, 'Độ Mixi', 939493233, 'dochet.1988@gmail.com', 'hí ae , tôi sủi stream đây ', '2022-06-17', '2022-06-17'),
(65, 'Nguyễn Hoàng Đức', 2147483647, 'hoangduc@gmail.com', 'đá cho CLB Real Madrid 2025', '2022-06-17', '2022-07-04'),
(66, 'Ronaldo', 2147483647, 'ronaldo@gmail.com', 'hết tiền rồi', '2022-06-17', '2022-06-18'),
(68, 'Liên Hệ admin', 2147483647, 'sa647@gmail.com', 'Liên Hệ', '2022-06-18', '2022-06-18'),
(69, 'Ngô Tất Tố', 378573847, 'Tatto@gmail.com', 'ngô tất tố ghé chơi', '2022-06-18', NULL),
(70, 'Test alert 2', 403849593, 'alert@gmail.com', 'nội dung bay màu  alert', '2022-06-18', '2022-07-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sp`
--

CREATE TABLE `loai_sp` (
  `maloai_sp` int(11) NOT NULL,
  `tenloai` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `madm_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `loai_sp`
--

INSERT INTO `loai_sp` (`maloai_sp`, `tenloai`, `madm_sp`) VALUES
(5, 'giày thể thao nam', 2),
(6, 'giày tây &amp; slip on', 2),
(9, 'giày cao gót', 4),
(14, 'sandal nam', 2),
(15, 'sandal nữ', 4),
(16, 'giày búp bê', 4),
(17, 'vớ', 10),
(18, 'dây giày', 10),
(19, 'chai vệ sinh giày', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_tintuc`
--

CREATE TABLE `loai_tintuc` (
  `loai_tintuc_id` int(11) NOT NULL COMMENT 'mã loại tin tức',
  `ten_loai_tintuc` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên loại tin tức'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_tintuc`
--

INSERT INTO `loai_tintuc` (`loai_tintuc_id`, `ten_loai_tintuc`) VALUES
(0, 'Không danh mục'),
(1, 'Tin mới'),
(2, 'Phong cách');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausac`
--

CREATE TABLE `mausac` (
  `mamau` int(11) NOT NULL,
  `tenmau` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `mausac`
--

INSERT INTO `mausac` (`mamau`, `tenmau`) VALUES
(1, 'trắng'),
(2, 'Đen'),
(3, 'Đỏ'),
(4, 'Xám'),
(6, 'nâu'),
(7, 'vàng'),
(8, 'kem'),
(9, 'hồng'),
(10, 'xanhl'),
(11, 'không màu'),
(12, 'Tím');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `tensp` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên sản phẩm',
  `mota` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'mô tả của sản phẩm',
  `ngaynhap` datetime DEFAULT NULL COMMENT 'ngày nhập sản phẩm',
  `ngaysua` datetime DEFAULT NULL COMMENT 'ngày sửa sản phẩm',
  `soluotxem` int(11) DEFAULT NULL COMMENT 'số lượt ngươi xem sản phẩm',
  `maloai_sp` int(11) NOT NULL COMMENT 'mã loại của bảng loại sản phẩm',
  `status` tinyint(1) NOT NULL COMMENT 'trạng thái của sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `mota`, `ngaynhap`, `ngaysua`, `soluotxem`, `maloai_sp`, `status`) VALUES
(70, 'Giày Thể Thao Nam MWC NATT - 5368', 'Giày Thể Thao Nam MWC NATT - 5368 là mẫu giày được thiết kế theo phong cách hiện đại, màu sắc khỏe khoắn, sang trọng mang đến cho bạn 1 diện mạo hoàn toàn cá tính. Đặc biệt sản phẩm sử dụng chất liệu cao cấp có độ bền tối ưu giúp bạn thoải mái trong mọi hoàn cảnh.  ', '2022-06-15 00:00:00', '2022-06-25 01:50:26', 24, 5, 1),
(76, 'Giày Boot Nam MWC NABO- 8031', 'Sản phẩm Giày mọi nam MWC NABO- 8031 mang vẻ đẹp đầy quyền uy mà vẫn thời thượng, hiện đại. Khi sử dụng, bạn sẽ cực kỳ tự tin với một đôi giày êm chân và không gây bức bí khó chịu', '2022-06-15 00:00:00', '2022-06-24 11:28:16', 4, 6, 1),
(91, 'Giày Thể Thao Nam MWC NATT - 5369', 'Giày Thể Thao Nam MWC NATT - 5369  là mẫu giày được thiết kế theo phong cách hiện đại, màu sắc khỏe khoắn, sang trọng mang đến cho bạn 1 diện mạo hoàn toàn cá tính. Đặc biệt sản phẩm sử dụng chất liệu cao cấp có độ bền tối ưu giúp bạn thoải mái trong mọi hoàn cảnh.', '2022-06-16 05:09:07', '2022-06-25 11:55:50', 11, 5, 1),
(92, 'Giày Thể Thao Nam MWC NATT - 5301', 'Giày Thể Thao Nam MWC NATT - 5301 là mẫu giày được thiết kế theo phong cách hiện đại, màu sắc khỏe khoắn, sang trọng mang đến cho bạn 1 diện mạo hoàn toàn cá tính. Đặc biệt sản phẩm sử dụng chất liệu cao cấp có độ bền tối ưu giúp bạn thoải mái trong mọi hoàn cảnh.\r\nChất liệu cao cấp : thoáng khí cả mặt trong lẫn mặt ngoài khiến người mang luôn cảm thấy dễ chịu dù hoạt động trong thời gian dài.', '2022-06-16 05:09:21', '2022-06-25 11:55:33', 0, 5, 1),
(93, 'Giày Mọi Nam MWC NAMO- 6637', '- Điểm nổi bật:  Sản phẩm hoàn hảo từ thiết kế, kiểu dáng cho tới chất liệu. Chất da nguyên miếng nhập khẩu tạo nên vẻ bóng lì rất hút mắt và sang trọng khi đặt cạnh những chất da khác. Từng đường kim mũi chỉ trên thân giày đều đặn, chắc chắn, cho độ bền ở mức cao nhất. Đế giày kết hợp cao su chóng trơn trượt và đế phíp đẳng cấp đẹp mắt. ', '2022-06-16 05:09:23', '2022-06-25 11:56:09', 3, 6, 1),
(94, 'Giày Sandal Nam MWC NASD- 7061', '', '2022-06-16 05:09:24', '2022-06-25 11:57:18', 0, 14, 1),
(95, 'Giày Mọi Nam MWC NAMO- 6626', 'Điểm khác biệt: Sản phẩm Giày mọi nam MWC NABO- 8031 mang vẻ đẹp đầy quyền uy mà vẫn thời thượng, hiện đại. Khi sử dụng, bạn sẽ cực kỳ tự tin với một đôi giày êm chân và không gây bức bí khó chịu. ', '2022-06-16 05:09:32', '2022-06-25 11:58:20', 10, 6, 1),
(97, 'Giày Sandal Nam MWC NASD- 7052', 'Giày sandal nam MWC NASD- 7052 có thiết kế đơn giản, nam tính nhưng mang lại sự tiện dụng cao cho người mang và phù hợp với mọi lứa tuổi. Dòng sản phẩm Giày sandal nam MWC NASD- 7052  thiết kế dành riêng cho nam giới với kiểu dáng đơn giản pha chút hiện đại, tạo cho người mang cảm giác vững chải nhưng lại rất thời trang. Sản phẩm sử dụng các gam màu thanh lịch, đế cao su mềm, nhẹ thích hợp cùng bạn hoạt động suốt ngày dài. Hãy nhanh tay sở hữu sản phẩm tại MWC nhé !', '2022-06-18 10:41:27', '2022-06-25 11:58:51', 7, 14, 1),
(98, 'Giày Sandal Nam MWC NASD- 7027', '', '2022-06-19 02:59:45', '2022-06-25 11:59:12', 0, 14, 0),
(99, 'Giày Thể Thao Nam MWC NATT - 5367', 'Giày Thể Thao Nam MWC NATT - 5367 là mẫu giày được thiết kế theo phong cách hiện đại, màu sắc khỏe khoắn, sang trọng mang đến cho bạn 1 diện mạo hoàn toàn cá tính. Đặc biệt sản phẩm sử dụng chất liệu cao cấp có độ bền tối ưu giúp bạn thoải mái trong mọi hoàn cảnh.', '2022-06-19 06:19:17', '2022-06-25 11:59:35', 0, 5, 1),
(100, 'Giày Thể Thao Nam MWC NATT- 5010', '', '2022-06-19 10:10:06', '2022-06-25 11:59:53', 0, 5, 0),
(101, 'Giày Thể Thao Nam MWC NATT - 5358', 'Giày Thể Thao Nam MWC NATT - 5358 là mẫu giày được thiết kế theo phong cách hiện đại, màu sắc khỏe khoắn, sang trọng mang đến cho bạn 1 diện mạo hoàn toàn cá tính. Đặc biệt sản phẩm sử dụng chất liệu cao cấp có độ bền tối ưu giúp bạn thoải mái trong mọi hoàn cảnh.', '2022-06-19 06:27:47', '2022-06-25 12:00:30', 0, 9, 0),
(102, 'Giày Búp Bê MWC NUBB- 2234', 'Giày búp bê MWC NUBB- 2234 với thiết kế đính khóa sang trọng giúp bạn dễ dàng phối hợp với nhiều trang phục để có một phong cách thời trang thật sành điệu và nữ tính. Giày được làm từ chất liệu da nhung cao cấp, đường chỉ may chắc chắn giúp sản phẩm có độ bền tối ưu và nâng niu từng bước chân của bạn.\r\n', '2022-06-19 06:31:56', '2022-06-25 12:00:11', 0, 16, 0),
(103, 'Giày Búp Bê MWC NUBB- 2267', 'Giày búp bê MWC NUBB- 2267 với thiết kế mới sang trọng giúp bạn dễ dàng phối hợp với nhiều trang phục để có một phong cách thời trang thật sành điệu và nữ tính. Giày được làm từ chất liệu da cao cấp, đường chỉ may chắc chắn giúp sản phẩm có độ bền tối ưu và nâng niu từng bước chân của bạn.', '2022-06-19 06:33:42', '2022-06-25 12:00:46', 0, 16, 0),
(104, 'Giày Búp Bê MWC NUBB- 2209', 'Giày búp bê MWC NUBB- 2209 với thiết kế trẻ trung, năng động nhưng không kém phần sang trọng, thanh lịch góp phần tạo nên phong cách cũng như khẳng định khiếu thẩm mỹ của bạn. Đường may tinh tế, sắc sảo + màu sắc trang nhã, đẹp mắt tôn lên sự đẳng cấp cho sản phẩm và thương hiệu. Ngoài ra Giày búp bê MWC NUBB- 2209 rất dễ dàng phối hợp cùng nhiều loại trang phục khác nhau, thích hợp khi đi làm, dạo phố hoặc dự tiệc...', '2022-06-19 06:35:20', '2022-06-25 12:01:05', 0, 16, 0),
(105, 'Giày Sandal Nữ MWC NUSD- 2925', 'Giày sandal nữ MWC NUSD- 2925 với thiết kế trẻ trung, cá tính cực kì phù hợp cho bạn đi học, đi làm hay dạo phố, chất liệu cao cấp tôn lên nét sang trọng cho người sử dụng.', '2022-06-19 06:38:42', '2022-06-25 12:01:30', 0, 15, 0),
(106, 'Giày Sandal Nữ MWC NUSD-2910', '', '2022-06-19 06:40:13', '2022-06-25 12:02:21', 0, 15, 0),
(107, 'Giày Sandal Nữ MWC NUSD- 2889', 'Giày sandal nữ MWC NUSD- 2889 sử dụng chất liệu da bóng bền đẹp, lớp lót giày mềm mại cực kỳ êm chân. Đường may tỉ mỉ, form giày chuẩn đem lại cảm giác thoải mái cho bạn gái khi mang.', '2022-06-19 06:41:52', '2022-06-25 12:02:58', 0, 15, 0),
(108, 'Vớ Nam Nữ MWC - AT20', '', '2022-06-19 06:43:51', '2022-06-25 12:03:13', 0, 17, 0),
(109, 'Dây Giày Thể Thao Bản Dẹp Mix 2 Màu MWC- 9017', '', '2022-06-19 06:45:11', '2022-06-25 12:03:32', 0, 18, 0),
(110, 'Chai Vệ Sinh Giày Dép MWC ( Dạng Xịt )- 9003', '', '2022-06-19 06:46:40', '2022-06-25 12:04:26', 0, 19, 0),
(111, 'Giày Cao Gót MWC NUCG - 4176', '', '2022-06-19 06:19:17', '2022-06-25 12:04:49', 0, 9, 0),
(112, 'Giày Cao Gót MWC NUCG-4157', 'Giày cao gót MWC NUCG-4157 với thiết kế trẻ trung, năng động nhưng không kém phần sang trọng, thanh lịch góp phần tạo nên phong cách cũng như khẳng định khiếu thẩm mỹ của bạn. Đường may tinh tế, sắc sảo, màu sắc trang nhã đẹp mắt tạo nên sự đẳng cấp cho sản phẩm và thương hiệu. Ngoài ra sản phẩm rất dễ dàng phối hợp cùng nhiều loại trang phục khác nhau, thích hợp khi đi làm, dạo phố hoặc dự tiệc...', '2022-06-19 06:24:02', '2022-06-25 12:05:20', 0, 9, 0),
(113, 'Giày Cao Gót MWC NUCG- 4323', 'Giày cao gót MWC NUCG-4323 sử dụng chất liệu da bóng bền đẹp, lớp lót giày mềm mại cực kỳ êm chân. Đường may tỉ mỉ, form giày chuẩn đem lại cảm giác thoải mái cho bạn gái khi mang.', '2022-06-19 06:27:47', '2022-06-25 12:05:43', 0, 9, 0),
(115, '1', 'ưergergsdf', '2022-06-21 03:39:27', '2022-06-25 10:47:04', 0, 14, 0),
(117, 'Giày Thể Thao Nam MWC NATT - 5368', 'Giày Thể Thao Nam MWC NATT - 5368 là mẫu giày được thiết kế theo phong cách hiện đại, màu sắc khỏe khoắn, sang trọng mang đến cho bạn 1 diện mạo hoàn toàn cá tính. Đặc biệt sản phẩm sử dụng chất liệu cao cấp có độ bền tối ưu giúp bạn thoải mái trong mọi hoàn cảnh.  ', '2022-06-15 00:00:00', '2022-06-27 05:17:32', 0, 5, 0),
(118, 'Giày Thể Thao Nam MWC NATT - 5368', 'Giày Thể Thao Nam MWC NATT - 5368 là mẫu giày được thiết kế theo phong cách hiện đại, màu sắc khỏe khoắn, sang trọng mang đến cho bạn 1 diện mạo hoàn toàn cá tính. Đặc biệt sản phẩm sử dụng chất liệu cao cấp có độ bền tối ưu giúp bạn thoải mái trong mọi hoàn cảnh.  ', '2022-06-15 00:00:00', '2022-06-27 04:59:26', 0, 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `ma_size` int(11) NOT NULL,
  `so_size` char(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`ma_size`, `so_size`) VALUES
(1, '35'),
(2, '36'),
(3, '37'),
(4, '38'),
(5, '39'),
(6, '40'),
(7, '41'),
(10, '42'),
(11, '43'),
(12, '44'),
(13, 'free size');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoctinh_sp`
--

CREATE TABLE `thuoctinh_sp` (
  `matt` int(11) NOT NULL COMMENT 'mã thuộc tính của sản phẩm',
  `masp` int(11) NOT NULL COMMENT 'mã sản phẩm',
  `mamau` int(11) NOT NULL COMMENT 'mã màu',
  `masize` int(11) NOT NULL COMMENT 'mã size',
  `dongia` float NOT NULL COMMENT 'đơn giá của sản phẩm',
  `giamgia` float NOT NULL COMMENT 'cột giảm giá của sản phẩm',
  `soluongton` int(11) NOT NULL COMMENT 'số lượng tồn của sản phẩm',
  `hinh` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình ảnh của sản phẩm',
  `status` tinyint(1) NOT NULL COMMENT 'trạng thái của thuộc tính'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `thuoctinh_sp`
--

INSERT INTO `thuoctinh_sp` (`matt`, `masp`, `mamau`, `masize`, `dongia`, `giamgia`, `soluongton`, `hinh`, `status`) VALUES
(1, 120, 2, 3, 200000, 3423, 342, '', 0),
(2, 121, 2, 3, 111, 1, 1, '../assets/images/update_img/1656401117_5358.png', 0),
(35, 70, 4, 5, 243000, 0, 69, '../assets/images/update_img/1655636127_5368.png', 1),
(36, 76, 2, 2, 225000, 0, 10, '../assets/images/update_img/1655801462_8031.jpg', 1),
(37, 91, 3, 2, 243000, 0, 10, '../assets/images/update_img/1655636209_5369.png', 1),
(38, 92, 4, 6, 243000, 0, 10, '../assets/images/update_img/1655636609_5301.jpg', 0),
(39, 93, 2, 6, 225000, 0, 10, '../assets/images/update_img/1655636730_6637.jpg', 1),
(40, 94, 2, 7, 225000, 0, 10, '../assets/images/update_img/1655637001_7061.jpg', 1),
(41, 95, 6, 5, 247000, 0, 10, '../assets/images/update_img/1655636835_6626.jpg', 1),
(42, 97, 2, 6, 175000, 0, 10, '../assets/images/update_img/1655637145_7052.jpg', 1),
(43, 98, 0, 0, 193000, 0, 10, '../assets/images/update_img/1655637227_7027.jpg', 0),
(44, 99, 1, 10, 243000, 0, 10, '../assets/images/update_img/1655650426_5367.jpg', 1),
(45, 100, 0, 0, 135000, 0, 10, '../assets/images/update_img/1655651355_5010.jpg', 0),
(46, 101, 0, 0, 265000, 0, 10, '../assets/images/update_img/1655652039_5358.png', 0),
(47, 102, 0, 0, 135000, 0, 10, '../assets/images/update_img/1655638271_2234.jpg', 0),
(48, 103, 0, 0, 175000, 0, 10, '../assets/images/update_img/1655638419_2237.jpg', 0),
(49, 104, 0, 0, 135000, 0, 10, '../assets/images/update_img/1655638509_2209.jpg', 0),
(50, 105, 0, 0, 135000, 0, 10, '../assets/images/update_img/1655638721_2925.jpg', 0),
(51, 106, 0, 0, 210000, 0, 10, '../assets/images/update_img/1655638812_2910.jpg', 0),
(52, 107, 0, 0, 85000, 0, 10, '../assets/images/update_img/1655638903_2889.jpg', 0),
(53, 108, 0, 0, 39000, 0, 10, '../assets/images/update_img/1655639022_at20.jpg', 0),
(54, 109, 0, 0, 20000, 0, 10, '../assets/images/update_img/1655639109_9017.jpg', 0),
(55, 110, 0, 0, 25000, 0, 10, '../assets/images/update_img/1655639199_9003.jpg', 0),
(56, 111, 0, 0, 243000, 0, 10, '../assets/images/update_img/1655637554_4176.jpg', 0),
(57, 112, 0, 0, 175500, 0, 10, '../assets/images/update_img/1655637828_4152.jpg', 0),
(58, 113, 0, 0, 175000, 0, 10, '../assets/images/update_img/1655638053_4323jpg.jpg', 0),
(59, 115, 0, 0, 2, 3, 4, '../assets/images/update_img/1655800763_trangloai_sp_admin.png', 0),
(61, 70, 7, 2, 250000, 0, 13, '../assets/images/update_img/1656582999_2209.jpg', 1),
(62, 70, 8, 2, 243000, 0, 11, '../assets/images/update_img/1656556627_2234.jpg', 1),
(63, 70, 3, 4, 243000, 0, 2, '../assets/images/update_img/1656556648_khoaichien.jpg', 1),
(67, 118, 4, 4, 200000, 190000, 50000, '../assets/images/update_img/1656556604_5358.png', 0),
(68, 70, 3, 5, 243000, 0, 20, '../assets/images/update_img/1656556648_khoaichien.jpg', 1),
(74, 0, 0, 0, 0, 0, 0, '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `tintuc_id` int(11) NOT NULL COMMENT 'mã tin tức',
  `loai_tintuc_id` int(11) NOT NULL COMMENT 'mã loại tin tức',
  `tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề tin tức',
  `luot_xem` int(11) NOT NULL COMMENT 'lượt xem',
  `mota_ngan` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'mô tả ngắn',
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nội dung tin tức',
  `image_tintuc` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ảnh tin tức',
  `status` int(11) NOT NULL COMMENT 'trạng thái tin tức đăng hay không đăng',
  `date_update` datetime NOT NULL COMMENT 'thời gian cập nhật tin tức'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`tintuc_id`, `loai_tintuc_id`, `tieu_de`, `luot_xem`, `mota_ngan`, `noi_dung`, `image_tintuc`, `status`, `date_update`) VALUES
(1, 1, 'Quý ông muốn diện bảnh xem ngay các hãng giày tây nổi tiếng', 18, 'Các hãng giày tây nổi tiếng được giới thiệu sau là những thương hiệu đáng tin cậy để bạn tìm mua giày tây nam diện đẹp cho mình hay làm quà tặng người thân, bạn bè, đồng nghiệp. Tham khảo ưu điểm và đặc trưng của từng thương hiệu trong bài viết dưới đây nhé và chúc bạn thuận lợi tìm được mẫu ', '<p><strong>C&aacute;c h&atilde;ng gi&agrave;y t&acirc;y nổi tiếng</strong>&nbsp;được giới thiệu sau l&agrave; những thương hiệu đ&aacute;ng tin cậy để bạn t&igrave;m mua gi&agrave;y t&acirc;y nam diện đẹp cho m&igrave;nh hay l&agrave;m qu&agrave; tặng người th&acirc;n, bạn b&egrave;, đồng nghiệp. Tham khảo ưu điểm v&agrave; đặc trưng của từng thương hiệu trong b&agrave;i viết dưới đ&acirc;y nh&eacute; v&agrave; ch&uacute;c bạn thuận lợi t&igrave;m được mẫu gi&agrave;y mong muốn.&nbsp;&nbsp;</p>\r\n<h1><strong>H&atilde;ng gi&agrave;y t&acirc;y DOLOMen</strong></h1>\r\n<p>&nbsp;<strong>DOLOMen</strong> l&agrave; một trong <strong>c&aacute;c h&atilde;ng gi&agrave;y t&acirc;y nổi tiếng</strong>&nbsp;được vận h&agrave;nh C&ocirc;ng ty CP thời trang DOLO, doanh nghiệp vinh dự c&oacute; mặt ở top 50 Thương hiệu tin cậy năm 2019. Chất lượng vốn lu&ocirc;n được tạo dựng từ sự tận tụy, do đ&oacute; DOLOMen chắc chắn sẽ l&agrave; một thương hiệu gi&agrave;y t&acirc;y uy t&iacute;n m&agrave; c&aacute;c Qu&yacute; &ocirc;ng n&ecirc;n trải nghiệm.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/2010.jpg\" alt=\"\" /></p>\r\n<p style=\"text-align: center;\"><em>DOLOMen lu&ocirc;n hướng tới kh&aacute;ch h&agrave;ng để tạo n&ecirc;n gi&aacute; trị đ&iacute;ch thực</em></p>\r\n<p>&nbsp;</p>\r\n<p>DOLOMen hiện c&oacute; nhiều showroom tại TP.HCM - H&agrave; Nội v&agrave; nhiều tỉnh th&agrave;nh tr&ecirc;n cả nước, rất thuận lợi để Qu&yacute; kh&aacute;ch đến trải nghiệm v&agrave; mua h&agrave;ng. Gi&agrave;y t&acirc;y của DOLOMen lu&ocirc;n đa dạng về mẫu m&atilde;, m&agrave;u sắc, phong c&aacute;ch lẫn gi&aacute; cả, đa số sản phẩm c&oacute; mức gi&aacute; dao động trung b&igrave;nh từ 1.500.000 đến tr&ecirc;n 2.000.000 triệu đồng.&nbsp;</p>\r\n<h1><strong>H&atilde;ng gi&agrave;y t&acirc;y Ecco</strong></h1>\r\n<p>Nếu bạn đang t&igrave;m kiếm thương hiệu gi&agrave;y c&oacute; thiết kế tối giản th&igrave; Ecco ch&iacute;nh l&agrave; c&aacute;i t&ecirc;n m&agrave; bạn n&ecirc;n c&acirc;n nhắc. Bởi, trong h&agrave;nh tr&igrave;nh ph&aacute;t triển của m&igrave;nh, Ecco lu&ocirc;n theo đuổi l&yacute; tưởng: Tối giản sẽ đem lại sự thoải m&aacute;i đến bước ch&acirc;n người d&ugrave;ng.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/2011.jpg\" alt=\"\" width=\"597\" height=\"597\" /></p>\r\n<p style=\"text-align: center;\"><em>Ecco l&agrave; thương hiệu gi&agrave;y t&acirc;y xuất xứ Đan Mạch</em></p>\r\n<p>&nbsp;</p>\r\n<p>Tr&ecirc;n 4.000.000 đến 7.000.000 đồng l&agrave; mức gi&aacute; tham khảo cho một mẫu gi&agrave;y t&acirc;y Ecco. Đồng thời, với gần 30 cửa h&agrave;ng tọa lạc ở nhiều TTTM của c&aacute;c th&agrave;nh phố lớn, đ&acirc;y ch&iacute;nh l&agrave; một điểm cộng của thương hiệu nhằm gi&uacute;p người d&ugrave;ng dễ d&agrave;ng tiếp cận v&agrave; trải nghiệm sản phẩm hơn.&nbsp;</p>\r\n<h1><strong>H&atilde;ng gi&agrave;y t&acirc;y ALDO</strong></h1>\r\n<p>Trong&nbsp;<strong>những thương hiệu gi&agrave;y t&acirc;y nổi tiếng</strong>&nbsp;ngoại nhập ngo&agrave;i Ecco th&igrave; Aldo cũng l&agrave; h&atilde;ng gi&agrave;y đ&aacute;ng lựa chọn. Giống như nhiều thương hiệu kh&aacute;c, sản phẩm của ALDO kh&ocirc;ng bao giờ thiếu sự mới mẻ, tuy vậy, gi&agrave;y t&acirc;y của Aldo lại c&oacute; mức gi&aacute; kh&aacute; &ldquo;dễ chịu&rdquo;, thường chỉ ch&ecirc;nh lệch từ 2.000.000 đến 3.000.000 đồng.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/2012.jpg\" alt=\"\" width=\"666\" height=\"666\" /></p>\r\n<p style=\"text-align: center;\"><em>Aldo l&agrave; nh&atilde;n hiệu th&agrave;nh lập từ những năm 1970 tại Canada</em></p>\r\n<p>&nbsp;</p>\r\n<p>Mẫu m&atilde; gi&agrave;y t&acirc;y tại Aldo rất phong ph&uacute;, tuy nhi&ecirc;n nh&oacute;m kh&aacute;ch l&agrave;m m&agrave; thương hiệu n&agrave;y tập trung chủ yếu l&agrave; người trẻ vậy n&ecirc;n kiểu d&aacute;ng sẽ thi&ecirc;n nhiều về t&iacute;nh trẻ trung, l&agrave; lựa chọn ph&ugrave; hợp với người d&ugrave;ng trẻ tuổi.</p>\r\n<h1><strong>H&atilde;ng gi&agrave;y t&acirc;y Đ&ocirc;ng Hải</strong></h1>\r\n<p>Đ&ocirc;ng Hải l&agrave; một thương hiệu uy t&iacute;n được xếp v&agrave;o top&nbsp;<strong>những h&atilde;ng gi&agrave;y t&acirc;y nổi tiếng</strong>&nbsp;của người d&ugrave;ng Việt. Tạo dấu ấn với c&aacute;c mẫu gi&agrave;y t&acirc;y được may đo tỉ mỉ từ da cao cấp, sở hữu nhiều mẫu m&atilde; c&oacute; thiết kế hiện đại, thanh lịch n&ecirc;n Đ&ocirc;ng Hải đ&atilde; trở th&agrave;nh nh&atilde;n hiệu quen thuộc với người s&agrave;nh gi&agrave;y t&acirc;y.</p>\r\n<p>&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/2013.jpg\" alt=\"\" width=\"621\" height=\"621\" /></p>\r\n<p style=\"text-align: center;\"><em>Đ&ocirc;ng Hải l&agrave; thương hiệu gi&agrave;y t&acirc;y nội địa Việt</em></p>\r\n<p>&nbsp;</p>\r\n<p>Với 1.000.000 đến tr&ecirc;n 3.000.000 triệu đồng th&igrave; người d&ugrave;ng đ&atilde; c&oacute; thể&nbsp; c&oacute; được mẫu gi&agrave;y &ldquo;H&agrave;ng Việt Nam chất lượng cao&rdquo; được b&igrave;nh chọn nhiều năm liền như tr&ecirc;n, thế n&ecirc;n khi cần sắm gi&agrave;y t&acirc;y th&igrave; đừng qu&ecirc;n đ&acirc;y cũng l&agrave; một thương hiệu đ&aacute;ng thử nh&eacute;.</p>\r\n<h1><strong>H&atilde;ng gi&agrave;y t&acirc;y Vina Giầy</strong></h1>\r\n<p>Đề cập đến&nbsp;<strong>những thương hiệu gi&agrave;y t&acirc;y nổi tiếng</strong>&nbsp;th&igrave; kh&ocirc;ng thể n&agrave;o kh&ocirc;ng nhắc đến Vina Giầy. Đ&acirc;y l&agrave; thương hiệu nội địa đ&atilde; được nhiều người d&ugrave;ng tin tưởng với c&aacute;c sản phẩm nhiều năm đạt danh hiệu &ldquo;H&agrave;ng Việt Nam Chất Lượng Cao&rdquo;.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/2014.jpg\" alt=\"\" /></p>\r\n<p style=\"text-align: center;\"><em>Vina Giầy c&ograve;n cung cấp gi&agrave;y da cho thị trường ngo&agrave;i nước</em></p>\r\n<p>&nbsp;</p>\r\n<p>Xuất ph&aacute;t từ một h&atilde;ng gi&agrave;y truyền thống nội địa Việt n&ecirc;n sản phẩm của Vina Giầy nh&igrave;n chung c&oacute; gi&aacute; kh&aacute; tốt, nhiều sản phẩm chỉ c&oacute; gi&aacute; khoảng 1.000.000 đồng, rất dễ để người d&ugrave;ng sở hữu sản phẩm gi&aacute; rẻ với chất lượng ổn định n&agrave;y.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>DOLOMen vừa gi&uacute;p bạn điểm qua&nbsp;<strong>c&aacute;c h&atilde;ng gi&agrave;y t&acirc;y nổi tiếng</strong>&nbsp;đảm bảo c&aacute;c ti&ecirc;u ch&iacute; quan trọng như đa dạng mẫu m&atilde;, phong c&aacute;ch, gi&aacute; tốt, bền đẹp. Hy vọng b&agrave;i viết vừa rồi sẽ gi&uacute;p bạn nhanh ch&oacute;ng t&igrave;m được h&atilde;ng gi&agrave;y ph&ugrave; hợp với nhu cầu của m&igrave;nh. Hoặc, mọi người cũng c&oacute; thể chọn cho m&igrave;nh nhiều mẫu gi&agrave;y t&acirc;y chất lượng, gi&aacute; mềm từ DOLOMen. Giữa v&ocirc; số sự lựa chọn, ch&uacute;ng t&ocirc;i h&acirc;n hạnh nhận được sự đồng h&agrave;nh từ bạn.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>C&Ocirc;NG TY CỔ PHẦN THỜI TRANG DOLO</strong></p>\r\n<p>Điện thoại: 1900 866 671&nbsp;</p>\r\n<p>Email: dolomenfashion@gmail.com</p>\r\n<p>Showroom 1: Tầng 2, số 50 Dịch Vọng Hậu, Q. Cầu Giấy, TP. H&agrave; Nội.</p>\r\n<p>Showroom 2: 85 Nguyễn Khang, Y&ecirc;n H&ograve;a, Q. Cầu Giấy, TP. H&agrave; Nội.</p>\r\n<p>Showroom 3: 246 T&ocirc;n Đức Thắng, H&agrave;ng Bột, Q. Đống Đa, tTP. H&agrave; Nội.</p>\r\n<p>Chi nh&aacute;nh HCM: 2/3 Bạch Đằng, P.2, Q. T&acirc;n B&igrave;nh, TP.HCM</p>', '../assets/images/update_img/1656902369_tintuc1.jpg', 1, '2022-07-04 09:39:32'),
(2, 1, 'Giày cũ hóa mới với 4 cách buộc dây giày đẹp dễ làm sau', 15, 'Thay đổi cách thắt dây giày chính là một trong những cách hiệu quả để tìm kiếm tính sáng tạo và mới mẻ cho những đôi giày thân thuộc của chúng ta. Trong tin tức số này, DOLOMen xin chia đến bạn 4 cách buộc dây giày đẹp, kiểu cách ấn tượng và phù hợp với nhiều mẫu giày như giày tây, bata hay sneaker,', '<p>Thay đổi c&aacute;ch thắt d&acirc;y gi&agrave;y ch&iacute;nh l&agrave; một trong những c&aacute;ch hiệu quả để t&igrave;m kiếm t&iacute;nh s&aacute;ng tạo v&agrave; mới mẻ cho những đ&ocirc;i gi&agrave;y th&acirc;n thuộc của ch&uacute;ng ta. Trong tin tức số n&agrave;y, DOLOMen xin chia đến bạn&nbsp;<strong>4 c&aacute;ch buộc d&acirc;y gi&agrave;y đẹp</strong>, kiểu c&aacute;ch ấn tượng v&agrave; ph&ugrave; hợp với nhiều mẫu gi&agrave;y như gi&agrave;y t&acirc;y, bata hay sneaker,.. c&ugrave;ng tham khảo nh&eacute;!</p>\r\n<h2><strong>1 - C&aacute;ch buộc d&acirc;y gi&agrave;y đẹp với kiểu xương c&aacute;</strong></h2>\r\n<p>Đ&acirc;y l&agrave; một trong những mẹo thắt d&acirc;y gi&agrave;y được nhiều bạn trẻ lựa chọn v&igrave; thứ nhất l&agrave; dễ thực hiện v&agrave; thứ hai l&agrave; thắt xong gi&agrave;y sẽ c&oacute; kiểu d&aacute;ng gọn g&agrave;ng, thể hiện được t&iacute;nh chỉn chu của người thực hiện.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1939.jpg\" alt=\"\" width=\"594\" height=\"334\" /></p>\r\n<p style=\"text-align: center;\"><em>Buộc d&acirc;y gi&agrave;y kiểu xương c&aacute; hay c&ograve;n gọi l&agrave; kiểu ziczag Mỹ</em></p>\r\n<p><strong>C&aacute;ch l&agrave;m:&nbsp;</strong></p>\r\n<p><em>Bước 1:</em>&nbsp;Luồn d&acirc;y từ ph&iacute;a tr&ecirc;n xuống qua lỗ ở h&agrave;ng ngang đầu ti&ecirc;n tr&ecirc;n mũi gi&agrave;y.</p>\r\n<p><em>Bước 2:&nbsp;</em>Xỏ ch&eacute;o d&acirc;y sang h&agrave;ng đối diện như h&igrave;nh v&agrave; nhớ cho d&acirc;y về một ph&iacute;a cố định tr&aacute;i/phải để d&acirc;y được căn đều nh&eacute;.</p>\r\n<p><em>Bước 3:</em>&nbsp;Khi xỏ đến h&agrave;ng lỗ cuối c&ugrave;ng ta thắt g&uacute;t lại như th&ocirc;ng thường để cố định d&acirc;y.</p>\r\n<h2><strong>2 - C&aacute;ch thắt d&acirc;y gi&agrave;y đẹp với kiểu xỏ ngang</strong></h2>\r\n<p>Nếu bạn đang t&igrave;m&nbsp;<strong>c&aacute;ch buộc d&acirc;y gi&agrave;y nhanh</strong>&nbsp;nhưng vẫn mới lạ, ấn tượng th&igrave; n&ecirc;n thử ngay kiểu xỏ ngang trẻ trung n&agrave;y nh&eacute;.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1940.jpg\" alt=\"\" width=\"628\" height=\"353\" /></p>\r\n<p style=\"text-align: center;\"><em>Buộc d&acirc;y gi&agrave;y ấn tượng mang phong c&aacute;ch thời trang c&aacute; t&iacute;nh</em></p>\r\n<p><strong>C&aacute;ch l&agrave;m:</strong></p>\r\n<p><em>Bước 1:&nbsp;</em>Theo hướng từ tr&ecirc;n xuống, luồn d&acirc;y thẳng từ lỗ đầu ti&ecirc;n của h&agrave;ng n&agrave;y đến lỗ cuối của h&agrave;ng đối diện.</p>\r\n<p><strong>Bước 2:</strong>&nbsp;Bắt đầu luồn từ dưới l&ecirc;n tr&ecirc;n bằng c&aacute;ch bắt ch&eacute;o qua lỗ b&ecirc;n đối diện rồi tiếp tục ch&egrave;n d&acirc;y xuống dưới để xỏ qua lỗ sau đ&oacute; như h&igrave;nh. (Thực hiện li&ecirc;n tục như vậy đến lỗ cuối c&ugrave;ng)</p>\r\n<p><strong>Bước 3:</strong>&nbsp;Lấy b&ecirc;n d&acirc;y kh&ocirc;ng đan v&agrave;o gi&agrave;y luồn v&agrave;o trong c&aacute;c sợi đ&atilde; đan v&agrave; k&eacute;o thẳng đến lỗ cuối c&ugrave;ng của b&ecirc;n c&ograve;n lại v&agrave; thắt hai d&acirc;y lại l&agrave; xong.</p>\r\n<h2><strong>3 - C&aacute;ch buộc d&acirc;y gi&agrave;y đẹp với kiểu giấu d&acirc;y</strong></h2>\r\n<p>Đ&acirc;y cũng l&agrave;&nbsp;<strong>c&aacute;ch thắt d&acirc;y gi&agrave;y đẹp cho nam</strong>&nbsp;kh&ocirc;ng thể bỏ qua, đặc biệt l&agrave; với những bạn đề cao sự gọn g&agrave;ng hay cần dứt kho&aacute;t cố định d&acirc;y để tiện di chuyển.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1941.jpg\" alt=\"\" width=\"619\" height=\"348\" /></p>\r\n<p style=\"text-align: center;\"><em>Kiểu buộc gi&agrave;y gi&agrave;y t&iacute;nh tinh tế v&agrave; gọn g&agrave;ng</em></p>\r\n<p>C&aacute;ch l&agrave;m:</p>\r\n<p><strong>Bước 1:</strong>&nbsp;Từ mũi gi&agrave;y xỏ d&acirc;y v&agrave;o cặp lỗ đầu ti&ecirc;n v&agrave; để đầu dầy hướng v&agrave;o b&ecirc;n trong, sau đ&oacute; so cho hai b&ecirc;n d&acirc;y bằng nhau.</p>\r\n<p><strong>Bước 2:</strong>&nbsp;Xỏ một b&ecirc;n d&acirc;y v&agrave;o lỗ thứ 3 của h&agrave;ng đối diện rồi k&eacute;o ngang qua xỏ xuống lỗ b&ecirc;n cạnh như h&igrave;nh. Bạn cứ lần lượt một b&ecirc;n d&acirc;y xỏ một lỗ c&aacute;ch một lỗ, d&acirc;y xỏ trước, d&acirc;y xỏ sau, lặp lại như vậy đến lỗ cuối c&ugrave;ng.</p>\r\n<p><strong>Lưu &yacute;:&nbsp;</strong>Đến lỗ cuối c&ugrave;ng cả hai đầu d&acirc;y đều hướng v&agrave;o trong l&agrave; th&agrave;nh c&ocirc;ng.&nbsp;</p>\r\n<p><strong>Bước 4:</strong>&nbsp;Buộc v&agrave; cố định kỹ d&acirc;y v&agrave;o trong l&agrave; xong.</p>\r\n<h2><strong>4 - C&aacute;ch buộc d&acirc;y gi&agrave;y với kiểu bậc thang</strong></h2>\r\n<p>Kiểu bậc thang l&agrave;&nbsp;<strong>c&aacute;ch buộc d&acirc;y gi&agrave;y đẹp</strong>&nbsp;c&oacute; thể &aacute;p dụng cho mọi loại gi&agrave;y phổ biến như gi&agrave;y t&acirc;y, bata hay sneaker đều ph&ugrave; hợp v&agrave; thể hiện tốt sự c&aacute; t&iacute;nh.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1942.jpg\" alt=\"\" /></p>\r\n<p style=\"text-align: center;\"><em>Gi&agrave;y cũ tr&ocirc;ng &ldquo;ngầu&rdquo; v&agrave; lạ mắt hơn với kiểu thắt d&acirc;y bậc thang</em></p>\r\n<p><strong>C&aacute;ch l&agrave;m:</strong></p>\r\n<p>Bước 1: Xỏ d&acirc;y ngang từ cặp lỗ đầu ti&ecirc;n từ mũi gi&agrave;y, để đầu d&acirc;y hướng ra v&agrave; so cho hai d&acirc;y bằng nhau.</p>\r\n<p>Bước 2: Theo chiều từ ngo&agrave;i v&agrave;o trong, lấy hai đầu d&acirc;y xỏ v&agrave;o lỗ thứ hai c&ugrave;ng h&agrave;ng.</p>\r\n<p>Bước 3: K&eacute;o d&acirc;y h&agrave;ng đối diện để luồn dưới d&acirc;y ở lỗ thứ 2 v&agrave; tiếp tục k&eacute;o l&ecirc;n để xỏ v&agrave;o lỗ thứ 3 như h&igrave;nh. Tương tự từ đầu d&acirc;y h&agrave;ng b&ecirc;n tr&aacute;i, ch&uacute;ng ta lặp lại cho đến lỗ xỏ cuối c&ugrave;ng.</p>\r\n<p>Bước 4: Để hai đầu d&acirc;y ở h&agrave;ng cuối hướng ra v&agrave; thắt lại để cố định.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1943.jpg\" alt=\"\" /></p>\r\n<p style=\"text-align: center;\"><em>Đổi m&agrave;u d&acirc;y cũng l&agrave; c&aacute;ch nhanh v&agrave; hiệu quả để &ldquo;thay &aacute;o&rdquo; cho gi&agrave;y</em></p>\r\n<p>Hy vọng tương lai những đ&ocirc;i gi&agrave;y quen thuộc của bạn sẽ mới lạ hơn với 4&nbsp;<strong>c&aacute;ch buộc d&acirc;y gi&agrave;y đẹp</strong>&nbsp;v&agrave; dễ thực hiện m&agrave; DOLOMen vừa liệt k&ecirc;. C&aacute;m ơn mọi người đ&atilde; theo d&otilde;i b&agrave;i viết v&agrave; xin hẹn gặp lại trong những chia sẻ th&uacute; vị kỳ sau.</p>\r\n<p><strong>C&Ocirc;NG TY CỔ PHẦN THỜI TRANG DOLO</strong></p>\r\n<p>Điện thoại: 1900 866 671&nbsp;</p>\r\n<p>Email:&nbsp;<a href=\"mailto:dolomenfashion@gmail.com\">dolomenfashion@gmail.com</a></p>\r\n<p>Hệ thống Showroom H&agrave; Nội:</p>\r\n<ul>\r\n<li>Showroom 1: Tầng 2, số 50 phố Dịch Vọng Hậu, quận Cầu Giấy.</li>\r\n<li>Showroom 2: số 85 Nguyễn Khang, P. Y&ecirc;n H&ograve;a, quận Cầu Giấy.</li>\r\n<li>Showroom 3: số 246 T&ocirc;n Đức Thắng, P. H&agrave;ng Bột, quận Đống Đa.</li>\r\n</ul>\r\n<p>Chi nh&aacute;nh TP. Hồ Ch&iacute; Minh: 2/3 Bạch Đằng, P.2, Q. T&acirc;n B&igrave;nh, TP.HCM</p>', '../assets/images/update_img/1656903031_tintuc2.jpg', 1, '2022-07-04 09:50:33'),
(3, 1, 'Gợi ý 9 mẫu giày cao cổ nam Hàn Quốc đẹp nên có trong tủ giày', 5, 'Bài viết này chia sẻ đến bạn 9 gợi ý về các mẫu giày cao cổ nam Hàn Quốc đảm bảo hội đủ phong cách, chất liệu và màu sắc mà DOLOMen vừa chọn lọc. Tham khảo ngay để không bỏ lỡ nhiều mẫu giày đẹp có thể góp mặt trong BST giày của mình nhé!', '<h3><sup>B&agrave;i viết n&agrave;y chia sẻ đến bạn 9 gợi &yacute; về c&aacute;c mẫu gi&agrave;y cao cổ nam H&agrave;n Quốc đảm bảo hội đủ phong c&aacute;ch, chất liệu v&agrave; m&agrave;u sắc m&agrave; DOLOMen vừa chọn lọc. Tham khảo ngay để kh&ocirc;ng bỏ lỡ nhiều mẫu gi&agrave;y đẹp c&oacute; thể g&oacute;p mặt trong BST gi&agrave;y của m&igrave;nh nh&eacute;!</sup></h3>\r\n<h1><strong>Gi&agrave;y cao cổ nam H&agrave;n Quốc mẫu 1</strong></h1>\r\n<p>Mẫu đầu ti&ecirc;n m&agrave; ch&uacute;ng t&ocirc;i chia sẻ rất th&iacute;ch hợp với bạn n&agrave;o đang t&igrave;m kiểu gi&agrave;y cao cổ nam đơn giản nhưng thanh lịch để phối với &Acirc;u phục. Nhờ thiết kế đơn giản m&agrave; sản phẩm n&agrave;y c&oacute; thể d&ugrave;ng trong nhiều trường hợp như đi l&agrave;m, đi sự kiện, đi đ&aacute;m cưới,... T&oacute;m lại , đ&acirc;y l&agrave; kiểu gi&agrave;y mua một lợi nhiều, rất đ&aacute;ng đầu tư.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1923.jpg\" alt=\"\" width=\"774\" height=\"774\" /></p>\r\n<p style=\"text-align: center;\"><em>Cổ gi&agrave;y c&oacute; thun co gi&atilde;n tiện mang v&agrave;o v&agrave; di chuyển thoải m&aacute;i hơn</em></p>\r\n<h1><strong>Gi&agrave;y cao cổ nam H&agrave;n Quốc mẫu 2</strong></h1>\r\n<p>Thoạt nh&igrave;n sẽ thấy mẫu thứ 2 c&oacute; ngoại h&igrave;nh tương tự mẫu 1, tuy nhi&ecirc;n phần cổ của đ&ocirc;i n&agrave;y c&oacute; đ&iacute;nh c&agrave;i kim loại, mũi gi&agrave;y cũng nhọn hơn, thế n&ecirc;n đ&acirc;y sẽ l&agrave; gợi &yacute; hữu &iacute;ch cho anh em chuộng&nbsp;<strong>gi&agrave;y cao cổ nam H&agrave;n Quốc</strong>&nbsp;c&oacute; thiết kế bắt mắt một ch&uacute;t.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1924.jpg\" alt=\"\" width=\"772\" height=\"584\" /></p>\r\n<p style=\"text-align: center;\"><em>C&aacute;c mẫu gi&agrave;y tại DOLOMen đều được may từ da thật nhập khẩu</em></p>\r\n<h1><strong>Gi&agrave;y cao cổ nam H&agrave;n Quốc mẫu 3</strong></h1>\r\n<p>Để bạn c&oacute; nhiều sự lựa chọn hơn ch&uacute;ng t&ocirc;i đ&atilde; liệt k&ecirc; th&ecirc;m mẫu gi&agrave;y da m&agrave;u n&acirc;u đỏ trong BST n&agrave;y. Mẫu gi&agrave;y dưới đ&acirc;y l&agrave; sản phẩm vừa đ&aacute;p ứng được thiết kế cổ cao v&agrave; vừa mang kiểu d&aacute;ng cổ điển, th&iacute;ch hợp cho Qu&yacute; &ocirc;ng ưa vẻ truyền thống hay quen đi form gi&agrave;y Oxford.</p>\r\n<p><img src=\"http://dolomen.sees.vn/uploads/images/1925.jpg\" alt=\"\" /></p>\r\n<p><em>Một mẫu gi&agrave;y ph&ugrave; hợp để phối c&ugrave;ng quần &Acirc;u</em></p>\r\n<h1><strong>Gi&agrave;y cao cổ nam H&agrave;n Quốc mẫu 4</strong></h1>\r\n<p>Nếu 3 mẫu gi&agrave;y tr&ecirc;n l&agrave; những lựa chọn cho qu&yacute; &ocirc;ng c&ocirc;ng sở hay để anh em đi trong c&aacute;c sự kiện cần sự trang trọng th&igrave; mẫu gi&agrave;y thứ 4 sẽ l&agrave; gợi &yacute; cho ai đang cần t&igrave;m&nbsp;<strong>gi&agrave;y cao cổ nam H&agrave;n Quốc&nbsp;</strong>thể hiện được sự trẻ trung với da m&agrave;u đen kết hợp c&ugrave;ng thiết kế buộc d&acirc;y v&agrave; đế cao su c&aacute; t&iacute;nh.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1926.jpg\" alt=\"\" width=\"735\" height=\"490\" /></p>\r\n<p style=\"text-align: center;\"><em>Mẫu gi&agrave;y thời trang với đế cao su may chỉ v&agrave;ng đặc trưng</em></p>\r\n<h1><strong>Gi&agrave;y cao cổ nam H&agrave;n Quốc mẫu 5</strong></h1>\r\n<p>Mẫu gi&agrave;y cao cổ thứ 5 n&agrave;y c&oacute; kiểu d&aacute;ng tương tư mẫu thứ 4 nhưng đặc biệt hơn l&agrave; l&agrave; nhờ c&oacute; m&agrave;u xanh r&ecirc;u ấn tượng. Anh n&agrave;o đang t&igrave;m kiếm mẫu gi&agrave;y &ldquo;highfashion&rdquo; để tạo điểm nhấn cho trang phục của m&igrave;nh th&igrave; cũng n&ecirc;n thử kiểu n&agrave;y nh&eacute;!</p>\r\n<p><img src=\"http://dolomen.sees.vn/uploads/images/1927.jpg\" alt=\"\" /></p>\r\n<p><em>Mẫu gi&agrave;y cao cổ thiết kế unisex n&ecirc;n bạn c&oacute; thể rủ &ldquo;nửa kia&rdquo; c&ugrave;ng diện</em></p>\r\n<h1><strong>Gi&agrave;y cao cổ nam H&agrave;n Quốc mẫu 6</strong></h1>\r\n<p>Ưu điểm của những đ&ocirc;i gi&agrave;y da sần như h&igrave;nh dưới đ&acirc;y ch&iacute;nh l&agrave; kh&ocirc;ng dễ ph&aacute;t hiện vết bẩn v&agrave; c&oacute; thể gi&uacute;p sản phẩm thể hiện được c&aacute; t&iacute;nh &ldquo;bụi bặm&rdquo; của những ch&agrave;ng trai &ldquo;hay đi&rdquo;. Thế n&ecirc;n nếu bạn bạn cũng th&iacute;ch gi&agrave;y cao cổ phong c&aacute;ch đường phố n&agrave;y th&igrave; cũng n&ecirc;n diện thử nh&eacute;.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1928.jpg\" alt=\"\" width=\"670\" height=\"670\" /></p>\r\n<p style=\"text-align: center;\"><em>Kh&ocirc;ng chỉ c&oacute; da trơn, bạn cũng c&oacute; thể thử kiểu gi&agrave;y da sần n&agrave;y</em></p>\r\n<h1><strong>Gi&agrave;y cao cổ nam H&agrave;n Quốc mẫu 7</strong></h1>\r\n<p>Da lộn phối c&ugrave;ng đế cao su đặc trưng của d&ograve;ng gi&agrave;y cao cổ ch&iacute;nh l&agrave; lựa chọn d&agrave;nh cho anh em theo đuổi phong c&aacute;ch đường phố năng động. V&igrave; vậy m&agrave; ngo&agrave;i gi&agrave;y cổ cao da sần anh em cũng c&oacute; thể tham khảo mẫu gi&agrave;y cổ cao da lộn dưới đ&acirc;y.&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1929.jpg\" alt=\"\" /></p>\r\n<p style=\"text-align: center;\"><em>Gi&agrave;y cao cổ da lộn c&aacute; t&iacute;nh</em></p>\r\n<h1><strong>Gi&agrave;y cao cổ nam H&agrave;n Quốc mẫu 8</strong></h1>\r\n<p>Kh&ocirc;ng chỉ c&oacute; chất da, với c&aacute;c&nbsp;<strong>gi&agrave;y cổ cao nam H&agrave;n Quốc&nbsp;</strong>ta cũng c&oacute; thể tham khảo th&ecirc;m gi&agrave;y chất vải như mẫu số 6 n&agrave;y sau đ&acirc;y. Tuy c&oacute; kiểu d&aacute;ng cổ điển nhưng nhờ c&oacute; những đường may tinh tế v&agrave; phần đế c&oacute; tạo h&igrave;nh mạnh mẽ m&agrave; thiết kế vẫn kh&ocirc;ng hề đơn điệu, th&iacute;ch hợp cho anh em đang &ldquo;lướt&rdquo; t&igrave;m mẫu gi&agrave;y ngầu tham khảo.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1930.jpg\" alt=\"\" width=\"713\" height=\"729\" /></p>\r\n<p style=\"text-align: center;\"><em>Kiểu gi&agrave;y cao cổ chất chơi với thiết kế full đen c&aacute; t&iacute;nh</em></p>\r\n<h1><strong>Gi&agrave;y cao cổ nam H&agrave;n Quốc mẫu 9</strong></h1>\r\n<p>Kể đến gi&agrave;y cao cổ th&igrave; kh&ocirc;ng thể bỏ qua kiểu sneaker cổ cao lu&ocirc;n l&agrave;m x&ocirc;n xao giới trẻ dưới đ&acirc;y. Nhờ thiết kế đơn giản, form &ocirc;m ch&acirc;n n&ecirc;n c&aacute;c mẫu gi&agrave;y thế n&agrave;y l&agrave; rất dễ phối đồ, do đ&oacute;, nếu đang t&igrave;m một mẫu gi&agrave;y trẻ trung v&agrave; c&oacute; thể d&ugrave;ng trong nhiều dịp th&igrave; c&oacute; thể trải nghiệm mẫu gi&agrave;y thứ 9 n&agrave;y nh&eacute;!&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1931.jpg\" alt=\"\" /></p>\r\n<p style=\"text-align: center;\"><em>Mẫu gi&agrave;y chịu ảnh hưởng từ cơn sốt &ldquo;gi&agrave;y Jordan cổ cao&rdquo;</em></p>\r\n<p>Hy vọng 9 đ&ocirc;i&nbsp;<strong>gi&agrave;y nam cao cổ H&agrave;n Quốc</strong>&nbsp;m&agrave; ch&uacute;ng t&ocirc;i vừa giới thiệu tr&ecirc;n đ&acirc;y sẽ l&agrave; gợi &yacute; th&uacute; vị để gi&uacute;p anh em chọn được những mẫu gi&agrave;y vừa &yacute;. C&aacute;m ơn mọi người đ&atilde; d&agrave;nh thời gian theo d&otilde;i b&agrave;i viết v&agrave; đừng qu&ecirc;n gh&eacute; thăm&nbsp;<a href=\"https://vnpshop.ecosite.vn/\" target=\"_blank\" rel=\"noopener\">DOLOMen</a>&nbsp;nếu bạn cần mua phụ kiện thời trang v&agrave; đồ da nam cao cấp nh&eacute;!</p>\r\n<p><strong>C&Ocirc;NG TY CỔ PHẦN THỜI TRANG DOLO</strong></p>\r\n<p>Điện thoại: 1900 866 671&nbsp;</p>\r\n<p>Email: dolomenfashion@gmail.com</p>\r\n<p>Showroom 1: Tầng 2, số 50 phố Dịch Vọng Hậu, Q.Cầu Giấy, H&agrave; Nội.</p>\r\n<p>Showroom 2: số 85 Nguyễn Khang, P. Y&ecirc;n H&ograve;a, Q.Cầu Giấy, H&agrave; Nội.</p>\r\n<p>Showroom 3: số 246 T&ocirc;n Đức Thắng, P. H&agrave;ng Bột, Q.Đống Đa, H&agrave; Nội.</p>\r\n<p>Chi nh&aacute;nh TP. Hồ Ch&iacute; Minh: 2/3 Bạch Đằng, P.2, Q. T&acirc;n B&igrave;nh, TP.HCM</p>', '../assets/images/update_img/1656902968_tintuc3.jpg', 1, '2022-07-04 09:49:31'),
(4, 2, 'Giày lười nam vải – Top những mẫu giày lười nên mua cho ngày hè 2020', 1, 'Chúng ta đều biết giày lười nam vải được ưa chuộng như thế nào bởi tính tiện dụng, sự trẻ trung cũng như độ thẩm mỹ cao. Không những vậy giày lười nam vải còn thể hiện sự năng động, cá tính. ', '<p>Ch&uacute;ng ta đều biết&nbsp;<strong>gi&agrave;y lười nam vải</strong>&nbsp;được ưa chuộng như thế n&agrave;o bởi t&iacute;nh tiện dụng, sự trẻ trung cũng như độ thẩm mỹ cao. Kh&ocirc;ng những vậy gi&agrave;y lười nam vải&nbsp;c&ograve;n thể hiện sự năng động, c&aacute; t&iacute;nh. Bởi vậy mới n&oacute;i, mẫu sản phẩm n&agrave;y đang được săn l&ugrave;ng nhiều nhất hiện nay, v&agrave; được coi l&agrave; những mẫu sản phẩm độc đ&aacute;o tr&ecirc;n thị trường. B&agrave;i viết n&agrave;y Dolomen sẽ chia sẻ tới bạn những mẫu&nbsp;<strong>gi&agrave;y lười nam vải</strong>&nbsp;được y&ecirc;u th&iacute;ch nhất trong suốt thời gian qua. H&atilde;y c&ugrave;ng theo d&otilde;i nếu bạn l&agrave; t&iacute;n đồ của gi&agrave;y lười vải.</p>\r\n<h2><strong>Gi&agrave;y lười nam vải slip &ndash; on thể thao Converse Deck Star</strong></h2>\r\n<p>Nhắc tới top những mẫu gi&agrave;y vải được ưu chuộng nhiều nhất, c&oacute; lẽ ch&uacute;ng ta kh&ocirc;ng thể bỏ qu&ecirc;n&nbsp;<strong>gi&agrave;y lười nam vải</strong>&nbsp;&ldquo;Converse&rdquo; - một thương hiệu đ&atilde; c&oacute; t&ecirc;n tuổi tại thị trường. Với c&aacute;i t&ecirc;n được nhắc tới h&agrave;ng trăm năm trong thị trường gi&agrave;y, v&agrave; quả nhi&ecirc;n trong danh s&aacute;ch n&agrave;y kh&ocirc;ng c&oacute; c&aacute;i t&ecirc;n n&agrave;o xứng đ&aacute;ng đứng số 1 hơn. Thương hiệu n&agrave;y mang đến người ti&ecirc;u d&ugrave;ng sự y&ecirc;u th&iacute;ch bởi t&iacute;nh năng tập chung 100% v&agrave;o c&ocirc;ng năng cho người sử dụng, Converse Deck Star vải được thiết kế v&ocirc; c&ugrave;ng ch&acirc;n thật, giản dị với đế cao su v&agrave; lớp mềm ph&iacute;a tr&ecirc;n. Ngo&agrave;i ra, khi thiết kế, gi&agrave;y c&ograve;n được t&iacute;ch hợp th&ecirc;m thun co gi&atilde;n ở phần liền kề mu b&agrave;n ch&acirc;n v&agrave; miệng gi&agrave;y nhằm tăng sự cơ động cho b&agrave;n ch&acirc;n. Nhờ vậy gi&uacute;p ch&acirc;n thoải m&aacute;i, dễ d&agrave;ng di chuyển vận động khi đi. Đặc biệt, đối với những người phải đi lại nhiều, chắc hẳn đ&acirc;y sẽ l&agrave; sự lựa chọn tuyệt vời, bởi ch&uacute;ng tạo cảm gi&aacute;c &ecirc;m. Kh&ocirc;ng những vậy, mẫu n&agrave;y kh&aacute; đa dạng v&agrave; nhiều m&agrave;u sắc lựa chọn gi&uacute;p bạn tha hồ phối đồ theo &yacute; của m&igrave;nh. Gi&aacute; của em n&oacute; cũng rơi v&agrave;o khoảng 60$.</p>\r\n<h2><strong>Gi&agrave;y lười vải nam Vans Classic Slip &ndash; on</strong></h2>\r\n<p>C&aacute;i t&ecirc;n tiếp theo m&agrave; ch&uacute;ng ta đều kh&ocirc;ng thể bỏ qu&ecirc;n trong b&ocirc; sưu tập gi&agrave;y lười vải nam l&agrave; Vans. Kh&ocirc;ng chỉ xứng danh nổi tiếng với những mẫu gi&agrave;y nam d&ugrave;ng d&acirc;y buộc được săn l&ugrave;ng to&agrave;n thế giới như JD Sports v&agrave; Vans Special 50<sup>th</sup>&nbsp;Anniversary Pack, Proper x Vans Vault Long Beach Native hoặc Nintendo x Vans Footwear&hellip;h&atilde;ng gi&agrave;y được y&ecirc;u th&iacute;ch h&agrave;ng đầu bởi thiết kế độc đ&aacute;o, bắt mắt. Đ&ocirc;i gi&agrave;y lười vải nam Vans Classic Slip &ndash; on ch&iacute;nh l&agrave; một v&iacute; dụ điển h&igrave;nh. Ch&uacute;ng kh&ocirc;ng qu&aacute; cầu kỳ v&agrave; kiểu c&aacute;ch nhưng Vans Classics Slip &ndash; on lại cực k&igrave; thu h&uacute;t giới trẻ bằng những thiết kế giản dị v&agrave; sự k&igrave; diệu mang lại c&ocirc;ng năng của m&igrave;nh. Mẫu gi&agrave;y v&ocirc; c&ugrave;ng &ecirc;m &aacute;i, dễ chịu, v&agrave; thoải m&aacute;i, lại thuận tiện trong qu&aacute; tr&igrave;nh di chuyển. Bởi vậy mới n&oacute;i, sản phẩm ho&agrave;n to&agrave;n đ&aacute;nh bại những vị kh&aacute;ch kh&oacute; t&iacute;nh khi muốn đi ch&uacute;ng v&agrave;o ch&acirc;n. N&oacute;i về gi&aacute; cả, Vans cũng nằm trong tệp sản phẩm gi&aacute; v&ocirc; c&ugrave;ng hợp l&yacute;, chỉ cần bỏ ra khoảng 55$ l&agrave; bạn c&oacute; thể sở hữu ngay cho m&igrave;nh đ&ocirc;i Vans Classic Slip-on ho&agrave;n hảo.</p>\r\n<h2><strong>Gi&agrave;y lười nam vải d&aacute;ng thể thao Adultltem</strong></h2>\r\n<p>L&agrave; d&ograve;ng sản phẩm nổi trội của h&atilde;ng gi&agrave;y vải Denim, mới được ra mắt gần nhất trong m&ugrave;a xu&acirc;n h&egrave; năm nay. Mặc d&ugrave; c&oacute; sự l&eacute;p vế sau những thương hiệu lớn kh&aacute;c như: Vans, Converse, nhưng đ&acirc;y cũng được coi l&agrave; mẫu sản phẩm được nhiều bạn trẻ y&ecirc;u th&iacute;ch bởi d&aacute;ng vẻ trẻ trung, năng động v&agrave; c&aacute; t&iacute;nh. Phong c&aacute;ch d&aacute;ng gi&agrave;y c&ograve;n kh&aacute; đẹp mắt ph&ugrave; hợp với nhiều dạng đối tượng kh&aacute;c nhau. Mẫu&nbsp;<strong>gi&agrave;y lười nam vải</strong>&nbsp;Adultltem l&agrave; sự kết tinh đầy s&aacute;ng tạo giữa lười vải c&ugrave;ng gi&agrave;y sneaker thể thao. Ngo&agrave;i ra, phần đế của gi&agrave;y được l&agrave;m cao su v&agrave; l&ecirc;n form kh&aacute; &ocirc;m ch&acirc;n, v&agrave; ngầu, thể hiện đậm chất c&aacute; t&iacute;nh. D&ugrave; kh&ocirc;ng được dẻo như những d&ograve;ng đế bệt nhưng Adultltem vẫn thể hiện được sự năng động v&agrave; thoải m&aacute;i với hệ thống đế phản hồi lực mang lại. Với sản phẩm ưng &yacute; như vậy nhưng bạn cũng chỉ cần bỏ ra mức gi&aacute; hợp l&iacute; khoảng 33$ l&agrave; c&oacute; thể sở hữu ngay em n&oacute; cho m&ugrave;a h&egrave; 2020 n&agrave;y !</p>\r\n<h2><strong>Gi&agrave;y lười nam vải Versace Slip on Sneakers</strong></h2>\r\n<p>Một trong những bộ sưu tập gi&agrave;y lười nam vải đ&igrave;nh đ&aacute;m năm 2019 chắc chắn bạn nhất định kh&ocirc;ng thể bỏ qua Versace. Đ&acirc;y l&agrave; mẫu sản phẩm chiếm được nhiều sự đ&oacute;n nhận của kh&aacute;ch h&agrave;ng trong năm qua, đặc biệt l&agrave; giới trẻ. Versace Slip on Sneakers l&agrave; mẫu gi&agrave;y thể hiện t&iacute;nh thẩm mỹ cực kỳ cao, c&ugrave;ng sự sang chảnh từ form d&aacute;ng đến m&agrave;u sắc, đ&aacute;p ứng đ&uacute;ng ti&ecirc;u ch&iacute; m&agrave; kh&aacute;ch h&agrave;ng mong đợi. Kh&ocirc;ng hẳn được sản xuất từ vải, m&agrave; Versace c&ograve;n được thiết kế một phần da ở nửa ph&iacute;a sau gi&agrave;y. Ch&iacute;nh sự kết hợp n&agrave;y khiến cho mẫu sản phẩm ng&agrave;y c&agrave;ng trở n&ecirc;n sang chảnh hơn. Nh&igrave;n kỹ ch&uacute;ng ta c&oacute; thể thấy được logo của sản phẩm được in ch&igrave;m dưới hầu hết những đ&ocirc;i gi&agrave;y n&agrave;y để tr&aacute;nh xảy ra trường hợp nh&aacute;i sản phẩm.</p>\r\n<p>N&oacute;i về những họa tiết tr&ecirc;n mặt vải kh&aacute; đa dạng. Đ&acirc;y cũng ch&iacute;nh l&agrave; điểm nhấn ấn tượng để gi&agrave;y được thu h&uacute;t v&agrave; hấp dẫn hơn. Đọc xong, chắc hẳn bạn sẽ tin đ&acirc;y l&agrave; mẫu gi&agrave;y kh&aacute; HOT đ&uacute;ng kh&ocirc;ng n&agrave;o ! Bởi vậy, để sở hữu được mẫu gi&agrave;y n&agrave;y bạn cần bỏ ra số tiền kha kh&aacute; theo đ&uacute;ng thương hiệu của n&oacute; 140$. V&agrave; tất nhi&ecirc;n, n&oacute; sẽ kh&ocirc;ng l&agrave;m bạn thất vọng về chất lượng nếu bạn biết c&aacute;ch t&igrave;m mua đ&uacute;ng nơi uy t&iacute;n !</p>\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; những mẫu&nbsp;<strong>gi&agrave;y lười nam vải</strong>&nbsp;chất, được đ&aacute;nh gi&aacute; với số lượng mua nhiều nhất trong năm 2019 qua. V&agrave; chắc hẳn, d&ugrave; sắp tới sẽ bước v&agrave;o 2020 nhưng hứa hẹn đ&acirc;y vẫn sẽ l&agrave; những mẫu gi&agrave;y được nhiều người săn l&ugrave;ng nhất. Ngo&agrave;i ra, để tự tin v&agrave; sang trọng trong ng&agrave;y chơi h&egrave; 2020 sắp tới, bạn đừng qu&ecirc;n bỏ v&agrave;o tủ gi&agrave;y những đ&ocirc;i&nbsp;<strong>gi&agrave;y t&acirc;y nam</strong>&nbsp;sang trọng nh&eacute;. H&atilde;y li&ecirc;n hệ với Dolomen.vn ngay h&ocirc;m nay để được ch&uacute;ng t&ocirc;i tư vấn v&agrave; hỗ trợ trực tiếp ! Ch&uacute;c bạn sớm t&igrave;m được mẫu gi&agrave;y như &yacute; cho m&ugrave;a h&egrave; 2020.</p>', '../assets/images/update_img/1656902989_tintuc4.jpg', 1, '2022-07-04 09:49:51'),
(5, 2, 'Giày lười nam màu trắng | Những mẫu đang được ưa chuộng nhất hiện nay', 0, 'Chúng ta thường hay có suy nghĩ chỉ có phụ nữ mới có nhu cầu làm đẹp lớn.Tuy nhiên thực tế, không chỉ có phụ nữ mới cần nhu cầu làm đẹp cao, mà đàn ông ngày nay cũng có nhu cầu làm đẹp cao ngang bằng với phụ nữ.', '<p>Ch&uacute;ng ta thường hay c&oacute; suy nghĩ chỉ c&oacute; phụ nữ mới c&oacute; nhu cầu l&agrave;m đẹp lớn.Tuy nhi&ecirc;n thực tế, kh&ocirc;ng chỉ c&oacute; phụ nữ mới cần nhu cầu l&agrave;m đẹp cao, m&agrave; đ&agrave;n &ocirc;ng ng&agrave;y nay cũng c&oacute; nhu cầu l&agrave;m đẹp cao ngang bằng với phụ nữ. Ch&iacute;nh v&igrave; vậy, hiện nay đang c&oacute; nhiều mẫu gi&agrave;y lười nam được thiết kế với m&agrave;u sắc v&agrave; kiểu d&aacute;ng kh&aacute;c nhau. Một trong số những mẫu gi&agrave;y được ph&aacute;i mạnh y&ecirc;u th&iacute;ch nhiều l&agrave; gi&agrave;y lười nam m&agrave;u trắng . H&atilde;y c&ugrave;ng đọc tiếp b&agrave;i viết n&agrave;y để Dolomen chia sẻ tới bạn những mẫu&nbsp;<strong>gi&agrave;y lười nam m&agrave;u trắng</strong>&nbsp;hot nhất 2020 vừa qua nh&eacute;!</p>\r\n<h2><strong>Gi&agrave;y lười nam m&agrave;u trắng &ndash; Loafer</strong></h2>\r\n<p>Mộ trong những mẫu gi&agrave;y chon am giới được c&aacute;c ch&agrave;ng trai rất ưa chuộng để lựa chọn khi kết hợp với trang phục ch&iacute;nh l&agrave; mẫu gi&agrave;y lười nam m&agrave;u trắng Loafer. Mẫu gi&agrave;y n&agrave;y được chia l&agrave;m nhiều ti&ecirc;u ch&iacute; c&oacute; thể như: Penny, bit, horesbit, tassel, hazel&hellip;nhưng nh&igrave;n chung, tất cả những mẫu gi&agrave;y n&agrave;y đều c&oacute; thiết kế d&aacute;ng chuẩn, kh&aacute; &ocirc;m ch&acirc;n v&agrave; thu&ocirc;n gọn ở phần mũi, thiết kế g&oacute;t cao khoảng 2-3 cm.</p>\r\n<p><img src=\"http://dolomen.sees.vn/uploads/images/761.jpg\" alt=\"\" /></p>\r\n<p>Ngo&agrave;i ra, điểm mạnh của những đ&ocirc;i gi&agrave;y lười m&agrave;u trắng Loafer l&agrave; mang đến cho người d&ugrave;ng cảm gi&aacute;c thoải m&aacute;i v&agrave; kh&ocirc;ng k&eacute;m phần lịch sự cho người sử dụng. Kh&ocirc;ng những vậy, việc sử dụng m&agrave;u trắng c&ograve;n gi&uacute;p c&aacute;c anh ch&agrave;ng dễ d&agrave;ng phối đồ hơn với nhiều bộ trang phục của m&igrave;nh.</p>\r\n<h2><strong>Gi&agrave;y lười nam m&agrave;u trắng Moccasin</strong></h2>\r\n<p>C&oacute; lẽ bạn kh&ocirc;ng biết mẫu gi&agrave;y lười nam m&agrave;u trắng Moccasins cũng l&agrave; một sự lựa chọn của nhiều ch&agrave;ng trai trong năm 2019 qua.</p>\r\n<p>Với thiết kế v&ocirc; c&ugrave;ng ấn tượng phần mũi đế của gi&agrave;y c&oacute; chỉ may chạy dọc ph&iacute;a tr&ecirc;n. Ngo&agrave;i ra, d&aacute;ng form d&agrave;y cũng kh&aacute; thoải m&aacute;i, kh&ocirc;ng qu&aacute; &ocirc;m ch&acirc;n cũng như mang đến cảm gi&aacute;c tiện nghi v&agrave; thoải m&aacute;i cho người d&ugrave; lại đi bộ hay đang l&aacute;i xe.</p>\r\n<p>B&ecirc;n cạnh đ&oacute;, đế của gi&agrave;y được thiết kế bệt, bằng cao su v&agrave; kh&ocirc;ng liền khối. Ch&uacute;ng thường được bố tr&iacute; họa tiết theo một quy tắc n&agrave;o đ&oacute; để mang lại sự ấn tượng.</p>\r\n<p><img src=\"http://dolomen.sees.vn/uploads/images/762.jpg\" alt=\"\" /></p>\r\n<p>Mẫu gi&agrave;y n&agrave;y c&oacute; hai loại l&agrave;: đế mềm với những h&igrave;nh khối nhỏ v&agrave; đế cứng với mảng khối to.</p>\r\n<p>Đối với mẫu gi&agrave;y lười nam m&agrave;u trắng, c&aacute;nh m&agrave;y r&acirc;u c&oacute; tha hồ lựa chọn kết hợp c&ugrave;ng quần short để gi&uacute;p m&igrave;nh trở n&ecirc;n năng động, c&aacute; t&iacute;nh v&agrave; lịch l&atilde;m hơn.</p>\r\n<h2><strong>Gi&agrave;y lười nam m&agrave;u trắng &ndash; Slip on</strong></h2>\r\n<p>L&agrave; mẫu gi&agrave;y replica mang d&aacute;ng dấp của một đ&ocirc;i gi&agrave;y thể thao c&oacute; chất liệu bằng da, thiết kế gọn g&agrave;ng, &ocirc;m ch&acirc;n. Mẫu gi&agrave;y lười nam m&agrave;u trắng Slip on đ&atilde; l&agrave;m h&agrave;i l&ograve;ng nhiều bạn trẻ. Kh&ocirc;ng những vậy ch&uacute;ng c&ograve;n gi&uacute;p nổi bật l&ecirc;n phong c&aacute;ch năng động, trẻ trung v&agrave; s&aacute;ng tạo. Đ&acirc;y cũng l&agrave; mẫu gi&agrave;y dễ d&agrave;ng bộc lộ được phong c&aacute;ch thời trang c&aacute; t&iacute;nh cho nhiều ch&agrave;ng trai.</p>\r\n<p>&nbsp;</p>\r\n<p>Nh&igrave;n chung những mẫu gi&agrave;y lười nam trắng kh&aacute; đẹp v&agrave; ph&ugrave; hợp với nhiều phong c&aacute;ch thời trang, dễ d&agrave;ng gi&uacute;p bạn đến c&ocirc;ng sở hay đi du lịch. Bởi vậy, đ&acirc;y l&agrave; một mẫu gi&agrave;y đa t&iacute;nh năng d&agrave;nh cho bạn. Tuy nhi&ecirc;n, tone m&agrave;u n&agrave;y kh&aacute; dễ d&iacute;nh bẩn, v&igrave; vậy ch&uacute;ng t&ocirc;i lu&ocirc;n khuy&ecirc;n bạn thường xuy&ecirc;n vệ sinh ch&uacute;ng để tr&aacute;nh vết bẩn b&aacute;m l&acirc;u sẽ kh&oacute; vệ sinh sạch. Ngo&agrave;i ra, khi kh&ocirc;ng sử dụng tới h&atilde;y cất ch&uacute;ng gọn g&agrave;ng nơi tủ gi&agrave;y của bạn, tr&aacute;nh để c&aacute;c x&oacute; sẽ khiến gi&agrave;y dễ bị nh&atilde;o vải.</p>\r\n<p>&nbsp;</p>\r\n<p>Tr&ecirc;n đ&acirc;y l&agrave; to&agrave;n bộ những chia sẻ của&nbsp;<strong>Dolomen&nbsp;</strong>về c&aacute;c gi&agrave;y lười nam m&agrave;u trắng đang được ưa th&iacute;ch hiện nay. Nếu bạn đang mải m&ecirc; t&igrave;m kiếm mẫu sản phẩm n&agrave;y vậy th&igrave; h&atilde;y thử đặt l&ograve;ng tin v&agrave;o ch&uacute;ng nh&eacute;. Ngo&agrave;i ra, đừng qu&ecirc;n rằng ở Dolomen đang ph&acirc;n phối rất nhiều d&ograve;ng sản phẩm kh&aacute;c, bạn c&oacute; thể gh&eacute; qua Dolomen để được tư vấn v&agrave; tham khảo th&ecirc;m nhiều mẫu gi&agrave;y kh&aacute;c nữa! Ch&uacute;c bạn sớm t&igrave;m được đ&ocirc;i gi&agrave;y giống như &yacute; của m&igrave;nh mong muốn nh&eacute;!</p>', '../assets/images/update_img/1656903049_tintuc5.jpg', 1, '2022-07-04 09:50:52'),
(6, 2, 'Cách buộc dây giày thể thao siêu chuẩn', 1, 'Dây giày là một thành phần không thể thiếu, và vô cùng quan trọng đối với bất kỳ đôi giày nào, đặc biệt là các mẫu giày thể thao. Tuy nhiên không phải ai cũng biết cách xỏ (buộc) dây giày cho đúng, việc xỏ dây giày không chuẩn dễ dẫn đến tình trạng đau mắt cá chân, giày dễ bị tụt gót', '<h2><strong>C&aacute;ch buộc d&acirc;y gi&agrave;y thể thao kiểu xương c&aacute;&nbsp;</strong></h2>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1206.jpg\" alt=\"\" /></p>\r\n<p>Đ&acirc;y l&agrave; c&aacute;ch thắt d&acirc;y&nbsp;gi&agrave;y thể thao&nbsp;kh&aacute; đơn giản, gi&uacute;p bạn tiết kiệm được nhiều thời gian m&agrave; vẫn đảm bảo c&oacute; được một đ&ocirc;i gi&agrave;y thật ấn tượng. B&ecirc;n cạnh đ&oacute;, kiểu buộc d&acirc;y gi&agrave;y n&agrave;y c&ograve;n gi&uacute;p bạn dễ d&agrave;ng điều chỉnh độ rộng hay chật của gi&agrave;y để ph&ugrave; hợp với b&agrave;n ch&acirc;n nữa đấy.</p>\r\n<p>Bạn c&oacute; thể cột d&acirc;y gi&agrave;y kiểu xương c&aacute; theo c&aacute;c bước sau đ&acirc;y:</p>\r\n<ul>\r\n<li><strong>Bước 1:</strong>&nbsp;Luồn 2 đầu d&acirc;y gi&agrave;y thẳng qua lỗ xỏ d&acirc;y ở h&agrave;ng ngang đầu ti&ecirc;n, theo hướng từ dưới l&ecirc;n.</li>\r\n<li><strong>Bước 2:</strong>&nbsp;Ở mỗi lỗ xỏ, bạn vắt ch&eacute;o d&acirc;y từ đầu b&ecirc;n n&agrave;y sang ph&iacute;a đối diện. Nếu bạn chọn d&acirc;y b&ecirc;n phải nằm ở tr&ecirc;n th&igrave; d&acirc;y b&ecirc;n tr&aacute;i sẽ nằm ở dưới, lần lượt như thế cho đến lỗ xỏ cuối c&ugrave;ng.</li>\r\n<li><strong>Bước 3:</strong>&nbsp;Cuối c&ugrave;ng, bạn buộc cố định d&acirc;y gi&agrave;y rồi thắt n&uacute;t lại cho chắc chắn l&agrave; đ&atilde; ho&agrave;n th&agrave;nh kiểu buộc xương c&aacute; n&agrave;y rồi.</li>\r\n</ul>\r\n<h2><strong>C&aacute;ch thắt d&acirc;y gi&agrave;y kiểu tạo lỗ hở</strong></h2>\r\n<p>Thắt d&acirc;y gi&agrave;y kiểu tạo lỗ hở l&agrave; một c&aacute;ch buộc d&acirc;y gi&agrave;y kh&aacute; phổ biến, được nhiều người lựa chọn. C&aacute;ch buộc d&acirc;y n&agrave;y vừa tiết kiệm thời gian lại vừa tạo được n&eacute;t c&aacute; t&iacute;nh ri&ecirc;ng cho đ&ocirc;i gi&agrave;y của bạn. Ngo&agrave;i ra, khi cột d&acirc;y gi&agrave;y như thế n&agrave;y, mu b&agrave;n ch&acirc;n v&agrave; mắt c&aacute; ch&acirc;n của bạn cũng được thoải m&aacute;i hơn, kh&ocirc;ng bị g&ograve; b&oacute;.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1207.png\" alt=\"\" /></p>\r\n<p>&nbsp;</p>\r\n<p>C&aacute;c bước thực hiện như sau:</p>\r\n<ul>\r\n<li><strong>Bước 1:</strong>&nbsp;Luồn d&acirc;y qua lỗ xỏ ở h&agrave;ng ngang đầu ti&ecirc;n, theo hướng từ dưới l&ecirc;n.</li>\r\n<li><strong>Bước 2:</strong>&nbsp;Luồn ch&eacute;o, đan xen như c&aacute;ch cột d&acirc;y kiểu xương c&aacute; để tạo ra dấu X đầu ti&ecirc;n th&igrave; dừng lại.</li>\r\n<li><strong>Bước 3:</strong>&nbsp;Xỏ thẳng d&acirc;y gi&agrave;y qua lỗ xỏ c&ugrave;ng chiều b&ecirc;n cạnh để tạo ra lỗ hở.</li>\r\n<li><strong>Bước 4:</strong>&nbsp;Tiếp tục luồn ch&eacute;o d&acirc;y gi&agrave;y, đan xen theo kiểu xương c&aacute; để tạo ra chữ X tiếp theo.</li>\r\n<li><strong>Bước 5:</strong>&nbsp;Sau khi buộc tới lỗ xỏ cuối c&ugrave;ng, bạn buộc thắt n&uacute;t d&acirc;y gi&agrave;y lại cho chắc chắn l&agrave; được.</li>\r\n</ul>\r\n<h2>C&aacute;ch cột d&acirc;y gi&agrave;y kiểu đường thẳng (h&agrave;ng ngang)</h2>\r\n<p>C&aacute;ch buộc d&acirc;y gi&agrave;y n&agrave;y sẽ l&agrave;m hạn chế c&aacute;c g&oacute;c ch&eacute;o, từ đ&oacute; l&agrave;m giảm &aacute;p lực l&ecirc;n c&aacute;c ng&oacute;n ch&acirc;n, gi&uacute;p bạn c&oacute; được sự thoải m&aacute;i nhất d&ugrave; c&oacute; phải đeo gi&agrave;y cả ng&agrave;y d&agrave;i.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1208-v1.jpg\" alt=\"\" /></p>\r\n<p>C&aacute;ch thực hiện kh&aacute; đơn giản như sau:</p>\r\n<ul>\r\n<li><strong>Bước 1:&nbsp;</strong>Xỏ d&acirc;y qua 2 lỗ cuối c&ugrave;ng (xỏ từ ph&iacute;a tr&ecirc;n xuống dưới hoặc l&agrave; từ ngo&agrave;i v&agrave;o trong).</li>\r\n<li><strong>Bước 2:&nbsp;</strong>K&eacute;o thẳng d&acirc;y b&ecirc;n tr&aacute;i l&ecirc;n tr&ecirc;n c&ugrave;ng rồi xỏ qua lỗ tr&ecirc;n c&ugrave;ng đ&oacute; ra b&ecirc;n ngo&agrave;i.</li>\r\n<li><strong>Bước 3:</strong>&nbsp;Lần lượt xỏ d&acirc;y m&agrave;u v&agrave;ng qua c&aacute;c lỗ b&ecirc;n tr&ecirc;n. K&eacute;o sang ngang, v&ograve;ng l&ecirc;n tr&ecirc;n, rồi lại k&eacute;o sang ngang cho đến lỗ tr&ecirc;n c&ugrave;ng.</li>\r\n</ul>\r\n<h2>C&aacute;ch buộc d&acirc;y gi&agrave;y kiểu vắt ch&eacute;o l&ecirc;n tr&ecirc;n</h2>\r\n<p>Đ&acirc;y l&agrave; một c&aacute;ch biến tấu của kiểu buộc xương c&aacute;, v&igrave; vậy c&aacute;ch thực hiện cũng kh&aacute; đơn giản.</p>\r\n<ul>\r\n<li><strong>Bước 1:&nbsp;</strong>Luồn d&acirc;y qua hai lỗ xỏ ở h&agrave;ng ngang đầu ti&ecirc;n, theo hướng từ tr&ecirc;n xuống dưới.</li>\r\n<li><strong>Bước 2:</strong>&nbsp;Tiếp tục luồn lần lượt qua c&aacute;c lỗ gi&agrave;y kế tiếp, theo kiểu luồn ch&eacute;o nhau. Thực hiện lần lượt như vậy cho đến lỗ xỏ cuối c&ugrave;ng rồi thắt n&uacute;t lại.</li>\r\n</ul>\r\n<h2>C&aacute;ch thắt d&acirc;y gi&agrave;y Converse cổ cao giấu d&acirc;y</h2>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1209.png\" alt=\"\" width=\"698\" height=\"465\" /></p>\r\n<p>Với c&aacute;ch buộc giấu d&acirc;y n&agrave;y, những đ&ocirc;i gi&agrave;y Converse của bạn sẽ trở n&ecirc;n gọn g&agrave;ng hơn, đồng thời cũng gi&uacute;p bạn dễ d&agrave;ng phối hợp với &aacute;o quần v&agrave; c&aacute;c phụ kiện kh&aacute;c.</p>\r\n<p>C&aacute;c bước thực hiện như sau:</p>\r\n<ul>\r\n<li><strong>Bước 1:</strong>&nbsp;Xỏ d&acirc;y gi&agrave;y theo kiểu xương c&aacute; cho đến lỗ xỏ cuối c&ugrave;ng.</li>\r\n<li><strong>Bước 2:</strong>&nbsp;Xỏ phần d&acirc;y b&ecirc;n phải v&agrave;o lỗ xỏ b&ecirc;n tr&aacute;i, theo hướng từ ngo&agrave;i v&agrave;o trong (l&uacute;c n&agrave;y sẽ c&oacute; 2 sợi d&acirc;y ở c&ugrave;ng 1 lỗ xỏ).</li>\r\n<li><strong>Bước 3:</strong>&nbsp;Xỏ phần d&acirc;y b&ecirc;n tr&aacute;i l&uacute;c đầu sau lỗ xỏ b&ecirc;n phải đối diện, theo hướng từ ngo&agrave;i v&agrave;o trong (l&uacute;c n&agrave;y 2 sợi d&acirc;y sẽ ở 2 b&ecirc;n của lỗ xỏ).</li>\r\n<li><strong>Bước 4:&nbsp;</strong>Lần lượt gập phần d&acirc;y b&ecirc;n phải v&agrave; b&ecirc;n tr&aacute;i gọn g&agrave;ng rồi nh&eacute;t v&agrave;o b&ecirc;n trong cổ gi&agrave;y l&agrave; bạn đ&atilde; ho&agrave;n th&agrave;nh kiểu buộc giấu d&acirc;y cho đ&ocirc;i gi&agrave;y Converse cổ cao rồi đấy.</li>\r\n</ul>\r\n<p>Tr&ecirc;n đầy l&agrave; một số c&aacute;ch buộc d&acirc;y gi&agrave;y hay nhất hiện nay, hi vọng sẽ gi&uacute;p &iacute;ch cho bạn trong việc thắt d&acirc;y gi&agrave;y nh&eacute;. C&ugrave;ng DoloMen t&igrave;m hiểu th&ecirc;m nhiều th&ocirc;ng tin bổ &iacute;ch trong lĩnh vực thời trang nam trong c&aacute;c b&agrave;i viết sau nh&eacute;!</p>', '../assets/images/update_img/1656903071_tintuc6.jpg', 1, '2022-07-04 09:51:13');
INSERT INTO `tintuc` (`tintuc_id`, `loai_tintuc_id`, `tieu_de`, `luot_xem`, `mota_ngan`, `noi_dung`, `image_tintuc`, `status`, `date_update`) VALUES
(7, 2, '5 cách làm giày rộng ra hiệu quả với dụng cụ và vật liệu dễ tìm', 1, 'Trong tin tức kỳ này DOLOMen sẽ mách bạn là 5 cách làm giày rộng ra hiệu quả với những dụng cụ và vật liệu có sẵn trong nhà. Tham khảo và thử ngay bạn nhé, chúc bạn thành công! ', '<p>Trong tin tức kỳ n&agrave;y DOLOMen sẽ m&aacute;ch bạn l&agrave; 5&nbsp;<strong>c&aacute;ch l&agrave;m gi&agrave;y rộng ra</strong>&nbsp;hiệu quả với những dụng cụ v&agrave; vật liệu c&oacute; sẵn trong nh&agrave;. Tham khảo v&agrave; thử ngay bạn nh&eacute;, ch&uacute;c bạn th&agrave;nh c&ocirc;ng!&nbsp;</p>\r\n<h1><strong>1 - C&aacute;ch l&agrave;m gi&agrave;y rộng ra bằng tủ lạnh&nbsp;</strong></h1>\r\n<p>Thử ngay<strong>&nbsp;c&aacute;ch nới rộng gi&agrave;y chật</strong>&nbsp;đơn giản v&agrave; hiệu quả với 5 bước sau:</p>\r\n<p><strong>Bước 1:</strong>&nbsp;Vệ sinh sạch sẽ trong - ngo&agrave;i gi&agrave;y.</p>\r\n<p><strong>Bước 2:</strong>&nbsp;Đổ nước v&agrave;o t&uacute;i nilon v&agrave; buộc chặt. Lượng nước nhiều hay &iacute;t phụ thuộc v&agrave;o nhu cầu k&iacute;ch thước hay vị tr&iacute; m&agrave; bạn muốn l&agrave;m rộng gi&agrave;y.&nbsp;</p>\r\n<p><strong>Bước 3:</strong>&nbsp;Đặt t&uacute;i nước v&agrave;o b&ecirc;n trong gi&agrave;y.</p>\r\n<p><strong>Bước 4:</strong>&nbsp;D&ugrave;ng một t&uacute;i nilon sạch kh&aacute;c bao b&ecirc;n ngo&agrave;i đ&ocirc;i gi&agrave;y.</p>\r\n<p><strong>Bước 5:</strong>&nbsp;Cho t&uacute;i gi&agrave;y v&agrave;o ngăn đ&aacute; tủ lạnh khoảng 8 - 10 tiếng để gi&agrave;y của bạn gi&atilde;n ra theo độ nở của t&uacute;i nước.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1918.jpg\" alt=\"\" /></p>\r\n<p style=\"text-align: center;\"><em>Nhiệt độ thấp l&agrave;m nước gi&atilde;n ra v&agrave; đồng thời sẽ nới rộng gi&agrave;y của bạn</em></p>\r\n<h1><strong>2 - C&aacute;ch l&agrave;m gi&agrave;y rộng ra bằng khoai t&acirc;y</strong>&nbsp;</h1>\r\n<p>D&ugrave;ng khoai t&acirc;y kh&ocirc;ng chỉ l&agrave;&nbsp;<strong>c&aacute;ch l&agrave;m cho gi&agrave;y rộng ra</strong>&nbsp;c&oacute; thể &aacute;p dụng cho đa dạng chất liệu như da hay vải m&agrave; c&ograve;n được đ&aacute;nh gi&aacute; l&agrave; một trong những biện ph&aacute;p dễ thực hiện nhất, cụ thể c&oacute; 3 bước như sau:</p>\r\n<p><strong>Bước 1:</strong>&nbsp;Gọt sạch khoai t&acirc;y.</p>\r\n<p><strong>Bước 2:</strong>&nbsp;Đặt đ&atilde; khoai gọt v&agrave;o gi&agrave;y. Với c&aacute;ch n&agrave;y, gi&agrave;y cần nới gi&atilde;n chỗ n&agrave;o th&igrave; đặt khoai v&agrave;o chỗ đ&oacute;, kh&ocirc;ng cần cho khoai v&agrave;o k&iacute;n phần trong của gi&agrave;y nh&eacute;.</p>\r\n<p><strong>Bước 3:</strong>&nbsp;Đợi khoảng 8 - 12 tiếng gi&agrave;y của bạn sẽ được nới rộng ra như &yacute; muốn.&nbsp;</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1919.jpg\" alt=\"\" /></p>\r\n<p style=\"text-align: center;\"><em>T&ugrave;y v&agrave;o độ gi&atilde;n mong muốn m&agrave; ta sẽ gia giảm lượng khoai t&acirc;y đặt v&agrave;o gi&agrave;y</em></p>\r\n<h1><strong>3 - C&aacute;ch l&agrave;m gi&agrave;y rộng ra bằng vớ (tất)/vải/quần &aacute;o cũ</strong></h1>\r\n<p>Đ&acirc;y l&agrave;&nbsp;<strong>c&aacute;ch l&agrave;m gi&agrave;y rộng ra</strong>&nbsp;ph&ugrave; hợp với trường hợp bạn kh&ocirc;ng vội về mặt thời gian v&agrave; k&iacute;ch thước cần nới của gi&agrave;y kh&ocirc;ng qu&aacute; lớn.</p>\r\n<p><strong>Bước 1:</strong>&nbsp;D&ugrave;ng vớ (tất)/vải/quần &aacute;o cũ xếp v&agrave; cuộn gọn lại th&agrave;nh cuộn.</p>\r\n<p><strong>Bước 2:</strong>&nbsp;Cho cuộn vải v&agrave;o gi&agrave;y.</p>\r\n<p><strong>Bước 3:</strong>&nbsp;Sau 1 - 2 ng&agrave;y bạn n&ecirc;n tăng độ d&agrave;y của cuộn vải để gi&agrave;y rộng dần ra l&agrave; xong.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1920.jpg\" alt=\"\" /></p>\r\n<p style=\"text-align: center;\"><em>Với c&aacute;ch n&agrave;y, bạn duy tr&igrave; h&agrave;ng ng&agrave;y để giữ hiệu quả</em></p>\r\n<h1><strong>4 - C&aacute;ch l&agrave;m gi&agrave;y rộng ra bằng kem dưỡng da</strong></h1>\r\n<p>Đ&acirc;y l&agrave;&nbsp;<strong>c&aacute;ch l&agrave;m gi&agrave;y da rộng ra</strong>&nbsp;(đặt biệt l&agrave; gi&agrave;y mới) hiệu quả v&agrave; hạn chế ảnh hưởng xấu đến độ bền của gi&agrave;y. Với mẹo n&agrave;y, bạn chỉ cần b&ocirc;i kem l&ecirc;n ch&acirc;n, đặc biệt b&ocirc;i kỹ ở nơi ch&acirc;n tiếp x&uacute;c nhiều với gi&agrave;y như g&oacute;t hay ng&oacute;n ch&acirc;n. N&ecirc;n duy tr&igrave; li&ecirc;n tục từ 3 - 4 ng&agrave;y để gi&agrave;y c&oacute; thời gian gi&atilde;n đến độ rộng vừa ch&acirc;n bạn.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1921.jpg\" alt=\"\" width=\"599\" height=\"399\" /></p>\r\n<p style=\"text-align: center;\"><em>&nbsp;Kem dưỡng sẽ gi&uacute;p bạn dễ cho ch&acirc;n v&agrave;o gi&agrave;y v&agrave; l&agrave;m mềm da gi&agrave;y</em></p>\r\n<h1><strong>5 - C&aacute;ch l&agrave;m gi&agrave;y rộng ra bằng m&aacute;y sấy</strong></h1>\r\n<p>Cuối d&ugrave;ng, nếu bạn muốn t&igrave;m đến&nbsp;<strong>c&aacute;ch l&agrave;m gi&agrave;y rộng ra</strong>&nbsp;nhanh ch&oacute;ng th&igrave; đừng bỏ qua mẹo kết hợp d&ugrave;ng vớ (tất) v&agrave; m&aacute;y sấy để l&agrave;m gi&atilde;n gi&agrave;y sau đ&acirc;y nh&eacute;!</p>\r\n<p><strong>Bước 1:</strong>&nbsp;Mang đ&ocirc;i vớ thật d&agrave;y v&agrave;o ch&acirc;n (hoặc nhiều đ&ocirc;i nếu vớ mỏng) để l&agrave;m tăng k&iacute;ch thước ch&acirc;n v&agrave; để tr&aacute;nh cho ch&acirc;n bị n&oacute;ng.</p>\r\n<p><strong>Bước 2:</strong>&nbsp;Điều chỉnh m&aacute;y sấy từ mức nhiệt trung b&igrave;nh đến mức nhiệt cao nhất rồi hơ xung quanh gi&agrave;y. Lưu &yacute; kh&ocirc;ng n&ecirc;n hơ qu&aacute; gần để tr&aacute;nh l&agrave;m hỏng gi&agrave;y v&agrave; nhớ vừa hơ vừa cử động ch&acirc;n để gi&agrave;y dễ rộng ra hơn.</p>\r\n<p><strong>Bước 3:</strong>&nbsp;Đợi gi&agrave;y nguội rồi đi v&agrave;o xem vừa ch&acirc;n chưa, nếu gi&agrave;y c&ograve;n chật th&igrave; h&atilde;y l&agrave;m thực hiện lại 2 bước tr&ecirc;n một lần nữa nh&eacute;.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://dolomen.sees.vn/uploads/images/1922.jpg\" alt=\"\" width=\"655\" height=\"431\" /></p>\r\n<p style=\"text-align: center;\"><em>Sức n&oacute;ng từ m&aacute;y sấy sẽ l&agrave;m da gi&agrave;y nhanh ch&oacute;ng gi&atilde;n ra&nbsp;</em></p>\r\n<p>Tr&ecirc;n đ&acirc;y, DOLOMen vừa chia sẻ đến bạn 5&nbsp;<strong>c&aacute;ch l&agrave;m gi&agrave;y rộng ra</strong>&nbsp;dễ thực hiện v&agrave; hiệu quả với bằng dụng cụ, vật liệu dễ t&igrave;m trong nh&agrave;. Hy vọng bạn sẽ th&agrave;nh c&ocirc;ng với những mẹo hữu &iacute;ch vừa rồi. Đừng qu&ecirc;n đến DOLOMen nếu bạn c&oacute; nhu sắm phụ kiện thời trang v&agrave; đồ da cao cấp nh&eacute;!&nbsp;</p>\r\n<p><strong>C&Ocirc;NG TY CỔ PHẦN THỜI TRANG DOLO</strong></p>\r\n<p>Điện thoại: 1900 866 671&nbsp;</p>\r\n<p>Email: dolomenfashion@gmail.com</p>\r\n<p>Showroom 1: Tầng 2, số 50 phố Dịch Vọng Hậu, Q.Cầu Giấy, H&agrave; Nội.</p>\r\n<p>Showroom 2: số 85 Nguyễn Khang, P. Y&ecirc;n H&ograve;a, Q.Cầu Giấy, H&agrave; Nội.</p>\r\n<p>Showroom 3: số 246 T&ocirc;n Đức Thắng, P. H&agrave;ng Bột, Q.Đống Đa, H&agrave; Nội.</p>\r\n<p>Chi nh&aacute;nh TP. Hồ Ch&iacute; Minh: 2/3 Bạch Đằng, P.2, Q. T&acirc;n B&igrave;nh, TP.HCM</p>', '../assets/images/update_img/1656903671_tintuc7.jpg', 1, '2022-07-05 11:23:26'),
(86, 0, 'đ', 0, 'g', '<p>d</p>', '', 0, '2022-06-28 11:26:03'),
(87, 0, 'ư', 0, 'ư', '<p>ư</p>', '', 0, '2022-06-28 03:56:48'),
(88, 0, 'ư', 0, 'ư', '<p>ư</p>', '', 0, '2022-06-28 03:57:00'),
(89, 0, 'df', 0, 'd', '<p>c</p>', '', 0, '2022-06-29 11:45:45');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_cmt`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`mahd`,`masp`,`matt`) USING BTREE;

--
-- Chỉ mục cho bảng `danhmuc_sp`
--
ALTER TABLE `danhmuc_sp`
  ADD PRIMARY KEY (`madm_sp`) USING BTREE;

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`) USING BTREE;

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`maloai_sp`) USING BTREE;

--
-- Chỉ mục cho bảng `loai_tintuc`
--
ALTER TABLE `loai_tintuc`
  ADD PRIMARY KEY (`loai_tintuc_id`);

--
-- Chỉ mục cho bảng `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`mamau`) USING BTREE;

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`) USING BTREE;

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`ma_size`) USING BTREE;

--
-- Chỉ mục cho bảng `thuoctinh_sp`
--
ALTER TABLE `thuoctinh_sp`
  ADD PRIMARY KEY (`matt`,`masp`,`mamau`,`masize`) USING BTREE;

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`tintuc_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id admin', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id comment', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `danhmuc_sp`
--
ALTER TABLE `danhmuc_sp`
  MODIFY `madm_sp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã danh mục', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã hóa đơn', AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id khách hàng ', AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'số thứ tự người gửi liên hệ  ,auto', AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  MODIFY `maloai_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `loai_tintuc`
--
ALTER TABLE `loai_tintuc`
  MODIFY `loai_tintuc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã loại tin tức', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `mausac`
--
ALTER TABLE `mausac`
  MODIFY `mamau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã sản phẩm', AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `ma_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `thuoctinh_sp`
--
ALTER TABLE `thuoctinh_sp`
  MODIFY `matt` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã thuộc tính của sản phẩm', AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `tintuc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã tin tức', AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
