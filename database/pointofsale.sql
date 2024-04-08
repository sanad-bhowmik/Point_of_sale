-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 07:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pointofsale`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_journalreport`
--

CREATE TABLE `acc_journalreport` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `particular` varchar(255) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  `debit` decimal(10,2) DEFAULT NULL,
  `credit` decimal(10,2) DEFAULT NULL,
  `narration` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `acc_journalreport`
--

INSERT INTO `acc_journalreport` (`id`, `user_id`, `particular`, `reference_no`, `debit`, `credit`, `narration`, `created_at`, `updated_at`) VALUES
(1, 108, 'Expense', 'REF123', 500.00, 0.00, 'Payment for office supplies', '2024-03-06 08:12:05', '2024-03-06 08:12:05'),
(2, 108, 'Revenue', 'REF456', 0.00, 1000.00, 'Sales revenue for the month', '2024-03-06 08:12:05', '2024-03-06 08:12:05'),
(3, 108, 'Asset', 'REF789', 2000.00, 0.00, 'Purchase of new equipment', '2024-03-06 08:12:05', '2024-03-06 08:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `acc_ledger`
--

CREATE TABLE `acc_ledger` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `particular` varchar(255) NOT NULL,
  `reference_no` varchar(100) NOT NULL,
  `debit` decimal(10,2) DEFAULT 0.00,
  `credit` decimal(10,2) DEFAULT 0.00,
  `balance` decimal(10,2) DEFAULT 0.00,
  `narration` text DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `acc_ledger`
--

INSERT INTO `acc_ledger` (`id`, `user_id`, `date`, `particular`, `reference_no`, `debit`, `credit`, `balance`, `narration`, `status`, `created_at`, `updated_at`) VALUES
(1, 108, '2024-03-10', 'Sales', 'INV001', 2000.00, 5000.00, 5000.00, 'Sales of product A', 'Active', '2024-03-09 05:55:21', '2024-03-09 06:02:41'),
(2, 108, '2024-03-11', 'Purchase', 'PO002', 3500.00, 0.00, 1500.00, 'Purchase of product B', 'Active', '2024-03-09 05:55:21', '2024-03-09 05:55:21'),
(3, 108, '2024-03-12', 'Sales', 'INV002', 0.00, 7000.00, 8500.00, 'Sales of product C', 'Active', '2024-03-09 05:55:21', '2024-03-09 05:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `adjust_creditsale`
--

CREATE TABLE `adjust_creditsale` (
  `id` int(11) NOT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `invoice_date` date DEFAULT curdate(),
  `total_amount` decimal(10,2) DEFAULT NULL,
  `paid_amount` decimal(10,2) DEFAULT NULL,
  `due` decimal(10,2) DEFAULT NULL,
  `pay` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adjust_creditsale`
--

INSERT INTO `adjust_creditsale` (`id`, `invoice`, `customer_name`, `mobile`, `invoice_date`, `total_amount`, `paid_amount`, `due`, `pay`, `created_at`, `updated_at`) VALUES
(1, 'INV001', 'John Doe', '1234567890', '2024-03-06', 100.00, 50.00, 50.00, 0.00, '2024-03-06 05:17:15', '2024-03-06 05:17:15'),
(2, 'INV002', 'Jane Smith', '9876543210', '2024-03-06', 200.00, 150.00, 50.00, 0.00, '2024-03-06 05:17:15', '2024-03-06 05:17:15'),
(3, 'INV003', 'Alice Johnson', '5555555555', '2024-03-06', 300.00, 300.00, 0.00, 0.00, '2024-03-06 05:17:15', '2024-03-06 05:17:15');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `role_id` int(191) NOT NULL DEFAULT 0,
  `photo` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_languages`
--

CREATE TABLE `admin_languages` (
  `id` int(191) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `language` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rtl` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_languages`
--

INSERT INTO `admin_languages` (`id`, `is_default`, `language`, `file`, `name`, `rtl`) VALUES
(1, 1, 'English', '1567232745AoOcvCtY.json', '1567232745AoOcvCtY', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `account_no` varchar(50) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `name`, `account_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Prime Bank', '122333', 'active', '2024-03-06 08:31:03', '2024-03-06 08:31:03'),
(2, 'City Bank', '11223344', 'active', '2024-03-06 08:31:03', '2024-03-06 08:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `user_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `category_name` varchar(191) NOT NULL,
  `status` varchar(111) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `user_id`, `name`, `category`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(9, 108, 'Nokia', '24', 'Mobile', 'Active', '2024-03-18 01:42:49', '2024-03-18 01:42:49'),
(10, 108, 'Xaomi', '25', 'Laptop', 'Active', '2024-03-18 03:34:55', '2024-03-18 03:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `cash_flow_report`
--

CREATE TABLE `cash_flow_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_cash_in` decimal(10,2) NOT NULL,
  `total_cash_out` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cash_flow_report`
--

INSERT INTO `cash_flow_report` (`id`, `user_id`, `total_cash_in`, `total_cash_out`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 108, 5000.00, 3000.00, '2024-03-12', 'Active', '2024-03-09 10:35:34', '2024-03-09 10:35:34'),
(2, 108, 7000.00, 2000.00, '2024-03-11', 'Active', '2024-03-09 10:35:34', '2024-03-09 10:35:34'),
(3, 108, 6000.00, 4000.00, '2024-03-10', 'Active', '2024-03-09 10:35:34', '2024-03-09 10:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `user_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vat` decimal(10,2) NOT NULL,
  `status` varchar(111) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `user_id`, `name`, `vat`, `status`, `created_at`, `updated_at`) VALUES
(24, 108, 'Mobile', 1.00, 'Active', '2024-03-17 23:57:30', '2024-03-17 23:57:30'),
(25, 108, 'Laptop', 53.00, 'Active', '2024-03-18 00:18:50', '2024-03-18 00:18:50'),
(26, 108, 'adfg', 213.00, 'Active', '2024-04-03 04:07:17', '2024-04-03 04:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `commissionjournal`
--

CREATE TABLE `commissionjournal` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commissionjournal`
--

INSERT INTO `commissionjournal` (`id`, `date`, `supplier`, `supplier_id`, `remarks`, `amount`, `created_at`, `updated_at`) VALUES
(1, '2024-03-28', 'Supplier A', 1, 'Sample remark for Supplier A', 1000.00, '2024-03-28 07:25:37', '2024-03-28 07:25:37'),
(2, '2024-03-29', 'Supplier B', 2, 'Sample remark for Supplier B', 1500.00, '2024-03-28 07:25:37', '2024-03-28 07:25:37'),
(3, '2024-03-30', 'Supplier C', 3, 'Sample remark for Supplier C', 2000.00, '2024-03-28 07:25:37', '2024-03-28 07:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `costing_head`
--

CREATE TABLE `costing_head` (
  `id` int(11) NOT NULL,
  `user_id` int(111) NOT NULL,
  `costing_head` varchar(255) NOT NULL,
  `expense_type` varchar(191) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `costing_head`
--

INSERT INTO `costing_head` (`id`, `user_id`, `costing_head`, `expense_type`, `status`, `created_at`, `updated_at`) VALUES
(5, 108, 'Mobile Bill', 'Indirect', 'Active', '2024-03-19 00:27:36', '2024-03-19 00:27:36'),
(6, 108, 'Shop Rent', 'Indirect', 'Active', '2024-03-19 00:27:58', '2024-03-19 00:27:58'),
(7, 108, 'Salary', 'Indirect', 'Active', '2024-03-19 00:28:09', '2024-03-19 00:28:09'),
(8, 108, 'Internet Bill', 'Indirect', 'Active', '2024-03-19 00:28:21', '2024-03-19 00:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `addedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile`, `addedDate`, `created_at`, `updated_at`) VALUES
(1, 'Sadik Vi', '123456', '2018-09-18 05:00:00', '2024-03-05 10:35:05', '2024-03-05 10:35:05'),
(2, 'Das', '1767039396', '2018-09-20 05:00:00', '2024-03-05 10:35:05', '2024-03-05 10:35:05'),
(3, 'Sagar', '1796619601', '2020-02-05 05:00:00', '2024-03-05 10:35:05', '2024-03-05 10:35:05'),
(4, 'Testing', '01712345678', '2024-03-05 10:53:37', '2024-03-05 15:53:37', '2024-03-05 15:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `user_id` int(111) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `brand` varchar(255) NOT NULL,
  `category_id` int(111) DEFAULT NULL,
  `brand_id` int(111) DEFAULT NULL,
  `sale_price` int(111) NOT NULL,
  `unit_id` int(111) DEFAULT NULL,
  `vat_percent` int(111) DEFAULT NULL,
  `description_code` text NOT NULL,
  `mrp` int(191) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id`, `description`, `user_id`, `category`, `brand`, `category_id`, `brand_id`, `sale_price`, `unit_id`, `vat_percent`, `description_code`, `mrp`, `status`, `created_at`, `updated_at`) VALUES
(10, 'css', 108, 'Laptop', 'Dell', 25, 8, 23, 23, 3, 'sdfrewdcv', 11, 'Active', '2024-03-19 04:23:28', '2024-03-19 09:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `dropped_invoice`
--

CREATE TABLE `dropped_invoice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `drop_status` varchar(255) DEFAULT NULL,
  `drop_reason` text DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dropped_invoice`
--

INSERT INTO `dropped_invoice` (`id`, `user_id`, `invoice_no`, `branch`, `drop_status`, `drop_reason`, `invoice_date`, `request_date`, `approved_date`, `created_at`, `updated_at`) VALUES
(1, 108, 'INV001', 'Rifat Store', 'Y', 'Incomplete information', '2024-03-01', '2024-02-15', '2024-02-20', '2024-04-02 06:05:59', '2024-04-02 08:00:50'),
(2, 108, 'INV002', 'Rifat Store', 'Y', 'Customer request', '2024-03-05', '2024-02-20', '2024-02-25', '2024-04-02 06:05:59', '2024-04-02 08:00:53'),
(3, 108, 'INV003', 'Rifat Store', 'Y', 'Billing discrepancy', '2024-03-10', '2024-02-25', '2024-03-01', '2024-04-02 06:05:59', '2024-04-02 08:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `user_id`, `purpose`, `amount`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 108, 'Office Supplies', 50.00, 'Bought pens, papers, and folders', 'Active', '2024-03-07 04:39:30', '2024-03-07 04:39:30'),
(2, 108, 'Internet Bill', 75.00, 'Monthly internet subscription', 'Active', '2024-03-07 04:39:30', '2024-03-07 04:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `investment`
--

CREATE TABLE `investment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `remarks` text DEFAULT NULL,
  `amount` int(255) NOT NULL,
  `status` varchar(111) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `investment`
--

INSERT INTO `investment` (`id`, `user_id`, `action`, `account_no`, `remarks`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(6, 108, 'Withdraw From Bank to Cash', '656002630051021', 'NRB Bank', 954000, 'Active', '2024-03-01 06:15:55', '2024-03-27 11:03:49'),
(7, 108, 'wdw', '3344', 'fdsf', 213321, 'Active', '2024-03-27 11:03:24', '2024-03-27 11:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `drop_status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invoice`, `customer_name`, `mobile`, `invoice_date`, `remarks`, `drop_status`, `created_at`, `updated_at`) VALUES
(1, 'INV001', 'John Doe', '1234567890', '2024-03-06', 'Paid in full', 0, '2024-03-06 06:14:19', '2024-03-06 06:14:19'),
(2, 'INV002', 'Jane Smith', '9876543210', '2024-03-07', 'Partial payment received', 0, '2024-03-06 06:14:19', '2024-03-06 06:14:19'),
(3, 'INV003', 'Alice Johnson', '5555555555', '2024-03-08', 'No payment received yet', 1, '2024-03-06 06:14:19', '2024-03-06 06:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_delete_history`
--

CREATE TABLE `payment_delete_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_delete_history`
--

INSERT INTO `payment_delete_history` (`id`, `user_id`, `supplier`, `reference_no`, `amount`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 108, 'Almas', 'Ref_SupplierPayment_2_431_240324011343', 100.00, 'Payment for goods', 'Active', '2024-03-27 01:22:56', '2024-03-27 01:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `pos_users`
--

CREATE TABLE `pos_users` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(111) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `NID_no` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_wise_profit`
--

CREATE TABLE `product_wise_profit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `description_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sale_qty` int(11) DEFAULT NULL,
  `sale_return_qty` int(11) DEFAULT NULL,
  `profit_loss` decimal(10,2) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_wise_profit`
--

INSERT INTO `product_wise_profit` (`id`, `user_id`, `category_id`, `category`, `brand_id`, `brand`, `description_id`, `description`, `sale_qty`, `sale_return_qty`, `profit_loss`, `status`, `created_at`, `updated_at`) VALUES
(1, 108, 1, 'Category A', 1, 'Brand X', 1, 'Product A', 100, 5, 1500.00, 'Active', '2024-03-09 05:14:06', '2024-03-09 05:14:06'),
(2, 108, 2, 'Category B', 2, 'Brand Y', 2, 'Product B', 80, 2, 2000.00, 'Active', '2024-03-09 05:14:06', '2024-03-09 05:14:06'),
(3, 108, 1, 'Category A', 1, 'Brand X', 3, 'Product C', 120, 10, 1800.00, 'Active', '2024-03-09 05:14:06', '2024-03-09 05:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_add`
--

CREATE TABLE `purchase_add` (
  `id` int(11) NOT NULL,
  `user_id` int(111) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sell_price` decimal(10,2) DEFAULT NULL,
  `mrp` decimal(10,2) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `entry_model` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` date DEFAULT curdate(),
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_add`
--

INSERT INTO `purchase_add` (`id`, `user_id`, `category`, `brand`, `description`, `sell_price`, `mrp`, `vendor`, `entry_model`, `barcode`, `quantity`, `date`, `updated_at`, `created_at`) VALUES
(5, 108, 'Electronics', 'Brand Z', 'Description 3', 80.00, 80.00, '2', NULL, '234', 234, '2024-03-19', '2024-03-19', '2024-03-19'),
(6, 108, 'Electronics', 'Brand Z', 'Description 3', 80.00, 80.00, '1', 'Quantity', 'qqqq', 234, '2024-03-19', '2024-03-19', '2024-03-19'),
(7, 108, 'Books', 'Brand W', 'Description 4', 20.00, 123.00, '5', 'Barcode', 'qqqq', 234, '2024-03-19', '2024-03-28', '2024-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `purchase_info_id` int(11) DEFAULT NULL,
  `description_id` int(11) DEFAULT NULL,
  `cost_price` decimal(10,2) DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `barcode_lable` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `user_id`, `shop_id`, `purchase_info_id`, `description_id`, `cost_price`, `sale_price`, `qty`, `barcode_lable`, `status`, `created_at`, `updated_at`) VALUES
(1, 108, 3, 1221, 2, 2121.00, 21.00, 2, 'sadsad', 'Active', '2024-03-07 00:58:42', '2024-03-07 00:58:42'),
(2, 108, 3, 11111, 1111, 111.11, 1111.11, 111, '11111111111111', 'Active', '2024-03-07 05:23:09', '2024-03-07 05:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `si_no` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost_price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `particular` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`id`, `user_id`, `si_no`, `productId`, `vendor`, `category`, `brand`, `description`, `cost_price`, `qty`, `particular`, `date`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 108, 1, 351203, 'Vendor A', 'Category X', 'Brand 1', 'Description 1', 10.50, 5, 'Particular 1', '2024-03-01', NULL, '2024-03-05 05:06:34', '2024-03-05 05:06:48'),
(2, 108, 2, 65552, 'Vendor B', 'Category Y', 'Brand 2', 'Description 2', 15.75, 7, 'Particular 2', '2024-03-02', '2024-03-10', '2024-03-05 05:06:34', '2024-03-05 05:07:01'),
(3, 108, 3, 66209, 'Vendor C', 'Category Z', 'Brand 3', 'Description 3', 20.00, 10, 'Particular 3', '2024-03-03', NULL, '2024-03-05 05:06:34', '2024-03-05 05:07:07'),
(4, 108, 4, 66206, 'Vendor D', 'Category X', 'Brand 1', 'Description 4', 12.25, 3, 'Particular 4', '2024-03-04', NULL, '2024-03-05 05:06:34', '2024-03-05 05:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_list`
--

CREATE TABLE `purchase_list` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `cost_price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_list`
--

INSERT INTO `purchase_list` (`id`, `user_id`, `vendor`, `category`, `brand`, `description`, `barcode`, `cost_price`, `qty`, `total`, `date`, `created_at`, `updated_at`) VALUES
(1, 108, 'Vendor A', 'Electronics', 'Brand X', 'Description 1', '123456789', 50.00, 2, 100.00, '2024-03-04', '2024-03-04 12:15:47', '2024-03-04 12:15:47'),
(2, 108, 'Vendor B', 'Clothing', 'Brand Y', 'Description 2', '987654321', 30.00, 3, 90.00, '2024-03-04', '2024-03-04 12:15:47', '2024-03-04 12:15:47'),
(3, 108, 'Vendor C', 'Electronics', 'Brand Z', 'Description 3', '456789123', 80.00, 1, 80.00, '2024-03-04', '2024-03-04 12:15:47', '2024-03-04 12:15:47'),
(4, 108, 'Vendor D', 'Books', 'Brand W', 'Description 4', '789123456', 20.00, 5, 100.00, '2024-03-04', '2024-03-04 12:15:47', '2024-03-04 12:15:47'),
(5, 108, 'Vendor E', 'Electronics', 'Brand X', 'Description 5', '321654987', 70.00, 2, 140.00, '2024-03-04', '2024-03-04 12:15:47', '2024-03-04 12:15:47'),
(6, 108, 'Vendor F', 'Clothing', 'Brand Y', 'Description 6', '654987321', 40.00, 4, 160.00, '2024-03-04', '2024-03-04 12:15:47', '2024-03-04 12:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_info`
--

CREATE TABLE `purchase_order_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_code` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `chalan_no` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `purchase_order_info`
--

INSERT INTO `purchase_order_info` (`id`, `user_id`, `supplier_id`, `purchase_code`, `invoice_no`, `chalan_no`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 108, 121, '1ww21w', '12ss', '21wqs', 1121.00, 'Active', '2024-03-07 00:42:17', '2024-03-07 00:42:17'),
(2, 108, 121, '1ww21w', '29345081', '34193401', 1121.00, 'Active', '2024-03-07 01:19:29', '2024-03-07 01:19:29'),
(3, 108, 121, '016632', '96957910', '51544120', 1121.00, 'Active', '2024-03-07 01:22:56', '2024-03-07 01:22:56'),
(4, 108, 108, '0000917840', '0038176898', '0020956213', 12045.00, 'Active', '2024-03-07 04:37:04', '2024-03-07 04:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `id` int(11) NOT NULL,
  `user_id` int(111) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `return_unit_cost` decimal(10,2) DEFAULT NULL,
  `return_qty` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-04-06 12:19:48.000000', '2024-04-06 12:20:23.000000'),
(2, 'Shop Owner', '2024-04-06 12:20:19.000000', '2024-04-06 12:20:25.000000'),
(3, 'Shop Worker', '2024-04-06 12:20:27.000000', '2024-04-06 12:20:30.000000');

-- --------------------------------------------------------

--
-- Table structure for table `sales_customer`
--

CREATE TABLE `sales_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_customer`
--

INSERT INTO `sales_customer` (`id`, `name`, `number`, `created_at`, `updated_at`) VALUES
(6, 'Sanad Bhowmik', '01831370709', '2024-03-28 01:48:51', '2024-03-28 01:48:51'),
(9, 'Rabbi', '01767364544', '2024-03-28 02:00:27', '2024-03-28 02:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_item_report`
--

CREATE TABLE `sales_item_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `invoice_num` varchar(255) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `description_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `vat` decimal(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `net_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Active','Inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales_item_report`
--

INSERT INTO `sales_item_report` (`id`, `user_id`, `category_id`, `category`, `brand_id`, `brand`, `invoice_num`, `invoice_date`, `description_id`, `description`, `qty`, `unit_price`, `discount`, `vat`, `remarks`, `net_amount`, `created_at`, `updated_at`, `status`) VALUES
(1, 108, 1, 'Electronics', 1, 'Samsung', 'INV001', '2024-03-09', 1, 'Smartphone', 2, 500.00, 0.00, 20.00, 'No remarks', 1020.00, '2024-03-09 04:48:57', '2024-03-09 04:48:57', 'Active'),
(2, 108, 2, 'Clothing', 2, 'Nike', 'INV002', '2024-03-09', 2, 'T-shirt', 3, 25.00, 5.00, 5.00, 'Limited stock', 70.00, '2024-03-09 04:48:57', '2024-03-09 04:48:57', 'Active'),
(3, 108, 3, 'Furniture', 3, 'IKEA', 'INV003', '2024-03-25', 3, 'Chair', 1, 150.00, 10.00, 15.00, 'Brand new', 145.00, '2024-03-09 04:48:57', '2024-03-25 09:21:45', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `id` int(11) NOT NULL,
  `user_id` int(111) NOT NULL,
  `invoice_num` varchar(255) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales_return`
--

INSERT INTO `sales_return` (`id`, `user_id`, `invoice_num`, `customer_name`, `payment_mode`, `reason`, `created_at`, `updated_at`) VALUES
(1, 108, '111111', 't', 't', 't', '2024-02-28 14:25:24', '2024-02-28 14:25:24'),
(2, 108, '3ed2e3d32', NULL, NULL, 'why', '2024-03-27 23:04:51', '2024-03-27 23:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `shoplist_status`
--

CREATE TABLE `shoplist_status` (
  `id` int(11) NOT NULL,
  `user_id` int(111) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sl_no` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shoplist_status`
--

INSERT INTO `shoplist_status` (`id`, `user_id`, `created_at`, `updated_at`, `sl_no`, `code`, `name`, `mobile`, `address`, `status`) VALUES
(1, 108, '2024-03-04 06:37:24', '2024-03-06 06:25:41', 1, '1008032', 'A. J Computer', '01854-739701', '123 Main St', 'Active'),
(2, 108, '2024-03-04 06:37:24', '2024-03-04 15:43:46', 2, '1008069', 'AICHI TELECOM', '01977255528', '456 Elm St', 'Active'),
(3, 108, '2024-03-04 06:37:24', '2024-03-04 15:42:39', 3, '1008073', 'Akhtab Gadget Zone', '+88 01675 446252', '789 Oak St', 'Inactive'),
(4, 108, '2024-03-04 06:37:24', '2024-03-04 06:58:03', 4, '1008090', 'Amir Enterprise-2', '	01777309291', '321 Pine St', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `shop_infos`
--

CREATE TABLE `shop_infos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `shop_img` varchar(255) DEFAULT 'https://media.istockphoto.com/id/1409329028/vector/no-picture-available-placeholder-thumbnail-icon-illustration-design.jpg?s=612x612&w=0&k=20&c=_zOuJu755g2eEUioiOUdz_mHKJQJn-tDgIAhQzyeKUQ=',
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shop_infos`
--

INSERT INTO `shop_infos` (`id`, `user_id`, `shop_name`, `shop_address`, `shop_img`, `status`, `created_at`, `updated_at`) VALUES
(20, 108, 'UzanVati', 'Dhaka', '1710833884.jpeg', 0, '2024-03-19 01:38:04', '2024-03-19 07:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `shop_payment_list`
--

CREATE TABLE `shop_payment_list` (
  `id` int(11) NOT NULL,
  `user_id` int(111) NOT NULL,
  `sl_no` varchar(255) DEFAULT NULL,
  `status_payment` varchar(255) DEFAULT 'Pending',
  `date` date DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `monthly_fee` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shop_payment_list`
--

INSERT INTO `shop_payment_list` (`id`, `user_id`, `sl_no`, `status_payment`, `date`, `month`, `monthly_fee`, `total`, `transaction_id`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 108, '1', 'Approved', '2018-09-30', 'September 2018', 350.00, 499.99, 'tr2546', 'bKash', '2024-03-04 10:44:31', '2024-03-04 10:48:27'),
(2, 108, '2', 'Pending', '2018-09-30', 'october 2018', 350.00, 499.99, 'TR-BKAS-2451', 'bKash', '2024-03-04 10:44:31', '2024-04-03 05:01:35'),
(3, 108, '3', 'Approved', '2024-04-04', 'March', 354.00, 350.00, '2333333', 'dfs', '2024-04-02 23:30:54', '2024-04-03 05:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `stock_report`
--

CREATE TABLE `stock_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stock_report`
--

INSERT INTO `stock_report` (`id`, `user_id`, `category`, `model`, `description`, `qty`, `created_at`, `updated_at`) VALUES
(1, 108, 'Electronics', 'Sony', 'Sony TV', 10, '2024-03-06 06:53:09', '2024-03-06 06:53:20'),
(2, 108, 'Electronics', 'Samsung', 'Samsung Refrigerator', 5, '2024-03-06 06:53:09', '2024-03-06 06:53:29'),
(3, 108, 'Clothing', 'Nike', 'Nike Running Shoes', 20, '2024-03-06 06:53:09', '2024-03-06 06:53:33'),
(4, 108, 'Clothing', 'Adidas', 'Adidas T-shirt', 30, '2024-03-06 06:53:09', '2024-03-06 06:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `stock_summary`
--

CREATE TABLE `stock_summary` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `opening_stock_qty` int(11) DEFAULT NULL,
  `purchase_qty` int(11) DEFAULT NULL,
  `purchase_return_qty` int(11) DEFAULT NULL,
  `sale_qty` int(11) DEFAULT NULL,
  `sale_return_qty` int(11) DEFAULT NULL,
  `missing_qty` int(11) DEFAULT NULL,
  `closing_stock_qty` int(11) DEFAULT NULL,
  `opening_stock_value` decimal(10,2) DEFAULT NULL,
  `purchase_value` decimal(10,2) DEFAULT NULL,
  `purchase_return_value` decimal(10,2) DEFAULT NULL,
  `sale_value` decimal(10,2) DEFAULT NULL,
  `sale_return_value` decimal(10,2) DEFAULT NULL,
  `missing_value` decimal(10,2) DEFAULT NULL,
  `price_protection_value` decimal(10,2) DEFAULT NULL,
  `closing_stock_value` decimal(10,2) DEFAULT NULL,
  `average` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stock_summary`
--

INSERT INTO `stock_summary` (`id`, `user_id`, `description`, `opening_stock_qty`, `purchase_qty`, `purchase_return_qty`, `sale_qty`, `sale_return_qty`, `missing_qty`, `closing_stock_qty`, `opening_stock_value`, `purchase_value`, `purchase_return_value`, `sale_value`, `sale_return_value`, `missing_value`, `price_protection_value`, `closing_stock_value`, `average`, `created_at`, `updated_at`, `category`, `brand`) VALUES
(1, 108, 'Product A', 100, 50, 5, 40, 2, 3, 200, 1000.00, 500.00, 50.00, 400.00, 20.00, 30.00, 10.00, 1500.00, 5.50, '2024-03-06 07:37:00', '2024-03-06 07:55:57', 'CategoryOne', 'brandOne'),
(2, 108, 'Product B', 150, 60, 3, 50, 1, 5, 200, 1200.00, 600.00, 30.00, 500.00, 10.00, 50.00, 15.00, 1800.00, 6.50, '2024-03-06 07:37:00', '2024-03-06 07:56:02', 'CategoryTwo', 'brandTwo');

-- --------------------------------------------------------

--
-- Table structure for table `sub_users`
--

CREATE TABLE `sub_users` (
  `id` int(11) NOT NULL,
  `user_id` int(111) NOT NULL,
  `shop_id` int(111) NOT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_users`
--

INSERT INTO `sub_users` (`id`, `user_id`, `shop_id`, `user_phone`, `password`, `created_at`, `updated_at`) VALUES
(1, 108, 3, '01673899273', '1234567', '2024-03-06 05:50:52', '2024-03-06 05:50:52'),
(2, 108, 3, '016738992735', '1234567', '2024-03-06 21:51:36', '2024-03-06 21:51:36'),
(3, 108, 3, '01712345678', '123456', '2024-03-06 22:36:44', '2024-03-06 22:36:44'),
(5, 108, 3, '01712345677', '123456', '2024-03-06 22:38:25', '2024-03-06 22:38:25'),
(7, 108, 3, '01712345679', '123456', '2024-03-06 22:38:59', '2024-03-06 22:38:59'),
(8, 108, 3, '018122345678', '123456', '2024-03-06 22:40:12', '2024-03-06 22:40:12'),
(10, 108, 3, '018122345669', '1234', '2024-03-06 22:54:29', '2024-03-06 22:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `user_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `supplier_TR_license` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `user_id`, `name`, `address`, `number`, `supplier_TR_license`, `status`, `created_at`, `updated_at`) VALUES
(7, 108, 'hwgfuyhwe', 'efvcfd', '2134', 'dsvf32edc', 'Active', '2024-03-31 06:09:24', '2024-03-31 06:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_due_report`
--

CREATE TABLE `supplier_due_report` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `total_purchase` decimal(10,2) DEFAULT NULL,
  `total_purchase_return` decimal(10,2) DEFAULT NULL,
  `total_purchase_amendment` decimal(10,2) DEFAULT NULL,
  `total_payment` decimal(10,2) DEFAULT NULL,
  `due` decimal(10,2) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier_due_report`
--

INSERT INTO `supplier_due_report` (`id`, `user_id`, `supplier`, `total_purchase`, `total_purchase_return`, `total_purchase_amendment`, `total_payment`, `due`, `status`, `created_at`, `updated_at`) VALUES
(1, 108, 'Fazle Rabbi', 1000.00, 200.00, 50.00, 800.00, 450.00, 'Active', '2024-03-07 05:22:00', '2024-03-27 07:41:02'),
(2, 108, 'Rahim Enterprize', 1500.00, 300.00, 100.00, 1200.00, 700.00, 'Active', '2024-03-07 05:22:00', '2024-03-27 07:41:17'),
(3, 108, 'Rahim Enterprize11', 2000.00, 400.00, 150.00, 1600.00, 950.00, 'Inactive', '2024-03-07 05:22:00', '2024-03-27 07:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment_history`
--

CREATE TABLE `supplier_payment_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier_payment_history`
--

INSERT INTO `supplier_payment_history` (`id`, `user_id`, `supplier`, `reference_no`, `amount`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(2, 108, 'Oppo', 'Ref_SupplierPayment_2_484_190328054028', 150.00, 'Payment for services', 'Inactive', '2024-03-07 05:14:16', '2024-03-27 06:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_transaction`
--

CREATE TABLE `supplier_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `particular` varchar(255) DEFAULT NULL,
  `total_qty` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('Active','Inactive') DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier_transaction`
--

INSERT INTO `supplier_transaction` (`id`, `user_id`, `supplier_id`, `supplier_name`, `particular`, `total_qty`, `total_amount`, `transaction_date`, `created_at`, `updated_at`, `status`) VALUES
(1, 108, 1, 'Fazle Rabbi', 'Purchase', 100, 5000.00, '2024-03-10', '2024-03-09 06:24:45', '2024-03-27 07:42:35', 'Active'),
(2, 108, 2, 'Rahim Enterprize', 'Purchase Return', 50, 2500.00, '2024-03-11', '2024-03-09 06:24:45', '2024-03-27 07:42:42', 'Active'),
(3, 108, 3, 'Rahim Enterprize11', 'Purchase', 80, 4000.00, '2024-03-12', '2024-03-09 06:24:45', '2024-03-27 07:42:46', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `user_id`, `unit_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 108, 'First Ten', 'Active', '2024-03-07 00:29:27', '2024-03-07 00:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(111) NOT NULL,
  `name` varchar(191) NOT NULL,
  `username` varchar(255) NOT NULL,
  `shop` varchar(255) NOT NULL,
  `shop_code` varchar(191) NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `zip` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `fax` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_provider` tinyint(10) NOT NULL DEFAULT 0,
  `status` tinyint(10) NOT NULL DEFAULT 0,
  `verification_link` text DEFAULT NULL,
  `email_verified` enum('Yes','No') NOT NULL DEFAULT 'No',
  `affilate_code` text DEFAULT NULL,
  `affilate_income` double NOT NULL DEFAULT 0,
  `shop_name` text DEFAULT NULL,
  `owner_name` text DEFAULT NULL,
  `shop_number` text DEFAULT NULL,
  `shop_address` text DEFAULT NULL,
  `reg_number` text DEFAULT NULL,
  `shop_message` text DEFAULT NULL,
  `shop_details` text DEFAULT NULL,
  `shop_image` varchar(191) DEFAULT NULL,
  `token` longtext NOT NULL,
  `f_url` text DEFAULT NULL,
  `g_url` text DEFAULT NULL,
  `t_url` text DEFAULT NULL,
  `l_url` text DEFAULT NULL,
  `is_vendor` tinyint(1) NOT NULL DEFAULT 0,
  `f_check` tinyint(1) NOT NULL DEFAULT 0,
  `g_check` tinyint(1) NOT NULL DEFAULT 0,
  `t_check` tinyint(1) NOT NULL DEFAULT 0,
  `l_check` tinyint(1) NOT NULL DEFAULT 0,
  `mail_sent` tinyint(1) NOT NULL DEFAULT 0,
  `shipping_cost` double NOT NULL DEFAULT 0,
  `current_balance` double NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `ban` tinyint(1) NOT NULL DEFAULT 0,
  `referral_code` varchar(35) DEFAULT NULL,
  `balance` decimal(11,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `shop`, `shop_code`, `photo`, `zip`, `city`, `country`, `state`, `address`, `phone`, `fax`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `is_provider`, `status`, `verification_link`, `email_verified`, `affilate_code`, `affilate_income`, `shop_name`, `owner_name`, `shop_number`, `shop_address`, `reg_number`, `shop_message`, `shop_details`, `shop_image`, `token`, `f_url`, `g_url`, `t_url`, `l_url`, `is_vendor`, `f_check`, `g_check`, `t_check`, `l_check`, `mail_sent`, `shipping_cost`, `current_balance`, `date`, `ban`, `referral_code`, `balance`) VALUES
(108, 1, 'Sabbir', 'sabbir64', 'Rifat Store', 'CCOMxxxx02', '169518342805c359cd010df3e7f1ea3cb6f6f54fad.jpg', NULL, 'Dhaka', 'Bangladesh', 'lalbagh', 'Dhaka', '01612345678', NULL, 'sabbir@playon24.com.bd', '$2y$10$KPe8JXA.ZW8Z.I02S631IuexAmkvycXO0HPNLZ6O5hem/u.AGgB5m', '1M2j3NtDEdeVig7RLBGIZtmGqsSK1m5dXrolDNUCoVrclyDEo1OJR0xyykCq', '2023-09-17 06:53:45', '2024-03-26 23:22:23', 0, 0, '2e02415490f77b5d9382962f19b1ef2e', 'Yes', '8ed4efabe8200c57a51230d9ee434be7', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODA4MFwvYXBpXC91c2VyXC9sb2dpbiIsImlhdCI6MTcxMTM2MjQwNSwiZXhwIjoxNzExMzY2MDA1LCJuYmYiOjE3MTEzNjI0MDUsImp0aSI6IkVjTGlTYUYyM0N2aUwzdk4iLCJzdWIiOjEwOCwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.BBLbNfX1hf1bKRXh2nPesc8_HVCqAi3JLetTK09cVKk', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0.00),
(113, 3, 'dsas', 'ads', 'dsdssd', 'sdsdds', NULL, 'sdsdsd', 'dsdf', 'ds', 'dfsd', 'ds', '01831370709', NULL, '', '$2y$10$KPe8JXA.ZW8Z.I02S631IuexAmkvycXO0HPNLZ6O5hem/u.AGgB5m', 'VieGF0SlGnqptmNnEClMv1R7YuQIkRqrceuBJs9wp5lOCVnUMfOmQizpOByf', NULL, '2024-04-06 04:56:37', 0, 0, NULL, 'No', NULL, 0, 'dsf', 'dfs', '01831370709', 'dw', 'we', 'ewcd', 'df', NULL, '', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `user_profile_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_journalreport`
--
ALTER TABLE `acc_journalreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_ledger`
--
ALTER TABLE `acc_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adjust_creditsale`
--
ALTER TABLE `adjust_creditsale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_languages`
--
ALTER TABLE `admin_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_flow_report`
--
ALTER TABLE `cash_flow_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissionjournal`
--
ALTER TABLE `commissionjournal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costing_head`
--
ALTER TABLE `costing_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dropped_invoice`
--
ALTER TABLE `dropped_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_delete_history`
--
ALTER TABLE `payment_delete_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_users`
--
ALTER TABLE `pos_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_wise_profit`
--
ALTER TABLE `product_wise_profit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_add`
--
ALTER TABLE `purchase_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_list`
--
ALTER TABLE `purchase_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_info`
--
ALTER TABLE `purchase_order_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_customer`
--
ALTER TABLE `sales_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_item_report`
--
ALTER TABLE `sales_item_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoplist_status`
--
ALTER TABLE `shoplist_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_infos`
--
ALTER TABLE `shop_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_payment_list`
--
ALTER TABLE `shop_payment_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_report`
--
ALTER TABLE `stock_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_summary`
--
ALTER TABLE `stock_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_users`
--
ALTER TABLE `sub_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_phone` (`user_phone`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_due_report`
--
ALTER TABLE `supplier_due_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_payment_history`
--
ALTER TABLE `supplier_payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_transaction`
--
ALTER TABLE `supplier_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_journalreport`
--
ALTER TABLE `acc_journalreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `acc_ledger`
--
ALTER TABLE `acc_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adjust_creditsale`
--
ALTER TABLE `adjust_creditsale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin_languages`
--
ALTER TABLE `admin_languages`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cash_flow_report`
--
ALTER TABLE `cash_flow_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `commissionjournal`
--
ALTER TABLE `commissionjournal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `costing_head`
--
ALTER TABLE `costing_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dropped_invoice`
--
ALTER TABLE `dropped_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `investment`
--
ALTER TABLE `investment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_delete_history`
--
ALTER TABLE `payment_delete_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pos_users`
--
ALTER TABLE `pos_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_wise_profit`
--
ALTER TABLE `product_wise_profit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_add`
--
ALTER TABLE `purchase_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_list`
--
ALTER TABLE `purchase_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_order_info`
--
ALTER TABLE `purchase_order_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_customer`
--
ALTER TABLE `sales_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_item_report`
--
ALTER TABLE `sales_item_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_return`
--
ALTER TABLE `sales_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shoplist_status`
--
ALTER TABLE `shoplist_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_infos`
--
ALTER TABLE `shop_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `shop_payment_list`
--
ALTER TABLE `shop_payment_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_report`
--
ALTER TABLE `stock_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock_summary`
--
ALTER TABLE `stock_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_users`
--
ALTER TABLE `sub_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier_due_report`
--
ALTER TABLE `supplier_due_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier_payment_history`
--
ALTER TABLE `supplier_payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_transaction`
--
ALTER TABLE `supplier_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
