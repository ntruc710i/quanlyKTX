-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2021 lúc 07:19 PM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ktx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id_acc` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `quyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id_acc`, `email`, `pass`, `quyen`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'admin@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dien`
--

CREATE TABLE `dien` (
  `id_dien` int(11) NOT NULL,
  `so_dien_thang_truoc` int(11) NOT NULL,
  `so_dien_hien_tai` int(11) NOT NULL,
  `so_dien_su_dung` int(11) NOT NULL,
  `giadien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dien`
--

INSERT INTO `dien` (`id_dien`, `so_dien_thang_truoc`, `so_dien_hien_tai`, `so_dien_su_dung`, `giadien`) VALUES
(1, 222, 333, 111, 3000),
(4552, 222, 444, 222, 3000),
(8078, 222, 444, 222, 3000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doiphong`
--

CREATE TABLE `doiphong` (
  `id_doiphong` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `id_sinhvien` int(11) NOT NULL,
  `lydo_doiphong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioitinh`
--

CREATE TABLE `gioitinh` (
  `id_gioitinh` int(11) NOT NULL,
  `gioitinh` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gioitinh`
--

INSERT INTO `gioitinh` (`id_gioitinh`, `gioitinh`) VALUES
(1, 'Nam'),
(2, 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giuong`
--

CREATE TABLE `giuong` (
  `id_giuong` int(11) NOT NULL,
  `giuong` varchar(30) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `id_trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giuong`
--

INSERT INTO `giuong` (`id_giuong`, `giuong`, `id_phong`, `id_trangthai`) VALUES
(110, '01', 1158, 0),
(111, '02', 1158, 1),
(112, '03', 1158, 1),
(113, '04', 1158, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hoadon` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `thang` int(11) NOT NULL,
  `tien_nuoc` double NOT NULL,
  `id_dien` int(11) NOT NULL,
  `tong_tien` double NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadontt`
--

CREATE TABLE `hoadontt` (
  `id_hoadon` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `hocki` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `namhoc` text NOT NULL,
  `ngayin` date NOT NULL,
  `tien` double NOT NULL,
  `trangthai` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadontt`
--

INSERT INTO `hoadontt` (`id_hoadon`, `id_phong`, `hocki`, `namhoc`, `ngayin`, `tien`, `trangthai`) VALUES
(1, 1, 'Học Kì I', '2019-2020', '2020-12-01', 100000, 'Đã Thu Tiền'),
(2, 1, 'Học Kì II', '2019-2020', '2020-12-05', 100000, 'Đã Thu Tiền'),
(3, 1, 'Học Kì II', '2019-2020', '2020-12-10', 100000, 'Đã Thu Tiền');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `id_khoa` int(11) NOT NULL,
  `khoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`id_khoa`, `khoa`) VALUES
(1, 'Khoa Công Nghệ Thông Tin'),
(2, 'Khoa Công Nghệ Kỹ Thuật Máy Tính'),
(3, 'Khoa Quảng Trị Kinh Doanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khu`
--

CREATE TABLE `khu` (
  `id_khu` int(11) NOT NULL,
  `khu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khu`
--

INSERT INTO `khu` (`id_khu`, `khu`) VALUES
(1, 'Khu K'),
(2, 'Khu V');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsutt`
--

CREATE TABLE `lichsutt` (
  `id_lichsu` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `ngay_tt` date NOT NULL,
  `thoigian` time NOT NULL,
  `nguoithu` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `noidungtt` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `sotientt` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lichsutt`
--

INSERT INTO `lichsutt` (`id_lichsu`, `id_phong`, `ngay_tt`, `thoigian`, `nguoithu`, `noidungtt`, `sotientt`) VALUES
(1, 1, '2020-12-01', '16:24:30', 'Hồ Minh Trí', 'Thu Tiền Hóa Đơn Điện Nước', 200000),
(2, 1, '2020-12-07', '11:53:04', 'Lê Ngọc Trúc', 'Thu Tiền Nộp Phạt', 200000),
(3, 1, '2020-12-09', '11:53:04', 'Lê Ngọc Trúc', 'Thu Tiền Nộp Phạt', 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaiphong`
--

CREATE TABLE `loaiphong` (
  `id_loaiphong` int(11) NOT NULL,
  `loaiphong` varchar(20) NOT NULL,
  `gia` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaiphong`
--

INSERT INTO `loaiphong` (`id_loaiphong`, `loaiphong`, `gia`) VALUES
(4, 'Phòng 4 giường', 400000),
(6, 'Phòng 6 giường', 300000),
(8, 'Phòng 8 giường', 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha`
--

CREATE TABLE `nha` (
  `id_nha` int(11) NOT NULL,
  `nha` varchar(30) NOT NULL,
  `id_khu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nha`
--

INSERT INTO `nha` (`id_nha`, `nha`, `id_khu`) VALUES
(1, 'KA', 1),
(2, 'KB', 1),
(3, 'VA', 2),
(4, 'VB', 2),
(5, 'VC', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `id_phong` int(11) NOT NULL,
  `phong` varchar(10) NOT NULL,
  `id_loaiphong` int(11) NOT NULL,
  `id_gioitinh` int(11) NOT NULL,
  `id_tang` int(11) NOT NULL,
  `id_nha` int(11) NOT NULL,
  `id_khu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`id_phong`, `phong`, `id_loaiphong`, `id_gioitinh`, `id_tang`, `id_nha`, `id_khu`) VALUES
(1158, 'KA106', 4, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id_sinhvien` int(11) NOT NULL,
  `cmnd` int(11) NOT NULL,
  `ho` varchar(30) NOT NULL,
  `ten` varchar(30) NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(5) NOT NULL,
  `ngay_cmnd` date NOT NULL,
  `noicap_cmnd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` int(10) NOT NULL,
  `ma_sv` varchar(10) NOT NULL,
  `id_khoa` int(11) NOT NULL,
  `sv_nam` int(1) NOT NULL,
  `tt_tinh_tp` varchar(50) NOT NULL,
  `tt_quan_huyen` varchar(50) NOT NULL,
  `tt_phuong_xa` varchar(50) NOT NULL,
  `tt_diachi` varchar(50) NOT NULL,
  `ten_lh` varchar(50) NOT NULL,
  `sdt_lh` varchar(50) NOT NULL,
  `diachi_lh` varchar(50) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `id_giuong` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id_sinhvien`, `cmnd`, `ho`, `ten`, `ngaysinh`, `gioitinh`, `ngay_cmnd`, `noicap_cmnd`, `email`, `sdt`, `ma_sv`, `id_khoa`, `sv_nam`, `tt_tinh_tp`, `tt_quan_huyen`, `tt_phuong_xa`, `tt_diachi`, `ten_lh`, `sdt_lh`, `diachi_lh`, `trang_thai`, `id_giuong`, `user_name`, `password`) VALUES
(13, 222222222, 'Truc', 'Truc', '0000-00-00', 'Nam', '0000-00-00', 'Bạc Liêu', 'trucle882@gmail.com', 335515694, '1241 ', 1, 1, 'Cần Thơ', 'Ninh Kiều', 'Cái Khế', 'quang ngai', '14e2dwfw', '0335515694', '12412', 1, 110, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suachua`
--

CREATE TABLE `suachua` (
  `id_suachua` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `noidung_suachua` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `suachua`
--

INSERT INTO `suachua` (`id_suachua`, `id_phong`, `noidung_suachua`) VALUES
(1, 1158, 'Hỏng máy quạt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tang`
--

CREATE TABLE `tang` (
  `id_tang` int(11) NOT NULL,
  `tang` varchar(10) NOT NULL,
  `id_nha` int(11) NOT NULL,
  `id_khu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tang`
--

INSERT INTO `tang` (`id_tang`, `tang`, `id_nha`, `id_khu`) VALUES
(1, 'Tầng 1', 1, 1),
(2, 'Tầng 2', 1, 1),
(3, 'Tầng 3', 1, 1),
(4, 'Tầng 4', 1, 1),
(5, 'Tầng 1', 2, 1),
(6, 'Tầng 2', 2, 1),
(7, 'Tầng 3', 2, 1),
(8, 'Tầng 4', 2, 1),
(9, 'Tầng 1', 3, 2),
(10, 'Tầng 2', 3, 2),
(11, 'Tầng 3', 3, 2),
(12, 'Tầng 4', 3, 2),
(13, 'Tầng 5', 3, 2),
(14, 'Tầng 1', 4, 2),
(15, 'Tầng 2', 4, 2),
(16, 'Tầng 3', 4, 2),
(17, 'Tầng 4', 4, 2),
(18, 'Tầng 5', 4, 2),
(19, 'Tầng 1', 5, 2),
(20, 'Tầng 2', 5, 2),
(21, 'Tầng 3', 5, 2),
(22, 'Tầng 4', 5, 2),
(23, 'Tầng 5', 5, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `id_thongbao` int(11) NOT NULL,
  `tieude` varchar(50) NOT NULL,
  `noidung` varchar(1000) NOT NULL,
  `anh` varchar(50) DEFAULT NULL,
  `thoigiandang` date NOT NULL,
  `nguoidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id_thongbao`, `tieude`, `noidung`, `anh`, `thoigiandang`, `nguoidang`) VALUES
(3, 'Thu Tiền Phạt', 'Ký túc xá Trường Công Nghệ Thông Tin và Truyền Thông Việt Hàn. Trường Đại học Công Nghệ Thông Tin và Truyền thông Việt Hàn có khu ký túc xá hiện đại, được xây dựng theo tiêu chuẩn châu Âu. Khuân viên trong KTX sạch đẹp, thoáng mát, đáp ứng được chỗ ở cho trên 1600 sinh viên, tách biệt với khu vực dân cư và tình hình an toàn trật tự tốt. Đây là một khu tổ hợp, kết hợp giữa khu nhà ở, nhà ăn tập thể và các khu thể thao như: Sân bóng rổ, bóng chuyền, bóng đá, bể bơi… và trong năm 2012 sẽ xây dựng nhà đa năng phục vụ nhu cầu học tập, nghỉ ngơi và rèn luyện sức khỏe cho HSSV. Đặc biệt trong quý II năm 2012 nhà trường sẽ tiến hành phủ sóng WIFI toàn bộ khu vực giảng đường và ký túc xá, cho phép SV truy nhập hệ thống mạng LAN/Internet, truy nhập hệ thống thư viện điện tử của nhà trường cũng như Trung tâm Học liệu – ĐHTN và các CSDL lớn trên thế giới phục vụ nhu cầu học tập, nghiên cứu khoa học và giải trí. Nhà trường luôn có chủ trương ưu tiên chỗ ở cho các sinh viên mới nhập học..\r\n\r\n', 'images/picc.jpg', '2020-12-02', 'Tổ Quản Lý KTX');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `id_trangthai` int(11) NOT NULL,
  `trangthai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`id_trangthai`, `trangthai`) VALUES
(0, 'Đã  có người'),
(1, 'Còn trống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vipham`
--

CREATE TABLE `vipham` (
  `id_vipham` int(11) NOT NULL,
  `id_phong` int(11) NOT NULL,
  `id_sinhvien` int(11) NOT NULL,
  `ngay_vp` date NOT NULL,
  `thoigian_vp` time NOT NULL,
  `noidung_vp` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `hinhthuc_kl` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `sotiennop` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vipham`
--

INSERT INTO `vipham` (`id_vipham`, `id_phong`, `id_sinhvien`, `ngay_vp`, `thoigian_vp`, `noidung_vp`, `hinhthuc_kl`, `sotiennop`) VALUES
(1, 1158, 13, '2020-12-01', '14:55:57', 'Mất Trật Tự Nhiều Lần', 'Nộp Phạt', 20000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id_acc` (`id_acc`);

--
-- Chỉ mục cho bảng `dien`
--
ALTER TABLE `dien`
  ADD PRIMARY KEY (`id_dien`);

--
-- Chỉ mục cho bảng `doiphong`
--
ALTER TABLE `doiphong`
  ADD PRIMARY KEY (`id_doiphong`);

--
-- Chỉ mục cho bảng `gioitinh`
--
ALTER TABLE `gioitinh`
  ADD PRIMARY KEY (`id_gioitinh`);

--
-- Chỉ mục cho bảng `giuong`
--
ALTER TABLE `giuong`
  ADD PRIMARY KEY (`id_giuong`),
  ADD KEY `id_phong` (`id_phong`),
  ADD KEY `id_trangthai` (`id_trangthai`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hoadon`),
  ADD KEY `a` (`id_phong`),
  ADD KEY `dien` (`id_dien`);

--
-- Chỉ mục cho bảng `hoadontt`
--
ALTER TABLE `hoadontt`
  ADD PRIMARY KEY (`id_hoadon`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_khoa`);

--
-- Chỉ mục cho bảng `khu`
--
ALTER TABLE `khu`
  ADD PRIMARY KEY (`id_khu`);

--
-- Chỉ mục cho bảng `lichsutt`
--
ALTER TABLE `lichsutt`
  ADD PRIMARY KEY (`id_lichsu`);

--
-- Chỉ mục cho bảng `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`id_loaiphong`);

--
-- Chỉ mục cho bảng `nha`
--
ALTER TABLE `nha`
  ADD PRIMARY KEY (`id_nha`),
  ADD KEY `id_khu` (`id_khu`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id_phong`),
  ADD KEY `id_loaiphong` (`id_loaiphong`),
  ADD KEY `id_gioitinh` (`id_gioitinh`),
  ADD KEY `id_tang` (`id_tang`),
  ADD KEY `id_nha` (`id_nha`),
  ADD KEY `id_khu` (`id_khu`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id_sinhvien`),
  ADD KEY `kho` (`id_khoa`),
  ADD KEY `giuong` (`id_giuong`);

--
-- Chỉ mục cho bảng `suachua`
--
ALTER TABLE `suachua`
  ADD PRIMARY KEY (`id_suachua`),
  ADD KEY `id_phong` (`id_phong`);

--
-- Chỉ mục cho bảng `tang`
--
ALTER TABLE `tang`
  ADD PRIMARY KEY (`id_tang`),
  ADD KEY `id_khu` (`id_khu`),
  ADD KEY `id_nha` (`id_nha`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id_thongbao`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`id_trangthai`);

--
-- Chỉ mục cho bảng `vipham`
--
ALTER TABLE `vipham`
  ADD PRIMARY KEY (`id_vipham`),
  ADD KEY `phong` (`id_phong`),
  ADD KEY `sv` (`id_sinhvien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `doiphong`
--
ALTER TABLE `doiphong`
  MODIFY `id_doiphong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gioitinh`
--
ALTER TABLE `gioitinh`
  MODIFY `id_gioitinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `giuong`
--
ALTER TABLE `giuong`
  MODIFY `id_giuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoadontt`
--
ALTER TABLE `hoadontt`
  MODIFY `id_hoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id_khoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khu`
--
ALTER TABLE `khu`
  MODIFY `id_khu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lichsutt`
--
ALTER TABLE `lichsutt`
  MODIFY `id_lichsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nha`
--
ALTER TABLE `nha`
  MODIFY `id_nha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id_sinhvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `suachua`
--
ALTER TABLE `suachua`
  MODIFY `id_suachua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tang`
--
ALTER TABLE `tang`
  MODIFY `id_tang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id_thongbao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `vipham`
--
ALTER TABLE `vipham`
  MODIFY `id_vipham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giuong`
--
ALTER TABLE `giuong`
  ADD CONSTRAINT `giuong_ibfk_1` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id_phong`),
  ADD CONSTRAINT `giuong_ibfk_2` FOREIGN KEY (`id_trangthai`) REFERENCES `trangthai` (`id_trangthai`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `a` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id_phong`),
  ADD CONSTRAINT `dien` FOREIGN KEY (`id_dien`) REFERENCES `dien` (`id_dien`);

--
-- Các ràng buộc cho bảng `nha`
--
ALTER TABLE `nha`
  ADD CONSTRAINT `nha_ibfk_1` FOREIGN KEY (`id_khu`) REFERENCES `khu` (`id_khu`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`id_loaiphong`) REFERENCES `loaiphong` (`id_loaiphong`),
  ADD CONSTRAINT `phong_ibfk_2` FOREIGN KEY (`id_gioitinh`) REFERENCES `gioitinh` (`id_gioitinh`),
  ADD CONSTRAINT `phong_ibfk_3` FOREIGN KEY (`id_tang`) REFERENCES `tang` (`id_tang`),
  ADD CONSTRAINT `phong_ibfk_4` FOREIGN KEY (`id_nha`) REFERENCES `nha` (`id_nha`),
  ADD CONSTRAINT `phong_ibfk_5` FOREIGN KEY (`id_khu`) REFERENCES `khu` (`id_khu`);

--
-- Các ràng buộc cho bảng `suachua`
--
ALTER TABLE `suachua`
  ADD CONSTRAINT `suachua_ibfk_1` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id_phong`);

--
-- Các ràng buộc cho bảng `tang`
--
ALTER TABLE `tang`
  ADD CONSTRAINT `tang_ibfk_1` FOREIGN KEY (`id_khu`) REFERENCES `khu` (`id_khu`),
  ADD CONSTRAINT `tang_ibfk_2` FOREIGN KEY (`id_nha`) REFERENCES `nha` (`id_nha`);

--
-- Các ràng buộc cho bảng `vipham`
--
ALTER TABLE `vipham`
  ADD CONSTRAINT `phong` FOREIGN KEY (`id_phong`) REFERENCES `phong` (`id_phong`),
  ADD CONSTRAINT `sv` FOREIGN KEY (`id_sinhvien`) REFERENCES `sinhvien` (`id_sinhvien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
