-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 09:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Furniture', 'furniture', '2021-09-29 09:43:49', '2021-09-29 09:43:49', NULL),
(2, 'Laptop', 'laptop', '2021-09-29 12:04:39', '2021-09-29 12:04:39', NULL),
(3, 'Men Clothes', 'men-clothes', '2021-10-09 04:30:26', '2021-10-09 04:30:26', NULL),
(4, 'Men Tshirt', 'men-tshirt', '2021-11-20 11:17:44', '2021-11-20 11:17:44', NULL),
(5, 'women', 'women', '2021-11-23 08:23:26', '2021-11-23 08:23:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `username`, `email`, `subject`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dineshuprety', 'coffeecoder500@gmail.com', 'test test', 'test test', '2021-12-19 07:27:03', '2021-12-19 07:27:03', NULL),
(2, 'Dineshuprety', 'coffeecoder500@gmail.com', 'test test', 'test test', '2021-12-19 07:35:23', '2021-12-19 07:35:23', NULL),
(3, 'Dineshuprety', 'coffeecoder500@gmail.com', 'another', 'test test ', '2021-12-19 07:37:22', '2021-12-19 07:37:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `post_code`, `address`, `city`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Dinesh Uprety', 'dineshuprety500@gmail.com', '9807393225', 57200, 'surunga,jhapa', 'kathmandu', 'testing order in cash', 'Cash On Delivery', 'Cash On Delivery', NULL, 'Rs', 60, NULL, 'EOS69959561', '28 December 2021', 'December', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-12-28 13:26:42', NULL, NULL),
(2, 19, 'Dinesh Uprety', 'coffeecoder500@gmail.com', '9807393225', 57200, 'surunga ,jhapa-3', 'kathmandu', 'order placing thank you', 'Cash On Delivery', 'Cash On Delivery', NULL, 'Rs', 60, NULL, 'EOS92276445', '29 December 2021', 'December', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-12-29 05:43:33', NULL, NULL),
(3, 19, 'Dinesh Uprety', 'coffeecoder500@gmail.com', '9807393225', 57200, 'surunga ,jhapa-3', 'kathmandu', 'testing with different gmail', 'Cash On Delivery', 'Cash On Delivery', NULL, 'Rs', 60, NULL, 'EOS21658879', '29 December 2021', 'December', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-12-29 05:46:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `size`, `qty`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'x', '2', 60.00, '2021-12-28 13:26:42', '2021-12-28 13:26:42', NULL),
(2, 2, 2, 'x', '2', 60.00, '2021-12-29 05:43:33', '2021-12-29 05:43:33', NULL),
(3, 3, 1, 'x', '1', 0.00, '2021-12-29 05:46:55', '2021-12-29 05:46:55', NULL),
(4, 3, 2, 'x', '1', 30.00, '2021-12-29 05:46:55', '2021-12-29 05:46:55', NULL),
(5, 3, 2, 'xxl', '1', 30.00, '2021-12-29 05:46:55', '2021-12-29 05:46:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productattributes`
--

CREATE TABLE `productattributes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` int(11) NOT NULL,
  `quntity` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productattributes`
--

INSERT INTO `productattributes` (`id`, `product_id`, `sku`, `quntity`, `size_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 10, 1, '2021-11-17 11:58:47', '2021-11-17 11:58:47', NULL),
(2, 1, 2, 10, 2, '2021-11-17 11:58:47', '2021-11-17 11:58:47', NULL),
(3, 1, 3, 10, 3, '2021-11-17 11:58:47', '2021-11-17 11:58:47', NULL),
(4, 2, 1, 30, 1, '2021-11-17 12:00:01', '2021-11-17 12:00:01', NULL),
(5, 2, 2, 20, 3, '2021-11-17 12:00:01', '2021-11-17 12:00:01', NULL),
(6, 3, 1, 10, 1, '2021-11-20 11:26:48', '2021-11-20 11:26:48', NULL),
(7, 3, 2, 20, 3, '2021-11-20 11:26:48', '2021-11-20 11:26:48', NULL),
(8, 4, 1, 30, 2, '2021-11-20 11:28:09', '2021-11-20 11:28:09', NULL),
(9, 5, 1, 20, 1, '2021-11-20 11:30:35', '2021-11-20 11:30:35', NULL),
(10, 5, 2, 3, 2, '2021-11-20 11:30:35', '2021-11-20 11:30:35', NULL),
(11, 5, 3, 5, 3, '2021-11-20 11:30:35', '2021-11-20 11:30:35', NULL),
(12, 6, 1, 20, 2, '2021-11-20 11:31:50', '2021-11-20 11:31:50', NULL),
(13, 7, 1, 20, 2, '2021-11-20 11:34:45', '2021-11-20 11:34:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `wholesell_price` float NOT NULL,
  `sales_price` float DEFAULT NULL,
  `description` text NOT NULL,
  `product_on` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_image_path` varchar(255) NOT NULL,
  `hover_image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `wholesell_price`, `sales_price`, `description`, `product_on`, `category_id`, `sub_category_id`, `product_image_path`, `hover_image_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Lorem Ipsum', 20000, 10000, 0, '<h2 style=\"text-align: center; margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker<b> including versions of Lorem Ipsum</b>.</p><h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, 1, 'images\\uploads\\products\\2_front-633e0d9cdba8c61e527ddab7fb391dbb-d6a0726cf0508fbe0e2541bfa942a0ce.jpg', 'images\\uploads\\products\\3_front-edc184be2d72e34664fadf2b82630629-a07d6c2d4cef45a7b132fa64b76a49e9.jpg', '2021-11-17 11:58:47', '2021-11-17 11:58:47', NULL),
(2, 'Why do we use it', 30000, 20000, 0, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where can I get some?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 2, 2, 3, 'images\\uploads\\products\\aso-jean-66130198a0a2822191273844683c7ed6-32a578d09a3c6daf24d2ba1e88a1724b.jpg', 'images\\uploads\\products\\barca-t-4a0acd04225ee127a2d206148f6e0fff-d868ce7ad118ef58249dcc1280b9ba64.jpg', '2021-11-17 12:00:01', '2021-11-17 12:00:01', NULL),
(3, 'Originals Kaval Windbreaker Winter Jacket 2', 1000, 500, 0, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 3, 6, 'images\\uploads\\products\\1-83cb7c649c9befbf78167b32250d05f1.jpg', 'images\\uploads\\products\\2-1cf9f648258aa5a3bcbe520825febbdb.jpg', '2021-11-20 11:26:48', '2021-11-20 11:26:48', NULL),
(4, 'Originals Kaval Windbreaker Winter Jacket', 3000, 1500, 2000, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 3, 6, 'images\\uploads\\products\\14-bc4ea76c23152d3689bc14ed8e879c46.jpg', 'images\\uploads\\products\\5-0631fa41f6339383c43ea1474019e59e.jpg', '2021-11-20 11:28:09', '2021-11-20 11:28:09', NULL),
(5, 'Lorem Ipsum 2', 1000, 500, 0, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 2, 3, 'images\\uploads\\products\\5-f44eb0b34434edb3a6527f5636958f70.jpg', 'images\\uploads\\products\\7-c9eb7685fc00c180605a62eaea65d0ac.jpg', '2021-11-20 11:30:35', '2021-11-20 11:30:35', NULL),
(6, 'What is Lorem Ipsum?', 6000, 3000, 3500, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where does it come from?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', 1, 3, 6, 'images\\uploads\\products\\6-615b99afc321d8f4ae6b63ffaab2ffe9.jpg', 'images\\uploads\\products\\8-28acc2d1f9faad347790921d27f2e12a.jpg', '2021-11-20 11:31:50', '2021-11-20 11:31:50', NULL),
(7, 'Where can I get some?', 5000, 1000, 3500, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where can I get some?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</p>', 1, 3, 6, 'images\\uploads\\products\\2-4d1b73675e59d7a7cfbf276b402d7bff.jpg', 'images\\uploads\\products\\4-8d3d5c14a91ee1004360e0a623d16fa1.jpg', '2021-11-20 11:34:45', '2021-11-20 11:34:45', NULL),
(8, 'Lorem Ipsum', 20000, 10000, 0, '<h2 style=\"text-align: center; margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker<b> including versions of Lorem Ipsum</b>.</p><h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 1, 1, 'images\\uploads\\products\\2_front-633e0d9cdba8c61e527ddab7fb391dbb-d6a0726cf0508fbe0e2541bfa942a0ce.jpg', 'images\\uploads\\products\\3_front-edc184be2d72e34664fadf2b82630629-a07d6c2d4cef45a7b132fa64b76a49e9.jpg', '2021-11-17 11:58:47', '2021-11-17 11:58:47', NULL),
(9, 'Why do we use it', 30000, 20000, 0, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where can I get some?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 2, 2, 3, 'images\\uploads\\products\\aso-jean-66130198a0a2822191273844683c7ed6-32a578d09a3c6daf24d2ba1e88a1724b.jpg', 'images\\uploads\\products\\barca-t-4a0acd04225ee127a2d206148f6e0fff-d868ce7ad118ef58249dcc1280b9ba64.jpg', '2021-11-17 12:00:01', '2021-11-17 12:00:01', NULL),
(10, 'Originals Kaval Windbreaker Winter Jacket 2', 1000, 500, 0, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 2, 3, 6, 'images\\uploads\\products\\1-83cb7c649c9befbf78167b32250d05f1.jpg', 'images\\uploads\\products\\2-1cf9f648258aa5a3bcbe520825febbdb.jpg', '2021-11-20 11:26:48', '2021-11-20 11:26:48', NULL),
(11, 'Originals Kaval Windbreaker Winter Jacket', 3000, 1500, 2000, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 3, 6, 'images\\uploads\\products\\14-bc4ea76c23152d3689bc14ed8e879c46.jpg', 'images\\uploads\\products\\5-0631fa41f6339383c43ea1474019e59e.jpg', '2021-11-20 11:28:09', '2021-11-20 11:28:09', NULL),
(12, 'Lorem Ipsum 2', 1000, 500, 0, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 1, 2, 3, 'images\\uploads\\products\\5-f44eb0b34434edb3a6527f5636958f70.jpg', 'images\\uploads\\products\\7-c9eb7685fc00c180605a62eaea65d0ac.jpg', '2021-11-20 11:30:35', '2021-11-20 11:30:35', NULL),
(13, 'What is Lorem Ipsum?', 6000, 3000, 3500, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where does it come from?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', 1, 3, 6, 'images\\uploads\\products\\6-615b99afc321d8f4ae6b63ffaab2ffe9.jpg', 'images\\uploads\\products\\8-28acc2d1f9faad347790921d27f2e12a.jpg', '2021-11-20 11:31:50', '2021-11-20 11:31:50', NULL),
(14, 'Where can I get some?', 5000, 1000, 3500, '<h2 style=\"margin-top: 0px; padding: 0px; font-weight: 400; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where can I get some?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc</p>', 1, 3, 6, 'images\\uploads\\products\\2-4d1b73675e59d7a7cfbf276b402d7bff.jpg', 'images\\uploads\\products\\4-8d3d5c14a91ee1004360e0a623d16fa1.jpg', '2021-11-20 11:34:45', '2021-11-20 11:34:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'x', '2021-12-28 11:44:46', '2021-12-28 11:44:46', NULL),
(2, 'xl', '2021-12-28 11:44:49', '2021-12-28 11:44:49', NULL),
(3, 'xxl', '2021-12-28 11:44:53', '2021-12-28 11:44:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'bed', 'bed', 1, '2021-09-29 09:44:16', '2021-09-29 09:44:16', NULL),
(2, 'sofa', 'sofa', 1, '2021-09-29 09:44:22', '2021-09-29 09:44:22', NULL),
(3, 'Hp laptop', 'hp-laptop', 2, '2021-09-29 12:04:50', '2021-09-29 12:07:08', NULL),
(4, 'Dell Laptop', 'dell-laptop', 2, '2021-09-29 12:05:02', '2021-09-29 12:06:56', NULL),
(5, 'Mac book pro', 'mac-book-pro', 2, '2021-09-29 12:07:39', '2021-09-29 12:07:39', NULL),
(6, 'Tshirts', 'tshirts', 3, '2021-10-09 04:30:47', '2021-10-09 04:30:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text DEFAULT NULL,
  `pan_number` varchar(255) DEFAULT NULL,
  `pan_image` varchar(255) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `status` bigint(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `phone_number`, `address`, `pan_number`, `pan_image`, `role`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dineshuprety', 'Dinesh Uprety', 'dineshuprety500@gmail.com', '$2y$10$1QI1i7CBdVtWrIBwoL9a.ub3n/T5Nr1OVWQboy9Re3sd3jWGAmfNu', '9807393225', 'surunga,jhapa', NULL, NULL, 'admin', 1, NULL, NULL, NULL),
(3, 'dineshupretii', 'Dinesh Uprety', 'coffeecoder500@gmail.com', '$2y$10$bvVpxAGyui1JRN5JxNa1oucjhc7onlYJ8QMiCKGYPr.KqP8Zrui5e', '9807393225', 'surunga ', '123456789', 'images\\uploads\\pans\\mapview-c349c7f093041d1c61f6745fbdeb0fd0.PNG', 'wholesaler', 1, '2021-12-28 05:39:55', '2021-12-28 05:40:43', NULL),
(19, 'localhost', 'dinesh uprety', 'nepha6ker@gmail.com', '$2y$10$r8GBaxL/Kep1qJShYGPCIeDej.aS3n5EFF1dFJTrkb/CLLP8lxT5.', '9807393225', NULL, NULL, NULL, 'user', 1, '2021-12-29 05:41:17', '2021-12-29 05:41:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `productattributes`
--
ALTER TABLE `productattributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productattributes`
--
ALTER TABLE `productattributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
