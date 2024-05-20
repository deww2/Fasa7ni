-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 08:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fas7ni`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `editactivityname` varchar(40) NOT NULL,
  `editactivitydescription` varchar(50) NOT NULL,
  `editactivitylocation` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`editactivityname`, `editactivitydescription`, `editactivitylocation`) VALUES
('', '', ''),
('Hiking', 'Hiking mountains is like unlocking nature\'s own se', 'Sinai'),
('Padel', 'Padel is like the fun-sized version of tennis, pla', 'BUE Coudrt'),
('Kayaking', 'Embark on a thrilling adventure with kayaking! Fee', 'Nile'),
('Snorkeling', 'Snorkeling is like entering a technicolor dream wo', 'Sharm ElSheikh'),
('Pyramid\'s Visit', 'Embark on an exciting adventure to explore the Pyr', 'Giza'),
('WindSurfing', 'Windsurfing is an exhilarating water sport that co', 'Hurghada'),
('Hot air balloning', 'Hot air ballooning offers a serene and breathtakin', 'Luxor'),
('Kiteboarding', 'Kiteboarding, Ride the wind and waves on a board w', 'Sharm ElSheikh'),
('Cruising', 'Cruising the Suez Canal is a remarkable voyage thr', 'suez Canal'),
('Nile River cruises', 'Nile River cruises blend luxury, culture, and rela', 'Nile');

-- --------------------------------------------------------

--
-- Table structure for table `adminhome`
--

CREATE TABLE `adminhome` (
  `admin_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminhome`
--

INSERT INTO `adminhome` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'default_name', 'd_e', ''),
(2, 'default_name', 'd_e', 'd_pass'),
(3, 'default_name', 'd_e', 'd_pass'),
(4, 'default_name', 'd_e', ''),
(8, 'default_name', 'd_e', ''),
(18, 'q', 'sandy@gmail.com', 'sandy');

-- --------------------------------------------------------

--
-- Table structure for table `adminhome2`
--

CREATE TABLE `adminhome2` (
  `admin2_id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminhome2`
--

INSERT INTO `adminhome2` (`admin2_id`, `username`, `email`, `phonenumber`, `category`) VALUES
(4, 'nada', 'nn@gmail.com', 'no', '01000111');

-- --------------------------------------------------------

--
-- Table structure for table `adminn`
--

CREATE TABLE `adminn` (
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminn`
--

INSERT INTO `adminn` (`username`, `email`, `phonenumber`, `category`) VALUES
('Ahmad', 'Ahmad34@gmail.com', '0123456789', ''),
('Celia', 'Celia234@gmail.com', '01553558904', ''),
('Kareem', 'Kareem34@gmail.com', '01234965946', ''),
('Lilly  ', 'Lilly345@gmail.com', '010004933285', ''),
('Reem ', 'Reem475@gmail.com', '01263485473', ''),
('Seif ', 'Seif47@gmail.com', '012245435943', '');

-- --------------------------------------------------------

--
-- Table structure for table `cafe`
--

