-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 03:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_candidat`
--

CREATE TABLE `tb_candidat` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `education` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `experience` int(11) NOT NULL,
  `last_position` varchar(255) NOT NULL,
  `applied_position` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_candidat`
--

INSERT INTO `tb_candidat` (`id`, `name`, `education`, `birthday`, `experience`, `last_position`, `applied_position`, `skills`, `email`, `phone`, `resume`, `created_at`, `updated_at`) VALUES
(13, 'Joko', 'SMK Bandung', '2015-07-09', 5, 'CEO', 'Senior PHP Developer', 'PHP,Javascript,GoLang,MongoDB,PosgresSQL', 'joko@gmail.com', '08128834737', 'uploads/RmS7CWttgWyXT4MC2LRMGYgRUpohvhR6dkoCwjka.pdf', '2023-03-09 09:17:15', '2023-03-09 09:22:51'),
(14, 'Udin', 'SMK Jakarta', '2006-02-10', 8, 'Manajer', 'Lead PHP Developer', 'PHP,Mysql,PosgresSQL,Ruby', 'udin@gmail.com', '081371738133', 'uploads/Ybs98TUtiYPd0LJAUD2Bfx3URSwhwFnziWWKkTcu.pdf', '2023-03-09 09:18:09', '2023-03-09 09:23:06'),
(15, 'John', 'SMK Magelang', '2006-06-07', 7, 'Pegawai', 'Junior PHP Developer', 'PHP,Javascript,MongoDB,PosgresSQL', 'john@gmail.com', '0812834375463', 'uploads/gNdHDfzXygzUhBvvEZLLXbwO8EGHmrNTm0BEFs8J.pdf', '2023-03-09 09:24:04', '2023-03-09 09:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` enum('Senior HRD','HRD') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(14, 'andrian', '$2y$10$61e7uY.yRTqJshL8DHWxt.2VhDa1sICB4O23eNXK51pYhVI6WYuWu', 'Senior HRD', '2023-03-07 19:22:23', '2023-03-07 19:22:23'),
(18, 'adi', '$2y$10$B1tik7oMLjT8WDTOTYxrN./ehMjNVjfSbc3UeTQwndmHbiWkmp1Pm', 'HRD', '2023-03-09 09:25:36', '2023-03-09 09:25:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_candidat`
--
ALTER TABLE `tb_candidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_candidat`
--
ALTER TABLE `tb_candidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
