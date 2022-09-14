-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 05:33 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akademikz`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `qr_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `address`, `qr_code`) VALUES
('1184002', 'Mohammad Bahar Andili', 'HPzzKZ8aMEfaUfUaXTmQA3aWdzYpPE6CWuimHGQxqPev', '1184002.png'),
('1184007', 'Rayhan Yuda Lesmana', 'AoAkyzr45BPS887nWghzo6KaH1SAi6PTVsjcoxWoZoJU', '1184007.png'),
('1184026', 'Yusuf Jordan', '45v1uZmap2M3uocnmJpPLm1UDr9ShEweAjoXoB1QioXK', '1184026.png'),
('1184041', 'Akil Munawwar', 'DwA1N4yZp11vUHKAqrPkhJgj5YqpNEaCQV4GrJhNEkA4', '1184041.png'),
('1184047', 'Tri Angga Dio Simamora', 'CNakSNs8SGehrqBfYG8KugybxSdLyLM4tckezUJHWHDs', '1184047.png'),
('1184063', 'Idam Fadilah', 'GWhK8x6fuU3222xYnmffkDSGcfyLyo1wB4dHmtTZgqaC', '1184063.png'),
('1184064', 'Fadel Rahmawan', '6oD9hK8vnK4LKmF9NrJBsS1Nw559EVFeFCddAYgJvjKJ', '1184064.png'),
('1184069', 'Rayhan Prastya', 'DiTLLAjLBtBvofBCJhE1SKYoaPieqxZPCDwmkwWpztNw', '1111111.png'),
('1184086', 'Nur Hanifah Amatullah', '7rVydCE69H4zaiqYWicHsByiUsKSHg5pgtx3FfppU2N1', '1184086.png'),
('1184087', 'Okky Yudhistira', '7ZPzcccaYPd8tm1QYA31xjz8ZdhhAucRNzdh8vzBs6Y', '1184087.png'),
('1184092', 'Cecep Gunawan', '4rWfqnpLQHCcaTbcotFnHXUPTqteKtvDxxJMVmtfnHB4', '11111112.png'),
('1184100', 'Muhammad Amri', '2Gh1VuijrFciUm6QhAirykhH3QAaT9UR6WDf79VxVmsB', '1184100.png'),
('1184102', 'Rizaluardi Achmad Pratama', 'CGH5KkriuC1egiE9adxXvXMhaayvbSFu3eQ3dtrey994', '1184102.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
