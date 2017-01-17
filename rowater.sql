-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2017 at 04:55 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rowater`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerrequests`
--

CREATE TABLE `customerrequests` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addr_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_village_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_village` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_road` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_soi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_subdistrict` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_district` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_province` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_postcode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zone_id` int(10) UNSIGNED DEFAULT NULL,
  `group_id` int(10) UNSIGNED DEFAULT NULL,
  `team_id` int(10) UNSIGNED DEFAULT NULL,
  `deposit_unit` int(11) NOT NULL DEFAULT '0',
  `ship_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_date` enum('1','25') COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `status` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `vat` double NOT NULL DEFAULT '0',
  `type` enum('cash','credit') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'cash',
  `lat` double(15,8) DEFAULT NULL,
  `long` double(15,8) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `addr_no`, `addr_village_no`, `addr_village`, `addr_road`, `addr_soi`, `addr_subdistrict`, `addr_district`, `addr_province`, `addr_postcode`, `tel`, `pin`, `zone_id`, `group_id`, `team_id`, `deposit_unit`, `ship_number`, `pay_date`, `price`, `status`, `vat`, `type`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(4, 'Tikamporn Kalpanluk', '58/21 Sriwichai road', '', '', '58/21 Sriwichai road', '', 'Muang', 'Muang', 'สุราษฎร์ธานี', '84000', '0950390427', NULL, 1, 1, 21, 0, '', '1', 0, '1', 0, 'cash', 1.12300000, 1.12300000, '2017-01-15 16:11:28', '2017-01-15 16:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `customer_product`
--

CREATE TABLE `customer_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `day` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_salses`
--

CREATE TABLE `delivery_salses` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `transaction_date` date DEFAULT NULL,
  `transaction_complete_datetime` datetime DEFAULT NULL,
  `count_print` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'โรงแรม', 'P', '2016-04-26 16:32:06', '0000-00-00 00:00:00'),
(2, 'องค์กร/ร้านค้า', 'Q', '2016-08-25 11:09:12', '0000-00-00 00:00:00'),
(3, 'บ้าน', 'R', '2016-04-26 16:32:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_04_04_172130_create_team_table', 1),
('2016_04_04_172143_create_group_table', 1),
('2016_04_04_172445_create_transaction_table', 1),
('2016_04_04_172446_create_zone_table', 1),
('2016_04_09_142341_create_expense_table', 1),
('2016_04_12_000000_create_users_table', 1),
('2016_04_12_100000_create_password_resets_table', 1),
('2016_04_12_161033_create_customer_table', 1),
('2016_08_25_153549_create-products-table', 2),
('2016_08_27_143011_create_logs_table', 3),
('2016_09_21_143011_create_purchases_table', 1),
('2016_11_23_043126_create_requests_table', 4),
('2016_11_23_051122_create_customerrequests_table', 5),
('2017_01_04_213556_create_addresses_table', 6),
('2017_01_05_133243_create_team_users_table', 7),
('2017_01_05_213036_create_teamzone_table', 8),
('2017_01_11_125850_create_delivery_sale_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_max` int(11) NOT NULL,
  `amount_alert` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `amount`, `amount_max`, `amount_alert`, `created_at`, `updated_at`) VALUES
