-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 01:12 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imms`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowance`
--

CREATE TABLE `allowance` (
  `allowance_no` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(255) NOT NULL,
  `allowance_status` enum('pending','success','expired') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowance`
--

INSERT INTO `allowance` (`allowance_no`, `name`, `description`, `allowance_status`) VALUES
(2, 'hello', 'hello', ''),
(4, 'Allowance - March', 'asda', 'expired'),
(5, 'Allowance - January', 'allowance', 'expired'),
(6, 'Allowance - February', 'Hello World', 'expired'),
(8, 'Allowance - January', 'test', 'expired'),
(10, 'text', 'text', 'success'),
(12, 'Allowance - February', 'hello', 'success'),
(13, 'Allowance - February', 'test', 'pending');

-- --------------------------------------------------------

--
-- Stand-in structure for view `allowancetrackerview`
-- (See below for the actual view)
--
CREATE TABLE `allowancetrackerview` (
`transaction_no` int(11)
,`trac_SC_no` int(11)
,`trac_allowance_no` int(11)
,`amount` decimal(9,2)
,`date_given` timestamp
,`date_registered` date
,`SC_no` int(11)
,`SC_ID` varchar(50)
,`first_name` varchar(20)
,`last_name` varchar(20)
,`middle_name` varchar(3)
,`address_street` varchar(20)
,`address_sitio` varchar(20)
,`barangay_no` int(11)
,`religion` enum('catholic','muslim','born again','mormons','others')
,`rel_status` enum('single','married','widowed')
,`gender` enum('male','female')
,`date_of_birth` date
,`age` varchar(3)
,`place_of_birth` varchar(100)
,`highest_educ_attained` varchar(20)
,`contact_number` varchar(20)
,`status` enum('alive','dead')
,`date_of_death` date
,`SC_ID_image` varchar(255)
,`SC_image` varchar(255)
,`SC_signature_image` varchar(255)
,`allowance_no` int(11)
,`name` varchar(30)
,`description` varchar(255)
,`allowance_status` enum('pending','success','expired')
);

-- --------------------------------------------------------

--
-- Table structure for table `allowance_tracker`
--

CREATE TABLE `allowance_tracker` (
  `transaction_no` int(11) NOT NULL,
  `trac_SC_no` int(11) NOT NULL,
  `trac_allowance_no` int(11) NOT NULL,
  `amount` decimal(9,2) NOT NULL,
  `date_given` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allowance_tracker`
--

INSERT INTO `allowance_tracker` (`transaction_no`, `trac_SC_no`, `trac_allowance_no`, `amount`, `date_given`) VALUES
(31, 51, 12, '2000.00', '2018-01-25 15:52:29'),
(32, 51, 10, '2000.00', '2018-01-25 15:52:53'),
(33, 40, 12, '2000.00', '2018-01-25 15:56:28'),
(34, 40, 10, '2000.00', '2018-01-25 15:56:35');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_no` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `send_date` date NOT NULL,
  `type` enum('allowance','meeting','others') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(255) NOT NULL,
  `status` enum('pending','success','expired') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_no`, `title`, `send_date`, `type`, `date_created`, `message`, `status`) VALUES
