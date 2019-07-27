-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2018 at 06:15 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakerin_kkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `bagian` varchar(50) NOT NULL,
  `username` varchar(35) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `namapic` varchar(50) DEFAULT NULL,
  `isadmin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`bagian`, `username`, `pass`, `namapic`, `isadmin`) VALUES
('admin', 'timkpi', 'timkpi2017', 'Tim KPI', 1),
('Bengkel Induk', 'bengkelinduk', 'bengkelinduk22', 'Bp. Supandi', 0),
('Bengkel Kendaraan', 'bengkelkendaraan', 'bengkelkendaraan21', 'Bp. Deta Ari', 0),
('Civil Maintenance', 'civilmaintenance', 'civilmaintenancekkp', '', 0),
('Civil Project', 'civilproject', 'civilprojectkkp', '', 0),
('COGEN', 'cogen', 'cogen16', 'Bp. Heru', 0),
('Computer', 'computer', 'computer23', 'Bp. Waskito', 0),
('EDP Surabaya', 'edpsurabaya', 'edpsurabayakkp', '', 0),
('Ekspedisi Laut Surabaya', 'ekspedisilaut', 'ekspedisilautkkp', '', 0),
('Ekspedisi Lokal Surabaya', 'ekspedisilokal', 'kelspedisilokalkkp', '', 0),
('Electrical', 'electrical', 'electrical24', 'Bp. Triarto', 0),
('Fire', 'fire', 'firekkp', '', 0),
('GSC Building Material', 'gscbuildingmaterial', 'gscbuildingmaterialkkp', '', 0),
('GSC Heavy Equipment', 'gscheavyequipment', 'gscheavyequipmentkkp', '', 0),
('GSC JUI', 'gscjui', 'gscjuikkp', '', 0),
('GSC Spareparts', 'gscspareparts', 'gscsparepartskkp', '', 0),
('Gubadi 1', 'gubadi1', 'gubadi1kkp', '', 0),
('Gubadi 2', 'gubadi2', 'gubadi2kkp', '', 0),
('Gubadi 3', 'gubadi3', 'gubadi3kkp', '', 0),
('Gubadi JUI', 'gubadijui', 'gubadijuikkp', '', 0),
('Gubadi Soda', 'gubadisoda', 'gubadisodakkp', '', 0),
('Gubaku 1', 'gubaku1', 'gubaku1kkp', '', 0),
('Gubaku 2', 'gubaku2', 'gubaku2kkp', '', 0),
('Gubaku 3', 'gubaku3', 'gubaku3kkp', '', 0),
('Gubaku JUI', 'gubakujui', 'gubakujuikkp', '', 0),
('Housekeeping', 'housekeeping', 'housekeepingkkp', '', 0),
('HR GA Surabaya', 'hrgasurabaya', 'hrgasurabaya44', 'Ibu. Tanti', 0),
('Instrument', 'instrument', 'instrument25', 'Bp. Lutfi', 0),
('Marketing Kertas JUI', 'marketingkertasjui', 'marketingkertasjuikkp', '', 0),
('Marketing Kertas Surabaya', 'marketingkertas', 'marketingkertas42', '', 0),
('Marketing Kimia', 'marketingkimia', 'marketingkimia43', 'Ibu. Titing', 0),
('Mekanik 1', 'mekanik1', 'mekanik1kkp', '', 0),
('Mekanik 2', 'mekanik2', 'mekanik2kkp', '', 0),
('Mekanik 3', 'mekanik3', 'mekanik3kkp', '', 0),
('Mekanik GS', 'mekanikgs', 'mekanikgskkp', '', 0),
('Mekanik JUI', 'mekanikjui', 'mekanikjuikkp', '', 0),
('Office Service', 'officeservice', 'officeservicekkp', '', 0),
('Personalia JUI', 'personaliajui', 'personaliajuikkp', '', 0),
('Personalia Pakerin', 'personaliapakerin', 'personaliapakerin30', 'Bp. Heru', 0),
('Pool Alat Angkut', 'paa', 'paa33', 'Bp. Heru', 0),
('Pool Alat Berat', 'pab', 'pab34', 'Bp. Sarmadi', 0),
('PPC ECC JUI', 'ppceccjui', 'ppceccjui40', 'Bp. M Thoat', 0),
('PPC ECC Pakerin', 'ppcecc', 'ppcecc11', 'Bp. Biantoro & Ibu Ming M', 0),
('Produksi Unit 1', 'produksiunit1', 'produksiunit1kkp', '', 0),
('Produksi Unit 2', 'produksiunit2', 'produksiunit2kkp', '', 0),
('Produksi Unit 3', 'produksiunit3', 'produksiunit3kkp', '', 0),
('Produksi Unit JUI', 'produksiunitjui', 'produksiunitjuikkp', '', 0),
('Purchasing Bahan Baku Surabaya', 'prchasingbahanbaku', 'purchasingbahanbakukkp', '', 0),
('QC', 'qc', 'qc12', 'Ibu. Liana', 0),
('RWT', 'rwt', 'rwt17', 'Bp.Sueb  Bp.Supri', 0),
('Security', 'security', 'securitykkp', '', 0),
('Soda Unit 1', 'sodaunit1', 'sodaunit1kkp', '', 0),
('Soda Unit 2', 'sodaunit2', 'sodaunit2kkp', '', 0),
('Timbangan', 'timbangan', 'timbangan35', 'Bp. Hokgianto', 0),
('WWT', 'wwt', 'wwt18', 'Bp.Sueb/Bp.Didik', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `idkuisioner` int(10) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `pertanyaan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `idnilai` int(10) UNSIGNED NOT NULL,
  `nilai` int(3) NOT NULL,
  `bagianpenilai` varchar(50) NOT NULL,
  `bagiandinilai` varchar(50) NOT NULL,
  `idkuisioner` int(10) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `catatan` varchar(500) DEFAULT NULL,
  `saran` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relasipenilaian`
--

CREATE TABLE `relasipenilaian` (
  `id` int(10) NOT NULL,
  `bagianpenilai` varchar(50) NOT NULL,
  `bagiandinilai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`bagian`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`idkuisioner`),
  ADD KEY `bagian` (`bagian`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`idnilai`),
  ADD KEY `bagianpenilai` (`bagianpenilai`),
  ADD KEY `bagiandinilai` (`bagiandinilai`),
  ADD KEY `idkuisioner` (`idkuisioner`);

--
-- Indexes for table `relasipenilaian`
--
ALTER TABLE `relasipenilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bagianpenilai` (`bagianpenilai`),
  ADD KEY `bagiandinilai` (`bagiandinilai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `idkuisioner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idnilai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `relasipenilaian`
--
ALTER TABLE `relasipenilaian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD CONSTRAINT `kuisioner_ibfk_1` FOREIGN KEY (`bagian`) REFERENCES `account` (`bagian`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`bagianpenilai`) REFERENCES `account` (`bagian`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`bagiandinilai`) REFERENCES `account` (`bagian`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`idkuisioner`) REFERENCES `kuisioner` (`idkuisioner`);

--
-- Constraints for table `relasipenilaian`
--
ALTER TABLE `relasipenilaian`
  ADD CONSTRAINT `relasipenilaian_ibfk_1` FOREIGN KEY (`bagianpenilai`) REFERENCES `account` (`bagian`),
  ADD CONSTRAINT `relasipenilaian_ibfk_2` FOREIGN KEY (`bagiandinilai`) REFERENCES `account` (`bagian`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
