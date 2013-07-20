-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 20. Juli 2013 jam 17:21
-- Versi Server: 5.1.44
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE IF NOT EXISTS `tbl_anggota` (
  `id_anggota` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal_daftar` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `username`, `password`, `nama`, `jenis_kelamin`, `alamat`, `tanggal_daftar`, `telepon`) VALUES
(1, 'john_cenaa', 'john_cena', 'Adi Januardi', 'Pria', 'Bali', '20-Jul-2013 22:00:33', '0333419185'),
(2, 'gede', 'dc4eecdb049d4cc5457b255ddf7e1c71', 'Gede Becing Becing', 'Wanita', 'Klungkung', '20-Jul-2013 15:33:04', '43840343'),
(3, 'su', 'b94dba3c39be5bc3611d67899ee17523', 'dede', 'Pria', 'bali', '20-Jul-2013 23:13:21', '8989'),
(4, 'su', '26b72a87b545d8a444deeb66e593df9c', 'dede', 'Pria', 'bali', '20-Jul-2013 23:15:11', '8989');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE IF NOT EXISTS `tbl_buku` (
  `kode_buku` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(25) NOT NULL,
  `penerbit` varchar(25) NOT NULL,
  `jumlah_hal` int(4) NOT NULL,
  `rak` varchar(10) NOT NULL,
  `stok` int(5) NOT NULL,
  PRIMARY KEY (`kode_buku`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`kode_buku`, `judul`, `pengarang`, `penerbit`, `jumlah_hal`, `rak`, `stok`) VALUES
(2, 'AMD Umuman APU E-Series Terbaru', 'Dedek Jayus', 'Gramedia', 30, '2B', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_download_ebook`
--

CREATE TABLE IF NOT EXISTS `tbl_download_ebook` (
  `id_download_ebook` int(5) NOT NULL AUTO_INCREMENT,
  `tanggal_download` varchar(50) NOT NULL,
  `id_ebook` int(5) NOT NULL,
  `id_anggota` int(5) NOT NULL,
  PRIMARY KEY (`id_download_ebook`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_download_ebook`
--

INSERT INTO `tbl_download_ebook` (`id_download_ebook`, `tanggal_download`, `id_ebook`, `id_anggota`) VALUES
(1, '21-Jul-2013 00:19:12', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ebook`
--

CREATE TABLE IF NOT EXISTS `tbl_ebook` (
  `id_ebook` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `jumlah_hal` int(4) NOT NULL,
  `pengarang` varchar(25) NOT NULL,
  `file` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ebook`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_ebook`
--

INSERT INTO `tbl_ebook` (`id_ebook`, `judul`, `jumlah_hal`, `pengarang`, `file`) VALUES
(1, 'AMD Umuman APU E-Series Terbaru', 34, 'sss', '1cae1dfb33b098bc279603bd03424788.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE IF NOT EXISTS `tbl_peminjaman` (
  `id_peminjaman` int(5) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(5) NOT NULL,
  `id_buku` int(5) NOT NULL,
  `tanggal_peminjaman` varchar(50) NOT NULL,
  `tanggal_pengembalian` varchar(50) NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `id_anggota`, `id_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`) VALUES
(2, 1, 2, '2013-07-20', '2013-07-25'),
(3, 2, 2, '2013-07-21', '2013-07-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengembalian`
--

CREATE TABLE IF NOT EXISTS `tbl_pengembalian` (
  `id_pengembalian` int(5) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(5) NOT NULL,
  `tanggal_dikembalikan` varchar(50) NOT NULL,
  `denda` int(20) NOT NULL,
  PRIMARY KEY (`id_pengembalian`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`id_pengembalian`, `id_peminjaman`, `tanggal_dikembalikan`, `denda`) VALUES
(1, 3, '2013-07-20', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `id_setting` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'Aplikasi Perpustakaan'),
(2, 'site_footer', 'Teks Footer', 'Copyright &copy; 2013 Aplikasi Perpustakaan | Designed &amp; Developed by Gede Lumbung - http://gedelumbung.com'),
(3, 'site_quotes', 'Quotes Situs', 'Mencerdaskan Kehidupan Bangsa'),
(4, 'site_theme', 'Nama Tampilan', 'black-inverse'),
(5, 'key_login', 'Key Hash Login', 'AppPerpustakaan'),
(6, 'site_limit_small', 'Limit Data Kecil', '5'),
(7, 'site_limit_medium', 'Limit Data Medium', '12'),
(8, 'site_welcome', 'Kata Sambutan', 'Salam sejahtera bagi kita semua,\r\n\r\nEra globalisasi yang penuh dengan tantangan menuntut kita untuk selalu berupaya meningkatkan mutu pelayanan kesehatan termasuk didalamnya menyiapakan sumberdaya manusia serta dukungan sarana prasarana yang memadai. Dengan demikian pemantauan & pemeliharaan derajat kesehatan masyarakat akan optimal.'),
(9, 'key_direktur', 'Nama Direktur', 'Gede Lumbung'),
(10, 'key_address', 'Alamat Rumah Sakit', 'Jln. Dewi Madri Gg. V/7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` varchar(25) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `hak_akses`) VALUES
(1, 'Gede Lumbung', 'admin', 'f1515fcd2423279c2717be8d2ab80d8d', 'admin'),
(2, 'Adi Januardi', 'adi', '6b08dc9e11c4f90ab7b2599aa0f7c3df', 'petugas');
