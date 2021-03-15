-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 01:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dhaka` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `divisional_town` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `grade_id`, `designation_id`, `dhaka`, `divisional_town`, `other_area`, `created_at`, `updated_at`) VALUES
(3, '[\"2\"]', '[\"2\"]', '2000', '1500', '1000', '2021-02-14 04:03:42', '2021-02-14 04:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `department_id`, `employee_id`, `item`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '4', '[\"laptop core i3 7th gen\",\"2 Rim paper sheet\",\"5 pcs pen\",\"Water Bottle\",\"cell phone\"]', 'approved', '2021-01-21 03:50:09', '2021-02-15 21:51:03'),
(2, '1', '5', '[\"laptop charger\",\"extra keyboard\"]', 'pending', '2021-01-21 04:11:18', '2021-01-21 04:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dates` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `employee_id`, `month`, `year`, `dates`, `time`, `created_at`, `updated_at`) VALUES
(3, '5', '02', '2021', '[\"1\",\"1\",\"0\",\"1\",\"1\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"]', '[\"09:00\",\"11:35\",null,\"09:35\",\"17:08\",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null]', '2021-02-13 04:36:00', '2021-02-13 05:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `branch`, `account`, `balance`, `created_at`, `updated_at`) VALUES
(1, 'City Bank', 'Gulshan', 'Ac-01256854', 0, '2021-01-20 06:14:54', '2021-01-20 06:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `claim` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'Marketing', '2021-01-20 06:06:05', '2021-01-20 06:06:05'),
(2, 'IT', '2021-02-02 04:39:36', '2021-02-15 21:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `department_id`, `designation`, `created_at`, `updated_at`) VALUES
(1, '2', 'Jr. Software Engineer', '2021-02-02 04:41:27', '2021-02-02 04:41:27'),
(2, '1', 'Sr. Executive', '2021-02-02 04:41:51', '2021-02-15 21:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `employeemovementregisters`
--

CREATE TABLE `employeemovementregisters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exit_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tour_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients_information` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_manager` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entry_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employeemovementregisters`
--

INSERT INTO `employeemovementregisters` (`id`, `date`, `employee_name`, `designation`, `exit_time`, `tour_area`, `clients_information`, `project_manager`, `entry_time`, `created_at`, `updated_at`) VALUES
(1, '2021-01-24', 'Mehedy Hassan', 'Jr. Software Engineer', '12:00', 'Bongshal', 'Habib Traders', 'Rijwan Chowdhuri', '14:00', '2021-01-23 23:56:24', '2021-01-23 23:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_curricullar_activity` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `photo`, `address`, `contact`, `email`, `department_id`, `designation_id`, `joining_date`, `salary`, `grade`, `bank_account`, `extra_curricullar_activity`, `created_at`, `updated_at`) VALUES
(4, 'Mehedy Hassan', '1432567872.png', 'Bashundhara Dhaka Bangladesh', '01825895727', 'mehedy@gmail.com', '2', '1', '2021-01-01', 15000, '3', 'Ac-0123456789', '[\"Programming\",\"Debugging\",\"Q\\/A Testing\"]', '2021-02-13 21:43:05', '2021-02-13 21:43:28'),
(5, 'Saudur Rahman', '1052977519.jpg', 'Mohammad pur, dhaka, Bangladesh', '+880125689574', 'Saud@mail.com', '1', '2', '2021-01-01', 15000, '3', 'sc-235647885', NULL, '2021-02-13 22:01:54', '2021-02-13 22:01:54');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_deduction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `late_attendance_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`, `designation_id`, `leave_deduction`, `office_time`, `late_attendance_fee`, `created_at`, `updated_at`) VALUES
(3, 'E-1', '[\"2\",\"1\"]', '200', '09:00', '200', '2021-02-14 04:22:15', '2021-02-14 04:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_room` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ending_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hrbudgets`
--

CREATE TABLE `hrbudgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hrbudgets`
--

INSERT INTO `hrbudgets` (`id`, `date`, `item`, `amount`, `total`, `created_at`, `updated_at`) VALUES
(2, '2021-02-01', '[\"laptop charger\",\"Laptop\"]', '[\"5000\",\"55000\"]', '60000', '2021-02-01 04:51:42', '2021-02-01 04:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `hrpolicies`
--

CREATE TABLE `hrpolicies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr_budget_assigns`
--

CREATE TABLE `hr_budget_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget_remains` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hr_budget_assigns`
--

INSERT INTO `hr_budget_assigns` (`id`, `date_from`, `date_to`, `budget`, `budget_remains`, `created_at`, `updated_at`) VALUES
(1, '2021-01-01', '2021-12-31', '440000', '500000', '2021-01-30 23:35:04', '2021-02-01 04:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `kpis`
--

CREATE TABLE `kpis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kpis`
--

INSERT INTO `kpis` (`id`, `department_id`, `designation_id`, `amount`, `created_at`, `updated_at`) VALUES
(2, '2', '1', '10000', '2021-02-02 05:16:43', '2021-02-02 05:16:43'),
(3, '1', '2', '5000', '2021-02-14 03:58:06', '2021-02-14 03:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_days` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_days_approved` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_days_taken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `department_id`, `employee_id`, `date_from`, `date_to`, `number_of_days`, `no_of_days_approved`, `no_of_days_taken`, `reason`, `approved`, `created_at`, `updated_at`) VALUES
(2, '1', '5', '2021-02-20', '2021-02-24', '4', '3', '6', 'Sick leave', 'Approved', '2021-02-13 21:50:19', '2021-02-13 22:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_period_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repaid_p_m` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_paid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maturity_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `employee_id`, `loan_period_id`, `loan_amount`, `interest`, `net_amount`, `repaid_p_m`, `total_paid`, `due_amount`, `create_date`, `maturity_date`, `created_at`, `updated_at`) VALUES
(2, '5', '2', '50000', '20', '60000', '5000', '10000', '50000', '2021-02-14', '2022-02-14', '2021-02-14 01:48:38', '2021-02-15 03:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `loan_periods`
--

CREATE TABLE `loan_periods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_period` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repaid_p_m` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_periods`
--

INSERT INTO `loan_periods` (`id`, `loan_period`, `loan_amount`, `interest`, `repaid_p_m`, `created_at`, `updated_at`) VALUES
(2, '12 Month', '50000', '20', '5000', '2021-02-14 00:31:22', '2021-02-14 00:34:58');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(5, '2020_10_04_074640_add_columns_user_table', 3),
(7, '2021_01_20_105719_create_pdfbanks_table', 4),
(8, '2021_01_20_115025_create_departments_table', 5),
(9, '2021_01_20_121248_create_banks_table', 6),
(10, '2021_01_20_122433_create_employees_table', 7),
(11, '2021_01_21_041612_create_attendances_table', 8),
(12, '2021_01_21_062143_create_leaves_table', 9),
(13, '2021_01_21_075432_create_assets_table', 10),
(14, '2021_01_21_112825_create_resigns_table', 11),
(15, '2021_01_21_120332_create_hrbudgets_table', 12),
(16, '2021_01_24_052943_create_employeemovementregisters_table', 13),
(17, '2021_01_26_080729_create_payrolls_table', 14),
(18, '2021_01_31_051218_create_hr_budget_assigns_table', 15),
(19, '2021_02_02_102010_create_kpis_table', 16),
(20, '2021_02_02_102321_create_designations_table', 17),
(21, '2021_02_13_063634_create_grades_table', 18),
(22, '2021_02_13_074755_create_accommodations_table', 19),
(23, '2021_02_13_093225_create_tas_table', 20),
(24, '2021_02_14_055700_create_loans_table', 21),
(25, '2021_02_14_060305_create_loan_periods_table', 21),
(26, '2021_02_14_093046_create_claims_table', 22),
(27, '2021_02_16_041917_create_guests_table', 23),
(28, '2021_02_16_092206_create_reclaims_table', 24),
(29, '2021_02_22_041637_create_tasks_table', 25),
(30, '2021_02_22_051234_create_hrpolicies_table', 26);

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
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kpi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_leaves` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_deduction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `late_attendance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `late_attendance_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performance_bonus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apprisal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `travel_allowance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_allowance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch_allowance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `date`, `month`, `department_id`, `employee_id`, `salary`, `kpi`, `number_of_leaves`, `leave_deduction`, `late_attendance`, `late_attendance_fee`, `performance_bonus`, `apprisal`, `travel_allowance`, `medical_allowance`, `lunch_allowance`, `bonus`, `net_amount`, `created_at`, `updated_at`) VALUES
(8, '2021-02-15', '2021-02', '1', '5', '15000', '5000', '4', '200', '3', '200', NULL, NULL, NULL, NULL, NULL, NULL, '18600', '2021-02-15 03:33:30', '2021-02-15 03:33:30'),
(9, '2021-02-15', '2021-01', '1', '5', '15000', '5000', '0', '200', NULL, '200', NULL, NULL, NULL, NULL, NULL, NULL, '20000', '2021-02-15 03:39:19', '2021-02-15 03:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `pdfbanks`
--

CREATE TABLE `pdfbanks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pdfbanks`
--

INSERT INTO `pdfbanks` (`id`, `file_name`, `created_at`, `updated_at`) VALUES
(1, '0256856.pdf', '2021-01-28 05:50:27', '2021-01-28 05:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `reclaims`
--

CREATE TABLE `reclaims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `claim_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reclaim` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resigns`
--

CREATE TABLE `resigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termination_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resigns`
--

INSERT INTO `resigns` (`id`, `department_id`, `employee_id`, `application`, `termination_date`, `status`, `created_at`, `updated_at`) VALUES
(2, '1', '5', '612815344.pdf', '2021-04-01', 'pending', '2021-01-21 05:42:57', '2021-01-21 05:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `tas`
--

CREATE TABLE `tas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_of_transport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `da` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tas`
--

INSERT INTO `tas` (`id`, `grade_id`, `designation_id`, `mode_of_transport`, `ta`, `da`, `total`, `created_at`, `updated_at`) VALUES
(2, '[\"2\"]', '[\"2\"]', '[\"Taxi\",\" CNG\",\" BUS\"]', '500', '400', NULL, '2021-02-13 22:40:36', '2021-02-13 22:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `phone`, `nid`, `designation`, `salary`, `grade`, `joining_date`, `address`, `description`, `document`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rijwan chowdhury', '15640848.png', 'rijwanc007@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$WM8N7ZdWIYGh/DAOF2wo.OUM3LclIzu0.1mOqm/j86UShMeP19Cde', NULL, '2020-10-03 00:42:25', '2020-10-03 00:42:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeemovementregisters`
--
ALTER TABLE `employeemovementregisters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrbudgets`
--
ALTER TABLE `hrbudgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrpolicies`
--
ALTER TABLE `hrpolicies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_budget_assigns`
--
ALTER TABLE `hr_budget_assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpis`
--
ALTER TABLE `kpis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_periods`
--
ALTER TABLE `loan_periods`
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
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdfbanks`
--
ALTER TABLE `pdfbanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reclaims`
--
ALTER TABLE `reclaims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resigns`
--
ALTER TABLE `resigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tas`
--
ALTER TABLE `tas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employeemovementregisters`
--
ALTER TABLE `employeemovementregisters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hrbudgets`
--
ALTER TABLE `hrbudgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hrpolicies`
--
ALTER TABLE `hrpolicies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hr_budget_assigns`
--
ALTER TABLE `hr_budget_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kpis`
--
ALTER TABLE `kpis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_periods`
--
ALTER TABLE `loan_periods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pdfbanks`
--
ALTER TABLE `pdfbanks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reclaims`
--
ALTER TABLE `reclaims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resigns`
--
ALTER TABLE `resigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tas`
--
ALTER TABLE `tas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
