-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2012 at 09:10 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `koko`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE IF NOT EXISTS `bonus` (
  `bonus` varchar(255) NOT NULL,
  `markah` int(2) NOT NULL,
  PRIMARY KEY (`bonus`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`bonus`, `markah`) VALUES
('KETUA MURID', 10),
('TIMBALAN/PENOLONG KETUA MURID', 8),
('KETUA ASRAMA', 7),
('KETUA PRS', 7),
('KUATERMASTERS', 7),
('PENOLONG KETUA ASRAMA', 6),
('PENOLONG KUATERMASTER', 6),
('KETUA RUMAH SUKAN', 7),
('AJK UTAMA ASRAMA/PRS/RUMAH SUKAN', 5),
('BENDAHARI ASRAMA/PRS/RUMAH SUKAN', 5),
('SETIAUSAHA ASRAMA/PRS/RUMAH SUKAN', 5),
('KETUA BIRO ASRAMA/PRS/RUMAH SUKAN', 5),
('PENERIMA SIJIL DAN LENCANA SLAD', 5),
('PROSTAR', 5),
('AHLI LEMBAGA PENGARAH KOPERASI SEKOLAH', 5),
('PENGAWAS PUSAT SUMBER SEKOLAH', 5),
('AHLI JAWATANKUASA KECIL BIRO', 3),
('KETUA BILIK', 3),
('KETUA DORM', 3),
('KETUA DARJAH', 3),
('KETUA TINGKATAN', 3),
('PENOLONG KETUA KELAS', 2),
('PENOLONG KETUA BILIK', 2),
('AHLI KUATERMASTER', 2),
('ANUGERAH REMAJA PERDANA (ARP) - EMAS', 10),
('ANUGERAH REMAJA PERDANA (ARP) - PERAK', 7),
('ANUGERAH REMAJA PERDANA (ARP) - GANGSA', 5),
('PINGAT HANG TUAH KEBANGSAAN', 10),
('TUNAS JAYA KEBANGSAAN', 10),
('PENCAPAIAN AKTIVITI KOKURIKULUM DI LUAR NEGARA - JOHAN', 5),
('PENCAPAIAN AKTIVITI KOKURIKULUM DI LUAR NEGARA - NAIB JOHAN', 3),
('PENCAPAIAN AKTIVITI KOKURIKULUM DI LUAR NEGARA - KETIGA', 2),
('NILAM', 5),
('LAIN-LAIN ANUGERAH', 5);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `info`) VALUES
(2, 'pengumuman satu'),
(3, 'pengumuman dua'),
(4, 'test umum');

-- --------------------------------------------------------

--
-- Table structure for table `jawatankelab`
--

