-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2013 at 07:44 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `highrachy_rebrand`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `priority` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `content`, `priority`, `modified`) VALUES
(1, 'Value Preposition', '<p>Our tested methodology perfectly harnesses the individual skill sets of our team to ensure that you are WOWed. All these promises delivered via impeccable services make Highrachy the number one choice.</p>', 5, '2013-03-20 20:47:01'),
(2, 'Our Mission', '<p>To continuously enhance your lives be it home or work by providing technology and investments solutions and ensuring seamless objective delivery via consultancy.</p>', 4, '2013-03-20 20:47:01'),
(3, 'Our Vision', '<p>To be a globally known one-stop-shop for solutions within our operative industries.</p>', 2, '2013-03-25 06:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_type` tinyint(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address` varchar(500) DEFAULT NULL,
  `contact_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password` char(32) NOT NULL,
  `active` char(32) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`),
  KEY `email` (`email`,`password`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_type`, `company_name`, `company_address`, `contact_name`, `email`, `phone`, `password`, `active`, `created`, `modified`) VALUES
(1, 0, 'Highrachy', 'Highrachy Limited', 'Administrator', 'admin@highrachy.com', '08028388185', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-01-24 21:09:10', '2013-01-24 21:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` text NOT NULL,
  `mobile1` varchar(20) NOT NULL,
  `land` varchar(30) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `linked` varchar(250) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `address`, `mobile1`, `land`, `facebook`, `twitter`, `linked`, `modified`) VALUES
(1, '<p><span>Suite 182 Block E Admiralty Estates,</span><br /><span>15-17 Fubara Dublin Green Street,</span><br /><span>Alpha beach, Lekki, Lagos.</span></p>', '+234 802 833 7440', '', 'facebook', 'twitter', 'linkedln', '2013-03-26 06:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `edit`
--

CREATE TABLE IF NOT EXISTS `edit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `content` mediumtext,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `edit`
--

INSERT INTO `edit` (`id`, `name`, `content`, `modified`) VALUES
(1, 'Home', '<p><span>We first understand your needs, and then we design, plan, manage and control solutions and implementation within Technology and Real Estate industries.</span></p>', '2013-03-25 22:16:24'),
(2, 'About', '<p>Far from a mere technology company, we are a solutions company that goes way beyond solving problems as identified by you, but also constantly enhances your lives, lifestyles and living. Our solutions are inspired by ideas that promise more convenience, comfort, security, safety, income and plain fun just for YOU.</p>', '2013-03-25 06:18:48'),
(3, 'Expertise', '<p>We pride ourselves in our excellent service delivery standards in line with our core competencies. These competencies are;</p>', '2013-03-25 15:49:56'),
(4, 'Solutions', '<p>A team of diverse experts that combine our unique skills toward efficiently providing customized solutions for your individual and collective requirements.</p>', '2013-03-25 15:48:54'),
(5, 'Products', 'We are committed to helping our clients succeed', '2013-03-02 01:47:54'),
(6, 'Contact Us', 'We will really love to hear from you.', '2013-03-02 01:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE IF NOT EXISTS `expertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `content` text,
  `link` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL,
  `icons_id` int(11) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`id`, `name`, `content`, `link`, `priority`, `icons_id`, `modified`) VALUES
(1, 'Consulting', NULL, 0, 1, 65, '2013-03-21 07:05:22'),
(2, 'Technology', NULL, 0, 1, 46, '2013-03-21 07:06:37'),
(3, 'Investment', NULL, 0, 1, 64, '2013-03-21 07:06:45'),
(4, 'Project Managing Consulting', '<p>Project consulting including project advisory planning and documentation, project coordination and communication, project monitoring and control, project strategic alignment, project procurement and contract advisory, change and transition management advisory.</p>', 1, 1, NULL, '2013-03-22 18:15:26'),
(5, 'Business Consulting', '<p>Business consulting including business advisory and planning, business structuring and business process management advisory, change and transition management advisory.</p>', 1, 1, NULL, '2013-03-22 00:28:25'),
(6, 'Techonology Solutions', '<p>The world as it is today is managed by various spheres of technological gadgets and solutions. Highrachy gives you the opportunity to align yourself with these privileges. We ensure that you get customized solutions that go beyond resolving the issue but also adapting to your personality.</p>', 2, 1, NULL, '2013-03-22 00:37:15'),
(7, 'Real Investment', '<p>We provide a wide array of real estate management and advisory services be it property acquisition, development or post-development management services. </p>', 3, 1, NULL, '2013-03-22 00:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pics` varchar(150) NOT NULL,
  `link` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `pics`, `link`, `modified`) VALUES
(6, 'expertise_1364246063.jpg', 7, '2013-03-25 22:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE IF NOT EXISTS `icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `name`) VALUES
(1, 'icon-glass'),
(2, 'icon-music'),
(3, 'icon-search'),
(4, 'icon-envelope'),
(5, 'icon-heart'),
(6, 'icon-star'),
(7, 'icon-star-empty'),
(8, 'icon-user'),
(9, 'icon-film'),
(10, 'icon-th-large'),
(11, 'icon-th'),
(12, 'icon-th-list'),
(13, 'icon-ok'),
(14, 'icon-remove'),
(15, 'icon-zoom-in'),
(16, 'icon-zoom-out'),
(17, 'icon-off'),
(18, 'icon-signal'),
(19, 'icon-cog'),
(20, 'icon-trash'),
(21, 'icon-home'),
(22, 'icon-file'),
(23, 'icon-time'),
(24, 'icon-road'),
(25, 'icon-download-alt'),
(26, 'icon-download'),
(27, 'icon-upload'),
(28, 'icon-inbox'),
(29, 'icon-play-circle'),
(30, 'icon-repeat'),
(31, 'icon-refresh'),
(32, 'icon-list-alt'),
(33, 'icon-lock'),
(34, 'icon-flag'),
(35, 'icon-headphones'),
(36, 'icon-volume-off'),
(37, 'icon-volume-down'),
(38, 'icon-volume-up'),
(39, 'icon-qrcode'),
(40, 'icon-barcode'),
(41, 'icon-tag'),
(42, 'icon-tags'),
(43, 'icon-book'),
(44, 'icon-bookmark'),
(45, 'icon-print'),
(46, 'icon-camera'),
(47, 'icon-font'),
(48, 'icon-bold'),
(49, 'icon-italic'),
(50, 'icon-text-height'),
(51, 'icon-text-width'),
(52, 'icon-align-left'),
(53, 'icon-align-center'),
(54, 'icon-align-right'),
(55, 'icon-align-justify'),
(56, 'icon-list'),
(57, 'icon-indent-left'),
(58, 'icon-indent-right'),
(59, 'icon-facetime-video'),
(60, 'icon-picture'),
(61, 'icon-pencil'),
(62, 'icon-map-marker'),
(63, 'icon-adjust'),
(64, 'icon-tint'),
(65, 'icon-edit'),
(66, 'icon-share'),
(67, 'icon-check'),
(68, 'icon-move'),
(69, 'icon-step-backward'),
(70, 'icon-fast-backward'),
(71, 'icon-backward'),
(72, 'icon-play'),
(73, 'icon-pause'),
(74, 'icon-stop'),
(75, 'icon-forward'),
(76, 'icon-fast-forward'),
(77, 'icon-step-forward'),
(78, 'icon-eject'),
(79, 'icon-chevron-left'),
(80, 'icon-chevron-right'),
(81, 'icon-plus-sign'),
(82, 'icon-minus-sign'),
(83, 'icon-remove-sign'),
(84, 'icon-ok-sign'),
(85, 'icon-question-sign'),
(86, 'icon-info-sign'),
(87, 'icon-screenshot'),
(88, 'icon-remove-circle'),
(89, 'icon-ok-circle'),
(90, 'icon-ban-circle'),
(91, 'icon-arrow-left'),
(92, 'icon-arrow-right'),
(93, 'icon-arrow-up'),
(94, 'icon-arrow-down'),
(95, 'icon-share-alt'),
(96, 'icon-resize-full'),
(97, 'icon-resize-small'),
(98, 'icon-plus'),
(99, 'icon-minus'),
(100, 'icon-asterisk'),
(101, 'icon-exclamation-sign'),
(102, 'icon-gift'),
(103, 'icon-leaf'),
(104, 'icon-fire'),
(105, 'icon-eye-open'),
(106, 'icon-eye-close'),
(107, 'icon-warning-sign'),
(108, 'icon-plane'),
(109, 'icon-calendar'),
(110, 'icon-random'),
(111, 'icon-comment'),
(112, 'icon-magnet'),
(113, 'icon-chevron-up'),
(114, 'icon-chevron-down'),
(115, 'icon-retweet'),
(116, 'icon-shopping-cart'),
(117, 'icon-folder-close'),
(118, 'icon-folder-open'),
(119, 'icon-resize-vertical'),
(120, 'icon-resize-horizontal'),
(121, 'icon-hdd'),
(122, 'icon-bullhorn'),
(123, 'icon-bell'),
(124, 'icon-certificate'),
(125, 'icon-thumbs-up'),
(126, 'icon-thumbs-down'),
(127, 'icon-hand-right'),
(128, 'icon-hand-left'),
(129, 'icon-hand-up'),
(130, 'icon-hand-down'),
(131, 'icon-circle-arrow-right'),
(132, 'icon-circle-arrow-left'),
(133, 'icon-circle-arrow-up'),
(134, 'icon-circle-arrow-down'),
(135, 'icon-globe'),
(136, 'icon-wrench'),
(137, 'icon-tasks'),
(138, 'icon-filter'),
(139, 'icon-briefcase'),
(140, 'icon-fullscreen');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `product_pics` varchar(150) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `product_pics`, `modified`) VALUES
(1, 'Voip Dect Phone (DP715)', '59', 'product_1364330694.jpg', '2013-03-26 21:44:54'),
(2, 'Dsc Wireless Bronze Starter Kit', '60', 'product_1364330801.jpg', '2013-03-26 21:46:41'),
(3, 'Line Enterprise Hd Ip Phone (GXP2124-4)', '50', 'product_1364330897.jpg', '2013-03-26 21:48:17'),
(4, 'Ip Multimedia Phone (GXV3140)', '50', 'product_1364331055.jpg', '2013-03-26 21:50:55'),
(5, 'Fixed Dome Ip Camera (GXV3611)', '50', 'product_1364331121.jpg', '2013-03-26 21:52:01'),
(6, 'Ip Analog Gateway (GXW4104)', '50', 'product_1364331563.jpg', '2013-03-26 21:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `slideshow_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `description` varchar(250) NOT NULL,
  `link_text` varchar(250) NOT NULL,
  `link_page` varchar(100) NOT NULL,
  `slideshow_pics` varchar(60) NOT NULL,
  `show_home` varchar(10) NOT NULL DEFAULT 'YES',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`slideshow_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`slideshow_id`, `name`, `description`, `link_text`, `link_page`, `slideshow_pics`, `show_home`, `modified`) VALUES
(1, 'Business', '<p>Business consulting including business advisory and planning, business structuring and business&nbsp;</p>', 'Learn More', 'expertise.php?page=5', 'slideshow_1364252130.jpg', 'YES', '2013-03-25 23:55:30'),
(2, 'Home', '<p>Making your home fascinate everyone, including you. Imagine the ability to control your home from your phone.</p>', 'Learn More', 'expertise.php?page=5', 'slideshow_1364252294.jpg', 'YES', '2013-03-25 23:58:14'),
(3, 'My Estate', '<p>We provide a wide array of real estate management and advisory services be it property acquisition, development</p>', 'Learn More', 'expertise.php?page=7', 'slideshow_1364267278.jpg', 'YES', '2013-03-26 20:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE IF NOT EXISTS `solutions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `content` text,
  `link` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL,
  `icons_id` int(11) NOT NULL DEFAULT '1',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `solutions`
--

INSERT INTO `solutions` (`id`, `name`, `content`, `link`, `priority`, `icons_id`, `modified`) VALUES
(1, 'Web Solutions', NULL, 0, 1, 124, '2013-03-21 21:18:01'),
(2, 'Bulding Solutions', NULL, 0, 1, 21, '2013-03-24 21:04:10'),
(3, 'Website Design', '<p><span>We provide customized web solutions for personal and business objectives, including websites, portals, web applications for all industries.</span></p>', 1, 1, 1, '2013-03-24 21:04:44'),
(4, 'Website Applications', '<p>We provide easy to use applications for your customized websites.</p>', 1, 1, 1, '2013-03-24 21:05:30'),
(5, 'Residential Automation', '<p>Making your home fascinate everyone, including you. Imagine the ability to control your home from your phone. You know who is at the door, you can open the gate from your car during a storm, you can lock your room from the office&hellip; these are mere perks as the all encompassing home solution promises you the SC4 of customer satisfaction</p>\r\n<p>Our Residential Automation includes the following:</p>\r\n<ul>\r\n<li>Smart Lighting</li>\r\n<li>Blind Control</li>\r\n<li>Heating, Ventilation and Cooling</li>\r\n<li>Audio Video Controls</li>\r\n<li>Security and Safety</li>\r\n<li>Customized Solutions</li>\r\n</ul>', 2, 1, 1, '2013-03-24 21:08:02'),
(6, 'Commercial Automation', '<p>Watch your profits soar with our commercial solutions. These customized packages don&rsquo;t just give you the control you need, they also save cost and can easily integrate with your existing business infrastructure</p>\r\n<p>Our solutions cover; Energy management, Lighting control, blind and drapes control, Heating ventilation and air conditioning control, security and safety controls.</p>\r\n<p>Our Commercial Automation includes the following:</p>\r\n<ul>\r\n<li>Energy Management</li>\r\n<li>Networking Systems</li>\r\n<li>Communication Systems</li>\r\n<li>Blind Control</li>\r\n<li>Heating, Ventilation and Cooling</li>\r\n<li>Audio Video Controls</li>\r\n<li>Security and Safety</li>\r\n<li>Customized Solutions</li>\r\n</ul>', 2, 1, 1, '2013-03-24 21:08:41');
