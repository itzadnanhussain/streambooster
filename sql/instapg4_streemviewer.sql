-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2021 at 11:19 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instapg4_streemviewer`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `activity_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `discription` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `twitch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`activity_id`, `username`, `discription`, `created_at`, `user_id`, `twitch_id`) VALUES
(11, 'adnantest', 'Invest 100 coins For Displayed ON Follows Page', '2020-12-03 19:53:52', 8, 611373284),
(12, 'adnantest', 'Invest 10 coins For Displayed ON Follows Page', '2020-12-04 08:08:03', 8, 611373284),
(13, 'adnantest', 'Invest 100 coins For Displayed ON Watch Page', '2020-12-05 11:21:19', 14, 611373284),
(14, 'adnantest', 'Invest 125 coins For Displayed ON Watch Page', '2020-12-05 11:31:09', 14, 611373284),
(15, 'adnantest', 'Invest 75 coins For Displayed ON Watch Page', '2020-12-05 11:33:04', 14, 611373284),
(16, 'adnantest', 'Invest 100 coins For Displayed ON Follows Page', '2020-12-05 11:53:53', 14, 611373284),
(17, 'adnantest', 'Invest 100 coins For Displayed ON Follows Page', '2020-12-05 11:54:49', 14, 611373284),
(18, 'adnantest', 'Invest 125 coins For Displayed ON Follows Page', '2020-12-05 14:12:43', 14, 611373284),
(19, 'adnantest', 'Invest 175 coins For Displayed ON Watch Page', '2020-12-05 18:36:21', 14, 611373284),
(20, 'adnantest', 'Invest 250 coins For Displayed ON Watch Page', '2020-12-07 17:40:57', 14, 611373284),
(21, 'adnantest', 'Invest 35 coins For Displayed ON Watch Page', '2020-12-07 19:14:28', 14, 611373284),
(22, 'adnantest', 'Invest 3387 coins For Displayed ON Follows Page', '2020-12-07 19:21:40', 14, 611373284),
(23, 'Schaffner', 'Invest 100 coins For Displayed ON Watch Page', '2020-12-10 10:27:21', 26, 405493872),
(24, 'IchMagZuege', 'Invest 100 coins For Displayed ON Follows Page', '2020-12-10 11:36:03', 25, 173366421),
(25, 'adnantest', 'Invest 160 coins For Displayed ON Follows Page', '2020-12-10 11:54:33', 24, 611373284),
(26, 'david1707276', 'Invest 100 coins For Displayed ON Watch Page', '2020-12-17 06:09:01', 20, 618295746),
(27, 'david1707276', 'Invest 400 coins For Displayed ON Watch Page', '2020-12-17 06:38:43', 20, 618295746),
(28, 'david1707276', 'Invest 200 coins For Displayed ON Watch Page', '2020-12-17 07:12:37', 20, 618295746),
(29, 'david1707276', 'Invest 300 coins For Displayed ON Watch Page', '2020-12-17 07:13:51', 20, 618295746),
(30, 'IchMagZuege', 'Invest 1 coins For Displayed ON Watch Page', '2020-12-19 08:26:19', 23, 173366421),
(31, 'IchMagZuege', 'Invest 1 coins For Displayed ON Watch Page', '2020-12-20 04:49:10', 23, 173366421),
(32, 'IchMagZuege', 'Invest 10 coins For Displayed ON Follows Page', '2020-12-22 05:33:28', 23, 173366421),
(33, 'IchMagZuege', 'Invest 1 coins For Displayed ON Watch Page', '2020-12-25 08:11:45', 23, 173366421),
(34, 'david1707276', 'Invest 100 coins For Displayed ON Watch Page', '2020-12-30 07:58:21', 24, 618295746),
(35, 'Schaffner', 'Invest 1 coins For Displayed ON Watch Page', '2020-12-30 08:50:32', 25, 405493872),
(36, 'Schaffner', 'Invest 100 coins For Displayed ON Follows Page', '2020-12-30 08:54:45', 25, 405493872),
(37, 'Schaffner', 'Invest 100 coins For Displayed ON Watch Page', '2020-12-30 09:08:57', 25, 405493872),
(38, 'IchMagZuege', 'Invest 100 coins For Displayed ON Follows Page', '2020-12-30 09:12:22', 23, 173366421),
(39, 'Schaffner', 'Invest 100 coins For Displayed ON Follows Page', '2020-12-30 09:16:26', 25, 405493872),
(40, 'Schaffner', 'Invest 100 coins For Displayed ON Watch Page', '2020-12-30 09:53:53', 25, 405493872),
(41, 'zackenbaroniii', 'Invest 200 coins For Displayed ON Watch Page', '2020-12-30 09:59:08', 27, 144974824),
(42, 'Schaffner', 'Invest 100 coins For Displayed ON Watch Page', '2020-12-30 10:12:40', 25, 405493872),
(43, 'IchMagZuege', 'Invest 100 coins For Displayed ON Follows Page', '2021-01-02 11:51:16', 23, 173366421),
(44, 'IchMagZuege', 'Invest 1 coins For Displayed ON Follows Page', '2021-01-02 15:40:18', 23, 173366421),
(45, 'Schaffner', 'Invest 10 coins For Displayed ON Watch Page', '2021-01-09 08:13:48', 25, 405493872),
(46, 'zackenbaroniii', 'Invest 300 coins For Displayed ON Watch Page', '2021-01-09 08:19:18', 27, 144974824),
(47, 'Schaffner', 'Invest 100 coins For Displayed ON Follows Page', '2021-01-09 08:21:36', 25, 405493872),
(48, 'Schaffner', 'Invest 20 coins For Displayed ON Watch Page', '2021-01-20 14:07:07', 25, 405493872),
(49, 'nilsTJ', 'Invest 50 coins For Displayed ON Watch Page', '2021-01-20 14:12:36', 29, 191786838),
(50, 'adnantest', 'Invest 50 coins For Displayed ON Follows Page', '2021-03-09 07:27:46', 28, 611373284),
(51, 'adnantest', 'Invest 50 coins For Displayed ON Follows Page', '2021-03-09 07:48:55', 28, 611373284),
(52, 'Schaffner', 'Invest 100 coins For Displayed ON Watch Page', '2021-03-11 08:55:47', 25, 405493872),
(53, 'BimKuuqz', 'Invest 50 coins For Displayed ON Watch Page', '2021-04-06 16:30:33', 31, 436593213),
(54, 'IchMagZuege', 'Invest 50 coins For Displayed ON Follows Page', '2021-05-09 13:49:00', 23, 173366421);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `title` text,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `title`, `description`, `created_at`) VALUES
(3, 'UXEJ4TED34', '<p>This is text for test<span style=\"font-family: Impact;\">﻿</span></p>', '2021-04-02 16:42:39'),
(4, '0HSIA6L4HC', '<p>tttddrdhgfhhkj</p>', '2021-04-02 16:47:51'),
(5, 'FULL STACK DEVELOPERW', '<p>test</p>', '2021-04-02 16:50:17'),
(6, '54HT49R97N', '<p>ahdalsc lkjafa;sl</p>', '2021-04-02 16:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `broadcast_rating`
--

CREATE TABLE `broadcast_rating` (
  `user_id` int(11) NOT NULL,
  `twitch_id` int(11) NOT NULL,
  `gaming_skills` int(11) NOT NULL,
  `communicability` int(11) NOT NULL,
  `video_settings` int(11) NOT NULL,
  `audio_settings` int(11) NOT NULL,
  `webcam` int(11) NOT NULL,
  `adequacy` int(11) NOT NULL,
  `charisma` int(11) NOT NULL,
  `sexuality` int(11) NOT NULL,
  `streamer_of_the_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `broadcast_rating`
