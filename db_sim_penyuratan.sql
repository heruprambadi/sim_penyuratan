-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2016 pada 19.16
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_sim_penyuratan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktif_kuliah`
--

CREATE TABLE IF NOT EXISTS `aktif_kuliah` (
  `id_aktif_kuliah` int(4) NOT NULL AUTO_INCREMENT,
  `nomor_surat` int(4) unsigned zerofill NOT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` varchar(13) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `fk_id_jurusan` int(2) DEFAULT NULL,
  `semester` enum('Genap','Ganjil') DEFAULT NULL,
  `tahun_akademis` varchar(11) DEFAULT NULL,
  `bulan` int(2) unsigned zerofill DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_aktif_kuliah`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `aktif_kuliah`
--

INSERT INTO `aktif_kuliah` (`id_aktif_kuliah`, `nomor_surat`, `nama_mahasiswa`, `npm`, `tempat_lahir`, `tanggal_lahir`, `fk_id_jurusan`, `semester`, `tahun_akademis`, `bulan`, `tahun`) VALUES
(10, 0003, 'Havea Prima', '0910031802108', 'sdfsdf', '2015-08-01', 2, 'Ganjil', '2013', 08, 2015),
(11, 0005, 'Riki Kurniawan', '0910031802108', 'sdfdsf', '2015-08-24', 2, 'Ganjil', '2014', 08, 2015);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cms_ci_sessions`
--

