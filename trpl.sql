-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2025 at 02:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `file_upload` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `user_id`, `kategori_id`, `judul_berita`, `file_upload`, `isi_berita`, `date_created`) VALUES
(26, 1, 10, 'Bangun Generasi Muda Melek Teknologi dan Berjiwa Pancasila, Startup Binaan Indigo Gelar Kids Hackath', '677570c7baf92.jpg', 'Kids Hackathon 2024 yang diselenggarakan oleh Educourse.id hadir untuk membangun generasi muda Indonesia yang kreatif, inovatif, dan selaras dengan nilai-nilai Pancasila.\r\n\r\nKids Hackathon 2024 merupakan ajang kompetisi teknologi yang diselenggarakan oleh Educourse.id, salah satu startup binaan Indigo. Acara ini hadir dengan semangat baru untuk menginspirasi generasi muda Indonesia agar lebih paham mengenai teknologi dan berjiwa kebangsaan. \r\n\r\nMengambil tema besar “Sumpah Pemuda: Ignite the Spirit of Art and Innovation,” acara ini menghubungkan semangat persatuan dan pergerakan pemuda Indonesia, yang telah tercetus dalam Sumpah Pemuda 1928, dengan perkembangan teknologi era modern. Kids Hackathon diselenggarakan bertujuan membentuk anak-anak Indonesia yang inovatif dan mengakar pada nilai-nilai Pancasila, sejalan dengan Profil Pelajar Pancasila yang mendorong mereka menjadi generasi yang beriman, kreatif, gotong-royong, mandiri, dan berpikiran kritis.', '2025-01-01 16:43:51'),
(27, 1, 10, 'Ciptakan Inovasi Pakan Ternak dari Limbah Jerami dan Ampas Tahu, Mahasiswa UPN Veteran Yogykarta Rai', '677572fd8882f.jpeg', 'Tim mahasiswa Program Studi Teknik Kimia Universitas Pembangunan Nasional (UPN) Veteran Yogyakarta mencetak prestasi gemilang. Tim yang terdiri dari Riyan Hidayat, Debora Engelien Christa Jaya, dan Ganing Irbah Al Lantip berhasil meraih Juara 1 dalam ajang Brawijaya Feed Technology Efficiency and Housing Revolution 2024, yang diselenggarakan oleh Universitas Brawijaya pada Sabtu (21/12/2024).\r\n\r\nMereka menciptakan inovasi “TernakPlus”, sebuah solusi pakan ternak terbarukan berbasis limbah jerami padi dan ampas tahu. Inovasi ini bertujuan untuk mengatasi masalah malnutrisi pada sapi akibat kekurangan pakan ketika musim kemarau.\r\n\r\n“Dengan pengolahan yang tepat, limbah pertanian dan industri ini dapat menjadi sumber pakan alternatif yang berkualitas,” jelas Riyan, salah satu perwakilan tim.\r\n\r\nRiyan, menjelaskan, ide tersebut lahir saat membaca berita tentang 70 persen populasi sapi di beberapa wilaya di Indonesia ternyata mengalami masalah malnutrisi.', '2025-01-01 16:53:17'),
(28, 1, 1, 'Linus Tech Tips: Panduan Lengkap Teknologi dan Review Gadget Terkini', '67757379c20d5.jpeg', 'Linus Tech Tips bermula dari passion seorang Linus Sebastian terhadap dunia teknologi. Pada tahun 2007, Linus memulai karirnya di NCIX, sebuah toko komputer di Kanada, sebagai penjual dan teknisi. Keahliannya dalam menjelaskan produk-produk teknologi kepada pelanggan membawanya ke dunia pembuatan konten video.\r\n\r\nPada tahun 2008, Linus mulai membuat video-video tutorial dan review produk untuk channel YouTube NCIX. Popularitas video-videonya yang terus meningkat mendorong Linus untuk membuat channel pribadinya sendiri, Linus Tech Tips, pada tahun 2012. Sejak saat itu, channel ini terus berkembang pesat dan menjadi salah satu channel teknologi terbesar di YouTube.\r\n\r\nPerkembangan Linus Tech Tips tidak lepas dari konsistensi dan kualitas konten yang dihasilkan. Linus dan timnya terus berinovasi dalam format penyajian, mulai dari review produk yang mendalam, tutorial build PC, hingga eksperimen-eksperimen teknologi yang unik. Pendekatan Linus yang santai namun informatif menjadi daya tarik utama bagi para penontonnya.', '2025-01-01 16:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `nama_dosen`, `email`, `prodi_id`, `telp`, `alamat`) VALUES
(4, '1234567893123', 'Rayendra', 'ray@gmail.com', 15, '086754987654', 'Solok'),
(5, '12345678765', 'Taufik Gusman', 'taufik@gmail.com', 16, '083456784322', 'Payakumbuh');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Politik'),
(2, 'Sosial'),
(3, 'Ekonomi'),
(6, 'Hukum'),
(9, 'Kesehatan'),
(10, 'Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `hobi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `tgl_lahir`, `jekel`, `prodi_id`, `hobi`, `email`, `alamat`) VALUES
('1234567875', 'Nana', '2021-04-05', 'P', 13, 'Bernyanyi, Membaca', 'nana@gmail.com', 'Bukittinggi'),
('1234567890', 'Agus', '2013-11-11', 'L', 12, 'Membaca', 'agus@gmail.com', 'Padang');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_mk`, `nama_mk`, `sks`, `prodi_id`, `semester`) VALUES
('456', 'dfghj', 3, 13, 6),
('TRPL', 'Perangkat Lunak', 3, 13, 3),
('ui', 'antarmuka', 2, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `jenjang_studi` char(2) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`, `jenjang_studi`, `keterangan`) VALUES
(12, 'MI', 'D3', 'Manajemen Informatika'),
(13, 'TRPL', 'D4', 'Teknologi Rekayasa Perangkat Lunak'),
(15, 'TEKOM', 'D3', 'Teknik Komputer'),
(16, 'ANIMASI', 'D4', 'Animasi'),
(17, 'TRIL', 'D3', 'Teknologi Rekayasa Instalasi Listrik');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `level`) VALUES
(1, 'badrul', 'badrul@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'user1', 'user1@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `berita_ibfk_1` (`kategori_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
