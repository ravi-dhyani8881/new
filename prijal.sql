-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2013 at 01:02 AM
-- Server version: 5.5.14
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prijal`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `ADDRESS_ID` int(11) NOT NULL,
  `is_US_ADDRESS` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_street1` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ADDR_street2` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_street3` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_CITY` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ZIP_CD` varchar(28) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_STATE` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `WORK_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CELL_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ADDRESS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`ADDRESS_ID`, `is_US_ADDRESS`, `ADDR_street1`, `ADDR_street2`, `ADDR_street3`, `ADDR_CITY`, `ZIP_CD`, `ADDR_STATE`, `WORK_PHONE`, `CELL_PHONE`) VALUES
(0, NULL, '213 Organizationnnn Streetas', '', '', 'baltimore', NULL, 'VA', '', ''),
(4, NULL, '123 any street', '', '', 'germantown', NULL, 'va', '111-111-1111', '222-222-2222'),
(5, NULL, '567 main street', '', '', 'baltimore', NULL, 'wv', '200-100-3000', '111-222-3333'),
(6, NULL, '5544 street', '', '', 'boyds', NULL, 'md', '222-444-5555', '111-222-3333'),
(9, NULL, 'd31 streeet ', '', '', 'germantown', NULL, 'md', '222-111-3333', '333-222-5555'),
(16, NULL, '11111111', '', '', 'delhi', '33333-3333', 'VA', '(666) 666-6666 x66666', '(444) 444-4444'),
(84, NULL, 'street', '', '', 'ooooooooooooooooo', '22222-2222', 'MD', '(000) 000-0000 x00000', '(222) 222-2222'),
(106, NULL, 'eeeeee', '', '', 'eeeeeeeee', '33333-3333', 'VA', '(333) 333-3333 x33333', '(333) 333-3333');

-- --------------------------------------------------------

--
-- Table structure for table `address_phone`
--