--

INSERT INTO `broadcast_rating` (`user_id`, `twitch_id`, `gaming_skills`, `communicability`, `video_settings`, `audio_settings`, `webcam`, `adequacy`, `charisma`, `sexuality`, `streamer_of_the_year`) VALUES
(25, 0, 4, 6, 9, 10, 5, 7, 0, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `coins_management`
--

CREATE TABLE `coins_management` (
  `id` int(255) NOT NULL,
  `watch_coin_per_min` int(255) NOT NULL,
  `ad_coin_per_min` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `comment_to` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('Active','Pending','','') NOT NULL DEFAULT 'Pending',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `username`, `comment_to`, `comment`, `status`, `updated_at`) VALUES
(1, 20, 'david1707276', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Pending', '2020-12-11 08:13:16'),
(2, 20, 'david1707276', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Pending', '2020-12-11 08:13:16'),
(3, 20, 'david1707276', 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Pending', '2020-12-11 08:13:16'),
(7, 23, 'IchMagZuege', 25, 'User Comment: Hello', 'Pending', '2020-12-30 17:29:31'),
(8, 24, 'david1707276', 23, 'User Comment: this is test comment ', 'Active', '2021-01-01 07:06:51'),
(9, 25, 'Schaffner', 23, 'User Comment: hello :)', 'Active', '2021-01-01 18:17:45'),
(10, 25, 'Schaffner', 24, 'User Comment: hello', 'Pending', '2021-01-01 18:18:09'),
(11, 25, 'Schaffner', 27, 'User Comment: hello', 'Pending', '2021-01-01 18:18:24'),
(12, 30, 'NxtLevlDE', 25, 'User Comment: hello', 'Pending', '2021-02-01 10:54:02'),
(13, 23, 'IchMagZuege', 24, 'User Comment: hello :)', 'Pending', '2021-03-19 12:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `follow_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `follow_by` int(11) NOT NULL,
  `f_status` enum('Following','Unfollowing','','') NOT NULL DEFAULT 'Unfollowing',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`follow_id`, `user_id`, `follow_by`, `f_status`, `update_time`) VALUES
(6, 22, 22, 'Following', '2020-12-10 13:27:35'),
(7, 26, 26, 'Following', '2020-12-10 17:29:05'),
(10, 25, 24, 'Following', '2020-12-10 18:52:21'),
(11, 26, 24, 'Following', '2020-12-10 18:59:12'),
(12, 26, 25, 'Following', '2020-12-11 15:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` enum('Admin','User','','') NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `roll`, `date`) VALUES
(1, 'admin@test.com', '$2y$10$Cq1eXoO2QVIkfWRkTls3.OBBEdk2Yb/c8qnYmZDTCwYVirkzFgyNO', 'Admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `get_coins` int(11) DEFAULT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `rank_status` enum('Completed','Pending','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `rank_id`, `card_number`, `card_exp_month`, `card_exp_year`, `paid_amount`, `get_coins`, `paid_amount_currency`, `txn_id`, `payment_status`, `rank_status`, `created`) VALUES
(15, 20, 2, 4242424242424242, '12', '2025', '90', NULL, 'usd', 'txn_1HzKuvJDRr1d8BYX0ZIc3jKz', 'succeeded', 'Pending', '2020-12-17 16:45:09'),
(16, 20, 2, 4242424242424242, '12', '2025', '90', NULL, 'usd', 'txn_1HzKxrJDRr1d8BYXaJjBHR07', 'succeeded', 'Pending', '2020-12-17 16:48:12'),
(17, 20, 2, 4242424242424242, '12', '2025', '90', NULL, 'usd', 'txn_1HzL0IJDRr1d8BYXm3qK8cAV', 'succeeded', 'Pending', '2020-12-17 16:50:42'),
(18, 20, 1, 4242424242424242, '12', '2025', '50', 1000, 'usd', 'txn_1HzMB9JDRr1d8BYXXLpGRYE1', 'succeeded', 'Completed', '2020-12-17 06:05:59'),
(19, 20, 1, 4242424242424242, '12', '2025', '75', 1500, 'usd', 'txn_1HzMjHJDRr1d8BYXwUxPkQiX', 'succeeded', 'Completed', '2020-12-17 06:41:16'),
(20, 20, 1, 4242424242424242, '12', '2025', '25', 500, 'usd', 'txn_1HzMmvJDRr1d8BYX5rbbBXSn', 'succeeded', 'Completed', '2020-12-17 06:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `promo_name` varchar(50) NOT NULL,
  `coins` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `reactivation` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `user_id`, `promo_name`, `coins`, `money`, `status`, `reactivation`, `created_at`) VALUES
(1, 25, 'Displayed ON Watch Page', 100, 0, 'active', 'inactive', '2021-03-11 15:55:47'),
(2, 31, 'Displayed ON Watch Page', 50, 0, 'active', 'inactive', '2021-04-06 22:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invested_coins` int(11) DEFAULT NULL,
  `invested_money` int(11) DEFAULT NULL,
  `ranks` enum('Displayed ON Watch Page','Displayed ON Follows Page','Double Coins',' Virtual Coins','Promoted-Rank','AFK') DEFAULT NULL,
  `assign_coins` int(11) DEFAULT NULL,
  `Updated_at` varchar(50) NOT NULL,
  `promotion_status` enum('Pending','Active','Inactive','') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `user_id`, `invested_coins`, `invested_money`, `ranks`, `assign_coins`, `Updated_at`, `promotion_status`) VALUES
(40, 20, 300, NULL, 'Displayed ON Watch Page', NULL, '2020-12-17', 'Active'),
(41, 1, NULL, NULL, 'AFK', NULL, '', 'Active'),
(42, 1, NULL, NULL, '', 0, '', 'Active'),
(44, 1, NULL, NULL, 'Double Coins', NULL, '', 'Active'),
(59, 25, 100, NULL, 'AFK', NULL, '2021-01-09', 'Active'),
(61, 23, NULL, NULL, 'Double Coins', NULL, '', 'Active'),
(63, 24, NULL, NULL, 'AFK', NULL, '', 'Active'),
(66, 24, NULL, NULL, 'Promoted-Rank', NULL, '', 'Pending'),
(67, 28, NULL, NULL, 'Double Coins', NULL, '2021-06-16', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `currency` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `name`, `price`, `currency`, `status`) VALUES
(1, 'Virtual Coins', 25.00, 'USD', 1),
(2, 'Promoted-Rank', 90.00, 'USD', 1),
(3, 'Double Coins', 40.00, 'USD', 1),
(4, 'AFK Varification', 45.00, 'USD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `referral_users`
--

CREATE TABLE `referral_users` (
  `id` int(11) NOT NULL,
  `invite_user_id` int(11) NOT NULL,
  `client_mac_address` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referral_users`
--

INSERT INTO `referral_users` (`id`, `invite_user_id`, `client_mac_address`, `created_at`) VALUES
(3, 28, '123', '2021-03-11 06:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `reply_by` enum('Admin','User','','') NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `comment_id`, `reply`, `reply_by`, `update_at`) VALUES
(7, 4, 'Reply By User: ', 'User', '2020-12-30 16:24:06'),
(9, 8, 'Reply By User: test reply', 'User', '2021-01-01 07:21:15'),
(10, 8, 'Reply By Admin: hello', 'Admin', '2021-01-01 17:25:27'),
(11, 8, 'Reply By Admin: test', 'Admin', '2021-01-01 18:16:12'),
(12, 8, 'Reply By Admin: test reply', 'Admin', '2021-01-01 18:16:23'),
(13, 9, 'Reply By Admin: hello', 'Admin', '2021-03-10 15:17:48'),
(14, 9, 'Reply By Admin: hello', 'Admin', '2021-03-10 15:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userprofile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view_count` int(20) NOT NULL,
  `coins` int(11) NOT NULL,
  `level` int(10) NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `key_value` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitch_user_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `twitch_access_token` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `twitch_refresh_token` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive','banned','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inactive',
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `watching_coins` int(50) NOT NULL,
  `followers` int(11) NOT NULL,
  `double_coins` enum('Active','Inactive','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Inactive',
  `promoted_rank` enum('Active','Inactive','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Inactive',
  `afk_varification` enum('Active','Inactive','','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Inactive',
  `created_at` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `userprofile`, `view_count`, `coins`, `level`, `password`, `key_value`, `twitch_user_id`, `twitch_access_token`, `twitch_refresh_token`, `status`, `bio`, `watching_coins`, `followers`, `double_coins`, `promoted_rank`, `afk_varification`, `created_at`) VALUES
(24, 'testadnan073@gmail.com', 'david1707276', 'https://static-cdn.jtvnw.net/user-default-pictures-uv/998f01ae-def8-11e9-b95c-784f43822e80-profile_image-300x300.png', 62, 5500, 3, '', '4973e2fb1049b63c60d38845e51e158e', '618295746', 'loiu4v947op3pio0lb11993tu1g34f', 'rscggqt0nmlh8nxyg99dmt6kvp6z8pcn6ikbs4eels5crqqcr2', 'inactive', 'Bio Test Text', 0, 0, 'Active', 'Active', 'Active', '2020-12'),
(23, 'pvmc1402@gmail.com', 'IchMagZuege', 'https://static-cdn.jtvnw.net/jtv_user_pictures/58004898-2f2f-4472-b1e4-d19a11b70282-profile_image-300x300.png', 6817, 7400, 2, '', 'dbc2ea0f0e448947518f933f69804679', '173366421', 'esxqeuwy0y0uepeml4asbm7ss2xam6', 'h8alknvfh80o8jbk23yeytmzapifmf5dgap9qr66ujv5upwi9k', 'active', 'My name ist paul', 1150, 0, 'Inactive', 'Inactive', 'Inactive', '2020-12'),
(25, 'paulvoigt1402@gmail.com', 'Schaffner', 'https://static-cdn.jtvnw.net/jtv_user_pictures/9cdeba16-4653-42f4-b4a8-b3c6ecf57e04-profile_image-300x300.png', 33, 9830, 2, '', '1e68ee5be3e958a27eaf11dc7e40be45', '405493872', 'xwlxx51bmdsvzyrk53ur76b0b7b9l3', 'uiwbithcl5f37pg9p0ta8c21m3wz3fu4tmc9im7riqabz8lguq', 'inactive', 'test text', 1200, 0, 'Active', 'Active', 'Active', '2020-12'),
(26, 'naiylobusiness@gmail.com', 'naiylo', 'https://static-cdn.jtvnw.net/jtv_user_pictures/8340d443-7c3d-425b-a6de-e31fc89056f8-profile_image-300x300.png', 2340, 3762, 1, '', 'b889544d1eafef19510040a1b77db9fd', '142268817', 'wlzbk0xvp2dv0x7rnwjzkhxdycsgnx', 'xr88gp98pitpv6r40wjqpeuvceemnsyd3gr5rg564yqu5ujttm', 'active', '', 0, 0, 'Inactive', 'Inactive', 'Inactive', '2020-11'),
(27, 'therealz3r0x@gmail.com', 'zackenbaroniii', 'https://static-cdn.jtvnw.net/jtv_user_pictures/57330b2f-18a2-40b0-b796-1093b3c28167-profile_image-300x300.png', 50, -1238, 1, '', '33ea5a3fc8b3d07d1ea080079a87bfce', '144974824', 'wyeogzkus9j9y7gjy27sc2ozse1ke0', 'gl8g1tjy88tum2noz138o59f453mzo7gs7iji2n3gi1xb3j6ab', 'active', '', 300, 0, 'Inactive', 'Inactive', 'Inactive', '2020-10'),
(28, 'dani1707276@gmail.com', 'adnantest', 'https://static-cdn.jtvnw.net/user-default-pictures-uv/294c98b5-e34d-42cd-a8f0-140b72fba9b0-profile_image-300x300.png', 241, 7277, 3, '', '89c4ea367b24364422de5be70a6ed3c9', '611373284', 'xwzvydysql4qt61o38m6k5ljlhi1f7', 'wj7qk9e3evm0l2uf6wpgfb3dfzld9eae1ihujuizy5yc0cz91s', 'inactive', 'jjjjjjjj bbbhb', 0, 1, 'Inactive', 'Inactive', 'Inactive', '2021-01'),
(29, 'nils.steinigen@web.de', 'nilsTJ', 'https://static-cdn.jtvnw.net/jtv_user_pictures/13707753-a959-4824-b390-2b3c96077b45-profile_image-300x300.png', 1363, 3712, 1, '', '278b4eadd80dcf9f169de50a837e8b25', '191786838', 'r8luhnjzppy8m9u1qqpagh6fi5t1bd', 'nc35njzsfuhllpms5lym8lp51zg6x7odoiortbab3wttykas5t', 'inactive', '', 0, 0, 'Inactive', 'Inactive', 'Inactive', '2021-01'),
(30, 'admin@nxtlevl.de', 'NxtLevlDE', 'https://static-cdn.jtvnw.net/jtv_user_pictures/e535ef10-62ec-4e49-a5bd-28b2ea553259-profile_image-300x300.png', 19, 3762, 1, '', 'f182a0e0a958f9f6f75d450a412b0325', '508435914', 'jl6pv7t2pdys9h2b5asiznh289aq6e', 'ifnm192rt25povwmekkwjsm3slmo7byruj6rdtr4i7t05422p1', 'active', '', 0, 0, 'Inactive', 'Inactive', 'Inactive', '2021-02'),
(31, 'seb.sr.9244@gmail.com', 'BimKuuqz', 'https://static-cdn.jtvnw.net/jtv_user_pictures/437d9854-f22b-4017-a158-18b2c39d0d04-profile_image-300x300.png', 168, 3712, 1, '', '76d54acddad2cb2939d2fc58e0fb1f0e', '436593213', 'qjltx3x2eygqrmsthyd9pwuoavq2cj', 'd7da6of3t00v4wnuslmn9pekfa9omi7fnv88wz0k3spk0cyw3c', 'active', '', 0, 0, 'Inactive', 'Inactive', 'Inactive', '2021-04'),
(32, '', 'nehatest', 'https://static-cdn.jtvnw.net/user-default-pictures-uv/215b7342-def9-11e9-9a66-784f43822e80-profile_image-300x300.png', 0, 3762, 3, '', 'b00b140a634aa18a7336aadee36a1ae6', '690735020', 'unmeim1s6xc3idjj0zcrycykf9qd9y', '83nj97qxp4pknvynrlpxws7eyrgm6k9ckh0lfjeoc6mh786eap', 'active', '', 0, 0, 'Inactive', 'Inactive', 'Inactive', '2021-05');

-- --------------------------------------------------------

--
-- Table structure for table `video_ads`
--

CREATE TABLE `video_ads` (
  `id` int(255) NOT NULL,
  `video_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_ads`
--

INSERT INTO `video_ads` (`id`, `video_path`) VALUES
(3, 'assets/video/trailer.mp4'),
(5, 'assets/video/yt1s.com - LaFerrari  Official video_480p.mp4'),
(6, 'assets/video/yt1s.com - Best Porsche Advertisement Ever_480p.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `broadcast_rating`
--
ALTER TABLE `broadcast_rating`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `coins_management`
--
ALTER TABLE `coins_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_users`
--
ALTER TABLE `referral_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_ads`
--
ALTER TABLE `video_ads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `broadcast_rating`
--
ALTER TABLE `broadcast_rating`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `coins_management`
--
ALTER TABLE `coins_management`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referral_users`
--
ALTER TABLE `referral_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `video_ads`
--
ALTER TABLE `video_ads`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
