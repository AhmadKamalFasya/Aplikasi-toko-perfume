-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2020 pada 06.59
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perfume1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(3) NOT NULL,
  `kategori_id` int(2) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `spesifikasi` text NOT NULL,
  `file` varchar(150) NOT NULL,
  `harga` int(6) NOT NULL,
  `stok` int(3) NOT NULL,
  `status` enum('on','off','','') NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `kategori_id`, `nama_barang`, `spesifikasi`, `file`, `harga`, `stok`, `status`, `jumlah`) VALUES
(79, 1, 'Jaguar Vision ', 'Kreasi baru dari parfum merk yang sudah populer Jaguar. Jaguar menyajikan edisi berbeda yang dibuat spesial untuk para pria dengan nama Vision. Parfum ini hadir pada tahun 2011.  Jaguar Vision menghadirkan komposisi yang menarik dengan memadukan aroma Bergamot, Lemon, Cardamom dan Pineapple yang akan terasa pada TOP NOTE. Kemudian akan ada aroma Jasmine dan Marine saat MIDDLE NOTE. Lalu setelah itu perlahan anda akan disambut dengan aroma Sandalwood, Patchouli, Tonka Bean, Cedar, Vanilla dan Musk pada BASED NOTE.  Habiskan waktu liburan anda dengan aroma segar dari paduan komposisi berbagai buah dari parfum Jaguar Vision. Dengan aroma citrus fruitynya, parfum ini juga memiliki karakter yang lembut dan ketahanannya cukup menemani anda hingga usai aktifitas dengan penampilan yang berkesan dan cool.', 'Jaguar.PNG', 50000, 79, 'on', 6),
(80, 22, 'Escasa - Moon Sparkl', 'Moon Sparkle Woman akan mengingatkan Anda pada cahaya bulan dan aroma bunga yang anggun. Escada Sparkle Moon resmi diperkenalkan pada tahun 2007. Aroma Fruity sangat mendominasi aroma parfum ini.  Keharuman aroma akan dibuka dengan stroberi, kismis hitam, citruses dan buah merah pada TOP NOTE. Di MIDDLE NOTE mengungkapkan kacang manis, freesia, melati dan mawar, dan karangan bunga yang harum ini diikuti oleh raspberry, musk, cendana dan amber di dasar. Kekuatan aroma parfum yang sedang, dapat menemani Anda dalam beraktifitas sehari-hari. Seperti bekerja, bertemu klien, hangout bersama teman, dan berkencan dengan kekasih Anda.', 'Escada.PNG', 50000, 68, 'on', 0),
(81, 22, 'Angel Heart', 'Produk parfum BERKELAS dan TERBAIK dari Trends Parfume dengan bibit parfum import kualitas no.1 yg dipadukan dengan “Super Solvent” khusus pelarut bibit parfum import yg menghasilkan parfum tahan lama, berkelas dan elegan.', 'Angel.PNG', 50000, 48, 'on', 6),
(82, 22, 'Victoria - Bombshell', 'Bombshell Parfum adalah varian merk parfum Victoria’s Secret yang paling laris, lho! Bombshell memiliki aroma fruity floral yang segar dan dikenal sebagai ‘LBD Fragrance’.  Kombinasi antara Purple Passion Fruit, Shangri-La Peony dan Vanilla Orchid memberikan aroma campuran bunga dan buah yang sempurna, dikemas dalam sebuah botol kaca berwarna pink dengan pita hitam terikat di antara tutup botol. Aroma parfum Bombshell gak menyengat dan pas untuk segala usia.', 'Bomshell.PNG', 50000, 50, 'on', 4),
(83, 1, 'Polo Sprot', 'Diluncurkan pada tahun 1994, Polo Sport dari Ralph Lauren hadir dengan aroma parfum aromatic green yang sangat khas untuk pria.  Berisi aroma aldehydes, artemisia, lavender, jeruk mandarin, mint, neroli, bergamot dan lemon pada TOP NOTE. Berisi cyclamen, jahe, seagrass, melati, mawar, brazilian rosewood dan geranium pada MIDDLE NOTE. dan BASED NOTE berisi cendana, amber, musk, guaiac wood, dan cedar.  Ralph Lauren Polo Sport termasuk dalam jenis parfum Aromatic Rustic, jenis yang cukup unik karena tidak begitu banyak parfum yang bernuansa Rustic jadi membuat saya cukup penasaran untuk mencoba aromanya, apalagi Polo Sport mendapat predikat sebagai Worlds No. 1 Sports Fragrance.  Kesan yang didapatkan dari pengguna Polo Sport ini adalah remaja atau pria muda yang dinamis, full of energy dan sporty. Sangat cocok digunakan untuk berolahraga, fitness, aktivitas di pantai dan aktivitas outdoor lainnya.', 'Polo.PNG', 55000, 99, 'on', 2),
(84, 1, 'Ariel - Impulse', 'Kombinasi Cardamom dan Wine yang kompleks melambangkan kekayaan Ariel dalam hal ide, kepribadian, bakat, dan pertemanan yang sering menjadi inspirasinya.  Karakternya yang maskulin, tenang, pendiam, pemikir, dan bijaksana diwakili oleh kombinasi aroma Musk dan Amber yang lembut namun berkarakter.', 'Ariel.PNG', 50000, 80, 'on', 0),
(85, 22, 'Taylor Swift', 'Taylor Swift kembali meresmikan parfum dengan aroma baru pada bulan Juni tahun 2013 dengan nama ‘Taylor’ yang ia sajikan untuk wanita. Taylor woman ini berbeda dengan kedua parfum yang sudah lebih dulu populer. Parfum ini terinspirasi dari sebuah dongeng.  Taylor for woman diisi dengan aroma bunga Litchi, Tangerine dan Magnolia Petals pada TOP NOTE. Lalu pada MIDDLE NOTE terdapat aroma Peony, Vanilla Orchid dan Hortensia. Lambat laun akan terasa wewangian yang dihasilkan dari perpaduan Sandalwood, Apricot, Aroma kayu dan Musk pada BASED NOTE.  Segarkan diri dengan keharuman fruitynya yang istimewa dari Taylor woman ini. Karakternya yang sedang dapat menemani anda hingga melebihi durasi waktu yang tak anda sadari.', 'Taylor Swift.PNG', 50000, 75, 'on', 1),
(87, 22, 'Olla Ramlan', 'Keharuman ikonis dari Olla Ramlan  merupakan salah satu aroma musk yang menggunakan synthetic, cruelty-free musk. Dipadukan dengan lembutnya aroma lily, iris, rose, dan vanilla.  Parfum Beraroma Musk Adalah Salah Satu yang Disukai oleh Banyak Orang!', 'Olla.PNG', 55000, 45, 'on', 0),
(89, 22, 'Luna Maya', 'Adalah aroma yang sempurna untuk wanita canggih yang tahu bagaimana untuk bersenang-senang. Aroma ini menggabungkan bau manis semangka dan kiwi dengan fruitiness tart dari rhubarb. Hal ini juga berisi lemon dan aroma bunga cyclamen, dikombinasikan untuk menciptakan aroma siang hari yang genit dan menggoda.', 'Luna.PNG', 50000, 99, 'on', 2),
(90, 24, 'Kenzo - Bali', 'Jenis parfum kenzo memang sudah sejak lama menjadi pilihan utama para pecinta parfum, hal itu terlihat dari beberapa jenis parfum kenzo selalu dapat menarik para perhatian konsumen, maka dari itu parfum kenzo terlaris 2017 ini sangat layak memberikan perbedaan pada pemakainya terutama Kenzo Bali.  Kenzo Bali memiliki aroma yang sensual dan halus dengan esensi jeruk berpadu aroma anggrek, bunga buket yang eksotis, dengan kejutan aroma dasar vanilla yang membungkus aura penuh kehangatan gairah jiwa membawa anda terperangkap seolah-olah pada sebuah situasi petualangan nan eksotis di Pulau Dewata.', 'Kanzo.PNG', 55000, 78, 'on', 2),
(91, 22, 'Luna Maya', 'Adalah aroma yang sempurna untuk wanita canggih yang tahu bagaimana untuk bersenang-senang. Aroma ini menggabungkan bau manis semangka dan kiwi dengan fruitiness tart dari rhubarb. Hal ini juga berisi lemon dan aroma bunga cyclamen, dikombinasikan untuk menciptakan aroma siang hari yang genit dan menggoda.  Memakai Luna Maya  di saat sore romantis atau ketika menghabiskan hari akan menyenangkan.', 'Luna.PNG', 50000, 100, 'on', 0),
(92, 1, 'Jaguar - Visions', 'Keterangan : Kreasi baru dari parfum merk yang sudah populer Jaguar. Jaguar menyajikan edisi berbeda yang dibuat spesial untuk para pria dengan nama Vision. Parfum ini hadir pada tahun 2011. Jaguar Vision menghadirkan komposisi yang menarik dengan memadukan aroma Bergamot, Lemon, Cardamom dan Pineapple yang akan terasa pada TOP NOTE. Kemudian akan ada aroma Jasmine dan Marine saat MIDDLE NOTE. Lalu setelah itu perlahan anda akan disambut dengan aroma Sandalwood, Patchouli, Tonka Bean, Cedar, Vanilla dan Musk pada BASED NOTE. Habiskan waktu liburan anda dengan aroma segar dari paduan komposisi berbagai buah dari parfum Jaguar Vision. Dengan aroma citrus fruitynya, parfum ini juga memiliki karakter yang lembut dan ketahanannya cukup menemani anda hingga usai aktifitas dengan penampilan yang berkesan dan cool.', 'Jaguar.PNG', 55000, 90, 'on', 0),
(93, 1, 'Polo - Sport', 'bisa apa saja', 'Polo.PNG', 55000, 40, 'on', 2),
(94, 22, 'Taylor Swift', 'sadadad', 'Taylor Swift.PNG', 45000, 100, 'on', 0),
(96, 25, 'Cusson Baby', 'sdas', 'Bomshell.PNG', 45000, 35, 'on', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(2) NOT NULL,
  `kategori` varchar(16) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`, `status`) VALUES
(1, 'Pria', 'on'),
(22, 'Wanita', 'on'),
(24, 'Umum', 'on'),
(25, 'Anak-Anak', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `konfirmasi_id` int(3) NOT NULL,
  `pesanan_id` int(3) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_account` varchar(25) NOT NULL,
  `tanggal_transfer` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`konfirmasi_id`, `pesanan_id`, `nomor_rekening`, `nama_account`, `tanggal_transfer`) VALUES
