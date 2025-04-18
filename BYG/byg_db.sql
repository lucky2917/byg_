-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2025 at 07:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `byg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `arenas`
--

CREATE TABLE `arenas` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `sports` varchar(255) DEFAULT NULL,
  `image_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arenas`
--

INSERT INTO `arenas` (`id`, `name`, `location`, `sports`, `image_url`) VALUES
(1, 'Chelsea Piers Sports Complex', 'New York, USA', 'Basketball, Ice Hockey, Rock Climbing, Tennis, Soccer, Gymnastics', 'https://www.aisc.org/globalassets/aisc/ideas2/2013/projects/chelsea-piers-connecticut_02.jpg'),
(2, 'LA Fitness Sports Club', 'Los Angeles, USA', 'Basketball, Squash, Swimming, Tennis, Gym, Table Tennis', 'https://cdn.prod.website-files.com/5eea3f3f5595de5dae52ddcb/60b7b3b83a2c444984823b31_la-fitness-miniature.jpg'),
(3, 'O2 Arena Sports Complex', 'London, UK', 'Badminton, Tennis, Volleyball, Basketball, Boxing, Futsal', 'https://upload.wikimedia.org/wikipedia/commons/6/69/O2_Arena.jpg'),
(4, 'Houston Sports Park', 'Houston, USA', 'Football, Baseball, Cricket, Rugby, Basketball', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVElFpUx3UxAh_35U6uBFRQLGrUvFmNJ0ZDg&s'),
(5, 'Beijing National Sports Center', 'Beijing, China', 'Badminton, Table Tennis, Tennis, Volleyball, Archery', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJzlwxb1TIvPTlbg_kb5FCw7dYxG3Docq1kw&s'),
(6, 'Allianz Arena Sports Hub', 'Munich, Germany', 'Football, Rugby, Basketball, Tennis, Athletics', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQubKE6Vh0aB3I20lNqlz-KO7tzmiSKskCDNw&s'),
(7, 'Maracanã Stadium Complex', 'Rio de Janeiro, Brazil', 'Football, Volleyball, Athletics, Tennis, Gym', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfu8Bg3nfHhmGiRkDCBipxJfP0lXjL5d3XWA&s'),
(8, 'Wembley Multi-Sport Arena', 'London, UK', 'Football, Basketball, Badminton, Swimming, Tennis', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtrXGZsmKegX6S2CEwQGQfbY9eKWwsoXyfrA&s'),
(9, 'Madison Square Sports Complex', 'New York, USA', 'Boxing, Basketball, Ice Hockey, Wrestling, Concerts', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR16E6aOqGUoqKvB7izAifGVJbwGOkQhNfAdQ&s'),
(10, 'Suncorp Stadium Arena', 'Brisbane, Australia', 'Rugby, Soccer, Tennis, Athletics, Boxing', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIPPafRRVMkqUWirZjkKEyP-7JqmquuKVHpg&s'),
(11, 'Tokyo Dome Sports Zone', 'Tokyo, Japan', 'Baseball, Martial Arts, Basketball, Gym, Cricket', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwZdXYgQqxIa7oOxaJAkFH-AL8wHQ1G63SZw&s'),
(12, 'Stade de France Arena', 'Paris, France', 'Football, Rugby, Athletics, Basketball, Tennis', 'https://www.webuildvalue.com/wp-content/uploads/2024/06/Stade-de-france2.jpeg'),
(13, 'Melbourne Cricket Ground Arena', 'Melbourne, Australia', 'Cricket, Football, Athletics, Tennis, Rugby', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyds1ogk0wTj_pihX4Zy39mmF3IuOf_o5buA&s'),
(14, 'Kalinga Sports Complex', 'Bhubaneswar, India', 'Hockey, Athletics, Football, Swimming, Gym', 'https://static.toiimg.com/thumb/msid-94742744,width-1280,height-720,resizemode-4/94742744.jpg'),
(15, 'Lusail Sports Arena', 'Lusail, Qatar', 'Football, Tennis, Badminton, Squash, Basketball', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9wQi6iCStz0AqO_Oe0stGVNmH6wHWx3r7SQ&s'),
(16, 'Casablanca Indoor Sports Centre', 'Casablanca, Morocco', 'Basketball, Swimming, Badminton, Volleyball, Tennis', 'https://barkamarina.om/wp-content/uploads/2021/02/Indoor-Sports-1170x694.jpg'),
(17, 'Johannesburg Sports City', 'Johannesburg, South Africa', 'Football, Cricket, Tennis, Badminton, Volleyball', 'https://i.pinimg.com/736x/09/12/09/091209fb7fb3dbda374690ec8b51e643.jpg'),
(18, 'Berlin Velodrom & Sports Arena', 'Berlin, Germany', 'Cycling, Swimming, Basketball, Volleyball, Gym', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTz2pDuIJoptmhEFz4EbCghq9mlITo6Sh3dVg&s'),
(19, 'Bukit Jalil National Sports Complex', 'Kuala Lumpur, Malaysia', 'Football, Athletics, Tennis, Badminton, Hockey', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlxXSuwv7kH23QmWVWZ3IoPDSPpUwp5oGsHQ&s'),
(20, 'Stadio Olimpico Complex', 'Rome, Italy', 'Football, Rugby, Athletics, Swimming, Tennis', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrCXhegvUWMBbpmbOmEMNJT6JLb0A8e6U1qQ&s'),
(21, 'Sparta Prague Sports Arena', 'Prague, Czech Republic', 'Football, Tennis, Gymnastics, Basketball, Ice Hockey', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcy5bwjZWWOkRmGUDSv2O7_ZyE2vLxzCOcuA&s'),
(22, 'Rajiv Gandhi Stadium', 'Hyderabad, India', 'Cricket, Football, Gym, Tennis, Badminton', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-TMX2tQgh7c4qew48u4lHpvOyd9N3oxaFSQ&s'),
(23, 'Salt Lake Stadium Arena', 'Kolkata, India', 'Football, Athletics, Hockey, Gym, Tennis', 'https://imgstaticcontent.lbb.in/lbbnew/wp-content/uploads/2017/10/09183046/salt-lake-stadium-%5E.jpg'),
(24, 'National Arena', 'Bucharest, Romania', 'Football, Athletics, Tennis, Basketball, Rugby', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxr0q1sfLzDq1W3-vFIQJMa0DfFQyd_ww0wQ&s'),
(25, 'Maple Leaf Sports Centre', 'Toronto, Canada', 'Ice Hockey, Basketball, Soccer, Tennis, Volleyball', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHM9el6CTMStMWf42eyBLSy2oRO2jMG_l0Xw&s');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `arena_id` int(11) DEFAULT NULL,
  `facility_name` varchar(255) DEFAULT NULL,
  `sport` varchar(100) DEFAULT NULL,
  `time_slot` varchar(100) DEFAULT NULL,
  `booking_date` date DEFAULT curdate(),
  `price` decimal(10,2) DEFAULT 0.00,
  `addons` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sports_pricing`