(2, 'hello', '2018-01-06', 'allowance', '2017-12-30 07:04:45', 'hello', 'expired'),
(3, 'meeting', '2018-01-06', 'meeting', '2017-12-30 07:31:17', 'hello', 'success'),
(4, 'Allowance - March', '2018-01-06', 'allowance', '2017-12-30 08:38:47', 'asda', 'expired'),
(5, 'Allowance - January', '2018-01-06', 'allowance', '2018-01-18 02:17:11', 'allowance', 'expired'),
(6, 'Allowance - February', '2018-02-10', 'allowance', '2018-01-18 03:15:40', 'Hello World', 'expired'),
(7, 'Allowance - February', '2018-02-07', 'others', '2018-01-08 15:58:05', 'Test', 'success'),
(8, 'Allowance - January', '2018-02-10', 'allowance', '2018-01-18 02:17:20', 'test', 'expired'),
(9, 'asd', '2018-03-10', '', '2018-01-11 00:52:39', 'd', 'expired'),
(10, 'text', '2018-01-19', 'allowance', '2018-01-14 14:16:37', 'text', 'success'),
(11, 'meeting', '2018-02-10', 'meeting', '2018-01-15 08:02:24', 'meeting', 'pending'),
(12, 'Allowance - February', '2018-02-10', 'allowance', '2018-01-18 03:14:24', 'hello', 'success'),
(13, 'Allowance - February', '2018-02-10', 'allowance', '2018-01-25 16:09:28', 'test', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `barangay_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`barangay_no`, `name`, `longitude`, `latitude`) VALUES
(1, 'Inayawan', '10.2661', '123.8648'),
(2, 'Talamban', '10.3693', '123.9168'),
(6, 'Banilad', '10.3506292', '123.91353890000'),
(12, 'Apas', '10.3376616', '123.90792349999'),
(13, 'Cebu City, Cebu, Philippines', '10.3156992', '123.88543660000');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_no` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(255) NOT NULL,
  `complaint_status` enum('unverified','verified') NOT NULL,
  `complaint_type` enum('unverified','allowance','service','others') NOT NULL,
  `SC_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_no`, `date`, `message`, `complaint_status`, `complaint_type`, `SC_no`) VALUES
