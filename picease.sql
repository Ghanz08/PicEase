-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2024 at 03:30 PM
-- Server version: 10.2.44-MariaDB-cll-lve
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conh2528_picease`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `title_album` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `cover_album` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `title_album`, `description`, `cover_album`, `created_at`, `updated_at`, `deleted_at`, `id_user`) VALUES
(3, 'Album tes', 'Album desc tes', '1709517649_72a07b2a39a0fdb0bd17.jpg', '2024-02-26 11:08:45', '2024-03-04 09:00:49', '0000-00-00 00:00:00', 1),
(4, 'Tes edit album', 'Tes edit album', '1709517659_cc24a4be7e457f6616a8.jpg', '2024-02-26 21:46:35', '2024-03-04 09:00:59', '0000-00-00 00:00:00', 1),
(6, 'Cars', 'Cars is my life', '1709040464_af237e7b7c72cbcaa3bc.jpg', '2024-02-27 20:27:44', '2024-02-27 20:27:44', '0000-00-00 00:00:00', 15),
(9, 'Ghanz', 'Hai', '1709176531_96cc84d0f8a7a4d6a64c.png', '2024-02-29 10:15:31', '2024-02-29 10:15:31', '0000-00-00 00:00:00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_user`, `id_foto`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 3, 'tes', '2024-02-09 16:43:24', '2024-02-09 16:43:24', '0000-00-00 00:00:00'),
(6, 1, 3, 'tes', '2024-02-09 16:46:17', '2024-02-09 16:46:17', '0000-00-00 00:00:00'),
(7, 1, 3, 'tes', '2024-02-09 16:46:22', '2024-02-09 16:46:22', '0000-00-00 00:00:00'),
(8, 5, 3, 'tes Ghanz', '2024-02-10 02:40:45', '2024-02-10 02:40:45', '0000-00-00 00:00:00'),
(10, 1, 13, 'wiiiii', '2024-02-13 03:26:37', '2024-02-13 03:26:37', '0000-00-00 00:00:00'),
(11, 1, 3, 'Tes 2', '2024-02-13 04:29:07', '2024-02-13 04:29:07', '0000-00-00 00:00:00'),
(12, 1, 3, 'tes 3', '2024-02-13 04:29:49', '2024-02-13 04:29:49', '0000-00-00 00:00:00'),
(13, 1, 3, 'tes 4', '2024-02-13 04:33:18', '2024-02-13 04:33:18', '0000-00-00 00:00:00'),
(14, 1, 3, 'tes 5', '2024-02-13 04:36:29', '2024-02-13 04:36:29', '0000-00-00 00:00:00'),
(15, 1, 3, 'tes 6', '2024-02-13 11:39:17', '2024-02-13 11:39:17', '0000-00-00 00:00:00'),
(16, 1, 3, 'tes baru', '2024-02-26 13:08:09', '2024-02-26 13:08:09', '0000-00-00 00:00:00'),
(17, 1, 3, 'tes baru 1', '2024-02-26 13:11:54', '2024-02-26 13:11:54', '0000-00-00 00:00:00'),
(29, 1, 11, 'tes', '2024-02-27 10:06:17', '2024-02-27 10:06:17', '0000-00-00 00:00:00'),
(30, 1, 11, 'tes', '2024-02-27 10:20:56', '2024-02-27 10:20:56', '0000-00-00 00:00:00'),
(31, 1, 11, 'tes 5', '2024-02-27 10:21:06', '2024-02-27 10:21:06', '0000-00-00 00:00:00'),
(32, 1, 11, 'tes', '2024-02-27 10:22:28', '2024-02-27 10:22:28', '0000-00-00 00:00:00'),
(40, 1, 6, 'Tes komen di hp', '2024-02-28 00:02:34', '2024-02-28 00:02:34', '0000-00-00 00:00:00'),
(41, 16, 20, 'bolelah', '2024-02-28 17:54:47', '2024-02-28 17:54:47', '0000-00-00 00:00:00'),
(42, 18, 6, 'komen', '2024-02-28 18:55:00', '2024-02-28 18:55:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `title` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `title`, `description`, `foto`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'tes 6', 'tes 6 ', '1707192889_a20083db15ee1ef73908.jpeg', 1, '2024-02-06 04:14:49', '2024-02-06 04:14:49', '0000-00-00 00:00:00'),
(7, 'tes 7', 'tes 7', '1707192908_02044b1f7f6e0a6352a9.jpg', 1, '2024-02-06 04:15:08', '2024-02-06 04:15:08', '0000-00-00 00:00:00'),
(8, 'tes 8', 'tes 8', '1707192926_80d381bf1260b8ff70c5.jpg', 1, '2024-02-06 04:15:26', '2024-02-06 04:15:26', '0000-00-00 00:00:00'),
(11, 'tes 8', 'tes 8', '1707199513_a412c23f1d584e852245.jpg', 1, '2024-02-06 06:05:13', '2024-02-06 06:05:13', '0000-00-00 00:00:00'),
(12, 'tes 9', 'tes 9', '1707200843_7226b5a34dd7cd284874.jpg', 1, '2024-02-06 06:27:23', '2024-02-06 06:27:23', '0000-00-00 00:00:00'),
(13, 'tes 10', 'tes 10', '1707378291_b14c48b6049fce9e6921.jpg', 1, '2024-02-08 07:44:51', '2024-02-08 07:44:51', '0000-00-00 00:00:00'),
(16, 'Tes 26 februari 2024', 'Tes 26 februari 2024', '1708921737_990e2b1bae6e79c30bf8.jpg', 1, '2024-02-26 11:28:57', '2024-02-26 11:28:57', '0000-00-00 00:00:00'),
(17, 'Mclaren ', 'Mclaren on top????????', '1709035523_ffea7b14b3353188fcd0.jpg', 15, '2024-02-27 19:05:23', '2024-02-27 19:05:23', '0000-00-00 00:00:00'),
(21, 'Tes 1', 'Tes 1', '1709121481_8ee02ec7ed4e9014d412.jpg', 18, '2024-02-28 18:56:13', '2024-02-28 18:58:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fotoalbum`
--

CREATE TABLE `fotoalbum` (
  `id_fotoalbum` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotoalbum`
--

INSERT INTO `fotoalbum` (`id_fotoalbum`, `id_album`, `id_user`, `id_foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 4, 1, 7, '2024-02-27 10:28:50', '2024-02-27 10:28:50', '0000-00-00 00:00:00'),
(14, 4, 1, 12, '2024-02-27 10:29:02', '2024-02-27 10:29:02', '0000-00-00 00:00:00'),
(15, 3, 1, 6, '2024-02-27 20:01:27', '2024-02-27 20:01:27', '0000-00-00 00:00:00'),
(16, 6, 15, 16, '2024-02-27 20:42:21', '2024-02-27 20:42:21', '0000-00-00 00:00:00'),
(18, 8, 18, 21, '2024-02-28 18:57:26', '2024-02-28 18:57:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `KomentarID` int(11) NOT NULL,
  `FotoID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `IsiKomentar` text NOT NULL,
  `TanggalKomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id_like` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`id_like`, `id_foto`, `id_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 4, 5, '2024-02-27 07:35:52', '2024-02-27 07:35:52', '0000-00-00 00:00:00'),
(13, 6, 5, '2024-02-27 07:36:08', '2024-02-27 07:36:08', '0000-00-00 00:00:00'),
(39, 7, 1, '2024-02-27 11:24:48', '2024-02-27 11:24:48', '0000-00-00 00:00:00'),
(41, 12, 1, '2024-02-27 11:24:55', '2024-02-27 11:24:55', '0000-00-00 00:00:00'),
(44, 6, 1, '2024-02-28 00:02:15', '2024-02-28 00:02:15', '0000-00-00 00:00:00'),
(45, 20, 16, '2024-02-28 17:54:44', '2024-02-28 17:54:44', '0000-00-00 00:00:00'),
(46, 11, 16, '2024-02-28 18:00:59', '2024-02-28 18:00:59', '0000-00-00 00:00:00'),
(47, 6, 18, '2024-02-28 18:55:07', '2024-02-28 18:55:07', '0000-00-00 00:00:00'),
(48, 21, 18, '2024-02-28 18:56:21', '2024-02-28 18:56:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `bio` varchar(225) NOT NULL,
  `active` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `alamat`, `foto`, `description`, `bio`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ghani Zulhusni', 'Ghani', 'ghanizulhusnib@gmail.com', '$2y$10$7q0zX09QYx9sm0rgcGPnTeoT4NFgD02a1vSHD1vDKcAKFMxcx4S5i', 'komplek griya marelan medan rengas pulau', '1709517502_ea1844d024702267fb02.jpg', 'Lorem Ipsum dolor amet', 'Yoi', 'true', '2024-02-05 07:39:48', '2024-03-04 08:58:22', '0000-00-00 00:00:00'),
(15, 'Ghanzx', 'Husein', 'ghanizulhusni@gmail.com', '$2y$10$okob3qut96.NNHVJlcMDyeEGDMl3PtDzsj4ZjzRTjGZGqOA9gpMRq', 'Denpasar Sanur', '1709040167_c5dda58030beacaff470.jpg', 'Car is my life', 'Car Anthusiast', 'true', '2024-02-27 17:05:49', '2024-02-27 20:22:47', '0000-00-00 00:00:00'),
(18, 'Ghanz', 'Ghanz', 'ghanizulhusni@gmail.com', '$2y$10$covWuhtiFRhkBJb4OW1HhurEU.6uJ3/N.MxuvvtWVolC1NHUpyh0O', 'komplek griya marelan medan', '1709121569_d0a1b79f967e011dbee0.jpg', 'Car is my life', 'Car Anthusiast', 'true', '2024-02-28 18:54:08', '2024-02-28 18:59:29', '0000-00-00 00:00:00'),
(19, 'boneka jokowi', 'jokowi', 'limakosonglima@gmail.com', '$2y$10$jnNer6rf3vRJlbMU61uBCeu4/D51sDuqGSTiFnvE5Yj0mGMaD7BVu', 'Hsbehebhshhsjs', 'default.jpg', '', '', 'ae3c54404519f1c72676', '2024-02-29 09:37:04', '2024-02-29 09:37:04', '0000-00-00 00:00:00'),
(20, 'ahlul', 'ahlfs', 'ahlulffirdaus@gmail.com', '$2y$10$G.VrkVVGJkNySWQ7D6xDa.sU4Ou.fdzg5Rp60HZQy4vgEf.1lpPFy', 'hh', 'default.jpg', '', '', 'true', '2024-02-29 10:13:58', '2024-02-29 10:14:31', '0000-00-00 00:00:00'),
(24, 'Rapin', 'Rapin', 'ghanizulhusni@gmail.com', '$2y$10$W.Qhafhulq8a9azgXTE3GOVLfR7laOGphisERGiCmMtLnChthNV2W', 'Denpasar Sanur', 'default.jpg', '', '', 'true', '2024-02-29 22:42:53', '2024-02-29 22:43:58', '0000-00-00 00:00:00'),
(25, 'Jibril', 'Jibril', 'Ahay@gmail.com', '$2y$10$4MJTMS5Lf83faBmiego8GecXJWSkXDeuUOYrf5gmaWheiFiYBuLH6', 'Jl bantul', 'default.jpg', '', '', '5fb446b7b32dcbf0d8b1', '2024-03-03 15:36:58', '2024-03-03 15:36:58', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `fotoalbum`
--
ALTER TABLE `fotoalbum`
  ADD PRIMARY KEY (`id_fotoalbum`);

--
-- Indexes for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`KomentarID`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `fotoalbum`
--
ALTER TABLE `fotoalbum`
  MODIFY `id_fotoalbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `KomentarID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
