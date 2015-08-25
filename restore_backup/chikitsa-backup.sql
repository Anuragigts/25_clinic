#
# TABLE STRUCTURE FOR: ck_appointment_log
#

DROP TABLE IF EXISTS `ck_appointment_log`;

CREATE TABLE `ck_appointment_log` (
  `appointment_id` int(11) NOT NULL,
  `change_date_time` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `from_time` time NOT NULL,
  `to_time` time NOT NULL,
  `old_status` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('1', '01/08/2015 09:48:08', '09:00:00', '09:48:08', '10:03:54', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('1', '01/08/2015 10:03:54', '09:00:00', '10:03:54', '00:00:00', 'Appointments', 'Consultation', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('2', '02/08/2015 07:39:30', '09:00:00', '07:39:30', '07:39:35', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('2', '02/08/2015 07:39:35', '09:00:00', '07:39:35', '00:00:00', 'Appointments', 'Consultation', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('3', '03/08/2015 17:17:02', '09:00:00', '17:17:02', '17:17:18', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('3', '03/08/2015 17:17:18', '09:00:00', '17:17:18', '00:00:00', 'Appointments', 'Consultation', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('4', '04/08/2015 13:52:50', '09:00:00', '13:52:50', '13:52:55', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('4', '04/08/2015 13:52:55', '09:00:00', '13:52:55', '19:04:48', 'Appointments', 'Consultation', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('5', '04/08/2015 14:59:12', '01:00:00', '14:59:12', '00:00:00', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('6', '04/08/2015 15:06:03', '10:30:00', '15:06:03', '00:00:00', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('7', '04/08/2015 15:06:32', '11:00:00', '15:06:32', '00:00:00', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('8', '04/08/2015 15:07:16', '09:30:00', '15:07:16', '00:00:00', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('9', '04/08/2015 15:10:48', '10:00:00', '15:10:48', '00:00:00', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('1', '04/08/2015 15:14:53', '09:30:00', '15:14:53', '00:00:00', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('2', '04/08/2015 15:15:00', '10:00:00', '15:15:00', '00:00:00', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('3', '04/08/2015 15:15:14', '10:30:00', '15:15:14', '00:00:00', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('4', '10/08/2015 19:04:43', '09:00:00', '19:04:43', '19:04:48', ' ', 'Appointment', 'Administrator');
INSERT INTO `ck_appointment_log` (`appointment_id`, `change_date_time`, `start_time`, `from_time`, `to_time`, `old_status`, `status`, `name`) VALUES ('4', '10/08/2015 19:04:48', '09:00:00', '19:04:48', '00:00:00', 'Appointments', 'Consultation', 'Administrator');


#
# TABLE STRUCTURE FOR: ck_appointments
#

DROP TABLE IF EXISTS `ck_appointments`;

CREATE TABLE `ck_appointments` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `title` varchar(150) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `visit_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `ck_appointments` (`appointment_id`, `appointment_date`, `end_date`, `start_time`, `end_time`, `title`, `patient_id`, `userid`, `status`, `visit_id`) VALUES ('1', '2015-08-04', NULL, '09:30:00', '10:00:00', 'Dhaval  Shah', '6', '4', 'Appointments', '0');
INSERT INTO `ck_appointments` (`appointment_id`, `appointment_date`, `end_date`, `start_time`, `end_time`, `title`, `patient_id`, `userid`, `status`, `visit_id`) VALUES ('2', '2015-08-04', NULL, '10:00:00', '10:30:00', 'Pooja  Shah', '9', '5', 'Appointments', '0');
INSERT INTO `ck_appointments` (`appointment_id`, `appointment_date`, `end_date`, `start_time`, `end_time`, `title`, `patient_id`, `userid`, `status`, `visit_id`) VALUES ('3', '2015-08-04', NULL, '10:30:00', '11:00:00', 'Mahesh Shah', '11', '4', 'Appointments', '0');
INSERT INTO `ck_appointments` (`appointment_id`, `appointment_date`, `end_date`, `start_time`, `end_time`, `title`, `patient_id`, `userid`, `status`, `visit_id`) VALUES ('4', '2015-08-10', NULL, '09:00:00', '09:30:00', 'Dhara  Shah', '5', '4', 'Consultation', '0');


#
# TABLE STRUCTURE FOR: ck_bill
#

DROP TABLE IF EXISTS `ck_bill`;

CREATE TABLE `ck_bill` (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `due_amount` decimal(11,2) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `ck_bill` (`bill_id`, `bill_date`, `patient_id`, `visit_id`, `total_amount`, `due_amount`) VALUES ('1', '2015-08-02', '5', '13', '500', '300.00');
INSERT INTO `ck_bill` (`bill_id`, `bill_date`, `patient_id`, `visit_id`, `total_amount`, `due_amount`) VALUES ('2', '2015-08-02', '5', '14', '0', '0.00');
INSERT INTO `ck_bill` (`bill_id`, `bill_date`, `patient_id`, `visit_id`, `total_amount`, `due_amount`) VALUES ('3', '2015-08-02', '5', '15', '0', '0.00');


#
# TABLE STRUCTURE FOR: ck_bill_detail
#

DROP TABLE IF EXISTS `ck_bill_detail`;

CREATE TABLE `ck_bill_detail` (
  `bill_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `bill_id` int(11) NOT NULL,
  `particular` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `type` varchar(25) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bill_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `ck_bill_detail` (`bill_detail_id`, `item_id`, `bill_id`, `particular`, `amount`, `quantity`, `mrp`, `type`, `purchase_id`) VALUES ('1', NULL, '1', 'Test', '150.00', '1', '150.00', 'particular', NULL);
INSERT INTO `ck_bill_detail` (`bill_detail_id`, `item_id`, `bill_id`, `particular`, `amount`, `quantity`, `mrp`, `type`, `purchase_id`) VALUES ('11', '1', '1', 'Soframicine', '350.00', '7', '50.00', 'item', NULL);


#
# TABLE STRUCTURE FOR: ck_clinic
#

DROP TABLE IF EXISTS `ck_clinic`;

CREATE TABLE `ck_clinic` (
  `clinic_id` int(11) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `time_interval` decimal(11,2) NOT NULL DEFAULT '0.50',
  `clinic_name` varchar(50) DEFAULT NULL,
  `tag_line` varchar(100) DEFAULT NULL,
  `clinic_address` varchar(500) DEFAULT NULL,
  `landline` varchar(50) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `google_plus` varchar(50) DEFAULT NULL,
  `next_followup_days` int(11) NOT NULL DEFAULT '15'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ck_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES ('1', '09:00 AM', '06:00 PM', '0.50', 'Chikitsa', 'Patient Management System', '2/894-95, Navsarjan Hospital, Sagrampura, Surat', '0261-6554433', '9428579989', 'dhara@sanskrutitech.in', '#', '#', '#', '15');
INSERT INTO `ck_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES ('1', '09:00 AM', '06:00 PM', '0.50', 'Chikitsa', 'Patient Management System', '2/894-95, Navsarjan Hospital, Sagrampura, Surat', '0261-6554433', '9428579989', 'dhara@sanskrutitech.in', '#', '#', '#', '15');
INSERT INTO `ck_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES ('1', '09:00 AM', '06:00 PM', '0.50', 'Chikitsa', 'Patient Management System', '2/894-95, Navsarjan Hospital, Sagrampura, Surat', '0261-6554433', '9428579989', 'dhara@sanskrutitech.in', '#', '#', '#', '15');
INSERT INTO `ck_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES ('1', '09:00 AM', '06:00 PM', '0.50', 'Chikitsa', 'Patient Management System', '2/894-95, Navsarjan Hospital, Sagrampura, Surat', '0261-6554433', '9428579989', 'dhara@sanskrutitech.in', '#', '#', '#', '15');
INSERT INTO `ck_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES ('1', '09:00 AM', '06:00 PM', '0.50', 'Chikitsa', 'Patient Management System', '2/894-95, Navsarjan Hospital, Sagrampura, Surat', '0261-6554433', '9428579989', 'dhara@sanskrutitech.in', '#', '#', '#', '15');
INSERT INTO `ck_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES ('1', '09:00 AM', '06:00 PM', '0.50', 'Chikitsa', 'Patient Management System', '2/894-95, Navsarjan Hospital, Sagrampura, Surat', '0261-6554433', '9428579989', 'dhara@sanskrutitech.in', '#', '#', '#', '15');
INSERT INTO `ck_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES ('1', '09:00 AM', '06:00 PM', '0.50', 'Chikitsa', 'Patient Management System', '2/894-95, Navsarjan Hospital, Sagrampura, Surat', '0261-6554433', '9428579989', 'dhara@sanskrutitech.in', '#', '#', '#', '15');
INSERT INTO `ck_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES ('1', '09:00 AM', '06:00 PM', '0.50', 'Chikitsa', 'Patient Management System', '2/894-95, Navsarjan Hospital, Sagrampura, Surat', '0261-6554433', '9428579989', 'dhara@sanskrutitech.in', '#', '#', '#', '15');
INSERT INTO `ck_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES ('1', '09:00 AM', '06:00 PM', '0.50', 'Chikitsa', 'Patient Management System', '2/894-95, Navsarjan Hospital, Sagrampura, Surat', '0261-6554433', '9428579989', 'dhara@sanskrutitech.in', '#', '#', '#', '15');
INSERT INTO `ck_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES ('1', '09:00 AM', '06:00 PM', '0.50', 'Chikitsa', 'Patient Management System', '2/894-95, Navsarjan Hospital, Sagrampura, Surat', '0261-6554433', '9428579989', 'dhara@sanskrutitech.in', '#', '#', '#', '15');
INSERT INTO `ck_clinic` (`clinic_id`, `start_time`, `end_time`, `time_interval`, `clinic_name`, `tag_line`, `clinic_address`, `landline`, `mobile`, `email`, `facebook`, `twitter`, `google_plus`, `next_followup_days`) VALUES ('1', '09:00 AM', '06:00 PM', '0.50', 'Chikitsa', 'Patient Management System', '2/894-95, Navsarjan Hospital, Sagrampura, Surat', '0261-6554433', '9428579989', 'dhara@sanskrutitech.in', '#', '#', '#', '15');


#
# TABLE STRUCTURE FOR: ck_contact_details
#

DROP TABLE IF EXISTS `ck_contact_details`;

CREATE TABLE `ck_contact_details` (
  `contact_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `detail` varchar(150) NOT NULL,
  PRIMARY KEY (`contact_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: ck_contacts
#

DROP TABLE IF EXISTS `ck_contacts`;

CREATE TABLE `ck_contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact_image` varchar(255) NOT NULL DEFAULT 'images/Profile.png',
  `type` varchar(50) NOT NULL,
  `address_line_1` varchar(150) NOT NULL,
  `address_line_2` varchar(150) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('1', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('2', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('3', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('4', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('5', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('6', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('7', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('8', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('9', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('10', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('11', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('12', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('13', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('14', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('15', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('16', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('17', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('18', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('19', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('20', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('21', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('22', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('23', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('24', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('25', 'Dhara', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('30', 'Dhara', NULL, 'Shah', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('31', 'Dhaval', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('32', 'Birva', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('33', 'Dharmesh', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('34', 'Pooja', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('35', 'Hetal', NULL, 'Modi', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');
INSERT INTO `ck_contacts` (`contact_id`, `first_name`, `middle_name`, `last_name`, `display_name`, `phone_number`, `email`, `contact_image`, `type`, `address_line_1`, `address_line_2`, `city`, `state`, `postal_code`, `country`) VALUES ('36', 'Mahesh', NULL, 'Shah', '', '', '', 'images/Profile.png', '', '', '', '', '', '', '');


#
# TABLE STRUCTURE FOR: ck_data
#

DROP TABLE IF EXISTS `ck_data`;

CREATE TABLE `ck_data` (
  `ck_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `ck_key` varchar(50) NOT NULL DEFAULT '',
  `ck_value` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`ck_data_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO `ck_data` (`ck_data_id`, `ck_key`, `ck_value`) VALUES ('1', 'default_language', 'english');
INSERT INTO `ck_data` (`ck_data_id`, `ck_key`, `ck_value`) VALUES ('2', 'default_timezone', 'Asia/Calcutta');
INSERT INTO `ck_data` (`ck_data_id`, `ck_key`, `ck_value`) VALUES ('3', 'default_timeformate', 'h:i A');
INSERT INTO `ck_data` (`ck_data_id`, `ck_key`, `ck_value`) VALUES ('4', 'default_dateformate', 'd-m-Y');


#
# TABLE STRUCTURE FOR: ck_invoice
#

DROP TABLE IF EXISTS `ck_invoice`;

CREATE TABLE `ck_invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `static_prefix` varchar(10) NOT NULL,
  `left_pad` int(11) NOT NULL,
  `next_id` int(11) NOT NULL,
  `currency_symbol` varchar(10) NOT NULL,
  `currency_postfix` char(10) NOT NULL DEFAULT '/-',
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `ck_invoice` (`invoice_id`, `static_prefix`, `left_pad`, `next_id`, `currency_symbol`, `currency_postfix`) VALUES ('1', 'I', '2', '1', 'Rs.', '/-');


#
# TABLE STRUCTURE FOR: ck_item
#

DROP TABLE IF EXISTS `ck_item`;

CREATE TABLE `ck_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `desired_stock` int(11) DEFAULT NULL,
  `mrp` float(11,2) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `ck_item` (`item_id`, `item_name`, `desired_stock`, `mrp`) VALUES ('1', 'Soframicine', '10', '50.00');
INSERT INTO `ck_item` (`item_id`, `item_name`, `desired_stock`, `mrp`) VALUES ('2', 'Serene Shampoo', '10', '100.00');


#
# TABLE STRUCTURE FOR: ck_modules
#

DROP TABLE IF EXISTS `ck_modules`;

CREATE TABLE `ck_modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(50) NOT NULL,
  `module_display_name` varchar(50) NOT NULL,
  `module_description` varchar(150) NOT NULL,
  `module_status` int(1) NOT NULL,
  PRIMARY KEY (`module_id`),
  UNIQUE KEY `module_name` (`module_name`),
  UNIQUE KEY `module_name_2` (`module_name`),
  UNIQUE KEY `module_name_3` (`module_name`),
  UNIQUE KEY `module_name_4` (`module_name`),
  UNIQUE KEY `module_name_5` (`module_name`),
  UNIQUE KEY `module_name_6` (`module_name`),
  UNIQUE KEY `module_name_7` (`module_name`),
  UNIQUE KEY `module_name_8` (`module_name`),
  UNIQUE KEY `module_name_9` (`module_name`),
  UNIQUE KEY `module_name_10` (`module_name`),
  UNIQUE KEY `module_name_11` (`module_name`),
  UNIQUE KEY `module_name_12` (`module_name`),
  UNIQUE KEY `module_name_13` (`module_name`),
  UNIQUE KEY `module_name_14` (`module_name`),
  UNIQUE KEY `module_name_15` (`module_name`),
  UNIQUE KEY `module_name_16` (`module_name`),
  UNIQUE KEY `module_name_17` (`module_name`),
  UNIQUE KEY `module_name_18` (`module_name`),
  UNIQUE KEY `module_name_19` (`module_name`),
  UNIQUE KEY `module_name_20` (`module_name`),
  UNIQUE KEY `module_name_21` (`module_name`),
  UNIQUE KEY `module_name_22` (`module_name`),
  UNIQUE KEY `module_name_23` (`module_name`),
  UNIQUE KEY `module_name_24` (`module_name`),
  UNIQUE KEY `module_name_25` (`module_name`),
  UNIQUE KEY `module_name_26` (`module_name`),
  UNIQUE KEY `module_name_27` (`module_name`),
  UNIQUE KEY `module_name_28` (`module_name`),
  UNIQUE KEY `module_name_29` (`module_name`),
  UNIQUE KEY `module_name_30` (`module_name`),
  UNIQUE KEY `module_name_31` (`module_name`),
  UNIQUE KEY `module_name_32` (`module_name`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

INSERT INTO `ck_modules` (`module_id`, `module_name`, `module_display_name`, `module_description`, `module_status`) VALUES ('1', 'stock', 'Medicine Store', 'Manage Medicine Stock, Purchase and Sell', '1');
INSERT INTO `ck_modules` (`module_id`, `module_name`, `module_display_name`, `module_description`, `module_status`) VALUES ('15', 'rooms', 'Room Allocations', 'Allocation of rooms and beds.', '0');
INSERT INTO `ck_modules` (`module_id`, `module_name`, `module_display_name`, `module_description`, `module_status`) VALUES ('16', 'menu_access', 'Menu Access', 'User access system module', '0');
INSERT INTO `ck_modules` (`module_id`, `module_name`, `module_display_name`, `module_description`, `module_status`) VALUES ('17', 'transport', 'Transport', 'Transport Management', '0');
INSERT INTO `ck_modules` (`module_id`, `module_name`, `module_display_name`, `module_description`, `module_status`) VALUES ('20', 'template', 'Receipt Template', 'Receipt Template', '0');
INSERT INTO `ck_modules` (`module_id`, `module_name`, `module_display_name`, `module_description`, `module_status`) VALUES ('21', 'marking', 'Marking', 'Mark Face and Body Areas for Treatment Areas', '0');
INSERT INTO `ck_modules` (`module_id`, `module_name`, `module_display_name`, `module_description`, `module_status`) VALUES ('22', 'gallery', 'Gallery', 'Compare before and after pictures of patient', '0');


#
# TABLE STRUCTURE FOR: ck_navigation_menu
#

DROP TABLE IF EXISTS `ck_navigation_menu`;

CREATE TABLE `ck_navigation_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(250) DEFAULT NULL,
  `parent_name` varchar(250) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_url` varchar(500) DEFAULT NULL,
  `menu_icon` varchar(100) DEFAULT NULL,
  `menu_text` varchar(200) DEFAULT NULL,
  `required_module` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_name` (`menu_name`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=latin1;

INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('1', 'patients', '', '100', 'patient/index', 'fa-users', 'Patients', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('2', 'all_patients', 'patients', '0', 'patient/index', NULL, 'All Patients', NULL);
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('3', 'new_inquiry', 'patients', '200', 'patient/new_inquiry_report', NULL, 'New Inquiries', NULL);
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('4', 'appointments', '', '200', 'appointment/index', 'fa-calendar', 'Appointments', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('5', 'reports', '', '400', '#', 'fa-line-chart', 'Reports', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('6', 'administration', '', '500', '#', 'fa-cog', 'Administration', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('7', 'modules', '', '600', 'module/index', 'fa-shopping-cart', 'Modules', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('8', 'appointment report', 'reports', '100', 'appointment/appointment_report', '', 'Appointment Report', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('9', 'bill report', 'reports', '300', 'patient/bill_detail_report', '', 'Bill Detail Report', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('10', 'clinic detail', 'administration', '100', 'settings/clinic', '', 'Clinic Detail', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('11', 'invoice setting', 'administration', '200', 'settings/invoice', '', 'Invoice', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('12', 'users', 'administration', '300', 'admin/users', '', 'Users', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('13', 'setting', 'administration', '500', 'settings/change_settings', '', 'Setting', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('14', 'payment', '', '300', 'payment/index', 'fa-money', 'Payments', '');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('19', 'user_manage', 'users', '100', 'admin/users', '', 'User', NULL);
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('25', 'stock_stock_report', 'stock', '500', 'stock/stock_report', '', 'Stock Report', 'stock');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('65', 'transport', '', '250', 'transport/index', 'fa-bus', 'Transport', 'transport');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('74', 'receipt_template', 'administration', '500', 'template/index', NULL, 'Receipt Templates', 'template');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('193', 'stock', '', '460', 'stock', 'fa-medkit', 'Stock', 'stock');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('194', 'stock_item', 'stock', '100', 'stock/item', '', 'Items', 'stock');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('195', 'stock_supplier', 'stock', '200', 'stock/supplier', '', 'Suppliers', 'stock');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('196', 'stock_purchase', 'stock', '300', 'stock/purchase', '', 'Purchase', 'stock');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('197', 'stock_sell', 'stock', '400', 'stock/sell', '', 'Sell', 'stock');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('198', 'stock_all_sell', 'stock', '450', 'stock/all_sell', '', 'All Sell', 'stock');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('200', 'stock_purchase_report', 'stock', '600', 'stock/purchase_report', '', 'Purchase Report', 'stock');
INSERT INTO `ck_navigation_menu` (`id`, `menu_name`, `parent_name`, `menu_order`, `menu_url`, `menu_icon`, `menu_text`, `required_module`) VALUES ('201', 'backup', 'administration', '600', 'settings/backup', NULL, 'Backup', NULL);


#
# TABLE STRUCTURE FOR: ck_patient
#

DROP TABLE IF EXISTS `ck_patient`;

CREATE TABLE `ck_patient` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) NOT NULL,
  `patient_since` date NOT NULL,
  `display_id` varchar(12) NOT NULL,
  `followup_date` date NOT NULL,
  `reference_by` varchar(255) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `ck_patient` (`patient_id`, `contact_id`, `patient_since`, `display_id`, `followup_date`, `reference_by`) VALUES ('5', '30', '2015-07-28', 'S00005', '0000-00-00', '');
INSERT INTO `ck_patient` (`patient_id`, `contact_id`, `patient_since`, `display_id`, `followup_date`, `reference_by`) VALUES ('6', '31', '2015-08-04', 'S00006', '0000-00-00', '');
INSERT INTO `ck_patient` (`patient_id`, `contact_id`, `patient_since`, `display_id`, `followup_date`, `reference_by`) VALUES ('7', '32', '2015-08-04', 'S00007', '0000-00-00', '');
INSERT INTO `ck_patient` (`patient_id`, `contact_id`, `patient_since`, `display_id`, `followup_date`, `reference_by`) VALUES ('8', '33', '2015-08-04', 'S00008', '0000-00-00', '');
INSERT INTO `ck_patient` (`patient_id`, `contact_id`, `patient_since`, `display_id`, `followup_date`, `reference_by`) VALUES ('9', '34', '2015-08-04', 'S00009', '0000-00-00', '');
INSERT INTO `ck_patient` (`patient_id`, `contact_id`, `patient_since`, `display_id`, `followup_date`, `reference_by`) VALUES ('10', '35', '2015-08-04', 'M00010', '0000-00-00', '');
INSERT INTO `ck_patient` (`patient_id`, `contact_id`, `patient_since`, `display_id`, `followup_date`, `reference_by`) VALUES ('11', '36', '2015-08-04', 'S00011', '0000-00-00', '');


#
# TABLE STRUCTURE FOR: ck_payment
#

DROP TABLE IF EXISTS `ck_payment`;

CREATE TABLE `ck_payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `pay_amount` decimal(11,2) DEFAULT NULL,
  `payment_date` date NOT NULL,
  `pay_mode` varchar(25) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO `ck_payment` (`payment_id`, `bill_id`, `patient_id`, `pay_amount`, `payment_date`, `pay_mode`) VALUES ('17', '1', '5', '200.00', '2015-08-04', 'cash');


#
# TABLE STRUCTURE FOR: ck_payment_transaction
#

DROP TABLE IF EXISTS `ck_payment_transaction`;

CREATE TABLE `ck_payment_transaction` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: ck_purchase
#

DROP TABLE IF EXISTS `ck_purchase`;

CREATE TABLE `ck_purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_date` date DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `cost_price` decimal(10,0) DEFAULT NULL,
  `remain_quantity` int(11) NOT NULL,
  `bill_no` varchar(255) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `ck_purchase` (`purchase_id`, `purchase_date`, `item_id`, `quantity`, `supplier_id`, `cost_price`, `remain_quantity`, `bill_no`) VALUES ('1', '2015-08-13', '1', '10', '1', '45', '10', '145');
INSERT INTO `ck_purchase` (`purchase_id`, `purchase_date`, `item_id`, `quantity`, `supplier_id`, `cost_price`, `remain_quantity`, `bill_no`) VALUES ('2', '2015-08-13', '2', '10', '1', '85', '10', '145');


#
# TABLE STRUCTURE FOR: ck_receipt_template
#

DROP TABLE IF EXISTS `ck_receipt_template`;

CREATE TABLE `ck_receipt_template` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template` text NOT NULL,
  `is_default` int(1) NOT NULL,
  `template_name` varchar(25) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO `ck_receipt_template` (`template_id`, `template`, `is_default`, `template_name`, `type`) VALUES ('1', '<h1 style=\"text-align:center;\">[clinic_name]</h1><h2 style=\"text-align:center;\">[tag_line]</h2><p style=\"text-align:center;\">[clinic_address]</p><span class=\"contact\"><p style=\"text-align: center;\"><b style=\"line-height: 1.42857143;\">Landline : </b><span style=\"line-height: 1.42857143;\">[landline] &nbsp;</span><b style=\"line-height: 1.42857143;\">Mobile : </b><span style=\"line-height: 1.42857143;\">[mobile] &nbsp;</span><b style=\"line-height: 1.42857143;\">Email : </b><span style=\"text-align: center;\"> [email]</span></p></span><hr id=\"null\"><h3 style=\"text-align: center;\"><u style=\"text-align: center;\">RECEIPT</u></h3><span style=\"text-align: left;\"><b>Date : </b>[bill_date]</span><span style=\"float: right;\"><b>Receipt Number :</b> [bill_id]</span><p style=\"text-align: left;\"><b style=\"text-align: left;\">Patient Name: </b><span style=\"text-align: left;\">[patient_name]<br></span></p><hr id=\"null\" style=\"text-align: left;\">Received fees for Professional services and other charges of our:<p><br></p>[col:particular|quantity|mrp|amount]<table style=\"width: 100%;margin-top: 25px;margin-bottom: 25px;border-collapse: collapse;border:1px;\"><thead><tr><td style=\"width: 400px;text-align: left;\"><b style=\"width: 400px;text-align: left;\">Item</b></td><td><b>Quantity</b></td><td style=\"width: 100px;text-align:right;\"><b>M.R.P.</b></td><td style=\"width: 100px;text-align:right;\"><b>Amount</b></td></tr></thead><tbody><tr><td colspan=\"3\">Previous Due</td><td style=\"text-align:right;\"><b>[previous_due]</b></td></tr><tr><td colspan=\"3\">Total</td><td style=\"text-align:right;\"><b>[total]</b></td></tr><tr><td colspan=\"3\">Paid Amount</td><td style=\"text-align:right;\">[paid_amount]</td></tr></tbody></table>Received with Thanks,<p>For [clinic_name]</p><p><br></p><p>Signature<br></p>', '1', 'Main', 'bill');
INSERT INTO `ck_receipt_template` (`template_id`, `template`, `is_default`, `template_name`, `type`) VALUES ('2', '<h1 style=\"text-align:center;\">[clinic_name]</h1><p style=\"text-align:center;\">[clinic_address]</p><p style=\"text-align:center;\">[landline]</p><hr><p style=\"text-align:center;\"><span><b>Date :</b>[bill_date]</span></p><br><br><table style=\"margin:0 auto;\"><thead><tr><th style=\"text-align:left;\">Item</th><th style=\"text-align:left;\">Quantity</th><th style=\"text-align:left;\">Price</th><th style=\"text-align:left;\">Amount</th></tr></thead><tbody>[col:item_name|quantity|sell_price|sell_amount]</tbody><tfoot><tr><th colspan=\"3\" style=\"text-align:left;\">Total</th><th>[total]</th></tr></tfoot></table><hr/>', '1', 'Main', 'sell');
INSERT INTO `ck_receipt_template` (`template_id`, `template`, `is_default`, `template_name`, `type`) VALUES ('4', 'Test', '1', 'Main', 'sell');
INSERT INTO `ck_receipt_template` (`template_id`, `template`, `is_default`, `template_name`, `type`) VALUES ('5', 'Test', '1', 'Main', 'sell');
INSERT INTO `ck_receipt_template` (`template_id`, `template`, `is_default`, `template_name`, `type`) VALUES ('6', 'Test', '1', 'Main', 'sell');
INSERT INTO `ck_receipt_template` (`template_id`, `template`, `is_default`, `template_name`, `type`) VALUES ('7', 'Test', '1', 'Main', 'sell');
INSERT INTO `ck_receipt_template` (`template_id`, `template`, `is_default`, `template_name`, `type`) VALUES ('8', 'Test', '1', 'Main', 'sell');


#
# TABLE STRUCTURE FOR: ck_sell
#

DROP TABLE IF EXISTS `ck_sell`;

CREATE TABLE `ck_sell` (
  `sell_id` int(11) NOT NULL AUTO_INCREMENT,
  `sell_date` date NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_id` int(11) NOT NULL,
  `sell_amount` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `ck_sell` (`sell_id`, `sell_date`, `patient_id`, `visit_id`, `sell_amount`) VALUES ('1', '2015-08-13', '5', '0', '150');
INSERT INTO `ck_sell` (`sell_id`, `sell_date`, `patient_id`, `visit_id`, `sell_amount`) VALUES ('2', '2015-08-13', '7', '0', '50');


#
# TABLE STRUCTURE FOR: ck_sell_detail
#

DROP TABLE IF EXISTS `ck_sell_detail`;

CREATE TABLE `ck_sell_detail` (
  `sell_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `sell_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sell_price` decimal(10,0) DEFAULT NULL,
  `sell_amount` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`sell_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `ck_sell_detail` (`sell_detail_id`, `sell_id`, `item_id`, `quantity`, `sell_price`, `sell_amount`) VALUES ('1', '1', '1', '1', '50', '50');
INSERT INTO `ck_sell_detail` (`sell_detail_id`, `sell_id`, `item_id`, `quantity`, `sell_price`, `sell_amount`) VALUES ('2', '1', '2', '1', '100', '100');
INSERT INTO `ck_sell_detail` (`sell_detail_id`, `sell_id`, `item_id`, `quantity`, `sell_price`, `sell_amount`) VALUES ('3', '2', '1', '1', '50', '50');


#
# TABLE STRUCTURE FOR: ck_supplier
#

DROP TABLE IF EXISTS `ck_supplier`;

CREATE TABLE `ck_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `ck_supplier` (`supplier_id`, `supplier_name`, `contact_number`) VALUES ('1', 'Dhaval Shah', '9896589965');


#
# TABLE STRUCTURE FOR: ck_todos
#

DROP TABLE IF EXISTS `ck_todos`;

CREATE TABLE `ck_todos` (
  `id_num` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT '0',
  `todo` varchar(250) DEFAULT NULL,
  `done` int(11) DEFAULT '0',
  `add_date` datetime DEFAULT NULL,
  `done_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: ck_transport
#

DROP TABLE IF EXISTS `ck_transport`;

CREATE TABLE `ck_transport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `patient_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `height` varchar(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `appointment_prepared_by` varchar(50) NOT NULL,
  `transportation_set_up_by` varchar(100) NOT NULL,
  `current_diagnosis` varchar(100) NOT NULL,
  `type_of_appointment` varchar(100) NOT NULL,
  `person_spoke_appointment` varchar(100) NOT NULL,
  `name_of_building_destination` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `suite` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `paperwork_needed` varchar(100) NOT NULL,
  `person_spoke_transport` varchar(100) NOT NULL,
  `pick_up_time` varchar(25) NOT NULL,
  `insurance_info` varchar(500) NOT NULL,
  `special_accommodations` varchar(500) NOT NULL,
  `transport_company` varchar(25) NOT NULL,
  `type_of_transport` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `ck_transport` (`id`, `appointment_date`, `appointment_time`, `patient_id`, `userid`, `status`, `height`, `weight`, `appointment_prepared_by`, `transportation_set_up_by`, `current_diagnosis`, `type_of_appointment`, `person_spoke_appointment`, `name_of_building_destination`, `address`, `suite`, `city`, `zip`, `phone`, `fax`, `paperwork_needed`, `person_spoke_transport`, `pick_up_time`, `insurance_info`, `special_accommodations`, `transport_company`, `type_of_transport`) VALUES ('3', '2015-08-09', '12:30:00', '7', '4', 'Transport', '150', '50', 'Administrator', 'Dhara Shah', 'Current Diagnosis', 'Type of Appointment', 'Dhaval Shah', 'Sanskruti Technologies', '2/894-95, Behind Navsarjan Hospital,', 'Sagrampura,', 'Surat', '395002', '09428579989', '0261-6554433', 'Paper work', 'Dhara Shah', '12:00:00', 'None', ' Na', 'pro_transport', 'bls');
INSERT INTO `ck_transport` (`id`, `appointment_date`, `appointment_time`, `patient_id`, `userid`, `status`, `height`, `weight`, `appointment_prepared_by`, `transportation_set_up_by`, `current_diagnosis`, `type_of_appointment`, `person_spoke_appointment`, `name_of_building_destination`, `address`, `suite`, `city`, `zip`, `phone`, `fax`, `paperwork_needed`, `person_spoke_transport`, `pick_up_time`, `insurance_info`, `special_accommodations`, `transport_company`, `type_of_transport`) VALUES ('4', '2015-08-09', '12:30:00', '7', '4', 'Transport', '150', '50', 'Administrator', 'Dhara Shah', 'Current Diagnosis', 'Type of Appointment', 'Dhaval Shah', 'Sanskruti Technologies', '2/894-95, Behind Navsarjan Hospital,', 'Sagrampura,', 'Surat', '395002', '09428579989', '0261-6554433', 'Paper work', 'Dhara Shah', '12:00:00', 'None', ' Na', 'pro_transport', 'bls');


#
# TABLE STRUCTURE FOR: ck_user_categories
#

DROP TABLE IF EXISTS `ck_user_categories`;

CREATE TABLE `ck_user_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO `ck_user_categories` (`id`, `category_name`) VALUES ('1', 'Administrator');
INSERT INTO `ck_user_categories` (`id`, `category_name`) VALUES ('2', 'Doctor');
INSERT INTO `ck_user_categories` (`id`, `category_name`) VALUES ('3', 'Receptionist');
INSERT INTO `ck_user_categories` (`id`, `category_name`) VALUES ('33', 'Test');


#
# TABLE STRUCTURE FOR: ck_users
#

DROP TABLE IF EXISTS `ck_users`;

CREATE TABLE `ck_users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `ck_users` (`userid`, `name`, `username`, `password`, `level`, `is_active`) VALUES ('1', 'Administrator', 'admin', 'YWRtaW4=', 'Administrator', '1');
INSERT INTO `ck_users` (`userid`, `name`, `username`, `password`, `level`, `is_active`) VALUES ('3', 'Dhara Shah', 'dhara', 'ZGhhcmE=', 'Receptionist', '1');
INSERT INTO `ck_users` (`userid`, `name`, `username`, `password`, `level`, `is_active`) VALUES ('4', 'Rinkle', 'rinkle', 'cmlua2xl', 'Doctor', '1');
INSERT INTO `ck_users` (`userid`, `name`, `username`, `password`, `level`, `is_active`) VALUES ('5', 'Dr. Mahesh Shah', 'mahesh', 'bWFoZXNo', 'Doctor', '1');
INSERT INTO `ck_users` (`userid`, `name`, `username`, `password`, `level`, `is_active`) VALUES ('6', 'test123', 'test123', 'dGVzdDEyMw==', 'Test', '1');


#
# TABLE STRUCTURE FOR: ck_version
#

DROP TABLE IF EXISTS `ck_version`;

CREATE TABLE `ck_version` (
  `current_version` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ck_version` (`current_version`) VALUES ('0.1.9');


#
# TABLE STRUCTURE FOR: ck_view_available_stock
#

DROP TABLE IF EXISTS `ck_view_available_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_available_stock` AS select `item`.`item_id` AS `item_id`,`item`.`item_name` AS `item_name`,`item`.`desired_stock` AS `desired_stock`,`item`.`mrp` AS `mrp`,(ifnull((select sum(`purchase`.`quantity`) from `ck_purchase` `purchase` where (`item`.`item_id` = `purchase`.`item_id`)),0) - ifnull((select sum(`sell_detail`.`quantity`) from `ck_sell_detail` `sell_detail` where (`item`.`item_id` = `sell_detail`.`item_id`)),0)) AS `available_quantity` from `ck_item` `item`;

utf8_general_ci;

INSERT INTO `ck_view_available_stock` (`item_id`, `item_name`, `desired_stock`, `mrp`, `available_quantity`) VALUES ('1', 'Soframicine', '10', '50.00', '8');
INSERT INTO `ck_view_available_stock` (`item_id`, `item_name`, `desired_stock`, `mrp`, `available_quantity`) VALUES ('2', 'Serene Shampoo', '10', '100.00', '9');


#
# TABLE STRUCTURE FOR: ck_view_bill
#

DROP TABLE IF EXISTS `ck_view_bill`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_bill` AS select `bill`.`bill_id` AS `bill_id`,`bill`.`bill_date` AS `bill_date`,`bill`.`visit_id` AS `visit_id`,`users`.`name` AS `doctor_name`,`visit`.`userid` AS `userid`,`patient`.`patient_id` AS `patient_id`,`patient`.`display_id` AS `display_id`,`contacts`.`first_name` AS `first_name`,`contacts`.`middle_name` AS `middle_name`,`contacts`.`last_name` AS `last_name`,`bill`.`total_amount` AS `total_amount`,`bill`.`due_amount` AS `due_amount` from ((((`ck_bill` `bill` join `ck_visit` `visit` on((`bill`.`visit_id` = `visit`.`visit_id`))) join `ck_users` `users` on((`visit`.`userid` = `users`.`userid`))) join `ck_patient` `patient` on((`bill`.`patient_id` = `patient`.`patient_id`))) join `ck_contacts` `contacts` on((`contacts`.`contact_id` = `patient`.`contact_id`)));

latin1_swedish_ci;

INSERT INTO `ck_view_bill` (`bill_id`, `bill_date`, `visit_id`, `doctor_name`, `userid`, `patient_id`, `display_id`, `first_name`, `middle_name`, `last_name`, `total_amount`, `due_amount`) VALUES ('1', '2015-08-02', '13', 'Rinkle', '4', '5', 'S00005', 'Dhara', NULL, 'Shah', '500', '300.00');
INSERT INTO `ck_view_bill` (`bill_id`, `bill_date`, `visit_id`, `doctor_name`, `userid`, `patient_id`, `display_id`, `first_name`, `middle_name`, `last_name`, `total_amount`, `due_amount`) VALUES ('2', '2015-08-02', '14', 'Rinkle', '4', '5', 'S00005', 'Dhara', NULL, 'Shah', '0', '0.00');
INSERT INTO `ck_view_bill` (`bill_id`, `bill_date`, `visit_id`, `doctor_name`, `userid`, `patient_id`, `display_id`, `first_name`, `middle_name`, `last_name`, `total_amount`, `due_amount`) VALUES ('3', '2015-08-02', '15', 'Rinkle', '4', '5', 'S00005', 'Dhara', NULL, 'Shah', '0', '0.00');


#
# TABLE STRUCTURE FOR: ck_view_bill_detail_report
#

DROP TABLE IF EXISTS `ck_view_bill_detail_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_bill_detail_report` AS select `bill`.`bill_id` AS `bill_id`,`bill`.`bill_date` AS `bill_date`,`bill`.`visit_id` AS `visit_id`,`bill_detail`.`particular` AS `particular`,`bill_detail`.`amount` AS `amount`,`visit`.`userid` AS `userid`,concat(`view_patient`.`first_name`,' ',`view_patient`.`middle_name`,' ',`view_patient`.`last_name`) AS `patient_name`,`view_patient`.`display_id` AS `display_id`,`bill_detail`.`type` AS `type` from (((`ck_bill` `bill` left join `ck_bill_detail` `bill_detail` on((`bill_detail`.`bill_id` = `bill`.`bill_id`))) left join `ck_visit` `visit` on((`visit`.`visit_id` = `bill`.`visit_id`))) left join `ck_view_patient` `view_patient` on((`view_patient`.`patient_id` = `bill`.`patient_id`)));

latin1_swedish_ci;

INSERT INTO `ck_view_bill_detail_report` (`bill_id`, `bill_date`, `visit_id`, `particular`, `amount`, `userid`, `patient_name`, `display_id`, `type`) VALUES ('1', '2015-08-02', '13', 'Test', '150.00', '4', NULL, 'S00005', 'particular');
INSERT INTO `ck_view_bill_detail_report` (`bill_id`, `bill_date`, `visit_id`, `particular`, `amount`, `userid`, `patient_name`, `display_id`, `type`) VALUES ('1', '2015-08-02', '13', 'Soframicine', '350.00', '4', NULL, 'S00005', 'item');
INSERT INTO `ck_view_bill_detail_report` (`bill_id`, `bill_date`, `visit_id`, `particular`, `amount`, `userid`, `patient_name`, `display_id`, `type`) VALUES ('2', '2015-08-02', '14', NULL, NULL, '4', NULL, 'S00005', NULL);
INSERT INTO `ck_view_bill_detail_report` (`bill_id`, `bill_date`, `visit_id`, `particular`, `amount`, `userid`, `patient_name`, `display_id`, `type`) VALUES ('3', '2015-08-02', '15', NULL, NULL, '4', NULL, 'S00005', NULL);


#
# TABLE STRUCTURE FOR: ck_view_contact_email
#

DROP TABLE IF EXISTS `ck_view_contact_email`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_contact_email` AS select `ck_contact_details`.`contact_id` AS `contact_id`,`ck_contact_details`.`detail` AS `email` from `ck_contact_details` where (`ck_contact_details`.`type` = 'email');

latin1_swedish_ci;

#
# TABLE STRUCTURE FOR: ck_view_email
#

DROP TABLE IF EXISTS `ck_view_email`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_email` AS select `ck_contact_details`.`contact_id` AS `contact_id`,group_concat(`ck_contact_details`.`detail` separator ',') AS `emails` from `ck_contact_details` where (`ck_contact_details`.`type` = 'email') group by `ck_contact_details`.`contact_id`;

latin1_swedish_ci;

#
# TABLE STRUCTURE FOR: ck_view_patient
#

DROP TABLE IF EXISTS `ck_view_patient`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_patient` AS select `patient`.`patient_id` AS `patient_id`,`patient`.`patient_since` AS `patient_since`,`patient`.`display_id` AS `display_id`,`patient`.`reference_by` AS `reference_by`,`patient`.`followup_date` AS `followup_date`,`contacts`.`display_name` AS `display_name`,`contacts`.`contact_id` AS `contact_id`,`contacts`.`first_name` AS `first_name`,`contacts`.`middle_name` AS `middle_name`,`contacts`.`last_name` AS `last_name`,`contacts`.`phone_number` AS `phone_number`,`contacts`.`email` AS `email` from (`ck_patient` `patient` left join `ck_contacts` `contacts` on((`patient`.`contact_id` = `contacts`.`contact_id`)));

latin1_swedish_ci;

INSERT INTO `ck_view_patient` (`patient_id`, `patient_since`, `display_id`, `reference_by`, `followup_date`, `display_name`, `contact_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email`) VALUES ('5', '2015-07-28', 'S00005', '', '0000-00-00', '', '30', 'Dhara', NULL, 'Shah', '', '');
INSERT INTO `ck_view_patient` (`patient_id`, `patient_since`, `display_id`, `reference_by`, `followup_date`, `display_name`, `contact_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email`) VALUES ('6', '2015-08-04', 'S00006', '', '0000-00-00', '', '31', 'Dhaval', NULL, 'Shah', '', '');
INSERT INTO `ck_view_patient` (`patient_id`, `patient_since`, `display_id`, `reference_by`, `followup_date`, `display_name`, `contact_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email`) VALUES ('7', '2015-08-04', 'S00007', '', '0000-00-00', '', '32', 'Birva', NULL, 'Shah', '', '');
INSERT INTO `ck_view_patient` (`patient_id`, `patient_since`, `display_id`, `reference_by`, `followup_date`, `display_name`, `contact_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email`) VALUES ('8', '2015-08-04', 'S00008', '', '0000-00-00', '', '33', 'Dharmesh', NULL, 'Shah', '', '');
INSERT INTO `ck_view_patient` (`patient_id`, `patient_since`, `display_id`, `reference_by`, `followup_date`, `display_name`, `contact_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email`) VALUES ('9', '2015-08-04', 'S00009', '', '0000-00-00', '', '34', 'Pooja', NULL, 'Shah', '', '');
INSERT INTO `ck_view_patient` (`patient_id`, `patient_since`, `display_id`, `reference_by`, `followup_date`, `display_name`, `contact_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email`) VALUES ('10', '2015-08-04', 'M00010', '', '0000-00-00', '', '35', 'Hetal', NULL, 'Modi', '', '');
INSERT INTO `ck_view_patient` (`patient_id`, `patient_since`, `display_id`, `reference_by`, `followup_date`, `display_name`, `contact_id`, `first_name`, `middle_name`, `last_name`, `phone_number`, `email`) VALUES ('11', '2015-08-04', 'S00011', '', '0000-00-00', '', '36', 'Mahesh', NULL, 'Shah', '', '');


#
# TABLE STRUCTURE FOR: ck_view_purchase
#

DROP TABLE IF EXISTS `ck_view_purchase`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_purchase` AS select `a`.`purchase_id` AS `purchase_id`,`a`.`purchase_date` AS `purchase_date`,`b`.`item_name` AS `item_name`,`a`.`quantity` AS `quantity`,`c`.`supplier_name` AS `supplier_name`,`a`.`cost_price` AS `cost_price`,`a`.`item_id` AS `item_id`,`a`.`supplier_id` AS `supplier_id`,`a`.`remain_quantity` AS `remain_quantity`,`a`.`bill_no` AS `bill_no` from ((`ck_purchase` `a` join `ck_item` `b`) join `ck_supplier` `c`) where ((`a`.`item_id` = `b`.`item_id`) and (`a`.`supplier_id` = `c`.`supplier_id`));

utf8_general_ci;

INSERT INTO `ck_view_purchase` (`purchase_id`, `purchase_date`, `item_name`, `quantity`, `supplier_name`, `cost_price`, `item_id`, `supplier_id`, `remain_quantity`, `bill_no`) VALUES ('1', '2015-08-13', 'Soframicine', '10', 'Dhaval Shah', '45', '1', '1', '10', '145');
INSERT INTO `ck_view_purchase` (`purchase_id`, `purchase_date`, `item_name`, `quantity`, `supplier_name`, `cost_price`, `item_id`, `supplier_id`, `remain_quantity`, `bill_no`) VALUES ('2', '2015-08-13', 'Serene Shampoo', '10', 'Dhaval Shah', '85', '2', '1', '10', '145');


#
# TABLE STRUCTURE FOR: ck_view_purchase_total
#

DROP TABLE IF EXISTS `ck_view_purchase_total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_purchase_total` AS select `ck_purchase`.`purchase_date` AS `purchase_date`,`ck_purchase`.`bill_no` AS `bill_no`,sum((`ck_purchase`.`quantity` * `ck_purchase`.`cost_price`)) AS `total` from `ck_purchase` group by `ck_purchase`.`bill_no`;

utf8_general_ci;

INSERT INTO `ck_view_purchase_total` (`purchase_date`, `bill_no`, `total`) VALUES ('2015-08-13', '145', '1300');


#
# TABLE STRUCTURE FOR: ck_view_report
#

DROP TABLE IF EXISTS `ck_view_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_report` AS select `appointment`.`appointment_id` AS `appointment_id`,`appointment`.`patient_id` AS `patient_id`,concat(ifnull(`view_patient`.`first_name`,''),' ',ifnull(`view_patient`.`middle_name`,''),' ',ifnull(`view_patient`.`last_name`,'')) AS `patient_name`,`appointment`.`userid` AS `userid`,`appointment`.`appointment_date` AS `appointment_date`,min(`appointment`.`start_time`) AS `appointment_time`,max((case `appointment_log`.`status` when 'Waiting' then `appointment_log`.`from_time` end)) AS `waiting_in`,(max((case `appointment_log`.`status` when 'Consultation' then `appointment_log`.`from_time` end)) - max((case `appointment_log`.`status` when 'Waiting' then `appointment_log`.`from_time` end))) AS `waiting_duration`,max((case `appointment_log`.`status` when 'Consultation' then `appointment_log`.`from_time` end)) AS `consultation_in`,max((case `appointment_log`.`status` when 'Complete' then `appointment_log`.`from_time` end)) AS `consultation_out`,(max((case `appointment_log`.`status` when 'Complete' then `appointment_log`.`from_time` end)) - max((case `appointment_log`.`status` when 'Consultation' then `appointment_log`.`from_time` end))) AS `consultation_duration`,max((case `appointment_log`.`old_status` when 'Consultation' then timediff(`appointment_log`.`to_time`,`appointment_log`.`from_time`) end)) AS `waiting_out`,max(`bill`.`total_amount`) AS `collection_amount` from (((`ck_appointments` `appointment` left join `ck_view_patient` `view_patient` on((`appointment`.`patient_id` = `view_patient`.`patient_id`))) left join `ck_bill` `bill` on((`appointment`.`visit_id` = `bill`.`visit_id`))) left join `ck_appointment_log` `appointment_log` on((`appointment`.`appointment_id` = `appointment_log`.`appointment_id`))) group by `appointment`.`appointment_id`,concat(ifnull(`view_patient`.`first_name`,''),' ',ifnull(`view_patient`.`middle_name`,''),' ',ifnull(`view_patient`.`last_name`,''));

latin1_swedish_ci;

INSERT INTO `ck_view_report` (`appointment_id`, `patient_id`, `patient_name`, `userid`, `appointment_date`, `appointment_time`, `waiting_in`, `waiting_duration`, `consultation_in`, `consultation_out`, `consultation_duration`, `waiting_out`, `collection_amount`) VALUES ('1', '6', 'Dhaval  Shah', '4', '2015-08-04', '09:30:00', NULL, NULL, '10:03:54', NULL, NULL, NULL, NULL);
INSERT INTO `ck_view_report` (`appointment_id`, `patient_id`, `patient_name`, `userid`, `appointment_date`, `appointment_time`, `waiting_in`, `waiting_duration`, `consultation_in`, `consultation_out`, `consultation_duration`, `waiting_out`, `collection_amount`) VALUES ('2', '9', 'Pooja  Shah', '5', '2015-08-04', '10:00:00', NULL, NULL, '07:39:35', NULL, NULL, NULL, NULL);
INSERT INTO `ck_view_report` (`appointment_id`, `patient_id`, `patient_name`, `userid`, `appointment_date`, `appointment_time`, `waiting_in`, `waiting_duration`, `consultation_in`, `consultation_out`, `consultation_duration`, `waiting_out`, `collection_amount`) VALUES ('3', '11', 'Mahesh  Shah', '4', '2015-08-04', '10:30:00', NULL, NULL, '17:17:18', NULL, NULL, NULL, NULL);
INSERT INTO `ck_view_report` (`appointment_id`, `patient_id`, `patient_name`, `userid`, `appointment_date`, `appointment_time`, `waiting_in`, `waiting_duration`, `consultation_in`, `consultation_out`, `consultation_duration`, `waiting_out`, `collection_amount`) VALUES ('4', '5', 'Dhara  Shah', '4', '2015-08-10', '09:00:00', NULL, NULL, '19:04:48', NULL, NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: ck_view_stock
#

DROP TABLE IF EXISTS `ck_view_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_stock` AS select `a`.`item_id` AS `item_id`,`a`.`item_name` AS `item_name`,`a`.`desired_stock` AS `desired_stock`,(select sum(`b`.`quantity`) from `ck_purchase` `b` where (`a`.`item_id` = `b`.`item_id`)) AS `purchase_quantity`,(select avg(`b`.`cost_price`) from `ck_purchase` `b` where (`a`.`item_id` = `b`.`item_id`)) AS `avg_purchase_price`,(select sum(`c`.`quantity`) from `ck_sell_detail` `c` where (`a`.`item_id` = `c`.`item_id`)) AS `sell_quantity`,(select avg(`c`.`sell_price`) from `ck_sell_detail` `c` where (`a`.`item_id` = `c`.`item_id`)) AS `avg_sell_price` from `ck_item` `a`;

utf8_general_ci;

INSERT INTO `ck_view_stock` (`item_id`, `item_name`, `desired_stock`, `purchase_quantity`, `avg_purchase_price`, `sell_quantity`, `avg_sell_price`) VALUES ('1', 'Soframicine', '10', '10', '45.0000', '2', '50.0000');
INSERT INTO `ck_view_stock` (`item_id`, `item_name`, `desired_stock`, `purchase_quantity`, `avg_purchase_price`, `sell_quantity`, `avg_sell_price`) VALUES ('2', 'Serene Shampoo', '10', '10', '85.0000', '1', '100.0000');


#
# TABLE STRUCTURE FOR: ck_view_visit
#

DROP TABLE IF EXISTS `ck_view_visit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_visit` AS select `visit`.`visit_id` AS `visit_id`,`visit`.`visit_date` AS `visit_date`,`visit`.`visit_time` AS `visit_time`,`visit`.`type` AS `type`,`visit`.`notes` AS `notes`,`visit`.`userid` AS `userid`,`users`.`name` AS `name`,`visit`.`patient_id` AS `patient_id`,`bill`.`bill_id` AS `bill_id`,`bill`.`total_amount` AS `total_amount`,`bill`.`due_amount` AS `due_amount` from ((`ck_visit` `visit` join `ck_users` `users` on((`users`.`userid` = `visit`.`userid`))) join `ck_bill` `bill` on((`bill`.`visit_id` = `visit`.`visit_id`))) order by `visit`.`patient_id`,`visit`.`visit_date`,`visit`.`visit_time`;

utf8mb4_general_ci;

INSERT INTO `ck_view_visit` (`visit_id`, `visit_date`, `visit_time`, `type`, `notes`, `userid`, `name`, `patient_id`, `bill_id`, `total_amount`, `due_amount`) VALUES ('13', '2015-08-02', '07:39', 'New Visit', 'Test', '4', 'Rinkle', '5', '1', '500', '300.00');
INSERT INTO `ck_view_visit` (`visit_id`, `visit_date`, `visit_time`, `type`, `notes`, `userid`, `name`, `patient_id`, `bill_id`, `total_amount`, `due_amount`) VALUES ('14', '2015-08-02', '07:56', 'Established Patient', 'Test', '4', 'Rinkle', '5', '2', '0', '0.00');
INSERT INTO `ck_view_visit` (`visit_id`, `visit_date`, `visit_time`, `type`, `notes`, `userid`, `name`, `patient_id`, `bill_id`, `total_amount`, `due_amount`) VALUES ('15', '2015-08-02', '07:56', 'Established Patient', 'Test', '4', 'Rinkle', '5', '3', '0', '0.00');


#
# TABLE STRUCTURE FOR: ck_view_visit_treatments
#

DROP TABLE IF EXISTS `ck_view_visit_treatments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ck_view_visit_treatments` AS select `visit`.`visit_id` AS `visit_id`,`bill_detail`.`particular` AS `particular`,`bill_detail`.`type` AS `type` from ((`ck_visit` `visit` left join `ck_bill` `bill` on((`bill`.`visit_id` = `visit`.`visit_id`))) left join `ck_bill_detail` `bill_detail` on((`bill_detail`.`bill_id` = `bill`.`bill_id`)));

latin1_swedish_ci;

INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('2', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('3', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('4', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('5', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('6', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('7', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('8', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('9', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('10', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('11', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('12', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('13', 'Test', 'particular');
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('13', 'Soframicine', 'item');
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('14', NULL, NULL);
INSERT INTO `ck_view_visit_treatments` (`visit_id`, `particular`, `type`) VALUES ('15', NULL, NULL);


#
# TABLE STRUCTURE FOR: ck_visit
#

DROP TABLE IF EXISTS `ck_visit`;

CREATE TABLE `ck_visit` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `notes` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `visit_date` varchar(60) NOT NULL,
  `visit_time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`visit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('2', '5', '5', 'Test', 'New Visit', '2015-08-01', '02:10');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('3', '5', '5', 'Test', 'New Visit', '2015-08-01', '02:10');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('4', '5', '5', 'Test', 'New Visit', '2015-08-01', '02:10');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('5', '5', '5', 'Test', 'New Visit', '2015-08-01', '02:10');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('6', '5', '5', 'Test', 'New Visit', '2015-08-01', '02:10');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('7', '5', '5', 'Test', 'New Visit', '2015-08-01', '02:10');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('8', '5', '5', 'Test', 'New Visit', '2015-08-01', '02:10');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('9', '5', '5', 'Test', 'New Visit', '2015-08-01', '02:10');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('10', '5', '5', 'Test', 'New Visit', '2015-10-01', '02:28');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('11', '5', '5', 'Test', 'New Visit', '2015-10-01', '02:28');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('12', '5', '4', 'Test', 'New Visit', '2015-08-01', '15:43');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('13', '5', '4', 'Test', 'New Visit', '2015-08-02', '07:39');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('14', '5', '4', 'Test', 'Established Patient', '2015-08-02', '07:56');
INSERT INTO `ck_visit` (`visit_id`, `patient_id`, `userid`, `notes`, `type`, `visit_date`, `visit_time`) VALUES ('15', '5', '4', 'Test', 'Established Patient', '2015-08-02', '07:56');


#
# TABLE STRUCTURE FOR: ck_visit_img
#

DROP TABLE IF EXISTS `ck_visit_img`;

CREATE TABLE `ck_visit_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_img_path` varchar(255) NOT NULL,
  `img_name` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `ck_visit_img` (`id`, `visit_id`, `patient_id`, `visit_img_path`, `img_name`) VALUES ('1', '13', '5', 'patient_images/5_13_0918.png', '07-08-2015');
INSERT INTO `ck_visit_img` (`id`, `visit_id`, `patient_id`, `visit_img_path`, `img_name`) VALUES ('2', '14', '5', 'patient_images/5_14_0918.png', '07-08-2015');


