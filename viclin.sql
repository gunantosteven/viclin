-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2015 at 11:16 
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
-- Table structure for table `beli`
--

CREATE TABLE IF NOT EXISTS `beli` (
  `id` bigint(20) unsigned NOT NULL,
  `nobeli` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `idsupp` bigint(20) unsigned NOT NULL,
  `user` int(10) unsigned NOT NULL,
  `tglorderbeli` date NOT NULL,
  `tgltempobeli` date NOT NULL,
  `biayasusutbeli` double(13,2) NOT NULL,
  `biayakarantina` double(13,2) NOT NULL,
  `biayaclearance` double(13,2) NOT NULL,
  `biayaimpor` double(13,2) NOT NULL,
  `biayalab` double(13,2) NOT NULL,
  `biayafreight` double(13,2) NOT NULL,
  `cif` double(13,2) NOT NULL,
  `bm` double(13,2) NOT NULL,
  `pph` double(13,2) NOT NULL,
  `storage` double(13,2) NOT NULL,
  `trmc` double(13,2) NOT NULL,
  `spc` double(13,2) NOT NULL,
  `time` double(13,2) NOT NULL,
  `dokumen` double(13,2) NOT NULL,
  `ppn` double(13,2) NOT NULL,
  `stamp` double(13,2) NOT NULL,
  `handling` double(13,2) NOT NULL,
  `over` double(13,2) NOT NULL,
  `adm` double(13,2) NOT NULL,
  `edi` double(13,2) NOT NULL,
  `rush` double(13,2) NOT NULL,
  `tglfaktur` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `biayas`
--

CREATE TABLE IF NOT EXISTS `biayas` (
  `id` bigint(20) unsigned NOT NULL,
  `biaya` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nominal` double(13,2) NOT NULL,
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
  `statusdelete` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `kodekategori`, `namakategori`, `statusdelete`, `created_at`, `updated_at`) VALUES
(1, '1', 'Kepiting', '0', '2015-07-31 02:16:50', '2015-07-31 02:16:50'),
(2, '2', 'Cumi', '0', '2015-07-31 02:16:50', '2015-07-31 02:16:50'),
(3, '3', 'Udang', '0', '2015-07-31 02:16:50', '2015-07-31 02:16:50'),
(4, '4', 'Gurami', '0', '2015-07-31 02:16:50', '2015-07-31 02:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL,
  `namacust` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alamatcust` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telpcust` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kotacust` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `emailcust` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `namacust`, `alamatcust`, `telpcust`, `kotacust`, `emailcust`, `company`, `created_at`, `updated_at`) VALUES
(1, 'Budi', 'Kenjeran no. 48', '031335667788', 'Surabaya', 'budibudi@gmail.com', 'UWIKA', '2015-07-31 02:16:50', '2015-07-31 02:16:50'),
(2, 'Bunga', 'Jatim Park no. 48', '031445667788', 'Surabaya', 'bunga@gmail.com', 'UNESA', '2015-07-31 02:16:50', '2015-07-31 02:16:50'),
(3, 'Ania', 'Jember no. 48', '03161162788', 'Surabaya', 'ania@gmail.com', 'UBAYA', '2015-07-31 02:16:50', '2015-07-31 02:16:50'),
(4, 'amsyong', 'Kediri no. 48', '03185668888', 'Surabaya', 'budibudi@gmail.com', 'WM', '2015-07-31 02:16:50', '2015-07-31 02:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `detilbeli`
--

CREATE TABLE IF NOT EXISTS `detilbeli` (
  `id` bigint(20) unsigned NOT NULL,
  `nobeli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kodebrg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hargasatuankg` double(13,2) NOT NULL,
  `jumlahkg` double(13,2) NOT NULL,
  `jumlahekor` bigint(20) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detiljual`
--

CREATE TABLE IF NOT EXISTS `detiljual` (
  `id` bigint(20) unsigned NOT NULL,
  `nojual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kodebrg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hargasatuankg` double(13,2) NOT NULL,
  `jumlahkg` double(13,2) NOT NULL,
  `jumlahekor` bigint(20) NOT NULL,
  `noofbox` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) unsigned NOT NULL,
  `namaemp` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alamatemp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telpemp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kotaemp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tglmasuk` date NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `namaemp`, `alamatemp`, `telpemp`, `kotaemp`, `tglmasuk`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bejo', 'Kenjeran no. 111111', '031335447788', 'Surabaya', '2015-07-07', 'ACTIVE', '2015-07-31 02:16:51', '2015-07-31 02:16:51'),
(2, 'Titin', 'Ken Park no. 111111', '031335447788', 'Surabaya', '2015-06-13', 'QUIT', '2015-07-31 02:16:51', '2015-07-31 02:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` bigint(20) unsigned NOT NULL,
  `kodebrg` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_category` int(10) unsigned NOT NULL,
  `namabrg` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `stokkg` double(13,2) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `stokbrg` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `kodebrg`, `id_category`, `namabrg`, `stokkg`, `status`, `stokbrg`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'Kepiting A Live Food', 2.00, 'Live Food', 10, '2015-07-31 02:16:50', '2015-07-31 02:16:50'),
(2, '2', 1, 'Kepiting B Frozen Food', 1.00, 'Frozen Food', 5, '2015-07-31 02:16:50', '2015-07-31 02:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE IF NOT EXISTS `jual` (
  `id` bigint(20) unsigned NOT NULL,
  `nojual` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nikcust` bigint(20) unsigned NOT NULL,
  `user` int(10) unsigned NOT NULL,
  `tglorderjual` date NOT NULL,
  `tgltempojual` date NOT NULL,
  `biayaekspjual` double(13,2) NOT NULL,
  `biayasusutjual` double(13,2) NOT NULL,
  `biayastereo` double(13,2) NOT NULL,
  `kursbaru` double(13,2) NOT NULL,
  `tglfaktur` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revisi`
--

CREATE TABLE IF NOT EXISTS `revisi` (
  `id` bigint(20) unsigned NOT NULL,
  `user` int(10) unsigned NOT NULL,
  `tglrevisi` date NOT NULL,
  `jualbeli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dataawal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dataakhir` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE IF NOT EXISTS `salaries` (
  `id` bigint(20) unsigned NOT NULL,
  `idemp` bigint(20) unsigned NOT NULL,
  `tgltransaksi` date NOT NULL,
  `bulan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nominal` double(13,2) NOT NULL,
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
  `alamatsupp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
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
(1, 's1', 'Andre', 'Jagalan no. 48', '03111223344', 'Surabaya', 'andre@gmail.com', '2015-07-31 02:16:50', '2015-07-31 02:16:50');

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
(1, 'admin', '$2y$10$.xz.S4br6QJqYNfFdMl5euh4.rb/ISWbzgdTWgVjRrquJfRkqS3rG', 'steven', 'admin', '', '2015-07-31 02:16:49', '2015-07-31 02:16:49'),
(2, 'owner', '$2y$10$k6YYU1eFF1cEU1EnDz5D9OpHYHjI9/qMHAGtwV.ewTGE5CmIjSxiG', 'yonathan', 'owner', '', '2015-07-31 02:16:49', '2015-07-31 02:16:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beli_nobeli_unique` (`nobeli`),
  ADD KEY `beli_idsupp_foreign` (`idsupp`),
  ADD KEY `beli_user_foreign` (`user`);

--
-- Indexes for table `biayas`
--
ALTER TABLE `biayas`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `detilbeli`
--
ALTER TABLE `detilbeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detilbeli_nobeli_foreign` (`nobeli`),
  ADD KEY `detilbeli_kodebrg_foreign` (`kodebrg`);

--
-- Indexes for table `detiljual`
--
ALTER TABLE `detiljual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detiljual_nojual_foreign` (`nojual`),
  ADD KEY `detiljual_kodebrg_foreign` (`kodebrg`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revisi_user_foreign` (`user`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_idemp_foreign` (`idemp`);

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
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `biayas`
--
ALTER TABLE `biayas`
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
-- AUTO_INCREMENT for table `detilbeli`
--
ALTER TABLE `detilbeli`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detiljual`
--
ALTER TABLE `detiljual`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `revisi`
--
ALTER TABLE `revisi`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
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
-- Constraints for table `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_idsupp_foreign` FOREIGN KEY (`idsupp`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `beli_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `detilbeli`
--
ALTER TABLE `detilbeli`
  ADD CONSTRAINT `detilbeli_kodebrg_foreign` FOREIGN KEY (`kodebrg`) REFERENCES `items` (`kodebrg`),
  ADD CONSTRAINT `detilbeli_nobeli_foreign` FOREIGN KEY (`nobeli`) REFERENCES `beli` (`nobeli`);

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
-- Constraints for table `revisi`
--
ALTER TABLE `revisi`
  ADD CONSTRAINT `revisi_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_idemp_foreign` FOREIGN KEY (`idemp`) REFERENCES `employees` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