CREATE TABLE `cafe` (
  `feedback_id` int(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cafename` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `orderr` varchar(20) NOT NULL,
  `rate` varchar(20) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`feedback_id`, `firstName`, `email`, `cafename`, `date`, `orderr`, `rate`, `feedback`) VALUES
(3, 'waad', 'waad@gmail.com', 'cash', '0111-11-11', '1', 'visa', 'not bad experience'),
(12, 'nada', 'nada@gmail.com', 'cash', '0001-11-11', '1111', '100%', 'Excellent'),
(14, 'nadeem', 'nadeem@gmail.com', 'cash', '0001-11-11', '1111', '75%', 'The coffee was so delicious'),
(18, 'Malika', 'Malika@gmail.com', 'cash', '0001-11-11', '1111', '75%', 'good'),
(19, 'Moaz', 'MoazMahmoud@gmail.co', 'visa', '2024-05-22', 'Frappe', '25%', 'good service'),
(20, 'Kareem', 'Kareem@gmail.com', 'cash', '2024-05-28', 'White Mocha ', '75%', 'good service'),
(21, 'Doaa', 'Doaa@gmail.com', 'visa', '2024-05-31', 'Spanich Latte', '100%', 'good service'),
(22, 'Shahd', 'Shahd@gmail.com', 'cash', '2024-06-01', 'White Mocha ', '75%', 'Very good '),
(23, 'Juliet', 'juliet@gmail.com', 'visa', '2024-05-28', 'Iced Latte ', '75%', 'good'),
(24, 'Moataz', 'Moataz@gmail.com', 'visa', '2024-06-01', 'White Mocha ', '25%', 'not bad');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(100) NOT NULL,
  `user_id` int(50) NOT NULL,
  `reservation_id` int(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dayuse`
--

CREATE TABLE `dayuse` (
  `reservation_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` int(30) NOT NULL,
  `adults` int(30) NOT NULL,
  `children` int(30) NOT NULL,
  `checkIn` varchar(30) NOT NULL,
  `checkOut` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `payment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dayuse`
--

INSERT INTO `dayuse` (`reservation_id`, `name`, `email`, `age`, `adults`, `children`, `checkIn`, `checkOut`, `location`, `payment`) VALUES
(1, 'Kareem ', 'KareemTamer@gmail.com', 21, 2, 1, '2024-05-05', '2024-06-22', 'Sokhna', 'visa'),
(2, 'Celia', 'CeliaKaram@gmail.com', 30, 2, 2, '2024-02-22', '2024-03-22', 'Alexandria', 'visa'),
(3, 'Mostafa', 'MostafaTeama@gmail.com', 32, 5, 0, '2024-07-22', '2024-08-3', 'Sokhna', 'cash'),
(4, 'Isabelle', 'IsabelleHany@gmail.com', 50, 2, 3, '2024-11-11', '2024-11-11', 'Alexandria', 'visa'),
(5, 'Adel', 'AdelKhaled@gmail.com', 26, 3, 1, '2024-02-22', '2024-02-22', 'Alexandria', 'cash'),
(6, 'Fouad', 'fouadhaggag@gmail.com', 24, 4, 5, '2024-05-16', '2024-05-24', 'Alexandria', 'cash'),
(7, 'Rashwan', 'RashwanAhmed@gmail.com', 30, 6, 0, '2024-02-28', '2024-04-06', 'Cairo', 'cash'),
(8, 'Linda', 'LindaFurrha@gmail.com', 29, 5, 7, '2024-05-23', '2024-06-05', 'Cairo', 'cash'),
(9, 'Mohamed', 'MohamedEzz@gmail.com', 36, 2, 0, '2024-05-21', '2024-05-28', 'Cairo', 'visa'),
(10, 'Moaz', 'MoazMahmoud@gmail.com', 20, 3, 0, '2024-05-15', '2024-05-24', 'Alexandria', 'visa'),
(14, 'Sara', 'SaraMohamed@gmail.com', 30, 4, 5, '2024-05-21', '2024-05-22', 'Alexandria', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `message`) VALUES
(1, 'OmarAhmed', 'OmarAhmed@gmail.com', 'I enjoyed the camp in Fayoum it was a goood place .'),
(2, 'Ezz', 'EzzSafwat@gmail.com', 'My Children enjoyed a lot there , me and my wife we had a quality time together '),
(3, 'Reem Khalil', 'ReemKhalil@gmail.com', 'My Husband and I really enjoyed the shows and the food was so delicious '),
(4, 'Nada', 'nadamamdouh@gmail.co', 'The room was clean and comfortable'),
(5, 'Reyam', 'Reyam@gmail.com', 'It was a good day , i really enjoyed  '),
(6, 'JoeFouad', 'JoeFouad@gmail.com', 'It was really nice experience i really enjoyed in Alexandria '),
(7, 'KaramFouad', 'karamFouad@gmail.com', 'It was really nice experience i really enjoyed in Alexandria '),
(8, 'AyaYasser', 'AyaYasser@gmail.com', 'It was really nice experience i really enjoyed in Alexandria '),
(9, 'TamerKhalil', 'TamerKhalil@gmail.co', 'It was  good experience i really enjoyed in Alexandria '),
(10, 'JoeFouad', 'JoeFouad@gmail.com', 'It was really nice experience i really enjoyed in Alexandria '),
(14, 'Sandy Sandy', 'sandymohamed538@gmai', 'sandyyyyyyyyyyyyyyy');

-- --------------------------------------------------------

--
-- Table structure for table `hiking`
--

CREATE TABLE `hiking` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenum` varchar(50) NOT NULL,
  `dt` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `loc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hiking`
--

INSERT INTO `hiking` (`id`, `name`, `email`, `phonenum`, `dt`, `time`, `loc`) VALUES
(1, 'sandra', 'sandra@gmail.com', '01004465199', '1111-11-11', '11:11', 'SinaiTrial'),
(2, 'Sandy ', 'sandymohamed538@gmail.com', '01012833301', '2024-05-01', '13:22', 'JebelSerbal'),
(3, 'Nabil', 'Nabil@gmail.com', '0123468995', '2024-05-11', '19:43', 'SinaiTrial'),
(4, 'Jana', 'Jana@gmail.com', '0123422233', '2024-06-03', '23:44', 'MT.catherine'),
(5, 'Logy', 'Logy@gmail.com', '01556266377', '2024-06-04', '22:44', 'JebelSerbal'),
(6, 'Dana', 'Dana@gmail.com', '0125525367', '2024-05-28', '23:45', 'SinaiTrial'),
(7, 'Jala ', 'Jala@gmail.com', '01273773637', '2024-05-28', '22:46', 'MT.catherine'),
(8, 'Dala', 'Dala@gmail.com', '0156353683', '2024-05-27', '23:47', 'JebelSerbal'),
(9, 'Dalia ', 'Dalia@gmail.com', '01273773637', '2024-05-13', '21:47', 'MT.catherine'),
(10, 'Khaled', 'Khaled@gmail.com', '01273773637', '2024-05-17', '22:48', 'MT.catherine');

-- --------------------------------------------------------

--
-- Table structure for table `kayaking`
--

CREATE TABLE `kayaking` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenum` varchar(50) NOT NULL,
  `dt` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `loc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kayaking`
--

INSERT INTO `kayaking` (`id`, `name`, `email`, `phonenum`, `dt`, `time`, `loc`) VALUES
(1, 'sandra', 'sandra@gmail.com', '01004465199', '0111-11-11', '11:11', 'sunPyramid\'sTours'),
(2, 'Omar', 'OmarAhmed@gmail.com', '01112', '2024-05-20', '17:24', 'CairoEliteTours'),
(3, 'Phooebe ', 'Phooebe@gmail.com', '01122235363', '2024-06-04', '22:49', 'CairoEliteTours'),
(4, 'Dareen', 'Dareen@gmail.com', '01555656667', '2024-05-29', '23:50', 'CairoEliteTours'),
(5, 'Lilet', 'Lilet@gamil.com', '01555656667', '2024-05-28', '20:50', 'CairoEliteTours'),
(6, 'Dara', 'Dara@gmail.com', '01555656667', '2024-05-29', '22:51', 'CairoEliteTours'),
(7, 'Julie', 'Julie@gmail.com', '01555656667', '2024-05-29', '20:51', 'sunPyramid\'sTours'),
(8, 'Steven', 'Steven@gmail.com', '01555656667', '2024-05-09', '20:54', 'CairoEliteTours'),
(9, 'Nour', 'Nour@gmail.com', '01555656667', '2024-05-21', '21:56', 'CairoEliteTours'),
(10, 'Ibrahim', 'Ibrahim@gmail.com', '100008975', '2024-05-26', '22:53', 'ThisIsEgyptTours'),
(11, 'Moaz', 'MoazMahmoud@gmail.com', '01122232563', '2024-05-28', '23:53', 'CairoEliteTours');

-- --------------------------------------------------------

--
-- Table structure for table `pyramid`
--

CREATE TABLE `pyramid` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenum` varchar(50) NOT NULL,
  `dt` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `loc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pyramid`
--

INSERT INTO `pyramid` (`id`, `name`, `email`, `phonenum`, `dt`, `time`, `loc`) VALUES
(1, 'sandra', 'sandra@gmail.com', '01004465199', '1111-11-11', '11:11', '150LE'),
(2, 'Kareem Tamer', 'Kareemtamer@gmail.com', '0112223', '2024-06-05', '17:26', '350LE'),
(3, 'Ali', 'Ali@gmail.com', '01122232563', '2024-05-29', '22:54', '150LE'),
(4, 'Doaa', 'Doaa@gmail.com', '01555656667', '2024-05-20', '23:55', '250LE'),
(5, 'Sheva', 'Sheva@gmail.com', '01122232563', '2024-05-28', '23:56', '250LE'),
(6, 'Karen', 'Karen@gmail.com', '01122232563', '2024-06-04', '23:59', '350LE'),
(7, 'Elaria', 'Elaria@gmail.com', '01122235363', '2024-06-04', '23:00', '250LE'),
(8, 'Chantea', 'Chantea@gmail.com', '100008975', '2024-05-04', '12:00', '250LE'),
(9, 'Omar', 'Omar@gmail.com', '11113568', '2024-06-04', '12:01', '350LE'),
(10, 'Joe', 'JoeFouad@gmail.com', '11113568', '2024-06-03', '12:01', '350LE');

-- --------------------------------------------------------

--
-- Table structure for table `registrationform`
--

CREATE TABLE `registrationform` (
  `name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `phonenum` varchar(80) NOT NULL,
  `dt` varchar(40) NOT NULL,
  `time` varchar(50) NOT NULL,
  `loc` varchar(50) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrationform`
--

INSERT INTO `registrationform` (`name`, `Email`, `phonenum`, `dt`, `time`, `loc`, `id`) VALUES
('sandra', 'sandra@gmail.com', '01004465199', '0111-11-11', '11:11', 'NadyShamsPadelCourt', 1),
('Sameh', 'Sameh@gmail.com', '0112223', '2024-06-05', '18:20', 'BUEPadelCourt', 2),
('Ahmed', 'Ahmed@gmail.com', '0100008975', '2024-05-28', '22:33', 'MadinatyClubPadelCourt', 3),
('Enjy', 'Enjy@gmail.com', '0112223', '2024-05-16', '18:41', 'GardeniaPadelCourt', 4),
('Maha', 'Maha@gmail.com', '012223736', '2024-05-25', '22:36', 'MadinatyClubPadelCourt', 5),
('Samir', 'samir@gamil.com', '12223736', '2024-06-03', '20:37', 'BUEPadelCourt', 6),
('Omar', 'Omar@gmail.com', '011113568', '2024-06-04', '18:44', 'BUEPadelCourt', 7),
('Sohaila', 'Sohaila@gmail.com', '01555656667', '2024-06-04', '21:38', 'GardeniaPadelCourt', 8),
('Nada', 'nada@gmail.com', '0100008975', '2024-05-31', '20:39', 'MadinatyClubPadelCourt', 9),
('Kareem', 'kareem@gmail.com', '01555656667', '2024-05-27', '23:40', 'MadinatyClubPadelCourt', 10),
('Fouad', 'Fouad@gmail.com', '01555656667', '2024-06-04', '23:40', 'MadinatyClubPadelCourt', 11),
('George', 'George@gmail.com', '100008975', '2024-05-29', '22:41', 'BUEPadelCourt', 12),
('Rafik', 'Rafik@gmail.com', '011222347784', '2024-06-04', '22:41', 'MadinatyClubPadelCourt', 13),
('Rania', 'Rania@gmail.com', '01555656667', '2024-05-28', '23:42', 'MadinatyClubPadelCourt', 14);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `Location` varchar(30) NOT NULL,
  `reservation_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` int(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` int(20) NOT NULL,
  `DISCOUNT` text NOT NULL,
  `payment` varchar(20) NOT NULL,
  `view` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`Location`, `reservation_id`, `name`, `email`, `number`, `date`, `time`, `DISCOUNT`, `payment`, `view`) VALUES
('CFC', 6, 'nada', 'nada@gmail.com', 1, '2222-11-11', -1, '2', 'visa', 'right'),
('CFC', 7, 'Jannah', 'Jannah@gmail.com', 1, '2222-11-11', -1, '2', 'visa', 'right'),
('tagmo3', 8, 'qadr', 'qadr@gmail.com', 2, '2222-02-22', 2, '2', 'cash', 'middle'),
('City stars', 11, 'nada', 'ahmed@gmail.com', 1, '1111-11-11', 2, '2', 'cash', 'middle'),
('tagmo3', 13, 'karen', 'karen@gmail.com', 3, '1111-11-11', 7, '11', 'cash', 'right'),
('CFC', 14, 'Farah', 'Farah@gmail.com', 6, '2024-05-22', 6, 'fasa7ni', 'cash', 'right'),
('CFC', 15, 'Adam', 'Adam@gmail.com', 6, '2024-05-29', 8, 'fasa7ni', 'cash', 'right'),
('City stars', 16, 'John', 'John@gmail.com', 7, '2024-05-30', 8, 'fasa7ni', 'cash', 'left'),
('CFC', 17, 'Mariam', 'Mariam@gmail.com', 7, '2024-05-28', 7, 'fasa7ni', 'visa', 'right'),
('CFC', 18, 'Sara', 'SaraMohamed@gmail.com', 6, '2024-05-28', 3, 'fasa7ni', 'cash', 'left');

-- --------------------------------------------------------

--
-- Table structure for table `romantic`
--

CREATE TABLE `romantic` (
  `reservation_id` int(10) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `companionName` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `NoOfGuests` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `time` int(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `discount` varchar(20) NOT NULL,
  `special` varchar(10) NOT NULL,
  `view` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `romantic`
--

INSERT INTO `romantic` (`reservation_id`, `firstName`, `companionName`, `email`, `NoOfGuests`, `date`, `time`, `location`, `payment`, `discount`, `special`, `view`) VALUES
(11, 'sandra', 'Fady', 'sandra@gmail.com', 1, 1111, 1, 'Sheikh Zayed/October', 'cash', '1', 'proposal', 'right'),
(25, 'SalmaKareem', 'Dareen', 'SalmaKareem@gmail.com', 6, 2024, 2, 'nile', 'visa', 'fasa7ni', 'proposal', 'right'),
(26, 'HabibaTawfik', 'Mohamed', 'HabibaTawfik@gmail.com', 6, 2024, 7, 'CFC', 'visa', 'fasa7ni', 'anniversar', 'middle'),
(27, 'Laila', 'Tawfik', 'Laila@gmail.com', 5, 2024, 4, 'Sheikh Zayed/October', 'cash', 'fasa7ni', 'proposal', 'left'),
(28, 'Salma', 'Omar', 'Salma@gmail.com', 6, 2024, 7, 'CFC', 'cash', 'fasa7ni', 'anniversar', 'right'),
(29, 'Reem', 'Sameh', 'Reem@gmail.com', 6, 2024, 8, 'CFC', 'cash', 'fasa7ni', 'anniversar', 'right'),
(30, 'Amira', 'Youssef', 'Amira@gmail.com', 4, 2024, 7, 'CFC', 'cash', 'fasa7ni', 'proposal', 'right'),
(31, 'joyce', 'Samy', 'joyce@gmail.com', 7, 2024, 6, 'City stars', 'visa', 'fasa7ni', 'proposal', 'left'),
(32, 'perry', 'Ahmed', 'Ahmed@gmail.com', 6, 2024, 4, 'City stars', 'cash', 'fasa7ni', 'proposal', 'middle'),
(33, 'Lina', 'Mohamed', 'Lina@gmail.com', 8, 2024, 6, 'CFC', 'cash', 'fasa7ni', 'anniversar', 'right');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `acc_id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`acc_id`, `fname`, `lname`, `email`, `date`, `password`) VALUES
(1, 'sandra', 'ramy', 'sandra@gmail.com', '2001-11-11', 'sandra'),
(2, 'sally', 'selim', 'sally@gmail.com', '2003-1-11', 'sally'),
(3, 'samy', 'Salem', 'samy@gmail.com', '2004-11-11', 'samy66'),
(4, 'sandra', 'sandra', 'sandy@gmail.com', '2003-11-11', 'sandy'),
(5, 'Farida', 'mamdouh', 'Farida@gmail.com', '2000-01-11', 'Farida'),
(6, 'nada', 'mamdouh', 'nada@gmail.com', '1999-11-11', 'nada'),
(7, 'nader', 'mamdouh', 'nader@gmail.com', '2002-11-11', 'nader'),
(8, 'Nadeem', 'Salem', 'nadeem@gmail.com', '1/2/2000', 'Nada2372003'),
(9, 'Mohamed', 'Ahmedd', 'MohamedAhmed@gmail.com', '2004-05-21', 'MohamedAhmed233'),
(15, 'Sameh', 'Mahmoud', 'SamehMahmoud@gmail.com', '2001-05-28', 'Nada2372003');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'nada', 'nada', 'admin'),
(2, 'sandy', 'sandy', 'admin'),
(3, 'karen', 'karen', 'admin'),
(4, 'sandra', 'sandra', 'admin'),
(5, 'nada1', 'nada1', 'customer'),
(6, 'karen1', 'karen1', 'customer'),
(7, 'sandy1', 'sandy1', 'customer'),
(8, 'sandra1', 'sandra1', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminhome`
--
ALTER TABLE `adminhome`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `adminhome2`
--
ALTER TABLE `adminhome2`
  ADD PRIMARY KEY (`admin2_id`);

--
-- Indexes for table `adminn`
--
ALTER TABLE `adminn`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `dayuse`
--
ALTER TABLE `dayuse`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `hiking`
--
ALTER TABLE `hiking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kayaking`
--
ALTER TABLE `kayaking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pyramid`
--
ALTER TABLE `pyramid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrationform`
--
ALTER TABLE `registrationform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `romantic`
--
ALTER TABLE `romantic`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminhome`
--
ALTER TABLE `adminhome`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `adminhome2`
--
ALTER TABLE `adminhome2`
  MODIFY `admin2_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cafe`
--
ALTER TABLE `cafe`
  MODIFY `feedback_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dayuse`
--
ALTER TABLE `dayuse`
  MODIFY `reservation_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hiking`
--
ALTER TABLE `hiking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kayaking`
--
ALTER TABLE `kayaking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pyramid`
--
ALTER TABLE `pyramid`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registrationform`
--
ALTER TABLE `registrationform`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `reservation_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `romantic`
--
ALTER TABLE `romantic`
  MODIFY `reservation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `acc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
