-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2019 lúc 09:03 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffee1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(30, 32, '2019-04-11', 120000, 'COD', 'sadsa', '2019-04-11 06:25:16', '2019-04-11 06:25:16'),
(31, 33, '2019-04-11', 50000, 'COD', 'asdsad', '2019-04-11 08:03:31', '2019-04-11 08:03:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(33, 'sadhkjahfka', 'nam', 'abc!@gmail.com', 'adasdas', '46546', 'asdsad', '2019-04-11 08:03:31', '2019-04-11 08:03:31'),
(32, 'abc', 'nam', 'nguyentiendat@gmail.com', '21323', '897217389', 'sadsa', '2019-04-11 06:25:16', '2019-04-11 06:25:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(1, 'Hộp quà năng lượng hạnh phúc', 1, 'vui vui thôi mà', 90000, 50000, 'hop-qua-nang-luong-hanh-phuc.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2019-04-10 05:25:18'),
(2, 'Hộp quà năng lượng thành công', 1, '', 135000, 120000, 'hop-qua-nang-luong-thanh-cong.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(3, 'Hộp Quà Năng Lượng Thịnh Vượng', 1, '', 330000, 300000, 'hop-qua-nang-luong-thinh-vuong.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(4, 'Hộp Quà Năng Lượng Yêu Thương', 1, '', 80000, 0, 'hop-qua-nang-luong-yeu-thuong.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(5, 'Hộp Quà Legend', 1, '', 1850000, 0, 'hop-qua-legend.png', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(6, 'Cà Phê Sáng Tạo (8 hộp)', 1, '', 200000, 180000, 'ca-phe-sang-tao-8-hop-500gr.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(7, 'Cà Phê Legend', 1, '', 160000, 0, 'ca-phe-legend.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(8, 'Cà Phê Khát Vọng 500gr', 1, '', 160000, 150000, 'ca-phe-i-khat-vong-500gr.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(9, 'Cà Phê Hòa Tan G7', 1, 'Cà phê hòa tan G7 Trung Nguyên 2in1.    Chiết xuất trực tiếp từ những hạt cà phê xanh, sạch, thuần khiết từ vùng đất bazan huyền thoại Buôn Ma Thuột kết hợp bí quyết khác biệt của cà phê tươi và công nghệ sản xuất hiện đại nhất Việt Nam, Trung Nguyên đem đến cho bạn sản phẩm cà phê hòa tan G7 thơm ngon và đậm đà.     G7 là sản phẩm cà phê hòa tan duy nhất được chọn phục vụ các nguyên thủ quốc gia tại ASEM 5. Thích hợp khi uống đá.  Cà phê hòa tan G7 hội tụ những yếu tố đặc biêt nhất thế giới: Nguyên liệu tốt nhất, công nghệ sản xuất hiện đại, bí quyết Phương Đông độc đáo.     Chiết xuất trực tiếp từ những hạt cà phê xanh, sạch, thuần khiết từ vùng đất bazan huyền thoại Buôn Ma Thuột kết hợp bí quyết khác biệt của cà phê tươi và công nghệ sản xuất hiện đại nhất Việt Nam, Trung Nguyên đem đến cho bạn sản phẩm cà phê hòa tan G7 thơm ngon đậm đà.     G7 hoà tan 2in1 đen đá, hương vị mạnh, đúng “gu” uống cà phê đen của người Việt, giữ được vị đắng thật của cà phê rang xay đem đến cho người thưởng thức một ly cà phê thứ thiệt.', 160000, 150000, 'ca-phe-g7-hoa-tan-den-hop-15-goi-2gr.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(11, 'Combo cực manh 3in1', 1, '', 250000, 0, 'gu-manh-3-in-1-hop-12-goi-25gr.jpg', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(12, 'Cà Phê Sức Sống 500gr', 1, '', 200000, 180000, 'ca-phe-suc-song-nau-500gr.jpg', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(13, 'Cà Phê Chinh Phục-500gr', 1, '', 300000, 280000, 'ca-phe-s-chinh-phuc-500gr.jpg', 'cái', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(14, 'Americano', 2, '', 300000, 280000, '270_crop_AMERICANO.png', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(15, 'Capuchino', 2, '', 35000, 32000, '270_crop_CAPPUCINO.png', 'cái', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(16, 'Caramel Machiato', 2, '', 150000, 120000, '270_crop_CARAMEL-MACCHIATO.png', 'hộp', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(17, 'Đen Đá', 2, '', 25000, 20000, '270_crop_CFD.png', 'cai', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(18, 'Espresso', 2, '', 180000, 0, '270_crop_ESPRESSO.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(19, 'Mocha', 2, '', 25000, 0, '270_crop_MOCHA.png', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(20, 'Phin Sữa Đá', 2, '', 150000, 0, '270_crop_PHIN-SUA-DA.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(21, 'Phin Sữa Nóng', 2, '', 160000, 150000, '270_crop_PHIN-SUA-NONG.png', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(22, 'Ly sứ cao cấp lắm đó nha', 7, '', 160000, 150000, '270_crop_Screen_Shot_2018-04-04_at_09.16.18.png', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(23, 'Phin cà phê Bac nguyên chất', 7, '', 180000, 0, '270_crop_Screen_Shot_2018-04-04_at_09.18.39.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(24, 'Truyền thông 1kg', 2, '', 180000, 0, '270_crop_Traditional_1kg.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(25, 'Truyền Thống 250gr', 2, '', 80000, 70000, '270_crop_TT.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(26, 'Bánh Mì Thịt Nướng to tổ chảng', 7, '', 50000, 0, 'banh-mi-thit-nuong-vn.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(27, 'Bánh Mì Gà Xé Tan Nát', 7, '', 100000, 80000, 'BMGAXE.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(28, 'Bánh Mì Xá Xíu', 7, '', 120000, 0, 'BMCHALUAXAXIU.png', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(29, 'Bánh Mì Xíu Mại', 7, '', 100000, 0, 'BMXIUMAI.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(30, 'Túi 46 gói cà phê đậm đà hài hòa -17gr', 3, '', 380000, 350000, 'tui 46 goi dam da.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(31, 'Túi 46 gói Nescafé đậm vị', 3, '', 380000, 350000, 'tui 46 goi ca phe.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(32, 'NesCafé Red Cup', 3, '', 380000, 350000, 'Red cup.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(33, 'Cà phê rang xay vị nguyên chất I', 3, '', 280000, 250000, 'rangxaydo.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(34, 'Cà phê rang xay vị nguyên chất II', 3, '', 280000, 0, 'rang xay.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(35, 'Hộp 10 gói 3in1 sánh đậm vị', 3, '', 320000, 300000, 'hop 10 goi 3in1 sanh dam.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(36, 'Cà phê Capuchino hòa tan', 3, '', 320000, 300000, 'hoa tan capuchino.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(37, 'Cà Phê Bột Gold Blend', 3, '', 320000, 300000, 'Gold blend.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(38, 'NesCafé 3in1 Cà Phê Socola', 3, '', 350000, 330000, 'fc88e8dfc7ea68b4838830d585fd217a.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(39, 'Cà Phê Việt', 3, '', 350000, 330000, 'capheviet.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(40, 'Cà Phê Đen Hòa Tan', 3, '', 350000, 330000, 'ca phe den hoa tan.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(41, 'Cà Phê Lon Uống Liền', 3, 'Tiện lợi, ngon hơn khi uống lạnh', 350000, 330000, 'ca phe lon.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(42, 'Hộp 10 gói 3in1 Cà phê sữa', 3, '', 150000, 130000, 'hop 10 goi ca phe sua 3inn1.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(43, 'Hộp 20 gói 3in1 Cà phê đậm vị', 3, '', 120000, 0, 'hop 20 goi 3in1 dam vi.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(44, 'Cà Phê Mê', 4, 'Hương vị mới', 120000, 0, 'cfme.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(45, 'Cà Phê Phố ', 4, '', 120000, 0, 'cfpho.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(46, 'Đen đá hòa tan', 4, '', 120000, 0, 'pho_den_da.png', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(47, 'Cà phê sữa hòa tan', 4, '', 140000, 0, 'cafepho.png', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(48, 'Capuchino', 5, '', 140000, 0, 'capu.png', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(49, 'Caramel', 5, '', 120000, 100000, 'cara.png', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(50, 'Cà Phê Chocolate', 5, '', 120000, 100000, 'choco.png', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(51, 'Hazelnut', 5, '', 150000, 0, 'hazel.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(52, 'Cà Phê King có bơ - 500gr', 5, '', 150000, 0, 'kingbo500g.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(53, 'Cà Phê Moka có bơ 500g', 5, '', 150000, 0, 'mokabo500.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(54, 'Robusta cà phê có bơ - 500g', 5, '', 150000, 0, 'robustabo500g.png', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(55, 'Cà phê Rich', 5, '', 150000, 0, 'rich.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(56, 'Cà phê Vanila', 5, '', 150000, 0, 'vanila.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(57, 'Cà phê Smooth', 5, '', 150000, 0, 'smooth.png', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(58, 'Capuchino', 6, '', 200000, 180000, 'cappuccino_large.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(59, 'Chocolate', 6, '', 200000, 0, 'chocolate_ice_blended_large.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(60, 'Latte', 6, '', 20000, 0, 'latte__1__large.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00'),
(61, 'Mocha', 6, '', 15000, 12000, 'mocha_large.jpg', 'cái', 1, NULL, NULL),
(62, 'Hộp 16 viên nén Nescafé', 3, '', 250000, 220000, 'hop 16 vien nen Nescafe.jpg', 'cái', 0, NULL, NULL),
(63, 'Hộp 16 viên nén Nescafé sữa', 3, NULL, 150000, NULL, 'hop 16 vien nen Nescafe sua.jpg', NULL, 0, '2019-03-31 17:00:00', '2019-03-31 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, '', 'banner1.png'),
(2, '', 'banner2.jpg'),
(3, '', 'banner3.jpg'),
(4, '', 'banner4.png'),
(5, '', 'banner5.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Trung Nguyên', '', 'banh-man-thu-vi-nhat-1.jpg', NULL, NULL),
(2, 'HighLands', '', '20131108144733.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'NesCafé', '', 'banhtraicay.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'MacCoffee', '', 'banhkem.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Phúc Long', '', 'crepe.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'TheCoffeeHouse', '', 'pizza.jpg', '2016-10-25 17:19:00', NULL),
(7, 'Khác', '', 'sukemdau.jpg', '2016-10-25 17:19:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quyen` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`, `quyen`) VALUES
(6, 'Hương Hương', 'huonghuong08.php@gmail.com', '$2y$10$rGY4KT6ZSMmLnxIbmTXrsu2xdgRxm8x0UTwCyYCAzrJ320kYheSRq', '23456789', 'Hoàng Diệu 2', NULL, '2017-03-23 07:17:33', '2017-03-23 07:17:33', '0'),
(7, 'An Khang', 'nhok1461@gmail.com', '$2y$10$Nr90ltLtSmGuPAYUGXFQ8ux2BjlljaZyzifXqrTa7YbvZgujyIcba', '0523796029', '123 ABC', NULL, '2019-04-07 17:58:53', '2019-04-07 17:58:53', '1'),
(8, 'AKT', 'ankhang1704@gmail.com', '$2y$10$7ultrqz/3JZe5gW54s4SwOnqUvZOikcAts7H5M6T2XPXwPWyg9TKa', '0523796029', '123abc', NULL, '2019-04-10 14:11:02', '2019-04-10 14:11:02', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
