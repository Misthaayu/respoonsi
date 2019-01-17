-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 06:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `info_lokasi`
--

CREATE TABLE `info_lokasi` (
  `lokasi_ID` int(11) NOT NULL,
  `lokasi_kode` varchar(50) NOT NULL,
  `lokasi_nama` varchar(35) NOT NULL,
  `lokasi_propinsi` int(2) NOT NULL,
  `lokasi_kabupatenkota` int(2) NOT NULL,
  `lokasi_kecamatan` int(2) NOT NULL,
  `lokasi_kelurahan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbarang`
--

CREATE TABLE `tbarang` (
  `kode_barang` int(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tberita`
--

CREATE TABLE `tberita` (
  `kode_berita` int(30) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `isi` varchar(30) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tdetail_transaksi`
--

CREATE TABLE `tdetail_transaksi` (
  `kode_transaksi` varchar(20) NOT NULL,
  `kode_barang` int(20) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tkategori`
--

CREATE TABLE `tkategori` (
  `kode_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tkomentar`
--

CREATE TABLE `tkomentar` (
  `kode_komentar` int(20) NOT NULL,
  `kode_barang` int(20) NOT NULL,
  `email_pelanggan` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `isikomentar` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tpelanggan`
--

CREATE TABLE `tpelanggan` (
  `email_pelanggan` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `telepon` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tpetugas`
--

CREATE TABLE `tpetugas` (
  `email_petugas` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_tran` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `email_pelanggan` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ttransaksi`
--

CREATE TABLE `ttransaksi` (
  `kode_transaksi` varchar(20) NOT NULL,
  `email_transaksi` varchar(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info_lokasi`
--
ALTER TABLE `info_lokasi`
  ADD PRIMARY KEY (`lokasi_ID`);

--
-- Indexes for table `tbarang`
--
ALTER TABLE `tbarang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tberita`
--
ALTER TABLE `tberita`
  ADD PRIMARY KEY (`kode_berita`);

--
-- Indexes for table `tkomentar`
--
ALTER TABLE `tkomentar`
  ADD PRIMARY KEY (`kode_komentar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info_lokasi`
--
ALTER TABLE `info_lokasi`
  MODIFY `lokasi_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbarang`
--
ALTER TABLE `tbarang`
  MODIFY `kode_barang` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tberita`
--
ALTER TABLE `tberita`
  MODIFY `kode_berita` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tkomentar`
--
ALTER TABLE `tkomentar`
  MODIFY `kode_komentar` int(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
