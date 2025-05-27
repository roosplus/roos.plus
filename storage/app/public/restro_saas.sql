-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2025 at 11:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restro`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `about_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `age_verification`
--

CREATE TABLE `age_verification` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `age_verification_on_off` int(11) DEFAULT NULL COMMENT '1=yes,2=no',
  `popup_type` varchar(255) DEFAULT NULL,
  `min_age` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `android_link` varchar(255) DEFAULT NULL,
  `ios_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `mobile_app_on_off` int(11) DEFAULT NULL COMMENT '1=yes,2=no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 2 COMMENT '1=Yes,2=No',
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No	',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner_image`
--

CREATE TABLE `banner_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `reorder_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `reorder_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_image` varchar(255) DEFAULT NULL,
  `item_price` varchar(255) NOT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `extras_id` varchar(255) DEFAULT NULL,
  `extras_name` varchar(255) DEFAULT NULL,
  `extras_price` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `variants_id` varchar(255) DEFAULT NULL,
  `variants_name` varchar(255) DEFAULT NULL,
  `variants_price` varchar(255) DEFAULT NULL,
  `buynow` int(11) DEFAULT NULL COMMENT '0-addtocart,1=buynow\r\n',
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Yes . 2 = No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Yes,2=No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 2 COMMENT '1=Yes,2=No',
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_domain`
--

CREATE TABLE `custom_domain` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `requested_domain` text NOT NULL,
  `current_domain` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_status`
--

CREATE TABLE `custom_status` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=default,2=process,3=complete,4=cancel',
  `is_available` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 2,
  `order_type` int(11) NOT NULL DEFAULT 1 COMMENT '1=delivery,2=pickup,3=dinein,4=pos',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custom_status`
--

INSERT INTO `custom_status` (`id`, `reorder_id`, `vendor_id`, `name`, `type`, `is_available`, `is_deleted`, `order_type`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'Pending', 1, 1, 2, 1, '2023-12-26 05:25:24', '2023-12-26 05:25:24'),
(2, 0, 1, 'Accepted', 2, 1, 2, 1, '2023-12-26 05:25:37', '2023-12-26 05:25:37'),
(3, 0, 1, 'Out For Delivery', 2, 1, 2, 1, '2023-12-26 05:25:52', '2023-12-26 05:25:52'),
(4, 0, 1, 'Complete', 3, 1, 2, 1, '2023-12-26 05:26:05', '2023-12-26 05:26:05'),
(5, 0, 1, 'Cancel', 4, 1, 2, 1, '2023-12-26 05:26:15', '2023-12-26 05:26:15'),
(6, 0, 1, 'Pending', 1, 1, 2, 2, '2023-12-26 05:26:29', '2023-12-26 05:26:29'),
(7, 0, 1, 'Accepted', 2, 1, 2, 2, '2023-12-26 05:26:41', '2023-12-26 05:26:41'),
(8, 0, 1, 'Waiting For Pickup', 2, 1, 2, 2, '2023-12-26 05:27:06', '2023-12-26 05:27:06'),
(9, 0, 1, 'Complete', 3, 1, 2, 2, '2023-12-26 05:27:17', '2023-12-26 05:27:17'),
(10, 0, 1, 'Cancel', 4, 1, 2, 2, '2023-12-26 05:27:33', '2023-12-26 05:27:33'),
(11, 0, 1, 'Pending', 1, 1, 2, 3, '2023-12-26 05:27:47', '2023-12-26 05:27:47'),
(12, 0, 1, 'Accepted', 2, 1, 2, 3, '2023-12-26 05:28:00', '2023-12-26 05:28:00'),
(13, 0, 1, 'In Progress', 2, 1, 2, 3, '2023-12-26 05:28:15', '2023-12-26 05:28:15'),
(14, 0, 1, 'Complete', 3, 1, 2, 3, '2023-12-26 05:28:34', '2023-12-26 05:28:34'),
(15, 0, 1, 'Cancel', 4, 1, 2, 3, '2023-12-26 05:28:48', '2023-12-26 05:28:48'),
(16, 0, 1, 'Pending', 1, 1, 2, 4, '2023-12-26 05:28:59', '2023-12-26 05:28:59'),
(17, 0, 1, 'Complete', 3, 1, 2, 4, '2023-12-26 05:29:17', '2023-12-26 05:29:17'),
(18, 0, 1, 'Cancel', 4, 1, 2, 4, '2023-12-26 05:29:30', '2023-12-26 05:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firebase`
--

CREATE TABLE `firebase` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` longtext NOT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1=yes,2=no',
  `is_deleted` int(11) NOT NULL DEFAULT 2 COMMENT '1=yes,2=no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footerfeatures`
--

CREATE TABLE `footerfeatures` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `global_extras`
--

CREATE TABLE `global_extras` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `description` text DEFAULT NULL,
  `item_price` float NOT NULL,
  `item_original_price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `tax` varchar(255) DEFAULT '0',
  `slug` text DEFAULT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1,
  `has_variants` int(11) NOT NULL DEFAULT 2,
  `has_extras` int(11) DEFAULT NULL COMMENT '1=yes,2=no',
  `variants_json` longtext DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `stock_management` int(11) DEFAULT NULL,
  `min_order` int(11) DEFAULT NULL,
  `max_order` int(11) DEFAULT NULL,
  `low_qty` int(11) DEFAULT NULL,
  `top_deals` int(11) DEFAULT 2,
  `is_imported` int(11) DEFAULT 2,
  `avg_ratting` float NOT NULL,
  `video_url` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_images`
--

CREATE TABLE `item_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `reorder_id` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `is_imported` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `layout` int(11) NOT NULL DEFAULT 1 COMMENT '1=ltr,2=rtl',
  `is_default` int(11) NOT NULL DEFAULT 2 COMMENT '1 = yes , 2 = no',
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1=yes,2=no',
  `is_deleted` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `image`, `layout`, `is_default`, `is_available`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 'flag-6512d2e343e92.png', 1, 1, 1, 2, '2022-12-13 05:15:46', '2023-09-26 08:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_history`
--