(1, '2018-01-14 10:06:18', 'sad', 'verified', 'allowance', 51),
(2, '2018-01-18 09:39:20', 'qwew', 'verified', 'allowance', 51),
(3, '2018-01-25 10:47:23', 'asd', 'verified', 'allowance', 51),
(4, '2018-01-13 14:14:26', 'bbbbbb', 'verified', 'allowance', 43),
(5, '2018-01-08 08:24:13', 'jjhhjh', 'unverified', 'unverified', 51),
(6, '2018-01-10 08:03:21', 'complaint', 'unverified', 'unverified', 51),
(7, '2018-01-12 01:07:19', 'test', 'unverified', 'unverified', 51),
(8, '2018-01-13 14:16:06', 'hello', 'verified', 'allowance', 43),
(9, '2018-01-13 14:22:53', 'asdasdasd', 'verified', 'service', 43),
(10, '2018-01-18 11:23:27', 'test', 'verified', 'allowance', 51);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_no` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `send_date` date NOT NULL,
  `type` enum('allowance','meeting','others') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(255) NOT NULL,
  `notification_status` enum('pending','success') NOT NULL,
  `bar_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_no`, `title`, `send_date`, `type`, `date_created`, `message`, `notification_status`, `bar_no`) VALUES
(51, 'dummy', '2017-12-01', 'allowance', '2018-01-19 01:41:10', 'test', 'success', 1),
(52, 'Allowance - January', '2017-12-30', 'allowance', '2018-01-19 01:41:31', 'test', 'success', 2),
(53, 'Allowance - January', '2017-12-29', 'allowance', '2018-01-19 01:42:08', 'test', 'success', 1),
(54, 'Allowance - March', '2017-12-30', 'allowance', '2018-01-19 01:47:28', 'test2', 'success', 1),
(55, 'Hello', '2017-12-13', 'allowance', '2018-01-19 01:47:52', 'Hello', 'success', 1),
(56, 'Allowance - March', '2017-12-28', 'allowance', '2018-01-19 01:48:11', 'hello', 'success', 6),
(57, 'Allowance - January', '2017-12-22', 'allowance', '2018-01-09 07:57:46', 'hello', 'success', 12),
(58, 'Allowance - February', '2018-01-06', 'allowance', '2018-01-19 01:48:34', 'hello', 'success', 1),
(59, 'Meeting', '2018-02-10', 'allowance', '2018-01-10 09:33:20', 'test', 'pending', 2),
(62, 'Allowance - February', '2018-01-26', 'allowance', '2018-01-15 05:54:56', 'this is a test message', 'success', 12),
(63, '7', '2018-02-10', 'others', '2018-01-19 01:38:48', 'Test', 'pending', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `notificationview`
-- (See below for the actual view)
--
CREATE TABLE `notificationview` (
`notification_no` int(11)
,`title` varchar(50)
,`send_date` date
,`type` enum('allowance','meeting','others')
,`date_created` timestamp
,`message` varchar(255)
,`notification_status` enum('pending','success')
,`bar_no` int(11)
,`barangay_no` int(11)
,`name` varchar(100)
,`longitude` varchar(15)
,`latitude` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `senior_citizens`
--

CREATE TABLE `senior_citizens` (
  `date_registered` date NOT NULL,
  `SC_no` int(11) NOT NULL,
  `SC_ID` varchar(50) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `middle_name` varchar(3) NOT NULL,
  `address_street` varchar(20) NOT NULL,
  `address_sitio` varchar(20) NOT NULL,
  `barangay_no` int(11) NOT NULL,
  `religion` enum('catholic','muslim','born again','mormons','others') NOT NULL,
  `rel_status` enum('single','married','widowed') NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` varchar(3) NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `highest_educ_attained` varchar(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `status` enum('alive','dead') NOT NULL,
  `date_of_death` date NOT NULL,
  `SC_ID_image` varchar(255) NOT NULL,
  `SC_image` varchar(255) NOT NULL,
  `SC_signature_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `senior_citizens`
--

INSERT INTO `senior_citizens` (`date_registered`, `SC_no`, `SC_ID`, `first_name`, `last_name`, `middle_name`, `address_street`, `address_sitio`, `barangay_no`, `religion`, `rel_status`, `gender`, `date_of_birth`, `age`, `place_of_birth`, `highest_educ_attained`, `contact_number`, `status`, `date_of_death`, `SC_ID_image`, `SC_image`, `SC_signature_image`) VALUES
('2017-12-22', 40, '40194002051', 'Juan', 'Dela Cruz', 'C', '105g', 'Dimagiba', 12, 'catholic', 'single', 'male', '1940-09-24', '77', 'Cebu', 'highschool', '639330013114', 'alive', '0000-00-00', 'daaa41d7394e24b5f79c0ae5cb53544f.png', 'f0d69ca4b336d06b6c04db8bbc21bccb.png', 'c1fe403f067cde14424aa26a82f8ec74.png'),
('2017-12-22', 41, '411995052912', 'John', 'Doe', 'C', 'Street', 'Sitio', 12, 'catholic', 'single', 'female', '1995-05-29', '22', 'cebu', 'highschool', '639224255319', 'alive', '0000-00-00', '31c2d79fa977d81060225d3f41dd1805.jpg', '5a7004a38310d7b4d67de8d699a0f7d5.jpg', '741c33592f045e2cdcad99b3e082a074.png'),
('2017-12-22', 42, '42199005056', 'Test', 'Test', 'Z', 'Tets', 'Tesz', 6, 'catholic', 'married', 'male', '1990-05-05', '27', 'cebu', 'undergraduate', '639123456789', 'dead', '2017-12-12', '0c29f87263336c963040a4b266cf979c.png', '3ec52fc4c1677954ea9cf32f84fa89d2.png', '7f82198e126498684ef2ac9b780173fb.png'),
('2017-12-22', 43, '431940021712', 'Jane', 'Doe', 'Q', 'Sitio', 'Sitio', 12, 'catholic', 'single', 'male', '1940-02-17', '77', 'cebu', 'undergraduate', '639430035493', 'alive', '0000-00-00', '6215f63935774c282c0e4ea018cf32be.jpg', 'ece3d272cc9dd94e2c1eec5afe234e42.jpg', 'e24a41435a6875c98788dfd809ed0115.jpg'),
('2017-12-22', 44, '44195011231', 'Jason', 'Doe', 'A', 'Qweqwe', 'Qweqwe', 1, 'catholic', 'single', 'male', '1950-11-23', '67', 'cebu', 'highschool', '639052868490', 'alive', '0000-00-00', 'a432d23ca96d35a1e52236a149180419.jpg', '5314c9845eba6e09ca54cbcbae9e7bce.jpg', 'b8692e876fd0a2765b5aeb6ff48693c6.jpg'),
('2017-12-22', 45, 'not yet generated', 'Test', 'Asdkn', 'C', 'Qweqwe', 'Qweqwe', 2, '', 'married', 'male', '1950-10-25', '67', 'qweqwe', 'highschool', '639123456789', 'dead', '2017-12-21', '9a1d72c917191db5e0ce6f75cdfd30de.jpg', '478de2b1d9aab1533f518f37c719b20f.jpg', 'c41bf2968f5c549f8e0d25f02a4dcb0e.jpg'),
('2017-12-22', 46, '46195002271', 'Hello', 'World', 'C', 'Sitio', 'Sitio', 1, 'catholic', 'single', 'male', '1950-02-27', '67', 'cebu', 'highschool', '639123456789', 'alive', '0000-00-00', 'ddbea28343bd107f1296e077fdc241c8.jpg', '57a6ddfcca67bc0b84263a268213bb9a.jpg', 'fc9d63099f29a74f20dd78991cc2c622.jpg'),
('2017-12-22', 47, '47195011296', 'Are', 'You', 'C', 'Asd', 'Asd', 6, '', 'single', 'male', '1950-11-29', '67', 'cebu', 'elementary', '639123456789', 'alive', '0000-00-00', '511ace03c3807f0e5773d1ebad083cab.jpg', '1ee74cf2040353b5c231c15d68c782b7.jpg', '3dfcb6fbdb84bf4c59bf9bc7fa2e75a2.jpg'),
('2017-12-27', 51, '511930102312', 'Arleigh', 'Pacifico', 'E', 'Test', 'Sitio', 12, 'catholic', 'single', 'male', '1930-10-23', '87', 'cebu', 'undergraduate', '639565386709', 'alive', '0000-00-00', 'd56d486c571c5aece1b4968e2d75dcc6.jpg', '8e0d39fb8c57eafc1ad68dffc2667e48.jpg', '75144e3e6bb83ae37c58e7539f8ecae0.jpg'),
('2017-12-27', 52, '52192012302', 'Ritchie', 'Malinao', 'C', 'Qweqwe', 'Qweqwe', 2, 'catholic', 'married', 'male', '1920-12-30', '96', 'cebu', 'elementary', '639163606489', 'alive', '0000-00-00', '93d65a594bfcd1017665bfeea2d5557a.jpg', '6e11044fe66be4bfdf253edc7be5a6d4.jpg', '681a2722821d88c1cef51b7c0cf67cd4.jpg'),
('2018-01-01', 53, '53195610302', 'Test', 'Test', 'T', 'Test', 'Test', 2, '', 'single', 'female', '1956-10-30', '61', 'cebu', 'undergraduate', '639123456789', 'dead', '2018-01-13', '0ec4b7d649b397bfa768018acf5f0448.jpg', '94a4500753e091d611d216b88f5d45ac.jpg', 'e9c8b1d148da9d8115ac89d2070ce01b.jpg'),
('2018-01-10', 54, '541940050512', 'Coordinator', 'Asdasd', 'C', 'Qweqwe', 'Qweqwe', 12, '', 'single', 'male', '1940-05-05', '77', 'cebu', 'elementary', '639085510546', 'dead', '2018-01-15', '081181a1242e133f70ff175813250505.jpg', '0dbb8de540f2035db47feca1cb9cef2e.jpg', '259dd429fb4f070d8ddd2e903ed58cc8.jpg'),
('2018-01-14', 55, '55195005291', 'Tearads', 'Asd', 'C', 'Asdad', 'Asd', 1, '', 'single', 'female', '1950-05-29', '67', 'cebu', 'elementary', '639123456789', 'alive', '0000-00-00', '8f2173c07bb4535c2a2fb511cb47c0f2.jpg', 'b30130b1b113224131b9ea4534dd320f.jpg', 'f9466938ac5de0e42b3eac30cee3f9db.jpg'),
('2018-01-15', 56, '56195011302', 'Asd', 'Asd', 'C', 'Asdad', 'Asd', 2, '', 'married', 'male', '1950-11-30', '67', 'asd', 'highschool', '639123456789', 'alive', '0000-00-00', 'f37886934e923da408a3e6ffb4f28c91.jpg', '799975962a44ce8f1318030fee106292.jpg', '5577617064efe70528058b7f41d0b36f.jpg'),
('2018-01-15', 57, '57195012312', 'Asdji', 'Asdji', 'C', 'Asd', 'Asd', 2, '', 'single', 'female', '1950-12-31', '67', 'cebu', 'elementary', '639123456789', 'alive', '0000-00-00', 'f7be24b0534687f4ad90866f0e8c50de.jpg', 'be06a30b34a99352cca818e3a3e5b501.jpg', '037df6cfbc1a625cef80b7c1ebf62265.jpg'),
('2018-01-15', 58, 'not yet generated', 'Asdk', 'Asdkm', 'C', 'Asdkm', 'Asdkm', 13, '', 'married', 'male', '1905-12-31', '112', 'asd', 'elementary', '639123456789', 'alive', '0000-00-00', 'd32e8aa0a62c41de433581b6f68349c3.jpg', 'd32e8aa0a62c41de433581b6f68349c3.jpg', 'd32e8aa0a62c41de433581b6f68349c3.jpg'),
('2018-01-15', 59, 'not yet generated', 'Asdnmk', 'Asdnkm', 'C', 'Asdmk', 'Sdmk', 1, '', 'married', 'male', '1900-11-30', '117', '', 'elementary', '639123456789', 'alive', '0000-00-00', 'c948f08a580f14cb9350d67843e8f5f7.jpg', 'c948f08a580f14cb9350d67843e8f5f7.jpg', 'c948f08a580f14cb9350d67843e8f5f7.jpg'),
('2018-01-15', 60, '60180011301', 'Asd', 'Asd', 'C', 'Asdml', 'Asdm', 1, '', 'married', 'male', '1800-11-30', '217', 'cebu', 'highschool', '639123456789', 'alive', '0000-00-00', '9b41f60aeec72c8a7cfc80c9b6d7ca92.jpg', 'e57c431149ec232693ee6d68c5be96bf.jpg', '1947c7abed42475ee94a23c75c5371b3.jpg'),
('2018-01-15', 61, '61000000001', 'Jude', 'Delos santos', 'C', 'Asd', 'Asd', 1, '', 'single', 'male', '0000-00-00', '67', 'cebu', 'highschool', '639123456789', 'alive', '0000-00-00', '5b33f87b03c1956e02f379115defa5e0.jpg', 'd09be4a96e44bd74ff8f3f53612e28db.jpg', '0a4de6cdd247a8a1a18ff69de279f7eb.jpg'),
('2018-01-15', 62, '62195011301', 'Jude', 'Dej', 'A', 'Asd', 'Asd', 1, '', 'single', 'male', '1950-11-30', '67', 'ceby', 'elementary', '639330013114', 'alive', '0000-00-00', 'a09a7a9f9894f28a14a4928dcd37ef8d.jpg', '9da0f26219ed8dd14dfd8202bc56c4d8.jpg', 'cd1d46f7f2132929b5c0145bf87a9c6d.jpg'),
('2018-01-18', 63, 'not yet generated', 'Jude', 'Delos santos', 'C', 'Sitio', 'Sitio', 12, 'catholic', 'single', 'male', '1950-10-30', '67', 'cebu', 'undergraduate', '639330013114', 'alive', '0000-00-00', 'e4877e4559329a3292e0ba2569d880e6.jpg', '2e43341abd9ddc728240ba6ba8b3ac03.jpg', '1faf1426d172dfefb603c9106e64a244.jpg'),
('2018-01-23', 64, 'not yet generated', 'Jude', 'Delos santos', 'C', 'Asdasd', 'Das', 13, 'catholic', 'married', 'male', '1950-11-30', '67', 'cebu', 'elementary', '639123456789', 'alive', '0000-00-00', 'bc479d9afc50bc0704d906bc8c3ef0c0.jpg', 'ba11b8c796be24c1c50cf2f13aaf1aab.jpg', '80d9fd64cedec4766621cfc20e6d11f4.jpg'),
('2018-01-23', 65, '651940113013', 'John', 'Delos santos', 'C', 'Asdad', 'Asd', 13, 'catholic', 'married', 'male', '1940-11-30', '77', 'cebu', 'highschool', '639330013114', 'alive', '0000-00-00', '09cd95f3624bd9421928465e8e1039a1.jpg', '8f662c9e8d8d39b70bd458d13501e307.jpg', 'f1000ef1f568e01c685560333d61a590.jpg'),
('2018-01-25', 66, '66194005196', 'Lia', 'Espina', 'N', 'Test', 'Test', 6, 'catholic', 'single', 'female', '1940-05-19', '77', 'cebu', 'elementary', '639369532937', 'alive', '0000-00-00', '9d27b0149d1e7363feb9b15f456858a0.jpg', '9c158c7e33edcee4891c0deff160bacb.jpg', '6dedc4c574a5c7d76c928d208eb9222b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mi` varchar(3) NOT NULL,
  `address_street` varchar(50) NOT NULL,
  `address_sitio` varchar(30) NOT NULL,
  `address_barangay` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `age` varchar(3) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `emp_status` enum('active','inactive') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` enum('employee','admin') NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `signature_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `mi`, `address_street`, `address_sitio`, `address_barangay`, `birthday`, `age`, `contact_number`, `email_address`, `emp_status`, `username`, `password`, `user_type`, `profile_photo`, `signature_photo`) VALUES
