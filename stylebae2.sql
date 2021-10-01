-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 07:44 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stylebae2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminrole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(25) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `brand`, `category`, `salon`, `service`, `staff`, `review`, `appointment`, `transaction`, `user`, `adminrole`, `type`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin@gmail.com', '2021-07-16 10:20:13', '$2y$10$KrouN66t9.Rvj1jj5MblT.6dQ0Ywznux3cvKjf5tF3JSm0i8zqICy', '9742856985', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 'e3pRWpYysP', NULL, '202107181243user1.png', '2021-07-16 10:20:15', '2021-07-18 07:16:09'),
(6, 'test1', 'test1@gmail.com', NULL, '$2y$10$b77JHlGwSt6HsYet8NSezuHwBweKTdt/FuLdHwPwOTkeYCoZHtdnK', '9874563211', NULL, NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'upload/admin-images/202109080430vivo-Phone-logo.png', '2021-09-07 23:00:52', '2021-09-07 23:01:45'),
(7, 'test2', 'test@gmail.com', NULL, '$2y$10$t.rmqgw0PoPcOWl0hUVpVO2CGK9rscO0lkNfIhopVNngZ8.UpxEem', '896558746321', '1', NULL, '1', NULL, NULL, NULL, '1', NULL, NULL, NULL, 2, NULL, NULL, 'upload/admin-images/202109080434Apple-Logo-PNG-Image-715x715.png', '2021-09-07 23:04:56', '2021-09-07 23:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `date_app` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_app` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `service_id`, `product_id`, `date_app`, `time_app`, `price`, `status`, `created_at`, `updated_at`) VALUES
(27, 1, 15, 18, '24-Aug-2021', '1:00 pm', 'Rs 100', 'delete', NULL, '2021-08-26 02:28:33'),
(28, 1, 15, 18, '07-Aug-2021', '11:00 am', 'Rs 100', NULL, NULL, NULL),
(29, 1, 15, 18, '28-Aug-2021', '11:30 am', 'Rs 100', 'cancel', NULL, '2021-08-26 23:10:25'),
(30, 1, 15, 18, '31-Aug-2021', '1:30 pm', 'Rs 100', NULL, NULL, NULL),
(37, 1, 18, 28, '26-Aug-2021', '6:00 pm', 'Rs 150', 'delete', NULL, '2021-08-26 23:17:57'),
(38, 1, 17, 18, '27-Aug-2021', '2:00 pm', 'Rs 100', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salon` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_hin`, `category_slug_en`, `category_slug_hin`, `created_at`, `updated_at`) VALUES
(1, 'Salon', 'सैलून', 'salon', 'सैलून', '2021-07-18 22:49:25', '2021-07-18 22:54:38'),
(2, 'Spa', 'स्पा', 'spa', 'स्पा', '2021-07-18 22:49:53', '2021-07-18 22:49:53'),
(4, 'test', 'सैलून', 'test', 'सैलून', '2021-08-03 01:11:51', '2021-08-03 01:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'ibhhou', 'ibhou@gmail.com', 'appreciation', 'this web site is amazing but need more improvement on it', '2021-09-10 00:35:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_07_16_045956_create_sessions_table', 1),
(7, '2021_07_16_060819_create_admins_table', 2),
(8, '2021_07_18_095306_create_brands_table', 3),
(9, '2021_07_19_035608_create_categories_table', 4),
(10, '2021_07_19_043412_create_sub_categories_table', 5),
(11, '2021_07_19_071128_create_products_table', 6),
(12, '2021_07_19_074416_create_services_table', 6),
(13, '2021_07_23_063246_create_products_table', 7),
(14, '2021_07_23_065236_create_multi_imgs_table', 7),
(15, '2021_07_24_033243_create_staff_table', 8),
(16, '2021_08_01_100643_create_wish_lists_table', 9),
(17, '2021_08_02_073242_create_appointments_table', 10),
(18, '2021_08_22_122942_create_payments_table', 11),
(19, '2021_08_22_123318_create_payment_items_table', 12),
(20, '2021_09_10_054815_create_contacts_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(45, 18, 'upload/product-images/multiImg/202108211111202107300421salon2.png', '2021-08-21 05:41:35', '2021-08-21 05:41:35'),
(46, 18, 'upload/product-images/multiImg/202108211111202108021656salon5.webp', '2021-08-21 05:41:35', '2021-08-21 05:41:35'),
(51, 28, 'upload/product-images/multiImg/202108261141202107300421salon2.png', '2021-08-26 06:11:09', '2021-08-26 06:11:09'),
(52, 28, 'upload/product-images/multiImg/202108261141202108021656salon5.webp', '2021-08-26 06:11:09', '2021-08-26 06:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@gmail.com', '$2y$10$ENn3Hi30rKuv4EO.x80mPOFiNITj0Zj7/ehNFu8rzT2piSbbg2hnm', '2021-07-18 07:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `payment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `appointment_id`, `name`, `email`, `phone`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `payment_number`, `invoice_number`, `payment_date`, `payment_month`, `payment_year`, `salon`, `service`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 26, 'user2', 'user2@gmail.com', '9742841043', 'card_1JRJlUSIIXq0xXvQcPRgoke5', 'card_1JRJlUSIIXq0xXvQcPRgoke5', 'txn_3JRJlWSIIXq0xXvQ1WCezeph', 'inr', 100.00, '61227eaa773e9', 'SB98567194', '22 August 2021', 'August', '2021', NULL, NULL, 'pending', '2021-08-22 11:13:25', NULL),
(2, 1, 30, 'ibrahim', 'ibrahima.keita52@gmail.com', '9874563215', 'card_1JRxE0SIIXq0xXvQF3mog6sx', 'card_1JRxE0SIIXq0xXvQF3mog6sx', 'txn_3JRxE2SIIXq0xXvQ00kSBrjR', 'inr', 100.00, '6124cf2c651b4', 'SB43648241', '24 August 2021', 'August', '2021', NULL, NULL, 'pending', '2021-08-24 05:21:29', NULL),
(3, 1, 30, 'ibrahim', 'ibrahima.keita52@gmail.com', '9874563215', 'card_1JRxNUSIIXq0xXvQ2lUHEhg5', 'card_1JRxNUSIIXq0xXvQ2lUHEhg5', 'txn_3JRxNWSIIXq0xXvQ0W35gTDi', 'inr', 100.00, '6124d178b17b0', 'SB11943546', '24 August 2021', 'August', '2021', NULL, NULL, 'pending', '2021-08-24 05:31:13', NULL),
(4, 1, 30, 'ibrahim', 'ibrahima.keita52@gmail.com', '9874563215', 'card_1JRxVgSIIXq0xXvQiGdGVCVE', 'card_1JRxVgSIIXq0xXvQiGdGVCVE', 'txn_3JRxVhSIIXq0xXvQ04I5s4Mu', 'inr', 100.00, '6124d37471adc', 'SB44626584', '24 August 2021', 'August', '2021', NULL, NULL, 'pending', '2021-08-24 05:39:41', NULL),
(5, 5, 31, 'user5', 'ibrahimadiane87@gmail.com', '9875632145', 'card_1JSH2ESIIXq0xXvQxP8LLPTv', 'card_1JSH2ESIIXq0xXvQxP8LLPTv', 'txn_3JSH2FSIIXq0xXvQ02IsrWDB', 'inr', 100.00, '6125f8a201fe6', 'SB90201612', '25 August 2021', 'August', '2021', NULL, NULL, 'pending', '2021-08-25 02:30:35', NULL),
(6, 1, 36, 'user', 'ibrahimadiane100@gmail.com', '9875632145', 'CASH', NULL, NULL, 'INR', 250.00, NULL, 'SB95568327', '25 August 2021', 'August', '2021', 'Diane Salon', 'Pedicure', 'pending', '2021-08-25 11:11:48', NULL),
(7, 1, 36, 'user', 'ibrahimadiane100@gmail.com', '9875632145', 'CASH', NULL, NULL, 'INR', 250.00, NULL, 'SB87534167', '25 August 2021', 'August', '2021', 'Diane Salon', 'Pedicure', 'pending', '2021-08-25 11:12:31', NULL),
(8, 1, 36, 'user', 'ibrahimadiane100@gmail.com', '9875632145', 'CASH', NULL, NULL, 'INR', 250.00, NULL, 'SB95696530', '25 August 2021', 'August', '2021', 'Diane Salon', 'Pedicure', 'pending', '2021-08-25 11:12:52', NULL),
(9, 1, 36, 'user', 'ibrahimadiane100@gmail.com', '9875632145', 'CASH', NULL, NULL, 'INR', 250.00, NULL, 'SB85649679', '25 August 2021', 'August', '2021', 'Diane Salon', 'Pedicure', 'pending', '2021-08-25 11:13:39', NULL),
(10, 1, 36, 'user', 'ibrahimadiane100@gmail.com', '9875632145', 'CASH', NULL, NULL, 'INR', 250.00, NULL, 'SB76151088', '25 August 2021', 'August', '2021', 'Diane Salon', 'Pedicure', 'pending', '2021-08-25 11:15:43', NULL),
(11, 1, 37, 'user', 'ibrahimadiane87@gmail.com', '98777566321', 'card_1JSh9BSIIXq0xXvQlMwdUIws', 'card_1JSh9BSIIXq0xXvQlMwdUIws', 'txn_3JSh9DSIIXq0xXvQ10aWQH5E', 'inr', 150.00, '612780bae0cab', 'SB80536897', '26 August 2021', 'August', '2021', 'kskkkjdsdfk', 'Manicure', 'pending', '2021-08-26 06:23:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_items`
--

CREATE TABLE `payment_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `salon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_items`
--

INSERT INTO `payment_items` (`id`, `payment_id`, `salon`, `service`, `price`, `transaction_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Salon RIMKA', 'hair cut', 100.00, NULL, '2021-08-22 11:13:25', NULL),
(2, 2, 'Salon RIMKA', 'Pedicure', 100.00, 'txn_3JRxE2SIIXq0xXvQ00kSBrjR', '2021-08-24 05:21:29', NULL),
(3, 3, 'Salon RIMKA', 'Pedicure', 100.00, 'txn_3JRxNWSIIXq0xXvQ0W35gTDi', '2021-08-24 05:31:14', NULL),
(4, 4, 'Salon RIMKA', 'Pedicure', 100.00, 'txn_3JRxVhSIIXq0xXvQ04I5s4Mu', '2021-08-24 05:39:41', NULL),
(5, 5, 'Salon RIMKA', 'hair cut', 100.00, 'txn_3JSH2FSIIXq0xXvQ02IsrWDB', '2021-08-25 02:30:35', NULL),
(6, 11, 'kskkkjdsdfk', 'Manicure', 150.00, 'txn_3JSh9DSIIXq0xXvQ10aWQH5E', '2021-08-26 06:23:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_hin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc_hin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_mainImg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closing_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `product_name_en`, `city`, `city_slug`, `product_name_hin`, `product_slug_en`, `product_slug_hin`, `short_desc_en`, `short_desc_hin`, `long_desc_en`, `long_desc_hin`, `product_mainImg`, `product_address`, `phone`, `opening_time`, `closing_time`, `user`, `status`, `created_at`, `updated_at`) VALUES
(18, NULL, 1, 1, 'Salon RIMKA', 'Bangalore', 'bangalore', NULL, 'salon_rimka', '', NULL, NULL, 'eiduduudjdjdjdjjdjdjddjs,ssmndndn', NULL, 'upload/product-images/mainImg/202108211111Salon RIMKA202107231624salon1.png', 'gunjur palya 3th main road 4th cross bangalore-560087', '9742841044', '10:00', '21:00', 'user', 1, '2021-08-21 05:41:34', '2021-08-21 06:10:43'),
(28, NULL, 1, 1, 'kskkkjdsdfk', 'Dehli', 'dehli', NULL, 'kskkkjdsdfk', '', NULL, NULL, 'klkjsdksjkjsdskjd', NULL, 'upload/product-images/mainImg/202108261141kskkkjdsdfk202107291752boy1.jpg', 'kfkddfkjdfdfjdfj', '988777778899', '10:00', '21:00', 'user', 1, '2021-08-26 06:11:02', '2021-08-26 06:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rating` int(11) DEFAULT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `service_id`, `product_id`, `user_id`, `comment`, `status`, `rating`, `summary`, `created_at`, `updated_at`) VALUES
(24, 17, 18, 1, 'this is good service and it is very helpful i love the product because the color is perfect', '1', 3, 'good', '2021-09-12 00:16:57', NULL),
(25, 17, 18, 1, 'this is good service and it is very helpful i love the product because the color is perfect', '1', 3, 'good', '2021-09-12 00:17:10', '2021-09-12 00:29:28'),
(28, 18, 28, 3, 'fkkdfkgmdlfkgdfkmdslkgmsdklgmG\'SDMSMSM\'SDFM\'DFMDGFGM;LDSFkdgmfld\'mgdklfmgdfklggfdlkmklkldfskllgf', '0', 2, 'my review', '2021-09-22 03:59:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `service_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'No Discount',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `subcategory_id`, `product_id`, `service_name_en`, `service_name_hin`, `service_slug_en`, `service_slug_hin`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(15, 1, 1, 18, 'Pedicure', NULL, 'pedicure', '', '100', NULL, '2021-08-21 06:03:22', '2021-08-21 06:03:22'),
(17, 1, 1, 18, 'hair cut', NULL, 'hair_cut', '', '100', NULL, '2021-08-21 09:34:53', '2021-08-21 09:34:53'),
(18, 1, 1, 28, 'Manicure', NULL, 'manicure', '', '150', NULL, '2021-08-26 06:12:14', '2021-08-26 06:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('59aE7frMFQ8qQujN1lIPqObQqwilwVtPCq4jycV9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibWg1S2dXRkxCNHBkb21YYjlnT2x1VGwzRGIyOHd1TnhvWkgyRmNpNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWUhhZ2FrMzlHbVpDc1Z5YzRtdUtQTzk1VVRTZFNVdy9hNk9LWlJiWGtyVVVvQkZQc3BxZHkiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJFlIYWdhazM5R21aQ3NWeWM0bXVLUE85NVVUU2RTVXcvYTZPS1pSYlhrclVVb0JGUHNwcWR5IjtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9fQ==', 1632305240),
('jPZds5DtMzel8YIrkWXW4bWmRCkr1HJiWjAt7547', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiY0FsOXBaZkx2eDJyM0lENUxEMDlPOTh2VzludkdodElHeTlMZ2EyRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3NhbG9uLzEvanF1ZXJ5LmRhdGV0aW1lcGlja2VyLmpzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFlIYWdhazM5R21aQ3NWeWM0bXVLUE85NVVUU2RTVXcvYTZPS1pSYlhrclVVb0JGUHNwcWR5IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRZSGFnYWszOUdtWkNzVnljNG11S1BPOTVVVFNkU1V3L2E2T0taUmJYa3JVVW9CRlBzcHFkeSI7fQ==', 1632302964);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `staff_member_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_member_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_member_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_member_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `product_id`, `staff_member_name_en`, `staff_member_name_hin`, `staff_member_slug_en`, `staff_member_slug_hin`, `title`, `photo`, `created_at`, `updated_at`) VALUES
(7, 18, 'Abdoul karim', NULL, 'abdoul_karim', '', 'owner', 'upload/product-images/staffImg/202108211318202107291753men2.jpg', '2021-08-21 07:48:38', '2021-08-21 07:48:38'),
(8, 18, 'Ibhou', NULL, 'ibhou', '', 'staff Member', 'upload/product-images/staffImg/202108211330202107291752boy1.jpg', '2021-08-21 08:00:45', '2021-08-21 08:00:45'),
(9, 28, 'kdkdkdjdj', NULL, 'kdkdkdjdj', '', 'owner', 'upload/product-images/staffImg/202108261142202107291753men2.jpg', '2021-08-26 06:12:50', '2021-08-26 06:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_hin`, `subcategory_slug_en`, `subcategory_slug_hin`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Men', 'पुरुषों', 'men', 'पुरुषों', 'upload/subcategory-images/202107281653male.png', '2021-07-18 23:27:53', '2021-07-28 11:23:23'),
(2, 1, 'Women', 'महिलाओं', 'women', 'महिलाओं', 'upload/subcategory-images/202107281653female.png', '2021-07-18 23:28:25', '2021-07-28 11:23:44'),
(3, 1, 'Unisex', 'उभयलिंगी', 'unisex', 'उभयलिंगी', 'upload/subcategory-images/202107281656unisex.png', '2021-07-18 23:29:16', '2021-07-28 11:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `last_seen`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'user', 'ibrahimadiane100@gmail.com', '9742841044', '2021-09-12 05:17:40', NULL, '$2y$10$tE/Kdxpqnf1moVLd61sY6.tMjy1hmee3VyI/AuSqVY2DnnGuDNbCu', NULL, NULL, NULL, NULL, '202107280834girl.jpeg', '2021-07-16 00:05:59', '2021-09-11 23:47:40'),
(3, 'user3', 'user3@gmail.com', NULL, '2021-09-22 10:07:17', NULL, '$2y$10$YHagak39GmZCsVyc4muKPO95UTSdSUw/a6OKZRbXkrUUoBFPspqdy', NULL, NULL, NULL, NULL, NULL, '2021-08-20 23:35:56', '2021-09-22 04:37:17');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_user` (`user_id`),
  ADD KEY `app_service` (`service_id`),
  ADD KEY `app_product` (`product_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salon_brand` (`salon`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `multi_product` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_items`
--
ALTER TABLE `payment_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_items_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_service_id_foreign` (`service_id`),
  ADD KEY `user_review` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcat_constraint` (`subcategory_id`),
  ADD KEY `product_constraint` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_product` (`product_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_product` (`product_id`),
  ADD KEY `wish_service` (`service_id`),
  ADD KEY `wish_user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_items`
--
ALTER TABLE `payment_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `app_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `app_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `app_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `salon_brand` FOREIGN KEY (`salon`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD CONSTRAINT `multi_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_items`
--
ALTER TABLE `payment_items`
  ADD CONSTRAINT `payment_items_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_review` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `category_constraint` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_constraint` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcat_constraint` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD CONSTRAINT `wish_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wish_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wish_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
