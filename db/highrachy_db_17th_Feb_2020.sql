-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2020 at 11:27 AM
-- Server version: 10.1.41-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `highrach_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `priority` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `content`, `priority`, `modified`) VALUES
(1, 'Value Preposition', '<p>Our tested methodology perfectly harnesses the individual skill sets of our team by stricking a ballance between design and technology to ensure that you are WOWed. All these promises delivered via impeccable services make Highrachy the number one choice for your real estate requirements.</p>', 5, '2015-11-12 04:42:52'),
(2, 'Our Mission', '<p>To continuously enhance your lives be it home or work by providing technology and real investments solutions and ensuring seamless objective delivery via Project Management consultancy.</p>', 4, '2013-04-07 14:49:04'),
(3, 'Our Vision', '<p>To be a globally known one-stop-shop for value within the real and technology industries.</p>', 2, '2015-11-12 04:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `career_id` int(11) NOT NULL,
  `cv` varchar(150) NOT NULL,
  `uploaded` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `name`, `phone`, `email`, `career_id`, `cv`, `uploaded`, `modified`) VALUES
(1, 'Haruna', '08023848394', 'oladayo@dayo.com', 3, 'Haruna1369542990.jpg', '0000-00-00 00:00:00', '2013-05-25 21:36:30'),
(2, 'Haruna', '08023848394', 'oladayo@dayo.com', 3, 'Haruna1369544926.jpg', '0000-00-00 00:00:00', '2013-05-25 22:08:46'),
(3, 'Felix', '0704839483', 'Felix@yahoo.com', 6, 'Felix1369601817.docx', '0000-00-00 00:00:00', '2013-05-26 13:56:57'),
(4, 'Felix', '0704839483', 'Felix@yahoo.com', 6, 'Felix1369602024.docx', '0000-00-00 00:00:00', '2013-05-26 14:00:24'),
(5, 'Israel Oloruntoba', '08163610972', 'israeltoba23@gmail.com', 6, 'Israel Oloruntoba1567071637.pdf', '0000-00-00 00:00:00', '2019-08-29 09:40:41'),
(6, 'Ibukun Nofiu', '8109502191', 'hibikgurl@gmail.com', 6, 'Ibukun Nofiu1568139361.pdf', '0000-00-00 00:00:00', '2019-09-10 18:16:01'),
(7, 'taiwo hasaan', '+2348103296060', 'THAYWO247@GMAIL.COM', 3, 'taiwo hasaan1575536074.docx', '0000-00-00 00:00:00', '2019-12-05 08:54:34'),
(8, 'Tega Oboraruvwe', '+2349025912094', 'tegararuvwe@gmail.com', 3, 'Tega Oboraruvwe1576000423.pdf', '0000-00-00 00:00:00', '2019-12-10 17:53:43'),
(9, 'Okonkwo ikenna paschal', '07032616044', 'ikennaokonkwo44@gmail.com', 6, 'Okonkwo ikenna paschal 1577428871.pdf', '0000-00-00 00:00:00', '2019-12-27 06:41:11'),
(10, 'lanre Ibraheem', '09030761429', 'lanreibraheem.m@gmail.com', 3, 'lanre Ibraheem1578332014.pdf', '0000-00-00 00:00:00', '2020-01-06 17:33:34'),
(11, 'Oluwadamilola Israel Alao', '07065044973', 'oluwadamilola.alao@gmail.com', 3, 'Oluwadamilola Israel Alao1578918425.pdf', '0000-00-00 00:00:00', '2020-01-13 12:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `content` text,
  `pics` varchar(60) DEFAULT NULL,
  `link` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '1',
  `icons_id` int(11) NOT NULL DEFAULT '1',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `name`, `content`, `pics`, `link`, `priority`, `icons_id`, `modified`) VALUES
(1, 'Careers', '<p><span>Before we started reinventing our clients&rsquo; businesses, we began by reimagining our own. Designed to be a smarter, more nimble company, our approach isn&rsquo;t always standard. But, then again, neither is our work.</span></p>', NULL, 0, 10, 1, '2013-05-25 05:28:39'),
(2, 'We are hiring', '<p><span>Far from a mere technology company, we are a solutions company that goes way beyond solving problems as identified by you, but also constantly enhancing your lives, lifestyles and living. Our solutions are inspired by ideas that promise more convenience, comfort, security, safety, income and plain fun just for YOU. We are currently hiring:</span></p>', NULL, 1, 1, 1, '2013-05-25 05:30:02'),
(3, 'Web Developer', '<p>We are in need of a talented Web Developer with the passion to solve problems. He should have passion for what he does and also be open to learning new technology as it may apply to web development.</p>', NULL, 0, 3, 1, '2013-05-25 05:48:40'),
(4, 'Responsibilities', '<ul>\r\n<li>Responsible for the design of basic and interactive websites with good user experience.</li>\r\n<li>Have working knowledge with HTML, CSS, XHTML, HTML5 &amp; CSS3, Javascript, jQuery.</li>\r\n<li>Experienced in the use of PHP &nbsp;and MYSQL to create a standard WEB 2.0</li>\r\n<li>Have Knowledge about Adobe Dreamweaver and Adobe Photoshop.</li>\r\n<li>Have the ability to learn new technology quickly and adapt.</li>\r\n<li>Have a Strong communication and writing skills.</li>\r\n<li>Be ready to provide technical Support when needed.</li>\r\n</ul>', NULL, 3, 1, 1, '2013-05-25 09:19:39'),
(5, 'Job Details', '<p><strong>Qualifications</strong></p>\r\n<p>You must have sample of previous jobs. You must be passionate and self - motivated about solving any web related problems.</p>\r\n<p><strong>Required Experience</strong></p>\r\n<p>At least 1 year working experience. You must be able to communicate and interact with English language.</p>\r\n<p><strong>Application Deadline</strong></p>\r\n<p><span>25th June, 2013</span></p>', NULL, 3, 2, 1, '2013-05-25 09:19:50'),
(6, 'Graphics Artist', '<p>We require the service of a qualified person to fill the position of a Graphics Artist in our Company.</p>', NULL, 0, 1, 1, '2013-05-25 08:57:40'),
(7, 'Responsibilities', '<ul>\r\n<li>Create designs, concept, and sample layouts based on knowledge of layout principles and aesthetic design concepts</li>\r\n<li>Use computer software to generate new images and key information into computer equipment to create layouts for clients</li>\r\n<li>Develop graphics and layouts for company logos and websites</li>\r\n<li>Develop graphics and layout for product illustrations, and other artwork using computer</li>\r\n</ul>', NULL, 6, 1, 1, '2013-05-25 09:12:46'),
(8, 'Job Details', '<p><strong>Qualifications</strong></p>\r\n<ul>\r\n<li><span>You must have sample of previous jobs. </span></li>\r\n<li><span>You must be very creative.</span></li>\r\n<li><span>You must be proficient in the use of design programmes such as Photoshop, Corel Draw, Acrobat director e.t.c.</span></li>\r\n</ul>\r\n<p><span><strong>Required Experience</strong></span></p>\r\n<ul>\r\n<li><span><span>At least 1 year working experience. </span></span></li>\r\n<li><span><span>You must be able to communicate and interact with English language</span></span></li>\r\n</ul>', NULL, 6, 1, 1, '2013-05-25 09:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `modified`) VALUES
(1, 'Safety & Security', '2015-07-29 14:50:58'),
(2, 'Ambience & Lifestyle', '2015-07-29 14:50:58'),
(3, 'Power and ICT', '2015-07-29 14:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `catproduct`
--

CREATE TABLE `catproduct` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catproduct`
--

