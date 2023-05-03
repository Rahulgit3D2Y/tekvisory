-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 10:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techwizard`
--

-- --------------------------------------------------------

--
-- Table structure for table `advancesetting`
--

CREATE TABLE `advancesetting` (
  `popupid` int(11) NOT NULL,
  `popupname` varchar(100) NOT NULL,
  `popupstatus` varchar(10) NOT NULL,
  `popup_status` varchar(10) NOT NULL,
  `popupcreated` varchar(10) NOT NULL,
  `popupcreateddatetime` varchar(30) NOT NULL,
  `popupupdateby` varchar(10) NOT NULL,
  `popupupdatedatetime` varchar(30) NOT NULL,
  `popdisableby` varchar(10) NOT NULL,
  `popdisabletime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advancesetting`
--

INSERT INTO `advancesetting` (`popupid`, `popupname`, `popupstatus`, `popup_status`, `popupcreated`, `popupcreateddatetime`, `popupupdateby`, `popupupdatedatetime`, `popdisableby`, `popdisabletime`) VALUES
(1, 'student message', 'InActive', 'InActive', '1', '24-04-2022 12:12:38pm', '1', '22-05-2022 07:01:56pm', '1', '22-05-2022 07:02:00pm'),
(2, 'admin message', 'InActive', 'InActive', '1', '24-04-2022 12:12:38pm', '1', '24-04-2022 03:09:33pm', '1', '24-04-2022 03:12:10pm'),
(3, 'captcha', 'InActive', 'Active', '1', '24-04-2022 12:48:07pm', '1', '10-09-2022 08:41:38pm', '1', '20-09-2022 01:14:39pm'),
(4, 'balance fee reminder', 'InActive', 'InActive', '1', '24-04-2022 02:17:10pm', '1', '15-05-2022 03:28:53pm', '1', '03-06-2022 12:46:58am'),
(5, 'Birthday message', 'Active', 'Active', '1', '24-04-2022 02:17:58pm', '1', '01-05-2022 06:00:28pm', '1', '29-04-2022 10:12:45pm'),
(6, 'student pending document upload', 'InActive', 'InActive', '1', '24-04-2022 02:18:37pm', '1', '18-05-2022 06:48:27pm', '1', '03-06-2022 12:47:08am'),
(7, 'photo upload', 'Active', 'Active', '1', '03-09-2022 08:04:33pm', '1', '03-09-2022 08:04:38pm', '', ''),
(8, 'Volunteers Registration', 'Active', 'Active', '1', '14-11-2022 10:55:02am', '1', '06-12-2022 01:27:37pm', '1', '06-12-2022 01:24:51pm'),
(9, 'Registration', 'Active', 'Active', '1', '06-12-2022 01:28:48pm', '1', '06-12-2022 01:31:23pm', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `campus_id` int(10) NOT NULL,
  `campus_name` varchar(100) NOT NULL,
  `campus_acroym` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdby` varchar(10) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(10) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(10) NOT NULL,
  `disabletime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`campus_id`, `campus_name`, `campus_acroym`, `status`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`) VALUES
