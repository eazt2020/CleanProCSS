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

INSERT INTO `config_call_type` (`id`, `name`) VALUES
(100001, 'incoming call'),
(100002, 'outgoing call');

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

INSERT INTO `config_machine_status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'inactive'),
(3, 'maintenance');

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

INSERT INTO `config_machine_type` (`id`, `type`, `imageName`) VALUES
(10001, 'vending machine with coin exchange', 'vm.gif'),
(10002, 'coin exchange machine', 'cx.gif'),
(10003, 'message chair', 'ms.gif'),
(10004, 'wifi', 'wf.gif'),
(10005, 'kiosk machine', 'km.gif'),
(10006, 'drink vending machine', 'dv.gif'),
(10007, 'touch the sky', 'ts.gif'),
(10008, 'dileka water', 'dw.gif'),
(10009, 'washer machine', 'wm.png'),
(10010, 'dryer machine', 'dr.png'),
(10011, 'stack dryer machine', 'sd.png'),
(10012, 'snack vending machine', 'sm.png'),
(10013, 'alarm', 'alarm.png'),
(10014, 'miscellaneous', 'misc.png');

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

--
-- Dumping data for table `config_sessions`
--

INSERT INTO `config_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('0c33825dc7b774b18ec73824f5ef3b83f6398e1d', '::1', 1453186615, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('15cd47ff0c51adaece313ca0b21d13d6b19db4c9', '::1', 1455105341, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('19044fcb7cc2d0d43eb883ef4205aaaa3563d111', '::1', 1453105407, ''),
('250db8717694150a820508da4623a5fcbf815c98', '::1', 1455155156, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('2d5d22c52d401603b5abb27607d40f73700d97ad', '::1', 1453091864, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('3b9eaf7a227ba9ae8ffdc0a6866e8b770d4d1463', '::1', 1454995173, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('42f79257d87ec4fd1d6aa6bc388c90b64d4bd967', '::1', 1453105656, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('584afd5d3ec0780343a84cf3b6267d4ca517b789', '::1', 1453105344, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('66fecf89f8b0bfc1b74de2379883282e5b5dddc5', '::1', 1453066619, ''),
('670b1a399a94fe303d2fb8c6694d7d25ebb85abb', '::1', 1453103936, ''),
('679d0665822fd136f60b7816f6a931516cd5b49a', '::1', 1453108123, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('67e30bf48a1b5c41a044b8fd3f07e48b0b606173', '::1', 1453104486, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('7a3aa0393ccecf39143e137023561e465abd6736', '127.0.0.1', 1453046998, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('8ce2f4e3b3bcd6ec99604db5adab383dcc0d19f2', '::1', 1453104613, ''),
('a34048640271778422ef32303ea8aac8b04af294', '::1', 1453070530, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('aa5c426fd22309d2ed740946012626e9e747a31c', '::1', 1453104613, ''),
('b04982ecf579aaf488f55e9b8d01b86454992939', '::1', 1453104963, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('b49c1fc2b7363873c713ffc8c00caf57b9dac44a', '::1', 1453066619, ''),
('bc2efdaa626bc2d8960e204e49ba7c74cc9d1458', '::1', 1453105408, ''),
('bd93013f683b97047d02265feb58cec5b807b306', '::1', 1455106598, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('bdbdfe26ae2b3653442a4a3a4fb113308bd1dd9c', '::1', 1453069877, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('d2708e21f15c941b620f17469b8d7b209bc503bd', '::1', 1454288948, 0x7569647c733a383a2269736b616e646172223b7069647c733a33323a223938313232366434316130646538336534663262646538363938346531613263223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a32353a2269736b616e64617220736861682062696e2073616964696e61223b),
('d9ddb51a02264c2a51850604d498651b3a48f087', '::1', 1454949178, 0x7569647c733a353a2261646d696e223b7069647c733a33323a223664623666383965653731353164623830616338383731323532373333373365223b69734c6f67676564496e7c623a313b66756c6c6e616d657c733a31333a2261646d696e6973747261746f72223b),
('e2b34e3729377127f5914b7a765dc85de2d2b9b9', '::1', 1453104555, ''),
('f1490bf633c632b63b30b0f6c3eaeca0c0356b97', '::1', 1453066720, '');

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

INSERT INTO `config_state` (`id`, `name`) VALUES
(4, 'johor'),
(5, 'kedah'),
(6, 'kelantan'),
(1, 'kuala lumpur'),
(2, 'labuan'),
(7, 'melaka'),
(8, 'negeri sembilan'),
(9, 'pahang'),
(10, 'perak'),
(11, 'perlis'),
(12, 'pulau pinang'),
(3, 'putrajaya'),
(13, 'sabah'),
(14, 'sarawak'),
(15, 'selangor'),
(16, 'terengganu');

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

INSERT INTO `config_system_alert` (`id`, `name`) VALUES
(1001, 'primary'),
(1002, 'success'),
(1003, 'info'),
(1004, 'warning'),
(1005, 'danger'),
(1006, 'system'),
(1007, 'alert');

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

INSERT INTO `config_system_faq` (`id`, `name`, `content`, `userArc`, `dateArc`) VALUES
('1.0.0', 'dashboard screen', '', '', ''),
('1.1.0', 'company listing screen', '', '', ''),
('1.1.1', 'company details screen', '', '', ''),
('1.2.0', 'outlet listing screen', '', '', ''),
('1.2.1', 'outlet details screen', '', '', ''),
('1.3.0', 'machine listing screen', '', '', ''),
('1.3.1', 'machine details screen', '', '', ''),
('1.4.0', 'ticket listing screen', '', '', ''),
('1.4.1', 'ticket details screen', '', '', ''),
('1.5.0', 'report listing screen', '', '', ''),
('3.2.0', 'notification listing screen', '', '', ''),
('3.2.1', 'notification details screen', '', '', ''),
('3.3.0', 'error code listing screen', '', '', ''),
('3.3.1', 'error code details screen', '', '', ''),
('3.4.0', 'system users listing screen', '', '', ''),
('3.4.1', 'system user details screen', '', '', ''),
('3.5.0', 'role listing screen', '', '', ''),
('3.6.0', 'faq listing screen', '', '', ''),
('3.6.1', 'faq details screen', '', '', '');

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

INSERT INTO `config_system_info` (`id`, `name`, `value`) VALUES
(1001, 'version', '1.0'),
(1002, 'core', 'ci-3.0.3'),
(1003, 'header', 'CleanProCSS 1.0'),
(1004, 'buildid', '20160115-core');

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

INSERT INTO `config_system_kb` (`id`, `description`, `dateArc`) VALUES
(1, '20160115-core-alpha-20160115-fr-ui01', ''),
(2, '20160115-core-alpha-20160115-fr-ui02', ''),
(3, '20160115-core-alpha-20160118-hf-ui01', ''),
(4, '20160115-core-alpha-20160118-fr-ui01', ''),
(5, '20160115-core-alpha-20160118-hf-ui02', '');

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

INSERT INTO `config_ticket_status` (`id`, `name`) VALUES
(100002, 'close'),
(100001, 'open'),
(100003, 'pending');

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

INSERT INTO `identities` (`id`, `username`, `name`, `email`, `status`, `userArc`, `dateArc`) VALUES
(1003, 'admin', 'administrator', 'eazt2020@gmail.com', '1', 'eazt2020', '1453066999');

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

INSERT INTO `local_identities` (`id`, `secret`, `encrypt`, `role`, `userArc`, `dateArc`) VALUES
(1003, '6db6f89ee7151db80ac887125273373e', 'YWRtaW4=', 1002, 'eazt2020', '1453066999');

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

INSERT INTO `privilege` (`id`, `roleId`, `screen`, `value`, `userArc`, `dateArc`) VALUES
(1198, '1002', '1.0.0', 'crud', 'admin', '1453066798'),
(1199, '1002', '1.1.0', 'rcud', 'admin', '1453066798'),
(1200, '1002', '1.2.0', 'rcud', 'admin', '1453066798'),
(1201, '1002', '1.3.0', 'rcud', 'admin', '1453066798'),
(1202, '1002', '1.4.0', 'rcud', 'admin', '1453066798'),
(1203, '1002', '3.1.0', 'crud', 'admin', '1453066798'),
(1204, '1002', '3.2.0', 'rcud', 'admin', '1453066798'),
(1205, '1002', '3.3.0', 'rcud', 'admin', '1453066798'),
(1206, '1002', '3.4.0', 'rcud', 'admin', '1453066798'),
(1207, '1002', '3.5.0', 'rcud', 'admin', '1453066798'),
(1208, '1002', '1.5.0', 'r', 'admin', '1453066798'),
(1209, '1002', '3.6.0', 'rcud', 'admin', '1453066798'),
(1210, '1002', '1.6.0', 'crud', 'admin', '1453066798');

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

INSERT INTO `roles` (`id`, `name`, `userArc`, `dateArc`) VALUES
(1002, 'root access', 'admin', '1453066798');

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
  `userCr` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100077;
--
-- AUTO_INCREMENT for table `config_machine_status`
--
ALTER TABLE `config_machine_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `config_machine_type`
--
ALTER TABLE `config_machine_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10015;
--
-- AUTO_INCREMENT for table `config_notification`
--
ALTER TABLE `config_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `config_ticket_status`
--
ALTER TABLE `config_ticket_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100004;
--
-- AUTO_INCREMENT for table `identities`
--
ALTER TABLE `identities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;
--
-- AUTO_INCREMENT for table `local_identities`
--
ALTER TABLE `local_identities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;
--
-- AUTO_INCREMENT for table `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1224;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