--

CREATE TABLE `sports_pricing` (
  `id` int(11) NOT NULL,
  `arena_id` int(11) DEFAULT NULL,
  `sport_name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sports_pricing`
--

INSERT INTO `sports_pricing` (`id`, `arena_id`, `sport_name`, `price`) VALUES
(1, 1, 'Badminton', 133.04),
(2, 1, 'Volleyball', 170.25),
(3, 1, 'Rugby', 187.02),
(4, 1, 'Tennis', 189.54),
(5, 1, 'Gym', 195.17),
(6, 1, 'Boxing', 96.21),
(7, 1, 'Table Tennis', 184.41),
(8, 1, 'Swimming', 88.03),
(9, 2, 'Squash', 156.64),
(10, 2, 'Rugby', 147.44),
(11, 2, 'Table Tennis', 141.54),
(12, 2, 'Cycling', 76.06),
(13, 2, 'Volleyball', 68.40),
(14, 2, 'Tennis', 140.98),
(15, 2, 'Boxing', 189.83),
(16, 2, 'Basketball', 193.60),
(17, 2, 'Badminton', 115.08),
(18, 3, 'Table Tennis', 191.17),
(19, 3, 'Badminton', 191.38),
(20, 3, 'Football', 189.61),
(21, 3, 'Gym', 173.77),
(22, 3, 'Squash', 99.16),
(23, 3, 'Cycling', 147.04),
(24, 3, 'Basketball', 180.09),
(25, 3, 'Athletics', 190.58),
(26, 3, 'Volleyball', 92.57),
(27, 3, 'Rugby', 85.01),
(28, 4, 'Football', 141.78),
(29, 4, 'Squash', 172.11),
(30, 4, 'Swimming', 149.15),
(31, 4, 'Tennis', 196.85),
(32, 4, 'Basketball', 102.36),
(33, 4, 'Cricket', 176.22),
(34, 4, 'Athletics', 149.59),
(35, 4, 'Gym', 164.46),
(36, 5, 'Badminton', 130.39),
(37, 5, 'Gym', 172.90),
(38, 5, 'Boxing', 75.50),
(39, 5, 'Football', 98.59),
(40, 5, 'Basketball', 135.20),
(41, 5, 'Rugby', 149.30),
(42, 5, 'Tennis', 102.82),
(43, 5, 'Swimming', 121.82),
(44, 5, 'Cricket', 91.32),
(45, 5, 'Volleyball', 125.84),
(46, 6, 'Cricket', 158.24),
(47, 6, 'Gym', 77.57),
(48, 6, 'Squash', 180.08),
(49, 6, 'Volleyball', 128.63),
(50, 6, 'Athletics', 107.75),
(51, 6, 'Basketball', 166.05),
(52, 6, 'Rugby', 93.34),
(53, 6, 'Table Tennis', 136.46),
(54, 6, 'Football', 131.59),
(55, 7, 'Volleyball', 72.82),
(56, 7, 'Cricket', 168.03),
(57, 7, 'Boxing', 139.74),
(58, 7, 'Basketball', 198.89),
(59, 7, 'Tennis', 161.93),
(60, 7, 'Gym', 78.66),
(61, 7, 'Squash', 146.16),
(62, 7, 'Cycling', 177.59),
(63, 7, 'Table Tennis', 121.26),
(64, 7, 'Football', 73.95),
(65, 8, 'Cricket', 132.08),
(66, 8, 'Swimming', 100.89),
(67, 8, 'Tennis', 88.20),
(68, 8, 'Badminton', 194.12),
(69, 8, 'Table Tennis', 147.06),
(70, 8, 'Football', 180.43),
(71, 8, 'Rugby', 174.72),
(72, 8, 'Athletics', 159.16),
(73, 8, 'Volleyball', 147.53),
(74, 9, 'Rugby', 70.15),
(75, 9, 'Gym', 163.67),
(76, 9, 'Table Tennis', 72.30),
(77, 9, 'Boxing', 95.86),
(78, 9, 'Badminton', 115.14),
(79, 9, 'Squash', 191.33),
(80, 9, 'Cycling', 159.21),
(81, 9, 'Cricket', 91.77),
(82, 9, 'Football', 147.73),
(83, 9, 'Basketball', 171.04),
(84, 10, 'Cycling', 180.31),
(85, 10, 'Rugby', 149.48),
(86, 10, 'Badminton', 136.68),
(87, 10, 'Athletics', 89.89),
(88, 10, 'Gym', 165.42),
(89, 10, 'Cricket', 62.87),
(90, 10, 'Table Tennis', 198.51),
(91, 10, 'Boxing', 173.65),
(92, 10, 'Football', 71.31),
(93, 11, 'Basketball', 112.59),
(94, 11, 'Gym', 144.95),
(95, 11, 'Boxing', 123.81),
(96, 11, 'Cycling', 187.99),
(97, 11, 'Volleyball', 169.88),
(98, 11, 'Athletics', 68.61),
(99, 11, 'Badminton', 110.89),
(100, 11, 'Table Tennis', 84.31),
(101, 11, 'Tennis', 144.30),
(102, 12, 'Rugby', 86.93),
(103, 12, 'Swimming', 109.55),
(104, 12, 'Squash', 129.80),
(105, 12, 'Cricket', 69.24),
(106, 12, 'Basketball', 193.64),
(107, 12, 'Gym', 172.03),
(108, 12, 'Boxing', 149.86),
(109, 12, 'Football', 96.40),
(110, 13, 'Football', 122.54),
(111, 13, 'Tennis', 185.33),
(112, 13, 'Cricket', 79.67),
(113, 13, 'Table Tennis', 73.80),
(114, 13, 'Athletics', 74.37),
(115, 13, 'Cycling', 68.36),
(116, 13, 'Gym', 124.71),
(117, 13, 'Boxing', 93.37),
(118, 13, 'Basketball', 69.57),
(119, 13, 'Rugby', 81.67),
(120, 14, 'Basketball', 197.39),
(121, 14, 'Tennis', 73.18),
(122, 14, 'Boxing', 74.35),
(123, 14, 'Table Tennis', 179.41),
(124, 14, 'Gym', 172.16),
(125, 14, 'Volleyball', 199.73),
(126, 14, 'Cricket', 87.55),
(127, 14, 'Badminton', 184.95),
(128, 14, 'Cycling', 65.03),
(129, 14, 'Swimming', 113.34),
(130, 15, 'Badminton', 146.19),
(131, 15, 'Tennis', 80.75),
(132, 15, 'Swimming', 149.09),
(133, 15, 'Athletics', 123.71),
(134, 15, 'Cricket', 150.77),
(135, 15, 'Rugby', 75.62),
(136, 15, 'Football', 190.63),
(137, 15, 'Cycling', 125.64),
(138, 15, 'Table Tennis', 170.13),
(139, 15, 'Boxing', 198.11),
(140, 16, 'Badminton', 178.86),
(141, 16, 'Football', 107.25),
(142, 16, 'Cycling', 168.54),
(143, 16, 'Athletics', 185.60),
(144, 16, 'Tennis', 173.45),
(145, 16, 'Rugby', 114.95),
(146, 16, 'Gym', 86.99),
(147, 16, 'Swimming', 96.71),
(148, 16, 'Squash', 165.46),
(149, 17, 'Football', 182.50),
(150, 17, 'Boxing', 194.43),
(151, 17, 'Gym', 118.82),
(152, 17, 'Athletics', 144.50),
(153, 17, 'Tennis', 94.02),
(154, 17, 'Cycling', 190.97),
(155, 17, 'Cricket', 191.39),
(156, 17, 'Volleyball', 160.85),
(157, 17, 'Squash', 163.58),
(158, 18, 'Table Tennis', 127.40),
(159, 18, 'Rugby', 62.47),
(160, 18, 'Badminton', 170.27),
(161, 18, 'Football', 139.77),
(162, 18, 'Cycling', 80.91),
(163, 18, 'Squash', 183.99),
(164, 18, 'Athletics', 196.61),
(165, 18, 'Boxing', 178.80),
(166, 19, 'Gym', 72.12),
(167, 19, 'Swimming', 172.38),
(168, 19, 'Football', 155.53),
(169, 19, 'Tennis', 67.10),
(170, 19, 'Squash', 170.99),
(171, 19, 'Cricket', 186.12),
(172, 19, 'Athletics', 64.57),
(173, 19, 'Boxing', 81.85),
(174, 19, 'Volleyball', 71.49),
(175, 20, 'Cycling', 155.82),
(176, 20, 'Football', 76.47),
(177, 20, 'Boxing', 120.99),
(178, 20, 'Rugby', 81.74),
(179, 20, 'Badminton', 199.11),
(180, 20, 'Athletics', 85.50),
(181, 20, 'Squash', 192.18),
(182, 20, 'Table Tennis', 112.62),
(183, 20, 'Swimming', 109.90),
(184, 21, 'Gym', 145.86),
(185, 21, 'Athletics', 179.96),
(186, 21, 'Badminton', 96.44),
(187, 21, 'Tennis', 132.18),
(188, 21, 'Basketball', 156.46),
(189, 21, 'Cycling', 115.43),
(190, 21, 'Rugby', 75.38),
(191, 21, 'Squash', 167.41),
(192, 22, 'Table Tennis', 136.07),
(193, 22, 'Football', 184.65),
(194, 22, 'Badminton', 167.34),
(195, 22, 'Cycling', 144.04),
(196, 22, 'Basketball', 117.74),
(197, 22, 'Athletics', 69.95),
(198, 22, 'Swimming', 71.31),
(199, 22, 'Cricket', 180.38),
(200, 23, 'Tennis', 145.04),
(201, 23, 'Squash', 155.72),
(202, 23, 'Cycling', 65.72),
(203, 23, 'Table Tennis', 108.33),
(204, 23, 'Football', 117.72),
(205, 23, 'Gym', 63.59),
(206, 23, 'Rugby', 77.79),
(207, 23, 'Cricket', 143.82),
(208, 23, 'Volleyball', 174.20),
(209, 23, 'Athletics', 122.52),
(210, 24, 'Basketball', 197.78),
(211, 24, 'Cricket', 166.02),
(212, 24, 'Table Tennis', 167.64),
(213, 24, 'Rugby', 103.40),
(214, 24, 'Volleyball', 100.57),
(215, 24, 'Badminton', 159.76),
(216, 24, 'Cycling', 192.80),
(217, 24, 'Athletics', 148.36),
(218, 25, 'Badminton', 149.77),
(219, 25, 'Table Tennis', 199.78),
(220, 25, 'Boxing', 149.12),
(221, 25, 'Gym', 138.17),
(222, 25, 'Rugby', 92.70),
(223, 25, 'Cycling', 148.89),
(224, 25, 'Basketball', 172.92),
(225, 25, 'Athletics', 125.54),
(226, 25, 'Volleyball', 169.10),
(227, 25, 'Tennis', 121.51);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `otp` varchar(10) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arenas`
--
ALTER TABLE `arenas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `arena_id` (`arena_id`);

--
-- Indexes for table `sports_pricing`
--
ALTER TABLE `sports_pricing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arena_id` (`arena_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arenas`
--
ALTER TABLE `arenas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sports_pricing`
--
ALTER TABLE `sports_pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`arena_id`) REFERENCES `arenas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sports_pricing`
--
ALTER TABLE `sports_pricing`
  ADD CONSTRAINT `sports_pricing_ibfk_1` FOREIGN KEY (`arena_id`) REFERENCES `arenas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
