-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 11:54 PM
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
-- Database: `db_gallery_photo`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nama_album` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_di_buat` date DEFAULT NULL,
  `user_album` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `nama_album`, `deskripsi`, `tanggal_di_buat`, `user_album`) VALUES
(1, 'makanan khas', 'album ini berisikan beberapa foto makanan khas dari batam', '2024-02-29', 1),
(2, 'tempat wisata', 'album ini berisikan beberapa foto tempat wisata yang ada di batam', '2024-02-29', 1),
(3, 'tarian khas', '', '2024-02-29', 1),
(4, 'senjata khas', '', '2024-02-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `judul_foto` varchar(255) DEFAULT NULL,
  `deskripsi_foto` text DEFAULT NULL,
  `tanggal_unggah` date DEFAULT NULL,
  `lokasi_file` varchar(255) DEFAULT NULL,
  `album_foto` int(11) DEFAULT NULL,
  `user_foto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `judul_foto`, `deskripsi_foto`, `tanggal_unggah`, `lokasi_file`, `album_foto`, `user_foto`) VALUES
(1, 'nasi dagong', 'Nasi Dagong sebenarnya merupakan akronim dari Nasi Daging Gonggong, yakni hidangan berupa olahan nasi goreng. Bagian spesial yang membuat nasi goreng ini berbeda adalah lauk yang dicampurkan yakni sejenis siput yang disebut Gonggong.\r\n\r\nDitambah pula dengan bumbu rempah dan dibungkus dengan daun pisang sehingga membuatnya begitu nikmat. Di tempat lain kamu juga bisa mencoba olahan lain dari gonggong seperti dikukus atau direbus. Aneka olahan ini membuat makanan khas Batam gonggong begitu melekat bahkan menjadi salah satu identitas daerah Batam.', '2024-02-29', '1709239667_ccdade5f51953d933cf5.png', 1, 1),
(2, 'nasi lemak - mak ngah', 'Makanan khas Batam selanjutnya ada nasi lemak. Nasi lemak merupakan olahan yang bisa kamu temui di Batam karena banyak penduduk Melayu yang tinggal di sini. Nasi dimasak menggunakan menggunakan santan kelapa sehingga rasa yang dihasilkan gurih dan sedikit berminyak sehingga disebut nasi lemak. Karena popularitasnya ini, kamu sebenarnya bisa dengan mudah menjumpai di pasar-pasar yang disajikan dengan lauk seperti ikan bilis. Tak hanya di daerah dengan penduduk Melayu, kamu juga bisa menikmati sajian serupa di Jawa dengan sebutan nasi uduk.', '2024-02-29', '1709239713_5b7dd6eb7c43225423b3.jpg', 1, 1),
(3, 'mie lendir - kasan ciblek', 'Saat pertama mendengar menu mie lendir pertama kali, kamu mungkin tidak terlalu tertarik untuk mencobanya. Namun, mie lendir kasan ciblek khas Batam ini wajib kamu coba, karena cita rasanya yang menggugah selera.\r\n\r\nKuah dalam makanan ini menggunakan tepung kanji sehingga memiliki tekstur yang seperti lendir. Rasanya cenderung sedikit manis dengan pelengkap mie, yaitu tauge, telur rebus, cabai hijau, seledri, dan daun bawang.', '2024-02-29', '1709239748_f2f25b87f4ab67273e1e.png', 1, 1),
(4, 'mie sagu', 'Seperti namanya, mie pada hidangan ini dibuat dengan bahan dasar sagu yang membuat tekstur mie menjadi liat atau kenyal. Aroma sagu yang pekat bercampur dengan bumbu serta rempah-rempah yang istimewa membuatnya begitu digemari banyak orang.\r\n\r\nBerbeda dengan mie lain yang hanya memiliki rasa gurih, cita rasa mie sagu cenderung sedikit pedas. Olahan ni biasanya disajikan dengan topping taburan tauge, telur, bakso, ikan, udang, atau tambahan lain sesuai selera.', '2024-02-29', '1709239799_a308afd224ae2e0bc041.jpg', 1, 1),
(5, 'mie tarempa', 'Olahan mie lain yang bisa kamu temukan di Batam adalah Mie Tarempa yang terbuat dari mie gepeng agak lebar. Sekilas mirip dengan Mie Aceh, Mie Tarempa memiliki sedikit kuah (disebut nyemek) berwarna kemerahan.\r\n\r\nMie Tarempa dimasak menggunakan rempah-rempah yang kaya rasa sehingga begitu nikmat dan bisa diterima banyak orang. kamu bisa menikmatinya dengan tambahan topping berupa suwiran ikan tongkol atau olahan seafood lain sesuai selera.', '2024-02-29', '1709239825_327978c2c5879ad781f5.png', 1, 1),
(6, 'bak kut teh', 'Bak Kut Teh disebut pula dengan Rou Gu Cha sebenarnya merupakan makanan hasil akulturasi budaya antara Tionghoa dan Malaka. kamu bisa menjumpai makanan ini di Batam karena dulu merupakan hidangan yang sering dikonsumsi oleh para pekerja pelabuhan.\r\n\r\nHidangan ini terbuat dari daging sapi bertulang yang dimasak lengkap dengan bumbu khas dan rempah-rempahnya yang kental. Bak Kut Teh bisa dinikmati dengan banyak versi misalnya menjadi sup atau digoreng, ada juga yang ditambah ikan goreng.', '2024-02-29', '1709239858_6be8da6067ff0808bddd.jpg', 1, 1),
(7, 'luti gendang', 'Tidak hanyakan hidangan utama, kamu juga bisa menikmati makanan khas Batam jenis kue yang sekilas mirip kroket. Isinya berupa ikan yang dimasak menggunakan campuran khas tertentu, ada juga yang berisi abon ikan atau coklat.\r\n\r\nKamu bisa memilih rasa sesuai selera dengan harga yang sangat murah karena biasanya dijual dengan harga R2.000 an. Cemilan ini juga sebenarnya sangat populer dan bisa dengan mudah kamu temui bahkan di penjual pinggir jalan.', '2024-02-29', '1709239888_a9b2b44692c43e02788f.png', 1, 1),
(8, 'rocklate', 'Makanan khas Batam selanjutnya adalah rocklate. Makanan ini merupakan cemilan berupa coklat yang unik karena dikombinasikan dengan marshmallow lembut dan kenyal. Sebenarnya produk ini memiliki banyak varian seperti dengan tambahan potongan kacang panggang atau biskuit sehingga teksturnya semakin beragam.\r\n\r\nKemasan produk ini juga unik seperti “mini icon” yang dikemas dengan ukuran kecil dan coklat bar “up to you”. Makanan kering khas Batam ini juga bisa kamu beli sebagai oleh-oleh untuk keluarga di rumah.', '2024-02-29', '1709239907_bcffeea8f4d5d574258d.jpg', 1, 1),
(9, 'bingka bakar', 'Bingka bakar nayadam merupakan salah satu jajanan legendaris khas Batam. Jajanan legendaris ini juga bisa jadi oleh-oleh jika kamu berkunjung ke Batam. Makanan ini terbuat dari tepung terigu, gula, telur, dan santan.\r\n\r\nRasa manis dengan aroma khas yang timbul dari cara pengolahannya membuat kue ini begitu menggugah selera. Ada banyak varian yang bisa kamu coba seperti coklat, wijen, keju, buah naga, dan lainnya.', '2024-02-29', '1709239928_64fa4382fc2ef586c2f8.png', 1, 1),
(10, 'es pisang ijo', 'Sebagai penutup perjalanan kuliner, kamu harus mencoba es pisang ijo yang menyegarkan dan siap membilas mulut serta tenggorokan kamu. Minuman ini disajikan dengan bahan dasar pisang berbalut adonan terigu hijau dan dibanjiri kuah segar dan manis.', '2024-02-29', '1709239947_23c7ee09ad70fa197f03.png', 1, 1),
(11, 'tumbuk lada', 'Tumbuk Lada merupakan salah satu senjata tradisional yang berasal dari Provinsi Riau. Senjata tradisional ini merupakan senjata badik yang biasanya digunakan untuk menusuk musuh dari jarak yang tidak terlalu jauh. Tumbuk Lada mempunyai panjang sekitar 29 cm dengan lebar 4 cm. Di zaman dulu, Badik Tumbuk Lada ini tidak jarang dibubuhi dengan racun. Perlu dipahami bahwa sarung yang digunakan untuk membungkus senjata yang satu ini mempunyai ukuran yang sangat kompleks. Akan tetapi, hal itu justru membuat sarungnya terlihat indah.', '2024-02-29', '1709240192_555dd86522d038054889.jpg', 4, 1),
(12, 'pedang jenawi', 'Senjata tradisional Riau berikutnya adalah Pedang Jenawi. Pedang Jenawi pada zaman dulu merupakan sebuah senjata yang kerap digunakan oleh para panglima perang. Termasuk juga ketika bangsa Indonesia berperang melawan para penjajah dari Belanda. Katanya, senjata yang satu ini dipakai oleh pejuang Melayu di Provinsi Riau ketika agresi militer Belanda mulai merebak pada tahun 1940-an.', '2024-02-29', '1709240219_e3182d80997675b1b5ab.jpg', 4, 1),
(13, 'beladau', 'Beladau merupakan senjata yang berukuran kecil yang dapat dikatakan mirip dengan belati. Akan tetapi, senjata ini mempunyai bentuk yang melengkung hingga ke ujungnya. Hampir sama dengan badik tumbuk lada, senjata yang satu ini biasanya digunakan untuk menyerang musuh dari jarak dekat. Karean ukurannya yang tidak terlalu besar, beladau termasuk ke dalam senjata tradisional yang sangat praktis dan mudah untuk dibawa kemana saja. Senjata yang dibuat dari campuran bahan berupa besi yang berkualitas ini bisa digunakan untuk melindungi diri dari situasi yang genting.', '2024-02-29', '1709240252_816abf1253762adf6e01.jpg', 4, 1),
(14, 'pemuras', 'Jika pembahasan di atas kita sudah menjelaskan mengenai senjata tradisional yang berupa badik dan juga pedang. Kali ini, kita akan membahas mengenai senjata tradisional yang menggunakan peluru. Di zaman dulu, masyarakat Riau menggunakan senapan berkaliber besar yang memiliki laras pendek. Senjata tersebut dikenal dengan nama pemuras. Katanya, pemuras merupakan senjata yang dibawa oleh bangsa Eropa pada zaman dahulu.', '2024-02-29', '1709240293_78180933a4c6d89a4ec0.jpg', 4, 1),
(15, 'klewang', 'Senjata tradisional selanjutnya adalah senjata Klewang. Klewang atau Kelewang merupakan senjata tradisional Riau yang bentuk serta rupanya mirip dengan golok. Dimana ujung bilah dari senjata ini mempunyai ukuran yang lebar. Pada zaman dahulu, klewang dipakai sebagai senjata untuk berperang oleh prajurit kerajaan.\r\n\r\n\r\nSampai sekarang ini, senjata tradisional tersebut masih tetap dipakai oleh warga. Tapi pastinya, fungsi dari senjata tersebut sudah bukan lagi untuk berperang. Sekarang, senjata klewang masih digunakan untuk menunjang produktivitas masyarakat yang berprofesi sebagai petani yang seringkali melakukan aktivitas kerjanya di sawah ataupun ladang mereka sendiri.', '2024-02-29', '1709240317_39f1aa6cfbf0b1a77448.jpg', 4, 1),
(16, 'rentaka', 'Pada zaman dahulu, bukan hanya bangsa Eropa saja yang memiliki senjata canggih berupa meriam. Tidak disangka-sangka, masyarakat Indonesia, khususnya masyarakat yang ada di Provinsi Riau juga menggunakan senjata yang serupa. Pada zaman dulu, masyarakat Riau juga menggunakan senjata yang mirip dengan meriam dengan nama rentaka.\r\n\r\n\r\nPerbedaannya, rentaka ini memiliki bentuk dan ukuran yang relatif lebih kecil. Selain itu, beratnya juga lebih ringan dibandingkan dengan meriam pada umumnya. Ternyata selain di Riau, senjata ini juga kabarnya digunakan oleh masyarakat Malaysia dan Filipina. Umumnya senjata ini akan dipasang di kapal-kapal. Fungsinya sendiri yaitu untuk melawan para perompak yang pada saat itu kerap menagih upeti untuk para penguasa.', '2024-02-29', '1709240343_dacfbc07945a91ff0074.jpg', 4, 1),
(17, 'lela rentaka', 'Lela juga termasuk ke dalam salah satu senjata tradisional yang berupa meriam dengan bentuk dan ukuran yang lebih kecil lagi. Perbedaan antara lela dan juga rentaka ada pada lubang pelurunya. Dimana lubang peluru di dalam senjata lela berukuran lebih besar daripada rentaka. Nama lela sendiri juga diselipkan pada senjata yang sebelumnya sudah kita bahas. Jadi, kedua senjata ini kerap kali dikenal dengan sebutan yang sama, yaitu lela rentaka.\r\n\r\nKatanya, nama dari senjata ini diambil dari tokoh cerita roman klasik Melayu yang cukup terkenal, yaitu cerita tentang Laila Majnun. Di kalangan bangsa Eropa, senjata ini dikenal dengan sebutan Lilla.', '2024-02-29', '1709240366_a0f07078e55e17a8ce28.jpg', 4, 1),
(18, 'keris', 'Sebagian besar dari kita seringkali menganggap bahwa keris hanya ada di Jawa saja. Tapi perlu diketahui bahwa keris sebenarnya tidak hanya ada di Jawa saja, melainkan juga ada di daerah Sumatera ataupun Negeri Jiran Malaysia. Sebab, dalam budaya masyarakat tersebut, senjata keris sudah menjadi warisan dari leluhur mereka. Keris juga bisa ditemukan dalam budaya masyarakat Riau. Meski begitu, keris Riau mempunyai keunikan tersendiri, yaitu jumlah luk atau lekukan cenderung lebih sedikit dan ukiran yang ada di gagang serta sarungnya lebih banyak bermotif flora atau tumbuhan.', '2024-02-29', '1709240384_6c7dae3397f2f4958d89.jpg', 4, 1),
(19, 'retakol', 'Terakol atau Tarkul merupakan senjata yang sangat populer dikalangan pelaut, pedagang, serta lanun-lanun Melayu. Pada awalnya, Tarkul menggunakan teknologi “wheel lock” atau kancing roda yang prosesnya yaitu dengan membakar serbuk bedil secara otomatis tanpa membutuhkan fius. Bentuknya yang mirip seperti pistol dan senjata ini merupakan perubahan dari Pemuras yang dikecilkan.', '2024-02-29', '1709240397_345d83a56561193ae782.jpg', 4, 1),
(20, 'tari persembahan', 'Tari persembahan umumnya ditampilkan dalam acara-acara penyambutan, pernikahan, dan acara-acara besar lainnya di Kepulauan Riau. Tari itu dibawakan oleh 7 orang penari perempuan atau dengan jumlah ganjil.Sementara itu, ragam geraknya terdiri dari ragam junjung tepak, ragam tapak sapudi, ragam salam buka, ragam meracik pinang, ragam puteri, ragam langkah simpang, ragam sauk, ragam petik kembar, ragam pagar negeri, ragam seri beni dan salam tutup.', '2024-02-29', '1709240749_3bde66680c8fdb8abf90.jpg', 3, 1),
(21, 'tari jogi', 'Selanjutnya adalah tari jogi yang merupakan tari hiburan saat menyambut nelayan usai menangkap ikan. Tari yang berada di Kota Batam tersebut dibawakan oleh para dara atau gadis melayu.\r\n\r\nBeberapa motif dan ragam gerak tari jogi, seperti salam, lesung pipi, tegak pinggang, merias, mencuci, sentak bahu dan laying-layang. Adapun musik yang mengiringi yakni Riuh dan Rancak.\r\n', '2024-02-29', '1709240794_09c20507d4b416f415ad.jpg', 3, 1),
(22, 'tari malemang', 'Tari yang satu ini cukup menarik karena sudah ada sejak zaman kerajaan. Tari melemang berasal dari desa penaga di Kabupaten Bintan dan masih cukup berkembang karena terus dilestarikan.\r\n\r\nDinamakan sebagai tari melemang karena gerakannya yang khas yaitu melemang atau melenting atau kayang. Tari itu dilakukan dengan formasi 14 penari perempuan untuk menyambut para tamu raja di upacara kerajaan.\r\n\r\nAlat musik dan busana yang digunakan sangat sederhana, sedangkan untuk gerakannya terdiri dari gerak joget, gerak inang, step, gerak zapin, gerak melemang, gerak melemang melantai, gerak melemang menggapai, gerak melemang menggigit.', '2024-02-29', '1709240816_1977b32e98c72ce684f7.jpeg', 3, 1),
(23, 'tari cecah inai', 'Masih berkembang sampai sekarang, tari cecah inai biasanya disuguhkan pada malam perkawinan saat malam berinai atau cecah inai. Tari tersebut ditampilkan oleh seorang pria dengan gerak silat agar calon mempelai tidak mendapatkan bala.\r\n\r\nSeiring perkembangan zaman, tari cecah inai ditarikan oleh wanita sebagai hiburan. Di beberapa daerah, umumnya pria menggunakan properti berupa cawan sedangkan perempuan membawa tempat lilin dengan tatakan 5 bentuk.', '2024-02-29', '1709240847_c1c7ec054ec6ada44ea0.jpg', 3, 1),
(24, 'tari zapin penyengat', 'Tari zapin penyengat menjadi salah satu tari yang mengutamakan gerak dan langkah kaki. Awalnya tari itu diciptakan oleh Muhammad Ripin yang berasal dari Sambas Kalimantan tetapi berkembang sekitar tahun 1811 di Pulau Penyengat.\r\n\r\nRagam tari zapin penyengat didasarkan pada mata pencaharian penduduk Pulau Penyengat sebagai nelayan. Motif geraknya yaitu salam, langkah satu, langkah dua, langkat bunga, titi batang, ayak-ayak, pusar belanak, dan tahtoo.', '2024-02-29', '1709240881_0c746cab04db2798187c.jpg', 3, 1),
(25, 'tari zapin neknang', 'Belum banyak orang tahu tentang tari zapin neknang yang berasal dari Pulau Pian Pasir di Kepulauan Anambas. Hampir sama dengan motif dasar tari zapin, keunikan tari tersebut ada pada media tali yang dibentuk menjadi sarang laba-laba.\r\n\r\nTak hanya itu, tari zapin neknang dibawakan oleh banyak penari supaya membentuk jaring atau sarang laba-laba itu. Tari tersebut selalu ditampilkan dalam acara-acara besar.', '2024-02-29', '1709240906_68494048c52deb323447.jpg', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `_user` int(11) DEFAULT NULL,
  `_tanggal` datetime DEFAULT NULL,
  `_detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `_user`, `_tanggal`, `_detail`) VALUES
