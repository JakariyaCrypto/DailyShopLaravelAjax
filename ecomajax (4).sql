-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 03:00 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'jakariya@gmail.com', 'jakariya', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `save_up` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_home` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `save_up`, `short_desc`, `image`, `link`, `button`, `is_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Exclusive Shoes', 'Save Up to 75% Off', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.', 'Banner/1625558167id0.png', 'http://127.0.0.1:8000/admin/banner/manage/banner', 'Shop Now', 1, 'Active', '2021-07-06 01:56:07', '2021-07-06 02:15:53'),
(2, 'Best Collection', 'Save Up to 50% Off', 'Save Up to 50% Off', 'Banner/1625559813id2.jpg', 'http://127.0.0.1:8000/admin/banner/manage/banner', 'Shop Now', 1, 'Active', '2021-07-06 02:03:41', '2021-07-06 02:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `is_home` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`, `image`, `status`, `is_home`, `created_at`, `updated_at`) VALUES
(1, 'Xiomi', 'Brand/1625196741id1.jpg', 'Active', 1, '2021-06-21 12:06:25', '2021-07-04 13:13:03'),
(2, 'Samsung', 'Brand/1625196711id2.jpg', 'Active', 1, '2021-06-21 12:15:24', '2021-07-05 11:38:27'),
(3, 'Huawei', 'Brand/1625196771id3.jpg', 'Active', 1, '2021-06-26 05:49:48', '2021-07-05 11:38:03'),
(4, 'Oppo', 'Brand/1625196807id4.jpg', 'Active', 1, '2021-06-26 05:51:09', '2021-07-05 11:37:49'),
(5, 'Vivo', 'Brand/1625196822id5.jpg', 'Active', 1, '2021-06-26 05:51:50', '2021-07-05 11:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` enum('reg','not-reg') COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `added_on` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `user_type`, `product_attr_id`, `qty`, `added_on`, `created_at`, `updated_at`) VALUES
(124, 8, 143354014, 'not-reg', 15, 1, '2021-07-28', NULL, NULL),
(125, 9, 143354014, 'not-reg', 16, 1, '2021-07-28', NULL, NULL),
(133, 8, 327403563, 'not-reg', 15, 1, '2021-07-30', NULL, NULL),
(136, 9, 866703220, 'not-reg', 16, 3, '2021-10-12', NULL, NULL),
(137, 9, 923835140, 'not-reg', 16, 1, '2021-10-14', NULL, NULL),
(138, 9, 923835140, 'not-reg', 24, 1, '2021-10-14', NULL, NULL),
(140, 10, 483354845, 'not-reg', 20, 3, '2021-10-21', NULL, NULL),
(141, 9, 483354845, 'not-reg', 16, 3, '2021-10-21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_category_id` bigint(255) DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_home` int(11) NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `parent_category_id`, `category_slug`, `is_home`, `category_image`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Man', 10, 'man_slug', 1, 'CategoryImg/1625424224id0.jpg', 'Active', '2021-07-04 12:43:44', '2021-10-26 11:17:16'),
(9, 'Kids', NULL, 'kids_slug', 1, 'CategoryImg/1635482070id9.jpg', 'Active', '2021-07-04 12:46:03', '2021-10-28 22:34:30'),
(10, 'Shoes', NULL, 'shoes_slug', 1, 'CategoryImg/1625424800id0.jpg', 'Active', '2021-07-04 12:53:20', '2021-07-04 12:53:20'),
(11, 'Womans', NULL, 'bag_slug', 1, 'CategoryImg/1635482155id11.jpg', 'Active', '2021-07-04 12:54:54', '2021-10-28 22:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Red', 'Active', '2021-06-22 10:53:22', '2021-06-22 10:53:22'),
(2, 'black', 'Active', '2021-06-22 10:53:41', '2021-06-22 10:53:41'),
(3, 'White', 'Active', '2021-06-22 10:53:58', '2021-06-22 10:53:58'),
(4, 'green', 'Active', '2021-07-08 05:19:32', '2021-07-08 05:19:32'),
(5, 'yellow', 'Active', '2021-07-08 05:19:38', '2021-07-08 05:19:38'),
(6, 'Gray', 'Active', '2021-07-08 05:19:44', '2021-10-28 09:56:33'),
(7, 'Blue', 'Active', '2021-10-28 09:59:49', '2021-10-28 09:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `cupons`
--

CREATE TABLE `cupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('value','per') COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_order_amt` int(11) NOT NULL,
  `is_one_time` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cupons`
--

INSERT INTO `cupons` (`id`, `title`, `code`, `value`, `type`, `min_order_amt`, `is_one_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'new Cupon', 'newCupon11', '400', 'value', 500, 0, 'Active', '2021-06-30 10:21:11', '2021-06-30 10:21:11'),
(2, 'hotCoupon', 'hot_cupon', '10', 'per', 450, 0, 'Active', '2021-07-28 04:14:42', '2021-07-28 04:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rand_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_forgot_password` int(11) DEFAULT NULL,
  `is_verify` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('customer','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `password`, `adress`, `city`, `state`, `zip`, `company`, `gstin`, `rand_id`, `is_forgot_password`, `is_verify`, `image`, `status`, `created_at`, `updated_at`) VALUES
(11, 'jakariya', 'jk@gmail.com', '01771158098', 'eyJpdiI6IlJzQitaL1R3QmY2b3VPTUJjUkJlY2c9PSIsInZhbHVlIjoiUy9DNXpzVmtYcTUvcDIrUVlKcEZBdz09IiwibWFjIjoiYjEyNjczYmI2YmU3YWM4MDA3MzU5MzQzNjE4M2Q5N2UxYWJiOTJjODU3OWQyZjRkN2ExNTI4YThlNDU3OTdiNiJ9', NULL, NULL, NULL, NULL, NULL, NULL, '357490008', 1, 0, NULL, 'customer', '2021-07-22 21:00:59', '2021-07-22 21:00:59'),
(12, 'jakariya', 'jakariya@gmail.com', '01777777777', 'eyJpdiI6IktkN0VDNVZ3SmozVFRSSXBMSlY4L2c9PSIsInZhbHVlIjoib3UwdW5GU1ZqS1IzTmxCY3ZpUUVIZz09IiwibWFjIjoiYTlkZTI4NTgxZWMyZWJiYWM4OGY1OWJjNTBlNTA5YjQ2Nzk3ZGM1N2Y3MThhMTVlODhmNmMyZjYwZGMwOTdiMCJ9', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, NULL, 'customer', '2021-07-24 00:35:00', '2021-07-24 00:35:00'),
(16, 'akddos', 'akddosali935605@gmail.com', '01771158091', 'eyJpdiI6InBXMkp3YnJFc3pycW4zZlU0Tmx2blE9PSIsInZhbHVlIjoiaXdjamZoS29aWE8wT1JabVgwNTZEUT09IiwibWFjIjoiZTgwZDUxMmYxNTcyYzNhNzRhYWFlMDlmZjc4ZTkzYTVlMzAwYWNjZDZlMDM0NjhhODJlOGI4NWFkODM2ZmY5MyJ9', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 1, NULL, 'customer', '2021-07-26 05:48:53', '2021-07-26 05:48:53'),
(18, 'jakariya Ahmed', 'developerjk9356@gmail.com', '01741977121', 'eyJpdiI6IitwWGZTTkljQkhVMTZVSERpd3ZDcGc9PSIsInZhbHVlIjoic2ZNLzhyUllMVmxuRHZXc1V1QXVEUysyR0dqM1NQWWg0TjlYR291MFhCaz0iLCJtYWMiOiIwYTQwOGUxMWZhMzQwZjI4MjU1MzhjOTdhYjdlMTI0YzM4MTA5NWVhOTFlY2EwYWFiYmM2MTUzNjFmMGRlOGVlIn0=', NULL, NULL, NULL, NULL, NULL, NULL, '962098142', NULL, 0, NULL, 'customer', '2021-07-30 23:11:02', '2021-07-30 23:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2021_06_03_141220_create_admins_table', 1),
(3, '2021_06_05_074231_create_categories_table', 1),
(4, '2021_06_17_140404_create_cupons_table', 1),
(5, '2021_06_18_024127_create_sizes_table', 1),
(6, '2021_06_18_094900_create_colors_table', 1),
(9, '2021_06_19_163147_create_products_table', 2),
(10, '2021_06_21_172941_create_brands_table', 3),
(11, '2021_06_22_074133_product_attr-r', 4),
(12, '2021_06_22_081751_product_attr', 5),
(13, '2021_06_22_164403_product_attr', 6),
(14, '2021_06_22_165205_product_attr', 7),
(15, '2021_07_01_035403_create_taxes_table', 8),
(16, '2021_07_02_035905_create_customers_table', 9),
(17, '2021_07_06_070753_banner', 10),
(18, '2021_07_07_062920_product_images', 11),
(19, '2021_07_08_171617_carts', 12),
(20, '2021_07_29_095414_orders', 13),
(21, '2021_07_29_101200_order_details', 13),
(22, '2021_07_29_122336_orders', 14),
(23, '2021_07_29_164632_orders_status', 15),
(24, '2021_07_29_165311_orders_status', 16),
(25, '2021_10_30_043418_create_ratings_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `trx_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` enum('COD','Gateway') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'COD',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `trx_id`, `payment_id`, `name`, `email`, `mobile`, `address`, `city`, `zip`, `state`, `company`, `coupon_code`, `coupon_value`, `order_status`, `payment_type`, `payment_status`, `total_amount`, `country`, `created_at`, `updated_at`) VALUES
(32, 16, '', NULL, 'akddos', 'akddosali935605@gmail.com', '01771158091', 'fjffjfjf', 'fjfj', '888', 'fjffj', 'ffjfjr', 'hot_cupon', '819', '1', 'COD', 'Pending', '910', '3', NULL, NULL),
(33, 16, '', NULL, 'akddos', 'akddosali935605@gmail.com', '01771158091', 'fjfj', 'fjfj', '48484585', 'fjfjfjf888', 'fjfj', 'hot_cupon', '450', '1', 'Gateway', 'Pending', '500', '3', NULL, NULL),
(34, 16, NULL, NULL, 'akddos', 'akddosali935605@gmail.com', '01771158091', 'fkjfj', 'fjffj', '48484848', 'fjfj55', 'jffj', 'hot_cupon', '450', '1', 'Gateway', 'Pending', '500', 'Select Your Country', NULL, NULL),
(35, 16, NULL, NULL, 'akddos', 'akddosali935605@gmail.com', '01771158091', 'fkjfj', 'fjffj', '48484848', 'fjfj55', 'jffj', 'hot_cupon', '450', '1', 'Gateway', 'Pending', '500', 'Select Your Country', NULL, NULL),
(36, 16, NULL, NULL, 'akddos', 'akddosali935605@gmail.com', '01771158091', 'fkjfj', 'fjffj', '48484848', 'fjfj55', 'jffj', 'hot_cupon', '450', '1', 'Gateway', 'Pending', '500', 'Select Your Country', NULL, NULL),
(37, 16, NULL, NULL, 'akddos', 'akddosali935605@gmail.com', '01771158091', 'fjfj', 'fjfj', '84848448', 'fjffjfjfjf', 'fjffj', 'hot_cupon', '450', '1', 'Gateway', 'Pending', '500', '3', NULL, NULL),
(38, 16, NULL, NULL, 'akddos', 'akddosali935605@gmail.com', '01771158091', 'fufjfj', 'fjfjf', '449494949', 'fjffj', 'fjfjf', 'hot_cupon', '450', '1', 'Gateway', 'Pending', '500', '3', NULL, NULL),
(39, 16, NULL, NULL, 'akddos', 'akddosali935605@gmail.com', '01771158091', 'fufjfj', 'fjfjf', '449494949', 'fjffj', 'fjfjf', 'hot_cupon', '450', '1', 'Gateway', 'Pending', '500', '3', NULL, NULL),
(40, 16, NULL, NULL, 'akddos', 'akddosali935605@gmail.com', '01771158091', 'jfjffjfj', 'fjfj', '12365', 'fjfjfjf', 'fjfjfj', 'hot_cupon', '2610', '1', 'Gateway', 'Pending', '2900', '3', NULL, NULL),
(41, 16, NULL, NULL, 'akddos', 'akddosali935605@gmail.com', '01771158091', 'jfjffjfj', 'fjfj', '12365', 'fjfjfjf', 'fjfjfj', 'hot_cupon', '2610', '1', 'COD', 'Pending', '2900', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE `orders_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_status`
--

INSERT INTO `orders_status` (`id`, `order_status`) VALUES
(4, 'Placed'),
(5, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_attr_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_attr_id`, `price`, `qty`) VALUES
(38, 32, 15, 8, 350, 2),
(39, 32, 28, 10, 210, 1),
(40, 33, 20, 10, 250, 2),
(41, 34, 20, 10, 250, 2),
(42, 35, 20, 10, 250, 2),
(43, 36, 20, 10, 250, 2),
(44, 37, 20, 10, 250, 2),
(45, 38, 20, 10, 250, 2),
(46, 39, 20, 10, 250, 2),
(47, 40, 20, 10, 250, 2),
(48, 40, 16, 9, 150, 2),
(49, 40, 38, 12, 700, 1),
(50, 40, 51, 16, 200, 1),
(51, 40, 42, 13, 250, 1),
(52, 40, 34, 11, 450, 1),
(53, 40, 56, 18, 500, 1),
(54, 41, 20, 10, 250, 2),
(55, 41, 16, 9, 150, 2),
(56, 41, 38, 12, 700, 1),
(57, 41, 51, 16, 200, 1),
(58, 41, 42, 13, 250, 1),
(59, 41, 34, 11, 450, 1),
(60, 41, 56, 18, 500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical_specification` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `uses` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `is_promo` int(11) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `is_discounted` int(11) NOT NULL,
  `is_tranding` int(11) NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `model`, `short_desc`, `desc`, `technical_specification`, `keyword`, `warranty`, `uses`, `lead_time`, `tax`, `tax_id`, `is_promo`, `is_featured`, `is_discounted`, `is_tranding`, `status`, `image`, `created_at`, `updated_at`) VALUES
(8, 8, 'Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie', 'Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie_slug', '5', 'vision20++', '<p>short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.</p>', '<p>short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.</p>', '<p>yes</p>', 'vision20++', 'not', 'yes', '5days', '10%', 3, 0, 0, 0, 1, 'Active', '1634188170id8.jpg', '2021-06-26 07:43:36', '2021-10-13 23:09:30'),
(9, 8, 'H64a71e5877a847329d1b685b0d48db87h.png_100x100', 'H64a71e5877a847329d1b685b0d48db87h.png_100x100_slug', '3', 'samsungPro+', '<p>short description.short description.short description.short description.short description.short description.short description.short description.</p>', '<p>short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.short description.</p>', '<p>yew</p>', 'samsungPro++', '5 month', 'yes', '5-7days', '10%', 3, 0, 0, 0, 0, 'Active', '1634188879id9.png', '2021-06-26 07:47:36', '2021-10-13 23:21:19'),
(10, 8, 'Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2', 'Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2_slug', '1', 'no model', '<p>Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2</p>', '<p>Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts2</p>', '<p>no</p>', 'fff', '34', 'ddd', '9', '9', 3, 0, 0, 0, 0, 'Active', '1634190957id10.png', '2021-06-30 03:46:05', '2021-10-13 23:55:57'),
(11, 8, 'OEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodie', 'OEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodie_slug', '1', 'OEM Design -model', '<p>OEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodieOEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodieOEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodie</p>', '<p>OEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodieOEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodieOEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodieOEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodieOEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodieOEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodieOEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodieOEM Design Men\'s Hoodie 50% Cotton Wool Men\'s Hoodie Pants Set bamboo hoodie</p>', '<p>yes</p>', 'Pants', 'yes', 'no', '6days', '5%', 3, 0, 0, 0, 0, 'Active', '1635438261id0.jpg', '2021-10-28 10:24:21', '2021-10-28 10:24:21'),
(12, 8, 'Top Best Product Adult Age Durable Active Wear Men Leather Jacket', 'Top Best Product Adult Age Durable Active Wear Men Leather Jacket_slug', '3', 'Men Leather Jacket', '<p>Top Best Product Adult Age Durable Active Wear Men Leather JacketTop Best Product Adult Age Durable Active Wear Men Leather Jacket</p>', '<p>Top Best Product Adult Age Durable Active Wear Men Leather JacketTop Best Product Adult Age Durable Active Wear Men Leather JacketTop Best Product Adult Age Durable Active Wear Men Leather JacketTop Best Product Adult Age Durable Active Wear Men Leather JacketTop Best Product Adult Age Durable Active Wear Men Leather JacketTop Best Product Adult Age Durable Active Wear Men Leather Jacket</p>', '<p>no</p>', 'JacketTop', 'no', 'no', '1day', '7%', 3, 0, 0, 0, 0, 'Active', '1635438689id0.jpg', '2021-10-28 10:31:29', '2021-10-28 10:31:29'),
(13, 8, 'Stylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseball', 'Stylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseball_slug', '2', 'Stylish Tracksuit', '<p>Stylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseballStylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseballStylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseball</p>', '<p>Stylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseballStylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseballStylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseballStylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseballStylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseballStylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseballStylish Tracksuit Men\'s fashion sports leisure fleece suits cardigan baseball</p>', '<p>yes</p>', 'Stylish Tracksuit', 'no', 'yes', '4days', '5%', 3, 0, 0, 0, 0, 'Active', '1635438919id0.jpg', '2021-10-28 10:35:20', '2021-10-28 10:35:20'),
(14, 9, 'Baby & Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants', 'Baby & Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slug', '2', 'Baby & Little Boy', '<p>Baby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slugBaby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slugBaby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slug</p>', '<p>Baby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slugBaby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slugBaby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slugBaby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slugBaby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slugBaby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slugBaby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slugBaby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slugBaby &amp; Little Boy Tuxedo Outfit, Plaids Shirt + Suspender Pants_slug</p>', '<p>no</p>', 'Baby & Little Boy', 'yes', 'yes', '5hrs', '8%', 3, 0, 0, 0, 0, 'Active', '1635446359id0.jpg', '2021-10-28 12:39:22', '2021-10-28 12:39:22'),
(15, 8, 'Factory Apparel Online Shipping Apparel O Neck T Shirts, Cotton Men Clothes, Print T-Shirt4', 'Factory Apparel Online Shipping Apparel O Neck T Shirts, Cotton Men Clothes, Print T-Shirt4_slug', '3', 'Neck T Shirts,', '<p>Factory Apparel Online Shipping Apparel O Neck T Shirts, Cotton Men Clothes, Print T-Shirt4Factory Apparel Online Shipping Apparel O Neck T Shirts, Cotton Men Clothes, Print T-Shirt4Factory Apparel Online Shipping Apparel O Neck T Shirts, Cotton Men Clothes, Print T-Shirt4</p>', '<p>Factory Apparel Online Shipping Apparel O Neck T Shirts, Cotton Men Clothes, Print T-Shirt4Factory Apparel Online Shipping Apparel O Neck T Shirts, Cotton Men Clothes, Print T-Shirt4Factory Apparel Online Shipping Apparel O Neck T Shirts, Cotton Men Clothes, Print T-Shirt4Factory Apparel Online Shipping Apparel O Neck T Shirts, Cotton Men Clothes, Print T-Shirt4Factory Apparel Online Shipping Apparel O Neck T Shirts, Cotton Men Clothes, Print T-Shirt4Factory Apparel Online Shipping Apparel O Neck T Shirts, Cotton Men Clothes, Print T-Shirt4</p>', '<p>no</p>', 'Apparel O Neck T Shirts', 'no', 'no', '2days', '5%', 3, 0, 0, 0, 0, 'Active', '1635446760id0.jpg', '2021-10-28 12:46:00', '2021-10-28 12:46:00'),
(16, 8, 'Summer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s Hoodies', 'Summer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s Hoodies_slug', '4', 'Winter Hooded Street', '<p style=\"text-align: left;\">Summer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s HoodiesSummer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s HoodiesSummer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s Hoodies</p>', '<p>Summer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s HoodiesSummer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s HoodiesSummer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s HoodiesSummer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s HoodiesSummer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s HoodiesSummer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s HoodiesSummer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s HoodiesSummer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s HoodiesSummer 2021 Men Autumn Winter Hooded Street Long Sleeve loose Solid Color Hooded Casual Tops White Men\'s Hoodies</p>', '<p>no</p>', 'Winter Hooded Street', 'no', 'no', '8days', '5%', 3, 0, 0, 0, 0, 'Active', '1635447052id0.jpg', '2021-10-28 12:50:52', '2021-10-28 12:50:52'),
(17, 8, 'whole sale bomber airforce jacket windbreaker winter warm coat', 'whole sale bomber airforce jacket windbreaker winter warm coat_slug', '2', 'coatwhole', '<p>whole sale bomber airforce jacket windbreaker winter warm coatwhole sale bomber airforce jacket windbreaker winter warm coatwhole sale bomber airforce jacket windbreaker winter warm coatwhole sale bomber airforce jacket windbreaker winter warm coat</p>', '<p>whole sale bomber airforce jacket windbreaker winter warm coatwhole sale bomber airforce jacket windbreaker winter warm coatwhole sale bomber airforce jacket windbreaker winter warm coatwhole sale bomber airforce jacket windbreaker winter warm coatwhole sale bomber airforce jacket windbreaker winter warm coatwhole sale bomber airforce jacket windbreaker winter warm coatwhole sale bomber airforce jacket windbreaker winter warm coatwhole sale bomber airforce jacket windbreaker winter warm coat</p>', '<p>no</p>', 'coatwhole', 'no', 'yes', '5days', '4%', 3, 0, 0, 0, 0, 'Active', '1635447266id0.jpg', '2021-10-28 12:54:26', '2021-10-28 12:54:26'),
(18, 8, 'Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2', 'Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2_slug', '4', 'Stretch', '<p>Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2</p>', '<p>Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2Wholesale Fashion Business Straight Stretch Custom Plus Size Jeans Men2</p>', '<p>no</p>', 'Stretch', 'no', 'no', '15days', '5%', 3, 0, 0, 0, 0, 'Active', '1635447453id0.jpg', '2021-10-28 12:57:33', '2021-10-28 12:57:33'),
(20, 9, 'Baby Boys\' 4-Piece Pajama Set, Organic Cotton1', 'Baby Boys\' 4-Piece Pajama Set, Organic Cotton1_slug', '5', 'Cotton1Baby', '<p>Baby Boys\' 4-Piece Pajama Set, Organic Cotton1Baby Boys\' 4-Piece Pajama Set, Organic Cotton1Baby Boys\' 4-Piece Pajama Set, Organic Cotton1Baby Boys\' 4-Piece Pajama Set, Organic Cotton1</p>', '<p>Baby Boys\' 4-Piece Pajama Set, Organic Cotton1Baby Boys\' 4-Piece Pajama Set, Organic Cotton1Baby Boys\' 4-Piece Pajama Set, Organic Cotton1Baby Boys\' 4-Piece Pajama Set, Organic Cotton1Baby Boys\' 4-Piece Pajama Set, Organic Cotton1Baby Boys\' 4-Piece Pajama Set, Organic Cotton1Baby Boys\' 4-Piece Pajama Set, Organic Cotton1Baby Boys\' 4-Piece Pajama Set, Organic Cotton1</p>', '<p>no</p>', 'Cotton1Baby', 'no', 'no', '4days', '6%', 3, 0, 1, 0, 0, 'Active', '1635480820id0.jpg', '2021-10-28 22:13:40', '2021-10-28 22:13:40'),
(21, 9, 'Baby Boys\' 4-Piece Pajama Set, Organic Cotton', 'Baby Boys\' 4-Piece Pajama Set, Organic Cotton_slug', '4', 'CottonBaby', '<p>Baby Boys\' 4-Piece Pajama Set, Organic CottonBaby Boys\' 4-Piece Pajama Set, Organic CottonBaby Boys\' 4-Piece Pajama Set, Organic CottonBaby Boys\' 4-Piece Pajama Set, Organic Cotton</p>', '<p>Baby Boys\' 4-Piece Pajama Set, Organic CottonBaby Boys\' 4-Piece Pajama Set, Organic CottonBaby Boys\' 4-Piece Pajama Set, Organic CottonBaby Boys\' 4-Piece Pajama Set, Organic Cotton</p>', '<p>no</p>', 'CottonBaby', 'no', 'no', '6days', '8%', 3, 0, 0, 0, 0, 'Active', '1635481812id0.jpg', '2021-10-28 22:30:12', '2021-10-28 22:30:12'),
(22, 11, 'Custom two tone blue denim jacket women oversized fashion boyfriend jean jaket patchwork windbreake', 'Custom two tone blue denim jacket women oversized fashion boyfriend jean jaket patchwork windbreake_slug', '5', 'denim jacket', '<p>Custom two tone blue denim jacket women oversized fashion boyfriend jean jaket patchwork windbreakeCustom two tone blue denim jacket women oversized fashion boyfriend jean jaket patchwork windbreakeCustom two tone blue denim jacket women oversized fashion boyfriend jean jaket patchwork windbreake</p>', '<p>Custom two tone blue denim jacket women oversized fashion boyfriend jean jaket patchwork windbreakeCustom two tone blue denim jacket women oversized fashion boyfriend jean jaket patchwork windbreakeCustom two tone blue denim jacket women oversized fashion boyfriend jean jaket patchwork windbreakeCustom two tone blue denim jacket women oversized fashion boyfriend jean jaket patchwork windbreakeCustom two tone blue denim jacket women oversized fashion boyfriend jean jaket patchwork windbreakeCustom two tone blue denim jacket women oversized fashion boyfriend jean jaket patchwork windbreake</p>', '<p>no</p>', 'denim jacket', 'no', 'no', '5days', '5%', 3, 0, 0, 0, 0, 'Active', '1635482448id0.jpg', '2021-10-28 22:40:48', '2021-10-28 22:40:48'),
(23, 11, 'New Arrival Girls Dress Polyester Summer Dress with Pockets', 'New Arrival Girls Dress Polyester Summer Dress with Pockets_slug', '3', 'Polyester Summer', '<p>New Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with Pockets</p>', '<p>New Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with PocketsNew Arrival Girls Dress Polyester Summer Dress with Pockets</p>', '<p>yes</p>', 'Polyester Summer', 'yes', 'no', '6hrs', '5%', 3, 0, 0, 0, 0, 'Active', '1635482718id0.jpg', '2021-10-28 22:45:18', '2021-10-28 22:45:18'),
(24, 11, 'New Arrival Girls Dress Polyester Summer Dress with Pockets-white', 'New Arrival Girls Dress Polyester Summer Dress_with_Pockets-white_slug', '4', 'Polyester Summer', '<p>New Arrival Girls Dress Polyester Summer Dress with Pockets2New Arrival Girls Dress Polyester Summer Dress with Pockets2New Arrival Girls Dress Polyester Summer Dress with Pockets2New Arrival Girls Dress Polyester Summer Dress with Pockets2</p>', '<p>New Arrival Girls Dress Polyester Summer Dress with Pockets2New Arrival Girls Dress Polyester Summer Dress with Pockets2New Arrival Girls Dress Polyester Summer Dress with Pockets2New Arrival Girls Dress Polyester Summer Dress with Pockets2New Arrival Girls Dress Polyester Summer Dress with Pockets2New Arrival Girls Dress Polyester Summer Dress with Pockets2New Arrival Girls Dress Polyester Summer Dress with Pockets2New Arrival Girls Dress Polyester Summer Dress with Pockets2</p>', '<p>no</p>', 'Polyester Summer', 'no', 'no', '6days', '6%', 3, 0, 1, 0, 0, 'Active', '1635483174id0.jpg', '2021-10-28 22:52:54', '2021-10-28 22:52:54'),
(25, 8, 'Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts4', 'Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo white Shirts_sug_', '1', 'Polo Shirt', '<p>Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts4Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts4Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts4</p>', '<p>Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts4Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts4Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts4Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts4Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts4Men\'s Formal Solid Polo Shirt Mens Embroidered Knitted Cotton Shirts Man Short Sleeve Casual Golf Polo Shirts4</p>', '<p>no</p>', 'Polo Shirt', 'no', 'no', '6hrs', '4%', 3, 0, 0, 0, 0, 'Active', '1635483533id0.png', '2021-10-28 22:58:53', '2021-10-28 22:58:53'),
(26, 8, 'Wholesale golf fashion clothing men\'s stripes polo shirt', 'Wholesale golf fashion clothing men\'s stripes polo_shirt-slug', '2', 'stripes polo shirt', '<p>Wholesale golf fashion clothing men\'s stripes polo shirtWholesale golf fashion clothing men\'s stripes polo shirtWholesale golf fashion clothing men\'s stripes polo shirt</p>', '<p>Wholesale golf fashion clothing men\'s stripes polo shirtWholesale golf fashion clothing men\'s stripes polo shirtWholesale golf fashion clothing men\'s stripes polo shirtWholesale golf fashion clothing men\'s stripes polo shirtWholesale golf fashion clothing men\'s stripes polo shirtWholesale golf fashion clothing men\'s stripes polo shirtWholesale golf fashion clothing men\'s stripes polo shirtWholesale golf fashion clothing men\'s stripes polo shirtWholesale golf fashion clothing men\'s stripes polo shirt</p>', '<p>no</p>', 'stripes polo shirt', 'no', 'yes', '6days', '6%', 3, 0, 0, 0, 0, 'Active', '1635483773id0.jpg', '2021-10-28 23:02:53', '2021-10-28 23:02:53'),
(27, 9, 'Boys\' 3-Pack Short-Sleeve Graphic Tees', 'Boys\' 3-Pack Short-Sleeve Graphic Tees_slug', '5', 'Graphic TeesBoys', '<p>Boys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic Tees</p>', '<p>Boys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic TeesBoys\' 3-Pack Short-Sleeve Graphic Tees</p>', '<p>mo</p>', 'denim jacket', 'no', 'no', '5days', '8%', 3, 0, 1, 0, 0, 'Active', '1635484234id0.jpg', '2021-10-28 23:10:34', '2021-10-28 23:10:34'),
(28, 8, 'Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie2', 'Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie2_black_slug', '4', 'Sets Zipper Printed Hoodie2Fashion', '<p>Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie2Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie2Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie2</p>', '<p>Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie2Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie2Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie2Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie2Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie2Fashion wholesale Fashion Men Jacket Two Piece Sets Zipper Printed Hoodie2</p>', '<p>no</p>', 'Sets Zipper Printed Hoodie2Fashion', 'no', 'no', '6hrs', '4%', 3, 0, 1, 0, 0, 'Active', '1635484765id0.jpg', '2021-10-28 23:19:26', '2021-10-28 23:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_attrs`
--

CREATE TABLE `product_attrs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `cupon_id` int(11) DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `attr_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attrs`
--

INSERT INTO `product_attrs` (`id`, `product_id`, `size_id`, `color_id`, `cupon_id`, `sku`, `mrp`, `price`, `qty`, `attr_image`, `created_at`, `updated_at`) VALUES
(15, 8, 2, 3, NULL, '121', '320', '350', 4, 'AttrImage/1634188170383127145.jpg', NULL, NULL),
(16, 9, 2, 3, NULL, '12', '150', '150', 4, 'AttrImage/1634188767896049194.png', NULL, NULL),
(20, 10, 1, 3, NULL, '2434', '230', '250', 4, 'AttrImage/1634190957411767440.png', NULL, NULL),
(24, 9, 1, 2, NULL, '56', '240', '240', 4, 'AttrImage/1634188767561720642.png', NULL, NULL),
(26, 8, 2, 2, NULL, '676', '320', '360', 4, 'AttrImage/1634188170964680766.jpg', NULL, NULL),
(27, 10, 2, 5, NULL, '133', '180', '200', 2, 'AttrImage/1634190957957245213.png', NULL, NULL),
(28, 10, 3, 4, NULL, '4778', '190', '210', 55, 'AttrImage/1634190957685966563.png', NULL, NULL),
(29, 10, 2, 3, NULL, '3333', '160', '200', 3, 'AttrImage/1634190957766393431.png', NULL, NULL),
(30, 8, 3, 4, NULL, '111', '330', '360', 2, 'AttrImage/1634188170637156557.jpg', NULL, NULL),
(31, 8, 3, 5, NULL, '67', '300', '320', 1, 'AttrImage/1634188171438447760.jpg', NULL, NULL),
(32, 9, 3, 1, NULL, '155', '260', '260', 2, 'AttrImage/1634188767767210353.png', NULL, NULL),
(33, 9, 2, 4, NULL, '555', '120', '120', 2, 'AttrImage/1634188767531165126.png', NULL, NULL),
(34, 11, 1, 2, NULL, '8547', '450', '450', 4, 'AttrImage/1635438261748259326.jpg', NULL, NULL),
(35, 11, 2, 3, NULL, '890', '400', '400', 6, 'AttrImage/1635438261236996388.jpg', NULL, NULL),
(36, 11, 3, 1, NULL, '803', '430', '430', 3, 'AttrImage/1635438261608829717.jpg', NULL, NULL),
(37, 11, 1, 5, NULL, '95959', '350', '350', 3, 'AttrImage/1635438261282666946.jpg', NULL, NULL),
(38, 12, 1, 6, NULL, '7989', '720', '700', 4, 'AttrImage/1635438689188621116.jpg', NULL, NULL),
(39, 12, 2, 6, NULL, '9098', '700', '650', 3, 'AttrImage/1635438689928193290.jpg', NULL, NULL),
(40, 12, 2, 2, NULL, '94387', '780', '700', 6, 'AttrImage/1635438689168575688.jpg', NULL, NULL),
(41, 12, 3, 2, NULL, '789', '800', '740', 3, 'AttrImage/1635438689491015509.jpg', NULL, NULL),
(42, 13, 1, 3, NULL, '9845848', '300', '250', 2, 'AttrImage/1635438920452139589.jpg', NULL, NULL),
(43, 14, 1, 7, NULL, '8900', '100', '90', 3, 'AttrImage/1635446362461866973.jpg', NULL, NULL),
(44, 14, 3, 3, NULL, '145', '120', '100', 2, 'AttrImage/1635446362652067457.jpg', NULL, NULL),
(45, 14, 1, 1, NULL, '58566', '70', '50', 4, 'AttrImage/1635446362280558234.jpg', NULL, NULL),
(46, 14, 3, 2, NULL, '58952', '100', '90', 4, 'AttrImage/1635446362424910945.jpg', NULL, NULL),
(47, 15, 2, 2, NULL, '452', '120', '100', 3, 'AttrImage/1635446760814664170.jpg', NULL, NULL),
(48, 15, 2, 3, NULL, '2896', '130', '110', 4, 'AttrImage/1635446760420639115.jpg', NULL, NULL),
(49, 15, 1, 3, NULL, '1855', '140', '120', 3, 'AttrImage/1635446760210981501.png', NULL, NULL),
(50, 15, 3, 2, NULL, '8796', '120', '100', 6, 'AttrImage/1635446761164026047.png', NULL, NULL),
(51, 16, 1, 7, NULL, '14566', '250', '200', 23, 'AttrImage/1635447052397491993.jpg', NULL, NULL),
(52, 16, 3, 3, NULL, '4852', '150', '120', 2, 'AttrImage/1635447052111210887.jpg', NULL, NULL),
(53, 16, 1, 5, NULL, '2365', '150', '110', 2, 'AttrImage/1635447052450116346.jpg', NULL, NULL),
(54, 16, 2, 3, NULL, '1582', '120', '100', 1, 'AttrImage/1635447052745586981.jpg', NULL, NULL),
(55, 17, 2, 3, NULL, '15885', '1500', '1200', 3, 'AttrImage/1635447266473785013.jpg', NULL, NULL),
(56, 18, 2, 2, NULL, '236', '520', '500', 2, 'AttrImage/1635447454329841100.jpg', NULL, NULL),
(57, 19, 1, 2, NULL, '25434', '45', '40', 3, 'AttrImage/1635479533471187478.jpg', NULL, NULL),
(58, 19, 2, 7, NULL, '3894', '40', '35', 4, 'AttrImage/1635479533122011143.jpg', NULL, NULL),
(59, 19, 2, 3, NULL, '8721', '45', '40', 3, 'AttrImage/1635479533344128570.jpg', NULL, NULL),
(60, 20, 2, 7, NULL, '0230', '45', '40', 4, 'AttrImage/1635480820990215166.jpg', NULL, NULL),
(61, 20, 2, 3, NULL, '3621', '40', '35', 43, 'AttrImage/1635480820405346510.jpg', NULL, NULL),
(62, 20, 3, 2, NULL, '84125', '45', '40', 4, 'AttrImage/1635480820256739776.jpg', NULL, NULL),
(63, 21, 2, 2, NULL, '0145', '45', '40', 3, 'AttrImage/1635481812468626712.jpg', NULL, NULL),
(64, 21, 2, 7, NULL, '74512', '45', '40', 2, 'AttrImage/1635481812131223725.jpg', NULL, NULL),
(65, 21, 2, 3, NULL, '03654', '40', '35', 4, 'AttrImage/1635481812552668856.jpg', NULL, NULL),
(66, 22, 2, 7, NULL, '3652', '550', '500', 4, 'AttrImage/1635482448476814718.jpg', NULL, NULL),
(67, 23, 3, 5, NULL, '7923', '750', '700', 2, 'AttrImage/1635482718358237347.jpg', NULL, NULL),
(68, 23, 2, 3, NULL, '3972', '750', '700', 2, 'AttrImage/1635482718755007629.jpg', NULL, NULL),
(69, 24, 3, 3, NULL, '3970', '750', '700', 2, 'AttrImage/1635483174729289567.jpg', NULL, NULL),
(70, 25, 3, 7, NULL, '06982', '150', '100', 3, 'AttrImage/1635483533627075744.png', NULL, NULL),
(71, 25, 1, 3, NULL, '36025', '150', '100', 2, 'AttrImage/1635483533628751490.png', NULL, NULL),
(72, 25, 2, 2, NULL, '690320', '150', '100', 3, 'AttrImage/1635483533871770686.png', NULL, NULL),
(73, 25, 2, 5, NULL, '9706', '150', '100', 2, 'AttrImage/1635483533280749945.png', NULL, NULL),
(74, 26, 2, 2, NULL, '4021', '154', '100', 2, 'AttrImage/1635483773663546695.jpg', NULL, NULL),
(75, 27, 1, 7, NULL, '03025', '80', '70', 2, 'AttrImage/1635484234277054172.jpg', NULL, NULL),
(76, 27, 3, 3, NULL, '36014', '80', '70', 3, 'AttrImage/1635484234499081884.jpg', NULL, NULL),
(77, 27, 2, 6, NULL, '35018', '80', '70', 3, 'AttrImage/1635484235933095799.jpg', NULL, NULL),
(78, 27, 1, 2, NULL, '03690', '80', '70', 2, 'AttrImage/1635484235274534465.jpg', NULL, NULL),
(79, 28, 2, 2, NULL, '3641', '340', '300', 2, 'AttrImage/1635484766294435090.jpg', NULL, NULL),
(80, 28, 3, 3, NULL, '73210', '340', '300', 2, 'AttrImage/1635484766787466929.jpg', NULL, NULL),
(81, 28, 1, 6, NULL, '89103', '340', '300', 3, 'AttrImage/1635484766751030705.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `products_id`, `images`, `created_at`, `updated_at`) VALUES
(1, 8, 'Multi_imgs/1634188171422163631.jpg', NULL, NULL),
(3, 9, 'Multi_imgs/1634188767710249678.png', NULL, NULL),
(4, 9, 'Multi_imgs/1634188767119285783.png', NULL, NULL),
(5, 9, 'Multi_imgs/1634188767700966697.png', NULL, NULL),
(6, 9, 'Multi_imgs/1634188767676516981.png', NULL, NULL),
(7, 10, 'Multi_imgs/1634190958449872444.png', NULL, NULL),
(8, 10, 'Multi_imgs/1634190958414499409.png', NULL, NULL),
(9, 10, 'Multi_imgs/1634190958465577654.png', NULL, NULL),
(10, 10, 'Multi_imgs/1634190958555426470.png', NULL, NULL),
(11, 8, 'Multi_imgs/1634188171638949936.jpg', NULL, NULL),
(12, 8, 'Multi_imgs/1634188171493388338.jpg', NULL, NULL),
(13, 8, 'Multi_imgs/1634188171790725340.jpg', NULL, NULL),
(14, 11, 'Multi_imgs/1635438261659963962.jpg', NULL, NULL),
(15, 11, 'Multi_imgs/1635438261650263061.jpg', NULL, NULL),
(16, 11, 'Multi_imgs/1635438261878695185.jpg', NULL, NULL),
(17, 11, 'Multi_imgs/1635438261382070787.jpg', NULL, NULL),
(18, 12, 'Multi_imgs/1635438689818188602.jpg', NULL, NULL),
(19, 12, 'Multi_imgs/1635438689524002709.jpg', NULL, NULL),
(20, 12, 'Multi_imgs/1635438689746940139.jpg', NULL, NULL),
(21, 12, 'Multi_imgs/1635438689652317738.jpg', NULL, NULL),
(22, 13, 'Multi_imgs/1635438920217315367.jpg', NULL, NULL),
(23, 13, 'Multi_imgs/1635438920132466294.jpg', NULL, NULL),
(24, 13, 'Multi_imgs/1635438920879844709.jpg', NULL, NULL),
(25, 13, 'Multi_imgs/1635438920929315884.jpg', NULL, NULL),
(26, 14, 'Multi_imgs/1635446363721694883.jpg', NULL, NULL),
(27, 14, 'Multi_imgs/1635446363534948007.jpg', NULL, NULL),
(28, 14, 'Multi_imgs/1635446363793063146.jpg', NULL, NULL),
(29, 14, 'Multi_imgs/1635446363839066946.jpg', NULL, NULL),
(30, 15, 'Multi_imgs/1635446761652550509.jpg', NULL, NULL),
(31, 15, 'Multi_imgs/1635446761589566319.jpg', NULL, NULL),
(32, 15, 'Multi_imgs/1635446761279886486.png', NULL, NULL),
(33, 15, 'Multi_imgs/1635446761338871514.png', NULL, NULL),
(34, 16, 'Multi_imgs/1635447052374104518.jpg', NULL, NULL),
(35, 16, 'Multi_imgs/1635447052663801902.jpg', NULL, NULL),
(36, 16, 'Multi_imgs/1635447052796948641.jpg', NULL, NULL),
(37, 16, 'Multi_imgs/1635447052861098095.jpg', NULL, NULL),
(38, 17, 'Multi_imgs/1635447266687472619.jpg', NULL, NULL),
(39, 17, 'Multi_imgs/1635447266764413518.jpg', NULL, NULL),
(40, 17, 'Multi_imgs/1635447266849183896.jpg', NULL, NULL),
(41, 18, 'Multi_imgs/1635447454167027741.jpg', NULL, NULL),
(42, 18, 'Multi_imgs/1635447454151805731.jpg', NULL, NULL),
(43, 18, 'Multi_imgs/1635447454811208678.jpg', NULL, NULL),
(44, 19, 'Multi_imgs/1635479533207662838.jpg', NULL, NULL),
(45, 19, 'Multi_imgs/1635479533249550862.jpg', NULL, NULL),
(46, 19, 'Multi_imgs/1635479533248548963.jpg', NULL, NULL),
(47, 19, 'Multi_imgs/1635479533149179789.jpg', NULL, NULL),
(48, 20, 'Multi_imgs/1635480820878243800.jpg', NULL, NULL),
(49, 20, 'Multi_imgs/1635480820415463639.jpg', NULL, NULL),
(50, 20, 'Multi_imgs/1635480820949960252.jpg', NULL, NULL),
(51, 20, 'Multi_imgs/1635480820627637782.jpg', NULL, NULL),
(52, 21, 'Multi_imgs/1635481812122967482.jpg', NULL, NULL),
(53, 21, 'Multi_imgs/1635481812466310425.jpg', NULL, NULL),
(54, 21, 'Multi_imgs/1635481812161924194.jpg', NULL, NULL),
(55, 21, 'Multi_imgs/1635481812157353107.jpg', NULL, NULL),
(56, 22, 'Multi_imgs/1635482448990631762.jpg', NULL, NULL),
(57, 22, 'Multi_imgs/1635482448910765976.jpg', NULL, NULL),
(58, 22, 'Multi_imgs/1635482448121003904.jpg', NULL, NULL),
(59, 22, 'Multi_imgs/1635482449477288708.jpg', NULL, NULL),
(60, 23, 'Multi_imgs/1635482718672893344.jpg', NULL, NULL),
(61, 23, 'Multi_imgs/1635482718837434410.jpg', NULL, NULL),
(62, 23, 'Multi_imgs/1635482718230048610.jpg', NULL, NULL),
(63, 23, 'Multi_imgs/1635482718960384393.jpg', NULL, NULL),
(64, 24, 'Multi_imgs/1635483174790906677.jpg', NULL, NULL),
(65, 24, 'Multi_imgs/1635483174950970203.jpg', NULL, NULL),
(66, 24, 'Multi_imgs/1635483174641790688.jpg', NULL, NULL),
(67, 24, 'Multi_imgs/1635483174153394510.jpg', NULL, NULL),
(68, 25, 'Multi_imgs/1635483533316809322.png', NULL, NULL),
(69, 25, 'Multi_imgs/1635483534440380780.png', NULL, NULL),
(70, 25, 'Multi_imgs/1635483534920943828.png', NULL, NULL),
(71, 25, 'Multi_imgs/1635483534750042291.png', NULL, NULL),
(72, 26, 'Multi_imgs/1635483774701081722.jpg', NULL, NULL),
(73, 26, 'Multi_imgs/1635483774879629703.jpg', NULL, NULL),
(74, 26, 'Multi_imgs/1635483774879629703.jpg', NULL, NULL),
(75, 27, 'Multi_imgs/1635484235877819453.jpg', NULL, NULL),
(76, 27, 'Multi_imgs/1635484235748240461.jpg', NULL, NULL),
(77, 27, 'Multi_imgs/1635484235924152356.jpg', NULL, NULL),
(78, 27, 'Multi_imgs/1635484235439856079.jpg', NULL, NULL),
(79, 28, 'Multi_imgs/1635484766957011996.jpg', NULL, NULL),
(80, 28, 'Multi_imgs/1635484766432666425.jpg', NULL, NULL),
(81, 28, 'Multi_imgs/1635484766761940194.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `average` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `customer_name`, `email`, `comment`, `rating`, `average`, `created_at`, `updated_at`) VALUES
(1, 11, '', 'jakariya@gmail.com', 'good product', 5, NULL, NULL, NULL),
(2, 11, '', 'developerjk9356@gmail.com', 'nice product', 3, NULL, NULL, NULL),
(3, 11, '', 'jsk@gmail.com', 'awesome product , it is use to lovely', 5, NULL, NULL, NULL),
(4, 11, '', 'jakariya@gmail.com', 'fffffdd', 2, NULL, NULL, NULL),
(5, 11, '', 'jsk@gmail.com', 'dddwee', 4, NULL, NULL, NULL),
(6, 11, '', 'developerjk9356@gmail.com', 'dddd', 5, NULL, NULL, NULL),
(7, 16, '', 'jakariya@gmail.com', 'nice', 5, NULL, NULL, NULL),
(8, 16, 'akddos', 'developerjk9356@gmail.com', 'This is product is very good.', 5, NULL, NULL, NULL),
(9, 25, 'akddos', 'developerjk9356@gmail.com', 'very very good product . it used to nice', 3, NULL, NULL, NULL),
(10, 25, 'akddos', 'developerjk9356@gmail.com', 'oh!this is product very very bad,', 1, NULL, NULL, NULL),
(11, 25, 'akddos', 'jk@gmail.com', 'awesome product . every one can buy the product', 5, NULL, NULL, NULL),
(12, 25, 'akddos', 'jakariya@gmail.com', 'good product. Used to very friendly', 5, NULL, NULL, NULL),
(13, 25, 'akddos', 'jakariya@gmail.com', 'very nice product', 5, NULL, NULL, NULL),
(14, 25, 'akddos', 'jakariya@gmail.com', 'ice product', 5, NULL, NULL, NULL),
(15, 25, 'akddos', 'jakariya@gmail.com', 'bad product', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Xl', 'Active', '2021-06-22 10:36:26', '2021-06-22 10:36:26'),
(2, 'XX', 'Active', '2021-06-22 10:36:46', '2021-06-22 10:36:46'),
(3, 'XM', 'Active', '2021-06-22 10:37:08', '2021-06-22 10:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax_value`, `tax_desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GTS12%', 'GTS Govt tax', 'Inactive', '2021-06-30 22:25:01', '2021-06-30 22:32:04'),
(3, 'DATA10%', 'Daily tax', 'Active', '2021-06-30 22:33:04', '2021-06-30 22:33:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_slug_unique` (`category_slug`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cupons_code_unique` (`code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attrs`
--
ALTER TABLE `product_attrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_size_unique` (`size`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cupons`
--
ALTER TABLE `cupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders_status`
--
ALTER TABLE `orders_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_attrs`
--
ALTER TABLE `product_attrs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
