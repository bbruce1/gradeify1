-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 06:15 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testlit_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `decks`
--

CREATE TABLE `decks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setid` int(10) DEFAULT NULL,
  `deck_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `decks`
--

INSERT INTO `decks` (`id`, `setid`, `deck_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'deck 1', 'deck 1 descriptiom', NULL, NULL),
(2, 1, 'deck 2', 'deck 2 description', NULL, NULL),
(3, 2, 'deck 3', 'deck 3 description', NULL, NULL),
(4, 1, 'deck 4', 'deck 1 description', '2021-12-16 00:50:47', '2021-12-16 00:50:47'),
(5, 2, 'deck 5', 'deck 2 discription', '2021-12-16 00:54:41', '2021-12-16 00:54:41'),
(6, 7, 'deck 786', 'deck 1 of set 7', '2021-12-16 01:45:01', '2021-12-16 01:45:01'),
(7, 1, 'deck 5', 'deck 5 of set 1', '2021-12-16 22:50:49', '2021-12-16 22:50:49'),
(8, 2, 'deck 6', 'deck 6 from set 2', '2021-12-16 22:51:31', '2021-12-16 22:51:31'),
(9, 1, 'deck 6', 'deck 6 from set 7', '2021-12-17 01:01:26', '2021-12-17 01:01:26');

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
-- Table structure for table `flashcards`
--

CREATE TABLE `flashcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deck_id` int(11) NOT NULL,
  `flashcard_terms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flashcard_defination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flashcards`
--

INSERT INTO `flashcards` (`id`, `deck_id`, `flashcard_terms`, `flashcard_defination`, `created_at`, `updated_at`) VALUES
(1, 1, 'khssain', 'lasifhussain', NULL, NULL),
(2, 1, 'khssain description', 'lasifhussaindasdas', NULL, NULL),
(3, 1, 'dfsfsf', 'sdfsdfsfsdf', NULL, NULL),
(4, 1, 'khsfsdfssain', 'sdf', NULL, NULL),
(5, 1, 'khssain', 'sdfsdfsfsghhrth', NULL, NULL),
(6, 2, 'example', 'lasifhussain', NULL, NULL),
(7, 2, 'example description', 'lasifhussaindasdas', NULL, NULL),
(8, 3, 'example 1 ', 'description', NULL, NULL),
(9, 3, 'example 2', 'cfsds', NULL, NULL),
(10, 3, 'example 3', 'example description', NULL, NULL),
(11, 1, 'new flashcard', 'flashcard decr by viral', '2021-12-16 01:43:25', '2021-12-16 01:43:25'),
(12, 4, 'flash card 5', 'flash card desc by viral', '2021-12-16 01:43:54', '2021-12-16 01:43:54'),
(13, 6, 'flashcard 786', 'flashcard 1 of deck 6', '2021-12-16 01:45:33', '2021-12-16 01:45:33'),
(14, 3, 'flashcard 4', 'flashcard 4 from deck 3', '2021-12-16 22:52:12', '2021-12-16 22:52:12'),
(15, 8, 'flashcard 1', '1stflashcard of deck8', '2021-12-16 22:52:54', '2021-12-16 22:52:54');

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
(6, '2021_11_11_070645_create_fleshcards_table', 2),
(17, '2021_11_11_071851_create_fleshcards_table', 4),
(24, '2021_11_11_073050_create_sets_table', 7),
(31, '2021_11_11_072049_create_fleshcards_table', 8),
(45, '2014_10_12_000000_create_users_table', 9),
(46, '2014_10_12_100000_create_password_resets_table', 9),
(47, '2019_08_19_000000_create_failed_jobs_table', 9),
(48, '2019_12_14_000001_create_personal_access_tokens_table', 9),
(49, '2021_11_11_065508_create_decks_table', 9),
(50, '2021_11_11_081631_create_sets_table', 9),
(51, '2021_11_11_082318_create_setsdecks_table', 9),
(52, '2021_11_11_082644_create_sets_decks_flashcards_table', 9),
(53, '2021_11_11_083117_create_flashcards_table', 9);

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
-- Table structure for table `sets`
--