CREATE TABLE IF NOT EXISTS `jawatankelab` (
  `jawatan` varchar(255) NOT NULL,
  `markah` int(2) NOT NULL,
  PRIMARY KEY (`jawatan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawatankelab`
--

INSERT INTO `jawatankelab` (`jawatan`, `markah`) VALUES
('PENGERUSI', 10),
('PRESIDEN', 10),
('KETUA PASUKAN', 10),
('KETUA RUMAH', 10),
('TIMBALAN PENGERUSI', 8),
('NAIB PENGERUSI', 8),
('SETIAUSAHA', 7),
('BENDAHARI', 7),
('PENOLONG SETIAUSAHA', 6),
('PENOLONG BENDAHARI', 6),
('AHLI JAWATANKUASA', 5),
('AHLI AKTIF', 3),
('AHLI BIASA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jawatanuniform`
--

CREATE TABLE IF NOT EXISTS `jawatanuniform` (
  `jawatan` varchar(255) NOT NULL,
  `markah` int(2) NOT NULL,
  PRIMARY KEY (`jawatan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawatanuniform`
--

INSERT INTO `jawatanuniform` (`jawatan`, `markah`) VALUES
('PENGAKAP RAJA', 10),
('PANDU PUTERI RAJA', 10),
('PEGAWAI WARAN I', 10),
('SUB-INSPEKTOR', 10),
('DRUM MAJOR', 10),
('PEGAWAI WARAN II', 8),
('BINTARA KANAN', 8),
('STAF SARJAN', 8),
('SARJAN MEJAR', 8),
('KETUA TRUP', 8),
('ANUGERAH KETUA PESURUHJAYA', 8),
('SARJAN', 7),
('PENOLONG TRUP', 7),
('BINTARA MUDA', 7),
('KETUA PLATUN', 7),
('KOPERAL', 5),
('LANS KOPERAL', 5),
('KETUA PATROL', 5),
('PENOLONG KETUA PATROL', 5),
('AJK', 5),
('LASKAR KANA', 5),
('PRA-PERSETIAAN', 3),
('AHLI AKTIF', 3),
('AHLI BIASA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`aid`, `kategori`) VALUES
(1, 'PASUKAN BADAN BERUNIFORM'),
(2, 'KELAB/PERSATUAN'),
(3, 'SUKAN/PERMAINAN');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kid` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(255) NOT NULL,
  PRIMARY KEY (`kid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kid`, `kelas`) VALUES
(1, '1 AMANAH'),
(2, '1 AMAL'),
(4, '2 AMANAH'),
(5, '2 AMAL'),
(6, '2 ARIF'),
(7, '3 AMAL'),
(8, '3 AMANAH'),
(9, '3 ARIF'),
(10, '1 ARIF');

-- --------------------------------------------------------

--
-- Table structure for table `kokurikulum`
--

CREATE TABLE IF NOT EXISTS `kokurikulum` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `kokurikulum` varchar(255) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `kokurikulum`
--

INSERT INTO `kokurikulum` (`oid`, `aid`, `kokurikulum`) VALUES
(1, 1, 'PBSM'),
(2, 1, 'PENGAKAP'),
(4, 1, 'TUNAS PUTERI'),
(5, 1, 'PUTERI ISLAM'),
(6, 2, 'BAHASA INGGERIS'),
(7, 2, 'ALAM SEKITAR'),
(8, 2, 'TUNAS BESTARI'),
(9, 2, 'PENDIDIKAN SENI'),
(10, 2, 'KOMPUTER'),
(11, 3, 'SEPAK TAKRAW'),
(12, 3, 'BOLA SEPAK'),
(13, 3, 'BOLA JARING'),
(14, 3, 'BOLA BALING'),
(15, 3, 'HOKI'),
(16, 3, 'BADMINTON'),
(17, 3, 'OLAHRAGA');

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE IF NOT EXISTS `pelajar` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pnokp` varchar(12) NOT NULL,
  `pnama` varchar(255) NOT NULL,
  `pjantina` varchar(50) NOT NULL,
  `pnogiliran` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`pid`, `pnokp`, `pnama`, `pjantina`, `pnogiliran`) VALUES
(1, '010101011111', 'AHMAD BIN MUHAMMAD', 'LELAKI', 'A0001'),
(2, '020202020202', 'ROSNI BINTI UMARUDDIN', 'PEREMPUAN', 'A0002'),
(3, '030303030303', 'ROSLAN BIN RAZMAN', 'LELAKI', 'A01233'),
(4, '040404044040', 'ZANARIAH BINTI MOHD GHAUS', 'PEREMPUAN', 'A00345'),
(5, '005050550505', 'MOHD SALEH BIN MOHD ARIF', 'LELAKI', 'A00203'),
(6, '060606006060', 'FARIZAH BINTI ABD MAJID', 'PEREMPUAN', 'A12345'),
(7, '070700707007', 'BALA KRISHNIAN A/L R. MUNIANDY', 'LELAKI', ''),
(8, '080808080808', 'HALIMAH BINTI ENDUT', 'PEREMPUAN', 'A11123'),
(9, '090909090909', 'ROSLI BIN UMARUDDIN', 'LELAKI', 'A44445');

-- --------------------------------------------------------

--
-- Table structure for table `penglibatan`
--

CREATE TABLE IF NOT EXISTS `penglibatan` (
  `penglibatan` varchar(255) NOT NULL,
  `markah` int(2) NOT NULL,
  PRIMARY KEY (`penglibatan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penglibatan`
--

INSERT INTO `penglibatan` (`penglibatan`, `markah`) VALUES
('ANTARABANGSA', 20),
('KEBANGSAAN', 17),
('NEGERI', 14),
('ZON/DAERAH/BAHAGIAN', 11),
('SEKOLAH', 8);

-- --------------------------------------------------------

--
-- Table structure for table `sesikelas`
--

CREATE TABLE IF NOT EXISTS `sesikelas` (
  `sidk` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(4) NOT NULL,
  `kid` int(11) NOT NULL,
  `unokp` varchar(12) NOT NULL,
  PRIMARY KEY (`sidk`),
  KEY `kid` (`kid`),
  KEY `tahun` (`tahun`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sesikelas`
--

INSERT INTO `sesikelas` (`sidk`, `tahun`, `kid`, `unokp`) VALUES
(1, 2012, 2, '3'),
(2, 2012, 1, '5'),
(3, 2012, 5, '4'),
(4, 2012, 4, '2');

-- --------------------------------------------------------

--
-- Table structure for table `sesipelajar`
--

CREATE TABLE IF NOT EXISTS `sesipelajar` (
  `sidp` int(11) NOT NULL AUTO_INCREMENT,
  `sidk` int(11) NOT NULL,
  `pnokp` varchar(12) NOT NULL,
  `uniform` int(11) NOT NULL,
  `jawatan1` varchar(255) NOT NULL,
  `jawat1` int(2) NOT NULL,
  `penglibatan1` varchar(255) NOT NULL,
  `libat1` int(2) NOT NULL,
  `pencapaian1` varchar(255) NOT NULL,
  `capai1` int(2) NOT NULL,
  `hadir2` int(2) NOT NULL,
  `hadir3` int(2) NOT NULL,
  `markah1` int(3) NOT NULL,
  `gred1` char(1) NOT NULL,
  `kelab` int(11) NOT NULL,
  `jawatan2` varchar(255) NOT NULL,
  `jawat2` int(2) NOT NULL,
  `penglibatan2` varchar(255) NOT NULL,
  `libat2` int(2) NOT NULL,
  `pencapaian2` varchar(255) NOT NULL,
  `capai2` int(2) NOT NULL,
  `hadir5` int(2) NOT NULL,
  `hadir6` int(2) NOT NULL,
  `markah2` int(3) NOT NULL,
  `gred2` char(1) NOT NULL,
  `sukan` int(11) NOT NULL,
  `jawatan3` varchar(255) NOT NULL,
  `jawat3` int(2) NOT NULL,
  `penglibatan3` varchar(255) NOT NULL,
  `libat3` int(2) NOT NULL,
  `pencapaian3` varchar(255) NOT NULL,
  `capai3` int(2) NOT NULL,
  `hadir8` int(2) NOT NULL,
  `hadir9` int(2) NOT NULL,
  `markah3` int(3) NOT NULL,
  `gred3` char(1) NOT NULL,
  `bonus` varchar(255) NOT NULL,
  `bns` int(2) NOT NULL,
  `markah` varchar(6) NOT NULL,
  `gred` char(1) NOT NULL,
  PRIMARY KEY (`sidp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `sesipelajar`
--

INSERT INTO `sesipelajar` (`sidp`, `sidk`, `pnokp`, `uniform`, `jawatan1`, `jawat1`, `penglibatan1`, `libat1`, `pencapaian1`, `capai1`, `hadir2`, `hadir3`, `markah1`, `gred1`, `kelab`, `jawatan2`, `jawat2`, `penglibatan2`, `libat2`, `pencapaian2`, `capai2`, `hadir5`, `hadir6`, `markah2`, `gred2`, `sukan`, `jawatan3`, `jawat3`, `penglibatan3`, `libat3`, `pencapaian3`, `capai3`, `hadir8`, `hadir9`, `markah3`, `gred3`, `bonus`, `bns`, `markah`, `gred`) VALUES
(1, 1, '010101011111', 2, 'PENGAKAP RAJA', 10, 'KEBANGSAAN', 17, 'NAIB JOHAN', 16, 17, 1, 93, 'A', 10, 'AHLI AKTIF', 3, 'ZON/DAERAH/BAHAGIAN', 11, 'KETIGA', 10, 10, 1, 69, 'B', 12, 'AHLI BIASA', 1, 'NEGERI', 14, 'JOHAN', 14, 10, 2, 79, 'B', 'KETUA MURID', 10, '96', 'A'),
(2, 1, '070700707007', 1, 'SARJAN', 7, 'SEKOLAH', 8, '', 0, 10, 2, 46, 'C', 6, 'AHLI AKTIF', 3, 'ZON/DAERAH/BAHAGIAN', 11, 'NAIB JOHAN', 10, 10, 1, 69, 'B', 12, 'SETIAUSAHA', 7, 'SEKOLAH', 8, 'NAIB JOHAN', 7, 10, 2, 72, 'B', '', 0, '70.5', 'B'),
(3, 1, '060606006060', 5, 'AJK', 5, 'ZON/DAERAH/BAHAGIAN', 11, 'NAIB JOHAN', 10, 17, 1, 76, 'B', 6, 'PENOLONG SETIAUSAHA', 6, 'SEKOLAH', 8, '', 0, 12, 0, 64, 'B', 13, 'KETUA PASUKAN', 10, 'NEGERI', 14, 'JOHAN', 14, 12, 0, 88, 'A', '', 0, '82', 'A'),
(4, 1, '080808080808', 0, '', 0, '', 0, '', 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, 0, 0, 0, '', '', 0, '0', ''),
(5, 4, '030303030303', 0, '', 0, '', 0, '', 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, 0, 0, 0, '', '', 0, '0', ''),
(6, 1, '090909090909', 2, 'AJK', 5, 'SEKOLAH', 8, '', 0, 10, 2, 44, 'C', 10, 'AHLI BIASA', 1, 'SEKOLAH', 8, '', 0, 12, 0, 59, 'C', 12, 'AHLI AKTIF', 3, 'NEGERI', 14, 'NAIB JOHAN', 13, 10, 0, 72, 'B', 'KETUA DARJAH', 3, '68.5', 'B'),
(7, 1, '040404044040', 0, '', 0, '', 0, '', 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, 0, 0, 0, '', '', 0, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE IF NOT EXISTS `tahun` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`tid`, `tahun`) VALUES
(1, 2012),
(6, 2011);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `ulevel` int(1) NOT NULL DEFAULT '3',
  `unokp` varchar(12) NOT NULL,
  `upass` varchar(32) NOT NULL,
  `unama` varchar(255) NOT NULL,
  `ujawatan` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `ulevel`, `unokp`, `upass`, `unama`, `ujawatan`) VALUES
(1, 1, '1', '123', 'AHMAD ALBAB', 'GURU DG41'),
(5, 2, '2', '2', 'SITI ROHAIYA BT MOHD MOHIADIN', 'GURU SEMENTARA KELAS 1 AMANAH'),
(7, 2, '3', '3', 'AMIRUL HAKIM BIN RAHMAN', 'GURU KELAS 1 AMANAH'),
(8, 2, '4', '4', 'NOR BAIYAH BINTI ZUBIR', 'GURU KOKO'),
(9, 2, '5', '5', 'MUHAMMAD AZAHARI BIN MUHAMMAD YUSUF', 'GURU KELAS 2 AMAL'),
(10, 1, '7', '7', 'TUJUH', 'TEST');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
