-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2022 at 01:06 PM
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
-- Database: `grad`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnis`
--

CREATE TABLE `alumnis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment_country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anything` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_birth` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_admission` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_graduation` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_date` date NOT NULL,
  `passport_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clearances`
--

CREATE TABLE `clearances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `step` int(11) NOT NULL DEFAULT '0',
  `remarks` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clearances`
--

INSERT INTO `clearances` (`id`, `userid`, `step`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 0, NULL, '1', NULL, NULL),
(2, 3, 4, NULL, '1', NULL, '2022-06-20 03:47:56'),
(3, 3, 0, NULL, NULL, '2022-06-20 03:03:32', '2022-06-20 03:03:32'),
(4, 6, 14, NULL, '1', NULL, NULL),
(5, 7, 1, NULL, '1', '2022-06-20 03:37:06', '2022-06-20 04:22:56'),
(6, 24, 0, NULL, NULL, '2022-06-21 11:38:52', '2022-06-21 11:38:52'),
(7, 27, 14, NULL, '1', '2022-07-13 08:33:55', '2022-07-13 09:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `clears`
--

CREATE TABLE `clears` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clear_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `department`, `created_at`, `updated_at`) VALUES
(1, 'Computer Science', '1', '2022-06-19 15:37:47', '2022-06-19 15:37:47'),
(2, 'Information Technology', '1', '2022-06-19 15:38:10', '2022-06-19 15:38:10');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'ICT', '2022-06-19 15:37:30', '2022-06-19 15:37:30'),
(2, 'MECHANICAL', '2022-06-19 15:37:30', '2022-06-19 15:37:30'),
(3, 'ELECTRICAL', '2022-06-19 15:37:30', '2022-06-19 15:37:30'),
(4, 'CIVIL', '2022-06-19 15:37:30', '2022-06-19 15:37:30'),
(5, 'AUTOMOTIVE', '2022-06-19 15:37:30', '2022-06-19 15:37:30'),
(6, 'GST', '2022-06-19 15:37:30', '2022-06-19 15:37:30'),
(7, 'LABORATORY', '2022-06-19 15:37:30', '2022-06-19 15:37:30'),
(8, 'RENEWABLE', '2022-06-19 15:37:30', '2022-06-19 15:37:30');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(1, '2014_10_12_000007_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_31_191608_create_certificates_table', 1),
(5, '2021_06_08_134924_create_roles_table', 1),
(6, '2021_06_22_061509_create_clearances_table', 1),
(7, '2021_06_30_220940_create_departments_table', 1),
(8, '2021_06_30_221003_create_courses_table', 1),
(9, '2021_06_30_221022_create_tokens_table', 1),
(10, '2021_07_01_063226_create_clears_table', 1),
(14, '2022_06_20_054528_create_stages_table', 2),
(15, '2022_06_13_043035_create_transcripts_table', 3),
(17, '2022_06_20_051030_create_alumnis_table', 4);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` int(2) NOT NULL DEFAULT '0',
  `role_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `number`, `dept`, `role_name`, `created_at`, `updated_at`) VALUES
(1, '1', 0, 'Student', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(2, '2', 0, 'Lecturer', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(4, '4', 0, 'Librarian', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(5, '5', 0, 'Accountant', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(6, '6', 0, 'Registrar', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(7, '7', 0, 'Admin', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(8, '8', 0, 'HOD GST', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(9, '9', 0, 'Workshop Manager', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(10, '10', 0, 'Classmaster', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(11, '11', 0, 'Sport Master', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(12, '12', 0, 'Cateress', '2022-06-20 03:06:18', '2022-06-20 03:06:18'),
(13, '13', 0, 'Waden / Matron', '2022-06-20 03:06:18', '2022-06-20 03:06:18'),
(14, '14', 0, 'Bursar', '2022-06-20 03:06:18', '2022-06-20 03:06:18'),
(15, '3', 1, 'HOD - ICT', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(16, '3', 2, 'HOD - MECHANICAL', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(17, '3', 3, 'HOD - ELECTRICAL', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(18, '3', 4, 'HOD - CIVIL', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(19, '3', 5, 'HOD - AUTOMOTIVE', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(20, '3', 7, 'HOD - LABORATORY', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(21, '3', 8, 'HOD - RENEWABLE', '2022-06-20 03:06:17', '2022-06-20 03:06:17'),
(22, '15', 0, 'Laboratory Manager', '2022-06-20 03:06:17', '2022-06-20 03:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transcripts`
--

CREATE TABLE `transcripts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_csee` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission_check` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_check` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme_check` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `award_check` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpa_check` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_check` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `printed` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transcripts`
--

