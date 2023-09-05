-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2023 at 12:22 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` bigint(20) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` double(8,2) DEFAULT NULL,
  `tindakan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `stok`, `tindakan_id`, `created_at`, `updated_at`) VALUES
(1, 'jarum suntik', 97.00, 1, '2023-09-05 14:11:06', '2023-09-05 15:18:29'),
(2, 'master', 196.00, 1, '2023-09-05 14:57:16', '2023-09-05 15:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `master_tindakan`
--

CREATE TABLE `master_tindakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelompok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_master` int(11) DEFAULT NULL,
  `stok` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_tindakan`
--

INSERT INTO `master_tindakan` (`id`, `name`, `kelompok`, `id_master`, `stok`, `created_at`, `updated_at`) VALUES
(1, 'Paket Hematologi', NULL, NULL, 90.00, '2023-09-05 14:09:31', '2023-09-05 14:40:26'),
(2, 'WBC', NULL, 1, 1.00, '2023-09-05 14:09:42', '2023-09-05 14:09:42'),
(3, 'WBC', NULL, 1, 1.00, '2023-09-05 14:09:51', '2023-09-05 14:09:51');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_19_095841_create_profilesistem_table', 1),
(6, '2023_08_24_112818_create_patient_table', 1),
(7, '2023_08_24_112839_create_doctor_table', 1),
(8, '2023_08_24_113004_create_test_table', 1),
(9, '2023_08_24_113049_create_orders_table', 1),
(10, '2023_08_24_113106_create_results_table', 1),
(11, '2023_08_31_125955_creata_table_master_tindakan', 1),
(12, '2023_09_05_203240_create_inventory_table', 1),
(13, '2023_09_05_203951_create_mutasi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `mutasi` double(8,2) DEFAULT NULL,
  `patien_id` bigint(20) UNSIGNED NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id`, `tanggal`, `mutasi`, `patien_id`, `inventory_id`, `created_at`, `updated_at`) VALUES
(1, '2023-09-05 22:18:29', 1.00, 1, 1, '2023-09-05 15:18:29', '2023-09-05 15:18:29'),
(2, '2023-09-05 22:18:29', 1.00, 1, 2, '2023-09-05 15:18:29', '2023-09-05 15:18:29'),
(3, '2023-09-05 22:20:35', 1.00, 1, 2, '2023-09-05 15:20:35', '2023-09-05 15:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_data`
--

CREATE TABLE `order_data` (
  `ID` int(11) NOT NULL,
  `KODETRANSAKSI` varchar(128) DEFAULT NULL,
  `TIMESTAMP` timestamp NULL DEFAULT current_timestamp(),
  `DATE_TIME_STAMP` timestamp NULL DEFAULT current_timestamp(),
  `DEVICE_ID1` varchar(128) DEFAULT NULL,
  `PATIENT_ID_OPT` varchar(32) DEFAULT NULL,
  `PATIENT_NAME` varchar(128) DEFAULT NULL,
  `PATIENT_NAME_LAST` varchar(128) DEFAULT NULL,
  `PATIENT_NAME_FIRST` varchar(128) DEFAULT NULL,
  `PATIENT_BIRTHDATE` varchar(128) DEFAULT NULL,
  `PATIENT_SEX` varchar(12) DEFAULT NULL,
  `RESULT_SEQ_NUM` varchar(12) DEFAULT NULL,
  `RESULT_TEST_ID` varchar(32) DEFAULT NULL,
  `RESULT_VALUE` varchar(32) DEFAULT NULL,
  `RESULT_UNIT` varchar(32) DEFAULT NULL,
  `RESULT_ABNORMAL_FLAG` varchar(32) DEFAULT NULL,
  `RESULT_STATUS` varchar(32) DEFAULT NULL,
  `RESULT_DATE` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_data`
--

INSERT INTO `order_data` (`ID`, `KODETRANSAKSI`, `TIMESTAMP`, `DATE_TIME_STAMP`, `DEVICE_ID1`, `PATIENT_ID_OPT`, `PATIENT_NAME`, `PATIENT_NAME_LAST`, `PATIENT_NAME_FIRST`, `PATIENT_BIRTHDATE`, `PATIENT_SEX`, `RESULT_SEQ_NUM`, `RESULT_TEST_ID`, `RESULT_VALUE`, `RESULT_UNIT`, `RESULT_ABNORMAL_FLAG`, `RESULT_STATUS`, `RESULT_DATE`) VALUES
(1, 'LAB20230905001', '2023-09-05 22:18:29', '2023-09-05 22:18:29', NULL, '015954', 'FERLANUS', NULL, NULL, NULL, NULL, NULL, 'WBC', '6,8', NULL, NULL, NULL, '2023-09-05 22:18:29'),
(2, 'LAB20230905002', '2023-09-05 22:18:29', '2023-09-05 22:18:29', NULL, '015954', 'FERLANUS', NULL, NULL, NULL, NULL, NULL, 'WBC', '5,5', NULL, NULL, NULL, '2023-09-05 22:18:29'),
(3, 'LAB20230905003', '2023-09-05 22:18:29', '2023-09-05 22:18:29', NULL, '015954', 'FERLANUS', NULL, NULL, NULL, NULL, NULL, 'WBC', '3,6', NULL, NULL, NULL, '2023-09-05 22:18:29'),
(4, 'LAB20230905004', '2023-09-05 22:18:29', '2023-09-05 22:18:29', NULL, '015954', 'FERLANUS', NULL, NULL, NULL, NULL, NULL, 'WBC', '3,2', NULL, NULL, NULL, '2023-09-05 22:18:29'),
(5, 'LAB20230905005', '2023-09-05 22:20:35', '2023-09-05 22:20:35', NULL, '015954', 'FERLANUS', NULL, NULL, NULL, NULL, NULL, 'WBC', '6,8', NULL, NULL, NULL, '2023-09-05 22:20:35'),
(6, 'LAB20230905006', '2023-09-05 22:20:35', '2023-09-05 22:20:35', NULL, '015954', 'FERLANUS', NULL, NULL, NULL, NULL, NULL, 'WBC', '5,8', NULL, NULL, NULL, '2023-09-05 22:20:35'),
(7, 'LAB20230905007', '2023-09-05 22:20:35', '2023-09-05 22:20:35', NULL, '015954', 'FERLANUS', NULL, NULL, NULL, NULL, NULL, 'WBC', '3,7', NULL, NULL, NULL, '2023-09-05 22:20:35'),
(8, 'LAB20230905008', '2023-09-05 22:20:35', '2023-09-05 22:20:35', NULL, '015954', 'FERLANUS', NULL, NULL, NULL, NULL, NULL, 'WBC', '5,7', NULL, NULL, NULL, '2023-09-05 22:20:35'),
(9, 'LAB20230905009', '2023-09-05 22:20:35', '2023-09-05 22:20:35', NULL, '015954', 'FERLANUS', NULL, NULL, NULL, NULL, NULL, 'WBC', '2,4', NULL, NULL, NULL, '2023-09-05 22:20:35');

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
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medical_record` int(11) DEFAULT NULL,
  `nik` bigint(20) DEFAULT NULL,
  `no_rm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `medical_record`, `nik`, `no_rm`, `address`, `sex`, `created_at`, `updated_at`) VALUES
(1, 'FERLANUS', NULL, NULL, '015954', 'jl sulawasi 2944 Jawa Timur', 'Laki-Laki', '2023-09-05 14:44:37', '2023-09-05 14:44:37');

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
-- Table structure for table `profilesistem`
--

CREATE TABLE `profilesistem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telpon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profilesistem`
--

INSERT INTO `profilesistem` (`id`, `title`, `diskripsi`, `address`, `telpon`, `zipcode`, `email`, `social1`, `social2`, `social3`, `social4`, `logo`, `favicon`, `kota`, `created_at`, `updated_at`) VALUES
(1, 'Sistem Lis', 'by Hasanarofid', 'dukuh pakis,surabaya', '0813242424', 3055, 'hasanarofid@gmail.com', 'facebok.com/hasanarofid', 'instagram.com/hasanarofid', 'theards.com/hasanarofid', 'twitter.com/hasanarofid', 'logo teknisi.jpeg', 'logo teknisi.jpeg', 'Surabaya', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `normal_range` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_data`
--

CREATE TABLE `test_data` (
  `ID` int(11) NOT NULL,
  `TIMESTAMP` timestamp NULL DEFAULT current_timestamp(),
  `DATE_TIME_STAMP` timestamp NULL DEFAULT current_timestamp(),
  `DEVICE_ID1` varchar(128) DEFAULT NULL,
  `PATIENT_ID_OPT` varchar(32) DEFAULT NULL,
  `PATIENT_NAME` varchar(128) DEFAULT NULL,
  `PATIENT_NAME_LAST` varchar(128) DEFAULT NULL,
  `PATIENT_NAME_FIRST` varchar(128) DEFAULT NULL,
  `PATIENT_BIRTHDATE` varchar(128) DEFAULT NULL,
  `PATIENT_SEX` varchar(12) DEFAULT NULL,
  `RESULT_SEQ_NUM` varchar(12) DEFAULT NULL,
  `RESULT_TEST_ID` varchar(32) DEFAULT NULL,
  `RESULT_VALUE` varchar(32) DEFAULT NULL,
  `RESULT_UNIT` varchar(32) DEFAULT NULL,
  `RESULT_ABNORMAL_FLAG` varchar(32) DEFAULT NULL,
  `RESULT_STATUS` varchar(32) DEFAULT NULL,
  `RESULT_DATE` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_data`
--

INSERT INTO `test_data` (`ID`, `TIMESTAMP`, `DATE_TIME_STAMP`, `DEVICE_ID1`, `PATIENT_ID_OPT`, `PATIENT_NAME`, `PATIENT_NAME_LAST`, `PATIENT_NAME_FIRST`, `PATIENT_BIRTHDATE`, `PATIENT_SEX`, `RESULT_SEQ_NUM`, `RESULT_TEST_ID`, `RESULT_VALUE`, `RESULT_UNIT`, `RESULT_ABNORMAL_FLAG`, `RESULT_STATUS`, `RESULT_DATE`) VALUES
(278, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '1', 'WBC', '7,58', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(279, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '2', 'RBC', '5,04', '10*6/uL', 'N', 'N', '16/08/2023 18:01:59'),
(280, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '3', 'HGB', '13,3', 'g/dL', 'N', 'N', '16/08/2023 18:01:59'),
(281, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '4', 'HCT', '39,6', '%', 'L', 'N', '16/08/2023 18:01:59'),
(282, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '5', 'MCV', '78,6', 'fL', 'L', 'N', '16/08/2023 18:01:59'),
(283, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '6', 'MCH', '26,4', 'pg', 'N', 'N', '16/08/2023 18:01:59'),
(284, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '7', 'MCHC', '33,6', 'g/dL', 'N', 'N', '16/08/2023 18:01:59'),
(285, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '1', 'WBC', '2,16', '10*3/uL', 'L', 'N', '16/08/2023 16:56:37'),
(286, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '8', 'PLT', '207', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(287, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '2', 'RBC', '4,78', '10*6/uL', 'N', 'N', '16/08/2023 16:56:37'),
(288, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '9', 'NEUT%', '72,3', '%', 'N', 'N', '16/08/2023 18:01:59'),
(289, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '3', 'HGB', '12,1', 'g/dL', 'N', 'N', '16/08/2023 16:56:37'),
(290, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '10', 'LYMPH%', '9,4', '%', 'L', 'N', '16/08/2023 18:01:59'),
(291, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '4', 'HCT', '35,5', '%', 'N', 'N', '16/08/2023 16:56:37'),
(292, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '11', 'MONO%', '16', '%', 'H', 'N', '16/08/2023 18:01:59'),
(293, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '5', 'MCV', '74,3', 'fL', 'L', 'N', '16/08/2023 16:56:37'),
(294, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '12', 'EO%', '1,2', '%', 'N', 'N', '16/08/2023 18:01:59'),
(295, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '6', 'MCH', '25,3', 'pg', 'L', 'N', '16/08/2023 16:56:37'),
(296, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '13', 'BASO%', '1,1', '%', 'H', 'N', '16/08/2023 18:01:59'),
(297, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '7', 'MCHC', '34,1', 'g/dL', 'N', 'N', '16/08/2023 16:56:37'),
(298, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '14', 'NEUT#', '5,49', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(299, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '8', 'PLT', '27', '10*3/uL', 'L', 'N', '16/08/2023 16:56:37'),
(300, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '15', 'LYMPH#', '0,71', '10*3/uL', 'L', 'N', '16/08/2023 18:01:59'),
(301, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '9', 'RDW-SD', '37,2', 'fL', 'N', 'N', '16/08/2023 16:56:37'),
(302, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '16', 'MONO#', '1,21', '10*3/uL', 'H', 'N', '16/08/2023 18:01:59'),
(303, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '10', 'RDW-CV', '13,6', '%', 'N', 'N', '16/08/2023 16:56:37'),
(304, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '17', 'EO#', '0,09', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(305, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '11', 'MICROR', '11,4', '%', 'N', 'N', '16/08/2023 16:56:37'),
(306, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '18', 'BASO#', '0,08', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(307, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '12', 'MACROR', '3,8', '%', 'N', 'N', '16/08/2023 16:56:37'),
(308, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '19', 'IG%', '0,3', '%', 'N', 'N', '16/08/2023 18:01:59'),
(309, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '13', 'PDW', '15,5', 'fL', 'N', 'N', '16/08/2023 16:56:37'),
(310, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '20', 'IG#', '0,02', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(311, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '14', 'MPV', '10,8', 'fL', 'N', 'N', '16/08/2023 16:56:37'),
(312, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '21', 'RDW-SD', '37,6', 'fL', 'N', 'N', '16/08/2023 18:01:59'),
(313, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '15', 'P-LCR', '33,1', '%', 'N', 'N', '16/08/2023 16:56:37'),
(314, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '22', 'RDW-CV', '13,1', '%', 'N', 'N', '16/08/2023 18:01:59'),
(315, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '16', 'PCT', '0,03', '%', 'L', 'N', '16/08/2023 16:56:37'),
(316, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '23', 'MICROR', '6', '%', 'N', 'N', '16/08/2023 18:01:59'),
(317, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '17', 'Leukocytopenia', NULL, '', 'A', 'N', '16/08/2023 16:56:37'),
(318, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '24', 'MACROR', '4,3', '%', 'N', 'N', '16/08/2023 18:01:59'),
(319, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '18', 'Thrombocytopenia', NULL, '', 'A', 'N', '16/08/2023 16:56:37'),
(320, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '25', 'PDW', '17', 'fL', 'N', 'N', '16/08/2023 18:01:59'),
(321, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '19', 'RBC_Agglutination?', '60', '', NULL, 'N', '16/08/2023 16:56:37'),
(322, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '26', 'MPV', '12,7', 'fL', 'N', 'N', '16/08/2023 18:01:59'),
(323, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '20', 'Turbidity/HGB_Interference?', '90', '', NULL, 'N', '16/08/2023 16:56:37'),
(324, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '27', 'P-LCR', '44,3', '%', 'H', 'N', '16/08/2023 18:01:59'),
(325, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '21', 'Iron_Deficiency?', '90', '', NULL, 'N', '16/08/2023 16:56:37'),
(326, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '28', 'PCT', '0,26', '%', 'N', 'N', '16/08/2023 18:01:59'),
(327, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '22', 'HGB_Defect?', '100', '', 'A', 'N', '16/08/2023 16:56:37'),
(328, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '29', 'Lymphopenia', NULL, '', 'A', 'N', '16/08/2023 18:01:59'),
(329, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '23', 'Fragments?', '0', '', NULL, 'N', '16/08/2023 16:56:37'),
(330, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '30', 'Monocytosis', NULL, '', 'A', 'N', '16/08/2023 18:01:59'),
(331, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '24', 'PLT_Clumps?', '0', '', NULL, 'N', '16/08/2023 16:56:37'),
(332, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '31', 'Blasts/Abn_Lympho?', '80', '', NULL, 'N', '16/08/2023 18:01:59'),
(333, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '25', 'Positive_Morph', NULL, '', 'A', 'N', '16/08/2023 16:56:37'),
(334, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '32', 'Left_Shift?', '0', '', NULL, 'N', '16/08/2023 18:01:59'),
(335, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '26', 'Positive_Count', NULL, '', 'A', 'N', '16/08/2023 16:56:37'),
(336, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '33', 'Atypical_Lympho?', '10', '', NULL, 'N', '16/08/2023 18:01:59'),
(337, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '27', 'SCAT_WDF-CBC', NULL, '', 'N', 'N', '16/08/2023 16:56:37'),
(338, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '34', 'NRBC?', '0', '', NULL, 'N', '16/08/2023 18:01:59'),
(339, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '28', 'SCAT_WDF-CBC(FSCW-FSC)', NULL, '', 'N', 'N', '16/08/2023 16:56:37'),
(340, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '35', 'RBC_Agglutination?', '60', '', NULL, 'N', '16/08/2023 18:01:59'),
(341, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '29', 'DIST_RBC', NULL, '', 'N', 'N', '16/08/2023 16:56:37'),
(342, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '36', 'Turbidity/HGB_Interference?', '90', '', NULL, 'N', '16/08/2023 18:01:59'),
(343, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '30', 'DIST_PLT', NULL, '', 'N', 'N', '16/08/2023 16:56:37'),
(344, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '37', 'Iron_Deficiency?', '80', '', NULL, 'N', '16/08/2023 18:01:59'),
(345, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '31', 'DIST_RBC(NORMAL)', NULL, '', 'N', 'N', '16/08/2023 16:56:37'),
(346, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '38', 'HGB_Defect?', '90', '', NULL, 'N', '16/08/2023 18:01:59'),
(347, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '32', 'DIST_PLT(NORMAL)', NULL, '', 'N', 'N', '16/08/2023 16:56:37'),
(348, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '39', 'Fragments?', '0', '', NULL, 'N', '16/08/2023 18:01:59'),
(349, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '33', 'WBC-C', '2,16', '10*3/uL', 'N', 'N', '16/08/2023 16:56:37'),
(350, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '40', 'PLT_Clumps?', '0', '', NULL, 'N', '16/08/2023 18:01:59'),
(351, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '34', 'RDW-SD_RESEARCH', '37,2', 'fL', 'N', 'N', '16/08/2023 16:56:37'),
(352, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '41', 'Positive_Diff', NULL, '', 'A', 'N', '16/08/2023 18:01:59'),
(353, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '35', 'RDW-CV_RESEARCH', '13,6', '%', 'N', 'N', '16/08/2023 16:56:37'),
(354, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '42', 'SCAT_WDF', NULL, '', 'N', 'N', '16/08/2023 18:01:59'),
(355, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '36', 'PLT-I', '27', '10*3/uL', 'N', 'N', '16/08/2023 16:56:37'),
(356, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '43', 'SCAT_WDF-CBC', NULL, '', 'N', 'N', '16/08/2023 18:01:59'),
(357, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '37', 'TNC-C', '2,16', '10*3/uL', 'N', 'N', '16/08/2023 16:56:37'),
(358, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '44', 'SCAT_WDF(SSC-FSC)', NULL, '', 'N', 'N', '16/08/2023 18:01:59'),
(359, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '38', 'TNC', '2,16', '10*3/uL', 'N', 'N', '16/08/2023 16:56:37'),
(360, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '45', 'SCAT_WDF(FSC-SFL)', NULL, '', 'N', 'N', '16/08/2023 18:01:59'),
(361, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '39', 'PDW_RESEARCH', '15,5', 'fL', 'N', 'N', '16/08/2023 16:56:37'),
(362, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '46', 'SCAT_WDF(FSCW-FSC)', NULL, '', 'N', 'N', '16/08/2023 18:01:59'),
(363, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '40', 'P-LCR_RESEARCH', '33,1', '%', 'N', 'N', '16/08/2023 16:56:37'),
(364, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '47', 'SCAT_WDF-CBC(FSCW-FSC)', NULL, '', 'N', 'N', '16/08/2023 18:01:59'),
(365, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '41', 'PCT_RESEARCH', '0,03', '%', 'L', 'N', '16/08/2023 16:56:37'),
(366, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '48', 'DIST_RBC', NULL, '', 'N', 'N', '16/08/2023 18:01:59'),
(367, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '42', 'HGB-BLANK', '6088', '', 'N', 'N', '16/08/2023 16:56:37'),
(368, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '49', 'DIST_PLT', NULL, '', 'N', 'N', '16/08/2023 18:01:59'),
(369, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '50', 'DIST_RBC(NORMAL)', NULL, '', 'N', 'N', '16/08/2023 18:01:59'),
(370, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '43', 'HGB-SAMPLE', '7301', '', 'N', 'N', '16/08/2023 16:56:37'),
(371, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '51', 'DIST_PLT(NORMAL)', NULL, '', 'N', 'N', '16/08/2023 18:01:59'),
(372, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '44', 'R-MFV', '75,3', 'fL', 'N', 'N', '16/08/2023 16:56:37'),
(373, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '52', 'WBC-C', '7,64', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(374, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '45', 'S-RBC', '0', '10*6/uL', 'N', 'N', '16/08/2023 16:56:37'),
(375, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '53', 'WBC-D', '7,58', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(376, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '46', 'S-MCV', '0', 'fL', 'N', 'N', '16/08/2023 16:56:37'),
(377, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '54', 'NEUT#&E&', '5,47', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(378, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '47', 'L-RBC', '0', '10*6/uL', 'N', 'N', '16/08/2023 16:56:37'),
(379, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '55', 'NEUT%&E&', '72', '%', 'N', 'N', '16/08/2023 18:01:59'),
(380, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '48', 'L-MCV', '0', 'fL', 'N', 'N', '16/08/2023 16:56:37'),
(381, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '56', 'LYMP#&E&', '0,7', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(382, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '49', 'P-MFV', '7,2', 'fL', 'N', 'N', '16/08/2023 16:56:37'),
(383, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '57', 'LYMP%&E&', '9,3', '%', 'N', 'N', '16/08/2023 18:01:59'),
(384, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '50', 'IRBC-WDF#', '0', '', 'N', 'N', '16/08/2023 16:56:37'),
(385, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '58', 'HFLC#', '0,01', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(386, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '51', 'HGB_NONSI', '12,1', 'g/dL', 'N', 'N', '16/08/2023 16:56:37'),
(387, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '59', 'HFLC%', '0,1', '%', 'N', 'N', '16/08/2023 18:01:59'),
(388, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '52', 'HGB_SI', '7,5', 'mmol/L', 'N', 'N', '16/08/2023 16:56:37'),
(389, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '60', 'NRBC#', '0,01', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(390, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '53', 'HGB_SI2', '7,52', 'mmol/L', 'N', 'N', '16/08/2023 16:56:37'),
(391, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '61', 'NRBC%', '0,1', '/100WBC', 'N', 'N', '16/08/2023 18:01:59'),
(392, NULL, '2023-08-16 08:26:30', 'XN-450', '087769', 'RUSNI', 'RUSNI', NULL, '16/02/2005', 'F', '54', 'HGB_NONSI2', '12,13', 'g/dL', 'N', 'N', '16/08/2023 16:56:37'),
(393, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '62', 'RDW-SD_RESEARCH', '37,6', 'fL', 'N', 'N', '16/08/2023 18:01:59'),
(394, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '63', 'RDW-CV_RESEARCH', '13,1', '%', 'N', 'N', '16/08/2023 18:01:59'),
(395, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '64', 'PLT-I', '207', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(396, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '65', 'TNC-C', '7,64', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(397, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '66', 'TNC-D', '7,58', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(398, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '67', 'TNC', '7,58', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(399, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '68', 'LYMPH%_RESEARCH', '9,4', '%', 'L', 'N', '16/08/2023 18:01:59'),
(400, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '69', 'MONO%_RESEARCH', '16', '%', 'H', 'N', '16/08/2023 18:01:59'),
(401, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '70', 'NEUT%_RESEARCH', '72,3', '%', 'N', 'N', '16/08/2023 18:01:59'),
(402, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '71', 'EO%_RESEARCH', '1,2', '%', 'N', 'N', '16/08/2023 18:01:59'),
(403, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '72', 'BASO%_RESEARCH', '1,1', '%', 'H', 'N', '16/08/2023 18:01:59'),
(404, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '73', 'LYMPH#_RESEARCH', '0,71', '10*3/uL', 'L', 'N', '16/08/2023 18:01:59'),
(405, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '74', 'MONO#_RESEARCH', '1,21', '10*3/uL', 'H', 'N', '16/08/2023 18:01:59'),
(406, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '75', 'NEUT#_RESEARCH', '5,49', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(407, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '76', 'EO#_RESEARCH', '0,09', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(408, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '77', 'BASO#_RESEARCH', '0,08', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(409, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '78', 'PDW_RESEARCH', '17', 'fL', 'N', 'N', '16/08/2023 18:01:59'),
(410, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '79', 'P-LCR_RESEARCH', '44,3', '%', 'H', 'N', '16/08/2023 18:01:59'),
(411, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '80', 'PCT_RESEARCH', '0,26', '%', 'N', 'N', '16/08/2023 18:01:59'),
(412, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '81', 'IG%_RESEARCH', '0,3', '%', 'N', 'N', '16/08/2023 18:01:59'),
(413, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '82', 'IG#_RESEARCH', '0,02', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(414, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '83', 'NE-SSC', '149', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(415, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '84', 'NE-SFL', '47,9', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(416, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '85', 'NE-FSC', '85,2', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(417, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '86', 'LY-X', '82,7', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(418, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '87', 'LY-Y', '71,7', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(419, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '88', 'LY-Z', '60,7', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(420, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '89', 'MO-X', '118,3', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(421, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '90', 'MO-Y', '96', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(422, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '91', 'MO-Z', '59,8', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(423, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '92', 'NE-WX', '315', '', 'N', 'N', '16/08/2023 18:01:59'),
(424, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '93', 'NE-WY', '606', '', 'N', 'N', '16/08/2023 18:01:59'),
(425, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '94', 'NE-WZ', '634', '', 'N', 'N', '16/08/2023 18:01:59'),
(426, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '95', 'LY-WX', '520', '', 'N', 'N', '16/08/2023 18:01:59'),
(427, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '96', 'LY-WY', '781', '', 'N', 'N', '16/08/2023 18:01:59'),
(428, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '97', 'LY-WZ', '478', '', 'N', 'N', '16/08/2023 18:01:59'),
(429, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '98', 'MO-WX', '279', '', 'N', 'N', '16/08/2023 18:01:59'),
(430, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '99', 'MO-WY', '791', '', 'N', 'N', '16/08/2023 18:01:59'),
(431, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '100', 'MO-WZ', '735', '', 'N', 'N', '16/08/2023 18:01:59'),
(432, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '101', 'HGB-BLANK', '6173', '', 'N', 'N', '16/08/2023 18:01:59'),
(433, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '102', 'HGB-SAMPLE', '7499', '', 'N', 'N', '16/08/2023 18:01:59'),
(434, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '103', 'R-MFV', '79,8', 'fL', 'N', 'N', '16/08/2023 18:01:59'),
(435, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '104', 'S-RBC', '0', '10*6/uL', 'N', 'N', '16/08/2023 18:01:59'),
(436, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '105', 'S-MCV', '0', 'fL', 'N', 'N', '16/08/2023 18:01:59'),
(437, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '106', 'L-RBC', '0', '10*6/uL', 'N', 'N', '16/08/2023 18:01:59'),
(438, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '107', 'L-MCV', '0', 'fL', 'N', 'N', '16/08/2023 18:01:59'),
(439, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '108', 'P-MFV', '9,8', 'fL', 'N', 'N', '16/08/2023 18:01:59'),
(440, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '109', 'WDF-X', '149', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(441, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '110', 'WDF-Y', '47,9', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(442, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '111', 'WDF-Z', '85,2', 'ch', 'N', 'N', '16/08/2023 18:01:59'),
(443, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '112', 'WDF-WX', '483', '', 'N', 'N', '16/08/2023 18:01:59'),
(444, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '113', 'WDF-WY', '1628', '', 'N', 'N', '16/08/2023 18:01:59'),
(445, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '114', 'IRBC-WDF#', '0', '', 'N', 'N', '16/08/2023 18:01:59'),
(446, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '115', 'DLT-WBCD', '0,99', '', 'N', 'N', '16/08/2023 18:01:59'),
(447, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '116', 'WBC-D2', '7,583', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(448, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '117', 'TNC-D2', '7,583', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(449, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '118', 'HGB_NONSI', '13,3', 'g/dL', 'N', 'N', '16/08/2023 18:01:59'),
(450, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '119', 'HGB_SI', '8,2', 'mmol/L', 'N', 'N', '16/08/2023 18:01:59'),
(451, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '120', 'HGB_SI2', '8,23', 'mmol/L', 'N', 'N', '16/08/2023 18:01:59'),
(452, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '121', 'WDF_TOTAL_COUNT', '28886', '', 'N', 'N', '16/08/2023 18:01:59'),
(453, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '122', 'WDF_PLOT_COUNT', '6524', '', 'N', 'N', '16/08/2023 18:01:59'),
(454, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '123', 'HGB_NONSI2', '13,26', 'g/dL', 'N', 'N', '16/08/2023 18:01:59'),
(455, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '124', 'LY-BF1#', '0', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(456, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '125', 'LY-BF2#', '0,711', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(457, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '126', 'MO-BF1#', '0', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(458, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '127', 'MO-BF2#', '0', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(459, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '128', 'MO-BF3#', '1,211', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(460, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '129', 'HF-BF1#', '0', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(461, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '130', 'HF-BF2#', '0', '10*3/uL', 'N', 'N', '16/08/2023 18:01:59'),
(462, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '131', 'LY-BF1%', '0', '%', 'N', 'N', '16/08/2023 18:01:59'),
(463, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '132', 'LY-BF2%', '9,4', '%', 'N', 'N', '16/08/2023 18:01:59'),
(464, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '133', 'MO-BF1%', '0', '%', 'N', 'N', '16/08/2023 18:01:59'),
(465, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '134', 'MO-BF2%', '0', '%', 'N', 'N', '16/08/2023 18:01:59'),
(466, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '135', 'MO-BF3%', '16', '%', 'N', 'N', '16/08/2023 18:01:59'),
(467, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '136', 'HF-BF1%', '0', '/100WBC', 'N', 'N', '16/08/2023 18:01:59'),
(468, NULL, '2023-08-16 08:26:30', 'XN-450', '015954', 'FERLANUS', 'FERLANUS', NULL, '07/02/1984', 'M', '137', 'HF-BF2%', '0', '/100WBC', 'N', 'N', '16/08/2023 18:01:59'),
(469, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '1', 'WBC', '13,77', '10*3/uL', 'H', 'N', '16/08/2023 16:54:33'),
(470, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '2', 'RBC', '4,08', '10*6/uL', 'L', 'N', '16/08/2023 16:54:33'),
(471, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '3', 'HGB', '11,1', 'g/dL', 'L', 'N', '16/08/2023 16:54:33'),
(472, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '4', 'HCT', '31,6', '%', 'L', 'N', '16/08/2023 16:54:33'),
(473, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '5', 'MCV', '77,5', 'fL', 'L', 'N', '16/08/2023 16:54:33'),
(474, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '6', 'MCH', '27,2', 'pg', 'N', 'N', '16/08/2023 16:54:33'),
(475, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '7', 'MCHC', '35,1', 'g/dL', 'N', 'N', '16/08/2023 16:54:33'),
(476, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '8', 'PLT', '59', '10*3/uL', 'L', 'N', '16/08/2023 16:54:33'),
(477, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '9', 'RDW-SD', '42,5', 'fL', 'N', 'N', '16/08/2023 16:54:33'),
(478, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '10', 'RDW-CV', '14,8', '%', 'N', 'N', '16/08/2023 16:54:33'),
(479, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '11', 'MICROR', '8,8', '%', 'N', 'N', '16/08/2023 16:54:33'),
(480, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '12', 'MACROR', '3,6', '%', 'N', 'N', '16/08/2023 16:54:33'),
(481, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '13', 'PDW', '14,9', 'fL', 'N', 'N', '16/08/2023 16:54:33'),
(482, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '14', 'MPV', '11,4', 'fL', 'N', 'N', '16/08/2023 16:54:33'),
(483, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '15', 'P-LCR', '39', '%', 'N', 'N', '16/08/2023 16:54:33'),
(484, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '16', 'PCT', '0,07', '%', 'L', 'N', '16/08/2023 16:54:33'),
(485, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '17', 'Thrombocytopenia', NULL, '', 'A', 'N', '16/08/2023 16:54:33'),
(486, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '18', 'RBC_Agglutination?', '60', '', NULL, 'N', '16/08/2023 16:54:33'),
(487, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '19', 'Turbidity/HGB_Interference?', '90', '', NULL, 'N', '16/08/2023 16:54:33'),
(488, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '20', 'Iron_Deficiency?', '80', '', NULL, 'N', '16/08/2023 16:54:33'),
(489, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '21', 'HGB_Defect?', '90', '', NULL, 'N', '16/08/2023 16:54:33'),
(490, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '22', 'Fragments?', '0', '', NULL, 'N', '16/08/2023 16:54:33'),
(491, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '23', 'PLT_Clumps?', '20', '', NULL, 'N', '16/08/2023 16:54:33'),
(492, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '24', 'Positive_Count', NULL, '', 'A', 'N', '16/08/2023 16:54:33'),
(493, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '25', 'SCAT_WDF-CBC', NULL, '', 'N', 'N', '16/08/2023 16:54:33'),
(494, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '26', 'SCAT_WDF-CBC(FSCW-FSC)', NULL, '', 'N', 'N', '16/08/2023 16:54:33'),
(495, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '27', 'DIST_RBC', NULL, '', 'N', 'N', '16/08/2023 16:54:33'),
(496, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '28', 'DIST_PLT', NULL, '', 'N', 'N', '16/08/2023 16:54:33'),
(497, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '29', 'DIST_RBC(NORMAL)', NULL, '', 'N', 'N', '16/08/2023 16:54:33'),
(498, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '30', 'DIST_PLT(NORMAL)', NULL, '', 'N', 'N', '16/08/2023 16:54:33'),
(499, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '31', 'WBC-C', '13,77', '10*3/uL', 'N', 'N', '16/08/2023 16:54:33'),
(500, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '32', 'RDW-SD_RESEARCH', '42,5', 'fL', 'N', 'N', '16/08/2023 16:54:33'),
(501, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '33', 'RDW-CV_RESEARCH', '14,8', '%', 'N', 'N', '16/08/2023 16:54:33'),
(502, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '34', 'PLT-I', '59', '10*3/uL', 'N', 'N', '16/08/2023 16:54:33'),
(503, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '35', 'TNC-C', '13,77', '10*3/uL', 'N', 'N', '16/08/2023 16:54:33'),
(504, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '36', 'TNC', '13,77', '10*3/uL', 'N', 'N', '16/08/2023 16:54:33'),
(505, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '37', 'PDW_RESEARCH', '14,9', 'fL', 'N', 'N', '16/08/2023 16:54:33'),
(506, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '38', 'P-LCR_RESEARCH', '39', '%', 'N', 'N', '16/08/2023 16:54:33'),
(507, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '39', 'PCT_RESEARCH', '0,07', '%', 'L', 'N', '16/08/2023 16:54:33'),
(508, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '40', 'HGB-BLANK', '6112', '', 'N', 'N', '16/08/2023 16:54:33'),
(509, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '41', 'HGB-SAMPLE', '7225', '', 'N', 'N', '16/08/2023 16:54:33'),
(510, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '42', 'R-MFV', '78', 'fL', 'N', 'N', '16/08/2023 16:54:33'),
(511, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '43', 'S-RBC', '0', '10*6/uL', 'N', 'N', '16/08/2023 16:54:33'),
(512, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '44', 'S-MCV', '0', 'fL', 'N', 'N', '16/08/2023 16:54:33'),
(513, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '45', 'L-RBC', '0', '10*6/uL', 'N', 'N', '16/08/2023 16:54:33'),
(514, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '46', 'L-MCV', '0', 'fL', 'N', 'N', '16/08/2023 16:54:33'),
(515, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '47', 'P-MFV', '9,6', 'fL', 'N', 'N', '16/08/2023 16:54:33'),
(516, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '48', 'IRBC-WDF#', '0', '', 'N', 'N', '16/08/2023 16:54:33'),
(517, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '49', 'HGB_NONSI', '11,1', 'g/dL', 'N', 'N', '16/08/2023 16:54:33'),
(518, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '50', 'HGB_SI', '6,9', 'mmol/L', 'N', 'N', '16/08/2023 16:54:33'),
(519, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '51', 'HGB_SI2', '6,9', 'mmol/L', 'N', 'N', '16/08/2023 16:54:33'),
(520, NULL, '2023-08-16 08:26:34', 'XN-450', '087410', 'KEMPES', 'KEMPES', NULL, '05/04/1972', 'M', '52', 'HGB_NONSI2', '11,13', 'g/dL', 'N', 'N', '16/08/2023 16:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 'Admin', '$2y$10$JRJd/Wt2qi1CgEfadQPczeCLgX..8h9jKDl09Qajm9SUNw.WzSFfO', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_tindakan_id_foreign` (`tindakan_id`);

--
-- Indexes for table `master_tindakan`
--
ALTER TABLE `master_tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mutasi_patien_id_foreign` (`patien_id`),
  ADD KEY `mutasi_inventory_id_foreign` (`inventory_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_data`
--
ALTER TABLE `order_data`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TEST_DATA_DEVICE_ID1_IDX` (`DEVICE_ID1`),
  ADD KEY `TEST_DATA_TIMESTAMP_IDX` (`TIMESTAMP`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profilesistem`
--
ALTER TABLE `profilesistem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_data`
--
ALTER TABLE `test_data`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TEST_DATA_DEVICE_ID1_IDX` (`DEVICE_ID1`),
  ADD KEY `TEST_DATA_TIMESTAMP_IDX` (`TIMESTAMP`);

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
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_tindakan`
--
ALTER TABLE `master_tindakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_data`
--
ALTER TABLE `order_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profilesistem`
--
ALTER TABLE `profilesistem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_data`
--
ALTER TABLE `test_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=521;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `master_tindakan` (`id`);

--
-- Constraints for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD CONSTRAINT `mutasi_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`),
  ADD CONSTRAINT `mutasi_patien_id_foreign` FOREIGN KEY (`patien_id`) REFERENCES `patient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