(1, 14, '1231538', 'Saya', '2020-03-20'),
(2, 14, '53453413442', 'Saya lagi', '2020-03-20'),
(3, 15, '56432123', 'New User', '2020-03-20'),
(4, 16, '56432123', 'Akun ku', '2020-03-20'),
(5, 16, '343434', 'erere', '2020-03-20'),
(7, 17, '56432123', 'New User', '2020-19-06'),
(8, 33, '-', 'New User', 'COD'),
(11, 33, '-', 'Saya', 'COD'),
(12, 33, '0852221564121', 'Saya', '2020-08-06'),
(13, 17, '53453413442', 'New User', '2020-08-06'),
(14, 33, '53453413442', 'New User', '2020-08-06'),
(15, 17, '-', 'New User', 'COD'),
(16, 33, '-', 'Sayaaa', 'COD'),
(17, 34, '12312312', 'Admin22', '2020-22-07'),
(18, 35, '-', 'RESTORATION', 'COD'),
(19, 36, '-', 'sdas', 'COD'),
(20, 37, '23424234', 'sfsdf', '2020-26-07'),
(21, 38, '345345', 'dgdfgfd', '2342'),
(22, 41, '-', 'Admin 2', 'COD'),
(23, 42, '123123123', 'Admin2', '2020/27/7'),
(24, 42, '12321', 'dsfs', '2020-07-27'),
(25, 42, '123123', 'asda', '2020-07-27'),
(26, 43, '-', 'Admin2', 'COD'),
(27, 43, '-', 'Admdin2', 'COD'),
(28, 44, '123123', 'Admin2', '2020--7-27'),
(29, 44, '-', 'Admn2', 'COD'),
(30, 45, '-', 'Admin2', 'COD'),
(31, 46, '-', 'Lol', 'COD'),
(32, 46, '-', 'sdfds', 'COD'),
(33, 46, '-', 'sdfds', 'COD'),
(34, 46, '-', 'sdfds', 'COD'),
(35, 46, '-', 'dfg', 'COD'),
(36, 46, '-', 'dfg', 'COD'),
(37, 46, '3242', 'dsaa', '2020-07-27'),
(38, 47, '-', 'asdas', 'COD'),
(39, 46, '243', 'asda', '2020-07-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kota_id` int(3) NOT NULL,
  `kota` varchar(16) NOT NULL,
  `tarif` int(10) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kota_id`, `kota`, `tarif`, `status`) VALUES
(2, 'Baleendah', 5000, 'on'),
(3, 'Majalaya', 5000, 'on'),
(4, 'Solokan Jeruk', 6000, 'on'),
(8, 'Pacet', 5000, 'on'),
(9, 'Ciparay', 4000, 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(3) NOT NULL,
  `kota_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `nama_penerima` varchar(25) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `kota_id`, `user_id`, `nama_penerima`, `nomor_telepon`, `alamat`, `tanggal_pemesanan`, `status`) VALUES