(1, 'Admin', 'Admin', 'N', 'Street', 'Sitio', 'Barangay', '0000-00-00', '00', '12345678901', 'admin@gmail.com', 'active', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'photo', 'signature'),
(32, 'Admin', 'Admin', 'A', 'Street', 'Sitio', 'Barangay', '2017-11-30', '21', '09919191919', 'admin@gmail.com', 'active', 'adminad', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '', ''),
(34, 'Jude', 'Delos Santos', 'C', 'Subangadaku', 'Subangadaku', 'Mandaue', '2016-11-30', '22', '09330013114', 'jude@gmail.com', 'active', 'asdnjas', '01cfcd4f6b8770febfb40cb906715822', 'employee', '255fcfa5fc003d35d82113bc5789c251.jpg', '3549ce5ea32040c69e91847f03eac167.jpg'),
(35, 'Kristy', 'Balo', 'C', 'St', 'Siti', 'Bara', '2016-11-30', '21', '09123456789', 'admin@gmail.com', 'active', 'askmas', '54321', 'employee', '180de18238517c79a6db1b2cef836f82.jpg', '51bea35046089aacc89a7226fe92faa3.jpg'),
(36, 'Jude', 'Santos', 'C', 'Sitio', 'Street', 'Barangay', '2014-10-29', '21', '09123456789', 'jude@gmail.com', 'active', 'SantosJu', '01cfcd4f6b8770febfb40cb906715822', 'admin', 'dbef8f79431196ca23204ae661e50cdf.jpg', 'a457e38e046dcf4f2e67fb94da5224bc.jpg'),
(37, 'Test123', 'Asdk', 'A', 'Asd', 'Asd', 'Asdd', '1995-11-30', '22', '09123456789', 'test@gmail.com', 'inactive', 'asdkte', '827ccb0eea8a706c4c34a16891f84e7b', 'employee', '13c7e8a90dae9c5286c3c0c7e6bf4422.jpg', 'a6d069ca541a1fa83120ec5808816fbe.jpg'),
(38, 'Ken', 'Francisco', 'C', 'Danao', 'Danao', 'Danao', '1990-11-30', '27', '09123456789', 'ken@gmail.com', 'active', 'franciscoke', '827ccb0eea8a706c4c34a16891f84e7b', 'employee', '9b00fa4d880460000b964741c38dfacf.jpg', 'f9a390bb76872f835ea6e00b65accd72.jpg');