CREATE TABLE `loyalty_history` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 = Plus , 2 = Minus',
  `points` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_program`
--

CREATE TABLE `loyalty_program` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `points` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `per_coin_amount` varchar(255) NOT NULL,
  `is_available` int(11) NOT NULL COMMENT '1 = Yes, 2 = no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_12_20_101946_create_settings_table', 2),
(3, '2021_12_20_121616_create_categories_table', 3),
(4, '2021_12_22_072131_create_cuisines_table', 4),
(5, '2021_12_23_065134_create_menuses_table', 5),
(6, '2014_10_12_100000_create_password_resets_table', 6),
(7, '2019_08_19_000000_create_failed_jobs_table', 6),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 6),
(9, '2022_11_14_051836_create_banner_image_table', 6),
(10, '2022_11_14_053221_create_banner_image_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `vendor_note` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_number` varchar(100) NOT NULL,
  `order_number_start` int(11) DEFAULT NULL,
  `order_number_digit` int(11) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `payment_id` text DEFAULT NULL,
  `sub_total` varchar(255) NOT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `tax_name` varchar(255) DEFAULT NULL,
  `grand_total` varchar(255) NOT NULL,
  `order_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Delivery (Dine_in - POS) , 2 = Pickup (TakeAway -POS)\r\n3 = Dine In (Front)\r\n	',
  `table_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `building` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `delivery_area` varchar(255) DEFAULT NULL,
  `delivery_charge` varchar(50) DEFAULT NULL,
  `discount_amount` varchar(255) DEFAULT NULL,
  `offer_type` varchar(255) DEFAULT NULL,
  `couponcode` varchar(255) DEFAULT NULL,
  `order_notes` text DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `customer_email` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  `delivery_time` varchar(255) DEFAULT NULL,
  `order_from` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1  = pending , 2 = processing , 3 = deliverd , 4 = cancelled',
  `status_type` int(11) DEFAULT NULL,
  `payment_status` int(11) NOT NULL COMMENT '1=unpaid,2=paid\r\n',
  `is_notification` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Unread , 2 = Read',
  `loyalty_amount` varchar(255) DEFAULT NULL,
  `screenshot` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_image` varchar(255) DEFAULT NULL,
  `extras_id` varchar(255) DEFAULT NULL,
  `extras_name` varchar(255) DEFAULT NULL,
  `extras_price` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `variants_id` varchar(255) DEFAULT NULL,
  `variants_name` varchar(255) DEFAULT NULL,
  `variants_price` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_settings`
--

