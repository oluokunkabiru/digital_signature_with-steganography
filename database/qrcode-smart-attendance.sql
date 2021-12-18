-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2021 at 12:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qrcode-smart-attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `qrcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `faculty_id`, `department_id`, `course_id`, `level`, `date`, `user_id`, `qrcode`, `created_at`, `updated_at`) VALUES
(53, 8, 13, 13, '300', '2021-08-04', 1, 'FacultyFaculty::basicFaculty::medicalFaculty::science_Nursing_MaternintyFaculty::Nursing_NURFaculty::301.png', '2021-08-04 09:50:35', '2021-08-04 09:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `in_date` datetime DEFAULT NULL,
  `out_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `unit`, `code`, `level`, `faculty_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Introduction to computer sciences', '3', 'CSE 2011', '200', 3, 2, '2021-06-04 15:30:55', '2021-06-04 16:26:49'),
(3, 'Introduction to computer science', '4', 'CSE 201', '100', 3, 2, '2021-06-04 20:19:49', '2021-06-04 20:19:49'),
(4, 'Introduction to computer science and programming', '4', 'CSE 101', '100', 3, 2, '2021-06-04 20:20:31', '2021-06-04 20:20:31'),
(5, 'elementary mathematics', '5', 'MTH 101', '100', 4, 7, '2021-06-05 06:15:47', '2021-06-05 06:15:47'),
(6, 'elementary mathematics II', '4', 'MTH 102', '100', 4, 7, '2021-06-05 06:16:18', '2021-06-05 06:16:18'),
(7, 'elementary biology', '2', 'BIO 101', '100', 4, 6, '2021-06-05 06:17:14', '2021-06-05 06:17:14'),
(8, 'introduction to python programming', '4', 'cse 202', '200', 1, 8, '2021-06-17 15:28:00', '2021-06-17 15:28:00'),
(9, 'introduction to database', '3', 'cse 305', '300', 1, 8, '2021-06-17 15:28:49', '2021-06-17 15:28:49'),
(10, 'Numerical analysis', '2', 'cse 207', '200', 1, 8, '2021-06-17 15:35:22', '2021-06-17 15:35:22'),
(11, 'animal nutritionist', '2', 'aph 201', '200', 6, 11, '2021-06-21 11:07:37', '2021-06-21 11:07:37'),
(12, 'introduction databse management', '3', 'CSE 307', '300', 1, 8, '2021-06-24 21:07:02', '2021-06-24 21:07:02'),
(13, 'Materninty Nursing', '4', 'NUR 301', '300', 8, 13, '2021-06-24 21:12:15', '2021-06-24 21:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept`, `faculty_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'computer science and engineering', 3, NULL, '2021-06-03 18:53:42', '2021-06-03 18:53:42'),
(3, 'cyber secury', 1, NULL, '2021-06-04 04:08:18', '2021-06-04 04:08:18'),
(4, 'pure and applied physics', 4, NULL, '2021-06-05 06:13:09', '2021-06-05 06:13:09'),
(6, 'pure and applied biology', 4, NULL, '2021-06-05 06:13:43', '2021-06-05 06:13:43'),
(7, 'pure and applied mathematics', 4, NULL, '2021-06-05 06:15:00', '2021-06-05 06:15:00'),
(8, 'computer science', 1, NULL, '2021-06-17 15:25:16', '2021-06-17 15:25:16'),
(10, 'mechanical engineering', 1, NULL, '2021-06-17 15:26:01', '2021-06-17 15:26:01'),
(11, 'crop production and health science', 6, NULL, '2021-06-21 11:06:10', '2021-06-21 11:06:10'),
(13, 'Nursing', 8, NULL, '2021-06-24 21:05:40', '2021-06-24 21:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dean` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty`, `dean`, `created_at`, `updated_at`) VALUES
(1, 'engineering and technology', NULL, '2021-06-03 09:49:22', '2021-06-03 09:49:22'),
(3, 'Faculty of engineering', NULL, '2021-06-03 18:02:40', '2021-06-03 18:02:40'),
(4, 'pure and applied science', NULL, '2021-06-05 06:12:49', '2021-06-05 06:12:49'),
(5, 'manangement sciences', NULL, '2021-06-18 21:23:38', '2021-06-18 21:23:38'),
(6, 'agricultural science', NULL, '2021-06-21 11:05:32', '2021-06-21 11:05:32'),
(8, 'Faculty basic medical science', NULL, '2021-06-24 21:02:35', '2021-06-24 21:02:35');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_03_014632_create_faculties_table', 2),
(5, '2021_06_03_115659_create_departments_table', 3),
(6, '2021_06_04_062306_create_courses_table', 4),
(7, '2021_06_05_073559_create_attendances_table', 5),
(8, '2050_06_14_153712_create_attendees_table', 6);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matric_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `level` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `matric_no`, `role`, `gender`, `address`, `phone`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `country`, `state`, `city`, `dob`, `faculty_id`, `department_id`, `level`) VALUES
(1, 'adesina kabir oluokun', 'admin@vb.com', NULL, 'staff', NULL, NULL, NULL, NULL, NULL, '$2y$10$93T1AYwkB79MrmobLDnVXO5uU2CPjn.8A9tloaC59gEpR/MeqJWQC', NULL, '2021-06-02 08:00:22', '2021-06-02 08:00:22', '', '', '', '0000-00-00', NULL, NULL, NULL),
(4, 'Oluokun Kabiru Adesina', 'okadesina@student.smartqrcode', '210002', 'student', 'male', NULL, '9898980', NULL, NULL, '$2y$10$v8qbXp8T/lrklxDusi0bz.XAfDB5JMeylY3QD33ltHiBe56JPFmMW', NULL, '2021-06-06 16:36:43', '2021-06-21 12:29:53', 'Armenia', 'Oyo', 'Iseyin', '2021-06-08', 1, 8, 200),
(5, 'Oluokun Kabiru Adesina', 'okadesina0@student.smartqrcode', '210003', 'student', 'male', NULL, '8973453', NULL, NULL, '$2y$10$XdVd3JfgRADU5Pf3B/CL4.ffooUGtwlJpxsty/9qXJ2WroOSjc92G', NULL, '2021-06-06 16:41:24', '2021-06-09 23:57:00', 'Algeria', 'Ogun', 'Oyo', '2021-06-01', 4, 7, 200),
(10, 'vboy village kabiru', 'vvkabiru@staff.smartqrcode', NULL, 'staff', 'male', NULL, '8932749246', NULL, NULL, '$2y$10$Nlgfq7nWueDd5Rv1qd1PSuHoZygpmKdPvPyfSi6yrVJpwYN0z2Tn2', NULL, '2021-06-19 08:53:58', '2021-06-19 08:53:58', 'Azerbaijan', 'onde', 'iseyin', '2021-06-19', 4, 7, 400),
(11, 'Olatayo Lateef Damilola', 'oldamilola@student.smartqrcode', '210004', 'student', 'male', NULL, '78098079', NULL, NULL, '$2y$10$nxp4aaLbmzerRQQx4MK0depqT9fOPlETlsvXF6lD4HVjDmm9Cu8Gy', NULL, '2021-06-21 10:08:53', '2021-06-21 10:08:53', 'Nigeria', 'oyo', 'oyo', '2002-02-05', 1, 8, 200),
(12, 'musbau jamiu dare', 'mjdare@student.smartqrcode', '210005', 'student', 'male', NULL, '08104307011', NULL, NULL, '$2y$10$mm/2hK3CvolXOARcciqWEePPgc10VtmnQALnZd.YuItz2oMeaHvp6', NULL, '2021-06-21 11:22:22', '2021-06-21 11:22:22', 'Nigeria', 'osun', 'ogbomosho', '1998-06-06', 6, 11, 200),
(13, 'Yusuff Abiola Abiodun', 'yaabiodun@staff.smartqrcode', NULL, 'staff', 'male', NULL, '08162495580', NULL, NULL, '$2y$10$ur6umE38foD/O0EtG5Q/TOF6F9CkyrAzca3uKHRjMeoEbvkhPA2Sa', NULL, '2021-06-21 11:31:07', '2021-06-21 11:31:07', 'Nambia', 'nambia city', 'ogbomosho', '2020-05-20', 6, 11, 200),
(14, 'wakil aminat funmilayo', 'wafunmilayo@student.smartqrcode', '210006', 'student', 'female', NULL, '08068954995', NULL, NULL, '$2y$10$cATW2YSqK09Ycz1v3Lzj0OeDL96c5wYTKdnW2OZl.toVBe4qpUV7m', NULL, '2021-06-21 11:39:05', '2021-06-21 11:39:05', 'Nigeria', 'osun', 'ife', '1999-09-09', 6, 11, 200),
(15, 'liadi kafayat olabisi', 'lkolabisi@student.smartqrcode', '210007', 'student', 'female', NULL, '8934758937', NULL, NULL, '$2y$10$NfnkFb6SabzQhjsnMW7c8uiAtQA9SgLqWyWPshnzwPB7ETInlPxDa', NULL, '2021-06-24 21:09:44', '2021-06-24 21:09:44', 'Nigeria', 'Oyo', 'Iseyin', '2002-05-08', 8, 13, 300),
(16, 'village boy adesina', 'vb@kb,vb', NULL, 'admin', NULL, NULL, NULL, NULL, NULL, 'village boy adesina', NULL, NULL, NULL, '', '', '', '0000-00-00', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_faculty_id_foreign` (`faculty_id`),
  ADD KEY `attendances_department_id_foreign` (`department_id`),
  ADD KEY `attendances_course_id_foreign` (`course_id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`);

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendees_user_id_foreign` (`user_id`),
  ADD KEY `attendees_attendance_id_foreign` (`attendance_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_faculty_id_foreign` (`faculty_id`),
  ADD KEY `courses_department_id_foreign` (`department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_faculty_id_foreign` (`faculty_id`),
  ADD KEY `departments_user_id_foreign` (`user_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_avatar_unique` (`avatar`),
  ADD UNIQUE KEY `users_matric_no_unique` (`matric_no`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `department_id` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `attendances_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `attendances_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`),
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `attendees_attendance_id_foreign` FOREIGN KEY (`attendance_id`) REFERENCES `attendances` (`id`),
  ADD CONSTRAINT `attendees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `courses_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`),
  ADD CONSTRAINT `departments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
