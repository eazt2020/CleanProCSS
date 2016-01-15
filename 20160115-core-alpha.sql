-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2016 at 07:13 PM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleanpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `regNo` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `contact` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `primeAdd` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `secondAdd` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `city` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `state` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `postcode` varchar(11) COLLATE latin1_general_ci DEFAULT NULL,
  `userArc` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config_call_type`
--

CREATE TABLE `config_call_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `config_call_type`
--

INSERT INTO `config_call_type` VALUES(100001, 'incoming call');
INSERT INTO `config_call_type` VALUES(100002, 'outgoing call');

-- --------------------------------------------------------

--
-- Table structure for table `config_machine_error`
--

CREATE TABLE `config_machine_error` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `userArc` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `config_machine_error`
--

INSERT INTO `config_machine_error` VALUES(100001, 'coins jammed in machine', 'admin', '1452746790');
INSERT INTO `config_machine_error` VALUES(100002, 'VM Coin Changer No Coins (RL with Bal)', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100003, 'vm coin changer errors (rl with 0 bal)', 'admin', '1452412408');
INSERT INTO `config_machine_error` VALUES(100004, 'Washing Machine Errors', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100005, 'Customers Errors', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100006, 'Shop Errors', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100007, 'Detergent / Softener OOS', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100008, 'Detergent / Softerner Machine Error', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100009, 'Customers Complaints & Feedbacks', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100010, 'Others', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100011, 'Dryer Machine Error', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100012, 'PIC not responding', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100013, 'Coin Changer No Coins (Not VM RL with Bal)', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100014, 'Coin Changer Errors (Not VM RL with Bal)', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100015, 'GST', NULL, NULL);
INSERT INTO `config_machine_error` VALUES(100016, 'SKY Card', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `config_machine_status`
--

CREATE TABLE `config_machine_status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `config_machine_status`
--

INSERT INTO `config_machine_status` VALUES(1, 'active');
INSERT INTO `config_machine_status` VALUES(2, 'inactive');
INSERT INTO `config_machine_status` VALUES(3, 'maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `config_machine_type`
--

CREATE TABLE `config_machine_type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `imageName` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `config_machine_type`
--

INSERT INTO `config_machine_type` VALUES(10001, 'vending machine with coin exchange', 'vm.gif');
INSERT INTO `config_machine_type` VALUES(10002, 'coin exchange machine', 'cx.gif');
INSERT INTO `config_machine_type` VALUES(10003, 'message chair', 'ms.gif');
INSERT INTO `config_machine_type` VALUES(10004, 'wifi', 'wf.gif');
INSERT INTO `config_machine_type` VALUES(10005, 'kiosk machine', 'km.gif');
INSERT INTO `config_machine_type` VALUES(10006, 'drink vending machine', 'dv.gif');
INSERT INTO `config_machine_type` VALUES(10007, 'touch the sky', 'ts.gif');
INSERT INTO `config_machine_type` VALUES(10008, 'dileka water', 'dw.gif');
INSERT INTO `config_machine_type` VALUES(10009, 'washer machine', 'wm.png');
INSERT INTO `config_machine_type` VALUES(10010, 'dryer machine', 'dr.png');

-- --------------------------------------------------------

--
-- Table structure for table `config_notification`
--

CREATE TABLE `config_notification` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` text COLLATE latin1_general_ci NOT NULL,
  `sev` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `valid` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `userArc` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config_sessions`
--

CREATE TABLE `config_sessions` (
  `id` varchar(40) COLLATE latin1_general_ci NOT NULL,
  `ip_address` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `config_state`
--

CREATE TABLE `config_state` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `config_state`
--

INSERT INTO `config_state` VALUES(4, 'johor');
INSERT INTO `config_state` VALUES(5, 'kedah');
INSERT INTO `config_state` VALUES(6, 'kelantan');
INSERT INTO `config_state` VALUES(1, 'kuala lumpur');
INSERT INTO `config_state` VALUES(2, 'labuan');
INSERT INTO `config_state` VALUES(7, 'melaka');
INSERT INTO `config_state` VALUES(8, 'negeri sembilan');
INSERT INTO `config_state` VALUES(9, 'pahang');
INSERT INTO `config_state` VALUES(10, 'perak');
INSERT INTO `config_state` VALUES(11, 'perlis');
INSERT INTO `config_state` VALUES(12, 'pulau pinang');
INSERT INTO `config_state` VALUES(3, 'putrajaya');
INSERT INTO `config_state` VALUES(13, 'sabah');
INSERT INTO `config_state` VALUES(14, 'sarawak');
INSERT INTO `config_state` VALUES(15, 'selangor');
INSERT INTO `config_state` VALUES(16, 'terengganu');

-- --------------------------------------------------------

--
-- Table structure for table `config_system_alert`
--

CREATE TABLE `config_system_alert` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `config_system_alert`
--

INSERT INTO `config_system_alert` VALUES(1001, 'primary');
INSERT INTO `config_system_alert` VALUES(1002, 'success');
INSERT INTO `config_system_alert` VALUES(1003, 'info');
INSERT INTO `config_system_alert` VALUES(1004, 'warning');
INSERT INTO `config_system_alert` VALUES(1005, 'danger');
INSERT INTO `config_system_alert` VALUES(1006, 'system');
INSERT INTO `config_system_alert` VALUES(1007, 'alert');

-- --------------------------------------------------------

--
-- Table structure for table `config_system_faq`
--

CREATE TABLE `config_system_faq` (
  `id` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `content` text COLLATE latin1_general_ci NOT NULL,
  `userArc` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `config_system_faq`
--

INSERT INTO `config_system_faq` VALUES('1.0.0', 'dashboard screen', '', 'admin', '1452630281');
INSERT INTO `config_system_faq` VALUES('1.1.0', 'company listing screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('1.1.1', 'company details screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('1.2.0', 'outlet listing screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('1.2.1', 'outlet details screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('1.3.0', 'machine listing screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('1.3.1', 'machine details screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('1.4.0', 'ticket listing screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('1.4.1', 'ticket details screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('1.5.0', 'report listing screen', '', 'admin', '1452705492');
INSERT INTO `config_system_faq` VALUES('3.2.0', 'notification listing screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('3.2.1', 'notification details screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('3.3.0', 'error code listing screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('3.3.1', 'error code details screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('3.4.0', 'system users listing screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('3.4.1', 'system user details screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('3.5.0', 'role listing screen', '', '', '');
INSERT INTO `config_system_faq` VALUES('3.6.0', 'faq listing screen', '', 'admin', '1452618021');
INSERT INTO `config_system_faq` VALUES('3.6.1', 'faq details screen', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `config_system_info`
--

CREATE TABLE `config_system_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `value` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `config_system_info`
--

INSERT INTO `config_system_info` VALUES(1001, 'version', '20160115-core-alpha');
INSERT INTO `config_system_info` VALUES(1002, 'core', 'ci-3.0.3');
INSERT INTO `config_system_info` VALUES(1003, 'header', 'CleanProCSS-Alpha-160115');
INSERT INTO `config_system_info` VALUES(1004, 'buildid', '20160115-core');

-- --------------------------------------------------------

--
-- Table structure for table `config_system_kb`
--

CREATE TABLE `config_system_kb` (
  `id` int(11) NOT NULL,
  `description` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `config_system_kb`
--

INSERT INTO `config_system_kb` VALUES(1, '20160115-core-alpha-20160115-fr-ui01', '');

-- --------------------------------------------------------

--
-- Table structure for table `config_ticket_status`
--

CREATE TABLE `config_ticket_status` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `config_ticket_status`
--

INSERT INTO `config_ticket_status` VALUES(100002, 'close');
INSERT INTO `config_ticket_status` VALUES(100001, 'open');
INSERT INTO `config_ticket_status` VALUES(100003, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `identities`
--

CREATE TABLE `identities` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `status` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `userArc` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `identities`
--

INSERT INTO `identities` VALUES(1001, 'admin', 'administrator', 'eazt2020@gmail.com', '1', 'admin', '1452856177');

-- --------------------------------------------------------

--
-- Table structure for table `local_identities`
--

CREATE TABLE `local_identities` (
  `id` int(11) NOT NULL,
  `secret` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `encrypt` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `userArc` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `local_identities`
--

INSERT INTO `local_identities` VALUES(1001, '6db6f89ee7151db80ac887125273373e', 'YWRtaW4=', 1001, 'admin', '1452856177');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` int(11) NOT NULL,
  `machNo` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `outletId` int(11) NOT NULL,
  `compId` int(11) NOT NULL,
  `type` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `status` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `userArc` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` int(11) NOT NULL,
  `compId` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `contact` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `primeAdd` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `secondAdd` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `city` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `state` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `postcode` varchar(11) COLLATE latin1_general_ci DEFAULT NULL,
  `userArc` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE `privilege` (
  `id` int(11) NOT NULL,
  `roleId` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `screen` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `value` varchar(11) COLLATE latin1_general_ci DEFAULT NULL,
  `userArc` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` VALUES(1001, '1001', '1.1.0', 'crud', '', '');
INSERT INTO `privilege` VALUES(1002, '1001', '1.2.0', 'crud', '', '');
INSERT INTO `privilege` VALUES(1003, '1001', '1.3.0', 'crud', '', '');
INSERT INTO `privilege` VALUES(1004, '1001', '1.4.0', 'crud', '', '');
INSERT INTO `privilege` VALUES(1005, '1001', '1.5.0', 'crud', '', '');
INSERT INTO `privilege` VALUES(1006, '1001', '1.6.0', 'crud', '', '');
INSERT INTO `privilege` VALUES(1007, '1001', '3.2.0', 'crud', '', '');
INSERT INTO `privilege` VALUES(1008, '1001', '3.3.0', 'crud', '', '');
INSERT INTO `privilege` VALUES(1009, '1001', '3.4.0', 'crud', '', '');
INSERT INTO `privilege` VALUES(1010, '1001', '3.5.0', 'crud', '', '');
INSERT INTO `privilege` VALUES(1173, '1001', '3.6.0', 'crud', 'admin', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `userArc` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` VALUES(1001, 'administrator', 'admin', '1452470913');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(50) NOT NULL,
  `compId` int(50) NOT NULL,
  `outletId` int(50) NOT NULL,
  `machId` int(50) NOT NULL,
  `crDate` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `name` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `contact` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `callType` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `error` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `status` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `amount` decimal(65,2) DEFAULT NULL,
  `remark` text COLLATE latin1_general_ci,
  `bankAc` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ref` text COLLATE latin1_general_ci,
  `pic` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `refund` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `userArc` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `dateArc` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_call_type`
--
ALTER TABLE `config_call_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_machine_error`
--
ALTER TABLE `config_machine_error`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_machine_status`
--
ALTER TABLE `config_machine_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Indexes for table `config_machine_type`
--
ALTER TABLE `config_machine_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `config_notification`
--
ALTER TABLE `config_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_sessions`
--
ALTER TABLE `config_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `config_state`
--
ALTER TABLE `config_state`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `config_system_alert`
--
ALTER TABLE `config_system_alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_system_faq`
--
ALTER TABLE `config_system_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_system_info`
--
ALTER TABLE `config_system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_system_kb`
--
ALTER TABLE `config_system_kb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_ticket_status`
--
ALTER TABLE `config_ticket_status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `identities`
--
ALTER TABLE `identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `local_identities`
--
ALTER TABLE `local_identities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config_call_type`
--
ALTER TABLE `config_call_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100003;
--
-- AUTO_INCREMENT for table `config_machine_error`
--
ALTER TABLE `config_machine_error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100017;
--
-- AUTO_INCREMENT for table `config_machine_status`
--
ALTER TABLE `config_machine_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `config_machine_type`
--
ALTER TABLE `config_machine_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;
--
-- AUTO_INCREMENT for table `config_notification`
--
ALTER TABLE `config_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `config_state`
--
ALTER TABLE `config_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `config_system_alert`
--
ALTER TABLE `config_system_alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;
--
-- AUTO_INCREMENT for table `config_system_info`
--
ALTER TABLE `config_system_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;
--
-- AUTO_INCREMENT for table `config_system_kb`
--
ALTER TABLE `config_system_kb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `config_ticket_status`
--
ALTER TABLE `config_ticket_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100004;
--
-- AUTO_INCREMENT for table `identities`
--
ALTER TABLE `identities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
--
-- AUTO_INCREMENT for table `local_identities`
--
ALTER TABLE `local_identities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1196;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
