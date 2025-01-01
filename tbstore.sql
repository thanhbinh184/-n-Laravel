-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2024 lúc 03:13 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tbstore`
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_23_120000_create_shoppingcart_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_12_04_154545_create_tbl_admin_table', 1),
(7, '2024_12_04_195716_create_tbl_category_product', 1),
(8, '2024_12_13_150308_create_tbl_brand_product', 1),
(9, '2024_12_14_053942_create_tbl_product', 1),
(10, '2024_12_25_155125_tbl_customers', 1),
(11, '2024_12_28_174815_create_tbl_shipping', 1),
(12, '2024_12_28_184618_create_tbl_orders', 1),
(13, '2024_12_28_184918_create_tbl_order_details', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '12345', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand_product`
--

CREATE TABLE `tbl_brand_product` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand_product`
--

INSERT INTO `tbl_brand_product` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'SAMSUNG', 'samsung', 1, NULL, NULL),
(2, 'APPLE', 'Apple', 1, NULL, NULL),
(4, 'ACER', 'acer', 1, NULL, NULL),
(5, 'Xiaomi', 'Xiaomi', 1, NULL, NULL),
(6, 'Oppo', 'Oppo', 1, NULL, NULL),
(7, 'Dell', 'Dell', 1, NULL, NULL),
(8, 'MSI', 'msi', 1, NULL, NULL),
(9, 'ASUS', 'asus', 1, NULL, NULL),
(10, 'URGREEN', 'URGREEN', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'laptop', 1, NULL, NULL),
(2, 'Điện Thoại', 'Điện Thoại', 1, NULL, NULL),
(3, 'Phụ  Kiện', 'Phụ Kiện', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customers_id` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `tbl_customers` (`customers_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(2, 'thanh binh', 'thanhbinh@gmail.com', '12345', '12345', NULL, NULL),
(3, 'thu', 'thu@gmail.com', '$2y$10$TQZ9ratw/UQhy3R92xBXbuGlXyEuJFvayIuKQ6kVF/Y7nSL6jHxkG', '0987654321', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `orders_id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `orders_status` varchar(255) NOT NULL DEFAULT 'pending',
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `order_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_orders`
--

INSERT INTO `tbl_orders` (`orders_id`, `customers_id`, `shipping_id`, `orders_status`, `total_price`, `order_date`, `created_at`, `updated_at`) VALUES
(4, 3, 5, 'pending', 24990000.00, '2024-12-29', '2024-12-29 07:00:30', '2024-12-29 07:00:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_detail_id` int(10) UNSIGNED NOT NULL,
  `orders_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_detail_id`, `orders_id`, `product_id`, `product_name`, `product_price`, `created_at`, `updated_at`) VALUES
(4, 4, 77, 'Màn hình cong MSI MPG 491CQP QD-OLED 49\" QD-OLED 2K 144Hz', 24990000.00, '2024-12-29 07:00:30', '2024-12-29 07:00:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(15, 2, 2, 'iPhone 16 Pro Max 256GB', 'iPhone 16 Pro Max 256GB', 'iPhone 16 Pro Max 256GB', 34390000.00, 'iphone134.jpg', 1, NULL, NULL),
(16, 2, 1, 'Samsung Galaxy A06 4GB 128GB', 'Samsung Galaxy A06 4GB 128GB', 'Samsung Galaxy A06 4GB 128GB', 3490000.00, 'samsung119.jpg', 1, NULL, NULL),
(17, 2, 5, 'Xiaomi Poco M6 Pro 8GB 256GB', 'Xiaomi Poco M6 Pro 8GB 256GB', 'Xiaomi Poco M6 Pro 8GB 256GB', 5690000.00, 'xiaomi132.jpg', 1, NULL, NULL),
(18, 2, 5, 'Xiaomi Redmi Note 13 6GB 128GB', 'Xiaomi Redmi Note 13 6GB 128GB', 'Xiaomi Redmi Note 13 6GB 128GB', 4390000.00, 'xiaomi220.jpg', 1, NULL, NULL),
(19, 2, 5, 'Xiaomi Poco M6 6GB 128GB', 'Xiaomi Poco M6 6GB 128GB', 'Xiaomi Poco M6 6GB 128GB', 3890000.00, 'xiaomi379.jpg', 1, NULL, NULL),
(20, 2, 2, 'iPhone 16 Plus 128GB', 'iPhone 16 Plus 128GB', 'iPhone 16 Plus 128GB', 25590000.00, 'iphone34.jpg', 1, NULL, NULL),
(21, 2, 2, 'iPhone 16 128GB', 'iPhone 16 128GB', 'iPhone 16 128GB', 22190000.00, 'iphone297.jpg', 1, NULL, NULL),
(22, 2, 6, 'OPPO Reno12 F 8GB/256GB', 'OPPO Reno12 F 8GB/256GB', 'OPPO Reno12 F 8GB/256GB', 8490000.00, 'oppo137.jpg', 1, NULL, NULL),
(23, 2, 2, 'Điện thoại iPhone 14 128GB', 'Điện thoại iPhone 14 128GB', 'Điện thoại iPhone 14 128GB', 17290000.00, 'iphone410.jpg', 1, NULL, NULL),
(24, 2, 2, 'Điện thoại iPhone 15 128GB', 'Điện thoại iPhone 15 128GB', 'Điện thoại iPhone 15 128GB', 19690000.00, 'iphone550.jpg', 1, NULL, NULL),
(25, 2, 2, 'Điện thoại iPhone 13 128GB', 'Điện thoại iPhone 13 128GB', 'Điện thoại iPhone 13 128GB', 13690000.00, 'iphone644.jpg', 1, NULL, NULL),
(26, 2, 1, 'Điện thoại Samsung Galaxy S24 Ultra 5G 12GB/256GB', 'Điện thoại Samsung Galaxy S24 Ultra 5G 12GB/256GB', 'Điện thoại Samsung Galaxy S24 Ultra 5G 12GB/256GB', 25490000.00, 'samsung472.jpg', 1, NULL, NULL),
(27, 2, 1, 'Samsung Galaxy M55 5G 256GB', 'Samsung Galaxy M55 5G 256GB', 'Samsung Galaxy M55 5G 256GB', 9390000.00, 'samsung219.jpg', 1, NULL, NULL),
(28, 2, 1, 'Samsung Galaxy Z Flip5 5G 256GB', 'Samsung Galaxy Z Flip5 5G 256GB', 'Samsung Galaxy Z Flip5 5G 256GB', 15990000.00, 'samsung337.jpg', 1, NULL, NULL),
(29, 2, 1, 'Samsung Galaxy A35 5G 8GB/256GB', 'Samsung Galaxy A35 5G 8GB/256GB', 'Samsung Galaxy A35 5G 8GB/256GB', 8790000.00, 'samsung596.jpg', 1, NULL, NULL),
(30, 2, 1, 'Samsung Galaxy A06 4GB/64GB', 'Samsung Galaxy A06 4GB/64GB', 'Samsung Galaxy A06 4GB/64GB', 3190000.00, 'samsung643.jpg', 1, NULL, NULL),
(31, 2, 6, 'OPPO Reno12 5G 12GB/256GB', 'OPPO Reno12 5G 12GB/256GB', 'OPPO Reno12 5G 12GB/256GB', 12290000.00, 'oppo288.jpg', 1, NULL, NULL),
(32, 2, 6, 'OPPO A3x 4GB/64GB', 'OPPO A3x 4GB/64GB', 'OPPO A3x 4GB/64GB', 3490000.00, 'oppo315.jpg', 1, NULL, NULL),
(33, 2, 6, 'OPPO Find X8 5G 16GB/512GB', 'OPPO Find X8 5G 16GB/512GB', 'OPPO Find X8 5G 16GB/512GB', 22990000.00, 'oppo486.jpg', 1, NULL, NULL),
(34, 2, 6, 'Điện thoại OPPO A18 4GB/64GB', 'Điện thoại OPPO A18 4GB/64GB', 'Điện thoại OPPO A18 4GB/64GB', 3290000.00, 'oppo525.jpg', 1, NULL, NULL),
(35, 2, 6, 'OPPO Find N3 Flip 5G 12GB/256GB', 'OPPO Find N3 Flip 5G 12GB/256GB', 'OPPO Find N3 Flip 5G 12GB/256GB', 17490000.00, 'oppo63.jpeg', 1, NULL, NULL),
(36, 2, 5, 'Xiaomi Redmi Note 13 Pro 8GB/128GB', 'Xiaomi Redmi Note 13 Pro 8GB/128GB', 'Xiaomi Redmi Note 13 Pro 8GB/128GB', 5790000.00, 'xiaomi441.jpg', 1, NULL, NULL),
(37, 2, 5, 'Xiaomi 14T Pro 5G 12GB/256GB', 'Xiaomi 14T Pro 5G 12GB/256GB', 'Xiaomi 14T Pro 5G 12GB/256GB', 16990000.00, 'xiaomi542.jpg', 1, NULL, NULL),
(38, 2, 5, 'Xiaomi Redmi 14C 6GB/128GB', 'Xiaomi Redmi 14C 6GB/128GB', 'Xiaomi Redmi 14C 6GB/128GB', 3390000.00, 'xiaomi64.jpg', 1, NULL, NULL),
(39, 1, 9, 'Laptop gaming ASUS TUF Gaming F15 FX507ZC4 HN095W', 'Laptop gaming ASUS TUF Gaming F15 FX507ZC4 HN095W', 'Laptop gaming ASUS TUF Gaming F15 FX507ZC4 HN095W', 20490000.00, 'asus41.jpg', 1, NULL, NULL),
(40, 1, 9, 'Laptop gaming ASUS TUF Gaming F15 FX507VU LP315W', 'Laptop gaming ASUS TUF Gaming F15 FX507VU LP315W', 'Laptop gaming ASUS TUF Gaming F15 FX507VU LP315W', 26990000.00, 'asus532.jpg', 1, NULL, NULL),
(41, 1, 9, 'Laptop gaming ASUS TUF Gaming A15 FA506NFR HN075W', 'Laptop gaming ASUS TUF Gaming A15 FA506NFR HN075W', 'Laptop gaming ASUS TUF Gaming A15 FA506NFR HN075W', 18490000.00, 'asus139.jpg', 1, NULL, NULL),
(42, 1, 9, 'Laptop gaming ASUS TUF Gaming A15 FA507NVR LP091W', 'Laptop gaming ASUS TUF Gaming A15 FA507NVR LP091W', 'Laptop gaming ASUS TUF Gaming A15 FA507NVR LP091W', 26900000.00, 'asus640.jpg', 1, NULL, NULL),
(43, 1, 9, 'Laptop gaming ASUS ROG Strix G15 G513IE HN246W', 'Laptop gaming ASUS ROG Strix G15 G513IE HN246W', 'Laptop gaming ASUS ROG Strix G15 G513IE HN246W', 19990000.00, 'asus797.jpg', 1, NULL, NULL),
(44, 1, 9, 'Laptop ASUS Vivobook 14 OLED A1405ZA KM264W', 'Laptop ASUS Vivobook 14 OLED A1405ZA KM264W', 'Laptop ASUS Vivobook 14 OLED A1405ZA KM264W', 15790000.00, 'vanphong140.jpg', 1, NULL, NULL),
(45, 1, 9, 'Laptop ASUS Vivobook 15 OLED A1505VA MA468W', 'Laptop ASUS Vivobook 15 OLED A1505VA MA468W', 'Laptop ASUS Vivobook 15 OLED A1505VA MA468W', 17990000.00, 'vanphong227.jpg', 1, NULL, NULL),
(46, 1, 9, 'Laptop ASUS Vivobook S 14 OLED S5406MA PP136W', 'Laptop ASUS Vivobook S 14 OLED S5406MA PP136W', 'Laptop ASUS Vivobook S 14 OLED S5406MA PP136W', 24290000.00, 'vanphong493.jpg', 1, NULL, NULL),
(47, 1, 9, 'Laptop ASUS Vivobook S 16 OLED S5606MA MX051W', 'Laptop ASUS Vivobook S 16 OLED S5606MA MX051W', 'Laptop ASUS Vivobook S 16 OLED S5606MA MX051W', 26490000.00, 'vanphong690.jpg', 1, NULL, NULL),
(48, 1, 9, 'Laptop gaming ASUS TUF Gaming A15 FA506NC HN011W', 'Laptop gaming ASUS TUF Gaming A15 FA506NC HN011W', 'Laptop gaming ASUS TUF Gaming A15 FA506NC HN011W', 16990000.00, 'asus149.jpg', 1, NULL, NULL),
(49, 1, 9, 'Laptop gaming ASUS Vivobook 16X K3605ZF RP634W', 'Laptop gaming ASUS Vivobook 16X K3605ZF RP634W', 'Laptop gaming ASUS Vivobook 16X K3605ZF RP634W', 17290000.00, 'asus215.jpg', 1, NULL, NULL),
(50, 1, 9, 'Laptop gaming ASUS TUF Gaming A15 FA506NFR HN075W', 'Laptop gaming ASUS TUF Gaming A15 FA506NFR HN075W', 'Laptop gaming ASUS TUF Gaming A15 FA506NFR HN075W', 18790000.00, 'asus397.jpg', 1, NULL, NULL),
(51, 1, 8, 'Laptop gaming MSI Thin 15 B13UC 2044VN', 'Laptop gaming MSI Thin 15 B13UC 2044VN', 'Laptop gaming MSI Thin 15 B13UC 2044VN', 19990.00, 'msi416.jpg', 1, NULL, NULL),
(52, 1, 8, 'Laptop gaming MSI Cyborg 14 A13VE 090VN', 'Laptop gaming MSI Cyborg 14 A13VE 090VN', 'Laptop gaming MSI Cyborg 14 A13VE 090VN', 25990000.00, 'msi31.jpg', 1, NULL, NULL),
(53, 1, 8, 'Laptop gaming MSI Katana A15 AI B8VF 419VN', 'Laptop gaming MSI Katana A15 AI B8VF 419VN', 'Laptop gaming MSI Katana A15 AI B8VF 419VN', 27990000.00, 'msi191.jpg', 1, NULL, NULL),
(54, 1, 8, 'Laptop gaming MSI Thin A15 B7VE 023VN', 'Laptop gaming MSI Thin A15 B7VE 023VN', 'Laptop gaming MSI Thin A15 B7VE 023VN', 20990000.00, 'msi258.jpg', 1, NULL, NULL),
(55, 1, 7, 'Laptop gaming Dell G15 5530 i7H161W11GR4060', 'Laptop gaming Dell G15 5530 i7H161W11GR4060', 'Laptop gaming Dell G15 5530 i7H161W11GR4060', 37990000.00, 'dell469.jpg', 1, NULL, NULL),
(56, 1, 7, 'Laptop Dell G15 5530', 'Laptop Dell G15 5530', 'Laptop Dell G15 5530', 36990000.00, 'dell326.jpg', 1, NULL, NULL),
(57, 1, 7, 'Laptop Dell Inspiron 14 5440 i5U085W11IBU', 'Laptop Dell Inspiron 14 5440 i5U085W11IB', 'Laptop Dell Inspiron 14 5440 i5U085W11IB', 18890000.00, 'dell181.jpg', 1, NULL, NULL),
(58, 1, 7, 'Laptop Dell Inspiron 5640 N6I5419W1-IceBlue', 'Laptop Dell Inspiron 5640 N6I5419W1-IceBlue', 'Laptop Dell Inspiron 5640 N6I5419W1-IceBlue', 22990000.00, 'dell228.jpg', 1, NULL, NULL),
(59, 1, 7, 'Laptop Dell Inspiron 14 N5430 i5P165W11SL2050', 'Laptop Dell Inspiron 14 N5430 i5P165W11SL2050', 'Laptop Dell Inspiron 14 N5430 i5P165W11SL2050', 25490000.00, 'dell566.png', 1, NULL, NULL),
(60, 1, 7, 'Laptop Dell Inspiron 16 N5630 i7P165W11SLU', 'Laptop Dell Inspiron 16 N5630 i7P165W11SLU', 'Laptop Dell Inspiron 16 N5630 i7P165W11SLU', 27990000.00, 'dell686.jpg', 1, NULL, NULL),
(61, 1, 4, 'Laptop gaming Acer Nitro 16 Phoenix AN16 41 R76E', 'Laptop gaming Acer Nitro 16 Phoenix AN16 41 R76E', 'Laptop gaming Acer Nitro 16 Phoenix AN16 41 R76E', 29490000.00, 'acer491.jpg', 1, NULL, NULL),
(62, 1, 4, 'Laptop gaming Acer Nitro 5 AN515 46 R6QR', 'Laptop gaming Acer Nitro 5 AN515 46 R6QR', 'Laptop gaming Acer Nitro 5 AN515 46 R6QR', 21990000.00, 'acer559.jpg', 1, NULL, NULL),
(63, 1, 4, 'Laptop gaming Acer Nitro V ANV15 51 500A', 'Laptop gaming Acer Nitro V ANV15 51 500A', 'Laptop gaming Acer Nitro V ANV15 51 500A', 22490000.00, 'acer162.webp', 1, NULL, NULL),
(64, 1, 4, 'Laptop gaming Acer Aspire 5 A515 58GM 53PZ', 'Laptop gaming Acer Aspire 5 A515 58GM 53PZ', 'Laptop gaming Acer Aspire 5 A515 58GM 53PZ', 15490000.00, 'acer267.jpg', 1, NULL, NULL),
(65, 1, 4, 'Laptop gaming Acer Nitro V ANV16 41 R36Y', 'Laptop gaming Acer Nitro V ANV16 41 R36Y', 'Laptop gaming Acer Nitro V ANV16 41 R36Y', 28790000.00, 'acer315.jpg', 1, NULL, NULL),
(66, 3, 10, 'Củ sạc Ugreen RoboGaN Mini CD359 15550 USB-C 30W', 'Củ sạc Ugreen RoboGaN Mini CD359 15550 USB-C 30W (Black)', 'Củ sạc Ugreen RoboGaN Mini CD359 15550 USB-C 30W (Black)', 300000.00, 'charger157.jpg', 1, NULL, NULL),
(67, 3, 10, 'Sạc nhanh Ugreen Robot CD361 15570 3 cổng USB-C và USB-A GaN 65W', 'Sạc nhanh Ugreen Robot CD361 15570 3 cổng USB-C và USB-A GaN 65W (SpaceGray)', 'Sạc nhanh Ugreen Robot CD361 15570 3 cổng USB-C và USB-A GaN 65W (SpaceGray)', 630000.00, 'charger267.jpg', 1, NULL, NULL),
(68, 3, 10, 'Bộ sạc nhanh GaN Nexode 200W Ugreen CD271 40913', 'Bộ sạc nhanh GaN Nexode 200W Ugreen CD271 40913', 'Bộ sạc nhanh GaN Nexode 200W Ugreen CD271 40913', 1990000.00, 'charger381.jpg', 1, NULL, NULL),
(69, 3, 9, 'Tai Nghe Asus ROG Delta S Core', 'Tai Nghe Asus ROG Delta S Core', 'Tai Nghe Asus ROG Delta S Core', 1999000.00, 'asus-earphone149.jpg', 0, NULL, NULL),
(70, 3, 9, 'Tai nghe Asus ROG Cetra II Core', 'Tai nghe Asus ROG Cetra II Core', 'Tai nghe Asus ROG Cetra II Core', 880000.00, 'asus-earphone211.jpg', 1, NULL, NULL),
(71, 3, 9, 'Tai nghe Asus ROG Cetra True Wireless', 'Tai nghe Asus ROG Cetra True Wireless', 'Tai nghe Asus ROG Cetra True Wireless', 1690000.00, 'asus-earphone317.jpg', 1, NULL, NULL),
(72, 3, 9, 'Bàn phím cơ Asus ROG Azoth NX Snow', 'Bàn phím cơ Asus ROG Azoth NX Snow', 'Bàn phím cơ Asus ROG Azoth NX Snow', 5990000.00, 'asus-keyboard124.jpg', 1, NULL, NULL),
(73, 3, 9, 'Bàn phím cơ Asus ROG Falchion RX Low Profile Blue Switch', 'Bàn phím cơ Asus ROG Falchion RX Low Profile Blue Switch', 'Bàn phím cơ Asus ROG Falchion RX Low Profile Blue Switch', 3890000.00, 'asus-keyboard20.jpg', 1, NULL, NULL),
(74, 3, 9, 'Bàn phím Asus ROG Strix Scope TKL Red Switch', 'Bàn phím Asus ROG Strix Scope TKL Red Switch', 'Bàn phím Asus ROG Strix Scope TKL Red Switch', 3190000.00, 'asus-keyboard366.jpg', 1, NULL, NULL),
(75, 3, 9, 'Màn hình ASUS ProArt PA24US 24\" IPS 4K USBC chuyên đồ họa', 'Màn hình ASUS ProArt PA24US 24\" IPS 4K USBC chuyên đồ họa', 'Màn hình ASUS ProArt PA24US 24\" IPS 4K USBC chuyên đồ họa', 39490000.00, 'asus-sceen138.jpg', 1, NULL, NULL),
(76, 3, 9, 'Màn hình Asus ROG Swift PG32UCDP 32\" WOLED 4K 240Hz HDR10 Gsync', 'Màn hình Asus ROG Swift PG32UCDP 32\" WOLED 4K 240Hz HDR10 Gsync chuyên game', 'Màn hình Asus ROG Swift PG32UCDP 32\" WOLED 4K 240Hz HDR10 Gsync chuyên game', 40490000.00, 'asus-sceen228.jpg', 1, NULL, NULL),
(77, 3, 9, 'Màn hình cong MSI MPG 491CQP QD-OLED 49\" QD-OLED 2K 144Hz', 'Màn hình cong MSI MPG 491CQP QD-OLED 49\" QD-OLED 2K 144Hz chuyên game', 'Màn hình cong MSI MPG 491CQP QD-OLED 49\" QD-OLED 2K 144Hz chuyên game', 24990000.00, 'asus-sceen342.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `created_at`, `updated_at`) VALUES
(1, 'abc', '123', '123456', 'asd@gmail.com', NULL, NULL),
(2, 'thu', '123/2/An phú đông', '0987654321', 'thu@gmail.com', NULL, NULL),
(3, 'thu', '123/2/An phú đông', '0987654321', 'thu@gmail.com', NULL, NULL),
(4, 'thu', '123/2/An phú đông', '0987654321', 'thu@gmail.com', NULL, NULL),
(5, 'thu', '123/2/An phú đông', '0987654321', 'thu@gmail.com', NULL, NULL);

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
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Chỉ mục cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `tbl_orders_customers_id_foreign` (`customers_id`),
  ADD KEY `tbl_orders_shipping_id_foreign` (`shipping_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `tbl_order_details_orders_id_foreign` (`orders_id`),
  ADD KEY `tbl_order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

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
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customers_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `orders_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `tbl_customers` (`customers_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `tbl_shipping` (`shipping_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `tbl_orders` (`orders_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
