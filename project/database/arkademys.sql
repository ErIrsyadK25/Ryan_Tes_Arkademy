-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 27 Jul 2019 pada 15.50
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arkademys`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `name`
--

CREATE TABLE `name` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `id_work` int(11) NOT NULL,
  `id_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `name`
--

INSERT INTO `name` (`id`, `name`, `id_work`, `id_salary`) VALUES
(1, 'Rebecca', 1, 1),
(2, 'Vita Khoirunnisa', 2, 1),
(3, 'Ryan Irsyad', 2, 1),
(4, 'Rafli Efendy', 1, 2),
(7, 'Steven King', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `salary`
--

INSERT INTO `salary` (`id`, `salary`) VALUES
(1, 10000000),
(2, 12000000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_arkademy`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_arkademy` (
`name` varchar(20)
,`work` varchar(20)
,`salary` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `id_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `work`
--

INSERT INTO `work` (`id`, `name`, `id_salary`) VALUES
(1, 'Frontend Dev', 1),
(2, 'Backend Dev', 2);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_arkademy`
--
DROP TABLE IF EXISTS `v_arkademy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_arkademy`  AS  select `name`.`name` AS `name`,`work`.`name` AS `work`,`salary`.`salary` AS `salary` from ((`name` join `work`) join `salary`) where ((`name`.`id_work` = `work`.`id`) and (`name`.`id_salary` = `salary`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `name`
--
ALTER TABLE `name`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_work` (`id_work`),
  ADD KEY `id_salary` (`id_salary`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_salary` (`id_salary`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `name`
--
ALTER TABLE `name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