(13, 2, 23, 'Saya dong', '1235678563', 'Jl. Jalan dong', '2020-04-20 15:06:36', 2),
(14, 3, 23, 'Bukan Saya', '6957836183647', 'Jl. Bukan Jalan', '2020-04-20 15:56:46', 2),
(15, 3, 21, 'New User', '4556232456', 'Jl. Jalan lagi', '2020-04-20 18:07:05', 2),
(16, 2, 19, 'Akun', '55423424', 'Jl. DOLU', '2020-04-20 18:12:54', 2),
(17, 3, 21, 'NewUSER', '123131', 'JL. KLKLKL', '2020-04-26 09:33:15', 1),
(18, 2, 21, 'NewUserlagi', '1231231', 'JL. XXX', '2020-04-26 10:13:21', 1),
(20, 2, 13, 'Admin', '083176460498', 'JL. XXX', '2020-06-19 13:15:33', 3),
(21, 2, 23, 'Gilang', '083176460498', 'sadasd', '2020-06-22 11:49:23', 0),
(22, 2, 13, 'Admin', '123123123123', 'JL.XXX', '2020-07-01 02:11:53', 0),
(23, 3, 13, 'Res', '123123123123', 'JL.XXX', '2020-07-01 02:16:16', 2),
(24, 2, 21, 'New User', '084545451512', 'JL.XXX', '2020-07-01 02:20:08', 2),
(25, 2, 21, 'New', '1231231313', 'JL.PPP', '2020-07-09 16:24:30', 2),
(26, 2, 13, 'Admin', '123', 'JL.XXX', '2020-07-11 01:03:51', 2),
(27, 2, 24, 'Loca', '123', 'JL.XXX', '2020-07-11 01:23:08', 2),
(28, 2, 13, 'Admin', '123', 'JL.DONG', '2020-07-13 16:12:22', 2),
(29, 2, 13, 'Admin', '123123', 'JL.XXX', '2020-07-14 04:54:07', 2),
(30, 2, 23, 'Saya', '1231231', 'adasd', '2020-07-18 10:34:27', 2),
(31, 2, 23, 'asdas', '12313', 'dasdsa', '2020-07-19 16:28:03', 2),
(32, 2, 13, 'Admin', '4534534', 'asdhnjasdkasjh', '2020-07-19 17:45:30', 2),
(33, 2, 21, 'NewUSER', '23423', 'asdas', '2020-07-19 19:38:36', 2),
(34, 2, 13, 'Admin2', '505050550', 'JL.XXX', '2020-07-22 07:52:16', 2),
(35, 2, 13, 'Admin2', '123123123', 'asdasda', '2020-07-25 14:20:45', 2),
(36, 4, 13, 'asdas', '54654', 'fghgfh', '2020-07-25 14:28:13', 2),
(37, 2, 21, 'fgh', '423', '23423432dsfdf', '2020-07-26 00:50:17', 0),
(38, 2, 13, 'dsfdsf', '3453', 'dsfdf', '2020-07-26 07:34:36', 2),
(39, 2, 23, 'Customer 1', '08123456789', 'JL.XXX', '2020-07-26 10:33:21', 0),
(40, 8, 23, 'Haii ', '12321321', 'JL.XXX', '2020-07-26 17:02:08', 0),
(41, 9, 13, 'Admin2', '423423424', 'JL.XXX', '2020-07-26 19:08:27', 2),
(42, 4, 13, 'Admin2', '0852222222', 'JL.XXX', '2020-07-26 19:10:19', 2),
(43, 2, 13, 'Admin2', '123', 'JL.XXX', '2020-07-26 19:17:40', 2),
(44, 3, 13, 'Admin2', '123', 'JL.XX', '2020-07-26 19:25:34', 2),
(45, 2, 13, 'ADmin2', '123', 'JL.XXX', '2020-07-26 19:29:27', 2),
(46, 2, 29, 'Lol', '2342', 'asd', '2020-08-23 11:06:47', 1),
(47, 2, 29, 'asdsa', '234', 'sdfds', '2020-08-31 07:20:40', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `pesanan_id` int(3) NOT NULL,
  `barang_id` int(3) NOT NULL,
  `quantity` tinyint(2) NOT NULL,
  `harga` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`pesanan_id`, `barang_id`, `quantity`, `harga`) VALUES
