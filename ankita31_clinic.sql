-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: 10.123.0.91:3306
-- Generation Time: Aug 24, 2015 at 01:40 PM
-- Server version: 5.5.38
-- PHP Version: 5.4.41-0+deb7u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `root`
--

-- --------------------------------------------------------

--
-- Table structure for table `nu_appointments`
--

CREATE TABLE IF NOT EXISTS `nu_appointments` (
  `appointment_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `patient_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visit_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_appointments`
--

INSERT INTO `nu_appointments` (`appointment_id`, `appointment_date`, `end_date`, `start_time`, `end_time`, `title`, `patient_id`, `userid`, `status`, `visit_id`) VALUES
(1, '2015-08-21', NULL, '09:00:00', '09:30:00', 'Raghu  Kumar', 1, 2, 'Complete', 0),
(2, '2015-08-21', NULL, '11:25:00', '00:00:00', 'moin kumar chauhan', 2, 2, 'Consultation', 2),
(3, '2015-08-21', NULL, '17:00:00', '17:35:00', 'Raghu Kumar', 1, 2, 'Appointments', 0),
(4, '2015-08-21', NULL, '17:00:00', '17:35:00', 'Raghu Kumar', 1, 2, 'Appointments', 0),
(5, '2015-08-22', NULL, '09:30:00', '10:00:00', 'Ankita Gupta', 3, 2, 'Appointments', 0),
(6, '2015-08-24', NULL, '09:30:00', '10:00:00', 'Ankur gupta', 4, 2, 'Complete', 0),
(8, '2015-08-28', NULL, '17:28:00', '17:58:00', 'Raghu Kumar', 1, 2, 'Appointments', 0),
(7, '2015-08-28', NULL, '17:24:00', '17:54:00', 'Ankur gupta', 4, 2, 'Appointments', 0),
(9, '2015-08-21', NULL, '17:29:00', '17:59:00', 'Raghu Kumar', 1, 2, 'Appointments', 0),
(10, '2015-08-22', NULL, '10:00:00', '12:00:00', 'Raghu Kumar', 1, 2, 'Appointments', 0),
(11, '2015-08-23', NULL, '17:00:00', '18:00:00', 'Ankur gupta', 4, 2, 'Consultation', 0),
(12, '2015-08-23', NULL, '12:00:00', '13:00:00', 'Ankur gupta', 4, 2, 'Waiting', 0),
(13, '2015-08-22', NULL, '16:00:00', '17:00:00', 'moin kumarchauhan', 2, 2, 'Appointments', 0),
(14, '2015-08-22', NULL, '16:00:00', '17:00:00', 'moin kumarchauhan', 2, 2, 'Appointments', 0),
(15, '2015-08-22', NULL, '18:00:00', '18:30:00', 'moin kumarchauhan', 2, 2, 'Appointments', 0),
(16, '2015-08-21', NULL, '13:54:00', '00:00:00', 'Ankita  Gupta', 3, 2, 'Consultation', 5),
(17, '2015-08-22', NULL, '19:00:00', '20:00:00', 'Jitesh KrJain', 6, 2, 'Complete', 6),
(18, '2015-08-23', NULL, '10:00:00', '10:30:00', 'shivam agrawal', 7, 2, 'Appointment', 0),
(19, '2015-08-24', NULL, '10:30:00', '11:00:00', 'moin kumar chauhan', 2, 2, 'Complete', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nu_appointment_log`
--

CREATE TABLE IF NOT EXISTS `nu_appointment_log` (
  `appointment_id` int(11) NOT NULL,
  `change_date_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `old_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_appointment_log`
--

INSERT INTO `nu_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES
(1, '21/08/2015 09:32:37', '09:00:00', '09:32:37', '09:34:44', ' ', 'Appointment', 'Administrator'),
(1, '21/08/2015 09:34:44', '09:00:00', '09:34:44', '11:59:20', 'Appointments', 'Consultation', 'Administrator'),
(3, '21/08/2015 11:35:50', '05:00:00', '11:35:50', '00:00:00', ' ', 'Appointment', 'Anurag'),
(4, '21/08/2015 11:35:56', '05:00:00', '11:35:56', '00:00:00', ' ', 'Appointment', 'Anurag'),
(5, '21/08/2015 11:44:09', '09:30:00', '11:44:09', '00:00:00', ' ', 'Appointment', 'Anurag'),
(6, '21/08/2015 11:47:04', '09:30:00', '11:47:04', '11:48:01', ' ', 'Appointment', 'Manash'),
(6, '21/08/2015 11:48:01', '09:30:00', '11:48:01', '11:48:21', 'Appointments', 'Waiting', 'Manash'),
(6, '21/08/2015 11:48:21', '09:30:00', '11:48:21', '11:56:03', 'Waiting', 'Consultation', 'Anurag'),
(7, '21/08/2015 11:54:52', '05:24:00', '11:54:52', '00:00:00', ' ', 'Appointment', 'Manash'),
(6, '21/08/2015 11:56:03', '09:30:00', '11:56:03', '00:00:00', 'Consultation', 'Complete', 'Anurag'),
(8, '21/08/2015 11:59:02', '05:28:00', '11:59:02', '00:00:00', ' ', 'Appointment', 'Manash'),
(1, '21/08/2015 11:59:20', '09:00:00', '11:59:20', '00:00:00', 'Consultation', 'Complete', 'Manash'),
(9, '21/08/2015 12:00:01', '05:29:00', '12:00:01', '00:00:00', ' ', 'Appointment', 'Manash'),
(10, '21/08/2015 12:00:58', '10:00:00', '12:00:58', '00:00:00', ' ', 'Appointment', 'Manash'),
(11, '21/08/2015 12:02:08', '05:00:00', '12:02:08', '09:21:49', ' ', 'Appointment', 'Manash'),
(12, '21/08/2015 12:02:54', '12:00:00', '12:02:54', '09:22:15', ' ', 'Appointment', 'Manash'),
(13, '21/08/2015 12:05:03', '04:00:00', '12:05:03', '00:00:00', ' ', 'Appointment', 'Manash'),
(14, '21/08/2015 12:08:45', '04:00:00', '12:08:45', '00:00:00', ' ', 'Appointment', 'Manash'),
(15, '21/08/2015 12:13:26', '06:00:00', '12:13:26', '00:00:00', ' ', 'Appointment', 'Manash'),
(17, '22/08/2015 13:24:41', '07:00:00', '13:24:41', '13:25:45', ' ', 'Appointment', 'Admin'),
(17, '22/08/2015 13:25:45', '19:00:00', '13:25:45', '13:35:01', 'Appointments', 'Consultation', 'Admin'),
(17, '22/08/2015 13:35:01', '19:00:00', '13:35:01', '00:00:00', 'Consultation', 'Complete', 'Anurag'),
(18, '23/08/2015 09:20:31', '10:00:00', '09:20:31', '09:21:05', ' ', 'Appointment', 'Admin'),
(18, '23/08/2015 09:21:05', '10:00:00', '09:21:05', '00:00:00', 'Appointments', 'Appointment', 'Admin'),
(11, '23/08/2015 09:21:49', '17:00:00', '09:21:49', '00:00:00', 'Appointments', 'Consultation', 'Admin'),
(12, '23/08/2015 09:22:15', '12:00:00', '09:22:15', '00:00:00', 'Appointments', 'Waiting', 'Admin'),
(19, '24/08/2015 08:16:52', '10:30:00', '08:16:52', '08:17:14', ' ', 'Appointment', 'Admin'),
(19, '24/08/2015 08:17:14', '10:30:00', '08:17:14', '12:57:06', 'Appointments', 'Consultation', 'Admin'),
(19, '24/08/2015 12:57:06', '10:30:00', '12:57:06', '00:00:00', 'Consultation', 'Complete', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `nu_bill`
--

CREATE TABLE IF NOT EXISTS `nu_bill` (
  `bill_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `due_amount` decimal(11,2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_bill`
--

INSERT INTO `nu_bill` (`bill_id`, `bill_date`, `patient_id`, `visit_id`, `total_amount`, `due_amount`) VALUES
(1, '2015-08-21', 1, 1, 250, 0.00),
(2, '2015-08-21', 1, 1, 0, 200.00),
(3, '2015-08-21', 2, 2, 80, 0.00),
(4, '2015-08-21', 4, 3, 100, 0.00),
(5, '2015-08-21', 1, 4, 0, 200.00),
(6, '2015-08-21', 3, 5, 0, 0.00),
(7, '2015-08-22', 6, 6, 300, 50.00),
(8, '2015-08-22', 6, 6, 0, 350.00),
(9, '2015-08-24', 2, 7, 0, 80.00),
(10, '2015-08-24', 0, 0, 0, 0.00),
(11, '2015-08-24', 0, 0, 0, 0.00),
(12, '2015-08-24', 0, 0, 0, 0.00),
(13, '2015-08-24', 0, 0, 0, 0.00),
(14, '2015-08-24', 0, 0, 0, 0.00),
(15, '2015-08-24', 2, 8, 0, 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `nu_bill_detail`
--

CREATE TABLE IF NOT EXISTS `nu_bill_detail` (
  `bill_detail_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `bill_id` int(11) NOT NULL,
  `particular` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_id` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_bill_detail`
--

INSERT INTO `nu_bill_detail` (`bill_detail_id`, `item_id`, `bill_id`, `particular`, `amount`, `quantity`, `mrp`, `type`, `purchase_id`) VALUES
(1, NULL, 1, 'www', 100.00, 1, 100.00, 'particular', NULL),
(2, NULL, 1, 'eee', 100.00, 1, 100.00, 'particular', NULL),
(3, NULL, 1, 'qqq', 50.00, 1, 50.00, 'particular', NULL),
(4, NULL, 4, 'crocin-10', 100.00, 1, 100.00, 'particular', NULL),
(13, NULL, 3, 'disprin', 8.00, 4, 2.00, 'particular', NULL),
(15, NULL, 3, 'abc', 20.00, 2, 10.00, 'particular', NULL),
(16, NULL, 3, 'qq', 50.00, 1, 50.00, 'particular', NULL),
(17, NULL, 3, 'uuu', 2.00, 1, 2.00, 'particular', NULL),
(19, NULL, 7, 'fever', 100.00, 1, 100.00, 'particular', NULL),
(20, NULL, 7, 'cold', 200.00, 2, 100.00, 'particular', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nu_clinic`
--

CREATE TABLE IF NOT EXISTS `nu_clinic` (
  `clinic_id` int(11) NOT NULL,
  `start_time` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `end_time` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `time_interval` decimal(11,2) NOT NULL DEFAULT '0.50',
  `clinic_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tag_line` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clinic_address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `landline` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_plus` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `next_followup_days` int(11) NOT NULL DEFAULT '15'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_clinic`
--

INSERT INTO `nu_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES
(1, '09:00 AM', '07:00 PM', 0.50, 'Clinicosys', 'Patient Management Software', 'Hyderabad ', '', '8885518062', 'dkshukla@igravitas.in', NULL, NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `nu_contacts`
--

CREATE TABLE IF NOT EXISTS `nu_contacts` (
  `contact_id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `contact_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'images/Profile.png',
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_2` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_contacts`
--

INSERT INTO `nu_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES
(1, 'Raghu', NULL, 'Kumar', 'Raghu', '7878787878', 'raghu@igts.in', '', 'Home', '45- sec', '', 'Hyderabad', 'Telangana', '500045', 'India'),
(2, 'moin', 'kumar', 'chauhan', 'moin', '7854785478', 'gjh@ijklhi.bh', '', 'Home', 'zoo', '', '', '', '', ''),
(3, 'Ankita', NULL, 'Gupta', '', '', '', 'images/Profile.png', '', '', '', '', '', '', ''),
(4, 'Ankur', '', 'gupta', '', '8989898989', '', 'images/Profile.png', '', '', '', '', '', '', ''),
(5, 'Durgesh', 'Kr', 'N', '', '', '', 'images/Profile.png', '', '', '', '', '', '', ''),
(6, 'Jitesh', 'Kr', 'Jain', '', '', '', 'images/Profile.png', '', '', '', '', '', '', ''),
(7, 'shivam', NULL, 'agrawal', '', '', '', 'images/Profile.png', '', '', '', '', '', '', ''),
(8, 'Rajuk', '', 'fkj sd ', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Rahul', NULL, 'Mishra', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nu_contact_details`
--

CREATE TABLE IF NOT EXISTS `nu_contact_details` (
  `contact_detail_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nu_data`
--

CREATE TABLE IF NOT EXISTS `nu_data` (
  `ck_data_id` int(11) NOT NULL,
  `ck_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ck_value` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_data`
--

INSERT INTO `nu_data` (`ck_data_id`, `ck_key`, `ck_value`) VALUES
(1, 'default_language', 'english'),
(2, 'default_timezone', 'UTC'),
(3, 'default_timeformate', 'h:i A'),
(4, 'default_dateformate', 'd-m-Y');

-- --------------------------------------------------------

--
-- Table structure for table `nu_invoice`
--

CREATE TABLE IF NOT EXISTS `nu_invoice` (
  `invoice_id` int(11) NOT NULL,
  `static_prefix` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `left_pad` int(11) NOT NULL,
  `next_id` int(11) NOT NULL,
  `currency_symbol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `currency_postfix` char(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/-'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nu_menu_access`
--

CREATE TABLE IF NOT EXISTS `nu_menu_access` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `allow` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_menu_access`
--

INSERT INTO `nu_menu_access` (`id`, `menu_name`, `category_name`, `allow`) VALUES
(1, 'patients', 'Doctor', 1),
(2, 'all_patients', 'Doctor', 1),
(3, 'new_inquiry', 'Doctor', 1),
(4, 'appointments', 'Doctor', 1),
(5, 'reports', 'Doctor', 1),
(6, 'patients', 'Receptionist', 1),
(7, 'all_patients', 'Receptionist', 1),
(8, 'new_inquiry', 'Receptionist', 1),
(9, 'appointments', 'Receptionist', 1),
(10, 'appointment report', 'Doctor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nu_modules`
--

CREATE TABLE IF NOT EXISTS `nu_modules` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `module_display_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `module_description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `module_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nu_navigation_menu`
--

CREATE TABLE IF NOT EXISTS `nu_navigation_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_url` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_icon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_text` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `required_module` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_navigation_menu`
--

INSERT INTO `nu_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES
(1, 'patients', '', 100, 'patient/index', 'fa-users', 'Patients', ''),
(2, 'all_patients', 'patients', 0, 'patient/index', NULL, 'All Patients', NULL),
(3, 'new_inquiry', 'patients', 200, 'patient/new_inquiry_report', NULL, 'New Inquiries', NULL),
(4, 'appointments', '', 200, 'appointment/index', 'fa-calendar', 'Appointments', ''),
(5, 'reports', '', 400, '#', 'fa-line-chart', 'Reports', ''),
(6, 'administration', '', 500, '#', 'fa-cog', 'Administration', ''),
(8, 'appointment report', 'reports', 100, 'appointment/appointment_report', '', 'Appointment Report', ''),
(9, 'bill report', 'reports', 300, 'patient/bill_detail_report', '', 'Bill Detail Report', ''),
(10, 'clinic detail', 'administration', 100, 'settings/clinic', '', 'Clinic Detail', ''),
(12, 'users', 'administration', 300, 'admin/users', '', 'Users', ''),
(13, 'setting', 'administration', 500, 'settings/change_settings', '', 'Setting', ''),
(14, 'payment', '', 300, 'payment/index', 'fa-money', 'Payments', ''),
(16, 'modules', '', 600, 'module/index', 'fa-shopping-cart', 'Modules', NULL),
(17, 'backup', 'administration', 600, 'settings/backup', NULL, 'Backup', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nu_patient`
--

CREATE TABLE IF NOT EXISTS `nu_patient` (
  `patient_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `patient_since` date NOT NULL,
  `display_id` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `followup_date` date NOT NULL,
  `reference_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_patient`
--

INSERT INTO `nu_patient` (`patient_id`, `contact_id`, `patient_since`, `display_id`, `followup_date`, `reference_by`, `dob`) VALUES
(1, 1, '2015-08-21', 'K00001', '0000-00-00', '', ''),
(2, 2, '2015-08-21', 'C00002', '2015-08-31', 'moinuddin', ''),
(3, 3, '2015-08-21', 'G00003', '2015-08-28', 'Anurag', ''),
(4, 4, '2015-08-21', 'G00004', '0000-00-00', '', ''),
(5, 5, '2015-08-22', 'N00005', '0000-00-00', '', ''),
(6, 6, '2015-08-22', 'J00006', '2015-08-29', '', ''),
(7, 7, '2015-08-23', 'A00007', '0000-00-00', '', ''),
(8, 8, '2015-08-24', 'F00008', '0000-00-00', '', '26-08-2015'),
(9, 9, '2015-08-24', 'M00009', '0000-00-00', '', '24-08-2015');

-- --------------------------------------------------------

--
-- Table structure for table `nu_payment`
--

CREATE TABLE IF NOT EXISTS `nu_payment` (
  `payment_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `pay_mode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pay_amount` decimal(10,0) NOT NULL,
  `cheque_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_payment`
--

INSERT INTO `nu_payment` (`payment_id`, `bill_id`, `pay_date`, `pay_mode`, `pay_amount`, `cheque_no`) VALUES
(1, 1, '2015-08-21', 'cash', 200, ''),
(2, 1, '2015-08-21', 'cash', 50, ''),
(3, 4, '2015-08-21', 'cash', 100, ''),
(4, 3, '2015-08-21', 'cash', 28, ''),
(5, 3, '2015-08-21', 'cash', 50, ''),
(6, 3, '2015-08-21', 'cash', 0, ''),
(7, 3, '2015-08-21', 'cash', 2, ''),
(8, 3, '2015-08-21', 'cash', 0, ''),
(9, 7, '2015-08-22', 'cash', 250, ''),
(10, 9, '2015-08-24', 'cash', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `nu_payment_transaction`
--

CREATE TABLE IF NOT EXISTS `nu_payment_transaction` (
  `transaction_id` int(11) NOT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `payment_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nu_receipt_template`
--

CREATE TABLE IF NOT EXISTS `nu_receipt_template` (
  `template_id` int(11) NOT NULL,
  `template` text COLLATE utf8_unicode_ci NOT NULL,
  `is_default` int(1) NOT NULL,
  `template_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_receipt_template`
--

INSERT INTO `nu_receipt_template` (`template_id`, `template`, `is_default`, `template_name`, `type`) VALUES
(1, '<style>	table tr{border:1px solid #ccc !important;}table tr td{padding:5px;}</style>\n<h1 style="text-align:center;">[clinic_name]</h1><h2 style="text-align:center;">[tag_line]</h2><p style="text-align:center;">[clinic_address]</p><span class="contact"><p style="text-align: center;"><b style="line-height: 1.42857143;">Landline : </b><span style="line-height: 1.42857143;">[landline]  </span><b style="line-height: 1.42857143;">Mobile : </b><span style="line-height: 1.42857143;">[mobile]  </span><b style="line-height: 1.42857143;">Email : </b><span style="text-align: center;"> [email]</span></p></span><hr id="null"><h3 style="text-align: center;"><u style="text-align: center;">RECEIPT</u></h3><span style="text-align: left;"><b>Date : </b>[bill_date]</span><span style="float: right;"><b>Receipt Number :</b> [bill_id]</span><p style="text-align: left;"><b style="text-align: left;">Patient Name: </b><span style="text-align: left;">[patient_name]<br></span></p><hr id="null" style="text-align: left;">Received fees for Professional services and other charges of our:<p><br></p><table style="width: 100%;margin-top: 25px;margin-bottom: 25px;border-collapse: collapse;"><thead><tr><td style="width: 400px;text-align: left;"><b style="width: 400px;text-align: left;">Item</b></td><td><b>Quantity</b></td><td style="width: 100px;text-align:right;"><b>M.R.P.</b></td><td style="width: 100px;text-align:right;"><b>Amount</b></td></tr></thead><tbody>[col:particular|quantity|mrp|amount]<tr><td colspan="3">Previous Due</td><td style="text-align:right;"><strong>[previous_due]</strong></td></tr><tr><td colspan="3">Total</td><td style="text-align:right;"><strong>[total]</strong></td></tr><tr><td colspan="3">Paid Amount</td><td style="text-align:right;">[paid_amount]</td></tr></tbody></table>Received with Thanks,<p>For [clinic_name]</p><p><br></p><p><br></p><p>Signature</p>', 1, 'Main', 'bill');

-- --------------------------------------------------------

--
-- Table structure for table `nu_todos`
--

CREATE TABLE IF NOT EXISTS `nu_todos` (
  `id_num` int(11) NOT NULL,
  `userid` int(11) DEFAULT '0',
  `todo` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `done` int(11) DEFAULT '0',
  `add_date` datetime DEFAULT NULL,
  `done_date` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_todos`
--

INSERT INTO `nu_todos` (`id_num`, `userid`, `todo`, `done`, `add_date`, `done_date`) VALUES
(1, 2, 'moin', 1, '2015-08-21 11:43:48', '2015-08-21 11:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `nu_users`
--

CREATE TABLE IF NOT EXISTS `nu_users` (
  `userid` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_users`
--

INSERT INTO `nu_users` (`userid`, `name`, `username`, `password`, `level`, `is_active`) VALUES
(1, 'Admin', 'demo1', 'ZGVtbzE=', 'Administrator', 1),
(2, 'Anurag', 'anurag', 'MTIzNA==', 'Doctor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nu_user_categories`
--

CREATE TABLE IF NOT EXISTS `nu_user_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_user_categories`
--

INSERT INTO `nu_user_categories` (`id`, `category_name`) VALUES
(1, 'Administrator'),
(2, 'Doctor'),
(3, 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `nu_version`
--

CREATE TABLE IF NOT EXISTS `nu_version` (
  `current_version` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_version`
--

INSERT INTO `nu_version` (`current_version`) VALUES
('0.2.0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `nu_view_bill`
--
CREATE TABLE IF NOT EXISTS `nu_view_bill` (
`bill_id` int(11)
,`bill_date` date
,`visit_id` int(11)
,`doctor_name` varchar(255)
,`userid` int(11)
,`patient_id` int(11)
,`display_id` varchar(12)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`last_name` varchar(50)
,`total_amount` decimal(10,0)
,`due_amount` decimal(11,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nu_view_bill_detail_report`
--
CREATE TABLE IF NOT EXISTS `nu_view_bill_detail_report` (
`bill_id` int(11)
,`bill_date` date
,`visit_id` int(11)
,`particular` varchar(50)
,`amount` decimal(10,2)
,`userid` int(11)
,`patient_name` varchar(152)
,`display_id` varchar(12)
,`type` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nu_view_contact_email`
--
CREATE TABLE IF NOT EXISTS `nu_view_contact_email` (
`contact_id` int(11)
,`email` varchar(150)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nu_view_email`
--
CREATE TABLE IF NOT EXISTS `nu_view_email` (
`contact_id` int(11)
,`emails` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nu_view_patient`
--
CREATE TABLE IF NOT EXISTS `nu_view_patient` (
`patient_id` int(11)
,`patient_since` date
,`dob` varchar(15)
,`display_id` varchar(12)
,`reference_by` varchar(255)
,`followup_date` date
,`display_name` varchar(255)
,`contact_id` int(11)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`last_name` varchar(50)
,`phone_number` varchar(15)
,`email` varchar(150)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nu_view_payment`
--
CREATE TABLE IF NOT EXISTS `nu_view_payment` (
`payment_id` int(11)
,`bill_id` int(11)
,`pay_date` date
,`pay_mode` varchar(50)
,`pay_amount` decimal(10,0)
,`bill_date` date
,`patient_id` int(11)
,`display_id` varchar(12)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`last_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nu_view_report`
--
CREATE TABLE IF NOT EXISTS `nu_view_report` (
`appointment_id` int(11)
,`patient_id` int(11)
,`patient_name` varchar(152)
,`userid` int(11)
,`appointment_date` date
,`appointment_time` time
,`waiting_in` time
,`waiting_duration` double
,`consultation_in` time
,`consultation_out` time
,`consultation_duration` double
,`waiting_out` time
,`collection_amount` decimal(10,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nu_view_visit`
--
CREATE TABLE IF NOT EXISTS `nu_view_visit` (
`visit_id` int(11)
,`visit_date` varchar(60)
,`visit_time` varchar(50)
,`type` varchar(50)
,`notes` text
,`prescription` varchar(500)
,`visit_image` varchar(500)
,`userid` int(11)
,`name` varchar(255)
,`patient_id` int(11)
,`bill_id` int(11)
,`total_amount` decimal(10,0)
,`due_amount` decimal(11,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nu_view_visit_treatments`
--
CREATE TABLE IF NOT EXISTS `nu_view_visit_treatments` (
`visit_id` int(11)
,`particular` varchar(50)
,`type` varchar(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `nu_visit`
--

CREATE TABLE IF NOT EXISTS `nu_visit` (
  `visit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `visit_date` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `visit_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prescription` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `visit_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nu_visit`
--

INSERT INTO `nu_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`, `prescription`, `visit_image`) VALUES
(1, 1, 2, 'fgftg fgf fg', 'New Visit', '2015-08-21', '09:32:00', '', ''),
(2, 2, 2, 'sdfg', 'New Visit', '2015-08-21', '11:25', '', ''),
(3, 4, 2, 'fever:\r\n1 crocin - 10 tablets', 'New Visit', '2015-08-21', '11:48', '', ''),
(4, 1, 2, 'follo', 'Established Patient', '2015-08-21', '11:57', '', ''),
(5, 3, 2, 'dfgsdg', 'New Visit', '2015-08-21', '13:54', '', ''),
(6, 6, 2, 'BSTINATE\r\n\r\nYOUNGEST\r\n\r\nAFFECTIONATE\r\n\r\nPALMS MOIST\r\n\r\nCONSTIPATION\r\n\r\nHAIRLOSS\r\n\r\nFEAR OF DARKNESS\r\n\r\n\r\nRX: CP 200 WKLY ONE DOSE =SACRUM DAILY 2 DOSES\r\n', 'New Visit', '2015-08-22', '13:26', '', ''),
(7, 2, 2, 'jks hjkluifd fdhjdhj df kjfdshjkgd s', 'Established Patient', '2015-08-24', '08:17:00', 'tgfg hg jghgjgh thugf  ', ''),
(8, 2, 2, 'ghf', 'Established Patient', '2015-08-24', '11:21', 'jgffj ', 'HALS01EXU6UDUW8.jpg');

-- --------------------------------------------------------

--
-- Structure for view `nu_view_bill`
--
DROP TABLE IF EXISTS `nu_view_bill`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nu_view_bill` AS select `bill`.`bill_id` AS `bill_id`,`bill`.`bill_date` AS `bill_date`,`bill`.`visit_id` AS `visit_id`,`users`.`name` AS `doctor_name`,`visit`.`userid` AS `userid`,`patient`.`patient_id` AS `patient_id`,`patient`.`display_id` AS `display_id`,`contacts`.`first_name` AS `first_name`,`contacts`.`middle_name` AS `middle_name`,`contacts`.`last_name` AS `last_name`,`bill`.`total_amount` AS `total_amount`,`bill`.`due_amount` AS `due_amount` from ((((`nu_bill` `bill` join `nu_visit` `visit` on((`bill`.`visit_id` = `visit`.`visit_id`))) join `nu_users` `users` on((`visit`.`userid` = `users`.`userid`))) join `nu_patient` `patient` on((`bill`.`patient_id` = `patient`.`patient_id`))) join `nu_contacts` `contacts` on((`contacts`.`contact_id` = `patient`.`contact_id`)));

-- --------------------------------------------------------

--
-- Structure for view `nu_view_bill_detail_report`
--
DROP TABLE IF EXISTS `nu_view_bill_detail_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nu_view_bill_detail_report` AS select `bill`.`bill_id` AS `bill_id`,`bill`.`bill_date` AS `bill_date`,`bill`.`visit_id` AS `visit_id`,`bill_detail`.`particular` AS `particular`,`bill_detail`.`amount` AS `amount`,`visit`.`userid` AS `userid`,concat(`view_patient`.`first_name`,' ',`view_patient`.`middle_name`,' ',`view_patient`.`last_name`) AS `patient_name`,`view_patient`.`display_id` AS `display_id`,`bill_detail`.`type` AS `type` from (((`nu_bill` `bill` left join `nu_bill_detail` `bill_detail` on((`bill_detail`.`bill_id` = `bill`.`bill_id`))) left join `nu_visit` `visit` on((`visit`.`visit_id` = `bill`.`visit_id`))) left join `nu_view_patient` `view_patient` on((`view_patient`.`patient_id` = `bill`.`patient_id`)));

-- --------------------------------------------------------

--
-- Structure for view `nu_view_contact_email`
--
DROP TABLE IF EXISTS `nu_view_contact_email`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nu_view_contact_email` AS select `nu_contact_details`.`contact_id` AS `contact_id`,`nu_contact_details`.`detail` AS `email` from `nu_contact_details` where (`nu_contact_details`.`type` = 'email');

-- --------------------------------------------------------

--
-- Structure for view `nu_view_email`
--
DROP TABLE IF EXISTS `nu_view_email`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nu_view_email` AS select `nu_contact_details`.`contact_id` AS `contact_id`,group_concat(`nu_contact_details`.`detail` separator ',') AS `emails` from `nu_contact_details` where (`nu_contact_details`.`type` = 'email') group by `nu_contact_details`.`contact_id`;

-- --------------------------------------------------------

--
-- Structure for view `nu_view_patient`
--
DROP TABLE IF EXISTS `nu_view_patient`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nu_view_patient` AS select `patient`.`patient_id` AS `patient_id`,`patient`.`patient_since` AS `patient_since`,`patient`.`dob` AS `dob`,`patient`.`display_id` AS `display_id`,`patient`.`reference_by` AS `reference_by`,`patient`.`followup_date` AS `followup_date`,`contacts`.`display_name` AS `display_name`,`contacts`.`contact_id` AS `contact_id`,`contacts`.`first_name` AS `first_name`,`contacts`.`middle_name` AS `middle_name`,`contacts`.`last_name` AS `last_name`,`contacts`.`phone_number` AS `phone_number`,`contacts`.`email` AS `email` from (`nu_patient` `patient` left join `nu_contacts` `contacts` on((`patient`.`contact_id` = `contacts`.`contact_id`)));

-- --------------------------------------------------------

--
-- Structure for view `nu_view_payment`
--
DROP TABLE IF EXISTS `nu_view_payment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nu_view_payment` AS select `payment`.`payment_id` AS `payment_id`,`payment`.`bill_id` AS `bill_id`,`payment`.`pay_date` AS `pay_date`,`payment`.`pay_mode` AS `pay_mode`,`payment`.`pay_amount` AS `pay_amount`,`bill`.`bill_date` AS `bill_date`,`bill`.`patient_id` AS `patient_id`,`patient`.`display_id` AS `display_id`,`contacts`.`first_name` AS `first_name`,`contacts`.`middle_name` AS `middle_name`,`contacts`.`last_name` AS `last_name` from (((`nu_payment` `payment` join `nu_bill` `bill` on((`payment`.`bill_id` = `bill`.`bill_id`))) join `nu_patient` `patient` on((`patient`.`patient_id` = `bill`.`patient_id`))) join `nu_contacts` `contacts` on((`contacts`.`contact_id` = `patient`.`contact_id`)));

-- --------------------------------------------------------

--
-- Structure for view `nu_view_report`
--
DROP TABLE IF EXISTS `nu_view_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nu_view_report` AS select `appointment`.`appointment_id` AS `appointment_id`,`appointment`.`patient_id` AS `patient_id`,concat(ifnull(`view_patient`.`first_name`,''),' ',ifnull(`view_patient`.`middle_name`,''),' ',ifnull(`view_patient`.`last_name`,'')) AS `patient_name`,`appointment`.`userid` AS `userid`,`appointment`.`appointment_date` AS `appointment_date`,min(`appointment`.`start_time`) AS `appointment_time`,max((case `appointment_log`.`status` when 'Waiting' then `appointment_log`.`from_time` end)) AS `waiting_in`,(max((case `appointment_log`.`status` when 'Consultation' then `appointment_log`.`from_time` end)) - max((case `appointment_log`.`status` when 'Waiting' then `appointment_log`.`from_time` end))) AS `waiting_duration`,max((case `appointment_log`.`status` when 'Consultation' then `appointment_log`.`from_time` end)) AS `consultation_in`,max((case `appointment_log`.`status` when 'Complete' then `appointment_log`.`from_time` end)) AS `consultation_out`,(max((case `appointment_log`.`status` when 'Complete' then `appointment_log`.`from_time` end)) - max((case `appointment_log`.`status` when 'Consultation' then `appointment_log`.`from_time` end))) AS `consultation_duration`,max((case `appointment_log`.`old_status` when 'Consultation' then timediff(`appointment_log`.`to_time`,`appointment_log`.`from_time`) end)) AS `waiting_out`,max(`bill`.`total_amount`) AS `collection_amount` from (((`nu_appointments` `appointment` left join `nu_view_patient` `view_patient` on((`appointment`.`patient_id` = `view_patient`.`patient_id`))) left join `nu_bill` `bill` on((`appointment`.`visit_id` = `bill`.`visit_id`))) left join `nu_appointment_log` `appointment_log` on((`appointment`.`appointment_id` = `appointment_log`.`appointment_id`))) group by `appointment`.`appointment_id`,concat(ifnull(`view_patient`.`first_name`,''),' ',ifnull(`view_patient`.`middle_name`,''),' ',ifnull(`view_patient`.`last_name`,''));

-- --------------------------------------------------------

--
-- Structure for view `nu_view_visit`
--
DROP TABLE IF EXISTS `nu_view_visit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nu_view_visit` AS select `visit`.`visit_id` AS `visit_id`,`visit`.`visit_date` AS `visit_date`,`visit`.`visit_time` AS `visit_time`,`visit`.`type` AS `type`,`visit`.`notes` AS `notes`,`visit`.`prescription` AS `prescription`,`visit`.`visit_image` AS `visit_image`,`visit`.`userid` AS `userid`,`users`.`name` AS `name`,`visit`.`patient_id` AS `patient_id`,`bill`.`bill_id` AS `bill_id`,`bill`.`total_amount` AS `total_amount`,`bill`.`due_amount` AS `due_amount` from ((`nu_visit` `visit` join `nu_users` `users` on((`users`.`userid` = `visit`.`userid`))) join `nu_bill` `bill` on((`bill`.`visit_id` = `visit`.`visit_id`))) order by `visit`.`patient_id`,`visit`.`visit_date`,`visit`.`visit_time`;

-- --------------------------------------------------------

--
-- Structure for view `nu_view_visit_treatments`
--
DROP TABLE IF EXISTS `nu_view_visit_treatments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nu_view_visit_treatments` AS select `visit`.`visit_id` AS `visit_id`,`bill_detail`.`particular` AS `particular`,`bill_detail`.`type` AS `type` from ((`nu_visit` `visit` left join `nu_bill` `bill` on((`bill`.`visit_id` = `visit`.`visit_id`))) left join `nu_bill_detail` `bill_detail` on((`bill_detail`.`bill_id` = `bill`.`bill_id`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nu_appointments`
--
ALTER TABLE `nu_appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `nu_bill`
--
ALTER TABLE `nu_bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `nu_bill_detail`
--
ALTER TABLE `nu_bill_detail`
  ADD PRIMARY KEY (`bill_detail_id`);

--
-- Indexes for table `nu_clinic`
--
ALTER TABLE `nu_clinic`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Indexes for table `nu_contacts`
--
ALTER TABLE `nu_contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `nu_contact_details`
--
ALTER TABLE `nu_contact_details`
  ADD PRIMARY KEY (`contact_detail_id`);

--
-- Indexes for table `nu_data`
--
ALTER TABLE `nu_data`
  ADD PRIMARY KEY (`ck_data_id`);

--
-- Indexes for table `nu_invoice`
--
ALTER TABLE `nu_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `nu_menu_access`
--
ALTER TABLE `nu_menu_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nu_modules`
--
ALTER TABLE `nu_modules`
  ADD PRIMARY KEY (`module_id`), ADD UNIQUE KEY `module_name` (`module_name`);

--
-- Indexes for table `nu_navigation_menu`
--
ALTER TABLE `nu_navigation_menu`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `menu_name` (`menu_name`);

--
-- Indexes for table `nu_patient`
--
ALTER TABLE `nu_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `nu_payment`
--
ALTER TABLE `nu_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `nu_payment_transaction`
--
ALTER TABLE `nu_payment_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `nu_receipt_template`
--
ALTER TABLE `nu_receipt_template`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `nu_todos`
--
ALTER TABLE `nu_todos`
  ADD PRIMARY KEY (`id_num`);

--
-- Indexes for table `nu_users`
--
ALTER TABLE `nu_users`
  ADD PRIMARY KEY (`userid`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `nu_user_categories`
--
ALTER TABLE `nu_user_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nu_visit`
--
ALTER TABLE `nu_visit`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nu_appointments`
--
ALTER TABLE `nu_appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `nu_bill`
--
ALTER TABLE `nu_bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `nu_bill_detail`
--
ALTER TABLE `nu_bill_detail`
  MODIFY `bill_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `nu_contacts`
--
ALTER TABLE `nu_contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `nu_contact_details`
--
ALTER TABLE `nu_contact_details`
  MODIFY `contact_detail_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nu_data`
--
ALTER TABLE `nu_data`
  MODIFY `ck_data_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nu_invoice`
--
ALTER TABLE `nu_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nu_menu_access`
--
ALTER TABLE `nu_menu_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nu_modules`
--
ALTER TABLE `nu_modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nu_navigation_menu`
--
ALTER TABLE `nu_navigation_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `nu_patient`
--
ALTER TABLE `nu_patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `nu_payment`
--
ALTER TABLE `nu_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nu_payment_transaction`
--
ALTER TABLE `nu_payment_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nu_receipt_template`
--
ALTER TABLE `nu_receipt_template`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nu_todos`
--
ALTER TABLE `nu_todos`
  MODIFY `id_num` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nu_users`
--
ALTER TABLE `nu_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nu_user_categories`
--
ALTER TABLE `nu_user_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nu_visit`
--
ALTER TABLE `nu_visit`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
