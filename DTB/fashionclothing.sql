-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 08, 2018 lúc 08:54 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashionclothing`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `mahd` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `masp` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cthd`
--
/*
INSERT INTO `cthd` (`mahd`, `masp`, `gia`, `soluong`) VALUES
('HD180502152102', 'SP0107', 290000, 1),
('HD180502152519', 'SP0011', 400000, 1),
('HD180502152519', 'SP0058', 450000, 3),
('HD180502153116', 'SP0071', 400000, 1),
('HD180506170814', 'SP0001', 200000, 3),
('HD180508113109', 'SP0005', 400000, 1),
('HD180508113109', 'SP0082', 400000, 1);
*/
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `makh` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hoten` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngayban` date NOT NULL,
  `diachigiao` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` int(11) NOT NULL,
  `ghichu` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xacnhan` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--
/*
INSERT INTO `hoadon` (`mahd`, `makh`, `hoten`, `ngayban`, `diachigiao`, `email`, `sdt`, `tongtien`, `ghichu`, `xacnhan`) VALUES
('HD180502152102', '', 'An Dương Vương', '2018-05-02', '231 Điện Biên Phủ Q1', 'abc@sgu.edu', '01234567890', 290000, 'Gọi điện trước khi giao hàng.', '3'),
('HD180502152519', 'kh1', 'Nguyễn Nhân', '2018-05-02', '123 Cách Mạng Tháng Tám', 'chiem1p@gmail.com', '09090909090', 1750000, 'Giao vào thời gian chiều', '3'),
('HD180502153116', 'kh1', 'Nguyễn Nhân', '2018-05-02', '51 Đường G1 Q2', 'chiem1p@gmail.com', '09090909090', 400000, 'Giao vào buổi sáng', '3'),
('HD180506170814', '', 'Huy Legend', '2018-05-06', '123 Nguyễn Trãi Q1', 'huy@sgu.edu', '01247629519', 600000, 'Giao vào chiều thứ bảy', '3'),
('HD180508113109', '', 'Bitchi', '2018-05-08', '243 RFD FDSF dsf', 'fdsjh@gmail.com', '0909090909', 800000, '', '2');
*/
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hoten` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` char(5) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--
/*
INSERT INTO `khachhang` (`makh`, `hoten`, `ngaysinh`, `diachi`, `email`, `sdt`, `password`, `ghichu`) VALUES
('duyit', 'Đào Bảo Duy', '1998-10-29', '123 Đào Duy Từ Q10', 'duy.it@gmail.com', '0901020304', 'e10adc3949ba59abbe56e057f20f883e', ''),
('kh1', 'Nguyễn Nhân', '1998-01-22', '123 Cách Mạng Tháng Tám', 'chiem1p@gmail.com', '09090909090', 'e10adc3949ba59abbe56e057f20f883e', ''),
('sun', 'Nguyễn Đỗ Trung Đức', '1997-09-13', '321 An Dương Vương Q5', 'sun@gmail.com', '09090909090', 'e10adc3949ba59abbe56e057f20f883e', '');
*/
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `malsp` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenlsp` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phanloai` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--
/*
INSERT INTO `loaisanpham` (`malsp`, `tenlsp`, `phanloai`) VALUES
('BA001', 'Áo thun', 'Nam'),
('BA002', 'Áo sơ mi', 'Nam'),
('BA003', 'Áo len', 'Nam'),
('BA004', 'Áo khoác', 'Nam'),
('BQ001', 'Quần jeans', 'Nam'),
('BQ002', 'Quần shorts', 'Nam'),
('BQ003', 'Quần tây', 'Nam'),
('GA001', 'Áo thun', 'Nữ'),
('GA002', 'Áo sơ mi', 'Nữ'),
('GA003', 'Áo len', 'Nữ'),
('GA004', 'Áo khoác', 'Nữ'),
('GA005', 'Đầm', 'Nữ'),
('GQ001', 'Quần jeans', 'Nữ'),
('GQ002', 'Quần shorts', 'Nữ'),
('GQ003', 'Quần tây', 'Nữ'),
('GQ004', 'Váy', 'Nữ'),
('P0001', 'Bóp (Ví)', 'Phụ kiện'),
('P0002', 'Dây nịt', 'Phụ kiện'),
('P0003', 'Túi xách', 'Phụ kiện'),
('P0004', 'Giày', 'Phụ kiện'),
('P0005', 'Nón', 'Phụ kiện');
*/
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hoten` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loainv` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--
/*
INSERT INTO `nhanvien` (`manv`, `hoten`, `ngaysinh`, `diachi`, `email`, `sdt`, `password`, `loainv`) VALUES
('root', 'Trương Vĩ Huy', '1998-01-17', '50 Nguyễn Tri Phương Q.10', 'truongvihuy@gmail.com', '0908070605', '670b14728ad9902aecba32e22fa4f6bd', '1'),
('root1', 'Lê Vũ Toàn Hiển', '2018-01-31', '123 Trần Hưng Đạo Q5', 'hien@gmail.com', '0909090909', '670b14728ad9902aecba32e22fa4f6bd', '2');
*/
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `malsp` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tensp` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hang` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluongton` int(11) NOT NULL,
  `soluongban` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `ttsp` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaynhap` date NOT NULL,
  `url1` char(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url2` char(24) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--
/*
INSERT INTO `sanpham` (`masp`, `malsp`, `tensp`, `hang`, `soluongton`, `soluongban`, `gia`, `ttsp`, `ngaynhap`, `url1`, `url2`) VALUES
('SP0001', 'BA001', 'Áo thun tay dài HBO', 'Offwhite', 0, 3, 200000, 'Aó thun tay dài trắng đen', '2018-04-11', 'SP/SP0001_1.jpg', 'SP/SP0001_2.jpg'),
('SP0002', 'BA001', 'Áo thun xám', 'Bape', 200, 0, 150000, 'Xọc ngang trước ngực', '2018-04-11', 'SP/SP0002_1.jpg', 'SP/SP0002_2.jpg'),
('SP0003', 'BA004', 'Áo hoodie', 'Supreme', 210, 0, 400000, 'Áo hoodie supreme đen', '2018-04-11', 'SP/SP0003_1.jpg', 'SP/SP0003_2.jpg'),
('SP0004', 'GA004', 'Áo khoác nữ', 'Stussy', 150, 0, 300000, 'Áo khoác nữ màu hồng', '2018-04-11', 'SP/SP0004_1.jpg', 'SP/SP0004_2.jpg'),
('SP0005', 'GA004', 'Áo hoodie', 'Bape', 180, 0, 400000, 'Áo hoodie có họa tiết màu hồng', '2018-04-11', 'SP/SP0005_1.jpg', 'SP/SP0005_2.jpg'),
('SP0006', 'GA004', 'Áo jeans', 'BLUE', 200, 0, 150000, 'Áo khoác jeans nữ', '2018-04-11', 'SP/SP0006_1.jpg', 'SP/SP0006_2.jpg'),
('SP0007', 'GA005', 'Đầm đỏ', 'Mango', 200, 0, 300000, 'Áo suông đỏ', '2018-04-11', 'SP/SP0007_1.jpg', 'SP/SP0007_2.jpg'),
('SP0008', 'BQ001', 'Quần jeans', 'Yame', 200, 0, 300000, 'Quần jeans màu đen', '2018-04-11', 'SP/SP0008_1.jpg', 'SP/SP0008_2.jpg'),
('SP0009', 'GQ001', 'Quần jeans lửng nữ', 'Stussy', 200, 0, 300000, 'Quần jeans lững nữ', '2018-04-11', 'SP/SP0009_1.jpg', 'SP/SP0009_2.jpg'),
('SP0010', 'BQ001', 'Quần jeans đen', 'Mark & Spencer', 100, 0, 400000, 'Quần jeans màu đen', '2018-04-11', 'SP/SP0010_1.jpg', 'SP/SP0010_2.jpg'),
('SP0011', 'BQ001', 'Quần jeans rách', 'Uniqlo', 98, 2, 400000, 'Quần jeans đen rách gối', '2018-04-11', 'SP/SP0011_1.jpg', 'SP/SP0011_2.jpg'),
('SP0012', 'GQ002', 'Quần jeans ngắn', 'Nudie Jeans', 100, 0, 200000, 'Quần short jeans nữ', '2018-04-11', 'SP/SP0012_1.jpg', 'SP/SP0012_2.jpg'),
('SP0013', 'P0002', 'Dây nịt Yame', 'Yame', 100, 0, 1000000, 'Làm từ da cá sấu', '2018-04-11', 'SP/SP0013_1.jpg', 'SP/SP0013_2.jpg'),
('SP0014', 'P0002', 'Dây nịt Yame', 'Yame', 100, 0, 300000, 'Làm từ loại da thườn', '2018-04-16', 'SP/SP0014_1.jpg', 'SP/SP0014_2.jpg'),
('SP0015', 'P0003', 'Túi xách Gucci đỏ', 'Gucci', 100, 0, 6300000, 'Màu đỏ, hàng chính hãng', '2018-04-16', 'SP/SP0015_1.jpg', 'SP/SP0015_2.jpg'),
('SP0016', 'P0003', 'Túi xách Michaelkors', 'Michael Kors', 100, 0, 2700000, 'Túi Michael Kors màu xám', '2018-04-16', 'SP/SP0016_1.jpg', 'SP/SP0016_2.jpg'),
('SP0017', 'P0003', 'Balo Yame đen', 'Yame', 100, 0, 500000, 'Balo Yame màu đen', '2018-04-16', 'SP/SP0017_1.jpg', 'SP/SP0017_2.jpg'),
('SP0018', 'P0003', 'Túi xách DooDoo', 'DooDoo', 100, 0, 690000, 'Túi xách màu đỏ', '2018-04-16', 'SP/SP0018_1.jpg', 'SP/SP0018_2.jpg'),
('SP0019', 'P0003', 'Balo Yame trắng đen', 'Yame', 100, 0, 500000, 'Balo Yame màu đen trắng', '2018-04-16', 'SP/SP0019_1.jpg', 'SP/SP0019_2.jpg'),
('SP0020', 'P0003', 'Túi đeo chéo', 'Praza', 100, 0, 300000, 'Túi đeo chéo màu xám', '2018-04-16', 'SP/SP0020_1.jpg', 'SP/SP0020_2.jpg'),
('SP0021', 'P0003', 'Túi xách Gucci đen', 'Gucci', 100, 0, 5300000, 'Túi xách Gucci màu đen', '2018-04-16', 'SP/SP0021_1.jpg', 'SP/SP0021_2.jpg'),
('SP0022', 'P0003', 'Túi xách DooDoo', 'DooDoo', 100, 0, 500000, 'Túi xách DooDoo màu đen', '2018-04-16', 'SP/SP0022_1.jpg', 'SP/SP0022_2.jpg'),
('SP0023', 'P0005', 'Nón lưỡi trai', 'Yame', 100, 0, 300000, 'Nón lưỡi trai màu xám', '2018-04-16', 'SP/SP0023_1.jpg', 'SP/SP0023_2.jpg'),
('SP0024', 'P0005', 'Nón đen', 'Yacha', 100, 0, 390000, 'Nón màu đen có họa tiết', '2018-04-16', 'SP/SP0024_1.jpg', 'SP/SP0024_2.jpg'),
('SP0025', 'P0005', 'Nón Urban', 'Urban', 100, 0, 500000, 'Nón lưỡi tai Urban', '2018-04-16', 'SP/SP0025_1.jpg', 'SP/SP0025_2.jpg'),
('SP0026', 'P0005', 'Nón lưỡi trai', 'Yame', 100, 0, 300000, 'Nón lưỡi trai màu đen', '2018-04-16', 'SP/SP0026_1.jpg', 'SP/SP0026_2.jpg'),
('SP0027', 'P0001', 'Ví Yame', 'Yame', 100, 0, 300000, 'Ví nâu cá tính', '2018-04-16', 'SP/SP0027_1.jpg', 'SP/SP0027_2.jpg'),
('SP0028', 'P0001', 'Ví Yame', 'Yame', 100, 0, 290000, 'Ví đen', '2018-04-16', 'SP/SP0028_1.jpg', 'SP/SP0028_2.jpg'),
('SP0029', 'P0001', 'Ví Yame', 'Yame', 100, 0, 350000, 'Ví đen thanh lịch', '2018-04-16', 'SP/SP0029_1.jpg', 'SP/SP0029_2.jpg'),
('SP0030', 'P0001', 'Ví Yame', 'Yame', 100, 0, 3000000, 'Ví da cá sấu', '2018-04-16', 'SP/SP0030_1.jpg', 'SP/SP0030_2.jpg'),
('SP0031', 'P0004', 'Dép da', 'Yame', 100, 0, 300000, 'Dép da đen', '2018-04-16', 'SP/SP0031_1.jpg', 'SP/SP0031_2.jpg'),
('SP0032', 'P0004', 'Giày da', 'Dune', 100, 0, 1900000, 'Giày da đen', '2018-04-16', 'SP/SP0032_1.jpg', 'SP/SP0032_2.jpg'),
('SP0033', 'P0004', 'Giày Yame', 'Yame', 100, 0, 1300000, 'Giày thể thao, xanh', '2018-04-16', 'SP/SP0033_1.jpg', 'SP/SP0033_2.jpg'),
('SP0034', 'P0004', 'Giày Yame', 'Yame', 100, 0, 1300000, 'Giày thể thao, đỏ', '2018-04-16', 'SP/SP0034_1.jpg', 'SP/SP0034_2.jpg'),
('SP0035', 'P0004', 'Giày thể thao', 'Prada', 100, 0, 3200000, 'Giày thể thao thời trang', '2018-04-16', 'SP/SP0035_1.jpg', 'SP/SP0035_2.jpg'),
('SP0036', 'P0004', 'Giày thời trang', 'Paul Smitch', 100, 0, 15300000, 'Giày fashion', '2018-04-16', 'SP/SP0036_1.jpg', 'SP/SP0036_2.jpg'),
('SP0037', 'BA001', 'Áo polo', 'Polo', 100, 0, 150000, 'Áo Polo', '2018-04-16', 'SP/SP0037_1.jpg', 'SP/SP0037_2.jpg'),
('SP0038', 'BA001', 'Áo thun xanh', 'Aristino', 100, 0, 290000, 'Áo thun xanh có họa tiết trắng', '2018-04-16', 'SP/SP0038_1.jpg', 'SP/SP0038_2.jpg'),
('SP0039', 'BA001', 'Áo thun trơn', 'Aristion', 100, 0, 100000, 'Áo thun trơn', '2018-04-16', 'SP/SP0039_1.jpg', 'SP/SP0039_2.jpg'),
('SP0040', 'BA001', 'Áo cá chép', 'Uniqlo', 100, 0, 150000, 'Áo thun in', '2018-04-16', 'SP/SP0040_1.jpg', 'SP/SP0040_2.jpg'),
('SP0041', 'BA001', 'Áo Phượt', 'Polo', 100, 0, 290000, 'Áo thun in', '2018-04-16', 'SP/SP0041_1.jpg', 'SP/SP0041_2.jpg'),
('SP0042', 'BA002', 'Áo sơ mi', 'Việt Tiến', 100, 0, 250000, 'Áo sơ mi tay ngắn', '2018-04-16', 'SP/SP0042_1.jpg', 'SP/SP0042_2.jpg'),
('SP0043', 'BA002', 'Áo sơ mi ca rô', 'Pierre Cardin', 100, 0, 230000, 'Áo sơ mi ca rô năng động', '2018-04-16', 'SP/SP0043_1.jpg', 'SP/SP0043_2.jpg'),
('SP0044', 'BA002', 'Áo sơ mi tay dài', 'The Blue', 100, 0, 300000, 'Áo hồng họa tiết chấm bi', '2018-04-16', 'SP/SP0044_1.jpg', 'SP/SP0044_2.jpg'),
('SP0045', 'BA002', 'Áo sơ mi ca rô', 'The Blue', 100, 0, 300000, 'Áo ca rô tay dài nâu đỏ', '2018-04-16', 'SP/SP0045_1.jpg', 'SP/SP0045_2.jpg'),
('SP0046', 'BA002', 'Áo sơ mi Hàn Quốc', 'The Blue', 100, 0, 400000, 'Áo sơ mi xanh', '2018-04-16', 'SP/SP0046_1.jpg', 'SP/SP0046_2.jpg'),
('SP0047', 'BA002', 'Áo sơ mi ca rô', 'The Blue', 100, 0, 300000, 'Áo ca rô tay dài xanh xám', '2018-04-16', 'SP/SP0047_1.jpg', 'SP/SP0047_2.jpg'),
('SP0048', 'BA002', 'Áo sơ mi tay dài', 'The Blue', 100, 0, 400000, 'Áo tay dài xanh có họa tiết', '2018-04-16', 'SP/SP0048_1.jpg', 'SP/SP0048_2.jpg'),
('SP0049', 'BA003', 'Áo len xám', 'Supreme', 100, 0, 300000, 'Áo len xám', '2018-04-16', 'SP/SP0049_1.jpg', 'SP/SP0049_2.jpg'),
('SP0050', 'BA003', 'Áo len xanh xám', 'BamBoo', 100, 0, 500000, 'Áo len có cổ sơ mi', '2018-04-16', 'SP/SP0050_1.jpg', 'SP/SP0050_2.jpg'),
('SP0051', 'BA003', 'Áo len đen', 'Yame', 100, 0, 300000, 'Áo len đen', '2018-04-16', 'SP/SP0051_1.jpg', 'SP/SP0051_2.jpg'),
('SP0052', 'BA003', 'Áo len xanh', 'Prada', 100, 0, 300000, 'Áo len xanh', '2018-04-16', 'SP/SP0052_1.jpg', 'SP/SP0052_2.jpg'),
('SP0053', 'BA003', 'Áo len xanh trắng', 'OffWhite', 100, 0, 400000, 'Áo len xanh trắng có họa tiết', '2018-04-16', 'SP/SP0053_1.jpg', 'SP/SP0053_2.jpg'),
('SP0054', 'BA003', 'Áo len đỏ trắng', 'Babe', 100, 0, 300000, 'Áo len đỏ trắng sọc ngang', '2018-04-16', 'SP/SP0054_1.jpg', 'SP/SP0054_2.jpg'),
('SP0055', 'BA003', 'Áo len trắng kem', 'BLUE', 100, 0, 450000, 'Áo len trắng kem có họa tiết', '2018-04-16', 'SP/SP0055_1.jpg', 'SP/SP0055_2.jpg'),
('SP0056', 'BA004', 'Áo khoác nỉ đen', 'Yame', 100, 0, 400000, 'Áo khoác nỉ đen', '2018-04-16', 'SP/SP0056_1.jpg', 'SP/SP0056_2.jpg'),
('SP0057', 'BA004', 'Áo khoác nỉ đỏ', 'Offwhite', 100, 0, 400000, 'Áo khoác nỉ đỏ', '2018-04-16', 'SP/SP0057_1.jpg', 'SP/SP0057_2.jpg'),
('SP0058', 'BA004', 'Áo khoác ardigan', 'Stussy', 94, 6, 450000, 'Áo khoác Ardigan xanh ngọc bích', '2018-04-16', 'SP/SP0058_1.jpg', 'SP/SP0058_2.jpg'),
('SP0059', 'BA004', 'Áo khoác da đen', 'Yame', 100, 0, 600000, 'Áo khoác da đen', '2018-04-16', 'SP/SP0059_1.jpg', 'SP/SP0059_2.jpg'),
('SP0060', 'BA004', 'Áo khoác jeans', 'BamBoo', 100, 0, 390000, 'Áo khoác jeans xanh đen', '2018-04-16', 'SP/SP0060_1.jpg', 'SP/SP0060_2.jpg'),
('SP0061', 'BA004', 'Áo khoác kaki', 'Stussy', 100, 0, 300000, 'Áo khoác kaki ca rô', '2018-04-16', 'SP/SP0061_1.jpg', 'SP/SP0061_2.jpg'),
('SP0062', 'BA004', 'Áo khoác dù đỏ', 'Bape', 100, 0, 640000, 'Áo khoác dù 3 lớp', '2018-04-16', 'SP/SP0062_1.jpg', 'SP/SP0062_2.jpg'),
('SP0063', 'BQ001', 'Quần jeans rách xanh', 'Yame', 100, 0, 400000, 'Quần jeans rách xanh', '2018-04-16', 'SP/SP0063_1.jpg', 'SP/SP0063_2.jpg'),
('SP0064', 'BQ001', 'Quần jeans trắng', 'BLUE', 100, 0, 420000, 'Quần jeans skinny trắng', '2018-04-16', 'SP/SP0064_1.jpg', 'SP/SP0064_2.jpg'),
('SP0065', 'BQ001', 'Quần jeans rách', 'Yame', 100, 0, 390000, 'Quần jeans rách xanh đen', '2018-04-16', 'SP/SP0065_1.jpg', 'SP/SP0065_2.jpg'),
('SP0066', 'BQ001', 'Quần jeans xanh', 'BLUE', 100, 0, 500000, 'Quần jeans ống dựng xanh', '2018-04-16', 'SP/SP0066_1.jpg', 'SP/SP0066_2.jpg'),
('SP0067', 'BQ002', 'Quần shorts cam', 'BLUE', 100, 0, 400000, 'Quần shorts cam', '2018-04-16', 'SP/SP0067_1.jpg', 'SP/SP0067_2.jpg'),
('SP0068', 'BQ002', 'Quần shorts jeans', 'BLUE', 100, 0, 400000, 'Quần shorts jeans xanh', '2018-04-16', 'SP/SP0068_1.jpg', 'SP/SP0068_2.jpg'),
('SP0069', 'BQ002', 'Quần shorts thun', 'Yame', 100, 0, 200000, 'Quần shorts thun xám', '2018-04-16', 'SP/SP0069_1.jpg', 'SP/SP0069_2.jpg'),
('SP0070', 'BQ003', 'Quần tây xám chuột', 'BLUE', 100, 0, 400000, 'Quần tây xám chuột', '2018-04-16', 'SP/SP0070_1.jpg', 'SP/SP0070_2.jpg'),
('SP0071', 'BQ003', 'Quần tây xanh đen', 'BLUE', 98, 2, 400000, 'Quần tây xanh đen', '2018-04-16', 'SP/SP0071_1.jpg', 'SP/SP0071_2.jpg'),
('SP0072', 'BQ003', 'Quần tây đen', 'BLUE', 100, 0, 400000, 'Quần tây đen', '2018-04-16', 'SP/SP0072_1.jpg', 'SP/SP0072_2.jpg'),
('SP0073', 'BQ003', 'Quần tây trắng', 'BLUE', 100, 0, 400000, 'Quần tây trắng', '2018-04-16', 'SP/SP0073_1.jpg', 'SP/SP0073_2.jpg'),
('SP0074', 'GA002', 'Áo sơ mi màu xám', 'Offwhite', 100, 0, 200000, 'Áo sơ mi màu xám chuột', '2018-04-16', 'SP/SP0074_1.jpg', 'SP/SP0074_2.jpg'),
('SP0075', 'GA005', 'Đầm đuôi cá', 'Offwhite', 100, 0, 400000, 'Đầm  đuôi cá viền trắng', '2018-04-16', 'SP/SP0075_1.jpg', 'SP/SP0075_2.jpg'),
('SP0076', 'GA005', 'Đầm yếm hoa', 'Offwhite', 100, 0, 400000, 'Đầm  yếm hoa có kèm áo thun', '2018-04-16', 'SP/SP0076_1.jpg', 'SP/SP0076_2.jpg'),
('SP0077', 'GA005', 'Đầm đỏ', 'Offwhite', 100, 0, 400000, 'Đầm  đỏ', '2018-04-16', 'SP/SP0077_1.jpg', 'SP/SP0077_2.jpg'),
('SP0078', 'GA002', 'Áo sơ mi không tay', 'Offwhite', 100, 0, 400000, 'Áo sơ mi không tay màu xanh', '2018-04-16', 'SP/SP0078_1.jpg', 'SP/SP0078_2.jpg'),
('SP0079', 'GA001', 'Áo thun vàng', 'Offwhite', 100, 0, 100000, 'Áo thun tay ngắn', '2018-04-16', 'SP/SP0079_1.jpg', 'SP/SP0079_2.jpg'),
('SP0080', 'GA001', 'Áo thun trắng', 'Offwhite', 100, 0, 100000, 'Áo thun tay ngắn', '2018-04-16', 'SP/SP0080_1.jpg', 'SP/SP0080_2.jpg'),
('SP0081', 'GA003', 'Áo len xanh dương', 'Offwhite', 100, 0, 400000, 'Áo len xanh dương cổ lọ viền trắng', '2018-04-16', 'SP/SP0081_1.jpg', 'SP/SP0081_2.jpg'),
('SP0082', 'GA003', 'Áo len tay lửng', 'Offwhite', 100, 0, 400000, 'Áo len tay lửng form dài rộng', '2018-04-16', 'SP/SP0082_1.jpg', 'SP/SP0082_2.jpg'),
('SP0083', 'GA003', 'Áo len xanh lá', 'The blue', 100, 0, 400000, 'Áo len tay ngắn có họa tiết', '2018-04-16', 'SP/SP0083_1.jpg', 'SP/SP0083_2.jpg'),
('SP0084', 'GA004', 'Áo khoác xám', 'Offwhite', 100, 0, 500000, 'Áo khoác xám có sọc', '2018-04-16', 'SP/SP0084_1.jpg', 'SP/SP0084_2.jpg'),
('SP0085', 'GA001', 'Áo thun trơn', 'The blue', 100, 0, 100000, 'Áo thun trơn nữ', '2018-04-16', 'SP/SP0085_1.jpg', 'SP/SP0085_2.jpg'),
('SP0086', 'GQ003', 'Quần tây trắng', 'The blue', 100, 0, 300000, 'Quần tây trắng có họa tiết', '2018-04-16', 'SP/SP0086_1.jpg', 'SP/SP0086_2.jpg'),
('SP0087', 'GQ003', 'Quần tây lửng', 'The blue', 100, 0, 400000, 'Quần tây lửng màu xám chuột', '2018-04-16', 'SP/SP0087_1.jpg', 'SP/SP0087_2.jpg'),
('SP0088', 'GQ003', 'Quần tây dài', 'The blue', 100, 0, 300000, 'Quần tây dài màu xám chuột', '2018-04-16', 'SP/SP0088_1.jpg', 'SP/SP0088_2.jpg'),
('SP0089', 'GQ003', 'Quần tây đen', 'The blue', 100, 0, 400000, 'Quần tây đen kẻ ca rô', '2018-04-16', 'SP/SP0089_1.jpg', 'SP/SP0089_2.jpg'),
('SP0090', 'GQ001', 'Quần jeans họa tiết', 'The blue', 100, 0, 500000, 'Quần jeans xanh đậm có họa tiết', '2018-04-16', 'SP/SP0090_1.jpg', 'SP/SP0090_2.jpg'),
('SP0091', 'GQ001', 'Quần jeans xám', 'The blue', 100, 0, 450000, 'Quần jeans màu xám', '2018-04-16', 'SP/SP0091_1.jpg', 'SP/SP0091_2.jpg'),
('SP0092', 'GQ001', 'Quần jeans rách', 'The blue', 100, 0, 420000, 'Quần jeans xanh rách', '2018-04-16', 'SP/SP0092_1.jpg', 'SP/SP0092_2.jpg'),
('SP0093', 'GQ001', 'Quần jeans đen', 'The blue', 100, 0, 500000, 'Quần jeans đen', '2018-04-16', 'SP/SP0093_1.jpg', 'SP/SP0093_2.jpg'),
('SP0094', 'GQ001', 'Quần jeans lửng', 'The blue', 100, 0, 400000, 'Quần jeans lửng màu xanh', '2018-04-16', 'SP/SP0094_1.jpg', 'SP/SP0094_2.jpg'),
('SP0095', 'GQ002', 'Quần shorts đen', 'The blue', 100, 0, 320000, 'Quần shorts đen', '2018-04-17', 'SP/SP0095_1.jpg', 'SP/SP0095_2.jpg'),
('SP0096', 'GQ002', 'Quần shorts ca rô', 'The blue', 100, 0, 350000, 'Quần shorts màu xanh ca rô', '2018-04-17', 'SP/SP0096_1.jpg', 'SP/SP0096_2.jpg'),
('SP0097', 'GQ002', 'Quần shorts be', 'The blue', 100, 0, 320000, 'Quần shorts màu be', '2018-04-17', 'SP/SP0097_1.jpg', 'SP/SP0097_2.jpg'),
('SP0098', 'GQ002', 'Quần shorts trắng', 'The blue', 100, 0, 320000, 'Quần shorts màu trắng', '2018-04-17', 'SP/SP0098_1.jpg', 'SP/SP0098_2.jpg'),
('SP0099', 'GQ004', 'Váy dúm bèo', 'The blue', 100, 0, 320000, 'Váy dùm bèo', '2018-04-17', 'SP/SP0099_1.jpg', 'SP/SP0099_2.jpg'),
('SP0100', 'GQ004', 'Váy đính cúc', 'The blue', 100, 0, 320000, 'Váy kaki đính cúc', '2018-04-17', 'SP/SP0100_1.jpg', 'SP/SP0100_2.jpg'),
('SP0101', 'GQ004', 'Váy xòe dúm bèo', 'The blue', 100, 0, 320000, 'Váy xòa dúm bèo màu hồng', '2018-04-17', 'SP/SP0101_1.jpg', 'SP/SP0101_2.jpg'),
('SP0102', 'GQ004', 'Váy đuôi cá', 'The blue', 100, 0, 320000, 'Váy đuôi cá màu xanh', '2018-04-17', 'SP/SP0102_1.jpg', 'SP/SP0102_2.jpg'),
('SP0103', 'GQ004', 'Váy lửng', 'The blue', 100, 0, 320000, 'Váy lửng màu xanh', '2018-04-17', 'SP/SP0103_1.jpg', 'SP/SP0103_2.jpg'),
('SP0104', 'GQ004', 'Váy juyp dáng dài', 'The blue', 100, 0, 400000, 'Váy juyp kaki dáng dài', '2018-04-17', 'SP/SP0104_1.jpg', 'SP/SP0104_2.jpg'),
('SP0105', 'GQ004', 'Váy vạt chéo', 'The blue', 100, 0, 320000, 'Váy kaki vạt chéo màu đen', '2018-04-17', 'SP/SP0105_1.jpg', 'SP/SP0105_2.jpg'),
('SP0106', 'GQ004', 'Váy xếp ly', 'The blue', 100, 0, 300000, 'Váy xếp ly màu xám', '2018-04-17', 'SP/SP0106_1.jpg', 'SP/SP0106_2.jpg'),
('SP0107', 'GQ004', 'Váy dạ vạt xéo', 'The blue', 98, 2, 290000, 'Váy dạ vạt xéo màu hồng', '2018-04-17', 'SP/SP0107_1.jpg', 'SP/SP0107_2.jpg');
*/
--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`mahd`,`masp`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`malsp`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