CREATE TABLE `sets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `sets_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sets_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sets`
--

INSERT INTO `sets` (`id`, `userid`, `sets_name`, `sets_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'set 1', 'set 1', NULL, NULL),
(2, 1, 'set 2', 'set 2', NULL, NULL),
(3, 1, 'set 3', 'set 3', NULL, NULL),
(4, 2, 'set 2 for acc 2', 'set 2 for acc 2', NULL, NULL),
(5, 7, '456', '456', '2021-11-30 04:34:39', '2021-11-30 04:34:39'),
(6, 7, '56', '56', '2021-11-30 05:00:56', '2021-11-30 05:00:56'),
(7, 7, 'test', 'test123', '2021-11-30 05:05:16', '2021-11-30 05:05:16'),
(8, 7, '234', '234', '2021-12-08 00:56:38', '2021-12-08 00:56:38'),
(9, 7, '234234234', '234234234234', '2021-12-08 05:23:15', '2021-12-08 05:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `setsdecks`
--

CREATE TABLE `setsdecks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sets_id` int(11) NOT NULL,
  `deck_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deck_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sets_decks_flashcards`
--

CREATE TABLE `sets_decks_flashcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deck_id` int(11) NOT NULL,
  `flashcard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flashcard_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Member','Admin','Premium','Basic') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Member',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$Wuxp5OB/pvITTxakRYBrnOG.16XOW2TKI7dTBtKEa5flQD8w.yRJ6', 'Admin', NULL, NULL, NULL),
(3, 'Warren Perez', 'jeco@mailinator.com', NULL, '$2y$10$Wuxp5OB/pvITTxakRYBrnOG.16XOW2TKI7dTBtKEa5flQD8w.yRJ6', 'Member', NULL, '2021-11-11 06:05:40', '2021-11-11 06:05:40'),
(4, 'India Holland', 'hykero@mailinator.com', NULL, '$2y$10$Wuxp5OB/pvITTxakRYBrnOG.16XOW2TKI7dTBtKEa5flQD8w.yRJ6', 'Member', NULL, '2021-11-11 06:08:46', '2021-11-11 06:08:46'),
(5, 'Sara Duran', 'demo@mailinator.com', NULL, '$2y$10$Wuxp5OB/pvITTxakRYBrnOG.16XOW2TKI7dTBtKEa5flQD8w.yRJ6', 'Member', NULL, '2021-11-11 06:20:17', '2021-11-11 06:20:17'),
(6, 'sfgsdfsdf', 'sdfsdfs2@gmail.com', NULL, '$2y$10$BLLHcptjmeqZKZsvR0tfNeHpbUiRoXXxtiwOpWqEcE3ZdA1Cmw9dS', 'Member', NULL, '2021-11-15 05:57:56', '2021-11-15 05:57:56'),
(7, 'qwe', 'qwe@gmail.com', NULL, '$2y$10$n7MmZjqRYLWvOmcElxLuTORXO9skiMHFHDEYA7lumByH0dSzn2Xj2', 'Member', NULL, '2021-11-15 06:01:32', '2021-11-15 06:01:32');


-- --------------------------------------------------------

--
-- Table structure for table `teachers_classes`
--

CREATE TABLE `teachers_classes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_plan` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers_classes`
--

INSERT INTO `teachers_classes` (`id`, `user_id`, `lesson_plan`, `status`, `updated_at`, `deleted_at`) VALUES
(1, 7, 'Period 1 Modern World History 1', 'finish', '2021-12-28 23:48:33', NULL),
(2, 7, 'Period 3 Modern World History', 'finish', '2021-12-29 01:55:24', NULL),
(3, 7, 'Period 5 Modern World History', 'draft', NULL, NULL);


-- --------------------------------------------------------

--
-- Table structure for table `teachers_todo`
--

CREATE TABLE `teachers_todo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers_todo`
--

INSERT INTO `teachers_todo` (`id`, `user_id`, `name`, `updated_at`, `created_at`) VALUES
(8, 7, 'test', '2021-12-29 01:49:30', '2021-12-29 01:49:30'),
(10, 7, 'test1', '2021-12-29 01:50:24', '2021-12-29 01:50:24'),
(13, 7, 'checking', '2021-12-29 02:00:04', '2021-12-29 02:00:04'),
(14, 7, 'reading', '2021-12-29 02:55:44', '2021-12-29 02:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `class_no` varchar(30) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `user_id`, `subject_id`, `name`, `class_no`, `updated_at`, `created_at`) VALUES
(1, 7, 'PRE4324', 'laravel', '3', '2021-12-27 03:17:17', '2021-12-24 02:53:07'),
(2, 7, 'PRE5453', 'science', '3', '2021-12-27 04:09:48', '2021-12-24 03:03:38'),
(3, 7, 'PRE5543', 'php', '2', '2021-12-27 04:09:44', '2021-12-24 03:03:57'),
(4, 7, 'PRE1534', 'acc', '4', '2021-12-24 05:50:15', '2021-12-24 05:50:15'),
(5, 7, 'PRE2143', 'maths', '3', '2021-12-24 05:53:26', '2021-12-24 05:53:26'),
(6, 7, 'PRE1233', 'arts', '3', '2021-12-24 06:45:20', '2021-12-24 06:45:20'),
(7, 7, 'PRE3321', 'sci', '6', '2021-12-24 23:16:32', '2021-12-24 23:16:32'),
(8, 7, 'PRE1233', '3', '4', '2021-12-25 00:02:06', '2021-12-25 00:02:06'),
(9, 7, 'PRE4323', 'sci', '1', '2021-12-25 00:09:22', '2021-12-25 00:09:22'),
(10, 7, 'PRE4325', 'test', '5', '2021-12-25 00:10:09', '2021-12-25 00:10:09'),
(11, 7, 'PRE7766', 'git', '5', '2021-12-25 00:19:03', '2021-12-25 00:19:03'),
(12, 7, 'PRE6345', '2', '2', '2021-12-27 02:54:18', '2021-12-25 00:21:35'),
(13, 7, 'PRE8347', 'History', '8', '2021-12-25 00:22:15', '2021-12-25 00:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_meetings`
--

CREATE TABLE `teachers_meetings` (
  `id` int(11) NOT NULL,
  `meeting_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers_meetings`
--

INSERT INTO `teachers_meetings` (`id`, `meeting_id`, `name`, `description`, `time`, `created_at`, `updated_at`) VALUES
(1, 'meeting01', 'john doe', 'meeting with john doe', '09:39:16', NULL, NULL),
(2, 'meeting02', 'jenna', 'meeting with jenna', '09:39:16', NULL, NULL);



--
-- Indexes for dumped tables
--

--
-- Indexes for table `decks`
--
ALTER TABLE `decks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flashcards`
--
ALTER TABLE `flashcards`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setsdecks`
--
ALTER TABLE `setsdecks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sets_decks_flashcards`
--
ALTER TABLE `sets_decks_flashcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `teachers_classes`
--
ALTER TABLE `teachers_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_todo`
--
ALTER TABLE `teachers_todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_meetings`
--
ALTER TABLE `teachers_meetings`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `decks`
--
ALTER TABLE `decks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sets`
--
ALTER TABLE `sets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setsdecks`
--
ALTER TABLE `setsdecks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sets_decks_flashcards`
--
ALTER TABLE `sets_decks_flashcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers_classes`
--
ALTER TABLE `teachers_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers_todo`
--
ALTER TABLE `teachers_todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachers_meetings`
--
ALTER TABLE `teachers_meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
