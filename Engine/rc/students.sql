-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2019 at 11:54 AM
-- Server version: 5.6.44
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flimbitc_majo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `mat_no` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dpt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `mat_no`, `password`, `dpt`) VALUES
(1, 'DAFINONE Oghenenyerovwo', 'ECU/2015/HMS/01/003', '8124', 'Accounting'),
(2, 'TALABI Oluwatobiloba', 'ECU/2015/HMS/01/004', '3149', 'Accounting'),
(3, 'TAREBI Ebimoyaibo', 'ECU/2015/HMS/01/005', '2374', 'Accounting'),
(4, 'UZOSIKE Chigemezu Favour', 'ECU/2015/HMS/01/006', '5469', 'Accounting'),
(5, 'EGHUBARE Oghenetega', 'ECU/2015/HMS/01/089', '1259', 'Accounting'),
(6, 'OFOARAMIEYERE Ufuoma Fasuyi', 'ECU/2015/HMS/01/101', '2388', 'Accounting'),
(7, 'IKWEGBULAM Uzuoma Hannah', 'ECU/2015/HMS/03/007', '7698', 'Banking and Finance'),
(8, 'OGBUAGU Emmanuel', 'ECU/2015/HMS/04/013', '5964', 'Biz Admin'),
(10, 'ADAIGHO Oghenetega', 'ECU/2015/HMS/04/083', '4351', 'Biz Admin'),
(11, 'ADARERHI David', 'ECU/2015/HMS/04/019', '4006', 'Biz Admin'),
(12, 'OBOKOHWIRORO Benedicta Emuesiri', 'ECU/2015/HMS/04/012', '4544', 'Biz Admin'),
(14, 'APEH Stephen John', 'ECU/2015/HMS/05/020', '3133', 'Economics'),
(15, 'OKPORU Penaokubo', 'ECU/2015/HMS/05/023', '4515', 'Economics'),
(16, 'OLAGBEMIRO Phillip Olatunji', 'ECU/2015/HMS/05/024', '2051', 'Economics'),
(17, 'ONUWUEGBUZIE Daniel Nnamdi', 'ECU/2015/HMS/05/025', '6151', 'Economics'),
(18, 'OTOKUTU Praise Oghenefejiro', 'ECU/2015/HMS/04/026', '6326', 'Economics'),
(19, 'ADJARHO Precious Omovigho', 'ECU/2015/HMS/08/038', '8943', 'Pol. Sci.'),
(20, 'SOBAI Abraham', 'ECU/2015/HMS/08/047', '3830', 'Pol. Sci.'),
(21, 'EZEOMA Chiedozie Precious', 'ECU/2017/HMS/08/356', '4841', 'Pol. Sci.'),
(22, 'NWADIKE Ugochukwu Brendan', 'ECU/2017/HMS/08/555', '8025', 'Pol. Sci.'),
(23, 'ESSI Cynthia Ochuko', 'ECU/2015/HMS/08/043', '3511', 'Pol. Sci.'),
(24, 'CHUKWUEKE Shallom Uchechi', 'ECU/2015/HMS/08/042', '1724', 'Pol. Sci.'),
(25, 'YEREYERE Princess Ebitimi', 'ECU/2015/HMS/08/048', '3091', 'Pol. Sci.'),
(26, 'OLUMEKA Sharon Dickson', 'ECU/2017/HMS/08/213', '6825', 'Pol. Sci.'),
(27, 'BEBU Francis Dokubo', 'ECU/2015/SCN/015/055', '5935', 'Com. Sci.'),
(28, 'EUGENE-JAJA Micheal Telema', 'ECU/2015/SCN/015/057', '1077', 'Com. Sci.'),
(29, 'ICHIPI Emmanuel Efe', 'ECU/2015/SCN/015/059', '7369', 'Com. Sci.'),
(30, 'NANA Perfect Oyawiri', 'ECU/2015/SCN/015/061', '5817', 'Com. Sci.'),
(31, 'OBOKOHWIRORO Emmanuel Oghenerume', 'ECU/2015/SCN/015/063', '2437', 'Com. Sci.'),
(32, 'OMORUYI Osarodion Edison', 'ECU/2015/SCN/015/066', '2732', 'Com. Sci.'),
(33, 'SOLOMON John Doye', 'ECU/2015/SCN/015/068', '1647', 'Com. Sci.'),
(34, 'STEPHEN Richman Koko', 'ECU/2015/SCN/015/069', '3597', 'Com. Sci.'),
(35, 'EBEGBA Blessmond Oghale', 'ECU/2015/SCN/015/056', '1732', 'Com. Sci.'),
(36, 'OKOROH Abigail Oluwaseyi', 'ECU/2015/SCN/015/065', '3034', 'Com. Sci.'),
(37, 'ALO Ogechi Anthony', 'ECU/2015/SCN/016/070', '1391', 'Ind. Chem.'),
(38, 'AGBALALAH Charles', 'ECU/2015/HMS/06/085', '3258', 'English'),
(39, 'ALFRED Sarah Bogheyefa', 'ECU/2015/HMS/06/028', '8041', 'English'),
(40, 'ELIJAH Comfort Onyekachi', 'ECU/2015/HMS/06/031', '2827', 'English'),
(41, 'IGHEDO Ofejiro Best', 'ECU/2015/HMS/06/034', '8570', 'English'),
(42, 'ISOKARIARI Boma Ebenezer', 'ECU/2015/HMS/06/035', '3393', 'English'),
(43, 'OTOKUTU Aghogho', 'ECU/2015/HMS/06/026', '3084', 'English'),
(44, 'ADEWAKUN Morenike Enitan', 'ECU/2015/SCN/017/072', '7453', 'Microbio.'),
(45, 'ANENIH Osayem Claire', 'ECU/2015/SCN/017/073', '2655', 'Microbio.'),
(46, 'SALVATION Beatrice', 'ECU/2015/SCN/017/079', '7096', 'Microbio.'),
(47, 'JAMES Gabriel', 'ECU/2015/SCN/017/075', '9076', 'Microbio.'),
(48, 'MMAKAMMA Kenechukwu Victor', 'ECU/2015/SCN/017/076', '8757', 'Microbio.'),
(49, 'ESHEYIGBA Akpevwe Praise', 'ECU/2015/SCN/017/084', '3611', 'Microbio.'),
(50, 'TAMUNOIMAMA Victor', 'ECU/2015/SCN/019/081', '3962', 'Physics'),
(51, 'TUMINI Deo Ala', 'ECU/2015/HMS/04/017', '5518', 'Biz Admin '),
(52, 'OMONUWA Harrieth Emuerhime', 'ECU/2015/HMS/04/015', '9191', 'Biz Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mat_no` (`mat_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
