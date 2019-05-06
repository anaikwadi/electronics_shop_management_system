-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2019 at 11:25 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sai`
--

-- --------------------------------------------------------

--
-- Table structure for table `AboutUs`
--

CREATE TABLE `AboutUs` (
  `id` bigint(20) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `type` bigint(20) NOT NULL,
  `fa_icon` varchar(100) DEFAULT NULL,
  `bg_color` varchar(1000) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `AboutUs`
--

INSERT INTO `AboutUs` (`id`, `title`, `description`, `type`, `fa_icon`, `bg_color`, `updated_at`, `created_at`) VALUES
(1, 'WELCOME TO SAI ELECTRONICS', 'Launched in 2018, Its kind large format specialist retail store that catered to all multi-brand digital gadgets and home electronic needs in India. Synonyms for all electronics needs, with its tech-savvy staff, product range, online presence and the will to help customers. Now shop for your favourite Televisions, Refrigerators, Air-Conditioners, Washing Machines, Kitchen Appliances and products from a host of other categories available. Browse through our electronics brands featured on our site with expert descriptions to help you arrive at the right buying decision.', 1, NULL, '', '2019-01-11 06:34:03', '2018-12-23 06:43:09'),
(2, 'Thoughts Leadership Platform', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 2, 'fa-snowflake-o', 'starship', '2018-12-23 07:49:57', '2018-12-23 07:08:30'),
(3, 'Corporate world Platform', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 2, 'fa-circle-o-notch', 'chathams', '2018-12-23 07:48:12', '2018-12-23 07:08:30'),
(6, 'End to End Testing Platform', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 2, 'fa-hourglass-o', 'matisse', '2018-12-23 07:10:08', '2018-12-23 07:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `Add_to_Cart_Items`
--

CREATE TABLE `Add_to_Cart_Items` (
  `id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `actual_price` bigint(20) NOT NULL,
  `offer_price` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `AdminOurTeam`
--

