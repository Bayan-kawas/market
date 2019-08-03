-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2019 at 02:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `base`
--

CREATE TABLE `base` (
  `id` int(10) NOT NULL,
  `p_product` text NOT NULL,
  `desc` text NOT NULL,
  `img` text NOT NULL,
  `num_rate` int(30) NOT NULL,
  `total_rate` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `base`
--

INSERT INTO `base` (`id`, `p_product`, `desc`, `img`, `num_rate`, `total_rate`) VALUES
(1, 'قسم الالبان', '', '', 16, 50),
(3, 'قسم الاجهزه كهربائيه', '', '', 11, 27),
(4, 'قسم العطور', '', '', 7, 16),
(5, 'قسم اللحوم', '', '', 7, 18),
(6, 'قسم الملابس', '', '', 5, 22),
(153, 'kkk', 'hoba', 'http://hhhhhhhhhhh', 0, 0),
(154, 'kkk', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(155, 'kkk', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(156, 'bbb', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(157, 'bbb', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(158, 'bbb', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(159, 'bbb', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(160, 'bbb', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(161, 'bbb', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(162, 'bbb', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(163, 'bbb', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(164, 'bbb', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(165, 'bbb', 'tttt', 'http://hhhhhhhhhhh', 0, 0),
(166, 'bbb', 'tttt', 'http://hhhhhhhhhhh', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `product` text CHARACTER SET utf8 NOT NULL,
  `kilo` text CHARACTER SET utf8 NOT NULL,
  `price` text CHARACTER SET utf8 NOT NULL,
  `b_id` int(10) NOT NULL,
  `fav` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `product`, `kilo`, `price`, `b_id`, `fav`) VALUES
(1, 'ex', '1 ex', '11 ex', 1, 3),
(2, 'لبن معبا', '1 لتر', '11 جنيه', 1, 0),
(3, 'لبن كامل الدسم جهينه', '20 لتر', '13جنيه', 1, 0),
(4, 'لبن كامل الدسم انجوي', '200جم', '13 جنيه', 1, 0),
(5, 'لبن كامل الدسم جهينه', '2 لتر', '13جنيه', 1, 0),
(6, 'لبن كامل الدسم انجوي', '10 لتر', '13جنيه', 1, 0),
(7, 'ehab', 'كيلو', '24 جنيه', 1, 7),
(8, 'جبنه بيضه ناشقه', '2', '30جنيه', 1, 0),
(9, 'جبنه بيضه طريه', '1', '24 جنيه', 1, 0),
(10, 'kkkkkk', 'kk', 'iii', 2, 0),
(11, 'kkkkkk', 'kk', 'iii', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_in`
--

CREATE TABLE `log_in` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `password` int(11) NOT NULL,
  `conf_password` text NOT NULL,
  `auth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_in`
--

INSERT INTO `log_in` (`id`, `user_name`, `password`, `conf_password`, `auth`) VALUES
(1, 'bayan', 1222985931, '', 1),
(2, 'hoba', 123, '', 0),
(3, 'beno', 1234, '', 0),
(4, 'beno', 12345, '', 0),
(5, 'hoba', 123456, '', 0),
(6, 'lolo', 12, '', 0),
(7, 'soso', 50, '70', 0),
(8, 'hana', 30, '30', 0),
(9, 'farah', 90, '90', 1),
(10, 'mariam', 50, '50', 0),
(42, 'ee', 1234, '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `note_and_message`
--

CREATE TABLE `note_and_message` (
  `id` int(11) NOT NULL,
  `note` text CHARACTER SET utf8 NOT NULL,
  `Administrator` text CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note_and_message`
--

INSERT INTO `note_and_message` (`id`, `note`, `Administrator`, `date`) VALUES
(1, 'نرجو سيادتكم ان فرع فتح الله بسيدي بشر مغلق للصيانه اليوم ', 'ايهاب', '2018-09-24 21:30:42'),
(2, 'please ', 'boyka', '2018-09-24 21:43:30'),
(3, 'dont give up', 'ert', '2018-09-24 21:54:23'),
(4, 'dont give up', 'ert', '2018-09-24 21:54:25'),
(7, 'lllll', 'iii', '2018-11-16 14:57:33'),
(9, 'lllll', 'iii', '2018-11-17 21:48:12'),
(10, 'lllll', 'iii', '2018-11-17 22:06:13'),
(11, 'lllll', 'iii', '2018-11-17 22:07:11'),
(12, 'lllll', 'iii', '2018-11-17 22:08:45'),
(16, 'lllll', 'iii', '2018-11-17 22:39:13'),
(17, 'lllll', 'iii', '2018-11-17 22:39:51'),
(18, '                    hg', 'ero', '2018-11-20 14:37:31'),
(19, 'hg', 'ero', '2018-11-20 14:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) NOT NULL,
  `offer` text CHARACTER SET utf8,
  `From_before` text CHARACTER SET utf8,
  `img` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `offer`, `From_before`, `img`) VALUES
(3, 'عرض خاص نسكافيه 24 ظرف ب15 جنيه', 'بدلا من 20 جنيه', 'http://192.168.200.2/php_cource/market/show/show1.png'),
(4, 'عرض خاص فرخه مشويه ب80 جنيه', 'بدلا من 90 جنيه', 'http://192.168.200.2/php_cource/market/show/show2.jpg'),
(5, 'عرض خاص كيلو مفروم ب90 جنيه', 'بدلا من 120 جنيه', 'http://192.168.200.2/php_cource/market/show/show3.jpg'),
(6, 'عرض خاص كيس برسيل نص كيلو ب120 جنيه', 'بدلا من  150 جنيه', 'http://192.168.200.2/php_cource/market/show/show4.jpg'),
(7, 'عرض خاص كيلو مفروم ب90 جنيه', 'بدلا من 120 جنيه', 'http://192.168.200.2/php_cource/market/show/show5.jpg'),
(8, 'عرض خاص كيس برسيل نص كيلو ب120 جنيه', 'بدلا من  150 جنيه', 'http://192.168.200.2/php_cource/market/show/show6.jpg'),
(14, 'نسكافيه', 'ooo', 'http://www.degraeve.com/images/lotus.jpg<h1>'),
(25, 'نسكافيه', 'ooo', 'http://www.degraeve.com/images/lotus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(11) NOT NULL,
  `proposals` text CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `proposals`, `date`) VALUES
(1, 'نرجو من سادتكم', '2018-11-08 20:37:50'),
(2, 'نرجو من سادتكم', '2018-11-08 20:37:50'),
(3, 'نرجو من ', '2019-02-15 16:01:32'),
(7, 'نرجو من ', '2019-02-15 16:08:32'),
(8, 'نرجو من ', '2019-02-15 16:08:32'),
(9, 'نرجو من ', '2019-02-15 16:08:46'),
(10, 'نرجو من ', '2019-02-15 16:08:46'),
(11, 'نرجو من ', '2019-02-15 16:08:59'),
(12, 'نرجو من ', '2019-02-15 16:08:59'),
(13, 'نرجو من ', '2019-02-15 16:09:48'),
(14, 'نرجو من ', '2019-02-15 16:09:48'),
(15, 'نرجو من ', '2019-02-15 16:10:19'),
(16, 'نرجو من ', '2019-02-15 16:10:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `base`
--
ALTER TABLE `base`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_in`
--
ALTER TABLE `log_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note_and_message`
--
ALTER TABLE `note_and_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `base`
--
ALTER TABLE `base`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `log_in`
--
ALTER TABLE `log_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `note_and_message`
--
ALTER TABLE `note_and_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
