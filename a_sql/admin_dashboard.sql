-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 03:37 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_01_05_095026_create_tbl_admin_table', 1),
(4, '2021_01_06_025755_create_tbl_category_products', 2),
(5, '2021_01_06_101456_create_tbl_brand_table', 3),
(6, '2021_01_07_015553_create_tbl_brand_table', 4),
(7, '2021_01_07_023451_create_tbl_products_table', 5),
(8, '2021_01_07_090108_create_tbl_demo', 6),
(9, '2021_01_07_090447_tbl_category_product', 7),
(10, '2021_01_07_090555_tbl_brand_product', 8),
(11, '2021_01_07_090644_tbl_product', 9),
(12, '2021_01_09_015924_create_tbl_customer_table', 10),
(13, '2021_01_09_032849_create_tbl_cuctomer_table', 11),
(14, '2021_01_09_033321_create_tbl_cuctomer_table', 12),
(15, '2021_01_09_040643_create_tbl_shipping_table', 13),
(16, '2021_01_09_092932_create_tbl_payment_table', 14),
(17, '2021_01_09_093035_create_tbl_orderplace_table', 14),
(18, '2021_01_09_094654_create_tbl_order_detail_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0392826477', NULL, NULL),
(4, 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'admin1', '0392826477', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand_product`
--

CREATE TABLE `tbl_brand_product` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_introduce` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand_product`
--

INSERT INTO `tbl_brand_product` (`brand_id`, `brand_name`, `brand_introduce`, `brand_status`, `created_at`, `updated_at`) VALUES
(4, 'Adidas', 'Adidas', 1, NULL, NULL),
(5, 'Portland', 'Portland', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(4, 'Mũ lưỡi chai', 'Mũ lưỡi trai', 1, NULL, NULL),
(5, 'Mũ tròn rộng', 'Mũ tròn rộng', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuctomer`
--

CREATE TABLE `tbl_cuctomer` (
  `cuctomer_id` int(10) UNSIGNED NOT NULL,
  `cuctomer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuctomer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuctomer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuctomer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cuctomer`
--

INSERT INTO `tbl_cuctomer` (`cuctomer_id`, `cuctomer_name`, `cuctomer_email`, `cuctomer_password`, `cuctomer_phone`, `created_at`, `updated_at`) VALUES
(7, 'Koon', 'admin2@gmail.com', 'c84258e9c39059a89ab77d846ddab909', '0919744449', NULL, NULL),
(6, 'Hữu Thế', 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', '0392826477', NULL, NULL),
(8, 'Bam', 'admin3@gmail.com', '32cacb2f994f6b42183a1300d9a3e8d6', '0879413607', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_detail_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Mũ len 13', '55', 1, NULL, NULL),
(2, 2, 2, 'Mũ len 13', '55', 1, NULL, NULL),
(3, 3, 2, 'Mũ len 13', '55', 1, NULL, NULL),
(4, 4, 2, 'Mũ len 13', '55', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderplace`
--

CREATE TABLE `tbl_orderplace` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `cuctomer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` double(8,2) NOT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_orderplace`
--

INSERT INTO `tbl_orderplace` (`order_id`, `cuctomer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 7, 9, 3, 66.55, 'Đang chờ xử lý', NULL, NULL),
(2, 7, 10, 4, 66.55, 'Đang chờ xử lý', NULL, NULL),
(3, 7, 10, 5, 66.55, 'Đang chờ xử lý', NULL, NULL),
(4, 7, 11, 6, 133.10, 'Đang chờ xử lý', NULL, NULL),
(5, 7, 11, 7, 0.00, 'Đang chờ xử lý', NULL, NULL),
(6, 7, 11, 8, 0.00, 'Đang chờ xử lý', NULL, NULL),
(7, 7, 11, 9, 0.00, 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Đang chờ xử lý', NULL, NULL),
(2, '1', 'Đang chờ xử lý', NULL, NULL),
(3, '1', 'Đang chờ xử lý', NULL, NULL),
(4, '2', 'Đang chờ xử lý', NULL, NULL),
(5, '2', 'Đang chờ xử lý', NULL, NULL),
(6, '2', 'Đang chờ xử lý', NULL, NULL),
(7, '2', 'Đang chờ xử lý', NULL, NULL),
(8, '1', 'Đang chờ xử lý', NULL, NULL),
(9, '1', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Mũ 1222', 'Mũ 12', 'Mũ 12', '22', 'anmi11.jpg', 1, NULL, NULL),
(2, 2, 1, 'Mũ len 13', 'Mũ len 13', 'Mũ len 13', '55', 'an-toan56.png', 1, NULL, NULL),
(4, 4, 4, 'Mũ lưỡi trai nữ Black', 'Mũ lưỡi trai nữ Black', 'Mũ lưỡi trai nữ Black', '130000', 'mu-luoi-trai-nu-black9.jpg', 1, NULL, NULL),
(5, 4, 5, 'Mũ lưỡi trai olliste', 'Mũ lưỡi trai olliste thanh lịch', 'Mũ lưỡi trai olliste thanh lịch', '150000', 'non_luoi_trai_olliste_thanh_lich_1e5674.jpg', 1, NULL, NULL),
(6, 4, 5, 'Mũ portland trắng', 'Mũ portland trắng', 'Mũ portland trắng', '130000', 'nam-nu-portland40.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping_table`
--

CREATE TABLE `tbl_shipping_table` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_andress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping_table`
--

INSERT INTO `tbl_shipping_table` (`shipping_id`, `shipping_name`, `shipping_email`, `shipping_andress`, `shipping_phone`, `shipping_message`, `created_at`, `updated_at`) VALUES
(1, 'Huu The', 'huuthe12c2@gmail.com', 'thu duc', '0925689522', 'giao hang nhanh', NULL, NULL),
(7, 'Huu The', 'huuthe12c2@gmail.com', 'thu duc', '0925689522', 'mua', NULL, NULL),
(5, 'Huu The', 'huuthe12c2@gmail.com', 'thu duc', '0925689522', 'demo', NULL, NULL),
(6, 'Huu The', 'huuthe12c2@gmail.com', 'thu duc', '0925689522', 'demo', NULL, NULL),
(8, 'Huu The', 'huuthe12c2@gmail.com', 'thu duc', '0925689522', 'ss', NULL, NULL),
(9, 'Huu The', 'huuthe12c2@gmail.com', 'thu duc', '0925689522', 'uuu', NULL, NULL),
(10, 'Huu The', 'thang.lzdvn@gmail.com', 'thu duc', '0879413607', 'ii', NULL, NULL),
(11, 'Huu The', 'huuthe12c2@gmail.com', 'thu duc', '0925689522', 'ss', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_cuctomer`
--
ALTER TABLE `tbl_cuctomer`
  ADD PRIMARY KEY (`cuctomer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `tbl_orderplace`
--
ALTER TABLE `tbl_orderplace`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping_table`
--
ALTER TABLE `tbl_shipping_table`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_cuctomer`
--
ALTER TABLE `tbl_cuctomer`
  MODIFY `cuctomer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_orderplace`
--
ALTER TABLE `tbl_orderplace`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_shipping_table`
--
ALTER TABLE `tbl_shipping_table`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
