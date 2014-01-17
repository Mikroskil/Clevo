SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_unique` (`cat_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'Medan', 'Medan'),
(2, 'Surabaya', 'Surabaya'),
(3, 'Aceh', 'Aceh'),
(4, 'Papua', 'Papua'),
(5, 'Palembang', 'Palembang'),
(6, 'Makassar', 'Makassar'),
(7, 'Padang', 'Padang'),
(8, 'Bandung', 'Bandung'),
(9, 'Jakarta', 'Jakarta'),
(10, 'Bali', 'Bali'),
(11, 'Sulawesi', 'Sulawesi'),
(12, 'Kalimantan', 'Kalimantan');

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `Nama` varchar(50) NOT NULL,
  `id_customer` varchar(30) NOT NULL,
  `jenis_id` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Confirm_Pass` varchar(100) NOT NULL,
  `Tempat_Lahir` varchar(50) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Jenis_Kelamin` varchar(20) NOT NULL,
  `No_Telp` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Jenis_Rekening` varchar(20) NOT NULL,
  `No_Rekening` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `customer` (`Nama`, `id_customer`, `jenis_id`, `Username`, `Password`, `Confirm_Pass`, `Tempat_Lahir`, `Tanggal_Lahir`, `Alamat`, `Jenis_Kelamin`, `No_Telp`, `Email`, `Jenis_Rekening`, `No_Rekening`, `tanggal`) VALUES
('admin', '1', 'KTP', 'admin', 'admin', 'admin', 'medan', '2014-01-11', 'medan', 'laki-laki', '1', 'admin@waria.com', 'VISA', '1', '2014-01-11'),
('test', '101', 'KTPel', 'user1', 'user1', 'user1', 'medan', '2013-12-25', 'a', 'laki-laki', '101', 'user@yahoo.com', 'VISA', '101', '2013-12-24');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(8) NOT NULL AUTO_INCREMENT,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_topic` (`post_topic`),
  KEY `post_by` (`post_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(3, 'test ya', '2014-01-08 11:13:20', 1, 1);

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(8) NOT NULL AUTO_INCREMENT,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `topic_cat` (`topic_cat`),
  KEY `topic_by` (`topic_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`) VALUES
(1, 'buat thread satu', '2013-12-24 17:20:31', 1, 1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL,
  `user_level` int(8) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name_unique` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@waria.com', '2013-12-22 11:11:52', 1),
(2, 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 'user@yahoo.com', '2013-12-24 17:41:51', 0);


ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