(1, '230ml', 70, 200, 100, '2017-01-15 15:26:26', '2017-01-15 15:26:26'),
(2, '250ml', 100, 100, 50, '2016-11-23 07:00:13', '2016-11-23 00:00:13'),
(3, '350ml', 100, 100, 50, '2016-09-22 17:38:44', '2016-08-27 08:22:11'),
(4, '500ml', 100, 100, 50, '2016-11-23 07:01:24', '2016-11-23 00:01:24'),
(5, '770ml', 100, 100, 50, '2016-08-27 15:11:04', '2016-08-27 08:11:04'),
(6, '1500ml', 100, 100, 50, '2016-11-23 07:00:19', '2016-11-23 00:00:19'),
(7, '2700ml', 100, 100, 50, '2016-11-23 06:49:56', '2016-11-22 23:49:56'),
(11, '5000ml', 100, 100, 50, '2017-01-06 15:42:01', '2017-01-06 15:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `created_at`, `updated_at`) VALUES
(21, 'มะม่วง', '2017-01-12 17:57:51', '2017-01-12 17:57:51'),
(22, 'ส้มโอ', '2017-01-12 18:02:53', '2017-01-12 18:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role` enum('หัวหน้าทีม','พนักงานขนส่ง') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'พนักงานขนส่ง',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team_user`
--

INSERT INTO `team_user` (`id`, `team_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(173, 22, 1, 'หัวหน้าทีม', '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(174, 22, 9, 'พนักงานขนส่ง', '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(175, 21, 1, 'พนักงานขนส่ง', '2017-01-15 15:48:29', '2017-01-15 15:48:29'),
(176, 21, 5, 'พนักงานขนส่ง', '2017-01-15 15:48:29', '2017-01-15 15:48:29'),
(177, 21, 7, 'พนักงานขนส่ง', '2017-01-15 15:48:29', '2017-01-15 15:48:29'),
(178, 21, 9, 'หัวหน้าทีม', '2017-01-15 15:48:29', '2017-01-15 15:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `team_zone`
--

CREATE TABLE `team_zone` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team_zone`
--

INSERT INTO `team_zone` (`id`, `team_id`, `zone_id`, `created_at`, `updated_at`) VALUES
(74, 22, 1, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(75, 22, 2, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(76, 22, 3, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(77, 22, 4, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(78, 22, 5, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(79, 22, 6, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(80, 22, 7, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(81, 22, 8, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(82, 22, 9, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(83, 22, 10, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(84, 22, 11, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(85, 22, 12, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(86, 22, 13, '2017-01-15 15:29:03', '2017-01-15 15:29:03'),
(87, 21, 9, '2017-01-15 15:48:29', '2017-01-15 15:48:29'),
(88, 21, 10, '2017-01-15 15:48:29', '2017-01-15 15:48:29'),
(89, 21, 11, '2017-01-15 15:48:29', '2017-01-15 15:48:29'),
(90, 21, 12, '2017-01-15 15:48:29', '2017-01-15 15:48:29'),
(91, 21, 13, '2017-01-15 15:48:29', '2017-01-15 15:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pin` int(11) NOT NULL,
  `level` enum('admin','staff','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `pin`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wisit Srimala', 'palm.future@gmail.com', '$2y$10$xmyhI2QLEXqMgQdUQpT8uOjxYitsYN13uoZv0RKjf6qaJ3tl4v/D.', 552017, 'admin', 'nlsRpvkGlYQN6NuwJSfZUXa0m4so3baBmTb6pSoXuNNWuvODdnmD7C1vFvz6', '2017-01-15 16:04:45', '2017-01-15 16:04:45'),
(2, 'User', 'user@rowater.com', '$2y$10$.FIMazY/tpjnttmU2oYKIuzkgKnsiprHrX.5pGfCvW2AZz1CRPwPS', 13645, 'user', 'vVgo0yaqc28Ep57LJ4CmUP5Qj1g9V40SO2K4V5UD3fHjyhuuu4zq10e6KDnA', '2016-11-27 17:36:39', '2016-11-27 10:36:39'),
(3, 'Staff', 'staff@rowater.com', '$2y$10$b5pbb88vzbbAV.DeWebR8.YKAwweE.syflUQyOJKR.hoTQc9hFN7y', 84546, 'staff', 'HkwO9fG1rlwGc6KEogNdAN4Mb3DfySg6VmENBJzwUKcSwS5VajLBLknd457s', '2016-09-22 05:33:34', '2016-04-26 09:22:09'),
(4, 'Admin', 'admin@rowater.com', '$2y$10$FyaBhRPYPMgFSre9BqKJ1.ZUNOiutgUyuLVBBbsBAQxz.6MiCAVp6', 78564, 'admin', 'rpblMYiDNJTxx4x4z2wwayprv7fRJIBkghvXRp4QOdI8WrVSJCjI9JteMyaj', '2016-09-25 13:53:27', '2016-09-25 06:53:27'),
(5, 'โอ๋', 'ao@rowater.com', '$2y$10$Tfccwib5RysKUiyNCfrrIe.Mkytc5EWZGT2Su9A.Qci1zHD8ZSVii', 23451, 'user', 'aHZMT55Rldz9lAEsWj60lgDeQLNLexvYrbNtVXAH35XRvdAudsUYmeNzzAxh', '2016-12-02 17:10:09', '2016-09-06 08:06:12'),
(6, 'เล็ก', 'lek@rowater.com', '$2y$10$6WwQwLD7nOFTVOVPCJBkp.BKNtbQsDQmFwizI2.PWC2HUX/05mXBG', 34512, 'user', 'b4QYPeuCJAjLwC3Ql25fNA5jsLY09Wu3wvXuat5kUdlfrSqvmlbxzfIuxWCv', '2016-12-02 17:10:09', '2016-09-06 08:06:29'),
(7, 'เสร็ฐ', 'sert@rowater.com', '$2y$10$jBD5Aiwz07NHUE0U5yjVBenJsliuYap7vE38JuOrlf7nCsPm5imWm', 12345, 'user', '1XjfG0AvD5u6C74vgODBlz2Fk5VcV2rNPLmFIsFpS2Q8VEXsnuM7nVVzGSSc', '2016-11-22 09:12:29', '2016-09-06 08:06:54'),
(8, 'อั้ม', 'aum@rowater.com', '$2y$10$Q1KRFJJDR0UrlT4GGqToJOZAmRxnCDj.UXhOV8zP7MlqAbIKtWSf2', 45123, 'user', '2IIgP6yZIzIkU9HPCleYS9Sm69gHx3UyfUSivsG69dxBcEbJsAfkoGYihPsF', '2016-12-02 17:10:09', '2016-09-06 08:09:01'),
(9, 'ทิฆัมพร กาฬพันลึก', 'gagiftsugus@gmail.com', '$2y$10$1g0HcJTpqIN8IATFokA5ke/3FpSyLEi/7JxC8AOKR2Zo3i8TY/07q', 0, 'user', 'ECBRvV8CTrXp7qgoVIB7SaJq6Jdf9bXA4uFl6dM5I3yJ2rhHa5y3jNOAk3N0', '2016-11-23 10:41:07', '2016-11-23 03:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double(15,8) NOT NULL,
  `long` double(15,8) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `detail`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(1, 'ในเมือง 3 กอง  จอมทอง', 'E3', 0.00000000, 0.00000000, '2017-01-11 16:22:44', '0000-00-00 00:00:00'),
(2, 'เชิงทะเล บางเทา', 'E', 0.00000000, 0.00000000, '2016-09-07 03:32:37', '0000-00-00 00:00:00'),
(3, 'ไม้ขาว ถลาง  โคกกลอย', 'E2', 0.00000000, 0.00000000, '2016-09-07 03:32:42', '0000-00-00 00:00:00'),
(4, 'ในเมือง เกาะสิเหร่', 'A', 0.00000000, 0.00000000, '2016-09-07 03:33:16', '0000-00-00 00:00:00'),
(5, 'ราไว, ใสญวน', 'B1', 0.00000000, 0.00000000, '2017-01-11 16:35:55', '2017-01-11 16:35:55'),
(6, 'บายพาส', 'C', 0.00000000, 0.00000000, '2016-09-07 03:33:16', '0000-00-00 00:00:00'),
(7, 'เกาะแก้ว', 'C2', 0.00000000, 0.00000000, '2016-09-07 03:33:16', '0000-00-00 00:00:00'),
(8, 'พันวา อ่าวขาม ฉลอง', 'B2', 0.00000000, 0.00000000, '2016-09-07 03:33:16', '0000-00-00 00:00:00'),
(9, 'กะตะ ', 'F1', 0.00000000, 0.00000000, '2016-09-07 03:33:41', '0000-00-00 00:00:00'),
(10, 'กะรน', 'F2', 0.00000000, 0.00000000, '2016-09-07 03:33:41', '0000-00-00 00:00:00'),
(11, 'ป่าตอง', 'F3', 0.00000000, 0.00000000, '2016-09-07 03:33:41', '0000-00-00 00:00:00'),
(12, 'กมลา', 'F4', 0.00000000, 0.00000000, '2016-09-07 03:33:41', '0000-00-00 00:00:00'),
(13, 'กะทู้', 'D', 0.00000000, 0.00000000, '2016-09-07 03:33:41', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerrequests`
--
ALTER TABLE `customerrequests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerrequests_customer_id_index` (`customer_id`),
  ADD KEY `customerrequests_product_id_index` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pin` (`pin`),
  ADD KEY `customers_id_zone_foreign` (`zone_id`),
  ADD KEY `customers_id_group_foreign` (`group_id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indexes for table `customer_product`
--
ALTER TABLE `customer_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`customer_id`,`product_id`),
  ADD KEY `customers_id_product_foreign` (`product_id`);

--
-- Indexes for table `delivery_salses`
--
ALTER TABLE `delivery_salses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `team_zone`
--
ALTER TABLE `team_zone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_zones_team_id_index` (`team_id`),
  ADD KEY `team_zones_zone_id_index` (`zone_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerrequests`
--
ALTER TABLE `customerrequests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer_product`
--
ALTER TABLE `customer_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery_salses`
--
ALTER TABLE `delivery_salses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `team_zone`
--
ALTER TABLE `team_zone`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerrequests`
--
ALTER TABLE `customerrequests`
  ADD CONSTRAINT `customerrequests_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customerrequests_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_ibfk_3` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `customer_product`
--
ALTER TABLE `customer_product`
  ADD CONSTRAINT `customers_id_customer_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_id_product_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team_user`
--
ALTER TABLE `team_user`
  ADD CONSTRAINT `team_user_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team_zone`
--
ALTER TABLE `team_zone`
  ADD CONSTRAINT `team_zone_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `team_zone_ibfk_2` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
