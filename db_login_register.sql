-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 08:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'S A Al Kaium Shuvo', 'tariq', 'kaium@example.com', '912575c953fa7add432c5c9db31fae70'),
(2, 'Zealous Zeesan', 'sabbir.jesan', 'zeesan@example.com', '8b353d5cc07e13577608711f4602fcb7'),
(3, 'Sajjad Hossain', 'sajjad.hossain.9', 'sajjad@example.com', '665d4897585a1c1e9a78c33fbe715f75'),
(4, 'Md. Rana Khan', 'khanrana', 'ranakhan@example.com', '7715bac1d9e5a81da40f626cbab02d78'),
(5, 'oli uzzaman', 'oli.zaman', 'oli@example.com', '8be57c24680317c02843631b253179d8'),
(6, 'S A Al Kaium Shuvo', 'kaium.shuvo.99', 'kaium.shuvo@example.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'Hussein Mohammod Abid', 'ershad.abid', 'ershadabid1993@example.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'Md. Jubaer Hossain', 'jubaerhossain', 'jubaercoding@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(9, 'Md. Jubaer Hossain', 'mdjubaerhossain', 'jubaercourse@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'anyname', 'mdjubaerhossain', 'jubaer123@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(11, 'no name', 'mdjubaerhossain123', 'any@example.com', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'Tk bro', 'tkbro', 'tkbro@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