INSERT INTO `transcripts` (`id`, `userid`, `name`, `admission`, `programme`, `check_csee`, `admission_check`, `date_check`, `programme_check`, `award_check`, `gpa_check`, `grade_check`, `printed`, `created_at`, `updated_at`) VALUES
(8, 6, 'Hiram Dennis', '199999999', 'Computer Science', '1', '0', '0', '1', '1', '1', '1', '1', '2022-06-27 08:04:20', '2022-06-27 08:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admission` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `clearance_step` int(11) NOT NULL DEFAULT '0',
  `certificate_step` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `admission`, `level`, `course`, `department`, `stage`, `email`, `email_verified_at`, `password`, `token`, `role`, `clearance_step`, `certificate_step`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL, NULL, NULL, '0', 'admin@email.com', NULL, '$2y$10$iFG4T/nMuNKYoabhmQizSe02ouuVKE11sJymy7Ttuz8C1wwZwKSEy', NULL, 7, 0, 0, NULL, '2022-06-19 15:35:32', '2022-06-19 15:35:32'),
(2, 'Merritt Cameron', '176', '4', '2', NULL, '0', 'user@gmail.com', NULL, '$2y$10$WeaAQGr0Oela4w1DPEf22O58Xm16Za8k1z63/rHMYT49oOGwKneZ6', NULL, 1, 0, 0, NULL, '2022-06-19 15:38:45', '2022-06-19 15:38:45'),
(3, 'user2', '12345678', '1', '1', NULL, '0', 'user2@gmail.com', NULL, '$2y$10$hEOag81x81HFG4XjXPOvX.vAjPBcO9jrlxHfPRe.Ithfl9KPpfszG', NULL, 1, 0, 0, NULL, '2022-06-20 01:58:53', '2022-06-20 01:58:53'),
(5, 'HOD', NULL, NULL, NULL, NULL, '0', 'hod@gmail.com', NULL, '$2y$10$81J1LzH29HCehTVNp5Hw7.jrBRcP20Lw/2mZIFZfyoWQG0HAKhIDi', NULL, 3, 0, 0, NULL, '2022-06-20 03:07:07', '2022-06-20 03:07:07'),
(6, 'user3', '1111111', '4', '2', NULL, '0', 'user3@gmail.com', NULL, '$2y$10$Qc7oiL5T.dQcGo5mSzp16ORglXOl0U34ycRDhDmI8lN.5EqZ94RS.', NULL, 1, 0, 0, NULL, '2022-06-20 03:08:17', '2022-06-20 03:08:17'),
(7, 'user4', '10000000', '1', '1', NULL, '0', 'user4@gmail.com', NULL, '$2y$10$Klg2pUyALW81j44rGYfLzOUdykDag.C.3lpcDIE7EjvMcKRfvgpIK', NULL, 1, 0, 0, NULL, '2022-06-20 03:33:59', '2022-06-20 03:33:59'),
(8, 'HOD GST', NULL, NULL, NULL, NULL, '0', 'hodgst@gmail.com', NULL, '$2y$10$LEJx.R4x/scFB0QFapk.UecWOpXFvt1Pc4HUjFfno9wkQx5i9mfFu', NULL, 8, 0, 0, NULL, '2022-06-20 03:43:46', '2022-06-20 03:43:46'),
(9, 'workshop', NULL, NULL, NULL, NULL, '0', 'workshop@gmail.com', NULL, '$2y$10$TyEzd6X86/X1ixoIoU7CHO2dQK8hGkmpFP8rb6KoMJ4TmGw9Sjrje', NULL, 2, 0, 0, NULL, '2022-06-20 03:45:03', '2022-06-20 03:45:03'),
(10, 'work', NULL, NULL, NULL, NULL, '0', 'work@gmail.com', NULL, '$2y$10$xHzny7IU19SvW5ZCW43ccOveOacLT5Le4Pxi1NT8R.E/pJQ.BR7e2', NULL, 9, 0, 0, NULL, '2022-06-20 03:45:49', '2022-06-20 03:45:49'),
(11, 'class', NULL, NULL, NULL, NULL, '0', 'class@gmail.com', NULL, '$2y$10$r4P0Hex7JTCG3zZsY8Dan.3Oqn99NPQ4bGBzCPHuSjEfkaVHMXiqC', NULL, 10, 0, 0, NULL, '2022-06-20 03:47:02', '2022-06-20 03:47:02'),
(12, 'library', NULL, NULL, NULL, NULL, '0', 'library@gmail.com', NULL, '$2y$10$hc3N.xHNm82qzIru5ZD76uulFXy5yx4aq2GaBqaOATCiiXhtUBz9y', NULL, 4, 0, 0, NULL, '2022-06-20 03:47:51', '2022-06-20 03:47:51'),
(13, 'sports', NULL, NULL, NULL, NULL, '0', 'sports@gmail.com', NULL, '$2y$10$/ZSo2Jrnjy8RQYNQty0OdeCmW4sAMXT2lmwq5GMYEEWUsgluVZUJu', NULL, 11, 0, 0, NULL, '2022-06-20 03:48:42', '2022-06-20 03:48:42'),
(14, 'cateress', NULL, NULL, NULL, NULL, '0', 'cateress@gmail.com', NULL, '$2y$10$mN3GxKsorwkxsuDQYGCl..hRgAqvKhD0CW/7j99/ufdMAzDGYhKIC', NULL, 12, 0, 0, NULL, '2022-06-20 03:50:06', '2022-06-20 03:50:06'),
(15, 'cateress', NULL, NULL, NULL, NULL, '0', 'cate@gmail.com', NULL, '$2y$10$6fIx/Bd0p0ZfORU3y/BXqe2mRlAy0iyVjauwkmgU4BlXuwVRCnO6a', NULL, 12, 0, 0, NULL, '2022-06-20 03:51:58', '2022-06-20 03:51:58'),
(16, 'test', NULL, NULL, NULL, NULL, '0', 'test@gmail.com', NULL, '$2y$10$4yWBtjMLx2TiEvpf3qpwhO.wjE104EfeEJXLKGeZYIwCsqHlqB4ca', NULL, 12, 0, 0, NULL, '2022-06-20 03:55:41', '2022-06-20 03:55:41'),
(17, 'Waden', NULL, NULL, NULL, NULL, '0', 'waden@gmail.com', NULL, '$2y$10$pBH7T/a1sxuOQVuMQDEWLeJpkYSjgyBYNdtBYrA9IZN9xpOeFB/Ay', NULL, 13, 0, 0, NULL, '2022-06-20 03:56:44', '2022-06-20 03:56:44'),
(18, 'registrar', NULL, NULL, NULL, NULL, '0', 'registrar@gmail.com', NULL, '$2y$10$EIOru0xxJDGQCQEOG13bhe4aUmTnyQGoKCrLo0z9isiJvOSBL1coS', NULL, 6, 0, 0, NULL, '2022-06-20 03:59:11', '2022-06-20 03:59:11'),
(19, 'bursar', NULL, NULL, NULL, NULL, '0', 'bursar@gmail.com', NULL, '$2y$10$HlnTNHvPqwSOBNUpQmDG9ODSM.PqbBpGq8pLv9wyyi2cALF0JlOnK', NULL, 2, 0, 0, NULL, '2022-06-20 04:20:08', '2022-06-20 04:20:08'),
(20, 'bursa', NULL, NULL, NULL, NULL, '0', 'bursa@gmail.com', NULL, '$2y$10$B0nihbUoNx4FolGfJksLN.c9ECAy6e42Qmh.O/G0glsD7Vspo2ZOi', NULL, 2, 0, 0, NULL, '2022-06-20 04:21:41', '2022-06-20 04:21:41'),
(21, 'tes', NULL, NULL, NULL, NULL, '0', 'test2@gmail.com', NULL, '$2y$10$ocnUWbrpI.dSR5GKNZlq5OBwnl/m6dnCj99JJYXBac7Ld8FlrRw/a', NULL, 2, 0, 0, NULL, '2022-06-20 04:22:11', '2022-06-20 04:22:11'),
(22, 'test', NULL, NULL, NULL, NULL, '0', 'test3@gmail.com', NULL, '$2y$10$KchSYq8Tv/vOJsNRvSHM9eQkCbP1NlKakYjq7qG/3pCns2T/QMR8K', NULL, 14, 0, 0, NULL, '2022-06-20 04:22:38', '2022-06-20 04:22:38'),
(23, 'user5', '11222', '1', '1', NULL, '0', 'user5@gmail.com', NULL, '$2y$10$t5Fu77lR0m9tnlm.sOXYheSk52ib/DNqsnUeFYZUXNm8Vunm6kDbm', NULL, 1, 0, 0, NULL, '2022-06-20 09:47:42', '2022-06-20 09:47:42'),
(24, 'user10', '1000000', '1', '1', NULL, '0', 'user10@gmail.com', NULL, '$2y$10$j8O5sRIpddNLspZNLXiQAelgbUjPHpw/J.F/rwXE1hq6g/rlezCVu', NULL, 1, 0, 0, NULL, '2022-06-21 11:38:38', '2022-06-21 11:38:38'),
(25, 'HOD ICT', NULL, NULL, NULL, NULL, '0', 'hodict@gmail.com', NULL, '$2y$10$tgwA259H9YMyfgAw1sEcf.tG4KVT8JwcP62Ke64327sp7SVS9GIGO', NULL, 10, 0, 0, NULL, '2022-07-13 08:10:10', '2022-07-13 08:10:10'),
(27, 'user6', '1000', '1', '1', '2', '0', 'user6@gmail.com', NULL, '$2y$10$oxlUUmAz9HrEl9Ublya3heqvOnEvZaqEXNuNiF6VhSvi4dwG50lp2', NULL, 1, 0, 0, NULL, '2022-07-13 08:33:28', '2022-07-13 08:33:28'),
(28, 'hodgst', NULL, NULL, NULL, NULL, '0', 'hodgst2@gmail.com', NULL, '$2y$10$j.SPfXQOH6njq4s4oFkZm.gnJwD.M6RmYZOgzymKXPcCsFAdSkWjq', NULL, 10, 0, 0, NULL, '2022-07-13 08:47:46', '2022-07-13 08:47:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnis`
--
ALTER TABLE `alumnis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearances`
--
ALTER TABLE `clearances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clears`
--
ALTER TABLE `clears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transcripts`
--
ALTER TABLE `transcripts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnis`
--
ALTER TABLE `alumnis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clearances`
--
ALTER TABLE `clearances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clears`
--
ALTER TABLE `clears`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transcripts`
--
ALTER TABLE `transcripts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
