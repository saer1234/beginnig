-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 05:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `add-items`
--

CREATE TABLE `add-items` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add-rooms`
--

CREATE TABLE `add-rooms` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allocate`
--

CREATE TABLE `allocate` (
  `ID` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `Number_clients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books_rooms`
--

CREATE TABLE `books_rooms` (
  `client_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books_rooms`
--

INSERT INTO `books_rooms` (`client_id`, `room_id`, `date_in`, `date_out`) VALUES
(1, 5, '2023-04-09', '2023-04-13'),
(2, 5, '2023-04-14', '2023-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(70) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID`, `username`, `password`, `phone`, `email`, `city`, `zipCode`, `address`, `status`, `img`) VALUES
(1, 'saer', '65517ef276cc627eebb0a309e1207995', '70309743', '51930540@students.liu.edu.lb', 'batron', 0, 'hery', 'offline', 'profileImage/clienticon/oracle_dota_2.webp'),
(2, 'saer2', '65517ef276cc627eebb0a309e1207995', '70309743', '51930540@students.liu.edu.lb', 'batron', 0, 'hery', 'offline', '');

-- --------------------------------------------------------

--
-- Table structure for table `clienthassubmessage`
--

CREATE TABLE `clienthassubmessage` (
  `client_ID` int(11) NOT NULL,
  `subMessage_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_website`
--

CREATE TABLE `content_website` (
  `ID` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `url_image` varchar(600) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `edit`
--

CREATE TABLE `edit` (
  `ID` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `Note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `city` varchar(70) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `address` varchar(600) NOT NULL,
  `status` varchar(40) NOT NULL,
  `email` varchar(244) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `username`, `password`, `phone`, `city`, `zipCode`, `address`, `status`, `email`, `img`) VALUES
(1, 'nader', '65517ef276cc627eebb0a309e1207995', '70309743', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price_per_user` double DEFAULT NULL,
  `number_user` int(11) DEFAULT NULL,
  `img` varchar(200) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status_event` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `name`, `price_per_user`, `number_user`, `img`, `description`, `status_event`) VALUES
(1, 'dsaf', 44677, 100, 'icon/event.jpg', 'ther alot of people like to drink vodka', 'setOnMain'),
(2, 'sadf45678', 2357, 1000, 'icon/profile.png', 'the last event before starting Spring my friends', 'setOnMain'),
(3, 'df23gfa', 2357, 1000, 'icon/profile.png', 'the last event before starting Spring my friends', 'setOnMain'),
(4, 'naderisnoob', 2357, 1000, 'icon/profile.png', 'the last event before starting Spring my friends', 'notOnMain');

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

CREATE TABLE `garage` (
  `ID` int(11) NOT NULL,
  `Number_place` int(11) DEFAULT NULL,
  `status_place` tinyint(1) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `it`
--

CREATE TABLE `it` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `city` varchar(65) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `it`
--

INSERT INTO `it` (`ID`, `username`, `password`, `phone`, `email`, `city`, `zipCode`, `address`, `status`, `img`) VALUES
(1, 'it', '65517ef276cc627eebb0a309e1207995', '70309743', '51930540@students.liu.edu.lb', 'tripoli', 505, 'mina', 'online', 'icon/download.png');

-- --------------------------------------------------------

--
-- Table structure for table `ithassubmessage`
--

CREATE TABLE `ithassubmessage` (
  `it_ID` int(11) NOT NULL,
  `subMessage_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itmanageclient`
--

CREATE TABLE `itmanageclient` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `It_id` int(11) NOT NULL,
  `note` int(200) NOT NULL,
  `date` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itmanageemployee`
--

CREATE TABLE `itmanageemployee` (
  `ID` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `It_id` int(11) NOT NULL,
  `action` varchar(300) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itmanagemanager`
--

CREATE TABLE `itmanagemanager` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `It_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `behavior` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managegarage`
--

CREATE TABLE `managegarage` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `garage_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `Note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `status` varchar(40) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managermanageclient`
--

CREATE TABLE `managermanageclient` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `note` varchar(300) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managermanageemployee`
--

CREATE TABLE `managermanageemployee` (
  `ID` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `action` int(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mangerhassubmessage`
--

CREATE TABLE `mangerhassubmessage` (
  `manager_ID` int(11) NOT NULL,
  `subMessage_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mangermanageevent`
--

CREATE TABLE `mangermanageevent` (
  `id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `description` varchar(600) DEFAULT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `messages` varchar(300) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operate`
--

CREATE TABLE `operate` (
  `ID` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date_of_action` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserver`
--

CREATE TABLE `reserver` (
  `client_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rate` decimal(10,0) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(500) DEFAULT NULL,
  `Price_room` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ID`, `name`, `rate`, `description`, `type`, `Price_room`) VALUES
(5, 'single', '4', 'A room assigned to one person. May have one or more beds.\r\n\r\nThe room size or area of Single Rooms are generally between 37 m² to 45 m².', 'normal', '100'),
(6, 'double', '2', ' A room assigned to two people. May have one or more beds.\r\n\r\nThe room size or area of Double Rooms are generally between 40 m² to 45 m².', 'repair', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `type` varchar(60) NOT NULL,
  `information` varchar(255) NOT NULL,
  `bed` varchar(255) NOT NULL,
  `kitchen` varchar(255) NOT NULL,
  `bathroom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`type`, `information`, `bed`, `kitchen`, `bathroom`) VALUES
('normal', 'In hotels the rooms are categorised and priced according to the type of bed, number of occupants, number of bed, decor, specific furnishings or features and nowadays special even the special theme available in the roo', '4 bed two double size', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `submessage`
--

CREATE TABLE `submessage` (
  `ID` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `message` varchar(400) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add-items`
--
ALTER TABLE `add-items`
  ADD PRIMARY KEY (`id`,`manager_id`,`item_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `add-rooms`
--
ALTER TABLE `add-rooms`
  ADD PRIMARY KEY (`id`,`manager_id`,`room_id`),
  ADD KEY `manager_id` (`manager_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `allocate`
--
ALTER TABLE `allocate`
  ADD PRIMARY KEY (`ID`,`client_id`,`event_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `books_rooms`
--
ALTER TABLE `books_rooms`
  ADD PRIMARY KEY (`client_id`,`room_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `clienthassubmessage`
--
ALTER TABLE `clienthassubmessage`
  ADD PRIMARY KEY (`client_ID`,`subMessage_ID`),
  ADD KEY `subMessage_ID` (`subMessage_ID`);

--
-- Indexes for table `content_website`
--
ALTER TABLE `content_website`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `edit`
--
ALTER TABLE `edit`
  ADD PRIMARY KEY (`ID`,`employee_id`,`event_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `it`
--
ALTER TABLE `it`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ithassubmessage`
--
ALTER TABLE `ithassubmessage`
  ADD PRIMARY KEY (`it_ID`,`subMessage_ID`),
  ADD KEY `subMessage_ID` (`subMessage_ID`);

--
-- Indexes for table `itmanageclient`
--
ALTER TABLE `itmanageclient`
  ADD PRIMARY KEY (`id`,`client_id`,`It_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `It_id` (`It_id`);

--
-- Indexes for table `itmanageemployee`
--
ALTER TABLE `itmanageemployee`
  ADD PRIMARY KEY (`ID`,`employee_id`,`It_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `It_id` (`It_id`);

--
-- Indexes for table `itmanagemanager`
--
ALTER TABLE `itmanagemanager`
  ADD PRIMARY KEY (`id`,`manager_id`,`It_id`),
  ADD KEY `It_id` (`It_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `managegarage`
--
ALTER TABLE `managegarage`
  ADD PRIMARY KEY (`id`,`manager_id`,`garage_id`),
  ADD KEY `garage_id` (`garage_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `managermanageclient`
--
ALTER TABLE `managermanageclient`
  ADD PRIMARY KEY (`id`,`manager_id`,`client_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `managermanageemployee`
--
ALTER TABLE `managermanageemployee`
  ADD PRIMARY KEY (`ID`,`employee_id`,`manager_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `mangerhassubmessage`
--
ALTER TABLE `mangerhassubmessage`
  ADD PRIMARY KEY (`manager_ID`,`subMessage_ID`),
  ADD KEY `subMessage_ID` (`subMessage_ID`);

--
-- Indexes for table `mangermanageevent`
--
ALTER TABLE `mangermanageevent`
  ADD PRIMARY KEY (`id`,`manager_id`,`event_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`,`client_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `operate`
--
ALTER TABLE `operate`
  ADD PRIMARY KEY (`ID`,`client_id`,`employee_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`,`client_id`,`item_id`),
  ADD KEY `client_order` (`client_id`),
  ADD KEY `item_order` (`item_id`);

--
-- Indexes for table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`client_id`,`place_id`),
  ADD KEY `place_id` (`place_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `submessage`
--
ALTER TABLE `submessage`
  ADD PRIMARY KEY (`ID`,`message_id`),
  ADD KEY `message_id` (`message_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add-items`
--
ALTER TABLE `add-items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add-rooms`
--
ALTER TABLE `add-rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allocate`
--
ALTER TABLE `allocate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content_website`
--
ALTER TABLE `content_website`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `edit`
--
ALTER TABLE `edit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `garage`
--
ALTER TABLE `garage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `it`
--
ALTER TABLE `it`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `itmanageclient`
--
ALTER TABLE `itmanageclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itmanageemployee`
--
ALTER TABLE `itmanageemployee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itmanagemanager`
--
ALTER TABLE `itmanagemanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managegarage`
--
ALTER TABLE `managegarage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managermanageclient`
--
ALTER TABLE `managermanageclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managermanageemployee`
--
ALTER TABLE `managermanageemployee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mangermanageevent`
--
ALTER TABLE `mangermanageevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `operate`
--
ALTER TABLE `operate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `submessage`
--
ALTER TABLE `submessage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add-items`
--
ALTER TABLE `add-items`
  ADD CONSTRAINT `add-items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `menu` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add-items_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `add-rooms`
--
ALTER TABLE `add-rooms`
  ADD CONSTRAINT `add-rooms_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add-rooms_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `allocate`
--
ALTER TABLE `allocate`
  ADD CONSTRAINT `allocate_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `allocate_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books_rooms`
--
ALTER TABLE `books_rooms`
  ADD CONSTRAINT `books_rooms_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_rooms_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clienthassubmessage`
--
ALTER TABLE `clienthassubmessage`
  ADD CONSTRAINT `clienthassubmessage_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clienthassubmessage_ibfk_2` FOREIGN KEY (`subMessage_ID`) REFERENCES `submessage` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `edit`
--
ALTER TABLE `edit`
  ADD CONSTRAINT `edit_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `edit_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ithassubmessage`
--
ALTER TABLE `ithassubmessage`
  ADD CONSTRAINT `ithassubmessage_ibfk_1` FOREIGN KEY (`it_ID`) REFERENCES `it` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ithassubmessage_ibfk_2` FOREIGN KEY (`subMessage_ID`) REFERENCES `submessage` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `itmanageclient`
--
ALTER TABLE `itmanageclient`
  ADD CONSTRAINT `itmanageclient_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itmanageclient_ibfk_2` FOREIGN KEY (`It_id`) REFERENCES `it` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `itmanageemployee`
--
ALTER TABLE `itmanageemployee`
  ADD CONSTRAINT `itmanageemployee_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itmanageemployee_ibfk_2` FOREIGN KEY (`It_id`) REFERENCES `it` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `itmanagemanager`
--
ALTER TABLE `itmanagemanager`
  ADD CONSTRAINT `itmanagemanager_ibfk_1` FOREIGN KEY (`It_id`) REFERENCES `it` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itmanagemanager_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `managegarage`
--
ALTER TABLE `managegarage`
  ADD CONSTRAINT `managegarage_ibfk_1` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `managegarage_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `managermanageclient`
--
ALTER TABLE `managermanageclient`
  ADD CONSTRAINT `managermanageclient_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `managermanageclient_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `managermanageemployee`
--
ALTER TABLE `managermanageemployee`
  ADD CONSTRAINT `managermanageemployee_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `managermanageemployee_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mangerhassubmessage`
--
ALTER TABLE `mangerhassubmessage`
  ADD CONSTRAINT `mangerhassubmessage_ibfk_1` FOREIGN KEY (`manager_ID`) REFERENCES `manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mangerhassubmessage_ibfk_2` FOREIGN KEY (`subMessage_ID`) REFERENCES `submessage` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mangermanageevent`
--
ALTER TABLE `mangermanageevent`
  ADD CONSTRAINT `mangermanageevent_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mangermanageevent_ibfk_2` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operate`
--
ALTER TABLE `operate`
  ADD CONSTRAINT `operate_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operate_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `client_order` FOREIGN KEY (`client_id`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_order` FOREIGN KEY (`item_id`) REFERENCES `menu` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`place_id`) REFERENCES `garage` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_types`
--
ALTER TABLE `room_types`
  ADD CONSTRAINT `room_types_ibfk_1` FOREIGN KEY (`type`) REFERENCES `room` (`type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submessage`
--
ALTER TABLE `submessage`
  ADD CONSTRAINT `submessage_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
