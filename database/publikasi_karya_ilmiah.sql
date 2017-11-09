-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2017 at 01:14 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `publikasi_karya_ilmiah`
--

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE IF NOT EXISTS `papers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `tahun` year(4) NOT NULL,
  `pembimbing` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `id_user`, `judul`, `deskripsi`, `pengarang`, `tahun`, `pembimbing`, `jurusan`, `file`) VALUES
(61, 22, 'Komputer Grafik 1', 'Cara membuat grafik', 'Tajudin Noor', 2008, '', 'Lain-lain', '16072016091135.pdf'),
(62, 22, 'Tutorial Netbeans', 'Cara mengoprasikan aplikasi netbeans', 'Tajudin Noor', 2008, '', 'Lain-Lain', '16072016091542.pdf'),
(65, 22, 'Geometri pada Java2D', 'Cara membuat geometri pada java2D', 'Tajudin Noor', 2003, '', 'Teknik Informatika', '16072016092516.pdf'),
(70, 22, 'Modul Pemrograman Web', 'Bahan Penunjang Belajar Pemrograman Web', 'Tajudin Noor', 2010, '', 'Teknik Informatika', '25022017180110.pdf'),
(72, 22, 'Belajar HTML', 'Untuk menampilkan dokumen atau sebua halaman web adalah tugas dari script HTML.', 'Tajudin Noor', 2012, '', 'Teknik Informatika', '25022017180030.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `biografi` text NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama_depan`, `nama_belakang`, `gambar`, `biografi`, `alamat`, `telepon`, `url`) VALUES
(8, 'fuadmuhtaz@yahoo.co.id', '$2y$10$VQ6nTLxFahExLXVw0ip6C.j0H/q9Ua0xLXB9LCGPoinc0IZXI52ey', 'Fuad', 'Muhtaz', 'fuadmuhtaz.jpg', 'Sewaktu SMA (Aliyah) saya melakukan kegiatan blogging menggunakan Platfrom blogger. Ketika itu saya menulis artikel-artikel bebas maupun pengalaman saya pribadi di blog Dibalik Waktu. Pernah juga membuat dokumentasi tugas Java pada blog Fuad Muhtaz yang saya buat dengan mengkombinasikan beberapa framework maupun library seperti RequireJS, BackboneJS dan Bootstrap.', 'Jl. Gatot Subroto KM. 5,5 Kp. Ledug RT02/06 Keroncong, Jatiuwung Tangerang', '02159308659', 'fuadmuhtaz'),
(9, 'fajar.ngestu@gmail.com', '$2y$10$G8fiue4woLAHliTn10TsO.FjfrnOUlsqByzdgiSq16sdQCxpiAgn6', 'fajar', 'prabowo', '', '', '', '', 'fajarprabowo'),
(10, 'nadiyya@gmail.com', '$2y$10$AGkldgwvEORVlgYWaSkEve5lnbw44x5Sex0/m9iDWPDW0zNKI6bSO', 'Nadiyya', 'Ulfah', '', '', '', '', 'nadiyyaulfah'),
(13, 'admin@gmail.com', '$2y$10$Awf9aH8ClajLmzjhIwB6GewVqDrFo2uTb43fAUBMfGanqkPArMZq2', 'Admin', 'admin', '', '', '', '', 'adminadmin'),
(14, 'test@gmail.com', '$2y$10$lpIikep73/VSzd6cOWJSJ.qKLGTkN8d7rEEqjx75Hul/tm5o2P3IC', 'test', 'test', '', '', '', '', 'testtest'),
(16, 'ekomulyono13@yahoo.com', '$2y$10$8aScRtag.ttt8IFIVO8gue36MRg783nCs/KsQy37IHOTV7/7WKS1m', 'Ekovsatu', 'Kevini', 'ekokevin.jpg', 'Tes 1234558', 'Jakarta', '0628282', 'ekokevin'),
(17, 'Sifatfatimah01@gmail.com', '$2y$10$qqZy1FW9Vv9W/16ryJNk2ekp5Arv7BTCtlEpOrVpGYStBuD6nqhHy', 'siti', 'fatimah', 'sitifatimah.jpg', 'Bahagia', 'Ciputat', '087734593551', 'sitifatimah'),
(18, 'nice@gmail.com', '$2y$10$70vUf7oZEHp9TGLXZYha8eMYVAbIx9Dyu.ZcuoRbwnq5fLT1.GZ6a', 'Nice', 'Nice', 'nicenice.png', '', '', '', 'nicenice'),
(19, 'a75@gmail.com', '$2y$10$fy6hg8Necr32uzqpMcsdQ.b.QmNBIdj8kzsADn0nZMgHJeNH9gDHi', 'a75', 'a85', '', '', '', '', 'a75a75'),
(20, 'anakkopet08@gmail.com', '$2y$10$gpDyjdWYKcK5K5SwnwSLfeQZvXYobasBgRIxRPA4C//SNZ/vb667G', 'ismail', 'azizah', '', '', '', '', 'ismailmail'),
(21, 'afhne@yahoo.com', '$2y$10$6vxaVwC7ZzoZceAyjIrcCel2V49CjvbpclM7k/O/vwgIG/./504VG', 'Fajar', 'prabowo', 'fajarprabowo.jpg', '', '', '', 'fajarprabowo'),
(22, 'diens.madang@gmail.com', '$2y$10$cq1U/5SymxvIE8QVd2PTuuR2YU9WZEEkKLwM18Jaa4a93M8RZbcu2', 'diens', 'madang', '', '', '', '', 'diensmadang'),
(23, 'tajudin.noor@outlook.com', '$2y$10$4E8NmBYCLtmnYa/JFbcaw.EwJz.Wi6POdXDm/owvNWRzJPZ4KKNC6', 'tajudin', 'noor', '', '', '', '', 'tajudinnoor');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
