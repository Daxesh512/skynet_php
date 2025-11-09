-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2021 at 04:02 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skyner_new_v`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 - deactive, 1 - active',
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `status`, `role_id`, `name`, `username`, `email`, `email_verified`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Admin', 'admin', 'admin@gmail.com', 0, '1613814214513697840.png', '$2y$10$q7PIHP9NSRt2TUUnqdYwJeiC6aIPcr5xy1h6BqN11Ou4BGjWvZfTG', NULL, NULL, '2021-04-11 06:19:17'),
(2, 1, 1, 'Rony', 'rony', 'rony@gmail.com', 0, '16137989081753336377.png', '$2y$10$19NOEORKuK8qEPM13S38R.lD.tsOCQntS2rK9finxx3zNt8Ql/d2.', NULL, '2021-02-19 22:28:56', '2021-02-19 23:28:28'),
(3, 1, 2, 'Sihab', 'sihab', 'sihab@gmail.com', 0, '1613798862914110019.png', '$2y$10$KLLAvssopCM/dr2iNW53E.VPU2Me2hG1XcrSPWt/zedsvgWEN7jzK', NULL, '2021-02-19 22:31:38', '2021-02-20 03:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archives`
--

INSERT INTO `archives` (`id`, `date`, `created_at`, `updated_at`) VALUES
(1, '01/2021', '2021-02-11 05:12:54', '2021-02-11 05:12:54'),
(2, '09/2020', '2021-02-11 05:13:12', '2021-02-11 05:13:12'),
(3, '02/2021', '2021-02-11 05:13:24', '2021-02-16 07:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `backups`
--

CREATE TABLE `backups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bcategories`
--

CREATE TABLE `bcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bcategories`
--

INSERT INTO `bcategories` (`id`, `language_id`, `name`, `slug`, `status`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Business', 'Business', 1, 0, '2021-02-11 00:51:53', '2021-02-11 00:58:11'),
(2, 1, 'Technology', 'Technology', 1, 1, '2021-02-11 00:52:01', '2021-02-11 00:58:07'),
(3, 1, 'Digital Marketing', 'Digital-Marketing', 1, 0, '2021-02-11 00:52:40', '2021-02-11 00:52:40'),
(4, 1, 'UI Design', 'UI-Design', 1, 0, '2021-02-11 00:52:59', '2021-02-11 00:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `bcategory_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `language_id`, `bcategory_id`, `title`, `slug`, `image`, `content`, `status`, `meta_keywords`, `meta_description`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Magna aliqua. Ut enim ad minim venia m, quis nostrud exercitation ullamco', 'Magna-aliqua.-Ut-enim-ad-minim-venia-m,-quis-nostrud-exercitation-ullamco', '16130436341918352388.jpg', '<div><p>Lorem ipsum dolor sit amet, consectetur\r\n adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore \r\nmagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor \r\nin reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla \r\npariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa \r\nqui officia deserunt mollit anim id est laborum. Sed ut perspiciatis \r\nunde omnis iste natus error sit voluptatem accusantium doloremque \r\nlaudantium, totam rem aperiam, eaque ipsa quae ab illo inventore \r\nveritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo \r\nenim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, \r\nsed quia consequuntur magni dolores eos qui ratione voluptatem sequi \r\nnesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit \r\namet, consectetur, adipisci velit, sed quia non numquam eius modi \r\ntempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n                                    <p>Lorem ipsum dolor \r\nsit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt\r\n ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud\r\n exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum \r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non \r\nproident, sunt in culpa qui officia deserunt.</p>\r\n                                    \r\n                                </div>\r\n\r\n<div><br>Setting the mood with incense\r\n                                    <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incidi-dunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitati-on ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in repre-henderit in voluptate velit esse cillum \r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non \r\nproident, sunt in culpa qui officia. </p>\r\n                                    A cleansing hot shower or bath\r\n                                    <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incidi-dunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitati-on ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in repre-henderit in voluptate velit esse cillum \r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non \r\nproident, sunt in culpa qui officia. </p>\r\n                                    Setting the mood with incense\r\n                                    <ul>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li></ul></div>', 1, 'html,css,js', 'Duis aute irure dolor in repre-henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.', 0, '2021-02-11 05:35:56', '2021-02-11 05:41:33'),
(2, 1, 2, 'Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.', 'Adipisicing-elit,-sed-do-eiusmod-tempor-incididunt-ut-labore-et-dolore.', '16130436082031699655.jpg', '<div><p>Lorem ipsum dolor sit amet, consectetur\r\n adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore \r\nmagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor \r\nin reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla \r\npariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa \r\nqui officia deserunt mollit anim id est laborum. Sed ut perspiciatis \r\nunde omnis iste natus error sit voluptatem accusantium doloremque \r\nlaudantium, totam rem aperiam, eaque ipsa quae ab illo inventore \r\nveritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo \r\nenim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, \r\nsed quia consequuntur magni dolores eos qui ratione voluptatem sequi \r\nnesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit \r\namet, consectetur, adipisci velit, sed quia non numquam eius modi \r\ntempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n                                    <p>Lorem ipsum dolor \r\nsit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt\r\n ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud\r\n exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum \r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non \r\nproident, sunt in culpa qui officia deserunt.</p>\r\n                                    \r\n                                </div>\r\n\r\n<div><br>Setting the mood with incense\r\n                                    <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incidi-dunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitati-on ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in repre-henderit in voluptate velit esse cillum \r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non \r\nproident, sunt in culpa qui officia. </p>\r\n                                    A cleansing hot shower or bath\r\n                                    <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incidi-dunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitati-on ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in repre-henderit in voluptate velit esse cillum \r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non \r\nproident, sunt in culpa qui officia. </p>\r\n                                    Setting the mood with incense\r\n                                    <ul>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li></ul></div>', 1, 'html,css,js', 'Duis aute irure dolor in repre-henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.', 0, '2021-02-11 05:35:56', '2021-02-11 05:41:24'),
(3, 1, 1, 'Lorem ipsum dolor sit amet, consecte cing elit, sed do eiusmod tempor.', 'Lorem-ipsum-dolor-sit-amet,-consecte-cing-elit,-sed-do-eiusmod-tempor.', '1613043644825936294.jpg', '<div><p>Lorem ipsum dolor sit amet, consectetur\r\n adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore \r\nmagna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco\r\n laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor \r\nin reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla \r\npariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa \r\nqui officia deserunt mollit anim id est laborum. Sed ut perspiciatis \r\nunde omnis iste natus error sit voluptatem accusantium doloremque \r\nlaudantium, totam rem aperiam, eaque ipsa quae ab illo inventore \r\nveritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo \r\nenim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, \r\nsed quia consequuntur magni dolores eos qui ratione voluptatem sequi \r\nnesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit \r\namet, consectetur, adipisci velit, sed quia non numquam eius modi \r\ntempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n                                    <p>Lorem ipsum dolor \r\nsit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt\r\n ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud\r\n exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum \r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non \r\nproident, sunt in culpa qui officia deserunt.</p>\r\n                                    \r\n                                </div>\r\n\r\n<div><br>Setting the mood with incense\r\n                                    <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incidi-dunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitati-on ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in repre-henderit in voluptate velit esse cillum \r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non \r\nproident, sunt in culpa qui officia. </p>\r\n                                    A cleansing hot shower or bath\r\n                                    <p>Lorem ipsum dolor sit amet, \r\nconsectetur adipisicing elit, sed do eiusmod tempor incidi-dunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud \r\nexercitati-on ullamco laboris nisi ut aliquip ex ea commodo consequat. \r\nDuis aute irure dolor in repre-henderit in voluptate velit esse cillum \r\ndolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non \r\nproident, sunt in culpa qui officia. </p>\r\n                                    Setting the mood with incense\r\n                                    <ul>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li>\r\n                                        <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</li></ul></div>', 1, 'html,css,js', 'Duis aute irure dolor in repre-henderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.', 0, '2021-02-11 05:35:56', '2021-02-11 05:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `language_id`, `status`, `name`, `image`, `link`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'geniusdevs', 'portfolio_16326232271324997982.png', 'https://themeforest.net/user/geniusdevs/portfolio', 0, '2021-02-10 04:39:18', '2021-09-25 20:27:07'),
(2, '1', 1, 'geniusdevs', 'portfolio_16326232201622288972.png', 'https://themeforest.net/user/geniusdevs/portfolio', 0, '2021-02-10 04:39:45', '2021-09-25 20:27:00'),
(3, '1', 1, 'geniusdevs', 'portfolio_16326232131697465547.png', 'https://themeforest.net/user/geniusdevs/portfolio', 0, '2021-02-10 04:40:06', '2021-09-25 20:26:53'),
(4, '1', 1, 'geniusdevs', 'portfolio_1632623205362299312.png', 'https://themeforest.net/user/geniusdevs/portfolio', 0, '2021-02-10 04:40:22', '2021-09-25 20:26:45'),
(5, '1', 1, 'geniusdevs', 'portfolio_1632623198220024212.png', 'https://themeforest.net/user/geniusdevs/portfolio', 0, '2021-02-10 04:40:50', '2021-09-25 20:26:38'),
(6, '1', 1, 'geniusdevs', 'portfolio_1632623271538021622.png', 'https://themeforest.net/user/geniusdevs/portfolio', 0, '2021-02-10 04:41:05', '2021-09-25 20:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `language_id`, `status`, `title`, `number`, `icon`, `text`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Projct Complate', 569, 'fal fa-box', 'Sed ut perspiciatis unde omnis iste natus error sit voluptsantium doloremque laudantium', 0, '2021-02-10 03:19:45', '2021-02-12 22:02:20'),
(2, 1, 1, 'Happy Clients', 356, 'fal fa-users', 'Sed ut perspiciatis unde omnis iste natus error sit voluptsantium doloremque laudantium', 0, '2021-02-10 03:20:34', '2021-02-12 22:02:16'),
(3, 1, 1, 'Business Partners', 783, 'fal fa-globe', 'Sed ut perspiciatis unde omnis iste natus error sit voluptsantium doloremque laudantium', 0, '2021-02-10 03:21:11', '2021-02-12 22:02:12'),
(4, 1, 1, 'IT Consultant', 894, 'fal fa-award', 'Sed ut perspiciatis unde omnis iste natus error sit voluptsantium doloremque laudantiu', 0, '2021-02-10 03:21:37', '2021-02-12 22:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `sign`, `value`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'USD', '$', 1, 1, '2020-10-04 10:20:59', '2021-06-10 08:12:00'),
(3, 'EUR', '€', 0.8, 0, '2020-10-04 10:30:40', '2021-06-10 08:12:00'),
(4, 'BDT', '৳', 80, 0, '2021-06-10 08:03:52', '2021-06-10 08:12:00'),
(5, 'INR', '₹', 73.1, 0, '2021-06-10 09:01:40', '2021-06-10 09:01:40'),
(6, 'TL', '₺', 8.4, 0, '2021-06-10 09:03:08', '2021-06-10 09:05:50'),
(7, 'NGN', '₦', 60, 0, '2021-10-28 04:50:09', '2021-10-28 05:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `daynamicpages`
--

CREATE TABLE `daynamicpages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` blob,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daynamicpages`
--

INSERT INTO `daynamicpages` (`id`, `language_id`, `name`, `title`, `subtitle`, `slug`, `body`, `status`, `serial_number`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Trams & Conditions', 'Trams', 'Trams-&-Conditions', 0x3c73656374696f6e20636c6173733d22707269766163792d61726561223e0d0a20202020202020203c64697620636c6173733d22636f6e7461696e6572223e0d0a2020202020202020202020203c64697620636c6173733d22726f77223e0d0a202020202020202020202020202020203c64697620636c6173733d22636f6c2d6c672d3132223e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68323e5472616d732026616d703b20436f6e646974696f6e733c2f68323e0d0a2020202020202020202020202020202020202020202020203c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66200d0a4c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d650d0a20666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e2774206c6f6f6b206576656e200d0a736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f6620546865726520617265206d616e790d0a20766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f726974792068617665200d0a737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d69736564200d0a776f72647320776869636820646f6e2774206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f207573650d0a20612070617373616765206f6620546865726520617265206d616e7920766172696174696f6e732e3c2f703e0d0a2020202020202020202020202020202020202020202020203c7370616e20636c6173733d2264617465223e55706461746564204a616e7561727920362c20323032303c2f7370616e3e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732e204c6f72656d20697073756d20646f6c6f7220736974200d0a616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e64697373652076697461650d0a206578206665726d656e74756d2c2073757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c200d0a757420736f64616c65732066656c69732072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c206964200d0a766573746962756c756d20746f72746f7220616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732e3c2f703e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d69206175677565204c6f72656d20697073756d20646f6c6f720d0a2073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365200d0a7669746165206578206665726d656e74756d2c2073757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d69200d0a61756775652e3c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68323e4f766572766965773c2f68323e0d0a2020202020202020202020202020202020202020202020203c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66200d0a4c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d650d0a20666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e2774206c6f6f6b206576656e200d0a736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f6620546865726520617265206d616e790d0a20766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f726974792068617665200d0a737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722e3c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68343e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e3c2f68343e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e20457469616d206d6178696d757320706f72747469746f720d0a206d61676e612073697420616d657420636f6e73656374657475722e20496e7465676572206567657420616e7465207363656c6572697371756520746f72746f72200d0a736f64616c657320616c69717565742e20496e746567657220696e20766573746962756c756d206c656f2c20766974616520747269737469717565206f7263692e20457469616d200d0a746f72746f722073656d2c20706f72747469746f722061742070656c6c656e7465737175652073697420616d65742c206672696e67696c6c61206e6563206d617373612e200d0a4e756e63206e6563206d61676e6120736564206d6574757320747269737469717565206f726e617265207669746165207574206e69736c2e204d6175726973206c61637573200d0a656e696d2c20706f73756572652065742074696e636964756e7420636f6e64696d656e74756d2c20736f64616c657320616320656c69742e3c2f703e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e3c2f703e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e20457469616d206d6178696d757320706f72747469746f720d0a206d61676e612073697420616d657420636f6e73656374657475722e20496e7465676572206567657420616e7465207363656c6572697371756520746f72746f72200d0a736f64616c657320616c69717565742e20496e746567657220696e20766573746962756c756d206c656f2c20766974616520747269737469717565206f7263692e20457469616d200d0a746f72746f723c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68343e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e3c2f68343e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e20457469616d206d6178696d757320706f72747469746f720d0a206d61676e612073697420616d657420636f6e73656374657475722e20496e7465676572206567657420616e7465207363656c6572697371756520746f72746f72200d0a736f64616c657320616c69717565742e20496e746567657220696e20766573746962756c756d206c656f2c20766974616520747269737469717565206f7263692e20457469616d200d0a746f72746f722073656d2c20706f72747469746f722061742070656c6c656e7465737175652073697420616d65742c206672696e67696c6c61206e6563206d617373612e200d0a4e756e63206e6563206d61676e6120736564206d6574757320747269737469717565206f726e617265207669746165207574206e69736c2e204d6175726973206c61637573200d0a656e696d2c20706f73756572652065742074696e636964756e7420636f6e64696d656e74756d2c20736f64616c657320616320656c69742e3c2f703e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e3c2f703e0d0a2020202020202020202020202020202020202020202020203c756c20636c6173733d226c697374223e0d0a202020202020202020202020202020202020202020202020202020203c6c693e52616e646f6d6973656420776f72647320776869636820646f6e2774206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e3c2f6c693e0d0a202020202020202020202020202020202020202020202020202020203c6c693e42792070726f766964696e6720706572736f6e616c20696e666f726d6174696f6e20746f20757320616e642062792072657461696e696e6720757320746f2070726f7669646520796f752077697468207468652053657276696365732e3c2f6c693e0d0a202020202020202020202020202020202020202020202020202020203c6c693e566f6c756e746172696c7920636f6e73656e7420746f2074686520636f6c6c656374696f6e2c2075736520616e6420646973636c6f73757265206f66207375636820706572736f6e616c20696e666f726d6174696f6e2061732073706563696669656420696e2074686973205072697661637920506f6c6963792e3c2f6c693e0d0a202020202020202020202020202020202020202020202020202020203c6c693e546865206c6567616c20626173657320666f72206f75722070726f63657373696e67206f66200d0a706572736f6e616c20696e666f726d6174696f6e20617265207072696d6172696c792074686174207468652070726f63657373696e67206973206e656365737361727920666f72200d0a70726f766964696e672074686520536572766963657320616e642074686174207468652070726f63657373696e672069732063617272696564206f757420696e206f7572200d0a6c65676974696d61746520696e746572657374732c207768696368206172652066757274686572206578706c61696e65642062656c6f772e3c2f6c693e0d0a202020202020202020202020202020202020202020202020202020203c6c693e576974686f7574206c696d6974696e672074686520666f7265676f696e672c207765206d6179206f6e206f63636173696f6e2061736b20796f7520746f20636f6e73656e74207768656e20776520636f6c6c6563742e3c2f6c693e0d0a2020202020202020202020202020202020202020202020203c2f756c3e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68343e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e3c2f68343e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e20457469616d206d6178696d757320706f72747469746f720d0a206d61676e612073697420616d657420636f6e73656374657475722e20496e7465676572206567657420616e7465207363656c6572697371756520746f72746f72200d0a736f64616c657320616c69717565742e20496e746567657220696e20766573746962756c756d206c656f2c20766974616520747269737469717565206f7263692e20457469616d200d0a746f72746f722073656d2c20706f72747469746f722061742070656c6c656e7465737175652073697420616d65742c206672696e67696c6c61206e6563206d617373612e200d0a4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e204e616d206174206e69736c200d0a6c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c2073757363697069742073656d2069642c2064617069627573206f7263692e3c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68323e536563757269747920616e6420526574656e74696f6e3c2f68323e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e3c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68323e436f6e746163742055733c2f68323e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e204c6f72656d20697073756d20646f6c6f7220736974200d0a616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e3c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a202020202020202020202020202020203c2f6469763e0d0a2020202020202020202020203c2f6469763e0d0a20202020202020203c2f6469763e3c2f73656374696f6e3e, 1, 0, 'html,css,js', '1914 translation by H. Rackham \"On the other hand, we denounce with righteous indignation and dislike men', '2021-02-17 06:54:16', '2021-02-17 07:52:57'),
(2, 1, NULL, 'Privecy & Policy', 'Policy', 'Privecy-&-Policy', 0x3c73656374696f6e20636c6173733d22707269766163792d61726561223e0d0a20202020202020203c64697620636c6173733d22636f6e7461696e6572223e0d0a2020202020202020202020203c64697620636c6173733d22726f77223e0d0a202020202020202020202020202020203c64697620636c6173733d22636f6c2d6c672d3132223e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68323e5072697661637920506f6c6963793c2f68323e0d0a2020202020202020202020202020202020202020202020203c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66200d0a4c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d650d0a20666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e2774206c6f6f6b206576656e200d0a736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f6620546865726520617265206d616e790d0a20766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f726974792068617665200d0a737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d69736564200d0a776f72647320776869636820646f6e2774206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f207573650d0a20612070617373616765206f6620546865726520617265206d616e7920766172696174696f6e732e3c2f703e0d0a2020202020202020202020202020202020202020202020203c7370616e20636c6173733d2264617465223e55706461746564204a616e7561727920362c20323032303c2f7370616e3e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732e204c6f72656d20697073756d20646f6c6f7220736974200d0a616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e64697373652076697461650d0a206578206665726d656e74756d2c2073757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c200d0a757420736f64616c65732066656c69732072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c206964200d0a766573746962756c756d20746f72746f7220616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732e3c2f703e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d69206175677565204c6f72656d20697073756d20646f6c6f720d0a2073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365200d0a7669746165206578206665726d656e74756d2c2073757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d69200d0a61756775652e3c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68323e4f766572766965773c2f68323e0d0a2020202020202020202020202020202020202020202020203c703e546865726520617265206d616e7920766172696174696f6e73206f66207061737361676573206f66200d0a4c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f72697479206861766520737566666572656420616c7465726174696f6e20696e20736f6d650d0a20666f726d2c20627920696e6a65637465642068756d6f75722c206f722072616e646f6d6973656420776f72647320776869636820646f6e2774206c6f6f6b206576656e200d0a736c696768746c792062656c69657661626c652e20496620796f752061726520676f696e6720746f2075736520612070617373616765206f6620546865726520617265206d616e790d0a20766172696174696f6e73206f66207061737361676573206f66204c6f72656d20497073756d20617661696c61626c652c2062757420746865206d616a6f726974792068617665200d0a737566666572656420616c7465726174696f6e20696e20736f6d6520666f726d2c20627920696e6a65637465642068756d6f75722e3c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68343e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e3c2f68343e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e20457469616d206d6178696d757320706f72747469746f720d0a206d61676e612073697420616d657420636f6e73656374657475722e20496e7465676572206567657420616e7465207363656c6572697371756520746f72746f72200d0a736f64616c657320616c69717565742e20496e746567657220696e20766573746962756c756d206c656f2c20766974616520747269737469717565206f7263692e20457469616d200d0a746f72746f722073656d2c20706f72747469746f722061742070656c6c656e7465737175652073697420616d65742c206672696e67696c6c61206e6563206d617373612e200d0a4e756e63206e6563206d61676e6120736564206d6574757320747269737469717565206f726e617265207669746165207574206e69736c2e204d6175726973206c61637573200d0a656e696d2c20706f73756572652065742074696e636964756e7420636f6e64696d656e74756d2c20736f64616c657320616320656c69742e3c2f703e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e3c2f703e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e20457469616d206d6178696d757320706f72747469746f720d0a206d61676e612073697420616d657420636f6e73656374657475722e20496e7465676572206567657420616e7465207363656c6572697371756520746f72746f72200d0a736f64616c657320616c69717565742e20496e746567657220696e20766573746962756c756d206c656f2c20766974616520747269737469717565206f7263692e20457469616d200d0a746f72746f723c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68343e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e3c2f68343e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e20457469616d206d6178696d757320706f72747469746f720d0a206d61676e612073697420616d657420636f6e73656374657475722e20496e7465676572206567657420616e7465207363656c6572697371756520746f72746f72200d0a736f64616c657320616c69717565742e20496e746567657220696e20766573746962756c756d206c656f2c20766974616520747269737469717565206f7263692e20457469616d200d0a746f72746f722073656d2c20706f72747469746f722061742070656c6c656e7465737175652073697420616d65742c206672696e67696c6c61206e6563206d617373612e200d0a4e756e63206e6563206d61676e6120736564206d6574757320747269737469717565206f726e617265207669746165207574206e69736c2e204d6175726973206c61637573200d0a656e696d2c20706f73756572652065742074696e636964756e7420636f6e64696d656e74756d2c20736f64616c657320616320656c69742e3c2f703e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e3c2f703e0d0a2020202020202020202020202020202020202020202020203c756c20636c6173733d226c697374223e0d0a202020202020202020202020202020202020202020202020202020203c6c693e52616e646f6d6973656420776f72647320776869636820646f6e2774206c6f6f6b206576656e20736c696768746c792062656c69657661626c652e3c2f6c693e0d0a202020202020202020202020202020202020202020202020202020203c6c693e42792070726f766964696e6720706572736f6e616c20696e666f726d6174696f6e20746f20757320616e642062792072657461696e696e6720757320746f2070726f7669646520796f752077697468207468652053657276696365732e3c2f6c693e0d0a202020202020202020202020202020202020202020202020202020203c6c693e566f6c756e746172696c7920636f6e73656e7420746f2074686520636f6c6c656374696f6e2c2075736520616e6420646973636c6f73757265206f66207375636820706572736f6e616c20696e666f726d6174696f6e2061732073706563696669656420696e2074686973205072697661637920506f6c6963792e3c2f6c693e0d0a202020202020202020202020202020202020202020202020202020203c6c693e546865206c6567616c20626173657320666f72206f75722070726f63657373696e67206f66200d0a706572736f6e616c20696e666f726d6174696f6e20617265207072696d6172696c792074686174207468652070726f63657373696e67206973206e656365737361727920666f72200d0a70726f766964696e672074686520536572766963657320616e642074686174207468652070726f63657373696e672069732063617272696564206f757420696e206f7572200d0a6c65676974696d61746520696e746572657374732c207768696368206172652066757274686572206578706c61696e65642062656c6f772e3c2f6c693e0d0a202020202020202020202020202020202020202020202020202020203c6c693e576974686f7574206c696d6974696e672074686520666f7265676f696e672c207765206d6179206f6e206f63636173696f6e2061736b20796f7520746f20636f6e73656e74207768656e20776520636f6c6c6563742e3c2f6c693e0d0a2020202020202020202020202020202020202020202020203c2f756c3e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68343e546865207374616e64617264206368756e6b206f66204c6f72656d20497073756d20757365642073696e63652074686520313530307320697320726570726f64756365642062656c6f7720666f722074686f736520696e74657265737465642e3c2f68343e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e20457469616d206d6178696d757320706f72747469746f720d0a206d61676e612073697420616d657420636f6e73656374657475722e20496e7465676572206567657420616e7465207363656c6572697371756520746f72746f72200d0a736f64616c657320616c69717565742e20496e746567657220696e20766573746962756c756d206c656f2c20766974616520747269737469717565206f7263692e20457469616d200d0a746f72746f722073656d2c20706f72747469746f722061742070656c6c656e7465737175652073697420616d65742c206672696e67696c6c61206e6563206d617373612e200d0a4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e204e616d206174206e69736c200d0a6c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c2073757363697069742073656d2069642c2064617069627573206f7263692e3c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68323e536563757269747920616e6420526574656e74696f6e3c2f68323e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e3c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a20202020202020202020202020202020202020203c64697620636c6173733d22636f6e74656e742d626f78206d622d3530223e0d0a2020202020202020202020202020202020202020202020203c68323e436f6e746163742055733c2f68323e0d0a2020202020202020202020202020202020202020202020203c703e4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572200d0a61646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e2053757370656e6469737365207669746165206578206665726d656e74756d2c200d0a73757363697069742073656d2069642c2064617069627573206f7263692e204372617320656666696369747572206d692061756775652c20757420736f64616c65732066656c69730d0a2072686f6e63757320626962656e64756d2e204675736365207361676974746973206e696268206f7263692c20696420766573746962756c756d20746f72746f72200d0a616c69717565742075742e20566976616d7573206d6178696d75732066656c6973206163206e69736c206c75637475732c20757420616c6971756574206d61737361200d0a73757363697069742e20536564207363656c65726973717565207175616d206a7573746f2c2073656420766f6c7574706174206e657175652074656d706f7220706f7274612e200d0a496e74657264756d206574206d616c6573756164612066616d657320616320616e746520697073756d207072696d697320696e2066617563696275732e20416c697175616d200d0a636f6e7365717561742074656c6c757320696420726973757320636f6e64696d656e74756d206672696e67696c6c612e204c6f72656d20697073756d20646f6c6f7220736974200d0a616d65742c20636f6e73656374657475722061646970697363696e6720656c69742e204e616d206174206e69736c206c6967756c612e3c2f703e0d0a20202020202020202020202020202020202020203c2f6469763e0d0a202020202020202020202020202020203c2f6469763e0d0a2020202020202020202020203c2f6469763e0d0a20202020202020203c2f6469763e3c2f73656374696f6e3e, 1, 0, 'html,css', 'perspiciatis unde omnis iste natus error sit voluptatem accusantium', '2021-02-17 06:55:45', '2021-02-17 07:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `ebanners`
--

CREATE TABLE `ebanners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebanners`
--

INSERT INTO `ebanners` (`id`, `language_id`, `image`, `title`, `price`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(3, '1', '16351832931248665045.jpg', 'Headphone', '324', 'Buy Now', '#', '2021-10-25 11:34:53', '2021-10-25 11:34:53'),
(4, '1', '16351833132079714827.jpg', 'Smartwatch', '35', 'BuyNow', '#', '2021-10-25 11:35:13', '2021-10-25 11:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `emailsettings`
--

CREATE TABLE `emailsettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_smtp` int(11) DEFAULT NULL,
  `header_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verification_email` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emailsettings`
--

INSERT INTO `emailsettings` (`id`, `is_smtp`, `header_email`, `smtp_host`, `smtp_port`, `email_encryption`, `smtp_user`, `smtp_pass`, `from_email`, `from_name`, `is_verification_email`, `created_at`, `updated_at`) VALUES
(1, 0, 'smtp', 'smtp.mailtrap.io', '2525', 'tls', '72fc7b576a3f57', '8db3922982412e', 'skynet@gmail.com', 'Skynet', 1, NULL, '2021-06-30 23:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `esliders`
--

CREATE TABLE `esliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `esliders`
--

INSERT INTO `esliders` (`id`, `language_id`, `status`, `background_image`, `image`, `title`, `price`, `button_text`, `button_link`, `serial_number`, `created_at`, `updated_at`) VALUES
(2, '1', '1', '1634307017595026928.jpg', '163430786517721162.png', 'Ultra HD Aerial Photography Remote Control Drone', '58', 'Buy Now', '#', 0, '2021-10-12 05:04:58', '2021-10-15 08:59:30'),
(3, '1', '1', '16343060901851620716.jpg', '16343097481258192521.png', 'Apple watch series 7 New Available', '34', 'Buy Now', '#', 0, '2021-10-12 05:05:32', '2021-10-15 08:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `extra_visibilities`
--

CREATE TABLE `extra_visibilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_t7_slider_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t7_video_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t7_service_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t7_portfolio_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t7_team_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t7_testimonial_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t7_callaction_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t7_blog_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t7_brand_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t8_hero_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t8_about_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t8_video_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t8_service_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t8_callaction_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t8_portfolio_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t8_testimonial_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t8_team_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t8_blog_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t8_brand_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t9_slider_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t9_banner_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t9_popularcategory_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t9_newproduct_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t9_featureproduct_section` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extra_visibilities`
--

INSERT INTO `extra_visibilities` (`id`, `is_t7_slider_section`, `is_t7_video_section`, `is_t7_service_section`, `is_t7_portfolio_section`, `is_t7_team_section`, `is_t7_testimonial_section`, `is_t7_callaction_section`, `is_t7_blog_section`, `is_t7_brand_section`, `is_t8_hero_section`, `is_t8_about_section`, `is_t8_video_section`, `is_t8_service_section`, `is_t8_callaction_section`, `is_t8_portfolio_section`, `is_t8_testimonial_section`, `is_t8_team_section`, `is_t8_blog_section`, `is_t8_brand_section`, `is_t9_slider_section`, `is_t9_banner_section`, `is_t9_popularcategory_section`, `is_t9_newproduct_section`, `is_t9_featureproduct_section`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `language_id`, `status`, `title`, `content`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'We Provide Professional Service', '<p><span style=\"color:rgb(97,97,97);font-family:Karla, sans-serif;font-size:15px;\">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam</span><br></p>', 0, '2021-02-10 00:33:37', '2021-02-10 00:39:16'),
(2, '1', 1, 'Stay Up, Stay Running & Protected', '<p><span style=\"color:rgb(97,97,97);font-family:Karla, sans-serif;font-size:15px;\">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam</span><br></p>', 1, '2021-02-10 00:34:16', '2021-02-10 00:39:04'),
(3, '1', 1, 'Our Experienced Experts', '<p><span style=\"color:rgb(97,97,97);font-family:Karla, sans-serif;font-size:15px;\">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam</span><br></p>', 0, '2021-02-10 00:34:37', '2021-02-10 00:38:55'),
(4, '1', 1, 'Management Engineering System', '<p><span style=\"color:rgb(97,97,97);font-family:Karla, sans-serif;font-size:15px;\">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam</span><br></p>', 0, '2021-02-10 00:34:53', '2021-02-10 00:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `language_id`, `status`, `icon`, `title`, `text`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'fal fa-laptop-code', 'IT Soluations', 'Sed ut perspiciatis unde omnis iste natus error volup', 0, '2021-02-08 21:32:48', '2021-02-08 21:47:31'),
(2, '1', 1, 'fal fa-fingerprint', 'Security System', 'Sed ut perspiciatis unde omnis iste natus error volup', 0, '2021-02-08 21:36:17', '2021-02-08 21:47:26'),
(3, '1', 1, 'fal fa-chalkboard', 'Web Development', 'Sed ut perspiciatis unde omnis iste natus error volup', 0, '2021-02-08 21:36:45', '2021-02-08 21:47:20'),
(4, '1', 1, 'fal fa-database', 'Database Security', 'Sed ut perspiciatis unde omnis iste natus error volup', 0, '2021-02-08 21:37:15', '2021-02-08 21:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `flinks`
--

CREATE TABLE `flinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flinks`
--

INSERT INTO `flinks` (`id`, `language_id`, `name`, `url`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'About Us', '#', 0, '2021-02-14 22:55:49', '2021-02-14 22:55:49'),
(2, 1, 'Our Privacy', '#', 0, '2021-02-14 22:56:04', '2021-02-14 22:56:04'),
(3, 1, 'Services', '#', 0, '2021-02-14 22:56:19', '2021-02-14 22:56:19'),
(4, 1, 'Portfolio', '#', 1, '2021-02-14 22:56:27', '2021-02-14 23:00:17'),
(5, 1, 'Policy', '#', 0, '2021-02-19 07:45:06', '2021-02-19 07:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `language_id`, `category_id`, `status`, `title`, `image`, `video_link`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Lorem Ipsum is simply dummy text', '16227158212096332540.jpg', 'https://www.youtube.com/watch?v=TdSA7gkVYU0', 0, '2021-06-03 04:23:41', '2021-06-03 08:57:19'),
(2, 1, 6, 1, 'Lorem Ipsum is simply dummy text 3', '16227164631746340932.jpg', NULL, 0, '2021-06-03 04:34:23', '2021-06-03 07:43:32'),
(3, 1, 5, 1, 'Lorem Ipsum is simply dummy text', '162271648145470834.jpg', NULL, 0, '2021-06-03 04:34:41', '2021-06-03 04:34:41'),
(4, 1, 7, 1, 'Lorem Ipsum is simply dummy text', '1622716667600245379.jpg', 'https://www.youtube.com/watch?v=TdSA7gkVYU0', 0, '2021-06-03 04:37:47', '2021-06-03 08:57:02'),
(5, 1, 6, 1, 'Lorem Ipsum is simply dummy text', '1622716686901564109.jpg', NULL, 0, '2021-06-03 04:38:06', '2021-06-03 04:38:06'),
(6, 1, 1, 1, 'Lorem Ipsum is simply dummy text', '1622716697999365121.jpg', 'https://www.youtube.com/watch?v=TdSA7gkVYU0', 0, '2021-06-03 04:38:17', '2021-06-03 08:56:50'),
(7, 1, 1, 1, 'Lorem Ipsum is simply dummy text', '16227167181065391120.jpg', NULL, 0, '2021-06-03 04:38:38', '2021-06-03 04:38:38'),
(9, 2, 8, 1, 'Technical content may have per suasive objectives.', '1622728005808816533.jpg', NULL, 0, '2021-06-03 07:46:45', '2021-06-03 07:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `gcategories`
--

CREATE TABLE `gcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gcategories`
--

INSERT INTO `gcategories` (`id`, `language_id`, `name`, `status`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Finance', 1, 1, '2021-06-02 05:58:35', '2021-06-03 04:36:31'),
(2, 1, 'Consulting', 1, 0, '2021-06-02 05:58:48', '2021-06-03 04:36:20'),
(5, 1, 'Development', 1, 0, '2021-06-03 03:25:30', '2021-06-03 04:36:06'),
(6, 1, 'Branding', 1, 0, '2021-06-03 04:36:42', '2021-06-03 04:37:09'),
(7, 1, 'Capital', 1, 0, '2021-06-03 04:36:58', '2021-06-03 04:37:05'),
(8, 2, 'Branding2', 1, 0, '2021-06-03 07:46:21', '2021-06-03 07:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `language_id`, `status`, `title`, `image`, `date`, `position`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'Technical content may have per suasive objectives.', 'portfolio_1613022814321244425.jpg', '2021', 'Startup', 0, '2021-02-10 23:45:44', '2021-02-10 23:53:34'),
(2, '1', 1, 'Technical content may have per suasive objectives.', 'portfolio_16130228451015952493.jpg', '2021', 'Startup', 0, '2021-02-10 23:45:58', '2021-02-10 23:54:05'),
(3, '1', 1, 'Technical content may have per suasive objectives.', 'portfolio_16130228551806026364.jpg', '2021', 'Startup', 0, '2021-02-10 23:46:12', '2021-02-10 23:54:15'),
(4, '1', 1, 'Technical content may have per suasive objectives.', '161302242519469749.jpg', '2021', 'Startup', 0, '2021-02-10 23:47:05', '2021-02-10 23:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `jcategories`
--

CREATE TABLE `jcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jcategories`
--

INSERT INTO `jcategories` (`id`, `language_id`, `name`, `slug`, `status`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Developer', 'web-developer', 1, 0, '2021-06-03 10:43:13', '2021-06-03 10:43:13'),
(2, 1, 'Web Designer', 'web-designer', 1, 0, '2021-06-03 10:43:23', '2021-06-03 10:43:23'),
(3, 1, 'Team Leader', 'team-leader', 1, 0, '2021-06-03 10:43:31', '2021-06-03 10:43:31'),
(4, 1, 'IOS Developer', 'ios-developer', 1, 0, '2021-06-03 10:43:37', '2021-06-03 10:43:37'),
(5, 1, 'Andriod Developer', 'andriod-developer', 1, 0, '2021-06-03 10:43:55', '2021-06-03 10:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `jcategory_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacancy` int(11) DEFAULT NULL,
  `deadline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_location` text COLLATE utf8mb4_unicode_ci,
  `salary` text COLLATE utf8mb4_unicode_ci,
  `other_benefits` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_responsibility` text COLLATE utf8mb4_unicode_ci,
  `education_requirement` text COLLATE utf8mb4_unicode_ci,
  `job_context` text COLLATE utf8mb4_unicode_ci,
  `experience_requirement` text COLLATE utf8mb4_unicode_ci,
  `additional_requirement` text COLLATE utf8mb4_unicode_ci,
  `meta_tags` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `language_id`, `jcategory_id`, `title`, `slug`, `position`, `company_name`, `vacancy`, `deadline`, `employment_status`, `job_location`, `salary`, `other_benefits`, `email`, `job_responsibility`, `education_requirement`, `job_context`, `experience_requirement`, `additional_requirement`, `meta_tags`, `meta_description`, `status`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Mobile App Market Systems Leader', 'mobile-app-market-systems-leader', 'Jr Digital Marketer', 'GeniusDevs', 4, '11/18/2021', 'Full-Time', 'New work, USA', '$2000-$4000', 'You have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.', NULL, 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'html,css,js', 'You are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors', 1, 0, NULL, NULL),
(2, 1, 5, 'Android App Market Systems Leader', 'android-app-market-systems-leader', 'Jr Digital Marketer', 'GeniusDevs', 4, '11/18/2021', 'Full-Time', 'New work, USA', '$2000-$4000', 'You have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.', NULL, 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'html,css,js', 'You are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors', 1, 0, NULL, NULL),
(3, 1, 2, 'Laravel Developer', 'laravel-developer', 'Jr Digital Marketer', 'GeniusDevs', 4, '11/18/2021', 'Full-Time', 'New work, USA', '$2000-$4000', 'You have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.', NULL, 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'html,css,js', 'You are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors', 1, 0, NULL, NULL),
(4, 1, 3, 'Node JS App Developer', 'node-js-app-developer', 'Jr Digital Marketer', 'GeniusDevs', 4, '11/18/2021', 'Full-Time', 'New work, USA', '$2000-$4000', 'You have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.', NULL, 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'html,css,js', 'You are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors', 1, 0, NULL, NULL),
(5, 1, 2, 'Expert UI/UX Designer', 'expert-uiux-designer', 'Jr Digital Marketer', 'GeniusDevs', 4, '11/18/2021', 'Full-Time', 'New work, USA', '$2000-$4000', 'You have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.', NULL, 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material.\r\nYou have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API.\r\nWell versed with Angular modules or you have created custom and web components by yourself.\r\nYou must have practical experience on Node.js, TypeScript, webpack and Third party library.\r\nYou have an in-depth understanding of cross browser compatibility and you do not create bugs for such reasons.\r\nYou are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors, Media queries, Image compression and be good with debugging.', 'html,css,js', 'You are pixel-perfect in design conversions and you think of mobile-first implementations.\r\nYou should have knowledge of CSS preprocessors', 1, 0, NULL, NULL),
(6, 1, 1, 'Repudiandae ut sint', 'repudiandae-ut-sint', 'Reiciendis omnis ali', 'Chandler and Kane Traders', 2, '11/18/2021', 'Full-Time', 'Commodo enim veniam', 'Ut ex omnis illum o', 'Consequuntur quo non. sdfg', NULL, 'Consectetur, quos qu. dsfg', 'Aliquid commodo numq. dsfg', 'Excepturi laudantium. sdfg', 'Recusandae. Et volup. sdfg', 'Id, accusamus quaera. sdfg', 'Et veniam voluptate', 'Ut laboris in odio v', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job_title`, `type`, `file`, `name`, `email`, `phone`, `expected_salary`, `status`, `message`, `created_at`, `updated_at`) VALUES
(3, 'Mobile App Market Systems Leader', 'Jr Digital Marketer', '73dQnDk0gVgcnSrbMamunur Rashid.pdf', 'Mamunur Rashid', 'test@gmail.com', '32452', '233', '0', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '2021-06-05 06:37:52', '2021-06-05 06:37:52'),
(4, 'Mobile App Market Systems Leader', 'Jr Digital Marketer', 'SWzsDm89buhiso33Rafi.pdf', 'Rafi', 'rafi@gmail.com', '23452354325', '234', '3', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material. You have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API. Well versed with Angular modules or you have created custom and web components by yourself. You must have practical experience on Node.js, TypeScript, webpack and Third party library. You have an in-depth understanding of cross browser compatibility and you do not create bugs for such reason', '2021-06-05 06:39:57', '2021-06-05 06:53:16'),
(5, 'Laravel Developer', 'Jr Digital Marketer', 'h7dKbhSKEF8MByvcMahfuj Khan.pdf', 'Mahfuj Khan', 'test4@gmail.com', '234512352345', '324', '2', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material. You have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API. Well versed with Angular modules or you have created custom and web components by yourself. You must have practical experience on Node.js, TypeScript, webpack and Third party library. You have an in-depth understanding of cross browser compatibility and you do not create bugs for such reason', '2021-06-05 06:42:11', '2021-06-05 06:53:14'),
(6, 'Expert UI/UX Designer', 'Jr Digital Marketer', 'omLrTqjEdey9HrU3Sihab.pdf', 'Sihab', 'test7@gmail.com', '23455', '345', '1', 'You have to be experienced with UI frameworks in general; we love the Angular and Angular material. You have to be experienced in building Single Page Applications (SPA) & integrating Web (Rest) API. Well versed with Angular modules or you have created custom and web components by yourself. You must have practical experience on Node.js, TypeScript, webpack and Third party library. You have an in-depth understanding of cross browser compatibility and you do not create bugs for such reason', '2021-06-05 06:42:53', '2021-06-05 06:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` int(11) NOT NULL DEFAULT '0',
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `is_default`, `direction`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 1, 'ltr', NULL, '2021-10-27 11:03:47'),
(2, 'Hindi', 'in', 0, 'rtl', '2021-09-27 07:38:10', '2021-09-28 05:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `menus` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `language_id`, `menus`, `created_at`, `updated_at`) VALUES
(36, 1, '[{\"text\":\"Home\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"home\"},{\"text\":\"About\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"about\"},{\"text\":\"Services\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"services\"},{\"text\":\"Portfolios\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"portfolios\"},{\"text\":\"Pages\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"pages\",\"children\":[{\"text\":\"Packages\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"packages\"},{\"text\":\"Team\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"team\"},{\"text\":\"FAQ\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"faq\"},{\"text\":\"Gallery\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"gallery\"},{\"text\":\"Career\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"career\"},{\"text\":\"Blogs\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"blogs\"},{\"text\":\"Custom Pages\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\",\"children\":[{\"text\":\"Privecy & Policy\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"2\"},{\"text\":\"Trams & Conditions\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"1\"}]}]},{\"text\":\"Products\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"products-mega\"},{\"text\":\"Contact\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"contact\"}]', '2021-06-15 16:48:50', '2021-06-15 16:48:50'),
(37, 2, '[{\"text\":\"Home\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"home\"},{\"text\":\"About\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"about\"},{\"text\":\"Services\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"services\"},{\"text\":\"Portfolios\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"portfolios\"},{\"text\":\"Pages\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"pages\",\"children\":[{\"text\":\"Packages\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"packages\"},{\"text\":\"Team\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"team\"},{\"text\":\"FAQ\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"faq\"},{\"text\":\"Gallery\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"gallery\"},{\"text\":\"Career\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"career\"},{\"text\":\"Blogs\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"blogs\"},{\"text\":\"Custom Pages\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"custom\",\"children\":[{\"text\":\"Privecy & Policy\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"2\"},{\"text\":\"Trams & Conditions\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"1\"}]}]},{\"text\":\"Products\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"products-mega\"},{\"text\":\"Contact\",\"href\":\"\",\"icon\":\"empty\",\"target\":\"_self\",\"title\":\"\",\"type\":\"contact\"}]', '2021-09-27 07:38:10', '2021-09-27 07:38:10');

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
(1, '2020_05_25_122740_create_admins_table', 1),
(3, '2020_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_12_100000_create_password_resets_table', 1),
(7, '2020_10_26_035012_create_languages_table', 1),
(8, '2020_10_27_024546_create_sliders_table', 1),
(10, '2020_10_27_025335_create_services_table', 1),
(12, '2020_10_27_025627_create_faqs_table', 1),
(13, '2020_11_17_122813_create_newsletters_table', 1),
(14, '2020_11_20_085050_create_emailsettings_table', 1),
(15, '2020_12_25_124242_create_socials_table', 1),
(16, '2021_01_01_123641_create_blogs_table', 1),
(17, '2021_01_01_123728_create_bcategories_table', 1),
(18, '2021_01_03_110518_create_testimonials_table', 1),
(22, '2021_01_24_111458_create_backups_table', 1),
(23, '2021_02_07_145147_create_features_table', 1),
(24, '2021_02_07_145631_create_why_selects_table', 1),
(26, '2021_02_07_151616_create_clients_table', 1),
(27, '2021_02_07_152047_create_counters_table', 1),
(28, '2021_02_08_041017_create_archives_table', 1),
(29, '2021_02_08_042120_create_portfolios_table', 1),
(30, '2021_02_08_042357_create_portfolio_images_table', 1),
(31, '2020_10_13_123757_create_settings_table', 2),
(32, '2020_10_14_103316_create_sectiontitle_table', 3),
(33, '2021_02_09_043348_add_video_info_to_sectiontitles_table', 4),
(34, '2021_02_09_050446_add_about_info_to_sectiontitles_table', 5),
(36, '2020_10_27_025547_create_teams_table', 6),
(37, '2021_02_07_151349_create_histories_table', 7),
(38, '2021_02_12_045400_add_opening_hours_to_settings', 8),
(39, '2021_02_13_041641_add_meet_text_to_sectiontitles_table', 9),
(40, '2021_02_15_035217_add_footer_bg_to_settings_table', 10),
(41, '2021_02_15_043251_create_flinks_table', 11),
(42, '2021_02_15_112132_add_testimonial_content_to_sectiontitles_table', 12),
(43, '2021_02_16_111526_add_link_to_portfolios_table', 13),
(44, '2020_10_27_025201_create_packages_table', 14),
(45, '2021_01_24_105925_create_quotes_table', 15),
(46, '2021_01_07_105717_create_daynamicpages_table', 16),
(47, '2021_02_19_140441_add_page_visibility_to_settings_table', 17),
(48, '2021_01_24_110045_create_roles_table', 18),
(50, '2021_04_23_204005_add_moretableinsettings2_to_settings_table', 19),
(52, '2021_06_02_102316_create_galleries_table', 20),
(53, '2021_06_02_104313_create_gcategories_table', 21),
(54, '2021_06_03_153757_create_jcategories_table', 22),
(55, '2021_06_03_154131_create_jobs_table', 22),
(56, '2021_06_03_170201_create_job_applications_table', 23),
(58, '2021_06_05_140053_create_products_table', 24),
(59, '2021_06_05_141134_create_product_images_table', 25),
(60, '2021_06_05_141356_create_currencies_table', 26),
(61, '2021_06_05_143117_create_shippings_table', 27),
(62, '2021_06_05_150051_create_product_categories_table', 28),
(64, '2020_05_26_000000_create_users_table', 30),
(65, '2021_06_13_080135_create_payment_gateweys_table', 31),
(71, '2021_06_13_161938_create_orders_table', 32),
(72, '2021_06_15_191726_create_menus_table', 33),
(74, '2021_06_17_110906_add_preloader_info_to_settings_table', 34),
(75, '2021_06_18_105514_add_rating_to_products_table', 35),
(76, '2021_06_18_105948_create_product_reviews_table', 36),
(78, '2021_06_19_105536_add_extra_page_visibility_to_settings_table', 37),
(79, '2021_06_28_171634_add_meta_info_to_settings_table', 38),
(80, '2021_06_29_052449_create_sitemaps_table', 39),
(81, '2021_08_20_234810_create_visibilities_table', 40),
(83, '2021_08_20_235925_create_seos_table', 41),
(84, '2021_09_26_003523_add_gradint_color_to_settings_table', 42),
(85, '2021_09_27_130814_create_permalinks_table', 43),
(86, '2021_09_28_103818_add_button_to_packages_table', 44),
(87, '2021_10_10_144350_add_darkmode_to_settings_table', 45),
(88, '2021_10_12_104608_create_esliders_table', 46),
(89, '2021_10_12_115039_create_ebanners_table', 47),
(90, '2021_10_12_144919_add_popular_to_product_categories_table', 48),
(91, '2021_10_15_154634_create_extra_visibilities_table', 48),
(92, '2021_10_21_093224_add_currency_direction_to_settings_table', 48);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'djrafi@gmail.com', '2021-02-16 09:50:42', '2021-02-16 09:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `order_status` int(11) NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `qty` int(11) NOT NULL DEFAULT '0',
  `shipping_charge_info` text COLLATE utf8mb4_unicode_ci,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cart`, `user_id`, `user_info`, `order_number`, `method`, `currency_name`, `currency_value`, `currency_sign`, `txn_id`, `payment_status`, `order_status`, `total`, `qty`, `shipping_charge_info`, `invoice_number`, `shipping_name`, `shipping_email`, `shipping_address`, `shipping_number`, `shipping_country`, `shipping_state`, `shipping_zip`, `billing_name`, `billing_email`, `billing_address`, `billing_number`, `billing_country`, `billing_state`, `billing_zip`, `created_at`, `updated_at`) VALUES
(98, '{\"4\":{\"id\":4,\"title\":\"T-Shirt 45r\",\"qty\":\"1\",\"price\":39,\"downloadable_file\":\"\",\"image\":\"portfolio_16229586441465629396.jpg\"}}', 5, '{\"id\":5,\"name\":\"Munna\",\"image\":null,\"email\":\"user@gmail.com\",\"username\":\"user\",\"phone\":null,\"address\":null,\"country\":null,\"state\":null,\"city\":null,\"zipcode\":null,\"email_verified\":\"0\",\"email_verify_token\":\"5f717a00ff2df1633902057c212daddc\",\"created_at\":\"2021-06-13T09:49:24.000000Z\",\"updated_at\":\"2021-06-13T09:49:24.000000Z\"}', 'VheZqFp1', 'Stripe', 'USD', '1', '$', 'txn_1J3UymKUB0q5em8ZtSrwm7PL', 1, 3, 49, 1, '{\"id\":2,\"language_id\":1,\"title\":\"Standard Shipping\",\"subtitle\":\"Shipment will be within 5-10 Day.\",\"cost\":10,\"status\":1,\"created_at\":\"2021-06-13T11:46:17.000000Z\",\"updated_at\":\"2021-06-13T12:47:28.000000Z\"}', '9Jz01623973837.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Scarlet Merrill', 'gijes@mailinator.com', 'Eos mollit inventore', '+1 (497) 924-2904', 'Et voluptatem minus', 'Ut quia corporis qui', '40982', '2021-06-17 17:50:37', NULL),
(102, '{\"2\":{\"id\":2,\"title\":\"Enim aliquid nisi co\",\"qty\":\"1\",\"price\":440,\"downloadable_file\":\"\",\"image\":\"portfolio_1622957895464265031.jpg\"}}', 5, '{\"id\":5,\"name\":\"Munna\",\"image\":null,\"email\":\"user@gmail.com\",\"username\":\"user\",\"phone\":null,\"address\":null,\"country\":null,\"state\":null,\"city\":null,\"zipcode\":null,\"email_verified\":\"0\",\"email_verify_token\":\"5f717a00ff2df1633902057c212daddc\",\"created_at\":\"2021-06-13T09:49:24.000000Z\",\"updated_at\":\"2021-06-13T09:49:24.000000Z\"}', 'yiqdj1623974861', 'Paytm', 'INR', '73.1', '₹', 'txn_rNsFPB9b1623974861', 1, 1, 32895, 1, '{\"id\":2,\"language_id\":1,\"title\":\"Standard Shipping\",\"subtitle\":\"Shipment will be within 5-10 Day.\",\"cost\":731,\"status\":1,\"created_at\":\"2021-06-13T11:46:17.000000Z\",\"updated_at\":\"2021-06-13T12:47:28.000000Z\"}', 'W4Tw1623974861.pdf', 'Yasir Humphrey', 'fyjetyho@mailinator.com', 'Natus id placeat qu', '+1 (644) 826-2794', 'Maiores culpa commod', 'Numquam architecto c', '79686', 'Kylan Huff', 'pela@mailinator.com', 'Laboris eos digniss', '+1 (803) 971-3451', 'Quia suscipit volupt', 'Non corrupti repreh', '96634', '2021-06-17 18:07:41', NULL),
(104, '{\"5\":{\"id\":5,\"title\":\"Enim aliquid nisi 345f\",\"qty\":\"1\",\"price\":440,\"downloadable_file\":\"\",\"image\":\"portfolio_16229586331365700375.jpg\"}}', 5, '{\"id\":5,\"name\":\"Munna\",\"image\":null,\"email\":\"user@gmail.com\",\"username\":\"user\",\"phone\":null,\"address\":null,\"country\":null,\"state\":null,\"city\":null,\"zipcode\":null,\"email_verified\":\"0\",\"email_verify_token\":\"5f717a00ff2df1633902057c212daddc\",\"created_at\":\"2021-06-13T09:49:24.000000Z\",\"updated_at\":\"2021-06-13T09:49:24.000000Z\"}', 'vQEGd0wz', 'Stripe', 'BDT', '80', '৳', 'txn_1J3VMbKUB0q5em8Z7LRLTb0b', 1, 0, 36000, 1, '{\"id\":2,\"language_id\":1,\"title\":\"Standard Shipping\",\"subtitle\":\"Shipment will be within 5-10 Day.\",\"cost\":800,\"status\":1,\"created_at\":\"2021-06-13T11:46:17.000000Z\",\"updated_at\":\"2021-06-13T12:47:28.000000Z\"}', 'fIMV1623975315.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Conan Jones', 'qabagukik@mailinator.com', 'Quia aut dolor volup', '+1 (558) 297-6529', 'Culpa et ullam poss', 'Vitae amet eos iur', '36622', '2021-06-17 18:15:15', NULL),
(105, '{\"11\":{\"id\":11,\"title\":\"Enim aliquid nisi co 45\",\"qty\":\"1\",\"price\":440,\"downloadable_file\":\"\",\"image\":\"portfolio_16229585792087697798.jpg\"},\"4\":{\"id\":4,\"title\":\"T-Shirt 45r\",\"qty\":\"1\",\"price\":39,\"downloadable_file\":\"\",\"image\":\"portfolio_16229586441465629396.jpg\"}}', 5, '{\"id\":5,\"name\":\"Munna\",\"image\":null,\"email\":\"user@gmail.com\",\"username\":\"user\",\"phone\":null,\"address\":null,\"country\":null,\"state\":null,\"city\":null,\"zipcode\":null,\"email_verified\":\"0\",\"email_verify_token\":\"5f717a00ff2df1633902057c212daddc\",\"created_at\":\"2021-06-13T09:49:24.000000Z\",\"updated_at\":\"2021-06-13T09:49:24.000000Z\"}', 'Rjk9sjuz', 'Stripe', 'BDT', '80', '৳', 'txn_1J3VOQKUB0q5em8ZoKllDQqb', 1, 0, 40320, 2, '{\"id\":4,\"language_id\":1,\"title\":\"Same day delivery\",\"subtitle\":\"Shipment will be within 1 Day.\",\"cost\":2000,\"status\":1,\"created_at\":\"2021-06-13T11:47:13.000000Z\",\"updated_at\":\"2021-06-13T12:48:41.000000Z\"}', 'njlF1623975428.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Allen Fitzgerald', 'tikibu@mailinator.com', 'Sed aute culpa corru', '+1 (531) 112-9208', 'Ad nobis dolore id e', 'Adipisci impedit eo', '79324', '2021-06-17 18:17:08', NULL),
(106, '{\"9\":{\"id\":9,\"title\":\"Enim aliquid nisi co 435\",\"qty\":\"1\",\"price\":440,\"downloadable_file\":\"sample1623940768.zip\",\"image\":\"portfolio_1622958597673003837.jpg\"}}', 5, '{\"id\":5,\"name\":\"Munna\",\"image\":null,\"email\":\"user@gmail.com\",\"username\":\"user\",\"phone\":null,\"address\":null,\"country\":null,\"state\":null,\"city\":null,\"zipcode\":null,\"email_verified\":\"0\",\"email_verify_token\":\"5f717a00ff2df1633902057c212daddc\",\"created_at\":\"2021-06-13T09:49:24.000000Z\",\"updated_at\":\"2021-06-13T09:49:24.000000Z\"}', 'oGnEWCWE', 'Paypal', 'EUR', '0.8', '€', '1P707781M8800314E', 1, 0, 372, 1, '{\"id\":4,\"language_id\":1,\"title\":\"Same day delivery\",\"subtitle\":\"Shipment will be within 1 Day.\",\"cost\":20,\"status\":1,\"created_at\":\"2021-06-13T11:47:13.000000Z\",\"updated_at\":\"2021-06-13T12:48:41.000000Z\"}', 'mbk71623975911.pdf', 'Kermit Fulton', 'cyfanecura@mailinator.com', 'Consequatur Ducimus', '+1 (977) 459-8365', 'Quidem ipsam ad amet', 'Elit nulla et verit', '39415', 'Armando May', 'gigizur@mailinator.com', 'Quis veniam reprehe', '+1 (674) 405-7694', 'Amet consequatur h', 'Labore fuga Labore', '36964', '2021-06-17 18:25:11', NULL),
(107, '{\"16\":{\"id\":16,\"title\":\"Super Headphone U12\",\"qty\":\"1\",\"price\":677,\"downloadable_file\":\"\",\"image\":\"portfolio_1635176213266863212.jpg\"}}', 5, '{\"id\":5,\"name\":\"Mamun\",\"image\":\"1623977685799861143.jpg\",\"email\":\"user@gmail.com\",\"username\":\"user\",\"phone\":\"123456789\",\"address\":\"Dhaka Bangladesh\",\"country\":\"Bangladesh\",\"state\":\"Dhaka\",\"city\":\"dhaka\",\"zipcode\":\"2344\",\"email_verified\":\"Yes\",\"email_verify_token\":\"5f717a00ff2df1633902057c212daddc\",\"created_at\":\"2021-06-13T09:49:24.000000Z\",\"updated_at\":\"2021-06-19T20:29:46.000000Z\"}', 'byEjWEnQ', 'Cash On Delivery', 'EUR', '0.8', '€', '', 0, 0, 549.6, 1, '{\"id\":2,\"language_id\":1,\"title\":\"Standard Shipping\",\"subtitle\":\"Shipment will be within 5-10 Day.\",\"cost\":8,\"status\":1,\"created_at\":\"2021-06-13T11:46:17.000000Z\",\"updated_at\":\"2021-06-13T12:47:28.000000Z\"}', 'LYDO1635573338.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mamun', 'user@gmail.com', 'Dhaka Bangladesh', '123456789', 'Bangladesh', 'Dhaka', '2344', '2021-10-29 23:55:38', NULL),
(108, '{\"16\":{\"id\":16,\"title\":\"Super Headphone U12\",\"qty\":\"1\",\"price\":677,\"downloadable_file\":\"\",\"image\":\"portfolio_1635176213266863212.jpg\"},\"17\":{\"id\":17,\"title\":\"Best Beat Headphone YT2\",\"qty\":\"1\",\"price\":566,\"downloadable_file\":\"\",\"image\":\"portfolio_1635176261408754666.jpg\"}}', 5, '{\"id\":5,\"name\":\"Mamun\",\"image\":\"1623977685799861143.jpg\",\"email\":\"user@gmail.com\",\"username\":\"user\",\"phone\":\"123456789\",\"address\":\"Dhaka Bangladesh\",\"country\":\"Bangladesh\",\"state\":\"Dhaka\",\"city\":\"dhaka\",\"zipcode\":\"2344\",\"email_verified\":\"Yes\",\"email_verify_token\":\"5f717a00ff2df1633902057c212daddc\",\"created_at\":\"2021-06-13T09:49:24.000000Z\",\"updated_at\":\"2021-06-19T20:29:46.000000Z\"}', 'FjF4CdrP', 'Paystack', 'USD', '1', '$', 'txn_bo13KQon1635948873', 1, 0, 1253, 2, '{\"id\":2,\"language_id\":1,\"title\":\"Standard Shipping\",\"subtitle\":\"Shipment will be within 5-10 Day.\",\"cost\":10,\"status\":1,\"created_at\":\"2021-06-13T11:46:17.000000Z\",\"updated_at\":\"2021-06-13T12:47:28.000000Z\"}', '7WVD1635948873.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mamun', 'user@gmail.com', 'Dhaka Bangladesh', '123456789', 'Bangladesh', 'Dhaka', '2344', '2021-11-03 08:14:33', NULL),
(109, '{\"16\":{\"id\":16,\"title\":\"Super Headphone U12\",\"qty\":\"1\",\"price\":677,\"downloadable_file\":\"\",\"image\":\"portfolio_1635176213266863212.jpg\"},\"17\":{\"id\":17,\"title\":\"Best Beat Headphone YT2\",\"qty\":\"1\",\"price\":566,\"downloadable_file\":\"\",\"image\":\"portfolio_1635176261408754666.jpg\"}}', 5, '{\"id\":5,\"name\":\"Mamun\",\"image\":\"1623977685799861143.jpg\",\"email\":\"user@gmail.com\",\"username\":\"user\",\"phone\":\"123456789\",\"address\":\"Dhaka Bangladesh\",\"country\":\"Bangladesh\",\"state\":\"Dhaka\",\"city\":\"dhaka\",\"zipcode\":\"2344\",\"email_verified\":\"Yes\",\"email_verify_token\":\"5f717a00ff2df1633902057c212daddc\",\"created_at\":\"2021-06-13T09:49:24.000000Z\",\"updated_at\":\"2021-06-19T20:29:46.000000Z\"}', 'gG6NEcSv', 'Paystack', 'USD', '1', '$', 'txn_ZSe7fnMH1635948933', 1, 0, 1253, 2, '{\"id\":2,\"language_id\":1,\"title\":\"Standard Shipping\",\"subtitle\":\"Shipment will be within 5-10 Day.\",\"cost\":10,\"status\":1,\"created_at\":\"2021-06-13T11:46:17.000000Z\",\"updated_at\":\"2021-06-13T12:47:28.000000Z\"}', '2ysz1635948933.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mamun', 'user@gmail.com', 'Dhaka Bangladesh', '123456789', 'Bangladesh', 'Dhaka', '2344', '2021-11-03 08:15:33', NULL),
(110, '{\"16\":{\"id\":16,\"title\":\"Super Headphone U12\",\"qty\":\"1\",\"price\":677,\"downloadable_file\":\"\",\"image\":\"portfolio_1635176213266863212.jpg\"},\"17\":{\"id\":17,\"title\":\"Best Beat Headphone YT2\",\"qty\":\"1\",\"price\":566,\"downloadable_file\":\"\",\"image\":\"portfolio_1635176261408754666.jpg\"}}', 5, '{\"id\":5,\"name\":\"Mamun\",\"image\":\"1623977685799861143.jpg\",\"email\":\"user@gmail.com\",\"username\":\"user\",\"phone\":\"123456789\",\"address\":\"Dhaka Bangladesh\",\"country\":\"Bangladesh\",\"state\":\"Dhaka\",\"city\":\"dhaka\",\"zipcode\":\"2344\",\"email_verified\":\"Yes\",\"email_verify_token\":\"5f717a00ff2df1633902057c212daddc\",\"created_at\":\"2021-06-13T09:49:24.000000Z\",\"updated_at\":\"2021-06-19T20:29:46.000000Z\"}', 'j6WoZA7d', 'Paystack', 'NGN', '60', '₦', 'txn_LgPoLY0A1635949625', 1, 0, 76080, 2, '{\"id\":4,\"language_id\":1,\"title\":\"Same day delivery\",\"subtitle\":\"Shipment will be within 1 Day.\",\"cost\":1500,\"status\":1,\"created_at\":\"2021-06-13T11:47:13.000000Z\",\"updated_at\":\"2021-06-13T12:48:41.000000Z\"}', 'A3xU1635949625.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mamun', 'user@gmail.com', 'Dhaka Bangladesh', '123456789', 'Bangladesh', 'Dhaka', '2344', '2021-11-03 08:27:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` text COLLATE utf8mb4_unicode_ci,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `language_id`, `status`, `title`, `price`, `time`, `feature`, `serial_number`, `created_at`, `updated_at`, `button_text`, `button_link`) VALUES
(1, '1', 1, 'Early Birds', '9', 'Monthly', '6 HTML Pages,CMS Version,Support Available,Source Code Included,50 Revision', 0, '2021-02-16 10:13:11', '2021-09-28 04:48:11', 'Contact Us', '#'),
(2, '1', 1, 'Team', '32', 'Monthly', '6 HTML Pages,CMS Version,Support Available,Source Code Included,50 Revision', 0, '2021-02-16 10:13:11', '2021-09-28 04:48:04', 'Contact Us', '#'),
(3, '1', 1, 'Personal', '69', 'Monthly', '6 HTML Pages,CMS Version,Support Available,Source Code Included,50 Revision', 0, '2021-02-16 10:13:11', '2021-09-28 04:47:54', 'Contact Us', '#'),
(4, '1', 1, 'Plutinum', '99', 'Monthly', '6 HTML Pages,CMS Version,Support Available,Source Code Included,50 Revision', 0, '2021-02-16 10:13:11', '2021-09-28 04:47:48', 'Contact Us', '#'),
(5, '1', 1, 'Max', '120', 'Monthly', '6 HTML Pages,CMS Version,Support Available,Source Code Included,50 Revision', 0, '2021-02-16 10:13:11', '2021-09-28 04:47:40', 'Contact Us', '#'),
(6, '1', 1, 'Pro', '150', 'Monthly', '6 HTML Pages,CMS Version,Support Available,Source Code Included,50 Revision', 0, '2021-02-16 10:13:11', '2021-09-28 04:47:34', 'Contact Us', '#');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateweys`
--

CREATE TABLE `payment_gateweys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` text COLLATE utf8mb4_unicode_ci,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateweys`
--

INSERT INTO `payment_gateweys` (`id`, `title`, `image`, `name`, `type`, `information`, `keyword`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Paytm', '1623586905823168101.png', NULL, 'automatic', '{\"merchant\":\"tkogux49985047638244\",\"secret\":\"LhNGUUKE9xCQ9xY8\",\"website\":\"WEBSTAGING\",\"industry\":\"Retail\",\"text\":\"Pay via your paytm account.\"}', 'paytm', 1, NULL, NULL),
(6, 'Stripe', '1623586988691433744.png', NULL, 'automatic', '{\"key\":\"pk_test_51Gt67ZKUB0q5em8Z0h5cuOr35qzIsSEu1KmCSF3L6h8N53vk8srNfQkheFzjPYwz5oavwEXmVPXpk2otSAAPe5xP00oHgsguLb\",\"secret\":\"sk_test_51Gt67ZKUB0q5em8ZX8ZDHTqaowjqn9jF8BilKSagkLGtFzGx3KY4bIPEOn25OZsLo2cob4IIhmYr8wd4O3vBMfq1007wkUFYZ2\",\"text\":\"Pay via your Credit Card.\"}', 'stripe', 1, NULL, NULL),
(7, 'Paypal', '1623586852780838485.png', NULL, 'automatic', '{\"client_id\":\"AUeHumZJ7Ujy2JAAs6bzHcJnxc7lKhmMKto-OGczYwJbgFhAcnphqBs9UCQ0rQZvuugXVI40QZxXz2qc\",\"client_secret\":\"EKiZvD4r5ygbwfSI7WCelgQgxd-hVzxtcdSeuOO3fF2tEH0mD1EY4ch2d3IP1rn7JoDqX716G4Trrxqx\",\"sandbox_check\":1,\"text\":\"Pay via your PayPal account.\"}', 'paypal', 1, NULL, NULL),
(8, 'Paystack', '1635360237572434693.jpg', 'Paystack', 'automatic', '{\"key\":\"pk_test_162a56d42131cbb01932ed0d2c48f9cb99d8e8e2\",\"email\":\"test@test.com\",\"text\":\"Pay via your Paystack account.\"}', 'paystack', 1, NULL, NULL),
(9, 'Cash On Delivery', '1635573109232717974.png', 'Cash On Delivery', '', '', 'cod', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permalinks`
--

CREATE TABLE `permalinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `permalink` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 - for details page, 0 - for non-details page',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `about_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quote_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkout_slug` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permalinks`
--

INSERT INTO `permalinks` (`id`, `language_id`, `permalink`, `type`, `details`, `created_at`, `updated_at`, `about_slug`, `service_slug`, `portfolio_slug`, `package_slug`, `team_slug`, `faq_slug`, `gallery_slug`, `career_slug`, `blog_slug`, `product_slug`, `contact_slug`, `quote_slug`, `cart_slug`, `checkout_slug`) VALUES
(1, 1, 'about', 'about', 0, NULL, '2021-09-28 02:41:05', 'about', 'service', 'portfolio', 'package', 'team', 'faq', 'gallery', 'career', 'blog', 'product', 'contact', 'gate-a-quote', 'cart', 'checkout'),
(3, 2, NULL, NULL, 0, NULL, '2021-09-27 11:28:32', 'a hindi', 's hindi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submission_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `language_id`, `title`, `slug`, `start_date`, `submission_date`, `client_name`, `link`, `featured_image`, `service_id`, `content`, `status`, `meta_keywords`, `meta_description`, `serial_number`, `created_at`, `updated_at`) VALUES
(7, 1, 'Software Landing Page HTML', 'Software-Landing-Page-HTML', '02/08/2021', '02/09/2021', 'Yoko Best', NULL, '16133912601093644789.jpg', 3, '<p>As a result, most of us need to know how to use computers. Our knowledge\r\n of computers will help us to tap into challenging career opportunities \r\nand enhance the quality of our lives. It is imperative that quality \r\nstudents be encouraged and motivated to study computers and become \r\ncapable and responsible IT professionals. The education model needs to \r\nalign itself with dynamically changing technology to meet the growing \r\nneed for skilled IT manpower and deliver state-of-the-art, industry \r\nrelevant and technology ready programs.​  Today, the term Information \r\nTechnology (IT) has ballooned to encompass many aspects of computing and\r\n technology and the term is more recognizable than ever before. The \r\nInformation Technology umbrella can be quite large, covering many \r\nfields. IT professionals perform a variety of duties that range from \r\ninstalling applications, managing information, to designing complex \r\napplications, managing computer networks and designing and managing \r\ndatabases. <br></p>', 1, 'css,js', 'As a result, most of us need to know how to use computers.', 0, '2021-02-12 09:09:17', '2021-02-21 03:41:45'),
(8, 1, 'Product Landing Page HTML Template', 'Product-Landing-Page-HTML-Template', '02/01/2021', '02/10/2021', 'Aquila Wolf', 'https://codecanyon.net/user/geniusdevs/portfolio', '16133912531466478446.jpg', 1, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.<br></p>', 1, 'html', 'with the release of Letraset sheets containing Lorem Ipsum passages', 0, '2021-02-11 08:37:38', '2021-02-21 03:41:32'),
(9, 1, 'Personal Portfolio HTML Template', 'Personal-Portfolio-HTML-Template', '02/01/2021', '02/02/2021', 'Audrey Molina', NULL, '1613391244817360549.jpg', 3, '<p>As a result, most of us need to know how to use computers. Our knowledge\r\n of computers will help us to tap into challenging career opportunities \r\nand enhance the quality of our lives. It is imperative that quality \r\nstudents be encouraged and motivated to study computers and become \r\ncapable and responsible IT professionals. The education model needs to \r\nalign itself with dynamically changing technology to meet the growing \r\nneed for skilled IT manpower and deliver state-of-the-art, industry \r\nrelevant and technology ready programs.​  Today, the term Information \r\nTechnology (IT) has ballooned to encompass many aspects of computing and\r\n technology and the term is more recognizable than ever before. The \r\nInformation Technology umbrella can be quite large, covering many \r\nfields. IT professionals perform a variety of duties that range from \r\ninstalling applications, managing information, to designing complex \r\napplications, managing computer networks and designing and managing \r\ndatabases. <br></p>', 1, 'html,css,php', 'As a result, most of us need to know how to use computers.', 0, '2021-02-12 09:08:25', '2021-02-21 03:41:09'),
(10, 1, 'Multipurpose Business & Digital Agency HTML Template', 'Multipurpose-Business-&-Digital-Agency-HTML-Template', '02/08/2021', '02/09/2021', 'Yoko Best', 'https://codecanyon.net/user/geniusdevs/portfolio', '1613391236518553535.jpg', 3, '<p>As a result, most of us need to know how to use computers. Our knowledge\r\n of computers will help us to tap into challenging career opportunities \r\nand enhance the quality of our lives. It is imperative that quality \r\nstudents be encouraged and motivated to study computers and become \r\ncapable and responsible IT professionals. The education model needs to \r\nalign itself with dynamically changing technology to meet the growing \r\nneed for skilled IT manpower and deliver state-of-the-art, industry \r\nrelevant and technology ready programs.​  Today, the term Information \r\nTechnology (IT) has ballooned to encompass many aspects of computing and\r\n technology and the term is more recognizable than ever before. The \r\nInformation Technology umbrella can be quite large, covering many \r\nfields. IT professionals perform a variety of duties that range from \r\ninstalling applications, managing information, to designing complex \r\napplications, managing computer networks and designing and managing \r\ndatabases. <br></p>', 1, 'css,js', 'As a result, most of us need to know how to use computers.', 0, '2021-02-12 09:09:17', '2021-02-21 03:40:46'),
(11, 1, 'One Page Parallax HTML Template', 'One-Page-Parallax-HTML-Template', '02/08/2021', '02/10/2021', 'Audrey Molina', 'https://codecanyon.net/user/geniusdevs/portfolio', '16133913082004583501.jpg', 6, '<p><span style=\"font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>', 1, 'html', 'model text, and a s', 0, '2021-02-15 06:15:08', '2021-02-21 03:40:37'),
(12, 1, 'Broadband & Internet Service Providers Laravel CMS', 'Broadband-&-Internet-Service-Providers-Laravel-CMS', '02/08/2021', '02/10/2021', 'Audrey Molina', 'https://codecanyon.net/user/geniusdevs/portfolio', '16135358341098236821.jpg', 6, '<p><span style=\"font-family:\'Open Sans\', Arial, sans-serif;font-size:14px;text-align:justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>', 1, 'html', 'model text, and a s', 0, '2021-02-15 06:15:08', '2021-02-21 03:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_images`
--

CREATE TABLE `portfolio_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_images`
--

INSERT INTO `portfolio_images` (`id`, `portfolio_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 7, 'portfolio_116134162331069324685.jpg', '2021-02-15 13:10:33', '2021-02-15 13:10:33'),
(2, 7, 'portfolio_216134162331517266711.jpg', '2021-02-15 13:10:33', '2021-02-15 13:10:33'),
(3, 7, 'portfolio_316134162331745428499.jpg', '2021-02-15 13:10:33', '2021-02-15 13:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `current_price` double(15,8) DEFAULT NULL,
  `previous_price` double(15,8) DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `attributes_title` longtext COLLATE utf8mb4_unicode_ci,
  `attributes_description` longtext COLLATE utf8mb4_unicode_ci,
  `total_sold` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_downloadable` int(11) DEFAULT NULL,
  `downloadable_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` decimal(11,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `language_id`, `current_price`, `previous_price`, `sku`, `stock`, `category_id`, `short_description`, `description`, `attributes_title`, `attributes_description`, `total_sold`, `tags`, `image`, `status`, `is_downloadable`, `downloadable_file`, `meta_tags`, `meta_description`, `created_at`, `updated_at`, `rating`) VALUES
(1, 'T-Shirt', 't-shirt', 1, 39.00000000, 49.00000000, 'qef42', 233, 2, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', '', NULL, 'tshirt,men', 'portfolio_16240883991973194575.jpg', '1', NULL, NULL, 'tshirt,men', 'tshirt for men', '2021-06-05 23:11:52', '2021-06-19 01:39:59', '0.00'),
(2, 'Enim aliquid nisi co', 'enim-aliquid-nisi-co', 1, 440.00000000, 780.00000000, '345', 34520, 1, 'Sed et adipisicing vThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Brand,,,Model,,,Laptop Series,,,Part No,,,RAM,,,Storage,,,Warranty', 'Apple,,,Apple MacBook Pro (2020),,,MacBook Pro,,,MWP82LL/A, MWP82ZP/A,,,16GB,,,1TB SSD,,,1 year', NULL, 'Aliqua Nihil adipis', 'portfolio_1622957895464265031.jpg', '1', NULL, NULL, 'Et inventore velit e', 'Duis quia non provid', '2021-06-05 23:38:15', '2021-06-19 01:20:12', '5.00'),
(4, 'T-Shirt 45r', 't-shirt-45r', 1, 39.00000000, 49.00000000, 'qef423f', 232, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Brand,,,Model,,,Laptop Series,,,Part No,,,RAM,,,Storage,,,Warranty', 'Apple,,,Apple MacBook Pro (2020),,,MacBook Pro,,,MWP82LL/A, MWP82ZP/A,,,16GB,,,1TB SSD,,,1 year', NULL, 'tshirt,men', 'portfolio_16229586441465629396.jpg', '1', NULL, NULL, 'tshirt,men', 'tshirt for men', '2021-06-05 23:11:52', '2021-06-19 01:20:04', '4.00'),
(5, 'Enim aliquid nisi 345f', 'enim-aliquid-nisi-345f', 1, 440.00000000, 780.00000000, '345sdfa', 34446, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Brand,,,Model,,,Laptop Series,,,Part No,,,RAM,,,Storage,,,Warranty', 'Apple,,,Apple MacBook Pro (2020),,,MacBook Pro,,,MWP82LL/A, MWP82ZP/A,,,16GB,,,1TB SSD,,,1 year', NULL, 'Aliqua Nihil adipis', 'portfolio_16229586331365700375.jpg', '1', NULL, NULL, 'Et inventore velit e', 'Duis quia non provid', '2021-06-05 23:38:15', '2021-06-18 06:10:17', '5.00'),
(6, 'T-Shirt 577', 't-shirt-577', 1, 39.00000000, 49.00000000, 'qef42dsf', 234, 3, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Brand,,,Model,,,Laptop Series,,,Part No,,,RAM,,,Storage,,,Warranty', 'Apple,,,Apple MacBook Pro (2020),,,MacBook Pro,,,MWP82LL/A, MWP82ZP/A,,,16GB,,,1TB SSD,,,1 year', NULL, 'tshirt,men', 'portfolio_1622958625628802422.jpg', '1', NULL, NULL, 'tshirt,men', 'tshirt for men', '2021-06-05 23:11:52', '2021-06-05 23:50:25', '0.00'),
(7, 'Enim aliquid nisi', 'enim-aliquid-nisi', 1, 440.00000000, 780.00000000, '345dfg', 34534, 3, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Brand,,,Model,,,Laptop Series,,,Part No,,,RAM,,,Storage,,,Warranty', 'Apple,,,Apple MacBook Pro (2020),,,MacBook Pro,,,MWP82LL/A, MWP82ZP/A,,,16GB,,,1TB SSD,,,1 year', NULL, 'Aliqua Nihil adipis', 'portfolio_16229586152065008187.jpg', '1', NULL, NULL, 'Et inventore velit e', 'Duis quia non provid', '2021-06-05 23:38:15', '2021-06-05 23:50:15', '0.00'),
(8, 'T-Shirt dfg', 't-shirt-dfg', 1, 39.00000000, 49.00000000, 'qef42as', 233, 2, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '', '', NULL, 'tshirt,men', 'portfolio_16229586072117160242.jpg', '1', NULL, NULL, 'tshirt,men', 'tshirt for men', '2021-06-05 23:11:52', '2021-06-19 01:19:42', '5.00'),
(9, 'Enim aliquid nisi co 435', 'enim-aliquid-nisi-co-435', 1, 440.00000000, 780.00000000, '345sdf', 99, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Brand,,,Model,,,Laptop Series,,,Part No,,,RAM,,,Storage,,,Warranty', 'Apple,,,Apple MacBook Pro (2020),,,MacBook Pro,,,MWP82LL/A, MWP82ZP/A,,,16GB,,,1TB SSD,,,1 year', NULL, 'Aliqua Nihil adipis', 'portfolio_1622958597673003837.jpg', '1', 1, 'sample1623940768.zip', 'Et inventore velit e', 'Duis quia non provid', '2021-06-05 23:38:15', '2021-06-19 01:19:31', '4.00'),
(10, 'T-Shirt 232', 't-shirt-232', 1, 39.00000000, 49.00000000, 'qef42fd', 234, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Brand,,,Model,,,Laptop Series,,,Part No,,,RAM,,,Storage,,,Warranty', 'Apple,,,Apple MacBook Pro (2020),,,MacBook Pro,,,MWP82LL/A, MWP82ZP/A,,,16GB,,,1TB SSD,,,1 year', NULL, 'tshirt,men', 'portfolio_1622958587629736485.jpg', '1', NULL, NULL, 'tshirt,men', 'tshirt for men', '2021-06-05 23:11:52', '2021-06-05 23:49:47', '0.00'),
(11, 'Enim aliquid nisi co 45', 'enim-aliquid-nisi-co-45', 1, 440.00000000, 780.00000000, '34523', 34478, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Brand,,,Model,,,Laptop Series,,,Part No,,,RAM,,,Storage,,,Warranty', 'Apple,,,Apple MacBook Pro (2020),,,MacBook Pro,,,MWP82LL/A, MWP82ZP/A,,,16GB,,,1TB SSD,,,1 year', NULL, 'Aliqua Nihil adipis', 'portfolio_16229585792087697798.jpg', '1', NULL, NULL, 'Et inventore velit e', 'Duis quia non provid', '2021-06-05 23:38:15', '2021-10-25 09:53:16', '5.00'),
(12, 'T-Shirt 3', 't-shirt-3', 1, 39.00000000, 49.00000000, 'qef423', 197, 3, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Brand,,,Model,,,Laptop Series,,,Part No,,,RAM,,,Storage,,,Warranty', 'Apple,,,Apple MacBook Pro (2020),,,MacBook Pro,,,MWP82LL/A, MWP82ZP/A,,,16GB,,,1TB SSD,,,1 year', NULL, 'tshirt,men', 'portfolio_16229585701243926374.jpg', '1', NULL, NULL, 'tshirt,men', 'tshirt for men', '2021-06-05 23:11:52', '2021-10-25 09:53:08', '0.00'),
(13, 'Enim aliquid nisi co 234', 'enim-aliquid-nisi-co-234', 1, 440.00000000, 780.00000000, '34533', 0, 3, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Brand,,,Model,,,Laptop Series,,,Part No,,,RAM,,,Storage,,,Warranty', 'Apple,,,Apple MacBook Pro (2020),,,MacBook Pro,,,MWP82LL/A, MWP82ZP/A,,,16GB,,,1TB SSD,,,1 year', NULL, 'Aliqua Nihil adipis', 'portfolio_1622958562328837342.jpg', '1', NULL, NULL, 'Et inventore velit e', 'Duis quia non provid', '2021-06-05 23:38:15', '2021-10-25 09:52:56', '0.00'),
(14, 'Iphone 13 Max Pro', 'iphone-13-max-pro', 1, 1200.00000000, 99.00000000, 'sedrfg45', 3453, 2, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></p>', 'Ram,,,ROM,,,Color', '12GB,,,500 GB,,,Gold', NULL, NULL, 'portfolio_1635176060743393401.jpg', '1', NULL, NULL, NULL, NULL, '2021-10-25 09:34:20', '2021-10-25 09:34:20', '0.00'),
(15, 'Galaxy S21 Ultra', 'galaxy-s21-ultra', 1, 890.00000000, 139.00000000, 'srf43', 345345, 2, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></p>', 'Color,,,Ram,,,Rom', 'Gold,,,12GB,,,500 GB', NULL, NULL, 'portfolio_1635176152107541586.jpg', '1', NULL, NULL, NULL, NULL, '2021-10-25 09:35:52', '2021-10-25 09:35:52', '0.00'),
(16, 'Super Headphone U12', 'super-headphone-u12', 1, 677.00000000, 1000.00000000, 'sras543', 339, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></p>', '', '', NULL, NULL, 'portfolio_1635176213266863212.jpg', '1', NULL, NULL, NULL, NULL, '2021-10-25 09:36:53', '2021-11-03 08:27:05', '0.00'),
(17, 'Best Beat Headphone YT2', 'best-beat-headphone-yt2', 1, 566.00000000, 788.00000000, 'sfg3432', 3330, 1, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou.', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></p>', '', '', NULL, NULL, 'portfolio_1635176261408754666.jpg', '1', NULL, NULL, NULL, NULL, '2021-10-25 09:37:41', '2021-11-03 08:27:05', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_feature` tinyint(4) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_popular` tinyint(4) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `language_id`, `name`, `slug`, `is_feature`, `status`, `created_at`, `updated_at`, `is_popular`, `image`) VALUES
(1, 1, 'Headphone', 'headphone', 1, 1, '2021-06-05 21:33:50', '2021-10-25 09:38:09', 1, 'portfolio_1635175955924314083.jpg'),
(2, 1, 'Phone', 'phone', 1, 1, '2021-06-05 21:39:05', '2021-10-25 09:38:06', 1, 'portfolio_16351759441870786936.jpg'),
(3, 1, 'Laravel Scripts', 'laravel-scripts', 1, 1, '2021-06-05 21:39:17', '2021-10-25 09:38:05', 1, 'portfolio_1635175906335941308.jpg'),
(4, 1, 'WordPress CMS', 'wordpress-cms', 1, 1, '2021-06-05 21:39:37', '2021-10-25 09:38:03', 1, 'portfolio_1635175897646640768.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(5, 'product_1624089302164721660.jpg', 8, '2021-06-19 01:55:02', '2021-06-19 01:55:02'),
(6, 'product_162408930290320061.jpg', 8, '2021-06-19 01:55:02', '2021-06-19 01:55:02'),
(7, 'product_16240893024441005.jpg', 8, '2021-06-19 01:55:02', '2021-06-19 01:55:02'),
(8, 'product_1624089302490627019.jpg', 8, '2021-06-19 01:55:02', '2021-06-19 01:55:02'),
(9, 'product_16240893181038987743.jpg', 12, '2021-06-19 01:55:18', '2021-06-19 01:55:18'),
(10, 'product_1624089318167703607.jpg', 12, '2021-06-19 01:55:18', '2021-06-19 01:55:18'),
(11, 'product_1624089318473456226.jpg', 12, '2021-06-19 01:55:18', '2021-06-19 01:55:18'),
(12, 'product_1624089318519977049.jpg', 12, '2021-06-19 01:55:18', '2021-06-19 01:55:18'),
(13, 'product_16240893351948063127.jpg', 11, '2021-06-19 01:55:35', '2021-06-19 01:55:35'),
(14, 'product_1624089335466818910.jpg', 11, '2021-06-19 01:55:35', '2021-06-19 01:55:35'),
(15, 'product_1624089335991599336.jpg', 11, '2021-06-19 01:55:35', '2021-06-19 01:55:35'),
(16, 'product_1624089335730330678.jpg', 11, '2021-06-19 01:55:35', '2021-06-19 01:55:35'),
(17, 'product_16240893541868878939.jpg', 10, '2021-06-19 01:55:54', '2021-06-19 01:55:54'),
(18, 'product_16240893541641496775.jpg', 10, '2021-06-19 01:55:54', '2021-06-19 01:55:54'),
(19, 'product_1624089354491895680.jpg', 10, '2021-06-19 01:55:54', '2021-06-19 01:55:54'),
(20, 'product_16240893541781883149.jpg', 10, '2021-06-19 01:55:54', '2021-06-19 01:55:54'),
(21, 'product_1624089378253516635.jpg', 9, '2021-06-19 01:56:18', '2021-06-19 01:56:18'),
(22, 'product_16240893781554370137.jpg', 9, '2021-06-19 01:56:18', '2021-06-19 01:56:18'),
(23, 'product_1624089378386044104.jpg', 9, '2021-06-19 01:56:18', '2021-06-19 01:56:18'),
(24, 'product_16240893781444277407.jpg', 9, '2021-06-19 01:56:18', '2021-06-19 01:56:18'),
(25, 'product_16240894052053613361.jpg', 7, '2021-06-19 01:56:45', '2021-06-19 01:56:45'),
(26, 'product_1624089405984584803.jpg', 7, '2021-06-19 01:56:45', '2021-06-19 01:56:45'),
(27, 'product_16240894051538973275.jpg', 7, '2021-06-19 01:56:45', '2021-06-19 01:56:45'),
(28, 'product_16240894051700034335.jpg', 7, '2021-06-19 01:56:45', '2021-06-19 01:56:45'),
(29, 'product_162408942551004559.jpg', 6, '2021-06-19 01:57:05', '2021-06-19 01:57:05'),
(30, 'product_1624089425587215903.jpg', 6, '2021-06-19 01:57:05', '2021-06-19 01:57:05'),
(31, 'product_16240894252132004660.jpg', 6, '2021-06-19 01:57:05', '2021-06-19 01:57:05'),
(32, 'product_16240894252129774489.jpg', 6, '2021-06-19 01:57:05', '2021-06-19 01:57:05'),
(33, 'product_16240894401426527912.jpg', 5, '2021-06-19 01:57:20', '2021-06-19 01:57:20'),
(34, 'product_1624089440841271665.jpg', 5, '2021-06-19 01:57:20', '2021-06-19 01:57:20'),
(35, 'product_1624089440183881633.jpg', 5, '2021-06-19 01:57:20', '2021-06-19 01:57:20'),
(36, 'product_16240894401040233883.jpg', 5, '2021-06-19 01:57:20', '2021-06-19 01:57:20'),
(37, 'product_16240894731090264082.jpg', 4, '2021-06-19 01:57:53', '2021-06-19 01:57:53'),
(38, 'product_16240894731153717708.jpg', 4, '2021-06-19 01:57:53', '2021-06-19 01:57:53'),
(39, 'product_16240894733974461.jpg', 4, '2021-06-19 01:57:53', '2021-06-19 01:57:53'),
(40, 'product_1624089473127790754.jpg', 4, '2021-06-19 01:57:53', '2021-06-19 01:57:53'),
(41, 'product_16240894941130766794.jpg', 2, '2021-06-19 01:58:14', '2021-06-19 01:58:14'),
(42, 'product_1624089494582167260.jpg', 2, '2021-06-19 01:58:14', '2021-06-19 01:58:14'),
(43, 'product_16240894942084607306.jpg', 2, '2021-06-19 01:58:14', '2021-06-19 01:58:14'),
(44, 'product_16240894941958143661.jpg', 2, '2021-06-19 01:58:14', '2021-06-19 01:58:14'),
(45, 'product_1624089516183627423.jpg', 1, '2021-06-19 01:58:36', '2021-06-19 01:58:36'),
(46, 'product_16240895161412320802.jpg', 1, '2021-06-19 01:58:36', '2021-06-19 01:58:36'),
(47, 'product_16240895161926819412.jpg', 1, '2021-06-19 01:58:36', '2021-06-19 01:58:36'),
(48, 'product_162408951699808784.jpg', 1, '2021-06-19 01:58:36', '2021-06-19 01:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `review` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `review`, `comment`, `created_at`, `updated_at`) VALUES
(1, 5, 5, 5, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '2021-06-18 05:53:16', '2021-06-18 06:10:17'),
(3, 5, 11, 5, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '2021-06-19 01:19:10', '2021-06-19 01:19:10'),
(4, 5, 9, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '2021-06-19 01:19:31', '2021-06-19 01:19:31'),
(5, 5, 8, 5, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '2021-06-19 01:19:42', '2021-06-19 01:19:42'),
(6, 5, 4, 4, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '2021-06-19 01:20:04', '2021-06-19 01:20:04'),
(7, 5, 2, 5, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '2021-06-19 01:20:12', '2021-06-19 01:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skypenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-pending, 1-prcessing, 2-completed, 3-rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `name`, `email`, `phone`, `country`, `budget`, `skypenumber`, `subject`, `file`, `description`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Genius Mamun', 'gmamun2435@gmail.com', '324234123', 'Bangladesh', '345', '234234234234', 'Web Design & Development', '16135595621654910309.pdf', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 2, '2021-02-17 04:59:22', '2021-02-17 05:10:00'),
(9, 'Mahfuj', 'mahfuj@gmail.com', '0438263458', 'Bangladesh', '3453', '45364564', 'Laravel CMS Design', '16135600042114205085.pdf', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 0, '2021-02-17 05:06:44', '2021-02-17 05:06:44'),
(11, 'Sihab', 'sihab@gmail.com', '4563435', 'Bangladesh', '432', '2345234535', 'HTML & CSS3 Website Design', NULL, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 3, '2021-02-17 05:09:37', '2021-02-17 05:09:54'),
(12, 'Iliana Emerson', 'cylusadah@mailinator.com', '5966503', 'Aut fugiat do simili', 'Cupiditate ipsum con', '436', 'Cillum voluptatem si', NULL, 'Dolor similique temp', 0, '2021-04-23 13:02:21', '2021-04-23 13:02:21'),
(13, 'Emma Lynch', 'zebezaxys@mailinator.com', '3518', 'Provident facere nu', 'Molestias nostrud ex', '124', 'Dolorum ex sed non a', '1619609498606016260.pdf', 'Ea delectus qui mag', 0, '2021-04-28 05:31:38', '2021-04-28 05:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '', '2021-02-19 12:53:15', '2021-02-19 23:33:57'),
(2, 'Moderator', '[\"Ecommerce\",\"Home\",\"Inner Page\",\"Quote\",\"Gallery\",\"Job\",\"Blog\",\"Role Management\",\"Subscribers\",\"Dynamic Page\",\"Language\",\"Clear Cache\"]', '2021-02-19 13:44:23', '2021-06-19 15:21:41'),
(3, 'Super Admin', '[\"Website Customization\",\"General Setting\",\"Ecommerce\",\"Home\",\"Inner Page\",\"Quote\",\"Gallery\",\"Job\",\"Blog\",\"Role Management\",\"Subscribers\",\"Users Management\",\"Dynamic Page\",\"Language\",\"Clear Cache\"]', '2021-02-19 13:47:18', '2021-06-19 15:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `sectiontitles`
--

CREATE TABLE `sectiontitles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_we_are_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_we_are_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_we_are_text` text COLLATE utf8mb4_unicode_ci,
  `video_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image_right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_image_left` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_content` text COLLATE utf8mb4_unicode_ci,
  `service_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_c_us_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_c_us_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_c_us_image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_c_us_image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_form_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_section_bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_form_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_map` text COLLATE utf8mb4_unicode_ci,
  `faq_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_f_icon1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_f_icon2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_f_text1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_f_text2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_text` text COLLATE utf8mb4_unicode_ci,
  `about_experince_yers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_intro_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_image` text COLLATE utf8mb4_unicode_ci,
  `get_quote_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_quote_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_history_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `our_history_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeet_us_bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeet_us_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeet_us_button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeet_us_button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `testimonial_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectiontitles`
--

INSERT INTO `sectiontitles` (`id`, `language_id`, `w_we_are_sub_title`, `w_we_are_title`, `w_we_are_text`, `video_title`, `video_sub_title`, `video_text`, `video_image`, `video_link`, `video_image_right`, `video_image_left`, `video_bg_image`, `video_content`, `service_title`, `service_sub_title`, `w_c_us_sub_title`, `w_c_us_title`, `w_c_us_image1`, `w_c_us_image2`, `team_title`, `team_sub_title`, `contact_sub_title`, `contact_title`, `contact_form_title`, `contact_section_bg_image`, `contact_form_image`, `contact_map`, `faq_sub_title`, `faq_title`, `faq_bg_image`, `faq_image1`, `faq_image2`, `blog_title`, `blog_sub_title`, `hero_sub_title`, `hero_title`, `hero_text`, `hero_image`, `hero_bg_image`, `hero_f_icon1`, `hero_f_icon2`, `hero_f_text1`, `hero_f_text2`, `about_title`, `about_sub_title`, `about_text`, `about_experince_yers`, `about_intro_video`, `about_image`, `get_quote_title`, `get_quote_sub_title`, `our_history_title`, `our_history_text`, `package_sub_title`, `package_title`, `portfolio_title`, `portfolio_sub_title`, `counter_bg_image`, `meeet_us_bg_image`, `meeet_us_text`, `meeet_us_button_text`, `meeet_us_button_link`, `created_at`, `updated_at`, `testimonial_title`, `testimonial_subtitle`) VALUES
(1, '1', 'WHO WE ARE', 'We Work Hard Play Hard Explore Creative Mmind', 'Perspiciatis unde omnis iste natus error sit voluptatem accusantium dolorem-quelaudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quiavoluptas sit aspernatur aut odit aut fugit, sed quia quuntur magni dolores eos ratione voluptatem sequi nesciunt eque porroe.', 'How we growth our business.', 'INTRO VIDEO', 'The introduction of cloud and mobile technologies into enterprise software.', '1612877990706065974.jpg', 'https://www.youtube.com/watch?v=TdSA7gkVYU0', '1612877965616485669.png', '1612877965496788649.png', '16128779901457503508.jpg', 'hether you are building an enterprise web portal or a state-of-the-art website, you always need the right modern tools. Well-built and maintained PHP frameworks provide those tools in abundance, allowing maintained PHP frameworks provide those tools in abundance, allowing developers to save time, re-use code, and streamline the back end. As software development tools continuously.', 'We Offer Better Soluation', 'OUR LATEST SERVICES', 'WHO WE ARE', 'Why Choose Us', '16128799941528559809.jpg', '16128799942058255621.jpg', 'Meet Our Exclusive Leadership', 'OUR TEAM MEMBER', 'CONTACT US', 'Join Us To Get Free Consultations', 'Don\'t Hesitate To Contact With Us, Say Hello......', '16129356111909515361.jpg', '16129356111047618438.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993207.564767118!2d-77.9807899414373!3d42.92219345357043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1569310771254!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 'FAQ', 'Why Choose Our Solutions', '1612937982770064829.jpg', '1612937982435794173.jpg', '1612938123482410717.jpg', 'Read Our Latest News & Blog', 'LATEST NEWS', 'Promote any poduct, service or online course.', 'Get every it Services Here', 'Make your products with good & professionals', '16127989421745785160.png', '1613561714482991106.jpg', 'fal fa-gem', 'fal fa-bullseye', 'IT Product', 'IT Services', 'You can\'t use up creativity.', 'ABOUT US', '<p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Consider the number of people who influence a sale, the length of the decision-making cycle, the competing interests of the people who purchase, implement, manage, and use the technology. It’s a lot meaningful content here. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p><p><br></p><p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '30', 'https://www.youtube.com/watch?v=TdSA7gkVYU0', '16128479611329287952.jpg', NULL, NULL, 'Our History', 'Does any industry face a more complex audience journey and marketing sales process than B2B technology.', 'Plans', 'Our Pricing Plans', 'Reads Our Recent Case Studies', 'LATEST CASE STUDIES', NULL, '16131902461486580724.jpg', 'Preparing For Your Business Success', 'Meet With Us', 'https://codecanyon.net/user/geniusdevs', NULL, '2021-02-17 10:22:10', 'What Our Client Says', 'TESTIMONIAL'),
(2, '2', 'WHO WE ARE', 'We Work Hard Play Hard Explore Creative Mmind', 'Perspiciatis unde omnis iste natus error sit voluptatem accusantium dolorem-quelaudantium, totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quiavoluptas sit aspernatur aut odit aut fugit, sed quia quuntur magni dolores eos ratione voluptatem sequi nesciunt eque porroe.', 'How we growth our business.', 'INTRO VIDEO', 'The introduction of cloud and mobile technologies into enterprise software.', '6151c9421a5af.jpg', 'https://www.youtube.com/watch?v=TdSA7gkVYU0', '6151c9422154c.png', '6151c94222126.png', '6151c94222dd9.jpg', 'hether you are building an enterprise web portal or a state-of-the-art website, you always need the right modern tools. Well-built and maintained PHP frameworks provide those tools in abundance, allowing maintained PHP frameworks provide those tools in abundance, allowing developers to save time, re-use code, and streamline the back end. As software development tools continuously.', 'We Offer Better Soluation', 'OUR LATEST SERVICES', 'WHO WE ARE', 'Why Choose Us', '6151c94223ab4.jpg', '6151c94224553.jpg', 'Meet Our Exclusive Leadership', 'OUR TEAM MEMBER', 'CONTACT US', 'Join Us To Get Free Consultations', 'Don\'t Hesitate To Contact With Us, Say Hello......', '6151c9422535b.jpg', '6151c94226000.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993207.564767118!2d-77.9807899414373!3d42.92219345357043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1569310771254!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\"></iframe>', 'FAQ', 'Why Choose Our Solutions', '6151c94226c7c.jpg', '6151c9422975e.jpg', '6151c9422f314.jpg', 'Read Our Latest News & Blog', 'LATEST NEWS', 'Promote any poduct, service or online course.', 'Get every it Services Here', 'Make your products with good & professionals', '6151c942331fc.png', '6151c942371fe.jpg', 'fal fa-gem', 'fal fa-bullseye', 'IT Product', 'IT Services', 'You can\'t use up creativity.', 'ABOUT US', '<p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Consider the number of people who influence a sale, the length of the decision-making cycle, the competing interests of the people who purchase, implement, manage, and use the technology. It’s a lot meaningful content here. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p><p><br></p><p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '30', 'https://www.youtube.com/watch?v=TdSA7gkVYU0', '6151c9423b103.jpg', NULL, NULL, 'Our History', 'Does any industry face a more complex audience journey and marketing sales process than B2B technology.', 'Plans', 'Our Pricing Plans', 'Reads Our Recent Case Studies', 'LATEST CASE STUDIES', '6151c9423ef3b.jpg', '6151c94244182.jpg', 'Preparing For Your Business Success', 'Meet With Us', 'https://codecanyon.net/user/geniusdevs', NULL, '2021-02-17 10:22:10', 'What Our Client Says', 'TESTIMONIAL');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `about_meta_key` text COLLATE utf8mb4_unicode_ci,
  `service_meta_key` text COLLATE utf8mb4_unicode_ci,
  `portfolio_meta_key` text COLLATE utf8mb4_unicode_ci,
  `package_meta_key` text COLLATE utf8mb4_unicode_ci,
  `team_meta_key` text COLLATE utf8mb4_unicode_ci,
  `faq_meta_key` text COLLATE utf8mb4_unicode_ci,
  `gallery_meta_key` text COLLATE utf8mb4_unicode_ci,
  `career_meta_key` text COLLATE utf8mb4_unicode_ci,
  `blog_meta_key` text COLLATE utf8mb4_unicode_ci,
  `product_meta_key` text COLLATE utf8mb4_unicode_ci,
  `contact_meta_key` text COLLATE utf8mb4_unicode_ci,
  `quot_meta_key` text COLLATE utf8mb4_unicode_ci,
  `about_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `service_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `portfolio_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `package_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `team_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `faq_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `gallery_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `career_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `blog_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `product_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `contact_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `quot_meta_desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `language_id`, `meta_keywords`, `meta_description`, `about_meta_key`, `service_meta_key`, `portfolio_meta_key`, `package_meta_key`, `team_meta_key`, `faq_meta_key`, `gallery_meta_key`, `career_meta_key`, `blog_meta_key`, `product_meta_key`, `contact_meta_key`, `quot_meta_key`, `about_meta_desc`, `service_meta_desc`, `portfolio_meta_desc`, `package_meta_desc`, `team_meta_desc`, `faq_meta_desc`, `gallery_meta_desc`, `career_meta_desc`, `blog_meta_desc`, `product_meta_desc`, `contact_meta_desc`, `quot_meta_desc`, `created_at`, `updated_at`) VALUES
(1, 1, 'business,agency,it,company,skynet,corporate,service,degital service,creative service', 'hhhhhhhhhh', 'about', 'service', 'seo', 'portfolio', 'team', 'faq', 'gallery', 'career', 'blog', 'product', 'contact', 'Quote', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', 'Skynet – Multipurpose Website CMS. It’s all in one package. It gives you infinite possibilities to make your site. It is a better way to present your business, corporate website, construction website, organization, IT solutions, Ecommerce, job, broadband, Internet service provider, isp, wifi business, portfolio, resume, cv e.t.c. It’s easy to customize. it also compatible with Desktop, laptop, mobile, and also compatible with major browsers.', NULL, '2021-09-27 07:38:29'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-27 07:38:10', '2021-09-27 07:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `language_id`, `status`, `title`, `slug`, `icon`, `image`, `content`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'UI/UX Design', 'UIUX-Design', 'fal fa-eye-dropper', '1613397069283872525.jpg', '<p>As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​ Today, the term Information Technology (IT) has ballooned to encompass many aspects of computing and technology and the term is more recognizable than ever before. The Information Technology umbrella can be quite large, covering many fields. IT professionals perform a variety of duties that range from installing applications, managing information, to designing complex applications, managing computer networks and designing and managing databases. <br></p>', 0, '2021-02-11 07:10:50', '2021-02-15 07:51:09'),
(2, '1', 1, 'IT Consultancy', 'IT-Consultancy', 'fal fa-gavel', '16133970622043779736.jpg', '<p>As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​ Today, the term Information Technology (IT) has ballooned to encompass many aspects of computing and technology and the term is more recognizable than ever before. The Information Technology umbrella can be quite large, covering many fields. IT professionals perform a variety of duties that range from installing applications, managing information, to designing complex applications, managing computer networks and designing and managing databases. <br></p>', 0, '2021-02-11 07:15:31', '2021-02-15 07:51:02'),
(3, '1', 1, 'Technology Prof', 'Technology-Prof', 'fal fa-map-marked-alt', '16133970542027137282.jpg', '<p>As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​ Today, the term Information Technology (IT) has ballooned to encompass many aspects of computing and technology and the term is more recognizable than ever before. The Information Technology umbrella can be quite large, covering many fields. IT professionals perform a variety of duties that range from installing applications, managing information, to designing complex applications, managing computer networks and designing and managing databases. <br></p>', 0, '2021-02-11 07:16:06', '2021-02-15 07:50:54'),
(5, '1', 1, 'Web Development', 'Web-Development', 'fal fa-hurricane', '16133970471491364505.jpg', '<p>As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​ Today, the term Information Technology (IT) has ballooned to encompass many aspects of computing and technology and the term is more recognizable than ever before. The Information Technology umbrella can be quite large, covering many fields. IT professionals perform a variety of duties that range from installing applications, managing information, to designing complex applications, managing computer networks and designing and managing databases. <br></p>', 0, '2021-02-11 07:22:50', '2021-02-15 07:50:47'),
(6, '1', 1, 'App Development', 'App-Development', 'fal fa-bezier-curve', '16133970351881484414.jpg', '<p>As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​ Today, the term Information Technology (IT) has ballooned to encompass many aspects of computing and technology and the term is more recognizable than ever before. The Information Technology umbrella can be quite large, covering many fields. IT professionals perform a variety of duties that range from installing applications, managing information, to designing complex applications, managing computer networks and designing and managing databases. <br></p>', 0, '2021-02-11 07:23:18', '2021-02-15 07:50:35'),
(7, '1', 1, 'Game Design', 'Game-Design', 'fal fa-umbrella', '16133970281893173429.jpg', '<p>As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​ Today, the term Information Technology (IT) has ballooned to encompass many aspects of computing and technology and the term is more recognizable than ever before. The Information Technology umbrella can be quite large, covering many fields. IT professionals perform a variety of duties that range from installing applications, managing information, to designing complex applications, managing computer networks and designing and managing databases. <br></p>', 0, '2021-02-11 07:24:00', '2021-02-15 07:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_version` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumb_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_hours` text COLLATE utf8mb4_unicode_ci,
  `footer_text` text COLLATE utf8mb4_unicode_ci,
  `footer_bg_image` text COLLATE utf8mb4_unicode_ci,
  `copyright_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `messenger` text COLLATE utf8mb4_unicode_ci,
  `disqus` text COLLATE utf8mb4_unicode_ci,
  `slider_overlay` text COLLATE utf8mb4_unicode_ci,
  `add_this_status` text COLLATE utf8mb4_unicode_ci,
  `facebook_pexel` text COLLATE utf8mb4_unicode_ci,
  `google_analytics` text COLLATE utf8mb4_unicode_ci,
  `announcement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `announcement_delay` decimal(11,2) NOT NULL DEFAULT '0.00',
  `maintainance_text` text COLLATE utf8mb4_unicode_ci,
  `tawk_to` text COLLATE utf8mb4_unicode_ci,
  `cookie_alert_text` blob,
  `google_recaptcha_site_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_recaptcha_secret_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintainance_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_section_video_link` text COLLATE utf8mb4_unicode_ci,
  `preloader_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preloader_bg_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_slider_overlay_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_slider_overlay_color_opacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `gcolor1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcolor2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gcolor3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_dark` tinyint(4) DEFAULT NULL,
  `currency_direction` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `language_id`, `theme_version`, `website_title`, `base_color`, `header_logo`, `footer_logo`, `fav_icon`, `breadcrumb_image`, `number`, `email`, `contactemail`, `address`, `opening_hours`, `footer_text`, `footer_bg_image`, `copyright_text`, `messenger`, `disqus`, `slider_overlay`, `add_this_status`, `facebook_pexel`, `google_analytics`, `announcement`, `announcement_delay`, `maintainance_text`, `tawk_to`, `cookie_alert_text`, `google_recaptcha_site_key`, `google_recaptcha_secret_key`, `created_at`, `updated_at`, `whatsapp`, `maintainance_image`, `hero_section_video_link`, `preloader_icon`, `preloader_bg_color`, `hero_slider_overlay_color`, `hero_slider_overlay_color_opacity`, `gcolor1`, `gcolor2`, `gcolor3`, `is_dark`, `currency_direction`) VALUES
(1, '1', 'theme5', 'Skynet - Multipurpose Website  & Business  Management System CMS', '0C59DB', 'header_logo_1615901449730003744.png', 'footer_logo16159014611986770640.png', 'fav_icon_16131013892108825182.png', 'breadcrumb_image_.jpg', '+33 454 342 654,+55 344 213 345', 'demoemail@gmail.com,testemail@gmail.com', 'skynet@gmail.com', '2963  University Drive, Chicago', 'Sat - Wed / 10AM - 7PM', 'The web has changed a lot since Vitaly posted his first article back in 2006. The team at Smashing has changed too, as have the things that we bring to our community onferences, books, and our membershipe.', 'footer_bg_image_1613361435502004358.jpg', '<p>Copyright by @ GeniusDevs - 2021</p>', '<!-- Messenger Chat Plugin Code -->\r\n    <div id=\"fb-root\"></div>\r\n\r\n    <!-- Your Chat Plugin code -->\r\n    <div id=\"fb-customer-chat\" class=\"fb-customerchat\">\r\n    </div>\r\n\r\n    <script>\r\n      var chatbox = document.getElementById(\'fb-customer-chat\');\r\n      chatbox.setAttribute(\"page_id\", \"858401617860382\");\r\n      chatbox.setAttribute(\"attribution\", \"biz_inbox\");\r\n      window.fbAsyncInit = function() {\r\n        FB.init({\r\n          xfbml            : true,\r\n          version          : \'v11.0\'\r\n        });\r\n      };\r\n\r\n      (function(d, s, id) {\r\n        var js, fjs = d.getElementsByTagName(s)[0];\r\n        if (d.getElementById(id)) return;\r\n        js = d.createElement(s); js.id = id;\r\n        js.src = \'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js\';\r\n        fjs.parentNode.insertBefore(js, fjs);\r\n      }(document, \'script\', \'facebook-jssdk\'));\r\n    </script>', 'nextit-1', NULL, NULL, NULL, NULL, '16159015311612204557.jpg', '2.00', 'We are upgrading our site. We will come back soon. \r\nPlease stay with us.\r\nThank you.', '<!--Start of Tawk.to Script-->\r\n<script type=\"text/javascript\">\r\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\ns1.async=true;\r\ns1.src=\'https://embed.tawk.to/602f3cb99c4f165d47c4d425/1eus8adqv\';\r\ns1.charset=\'UTF-8\';\r\ns1.setAttribute(\'crossorigin\',\'*\');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();\r\n</script>\r\n<!--End of Tawk.to Script-->', 0x3c703e3c7370616e20636c6173733d22636f6f6b69652d636f6e73656e745f5f6d65737361676522207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20766572746963616c2d616c69676e3a20626173656c696e653b20666f6e742d66616d696c793a20506f7070696e732c2073616e732d73657269663b223e596f757220657870657269656e6365206f6e207468697320736974652077696c6c20626520696d70726f76656420627920616c6c6f77696e6720636f6f6b6965732e3c2f7370616e3e3c62723e3c2f703e, '6Lf9jOQUAAAAABJKj_nQBNvji7wh4DdOZIPAdRKk', '6Lf9jOQUAAAAALO4C5pC7O_HHw0Z1BuYCU_FA606', NULL, '2021-10-27 12:28:42', '234234546', '1619241714761747856.jpg', 'https://www.youtube.com/watch?v=BAVfUvByStY&t=2s', '16239333001291224830.gif', '#FFFFFF', NULL, '1', '1FA2FF', 'C779D0', '4BC0C8', 0, 0),
(2, '2', 'theme1', 'Skynet - Multipurpose Website  & Business  Management System CMS', '0C59DB', '6151c94203a70.png', '6151c942077be.png', '6151c9420b577.png', '6151c9420eb7a.jpg', '+33 454 342 654,+55 344 213 345', 'demoemail@gmail.com,testemail@gmail.com', 'skynet@gmail.com', '2963  University Drive, Chicago', 'Sat - Wed / 10AM - 7PM', 'The web has changed a lot since Vitaly posted his first article back in 2006. The team at Smashing has changed too, as have the things that we bring to our community onferences, books, and our membershipe.', '6151c9420fa82.jpg', '<p>Copyright by @ GeniusDevs - 2021</p>', '<!-- Messenger Chat Plugin Code -->\r\n    <div id=\"fb-root\"></div>\r\n\r\n    <!-- Your Chat Plugin code -->\r\n    <div id=\"fb-customer-chat\" class=\"fb-customerchat\">\r\n    </div>\r\n\r\n    <script>\r\n      var chatbox = document.getElementById(\'fb-customer-chat\');\r\n      chatbox.setAttribute(\"page_id\", \"858401617860382\");\r\n      chatbox.setAttribute(\"attribution\", \"biz_inbox\");\r\n      window.fbAsyncInit = function() {\r\n        FB.init({\r\n          xfbml            : true,\r\n          version          : \'v11.0\'\r\n        });\r\n      };\r\n\r\n      (function(d, s, id) {\r\n        var js, fjs = d.getElementsByTagName(s)[0];\r\n        if (d.getElementById(id)) return;\r\n        js = d.createElement(s); js.id = id;\r\n        js.src = \'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js\';\r\n        fjs.parentNode.insertBefore(js, fjs);\r\n      }(document, \'script\', \'facebook-jssdk\'));\r\n    </script>', 'nextit-1', NULL, NULL, NULL, NULL, '16159015311612204557.jpg', '2.00', 'We are upgrading our site. We will come back soon. \r\nPlease stay with us.\r\nThank you.', '<!--Start of Tawk.to Script-->\r\n<script type=\"text/javascript\">\r\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\ns1.async=true;\r\ns1.src=\'https://embed.tawk.to/602f3cb99c4f165d47c4d425/1eus8adqv\';\r\ns1.charset=\'UTF-8\';\r\ns1.setAttribute(\'crossorigin\',\'*\');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();\r\n</script>\r\n<!--End of Tawk.to Script-->', 0x3c703e3c7370616e20636c6173733d22636f6f6b69652d636f6e73656e745f5f6d65737361676522207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b20626f726465723a203070783b20766572746963616c2d616c69676e3a20626173656c696e653b20666f6e742d66616d696c793a20506f7070696e732c2073616e732d73657269663b223e596f757220657870657269656e6365206f6e207468697320736974652077696c6c20626520696d70726f76656420627920616c6c6f77696e6720636f6f6b6965732e3c2f7370616e3e3c62723e3c2f703e, '6Lf9jOQUAAAAABJKj_nQBNvji7wh4DdOZIPAdRKk', '6Lf9jOQUAAAAALO4C5pC7O_HHw0Z1BuYCU_FA606', NULL, '2021-09-27 05:20:00', '234234546', '1619241714761747856.jpg', 'https://www.youtube.com/watch?v=BAVfUvByStY&t=2s', '16239333001291224830.gif', '#FFFFFF', NULL, '1', '1FA2FF', 'C779D0', '4BC0C8', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `language_id`, `title`, `subtitle`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Free Shipping', 'Shipment will be within 10-15 Days', 0, 1, '2021-06-13 05:44:46', '2021-06-13 05:44:46'),
(2, 1, 'Standard Shipping', 'Shipment will be within 5-10 Day.', 10, 1, '2021-06-13 05:46:17', '2021-06-13 06:47:28'),
(4, 1, 'Same day delivery', 'Shipment will be within 1 Day.', 25, 1, '2021-06-13 05:47:13', '2021-06-13 06:48:41'),
(5, 3, 'test', 'test', 30, 1, '2021-06-19 10:37:09', '2021-06-19 10:37:20'),
(6, 2, 'test3', 'test', 30, 1, '2021-06-19 10:37:55', '2021-06-19 10:37:55'),
(7, 2, 'test4', 'test4', 20, 1, '2021-06-19 10:41:45', '2021-06-19 10:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `sitemaps`
--

CREATE TABLE `sitemaps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitemap_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `language_id`, `status`, `image`, `subtitle`, `title`, `text`, `button_text`, `button_link`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '16127970561434260582.jpg', 'IT Business Consulting', 'Best IT Soluations Provider Agency', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremda tium totam rem aperiam eaque ipsa quae ab illo inventore veritatis', 'Our Services', '#', 0, '2021-02-08 08:27:37', '2021-02-21 04:43:30'),
(3, '1', '1', '1612795438968642221.jpg', 'IT Business Consulting', 'Best IT Soluations Provider Agency', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremda tium totam rem aperiam eaque ipsa quae ab illo inventore veritatis', 'Our Services', '#', 1, '2021-02-08 08:27:37', '2021-02-21 04:42:52'),
(4, '1', '1', '1613904115990305225.jpg', 'IT Business Consulting', 'Best IT Soluations Provider Agency', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremda tium totam rem aperiam eaque ipsa quae ab illo inventore veritatis', 'Our Services', '#', 0, '2021-02-08 08:27:37', '2021-06-19 11:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `icon`, `url`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, 'fab fa-youtube', 'https://codecanyon.net/user/geniusdevs/portfolio', 0, '2021-02-14 03:17:51', '2021-02-14 03:17:51'),
(2, 'fab fa-linkedin-in', 'https://codecanyon.net/user/geniusdevs/portfolio', 0, '2021-02-14 03:18:04', '2021-02-14 03:18:04'),
(3, 'fab fa-twitter', 'https://codecanyon.net/user/geniusdevs/portfolio', 0, '2021-02-14 03:18:16', '2021-02-14 03:18:16'),
(4, 'fab fa-facebook-f', 'https://codecanyon.net/user/geniusdevs/portfolio', 0, '2021-02-14 03:18:24', '2021-02-14 03:18:24'),
(5, 'fab fa-instagram', 'https://codecanyon.net/user/geniusdevs/portfolio', 0, '2021-02-14 03:18:53', '2021-02-14 03:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dagenation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `icon1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `language_id`, `status`, `image`, `name`, `dagenation`, `description`, `serial_number`, `icon1`, `icon2`, `icon3`, `icon4`, `icon5`, `url1`, `url2`, `url3`, `url4`, `url5`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '16129338312071725073.jpg', 'D. Williamson', 'Founder', '<p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Consider the number of people who influence a sale, the length of the decision-making cycle, the competing interests of the people who purchase, implement, manage, and use the technology. It’s a lot meaningful content here.&nbsp; As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​<br></p>', 0, 'fab fa-facebook-f', 'fab fa-twitter', 'fab fa-behance', 'fab fa-linkedin-in', NULL, 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', NULL, '2021-02-09 22:50:20', '2021-02-09 23:11:44'),
(2, 1, 1, '16129338221686840959.jpg', 'D. Williamson', 'Founder', '<p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Consider the number of people who influence a sale, the length of the decision-making cycle, the competing interests of the people who purchase, implement, manage, and use the technology. It’s a lot meaningful content here.&nbsp; As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​<br></p>', 0, 'fab fa-facebook-f', 'fab fa-twitter', 'fab fa-behance', 'fab fa-linkedin-in', NULL, 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', NULL, '2021-02-09 22:50:20', '2021-02-09 23:11:39'),
(3, 1, 1, '1612933813754845667.jpg', 'D. Williamson', 'Founder', '<p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Consider the number of people who influence a sale, the length of the decision-making cycle, the competing interests of the people who purchase, implement, manage, and use the technology. It’s a lot meaningful content here.&nbsp; As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​<br></p>', 0, 'fab fa-facebook-f', 'fab fa-twitter', 'fab fa-behance', 'fab fa-linkedin-in', NULL, 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', NULL, '2021-02-09 22:50:20', '2021-02-09 23:11:33'),
(4, 1, 1, '1612933803370198115.jpg', 'D. Williamson', 'Founder', '<p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Consider the number of people who influence a sale, the length of the decision-making cycle, the competing interests of the people who purchase, implement, manage, and use the technology. It’s a lot meaningful content here.&nbsp; As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​<br></p>', 0, 'fab fa-facebook-f', 'fab fa-twitter', 'fab fa-behance', 'fab fa-linkedin-in', NULL, 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', NULL, '2021-02-09 22:50:20', '2021-02-09 23:11:28'),
(5, 1, 1, '16129337911260741882.jpg', 'D. Williamson', 'Founder', '<p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Consider the number of people who influence a sale, the length of the decision-making cycle, the competing interests of the people who purchase, implement, manage, and use the technology. It’s a lot meaningful content here.&nbsp; As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​<br></p>', 0, 'fab fa-facebook-f', 'fab fa-twitter', 'fab fa-behance', 'fab fa-linkedin-in', NULL, 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', NULL, '2021-02-09 22:50:20', '2021-02-09 23:11:22'),
(6, 1, 1, '16129337752084136888.jpg', 'D. Williamson', 'Founder', '<p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Consider the number of people who influence a sale, the length of the decision-making cycle, the competing interests of the people who purchase, implement, manage, and use the technology. It’s a lot meaningful content here.&nbsp; As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​<br></p>', 0, 'fab fa-facebook-f', 'fab fa-twitter', 'fab fa-behance', 'fab fa-linkedin-in', NULL, 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', NULL, '2021-02-09 22:50:20', '2021-02-09 23:11:16'),
(7, 1, 1, '16129337621309526882.jpg', 'D. Williamson', 'Founder', '<p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Consider the number of people who influence a sale, the length of the decision-making cycle, the competing interests of the people who purchase, implement, manage, and use the technology. It’s a lot meaningful content here.&nbsp; As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​<br></p>', 0, 'fab fa-facebook-f', 'fab fa-twitter', 'fab fa-behance', 'fab fa-linkedin-in', NULL, 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', NULL, '2021-02-09 22:50:20', '2021-02-09 23:11:10'),
(8, 1, 1, '16129337511015110346.jpg', 'D. Williamson', 'Founder', '<p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Consider the number of people who influence a sale, the length of the decision-making cycle, the competing interests of the people who purchase, implement, manage, and use the technology. It’s a lot meaningful content here.&nbsp; As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​<br></p>', 0, 'fab fa-facebook-f', 'fab fa-twitter', 'fab fa-behance', 'fab fa-linkedin-in', NULL, 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', NULL, '2021-02-09 22:50:20', '2021-02-09 23:11:04'),
(9, 1, 1, '1612933721528929386.jpg', 'D. Williamson', 'Founder', '<p>Does any industry face a more complex audience journey and marketing sales process than B2B technology? Consider the number of people who influence a sale, the length of the decision-making cycle, the competing interests of the people who purchase, implement, manage, and use the technology. It’s a lot meaningful content here.&nbsp; As a result, most of us need to know how to use computers. Our knowledge of computers will help us to tap into challenging career opportunities and enhance the quality of our lives. It is imperative that quality students be encouraged and motivated to study computers and become capable and responsible IT professionals. The education model needs to align itself with dynamically changing technology to meet the growing need for skilled IT manpower and deliver state-of-the-art, industry relevant and technology ready programs.​<br></p>', 0, 'fab fa-facebook-f', 'fab fa-twitter', 'fab fa-behance', NULL, NULL, 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', 'https://codecanyon.net/user/geniusdevs/portfolio', NULL, NULL, '2021-02-09 22:50:20', '2021-02-16 08:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `language_id`, `status`, `name`, `position`, `message`, `image`, `rating`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'mamun', 'CEO of Apple', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '1622610022334317720.jpg', '5', 0, '2021-02-15 05:24:20', '2021-06-01 23:00:22'),
(2, 1, NULL, 'Genius Mamun', 'CEO of Apple', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '16226099182019624356.jpg', '5', 0, '2021-02-15 05:24:32', '2021-06-01 22:58:38'),
(3, 1, NULL, 'Lisa', 'CEO of Apple', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '1622609908696856003.jpg', '5', 1, '2021-02-15 05:24:45', '2021-06-01 22:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verify_token` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `username`, `phone`, `address`, `country`, `state`, `city`, `zipcode`, `email_verified`, `email_verify_token`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'DJrafi', NULL, 'djrafi@gmail.com', 'djrafi', NULL, NULL, NULL, NULL, NULL, NULL, '0', '45c9461ec630cbc62e2947d931480fd4', '$2y$10$Dm.lw2D0lksVZ6UXZ927cOiAytwyquOjcmxUpD6B/yiB6xz/idzB.', NULL, '2021-06-12 05:57:50', '2021-06-12 05:57:50'),
(4, 'Tony', NULL, 'tony@gmail.com', 'tony', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'db2b57ede2668692932446e19a165999', '$2y$10$NpvrpJD8WudtJkTbLa6yMOMreFeCShybL5l50FMoQLQ32CCSfVgaW', NULL, '2021-06-12 06:00:01', '2021-06-12 06:00:01'),
(5, 'Mamun', '1623977685799861143.jpg', 'user@gmail.com', 'user', '123456789', 'Dhaka Bangladesh', 'Bangladesh', 'Dhaka', 'dhaka', '2344', 'Yes', '5f717a00ff2df1633902057c212daddc', '$2y$10$xIKhl5/MwWmdjWjfHI8CB.AL6yqqcYKTYPEfipENYopLhCnRSCSlO', NULL, '2021-06-13 03:49:24', '2021-06-19 14:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `visibilities`
--

CREATE TABLE `visibilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_messenger` tinyint(4) NOT NULL DEFAULT '1',
  `is_disqus` tinyint(4) NOT NULL DEFAULT '1',
  `is_google_analytics` tinyint(4) NOT NULL DEFAULT '1',
  `is_add_this_status` tinyint(4) NOT NULL DEFAULT '1',
  `is_facebook_pexel` tinyint(4) NOT NULL DEFAULT '1',
  `is_announcement` tinyint(4) NOT NULL DEFAULT '1',
  `is_maintainance_mode` tinyint(4) NOT NULL DEFAULT '1',
  `is_blog_share_links` tinyint(4) NOT NULL DEFAULT '1',
  `is_tawk_to` tinyint(4) NOT NULL DEFAULT '1',
  `is_recaptcha` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_cooki_alert` tinyint(4) NOT NULL DEFAULT '1',
  `is_video_hero` tinyint(4) NOT NULL DEFAULT '1',
  `is_whatsapp` tinyint(4) NOT NULL DEFAULT '1',
  `is_call_button` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_slider_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_who_we_are_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_intro_video_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_service_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_why_choose_us_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_portfolio_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_testimonial_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_team_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_contact_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_faq_counter_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_meet_us_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_blog_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t1_clint_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_hero_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_about_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_service_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_intro_video_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_team_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_counter_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_testimonial_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_contact_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_faq_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_quote_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_news_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t2_client_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t3_hero_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t3_service_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t3_portfolio_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t3_testimonial_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t3_faq_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t3_team_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t3_meet_us_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t3_news_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t3_client_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t4_hero_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t4_client_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t4_about_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t4_feature_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t4_who_we_are_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t4_intro_video_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t4_portfolio_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t4_counter_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t4_testmonial_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t4_faq_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t4_contact_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t5_slider_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t5_about_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t5_who_er_are_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t5_service_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t5_project_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t5_team_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t5_counter_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t5_testimonial_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t5_meetus_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t5_blog_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t5_client_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t6_slider_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t6_client_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t6_who_we_are_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t6_service_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t6_project_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t6_team_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t6_testimonial_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t6_faq_counter_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t6_meetus_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t6_blog_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_t6_map_section` tinyint(4) NOT NULL DEFAULT '1',
  `is_shop` tinyint(4) NOT NULL DEFAULT '1',
  `is_user_system` tinyint(4) NOT NULL DEFAULT '1',
  `is_preloader` tinyint(4) NOT NULL DEFAULT '1',
  `is_shop_share_links` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_about_page` tinyint(4) NOT NULL DEFAULT '1',
  `is_service_page` tinyint(4) NOT NULL DEFAULT '1',
  `is_poerfolio_page` tinyint(4) NOT NULL DEFAULT '1',
  `is_package_page` tinyint(4) NOT NULL DEFAULT '1',
  `is_team_page` tinyint(4) NOT NULL DEFAULT '1',
  `is_faq_page` tinyint(4) NOT NULL DEFAULT '1',
  `is_blog_page` tinyint(4) NOT NULL DEFAULT '1',
  `is_contact_page` tinyint(4) NOT NULL DEFAULT '1',
  `is_quote_page` tinyint(4) NOT NULL DEFAULT '1',
  `is_about_about` tinyint(4) NOT NULL DEFAULT '1',
  `is_about_w_w_a` tinyint(4) NOT NULL DEFAULT '1',
  `is_about_choose_us` tinyint(4) NOT NULL DEFAULT '1',
  `is_about_history` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visibilities`
--

INSERT INTO `visibilities` (`id`, `is_messenger`, `is_disqus`, `is_google_analytics`, `is_add_this_status`, `is_facebook_pexel`, `is_announcement`, `is_maintainance_mode`, `is_blog_share_links`, `is_tawk_to`, `is_recaptcha`, `is_cooki_alert`, `is_video_hero`, `is_whatsapp`, `is_call_button`, `is_t1_slider_section`, `is_t1_who_we_are_section`, `is_t1_intro_video_section`, `is_t1_service_section`, `is_t1_why_choose_us_section`, `is_t1_portfolio_section`, `is_t1_testimonial_section`, `is_t1_team_section`, `is_t1_contact_section`, `is_t1_faq_counter_section`, `is_t1_meet_us_section`, `is_t1_blog_section`, `is_t1_clint_section`, `is_t2_hero_section`, `is_t2_about_section`, `is_t2_service_section`, `is_t2_intro_video_section`, `is_t2_team_section`, `is_t2_counter_section`, `is_t2_testimonial_section`, `is_t2_contact_section`, `is_t2_faq_section`, `is_t2_quote_section`, `is_t2_news_section`, `is_t2_client_section`, `is_t3_hero_section`, `is_t3_service_section`, `is_t3_portfolio_section`, `is_t3_testimonial_section`, `is_t3_faq_section`, `is_t3_team_section`, `is_t3_meet_us_section`, `is_t3_news_section`, `is_t3_client_section`, `is_t4_hero_section`, `is_t4_client_section`, `is_t4_about_section`, `is_t4_feature_section`, `is_t4_who_we_are_section`, `is_t4_intro_video_section`, `is_t4_portfolio_section`, `is_t4_counter_section`, `is_t4_testmonial_section`, `is_t4_faq_section`, `is_t4_contact_section`, `is_t5_slider_section`, `is_t5_about_section`, `is_t5_who_er_are_section`, `is_t5_service_section`, `is_t5_project_section`, `is_t5_team_section`, `is_t5_counter_section`, `is_t5_testimonial_section`, `is_t5_meetus_section`, `is_t5_blog_section`, `is_t5_client_section`, `is_t6_slider_section`, `is_t6_client_section`, `is_t6_who_we_are_section`, `is_t6_service_section`, `is_t6_project_section`, `is_t6_team_section`, `is_t6_testimonial_section`, `is_t6_faq_counter_section`, `is_t6_meetus_section`, `is_t6_blog_section`, `is_t6_map_section`, `is_shop`, `is_user_system`, `is_preloader`, `is_shop_share_links`, `is_about_page`, `is_service_page`, `is_poerfolio_page`, `is_package_page`, `is_team_page`, `is_faq_page`, `is_blog_page`, `is_contact_page`, `is_quote_page`, `is_about_about`, `is_about_w_w_a`, `is_about_choose_us`, `is_about_history`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1', 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, '2021-09-28 05:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `why_selects`
--

CREATE TABLE `why_selects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_selects`
--

INSERT INTO `why_selects` (`id`, `language_id`, `status`, `title`, `icon`, `text`, `serial_number`, `created_at`, `updated_at`) VALUES
(2, '1', 1, 'Beneficial Strategies', 'fal fa-server', 'Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium doloremque laudan-tium totam.', 0, '2021-02-09 08:27:19', '2021-02-17 06:14:34'),
(3, '1', 1, 'Automated Software', 'fal fa-tools', 'Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium doloremque laudan-tium totam.', 0, '2021-02-09 08:27:45', '2021-02-17 06:14:29'),
(4, '1', 1, 'Modify Whole System', 'fal fa-laptop-code', 'Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium doloremque laudan-tium totam.', 0, '2021-02-09 08:51:00', '2021-02-17 06:14:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backups`
--
ALTER TABLE `backups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bcategories`
--
ALTER TABLE `bcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daynamicpages`
--
ALTER TABLE `daynamicpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ebanners`
--
ALTER TABLE `ebanners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailsettings`
--
ALTER TABLE `emailsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esliders`
--
ALTER TABLE `esliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_visibilities`
--
ALTER TABLE `extra_visibilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flinks`
--
ALTER TABLE `flinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gcategories`
--
ALTER TABLE `gcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jcategories`
--
ALTER TABLE `jcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_gateweys`
--
ALTER TABLE `payment_gateweys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permalinks`
--
ALTER TABLE `permalinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectiontitles`
--
ALTER TABLE `sectiontitles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitemaps`
--
ALTER TABLE `sitemaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `visibilities`
--
ALTER TABLE `visibilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `why_selects`
--
ALTER TABLE `why_selects`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `backups`
--
ALTER TABLE `backups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bcategories`
--
ALTER TABLE `bcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daynamicpages`
--
ALTER TABLE `daynamicpages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ebanners`
--
ALTER TABLE `ebanners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emailsettings`
--
ALTER TABLE `emailsettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `esliders`
--
ALTER TABLE `esliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `extra_visibilities`
--
ALTER TABLE `extra_visibilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flinks`
--
ALTER TABLE `flinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gcategories`
--
ALTER TABLE `gcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jcategories`
--
ALTER TABLE `jcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_gateweys`
--
ALTER TABLE `payment_gateweys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permalinks`
--
ALTER TABLE `permalinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sectiontitles`
--
ALTER TABLE `sectiontitles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sitemaps`
--
ALTER TABLE `sitemaps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visibilities`
--
ALTER TABLE `visibilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_selects`
--
ALTER TABLE `why_selects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