CREATE TABLE `AdminOurTeam` (
  `id` bigint(20) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `facebook` varchar(5000) NOT NULL,
  `designation` varchar(1000) NOT NULL,
  `profile_image` varchar(5000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ContactUsEnquiries`
--

CREATE TABLE `ContactUsEnquiries` (
  `id` bigint(20) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `enquiry_query` varchar(10000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ContactUsEnquiries`
--

INSERT INTO `ContactUsEnquiries` (`id`, `name`, `mobile`, `email`, `enquiry_query`, `updated_at`, `created_at`) VALUES
(1, 'Arvind', 8275456718, 'naikwadi.jsp@gmail.com', 'Test123', '2018-12-28 11:56:27', '2018-12-28 11:56:27'),
(2, 'Arvind2', 8275456718, 'naikwadi.jsp@gmail.com', '2', '2018-12-28 11:57:08', '2018-12-28 11:57:08'),
(3, 'Arvind', 8275456718, 'naikwadi.jsp@gmail.com', '333', '2018-12-28 12:06:29', '2018-12-28 12:06:29'),
(4, 'Arvind3', 8275456718, 'naikwadi.jsp@gmail.com', 'Test4', '2018-12-29 05:49:56', '2018-12-29 05:49:56'),
(5, 'Arvind2', 8275456718, 'naikwadi.jsp@gmail.com', '5', '2018-12-29 11:22:11', '2018-12-29 11:22:11'),
(6, 'Arvind', 8275456718, 'naikwadi.jsp@gmail.com', '7', '2018-12-29 11:25:33', '2018-12-29 11:25:33'),
(7, 'Arvind2', 8275456718, 'naikwadi.jsp@gmail.com', 'asdfghjkl;', '2018-12-29 11:42:51', '2018-12-29 11:42:51'),
(8, 'Arvind', 8275456718, 'naikwadi.jsp@gmail.com', 'asdfghjkl', '2019-01-02 05:18:53', '2019-01-02 05:18:53'),
(9, 'mayur', 8275456718, 'naikwadi.jsp@gmail.com', 'test', '2019-01-04 03:35:58', '2019-01-04 03:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `ContactUsMap`
--

CREATE TABLE `ContactUsMap` (
  `id` bigint(20) NOT NULL,
  `iframe` varchar(10000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ContactUsMap`
--

INSERT INTO `ContactUsMap` (`id`, `iframe`, `updated_at`, `created_at`) VALUES
(1, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30082.868249097348!2d73.98820979796635!3d19.526215153050405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdd08ecfca579ed%3A0xbaf71c20284b510b!2sAkole%2C+Maharashtra+422601!5e0!3m2!1sen!2sin!4v1546079672031\" width=\"70%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2018-12-29 10:44:36', '2018-12-29 10:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `id` bigint(20) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `address` varchar(5000) NOT NULL,
  `bill_number` varchar(5000) DEFAULT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`id`, `name`, `mobile`, `email`, `address`, `bill_number`, `month`, `year`, `updated_at`, `created_at`) VALUES
(1, 'Swapnali Naikwadi', 8275456718, 'swapnali@gmail.com', 'Akole', NULL, 'Dec', '2018', '2018-12-12 22:40:42', '2018-12-12 22:40:42'),
(5, 'Test Record', 8529637415, 'test@gmail.com', 'Akole', '10', 'Dec', '2018', '2018-12-12 23:17:45', '2018-12-12 22:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `DailyExpenses`
--

CREATE TABLE `DailyExpenses` (
  `id` bigint(20) NOT NULL,
  `name` varchar(5000) NOT NULL,
  `expense_amount` varchar(5000) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DailyExpenses`
--

INSERT INTO `DailyExpenses` (`id`, `name`, `expense_amount`, `month`, `year`, `updated_at`, `created_at`) VALUES
(1, 'test', '100', 'Jan', '2019', '2019-01-11 05:15:42', '2019-01-11 05:15:42'),
(2, 'test1', '1001', 'Jan', '2019', '2019-01-11 05:15:46', '2019-01-11 05:15:46'),
(3, 'test1', '100', 'Jan', '2019', '2019-01-11 05:15:50', '2019-01-11 05:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `HomePageVideo`
--

CREATE TABLE `HomePageVideo` (
  `id` bigint(20) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(5000) NOT NULL,
  `sequence` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `HomePageVideo`
--

INSERT INTO `HomePageVideo` (`id`, `name`, `url`, `sequence`, `status`, `updated_at`, `created_at`) VALUES
(1, 'apple mac air laptop', 'hs1HoLs4SD0', 1, 1, '2018-12-27 13:00:54', '2018-12-22 11:38:41'),
(3, 'apple mobile', 'dKWscj8p_so', 2, 1, '2018-12-27 13:00:42', '2018-12-22 12:25:14'),
(4, 'lenovo laptop thinkpad official', 'puJewEKS_1Y', 3, 1, '2018-12-27 13:00:29', '2018-12-27 11:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `LatestOfferImagesAttachment`
--

CREATE TABLE `LatestOfferImagesAttachment` (
  `id` bigint(20) NOT NULL,
  `purchase_id` bigint(20) NOT NULL,
  `latest_offer_id` bigint(20) NOT NULL,
  `file_name` varchar(5000) NOT NULL,
  `file_size` varchar(1000) NOT NULL,
  `file_type` varchar(1000) NOT NULL,
  `file_path_db` varchar(10000) NOT NULL,
  `file_path` varchar(10000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LatestOfferImagesAttachment`
--

INSERT INTO `LatestOfferImagesAttachment` (`id`, `purchase_id`, `latest_offer_id`, `file_name`, `file_size`, `file_type`, `file_path_db`, `file_path`, `updated_at`, `created_at`) VALUES
(1, 2, 1, '\"1546868544Screenshot from 2018-08-30 16-23-44.png\"', '370457', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 1\\/1546868544Screenshot from 2018-08-30 16-23-44.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 1\\/1546868544Screenshot from 2018-08-30 16-23-44.png\"', '2019-01-07 13:42:24', '2019-01-07 13:42:24'),
(2, 2, 1, '\"1546868544Screenshot from 2018-09-07 14-43-58.png\"', '224811', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 1\\/1546868544Screenshot from 2018-09-07 14-43-58.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 1\\/1546868544Screenshot from 2018-09-07 14-43-58.png\"', '2019-01-07 13:42:24', '2019-01-07 13:42:24'),
(3, 2, 1, '\"1546868544Screenshot from 2018-09-07 14-44-05.png\"', '211021', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 1\\/1546868544Screenshot from 2018-09-07 14-44-05.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 1\\/1546868544Screenshot from 2018-09-07 14-44-05.png\"', '2019-01-07 13:42:24', '2019-01-07 13:42:24'),
(4, 2, 1, '\"1546868544Screenshot from 2018-09-07 14-44-21.png\"', '212329', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 1\\/1546868544Screenshot from 2018-09-07 14-44-21.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 1\\/1546868544Screenshot from 2018-09-07 14-44-21.png\"', '2019-01-07 13:42:24', '2019-01-07 13:42:24'),
(5, 2, 1, '\"1546868544Screenshot from 2018-09-07 14-44-30.png\"', '199943', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 1\\/1546868544Screenshot from 2018-09-07 14-44-30.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 1\\/1546868544Screenshot from 2018-09-07 14-44-30.png\"', '2019-01-07 13:42:24', '2019-01-07 13:42:24'),
(6, 3, 2, '\"1546868558Screenshot from 2018-09-07 14-44-40.png\"', '210480', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 2\\/1546868558Screenshot from 2018-09-07 14-44-40.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 2\\/1546868558Screenshot from 2018-09-07 14-44-40.png\"', '2019-01-07 13:42:38', '2019-01-07 13:42:38'),
(7, 3, 2, '\"1546868558Screenshot from 2018-09-07 14-44-48.png\"', '200092', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 2\\/1546868558Screenshot from 2018-09-07 14-44-48.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 2\\/1546868558Screenshot from 2018-09-07 14-44-48.png\"', '2019-01-07 13:42:38', '2019-01-07 13:42:38'),
(8, 3, 2, '\"1546868558Screenshot from 2018-09-11 17-23-37.png\"', '1137070', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 2\\/1546868558Screenshot from 2018-09-11 17-23-37.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 2\\/1546868558Screenshot from 2018-09-11 17-23-37.png\"', '2019-01-07 13:42:38', '2019-01-07 13:42:38'),
(9, 3, 2, '\"1546868558Screenshot from 2018-10-26 09-19-57.png\"', '365368', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 2\\/1546868558Screenshot from 2018-10-26 09-19-57.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 2\\/1546868558Screenshot from 2018-10-26 09-19-57.png\"', '2019-01-07 13:42:38', '2019-01-07 13:42:38'),
(10, 4, 3, '\"1546868580Api Report 2.png\"', '535111', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 3\\/1546868580Api Report 2.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 3\\/1546868580Api Report 2.png\"', '2019-01-07 13:43:00', '2019-01-07 13:43:00'),
(11, 4, 3, '\"1546868580API Report.png\"', '528597', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 3\\/1546868580API Report.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 3\\/1546868580API Report.png\"', '2019-01-07 13:43:00', '2019-01-07 13:43:00'),
(12, 4, 3, '\"1546868580API Report 3.png\"', '542493', '\"png\"', '\"storage\\/images\\/LatestOffersImages\\/Model 3\\/1546868580API Report 3.png\"', '\"public\\/images\\/LatestOffersImages\\/Model 3\\/1546868580API Report 3.png\"', '2019-01-07 13:43:00', '2019-01-07 13:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `LatestOffers_system`
--

CREATE TABLE `LatestOffers_system` (
  `id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `actual_price` bigint(20) NOT NULL,
  `display_price` bigint(20) NOT NULL,
  `offer_price` bigint(20) NOT NULL,
  `video_link` varchar(5000) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MasterEntryCompany`
--

CREATE TABLE `MasterEntryCompany` (
  `id` bigint(20) NOT NULL,
  `company_name` varchar(10000) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MasterEntryCompany`
--

INSERT INTO `MasterEntryCompany` (`id`, `company_name`, `month`, `year`, `updated_at`, `created_at`) VALUES
(1, 'LG TV', 'Jan', '2019', '2019-01-14 09:01:36', '2019-01-14 08:48:49'),
(2, 'Micromax TV', 'Jan', '2019', '2019-01-14 09:01:36', '2019-01-14 08:48:49'),
(3, 'Onida TV', 'Jan', '2019', '2019-01-14 09:01:36', '2019-01-14 08:48:49'),
(4, 'Panasonic Viera TV', 'Jan', '2019', '2019-01-14 09:01:36', '2019-01-14 08:48:49'),
(5, 'Philips TV', 'Jan', '2019', '2019-01-14 09:01:36', '2019-01-14 08:48:49'),
(6, 'Samsung TV', 'Jan', '2019', '2019-01-14 09:01:36', '2019-01-14 08:48:49'),
(7, 'Sharp TV', 'Jan', '2019', '2019-01-14 09:01:36', '2019-01-14 08:48:49'),
(8, 'Sony TV', 'Jan', '2019', '2019-01-14 09:01:36', '2019-01-14 08:48:49'),
(9, 'Toshiba TV', 'Jan', '2019', '2019-01-14 09:01:36', '2019-01-14 08:48:49'),
(10, 'Videocon TV', 'Jan', '2019', '2019-01-14 09:01:36', '2019-01-14 08:48:49'),
(11, 'Test', 'Jan', '2019', '2019-01-15 10:37:58', '2019-01-15 10:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `MasterEntryModel`
--

CREATE TABLE `MasterEntryModel` (
  `id` bigint(20) NOT NULL,
  `model_name` varchar(10000) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MasterEntryModel`
--

INSERT INTO `MasterEntryModel` (`id`, `model_name`, `month`, `year`, `updated_at`, `created_at`) VALUES
(1, 'LG 32LK526BPTA 32 Inch HD Ready Smart LED TV', 'Jan', '2019', '2019-01-14 09:01:27', '2019-01-14 08:40:27'),
(2, 'LG 32LK616BPTB 32 Inch 4K Ultra HD Smart LED TV', 'Jan', '2019', '2019-01-14 09:01:27', '2019-01-14 08:40:27'),
(3, 'LG 43LK5760PTA 43 Inch 4K Ultra HD Smart LED TV', 'Jan', '2019', '2019-01-14 09:01:27', '2019-01-14 08:40:27'),
(4, 'LG 32LJ573D HD Ready Smart LED TV', 'Jan', '2019', '2019-01-14 09:01:27', '2019-01-14 08:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_06_141902_laratrust_setup_tables', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'Create Users', 'Create Users', '2018-12-11 22:08:18', '2018-12-11 22:08:18'),
(2, 'read-users', 'Read Users', 'Read Users', '2018-12-11 22:08:19', '2018-12-11 22:08:19'),
(3, 'update-users', 'Update Users', 'Update Users', '2018-12-11 22:08:19', '2018-12-11 22:08:19'),
(4, 'delete-users', 'Delete Users', 'Delete Users', '2018-12-11 22:08:19', '2018-12-11 22:08:19'),
(5, 'read-profile', 'Read Profile', 'Read Profile', '2018-12-11 22:08:19', '2018-12-11 22:08:19'),
(6, 'update-profile', 'Update Profile', 'Update Profile', '2018-12-11 22:08:19', '2018-12-11 22:08:19'),
(7, 'create-support', 'Create Support', 'Create Support', '2018-12-11 22:08:21', '2018-12-11 22:08:21'),
(8, 'read-support', 'Read Support', 'Read Support', '2018-12-11 22:08:21', '2018-12-11 22:08:21'),
(9, 'update-support', 'Update Support', 'Update Support', '2018-12-11 22:08:21', '2018-12-11 22:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_system`
--

CREATE TABLE `purchase_system` (
  `id` bigint(20) NOT NULL,
  `bill_number` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `company_name` varchar(1000) NOT NULL,
  `model_name` varchar(1000) NOT NULL,
  `hsn` varchar(1000) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `unit_price` varchar(200) NOT NULL,
  `gst` varchar(500) NOT NULL,
  `percent_gst` bigint(20) NOT NULL,
  `sgst` varchar(500) NOT NULL,
  `cgst` varchar(500) NOT NULL,
  `total` bigint(20) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_system`
--

INSERT INTO `purchase_system` (`id`, `bill_number`, `vendor_id`, `company_name`, `model_name`, `hsn`, `quantity`, `unit_price`, `gst`, `percent_gst`, `sgst`, `cgst`, `total`, `month`, `year`, `updated_at`, `created_at`) VALUES
(1, 0, 0, '0', '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', '2018-12-12 01:13:54', '2018-12-12 01:13:54'),
(2, 1, 1, '10', '4', '1', 10, '84.75', '15.26', 18, '7.63', '7.63', 1000, 'Jan', '2019', '2019-01-14 10:27:02', '2019-01-14 10:27:02'),
(3, 1, 1, '9', '3', '2', 20, '169.49', '30.51', 18, '15.25', '15.25', 4000, 'Jan', '2019', '2019-01-14 10:27:02', '2019-01-14 10:27:02'),
(4, 2, 1, '10', '4', '1', 20, '84.75', '15.26', 18, '7.63', '7.63', 2000, 'Jan', '2019', '2019-01-14 10:42:17', '2019-01-14 10:27:24'),
(5, 3, 1, '10', '4', '4', 2, '127.12', '22.88', 18, '11.44', '11.44', 300, 'Jan', '2019', '2019-01-16 04:48:46', '2019-01-16 04:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `Quotation_system`
--

CREATE TABLE `Quotation_system` (
  `id` bigint(20) NOT NULL,
  `bill_number` bigint(20) DEFAULT NULL,
  `item_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) NOT NULL,
  `actual_price` bigint(20) NOT NULL,
  `sale_price` bigint(20) NOT NULL,
  `percent_gst` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `month` varchar(100) NOT NULL,
  `year` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Quotation_system`
--

INSERT INTO `Quotation_system` (`id`, `bill_number`, `item_id`, `customer_id`, `quantity`, `actual_price`, `sale_price`, `percent_gst`, `total`, `month`, `year`, `status`, `updated_at`, `created_at`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, '0', 0, 1, '2018-12-31 05:11:59', '2018-12-31 05:11:59'),
(2, 1, 2, 1, 1, 100, 220, 18, 220, 'Jan', 2019, 1, '2019-01-14 11:49:09', '2019-01-14 11:48:53'),
(3, 1, 3, 1, 1, 200, 220, 18, 220, 'Jan', 2019, 1, '2019-01-14 11:49:09', '2019-01-14 11:49:06'),
(4, 2, 4, 1, 1, 100, 110, 18, 110, 'Jan', 2019, 1, '2019-01-14 12:02:12', '2019-01-14 12:02:09'),
(5, 3, 3, 1, 5, 200, 250, 18, 1250, 'Jan', 2019, 1, '2019-01-16 04:57:44', '2019-01-16 04:57:40'),
(6, 4, 3, 5, 5, 200, 250, 18, 1250, 'Jan', 2019, 1, '2019-01-16 05:05:36', '2019-01-16 05:05:33'),
(8, 5, 3, 5, 5, 200, 250, 18, 1250, 'Jan', 2019, 1, '2019-01-16 05:08:35', '2019-01-16 05:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2018-12-11 22:08:18', '2018-12-11 22:08:18'),
(2, 'administrator', 'Administrator', 'Administrator', '2018-12-11 22:08:20', '2018-12-11 22:08:20'),
(3, 'user', 'User', 'User', '2018-12-11 22:08:20', '2018-12-11 22:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(3, 3, 'App\\Models\\User'),
(4, 3, 'App\\Models\\User'),
(5, 3, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `sale_system`
--

CREATE TABLE `sale_system` (
  `id` bigint(20) NOT NULL,
  `bill_number` bigint(20) DEFAULT NULL,
  `item_id` bigint(20) NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `quantity` bigint(20) NOT NULL,
  `actual_price` bigint(20) NOT NULL,
  `sale_price` bigint(20) NOT NULL,
  `percent_gst` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `payment_method` bigint(20) DEFAULT NULL,
  `paid_amount` bigint(20) DEFAULT NULL,
  `balance_amount` bigint(20) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `month` varchar(100) NOT NULL,
  `year` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_system`
--

INSERT INTO `sale_system` (`id`, `bill_number`, `item_id`, `customer_id`, `quantity`, `actual_price`, `sale_price`, `percent_gst`, `total`, `payment_method`, `paid_amount`, `balance_amount`, `due_date`, `month`, `year`, `status`, `updated_at`, `created_at`) VALUES
(1, 0, 0, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, '0', 0, 1, '2018-12-21 12:11:31', '2018-12-21 12:11:31'),
(11, 1, 2, 1, 1, 100, 110, 18, 110, 1, 110, 0, NULL, 'Jan', 2019, 1, '2019-01-14 11:53:24', '2019-01-14 11:53:15'),
(12, 2, 3, 5, 5, 200, 250, 18, 1250, 1, 1250, NULL, '2019-01-31', 'Jan', 2019, 1, '2019-01-14 12:05:40', '2019-01-14 12:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `StockAvailable`
--

CREATE TABLE `StockAvailable` (
  `id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `model_id` bigint(20) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `available_quantity` bigint(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StockAvailable`
--

INSERT INTO `StockAvailable` (`id`, `vendor_id`, `item_id`, `company_id`, `model_id`, `quantity`, `available_quantity`, `updated_at`, `created_at`) VALUES
(1, 0, 0, 0, 0, 0, 0, '2019-01-14 09:52:39', '2019-01-14 09:52:39'),
(2, 1, 2, 10, 4, 10, 31, '2019-01-16 04:48:46', '2019-01-14 10:27:02'),
(3, 1, 3, 9, 3, 20, 15, '2019-01-14 12:05:04', '2019-01-14 10:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `Testimonial`
--

CREATE TABLE `Testimonial` (
  `id` bigint(20) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `company_name` varchar(1000) NOT NULL,
  `designation` varchar(1000) NOT NULL,
  `quote` varchar(10000) NOT NULL,
  `image_path` varchar(5000) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Testimonial`
--

INSERT INTO `Testimonial` (`id`, `name`, `company_name`, `designation`, `quote`, `image_path`, `user_id`, `status`, `updated_at`, `created_at`) VALUES
(1, 'test', 'Arvind', 'Arvind', 'Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind', 'storage/images/Testimonials/1546770606Screenshot from 2018-09-07 14-43-58.png', 5, 1, '2019-01-06 10:30:55', '2019-01-06 10:30:06'),
(3, 'test', 'Arvind', 'Arvind', 'Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind Arvind', 'storage/images/Testimonials/1546770704Screenshot from 2018-09-11 17-23-37.png', 5, 1, '2019-01-06 10:31:50', '2019-01-06 10:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'superadministrator@lrv.com', '$2y$10$Rpc3Jw22MHFEllyKQpkbbufbqYJ7GgglANeUsQyXFbrXV1N2CD80W', 'sKFLwML8kLHH32AA97SQbpUamGNdEHm0wQjUdpOewLy7OpeDK3h3AZIWztIF', '2018-12-11 22:08:19', '2018-12-23 13:27:39'),
(2, 'Administrator', 'administrator@lrv.com', '$2y$10$Rpc3Jw22MHFEllyKQpkbbufbqYJ7GgglANeUsQyXFbrXV1N2CD80W', 'skwosGrF8V6l9p3427wPjK8DmNDQN3glS6VqmmKrpZCOT9UKPM4ZX0FR6hex', '2018-12-11 22:08:20', '2018-12-11 22:08:20'),
(3, 'User', 'user@lrv.com', '$2y$10$Rpc3Jw22MHFEllyKQpkbbufbqYJ7GgglANeUsQyXFbrXV1N2CD80W', 'MTqPXFFeXUJpxIzqSWoXYEfSuYVi0gqWpeGZw5OOPCwZHpgVLVtNrTSuFlwR', '2018-12-11 22:08:21', '2018-12-11 22:08:21'),
(4, 'Swapnali', 'pansareswapnalis@gmail.com', '$2y$10$RLo3jI6eITLAqlrPjitEV.mI/WPA9ru/ZGKnbAMnKEXFVZImXCWXS', '1Vh71YohcxxGFJ2EYW99iyewaPB3cralIOKWweH7cqqFnxwHtjugzuD9ZcSw', '2019-01-05 08:26:09', '2019-01-05 08:26:09'),
(5, 'test', 'test@gmail.com', '$2y$10$Hn8Dbgu06cSYVRk53SfmEOoJHYkeOlnE1lM3H8Und3.c3UUbBnAwq', '4xvDB2CnmC1ky3FBeDH76lSHqMYL5igkimZEdSj0vszmwy612duqpnomi9wG', '2019-01-06 06:05:32', '2019-01-06 06:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` bigint(20) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `address` varchar(5000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `mobile`, `email`, `address`, `updated_at`, `created_at`) VALUES
(1, 'Agasti', 8379890491, 'agasti1@gmail.com', 'Akole', '2018-12-11 06:29:02', '2018-12-11 06:17:23'),
(2, 'Test', 4569871335, 'user@lrv.com', 'Akole', '2018-12-12 06:24:04', '2018-12-12 06:24:04'),
(3, 'Swapnali', 4569871235, 'Swapnali@gmail.com', 'Akole', '2018-12-14 10:11:18', '2018-12-14 10:11:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AboutUs`
--
ALTER TABLE `AboutUs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Add_to_Cart_Items`
--
ALTER TABLE `Add_to_Cart_Items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `AdminOurTeam`
--
ALTER TABLE `AdminOurTeam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ContactUsEnquiries`
--
ALTER TABLE `ContactUsEnquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ContactUsMap`
--
ALTER TABLE `ContactUsMap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DailyExpenses`
--
ALTER TABLE `DailyExpenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `HomePageVideo`
--
ALTER TABLE `HomePageVideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `LatestOfferImagesAttachment`
--
ALTER TABLE `LatestOfferImagesAttachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `LatestOffers_system`
--
ALTER TABLE `LatestOffers_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MasterEntryCompany`
--
ALTER TABLE `MasterEntryCompany`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MasterEntryModel`
--
ALTER TABLE `MasterEntryModel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`permission_id`,`user_id`,`user_type`);

--
-- Indexes for table `purchase_system`
--
ALTER TABLE `purchase_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Quotation_system`
--
ALTER TABLE `Quotation_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sale_system`
--
ALTER TABLE `sale_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `StockAvailable`
--
ALTER TABLE `StockAvailable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Testimonial`
--
ALTER TABLE `Testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AboutUs`
--
ALTER TABLE `AboutUs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Add_to_Cart_Items`
--
ALTER TABLE `Add_to_Cart_Items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `AdminOurTeam`
--
ALTER TABLE `AdminOurTeam`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ContactUsEnquiries`
--
ALTER TABLE `ContactUsEnquiries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ContactUsMap`
--
ALTER TABLE `ContactUsMap`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `DailyExpenses`
--
ALTER TABLE `DailyExpenses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `HomePageVideo`
--
ALTER TABLE `HomePageVideo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `LatestOfferImagesAttachment`
--
ALTER TABLE `LatestOfferImagesAttachment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `LatestOffers_system`
--
ALTER TABLE `LatestOffers_system`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `MasterEntryCompany`
--
ALTER TABLE `MasterEntryCompany`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `MasterEntryModel`
--
ALTER TABLE `MasterEntryModel`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `purchase_system`
--
ALTER TABLE `purchase_system`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Quotation_system`
--
ALTER TABLE `Quotation_system`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sale_system`
--
ALTER TABLE `sale_system`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `StockAvailable`
--
ALTER TABLE `StockAvailable`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Testimonial`
--
ALTER TABLE `Testimonial`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
