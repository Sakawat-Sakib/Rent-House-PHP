-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 05:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bashalagbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'sakib75', '123');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `area` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `loc_id`, `area`, `status`) VALUES
(1, 43, 'Anwara', 1),
(2, 43, 'Chandanaish', 1),
(3, 43, 'Patiya', 1),
(4, 43, 'Fatikchhari', 1),
(5, 43, 'Banshkhali', 1),
(6, 43, 'Boalkhali', 1),
(7, 43, 'Mirsharai', 1),
(8, 43, 'Raozan', 1),
(9, 43, 'Rangunia', 1),
(10, 43, 'Lohagara', 1),
(11, 43, 'Sandwip', 1),
(12, 43, 'Satkania', 1),
(13, 43, 'Sitakunda', 1),
(14, 43, 'Hathazari', 1),
(15, 43, 'Akbarshah', 1),
(16, 43, 'Bandar', 1),
(17, 43, 'Bayazid Bostami', 1),
(18, 43, 'Chandgaon', 1),
(19, 43, 'Chawkbazar', 1),
(20, 0, 'Kotwali', 1),
(21, 43, 'Kotwali', 1),
(22, 43, 'Double Mooring', 1),
(23, 43, 'EPZ', 1),
(24, 43, 'Halishahar', 1),
(25, 43, 'Karnaphuli', 1),
(26, 43, 'Khulshi', 1),
(27, 43, 'Pahartali', 1),
(28, 43, 'Panchlaish', 1),
(29, 43, 'Patenga', 1),
(30, 43, 'Sadarghat', 1),
(31, 1, 'Adabor', 1),
(32, 1, 'Uttar Khan', 1),
(33, 1, 'Uttara', 1),
(34, 1, 'Kadamtali', 1),
(35, 1, 'Kalabagan', 1),
(36, 1, 'Kafrul', 1),
(37, 1, 'Kamrangirchar', 1),
(38, 45, 'Kolatoli', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`) VALUES
(1, 'Appartment', 1),
(2, 'Bachelor/Mess', 1),
(6, 'Shop', 1),
(19, 'Office', 1),
(22, 'Sublet', 1),
(23, 'Plot', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `status`) VALUES
(1, 'Dhaka', 1),
(2, 'Faridpur', 1),
(3, 'Gazipur', 0),
(4, 'Gopalganj', 1),
(5, 'Jamalpur', 1),
(6, 'Kishoreganj', 1),
(7, 'Madaripur', 1),
(8, 'Manikganj', 1),
(9, 'Munshiganj', 1),
(10, 'Mymensingh', 1),
(11, 'Narayanganj', 1),
(12, 'Narsingdi', 1),
(13, 'Netrokona', 1),
(14, 'Rajbari', 1),
(15, 'Shariatpur', 1),
(16, 'Sherpur', 1),
(17, 'Tangail                         ', 1),
(18, 'Bogra                              ', 1),
(19, 'Joypurhat                         ', 1),
(20, 'Naogaon                      ', 1),
(21, 'Natore                             ', 1),
(22, 'Nawabganj                          ', 1),
(23, 'Pabna                              ', 1),
(24, 'Rajshahi                         ', 1),
(25, 'Sirajgonj                           ', 1),
(26, 'Dinajpur                           ', 1),
(27, 'Gaibandha                          ', 1),
(28, 'Kurigram                           ', 1),
(29, 'Lalmonirhat                        ', 1),
(30, 'Nilphamari                         ', 1),
(31, 'Panchagarh                         ', 1),
(32, 'Rangpur                            ', 1),
(33, 'Thakurgaon                         ', 1),
(34, 'Barguna                       ', 1),
(35, 'Barisal                       ', 1),
(36, 'Bhola                              ', 1),
(37, 'Jhalokati                          ', 1),
(38, 'Patuakhali                         ', 1),
(39, 'Pirojpur                          ', 1),
(40, 'Bandarban                          ', 1),
(41, 'Brahmanbaria', 1),
(42, 'Chandpur                           ', 1),
(43, 'Chittagong                         ', 1),
(44, 'Comilla                            ', 1),
(45, 'Cox\'s Bazar                       ', 1),
(46, 'Feni                               ', 1),
(47, 'Khagrachari                        ', 1),
(48, 'Lakshmipur                         ', 1),
(49, 'Noakhali                           ', 1),
(50, 'Rangamati                          ', 1),
(51, 'Habiganj                           ', 1),
(52, 'Maulvibazar                        ', 1),
(53, 'Sunamganj                          ', 1),
(54, 'Sylhet                             ', 1),
(55, 'Bagerhat                           ', 1),
(56, 'Chuadanga                          ', 1),
(57, 'Jessore                            ', 1),
(58, 'Jhenaidah                          ', 1),
(59, 'Khulna                             ', 1),
(60, 'Kushtia                             ', 1),
(61, 'Magura                             ', 1),
(62, 'Meherpur                           ', 1),
(63, 'Narail                             ', 1),
(64, 'Satkhira                           ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `sector_no` varchar(100) NOT NULL,
  `road_no` varchar(100) NOT NULL,
  `house_no` varchar(100) NOT NULL,
  `short_desc` varchar(256) NOT NULL,
  `free_from` date NOT NULL,
  `cat_id` int(11) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `belcony` int(11) NOT NULL,
  `floor_no` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `gas` varchar(10) NOT NULL,
  `parking` varchar(10) NOT NULL,
  `lift` varchar(10) NOT NULL,
  `wifi` varchar(10) NOT NULL,
  `cctv` varchar(10) NOT NULL,
  `full_desc` text NOT NULL,
  `img_1` varchar(256) NOT NULL,
  `img_2` varchar(256) NOT NULL,
  `img_3` varchar(256) NOT NULL,
  `img_4` varchar(256) NOT NULL,
  `img_5` varchar(256) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`id`, `user_id`, `division_id`, `area_id`, `sector_no`, `road_no`, `house_no`, `short_desc`, `free_from`, `cat_id`, `bedroom`, `bathroom`, `belcony`, `floor_no`, `size`, `price`, `gas`, `parking`, `lift`, `wifi`, `cctv`, `full_desc`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `contact`, `added_on`) VALUES
(51, 427, 43, 5, '--', '--', '--', 'dfdfasdfsdasdffc', '2021-08-11', 19, 7, 10, 8, 8, '52435', 35345, 'Yes', 'Yes', 'No', 'No', 'No', 'dfgsdfg', '55547977_28414845_camping.jpg', '', '', '', '', '23452345', '2021-08-14 22:10:21'),
(52, 427, 43, 5, '--', '--', '--', 'hgjhg', '2021-08-06', 23, 5, 8, 6, 5, '--', 456347, 'Yes', 'No', 'No', 'No', 'No', '', '58193419_15570770_pexels-brett-sayles-5080095.jpg', '', '', '11988708_22541572_30.jpg', '', '3453745', '2021-08-19 13:55:32'),
(55, 427, 43, 19, '--', '--', '--', 'dfghdgh', '2021-08-13', 23, 8, 7, 6, 7, '45647', 4567460, 'Yes', 'No', 'No', 'No', 'No', 'ghjfgh', '41540136_22541572_30.jpg', '', '', '', '', '457457', '2021-08-19 14:16:33'),
(57, 427, 43, 19, '--', '--', '--', 'gdghefgh', '2021-08-11', 19, 8, 8, 6, 6, '--', 34563, 'Yes', 'No', 'No', 'No', 'No', 'fgdfjfhjfh', '38301283_27326935_9.jpg', '94463079_25524909_28.jpg', '19457861_49429582_12167176_13.jpg', '41788495_50760794_8.jpg', '93387609_20944382_10.jpg', '3453645', '2021-08-19 15:21:53'),
(58, 427, 43, 19, '--', '--', '--', '346345', '2021-07-29', 2, 9, 10, 9, 0, '--', 3456, 'Yes', 'No', 'No', 'No', 'No', 'dfg', '22982920_11696199_testimonials-bg.jpg', '', '', '', '', '3456', '2021-08-19 15:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `sector_no` varchar(100) NOT NULL,
  `road_no` varchar(100) NOT NULL,
  `house_no` varchar(100) NOT NULL,
  `short_desc` varchar(256) NOT NULL,
  `free_from` date NOT NULL,
  `cat_id` int(11) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `belcony` int(11) NOT NULL,
  `floor_no` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `gas` varchar(10) NOT NULL,
  `parking` varchar(10) NOT NULL,
  `lift` varchar(10) NOT NULL,
  `wifi` varchar(10) NOT NULL,
  `cctv` varchar(10) NOT NULL,
  `full_desc` text NOT NULL,
  `img_1` varchar(256) NOT NULL,
  `img_2` varchar(256) NOT NULL,
  `img_3` varchar(256) NOT NULL,
  `img_4` varchar(256) NOT NULL,
  `img_5` varchar(256) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `booked` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `division_id`, `area_id`, `sector_no`, `road_no`, `house_no`, `short_desc`, `free_from`, `cat_id`, `bedroom`, `bathroom`, `belcony`, `floor_no`, `size`, `price`, `gas`, `parking`, `lift`, `wifi`, `cctv`, `full_desc`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `contact`, `added_on`, `booked`, `status`) VALUES
(22, 427, 1, 33, '435', '4563', '453', 'fgdfgh', '2021-06-30', 23, 6, 4, 2, 3, '63456', 34563, 'Yes', 'No', 'No', 'No', 'No', 'fdhgh', '77339493_19.jpg', '', '', '', '', '34563456345', '2021-07-29 15:33:20', 0, 1),
(27, 427, 43, 18, '2345', '23452', '3452', 'sdsdfg', '2021-08-05', 2, 3, 8, 6, 5, '3452', 2345, 'Yes', 'No', 'No', 'No', 'No', '', '38440626_pexels-sunsetoned-5913116.jpg', '89193187_teal-t-shirt.jpg', '88071303_24.jpg', '22541572_30.jpg', '', '2345', '2021-08-04 00:47:59', 0, 1),
(28, 427, 43, 22, '435', '345', '345', 'dsf', '2021-08-28', 2, 2, 5, 8, 6, '345', 2345, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '', '74189857_8.jpg', '42620500_6.jpg', '45688110_28.jpg', '94817066_26.jpg', '', '345', '2021-08-03 16:25:54', 0, 1),
(39, 430, 43, 18, '--', '--', '--', 'sdf', '2021-08-20', 23, 9, 7, 5, 4, '2345', 2345, 'Yes', 'No', 'No', 'No', 'No', 'sdfg', '77750503_16.jpg', '', '', '', '', '345234', '2021-08-05 21:28:00', 0, 1),
(40, 430, 43, 19, '2435', '2345', '2345', 'sdfgsdf', '2021-08-08', 23, 2, 6, 6, 5, '2345', 23452, 'Yes', 'No', 'No', 'No', 'No', '', '40766411_26.jpg', '', '', '', '', '2345234', '2021-08-05 21:28:00', 0, 1),
(41, 430, 43, 18, '24', '--', '--', 'dfgs', '2021-08-10', 23, 5, 10, 9, 7, '2345', 345, 'Yes', 'No', 'No', 'No', 'No', '', '34945808_11.jpg', '', '', '', '', '2345', '2021-08-05 21:28:01', 0, 1),
(42, 430, 43, 2, '352345', '23452', '234523', 'dgsdfg', '2021-08-24', 19, 9, 9, 6, 8, '32345', 23452, 'Yes', 'No', 'No', 'No', 'No', '', '23457759_5.jpg', '', '', '', '', '23452', '2021-08-05 21:28:02', 0, 1),
(43, 427, 43, 5, '--', '--', '--', 'safasd', '2021-08-24', 19, 3, 9, 7, 4, '--', 34563, 'Yes', 'No', 'No', 'No', 'No', '', '43911665_23.jpg', '', '', '', '', '3546345', '2021-08-06 00:25:30', 0, 1),
(45, 427, 43, 19, '--', '--', '--', 'dfgdfg', '2021-08-10', 23, 6, 7, 8, 7, '--', 345634, 'No', 'Yes', 'No', 'No', 'No', '', '50218310_backpack-in-black.jpg', '', '', '', '', '34563456', '2021-08-06 00:25:32', 0, 1),
(48, 427, 43, 17, '--', '--', '--', 'asdf', '2021-08-18', 6, 6, 9, 7, 8, '--', 2345, 'Yes', 'Yes', 'No', 'No', 'No', '', '23387292_4.jpg', '78061902_2.jpg', '', '', '', '345', '2021-08-13 01:31:32', 0, 1),
(50, 427, 43, 19, 'wer', '--', '--', 'w3452', '2021-09-01', 6, 10, 8, 6, 6, '--', 2345, 'No', 'No', 'Yes', 'No', 'No', '', '49429582_12167176_13.jpg', '', '', '', '', '345', '2021-08-14 02:24:46', 1, 1),
(51, 427, 43, 22, '--', '--', '--', 'ghdfgh', '2021-08-18', 1, 6, 7, 4, 6, '--', 4567, 'Yes', 'No', 'No', 'No', 'No', 'fghgh', '76608588_2.jpg', '61287382_4.jpg', '52749948_1.jpg', '71607893_23277047_22.jpg', '94004457_30713671_17.jpg', '45647', '2021-08-19 15:13:44', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `blocked` tinyint(4) NOT NULL DEFAULT 0,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `blocked`, `added_on`) VALUES
(423, 'Tuhin', 'test@gmail.com', '231313', 0, '2021-07-22 22:45:02'),
(426, 'MD Sakib', 'mdsakawatsakib@gmail.com', '$2y$10$S6aa0Uqow1I5OkyMIfTdH.xaPEwR7dR6HekbNjBGydu34bSQm1XhO', 0, '2021-07-26 13:10:19'),
(427, 'MD Sakib', 'karim@yahoo.com', '$2y$10$s9EhubR.pwEz.xIjOSfvvOaRegwcP4bSraUFCmw5k5Rr/QRyDErAe', 0, '2021-07-26 13:18:55'),
(428, 'rahim', 'rasdz@gmail.com', '$2y$10$jGSsk9HIuMjJu9LLSOiydebMDHoqGsLwtBsa5McQTFAttyOnjMMi2', 0, '2021-07-26 13:36:31'),
(429, 'dfdsf', 'aaaaaaaaaada@gamil.com', '$2y$10$CaB/ZuIK2HGqE5PCJZEkgelpDKUHz8euxjOHmSOpZtqAe6g9DIPDW', 0, '2021-07-28 13:23:13'),
(430, 'tuhin', 'tuhiigbk@gmail.com', '$2y$10$/0OCl.Lo4P9gVe0jdcaD8e9GaJBVqsUL/xg7vm.7bIfe1sMrU1XLW', 0, '2021-08-05 18:01:39'),
(431, 'dsfds', 'tuhiigsdfabk@gmail.com', '$2y$10$1d8go3WPb/1iWvxXWEO0z.VeHm7gfJzIvI1dvX/Qi/rk85bWYe22e', 0, '2021-08-14 01:22:53'),
(432, 'wgs', 'sdfawert@gmail.com', '$2y$10$FGKYp2eWC3NJivJr4Dw4d.wH6x3qcxNJYQ3gWEGrrG02aJBfpOvOC', 0, '2021-08-14 01:26:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