CREATE TABLE `other_settings` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `trusted_badge_image_1` text DEFAULT NULL,
  `trusted_badge_image_2` text DEFAULT NULL,
  `trusted_badge_image_3` text DEFAULT NULL,
  `trusted_badge_image_4` text DEFAULT NULL,
  `safe_secure_checkout_payment_selection` varchar(255) DEFAULT NULL,
  `safe_secure_checkout_text` varchar(255) DEFAULT NULL,
  `safe_secure_checkout_text_color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reorder_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `unique_identifier` varchar(255) DEFAULT NULL,
  `payment_name` varchar(255) NOT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `currency` varchar(255) DEFAULT '',
  `image` varchar(255) NOT NULL,
  `public_key` text DEFAULT NULL,
  `secret_key` text DEFAULT NULL,
  `encryption_key` text DEFAULT NULL,
  `environment` int(11) NOT NULL,
  `bank_name` text DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `bank_ifsc_code` varchar(255) DEFAULT NULL,
  `base_url_by_region` text DEFAULT NULL,
  `is_available` int(11) NOT NULL,
  `payment_description` varchar(255) DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `reorder_id`, `vendor_id`, `unique_identifier`, `payment_name`, `payment_type`, `currency`, `image`, `public_key`, `secret_key`, `encryption_key`, `environment`, `bank_name`, `account_number`, `account_holder_name`, `bank_ifsc_code`, `base_url_by_region`, `is_available`, `payment_description`, `is_activate`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'COD', 1, '', 'cod.png', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, '', 1, NULL, 1, '2021-09-01 16:06:58', '2025-02-18 06:38:47'),
(2, 3, 1, 'razorpay', 'RazorPay', 2, 'INR', 'razorpay.png', 'rzp_test_4r8y0wDMkrUDFn', 'nEDuJlpL3x2BqHxYlQBYtrto', '', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-09-01 16:06:58', '2025-02-18 06:38:44'),
(3, 0, 1, 'stripe', 'Stripe', 3, 'USD', 'stripe.png', 'pk_test_51IjNgIJwZppK21ZQa6e7ZVOImwJ2auI54TD6xHici94u7DD5mhGf1oaBiDyL9mX7PbN5nt6Weap4tmGWLRIrslCu00d8QgQ3nI', 'sk_test_51IjNgIJwZppK21ZQK85uLARMdhtuuhA81PB24VDfiqSW8SXQZKrZzvbpIkigEb27zZPBMF4UEG7PK9587Xresuc000x8CdE22A', '', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-09-01 16:06:58', '2025-02-18 06:38:47'),
(4, 2, 1, 'flutterwave', 'Flutterwave', 4, 'NGN', 'flutterwave.png', 'FLWPUBK_TEST-61c94068c4a44548a771cc7cf9548d05-X', 'FLWSECK_TEST-1140781769b7bd5cfd6b3fb6d5704017-X', 'FLWSECK_TEST863a39eb1475', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-10-20 09:28:05', '2024-04-19 08:57:51'),
(5, 2, 1, 'paystack', 'Paystack', 5, 'GHS', 'paystack.png', 'pk_test_8a6a139a3bae6e41cbbbc41f4d7b65d4da9f7967', 'sk_test_6ab143b6f0c2a209373adeef55a64411c1a91ae9', '', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-10-20 09:28:12', '2025-02-18 06:38:47'),
(6, 3, 1, 'banktransfer', 'Banktransfer', 6, '', 'banktransfer.png', NULL, NULL, '', 0, 'Test Bank', '1234567890', 'Gravity', 'GU1236547', '', 1, '<p>Bank : HDFC Bank</p>\r\n\r\n<p>Account No: 676575645645</p>', 1, '2021-10-20 09:28:12', '2024-04-26 10:43:52'),
(7, 4, 1, 'mercadopago', 'Mercadopago', 7, 'R$', 'mercadopago.png', '-', 'APP_USR-3693146734015792-042811-c6deca56df8ac66e83efb5334c46110c-126508225', '', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-10-20 09:28:12', '2025-02-18 06:38:44'),
(8, 5, 1, 'paypal', 'PayPal', 8, 'USD', 'paypal.png', 'AcRx7vvy79nbNxBemacGKmnnRe_CtxkItyspBS_eeMIPREwfCEIfPg1uX-bdqPrS_ZFGocxEH_SJRrIJ', 'EGtgNkjt3I5lkhEEzicdot8gVH_PcFiKxx6ZBiXpVrp4QLDYcVQQMLX6MMG_fkS9_H0bwmZzBovb4jLP', '', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-10-20 09:28:12', '2025-02-18 06:38:44'),
(9, 6, 1, 'myfatoorah', 'MyFatoorah', 9, 'KWT', 'myfatoorah.png', '-', 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL', '', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-10-20 09:28:12', '2025-02-18 06:38:44'),
(10, 7, 1, 'toyyibpay', 'toyyibpay', 10, 'RM', 'toyyibpay.png', 'ts75iszg', 'luieh2jt-8hpa-m2xv-wrkv-ejrfvhjppnsj', '', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-10-20 09:28:12', '2025-02-18 06:38:44'),
(11, 8, 1, 'phonepe', 'phonepe', 11, 'INR', 'phonepe.png', 'PGTESTPAYUAT86', '96434309-7796-489d-8924-ab56988a6076', 'MUID123', 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, '2021-10-20 09:28:12', '2025-02-18 06:38:44'),
(12, 9, 1, 'paytab', 'Paytab', 12, 'INR', 'paytab.png', '132879', 'SZJ99G6MRL-JH66MZL26H-G9BBKKMKM6', '', 1, NULL, NULL, NULL, NULL, 'https://secure-global.paytabs.com/payment/request', 1, NULL, 1, '2021-09-01 16:06:58', '2025-02-18 06:38:44'),
(13, 10, 1, 'mollie', 'Mollie', 13, 'EUR', 'mollie.png', '', 'test_FbVACj7UbsdkHtAUWnCnmSNGFWMuuA', '', 1, NULL, NULL, NULL, NULL, '', 1, NULL, 1, '2021-09-01 16:06:58', '2025-02-18 06:38:44'),
(14, 13, 1, 'khalti', 'khalti', 14, 'INR', 'khalti.png', '', 'live_secret_key_68791341fdd94846a146f0457ff7b455', '', 1, NULL, NULL, NULL, NULL, '', 1, NULL, 1, '2021-09-01 16:06:58', '2024-04-19 08:55:35'),
(15, 11, 1, 'xendit', 'xendit', 15, 'INR', 'xendit.png', 'xnd_development_IqYpzXrPJZlxhQDlU9rNoiPQtTFFQAjAf211dK2UDXHkdfj3q1BRgIR3zvp25', 'xnd_development_IqYpzXrPJZlxhQDlU9rNoiPQtTFFQAjAf211dK2UDXHkdfj3q1BRgIR3zvp25', '', 2, NULL, NULL, NULL, NULL, '', 1, NULL, 1, '2021-09-01 16:06:58', '2025-02-18 06:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 6, '', '63d4039475978c558445d0a06a017405f91cb4c8e6dc1e2e2e08b58044f25159', '[\"*\"]', '2023-10-26 04:15:20', NULL, '2023-10-25 08:41:51', '2023-10-26 04:15:20'),
(2, 'App\\Models\\User', 6, '', 'fb04cf906f372bde10db1f08ae530372a744d29374057f13ee670a57b38f98ae', '[\"*\"]', '2023-12-19 15:16:31', NULL, '2023-12-18 17:04:14', '2023-12-19 15:16:31'),
(3, 'App\\Models\\User', 25, '', '720f32bcbc6b99bc2e65597d0612760c1394647585b7da68a67eb385fcfd2714', '[\"*\"]', '2024-01-23 19:10:39', NULL, '2024-01-23 05:02:14', '2024-01-23 19:10:39'),
(4, 'App\\Models\\User', 31, '', '271318b3609e880ed30cd72ee3b9aa7241d9e6167525cc482650d023c0e149ab', '[\"*\"]', '2024-04-02 19:08:50', NULL, '2024-04-02 19:08:20', '2024-04-02 19:08:50'),
(5, 'App\\Models\\User', 38, '', 'ae4c303c7c6670a90cb1c97036547eab323cd681aa782a7908775feecc022189', '[\"*\"]', '2024-04-10 07:38:06', NULL, '2024-04-09 09:51:58', '2024-04-10 07:38:06'),
(6, 'App\\Models\\User', 38, '', '0b945b29eba9340fa83fb808af4b9b43fb89d53f7f66080113c5bce4fa8027a5', '[\"*\"]', '2024-04-10 12:51:00', NULL, '2024-04-10 08:09:26', '2024-04-10 12:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `pixcel_settings`
--

CREATE TABLE `pixcel_settings` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `twitter_pixcel_id` varchar(255) DEFAULT '-',
  `facebook_pixcel_id` varchar(255) DEFAULT '-',
  `linkedin_pixcel_id` varchar(255) DEFAULT '-',
  `google_tag_id` varchar(255) DEFAULT '-',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `vendor_id` varchar(255) DEFAULT NULL,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `features` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `themes_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_type` int(11) NOT NULL COMMENT '1 = duration, 2 = days',
  `duration` varchar(255) NOT NULL COMMENT '1=1 month\r\n2=3 month\r\n3=6 month\r\n4=1\r\n year\r\n5 = Lifetime\r\n\r\n',
  `days` int(11) NOT NULL,
  `order_limit` int(11) NOT NULL,
  `appointment_limit` int(11) NOT NULL,
  `custom_domain` int(11) NOT NULL COMMENT '1=yes,2=no',
  `google_analytics` int(11) NOT NULL COMMENT '1=yes,2=no',
  `coupons` int(11) NOT NULL DEFAULT 2,
  `blogs` int(11) NOT NULL DEFAULT 2,
  `google_login` int(11) NOT NULL DEFAULT 2,
  `facebook_login` int(11) NOT NULL DEFAULT 2,
  `sound_notification` int(11) NOT NULL DEFAULT 2,
  `whatsapp_message` int(11) NOT NULL DEFAULT 2,
  `telegram_message` int(11) NOT NULL DEFAULT 2,
  `pos` int(11) NOT NULL DEFAULT 2,
  `tax` varchar(255) DEFAULT NULL,
  `tableqr` int(11) NOT NULL DEFAULT 2,
  `pwa` int(11) DEFAULT NULL,
  `vendor_app` int(11) NOT NULL,
  `role_management` int(11) DEFAULT NULL,
  `is_available` int(11) DEFAULT 1 COMMENT '1=Yes\r\n2=No\r\n',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacypolicy`