(1, 1, '2024-02-29 14:35:50', 'membuat album baru : makanan khas'),
(2, 1, '2024-02-29 14:36:21', 'membuat album baru : tempat wisata'),
(3, 1, '2024-02-29 14:39:01', 'membuat album baru : tarian khas'),
(4, 1, '2024-02-29 14:42:00', 'membuat album baru : senjata khas'),
(5, 1, '2024-02-29 14:47:47', 'mengupload foto baru'),
(6, 1, '2024-02-29 14:48:34', 'mengupload foto baru'),
(7, 1, '2024-02-29 14:49:08', 'mengupload foto baru'),
(8, 1, '2024-02-29 14:49:59', 'mengupload foto baru'),
(9, 1, '2024-02-29 14:50:25', 'mengupload foto baru'),
(10, 1, '2024-02-29 14:50:58', 'mengupload foto baru'),
(11, 1, '2024-02-29 14:51:28', 'mengupload foto baru'),
(12, 1, '2024-02-29 14:51:47', 'mengupload foto baru'),
(13, 1, '2024-02-29 14:52:08', 'mengupload foto baru'),
(14, 1, '2024-02-29 14:52:27', 'mengupload foto baru'),
(15, 1, '2024-02-29 14:56:32', 'mengupload foto baru'),
(16, 1, '2024-02-29 14:56:59', 'mengupload foto baru'),
(17, 1, '2024-02-29 14:57:32', 'mengupload foto baru'),
(18, 1, '2024-02-29 14:58:13', 'mengupload foto baru'),
(19, 1, '2024-02-29 14:58:37', 'mengupload foto baru'),
(20, 1, '2024-02-29 14:59:03', 'mengupload foto baru'),
(21, 1, '2024-02-29 14:59:26', 'mengupload foto baru'),
(22, 1, '2024-02-29 14:59:44', 'mengupload foto baru'),
(23, 1, '2024-02-29 14:59:58', 'mengupload foto baru'),
(24, 1, '2024-02-29 15:05:49', 'mengupload foto baru'),
(25, 1, '2024-02-29 15:06:34', 'mengupload foto baru'),
(26, 1, '2024-02-29 15:06:56', 'mengupload foto baru'),
(27, 1, '2024-02-29 15:07:27', 'mengupload foto baru'),
(28, 1, '2024-02-29 15:08:01', 'mengupload foto baru'),
(29, 1, '2024-02-29 15:08:26', 'mengupload foto baru'),
(30, 1, '2024-02-29 16:19:02', 'mengomentari foto : saya suka nasi dagong');

-- --------------------------------------------------------

--
-- Table structure for table `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `id_komentar` int(11) NOT NULL,
  `_komentarfoto` int(11) DEFAULT NULL,
  `_komentaruser` int(11) DEFAULT NULL,
  `isi_komentar` text DEFAULT NULL,
  `tanggal_komentar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentarfoto`
--

INSERT INTO `komentarfoto` (`id_komentar`, `_komentarfoto`, `_komentaruser`, `isi_komentar`, `tanggal_komentar`) VALUES
(1, 1, 1, 'saya suka nasi dagong', '2024-02-29');

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `id_like` int(11) NOT NULL,
  `_likefoto` int(11) DEFAULT NULL,
  `_userfoto` int(11) DEFAULT NULL,
  `tanggal_like` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `_level` int(11) DEFAULT NULL,
  `_profile` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `_level`, `_profile`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@root', 'fransisco', 'batam', 1, 'default-profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`id_like`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
