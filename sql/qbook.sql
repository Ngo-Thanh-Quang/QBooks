-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2024 lúc 05:31 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qbook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_13_122749_create_tbl_admin_table', 1),
(6, '2023_12_13_142732_create_tbl_category_product', 2),
(7, '2023_12_15_150100_create_tbl_product', 3),
(8, '2023_12_22_154601_tbl_customer', 4),
(9, '2023_12_23_164953_tbl_shipping', 5),
(10, '2023_12_27_162609_tbl_payment', 6),
(11, '2023_12_27_162723_tbl_order', 6),
(12, '2023_12_27_162800_tbl_order_details', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Quang', '113', '2023-12-13 12:48:32', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Văn học', 'Văn học', 0, NULL, NULL),
(3, 'Tâm lý học', 'Tâm lý học', 0, NULL, NULL),
(4, 'Kinh tế', 'Kinh tế', 0, NULL, NULL),
(5, 'Từ điển', 'Từ điển', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment_product_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `customer_id`, `comment`, `comment_date`, `comment_product_id`, `star`) VALUES
(1, 9, 'ngon nha', '2024-01-03 14:54:30', 'caycamngotcuatoi3.webp', 4),
(3, 10, 'sách hay lắm nha', '2024-01-03 14:54:30', 'caycamngotcuatoi3.webp', 4),
(9, 11, 'kh hay lắm', '2024-01-03 14:54:30', 'caycamngotcuatoi3.webp', 3),
(32, 7, 'hay lắm nha', '2024-01-03 14:37:28', 'caycamngotcuatoi3.webp', 5),
(33, 7, 'kh hay lắm', '2024-01-03 15:02:22', 'muonkiepnhansinh1613.webp', 2),
(34, 7, 'hay nha', '2024-01-03 15:03:55', 'nhagiakim94.webp', 5),
(35, 15, 'sách rất hay', '2024-01-03 15:59:46', 'nguoiduadieu343.webp', 5),
(36, 7, 'k hay lắm', '2024-01-03 16:00:41', 'nguoiduadieu343.webp', 1),
(37, 10, 'hay', '2024-01-03 16:01:34', 'nguoiduadieu343.webp', 5),
(38, 16, 'hay vừa vừa', '2024-01-03 16:12:04', 'caycamngotcuatoi3.webp', 3),
(39, 16, 'hay nha', '2024-01-03 16:12:29', 'muahekhongten440.webp', 4),
(40, 16, 'hay vừa vừa', '2024-01-03 16:15:18', 'nguoiduadieu343.webp', 2),
(41, 16, 'sách hay nhé', '2024-01-03 16:15:41', 'tuoitredanggiabaonhieu188.webp', 5),
(42, 16, 'đọc sách này giúp mình giàu nha', '2024-01-03 16:16:28', 'conlocquantri672.webp', 4),
(43, 16, 'rất hay', '2024-01-03 16:17:08', 'khamnghiem357.webp', 5),
(44, 13, 'hay lắm nha', '2024-01-04 16:52:10', 'damtreodaiduongden524.webp', 5),
(45, 13, 'mắc quá', '2024-01-04 16:55:50', 'caycamngotcuatoi691.webp', 2),
(46, 13, 'hay lắm nha mn', '2024-01-05 02:25:34', 'sisolopvang415.webp', 4),
(47, 7, 'rất hay', '2024-01-05 04:07:27', 'caycamngot780.webp', 5),
(48, 11, 'hay lắm nha, cảm động', '2024-01-05 04:08:20', 'caycamngot780.webp', 4),
(49, 10, 'kh hay lắm', '2024-01-05 04:09:04', 'caycamngot780.webp', 1),
(50, 13, 'cũng hay', '2024-01-05 04:09:47', 'caycamngot780.webp', 5),
(51, 11, 'hay lắm nha', '2024-01-05 04:24:08', 'muonkiepnhansinh1613.webp', 5),
(52, 13, 'thích sách này', '2024-01-05 04:24:49', 'muonkiepnhansinh1613.webp', 3),
(53, 10, 'rất thú vị', '2024-01-05 04:25:18', 'muonkiepnhansinh1613.webp', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(100) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `contact_name`, `contact_email`, `message`) VALUES
(3, 'Ngô Thành Quang', 'quang@gmail.com', 'ok nha'),
(4, 'Ngô Thành Quang', 'quang@gmail.com', 'number 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(7, 'Quang Ngô', 'quang@gmail.com', '202cb962ac59075b964b07152d234b70', '123', NULL, NULL),
(9, 'Ngô Thành Quang', 'quang1@gmail.com', '202cb962ac59075b964b07152d234b70', '123', NULL, NULL),
(10, 'Lê Văn Huy', 'huyle@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '12345', NULL, NULL),
(11, 'Nguyễn Thị Hồng', 'hong@gmail.com', '202cb962ac59075b964b07152d234b70', '114', NULL, NULL),
(12, 'Nguyễn Văn Hùng', 'hung@gmail.com', '202cb962ac59075b964b07152d234b70', '123', NULL, NULL),
(13, 'Nguyễn Văn Tèo', 'teo@gmail.com', '202cb962ac59075b964b07152d234b70', '0896480166', NULL, NULL),
(14, 'Nguyễn Văn Dũng', 'dung@gmail.com', '202cb962ac59075b964b07152d234b70', '0896480166', NULL, NULL),
(15, 'Ngô Thành Quang', 'quangnt.22itb@vku.udn.vn', 'c4ca4238a0b923820dcc509a6f75849b', '0896480166', NULL, NULL),
(16, 'Nguyễn Văn Phèo', 'pheo@gmail.com', '202cb962ac59075b964b07152d234b70', '0896480166', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_infomation`
--

CREATE TABLE `tbl_infomation` (
  `info_id` int(11) NOT NULL,
  `info_contact` mediumtext NOT NULL,
  `info_map` text NOT NULL,
  `info_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_information`
--

CREATE TABLE `tbl_information` (
  `info_id` int(11) NOT NULL,
  `info_contact` mediumtext NOT NULL,
  `info_map` text NOT NULL,
  `info_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(50) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 7, 5, 1, '448550.00', 'Đang chờ xử lý', NULL, NULL),
(2, 7, 6, 2, '761800.00', 'Đang chờ xử lý', NULL, NULL),
(3, 9, 7, 3, '154050.00', 'Đang chờ xử lý', NULL, NULL),
(4, 10, 8, 4, '239400.00', 'Đang chờ xử lý', NULL, NULL),
(5, 7, 9, 5, '70200.00', 'Đang chờ xử lý', NULL, NULL),
(6, 7, 11, 6, '154050.00', 'Đang chờ xử lý', NULL, NULL),
(7, 7, 11, 7, '154050.00', 'Đang chờ xử lý', NULL, NULL),
(8, 7, 11, 8, '154050.00', 'Đang chờ xử lý', NULL, NULL),
(10, 13, 12, 10, '121550.00', 'Đang chờ xử lý', NULL, NULL),
(11, 14, 13, 11, '249400.00', 'Đang chờ xử lý', NULL, NULL),
(12, 7, 14, 12, '354250.00', 'Đang chờ xử lý', NULL, NULL),
(13, 13, 17, 13, '390600.00', 'Đang chờ xử lý', NULL, NULL),
(14, 13, 17, 14, '156600.00', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'caycamngotcuatoi3.webp', 'Cây Cam Ngọt Của Tôi', '70200', 1, NULL, NULL),
(2, 1, 'nhagiakim94.webp', 'Nhà Giả Kim', '51350', 1, NULL, NULL),
(3, 1, 'muahekhongten440.webp', 'Mùa Hè Không Tên', '109000', 3, NULL, NULL),
(4, 2, 'caycamngotcuatoi3.webp', 'Cây Cam Ngọt Của Tôi', '70200', 1, NULL, NULL),
(5, 2, 'thongminhtrengiuong784.png', 'Trí Thông Minh Trên Giường', '131400', 3, NULL, NULL),
(6, 2, 'tiengphap780.webp', 'Từ Điển Pháp - Việt', '81200', 2, NULL, NULL),
(7, 2, 'tienganh800.webp', 'Từ Điển Việt Anh', '135000', 1, NULL, NULL),
(8, 3, 'caycamngotcuatoi3.webp', 'Cây Cam Ngọt Của Tôi', '70200', 1, NULL, NULL),
(9, 3, 'nguoiduadieu343.webp', 'Người Đua Diều', '83850', 1, NULL, NULL),
(10, 4, 'caycamngotcuatoi3.webp', 'Cây Cam Ngọt Của Tôi', '70200', 2, NULL, NULL),
(11, 4, 'muonkiepnhansinh1613.webp', 'Muôn Kiếp Nhân Sinh', '99000', 1, NULL, NULL),
(12, 5, 'caycamngotcuatoi3.webp', 'Cây Cam Ngọt Của Tôi', '70200', 1, NULL, NULL),
(13, 6, 'caycamngotcuatoi3.webp', 'Cây Cam Ngọt Của Tôi', '70200', 1, NULL, NULL),
(14, 6, 'nguoiduadieu343.webp', 'Người Đua Diều', '83850', 1, NULL, NULL),
(15, 7, 'caycamngotcuatoi3.webp', 'Cây Cam Ngọt Của Tôi', '70200', 1, NULL, NULL),
(16, 7, 'nguoiduadieu343.webp', 'Người Đua Diều', '83850', 1, NULL, NULL),
(17, 8, 'caycamngotcuatoi3.webp', 'Cây Cam Ngọt Của Tôi', '70200', 1, NULL, NULL),
(18, 8, 'nguoiduadieu343.webp', 'Người Đua Diều', '83850', 1, NULL, NULL),
(19, 10, 'caycamngotcuatoi3.webp', 'Cây Cam Ngọt Của Tôi', '70200', 1, NULL, NULL),
(20, 10, 'nhagiakim94.webp', 'Nhà Giả Kim', '51350', 1, NULL, NULL),
(21, 11, 'caycamngotcuatoi3.webp', 'Cây Cam Ngọt Của Tôi', '70200', 2, NULL, NULL),
(22, 11, 'muahekhongten440.webp', 'Mùa Hè Không Tên', '109000', 1, NULL, NULL),
(23, 12, 'nguoiduadieu343.webp', 'Người Đua Diều', '83850', 3, NULL, NULL),
(24, 12, 'nhagiakim94.webp', 'Nhà Giả Kim', '51350', 2, NULL, NULL),
(25, 13, 'caycamngotcuatoi3.webp', 'Cây Cam Ngọt Của Tôi', '70200', 3, NULL, NULL),
(26, 13, 'khamnghiem357.webp', 'Ghi Chép Pháp Y', '90000', 2, NULL, NULL),
(27, 14, 'dacnhantam895.webp', 'Đắc Nhân Tâm', '58800', 1, NULL, NULL),
(28, 14, 'economix331.webp', 'Economix', '97800', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '2', 'Đang chờ xử lý', NULL, NULL),
(2, '2', 'Đang chờ xử lý', NULL, NULL),
(3, '2', 'Đang chờ xử lý', NULL, NULL),
(4, '2', 'Đang chờ xử lý', NULL, NULL),
(5, '2', 'Đang chờ xử lý', NULL, NULL),
(6, '1', 'Đang chờ xử lý', NULL, NULL),
(7, '1', 'Đang chờ xử lý', NULL, NULL),
(8, '2', 'Đang chờ xử lý', NULL, NULL),
(9, '2', 'Đang chờ xử lý', NULL, NULL),
(10, '1', 'Đang chờ xử lý', NULL, NULL),
(11, '1', 'Đang chờ xử lý', NULL, NULL),
(12, '2', 'Đang chờ xử lý', NULL, NULL),
(13, '2', 'Đang chờ xử lý', NULL, NULL),
(14, '2', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `category_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(6, 1, 'Cây Cam Ngọt Của Tôi', 'Cây Cam Ngọt Của Tôi', 'Cây Cam Ngọt Của Tôi là tác phẩm của nhà văn người Brazil Jose Mauro de Vasconcelos. Sinh ra và lớn lên trong một gia đình nghèo ở ngoại ô Rio de Janeiro, ông phải làm đủ nghề để trang trải cho cuộc sống. Không ban cho Mauro một gia đình giàu có nhưng trời phú cho vị tác giả này một trí nhớ phi thường, trí tưởng tượng tuyệt vời và vốn sống vô cùng phong phú. Mauro bắt đầu sáng tác từ năm 22 tuổi. Cuốn sách Cây Cam Ngọt Của Tôi của ông không chỉ thành công tại Brazil (được đưa vào chương trình tiểu học của nước này) mà còn được bán bản quyền cho hơn 20 quốc gia và chuyển thể thành phim.', '70200', 'caycamngotcuatoi3.webp', 0, NULL, NULL),
(7, 4, 'Economix', 'Economix', 'Tác giả của cuốn sách này, Michael Goodwin cũng có những băn khoăn tương tự. Và ông đã tìm ra cách biến những lý thuyết tưởng chừng phức tạp, trừu tượng trở nên sống động, gần gũi hơn thông qua cuốn sách này. Tiêu đề của cuốn sách “Economix”  được lồng ghép một cách độc đáo từ hai chữ “Economic” (kinh tế) và “Comix”(truyện tranh truyền tải kiến thức cho người trưởng thành). Không chỉ vậy, cuốn sách còn là một hỗn hợp (mix) các tri thức thú vị của nhiều ngành: lịch sử, chính trị, kĩ thuật,... nhằm xoay quanh trục chính là kinh tế học.', '97800', 'economix331.webp', 0, NULL, NULL),
(8, 3, 'Đắc Nhân Tâm', 'Đắc Nhân Tâm', 'Đắc Nhân Tâm đã trở thành cuốn cẩm nang kinh điển về thu phục lòng người trong giao tiếp xã hội. Ra đời trong bối cảnh năm 1937, cuốn sách vẫn có thể áp dụng đến ngày nay, bởi nó là kinh nghiệm dựa trên những quan sát, đánh giá của tác giả về tâm lý con người. Cuốn cẩm nang dù có bao lần tái bản, phiên bản hiệu chỉnh được phát hành năm 2018 của nhà sách Nhã Nam vẫn đáng để thưởng thức vì những giá trị vượt thời gian và vì cả sự “mài sắc và tinh chỉnh” một tác phẩm vốn đã rất thành công.', '58800', 'dacnhantam895.webp', 0, NULL, NULL),
(9, 1, 'Muôn Kiếp Nhân Sinh', 'Muôn Kiếp Nhân Sinh', 'Muôn Kiếp Nhân Sinh là một bức tranh lớn với vô vàn mảnh ghép cuộc đời, là một cuốn phim đồ sộ, sống động về những kiếp sống huyền bí, trải dài từ nền văn minh Atlantis hùng mạnh đến vương quốc Ai Cập cổ đại của các Pharaoh quyền uy, đến Hợp Chủng Quốc Hoa Kỳ ngày nay. Sách cũng lí giải vì sao cùng sinh ra trong 1 gia đình, cùng lớn lên trong 1 môi trường nhưng mỗi chúng ta lại có những tính cách khác nhau. Đó là vì chúng ta có những tiền kiếp khác nhau. Chúng ta có thể sinh ra trong nhiều hình hài khác nhau nhưng chúng ta đều mong muốn học được bài học của Vũ trụ khi tới cuộc sống này. Mọi việc xảy ra ở kiếp này đều là kết quả của những hành động xảy ra ở nhiều kiếp trước. Con người có thể vì sân si hiện tại mà đánh mất sự tu tâm tích đức của nhiều kiếp trước.', '99000', 'muonkiepnhansinh1613.webp', 0, NULL, NULL),
(10, 1, 'Nhà Giả Kim', 'Nhà Giả Kim', 'Tác phẩm được sáng tác năm 1988 bằng tiếng Bồ Đào Nha tại quê nhà Brazil của tác giả, sau khi xuất bản đã trở nên vô cùng nổi tiếng trên thế giới với danh hiệu “Cuốn sách bán chạy nhất chỉ sau Kinh Thánh”. Tờ Herald Sun từng xếp Nhà Giả Kim vào một trong năm cuốn sách bị đánh cắp nhiều nhất tại các hiệu sách ở Melbourne.', '51350', 'nhagiakim94.webp', 0, NULL, NULL),
(11, 5, 'Từ Điển Việt Anh', 'Từ Điển Việt Anh', 'Từ Điển Việt Anh', '135000', 'tienganh800.webp', 0, NULL, NULL),
(12, 1, 'Người Đua Diều', 'Người Đua Diều', 'Không đơn thuần chỉ là một câu chuyện về tình bạn cao đẹp, Người đua diều mang đến cho độc giả cái nhìn toàn cảnh về một đất nước hồi giáo mang tên Afghanistan, nơi bóng ma chiến tranh luôn luôn bao trùm. Nơi tình cảm cha con mỏng manh. Danh dự, sự phản bội, dối trá, đắc tội. Khaled Hosseini vẽ ra một bức chân dung một màu nhưng không đơn giản, là một vết cắt nhẹ nhưng lại sâu lắng trong lòng người yêu văn chương khắp năm châu.', '83850', 'nguoiduadieu343.webp', 0, NULL, NULL),
(13, 1, 'Mùa Hè Không Tên', 'Mùa Hè Không Tên', 'Mùa hè không tên là cuốn sách vừa mới cho ra mắt của bác Nguyễn Nhật Ánh. Vẫn là những trò tinh nghịch gắn liền với các nhân vật con Nhàn, con Hội, thằng Tí, thằng Túc,… Những mảnh đời vượt qua nghịch cảnh số phận, tất cả được tái hiện chân thật qua lời kể của nhân vật Khang. Mùa hè lớp 5 đặc biệt, đấy là mùa hè cuối cùng với tụi bạn, vì kể từ sau đó cuộc sống của Khang đã thay đổi mãi mãi.', '109000', 'muahekhongten440.webp', 0, NULL, NULL),
(14, 1, 'Đám Trẻ Ở Đại Dương Đen', 'Đám Trẻ Ở Đại Dương Đen', 'Đại dương đen là tiếng nói hiếm hoi với thế giới của những người trầm cảm. Cuốn sách là lời độc thoại của những đứa trẻ ở đại dương đen, nơi nỗi buồn và tuyệt vọng không ngừng cuộn trào bên trong những đứa trẻ. Những đứa trẻ ấy phải vật lộn trong những góc tối tăm với những tâm lí, những đè nén, những tổn thương mà chẳng ai hay. Đám trẻ đó phải tự cứu lấy bản thân mình thôi. Ai sẽ ở bên cạnh đám trẻ ở dưới đại dương đen sâu thẳm kia? Câu trả lời là chẳng ai cả. Không một ai muốn ở lại và đám trẻ cũng không muốn ai ở lại cả. Đôi khi không phải họ không muốn ai ở lại mà họ không chắc chắn rằng ai muốn ở lại, ở lại bên cạnh một người như họ. Họ mất niềm tin, mất đi sự tự tin chỉ còn lại sự đổ nát bên cạnh họ. Tôi nghĩ điều đám trẻ cần không phải là người ở lại mà là người đến và kéo họ ra khỏi đó. Đó chính xác là những điều họ cần.', '71280', 'damtreodaiduongden524.webp', 0, NULL, NULL),
(15, 1, 'Ghi Chép Pháp Y', 'Ghi Chép Pháp Y', 'Cuốn sách “Ghi chép pháp y – Những cái chết bí ẩn” là một tác phẩm của bác sĩ pháp y Lưu Hiểu Huy, người đã có 15 năm kinh nghiệm và từng mổ xẻ hơn 800 tử thi. Tổng hợp những vụ án có thật, cuốn sách đưa người đọc bước vào hiện trường của những vụ án man rợ và cùng các bác sĩ pháp y ghép lại sự thật từ những mảnh vụn thi thể để hé lộ nguyên nhân của cái chết. Mỗi vụ án đều là một ẩn số, hiện trường vụ án bao gồm cả xác chết chính là chiếc chìa khóa để truy tìm hung thủ ngay cả khi nó không còn nguyên vẹn.', '90000', 'khamnghiem357.webp', 0, NULL, NULL),
(16, 4, 'Nghĩ Giàu Và Làm Giàu', 'Nghĩ Giàu Và Làm Giàu', 'Nghĩ giàu và làm giàu là một trong những cuốn sách dạy làm giàu bán chạy nhất mọi thời đại và được yêu thích nhất hiện nay. Đây là một cuốn sách rất có giá trị và làm thay đổi cuộc sống của nhiều người. Cuốn sách không những cung cấp những kiến thức và nguyên tắc cần thiết giúp bạn làm giàu một cách dễ dàng mà còn trang bị cho người đọc những tư duy tích cực để luôn hướng đến những điều tốt đẹp trong cuộc sống.', '79000', 'thinkgrow663.webp', 0, NULL, NULL),
(18, 4, 'Cơn Lốc Quản Trị', 'Cơn Lốc Quản Trị', 'Trong sách “Cơn lốc quản trị” mới ra mắt, giáo sư Phan Văn Trường đề cập góc nhìn về ba trụ cột văn hóa giúp doanh nghiệp phát triển lành mạnh. Sau các cuốn Một đời thương thuyết, Một đời quản trị, Một đời như kẻ tìm đường, hồi cuối tháng 9, giáo sư Phan Văn Trường ra mắt sách mới. Không đơn thuần chia sẻ những kinh nghiệm, trải nghiệm của một chuyên gia đối với nghề, giáo sư đưa ra một lý thuyết có hệ thống dựa trên kinh nghiệm của ông nhằm giúp các doanh nghiệp làm chủ nghệ thuật quản trị.', '111000', 'conlocquantri672.webp', 0, NULL, NULL),
(19, 4, 'Kế Toán Vỉa Hè', 'Kế Toán Vỉa Hè', 'Kế toán khô khan được viết bằng câu từ dí dỏm và bình dân. Nếu bạn là một người không thích những con số, sau khi đọc xong sách này, bạn sẽ có cái nhìn tổng quan và chi tiết hơn những điều trước nay bạn nghĩ rằng \"rất khó\".', '169000', 'ketoanviahe560.webp', 0, NULL, NULL),
(20, 4, 'Tâm Lý Học Về Tiền', 'Tâm Lý Học Về Tiền', 'Tâm lý học về tiền – không giống như hầu hết mọi người thường đánh giá khi mới chỉ đọc tiêu đề - đây không phải cuốn cẩm nang vạn năng với những hướng dẫn cụ thể về cách kiếm tiền, cách để làm giàu. Cuốn sách này giống như một chiếc la bàn nhưng là trong vấn đề tiền bạc và tâm lý; những tư tưởng trong sách là sự định hướng tuyệt với cho bạn trong việc kiểm soát đồng tiền, tài chính của bạn trong suốt quãng đời của bạn nếu muốn, còn chuyện kiếm tiền – là cuốn tự truyện của mỗi người. Mỗi chúng ta đều có cách riêng để làm nó.', '117180', 'tamlyhocvetien295.webp', 0, NULL, NULL),
(21, 5, 'Tự Học Tiếng Nhật', 'Tự Học Tiếng Nhật', 'Tự Học Tiếng Nhật cung cấp những kiến thức hữu ích cùng kết hợp khéo léo các hình ảnh minh họa bắt mắt với lời chú giải súc tích đã tạo hứng thú cho người học và ghim sâu bài giảng vào trong tiềm thức người học.', '40800', 'tiengnhat650.webp', 0, NULL, NULL),
(22, 5, 'Từ Điển Pháp - Việt', 'Từ Điển Pháp - Việt', 'Từ điển này phù hợp với hầu hết các trình độ tiếng Pháp từ sơ cấp đến chuyên sâu nên được khá nhiều bạn chọn lựa sử dụng. Từ điển có phiên âm tiếng Pháp, phân loại từ loại, các cấu trúc đi kèm, các nghĩa tiếng Việt, kèm hình ảnh minh họa phù hợp với nhu cầu sử dụng của hầu hết mọi trình độ. Từ điển có nhiều số lượng mục từ để bạn lựa chọn phù hợp cùng nhu cầu.', '81200', 'tiengphap780.webp', 0, NULL, NULL),
(23, 3, 'Trí Thông Minh Trên Giường', 'Trí Thông Minh Trên Giường', 'Cuốn sách có 11 chương, và mỗi chương có các đầu mục nhỏ để củng cố nội dung của chương. Tác giả tiếp cận bằng nhiều hình thức, nhưng chủ yếu là quanh những câu chuyện của các cặp đôi, những người bệnh nhân của bà đến để trị liệu tâm lý. Bà nêu ra các vấn đề của từng cặp đôi, và đưa ra góc nhìn từ gốc rễ, đặt câu hỏi vì sao. Nhiều vấn đề bà có thể đưa ra cho người đọc cách nghĩ khác, nhưng một số lại chỉ dừng lại ở hệ quả.', '131400', 'thongminhtrengiuong784.png', 0, NULL, NULL),
(24, 1, 'Tuổi Trẻ Đáng Giá Bao Nhiêu?', 'Tuổi Trẻ Đáng Giá Bao Nhiêu?', 'Nếu thực sự bạn đang vướng vào những năm tháng khó khăn, bế tắc, chưa thấy đâu là niềm tin và động lực, có lẽ đây là cuốn sách xứng đáng để bạn nên có. Với chính những tích lũy, Rosie Nguyễn đã chia sẻ kinh nghiệm của bản thân vào từng trang, từng chương để hoàn thành cuốn sách này. Từ một sinh viên Ngoại Thương, đánh giá bản thân sai lầm khi xem học ở trường là tất cả của sự nghiệp học hành mà quên mất việc tự học, chủ động trau dồi kiến thức, tiếc tiền mua sách. Cuối cùng chị chọn bước chân trên hành trình khám phá thế giới của riêng mình khi làm một người du lịch bụi và có thêm câu chuyện “Ta ba lô trên đất Á”.', '54000', 'tuoitredanggiabaonhieu188.webp', 0, NULL, NULL),
(25, 1, 'Sĩ Số Lớp Vắng 0', 'Sĩ Số Lớp Vắng 0', '“SĨ SỐ LỚP VẮNG 0” là cuốn sách được chắp bút bởi EMMA HẠ MY - chủ sở hữu kênh Youtube “Truyện của Emma” đăng tải những câu chuyện kinh dị tự sáng tác bằng hình ảnh hoạt họa do chính tác giả thực hiện. Cuốn sách bao gồm “Vệt Phấn Trên Bảng Đen” và 9 truyện ngắn khác CHƯA TỪNG xuất hiện trên kênh của Emma Hạ My.', '70900', 'sisolopvang415.webp', 0, NULL, NULL),
(26, 5, 'Từ Điển Oxford Anh - Việt', 'Hàng mới', 'Từ Điển Oxford Anh - Việt được xây dựng dựa trên danh sách 3000 từ vựng cơ bản Anh-Anh và Anh-Mỹ. Khác với các bản tiếng Việt chỉ thiên về giải nghĩa, Từ Điển Oxford Anh - Việt đưa ra ví dụ chính xác cũng như định nghĩa ngắn gọn dễ hiểu bằng tiếng Anh. Ở một vài mục từ có tính ứng dụng cao, Từ Điển Oxford Anh - Việt còn cung cấp thêm các từ chiết xuất hoặc các cụm động từ cơ bản. Từ điển này cũng cung cấp một danh sách động từ bất quy tắc thường dùng.', '128700', 'tudienoxford971.webp', 0, NULL, NULL),
(27, 5, 'Từ Điển Tiếng Việt', 'Hàng mới', 'Trên thực tế, cuốn sách Từ điển Tiếng Việt đã là nguồn tra cứu, trích dẫn đáng tin cậy của hầu hết các bài viết, sách chuyên khảo, đặc biệt là các luận án tiến sĩ, luận văn thạc sĩ, khoá luận tốt nghiệp khi phân tích ý nghĩa của các đơn vị từ ngữ tiếng Việt, là cẩm nang tra cứu không thể thiếu của tất cả những người cầm bút, dù đó là nhà văn, nhà thơ, hay nhà báo, kể cả các nhà giáo giảng dạy tiếng Việt.', '467000', 'tudientiengviet662.webp', 0, NULL, NULL),
(28, 3, 'Đàn Ông Sao Hỏa Đàn Bà Sao Kim', 'Vẫn còn hàng', 'Đàn ông sao Hỏa – Đàn bà sao Kim – một trong những cuốn sách tâm lí của Tiến sĩ John Gray đi guốc trong tiềm thức con người. Đã giúp cho hàng triệu độc giả hiểu hơn về bản thân và người khác giới. Từ đó, biết cách xây dựng tình yêu và có được cuộc hôn nhân hạnh phúc sau khi nắm giữ những ý niệm mới mẻ nhưng hoàn toàn thực tế.', '131600', 'danongdanba621.webp', 0, NULL, NULL),
(31, 3, 'Tâm Lý Học Đám Đông', 'Vẫn còn hàng', 'Mỗi người là một cá thể độc lập, nhưng con người không tồn tại một mình trong thế giới. Chúng ta sống trong sự gắn bó, vừa tự nguyện vừa ràng buộc với những người khác. Chúng ta đang sống trong thời đại của đám đông. “Tâm lí học đấm đông” của Gustave Le Bon sẽ soi rọi bí ẩn tâm hồn đám đông và hé mở cho ta lời giải thích về những hiện tượng lịch sử, kinh tế, văn hóa, xã hội đã và đang diễn ra.', '100420', 'tamlyhocdamdong252.webp', 0, NULL, NULL),
(32, 3, 'Chiến Thắng Con Quỷ Trong Bạn', 'Vẫn còn hàng', 'Chiến Thắng Con Quỷ Trong Bạn là một trong những quyển sách hay và nổi tiếng của Napoleon Hill, giúp nhìn nhận mọi vấn đề mà từ trước đến giờ bạn chưa từng nhận ra. Đọc từng trang sách, bạn như nhận ra chính con người mình đang hiện hữu qua từng con chữ tác giả đề cập đến.', '89000', 'chienthangconquy635.webp', 0, NULL, NULL),
(33, 3, 'Cửa Hiệu Triết Học', 'Vẫn còn hàng', 'Cửa hiệu triết học là một cuốn sách nên đọc để bổ sung vào kho tàng tri thức của mỗi người, hoặc đơn giản là để kích thích sự suy tư về thế giới xung quanh. Một ngày yên lặng, hoặc giữa phố phường ồn ã, chúng ta đều có thể trầm ngâm trong chính dòng suy tư của mình.', '148500', 'cuahieutriethoc746.webp', 0, NULL, NULL),
(34, 5, 'Từ Điển Mỹ Học', 'Vẫn còn hàng', 'Từ điển Mỹ học là một nguồn tài liệu quan trọng và hữu ích cho những người quan tâm đến lĩnh vực mỹ học. Cuốn sách tập trung vào việc giải thích các thuật ngữ, nguyên lý và phạm trù của mỹ học, đồng thời giúp cho người đọc hiểu rõ hơn về bản chất và quy luật của cái đẹp. Ngoài ra, cuốn sách còn rất hữu ích cho những người nghiên cứu triết học và phê bình văn học nghệ thuật.', '314650', 'tudienmyhoc453.webp', 0, NULL, NULL),
(35, 4, 'Content Bạc Tỷ', 'Vẫn còn hàng', 'Content Bạc Tỷ là một cuốn sách thú vị và hữu ích cho những người muốn cải thiện khả năng viết và sáng tạo nội dung trực tuyến. Cuốn sách kết hợp giữa kiến thức chuyên sâu, trải nghiệm cá nhân của tác giả và tính tương tác để mang lại một trải nghiệm đọc đáng nhớ. Nếu bạn đang tìm kiếm nguồn cảm hứng và kỹ thuật để nâng cao khả năng viết của mình, thì đừng bỏ lỡ cuốn sách này', '121500', 'contentbacty572.webp', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `product_id`, `rating`) VALUES
(1, 'caycamngotcuatoi3.webp', 2),
(2, 'caycamngotcuatoi3.webp', 3),
(3, 'caycamngotcuatoi3.webp', 5),
(4, 'caycamngotcuatoi3.webp', 5),
(5, 'caycamngotcuatoi3.webp', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(11) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_notes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `shipping_notes`, `created_at`, `updated_at`) VALUES
(1, 'Ngô Thành Quang', '113 Ngô Gia Tự', '113', 'quang@gmail.com', 'Giao trong giờ hành chính', NULL, NULL),
(2, 'Ngô Thành Quang', '113 Ngô Gia Tự', '113', 'quang@gmail.com', 'abc', NULL, NULL),
(3, 'Ngô Thành Quang', '113 Ngô Gia Tự', '113', 'quang@gmail.com', 'abc', NULL, NULL),
(4, 'Ngô Thành Quang', '113 Ngô Gia Tự', '113', 'quang@gmail.com', 'abc', NULL, NULL),
(5, 'Ngô Thành Quang', '113 Ngô Gia Tự', '113', 'quang@gmail.com', 'abc', NULL, NULL),
(6, 'Ngô Thành Quang', '113 Ngô Gia Tự', '113', 'quang@gmail.com', 'abc', NULL, NULL),
(7, 'Ngô Thành Quang', '113 Ngô Gia Tự', '113', 'quang@gmail.com', 'ghj', NULL, NULL),
(8, 'Lê Văn Huy', '113 Phạm Cự Lượng', '12345', 'huyle@gmail.com', 'abc', NULL, NULL),
(9, 'Ngô Thành Quang', '113 Phạm Cự Lượng', '113', 'quang@gmail.com', 'a', NULL, NULL),
(10, 'Ngô Thành Quang', '113 Ngô Gia Tự', '113', 'quang@gmail.com', 'abc', NULL, NULL),
(11, 'Ngô Thành Quang', '113 Ngô Gia Tự', '113', 'quang@gmail.com', 'giao hàng nhanh', NULL, NULL),
(12, 'Nguyễn Văn Tèo', '113 Ngô Gia Tự', '0896480166', 'teo@gmail.com', 'abc', NULL, NULL),
(13, 'Nguyễn Thị Hồng', '113 Phạm Cự Lượng', '0896480166', 'hong@gmail.com', 'abc', NULL, NULL),
(14, 'Ngô Thành Quang', '113 Ngô Gia Tự', '113', 'quang@gmail.com', 'abc', NULL, NULL),
(15, 'Nguyễn Văn Tèo', '113 Phạm Cự Lượng', '0896480166', 'teo@gmail.com', 'abc', NULL, NULL),
(16, 'Nguyễn Văn Tèo', '113 Ngô Gia Tự', '113', 'teo@gmail.com', 'abc123', NULL, NULL),
(17, 'Nguyễn Văn Tèo', '113 Ngô Gia Tự', '113', 'teo@gmail.com', 'abc', NULL, NULL),
(18, 'Nguyễn Văn Tèo', '113 Ngô Gia Tự', '113', 'quang@gmail.com', 'abc', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_infomation`
--
ALTER TABLE `tbl_infomation`
  ADD PRIMARY KEY (`info_id`);

--
-- Chỉ mục cho bảng `tbl_information`
--
ALTER TABLE `tbl_information`
  ADD PRIMARY KEY (`info_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`,`shipping_id`,`payment_id`),
  ADD KEY `shipping_id` (`shipping_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_id_2` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_image` (`product_image`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_infomation`
--
ALTER TABLE `tbl_infomation`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_information`
--
ALTER TABLE `tbl_information`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`);

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`),
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `tbl_shipping` (`shipping_id`),
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payment` (`payment_id`);

--
-- Các ràng buộc cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_image`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