(13, 80, 1, 50000),
(14, 84, 1, 50000),
(15, 87, 1, 55000),
(16, 85, 1, 50000),
(17, 84, 1, 50000),
(17, 80, 1, 50000),
(18, 80, 1, 50000),
(20, 83, 1, 55000),
(21, 83, 1, 55000),
(22, 85, 1, 50000),
(22, 87, 1, 55000),
(23, 90, 1, 55000),
(24, 90, 1, 55000),
(25, 85, 1, 50000),
(26, 85, 1, 50000),
(27, 93, 1, 55000),
(28, 82, 1, 50000),
(29, 81, 1, 50000),
(30, 89, 1, 50000),
(31, 82, 1, 50000),
(31, 83, 1, 55000),
(32, 81, 1, 50000),
(32, 93, 1, 55000),
(33, 81, 1, 50000),
(33, 79, 1, 50000),
(34, 84, 1, 50000),
(35, 79, 1, 50000),
(36, 79, 1, 50000),
(37, 93, 1, 55000),
(38, 82, 1, 50000),
(39, 92, 1, 55000),
(40, 94, 1, 45000),
(41, 81, 1, 50000),
(42, 79, 1, 50000),
(43, 79, 1, 50000),
(44, 79, 1, 50000),
(45, 81, 1, 50000),
(46, 82, 1, 50000),
(47, 90, 1, 55000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(3) NOT NULL,
  `jumlah_user` int(3) NOT NULL,
  `barang_id` int(3) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `nilai_rating` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`rating_id`, `jumlah_user`, `barang_id`, `nama_user`, `nama_barang`, `nilai_rating`) VALUES
