-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 10:51 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repairshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `payment_method` int(11) NOT NULL,
  `service_type` int(11) NOT NULL,
  `submitted_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `name`, `email`, `date`, `payment_method`, `service_type`, `submitted_on`) VALUES
(26, 1, 'fdsdfg', 'dfgsdfg', '2022-03-23 17:46:00', 2, 7, '2022-03-12 07:36:55'),
(27, 1, 'tuyjbrehdtgf', 'gfdsvsrth', '0674-04-05 12:03:00', 1, 4, '2022-03-12 07:36:55'),
(28, 1, 'dsfgsfghfdg', 'fghdfghdfgh', '2022-03-12 18:57:00', 1, 3, '2022-03-12 07:36:55'),
(29, 1, 'fdghsdfgdfgdf', 'fghvtjfgbnfgb', '0735-06-05 16:35:00', 1, 5, '2022-03-12 07:37:22'),
(30, 4, 'dfgsdfg', 'dfgsdfg', '2022-03-12 17:06:00', 1, 4, '2022-03-12 09:37:35'),
(31, 1, 'fdgdsfgsdgf', 'dfgsdfgsdfg', '2022-03-16 15:53:00', 2, 2, '2022-03-12 09:38:11'),
(32, 1, 'gsdfgsdfgsdfg', 'gfhsdfgsdfg', '0543-03-04 17:46:00', 2, 2, '2022-03-12 09:38:20'),
(33, 1, 'fgsdfgdfgsdfgers', 'rthberthb', '0045-04-05 16:56:00', 1, 2, '2022-03-12 09:38:30'),
(34, 1, 'gfhbfgdhbdrg', 'rtbhdrthbr', '2007-07-05 17:46:00', 2, 5, '2022-03-12 09:38:46');

-- --------------------------------------------------------

--
-- Stand-in structure for view `appointments_processed`
-- (See below for the actual view)
--
CREATE TABLE `appointments_processed` (
`id` int(11)
,`user_id` int(11)
,`name` varchar(128)
,`email` varchar(128)
,`date` datetime
,`payment_method` int(11)
,`service_type` int(11)
,`submitted_on` timestamp
,`service_type_name` varchar(128)
,`payment_method_name` varchar(32)
);

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `name`) VALUES
(1, 'Cash'),
(2, 'Credit');

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `name`) VALUES
(2, 'Ice Maker'),
(3, 'Repair inverter Ref and Aircon units'),
(4, 'LED, LCD, PLASMA, UHTV, TV'),
(5, 'Car aircon'),
(6, 'Fully auto washing machines'),
(7, 'Installation'),
(8, 'Troubleshooting and Repairs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `register_date` date DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `address` varchar(256) NOT NULL,
  `contactno` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `firstname`, `lastname`, `register_date`, `email`, `address`, `contactno`) VALUES
(1, 'admin', '1234', 4, 'John', 'Doe', '2022-03-09', 'test@test.com', '1234, Street, City, Country', '0123456789'),
(4, 'user', '1234', 3, 'Jane', 'Doe', '2022-03-09', '', '', ''),
(5, 'test', '1234', 3, 'asdfasdf', 'fghfdghdfgh', '2022-03-09', '', '', ''),
(6, 'avdsfasdf', 'fghfdhfdgh', 3, 'sdfgsetrgse', 'fgdhdfghdfgh', '2022-03-09', '', '', ''),
(7, 'fsdgsdfgsdfgsertg', 'gfhfdgsdfg', 3, 'gfbsrghfghb', 'fgbndfgbfb', '2022-03-09', '', '', ''),
(8, 'ghdsfgvhdfth', 'hfgbvdtgjhdf', 3, 'fghbdrthjdfgh', 'dfghdfghdfgh', '2022-03-09', '', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_processed`
-- (See below for the actual view)
--
CREATE TABLE `users_processed` (
`id` int(11)
,`username` varchar(32)
,`password` varchar(32)
,`type` int(11)
,`firstname` varchar(32)
,`lastname` varchar(32)
,`register_date` date
,`email` varchar(128)
,`address` varchar(256)
,`contactno` varchar(16)
,`full_name` varchar(65)
,`type_name` varchar(16)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(4, 'Administrator'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Structure for view `appointments_processed`
--
DROP TABLE IF EXISTS `appointments_processed`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `appointments_processed`  AS SELECT `appointments`.`id` AS `id`, `appointments`.`user_id` AS `user_id`, `appointments`.`name` AS `name`, `appointments`.`email` AS `email`, `appointments`.`date` AS `date`, `appointments`.`payment_method` AS `payment_method`, `appointments`.`service_type` AS `service_type`, `appointments`.`submitted_on` AS `submitted_on`, `service_types`.`name` AS `service_type_name`, `payment_modes`.`name` AS `payment_method_name` FROM ((`appointments` join `service_types` on(`appointments`.`service_type` = `service_types`.`id`)) join `payment_modes` on(`appointments`.`payment_method` = `payment_modes`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `users_processed`
--
DROP TABLE IF EXISTS `users_processed`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_processed`  AS SELECT `users`.`id` AS `id`, `users`.`username` AS `username`, `users`.`password` AS `password`, `users`.`type` AS `type`, `users`.`firstname` AS `firstname`, `users`.`lastname` AS `lastname`, `users`.`register_date` AS `register_date`, `users`.`email` AS `email`, `users`.`address` AS `address`, `users`.`contactno` AS `contactno`, concat(`users`.`firstname`,' ',`users`.`lastname`) AS `full_name`, `user_type`.`name` AS `type_name` FROM (`users` join `user_type` on(`users`.`type` = `user_type`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appn` (`payment_method`),
  ADD KEY `srv` (`service_type`),
  ADD KEY `usr` (`user_id`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