INSERT INTO `catproduct` (`id`, `category_id`, `product_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 2),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 3, 13),
(14, 3, 14),
(15, 1, 15),
(16, 1, 16),
(17, 3, 17),
(18, 1, 21),
(19, 1, 20),
(20, 1, 19),
(21, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_type` tinyint(11) NOT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address` varchar(500) DEFAULT NULL,
  `contact_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password` char(32) NOT NULL,
  `active` char(32) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_type`, `company_name`, `company_address`, `contact_name`, `email`, `phone`, `password`, `active`, `created`, `modified`) VALUES
(1, 0, 'Highrachy', 'Highrachy Limited', 'Administrator', 'admin@highrachy.com', '08028388185', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2013-01-24 21:09:10', '2013-01-24 13:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `address` text NOT NULL,
  `mobile1` varchar(20) NOT NULL,
  `land` varchar(30) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `linked` varchar(250) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `address`, `mobile1`, `land`, `facebook`, `twitter`, `linked`, `modified`) VALUES
(1, '<p>5th Floor, Ibukun House,<br />No.70 Adetokunbo Ademola Street,<br> Victoria Island, Lagos.</p>', '+234 802 833 7440', '', 'https://www.facebook.com/highrachy', 'https://twitter.com/Highrachy', 'https://www.linkedin.com/company/highrachy-investment-and-technology-limited', '2017-10-29 20:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `edit`
--

CREATE TABLE `edit` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `content` mediumtext,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edit`
--

INSERT INTO `edit` (`id`, `name`, `content`, `modified`) VALUES
(1, 'Home', '<p><span style=\"font-size: medium;\"><span style=\"font-size: large;\">W</span>elcome to <strong><span style=\"color: #333333;\">Highrachy</span></strong>, a 21st century project oriented firm determined to meet your real estate and technological needs.&nbsp;First we understand your needs, and then design, plan, manage and control the implementation of best solutions within <span style=\"color: #333333;\"><strong>Real Estate </strong></span>and<strong style=\"font-size: small;\">&nbsp;</strong><span style=\"color: #333333;\"><strong>Technology</strong></span>&nbsp;industries.</span></p>\r\n<p><span style=\"font-size: medium;\">You can now live in <span style=\"color: #333333;\"><strong>luxury</strong></span> as we provide extreme comfort, connectivity and control to your home and work space.</span></p>', '2014-10-04 13:10:35'),
(2, 'About', '<p>Far from a mere technology company, we are a solutions company that goes way beyond solving problems as identified by you, but also constantly enhancing your lives, lifestyles and living. Our solutions are inspired by ideas that promise more convenience, comfort, security, safety, income and plain fun just for <strong>YOU</strong>.</p>\r\n<p>A real estate partner you can trust. Our research and development (R&amp;D) team ensures that your returns on investing with us is guaranteed.</p>', '2015-11-12 03:37:24'),
(3, 'Expertise', '<p>We pride ourselves in our excellent service delivery standards within our core competencies. These competencies include;&nbsp;</p>', '2013-04-01 01:20:51'),
(4, 'Solutions', '<p>A team of diverse experts that combine our unique skills toward efficiently providing customized solutions for your individual and collective requirements.</p>', '2013-03-25 07:48:54'),
(5, 'Products', '<p>To get any of these products, Click <a href=\"contact.php\">here</a> to contact us.</p>', '2013-04-02 19:23:40'),
(6, 'Contact Us', 'We will really love to hear from you.', '2013-04-02 19:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `content` text,
  `pics` varchar(150) DEFAULT NULL,
  `link` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '1',
  `icons_id` int(11) DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`id`, `name`, `content`, `pics`, `link`, `priority`, `icons_id`, `modified`) VALUES
(1, 'Consulting', '<p>We pride ourselves in our excellent service delivery standards within our core competencies. These competencies include;</p>', NULL, 0, 1, 65, '2013-04-02 19:43:56'),
(2, 'Technology', '<p>We pride ourselves in our excellent service delivery standards within our core competencies. These competencies include;</p>', NULL, 0, 1, 46, '2013-04-02 19:46:55'),
(3, 'Investment', '<p>Relish our excellent service delivery standards as we provide for your real investment needs.</p>', NULL, 0, 1, 64, '2013-06-19 12:10:13'),
(4, 'Project Managment Consulting', '<p>Project consulting including project advisory planning and documentation, project coordination and communication, project monitoring and control, project strategic alignment, project procurement and contract advisory, change and transition management advisory.</p>', NULL, 1, 3, NULL, '2014-01-15 14:54:30'),
(8, 'Business Consulting', '<p><span>At Highrachy, we provide Business consulting services, including; business advisory and planning, business structuring and business process management advisory, change and transition management advisory.</span></p>', NULL, 1, 2, NULL, '2013-06-19 12:39:59'),
(6, 'Techonology Solutions', '<p>The world as it is today is managed by various spheres of technological gadgets and solutions. Highrachy gives you the opportunity to align yourself with these privileges. We ensure that you get customized solutions that go beyond resolving the issue but also adapting to your personality.</p>', NULL, 2, 1, NULL, '2013-03-21 16:37:15'),
(7, 'Real Investment', '<p>We combine experience, expertise and dedication to give you returns on your real estate investments by focusing on the quality of our buildings and quality of the lives of our investors and occupants. Our synergic approach with industry leaders further emphasizes our dedication and commitment to our stakeholders.</p>', NULL, 3, 1, NULL, '2015-10-22 16:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `pics` varchar(150) NOT NULL,
  `link` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `pics`, `link`, `modified`) VALUES
(1, 'expertise_1524854757.jpeg', 7, '2018-04-27 18:45:57'),
(2, 'expertise_1445595239.jpg', 4, '2015-10-23 03:13:59'),
(3, 'expertise_1445595307.jpg', 6, '2015-10-23 03:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `product_pics` varchar(150) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `product_pics`, `modified`) VALUES
(1, 'Voip Dect Phone', 59, 'product_1364330694.jpg', '2014-08-31 06:57:40'),
(2, 'Dsc Wireless Bronze Starter Kit', 60, 'product_1364330801.jpg', '2014-08-04 10:20:42'),
(3, 'Line Enterprise Hd Ip Phone', 50, 'product_1364330897.jpg', '2014-08-31 06:58:18'),
(4, 'Ip Multimedia Phone', 50, 'product_1364331055.jpg', '2014-08-31 06:59:36'),
(6, 'Fixed Dome Ip Camera', 50, 'product_1364331121.jpg', '2014-05-11 14:41:09'),
(7, 'IP Analog Gateway', 400, 'product_1399949019.jpg', '2014-10-08 06:12:45'),
(8, 'Outdoor Cameras', 5000, 'product_1412350895.jpg', '2014-10-05 10:46:55'),
(9, 'Indoor Cameras', 5000, 'product_1412351310.jpg', '2014-10-05 10:51:06'),
(10, 'Home Theater System (Audio Video Receivers)', 5000, 'product_1412352157.jpg', '2014-10-08 06:11:44'),
(11, 'In Ceiling Speakers', 5000, 'product_1412352519.jpg', '2014-10-08 06:14:02'),
(12, 'In Wall Speaker', 5000, 'product_1412352918.jpg', '2014-10-08 06:12:19'),
(13, 'APC Inverter', 5000, 'product_1412353508.jpg', '2014-10-03 09:25:08'),
(14, 'Blue Gate Inverter', 5000, 'product_1412353533.jpg', '2014-10-03 09:25:33'),
(15, 'Smoke & Carbon monoxide detectors', 5000, 'product_1412353957.jpg', '2014-10-05 10:57:44'),
(16, 'Fire Detector', 5000, 'product_1412400665.jpg', '2014-10-05 10:45:25'),
(17, 'Solar Panel', 5000, 'product_1432551788.png', '2015-05-25 04:03:08'),
(18, 'IR Positioning System', 10000, 'product_1434558721.jpg', '2015-07-30 06:38:16'),
(19, 'Explosion Proof IP Camera', 10000, 'product_1434558815.jpg', '2015-07-30 06:38:04'),
(20, 'Explosion Proof & Night Vision IP Camera', 10000, 'product_1434558864.jpg', '2015-07-30 06:37:52'),
(21, 'Access Control', 10000, 'product_1434558924.jpg', '2015-07-30 06:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `slideshow_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(250) NOT NULL,
  `link_text` varchar(250) NOT NULL,
  `link_page` varchar(100) NOT NULL,
  `slideshow_pics` varchar(60) NOT NULL,
  `show_home` varchar(10) NOT NULL DEFAULT 'YES',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`slideshow_id`, `name`, `description`, `link_text`, `link_page`, `slideshow_pics`, `show_home`, `modified`) VALUES