(21, 3, 90, 'newuser', 'Candy Fruits - Orange', 280),
(22, 8, 85, 'admin2', 'Taylor Swift', 620),
(23, 5, 93, 'Saya', 'Polo - Sport', 440),
(24, 2, 80, 'newuser', 'Escasa - Moon Sparkle', 180),
(25, 6, 79, 'admin2', 'Jaguar Vision ', 520),
(26, 1, 83, 'Saya', 'Polo Sprot', 80),
(27, 2, 82, 'admin2', 'Victoria - Bombshell', 180),
(28, 5, 84, 'admin2', 'Ariel - Impulse', 420),
(29, 2, 87, 'admin2', 'Olla Ramlan', 140),
(30, 5, 81, 'admin2', 'Angel Heart', 380);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `level` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `level`, `nama`, `email`, `alamat`, `phone`, `password`, `status`) VALUES
(2, 'customer', 'Fasya Aoi', 'fasyaaoi9@gmail.com', 'Kp. Gunung Leutik', '085222097441', '25f9e794323b453885f5181f1', 'on'),
(8, 'superadmin', 'Super', 'newakun@gmail.com', 'qwe', '085222097445', '202cb962ac59075b964b07152', 'on'),
(13, 'customer', 'admin2', 'admin@gmail.com', 'paledang', '123123123', '202cb962ac59075b964b07152', 'on'),
(18, 'customer', 'admin', ' admin@gmail.com', 'Jl. XXX', '083176460498', '202cb962ac59075b964b07152', 'on'),
(19, 'customer', 'akunbaru', ' akun@gmail.com', 'asdasdasd', '123123123123', '202cb962ac59075b964b07152', 'on'),
(20, 'customer', 'Fasyaaoi', 'fasyaaoi@gmail.com', 'Jl. XXX', '123123', '202cb962ac59075b964b07152', 'on'),
(21, 'customer', 'newuser', ' newuser@gmail.com', 'Jl. XXX', '123', '202cb962ac59075b964b07152', 'on'),
(22, 'customer', 'adminsss', 'adminsss@gmail.com', 'Jl. XXX', '132', '202cb962ac59075b964b07152', 'on'),
(23, 'superadmin', 'Saya', ' saya@gmail.com', 'Jl. XPOLS', '098156423261', '202cb962ac59075b964b07152', 'on'),
(24, 'customer', 'loca', 'loca@gmail.com', 'MARS', '123333', '202cb962ac59075b964b07152', 'on'),
(25, 'customer', 'Hallo', 'hallo@gmail.com', 'JL.MMM', '082120812391', '202cb962ac59075b964b07152', 'on'),
(27, 'customer', 'akunbarus', 'akunn', 'asda', '123', '202cb962ac59075b964b07152', 'on'),
(28, 'superadmin', 'adminsss', 'adminsss@gmail.com', 'sds', '1231231', '202cb962ac59075b964b07152d234b70', 'on'),
(29, 'customer', 'cocok', 'cocok@gmail.com', 'JL.MMM', '123213213', '202cb962ac59075b964b07152d234b70', 'on'),
(30, 'customer', 'sss', 'sss@gmail.com', 'asdas', '123', '202cb962ac59075b964b07152d234b70', 'on');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `pesanan_id` (`pesanan_id`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`),
  ADD KEY `kota_id` (`kota_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD KEY `pesanan_id` (`pesanan_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `konfirmasi_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `kota_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`pesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_detail_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
