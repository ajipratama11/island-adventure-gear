-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 08:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `island_adventure_gear`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(300) DEFAULT NULL,
  `slug` varchar(300) DEFAULT NULL,
  `topic_article` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `author` varchar(25) DEFAULT NULL,
  `images` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `slug`, `topic_article`, `date`, `description`, `author`, `images`) VALUES
(1, 'Mendaki Gunung, Bukan Hanya Menikmati Keindahan Alam', 'mendaki-gunung-bukan-hanya-menikmati-keindahan-alam', 'mendaki', '2023-05-17', '<p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Animo masyarakat untuk mendaki gunung masih tinggi, meski saat ini kehidupan kita tengah diselimuti pandemi.</em></p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Pada laman&nbsp;<span style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(0, 128, 0);\"><a href=\"https://bookingsemeru.bromotenggersemeru.org/index/blog\" style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; touch-action: manipulation; color: rgb(0, 128, 0);\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">booking online</em></a></span>&nbsp;Pendakian Gunung Semeru, terlihat hingga 31 Juli 2021, kuota untuk pendaki penuh. Sesuai aturan, Taman Nasional Bromo Tengger Semeru memberlakukan kuota 30% atau sekitar 180 orang per hari, yang tentunya akan disesuaikan berdasarkan hasil pemantauan lapangan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Tingginya animo tersebut menunjukkan meningkatnya minat khalayak untuk menikmati eksotika alam Indonesia. Namun begitu, di sisi lain, fenomena ini nyatanya mulai mengalami pergeseran motivasi dalam diri pendaki, yang merupakan niat awal dilakukannya pendakian.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><span style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 600;\">Perilaku pendaki</span></p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Secara umum, Rahman dkk [2017] mencatat, motivasi dasar para pendaki untuk naik ke Gunung Merbabu adalah melepas penat, menikmati pemandangan alam, mencoba hal baru, dan hobi. Namun, pada era digital dengan maraknya media sosial saat ini, motivasi tersebut bertambah dengan upaya unjuk eksistensi. Paling utama adalah mengejar&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">content</em>&nbsp;media sosial yang mereka miliki.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Ini wajar dilakukan, selama masih memenuhi aspek keselamatan, regulasi formal, dan norma lokal yang berlaku. Namun, motif tersebut akan menjadi pangkal keresahan kita bersama, ketika konten media sosial itu dijadikan sebagai tujuan utama, yang dilakukan dengan segala cara.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Mendaki gunung merupakan aktivitas alam bebas penuh risiko. Untuk itu, aspek pemenuhan keselamatan fisik pendaki, peralatan, maupun pengetahuan menjadi sangat penting diperhatikan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Mengutip data Saskuandra [2019], sejak 2013 [asumsi awal ledakan jumlah pendaki gunung] hingga 2019, tercatat sebanyak 68 kasus kematian. Informasi ini mengimplikasikan, aspek keselamatan mutlak dipenuhi dalam aktivitas pendakian.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Perilaku pendaki selama aktivitas pun menarik disorot. Terutama, kesadaran untuk tidak membuang sampah sembarangan di gunung.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Sebagai gambaran, dalam sebuah kegiatan bersih-bersih di Gunung Gede Pangrango, Maret 2020, didapati sampah lebih dari satu ton. Sampah itu berasal dari aktivitas pendakian.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Belum lagi perilaku untuk tidak merusak keragaman hayati yang masih terjadi. Kasus&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">public figure</em>&nbsp;yang memetik bunga&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">edelweis</em>&nbsp;beberapa waktu lalu di Gunung Bromo adalah salah satu contoh buruk.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Padahal, berdasarkan Peraturan Menteri Lingkungan Hidup dan Kehutanan No. P.106/MENLHK/SETJEN/KUM.1/12/2018 tentang Jenis Tumbuhan dan Satwa Dilindungi, edelweis [<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Anaphalis</em>&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">javanica</em>] merupakan jenis bunga dilindungi dari kepunahan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Hal tidak terpuji lain yang masih terjadi selama akitivias pendakian adalah memutar musik keras di gunung, vandalisme, hingga memahat nama di pohon atau batu yang seharusnya alami.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><span style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 600;\">Penataan</span></p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Sudah saatnya, aktivitas mendaki gunung ditata kembali, dengan menerapkan konsep ekowisata secara konsisten. Konsep yang populer pada 1980-an, sebagai bentuk penerapan pembangunan berkelanjutan [<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">sustainable development</em>]. Ada empat poin yang harus difokuskan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Pertama,&nbsp;</em>mendukung perlindungan satwa, tumbuhan, dan area. Tak disangkal, sebagian besar gunung di Indonesia berada dalam kawasan konservasi, atau koridor maupun penyangga kawasan tersebut.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Area ini menjadi wilayah esensial dalam upaya pelestarian satwa, tumbuhan, maupun habitatnya. Perilaku yang tidak mendukung bahkan merusak keragaman hayati sudah pasti sangat dilarang dilakukan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Kedua</em>, memperkuat upaya lembaga pengelola sumber daya alam. Umumnya, lembaga negara yang mengelola gunung adalah Kementerial Lingkungan Hidup dan Kehutanan [Taman Nasional, Taman Wisata Alam, dan BKSDA] maupun Kementerian BUMN [Perhutani].</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Pembatasan jumlah kuota pendaki adalah ikhtiar yang layak diapresiasi. Ini bukan menolak rezeki, justru sesuai konsep daya dukung lingkungan, sehingga bisa meningkatkan&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">bargaining</em>&nbsp;destinasi wisata, semakin ekslusif.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Ketiga</em>, penerapan interprestasi dan etika. Poin penting ekowisata adalah penyadartahuan suatu destinasi, baik yang bersifat&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">scientific</em>&nbsp;maupun&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Traditional Ecological Knolwledge</em>&nbsp;[TEK] melalui interprestasi. Pendaki nantinya tidak hanya menikmati panorama dan petualangan tanpa makna, namun juga memperoleh penyadaran, pengetahuan, dan edukasi lingkungan sebagai nilai tambah.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Dikarenakan mengandung nilai tradisional, pelibatan masyarakat atau komunitas lokal dalam aktivitas pengelolaan pendakian sudah selayaknya dilakukan. Pelibatan komunitas Saver [Sahabat Volunteer Semeru] yang memberikan&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">briefing</em>&nbsp;syarat dan etika pendakian Gunung Semeru di Pos Ranupane adalah teladan yang patut diikuti.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Keempat</em>, memberikan alternatif nafkah. Sudah dipahami bersama, aktivitas wisata termasuk ekowisata diyakini mampu memberikan efek ekonomi. Ini perlu digarisbawahi, efek ekonomi yang dimaksud bukan kepada&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">corporate</em>&nbsp;namun lebih pada</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Merujuk data Daris dan Wijaya [2016], uang yang mengalir ke masyarakat Desa Patak Banteng dari aktivitas pendakian Gunung Prau saat&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">peak season</em>, diperkirakan lebih dari 1,1 miliar Rupiah. Ini menunjukkan, masyarakat lokal sebagai penghuni kawasan, yang juga telah berkontribusi dalam etik tradisional, telah menerima manfaat dari kegiatan tersebut. Bukan sebagai penonton.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Namun begitu, perlu diingat bahwa upaya-upaya ini tak dapat dibebankan pada satu pihak saja. Keterlibatan dan kontribusi para pemangku kepentingan [<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">stakeholder engagement</em>] termasuk pendaki, adalah keniscayaan yang perlu diperhitungkan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Para pendaki yang umumnya berasal dari elemen mapala [mahasiswa pencinta alam], sispala [siswa pencinta alam] atau organisasi pecinta alam [OPA] dapat dimaksimalkan juga kompetensinya. Misal, mereka melakukan analisis vegetasi [anveg], mengamati tumbuhan dan satwa, atau membuat kajian sosial-ekonomi dan budaya.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Informasi tersebut, tentu saja sangat bermanfaat, karena bisa dijadikan pijakan awal sebagai upaya pelestarian suatu kawasan.</p>', 'admin island adventure ge', 'gunung.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `full_name`, `address`, `username`, `email`, `password`, `picture`) VALUES
(1, 'admin island adventure gear', 'Gedung SSI Service Center, Jl. Sekar Waru No 1 Lt 2, Sanur, Bali', 'admin', 'admin@gmail.com', '$2y$10$RLXBl6JiQ3itCirbCzBhC.K/BsqOLimCQ9DiozTKNVAbOgJGvzmcq', 'me2-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(150) DEFAULT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_category`, `image`) VALUES
(10, 'ACCESORIES CAMP', 'green_black.jpg'),
(11, 'HEADLAMP', 'c391c4bf-edf8-49a5-b241-dc3e99b44670.jpg'),
(12, 'KURSI & MEJA OUTDOORS (PORTABLE)', '96309beb-6b79-4a1e-83a6-8678f6009fd2.jpg'),
(13, 'LAMPU TENDA', '6a79a49d-a08b-45b7-8ea4-e6f868a07915.jpg'),
(14, 'SLEEPING BAG', '064c0c20-7139-49af-8c80-98dbbb38c6f7.jpg'),
(15, 'SLEEPING PAD (MATRAS)', '1f538189-afbb-406f-b11d-a27896b6be35.jpg'),
(16, 'TENDA 2P VESTIBULE EXTENSION', 'Tambora_Reborn_Green.png'),
(17, 'TREKKING POLE', '99add43b-a0c1-4006-a50f-94c646ebeb44.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaction`
--

CREATE TABLE `detail_transaction` (
  `id` int(11) NOT NULL,
  `trans_code` varchar(25) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `sub_totally` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaction`
--

INSERT INTO `detail_transaction` (`id`, `trans_code`, `product_id`, `qty`, `price`, `sub_totally`) VALUES
(6, 'IAG20230517-00001', 3, 1, '100000', '100000'),
(7, 'IAG20230517-00002', 1, 1, '400000', '400000'),
(8, 'IAG20230518-00001', 6, 1, '800000', '800000');

-- --------------------------------------------------------

--
-- Table structure for table `mutation`
--

CREATE TABLE `mutation` (
  `id` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `nominal` varchar(15) DEFAULT NULL,
  `date_mutation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mutation`
--

INSERT INTO `mutation` (`id`, `from_id`, `to_id`, `nominal`, `date_mutation`) VALUES
(2, 4, 3, '5000', '2023-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `payment_name` varchar(50) DEFAULT NULL,
  `balance` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `payment_name`, `balance`) VALUES
(2, 'Bank BCA', '410000'),
(3, 'Bank Mandiri', '900000'),
(4, 'Cash', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `stock` int(5) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_code`, `product_name`, `slug`, `stock`, `description`, `price`, `category_id`, `subcategory_id`, `image`, `sold`) VALUES
(1, 'JAKET001', 'Jaket Outdoor', 'jaket-outdoor', 4, '<p>Jaket Outdoor ini dapat melindungi anda dari dingin dan membuat ada merasa nyaman.</p>', '400000', 7, NULL, 'TAS_CARRIER.png', 1),
(3, 'HEADLAMP003', 'Headlamp ukuran normal', 'headlamp-ukuran-normal', 14, '<p>test test test</p>', '100000', 8, NULL, 'HEADLAMP.png', 1),
(6, 'SEPATU001', 'Sepatu Outdoor', 'sepatu-outdoor', 4, '<p>sepatu outdoor keren</p>', '800000', 5, NULL, 'SEPATU_OUTDOORS.png', 0),
(7, 'BIGADVENTURE002', 'Bigadventure Matoa 70x40cm - Microfiber Towel Merah', 'bigadventure-matoa-70x40cm-microfiber-towel-merah', 5, '<p>TOWEL ON THE GO, MATOA SERIES!</p><p>Salah satu barang yang suka kelupaan dibawa ketika hiking/traveling nih, handuk! Tentunya handuk yang dibawa harus ringan, ringkas, dan cepet kering yaa. Biar gak nyusahin diri sendiri pastinyaa????</p><p>Nah, Matoa Series dari Bigadventure ini bisa jadi solusi buat kamu. Matoa diambil dari nama pohon asli Indonesia yang memiliki daya serap air yang tinggi. Sama banget dengan handuk ini!</p><p>Spesifikasi:</p><p>1. Microfiber Fabric</p><p>2. Bacteriostatic &amp; Quick Dry</p><p>3. Hanger</p><p>4. Size Pakai</p><p>- besar: 120 x 70 cm</p><p>- kecil: 70 x 40 cm</p><p>5. Size Packing</p><p>- besar: 15 x 7.5 cm</p><p>- kecil: 12 x 6 cm</p>', '76000', 10, NULL, 'Merah.jpg', 0),
(8, 'BIGADVENTURE001', 'Bigadventure Matoa 70x40cm - Microfiber Towel Biru', 'bigadventure-matoa-70x40cm-microfiber-towel-biru', 5, '<p>TOWEL ON THE GO, MATOA SERIES!</p><p>Salah satu barang yang suka kelupaan dibawa ketika hiking/traveling nih, handuk! Tentunya handuk yang dibawa harus ringan, ringkas, dan cepet kering yaa. Biar gak nyusahin diri sendiri pastinyaa????</p><p>Nah, Matoa Series dari Bigadventure ini bisa jadi solusi buat kamu. Matoa diambil dari nama pohon asli Indonesia yang memiliki daya serap air yang tinggi. Sama banget dengan handuk ini!</p><p>Spesifikasi:</p><p>1. Microfiber Fabric</p><p>2. Bacteriostatic &amp; Quick Dry</p><p>3. Hanger</p><p>4. Size Pakai</p><p>- besar: 120 x 70 cm</p><p>- kecil: 70 x 40 cm</p><p>5. Size Packing</p><p>- besar: 15 x 7.5 cm</p><p>- kecil: 12 x 6 cm</p><p>Berat : 500 gr</p>', '76000', 10, NULL, NULL, 0),
(9, 'BIGADVENTURE001', 'Bigadventure Canopus - Headlamp Ultralight Multifungsi Senter Kepala', 'bigadventure-canopus-headlamp-ultralight-multifungsi-senter-kepala', 2, '<p>Canopus is the second brightest star in the night sky. It has a luminosity over 10,000 times the luminosity of the sun, is much larger and hotter. The greatness and brightness of Canopus will be presented in this multifunction head lamp. Experience the journey without darkness with Canopus!</p><p>300 Lumens</p><p>Built in 1000mAh battery</p><p>Sensor button</p><p>Multifunction with hook and magnet</p><p>7 working modes</p><p>SOS modes</p><p>Long lasting</p><p>Long distance</p><p>IPX4</p><p>Berat : 500 gr</p>', '268000', 11, NULL, '6abc42ba-de05-44c5-91b5-a7eb427ca69a.jpg', 0),
(10, 'BIGADVENTURE001', 'Bigadventure Capella - Headlamp Ultralight Senter Kepala', 'bigadventure-capella-headlamp-ultralight-senter-kepala', 2, '<p>Capella is the sixth brightest star in the night sky. It is a yellow giant star, like our own sun, but much larger. The greatness and brightness of Capella will be presented in this ultralight and powerful head lamp. Experience the journey without darkness with Capella!</p><p>180 Lumens Require</p><p>3 pieces AAA battery</p><p>Ultraloght</p><p>Lighting mode: - Floodlight - Spotlight - Strobe</p><p>SOS mode</p><p>Long lasting: up to 60hours (depends on battery quality)&nbsp;</p><p>Long distance: 42m IPX4</p>', '155400', 11, NULL, 'b3249078-9b57-4794-b9f8-e32f483d5d7a.jpg', 0),
(11, 'BIGADVENTURE001', 'Bigadventure Marantale - Small Folding Chair/ Kursi Lipat', 'bigadventure-marantale-small-folding-chair-kursi-lipat', 5, '<p>Marantale Ultralight Folding Chair</p><p><br></p><p>Kursi lipat ultralight dengan senderan yang mampu menahan beban hingga 80kg. Hadir dengan pouch ringkas yang mudah dibawa kemana-mana!</p><p><br></p><p>Material:</p><p>- Aluminium 7075 + 600D Oxford Fabric</p><p>- 210D Carry Bag</p><p>Kapasitas: 80 kg</p><p>Estimasi Berat: 375 gram</p><p>Ukuran Packing: 36 x 24 cm</p><p>Ukuran Pakai:</p><p>- Panjang dudukan 21 cm</p><p>- Lebar dudukan 18 cm</p><p>- Lebar senderan 23 cm</p><p>- Tinggi 49 cm</p><p>Terdapat kantong kecil dibawah kursi</p><div>Berat : 500 gr</div>', '201400', 12, NULL, '96309beb-6b79-4a1e-83a6-8678f6009fd2.jpg', 0),
(12, 'BIGADVENTURE001', 'Bigadventure Ursa - Foldable Camping Lantern Lampu Tenda Lipat', 'bigadventure-ursa-foldable-camping-lantern-lampu-tenda-lipat', 3, '<p>Ursa is a constellation in the northern sky. It is a blue subgiant star that lies some 101 light years from our solar system. The beauty and brightness of Ursawill be presented in this ultralight and powerful head lamp. Experience the beauty of the galaxy inside your tent!</p><p>120 Lumens</p><p>Built in 600mAh battery</p><p>Collapsible</p><p>Three brightness level: Extra bright, bright, dim</p><p>Solar charging</p><p>Long lasting: up to 20 hours</p><p>IPX4</p><p>Berat : 500 gr<br></p>', '224400', 13, NULL, '7eace4b9-374c-4776-8280-525ab1a380dd.jpg', 0),
(13, 'BIGADVENTURE001', 'Bigadventure Waluku Lampu Tenda Camping Ultralight', 'bigadventure-waluku-lampu-tenda-camping-ultralight', 3, '<p>Lampu tenda collapsible</p><p>4 mode penerangan</p><p>Extra bright</p><p>Bright</p><p>Candle effect</p><p>Multicolors</p><p><br></p><p>Tekan tombol power dua detik untuk menyalakan dan mematikan lampu.</p><p>Efek glow in the dark akan menyala ketika lampu dimatikan</p>', '120900', 13, NULL, 'e90bda76-9238-4eb1-8943-02db9f25242e.jpg', 0),
(14, 'BIGADVENTURE001', 'Bigadventure Anambas Premium Sleeping Bag - Black Red', 'bigadventure-anambas-premium-sleeping-bag-black-red', 1, '<p>1. Premium water repellent ripstop fabric</p><p>2. Silicon dacron 3oz</p><p>3. Soft Polar Lining</p><p>4. Lightweight (approx 900 gram only)</p><p>5. Limit temperature 5°C, Comfort 10-15°C</p><p>6. Size 200 x 70 cm</p><p>7. YKK Zipper</p>', '235900', 14, NULL, 'black_red.jpg', 0),
(15, 'BIGADVENTURE001', 'Bigadventure Anambas Premium Sleeping Bag - Grey Blue', 'bigadventure-anambas-premium-sleeping-bag-grey-blue', 1, '<p>1. Premium water repellent ripstop fabric</p><p>2. Silicon dacron 3oz</p><p>3. Soft Polar Lining</p><p>4. Lightweight (approx 900 gram only)</p><p>5. Limit temperature 5°C, Comfort 10-15°C</p><p>6. Size 200 x 70 cm</p><p>7. YKK Zipper</p>', '235900', 14, NULL, 'Grey_Blue.jpg', 0),
(16, 'BIGADVENTURE001', 'Bigadventure Anambas Premium Sleeping Bag - Navy Grey', 'bigadventure-anambas-premium-sleeping-bag-navy-grey', 1, '<p>1. Premium water repellent ripstop fabric</p><p>2. Silicon dacron 3oz</p><p>3. Soft Polar Lining</p><p>4. Lightweight (approx 900 gram only)</p><p>5. Limit temperature 5°C, Comfort 10-15°C</p><p>6. Size 200 x 70 cm</p><p>7. YKK Zipper</p>', '235900', 14, NULL, 'Navy_Grey.jpg', 0),
(17, 'BIGADVENTURE001', 'Bigadventure Anambas Premium Sleeping Bag - Black Green', 'bigadventure-anambas-premium-sleeping-bag-black-green', 1, '<p>1. Premium water repellent ripstop fabric</p><p>2. Silicon dacron 3oz</p><p>3. Soft Polar Lining</p><p>4. Lightweight (approx 900 gram only)</p><p>5. Limit temperature 5°C, Comfort 10-15°C</p><p>6. Size 200 x 70 cm</p><p>7. YKK Zipper</p>', '235900', 14, NULL, 'black_green.jpg', 0),
(18, 'BIGADVENTURE001', 'Bigadventure New Natuna Sleeping Bag - Green Army Orange', 'bigadventure-new-natuna-sleeping-bag-green-army-orange', 2, '<p>1. Premium water repellent fabric</p><p>2. Silicon dacron</p><p>3. Compressible packing</p><p>4. Ultralight (approx 800 gram only)</p><p>5. Limit temperature 1C</p><p>6. Size 210 x 75 cm</p><p>7. YKK Zipper</p><p>Berat : 1 Kg</p>', '409500', 14, NULL, 'army_orange.png', 0),
(19, 'BIGADVENTURE001', 'Bigadventure New Natuna Sleeping Bag - Black Maroon', 'bigadventure-new-natuna-sleeping-bag-black-maroon', 2, '<p>1. Premium water repellent fabric</p><p>2. Silicon dacron</p><p>3. Compressible packing</p><p>4. Ultralight (approx 800 gram only)</p><p>5. Limit temperature 1C</p><p>6. Size 210 x 75 cm</p><p>7. YKK Zipper</p><p>Berat 1kg<br></p>', '409500', 14, NULL, 'bm.jpg', 0),
(20, 'BIGADVENTURE001', 'Bigadventure Sikuai Premium Sleeping Bag - Black Maroon', 'bigadventure-sikuai-premium-sleeping-bag-black-maroon', 2, '<p>1. Premium water repellent fabric</p><p>2. Silicon dacron 3oz</p><p>3. Compressible packing</p><p>4. Ultralight (approx 525 gram only)</p><p>5. Limit temperature 3°C</p><p>6. Size 195 x 66 cm</p><p>7. YKK Zipper</p><p>berat 1kg<br></p>', '265800', 14, NULL, NULL, 0),
(21, 'BIGADVENTURE001', 'Bigadventure Sikuai Premium Sleeping Bag - Burgundy Black', 'bigadventure-sikuai-premium-sleeping-bag-burgundy-black', 2, '<p>1. Premium water repellent fabric</p><p>2. Silicon dacron 3oz</p><p>3. Compressible packing</p><p>4. Ultralight (approx 525 gram only)</p><p>5. Limit temperature 3°C</p><p>6. Size 195 x 66 cm</p><p>7. YKK Zipper</p><p>berat 1kg<br></p>', '265800', 14, NULL, NULL, 0),
(22, 'BIGADVENTURE001', 'Bigadventure Torowamba Sleeping Bag - Navy Blue', 'bigadventure-torowamba-sleeping-bag-navy-blue', 1, '<p>TOROWAMBA diambil dari nama pantai eksotis yang terletak di Desa Lamere, Bima, NTB. Bima sendiri terkenal sebagai salah satu daerah paling panas di Indonesia. Seperti namanya, TOROWAMBA bisa memberikan kehangatan maksimal ketika kamu membutuhkannya????</p><p>TOROWAMBA hadir menggunakan material Polar Omni Heat yang tebal dan dapat menjaga suhu tubuh dengan memantulkan panas yang tubuh kita keluarkan.</p><p>Spesifikasi:</p><p>1. Premium water repellent fabric</p><p>2. Polar Omni Heat</p><p>3. Weight: 900 gram</p><p>4. Limit temperature 0°C</p><p>5. Size 200 x 70 cm</p><p>6. YKK Zipper</p><p>7. Packing Size 25 x 12 cm</p><p>berat 2kg<br></p>', '323300', 14, NULL, NULL, 0),
(23, 'BIGADVENTURE001', 'Bigadventure Torowamba Sleeping Bag - Purple Black', 'bigadventure-torowamba-sleeping-bag-purple-black', 1, '<p>TOROWAMBA diambil dari nama pantai eksotis yang terletak di Desa Lamere, Bima, NTB. Bima sendiri terkenal sebagai salah satu daerah paling panas di Indonesia. Seperti namanya, TOROWAMBA bisa memberikan kehangatan maksimal ketika kamu membutuhkannya????</p><p>TOROWAMBA hadir menggunakan material Polar Omni Heat yang tebal dan dapat menjaga suhu tubuh dengan memantulkan panas yang tubuh kita keluarkan.</p><p>Spesifikasi:</p><p>1. Premium water repellent fabric</p><p>2. Polar Omni Heat</p><p>3. Weight: 900 gram</p><p>4. Limit temperature 0°C</p><p>5. Size 200 x 70 cm</p><p>6. YKK Zipper</p><p>7. Packing Size 25 x 12 cm</p><p>berat 2kg<br></p>', '323300', 14, NULL, 'Purple_Black.jpg', 0),
(24, 'BIGADVENTURE001', 'BIGADVENTURE BALURAN DOUBLE ALUMINIUM MATRAS FOAM PAD', 'bigadventure-baluran-double-aluminium-matras-foam-pad', 5, '<p>BALURAN DOUBLE</p><p>100 x 200 cm</p><p>packing: 50 x 12 cm</p><p>Berat: 550 gram</p><p>Foam Pad</p><p>Berat 2kg</p>', '110500', 15, NULL, 'af9887c9-9176-4038-9223-bb847f53c654.jpg', 0),
(25, 'BIGADVENTURE001', 'BIGADVENTURE BALURAN SINGLE ALUMINIUM MATRAS FOAM PAD', 'bigadventure-baluran-single-aluminium-matras-foam-pad', 5, '<p>BALURAN SINGLE</p><p>50 x 200 cm</p><p>packing: 25 x 14 cm</p><p>Aluminium Foam Pad</p><p>Berat 1Kg</p>', '76000', 15, NULL, 'cc86087e-e2e3-4ea3-8a3c-cd166f2463f0.jpg', 0),
(26, 'BIGADVENTURE001', 'Bigadventure Cikasur Foldable Mattress - Tosca', 'bigadventure-cikasur-foldable-mattress-tosca', 3, '<p>Waterproof fabric on bottom side</p><p>Water repellent and soft fabric on upper side</p><p>XPE foam</p><p>Weight 525 gram</p><p>Size 190 x 60 x 1 cm</p><p>Packing size 20 x 10 x 60 cm</p>', '212900', 15, NULL, 'Tosca.jpg', 0),
(27, 'BIGADVENTURE001', 'Bigadventure Cikasur Foldable Mattress - Dark Navy', 'bigadventure-cikasur-foldable-mattress-dark-navy', 3, '<p>Waterproof fabric on bottom side</p><p>Water repellent and soft fabric on upper side</p><p>XPE foam</p><p>Weight 525 gram</p><p>Size 190 x 60 x 1 cm</p><p>Packing size 20 x 10 x 60 cm</p><p>Berat 2kg</p>', '212900', 15, NULL, 'Dark_Navy.jpg', 0),
(28, 'BIGADVENTURE001', 'Bigadventure Rubber Sleeping Pad Matras Karet -  Biru', 'bigadventure-rubber-sleeping-pad-matras-karet-biru', 2, '<p>Foam pad 4mm (lebih tebal dan empuk)</p><p>Nylon webbing</p><p>Grey list around the mattress</p><p>Size 200 x 60 cm</p><p>Weight 730 gram</p><p>Berat 1kg</p>', '64500', 15, NULL, 'Blue.jpg', 0),
(29, 'BIGADVENTURE001', 'Bigadventure Rubber Sleeping Pad Matras Karet - Merah', 'bigadventure-rubber-sleeping-pad-matras-karet-merah', 2, '<p>Foam pad 4mm (lebih tebal dan empuk)</p><p>Nylon webbing</p><p>Grey list around the mattress</p><p>Size 200 x 60 cm</p><p>Weight 730 gram</p><p>Berat 1kg</p>', '64500', 15, NULL, 'Red.jpg', 0),
(30, 'BIGADVENTURE001', 'BIGADVENTURE SEMBALUN DOUBLE ALUMINIUM MATRAS BUBBLE PAD', 'bigadventure-sembalun-double-aluminium-matras-bubble-pad', 5, '<p>Sembalun Double</p><p>Bubble pad</p><p>2 Sided aluminium</p><p>Suitable for 2 Person</p><p>Size: 120 x 200 cm</p><p>Packing Size: 60 x 12 cm</p><p>Berat: 600 gram</p><div><br></div>', '122000', 15, NULL, '8c832e22-d61c-4f4c-b0f5-12a962791c65.jpg', 0),
(31, 'BIGADVENTURE001', 'BIGADVENTURE SEMBALUN SINGLE ALUMINIUM MATRAS BUBBLE PAD', 'bigadventure-sembalun-single-aluminium-matras-bubble-pad', 5, '<p>Sembalun Single</p><p>Bubble Pad</p><p>60 x 200 cm</p><p>packing: 30 x 12 cm</p><p>Berat: 300 gram</p>', '87500', 15, NULL, 'f54f5147-8ee6-4bc3-ada4-3ebdcd82fd4c.jpg', 0),
(32, 'TENDA001', 'Tenda Big Adventure Tambora Series (2 Person) - Lime Green', 'tenda-big-adventure-tambora-series-2-person-lime-green', 2, '<p>Flysheet: 210T Ripstop polyester PU 3000mm, UPF 50+, seam taped</p><p>Inner Tent: 190T Ripstop Breathable + B3 mesh</p><p>Floor: 210T Ripstop polyester PU 3000mm, seam taped</p><p>Footprint: 210T Ripstop polyester PU 3000mm, seam taped (200 gram)</p><p>Weight: 2350 gram (exclude footprint)</p><p>Poles: Aluminum poles 8.5 mm with triangle joining</p><p>Peg: Aluminum y stakes</p><p>Guyrope: reflecting guyrope D3mm with aluminium stopper</p><p>Other features: Pockets, lamp hanger</p><p>Size: 210 x (70 + 140 + 70) x 105 cm (see picture for details)</p><p>Package size: 40 x 15 cm</p>', '1473300', 16, NULL, 'Tambora_Reborn_Green.png', 0),
(33, 'TENDA002', 'Tenda Big Adventure Tambora Series (2 Person) - Purple', 'tenda-big-adventure-tambora-series-2-person-purple', 2, '<p>Flysheet: 210T Ripstop polyester PU 3000mm, UPF 50+, seam taped</p><p>Inner Tent: 190T Ripstop Breathable + B3 mesh</p><p>Floor: 210T Ripstop polyester PU 3000mm, seam taped</p><p>Footprint: 210T Ripstop polyester PU 3000mm, seam taped (200 gram)</p><p>Weight: 2350 gram (exclude footprint)</p><p>Poles: Aluminum poles 8.5 mm with triangle joining</p><p>Peg: Aluminum y stakes</p><p>Guyrope: reflecting guyrope D3mm with aluminium stopper</p><p>Other features: Pockets, lamp hanger</p><p>Size: 210 x (70 + 140 + 70) x 105 cm (see picture for details)</p><p>Package size: 40 x 15 cm</p>', '1473300', 16, NULL, 'Tambora_Reborn_Purple.png', 0),
(34, 'BIGADVENTURE003', 'Bigadventure Arfak - Trekking Pole', 'bigadventure-arfak-trekking-pole', 5, '<p>Arfak merupakan trekking pole tipe foldable yang ringan dan ringkas. Hadir dengan desain yang simple, elegan, dan perpaduan warna ciamik nan memukau (Dark Blue - Orange). Fitur long eva grip dengan auto system adjustable strap bikin kamu semakin nyaman saat memegangnya!</p><p>Spesifikasi:</p><p>Material: Aluminium 7075</p><p>Weight: 290 gram</p><p>Tip: Tungsten tip</p><p>Grip &amp; Strap: Long Eva Grip with auto system adjustable strap</p><p>Locking: Click &amp; Rotating locking</p><p>Folding size: 42 cm</p><p>Use size: 110 – 135 cm</p><p>Diameter 14/16/16/18 mm</p>', '293400', 16, NULL, 'de1a3b05-7d41-4fbf-ade8-2ecf5a7d4c04.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_photo`
--

CREATE TABLE `product_photo` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_photo`
--

INSERT INTO `product_photo` (`id`, `product_id`, `photo`) VALUES
(3, 2, 'Merrell_Moab_2_Waterproof.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name_subcategory` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `name_subcategory`) VALUES
(6, 6, 'Tenda Single Persone'),
(7, 6, 'Tenda Double Persone');

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE `testimony` (
  `id` int(11) NOT NULL,
  `customer` varchar(200) DEFAULT NULL,
  `content_testimony` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`id`, `customer`, `content_testimony`, `image`) VALUES
(1, 'Yoga Hermawan', 'barang sesuai dengan foto dan tidak ada cacat. terima kasih seller ', NULL),
(5, 'Doni Hendrawan', 'barang sampai dengan cepat dan real sesuai gambar', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `code_trans` varchar(25) DEFAULT NULL,
  `name_customer` varchar(150) DEFAULT NULL,
  `address_customer` varchar(100) DEFAULT NULL,
  `no_telp_customer` varchar(13) DEFAULT NULL,
  `date_trans` date DEFAULT NULL,
  `totally_qty` int(11) DEFAULT NULL,
  `transaction_total` varchar(25) DEFAULT NULL,
  `discount` varchar(25) DEFAULT NULL,
  `totally_payment` varchar(25) DEFAULT NULL,
  `payment_methods_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `code_trans`, `name_customer`, `address_customer`, `no_telp_customer`, `date_trans`, `totally_qty`, `transaction_total`, `discount`, `totally_payment`, `payment_methods_id`) VALUES
(6, 'IAG20230517-00001', 'Yoga Hermawan', 'Jl lupa ingatan no 12 Gelagah Banyuwangi', '081223667898', '2023-05-16', 1, '100000', '0', '100000', 3),
(7, 'IAG20230517-00002', 'Doni Hendrawan', 'Jl Maju Mundur No 12 Surabaya', '082111333666', '2023-05-17', 1, '400000', '0', '400000', 2),
(8, 'IAG20230518-00001', 'Yoga Hermawan', 'Jl lupa ingatan no 12 Gelagah Banyuwangi', '081223667898', '2023-05-18', 1, '800000', '0', '800000', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutation`
--
ALTER TABLE `mutation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_photo`
--
ALTER TABLE `product_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_transaction`
--
ALTER TABLE `detail_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mutation`
--
ALTER TABLE `mutation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimony`
--
ALTER TABLE `testimony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