(1, 'Graphic Era (Demeed To Be University)', 'GEU', 'Active', '1', '', '', '', '', ''),
(2, 'Graphic Era Hill University-Dehradun', 'GEHU-DDN', 'Active', '', '', '', '', '', ''),
(3, 'Graphic Era Hill University-Bhimtal', 'GEHU-BTL', 'Active', '', '', '', '', '', ''),
(4, 'Graphic Era Hill University-Haldwani', 'GEHU-HLD', 'Active', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `campuspermission`
--

CREATE TABLE `campuspermission` (
  `campusp_id` int(20) NOT NULL,
  `permissioncampus_id` varchar(20) NOT NULL,
  `permissionuser_id` varchar(20) NOT NULL,
  `campuspermission_status` varchar(20) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `createdtime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campuspermission`
--

INSERT INTO `campuspermission` (`campusp_id`, `permissioncampus_id`, `permissionuser_id`, `campuspermission_status`, `createdby`, `createdtime`) VALUES
(1, '1', '1', 'True', '1', '19-11-2022 05:24:46am'),
(2, '2', '1', 'True', '1', '19-11-2022 05:24:46am'),
(3, '3', '1', 'True', '1', '19-11-2022 05:24:46am'),
(4, '4', '1', 'True', '1', '19-11-2022 05:24:46am'),
(6, '3', '49', 'True', '1', '22-11-2022 11:14:01am');

-- --------------------------------------------------------

--
-- Table structure for table `course_detail`
--

CREATE TABLE `course_detail` (
  `course_id` int(11) NOT NULL,
  `course_id2` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_duration` varchar(50) NOT NULL,
  `course_acroym` varchar(50) NOT NULL,
  `school_id` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `activereason` varchar(100) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(30) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(30) NOT NULL,
  `disabletime` varchar(30) NOT NULL,
  `activeby` varchar(30) NOT NULL,
  `activetime` varchar(30) NOT NULL,
  `course_type` varchar(20) NOT NULL,
  `department_id` varchar(10) NOT NULL,
  `course_type2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_detail`
--

INSERT INTO `course_detail` (`course_id`, `course_id2`, `course_name`, `course_duration`, `course_acroym`, `school_id`, `status`, `disablereason`, `activereason`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`, `activeby`, `activetime`, `course_type`, `department_id`, `course_type2`) VALUES
(1, 211, 'B.SC (HONS.) Computer Science\n', '3', 'B.sc (CS)', '1', 'Active', '', '', '1', '16-05-2022 03:54:04pm', '1', '16-05-2022 04:24:19pm', '', '', '', '', 'Yearly', '1', 'UG'),
(2, 221, 'B.SC -INFORMATION TECHNOLOGY\n', '3', 'B.sc (IT)', '1', 'Active', '', '', '1', '18-05-2022 07:27:16pm', '', '', '', '', '', '', 'Yearly', '1', 'UG'),
(3, 245, 'BACHELOR OF COMPUTER APPLICATION\n', '3', 'BCA', '1', 'Active', '', '', '1', '19-05-2022 12:38:15am', '', '', '', '', '', '', 'Yearly', '1', 'UG'),
(4, 185, 'Master of Computer Application', '2', 'MCA', '1', 'Active', '', '', '1', '19-05-2022 12:38:15am', '', '', '', '', '', '', 'Yearly', '1', 'PG'),
(5, 189, 'MASTER OF SCIENCE - Information Technology', '2', 'M.sc (IT)', '1', 'Active', '', '', '1', '19-05-2022 12:38:15am', '', '', '', '', '', '', 'Yearly', '1', 'PG'),
(6, 123, 'B.Tech', '4', 'B.Tech', '1', 'Active', '', '', '1', '17-11-2022 04:02:26pm', '', '', '', '', '', '', 'Yearly', '1', 'UG'),
(7, 122, 'M sc Data Science', '1', 'M. Sc Data Science', '1', 'Active', '', '', '1', '18-11-2022 06:04:23pm', '', '', '', '', '', '', 'Yearly', '2', 'PG');

-- --------------------------------------------------------

--
-- Table structure for table `course_fee`
--

CREATE TABLE `course_fee` (
  `fee_id` int(11) NOT NULL,
  `session` varchar(20) NOT NULL,
  `course_id` varchar(15) NOT NULL,
  `course_fee` varchar(15) NOT NULL,
  `farewell_date` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `activereason` varchar(100) NOT NULL,
  `createdby` varchar(30) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(30) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(30) NOT NULL,
  `disabletime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_fee`
--

INSERT INTO `course_fee` (`fee_id`, `session`, `course_id`, `course_fee`, `farewell_date`, `status`, `disablereason`, `activereason`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`) VALUES
(1, '2022-2023', '', '500', '2022-10-23', 'Active', '', '', '1', '06-09-2022 01:44:53pm', '1', '17-10-2022 09:49:05am', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(20) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `school_id` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `activereason` varchar(100) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(20) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(20) NOT NULL,
  `disabletime` varchar(30) NOT NULL,
  `activeby` varchar(20) NOT NULL,
  `activetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `school_id`, `status`, `disablereason`, `activereason`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`, `activeby`, `activetime`) VALUES
(1, 'Department Of Computer Application', '1', 'Active', '', '', '1', '12-08-2022 09:33:02pm', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `logindetail`
--

CREATE TABLE `logindetail` (
  `id` int(11) NOT NULL,
  `logintype` varchar(10) NOT NULL,
  `loginid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `loginattempt` varchar(10) NOT NULL,
  `ipaddress` varchar(30) NOT NULL,
  `session_key` varchar(50) NOT NULL,
  `login_datetime` varchar(30) NOT NULL,
  `logout_datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logindetail`
--

INSERT INTO `logindetail` (`id`, `logintype`, `loginid`, `password`, `loginattempt`, `ipaddress`, `session_key`, `login_datetime`, `logout_datetime`) VALUES
(1, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'c4oc18ga0d5r58mhcejkqqovfd', '2022-10-17 09:35:35am', ''),
(2, 'admin', 'dineshdobhal', 'admin@2000', 'Success', '::1', 'bh3220l54tnhp8omf5n7u0ee0k', '2022-10-17 09:48:19am', ''),
(3, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'pl9tv7hjqgvf1ooh5ffco03drl', '2022-10-18 07:24:27pm', ''),
(4, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'akt9rlc5po169i7m6d5d367sm3', '2022-10-28 10:08:41am', ''),
(5, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'tmikoemp6jlfrj1h75k4vur59o', '2022-10-28 10:31:48am', '2022-10-28 10:31:58am'),
(6, 'admin', 'dineshdobhal', 'admin@2000', 'Success', '::1', 'tmikoemp6jlfrj1h75k4vur59o', '2022-10-28 10:32:21am', '2022-10-28 10:36:41am'),
(7, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'h1dh32vr0kssnuc0k7fst1rlai', '2022-11-01 11:19:35am', ''),
(8, 'admin', 'superuser', 'admin@2000', 'Success', '::1', '7sq4encmbm693krmn5fcti8psq', '2022-11-11 09:08:02pm', ''),
(9, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'f0r4kcq480ppfiigm0h219k674', '2022-11-11 11:34:18pm', ''),
(10, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'pt5iqv0gh9631a9tdvv3gqjoc1', '2022-11-14 10:53:20am', ''),
(11, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'pt5iqv0gh9631a9tdvv3gqjoc1', '2022-11-14 02:31:53pm', '2022-11-14 03:12:34pm'),
(12, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'pt5iqv0gh9631a9tdvv3gqjoc1', '2022-11-14 09:45:48pm', ''),
(13, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'ik66vg7dhl2av2ohg2kl52d1e6', '2022-11-17 04:02:13pm', ''),
(14, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'ik66vg7dhl2av2ohg2kl52d1e6', '2022-11-18 10:12:28am', ''),
(15, 'admin', 'U228767002', 'admin@2000', 'Success', '::1', '9m2tpt8vlfosasvotvgs4uodtj', '2022-11-19 04:50:02am', ''),
(16, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'h3t1fdluir2s9ueodpf3cepl98', '2022-11-20 02:29:06pm', ''),
(17, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'h0qagprdhtphv5epit8q559d17', '2022-11-22 11:11:57am', ''),
(18, 'admin', 'U228767002', 'admin@2000', 'Success', '::1', '2aclnj4jqrpiihobh7ea0efd1p', '2022-11-22 11:14:26am', ''),
(19, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'h0qagprdhtphv5epit8q559d17', '2022-11-23 05:09:37am', ''),
(20, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'h0qagprdhtphv5epit8q559d17', '2022-11-25 12:08:06pm', ''),
(21, 'admin', 'superuser', 'admin@2000', 'Success', '::1', '8ki8qe5vm8c4cfvdpc971nps10', '2022-11-25 06:11:26pm', ''),
(22, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'h0qagprdhtphv5epit8q559d17', '2022-11-26 09:19:17am', ''),
(23, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'h0qagprdhtphv5epit8q559d17', '2022-11-26 09:20:36pm', ''),
(24, 'admin', 'superuser', 'admin@2000', 'Success', '::1', 'og1fe6ete1uhao9771j23b5ed5', '2022-12-01 09:35:01pm', ''),
(25, 'admin', 'superuser', 'admin@2000', 'Success', '::1', '4q260dotcj92ajg0bd1rjo2jgf', '2022-12-06 01:24:31pm', ''),
(26, 'admin', 'superuser', 'admin@2000', 'Success', '::1', '6npgmhp4t5uisvr9th3k5fiigk', '2022-12-12 10:30:41am', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(20) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `menu_icon` varchar(30) NOT NULL,
  `menu_order` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `activereason` varchar(100) NOT NULL,
  `createdby` varchar(30) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(30) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(30) NOT NULL,
  `disabletime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_icon`, `menu_order`, `status`, `disablereason`, `activereason`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`) VALUES
(1, 'Course', 'fas fa-columns', '1', 'Active', '', '', '1', '11-08-2022 08:28:23pm', '', '', '', ''),
(4, 'Student Record', 'fas fa-user-alt', '4', 'Active', '', '', '1', '12-08-2022 02:20:40pm', '', '', '', ''),
(5, 'Setting', 'fas fa-cog', '5', 'Active', '', '', '1', '12-08-2022 02:21:04pm', '', '', '', ''),
(6, 'Permission', 'fas fa-users-cog', '6', 'Active', '', '', '1', '12-08-2022 02:21:19pm', '', '', '', ''),
(7, 'Registration Report', 'fas fa-user-alt', '2', 'Active', '', '', '1', '18-11-2022 10:12:57am', '1', '20-11-2022 04:41:38pm', '', ''),
(8, 'Student', 'fas fa-user-alt', '3', 'Active', '', '', '1', '20-11-2022 02:34:56pm', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `modulepermission`
--

CREATE TABLE `modulepermission` (
  `modulepermission_id` int(20) NOT NULL,
  `modulemenu_id` varchar(20) NOT NULL,
  `modulesubmenu_id` varchar(20) NOT NULL,
  `moduleuser_id` varchar(20) NOT NULL,
  `modulepermission` varchar(10) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `createdtime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modulepermission`
--

INSERT INTO `modulepermission` (`modulepermission_id`, `modulemenu_id`, `modulesubmenu_id`, `moduleuser_id`, `modulepermission`, `createdby`, `createdtime`) VALUES
(1, '1', '1', '1', 'Yes', '', ''),
(2, '1', '1', '9', 'Yes', '', ''),
(3, '1', '2', '1', 'Yes', '', ''),
(4, '1', '2', '9', 'Yes', '', ''),
(5, '1', '3', '1', 'Yes', '', ''),
(6, '1', '3', '9', 'Yes', '', ''),
(7, '1', '4', '1', 'Yes', '', ''),
(8, '1', '4', '9', 'Yes', '', ''),
(9, '1', '5', '1', 'Yes', '', ''),
(10, '1', '5', '9', 'Yes', '', ''),
(11, '1', '6', '1', 'Yes', '', ''),
(12, '1', '6', '9', 'Yes', '', ''),
(13, '1', '7', '1', 'Yes', '', ''),
(14, '1', '7', '9', 'Yes', '', ''),
(15, '2', '8', '1', 'Yes', '', ''),
(16, '2', '8', '9', 'Yes', '', ''),
(17, '2', '9', '1', 'Yes', '', ''),
(18, '2', '9', '9', 'Yes', '', ''),
(19, '3', '10', '1', 'Yes', '', ''),
(20, '3', '10', '9', 'Yes', '', ''),
(21, '3', '11', '1', 'Yes', '', ''),
(22, '3', '11', '9', 'Yes', '', ''),
(23, '3', '12', '1', 'Yes', '', ''),
(24, '3', '12', '9', 'Yes', '', ''),
(25, '3', '13', '1', 'Yes', '', ''),
(26, '3', '13', '9', 'Yes', '', ''),
(27, '3', '14', '1', 'Yes', '', ''),
(28, '3', '14', '9', 'Yes', '', ''),
(29, '3', '15', '1', 'Yes', '', ''),
(30, '3', '15', '9', 'Yes', '', ''),
(31, '3', '16', '1', 'Yes', '', ''),
(32, '3', '16', '9', 'Yes', '', ''),
(33, '4', '17', '1', 'Yes', '', ''),
(34, '4', '17', '9', 'Yes', '', ''),
(35, '4', '18', '1', 'Yes', '', ''),
(36, '4', '18', '9', 'Yes', '', ''),
(37, '4', '19', '1', 'Yes', '', ''),
(38, '4', '19', '9', 'Yes', '', ''),
(39, '4', '20', '1', 'Yes', '', ''),
(40, '4', '20', '9', 'Yes', '', ''),
(41, '4', '21', '1', 'Yes', '', ''),
(42, '4', '21', '9', 'Yes', '', ''),
(43, '4', '22', '1', 'Yes', '', ''),
(44, '4', '22', '9', 'Yes', '', ''),
(45, '5', '23', '1', 'Yes', '', ''),
(46, '5', '23', '9', 'Yes', '', ''),
(47, '5', '24', '1', 'Yes', '', ''),
(48, '5', '24', '9', 'Yes', '', ''),
(49, '5', '25', '1', 'Yes', '', ''),
(50, '5', '25', '9', 'Yes', '', ''),
(51, '5', '26', '1', 'Yes', '', ''),
(52, '5', '26', '9', 'Yes', '', ''),
(53, '5', '27', '1', 'Yes', '', ''),
(54, '5', '27', '9', 'Yes', '', ''),
(55, '5', '28', '1', 'Yes', '', ''),
(56, '5', '28', '9', 'Yes', '', ''),
(57, '5', '29', '1', 'Yes', '', ''),
(58, '5', '29', '9', 'Yes', '', ''),
(59, '6', '30', '1', 'Yes', '', ''),
(60, '6', '30', '9', 'Yes', '', ''),
(61, '6', '31', '1', 'Yes', '', ''),
(62, '6', '31', '9', 'Yes', '', ''),
(63, '6', '32', '1', 'Yes', '', ''),
(64, '6', '32', '9', 'Yes', '', ''),
(65, '6', '33', '1', 'Yes', '', ''),
(66, '6', '33', '9', 'Yes', '', ''),
(67, '6', '34', '1', 'Yes', '', ''),
(68, '6', '34', '9', 'Yes', '', ''),
(69, '6', '35', '1', 'Yes', '', ''),
(70, '6', '35', '9', 'Yes', '', ''),
(71, '6', '36', '1', 'Yes', '', ''),
(72, '6', '36', '9', 'Yes', '', ''),
(73, '6', '37', '1', 'Yes', '', ''),
(74, '6', '37', '9', 'Yes', '', ''),
(75, '6', '38', '1', 'Yes', '', ''),
(76, '6', '38', '9', 'Yes', '', ''),
(77, '6', '39', '1', 'Yes', '', ''),
(78, '6', '39', '9', 'Yes', '', ''),
(79, '6', '40', '1', 'Yes', '', ''),
(80, '6', '40', '9', 'Yes', '', ''),
(108, '6', '41', '1', 'Yes', '', ''),
(109, '6', '41', '9', 'Yes', '', ''),
(112, '2', '42', '1', 'Yes', '', ''),
(113, '2', '42', '9', 'Yes', '', ''),
(260, '3', '15', '36', 'No', '1', '18-09-2022 03:48:05pm'),
(261, '4', '17', '36', 'No', '1', '18-09-2022 03:48:05pm'),
(262, '4', '18', '36', 'No', '1', '18-09-2022 03:48:05pm'),
(263, '3', '15', '37', 'No', '1', '18-09-2022 03:48:05pm'),
(264, '4', '17', '37', 'No', '1', '18-09-2022 03:48:05pm'),
(265, '4', '18', '37', 'No', '1', '18-09-2022 03:48:05pm'),
(266, '3', '15', '38', 'No', '1', '18-09-2022 03:48:05pm'),
(267, '4', '17', '38', 'No', '1', '18-09-2022 03:48:05pm'),
(268, '4', '18', '38', 'No', '1', '18-09-2022 03:48:05pm'),
(269, '3', '15', '39', 'No', '1', '18-09-2022 03:48:05pm'),
(270, '4', '17', '39', 'No', '1', '18-09-2022 03:48:05pm'),
(271, '4', '18', '39', 'No', '1', '18-09-2022 03:48:05pm'),
(272, '3', '15', '40', 'No', '1', '18-09-2022 03:48:05pm'),
(273, '4', '17', '40', 'No', '1', '18-09-2022 03:48:05pm'),
(274, '4', '18', '40', 'No', '1', '18-09-2022 03:48:05pm'),
(275, '3', '15', '41', 'No', '1', '18-09-2022 03:48:05pm'),
(276, '4', '17', '41', 'No', '1', '18-09-2022 03:48:05pm'),
(277, '4', '18', '41', 'No', '1', '18-09-2022 03:48:05pm'),
(278, '3', '15', '43', 'No', '1', '18-09-2022 03:48:05pm'),
(279, '4', '17', '43', 'No', '1', '18-09-2022 03:48:05pm'),
(280, '4', '18', '43', 'No', '1', '18-09-2022 03:48:05pm'),
(281, '3', '15', '44', 'No', '1', '18-09-2022 03:48:05pm'),
(282, '4', '17', '44', 'No', '1', '18-09-2022 03:48:05pm'),
(283, '4', '18', '44', 'No', '1', '18-09-2022 03:48:05pm'),
(284, '3', '15', '45', 'No', '1', '18-09-2022 03:48:05pm'),
(285, '4', '17', '45', 'No', '1', '18-09-2022 03:48:05pm'),
(286, '4', '18', '45', 'No', '1', '18-09-2022 03:48:05pm'),
(287, '3', '43', '1', 'Yes', '', ''),
(288, '3', '43', '9', 'Yes', '', ''),
(293, '3', '44', '1', 'Yes', '', ''),
(294, '3', '44', '9', 'Yes', '', ''),
(295, '3', '43', '46', 'No', '1', '29-09-2022 03:35:29pm'),
(296, '3', '15', '46', 'No', '1', '29-09-2022 03:35:29pm'),
(297, '4', '17', '46', 'No', '1', '29-09-2022 03:35:29pm'),
(298, '4', '18', '46', 'No', '1', '29-09-2022 03:35:29pm'),
(299, '3', '45', '1', 'Yes', '', ''),
(300, '3', '45', '9', 'Yes', '', ''),
(346, '1', '1', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(347, '1', '2', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(348, '1', '3', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(349, '1', '4', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(350, '1', '5', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(351, '1', '6', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(352, '1', '7', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(353, '2', '42', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(354, '2', '8', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(355, '2', '9', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(356, '3', '10', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(357, '3', '11', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(358, '3', '12', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(359, '3', '13', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(360, '3', '14', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(361, '3', '15', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(362, '3', '43', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(363, '3', '44', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(364, '3', '16', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(365, '3', '45', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(366, '4', '17', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(367, '4', '18', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(368, '4', '19', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(369, '4', '20', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(370, '4', '21', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(371, '4', '22', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(372, '5', '23', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(373, '5', '24', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(374, '5', '25', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(375, '5', '26', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(376, '5', '27', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(377, '5', '28', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(378, '5', '29', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(379, '6', '30', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(380, '6', '31', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(381, '6', '32', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(382, '6', '33', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(383, '6', '34', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(384, '6', '35', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(385, '6', '36', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(386, '6', '41', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(387, '6', '37', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(388, '6', '40', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(389, '6', '39', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(390, '6', '38', '35', 'Yes', '1', '28-10-2022 10:35:47am'),
(391, '4', '46', '1', 'Yes', '', ''),
(392, '4', '46', '9', 'Yes', '', ''),
(393, '4', '47', '1', 'Yes', '', ''),
(394, '4', '47', '9', 'Yes', '', ''),
(395, '7', '48', '1', 'Yes', '', ''),
(396, '7', '48', '9', 'Yes', '', ''),
(397, '7', '49', '1', 'Yes', '', ''),
(398, '7', '49', '9', 'Yes', '', ''),
(399, '7', '50', '1', 'Yes', '', ''),
(400, '7', '50', '9', 'Yes', '', ''),
(401, '7', '51', '1', 'Yes', '', ''),
(402, '7', '51', '9', 'Yes', '', ''),
(404, '6', '52', '1', 'Yes', '', ''),
(405, '6', '52', '9', 'Yes', '', ''),
(406, '8', '53', '1', 'Yes', '', ''),
(407, '8', '53', '9', 'Yes', '', ''),
(408, '8', '54', '1', 'Yes', '', ''),
(409, '8', '54', '9', 'Yes', '', ''),
(410, '7', '55', '1', 'Yes', '', ''),
(411, '7', '55', '9', 'Yes', '', ''),
(412, '7', '56', '1', 'Yes', '', ''),
(413, '7', '56', '9', 'Yes', '', ''),
(414, '7', '51', '49', 'Yes', '1', '22-11-2022 11:15:08am'),
(415, '7', '56', '49', 'Yes', '1', '22-11-2022 11:15:08am'),
(416, '7', '57', '1', 'Yes', '', ''),
(417, '7', '57', '9', 'Yes', '', ''),
(418, '8', '58', '1', 'Yes', '', ''),
(419, '8', '58', '9', 'Yes', '', ''),
(420, '8', '59', '1', 'Yes', '', ''),
(421, '8', '59', '9', 'Yes', '', ''),
(422, '7', '60', '1', 'Yes', '', ''),
(423, '7', '60', '9', 'Yes', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_subjectpermission`
--

CREATE TABLE `mst_subjectpermission` (
  `permission_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `subjectpermission` varchar(100) NOT NULL,
  `addby` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_subjectpermission`
--

INSERT INTO `mst_subjectpermission` (`permission_id`, `c_id`, `sub_id`, `id`, `subjectpermission`, `addby`, `created`) VALUES
(1, 211, 0, 1, 'True', '1', '19-11-2022 05:25:58am'),
(2, 221, 0, 1, 'True', '1', '19-11-2022 05:25:58am'),
(3, 245, 0, 1, 'True', '1', '19-11-2022 05:25:58am'),
(4, 185, 0, 1, 'True', '1', '19-11-2022 05:25:58am'),
(5, 189, 0, 1, 'True', '1', '19-11-2022 05:25:58am'),
(6, 123, 0, 1, 'True', '1', '19-11-2022 05:25:58am'),
(7, 122, 0, 1, 'True', '1', '19-11-2022 05:25:58am'),
(8, 211, 0, 49, 'True', '1', '19-11-2022 05:34:58am'),
(9, 221, 0, 49, 'True', '1', '19-11-2022 05:34:58am'),
(10, 245, 0, 49, 'True', '1', '19-11-2022 05:34:58am'),
(11, 185, 0, 49, 'True', '1', '19-11-2022 05:34:58am'),
(12, 189, 0, 49, 'True', '1', '19-11-2022 05:34:58am');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `payment_id` int(20) NOT NULL,
  `receipt_number` varchar(30) NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `student_campus` varchar(10) NOT NULL,
  `student_course` varchar(10) NOT NULL,
  `student_specilization` varchar(50) NOT NULL,
  `student_semester` varchar(10) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_number` varchar(15) NOT NULL,
  `student_whatsappnumber` varchar(15) NOT NULL,
  `student_dob` varchar(20) NOT NULL,
  `paid_amount` varchar(10) NOT NULL,
  `paid_date` varchar(10) NOT NULL,
  `cpaid_date` varchar(30) NOT NULL,
  `paid_mode` varchar(10) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `fee_status` varchar(10) NOT NULL,
  `student_status` varchar(50) NOT NULL,
  `session` varchar(10) NOT NULL,
  `createdby` varchar(30) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(30) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `feeupdatetime` varchar(40) NOT NULL,
  `feeupdateby` varchar(30) NOT NULL,
  `feeupdatedatetime` varchar(30) NOT NULL,
  `certificate_name` varchar(100) NOT NULL,
  `certificate_date` varchar(20) NOT NULL,
  `certificate_time` varchar(20) NOT NULL,
  `certificate_datetime` varchar(30) NOT NULL,
  `certificate_download` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`payment_id`, `receipt_number`, `student_id`, `student_name`, `student_gender`, `student_campus`, `student_course`, `student_specilization`, `student_semester`, `student_email`, `student_number`, `student_whatsappnumber`, `student_dob`, `paid_amount`, `paid_date`, `cpaid_date`, `paid_mode`, `order_id`, `fee_status`, `student_status`, `session`, `createdby`, `createdtime`, `updateby`, `updatetime`, `feeupdatetime`, `feeupdateby`, `feeupdatedatetime`, `certificate_name`, `certificate_date`, `certificate_time`, `certificate_datetime`, `certificate_download`) VALUES
(1, '22876700001', '234234', 'Darius Fowler', 'Male', '2', '211', '', '3', 'sojewemu@mailinator.com', '989', '331', '2002-06-07', '50', '18-11-2022', '18-11-2022', 'Online', 'pay_KhV2HIK3AuQKhP', 'Active', 'Active', '2022-2023', '', '18-11-2022 10:16:55am', '', '', '18-11-2022 05:50:45pm', '', '', '22876700001_234234.jpg', '2022-12-19', '11:01:26am', '2022-12-19 11:01:26am', ''),
(4, '22876700004', '21391043', 'Paritosh Bisht', 'Male', '1', '185', '', '3', 'paritoshbisht05@gmail.com', '7302020015', '7302020015', '2000-09-19', '50', '20-11-2022', '20-11-2022', 'Online', 'pay_KiH1WluyxmvBtP', 'Active', 'Active', '2022-2023', '', '20-11-2022 02:36:31pm', '', '', '20-11-2022 04:47:08pm', '', '', '22876700004_21391043.jpg', '2022-12-19', '02:38:26pm', '2022-12-19 02:38:26pm', ''),
(5, '22876700005', '1234', 'Zena Gomez', 'Prefer Not', '4', '123', '11', '1', 'wilyfafa@mailinator.com', '116', '679', '1995-11-12', '50', '20-11-2022', '25-11-2022', 'Cash', '', 'Active', 'Active', '2022-2023', '', '20-11-2022 03:34:41pm', '', '', '', '1', '25-11-2022 01:15:44pm', '', '', '', '', ''),
(6, '22876700006', '46776', 'Marshall Elliott76', 'Male', '2', '185', '', '3', 'laqy@mailinator.com7', '9976', '34013', '1980-12-04', '50', '20-11-2022', '25-11-2022', 'Cash', '', 'Rejected', 'InActive', '2022-2023', '', '20-11-2022 04:10:28pm', '1', '20-11-2022 04:16:16pm', '', '1', '25-11-2022 10:38:22am', '', '', '', '', ''),
(7, '22876700007', '237483', 'paritosh rawat', 'Male', '2', '123', '17', '1', 'ruvoci@mailinator.com', '287', '617', '1979-03-10', '50', '20-11-2022', '25-11-2022', 'Online', '123124', 'Active', 'Active', '2022-2023', '', '20-11-2022 04:19:40pm', '', '', '', '1', '25-11-2022 12:10:45pm', '', '', '', '', ''),
(8, '22876700008', '1234567', 'Adrienne Wilkinson', 'Male', '2', '122', '', '3', 'zeloxy@mailinator.com', '255', '352', '2003-11-12', '50', '26-11-2022', '25-11-2022', 'Cash', '1234567', 'Active', 'Active', '2022-2023', '', '26-11-2022 09:22:09am', '', '', '', '1', '26-11-2022 09:22:37am', '', '', '', '', ''),
(9, '22876700009', '2412424', 'Hadassah Middleton', 'Female', '3', '221', '', '1', 'robypepy@mailinator.com', '90', '196', '1981-07-24', '50', '06-12-2022', '', 'Online', ' ', 'Rejected', 'InActive', '2022-2023', '', '06-12-2022 01:27:59pm', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `school_code` varchar(6) NOT NULL,
  `admission_number_starting` varchar(10) NOT NULL,
  `school_srtname` varchar(50) NOT NULL,
  `school_photo` varchar(100) NOT NULL,
  `school_number` varchar(200) NOT NULL,
  `school_email` varchar(200) NOT NULL,
  `school_address` varchar(200) NOT NULL,
  `school_country` varchar(100) NOT NULL,
  `school_state` varchar(100) NOT NULL,
  `school_district` varchar(100) NOT NULL,
  `school_city` varchar(100) NOT NULL,
  `school_pincode` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `own_filled` varchar(10) NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `createdtime` varchar(100) NOT NULL,
  `updateby` varchar(100) NOT NULL,
  `updatetime` varchar(100) NOT NULL,
  `disableby` varchar(100) NOT NULL,
  `disabletime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`, `school_code`, `admission_number_starting`, `school_srtname`, `school_photo`, `school_number`, `school_email`, `school_address`, `school_country`, `school_state`, `school_district`, `school_city`, `school_pincode`, `status`, `own_filled`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`) VALUES
(1, 'Graphic Era (Demeed To Be University)', '8767', '', 'GEU', 'geu-logo-1.png', '7302020015', 'graphicera@gmail.com', 'CLEMENT TOWN', 'India', 'Uttarakhand', 'Dehradun', 'Dehradun', '248002', 'Active', 'Yes', '1', '19-02-2022 10:52:16pm', '1', '18-06-2022 01:19:41am', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session_year` varchar(10) NOT NULL,
  `full_year` varchar(10) NOT NULL,
  `fyear` varchar(5) NOT NULL,
  `last_year` varchar(10) NOT NULL,
  `lyear` varchar(5) NOT NULL,
  `f_date` varchar(15) NOT NULL,
  `l_date` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdby` varchar(100) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(100) NOT NULL,
  `updatetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session_year`, `full_year`, `fyear`, `last_year`, `lyear`, `f_date`, `l_date`, `status`, `createdby`, `createdtime`, `updateby`, `updatetime`) VALUES
(2, '2022-2023', '2022', '22', '2023', '23', '2022-01-01', '2023-01-01', 'Active', '1', '08-04-2022 09:10:56pm', '1', '22-08-2022 03:21:02pm'),
(3, '2023-2024', '2023', '23', '2024', '24', '2023-01-01', '2024-01-01', 'InActive', '1', '08-04-2022 09:45:39pm', '1', '19-05-2022 01:20:40am');

-- --------------------------------------------------------

--
-- Table structure for table `specilization`
--

CREATE TABLE `specilization` (
  `specilization_id` int(10) NOT NULL,
  `specilization_name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `createdby` varchar(20) NOT NULL,
  `createdtime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specilization`
--

INSERT INTO `specilization` (`specilization_id`, `specilization_name`, `status`, `createdby`, `createdtime`) VALUES
(1, 'None', 'Active', '', ''),
(2, 'CSE', 'Active', '', ''),
(3, 'ME', 'Active', '', ''),
(4, 'IT', 'Active', '', ''),
(5, 'CE', 'Active', '', ''),
(6, 'CST', 'Active', '', ''),
(7, 'Computer Engg', 'Active', '', ''),
(8, 'AI & Data Sciences', 'Active', '', ''),
(9, 'EEE', 'Active', '', ''),
(10, 'BIO.TECH', 'Active', '', ''),
(11, 'ECE', 'Active', '', ''),
(12, 'PE', 'Active', '', ''),
(13, 'Artificial Intelligence & Machine Learning', 'Active', '', ''),
(14, 'COMPUTER ENGG (WITH ANY SPECIALIZATION)', 'Active', '', ''),
(15, 'CST (WITH ANY SPECIALIZATION)', 'Active', '', ''),
(16, 'ME (WITH ANY SPECIALIZATION)', 'Active', '', ''),
(17, 'ECE (WITH ANY SPECIALIZATION)', 'Active', '', ''),
(18, 'EE (WITH ANY SPECIALIZATION)', 'Active', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `student_number` varchar(15) NOT NULL,
  `student_telegramnumber` varchar(20) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `student_college` varchar(50) NOT NULL,
  `student_course` varchar(50) NOT NULL,
  `student_semester` varchar(50) NOT NULL,
  `student_section` varchar(10) NOT NULL,
  `student_dob` varchar(30) NOT NULL,
  `classroll` varchar(20) NOT NULL,
  `hobbies` varchar(1000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `student_status` varchar(10) NOT NULL,
  `volexperience` varchar(10) NOT NULL,
  `helpus` varchar(1000) NOT NULL,
  `createdby` varchar(10) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `session` varchar(15) NOT NULL,
  `updateby` varchar(10) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `disableby` varchar(10) NOT NULL,
  `disabletime` varchar(30) NOT NULL,
  `statusactivereason` varchar(500) NOT NULL,
  `statusactiveby` varchar(30) NOT NULL,
  `statusactivetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `student_id`, `first_name`, `middle_name`, `last_name`, `student_number`, `student_telegramnumber`, `student_email`, `student_gender`, `student_college`, `student_course`, `student_semester`, `student_section`, `student_dob`, `classroll`, `hobbies`, `status`, `student_status`, `volexperience`, `helpus`, `createdby`, `createdtime`, `session`, `updateby`, `updatetime`, `disablereason`, `disableby`, `disabletime`, `statusactivereason`, `statusactiveby`, `statusactivetime`) VALUES
(1, '2352353', 'Kenneth', 'Carson Boyer', 'Rivera', '290', '629', 'zyziramuv@mailinator.com', 'Other', '1', '221', '5', '', '', '507', 'Non dolore eum sunt ', 'Active', 'Approve', 'Yes', 'Error illum enim se', '', '11-11-2022 03:18:36pm', '2022-2023', '', '', '', '', '', 'User Approve As per Order', '1', '14-11-2022 03:02:55pm'),
(2, '3248237', 'Chanda', 'Dahlia Justice', 'Wiggins', '679', '266', 'sunohyla@mailinator.com', 'Female', '1', '245', '5', 'B', '', '678', 'Sunt vel repellendus', 'Active', 'Approve', 'No', 'Irure quia mollitia ', '', '11-11-2022 09:53:40pm', '2022-2023', '', '', '', '', '', 'User Approve As per Order', '1', '14-11-2022 03:02:55pm'),
(3, '21', 'Irma', 'Laith Potter', 'Mcknight', '121', '972', 'qerusy@mailinator.com', 'Female', '1', '221', '3', '', '2008-07-24', '56', 'Aut nihil ipsa sit ', 'Active', 'Rejected', 'No', 'Pariatur Autem natu', '', '11-11-2022 10:01:11pm', '2022-2023', '', '', '', '', '', 'User Approve As per Order', '1', '14-11-2022 03:03:01pm');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `submenu_id` int(20) NOT NULL,
  `menu_id` varchar(30) NOT NULL,
  `submenu_name` varchar(30) NOT NULL,
  `submenu_url` varchar(50) NOT NULL,
  `submenu_order` varchar(10) NOT NULL,
  `submenu_display` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disablereason` varchar(100) NOT NULL,
  `activereason` varchar(100) NOT NULL,
  `createdby` varchar(30) NOT NULL,
  `createdtime` varchar(30) NOT NULL,
  `updateby` varchar(30) NOT NULL,
  `updatetime` varchar(30) NOT NULL,
  `disableby` varchar(30) NOT NULL,
  `disabletime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`submenu_id`, `menu_id`, `submenu_name`, `submenu_url`, `submenu_order`, `submenu_display`, `status`, `disablereason`, `activereason`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`) VALUES
(1, '1', 'Department', 'department.php', '1', 'Yes', 'Active', '', '', '1', '13-08-2022 05:49:18pm', '', '', '', ''),
(2, '1', 'View Course', 'course.php', '2', 'Yes', 'Active', '', '', '1', '13-08-2022 05:49:54pm', '', '', '', ''),
(3, '1', 'Update Course', 'update_course.php', '3', 'No', 'Active', '', '', '1', '13-08-2022 05:53:17pm', '', '', '', ''),
(4, '1', 'Delete Course', 'course_delete.php', '4', 'No', 'Active', '', '', '1', '13-08-2022 05:54:04pm', '', '', '', ''),
(5, '1', 'Add Course', 'add_course.php', '5', 'Yes', 'Active', '', '', '1', '13-08-2022 05:59:27pm', '', '', '', ''),
(6, '1', 'Add Fresher Fee', 'assign_coursefee.php', '6', 'Yes', 'Active', '', '', '1', '13-08-2022 06:00:01pm', '', '', '', ''),
(7, '1', 'Update Fresher Fee', 'update_assignfee.php', '7', 'No', 'Active', '', '', '1', '13-08-2022 06:00:33pm', '', '', '', ''),
(23, '5', 'Add Session', 'session.php', '1', 'Yes', 'Active', '', '', '1', '13-08-2022 06:20:21pm', '', '', '', ''),
(24, '5', 'College Detail', 'school.php', '2', 'Yes', 'Active', '', '', '1', '13-08-2022 06:20:59pm', '', '', '', ''),
(25, '5', 'Add User', 'user.php', '3', 'Yes', 'Active', '', '', '1', '13-08-2022 06:21:49pm', '', '', '', ''),
(26, '5', 'Update User', 'update_user.php', '4', 'No', 'Active', '', '', '1', '13-08-2022 06:22:45pm', '', '', '', ''),
(27, '5', 'User Delete', 'user_delete.php', '5', 'No', 'Active', '', '', '1', '13-08-2022 06:23:41pm', '', '', '', ''),
(28, '5', 'Password Reset', 'password_reset.php', '6', 'Yes', 'Active', '', '', '1', '13-08-2022 06:25:52pm', '', '', '', ''),
(29, '5', 'Database Backup', 'database.php', '7', 'Yes', 'Active', '', '', '1', '13-08-2022 06:26:20pm', '', '', '', ''),
(30, '6', 'Menu', 'menu.php', '1', 'Yes', 'Active', '', '', '1', '13-08-2022 06:26:48pm', '', '', '', ''),
(31, '6', 'Menu Update', 'menu_update.php', '2', 'No', 'Active', '', '', '1', '13-08-2022 06:27:56pm', '', '', '', ''),
(32, '6', 'Menu Delete', 'menu_delete.php', '3', 'No', 'Active', '', '', '1', '13-08-2022 06:28:27pm', '', '', '', ''),
(33, '6', 'Sub Menu', 'submenu.php', '4', 'Yes', 'Active', '', '', '1', '13-08-2022 06:29:23pm', '', '', '', ''),
(34, '6', 'SubMenu Update', 'submenu_update.php', '5', 'No', 'Active', '', '', '1', '13-08-2022 06:29:52pm', '', '', '', ''),
(35, '6', 'SubMenu Delete', 'submenu_delete.php', '6', 'No', 'Active', '', '', '1', '13-08-2022 06:30:31pm', '', '', '', ''),
(36, '6', 'User Permission', 'userpermission.php', '7', 'Yes', 'Active', '', '', '1', '13-08-2022 06:31:32pm', '', '', '', ''),
(37, '6', 'Module Permission', 'permission.php', '8', 'No', 'Active', '', '', '1', '13-08-2022 06:32:28pm', '', '', '', ''),
(38, '6', 'Course Permission', 'student_permission.php', '9', 'No', 'Active', '', '', '1', '13-08-2022 06:33:25pm', '', '', '', ''),
(39, '6', 'Bulk Permission Withdrawal', 'BulkPermissionWithdrawal.php', '9', 'Yes', 'Active', '', '', '1', '14-08-2022 11:46:26pm', '', '', '', ''),
(40, '6', 'Bulk Module Permission', 'BulkModulePermission.php', '8', 'Yes', 'Active', '', '', '1', '17-08-2022 02:11:30am', '', '', '', ''),
(41, '6', 'Bulk Course Permission', 'BulkCoursePermission.php', '8', 'Yes', 'Active', '', '', '1', '17-08-2022 11:29:52am', '', '', '', ''),
(46, '4', 'Volunteers record', 'Volunteers_Record.php', '1', 'Yes', 'Active', '', '', '1', '11-11-2022 11:35:01pm', '', '', '', ''),
(47, '4', 'Registration Status', 'Registration_StatusChange.php', '2', 'Yes', 'Active', '', '', '1', '14-11-2022 02:32:19pm', '', '', '', ''),
(48, '7', 'Registration Detail', 'Registration_payment_Sucess.php', '1', 'Yes', 'Active', '', '', '1', '18-11-2022 10:13:30am', '1', '18-11-2022 10:15:11am', '', ''),
(49, '7', 'Registration Failure', 'Registration_payment_Failure.php', '2', 'Yes', 'Active', '', '', '1', '18-11-2022 03:06:27pm', '', '', '', ''),
(50, '7', 'Date Wise Report', 'DateWiseReport.php', '3', 'Yes', 'Active', '', '', '1', '18-11-2022 03:33:21pm', '', '', '', ''),
(51, '7', 'Coursewise Report', 'CourseWiseReport.php', '4', 'Yes', 'Active', '', '', '1', '19-11-2022 04:46:50am', '', '', '', ''),
(52, '6', 'Bulk Campus Permission', 'BulkCampusPermission.php', '8', 'Yes', 'Active', '', '', '1', '19-11-2022 04:53:00am', '', '', '1', '19-11-2022 05:10:39am'),
(53, '8', 'Student Search', 'student_search.php', '1', 'Yes', 'Active', '', '', '1', '20-11-2022 02:35:15pm', '', '', '', ''),
(54, '8', 'Student Update', 'update_student.php', '1', 'No', 'Active', '', '', '1', '20-11-2022 02:44:15pm', '', '', '', ''),
(55, '7', 'Payment Reminder', 'Payment_Reminder.php', '5', 'Yes', 'Active', '', '', '1', '20-11-2022 04:42:07pm', '', '', '', ''),
(56, '7', 'College Wise Count', 'CollegewiseReport.php', '6', 'Yes', 'Active', '', '', '1', '22-11-2022 09:46:54am', '1', '23-11-2022 05:11:41am', '', ''),
(57, '7', 'CampusWise Report', 'CampusWiseReport.php', '7', 'Yes', 'Active', '', '', '1', '23-11-2022 05:11:14am', '', '', '', ''),
(58, '8', 'Student Fee', 'Student_fee_update.php', '2', 'Yes', 'Active', '', '', '1', '25-11-2022 12:08:45pm', '', '', '', ''),
(59, '8', 'UserWise Fee Report', 'UserWiseReport.php', '3', 'Yes', 'Active', '', '', '1', '25-11-2022 06:11:54pm', '', '', '', ''),
(60, '7', 'Date Wise Campus', 'CampusDateWiseCount.php', '8', 'Yes', 'Active', '', '', '1', '01-12-2022 09:47:47pm', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash_password` varchar(255) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `disablereason` varchar(300) NOT NULL,
  `activereason` varchar(300) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `oldpass` varchar(100) NOT NULL,
  `session` varchar(20) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `createdtime` varchar(50) NOT NULL,
  `updateby` varchar(100) NOT NULL,
  `updatetime` varchar(100) NOT NULL,
  `disableby` varchar(50) NOT NULL,
  `disabletime` varchar(50) NOT NULL,
  `password_reset_by` varchar(10) NOT NULL,
  `password_reset_time` varchar(30) NOT NULL,
  `forget_password_time` varchar(100) NOT NULL,
  `change_pass_time` varchar(100) NOT NULL,
  `wrong_pass_count` int(10) NOT NULL,
  `wrong_pass_time` varchar(30) NOT NULL,
  `wrong_pass_reset_type` varchar(20) NOT NULL,
  `current_session` varchar(20) NOT NULL,
  `statusactivereason` varchar(100) NOT NULL,
  `statusactiveby` varchar(20) NOT NULL,
  `statusactivetime` varchar(30) NOT NULL,
  `usercourse_id` varchar(20) NOT NULL,
  `usersection` varchar(20) NOT NULL,
  `usersemester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `middle_name`, `last_name`, `login`, `user_id`, `password`, `hash_password`, `dob`, `number`, `email`, `photo`, `type`, `status`, `disablereason`, `activereason`, `pass`, `oldpass`, `session`, `createdby`, `createdtime`, `updateby`, `updatetime`, `disableby`, `disabletime`, `password_reset_by`, `password_reset_time`, `forget_password_time`, `change_pass_time`, `wrong_pass_count`, `wrong_pass_time`, `wrong_pass_reset_type`, `current_session`, `statusactivereason`, `statusactiveby`, `statusactivetime`, `usercourse_id`, `usersection`, `usersemester`) VALUES
(1, 'superuser', '', '', 'superuser', '', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2000-09-19', '', '', 'paritosh bisht.jpg', 'superuser', 'Active', '', '', '', '', '', '', '', '1', '03-09-2022 07:11:10pm', '', '', '', '', '', '', 0, '17-08-2022', '', '2022-2023', '', '', '', '', '', ''),
(9, 'KAMLESH', 'CHANDRA', 'PUROHIT', 'kamlesh purohit', 'U228767001', '70457a8b9835727a2a0aff2f87af1681acd94447', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '1980-12-20', '9412933728', 'kamleshpurohit80@gmail.com', 'E_8296.JPG', 'superuser', 'Active', '', '', 'Chandra@987', 'kamlesh purohit', '2022-2023', '1', '01-06-2022 07:58:51pm', '1', '18-06-2022 01:34:58am', '', '', '1', '02-06-2022 11:03:06am', '', '02-06-2022 03:39:46pm', 0, '13-06-2022', '', '2022-2023', '', '', '', '', '', ''),
(49, 'Dillon', 'Zeus Weber', 'Hill', 'U228767002', 'U228767002', 'f447c4f4b6f26858f1e4dc87859e140862279c68', 'e4f87d265bd57f49ceb6470e59f1f20a5d6a25bd', '2019-04-04', '181', 'bebifaqejy@mailinator.com', '', 'user', 'Active', '', '', '', '', '2022-2023', '1', '18-11-2022 04:01:31pm', '', '', '', '', '', '', '', '', 0, '', '', '2022-2023', '', '', '', '', '', ''),
(50, 'Mercedes', 'Kerry Larsen', 'Roman', 'U228767003', 'U228767003', '5cd44aa5bacc4b52ad8f46199db8052607e03202', '', '1988-03-17', '667', 'hofimuzaty@mailinator.com', '', 'user', 'Pending', '', '', '', '', '2022-2023', '', '19-11-2022 10:52:48am', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advancesetting`
--
ALTER TABLE `advancesetting`
  ADD PRIMARY KEY (`popupid`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`campus_id`);

--
-- Indexes for table `campuspermission`
--
ALTER TABLE `campuspermission`
  ADD PRIMARY KEY (`campusp_id`);

--
-- Indexes for table `course_detail`
--
ALTER TABLE `course_detail`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_fee`
--
ALTER TABLE `course_fee`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `logindetail`
--
ALTER TABLE `logindetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `modulepermission`
--
ALTER TABLE `modulepermission`
  ADD PRIMARY KEY (`modulepermission_id`);

--
-- Indexes for table `mst_subjectpermission`
--
ALTER TABLE `mst_subjectpermission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specilization`
--
ALTER TABLE `specilization`
  ADD PRIMARY KEY (`specilization_id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advancesetting`
--
ALTER TABLE `advancesetting`
  MODIFY `popupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `campus_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `campuspermission`
--
ALTER TABLE `campuspermission`
  MODIFY `campusp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_detail`
--
ALTER TABLE `course_detail`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_fee`
--
ALTER TABLE `course_fee`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logindetail`
--
ALTER TABLE `logindetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `modulepermission`
--
ALTER TABLE `modulepermission`
  MODIFY `modulepermission_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT for table `mst_subjectpermission`
--
ALTER TABLE `mst_subjectpermission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specilization`
--
ALTER TABLE `specilization`
  MODIFY `specilization_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `submenu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
