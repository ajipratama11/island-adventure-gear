-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Bulan Mei 2023 pada 05.20
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

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
-- Struktur dari tabel `article`
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
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `title`, `slug`, `topic_article`, `date`, `description`, `author`, `images`) VALUES
(1, 'Mendaki Gunung, Bukan Hanya Menikmati Keindahan Alam', 'mendaki-gunung-bukan-hanya-menikmati-keindahan-alam', 'mendaki', '2023-05-17', '<p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Animo masyarakat untuk mendaki gunung masih tinggi, meski saat ini kehidupan kita tengah diselimuti pandemi.</em></p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Pada laman&nbsp;<span style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; color: rgb(0, 128, 0);\"><a href=\"https://bookingsemeru.bromotenggersemeru.org/index/blog\" style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; touch-action: manipulation; color: rgb(0, 128, 0);\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">booking online</em></a></span>&nbsp;Pendakian Gunung Semeru, terlihat hingga 31 Juli 2021, kuota untuk pendaki penuh. Sesuai aturan, Taman Nasional Bromo Tengger Semeru memberlakukan kuota 30% atau sekitar 180 orang per hari, yang tentunya akan disesuaikan berdasarkan hasil pemantauan lapangan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Tingginya animo tersebut menunjukkan meningkatnya minat khalayak untuk menikmati eksotika alam Indonesia. Namun begitu, di sisi lain, fenomena ini nyatanya mulai mengalami pergeseran motivasi dalam diri pendaki, yang merupakan niat awal dilakukannya pendakian.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><span style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 600;\">Perilaku pendaki</span></p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Secara umum, Rahman dkk [2017] mencatat, motivasi dasar para pendaki untuk naik ke Gunung Merbabu adalah melepas penat, menikmati pemandangan alam, mencoba hal baru, dan hobi. Namun, pada era digital dengan maraknya media sosial saat ini, motivasi tersebut bertambah dengan upaya unjuk eksistensi. Paling utama adalah mengejar&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">content</em>&nbsp;media sosial yang mereka miliki.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Ini wajar dilakukan, selama masih memenuhi aspek keselamatan, regulasi formal, dan norma lokal yang berlaku. Namun, motif tersebut akan menjadi pangkal keresahan kita bersama, ketika konten media sosial itu dijadikan sebagai tujuan utama, yang dilakukan dengan segala cara.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Mendaki gunung merupakan aktivitas alam bebas penuh risiko. Untuk itu, aspek pemenuhan keselamatan fisik pendaki, peralatan, maupun pengetahuan menjadi sangat penting diperhatikan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Mengutip data Saskuandra [2019], sejak 2013 [asumsi awal ledakan jumlah pendaki gunung] hingga 2019, tercatat sebanyak 68 kasus kematian. Informasi ini mengimplikasikan, aspek keselamatan mutlak dipenuhi dalam aktivitas pendakian.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Perilaku pendaki selama aktivitas pun menarik disorot. Terutama, kesadaran untuk tidak membuang sampah sembarangan di gunung.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Sebagai gambaran, dalam sebuah kegiatan bersih-bersih di Gunung Gede Pangrango, Maret 2020, didapati sampah lebih dari satu ton. Sampah itu berasal dari aktivitas pendakian.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Belum lagi perilaku untuk tidak merusak keragaman hayati yang masih terjadi. Kasus&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">public figure</em>&nbsp;yang memetik bunga&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">edelweis</em>&nbsp;beberapa waktu lalu di Gunung Bromo adalah salah satu contoh buruk.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Padahal, berdasarkan Peraturan Menteri Lingkungan Hidup dan Kehutanan No. P.106/MENLHK/SETJEN/KUM.1/12/2018 tentang Jenis Tumbuhan dan Satwa Dilindungi, edelweis [<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Anaphalis</em>&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">javanica</em>] merupakan jenis bunga dilindungi dari kepunahan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Hal tidak terpuji lain yang masih terjadi selama akitivias pendakian adalah memutar musik keras di gunung, vandalisme, hingga memahat nama di pohon atau batu yang seharusnya alami.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><span style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; font-weight: 600;\">Penataan</span></p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Sudah saatnya, aktivitas mendaki gunung ditata kembali, dengan menerapkan konsep ekowisata secara konsisten. Konsep yang populer pada 1980-an, sebagai bentuk penerapan pembangunan berkelanjutan [<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">sustainable development</em>]. Ada empat poin yang harus difokuskan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Pertama,&nbsp;</em>mendukung perlindungan satwa, tumbuhan, dan area. Tak disangkal, sebagian besar gunung di Indonesia berada dalam kawasan konservasi, atau koridor maupun penyangga kawasan tersebut.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Area ini menjadi wilayah esensial dalam upaya pelestarian satwa, tumbuhan, maupun habitatnya. Perilaku yang tidak mendukung bahkan merusak keragaman hayati sudah pasti sangat dilarang dilakukan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Kedua</em>, memperkuat upaya lembaga pengelola sumber daya alam. Umumnya, lembaga negara yang mengelola gunung adalah Kementerial Lingkungan Hidup dan Kehutanan [Taman Nasional, Taman Wisata Alam, dan BKSDA] maupun Kementerian BUMN [Perhutani].</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Pembatasan jumlah kuota pendaki adalah ikhtiar yang layak diapresiasi. Ini bukan menolak rezeki, justru sesuai konsep daya dukung lingkungan, sehingga bisa meningkatkan&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">bargaining</em>&nbsp;destinasi wisata, semakin ekslusif.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Ketiga</em>, penerapan interprestasi dan etika. Poin penting ekowisata adalah penyadartahuan suatu destinasi, baik yang bersifat&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">scientific</em>&nbsp;maupun&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Traditional Ecological Knolwledge</em>&nbsp;[TEK] melalui interprestasi. Pendaki nantinya tidak hanya menikmati panorama dan petualangan tanpa makna, namun juga memperoleh penyadaran, pengetahuan, dan edukasi lingkungan sebagai nilai tambah.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Dikarenakan mengandung nilai tradisional, pelibatan masyarakat atau komunitas lokal dalam aktivitas pengelolaan pendakian sudah selayaknya dilakukan. Pelibatan komunitas Saver [Sahabat Volunteer Semeru] yang memberikan&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">briefing</em>&nbsp;syarat dan etika pendakian Gunung Semeru di Pos Ranupane adalah teladan yang patut diikuti.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\"><em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">Keempat</em>, memberikan alternatif nafkah. Sudah dipahami bersama, aktivitas wisata termasuk ekowisata diyakini mampu memberikan efek ekonomi. Ini perlu digarisbawahi, efek ekonomi yang dimaksud bukan kepada&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">corporate</em>&nbsp;namun lebih pada</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Merujuk data Daris dan Wijaya [2016], uang yang mengalir ke masyarakat Desa Patak Banteng dari aktivitas pendakian Gunung Prau saat&nbsp;<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">peak season</em>, diperkirakan lebih dari 1,1 miliar Rupiah. Ini menunjukkan, masyarakat lokal sebagai penghuni kawasan, yang juga telah berkontribusi dalam etik tradisional, telah menerima manfaat dari kegiatan tersebut. Bukan sebagai penonton.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Namun begitu, perlu diingat bahwa upaya-upaya ini tak dapat dibebankan pada satu pihak saja. Keterlibatan dan kontribusi para pemangku kepentingan [<em style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility;\">stakeholder engagement</em>] termasuk pendaki, adalah keniscayaan yang perlu diperhitungkan.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Para pendaki yang umumnya berasal dari elemen mapala [mahasiswa pencinta alam], sispala [siswa pencinta alam] atau organisasi pecinta alam [OPA] dapat dimaksimalkan juga kompetensinya. Misal, mereka melakukan analisis vegetasi [anveg], mengamati tumbuhan dan satwa, atau membuat kajian sosial-ekonomi dan budaya.</p><p style=\"-webkit-font-smoothing: antialiased; text-rendering: optimizelegibility; margin-right: 5em; margin-left: 0px; font-family: &quot;Tenor Sans&quot;, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, &quot;Gill Sans&quot;, sans-serif; font-size: 1.06em; overflow-wrap: break-word;\">Informasi tersebut, tentu saja sangat bermanfaat, karena bisa dijadikan pijakan awal sebagai upaya pelestarian suatu kawasan.</p>', 'admin island adventure ge', 'gunung.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
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
-- Dumping data untuk tabel `auth`
--

INSERT INTO `auth` (`id`, `full_name`, `address`, `username`, `email`, `password`, `picture`) VALUES
(1, 'admin island adventure gear', 'Gedung SSI Service Center, Jl. Sekar Waru No 1 Lt 2, Sanur, Bali', 'admin', 'admin@gmail.com', '$2y$10$RLXBl6JiQ3itCirbCzBhC.K/BsqOLimCQ9DiozTKNVAbOgJGvzmcq', 'me2-removebg-preview.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(150) DEFAULT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name_category`, `image`) VALUES
(5, 'Sepatu', 'SEPATU_OUTDOORS.png'),
(6, 'Tenda', 'TENDA_2P_VESTIBULE_EXTENSION_png.png'),
(7, 'Tas Carrier', 'TAS_CARRIER.png'),
(8, 'Headlamp', 'HEADLAMP.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaction`
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
-- Dumping data untuk tabel `detail_transaction`
--

INSERT INTO `detail_transaction` (`id`, `trans_code`, `product_id`, `qty`, `price`, `sub_totally`) VALUES
(6, 'IAG20230517-00001', 3, 1, '100000', '100000'),
(7, 'IAG20230517-00002', 1, 1, '400000', '400000'),
(8, 'IAG20230518-00001', 6, 1, '800000', '800000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutation`
--

CREATE TABLE `mutation` (
  `id` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `nominal` varchar(15) DEFAULT NULL,
  `date_mutation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mutation`
--

INSERT INTO `mutation` (`id`, `from_id`, `to_id`, `nominal`, `date_mutation`) VALUES
(2, 4, 3, '5000', '2023-05-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `payment_name` varchar(50) DEFAULT NULL,
  `balance` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `payment_name`, `balance`) VALUES
(2, 'Bank BCA', '410000'),
(3, 'Bank Mandiri', '900000'),
(4, 'Cash', '15000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
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
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `product_code`, `product_name`, `slug`, `stock`, `description`, `price`, `category_id`, `subcategory_id`, `image`, `sold`) VALUES
(1, 'JAKET001', 'Jaket Outdoor', 'jaket-outdoor', 4, '<p>Jaket Outdoor ini dapat melindungi anda dari dingin dan membuat ada merasa nyaman.</p>', '400000', 7, NULL, 'TAS_CARRIER.png', 1),
(3, 'HEADLAMP003', 'Headlamp ukuran normal', 'headlamp-ukuran-normal', 14, '<p>test test test</p>', '100000', 8, NULL, 'HEADLAMP.png', 1),
(6, 'SEPATU001', 'Sepatu Outdoor', 'sepatu-outdoor', 4, '<p>sepatu outdoor keren</p>', '800000', 5, NULL, 'SEPATU_OUTDOORS.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_photo`
--

CREATE TABLE `product_photo` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product_photo`
--

INSERT INTO `product_photo` (`id`, `product_id`, `photo`) VALUES
(2, 1, 'e12628d3bb727cc81e6c6b0b5165657e.jpg'),
(3, 2, 'Merrell_Moab_2_Waterproof.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name_subcategory` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `name_subcategory`) VALUES
(6, 6, 'Tenda Single Persone'),
(7, 6, 'Tenda Double Persone');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimony`
--

CREATE TABLE `testimony` (
  `id` int(11) NOT NULL,
  `customer` varchar(200) DEFAULT NULL,
  `content_testimony` text DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimony`
--

INSERT INTO `testimony` (`id`, `customer`, `content_testimony`, `image`) VALUES
(1, 'Yoga Hermawan', 'barang sesuai dengan foto dan tidak ada cacat. terima kasih seller ', NULL),
(5, 'Doni Hendrawan', 'barang sampai dengan cepat dan real sesuai gambar', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
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
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id`, `code_trans`, `name_customer`, `address_customer`, `no_telp_customer`, `date_trans`, `totally_qty`, `transaction_total`, `discount`, `totally_payment`, `payment_methods_id`) VALUES
(6, 'IAG20230517-00001', 'Yoga Hermawan', 'Jl lupa ingatan no 12 Gelagah Banyuwangi', '081223667898', '2023-05-16', 1, '100000', '0', '100000', 3),
(7, 'IAG20230517-00002', 'Doni Hendrawan', 'Jl Maju Mundur No 12 Surabaya', '082111333666', '2023-05-17', 1, '400000', '0', '400000', 2),
(8, 'IAG20230518-00001', 'Yoga Hermawan', 'Jl lupa ingatan no 12 Gelagah Banyuwangi', '081223667898', '2023-05-18', 1, '800000', '0', '800000', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_transaction`
--
ALTER TABLE `detail_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mutation`
--
ALTER TABLE `mutation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_photo`
--
ALTER TABLE `product_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `detail_transaction`
--
ALTER TABLE `detail_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mutation`
--
ALTER TABLE `mutation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `product_photo`
--
ALTER TABLE `product_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `testimony`
--
ALTER TABLE `testimony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