(1, 'Consultancy Services', '<p>Project management consulting including project planning, execusion, monitoring and control and project closure.</p>', 'Learn More', 'expertise.php?page=1', 'slideshow_1364618440.jpg', 'YES', '2013-04-01 01:12:39'),
(2, 'Home Automation', '<p> Easily manage and control the devices in your home from a single device</p> ', 'Learn More', 'solutions.php?page=2', 'slideshow_1364618425.jpg', 'YES', '2013-04-01 01:07:58'),
(3, 'Home Cinema', '<p>Making your home fascinate everyone, including you. Enjoy you own customized home theatre.</p>', 'Learn More', 'expertise.php?page=1', 'slideshow_1364618410.jpg', 'YES', '2013-04-01 01:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE `solutions` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `content` text,
  `pics` varchar(150) DEFAULT NULL,
  `link` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL,
  `icons_id` int(11) NOT NULL DEFAULT '1',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solutions`
--

INSERT INTO `solutions` (`id`, `name`, `content`, `pics`, `link`, `priority`, `icons_id`, `modified`) VALUES
(1, 'Safety & Security', '<h2>Building Management Systems</h2><p>We present you with a wide array of scalable modular solutions integrated via a centralized control system into a control device of your choice; Mobile phone, Personal computer, laptop, remote control, Ipad and other touchscreen devises.<br />Our Building and Home automation solutions are classified into;</p>', NULL, 0, 1, 21, '2014-05-09 08:13:24'),
(2, 'Ambience & Lifestyle', '<h2>Infrastructural Solutions</h2><p>Property developers, individuals and organisations can benefit from our Infrastructural and recreational solutions.<br />These solutions are available for estates/gated communities, service apartments, schools and corporate buildings;</p>', NULL, 0, 2, 124, '2014-05-09 09:00:41'),
(3, 'Power & ICT', '<h2>Infrastructural Solutions</h2><p>Property developers, individuals and organisations can benefit from our Infrastructural and recreational solutions.<br />These solutions are available for estates/gated communities, service apartments, schools and corporate buildings;</p>', NULL, 0, 2, 124, '2014-05-09 09:00:41'),
(4, 'Gate Management System', '<p>Our remote controlled automated gating systems gives control to the users of large buildings and estates. It enhances the security of your premises and ensures that trespassers stay out! <br />Whether on foot or in a vehicle, the system keeps a log of everyone who enters or exits the premises. Residents can grant access to visitors, right from their homes by using the remote access systems.</p>', NULL, 1, 6, 1, '2014-05-09 09:00:18'),
(5, 'Estate Surveillance System', '<p>Enjoy enhanced safety with our strategically positioned intelligent cameras and video monitoring systems for 24 hour surveillance, even in the dark.</p>', NULL, 1, 5, 1, '2014-05-09 09:00:07'),
(6, 'Control, Ambience and Lifestyle', '<ol>\r\n                                <h4><li>Smart Lighting</li></h4>\r\n                                \r\n                                  <ul>\r\n                                    <li>Create different light scenarios to suit your mood and your environment.</li>\r\n                                    <li>Control the lights in your home from a single device or better still automate your lighting.</li>\r\n                                    <li>Low-voltage lights that help reduce energy consumption saving you money.</li>\r\n                                    <li>Presence Sensor-controlled lights that come on when someone is in the room and goes off when they leave. </li>\r\n                                  </ul>\r\n                                \r\n\r\n                                <h4><li>Audio Video Distribution</h4></li>\r\n                                  <ul>\r\n                                  <li>Whole house audio and video distribution via state of the art speakers and speaker network</li>\r\n                                  <li>Cable television installation and clear video storage and distribution to your television sets including outdoors.</li>\r\n                                  <li>Relish our digital music from any location in your home and office.</li>\r\n                                    \r\n                                  </ul>\r\n                                \r\n\r\n                                <h4><li>Home Theatre</li></h4>\r\n                                <p>\r\n                                  Experience true entertainment with our state-of-the-art home theatre solutions; acoustic sound treatment, razor sharp 3D imagery and motorized seating experience.\r\n                                </p>\r\n\r\n                                \r\n                                  <h4><li>Window treatment</li></h4>\r\n                                  Experience our automated blinds that are programed with the day and night effects.\r\n\r\n                               \r\n\r\n                                \r\n                                  <h4><li>Boardroom Automation </li></h4>\r\n                                  Integrate your conference room facilities and equipment to make your meetings even more seamless and focused.\r\n                               \r\n\r\n                                \r\n                                  <h4><li>Smart control systems</li></h4>\r\n                                  Easily manage and control the devices in your office or home from a single device with our smart control systems.\r\n                                \r\n                              </ol>', NULL, 2, 4, 1, '2014-05-09 08:19:22'),
(7, 'Safety and security Systems', '<ol>\n                                \n                                  <h4><li>IP Camera Surveillance</li></h4>\n                                  We all need to know what happens in our space even when we are not there. Now you can with our;\n                                  <ul>\n                                    <li>Infra-red cameras for both day and night surveillance</li>\n                                    <li>Access your surveillance system real time via your mobile device or laptop- home or away</li>\n                                  </ul>\n                                \n                                \n                                  <h4><li>Intrusion and fire alarm systems</li></h4>\n                                  <ul>\n                                    <li>Motion sensors</li>\n                                    <li>Panic alarms</li>\n                                    <li>Door and window intruder sensors</li>\n                                    <li>Smoke/heat detectors</li>\n                                    <li>Alarms- outdoor and indoor sirens</li>\n                                    <li>Security control keypads- control, activate and deactivate the system</li>\n                                  </ul>\n                                \n                                \n                                  <h4><li>Access control </li></h4>\n                                  Restrict entry into rooms and building with our access control solutions. You can manage entry time and attendance for staff, contractors and visitors.\n                                \n                                \n                                  <h4><li>Panic room set-up </li></h4>\n                                  Provide enhanced security at your residence and protect your family with a secure room. \n                                \n                              </ol>', NULL, 1, 3, 1, '2014-05-09 08:31:56'),
(8, 'ICT solutions &amp; Research', ' <ol>\r\n                                <li>Database / Web technologies and Research for your web related requirements</li>\r\n                                <li>IP Data networking both wired and wireless. Secure structured cabled networks.</li>\r\n                                <li>IP Telephony systems unique connectivity with video calls option</li>\r\n                              </ol>', NULL, 3, 2, 1, '2014-05-09 08:22:02'),
(9, 'Power / Energy Management', '<p>Experience uninterrupted power supply while protecting your equipment, a welcome addition to your everyday life that gives you peace of mind.</p>\r\n<p>You can also save a lot of money stipulated for power generation. Our automated systems are remote controlled which increases your accessibility and control and reduces the risks and money spent on man-power.</p>', NULL, 3, 1, 1, '2014-05-09 08:22:49'),
(10, 'Intra-communication Systems', '<p>We provide integrated IP (Internet Protocol) telephony system &ndash;both video and audio - that connects the homes, offices, service building and gates in your estates and office complexes. We also provide broadband internet connectivity via fibre optic and paired cable network for the buildings, apartments and offices. This increases the convenience, access and control of residents/occupants.</p>', NULL, 1, 4, 1, '2014-05-09 08:59:46'),
(11, 'Outdoor/Recreational solutions', '<p>We provide weather-proof Televisions and audio speakers, projectors and screens, public address systems plus swimming pool ambient lighting controls that are perfectly suited for all your events and recreational activities.</p>', NULL, 2, 3, 1, '2014-05-09 08:59:37'),
(12, 'Electric Fences', '<p>Secure your perimeter fence today with our powered electric fence and intruder detection system.</p>', NULL, 1, 2, 1, '2014-05-09 08:58:28'),
(13, 'Cable Television distribution', '<p>Our team of networkers and system engineers install and distribute cable TV connectivity to several homes.</p>', NULL, 2, 1, 1, '2014-05-09 08:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `solutions2`
--

CREATE TABLE `solutions2` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `content` text,
  `pics` varchar(150) DEFAULT NULL,
  `link` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL,
  `icons_id` int(11) NOT NULL DEFAULT '1',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `solutions2`
--

INSERT INTO `solutions2` (`id`, `name`, `content`, `pics`, `link`, `priority`, `icons_id`, `modified`) VALUES
(1, 'Building Management Systems', '<p>We present you with a wide array of scalable modular solutions integrated via a centralized control system into a control device of your choice; Mobile phone, Personal computer, laptop, remote control, Ipad and other touchscreen devises.<br />Our Building and Home automation solutions are classified into;</p>', NULL, 0, 1, 21, '2014-05-09 09:13:24'),
(2, 'Infrastructural Solutions', '<p>Property developers, individuals and organisations can benefit from our Infrastructural and recreational solutions.<br />These solutions are available for estates/gated communities, service apartments, schools and corporate buildings;</p>', NULL, 0, 2, 124, '2014-05-09 10:00:41'),
(3, 'Gate Management System', '<p>Our remote controlled automated gating systems gives control to the users of large buildings and estates. It enhances the security of your premises and ensures that trespassers stay out! <br />Whether on foot or in a vehicle, the system keeps a log of everyone who enters or exits the premises. Residents can grant access to visitors, right from their homes by using the remote access systems.</p>', NULL, 2, 6, 1, '2014-05-09 10:00:18'),
(4, 'Estate Surveillance System', '<p>Enjoy enhanced safety with our strategically positioned intelligent cameras and video monitoring systems for 24 hour surveillance, even in the dark.</p>', NULL, 2, 5, 1, '2014-05-09 10:00:07'),
(5, 'A. Control, Ambience and Lifestyle', '<ol>\r\n                                <h4><li>Smart Lighting</li></h4>\r\n                                \r\n                                  <ul>\r\n                                    <li>Create different light scenarios to suit your mood and your environment.</li>\r\n                                    <li>Control the lights in your home from a single device or better still automate your lighting.</li>\r\n                                    <li>Low-voltage lights that help reduce energy consumption saving you money.</li>\r\n                                    <li>Presence Sensor-controlled lights that come on when someone is in the room and goes off when they leave. </li>\r\n                                  </ul>\r\n                                \r\n\r\n                                <h4><li>Audio Video Distribution</h4></li>\r\n                                  <ul>\r\n                                  <li>Whole house audio and video distribution via state of the art speakers and speaker network</li>\r\n                                  <li>Cable television installation and clear video storage and distribution to your television sets including outdoors.</li>\r\n                                  <li>Relish our digital music from any location in your home and office.</li>\r\n                                    \r\n                                  </ul>\r\n                                \r\n\r\n                                <h4><li>Home Theatre</li></h4>\r\n                                <p>\r\n                                  Experience true entertainment with our state-of-the-art home theatre solutions; acoustic sound treatment, razor sharp 3D imagery and motorized seating experience.\r\n                                </p>\r\n\r\n                                \r\n                                  <h4><li>Window treatment</li></h4>\r\n                                  Experience our automated blinds that are programed with the day and night effects.\r\n\r\n                               \r\n\r\n                                \r\n                                  <h4><li>Boardroom Automation </li></h4>\r\n                                  Integrate your conference room facilities and equipment to make your meetings even more seamless and focused.\r\n                               \r\n\r\n                                \r\n                                  <h4><li>Smart control systems</li></h4>\r\n                                  Easily manage and control the devices in your office or home from a single device with our smart control systems.\r\n                                \r\n                              </ol>', NULL, 1, 4, 1, '2014-05-09 09:19:22'),
(6, 'B. Safety and security Systems', '<ol>\r\n                                \r\n                                  <h4><li>IP Camera Surveillance</li></h4>\r\n                                  We all need to know what happens in our space even when we are not there. Now you can with our;\r\n                                  <ul>\r\n                                    <li>Infra-red cameras for both day and night surveillance</li>\r\n                                    <li>Access your surveillance system real time via your mobile device or laptop- home or away</li>\r\n                                  </ul>\r\n                                \r\n                                \r\n                                  <h4><li>Intrusion and fire alarm systems</li></h4>\r\n                                  <ul>\r\n                                    <li>Motion sensors</li>\r\n                                    <li>Panic alarms</li>\r\n                                    <li>Door and window intruder sensors</li>\r\n                                    <li>Smoke/heat detectors</li>\r\n                                    <li>Alarms- outdoor and indoor sirens</li>\r\n                                    <li>Security control keypads- control, activate and deactivate the system</li>\r\n                                  </ul>\r\n                                \r\n                                \r\n                                  <h4><li>Access control </li></h4>\r\n                                  Restrict entry into rooms and building with our access control solutions. You can manage entry time and attendance for staff, contractors and visitors.\r\n                                \r\n                                \r\n                                  <h4><li>Panic room set-up </li></h4>\r\n                                  Provide enhanced security at your residence and protect your family with a secure room. \r\n                                \r\n                              </ol>', NULL, 1, 3, 1, '2014-05-09 09:31:56'),
(12, 'C. ICT solutions &amp; Research', ' <ol>\r\n                                <li>Database / Web technologies and Research for your web related requirements</li>\r\n                                <li>IP Data networking both wired and wireless. Secure structured cabled networks.</li>\r\n                                <li>IP Telephony systems unique connectivity with video calls option</li>\r\n                              </ol>', NULL, 1, 2, 1, '2014-05-09 09:22:02'),
(13, 'D. Power / Energy Management', '<p>Experience uninterrupted power supply while protecting your equipment, a welcome addition to your everyday life that gives you peace of mind.</p>\r\n<p>You can also save a lot of money stipulated for power generation. Our automated systems are remote controlled which increases your accessibility and control and reduces the risks and money spent on man-power.</p>', NULL, 1, 1, 1, '2014-05-09 09:22:49'),
(14, 'Intra-communication Systems', '<p>We provide integrated IP (Internet Protocol) telephony system &ndash;both video and audio - that connects the homes, offices, service building and gates in your estates and office complexes. We also provide broadband internet connectivity via fibre optic and paired cable network for the buildings, apartments and offices. This increases the convenience, access and control of residents/occupants.</p>', NULL, 2, 4, 1, '2014-05-09 09:59:46'),
(15, 'Outdoor/Recreational solutions', '<p>We provide weather-proof Televisions and audio speakers, projectors and screens, public address systems plus swimming pool ambient lighting controls that are perfectly suited for all your events and recreational activities.</p>', NULL, 2, 3, 1, '2014-05-09 09:59:37'),
(16, 'Electric Fences', '<p>Secure your perimeter fence today with our powered electric fence and intruder detection system.</p>', NULL, 2, 2, 1, '2014-05-09 09:58:28'),
(17, 'Cable Television distribution', '<p>Our team of networkers and system engineers install and distribute cable TV connectivity to several homes.</p>', NULL, 2, 1, 1, '2014-05-09 09:57:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catproduct`
--
ALTER TABLE `catproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `email` (`email`,`password`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edit`
--
ALTER TABLE `edit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`slideshow_id`);

--
-- Indexes for table `solutions`
--
ALTER TABLE `solutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solutions2`
--
ALTER TABLE `solutions2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catproduct`
--
ALTER TABLE `catproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `edit`
--
ALTER TABLE `edit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `slideshow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `solutions`
--
ALTER TABLE `solutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `solutions2`
--
ALTER TABLE `solutions2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
