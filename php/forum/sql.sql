-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2012 at 01:29 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_admin`
--

CREATE TABLE IF NOT EXISTS `forum_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `member_date` int(11) NOT NULL,
  `lastup_date` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forum_category`
--

CREATE TABLE IF NOT EXISTS `forum_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` text NOT NULL,
  `add_date` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `forum_category`
--

INSERT INTO `forum_category` (`cat_id`, `user_id`, `cat_name`, `cat_desc`, `add_date`) VALUES
(1, 3, 'Informasi Penting', 'Kumpulan berbagai informasi penting, artikel, literatur, cerita, cerpen, dan berbagai hal menarik lainnya.<br>', 1348004839),
(2, 1, 'Markas Web Programmer', 'Kolom ini merupakan tempat bagi para programmer web untuk saling berbagai ilum, informasi, pengalaman dan cerita selama mengembangkan program-program website. Silahkan bergabung sekarang juga.<br>', 1348004982),
(3, 1, 'Games Mania', 'Mari bermanja-manja dengan menikmati ribuan games gratis coy...<br>', 1348006374);

-- --------------------------------------------------------

--
-- Table structure for table `forum_reply`
--

CREATE TABLE IF NOT EXISTS `forum_reply` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `reply` text NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `forum_reply`
--

INSERT INTO `forum_reply` (`reply_id`, `topic_id`, `user_id`, `date`, `reply`) VALUES
(1, 2, 1, 1348006318, 'wah, sialan tuch orang ketipu gue...<br>');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic`
--

CREATE TABLE IF NOT EXISTS `forum_topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `title` text NOT NULL,
  `descript` text NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `forum_topic`
--

INSERT INTO `forum_topic` (`topic_id`, `cat_id`, `user_id`, `date`, `views`, `title`, `descript`) VALUES
(1, 2, 1, 1348005985, 6, 'Tips Perulangan dengan while..do', 'Pada kesempatan kali ini, saya akan menjelaskan cara membuat perulangan dengan&nbsp; menampilkan data dalam bentuk sebuah table dan nilainya merupakan kelipatan nilai tertentu.<br><br><span style="font-family: courier new; color: rgb(51, 204, 102);">&lt;table border=0 cellpadding=3&gt;</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">&lt;tr&gt;</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">&nbsp;&nbsp; &nbsp;&lt;td bgcolor="#CCCCCC" align = center&gt;Distance&lt;/td&gt;</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">&nbsp;&nbsp; &nbsp;&lt;td bgcolor="#CCCCCC" align = center&gt;Cost&lt;/td&gt;</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">&lt;/tr&gt;</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">&lt;?php</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">$distance = 50;</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">while ( $distance &lt;= 250 ) {</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">&nbsp;&nbsp; &nbsp;echo "&lt;tr&gt;\\n &lt;td align=right&gt;$distance&lt;/td&gt;\\n";</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">&nbsp;&nbsp; &nbsp;echo " &lt;td align=right&gt;". $distance / 10 ."&lt;/td&gt;\\n&lt;/tr&gt;\\n";</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">&nbsp;&nbsp; &nbsp;$distance += 50;</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">}</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">?&gt;</span><br style="font-family: courier new; color: rgb(51, 204, 102);"><br style="font-family: courier new; color: rgb(51, 204, 102);"><span style="font-family: courier new; color: rgb(51, 204, 102);">&lt;/table&gt;</span><br><br><br>'),
(2, 1, 1, 1348006172, 3, 'Sharing aja nih, info Penipuan Coy…..', '<span style="font-weight: bold;">Ada penipuan bermoduskan penjualan sepeda murah dgn </span><br style="font-weight: bold;"><span style="font-weight: bold;">web http://www.serba_ada.com/</span>.<br><br>Pengalaman teman saya membeli sepeda melalui online yang harganya lumayan murah sekitaran 2,2 juta. Setelah di transfer ke rek yg tercantum di webs nya sebesar 2,2 jt, Kemudian pembeli menghubungi no yg tercantum di webnya, setelah pembeli menghubungi No tersebut dijawab dengan operator yang sangat diplomat bicaranya,dan operator tersebut Minta di transfer lagi sebesar 2,5 juta sebagai ongkos kirim karena sipembeli berada di kota Medan di luar kota Batam. Alamat tokonya Nagoya hill kota Batam jln tg datuk no 207.kemudian temen saya menelpon saya untuk memastikan alamat tersebut.<br><br>Dan setelah saya check di Nagoya hill tdk ada toko sepeda yang menjual lewat webs atau Online.kemudian sipembeli menghubungi no yang tercantum di webs nya tidak active lagi. Itu saja informasi dari saya semoga bermanfaat.<br><br>');

-- --------------------------------------------------------

--
-- Table structure for table `forum_user`
--

CREATE TABLE IF NOT EXISTS `forum_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `member_date` int(11) NOT NULL,
  `lastup_date` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `forum_user`
--

INSERT INTO `forum_user` (`user_id`, `fullname`, `password`, `email`, `url`, `member_date`, `lastup_date`, `status`) VALUES
(1, 'Andrew Hutauruk', 'd914e3ecf6cc481114a3f534a5faf90b', 'ahradg@gmail.com', 'http://xxx.xxx.xxx', 1347982826, 1348006391, 0),
(2, 'Keran Bocor', 'c08ed8879fbc79bbe96641bcdf4f64a6', 'keran_bocor@yahoo.com', 'http://xxx.xxx.xxx', 1347988361, 1347988670, 0),
(3, 'John Doel', '8655f6bdd1c1728404146564dca8a78b', 'john_doel@yahoo.com', 'http://xxx.xxx.xxx', 1347988697, 1348004850, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