-- --------------------------------------------------------

--
-- Structure for view `allowancetrackerview`
--
DROP TABLE IF EXISTS `allowancetrackerview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allowancetrackerview`  AS  select `allowance_tracker`.`transaction_no` AS `transaction_no`,`allowance_tracker`.`trac_SC_no` AS `trac_SC_no`,`allowance_tracker`.`trac_allowance_no` AS `trac_allowance_no`,`allowance_tracker`.`amount` AS `amount`,`allowance_tracker`.`date_given` AS `date_given`,`senior_citizens`.`date_registered` AS `date_registered`,`senior_citizens`.`SC_no` AS `SC_no`,`senior_citizens`.`SC_ID` AS `SC_ID`,`senior_citizens`.`first_name` AS `first_name`,`senior_citizens`.`last_name` AS `last_name`,`senior_citizens`.`middle_name` AS `middle_name`,`senior_citizens`.`address_street` AS `address_street`,`senior_citizens`.`address_sitio` AS `address_sitio`,`senior_citizens`.`barangay_no` AS `barangay_no`,`senior_citizens`.`religion` AS `religion`,`senior_citizens`.`rel_status` AS `rel_status`,`senior_citizens`.`gender` AS `gender`,`senior_citizens`.`date_of_birth` AS `date_of_birth`,`senior_citizens`.`age` AS `age`,`senior_citizens`.`place_of_birth` AS `place_of_birth`,`senior_citizens`.`highest_educ_attained` AS `highest_educ_attained`,`senior_citizens`.`contact_number` AS `contact_number`,`senior_citizens`.`status` AS `status`,`senior_citizens`.`date_of_death` AS `date_of_death`,`senior_citizens`.`SC_ID_image` AS `SC_ID_image`,`senior_citizens`.`SC_image` AS `SC_image`,`senior_citizens`.`SC_signature_image` AS `SC_signature_image`,`allowance`.`allowance_no` AS `allowance_no`,`allowance`.`name` AS `name`,`allowance`.`description` AS `description`,`allowance`.`allowance_status` AS `allowance_status` from ((`allowance_tracker` join `senior_citizens` on((`allowance_tracker`.`trac_SC_no` = `senior_citizens`.`SC_no`))) join `allowance` on((`allowance_tracker`.`trac_allowance_no` = `allowance`.`allowance_no`))) ;