--

CREATE TABLE `privacypolicy` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `privacypolicy_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `reorder_id` int(11) DEFAULT NULL,
  `offer_name` varchar(255) NOT NULL,
  `offer_code` varchar(255) NOT NULL,
  `offer_type` int(11) NOT NULL COMMENT '1=fixed,2=percentage',
  `offer_amount` varchar(255) NOT NULL,
  `min_amount` int(11) NOT NULL,
  `usage_type` int(11) DEFAULT NULL COMMENT '1=Limited time\r\n,2=multiple times',
  `usage_limit` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `description` longtext NOT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1=yes,2=no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotionalbanner`
--

CREATE TABLE `promotionalbanner` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refund_policy`
--

CREATE TABLE `refund_policy` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `refund_policy_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_access`
--

CREATE TABLE `role_access` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `add` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  `manage` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_manager`
--

CREATE TABLE `role_manager` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `module` longtext NOT NULL,
  `is_available` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL COMMENT '1=yes,2=no',
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `currency_position` varchar(255) NOT NULL,
  `currency_space` int(11) DEFAULT 1,
  `decimal_separator` int(11) DEFAULT 2,
  `currency_formate` int(11) DEFAULT 1,
  `maintenance_mode` int(11) DEFAULT 2 COMMENT '1 = yes, 2 = no',
  `checkout_login_required` int(11) DEFAULT 2 COMMENT '1 = Yes , 2 = No',
  `is_checkout_login_required` int(11) DEFAULT NULL,
  `logo` varchar(255) NOT NULL DEFAULT 'default-logo.png',
  `favicon` varchar(255) NOT NULL DEFAULT 'default_favicon.png',
  `delivery_type` varchar(10) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `website_title` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'og_image.png',
  `mail_driver` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_encryption` varchar(255) DEFAULT NULL,
  `mail_fromaddress` varchar(255) DEFAULT NULL,
  `mail_fromname` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `whatsapp_widget` longtext DEFAULT NULL,
  `whatsapp_message` longtext NOT NULL,
  `telegram_message` longtext DEFAULT NULL,
  `telegram_access_token` text DEFAULT NULL,
  `telegram_chat_id` text DEFAULT NULL,
  `item_message` text NOT NULL,
  `language` int(11) NOT NULL DEFAULT 1,
  `template` int(11) NOT NULL DEFAULT 1,
  `template_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 for Grid , 2 for List	',
  `primary_color` varchar(255) NOT NULL DEFAULT '#171a29',
  `secondary_color` varchar(255) NOT NULL DEFAULT '#171a29',
  `landing_website_title` varchar(255) DEFAULT NULL,
  `landing_home_banner` text DEFAULT NULL,
  `cname_title` text DEFAULT NULL,
  `cname_text` text DEFAULT NULL,
  `interval_time` varchar(255) NOT NULL,
  `interval_type` int(11) NOT NULL,
  `time_format` int(11) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No',
  `banner` varchar(255) NOT NULL DEFAULT 'default-banner.png',
  `tracking_id` varchar(255) DEFAULT NULL,
  `view_id` varchar(255) DEFAULT NULL,
  `firebase` longtext DEFAULT NULL,
  `cover_image` varchar(255) NOT NULL DEFAULT 'default-cover.png',
  `notification_sound` varchar(255) NOT NULL DEFAULT 'notification.mp3',
  `recaptcha_version` varchar(255) DEFAULT NULL,
  `facebook_client_id` text DEFAULT NULL,
  `facebook_client_secret` text DEFAULT NULL,
  `facebook_redirect_url` text DEFAULT NULL,
  `google_client_id` text DEFAULT NULL,
  `google_client_secret` text DEFAULT NULL,
  `google_redirect_url` text DEFAULT NULL,
  `google_recaptcha_site_key` varchar(255) DEFAULT NULL,
  `google_recaptcha_secret_key` varchar(255) DEFAULT NULL,
  `score_threshold` varchar(255) DEFAULT NULL,
  `cookie_text` text DEFAULT NULL,
  `cookie_button_text` text DEFAULT NULL,
  `facebook_login` int(11) NOT NULL DEFAULT 2 COMMENT '1 = Yes , 2 = No',
  `google_login` int(11) NOT NULL DEFAULT 2 COMMENT '1 = Yes , 2 = No',
  `custom_domain` text DEFAULT NULL,
  `subscribe_background` varchar(255) DEFAULT NULL,
  `app_name` varchar(255) DEFAULT NULL,
  `app_title` varchar(255) DEFAULT NULL,
  `background_color` varchar(255) DEFAULT NULL,
  `theme_color` varchar(255) DEFAULT NULL,
  `app_logo` varchar(255) DEFAULT NULL,
  `pwa` int(11) DEFAULT NULL,
  `tawk_widget_id` text DEFAULT NULL,
  `tawk_on_off` int(11) NOT NULL,
  `date_format` varchar(255) DEFAULT NULL,
  `vendor_register` int(11) NOT NULL COMMENT '1=yes,2=no',
  `order_prefix` varchar(255) DEFAULT NULL,
  `order_number_start` int(11) DEFAULT NULL,
  `image_size` float DEFAULT NULL,
  `telegram_on_off` int(11) DEFAULT 2 COMMENT '1=yes,2=no',
  `whatsapp_on_off` int(11) NOT NULL COMMENT '1=yes,2=no',
  `whatsapp_chat_on_off` int(11) NOT NULL DEFAULT 2 COMMENT '1=yes,2=no',
  `whatsapp_chat_position` int(11) NOT NULL DEFAULT 1 COMMENT '1=left,2=right',
  `languages` varchar(255) DEFAULT NULL,
  `default_language` varchar(255) DEFAULT 'en',
  `work_title` text DEFAULT NULL,
  `work_subtitle` text DEFAULT NULL,
  `wizz_chat_on_off` int(11) NOT NULL,
  `wizz_chat_settings` text DEFAULT NULL,
  `quick_call` int(11) NOT NULL,
  `quick_call_name` varchar(255) DEFAULT NULL,
  `quick_call_description` text DEFAULT NULL,
  `quick_call_mobile` varchar(255) DEFAULT NULL,
  `quick_call_position` int(11) NOT NULL,
  `quick_call_image` text DEFAULT NULL,
  `fake_sales_notification` int(11) NOT NULL,
  `product_source` int(11) NOT NULL,
  `next_time_popup` int(11) NOT NULL,
  `notification_display_time` int(11) NOT NULL,
  `sales_notification_position` int(11) NOT NULL,
  `product_fake_view` int(11) NOT NULL,
  `fake_view_message` text DEFAULT NULL,
  `min_view_count` int(11) NOT NULL,
  `max_view_count` int(11) NOT NULL,
  `review_approved_status` int(11) DEFAULT NULL,
  `review_auto_approved` varchar(255) NOT NULL DEFAULT '0',
  `google_review` varchar(255) DEFAULT NULL,
  `cart_checkout_countdown` int(11) NOT NULL,
  `countdown_message` text DEFAULT NULL,
  `countdown_expired_message` text DEFAULT NULL,
  `countdown_mins` int(11) NOT NULL,
  `min_order_amount` varchar(255) DEFAULT NULL,
  `min_order_amount_for_free_shipping` text DEFAULT NULL,
  `shipping_charges` text DEFAULT NULL,
  `cart_checkout_progressbar` int(11) NOT NULL,
  `progress_message` text DEFAULT NULL,
  `progress_message_end` text DEFAULT NULL,
  `whoweare_title` text DEFAULT NULL,
  `whoweare_subtitle` text DEFAULT NULL,
  `whoweare_image` text DEFAULT NULL,
  `maintenance_image` varchar(255) DEFAULT NULL,
  `store_unavailable_image` varchar(255) DEFAULT NULL,
  `auth_page_image` text DEFAULT NULL,
  `faq_image` text DEFAULT NULL,
  `book_table_image` text DEFAULT NULL,
  `order_success_image` varchar(255) DEFAULT NULL,
  `no_data_image` varchar(255) DEFAULT NULL,
  `forget_password_email_message` longtext DEFAULT NULL,
  `delete_account_email_message` longtext DEFAULT NULL,
  `banktransfer_request_email_message` longtext DEFAULT NULL,
  `subscription_reject_email_message` longtext DEFAULT NULL,
  `subscription_success_email_message` longtext DEFAULT NULL,
  `admin_subscription_request_email_message` longtext DEFAULT NULL,
  `admin_subscription_success_email_message` longtext DEFAULT NULL,
  `contact_email_message` longtext DEFAULT NULL,
  `new_order_invoice_email_message` longtext DEFAULT NULL,
  `vendor_new_order_email_message` longtext DEFAULT NULL,
  `order_status_email_message` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vendor_id`, `currency`, `currency_position`, `currency_space`, `decimal_separator`, `currency_formate`, `maintenance_mode`, `checkout_login_required`, `is_checkout_login_required`, `logo`, `favicon`, `delivery_type`, `timezone`, `address`, `email`, `description`, `contact`, `copyright`, `website_title`, `meta_title`, `meta_description`, `og_image`, `mail_driver`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_fromaddress`, `mail_fromname`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `whatsapp_widget`, `whatsapp_message`, `telegram_message`, `telegram_access_token`, `telegram_chat_id`, `item_message`, `language`, `template`, `template_type`, `primary_color`, `secondary_color`, `landing_website_title`, `landing_home_banner`, `cname_title`, `cname_text`, `interval_time`, `interval_type`, `time_format`, `banner`, `tracking_id`, `view_id`, `firebase`, `cover_image`, `notification_sound`, `recaptcha_version`, `facebook_client_id`, `facebook_client_secret`, `facebook_redirect_url`, `google_client_id`, `google_client_secret`, `google_redirect_url`, `google_recaptcha_site_key`, `google_recaptcha_secret_key`, `score_threshold`, `cookie_text`, `cookie_button_text`, `facebook_login`, `google_login`, `custom_domain`, `subscribe_background`, `app_name`, `app_title`, `background_color`, `theme_color`, `app_logo`, `pwa`, `tawk_widget_id`, `tawk_on_off`, `date_format`, `vendor_register`, `order_prefix`, `order_number_start`, `image_size`, `telegram_on_off`, `whatsapp_on_off`, `whatsapp_chat_on_off`, `whatsapp_chat_position`, `languages`, `default_language`, `work_title`, `work_subtitle`, `wizz_chat_on_off`, `wizz_chat_settings`, `quick_call`, `quick_call_name`, `quick_call_description`, `quick_call_mobile`, `quick_call_position`, `quick_call_image`, `fake_sales_notification`, `product_source`, `next_time_popup`, `notification_display_time`, `sales_notification_position`, `product_fake_view`, `fake_view_message`, `min_view_count`, `max_view_count`, `review_approved_status`, `review_auto_approved`, `google_review`, `cart_checkout_countdown`, `countdown_message`, `countdown_expired_message`, `countdown_mins`, `min_order_amount`, `min_order_amount_for_free_shipping`, `shipping_charges`, `cart_checkout_progressbar`, `progress_message`, `progress_message_end`, `whoweare_title`, `whoweare_subtitle`, `whoweare_image`, `maintenance_image`, `store_unavailable_image`, `auth_page_image`, `faq_image`, `book_table_image`, `order_success_image`, `no_data_image`, `forget_password_email_message`, `delete_account_email_message`, `banktransfer_request_email_message`, `subscription_reject_email_message`, `subscription_success_email_message`, `admin_subscription_request_email_message`, `admin_subscription_success_email_message`, `contact_email_message`, `new_order_invoice_email_message`, `vendor_new_order_email_message`, `order_status_email_message`, `created_at`, `updated_at`) VALUES