CREATE TABLE IF NOT EXISTS `cms_ci_sessions` (
  `session_id` varchar(50) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(20) NOT NULL,
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cms_ci_sessions`
--

INSERT INTO `cms_ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('4da7487292bf186e41dd073aa1cadfcb', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:43.0) Gecko/20100101 Firefox/43.0', 1452167267, 'a:1:{s:8:"cms_lang";s:10:"indonesian";}'),
('89727d5137d7ddd50eeb86ac510d2c36', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36', 1452168651, 'a:5:{s:8:"cms_lang";s:10:"indonesian";s:13:"cms_user_name";s:5:"admin";s:11:"cms_user_id";s:1:"1";s:18:"cms_user_real_name";s:5:"admin";s:14:"cms_user_email";s:21:"havea.prima@gmail.com";}'),
('9e8b2824bce3faedabb644f665e6c242', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:43.0) Gecko/20100101 Firefox/43.0', 1452166186, 'a:1:{s:8:"cms_lang";s:10:"indonesian";}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `folder`
--

CREATE TABLE IF NOT EXISTS `folder` (
  `id_folder` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_folder`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `folder`
--

INSERT INTO `folder` (`id_folder`, `nama`) VALUES
(1, 'Ket. Aktif Kuliah'),
(2, 'Ket. Kelakuan Baik'),
(3, 'Ket. Kelulusan'),
(4, 'Ket. Tidak Menerima Beasiswa'),
(5, 'Permohonan Cuti Akademik'),
(6, 'Permohonan Penelitian'),
(7, 'Permohonan Pengambilan Data'),
(8, 'Permohonan PKL'),
(10, 'Surat Masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelakuan_baik`
--

CREATE TABLE IF NOT EXISTS `kelakuan_baik` (
  `id_kelakuan_baik` int(4) NOT NULL AUTO_INCREMENT,
  `nomor_surat` int(4) unsigned zerofill DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` bigint(13) unsigned zerofill DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `fk_id_jurusan` int(2) NOT NULL,
  `semester` enum('Genap','Ganjil') DEFAULT NULL,
  `tahun_akademis` varchar(11) DEFAULT NULL,
  `bulan` int(2) unsigned zerofill NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id_kelakuan_baik`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `kelakuan_baik`
--

INSERT INTO `kelakuan_baik` (`id_kelakuan_baik`, `nomor_surat`, `nama_mahasiswa`, `npm`, `tempat_lahir`, `tanggal_lahir`, `fk_id_jurusan`, `semester`, `tahun_akademis`, `bulan`, `tahun`) VALUES
(1, 0001, 'Havea Prima', 0910031802108, 'Duri', '1991-05-18', 1, 'Genap', '2013 - 2014', 02, 2014);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangan_lulusan`
--

CREATE TABLE IF NOT EXISTS `keterangan_lulusan` (
  `id_keterangan_lulusan` int(4) NOT NULL AUTO_INCREMENT,
  `fk_id_ket_lulusan` int(4) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_keterangan_lulusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `keterangan_lulusan`
--

INSERT INTO `keterangan_lulusan` (`id_keterangan_lulusan`, `fk_id_ket_lulusan`, `keterangan`) VALUES
(1, 9, '0910031802108 0910031802108');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ket_lulusan`
--

CREATE TABLE IF NOT EXISTS `ket_lulusan` (
  `id_ket_lulusan` int(10) NOT NULL AUTO_INCREMENT,
  `nomor_surat` int(4) unsigned zerofill NOT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` varchar(13) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `keterangan` text,
  `bulan` int(2) unsigned zerofill NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id_ket_lulusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `ket_lulusan`
--

INSERT INTO `ket_lulusan` (`id_ket_lulusan`, `nomor_surat`, `nama_mahasiswa`, `npm`, `tempat_lahir`, `tanggal_lahir`, `keterangan`, `bulan`, `tahun`) VALUES
(7, 0002, 'Teguh', '0000009292929', '9292929', '2014-01-03', NULL, 01, 2014),
(8, 0003, 'Havea Prima', '0910031802102', 'Taluk Kuantan', '2014-01-14', NULL, 01, 2014),
(9, 0001, 'Havea Prima', '0910031802108', 'Taluk', '2015-08-01', NULL, 08, 2015);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ket_tdk_terima_beasiswa`
--

CREATE TABLE IF NOT EXISTS `ket_tdk_terima_beasiswa` (
  `id_ket_tdk_terima_beasiswa` int(4) NOT NULL AUTO_INCREMENT,
  `no_surat` int(4) unsigned zerofill DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` bigint(13) unsigned zerofill DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `fk_id_jurusan` int(2) DEFAULT NULL,
  `semester` enum('Genap','Ganjil') DEFAULT NULL,
  `tahun_akademis` varchar(11) DEFAULT NULL,
  `bulan` int(2) unsigned zerofill NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id_ket_tdk_terima_beasiswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `ket_tdk_terima_beasiswa`
--

INSERT INTO `ket_tdk_terima_beasiswa` (`id_ket_tdk_terima_beasiswa`, `no_surat`, `nama_mahasiswa`, `npm`, `tempat_lahir`, `tanggal_lahir`, `fk_id_jurusan`, `semester`, `tahun_akademis`, `bulan`, `tahun`) VALUES
(1, 0002, 'Heru Prambadi', 0910031802108, 'Duri', '1991-05-18', 1, 'Ganjil', '2013 - 2014', 02, 2014),
(2, 0001, 'Havea Prima', 0910031802102, 'Taluk Kuantan', '2014-02-12', 1, 'Ganjil', '2014 - 2015', 02, 2014);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE IF NOT EXISTS `konfigurasi` (
  `id_konfigurasi` int(20) NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `status_akreditasi` varchar(50) DEFAULT NULL,
  `nama_puket` varchar(50) DEFAULT NULL,
  `pangkat_puket` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_konfigurasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama_instansi`, `alamat`, `status_akreditasi`, `nama_puket`, `pangkat_puket`) VALUES
(1, 'Universitas Muhammadiyah Riau', 'Jalan K. H. Ahmad Dahlan, No. 88, Pekanbaru, Riau', 'Terakreditasi', 'Heru Prambadi', 'Lektor / III D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_authorization`
--

CREATE TABLE IF NOT EXISTS `main_authorization` (
  `authorization_id` int(20) NOT NULL AUTO_INCREMENT,
  `authorization_name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`authorization_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `main_authorization`
--

INSERT INTO `main_authorization` (`authorization_id`, `authorization_name`, `description`) VALUES
(1, 'Everyone', 'All visitor of the web are permitted (e.g:view blog content)'),
(2, 'Unauthenticated', 'Only non-member visitor, they who hasn''t log in yet (e.g:view member registration page)'),
(3, 'Authenticated', 'Only member (e.g:change password)'),
(4, 'Authorized', 'Only member with certain privilege (depend on group)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_config`
--

CREATE TABLE IF NOT EXISTS `main_config` (
  `config_id` int(20) NOT NULL AUTO_INCREMENT,
  `config_name` varchar(50) NOT NULL,
  `value` text,
  `description` text,
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data untuk tabel `main_config`
--

INSERT INTO `main_config` (`config_id`, `config_name`, `value`, `description`) VALUES
(1, 'site_name', 'Sistem Informasi Penyuratan', 'Site title'),
(2, 'site_slogan', 'By : heruprambadi.com', 'Site slogan'),
(3, 'site_logo', '{{ base_url }}assets/nocms/images/custom_logo/logostmik.png', 'Site logo'),
(4, 'site_favicon', '{{ base_url }}assets/nocms/images/custom_favicon/No-CMS-favicon.png', 'Site favicon'),
(5, 'site_footer', 'Copyright : <a href="http://heruprambadi.com" target="_blank">heruprambadi.com</a>', 'Site footer'),
(6, 'site_theme', 'neutral', 'Site theme'),
(7, 'site_layout', 'default-one-column', 'Site layout'),
(8, 'site_language', 'indonesian', 'Site language'),
(9, 'max_menu_depth', '5', 'Depth of menu recursive'),
(10, 'cms_email_reply_address', 'no-reply@No-CMS.com', 'Email address'),
(11, 'cms_email_reply_name', 'admin of No-CMS', 'Email name'),
(12, 'cms_email_forgot_subject', 'Re-activate your account at No-CMS', 'Email subject sent when user forgot his/her password'),
(13, 'cms_email_forgot_message', 'Dear, {{ user_real_name }}<br />Click <a href="{{ site_url }}main/forgot/{{ activation_code }}">{{ site_url }}main/forgot/{{ activation_code }}</a> to reactivate your account', 'Email message sent when user forgot his/her password'),
(14, 'cms_email_signup_subject', 'Activate your account at No-CMS', 'Email subject sent to activate user'),
(15, 'cms_email_signup_message', 'Dear, {{ user_real_name }}<br />Click <a href="{{ site_url }}main/activate/{{ activation_code }}">{{ site_url }}main/activate/{{ activation_code }}</a> to activate your account', 'Email message sent to activate user'),
(16, 'cms_signup_activation', 'FALSE', 'Send activation email to new member. Default : false, Alternatives : true, false'),
(17, 'cms_email_useragent', 'Codeigniter', 'Default : CodeIgniter'),
(18, 'cms_email_protocol', 'smtp', 'Default : smtp, Alternatives : mail, sendmail, smtp'),
(19, 'cms_email_mailpath', '/usr/sbin/sendmail', 'Default : /usr/sbin/sendmail'),
(20, 'cms_email_smtp_host', 'ssl://smtp.googlemail.com', 'eg : ssl://smtp.googlemail.com'),
(21, 'cms_email_smtp_user', 'your_gmail_address@gmail.com', 'eg : your_gmail_address@gmail.com'),
(22, 'cms_email_smtp_pass', '', 'your password'),
(23, 'cms_email_smtp_port', '465', 'smtp port, default : 465'),
(24, 'cms_email_smtp_timeout', '30', 'default : 30'),
(25, 'cms_email_wordwrap', 'TRUE', 'Enable word-wrap. Default : true, Alternatives : true, false'),
(26, 'cms_email_wrapchars', '76', 'Character count to wrap at.'),
(27, 'cms_email_mailtype', 'html', 'Type of mail. If you send HTML email you must send it as a complete web page. Make sure you do not have any relative links or relative image paths otherwise they will not work. Default : html, Alternatives : html, text'),
(28, 'cms_email_charset', 'utf-8', 'Character set (utf-8, iso-8859-1, etc.).'),
(29, 'cms_email_validate', 'FALSE', 'Whether to validate the email address. Default: true, Alternatives : true, false'),
(30, 'cms_email_priority', '3', '1, 2, 3, 4, 5  Email Priority. 1 = highest. 5 = lowest. 3 = normal.'),
(31, 'cms_email_bcc_batch_mode', 'FALSE', 'Enable BCC Batch Mode. Default: false, Alternatives: true'),
(32, 'cms_email_bcc_batch_size', '200', 'Number of emails in each BCC batch.'),
(33, 'cms_google_analytic_property_id', '', 'Google analytics property ID (e.g: UA-30285787-1). Leave blank if you don''t want to use it.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_group`
--

CREATE TABLE IF NOT EXISTS `main_group` (
  `group_id` int(20) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `main_group`
--

INSERT INTO `main_group` (`group_id`, `group_name`, `description`) VALUES
(1, 'Super Admin', 'Every member of this group can do everything possible, but only programmer can turn the impossible into real :D'),
(2, 'Mahasiswa', 'Group Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_group_navigation`
--

CREATE TABLE IF NOT EXISTS `main_group_navigation` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `navigation_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `main_group_navigation`
--

INSERT INTO `main_group_navigation` (`id`, `group_id`, `navigation_id`) VALUES
(1, 1, 73),
(2, 1, 60),
(3, 1, 58),
(4, 1, 49),
(5, 1, 74),
(6, 1, 48),
(7, 1, 50),
(8, 1, 51),
(9, 1, 52),
(10, 1, 53),
(11, 1, 54),
(12, 1, 55),
(13, 1, 56),
(14, 1, 57),
(15, 1, 59),
(17, 2, 48),
(18, 2, 57),
(21, 2, 55),
(22, 2, 54),
(23, 2, 53),
(25, 2, 56),
(26, 2, 50),
(27, 2, 51),
(28, 2, 52),
(29, 1, 79);

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_group_privilege`
--

CREATE TABLE IF NOT EXISTS `main_group_privilege` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `privilege_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_group_user`
--

CREATE TABLE IF NOT EXISTS `main_group_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `main_group_user`
--

INSERT INTO `main_group_user` (`id`, `group_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 5),
(3, 2, 6),
(4, 1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_group_widget`
--

CREATE TABLE IF NOT EXISTS `main_group_widget` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(5) NOT NULL,
  `widget_id` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_module`
--

CREATE TABLE IF NOT EXISTS `main_module` (
  `module_id` int(20) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(50) NOT NULL,
  `module_path` varchar(100) NOT NULL,
  `version` varchar(50) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `main_module`
--

INSERT INTO `main_module` (`module_id`, `module_name`, `module_path`, `version`, `user_id`) VALUES
(1, 'gofrendi.noCMS.nordrassil', 'nordrassil', '0.0.0', 1),
(7, 'admin.sim_penyuratan', 'sim_penyuratan', '0.0.0', 1),
(8, 'admin.cgs', 'cgs', '0.0.0', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_module_dependency`
--

CREATE TABLE IF NOT EXISTS `main_module_dependency` (
  `module_dependency_id` int(20) NOT NULL AUTO_INCREMENT,
  `module_id` int(5) NOT NULL,
  `parent_id` int(5) NOT NULL,
  PRIMARY KEY (`module_dependency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_navigation`
--

CREATE TABLE IF NOT EXISTS `main_navigation` (
  `navigation_id` int(20) NOT NULL AUTO_INCREMENT,
  `navigation_name` varchar(50) NOT NULL,
  `parent_id` int(5) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `bootstrap_glyph` varchar(50) DEFAULT NULL,
  `page_title` varchar(50) DEFAULT NULL,
  `page_keyword` varchar(100) DEFAULT NULL,
  `description` text,
  `url` varchar(100) DEFAULT NULL,
  `authorization_id` int(5) NOT NULL DEFAULT '1',
  `active` int(5) NOT NULL DEFAULT '1',
  `index` int(5) NOT NULL DEFAULT '0',
  `is_static` int(5) NOT NULL DEFAULT '0',
  `static_content` text,
  `only_content` int(5) NOT NULL DEFAULT '0',
  `default_theme` varchar(50) DEFAULT NULL,
  `default_layout` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`navigation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Dumping data untuk tabel `main_navigation`
--

INSERT INTO `main_navigation` (`navigation_id`, `navigation_name`, `parent_id`, `title`, `bootstrap_glyph`, `page_title`, `page_keyword`, `description`, `url`, `authorization_id`, `active`, `index`, `is_static`, `static_content`, `only_content`, `default_theme`, `default_layout`) VALUES
(1, 'main_login', NULL, 'Login', 'glyphicon-retweet', 'Login', NULL, 'Visitor need to login for authentication', 'main/login', 2, 1, 1, 0, NULL, 0, NULL, 'default-one-column'),
(2, 'main_forgot', NULL, 'Forgot Password', 'glyphicon-th-large', 'Forgot', NULL, 'Accidentally forgot password', 'main/forgot', 2, 1, 3, 0, NULL, 0, NULL, NULL),
(3, 'main_logout', NULL, 'Logout', 'glyphicon-off', 'Logout', NULL, 'Logout for deauthentication', 'main/logout', 3, 1, 2, 0, NULL, 0, NULL, NULL),
(4, 'main_management', NULL, 'CMS Management', 'glyphicon-th-large', 'CMS Management', NULL, 'The main management of the CMS. Including User, Group, Privilege and Navigation Management', 'main/management', 4, 1, 6, 0, NULL, 0, NULL, NULL),
(5, 'main_register', NULL, 'Register', 'glyphicon-th-large', 'Register', NULL, 'New User Registration', 'main/register', 2, 1, 4, 0, NULL, 0, NULL, NULL),
(6, 'main_change_profile', NULL, 'Change Profile', 'glyphicon-th-large', 'Change Profile', NULL, 'Change Current Profile', 'main/change_profile', 3, 1, 5, 0, NULL, 0, NULL, NULL),
(7, 'main_group_management', 4, 'Group Management', 'glyphicon-th-large', 'Group Management', NULL, 'Group Management', 'main/group', 4, 1, 0, 0, NULL, 0, NULL, NULL),
(8, 'main_navigation_management', 4, 'Navigation Management', 'glyphicon-th-large', 'Navigation Management', NULL, 'Navigation management', 'main/navigation', 4, 1, 3, 0, NULL, 0, NULL, NULL),
(9, 'main_privilege_management', 4, 'Privilege Management', 'glyphicon-th-large', 'Privilege Management', NULL, 'Privilege Management', 'main/privilege', 4, 1, 2, 0, NULL, 0, NULL, NULL),
(10, 'main_user_management', 4, 'User Management', 'glyphicon-user', 'User Management', NULL, 'Manage User', 'main/user', 4, 1, 1, 0, NULL, 0, NULL, NULL),
(11, 'main_module_management', 4, 'Module Management', 'glyphicon-th-large', 'Module Management', NULL, 'Install Or Uninstall Thirdparty Module', 'main/module_management', 4, 1, 5, 0, NULL, 0, NULL, NULL),
(12, 'main_change_theme', 4, 'Change Theme', 'glyphicon-th-large', 'Change Theme', NULL, 'Change Theme', 'main/change_theme', 4, 1, 6, 0, NULL, 0, NULL, NULL),
(13, 'main_widget_management', 4, 'Widget Management', 'glyphicon-th-large', 'Widget Management', NULL, 'Manage Widgets', 'main/widget', 4, 1, 4, 0, NULL, 0, NULL, NULL),
(14, 'main_quicklink_management', 4, 'Quick Link Management', 'glyphicon-th-large', 'Quick Link Management', NULL, 'Manage Quick Link', 'main/quicklink', 4, 1, 7, 0, NULL, 0, NULL, NULL),
(15, 'main_config_management', 4, 'Configuration Management', 'glyphicon-th-large', 'Configuration Management', NULL, 'Manage Configuration Parameters', 'main/config', 4, 1, 8, 0, NULL, 0, NULL, NULL),
(16, 'main_layout', 4, 'Layout Management', 'glyphicon-th-large', 'Layout Management', NULL, 'Manage Layout', 'main/layout', 4, 1, 9, 0, NULL, 0, NULL, NULL),
(17, 'main_index', NULL, 'Home', 'glyphicon-home', 'Home', NULL, 'A Free CodeIgniter Based CMS Framework', 'main/index', 1, 1, 0, 1, '<style type="text/css">body{\r\nbackground-image: -webkit-gradient(linear, left top, right bottom, color-stop(0, white), color-stop(1, white))!important;\r\nbackground-image: -webkit-linear-gradient(top left, white 0%, white 100%)!important;\r\nbackground-image: linear-gradient(top left, white 0%, white 100%)!important;\r\n}\r\n#__section-left-and-content {\r\nbackground-image: -ms-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: -moz-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: -o-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: -webkit-gradient(linear, left top, right bottom, color-stop(0, #EEEEEE), color-stop(1, #EEEEEE))!important;\r\nbackground-image: -webkit-linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\nbackground-image: linear-gradient(top left, #EEEEEE 0%, #EEEEEE 100%)!important;\r\n}\r\n.thumbnail .caption p{\r\nfont-size:small;\r\n}\r\n.thumbnail{\r\nborder:none!important;\r\nbackground-color:#EEEEEE!important;\r\ntext-align:center;\r\n}\r\n.page-header, .page-header h1{\r\nmargin-top:0px;\r\n}\r\n#__section-left-and-content hr, #__section-left-and-content .breadcrumb{\r\nmargin:0px;\r\n}\r\n#__section-left-and-content p.lead{\r\nmargin-top:20px;\r\n}\r\n</style>\r\n<div class="page-header">\r\n    <h1>\r\n        Sistem Informasi Penyuratan<br />\r\n        <small>Aplikasi pengelolaan surat masuk dan surat keluar</small>\r\n    </h1>\r\n    <h2>\r\n        <small>STMIK-AMIK RIAU</small>\r\n    </h2>\r\n    <h2>\r\n        <span style="font-size: 13px; line-height: 1.6em;">Salah satu kebutuhan yang sangat besar akan teknologi informasi sekarang ini adalah kebutuhan akan sistem informasi. Berkembangnya teknologi informasi dan sistem informasi yang demikian pesat di era globalisasi sekarang ini telah membuat hampir semua aspek kehidupan tidak dapat terhindar dari penggunaan perangkat komputer. Keterlambatan informasi yang diperlukan dapat menyebabkan tertundanya pencapaian tujuan perusahaan dan akhirnya akan mengganggu perkembangan perusahaan. Hal ini diperlukan untuk memperoleh informasi yang handal, cepat, akurat, dan tepat waktu.</span>\r\n    </h2>\r\n    <h2>\r\n        <span style="font-size: 13px; line-height: 1.6em;">STMIK AMIK RIAU merupakan sekolah tinggi yang memiliki lalu lintas surat masuk dan surat keluar yang cukup banyak. Untuk itu, perlu dibuat suatu sistem yang dapat mempermudah urusan surat menyurat ini supaya data yang diperoleh tepat dan akurat. Sistem yang akan dibuat harus memiliki fitur-fitur seperti pemberian nomor surat secara otomatis, menyediakan dokumen hasil scanning dalam sebuah folder khusus dengan pengelompokkan Unit kerja, Bulan, Tanggal. Sistem pengarsipan yang berjalan saat ini dapat dikatakan masih kurang efisien dan efektif, semua proses masih dilakukan secara manual.</span>\r\n    </h2>\r\n    <h2>\r\n        <span style="font-size: 13px; line-height: 1.6em;">Berdasarkan uraian latar belakang tersebut, perlu diadakan pembangunan sistem informasi pengarsipan surat masuk dan surat keluar sehingga permasalahan tersebut diatas dapat diselesaikan untuk itu penulis mengangkatnya jadi materi skripsi dengan judul &ldquo;</span><strong style="font-size: 13px; line-height: 1.6em;">Membangun Aplikasi Pengelolaan Surat-menyurat dilingkungan STMIK-AMIK RIAU</strong><span style="font-size: 13px; line-height: 1.6em;">&rdquo;. Harapan dari penelitian ini adalah mampu mengatasi masalah-masalah yang ada dalam pembuatan surat dan memenuhi kebutuhan pengguna sistem, sehingga dapat meningkatkan kinerja pada STMIK AMIK RIAU.</span>\r\n    </h2>\r\n</div><script type="text/javascript">$(window).load(function(){function __adjust_component(identifier){var max_height=0;$(identifier).each(function(){$(this).css(''margin-bottom'',0);if($(this).height()>max_height){max_height=$(this).height();}});console.log(max_height);$(identifier).each(function(){var margin_bottom=0;if($(this).height()<max_height){margin_bottom=max_height-$(this).height();console.log([max_height,$(this).height()]);}margin_bottom+=10;$(this).css(''margin-bottom'',margin_bottom);});}function adjust_thumbnail(){__adjust_component(''.thumbnail img'');__adjust_component(''.thumbnail div.caption'');}adjust_thumbnail();$(window).resize(function(){adjust_thumbnail();});});</script>', 0, NULL, NULL),
(18, 'main_language', NULL, 'Language', 'glyphicon-th-large', 'Language', NULL, 'Choose the language', 'main/language', 1, 1, 0, 0, NULL, 0, NULL, NULL),
(19, 'main_third_party_auth', NULL, 'Third Party Authentication', 'glyphicon-th-large', 'Third Party Authentication', NULL, 'Third Party Authentication', 'main/hauth/index', 1, 1, 0, 0, NULL, 0, NULL, NULL),
(20, 'nordrassil_index', 4, 'Module Generator', NULL, NULL, NULL, NULL, 'nordrassil/nordrassil/index', 4, 1, 10, 0, NULL, 0, NULL, NULL),
(21, 'nordrassil_template', 20, 'Generator Template', NULL, NULL, NULL, 'Add, edit, and delete generator template', 'nordrassil/data/nds/template', 4, 1, 1, 0, NULL, 0, NULL, NULL),
(22, 'nordrassil_project', 20, 'Project', NULL, NULL, NULL, 'Add, edit, and delete project skeleton', 'nordrassil/data/nds/project', 4, 1, 2, 0, NULL, 0, NULL, NULL),
(48, 'sim_penyuratan_index', NULL, 'Surat Keluar', 'glyphicon-folder-open', NULL, NULL, NULL, 'sim_penyuratan/sim_penyuratan', 4, 1, 10, 0, NULL, 0, NULL, NULL),
(49, 'sim_penyuratan_manage_folder', 73, 'Pengaturan Folder', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_folder', 4, 0, 2, 0, NULL, 0, NULL, NULL),
(50, 'sim_penyuratan_manage_permohonan_cuti', 48, 'Surat Permohonan Cuti', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_permohonan_cuti', 4, 0, 6, 0, NULL, 0, NULL, NULL),
(51, 'sim_penyuratan_manage_permohonan_peng_data', 48, 'Surat Permohonan Pengambilan Data', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_permohonan_peng_data', 4, 1, 7, 0, NULL, 0, NULL, NULL),
(52, 'sim_penyuratan_manage_permohonan_riset', 48, 'Surat Permohonan Riset', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_permohonan_riset', 4, 1, 8, 0, NULL, 0, NULL, NULL),
(53, 'sim_penyuratan_manage_ket_tdk_terima_beasiswa', 48, 'Surat Ket. Tidak Menerima Beasiswa', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_ket_tdk_terima_beasiswa', 4, 1, 5, 0, NULL, 0, NULL, NULL),
(54, 'sim_penyuratan_manage_ket_lulusan', 48, 'Surat Ket. Lulusan', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_ket_lulusan', 4, 1, 2, 0, NULL, 0, NULL, NULL),
(55, 'sim_penyuratan_manage_kelakuan_baik', 48, 'Surat Ket. Kelakuan Baik', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_kelakuan_baik', 4, 1, 3, 0, NULL, 0, NULL, NULL),
(56, 'sim_penyuratan_manage_mas_jurusan', 73, 'Pengaturan Master Jurusan', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_mas_jurusan', 4, 1, 9, 0, NULL, 0, NULL, NULL),
(57, 'sim_penyuratan_manage_aktif_kuliah', 48, 'Surat Ket. Aktif Kuliah', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_aktif_kuliah', 4, 1, 1, 0, NULL, 0, NULL, NULL),
(58, 'sim_penyuratan_manage_cont_pkl', 73, 'Pengaturan Kontak PKL', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_master_cont_pkl', 4, 1, 3, 0, NULL, 0, NULL, NULL),
(59, 'sim_penyuratan_manage_pkl', 48, 'Surat Ket. PKL/Magang', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_pkl', 4, 1, 4, 0, NULL, 0, NULL, NULL),
(60, 'sim_penyuratan_manage_konfigurasi', 73, 'Pengaturan Umum', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_konfigurasi', 4, 1, 1, 0, NULL, 0, NULL, NULL),
(73, 'sim_penyuratan_conf', NULL, 'Konfigurasi', 'glyphicon-wrench', 'Konfigurasi Aplikasi', 'konfigurasi-app', NULL, '#', 4, 1, 11, 0, NULL, 0, NULL, NULL),
(74, 'sim_penyuratan_surat_masuk', NULL, 'Surat Masuk', 'glyphicon-folder-close', 'Surat Masuk', NULL, NULL, 'sim_penyuratan/manage_surat_masuk', 4, 1, 12, 0, NULL, 0, NULL, NULL),
(75, 'manage_barang', NULL, 'Data Barang', NULL, 'Data Barang', NULL, NULL, 'cgs/manage_barang/index', 1, 1, 13, 0, NULL, 0, NULL, NULL),
(76, 'manage_penjualan', NULL, 'Data Penjualan', NULL, 'Data Penjualan', NULL, NULL, 'cgs/manage_penjualan/index', 1, 1, 14, 0, NULL, 0, NULL, NULL),
(77, 'manage_pembelian', NULL, 'Data Pembelian', NULL, 'Data Pembelian', NULL, NULL, 'cgs/manage_pembelian/index', 1, 1, 15, 0, NULL, 0, NULL, NULL),
(78, 'manage_supplier', NULL, 'Data Supplier', NULL, 'Data Supplier', NULL, NULL, 'cgs/manage_supplier/index', 1, 1, 16, 0, NULL, 0, NULL, NULL),
(79, 'sim_penyuratan_manage_surat_tugas', 48, 'Surat Tugas', NULL, NULL, NULL, NULL, 'sim_penyuratan/manage_surat_tugas', 4, 1, 17, 0, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_privilege`
--

CREATE TABLE IF NOT EXISTS `main_privilege` (
  `privilege_id` int(20) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text,
  `authorization_id` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `main_privilege`
--

INSERT INTO `main_privilege` (`privilege_id`, `privilege_name`, `title`, `description`, `authorization_id`) VALUES
(1, 'cms_install_module', 'Install Module', 'Install Module is a very critical privilege, it allow authorized user to Install a module to the CMS.<br />By Installing module, the database structure can be changed. There might be some additional navigation and privileges added.<br /><br />You''d be better to give this authorization only authenticated and authorized user. (I suggest to make only admin have such a privilege)\r\n&nbsp;', 4),
(2, 'cms_manage_access', 'Manage Access', 'Manage access\r\n&nbsp;', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_quicklink`
--

CREATE TABLE IF NOT EXISTS `main_quicklink` (
  `quicklink_id` int(20) NOT NULL AUTO_INCREMENT,
  `navigation_id` int(5) NOT NULL,
  `index` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`quicklink_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `main_quicklink`
--

INSERT INTO `main_quicklink` (`quicklink_id`, `navigation_id`, `index`) VALUES
(1, 17, 1),
(7, 48, 4),
(8, 73, 6),
(9, 10, 7),
(10, 74, 5),
(11, 1, 8),
(12, 3, 9),
(13, 4, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_user`
--

CREATE TABLE IF NOT EXISTS `main_user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `activation_code` varchar(50) DEFAULT NULL,
  `real_name` varchar(100) DEFAULT NULL,
  `active` int(5) NOT NULL DEFAULT '1',
  `auth_OpenID` varchar(100) DEFAULT NULL,
  `auth_Facebook` varchar(100) DEFAULT NULL,
  `auth_Twitter` varchar(100) DEFAULT NULL,
  `auth_Yahoo` varchar(100) DEFAULT NULL,
  `auth_LinkedIn` varchar(100) DEFAULT NULL,
  `auth_MySpace` varchar(100) DEFAULT NULL,
  `auth_Foursquare` varchar(100) DEFAULT NULL,
  `auth_AOL` varchar(100) DEFAULT NULL,
  `auth_Live` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `main_user`
--

INSERT INTO `main_user` (`user_id`, `user_name`, `email`, `password`, `activation_code`, `real_name`, `active`, `auth_OpenID`, `auth_Facebook`, `auth_Twitter`, `auth_Yahoo`, `auth_LinkedIn`, `auth_MySpace`, `auth_Foursquare`, `auth_AOL`, `auth_Live`) VALUES
(1, 'admin', 'havea.prima@gmail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, 'admin', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'haveaprima', 'haveaprima@df.df', '5f01edf1accec88ddf98d8de15fb0598', NULL, 'haveaprima', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '0910031802108', '0910031802108@df.df', '7f92b0f14c1a52ee043ea53fb7e0ef0f', NULL, '0910031802108', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'admin2', 'admin2@gmail.com', 'c84258e9c39059a89ab77d846ddab909', NULL, 'admin2', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `main_widget`
--

CREATE TABLE IF NOT EXISTS `main_widget` (
  `widget_id` int(20) NOT NULL AUTO_INCREMENT,
  `widget_name` varchar(50) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `url` varchar(100) DEFAULT NULL,
  `authorization_id` int(5) NOT NULL DEFAULT '1',
  `active` int(5) NOT NULL DEFAULT '1',
  `index` int(5) NOT NULL DEFAULT '0',
  `is_static` int(5) NOT NULL DEFAULT '0',
  `static_content` text,
  `slug` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`widget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `main_widget`
--

INSERT INTO `main_widget` (`widget_id`, `widget_name`, `title`, `description`, `url`, `authorization_id`, `active`, `index`, `is_static`, `static_content`, `slug`) VALUES
(1, 'section_top_fix', 'Top Fix Section', '', '', 1, 1, 1, 1, '{{ widget_name:quicklink }}', NULL),
(2, 'section_banner', 'Banner Section', '', '', 1, 1, 2, 1, '<div class="jumbotron hidden-xs hidden-sm" style="margin-top:10px;">\r\n  <img src ="{{ site_logo }}" style="max-width:20%; float:left; margin-right:10px; margin-bottom:10px;" />\r\n  <h1>{{ site_name }}</h1>\r\n  <p>{{ site_slogan }}</p>\r\n</div>', NULL),
(3, 'section_left', 'Left Section', '', '', 1, 1, 3, 1, '', NULL),
(4, 'section_right', 'Right Section', '', '', 1, 1, 4, 1, '{{ widget_slug:sidebar }}<hr />{{ widget_slug:advertisement }}', NULL),
(5, 'section_bottom', 'Bottom Section', '', '', 1, 1, 5, 1, '{{ site_footer }}', NULL),
(6, 'left_navigation', 'Left Navigation', '', 'main/widget_left_nav', 1, 1, 6, 0, NULL, NULL),
(7, 'top_navigation', 'Top Navigation', '', 'main/widget_top_nav', 1, 1, 7, 0, NULL, NULL),
(8, 'quicklink', 'Quicklinks', '', 'main/widget_quicklink', 1, 1, 8, 0, NULL, NULL),
(9, 'login', 'Login', 'Visitor need to login for authentication', 'main/widget_login', 2, 1, 9, 0, '<form action="{{ site_url }}main/login" method="post" accept-charset="utf-8"><label>Identity</label><br><input type="text" name="identity" value=""><br><label>Password</label><br><input type="password" name="password" value=""><br><input type="submit" name="login" value="Log In"></form>', 'sidebar, user_widget'),
(10, 'logout', 'User Info', 'Logout', 'main/widget_logout', 3, 1, 10, 1, '{{ language:Welcome }} {{ user_name }}<br />\r\n<a href="{{ site_url }}main/logout">{{ language:Logout }}</a><br />', 'sidebar, user_widget'),
(11, 'social_plugin', 'Share This Page !!', 'Addthis', 'main/widget_social_plugin', 1, 1, 11, 1, '<!-- AddThis Button BEGIN -->\r\n<div class="addthis_toolbox addthis_default_style "><a class="addthis_button_preferred_1"></a> <a class="addthis_button_preferred_2"></a> <a class="addthis_button_preferred_3"></a> <a class="addthis_button_preferred_4"></a> <a class="addthis_button_preferred_5"></a> <a class="addthis_button_preferred_6"></a> <a class="addthis_button_preferred_7"></a> <a class="addthis_button_preferred_8"></a> <a class="addthis_button_preferred_9"></a> <a class="addthis_button_preferred_10"></a> <a class="addthis_button_preferred_11"></a> <a class="addthis_button_preferred_12"></a> <a class="addthis_button_preferred_13"></a> <a class="addthis_button_preferred_14"></a> <a class="addthis_button_preferred_15"></a> <a class="addthis_button_preferred_16"></a> <a class="addthis_button_compact"></a> <a class="addthis_counter addthis_bubble_style"></a></div>\r\n<script src="http://s7.addthis.com/js/250/addthis_widget.js?domready=1" type="text/javascript"></script>\r\n<!-- AddThis Button END -->', 'sidebar'),
(12, 'google_search', 'Search', 'Search from google', '', 1, 0, 12, 1, '<!-- Google Custom Search Element -->\r\n<div id="cse" style="width: 100%;">Loading</div>\r\n<script src="http://www.google.com/jsapi" type="text/javascript"></script>\r\n<script type="text/javascript">// <![CDATA[\r\n    google.load(''search'', ''1'');\r\n    google.setOnLoadCallback(function(){var cse = new google.search.CustomSearchControl();cse.draw(''cse'');}, true);\r\n// ]]></script>', 'sidebar'),
(13, 'google_translate', 'Translate !!', '<p>The famous google translate</p>', '', 1, 0, 13, 1, '<!-- Google Translate Element -->\r\n<div id="google_translate_element" style="display:block"></div>\r\n<script>\r\nfunction googleTranslateElementInit() {\r\n  new google.translate.TranslateElement({pageLanguage: "af"}, "google_translate_element");\r\n};\r\n</script>\r\n<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>\r\n', 'sidebar'),
(14, 'calendar', 'Calendar', 'Indonesian Calendar', '', 1, 0, 14, 1, '<!-------Do not change below this line------->\r\n<div align="center" height="200px">\r\n    <iframe align="center" src="http://www.calendarlabs.com/calendars/web-content/calendar.php?cid=1001&uid=162232623&c=22&l=en&cbg=C3D9FF&cfg=000000&hfg=000000&hfg1=000000&ct=1&cb=1&cbc=2275FF&cf=verdana&cp=bottom&sw=0&hp=t&ib=0&ibc=&i=" width="170" height="155" marginwidth=0 marginheight=0 frameborder=no scrolling=no allowtransparency=''true''>\r\n    Loading...\r\n    </iframe>\r\n    <div align="center" style="width:140px;font-size:10px;color:#666;">\r\n        Powered by <a  href="http://www.calendarlabs.com/" target="_blank" style="font-size:10px;text-decoration:none;color:#666;">Calendar</a> Labs\r\n    </div>\r\n</div>\r\n\r\n<!-------Do not change above this line------->', 'sidebar'),
(15, 'google_map', 'Map', 'google map', '', 1, 0, 15, 1, '<!-- Google Maps Element Code -->\r\n<iframe frameborder=0 marginwidth=0 marginheight=0 border=0 style="border:0;margin:0;width:150px;height:250px;" src="http://www.google.com/uds/modules/elements/mapselement/iframe.html?maptype=roadmap&element=true" scrolling="no" allowtransparency="true"></iframe>', 'sidebar'),
(16, 'donate_nocms', 'Donate No-CMS', 'No-CMS Donation', NULL, 1, 1, 16, 1, '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">\r\n<input type="hidden" name="cmd" value="_s-xclick">\r\n<input type="hidden" name="hosted_button_id" value="YDES6RTA9QJQL">\r\n<input type="image" src="{{ base_url }}assets/nocms/images/donation.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" width="165px" height="auto" style="width:165px!important;" />\r\n<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">\r\n</form>', 'advertisement'),
(17, 'navigation_right_partial', 'top navigation right partial', 'Right Partial of Top Navigation Bar. Use this when you want to add something like facebook login form', NULL, 1, 1, 17, 1, '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_cont_pkl`
--

CREATE TABLE IF NOT EXISTS `master_cont_pkl` (
  `id_master_cont_pkl` int(2) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(30) NOT NULL,
  `nomor_telp` varchar(13) NOT NULL,
  PRIMARY KEY (`id_master_cont_pkl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `master_cont_pkl`
--

INSERT INTO `master_cont_pkl` (`id_master_cont_pkl`, `nama_dosen`, `nomor_telp`) VALUES
(1, 'Mulyanto, MT', '08125555'),
(2, 'Budi Arham, M. Kom', '081222222222'),
(3, 'Ibnu Daqiqil, M.It', '081244444444'),
(4, 'Rahmat Alrian, M. Kom', '081322222222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mas_jurusan`
--

CREATE TABLE IF NOT EXISTS `mas_jurusan` (
  `id_jurusan` int(2) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(50) DEFAULT NULL,
  `ketua_jurusan` varchar(50) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `mas_jurusan`
--

INSERT INTO `mas_jurusan` (`id_jurusan`, `nama_jurusan`, `ketua_jurusan`, `pangkat`) VALUES
(1, 'Teknik Informatika', 'Edwar Ali, M.Kom', 'III D'),
(2, 'Manajemen Informatika', 'Susandri, M.Kom', 'III D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mhs_pkl`
--

CREATE TABLE IF NOT EXISTS `mhs_pkl` (
  `id_mhs_pkl` int(10) NOT NULL AUTO_INCREMENT,
  `fk_id_pkl` int(10) NOT NULL,
  `nama_mahasiswa` varchar(30) NOT NULL,
  `npm` bigint(13) unsigned zerofill NOT NULL,
  `id_jurusan` int(2) NOT NULL,
  PRIMARY KEY (`id_mhs_pkl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `mhs_pkl`
--

INSERT INTO `mhs_pkl` (`id_mhs_pkl`, `fk_id_pkl`, `nama_mahasiswa`, `npm`, `id_jurusan`) VALUES
(5, 4, 'Heru Prambadi', 0910031802108, 1),
(6, 4, 'Havea Prima', 0910031802102, 2),
(7, 4, 'Riki Kurniawan', 0910031802190, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_cuti`
--

CREATE TABLE IF NOT EXISTS `permohonan_cuti` (
  `id_permohonan_cuti` int(10) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` varchar(13) DEFAULT NULL,
  `jurusan` int(2) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `alasan_cuti` text,
  `tahun_ajaran` varchar(11) DEFAULT NULL,
  `dosen_pa` varchar(50) DEFAULT NULL,
  `bulan` int(2) unsigned zerofill NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id_permohonan_cuti`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `permohonan_cuti`
--

INSERT INTO `permohonan_cuti` (`id_permohonan_cuti`, `nama_mahasiswa`, `npm`, `jurusan`, `alamat`, `no_telp`, `alasan_cuti`, `tahun_ajaran`, `dosen_pa`, `bulan`, `tahun`) VALUES
(1, 'nama', '12121212', 2, NULL, NULL, NULL, NULL, NULL, 00, 0),
(2, 'Havea', '0910031802108', 2, 'sadasda', '324234324', '32rwefdsfsdfsdf', '2012', 'Edddd', 00, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_peng_data`
--

CREATE TABLE IF NOT EXISTS `permohonan_peng_data` (
  `id_permohonan_peng_data` int(20) NOT NULL AUTO_INCREMENT,
  `nomor_surat` int(4) unsigned zerofill DEFAULT NULL,
  `lampiran` varchar(100) DEFAULT NULL,
  `kepada` varchar(200) DEFAULT NULL,
  `di` varchar(100) DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` varchar(13) DEFAULT NULL,
  `fk_id_jurusan` int(2) DEFAULT NULL,
  `bulan` int(2) unsigned zerofill NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id_permohonan_peng_data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_riset`
--

CREATE TABLE IF NOT EXISTS `permohonan_riset` (
  `id_permohonan_riset` int(4) NOT NULL AUTO_INCREMENT,
  `nomor_surat` int(4) unsigned zerofill DEFAULT NULL,
  `lampiran` varchar(50) DEFAULT '-',
  `kepada` varchar(50) DEFAULT NULL,
  `di` varchar(50) DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `npm` varchar(13) DEFAULT NULL,
  `fk_id_jurusan` int(2) DEFAULT NULL,
  `judul_penelitian` varchar(150) DEFAULT NULL,
  `bulan` int(2) unsigned zerofill NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id_permohonan_riset`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `permohonan_riset`
--

INSERT INTO `permohonan_riset` (`id_permohonan_riset`, `nomor_surat`, `lampiran`, `kepada`, `di`, `nama_mahasiswa`, `npm`, `fk_id_jurusan`, `judul_penelitian`, `bulan`, `tahun`) VALUES
(1, 0001, NULL, 'Bapak Pimpinan Universitas Muhammadiyah Riau', 'Pekanbaru', 'Havea prima', '0910031802102', 1, 'Sistem Kepegawaian Universitas Muhammadiyah Riau', 02, 2014);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkl`
--

CREATE TABLE IF NOT EXISTS `pkl` (
  `id_pkl` int(4) NOT NULL AUTO_INCREMENT,
  `nomor` int(4) unsigned zerofill DEFAULT NULL,
  `lampiran` varchar(50) DEFAULT NULL,
  `kepada` varchar(50) NOT NULL,
  `di` varchar(30) NOT NULL,
  `dari_tanggal` date DEFAULT NULL,
  `sampai_tangal` date DEFAULT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `bulan` int(2) unsigned zerofill NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id_pkl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `pkl`
--

INSERT INTO `pkl` (`id_pkl`, `nomor`, `lampiran`, `kepada`, `di`, `dari_tanggal`, `sampai_tangal`, `nama_mahasiswa`, `bulan`, `tahun`) VALUES
(4, 0001, '-', 'Rektor Universitas Mwuhammadiyah Riau', 'Tempatw', '2014-02-01', '2014-02-28', NULL, 04, 2014);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE IF NOT EXISTS `surat_masuk` (
  `id_surat_masuk` int(4) NOT NULL AUTO_INCREMENT,
  `nama_surat` varchar(100) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `untuk` varchar(50) NOT NULL,
  `sifat` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `file` varchar(50) NOT NULL,
  PRIMARY KEY (`id_surat_masuk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `nama_surat`, `dari`, `untuk`, `sifat`, `tanggal`, `file`) VALUES
(24, 'Surat Edaran', 'Dikti', 'STMIK-AMIK RIAU', 'Edaran', '2014-02-01', '5b041-hasil-review-tahap5.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_tugas`
--

CREATE TABLE IF NOT EXISTS `surat_tugas` (
  `id_surat_tugas` int(4) NOT NULL AUTO_INCREMENT,
  `nomor_surat` int(4) unsigned zerofill NOT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `nik` varchar(13) DEFAULT NULL,
  `pangkat_golongan` varchar(30) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `tujuan` text,
  `bulan` int(2) unsigned zerofill DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_surat_tugas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `surat_tugas`
--

INSERT INTO `surat_tugas` (`id_surat_tugas`, `nomor_surat`, `nama_pegawai`, `nik`, `pangkat_golongan`, `jabatan`, `tujuan`, `bulan`, `tahun`) VALUES
(1, 0001, 'Heru Prambadi', '09090808', 'Asisten Ahli', 'Dosen', 'Untuk mengikuti workshop peningkatan tata kelola PTS Tahun 2015 yang diselenggarakan oleh Kopertis Wilayah X pada hari Sabtu s/d Senin tanggal 22 s/d 25 Agustus 2015 bertempat di Hotel Premiere.', 01, 2016);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