-- --------------------------------------------------------

--
-- Structure for view `notificationview`
--
DROP TABLE IF EXISTS `notificationview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `notificationview`  AS  select `notifications`.`notification_no` AS `notification_no`,`notifications`.`title` AS `title`,`notifications`.`send_date` AS `send_date`,`notifications`.`type` AS `type`,`notifications`.`date_created` AS `date_created`,`notifications`.`message` AS `message`,`notifications`.`notification_status` AS `notification_status`,`notifications`.`bar_no` AS `bar_no`,`barangay`.`barangay_no` AS `barangay_no`,`barangay`.`name` AS `name`,`barangay`.`longitude` AS `longitude`,`barangay`.`latitude` AS `latitude` from (`notifications` join `barangay` on((`notifications`.`bar_no` = `barangay`.`barangay_no`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowance`
--
ALTER TABLE `allowance`
  ADD PRIMARY KEY (`allowance_no`);

--
-- Indexes for table `allowance_tracker`
--
ALTER TABLE `allowance_tracker`
  ADD PRIMARY KEY (`transaction_no`),
  ADD KEY `trac_allowance_no` (`trac_allowance_no`),
  ADD KEY `trac_SC_no` (`trac_SC_no`) USING BTREE;

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_no`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`barangay_no`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_no`),
  ADD KEY `SC_no` (`SC_no`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_no`),
  ADD KEY `barangay_no` (`bar_no`);

--
-- Indexes for table `senior_citizens`
--
ALTER TABLE `senior_citizens`
  ADD PRIMARY KEY (`SC_no`),
  ADD KEY `barangay_no` (`barangay_no`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowance_tracker`
--
ALTER TABLE `allowance_tracker`
  MODIFY `transaction_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `barangay_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `senior_citizens`
--
ALTER TABLE `senior_citizens`
  MODIFY `SC_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allowance_tracker`
--
ALTER TABLE `allowance_tracker`
  ADD CONSTRAINT `allowance_tracker_ibfk_1` FOREIGN KEY (`trac_SC_no`) REFERENCES `senior_citizens` (`SC_no`),
  ADD CONSTRAINT `allowance_tracker_ibfk_2` FOREIGN KEY (`trac_allowance_no`) REFERENCES `allowance` (`allowance_no`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`SC_no`) REFERENCES `senior_citizens` (`SC_no`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`bar_no`) REFERENCES `barangay` (`barangay_no`);

--
-- Constraints for table `senior_citizens`
--
ALTER TABLE `senior_citizens`
  ADD CONSTRAINT `senior_citizens_ibfk_1` FOREIGN KEY (`barangay_no`) REFERENCES `barangay` (`barangay_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