(1, 1, '$', 'left', 1, 1, 2, 2, 2, NULL, 'logo-6704c736b0b37.png', 'favicon-6704c7520d8ab.png', '', 'Asia/Kolkata', '248 Cedar Swamp Rd, Jackson, New Mexico - 08527', 'infotechgravity@gmail.com', NULL, '917016428845', 'Copyright © Gravity Infotech. All Rights Reserved', 'Restro SaaS | Online Food Store Website Builder', 'Restro SaaS - Multi Restaurant Online WhatsApp Food Ordering System SaaS', 'A “Restro SaaS” is a software as a service (SaaS) solution for online food ordering for multiple restaurants through WhatsApp. This type of system would likely include features such as menu management, order tracking, and integration with WhatsApp for communication between customers and restaurants. Additionally, it may also include features such as payment processing, product management, and reports.', 'og_image-676bd2f61c252.png', 'smtp', 'smtp.gmail.com', '587', 'mail_username', 'mail_password', 'tls', 'hello@example.com', 'Gravity', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/in/', '', '', NULL, NULL, NULL, '', 1, 1, 1, '#121212', '#6ec207', 'Restro SaaS | Online Food Store Website Builder', 'banner-66ff893f3c05f.webp', 'Read All Instructions Carefully Before Sending Custom Domain Request', '<p>If you&#39;re using cPanel or Plesk then you need to manually add custom domain in your server with the same root directory as the script&#39;s installation&nbsp;and user need to point their custom domain A record with your server IP. Example : 68.178.145.4</p>', '', 0, 2, '', 'G-WK8L1X80R2', '294601668', '', '', '', 'v2', 'Facebook Client Id', 'Facebook Client Secret', 'Facebook Redirect URL', 'Google Client Id', 'Google Client Secret', 'Google Redirect URL', 'google_recaptcha_site_key', 'google_recaptcha_secret_key', '0.5', 'Your experience on this site will be improved by allowing cookies.', 'Accept', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'd M, Y', 1, NULL, 1001, 5, NULL, 0, 2, 1, '', 'en', 'How does it work?', 'Follow the below steps to generate your online restaurant', 1, NULL, 1, 'Gravity Infotech', 'Hey there 👋 Need help? I\'m here for you, so just give me a call.', '917016428845', 0, 'quick-call-676d050d0a50c.png', 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '0', NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'maintenance-66e3d5fc0aa6e.png', 'store_unavailable-66e3d5fc0bbdb.png', 'auth-676d3ea7293f5.webp', NULL, NULL, NULL, NULL, 'Dear {user},\r\n\r\nYour Temporary Password Is : {password}', 'Dear {vendorname},\r\n\r\nWe hope this message finds you well. We regret to inform you that your account has been deleted', 'Dear {vendorname},\r\n\r\nWe hope this email finds you well. We are writing to confirm that we have received your recent subscription request and payment via bank transfer. We appreciate your business and thank you for choosing our services.\r\n\r\nWe are currently processing your subscription request and will be in touch with you shortly. Depending on the nature of the subscription, you may receive further instructions, access to a service, or confirmation of your subscription.\r\n\r\nIf you have any questions or concerns, please do not hesitate to reach out to us. Our customer support team is available to assist you with any inquiries you may have.\r\n\r\nThank you again for choosing our services. We look forward to providing you with the best possible experience.\r\n\r\nSincerely\r\n{adminname}\r\n{adminemail}', 'Dear {vendorname},\r\n\r\nI am writing to inform you that your recent {payment_type} request has been rejected. After careful review of your account and the transaction, we have identified a some issues.\r\n\r\nHere are the details of your purchase\r\n\r\nSubscription Plans : {plan_name}\r\nPayment Type : {payment_type}\r\n\r\nYou can take benefits of our online payment system\r\n\r\nIf you have any questions or concerns regarding your subscription, please do not hesitate to contact our customer support team. We are always available to assist you with any queries you may have.\r\n\r\nSincerely\r\n{adminname}\r\n{adminemail}', 'Dear {vendorname},\r\n\r\nI hope this email finds you well. I am writing to confirm your recent subscription purchase with our company.\r\n\r\nWe are thrilled to have you as a subscriber and we appreciate your trust in us. Your subscription will provide you access to our premium services, exclusive content and special offers throughout the duration of your subscription period.\r\n\r\nHere are the details of your purchase\r\n\r\nSubscription Plans :  {plan_name}\r\nSubscription Duration : {subscription_duration}\r\nSubscription Cost : {subscription_price}\r\nPayment Type : {payment_type}\r\n\r\nYour subscription is now active and you can start enjoying the benefits of our services right away. You can log in to your account using the email address and password you provided during registration.\r\n\r\nIf you have any questions or concerns regarding your subscription, please do not hesitate to contact our customer support team. We are always available to assist you with any queries you may have.\r\n\r\nThank you once again for choosing us as your preferred service provider. We look forward to providing you with the best experience possible.\r\n\r\nSincerely\r\n{adminname}\r\n{adminemail}', 'Dear {adminname},\r\n\r\nYou have received new subscription request from {vendorname} and the email is {vendoremail}\r\n\r\nLogin to your account and check the details. You may Approve OR Reject\r\n\r\nHere are the details\r\n\r\nSubscription Plans : {plan_name}\r\n\r\nSubscription Duration : {subscription_duration}\r\n\r\nSubscription Cost : {subscription_price}\r\n\r\nPayment Type : {payment_type}', 'Dear {adminname},\r\n\r\nI am writing to inform you that a new subscription has been purchased for our service. The details of the subscription are as follows:\r\n\r\nName of Subscriber : {vendorname}\r\nSubscription Plans : {plan_name}\r\nSubscription Duration : {subscription_duration}\r\nSubscription Cost : {subscription_price}\r\nPayment Type : {payment_type}\r\n\r\nThe payment for the subscription has been successfully processed, and the subscriber is now able to access the features of their subscription.\r\n\r\nBest Regards\r\n{vendorname}\r\n{vendoremail}', 'Dear {vendorname},\r\n\r\nYou have received new inquiry\r\n\r\nFull Name : {username}\r\n\r\nEmail : {useremail}\r\n\r\nMobile : {usermobile}\r\n\r\nMessage : {usermessage}', NULL, NULL, NULL, NULL, '2025-02-19 05:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `icon` text NOT NULL,
  `link` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_category`
--

CREATE TABLE `store_category` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No',
  `is_deleted` int(11) NOT NULL DEFAULT 2 COMMENT '1=Yes,2=No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `systemaddons`
--

CREATE TABLE `systemaddons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(20) NOT NULL,
  `activated` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `systemaddons`
--

INSERT INTO `systemaddons` (`id`, `name`, `unique_identifier`, `version`, `activated`, `image`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Blogs', 'blog', '3.9', 1, 'blog.jpg', 1, '2025-03-29 08:30:11', '2024-06-13 08:30:11'),
(2, 'Coupons', 'coupon', '3.9', 1, 'coupons.jpg', 1, '2025-03-29 08:30:11', '2024-06-13 08:30:11'),
(3, 'Whatsapp Message', 'whatsapp_message', '3.9', 1, 'whatsapp_message.jpg', 1, '2025-03-29 08:30:11', '2024-06-13 08:30:11'),
(4, 'Personalised Slug', 'unique_slug', '3.9', 1, 'unique_slug.jpg', 1, '2025-03-29 08:30:11', '2024-10-06 17:07:01'),
(5, 'Language Translation', 'language', '3.9', 1, 'language.jpg', 1, '2025-03-29 08:30:11', '2024-12-25 00:14:30'),
(6, 'Subscription', 'subscription', '3.9', 1, 'subscription.jpg', 1, '2025-03-29 08:30:11', '2024-06-13 08:30:11'),
(7, 'Cookie Consent', 'cookie_consent', '3.9', 1, 'cookie_consent.jpg', 1, '2025-03-29 08:30:11', '2024-06-13 08:30:11'),
(8, 'Sound Notification', 'notification', '3.9', 1, 'notification.jpg', 1, '2025-03-29 08:30:11', '2024-06-13 08:30:11'),
(9, 'Chicken Shop', 'theme_1', '3.9', 1, 'theme_1.jpg', 1, '2025-03-29 08:30:11', '2024-06-13 08:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `tableqr`
--

CREATE TABLE `tableqr` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL COMMENT ' ',
  `name` varchar(255) NOT NULL,
  `size` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_area`
--

CREATE TABLE `table_area` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_book`
--

CREATE TABLE `table_book` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `people` bigint(20) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_time` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No',
  `is_deleted` int(11) NOT NULL DEFAULT 2 COMMENT '1=Yes,2=No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `terms_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `star` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=Approved 2=Decline',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `reorder_id`, `vendor_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Theme 1', 'theme-1.webp', '2024-10-01 04:30:31', '2025-02-18 12:21:10'),
(2, 2, 1, 'Theme 2', 'theme-2.webp', '2024-10-01 04:31:15', '2025-02-18 12:21:10'),
(3, 3, 1, 'Theme 3', 'theme-3.webp', '2024-10-01 04:31:29', '2025-02-18 12:16:45'),
(4, 4, 1, 'Theme 4', 'theme-4.webp', '2024-10-01 04:32:05', '2025-02-18 12:16:45'),
(5, 5, 1, 'Theme 5', 'theme-5.webp', '2024-10-01 04:32:27', '2025-02-18 12:16:45'),
(6, 6, 1, 'Theme 6', 'theme-6.webp', '2024-12-27 11:58:03', '2025-02-18 12:16:45'),
(7, 7, 1, 'Theme 7', 'theme-7.webp', '2024-12-27 11:58:03', '2025-02-18 12:16:45'),
(8, 8, 1, 'Theme 8', 'theme-8.webp', '2024-12-27 11:58:03', '2025-02-18 12:16:45'),
(9, 9, 1, 'Theme 9', 'theme-9.webp', '2024-12-27 11:58:03', '2025-02-18 12:16:45'),
(10, 10, 1, 'Theme 10', 'theme-10.webp', '2024-12-27 11:58:03', '2025-02-18 12:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

CREATE TABLE `timings` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `open_time` varchar(30) NOT NULL,
  `break_start` varchar(255) NOT NULL,
  `break_end` varchar(255) NOT NULL,
  `close_time` varchar(30) NOT NULL,
  `is_always_close` tinyint(1) NOT NULL COMMENT '1 For Yes, 2 For No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `top_deals`
--

CREATE TABLE `top_deals` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `offer_type` int(11) NOT NULL,
  `deal_type` int(11) NOT NULL COMMENT '1=one time,2=daily',
  `top_deals_switch` int(11) NOT NULL DEFAULT 2 COMMENT '1=yes,2=no',
  `offer_amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `transaction_type` int(11) DEFAULT NULL COMMENT '1 = added-money-wallet, 2 = order placed (using wallet), 3 = order cancel',
  `transaction_number` varchar(255) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL COMMENT 'payment_type = COD : 1,RazorPay : 2, Stripe : 3, Flutterwave : 4, Paystack : 5, Mercado Pago : 7, PayPal : 8, MyFatoorah : 9, toyyibpay : 10',
  `payment_id` varchar(255) DEFAULT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `duration` varchar(255) NOT NULL COMMENT '1=1 Month,\r\n2=3Month\r\n3=6 Month\r\n4=1 Year',
  `days` int(11) DEFAULT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `service_limit` varchar(255) NOT NULL,
  `appoinment_limit` varchar(255) NOT NULL,
  `custom_domain` int(11) NOT NULL COMMENT '1 = yes, 2 = no',
  `google_analytics` int(11) NOT NULL COMMENT '1 = yes, 2 = no',
  `coupons` int(11) NOT NULL DEFAULT 2,
  `blogs` int(11) NOT NULL DEFAULT 2,
  `google_login` int(11) NOT NULL DEFAULT 2,
  `facebook_login` int(11) NOT NULL DEFAULT 2,
  `sound_notification` int(11) NOT NULL DEFAULT 2,
  `whatsapp_message` int(11) NOT NULL DEFAULT 2,
  `telegram_message` int(11) NOT NULL DEFAULT 2,
  `pos` int(11) NOT NULL DEFAULT 2,
  `tableqr` int(11) NOT NULL DEFAULT 2,
  `pwa` int(11) DEFAULT NULL,
  `vendor_app` int(11) NOT NULL COMMENT '1 = Yes , 2 = No',
  `expire_date` varchar(255) NOT NULL,
  `themes_id` varchar(255) DEFAULT NULL,
  `screenshot` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1 = pending, 2 = yes/BankTransferAccepted,3=no/BankTransferDeclined',
  `tax` varchar(255) DEFAULT NULL,
  `tax_name` varchar(255) DEFAULT NULL,
  `offer_code` varchar(255) DEFAULT NULL,
  `offer_amount` float DEFAULT NULL,
  `grand_total` float DEFAULT NULL,
  `role_management` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `login_type` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1=Admin,2=vendor,3=User/Customer,3=employee',
  `description` text DEFAULT NULL,
  `token` longtext DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `plan_id` varchar(255) DEFAULT NULL,
  `purchase_amount` varchar(255) DEFAULT NULL,
  `purchase_date` varchar(255) DEFAULT NULL,
  `available_on_landing` int(11) NOT NULL DEFAULT 2 COMMENT '1 = Yes , 2 = No',
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `free_plan` int(11) NOT NULL DEFAULT 0,
  `wallet` float NOT NULL,
  `is_delivery` tinyint(1) DEFAULT NULL COMMENT '1=Yes,2=No',
  `allow_without_subscription` int(11) NOT NULL DEFAULT 2 COMMENT '1=Yes,2=No',
  `is_verified` tinyint(1) NOT NULL COMMENT '1=Yes,2=No',
  `is_available` tinyint(1) NOT NULL COMMENT '1=Yes,2=No',
  `remember_token` varchar(100) DEFAULT NULL,
  `license_type` text DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 2,
  `role_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `vendor_id`, `name`, `slug`, `email`, `mobile`, `image`, `password`, `google_id`, `facebook_id`, `login_type`, `type`, `description`, `token`, `city_id`, `area_id`, `plan_id`, `purchase_amount`, `purchase_date`, `available_on_landing`, `payment_id`, `payment_type`, `free_plan`, `wallet`, `is_delivery`, `allow_without_subscription`, `is_verified`, `is_available`, `remember_token`, `license_type`, `is_deleted`, `role_id`, `store_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin', 'admin@gmail.com', '1234567890', 'profile-675be320a2e4d.png', '$2y$10$BGzS523wDK3hKQO1iZb6Z.Y6AgATl.LXccaa.WhGzxNVnEJHoy5SC', NULL, NULL, 'normal', 1, NULL, 'cNjSsm-TREC9n58ZQeIDBL:APA91bHSLQ2S9VFhM2yGoQJG7d-noXkcsVXRQi8Y-XSUJIFZQgzF75Kbu5beKH8dGUZ9SqIND3yauVdcG6-SwcVjU4oIjpJUx5JC9cORZp-NvPtNkJT1IMLb0KgnN68UWAtzwvri8KqT', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, 0, NULL, 2, 2, 1, NULL, 'Regular License', 2, NULL, NULL, '2022-08-15 23:01:17', '2024-12-27 03:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `original_price` float NOT NULL,
  `qty` int(11) DEFAULT 0,
  `min_order` int(11) DEFAULT 1,
  `max_order` int(11) DEFAULT 1,
  `low_qty` int(11) DEFAULT NULL,
  `stock_management` int(11) DEFAULT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `whoweare`
--

CREATE TABLE `whoweare` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `reorder_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `age_verification`
--
ALTER TABLE `age_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_image`
--
ALTER TABLE `banner_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_item_id_foreign` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_domain`
--
ALTER TABLE `custom_domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_status`
--
ALTER TABLE `custom_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firebase`
--
ALTER TABLE `firebase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footerfeatures`
--
ALTER TABLE `footerfeatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_extras`
--
ALTER TABLE `global_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_images`
--
ALTER TABLE `item_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_images_item_id_foreign` (`item_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loyalty_history`
--
ALTER TABLE `loyalty_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loyalty_program`
--
ALTER TABLE `loyalty_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_settings`
--
ALTER TABLE `other_settings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pixcel_settings`
--
ALTER TABLE `pixcel_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacypolicy`
--
ALTER TABLE `privacypolicy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotionalbanner`
--
ALTER TABLE `promotionalbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund_policy`
--
ALTER TABLE `refund_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_access`
--
ALTER TABLE `role_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_manager`
--
ALTER TABLE `role_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_category`
--
ALTER TABLE `store_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemaddons`
--
ALTER TABLE `systemaddons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tableqr`
--
ALTER TABLE `tableqr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_area`
--
ALTER TABLE `table_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_book`
--
ALTER TABLE `table_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timings`
--
ALTER TABLE `timings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_deals`
--
ALTER TABLE `top_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whoweare`
--
ALTER TABLE `whoweare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `age_verification`
--
ALTER TABLE `age_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner_image`
--
ALTER TABLE `banner_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_domain`
--
ALTER TABLE `custom_domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_status`
--
ALTER TABLE `custom_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `firebase`
--
ALTER TABLE `firebase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footerfeatures`
--
ALTER TABLE `footerfeatures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_extras`
--
ALTER TABLE `global_extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_images`
--
ALTER TABLE `item_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loyalty_history`
--
ALTER TABLE `loyalty_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loyalty_program`
--
ALTER TABLE `loyalty_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_settings`
--
ALTER TABLE `other_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pixcel_settings`
--
ALTER TABLE `pixcel_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacypolicy`
--
ALTER TABLE `privacypolicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotionalbanner`
--
ALTER TABLE `promotionalbanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refund_policy`
--
ALTER TABLE `refund_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_access`
--
ALTER TABLE `role_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_manager`
--
ALTER TABLE `role_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_category`
--
ALTER TABLE `store_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemaddons`
--
ALTER TABLE `systemaddons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tableqr`
--
ALTER TABLE `tableqr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_area`
--
ALTER TABLE `table_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_book`
--
ALTER TABLE `table_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `timings`
--
ALTER TABLE `timings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `top_deals`
--
ALTER TABLE `top_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `whoweare`
--
ALTER TABLE `whoweare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