CREATE TABLE IF NOT EXISTS `address_phone` (
  `PHONE_ID` int(11) NOT NULL,
  `ADDRESS_ID` int(11) NOT NULL,
  `PHONE_TYPE_CD` smallint(6) NOT NULL,
  `PHONE_NUMBER` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`PHONE_ID`),
  UNIQUE KEY `ADDRESS_PHONE_U1` (`ADDRESS_ID`,`PHONE_ID`),
  KEY `ADDRESS_PHONE_I1` (`PHONE_TYPE_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address_phone`
--


-- --------------------------------------------------------

--
-- Table structure for table `doctor_patient`
--

CREATE TABLE IF NOT EXISTS `doctor_patient` (
  `STAFF_ID` int(11) NOT NULL,
  `PATIENT_ID` int(11) NOT NULL,
  PRIMARY KEY (`STAFF_ID`,`PATIENT_ID`),
  KEY `DOCTOR_PATIENT_FK2` (`PATIENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor_patient`
--

INSERT INTO `doctor_patient` (`STAFF_ID`, `PATIENT_ID`) VALUES
(21, 52),
(23, 53),
(21, 54),
(24, 55),
(24, 56),
(21, 57);

-- --------------------------------------------------------

--
-- Table structure for table `dr_patient_refrl`
--

CREATE TABLE IF NOT EXISTS `dr_patient_refrl` (
  `REFERRAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STAFF_ID` int(11) NOT NULL,
  `PATIENT_ID` int(11) NOT NULL,
  `RFRNG_STATUS_CD` smallint(6) DEFAULT NULL,
  `RFRNG_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TESTS_TO_PERFORM_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SPCL_INST_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OTHER_COMMENTS_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RFRD_STAFF_ID` int(11) NOT NULL,
  `RFRD_STATUS_CD` smallint(6) DEFAULT NULL,
  `RFRD_DATE` date DEFAULT NULL,
  `RFRD_RESULTS_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RFRD_COMMENTS_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RFRD_RECMMD_TRMT_TXT` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `APPOINTMENT_DATE` date DEFAULT NULL,
  `attachment1` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment2` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment3` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment4` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachment5` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`REFERRAL_ID`),
  KEY `DR_PATIENT_REFRL_FK1` (`STAFF_ID`,`PATIENT_ID`),
  KEY `DR_PATIENT_REFRL_FK2` (`RFRNG_STATUS_CD`),
  KEY `DR_PATIENT_REFRL_FK3` (`RFRD_STAFF_ID`),
  KEY `DR_PATIENT_REFRL_FK4` (`RFRD_STATUS_CD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `dr_patient_refrl`
--

INSERT INTO `dr_patient_refrl` (`REFERRAL_ID`, `STAFF_ID`, `PATIENT_ID`, `RFRNG_STATUS_CD`, `RFRNG_DATE`, `TESTS_TO_PERFORM_TXT`, `SPCL_INST_TXT`, `OTHER_COMMENTS_TXT`, `RFRD_STAFF_ID`, `RFRD_STATUS_CD`, `RFRD_DATE`, `RFRD_RESULTS_TXT`, `RFRD_COMMENTS_TXT`, `RFRD_RECMMD_TRMT_TXT`, `APPOINTMENT_DATE`, `attachment1`, `attachment2`, `attachment3`, `attachment4`, `attachment5`) VALUES
(1, 21, 52, 2, '2013-03-07 20:09:18', '\r\n   blood test \r\n                                    ', '\r\n    \r\n                                    ', '\r\n    \r\n                                    ', 2, 3, NULL, 'result\r\n', 'result\r\n', NULL, NULL, 'none', '', NULL, NULL, NULL),
(2, 21, 52, NULL, '2013-02-24 11:46:47', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'none', '', NULL, NULL, NULL),
(3, 21, 54, 2, '2013-03-03 08:06:00', '\r\n    \r\n       gggg                             ', '\r\n    \r\n       ggg                             ', '\r\n    \r\nggg', 2, 3, NULL, NULL, NULL, NULL, NULL, 'none', '', NULL, NULL, NULL),
(19, 21, 52, 7, '2013-03-09 10:46:25', 'hhhhhhhhhhhhhhhhhffffffffffffffffffffffffffffffff                           ', 'hhhhhhhhhhhhhhhhhffffffffffffffffffffffffffffffff                           \r\n    \r\n                                    ', 'hhhhhhhhhhhhhhhhhffffffffffffffffffffffffffffffff                                            ', 24, 8, NULL, '\r\n                                        jjjjjjjjjjjj', 'jjjjjjjjjjjjjjj\r\n                                        ', 'jjjjjjjjjjjjjj\r\n                                        ', NULL, 'none', '', NULL, NULL, NULL),
(20, 24, 55, NULL, '2013-03-08 22:52:25', NULL, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, 'none', '', NULL, NULL, NULL),
(21, 24, 55, NULL, '2013-03-08 22:53:54', NULL, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, 'none', '', NULL, NULL, NULL),
(22, 24, 55, 2, '2013-03-08 22:55:20', '\r\n love\r\n                                    love\r\n                                    love\r\n                                    love\r\n                                                                       ', '\r\n    \r\n        blove\r\n                                                                ', '\r\n    \r\n    love\r\n                                                                    ', 2, 3, NULL, NULL, NULL, NULL, NULL, 'none', '', NULL, NULL, NULL),
(23, 24, 55, 7, '2013-03-20 23:26:59', 'tea=st perform                                   ', 'tea=st perform                                   \r\n    \r\n                                    ', 'tea=st perform                                   \r\n    \r\n                                    ', 21, 8, NULL, 'result received\r\n                                        ', 'result received\r\n                                        \r\n                                        ', 'result received\r\n                                        \r\n                                        ', NULL, 'uploads/Desert.jpg', 'uploads/Desert.jpg', 'uploads/Desert.jpg', 'uploads/Desert.jpg', 'NULL'),
(24, 21, 52, NULL, '2013-03-24 18:07:38', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 21, 52, 1, '2013-03-24 18:09:10', '\r\n    \r\n                                    ', '\r\n    \r\n                                    ', '\r\n    \r\n                                    ', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dr_refrl_template`
--

CREATE TABLE IF NOT EXISTS `dr_refrl_template` (
  `TEMPLATE_ID` int(11) NOT NULL,
  `STAFF_ID` int(11) NOT NULL,
  `INFO_REQUIRED` varchar(4000) COLLATE utf8_unicode_ci NOT NULL,
  `PRACTICE_COL2` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`TEMPLATE_ID`),
  KEY `DR_REFRL_TEMPLATE_FK1` (`STAFF_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dr_refrl_template`
--


-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `ORG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_ID` int(11) NOT NULL,
  `ORG_NAME` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ORG_TYPE_CD` smallint(6) DEFAULT NULL,
  `WEBSITE_URL` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PARENT_ORG_ID` int(11) DEFAULT NULL,
  `CREATED_DTTM` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CREATED_BY` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UPDATED_DTTM` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `UPDATED_BY` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORG_EMAIL` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTIFICATION_PRE` varchar(16) COLLATE utf8_unicode_ci DEFAULT 'E',
  PRIMARY KEY (`ORG_ID`),
  UNIQUE KEY `ORGANIZATION_U1` (`ORG_NAME`),
  KEY `ORGANIZATION_I1` (`ORG_TYPE_CD`),
  KEY `ORGANIZATION_I2` (`PARENT_ORG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`ORG_ID`, `ACCOUNT_ID`, `ORG_NAME`, `ORG_TYPE_CD`, `WEBSITE_URL`, `PARENT_ORG_ID`, `CREATED_DTTM`, `CREATED_BY`, `UPDATED_DTTM`, `UPDATED_BY`, `ORG_EMAIL`, `NOTIFICATION_PRE`) VALUES
(0, 16, 'yyyyyyyyyyyy', NULL, 'gggg', NULL, '2013-03-10 13:31:24', NULL, '0000-00-00 00:00:00', NULL, 'ssssssss', 'E'),
(9, 64, 'Organization 21', NULL, NULL, NULL, '2012-12-12 08:39:38', NULL, '0000-00-00 00:00:00', NULL, NULL, 'E'),
(10, 66, 'New Organization', NULL, NULL, NULL, '2012-12-12 15:45:36', NULL, '0000-00-00 00:00:00', NULL, NULL, 'E'),
(19, 84, 'ravi rajj', NULL, 'yahoo.com', NULL, '2013-03-23 23:42:00', NULL, '0000-00-00 00:00:00', NULL, 'ravi_happy28@yahoo.co.in', 'E'),
(20, 106, 'eeeddddddddd', NULL, 'eeeeeee', NULL, '2013-03-17 21:38:44', NULL, '0000-00-00 00:00:00', NULL, 'ravi_happy28@yahoo.co.in', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `org_address`
--

CREATE TABLE IF NOT EXISTS `org_address` (
  `ADDRESS_ID` int(11) NOT NULL,
  `ADDRESS_TYPE_CD` smallint(6) NOT NULL,
  `ORG_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ADDRESS_ID`,`ADDRESS_TYPE_CD`),
  KEY `ORG_ADDRESS_I1` (`ORG_ID`),
  KEY `ORG_ADDRESS_FK3` (`ADDRESS_TYPE_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `org_address`
--


-- --------------------------------------------------------

--
-- Table structure for table `org_service`
--

CREATE TABLE IF NOT EXISTS `org_service` (
  `ORG_ID` int(11) NOT NULL,
  `SERVICE_TYPE_CD` smallint(6) NOT NULL,
  PRIMARY KEY (`ORG_ID`,`SERVICE_TYPE_CD`),
  KEY `ORG_SERVICE_FK2` (`SERVICE_TYPE_CD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `org_service`
--


-- --------------------------------------------------------

--
-- Table structure for table `org_staff`
--

CREATE TABLE IF NOT EXISTS `org_staff` (
  `STAFF_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ORG_ID` int(11) DEFAULT NULL,
  `ORG_NAME` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STAFF_TYPE_CD` smallint(6) DEFAULT NULL,
  `SPCLTY_TYPE_CD` smallint(6) DEFAULT NULL,
  `SPECIALTY` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LAST_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MIDDLE_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FIRST_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GENDER` varchar(16) COLLATE utf8_unicode_ci DEFAULT 'M',
  `EMAIL_ADDRESS` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WORK_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CELL_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTIFICATION_PRE` varchar(16) COLLATE utf8_unicode_ci DEFAULT 'E',
  `ACCOUNT_ID` int(11) NOT NULL,
  PRIMARY KEY (`STAFF_ID`),
  UNIQUE KEY `ORG_STAFF_U1` (`ACCOUNT_ID`),
  KEY `ORG_STAFF_FK1` (`ORG_ID`),
  KEY `ORG_STAFF_FK2` (`STAFF_TYPE_CD`),
  KEY `ORG_STAFF_FK3` (`SPCLTY_TYPE_CD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `org_staff`
--

INSERT INTO `org_staff` (`STAFF_ID`, `ORG_ID`, `ORG_NAME`, `STAFF_TYPE_CD`, `SPCLTY_TYPE_CD`, `SPECIALTY`, `LAST_NAME`, `MIDDLE_NAME`, `FIRST_NAME`, `GENDER`, `EMAIL_ADDRESS`, `WORK_PHONE`, `CELL_PHONE`, `NOTIFICATION_PRE`, `ACCOUNT_ID`) VALUES
(2, 10, '4-OrganizationName', NULL, 2, 'skin', 's1LN', 'dhyani', 's1FN', 'F', 'ravi@gmail.com', '(344) 444-4444 x4444', '(122) 222-2222', 'E', 3),
(10, NULL, '4-OrganizationName', NULL, 3, NULL, 'd71-ln', '', 'd71-fn', '', 'd71test@test.com', '710-111-7777', '017-111-8888', 'E', 34),
(17, NULL, 'New Organization', NULL, 2, NULL, 'd15-ln', '', 'd15-fn', '', 'd15@test.com', '151-155-5555', '151-212-5555', 'E', 67),
(18, NULL, 'Doctors Medical Group', NULL, 3, NULL, 'Elizabeth', '', 'Merzer', '', 'emerzer@dmg.com', '202-393-9990', '', 'E', 71),
(19, NULL, 'Captial Womens Care', NULL, 8, NULL, 'Houser', '', 'Jane', '', 'jhouser@cwc.com', '301-778-0998', '', 'E', 72),
(21, 19, 'ravi rajj', NULL, 3, NULL, 'doctor', 'ghfghfgh', 'doctor', 'F', 'doctor.doctor@doctor.com', '(122) 977-7777 x77770', '(888) 888-8888', 'E', 83),
(22, NULL, 'yyyyyyyyyyyy', NULL, 2, NULL, 'Ravi', '', 'Rajd', 'M', 'ravi_happy28@yahoo.co.in', '(571) 223-6780 x123', '(987) 237-7777', 'E', 91),
(23, NULL, '4-OrganizationName', NULL, 4, NULL, 's1', 's1', 's1s1', 'M', 's1@s1.com', '(222) 222-2222 x22222', '(222) 222-2222', 'E', 2),
(24, NULL, 'yyyyyyyyyyyy', NULL, 3, NULL, 'doctor1', 'doctor1', 'doctor1', 'M', 'doctor1.doctor1@doctor1.com', '(111) 111-1111 x11111', '(111) 111-1111', 'E', 102);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `PATIENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LAST_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MIDDLE_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FIRST_NAME` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MEDICAL_HISTORY_ID` int(11) DEFAULT NULL,
  `ALLERGY_ID` int(11) DEFAULT NULL,
  `EMAIL_ADDRESS` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GENDER_CD` smallint(128) DEFAULT NULL,
  `GENDER_REPLACE` varchar(64) COLLATE utf8_unicode_ci DEFAULT 'M',
  `DATE_OF_BIRTH` varchar(64) COLLATE utf8_unicode_ci DEFAULT '01/01/1900',
  `ACCOUNT_ID` int(11) DEFAULT NULL,
  `ADDR_street1` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_CITY` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_STATE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ZIP_CD` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WORK_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CELL_PHONE` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTIFICATION_PRE` varchar(16) COLLATE utf8_unicode_ci DEFAULT 'E',
  PRIMARY KEY (`PATIENT_ID`),
  UNIQUE KEY `PATIENT_U1` (`ACCOUNT_ID`),
  KEY `PATIENT_FK1` (`GENDER_CD`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PATIENT_ID`, `LAST_NAME`, `MIDDLE_NAME`, `FIRST_NAME`, `MEDICAL_HISTORY_ID`, `ALLERGY_ID`, `EMAIL_ADDRESS`, `GENDER_CD`, `GENDER_REPLACE`, `DATE_OF_BIRTH`, `ACCOUNT_ID`, `ADDR_street1`, `ADDR_CITY`, `ADDR_STATE`, `ZIP_CD`, `WORK_PHONE`, `CELL_PHONE`, `NOTIFICATION_PRE`) VALUES
(51, 'nnnnnnn', 'ddddd', 'nnnnnnnnnn`', NULL, NULL, 'ravi_happy28@yahoo.co.in.ij', NULL, 'M', '05/01/2012', 94, 'bbbbbb', 'newyork', 'WV', '22222-2222', '(222) 222-2222 x22222', '(111) 111-1111', 'T'),
(52, 'ravi', 'raj', 'raji', NULL, NULL, 'ravi_happy28@yahoo.co.in', NULL, 'M', '02/04/2013', 95, 'newyork', 'newyork', 'WV', '23333-3333', '(111) 111-1111 x11111', '(222) 222-2222', 'E'),
(53, 'patient', NULL, 'patient', NULL, NULL, 'patient@patient.com', NULL, 'M', '01/01/1900', 96, NULL, NULL, NULL, NULL, NULL, NULL, 'E'),
(54, 'hhh', NULL, 'hh', NULL, NULL, 'bbb@rgmai.com', NULL, 'M', '01/01/1900', 97, NULL, NULL, NULL, NULL, NULL, NULL, 'E'),
(55, 'patient1', NULL, 'patient1', NULL, NULL, 'patient1.patient1@patient1.com', NULL, 'M', '01/01/1900', 103, NULL, NULL, NULL, NULL, NULL, NULL, 'E'),
(56, 'Test patient', '', 'Test patient', NULL, NULL, 'test@testp.com', NULL, 'M', '01/01/1900', 104, 'newyork', 'newyork', 'VA', '22222-2222', '22222222222222', '22222222222222', 'E'),
(57, 'oooooooooo', NULL, 'oooooooo', NULL, NULL, 'o@omail.com', NULL, 'M', '01/01/1900', 105, NULL, NULL, NULL, NULL, NULL, NULL, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `patient_address`
--

CREATE TABLE IF NOT EXISTS `patient_address` (
  `ADDRESS_ID` int(11) NOT NULL,
  `ADDRESS_TYPE_CD` smallint(6) NOT NULL,
  `PATIENT_ID` int(11) NOT NULL,
  PRIMARY KEY (`ADDRESS_ID`,`ADDRESS_TYPE_CD`),
  KEY `PAT_ADDRESS_FK2` (`ADDRESS_TYPE_CD`),
  KEY `PAT_ADDRESS_FK3` (`PATIENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient_address`
--


-- --------------------------------------------------------

--
-- Table structure for table `rf_address_type`
--

CREATE TABLE IF NOT EXISTS `rf_address_type` (
  `ADDRESS_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ADDRESS_TYPE_CD`),
  UNIQUE KEY `U1_RF_ADDRESS_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_address_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `rf_gender`
--

CREATE TABLE IF NOT EXISTS `rf_gender` (
  `GENDER_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`GENDER_CD`),
  UNIQUE KEY `U1_RF_GENDER` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_gender`
--

INSERT INTO `rf_gender` (`GENDER_CD`, `DESCRIPTION`) VALUES
(2, 'Female'),
(1, 'Male'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `rf_org_type`
--

CREATE TABLE IF NOT EXISTS `rf_org_type` (
  `ORG_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ORG_TYPE_CD`),
  UNIQUE KEY `U1_RF_ORG_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_org_type`
--

INSERT INTO `rf_org_type` (`ORG_TYPE_CD`, `DESCRIPTION`) VALUES
(1, 'Hospital'),
(3, 'Insurance Company'),
(4, 'Laboratory'),
(2, 'Specialty');

-- --------------------------------------------------------

--
-- Table structure for table `rf_phone_type`
--

CREATE TABLE IF NOT EXISTS `rf_phone_type` (
  `PHONE_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`PHONE_TYPE_CD`),
  UNIQUE KEY `U1_RF_PHONE_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_phone_type`
--

INSERT INTO `rf_phone_type` (`PHONE_TYPE_CD`, `DESCRIPTION`) VALUES
(8, 'Assistance Overseas'),
(3, 'Cell'),
(1, 'Customer Service'),
(7, 'Mail Service Pharmacy'),
(5, 'Mental Health/Substance Abuse Pr'),
(9, 'Other'),
(4, 'Precertification'),
(6, 'Retail Service Pharmacy'),
(2, 'Work');

-- --------------------------------------------------------

--
-- Table structure for table `rf_rfrl_status`
--

CREATE TABLE IF NOT EXISTS `rf_rfrl_status` (
  `RFRL_STATUS_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`RFRL_STATUS_CD`),
  UNIQUE KEY `U1_RF_RFRL_STATUS` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_rfrl_status`
--

INSERT INTO `rf_rfrl_status` (`RFRL_STATUS_CD`, `DESCRIPTION`) VALUES
(5, 'Appointment Set'),
(6, 'Closed'),
(1, 'Pending'),
(3, 'Received'),
(8, 'Refer result received'),
(7, 'Refer result Sent'),
(2, 'Sent'),
(4, 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `rf_service_type`
--

CREATE TABLE IF NOT EXISTS `rf_service_type` (
  `SERVICE_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SERVICE_TYPE_CD`),
  UNIQUE KEY `U1_RF_SERVICE_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_service_type`
--

INSERT INTO `rf_service_type` (`SERVICE_TYPE_CD`, `DESCRIPTION`) VALUES
(2, 'EKG'),
(3, 'MRI'),
(4, 'Stress Test'),
(1, 'X-RAY');

-- --------------------------------------------------------

--
-- Table structure for table `rf_spclty_type`
--

CREATE TABLE IF NOT EXISTS `rf_spclty_type` (
  `SPCLTY_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SPCLTY_TYPE_CD`),
  UNIQUE KEY `U1_RF_SPCLTY_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_spclty_type`
--

INSERT INTO `rf_spclty_type` (`SPCLTY_TYPE_CD`, `DESCRIPTION`) VALUES
(2, 'Allergy'),
(3, 'Cardiology'),
(4, 'Dental'),
(5, 'Dermatology'),
(6, 'Endocrinology'),
(7, 'Gastroenterology'),
(8, 'Gynecology'),
(1, 'Internal Medicine'),
(15, 'Nephrology'),
(9, 'Oncology'),
(10, 'Ophthalmology'),
(11, 'Orthopedics'),
(12, 'Physiatrist'),
(13, 'Podiatrist'),
(14, 'Psychology');

-- --------------------------------------------------------

--
-- Table structure for table `rf_staff_type`
--

CREATE TABLE IF NOT EXISTS `rf_staff_type` (
  `STAFF_TYPE_CD` smallint(6) NOT NULL,
  `DESCRIPTION` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`STAFF_TYPE_CD`),
  UNIQUE KEY `U1_RF_STAFF_TYPE` (`DESCRIPTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_staff_type`
--

INSERT INTO `rf_staff_type` (`STAFF_TYPE_CD`, `DESCRIPTION`) VALUES
(3, 'Administrator'),
(7, 'Doctor'),
(4, 'Head Nurse'),
(6, 'Lab Technician'),
(1, 'Main'),
(5, 'Nurse'),
(8, 'Other'),
(2, 'Primary Contact'),
(99, 'System Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `rf_state`
--

CREATE TABLE IF NOT EXISTS `rf_state` (
  `state_cd` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_descr` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rf_state`
--

INSERT INTO `rf_state` (`state_cd`, `state_descr`) VALUES
('VA', 'Virginia'),
('MD', 'Maryland'),
('WV', 'West Virginia');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ACCOUNT_TYPE` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `LOGIN_ID` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CHALLENGE_Q1` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ANSWER_1` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `CHALLENGE_Q2` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ANSWER_2` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `CHALLENGE_Q3` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ANSWER_3` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ACCOUNT_ID`),
  UNIQUE KEY `USER_ACCOUNT_U1` (`LOGIN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=107 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`ACCOUNT_ID`, `ACCOUNT_TYPE`, `LOGIN_ID`, `PASSWORD`, `CHALLENGE_Q1`, `ANSWER_1`, `CHALLENGE_Q2`, `ANSWER_2`, `CHALLENGE_Q3`, `ANSWER_3`) VALUES
(2, 'staff', 's1', '63dd3e154ca6d948fc380fa576343ba6', '', '', '', '', '', ''),
(3, 'staff', 's2', '63dd3e154ca6d948fc380fa576343ba6', '', '', '', '', '', ''),
(7, 'staff', 'doctor30', '57ac5f96fd9bc409', '', '', '', '', '', ''),
(10, 'staff', 'd32', 'b4d7fcb1aac27e05', '', '', '', '', '', ''),
(11, 'staff', 'd33', '408e78f25cd0b317', '', '', '', '', '', ''),
(15, 'staff', 'd34', 'd0f3dc437da6e631', '', '', '', '', '', ''),
(16, 'organization', 'o1', '63dd3e154ca6d948fc380fa576343ba6', '', '', '', '', '', ''),
(17, 'organization', 'o2', '2d387ab98437e5f5', '', '', '', '', '', ''),
(18, 'staff', 'd35', 'de000668f8becda6', '', '', '', '', '', ''),
(20, 'organization', 'o3', '417c4fa3b4135a6c', '', '', '', '', '', ''),
(21, 'staff', 'd36', '85ef939c6c3ff396', '', '', '', '', '', ''),
(22, 'staff', 'd40', '31ed63ae87c44e83', '', '', '', '', '', ''),
(23, 'staff', 'd41', 'deb3292f208a7e5b', '', '', '', '', '', ''),
(26, 'staff', 'd46', '119f7f00d4188a58', '', '', '', '', '', ''),
(27, 'staff', 'd48', '88a9c54b00c85f6d', '', '', '', '', '', ''),
(30, 'organization', 'TieWater', 'cefb757a9b5b2426', '', '', '', '', '', ''),
(31, 'staff', 'd60', '7ea38a238a11ae60', '', '', '', '', '', ''),
(34, 'staff', 'd71', '81d11c21f282d6d9', '', '', '', '', '', ''),
(38, 'staff', 'd72', 'd7624a07bef79868', '', '', '', '', '', ''),
(45, 'organization', 'o4', '500dbb501d3577b1', '', '', '', '', '', ''),
(46, 'organization', 'o5', '46fa5a234958dba5', '', '', '', '', '', ''),
(47, 'organization', 'o6', '39d987fd8304752b', '', '', '', '', '', ''),
(48, 'organization', 'o9', 'ab0fd361fde5c362', '', '', '', '', '', ''),
(49, 'organization', 'o10', 'd98801486a65c815', '', '', '', '', '', ''),
(50, 'staff', 'd81', 'ec46ecd7201b284b', '', '', '', '', '', ''),
(53, 'staff', 'd82', '1f7f31128359ac99', '', '', '', '', '', ''),
(57, 'staff', 'd51', '751145ad37c5e8dc', '', '', '', '', '', ''),
(60, 'staff', 'd52', 'b2eaa5f4f4079e25', '', '', '', '', '', ''),
(63, 'staff', 'd101', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(64, 'organization', 'o21', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(66, 'organization', '15', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(67, 'staff', 'd15', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(69, 'organization', 'dmg', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(70, 'organization', 'cwc', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(71, 'staff', 'emerzer', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(72, 'staff', 'jhouser', '261f3391b7a77b05', '', '', '', '', '', ''),
(73, 'organization', 'mpnova', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(74, 'staff', 'jcamp', 'd41d8cd98f00b204', '', '', '', '', '', ''),
(83, 'staff', 'doctor', 'f9f16d97c90d8c6f2cab37bb6d1f1992', '', '', '', '', '', ''),
(84, 'organization', 'organization', 'bb84d91cc6b0eafdbff085f3d7ec9277', '', '', '', '', '', ''),
(91, 'staff', 'patient', '9aa9cc1e395c9679a8aa1b5d7b489e73', '', '', '', '', '', ''),
(94, 'patient', 'patient2', '3d47080f1445cd844c3390b15c835ffa', '', '', '', '', '', ''),
(95, 'patient', 'ravi_happy28@yahoo.co.in', 'bb84d91cc6b0eafdbff085f3d7ec9277', '', '', '', '', '', ''),
(96, 'patient', 'patient@patient.com', 'b39024efbc6de61976f585c8421c6bba', '', '', '', '', '', ''),
(97, 'patient', 'bbb@rgmai.com', 'f14029217ff5e7a50cdc7e70f686cf29', '', '', '', '', '', ''),
(98, 'staff', 'doctor2', '3b02a6fdd669efe9083cc84d15e5699b', '', '', '', '', '', ''),
(99, 'staff', 'oooo', '9982b2a7fceaaee2c8444b5086aee008', '', '', '', '', '', ''),
(100, 'patient', 'ppppp', 'e882b72bccfc2ad578c27b0d9b472a14', '', '', '', '', '', ''),
(101, 'organization', 'oooooo', '9982b2a7fceaaee2c8444b5086aee008', '', '', '', '', '', ''),
(102, 'staff', 'doctor1', '45f678b147fdf275c35b60bac2360984', '', '', '', '', '', ''),
(103, 'patient', 'patient1.patient1@patient1.com', '8103cfda42d725cd38e8bdf9610ef9a6', '', '', '', '', '', ''),
(104, 'patient', 'test@testp.com', 'cf323804a9ab994206406e355a408e87', '', '', '', '', '', ''),
(105, 'patient', 'o@omail.com', '9982b2a7fceaaee2c8444b5086aee008', '', '', '', '', '', ''),
(106, 'organization', 'organization1', '0b3fd65bb847e99303e265b9fc730c9f', '', '', '', '', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_phone`
--
ALTER TABLE `address_phone`
  ADD CONSTRAINT `ADDRESS_PHONE_FK1` FOREIGN KEY (`PHONE_TYPE_CD`) REFERENCES `rf_phone_type` (`PHONE_TYPE_CD`),
  ADD CONSTRAINT `ADDRESS_PHONE_FK2` FOREIGN KEY (`ADDRESS_ID`) REFERENCES `address` (`ADDRESS_ID`);

--
-- Constraints for table `doctor_patient`
--
ALTER TABLE `doctor_patient`
  ADD CONSTRAINT `DOCTOR_PATIENT_FK1` FOREIGN KEY (`STAFF_ID`) REFERENCES `org_staff` (`STAFF_ID`),
  ADD CONSTRAINT `DOCTOR_PATIENT_FK2` FOREIGN KEY (`PATIENT_ID`) REFERENCES `patient` (`PATIENT_ID`);

--
-- Constraints for table `dr_patient_refrl`
--
ALTER TABLE `dr_patient_refrl`
  ADD CONSTRAINT `DR_PATIENT_REFRL_FK1` FOREIGN KEY (`STAFF_ID`, `PATIENT_ID`) REFERENCES `doctor_patient` (`STAFF_ID`, `PATIENT_ID`),
  ADD CONSTRAINT `DR_PATIENT_REFRL_FK2` FOREIGN KEY (`RFRNG_STATUS_CD`) REFERENCES `rf_rfrl_status` (`RFRL_STATUS_CD`),
  ADD CONSTRAINT `DR_PATIENT_REFRL_FK3` FOREIGN KEY (`RFRD_STAFF_ID`) REFERENCES `org_staff` (`STAFF_ID`),
  ADD CONSTRAINT `DR_PATIENT_REFRL_FK4` FOREIGN KEY (`RFRD_STATUS_CD`) REFERENCES `rf_rfrl_status` (`RFRL_STATUS_CD`);

--
-- Constraints for table `dr_refrl_template`
--
ALTER TABLE `dr_refrl_template`
  ADD CONSTRAINT `DR_REFRL_TEMPLATE_FK1` FOREIGN KEY (`STAFF_ID`) REFERENCES `org_staff` (`STAFF_ID`);

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `ORGANIZATION_FK1` FOREIGN KEY (`ORG_TYPE_CD`) REFERENCES `rf_org_type` (`ORG_TYPE_CD`),
  ADD CONSTRAINT `ORGANIZATION_FK2` FOREIGN KEY (`PARENT_ORG_ID`) REFERENCES `organization` (`ORG_ID`);

--
-- Constraints for table `org_address`
--
ALTER TABLE `org_address`
  ADD CONSTRAINT `ORG_ADDRESS_FK1` FOREIGN KEY (`ADDRESS_ID`) REFERENCES `address` (`ADDRESS_ID`),
  ADD CONSTRAINT `ORG_ADDRESS_FK2` FOREIGN KEY (`ORG_ID`) REFERENCES `organization` (`ORG_ID`),
  ADD CONSTRAINT `ORG_ADDRESS_FK3` FOREIGN KEY (`ADDRESS_TYPE_CD`) REFERENCES `rf_address_type` (`ADDRESS_TYPE_CD`);

--
-- Constraints for table `org_service`
--
ALTER TABLE `org_service`
  ADD CONSTRAINT `ORG_SERVICE_FK1` FOREIGN KEY (`ORG_ID`) REFERENCES `organization` (`ORG_ID`),
  ADD CONSTRAINT `ORG_SERVICE_FK2` FOREIGN KEY (`SERVICE_TYPE_CD`) REFERENCES `rf_service_type` (`SERVICE_TYPE_CD`);

--
-- Constraints for table `org_staff`
--
ALTER TABLE `org_staff`
  ADD CONSTRAINT `ORG_STAFF_FK1` FOREIGN KEY (`ORG_ID`) REFERENCES `organization` (`ORG_ID`),
  ADD CONSTRAINT `ORG_STAFF_FK2` FOREIGN KEY (`STAFF_TYPE_CD`) REFERENCES `rf_staff_type` (`STAFF_TYPE_CD`),
  ADD CONSTRAINT `ORG_STAFF_FK3` FOREIGN KEY (`SPCLTY_TYPE_CD`) REFERENCES `rf_spclty_type` (`SPCLTY_TYPE_CD`),
  ADD CONSTRAINT `ORG_STAFF_FK4` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `user_account` (`ACCOUNT_ID`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `PATIENT_FK1` FOREIGN KEY (`GENDER_CD`) REFERENCES `rf_gender` (`GENDER_CD`),
  ADD CONSTRAINT `PATIENT_FK2` FOREIGN KEY (`ACCOUNT_ID`) REFERENCES `user_account` (`ACCOUNT_ID`);

--
-- Constraints for table `patient_address`
--
ALTER TABLE `patient_address`
  ADD CONSTRAINT `PAT_ADDRESS_FK1` FOREIGN KEY (`ADDRESS_ID`) REFERENCES `address` (`ADDRESS_ID`),
  ADD CONSTRAINT `PAT_ADDRESS_FK2` FOREIGN KEY (`ADDRESS_TYPE_CD`) REFERENCES `rf_address_type` (`ADDRESS_TYPE_CD`),
  ADD CONSTRAINT `PAT_ADDRESS_FK3` FOREIGN KEY (`PATIENT_ID`) REFERENCES `patient` (`PATIENT_ID`);
