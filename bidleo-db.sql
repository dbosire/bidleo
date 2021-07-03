-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 10:56 AM
-- Server version: 8.0.23
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidleo`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `id` bigint UNSIGNED NOT NULL,
  `auction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_unique_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bid_end_date` datetime DEFAULT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_keyphrase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mcj_keyphrase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ghetto_keyphrase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_keyphrase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lowest_unique_bidder` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `lowest_unique_bid` int NOT NULL DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `number_of_bids` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`id`, `auction_id`, `item_unique_id`, `bid_end_date`, `item_name`, `item_keyphrase`, `mcj_keyphrase`, `ghetto_keyphrase`, `ten_keyphrase`, `lowest_unique_bidder`, `lowest_unique_bid`, `status`, `number_of_bids`, `created_at`, `updated_at`) VALUES
(1, 'Bike-fc4ca116', 'Bike-9uA5Q9Yp2w', '2021-07-04 00:00:00', 'Bike', 'Bike', 'MCJ-Bike', 'Ghetto-Bike', 'Ten-Bike', '', 10000000, 'active', 0, NULL, NULL),
(2, 'Phone-04d90708', 'Phone-gM3tth4Yg9', '2021-07-04 00:00:00', 'Phone', 'Phone', 'MCJ-Phone', 'Ghetto-Phone', 'Ten-Phone', '', 10000000, 'active', 0, NULL, NULL),
(3, 'Voucher-8ea20dd9', 'Voucher-hH8phJgd3m', '2021-07-04 00:00:00', 'Voucher', 'Shop', 'MCJ-Shop', 'Ghetto-Shop', 'Ten-Shop', '', 10000000, 'active', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `id` bigint UNSIGNED NOT NULL,
  `auction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bid_unique_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `affiliate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'regular',
  `bid_amount` int DEFAULT NULL,
  `bid_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `bid_start_time` datetime DEFAULT NULL,
  `item_unique_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bidders`
--

CREATE TABLE `bidders` (
  `id` bigint UNSIGNED NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidder_unique_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_pin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eligible` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` bigint UNSIGNED NOT NULL,
  `retail_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_keyphrase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mcj_keyphrase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ghetto_keyphrase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_keyphrase` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bid_end_date` datetime DEFAULT NULL,
  `item_unique_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mileage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `engine` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transmission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dual_sim` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_camera` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back_camera` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usable_at` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `auctioned` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `retail_price`, `auction_id`, `item_name`, `item_category`, `item_keyphrase`, `mcj_keyphrase`, `ghetto_keyphrase`, `ten_keyphrase`, `bid_end_date`, `item_unique_id`, `item_description`, `condition`, `year`, `fuel`, `color`, `mileage`, `engine`, `transmission`, `full_name`, `dual_sim`, `storage`, `front_camera`, `back_camera`, `voucher_amount`, `usable_at`, `expiration_date`, `status`, `auctioned`, `created_at`, `updated_at`) VALUES
(1, '2000', 'Bike-fc4ca116', 'Bike', 'BIKE', 'Bike', 'MCJ-Bike', 'Ghetto-Bike', 'Ten-Bike', '2021-07-04 00:00:00', 'Bike-9uA5Q9Yp2w', 'This is a demo short description about a bike.', 'brand new', '2018-07-03 10:55:41', 'diesel', 'green', '0 miles', '250cc', 'automatic', 'Ducatti Bike, Green and Black Edition 2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'available', 1, NULL, NULL),
(2, '1000', 'Phone-04d90708', 'Phone', 'PHONE', 'Phone', 'MCJ-Phone', 'Ghetto-Phone', 'Ten-Phone', '2021-07-04 00:00:00', 'Phone-gM3tth4Yg9', 'This is a demo short description about a phone.', 'brand new', '2018-07-03 10:55:41', NULL, 'blue', NULL, NULL, NULL, 'Samsung Galaxy S21 Black & Gold Edition', 'yes', '100 GB', '8 mgpx', '16 mgpx', NULL, NULL, NULL, 'available', 1, NULL, NULL),
(3, '1000', 'Voucher-8ea20dd9', 'Voucher', 'VOUCHER', 'Shop', 'MCJ-Shop', 'Ghetto-Shop', 'Ten-Shop', '2021-07-04 00:00:00', 'Voucher-hH8phJgd3m', 'This is a demo short description about a voucher.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'KES 50,000 Voucher For Shopping at any Naivas store.', NULL, NULL, NULL, NULL, '50000', 'Naivas', '2021-07-10 10:55:41', 'available', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_04_24_080603_create_bidders_table', 1),
(6, '2021_04_27_123253_create_bid_table', 1),
(7, '2021_04_27_125225_create_item_table', 1),
(8, '2021_05_03_090052_create_winners_table', 1),
(9, '2021_05_05_101635_create_mpesa_tokens_table', 1),
(10, '2021_05_20_091214_create_pass_key_table', 1),
(11, '2021_05_21_062603_create_auction_table', 1),
(12, '2021_06_28_061118_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_tokens`
--

CREATE TABLE `mpesa_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `access_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mpesa_tokens`
--

INSERT INTO `mpesa_tokens` (`id`, `access_token`, `created_at`, `updated_at`) VALUES
(1, 'eqZEA2BnBZJ8XH65LDGVORRYOU60', '2021-07-03 07:55:42', '2021-07-03 07:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pass_key`
--

CREATE TABLE `pass_key` (
  `id` bigint UNSIGNED NOT NULL,
  `pass_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidder_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `eligible` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `first_pass_change` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `bidder_unique_id`, `email`, `phone_number`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `eligible`, `status`, `first_pass_change`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'oFfcfIA2', 'admin@gmail.com', '254712345678', 'eyJpdiI6InRJbWk0b2YzQnAydkRtTjB6c2QwQkE9PSIsInZhbHVlIjoiekk3ZXFLSVVENk1PK1FUaVNGTDg4UT09IiwibWFjIjoiYjg3ZmNjOGNmZWQ0OTRjZmJjMTQ3MWRlY2E5OWQwZmM2YTYzMTA1YzllOWRjZjU4MTdkMDczYmQwOWQ1YWFmMyJ9', NULL, NULL, 1, 'active', 1, 'admin', NULL, NULL, NULL, NULL),
(2, 'Calvin Magezi', 'QkoCzWbj', 'calvinmagezi@ymail.com', '254741925996', 'eyJpdiI6InRJbWk0b2YzQnAydkRtTjB6c2QwQkE9PSIsInZhbHVlIjoiekk3ZXFLSVVENk1PK1FUaVNGTDg4UT09IiwibWFjIjoiYjg3ZmNjOGNmZWQ0OTRjZmJjMTQ3MWRlY2E5OWQwZmM2YTYzMTA1YzllOWRjZjU4MTdkMDczYmQwOWQ1YWFmMyJ9', NULL, NULL, 1, 'active', 1, 'admin', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id` bigint UNSIGNED NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidder_unique_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bid_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bid_start_date` datetime DEFAULT NULL,
  `bid_end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auction_auction_id_unique` (`auction_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bid_bid_unique_id_unique` (`bid_unique_id`);

--
-- Indexes for table `bidders`
--
ALTER TABLE `bidders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bidders_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `bidders_bidder_unique_id_unique` (`bidder_unique_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_item_unique_id_unique` (`item_unique_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpesa_tokens`
--
ALTER TABLE `mpesa_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pass_key`
--
ALTER TABLE `pass_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_bidder_unique_id_unique` (`bidder_unique_id`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bidders`
--
ALTER TABLE `bidders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mpesa_tokens`
--
ALTER TABLE `mpesa_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pass_key`
--
ALTER TABLE `pass_key`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
