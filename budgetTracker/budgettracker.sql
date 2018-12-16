-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 08:45 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budgettracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `iid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`iid`, `uid`, `ammount`, `date`, `reason`, `type`) VALUES
(18, 38, 400, '12/01/2018', 'masare men baye', 'income'),
(19, 38, 100, '12/06/2018', 'cadeau nadine', 'expense'),
(20, 38, 1000, '12/08/2018', 'baye be hebne', 'income'),
(21, 38, 200, '03/06/2018', 'nsara2et', 'expense'),
(22, 38, 1000, '01/11/2019', 'hhrhrhr', 'income'),
(23, 39, 1000000, '12/26/2018', 'theth6rj6r', 'income'),
(24, 39, 20000, '12/13/2018', 'dnrnvivnu', 'expense'),
(25, 37, 52, '12/06/2018', '\r\n\r\n	\r\n	while(true){\r\n	alert(\"hi\");\r\n}\r\n\r\n', 'income'),
(26, 0, 55, '12/14/2018', 'dfgh', 'income'),
(27, 0, 55, '12/14/2018', 'hjk', 'income'),
(28, 37, 0, '12/25/2018', 'f', 'income'),
(29, 0, 555, '10/09/2018', 'jkl', 'income'),
(30, 0, 4, '12/14/2018', 'sdfghjkl', 'income'),
(31, 37, 100, '07/05/1911', 'dd', 'income'),
(32, 37, 9999, '01/02/2019', 'jio', 'income'),
(33, 37, 10151, '12/24/2018', 'uytr', 'expense'),
(34, 44, 200000, '12/14/2018', 'money', 'income'),
(35, 44, 10000, '12/14/2018', 'hjk', 'expense');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  `Income` int(11) NOT NULL,
  `expense` int(11) NOT NULL,
  `wallet` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `password`, `fullName`, `balance`, `Income`, `expense`, `wallet`, `image`) VALUES
(37, 'tonynasr98@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'tony nasr', 0, 10151, 10151, 0, './images/image-1544124321765.jpg'),
(38, 'jospin.deek@outlook.com', '5a4d474b95334409d44496e503ed517b99f622231172fa6eaee5b3d0468f72f1', 'Jospin Deek', 1900, 2400, 300, 200, './images/CLOS 701.jpg'),
(39, 'jospin.dick@lau.edu', '5a4d474b95334409d44496e503ed517b99f622231172fa6eaee5b3d0468f72f1', 'jospin youssef habib deek ', 980000, 1000000, 20000, 0, './images/default.png'),
(40, 'tonyrtyuio@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'Tantoun', 0, 0, 0, 0, './images/default.png'),
(41, 'gh@g.c', '0bfe935e70c321c7ca3afc75ce0d0ca2f98b5422e008bb31c00c6d7f1f1c0ad6', 'fgh', 0, 0, 0, 0, './images/default.png'),
(42, 'tony@gdfgmail', '3f79bb7b435b05321651daefd374cdc681dc06faa65e374e38337b88ca046dea', 'Tantoun', 0, 0, 0, 0, './images/default.png'),
(43, 'ff', '252f10c83610ebca1a059c0bae8255eba2f95be4d1d7bcfa89d7248a82d9f111', 'ff', 0, 0, 0, 0, './images/default.png'),
(44, 'charbel@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'charbel', 188100, 200000, 10000, 1900, './images/0.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
