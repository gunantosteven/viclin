-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2015 at 11:28 
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `viclin`
--

-- --------------------------------------------------------

--
-- Table structure for table `asalreturjual`
--

CREATE TABLE IF NOT EXISTS `asalreturjual` (
  `id` bigint(20) unsigned NOT NULL,
  `noreturjual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nojual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kodebrg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hargasatuankgretjual` double(8,2) NOT NULL,
  `jumlahkgretjual` double(8,2) NOT NULL,
  `jumlahekorretjual` bigint(20) NOT NULL,
  `newsretjual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `kodekategori` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `namakategori` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `kodekategori`, `namakategori`, `created_at`, `updated_at`) VALUES
(1, '1', 'Kepiting', '2015-06-27 02:28:18', '2015-06-27 02:28:18'),
(2, '2', 'Cumi', '2015-06-27 02:28:18', '2015-06-27 02:28:18'),
(3, '3', 'Udang', '2015-06-27 02:28:18', '2015-06-27 02:28:18'),
(4, '4', 'Gurami', '2015-06-27 02:28:18', '2015-06-27 02:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL,
  `namacust` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alamatcust` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telpcust` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kotacust` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emailcust` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `limitcust` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `namacust`, `alamatcust`, `telpcust`, `kotacust`, `emailcust`, `limitcust`, `created_at`, `updated_at`) VALUES
(1, 'Budi', 'Kenjeran no. 48', '031335667788', 'Surabaya', 'budibudi@gmail.com', 0.00, '2015-06-27 02:28:17', '2015-06-27 02:28:17'),
(2, 'Bunga', 'Jatim Park no. 48', '031445667788', 'Surabaya', 'bunga@gmail.com', 0.00, '2015-06-27 02:28:17', '2015-06-27 02:28:17'),
(3, 'Ania', 'Jember no. 48', '03161162788', 'Surabaya', 'ania@gmail.com', 0.00, '2015-06-27 02:28:17', '2015-06-27 02:28:17'),
(4, 'amsyong', 'Kediri no. 48', '03185668888', 'Surabaya', 'budibudi@gmail.com', 0.00, '2015-06-27 02:28:18', '2015-06-27 02:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `detiljual`
--

CREATE TABLE IF NOT EXISTS `detiljual` (
  `id` bigint(20) unsigned NOT NULL,
  `nojual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kodebrg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hargasatuankg` double(8,2) NOT NULL,
  `jumlahkg` double(8,2) NOT NULL,
  `jumlahekor` bigint(20) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint(20) unsigned NOT NULL,
  `kodebrg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_category` int(10) unsigned NOT NULL,
  `namabrg` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `stokkg` double(8,2) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stokbrg` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `kodebrg`, `id_category`, `namabrg`, `stokkg`, `status`, `stokbrg`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'Kepiting A Live Food', 2.00, 'Live Food', 10.00, '2015-06-27 02:28:18', '2015-06-27 02:28:18'),
(2, '2', 1, 'Kepiting B Frozen Food', 1.00, 'Frozen Food', 5.00, '2015-06-27 02:28:18', '2015-06-27 02:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE IF NOT EXISTS `jual` (
  `id` bigint(20) unsigned NOT NULL,
  `nojual` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nikcust` bigint(20) unsigned NOT NULL,
  `user` int(10) unsigned NOT NULL,
  `tglorderjual` date NOT NULL,
  `tgltempojual` date NOT NULL,
  `biayaekspjual` double(8,2) NOT NULL,
  `biayasusutjual` double(8,2) NOT NULL,
  `biayastereo` double(8,2) NOT NULL,
  `kursbaru` double(8,2) NOT NULL,
  `tglfaktur` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returjual`
--

CREATE TABLE IF NOT EXISTS `returjual` (
  `id` bigint(20) unsigned NOT NULL,
  `noreturjual` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user` int(10) unsigned NOT NULL,
  `tglreturjual` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint(20) unsigned NOT NULL,
  `niksupp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `namasupp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alamatsupp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telpsupp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kotasupp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emailsupp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `niksupp`, `namasupp`, `alamatsupp`, `telpsupp`, `kotasupp`, `emailsupp`, `created_at`, `updated_at`) VALUES
(1, 's1', 'Andre', 'Jagalan no. 48', '03111223344', 'Surabaya', 'andre@gmail.com', '2015-06-27 02:28:18', '2015-06-27 02:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `namauser` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `namauser`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$xagpAboeh0abqje6KoMbuuGMPhBqPtFNBVViEL3KiWy5jRuQFCHR6', 'steven', 'admin', '', '2015-06-27 02:28:17', '2015-06-27 02:28:17'),
(2, 'owner', '$2y$10$IYcKiYAfB1ZGhR0GWV8rJe6Mms9MiNwggxV1w/NO8HkJGM3JfHZ/a', 'yonathan', 'owner', '', '2015-06-27 02:28:17', '2015-06-27 02:28:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asalreturjual`
--
ALTER TABLE `asalreturjual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asalreturjual_noreturjual_foreign` (`noreturjual`),
  ADD KEY `asalreturjual_nojual_foreign` (`nojual`),
  ADD KEY `asalreturjual_kodebrg_foreign` (`kodebrg`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_kodekategori_unique` (`kodekategori`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detiljual`
--
ALTER TABLE `detiljual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detiljual_nojual_foreign` (`nojual`),
  ADD KEY `detiljual_kodebrg_foreign` (`kodebrg`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_kodebrg_unique` (`kodebrg`),
  ADD KEY `items_id_category_foreign` (`id_category`);

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jual_nojual_unique` (`nojual`),
  ADD KEY `jual_nikcust_foreign` (`nikcust`),
  ADD KEY `jual_user_foreign` (`user`);

--
-- Indexes for table `returjual`
--
ALTER TABLE `returjual`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `returjual_noreturjual_unique` (`noreturjual`),
  ADD KEY `returjual_user_foreign` (`user`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_niksupp_unique` (`niksupp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asalreturjual`
--
ALTER TABLE `asalreturjual`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detiljual`
--
ALTER TABLE `detiljual`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `returjual`
--
ALTER TABLE `returjual`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asalreturjual`
--
ALTER TABLE `asalreturjual`
  ADD CONSTRAINT `asalreturjual_kodebrg_foreign` FOREIGN KEY (`kodebrg`) REFERENCES `items` (`kodebrg`),
  ADD CONSTRAINT `asalreturjual_nojual_foreign` FOREIGN KEY (`nojual`) REFERENCES `jual` (`nojual`),
  ADD CONSTRAINT `asalreturjual_noreturjual_foreign` FOREIGN KEY (`noreturjual`) REFERENCES `returjual` (`noreturjual`);

--
-- Constraints for table `detiljual`
--
ALTER TABLE `detiljual`
  ADD CONSTRAINT `detiljual_kodebrg_foreign` FOREIGN KEY (`kodebrg`) REFERENCES `items` (`kodebrg`),
  ADD CONSTRAINT `detiljual_nojual_foreign` FOREIGN KEY (`nojual`) REFERENCES `jual` (`nojual`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `jual`
--
ALTER TABLE `jual`
  ADD CONSTRAINT `jual_nikcust_foreign` FOREIGN KEY (`nikcust`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `jual_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `returjual`
--
ALTER TABLE `returjual`
  ADD CONSTRAINT `returjual_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
