-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 01:05 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `1interview_detail`
--

CREATE TABLE `1interview_detail` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `1date` date NOT NULL,
  `1time` time NOT NULL,
  `1type_interview` varchar(50) DEFAULT NULL,
  `venue` varchar(60) NOT NULL,
  `1attach_jd` varchar(10) DEFAULT NULL,
  `1type_jd` varchar(50) DEFAULT NULL,
  `call_letter` varchar(10) DEFAULT NULL,
  `1appeared_interview` varchar(10) DEFAULT NULL,
  `1shortlisted` varchar(10) DEFAULT NULL,
  `1interviwer_name` varchar(30) DEFAULT NULL,
  `1mark_final_round` varchar(10) DEFAULT NULL,
  `1next_round` varchar(10) DEFAULT NULL,
  `1rejection_reason` varchar(50) DEFAULT NULL,
  `1cooling_period` varchar(10) DEFAULT NULL,
  `1blacklist` varchar(10) DEFAULT NULL,
  `1reason_non_appearance` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `1interview_detail`
--

INSERT INTO `1interview_detail` (`fk`, `c_id`, `1date`, `1time`, `1type_interview`, `venue`, `1attach_jd`, `1type_jd`, `call_letter`, `1appeared_interview`, `1shortlisted`, `1interviwer_name`, `1mark_final_round`, `1next_round`, `1rejection_reason`, `1cooling_period`, `1blacklist`, `1reason_non_appearance`) VALUES
(1, 102, '2020-07-25', '11:36:00', 'Face 2 Face', '', 'no', '', 'yes', 'yes', 'yes', 'nikhil', 'no', 'yes', ' ', 'no', 'no', ' '),
(2, 101, '2020-07-19', '14:35:00', 'Face 2 Face', '', 'yes', '', 'yes', 'yes', 'yes', ' srk', 'no', 'yes', ' ', 'no', 'no', ' '),
(3, 0, '2020-07-11', '13:01:00', 'Telephonic', '', 'no', '', 'yes', 'yes', 'yes', 'vikas roy', 'no', 'yes', ' ', 'no', 'no', ' '),
(2, 107, '2020-08-20', '08:22:00', 'Face 2 Face', '', 'no', '', 'yes', 'yes', 'yes', 'abc', 'yes', 'no', ' ', 'no', 'no', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `2interview_detail`
--

CREATE TABLE `2interview_detail` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `1date` date NOT NULL,
  `1time` time NOT NULL,
  `1type_interview` varchar(50) DEFAULT NULL,
  `venue` varchar(60) NOT NULL,
  `1attach_jd` varchar(10) DEFAULT NULL,
  `1type_jd` varchar(50) DEFAULT NULL,
  `call_letter` varchar(10) NOT NULL,
  `1appeared_interview` varchar(10) DEFAULT NULL,
  `1shortlisted` varchar(10) DEFAULT NULL,
  `1interviwer_name` varchar(30) DEFAULT NULL,
  `1mark_final_round` varchar(10) DEFAULT NULL,
  `1next_round` varchar(10) DEFAULT NULL,
  `1rejection_reason` varchar(50) DEFAULT NULL,
  `1cooling_period` varchar(10) DEFAULT NULL,
  `1blacklist` varchar(10) DEFAULT NULL,
  `1reason_non_appearance` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `2interview_detail`
--

INSERT INTO `2interview_detail` (`fk`, `c_id`, `1date`, `1time`, `1type_interview`, `venue`, `1attach_jd`, `1type_jd`, `call_letter`, `1appeared_interview`, `1shortlisted`, `1interviwer_name`, `1mark_final_round`, `1next_round`, `1rejection_reason`, `1cooling_period`, `1blacklist`, `1reason_non_appearance`) VALUES
(1, 102, '2020-07-12', '11:35:00', 'Zoom Video Call', '', 'yes', 'php developer JD', 'yes', 'yes', 'yes', 'nikhil2', 'no', 'yes', ' ', 'no', 'no', ' '),
(2, 101, '2020-07-08', '19:35:00', 'Telephonic', '', 'no', '', 'yes', 'yes', 'yes', ' srk', 'no', 'yes', ' ', 'no', 'no', ' '),
(3, 0, '2020-07-04', '20:16:00', 'Face 2 Face', '', 'no', '', 'yes', 'yes', 'yes', 'vikas roy', 'no', 'yes', ' ', 'no', 'no', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `3interview_detail`
--

CREATE TABLE `3interview_detail` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `1date` date NOT NULL,
  `1time` time NOT NULL,
  `1type_interview` varchar(50) DEFAULT NULL,
  `venue` varchar(60) NOT NULL,
  `1attach_jd` varchar(10) DEFAULT NULL,
  `1type_jd` varchar(50) DEFAULT NULL,
  `call_letter` varchar(10) NOT NULL,
  `1appeared_interview` varchar(10) DEFAULT NULL,
  `1shortlisted` varchar(10) DEFAULT NULL,
  `1interviwer_name` varchar(30) DEFAULT NULL,
  `1mark_final_round` varchar(10) DEFAULT NULL,
  `1next_round` varchar(10) DEFAULT NULL,
  `1rejection_reason` varchar(50) DEFAULT NULL,
  `1cooling_period` varchar(10) DEFAULT NULL,
  `1blacklist` varchar(10) DEFAULT NULL,
  `1reason_non_appearance` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `3interview_detail`
--

INSERT INTO `3interview_detail` (`fk`, `c_id`, `1date`, `1time`, `1type_interview`, `venue`, `1attach_jd`, `1type_jd`, `call_letter`, `1appeared_interview`, `1shortlisted`, `1interviwer_name`, `1mark_final_round`, `1next_round`, `1rejection_reason`, `1cooling_period`, `1blacklist`, `1reason_non_appearance`) VALUES
(2, 101, '2020-07-17', '22:36:00', 'Telephonic', '', 'no', '', 'yes', 'yes', 'yes', ' srk6_fake', 'no', 'yes', ' ', 'no', 'no', ' '),
(3, 0, '1970-01-01', '00:00:00', '', '', 'no', '', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 102, '2020-07-04', '00:00:00', 'Telephonic', '', 'no', '', 'yes', 'yes', 'yes', 'vikas roy', 'no', 'yes', ' ', 'no', 'no', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `4interview_detail`
--

CREATE TABLE `4interview_detail` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `1date` date NOT NULL,
  `1time` time NOT NULL,
  `1type_interview` varchar(50) DEFAULT NULL,
  `venue` varchar(60) NOT NULL,
  `1attach_jd` varchar(10) DEFAULT NULL,
  `1type_jd` varchar(50) DEFAULT NULL,
  `call_letter` varchar(10) NOT NULL,
  `1appeared_interview` varchar(10) DEFAULT NULL,
  `1shortlisted` varchar(10) DEFAULT NULL,
  `1interviwer_name` varchar(30) DEFAULT NULL,
  `1mark_final_round` varchar(10) DEFAULT NULL,
  `1next_round` varchar(10) DEFAULT NULL,
  `1rejection_reason` varchar(50) DEFAULT NULL,
  `1cooling_period` varchar(10) DEFAULT NULL,
  `1blacklist` varchar(10) DEFAULT NULL,
  `1reason_non_appearance` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `4interview_detail`
--

INSERT INTO `4interview_detail` (`fk`, `c_id`, `1date`, `1time`, `1type_interview`, `venue`, `1attach_jd`, `1type_jd`, `call_letter`, `1appeared_interview`, `1shortlisted`, `1interviwer_name`, `1mark_final_round`, `1next_round`, `1rejection_reason`, `1cooling_period`, `1blacklist`, `1reason_non_appearance`) VALUES
(1, 102, '1970-01-01', '02:00:00', 'Face 2 Face', '', 'no', '', 'yes', 'yes', 'yes', 'nikhil 4', 'no', 'no', ' ', 'no', 'no', ' '),
(2, 101, '2020-07-26', '10:27:00', 'Face 2 Face', '', 'no', '', 'yes', 'yes', 'yes', 'gopal rao', 'no', 'no', ' ', 'no', 'no', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `blacklist`
--

CREATE TABLE `blacklist` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `yes_no` varchar(5) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `blacklist_date` date NOT NULL,
  `rec_name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blacklist`
--

INSERT INTO `blacklist` (`fk`, `c_id`, `yes_no`, `reason`, `blacklist_date`, `rec_name`) VALUES
(1, 102, 'yes', 'sjbljsf', '2020-06-28', 'dhira'),
(2, 101, 'yes', 'he rejected the offer letter', '2020-09-17', 'nikhi');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_documents`
--

CREATE TABLE `candidate_documents` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `resume` varchar(70) NOT NULL,
  `c_address` varchar(70) NOT NULL,
  `p_address` varchar(70) NOT NULL,
  `pancard` varchar(70) NOT NULL,
  `edu_certificates` varchar(70) NOT NULL,
  `pro_certificates` varchar(70) NOT NULL,
  `photo` varchar(70) NOT NULL,
  `payslip` varchar(70) NOT NULL,
  `form16` varchar(70) NOT NULL,
  `exp_certificates` varchar(70) NOT NULL,
  `others` varchar(70) NOT NULL,
  `lock_form` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_documents`
--

INSERT INTO `candidate_documents` (`fk`, `c_id`, `resume`, `c_address`, `p_address`, `pancard`, `edu_certificates`, `pro_certificates`, `photo`, `payslip`, `form16`, `exp_certificates`, `others`, `lock_form`) VALUES
(5, 101, '2663-Webp.net-resizeimage.jpg', '7385-certi78.PDF', '8623-certi78.PDF', '2769-certi78.PDF', '2663-59855.jpg', '7006-certi78.PDF', '3384-pic.jpg', '1037-certi78.PDF', '3410-certi78.PDF', '8126-certi78.PDF', '7035-favi.jpg', 0),
(6, 102, '1659-certi78.PDF', '3374-certi78.PDF', '5614-certi78.PDF', '1678-certi78.PDF', '3101-certi78.PDF', '', '6692-pic.jpg', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_info`
--

CREATE TABLE `candidate_info` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `first_name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `last_name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(1) CHARACTER SET utf8mb4 NOT NULL,
  `adhar` varchar(20) NOT NULL,
  `pan` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `technology` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_info`
--

INSERT INTO `candidate_info` (`fk`, `c_id`, `first_name`, `last_name`, `dob`, `gender`, `adhar`, `pan`, `technology`) VALUES
(1, 102, 'mr_cand_3', 'singhi', '2020-06-26', 'M', '111111111111', 'SDFMA3999A', 'php developer'),
(2, 101, 'mr_cand_2', 'Singh', '2020-06-25', 'M', 'NA', 'NA', 'pyhthon developer'),
(3, 0, 'Mickey', 'Kotwal', '2020-06-26', 'M', '', 'AAAAA9999B', 'pyhthon developer'),
(2, 107, 'Mickey', 'Mouse', '2020-08-18', 'M', '111111111118', 'AAAAA9999C', 'php developer'),
(2, 103, 'ramesh', 'singh', '2020-08-06', 'M', 'ok', 'AAAAA9999P', 'php developer');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_table`
--

CREATE TABLE `candidate_table` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `cand_name` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `tech_domain` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_table`
--

INSERT INTO `candidate_table` (`id`, `r_id`, `cand_name`, `phone`, `tech_domain`) VALUES
(101, 2, 'mr_cand_2', '123412341234', 'JSP and servlet'),
(102, 1, 'mr_cand_3', '111122223333', 'Java'),
(103, 2, 'Rmaesh singh', '124312341234', 'Python'),
(104, 2, 'rohit sharma', '123443211234', 'dot Net'),
(107, 2, 'abc', '124312341235', 'php'),
(108, 2, 'gulzar', '9682636577', 'Core Java');

-- --------------------------------------------------------

--
-- Table structure for table `checklist_on_joining`
--

CREATE TABLE `checklist_on_joining` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `exp_and_rel_cert` varchar(100) NOT NULL,
  `signed_nda` varchar(100) NOT NULL,
  `signed_mou` varchar(100) NOT NULL,
  `pf_nomination` varchar(100) NOT NULL,
  `declaration_form` varchar(100) NOT NULL,
  `passport_undertaking` varchar(100) NOT NULL,
  `undertaking_relieving` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checklist_on_joining`
--

INSERT INTO `checklist_on_joining` (`fk`, `c_id`, `exp_and_rel_cert`, `signed_nda`, `signed_mou`, `pf_nomination`, `declaration_form`, `passport_undertaking`, `undertaking_relieving`) VALUES
(2, 101, '', '', '5561-kenneth.jpg', '', '', '9939-kenneth.jpg', '3697-pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `alter_mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alter_email` varchar(50) NOT NULL,
  `skype` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`fk`, `c_id`, `mobile`, `alter_mobile`, `email`, `alter_email`, `skype`) VALUES
(1, 102, 9149436968, '9622278728', 'nitinkotwal18@gmail.com', 'nitinkotwal18@gmail.com', 'mr_cand_3_skype'),
(2, 101, 9149436967, '1234557865', 'nikhilkotwalcoc@gmail.com', 'nitinkotwal18@gmail.com', 'nikhilskype'),
(3, 0, 9149436969, '9222456732', 'nitinkotwal18999@gmail.co', 'nitinkotwal18@gmail.com', 'nikhilskype007'),
(2, 107, 9149436966, '9622325471', 'nitinkotwal777@gmail.com', 'nitinkotwal18888@gmail.com', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `cooling_details`
--

CREATE TABLE `cooling_details` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cooling_details`
--

INSERT INTO `cooling_details` (`fk`, `c_id`, `start_date`, `end_date`) VALUES
(2, 101, '2020-06-26', '2020-09-24'),
(1, 102, '2020-06-29', '2020-09-27'),
(3, 0, '2020-06-22', '2020-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `ctc_table`
--

CREATE TABLE `ctc_table` (
  `c_id` int(11) NOT NULL,
  `percen` int(11) NOT NULL,
  `m_basic_pay` int(11) NOT NULL,
  `a_basic_pay` int(11) NOT NULL,
  `m_house_rent` int(11) NOT NULL,
  `a_house_rent` int(11) NOT NULL,
  `m_med_allowance` int(11) NOT NULL,
  `a_med_allowance` int(11) NOT NULL,
  `m_conveyance_allowance` int(11) NOT NULL,
  `a_conveyance_allowance` int(11) NOT NULL,
  `m_lta_basic` int(11) NOT NULL,
  `a_lta_basic` int(11) NOT NULL,
  `m_misc_allowance` int(11) NOT NULL,
  `a_misc_allowance` int(11) NOT NULL,
  `m_total_a` int(11) NOT NULL,
  `a_total_a` int(11) NOT NULL,
  `m_performance` int(11) NOT NULL,
  `a_performance` int(11) NOT NULL,
  `m_night_shift` int(11) NOT NULL,
  `a_night_shift` int(11) NOT NULL,
  `m_total_b` int(11) NOT NULL,
  `a_total_b` int(11) NOT NULL,
  `m_total_ab` int(11) NOT NULL,
  `a_total_ab` int(11) NOT NULL,
  `m_esic` int(11) NOT NULL,
  `a_esic` int(11) NOT NULL,
  `m_pf_contri` int(11) NOT NULL,
  `a_pf_contri` int(11) NOT NULL,
  `m_gratuity_c` int(11) NOT NULL,
  `a_gratuity_c` int(11) NOT NULL,
  `m_medi_claim_c` int(11) NOT NULL,
  `a_medi_claim_c` int(11) NOT NULL,
  `m_total_c` int(11) NOT NULL,
  `a_total_c` int(11) NOT NULL,
  `m_total_abc` int(11) NOT NULL,
  `a_total_abc` int(11) NOT NULL,
  `m_pro_tax` int(11) NOT NULL,
  `a_pro_tax` int(11) NOT NULL,
  `m_pf_contri_employer` int(11) NOT NULL,
  `a_pf_contri_employer` int(11) NOT NULL,
  `m_pf_contri_employee` int(11) NOT NULL,
  `a_pf_contri_employee` int(11) NOT NULL,
  `m_esic_contri_employer` int(11) NOT NULL,
  `a_esic_contri_employer` int(11) NOT NULL,
  `m_esic_contri_employee` int(11) NOT NULL,
  `a_esic_contri_employee` int(11) NOT NULL,
  `m_gratuity_e` int(11) NOT NULL,
  `a_gratuity_e` int(11) NOT NULL,
  `m_medi_claim_e` int(11) NOT NULL,
  `a_medi_claim_e` int(11) NOT NULL,
  `m_total_e` int(11) NOT NULL,
  `a_total_e` int(11) NOT NULL,
  `m_net_take_home` int(11) NOT NULL,
  `a_net_take_home` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ctc_table`
--

INSERT INTO `ctc_table` (`c_id`, `percen`, `m_basic_pay`, `a_basic_pay`, `m_house_rent`, `a_house_rent`, `m_med_allowance`, `a_med_allowance`, `m_conveyance_allowance`, `a_conveyance_allowance`, `m_lta_basic`, `a_lta_basic`, `m_misc_allowance`, `a_misc_allowance`, `m_total_a`, `a_total_a`, `m_performance`, `a_performance`, `m_night_shift`, `a_night_shift`, `m_total_b`, `a_total_b`, `m_total_ab`, `a_total_ab`, `m_esic`, `a_esic`, `m_pf_contri`, `a_pf_contri`, `m_gratuity_c`, `a_gratuity_c`, `m_medi_claim_c`, `a_medi_claim_c`, `m_total_c`, `a_total_c`, `m_total_abc`, `a_total_abc`, `m_pro_tax`, `a_pro_tax`, `m_pf_contri_employer`, `a_pf_contri_employer`, `m_pf_contri_employee`, `a_pf_contri_employee`, `m_esic_contri_employer`, `a_esic_contri_employer`, `m_esic_contri_employee`, `a_esic_contri_employee`, `m_gratuity_e`, `a_gratuity_e`, `m_medi_claim_e`, `a_medi_claim_e`, `m_total_e`, `a_total_e`, `m_net_take_home`, `a_net_take_home`) VALUES
(101, 15, 3165, 37980, 1266, 15192, 1250, 15000, 1600, 19200, 263, 3156, 13556, 162672, 23000, 253200, 0, 0, 0, 0, 0, 0, 23000, 253200, 650, 7800, 379, 4548, 153, 1836, 160, 1920, 692, 0, 21792, 261504, 200, 2500, 379, 4548, 379, 8400, 0, 0, 150, 1800, 153, 153, 160, 1932, 1272, 19204, 20520, 242300);

-- --------------------------------------------------------

--
-- Table structure for table `e1`
--

CREATE TABLE `e1` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `pos1` varchar(50) NOT NULL,
  `pos2` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `before_applied` varchar(5) NOT NULL,
  `date_on_applied` date NOT NULL,
  `before_employed` varchar(5) NOT NULL,
  `date_on_employed` date NOT NULL,
  `how_referred` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `marital_status` varchar(15) NOT NULL,
  `bg` varchar(10) NOT NULL,
  `aadhar` varchar(25) NOT NULL,
  `pancard` varchar(25) NOT NULL,
  `passport` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e1`
--

INSERT INTO `e1` (`fk`, `c_id`, `pos1`, `pos2`, `photo`, `before_applied`, `date_on_applied`, `before_employed`, `date_on_employed`, `how_referred`, `full_name`, `gender`, `dob`, `age`, `nationality`, `marital_status`, `bg`, `aadhar`, `pancard`, `passport`) VALUES
(5, 101, 'SDE Intern2', 'junior security officer', '4076-pic.jpg', 'yes', '2001-10-11', 'yes', '2020-08-18', 'Google', 'Nikhil Singh kotwal rajput', 'MALE', '2001-10-04', 19, 'INDIAN', 'Single', 'O+ve', '111122224444', 'SDFMA3999A', 'ABCD1234xyz'),
(6, 102, 'SDE Intern', '', '4544-idea_to.jpg', 'no', '1970-01-01', 'no', '1970-01-01', 'Monster', 'Mr Cand 3', 'MALE', '2001-01-11', 21, 'INDIAN', 'Single', 'O+ve', '124312341234', 'AAAAA9999A', 'NIL');

-- --------------------------------------------------------

--
-- Table structure for table `e2`
--

CREATE TABLE `e2` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `c_landmark` varchar(100) NOT NULL,
  `c_city` varchar(100) NOT NULL,
  `c_pincode` varchar(10) NOT NULL,
  `c_state` varchar(25) NOT NULL,
  `c_mobile` varchar(15) NOT NULL,
  `c_landline` varchar(15) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `same_address` varchar(11) NOT NULL,
  `p_landmark` varchar(100) NOT NULL,
  `p_city` varchar(50) NOT NULL,
  `p_pincode` varchar(10) NOT NULL,
  `p_state` varchar(25) NOT NULL,
  `p_mobile` varchar(15) NOT NULL,
  `p_landline` varchar(15) NOT NULL,
  `p_email` varchar(50) NOT NULL,
  `emergency_person_name` varchar(30) NOT NULL,
  `emergency_relation` varchar(50) NOT NULL,
  `emergency_num` varchar(15) NOT NULL,
  `emergency_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e2`
--

INSERT INTO `e2` (`fk`, `c_id`, `c_landmark`, `c_city`, `c_pincode`, `c_state`, `c_mobile`, `c_landline`, `c_email`, `same_address`, `p_landmark`, `p_city`, `p_pincode`, `p_state`, `p_mobile`, `p_landline`, `p_email`, `emergency_person_name`, `emergency_relation`, `emergency_num`, `emergency_address`) VALUES
(5, 101, 'command camp', 'Udhampur', '182121', 'JAMMU AND KASHMIR', '0962232890', '020-14141', 'nitinkotwal18@gmail.com', 'yes', 'NA', 'Udhampur', '182121', 'jammu and kashmir', '', '', '', 'Rohit', 'sister', '09622325471', 'Village kotli pain P/o garhi'),
(6, 102, 'command camp', 'abc', '182121', 'up', '9682636577', '02365', 'abc@gmail.com', 'yes', '', '', '', '', '', '', '', 'xyz', 'sister', '1234567890', 'gandhi road');

-- --------------------------------------------------------

--
-- Table structure for table `e3`
--

CREATE TABLE `e3` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `name1` varchar(30) NOT NULL,
  `age1` varchar(30) NOT NULL,
  `dob1` varchar(30) NOT NULL,
  `relationship1` varchar(30) NOT NULL,
  `occupation1` varchar(30) NOT NULL,
  `name2` varchar(30) NOT NULL,
  `age2` varchar(30) NOT NULL,
  `dob2` varchar(30) NOT NULL,
  `relationship2` varchar(30) NOT NULL,
  `occupation2` varchar(30) NOT NULL,
  `name3` varchar(30) NOT NULL,
  `age3` varchar(30) NOT NULL,
  `dob3` varchar(30) NOT NULL,
  `relationship3` varchar(30) NOT NULL,
  `occupation3` varchar(30) NOT NULL,
  `name4` varchar(30) NOT NULL,
  `age4` varchar(30) NOT NULL,
  `dob4` varchar(30) NOT NULL,
  `relationship4` varchar(30) NOT NULL,
  `occupation4` varchar(30) NOT NULL,
  `name5` varchar(30) NOT NULL,
  `age5` varchar(30) NOT NULL,
  `dob5` varchar(30) NOT NULL,
  `relationship5` varchar(30) NOT NULL,
  `occupation5` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e3`
--

INSERT INTO `e3` (`fk`, `c_id`, `name1`, `age1`, `dob1`, `relationship1`, `occupation1`, `name2`, `age2`, `dob2`, `relationship2`, `occupation2`, `name3`, `age3`, `dob3`, `relationship3`, `occupation3`, `name4`, `age4`, `dob4`, `relationship4`, `occupation4`, `name5`, `age5`, `dob5`, `relationship5`, `occupation5`) VALUES
(5, 101, 'Nikhil Singh Kotwal', '19', '04-10-2001', 'brother', 'farmer', 'xbn', '21', '08-07-1999', 'uncle', 'manager', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 102, 'abc', '12', '04-10-2001', 'uncle', 'actor', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `e4`
--

CREATE TABLE `e4` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `lang1` varchar(50) NOT NULL,
  `read1` varchar(5) NOT NULL,
  `write1` varchar(5) NOT NULL,
  `speak1` varchar(5) NOT NULL,
  `lang2` varchar(50) NOT NULL,
  `read2` varchar(5) NOT NULL,
  `write2` varchar(5) NOT NULL,
  `speak2` varchar(5) NOT NULL,
  `lang3` varchar(50) NOT NULL,
  `read3` varchar(5) NOT NULL,
  `write3` varchar(5) NOT NULL,
  `speak3` varchar(5) NOT NULL,
  `lang4` varchar(50) NOT NULL,
  `read4` varchar(5) NOT NULL,
  `write4` varchar(5) NOT NULL,
  `speak4` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e4`
--

INSERT INTO `e4` (`fk`, `c_id`, `lang1`, `read1`, `write1`, `speak1`, `lang2`, `read2`, `write2`, `speak2`, `lang3`, `read3`, `write3`, `speak3`, `lang4`, `read4`, `write4`, `speak4`) VALUES
(5, 101, 'hindi', 'yes', '', '', 'english', '', 'yes', 'yes', 'punjabi', '', '', 'yes', '', '', '', ''),
(6, 102, 'hindi', 'yes', 'yes', 'yes', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `e5`
--

CREATE TABLE `e5` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `institute_name1` varchar(50) NOT NULL,
  `city1` varchar(50) NOT NULL,
  `from1` varchar(50) NOT NULL,
  `to1` varchar(50) NOT NULL,
  `course1` varchar(50) NOT NULL,
  `grade1` varchar(50) NOT NULL,
  `institute_name2` varchar(50) NOT NULL,
  `city2` varchar(50) NOT NULL,
  `from2` varchar(50) NOT NULL,
  `to2` varchar(50) NOT NULL,
  `course2` varchar(50) NOT NULL,
  `grade2` varchar(50) NOT NULL,
  `institute_name3` varchar(50) NOT NULL,
  `city3` varchar(50) NOT NULL,
  `from3` varchar(50) NOT NULL,
  `to3` varchar(50) NOT NULL,
  `course3` varchar(50) NOT NULL,
  `grade3` varchar(50) NOT NULL,
  `institute_name4` varchar(50) NOT NULL,
  `city4` varchar(50) NOT NULL,
  `from4` varchar(50) NOT NULL,
  `to4` varchar(50) NOT NULL,
  `course4` varchar(50) NOT NULL,
  `grade4` varchar(50) NOT NULL,
  `institute_name5` varchar(50) NOT NULL,
  `city5` varchar(50) NOT NULL,
  `from5` varchar(50) NOT NULL,
  `to5` varchar(50) NOT NULL,
  `course5` varchar(50) NOT NULL,
  `grade5` varchar(50) NOT NULL,
  `institute_name6` varchar(50) NOT NULL,
  `city6` varchar(50) NOT NULL,
  `from6` varchar(50) NOT NULL,
  `to6` varchar(50) NOT NULL,
  `course6` varchar(50) NOT NULL,
  `grade6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e5`
--

INSERT INTO `e5` (`fk`, `c_id`, `institute_name1`, `city1`, `from1`, `to1`, `course1`, `grade1`, `institute_name2`, `city2`, `from2`, `to2`, `course2`, `grade2`, `institute_name3`, `city3`, `from3`, `to3`, `course3`, `grade3`, `institute_name4`, `city4`, `from4`, `to4`, `course4`, `grade4`, `institute_name5`, `city5`, `from5`, `to5`, `course5`, `grade5`, `institute_name6`, `city6`, `from6`, `to6`, `course6`, `grade6`) VALUES
(5, 101, 'Army Public school', 'Udhampur', '2010', '2018', 'Primary education', '91.8 %', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 102, 'Army Public school', 'PUNE', '2010', '2018', 'Primary education', '91.8 %', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `e6`
--

CREATE TABLE `e6` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `describe_yourself` varchar(500) NOT NULL,
  `strength` varchar(500) NOT NULL,
  `Professional_achievement` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e6`
--

INSERT INTO `e6` (`fk`, `c_id`, `describe_yourself`, `strength`, `Professional_achievement`) VALUES
(5, 101, 'Im a self motivated and hardworking student ', 'self motivated and hardworking', 'best performer in the internship\r\n'),
(6, 102, 'self mmotivated', 'hardworking and emotional', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `e7`
--

CREATE TABLE `e7` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `it_exp` varchar(10) NOT NULL,
  `non_it_exp` varchar(10) NOT NULL,
  `political` varchar(100) NOT NULL,
  `physical_disability` varchar(100) NOT NULL,
  `work_in_week` varchar(10) NOT NULL,
  `deadline_time_in_week` varchar(50) NOT NULL,
  `new_stuff` varchar(50) NOT NULL,
  `you_prefer` varchar(50) NOT NULL,
  `stock_option` varchar(50) NOT NULL,
  `imp_for_organization` varchar(50) NOT NULL,
  `you_share_info` varchar(50) NOT NULL,
  `yourself` varchar(50) NOT NULL,
  `handle_risk` varchar(20) NOT NULL,
  `will_travel` varchar(50) NOT NULL,
  `money` varchar(50) NOT NULL,
  `recognition` varchar(50) NOT NULL,
  `team` varchar(50) NOT NULL,
  `pressure` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e7`
--

INSERT INTO `e7` (`fk`, `c_id`, `it_exp`, `non_it_exp`, `political`, `physical_disability`, `work_in_week`, `deadline_time_in_week`, `new_stuff`, `you_prefer`, `stock_option`, `imp_for_organization`, `you_share_info`, `yourself`, `handle_risk`, `will_travel`, `money`, `recognition`, `team`, `pressure`) VALUES
(5, 101, '4', '3', 'NA', 'NA', '40 Hrs', '60 Hrs', 'Need Basis', 'Programmer', 'no', 'Your Individual Performance', 'yes', 'Team Player', 'Very Well', 'yes', '1', '4', '2', '3'),
(6, 102, '4', '3', 'NA', 'NA', '40 Hrs', '40 Hrs', 'Regularly', 'Manager', 'yes', 'Your Individual Performance', 'no', 'Individual Contributor', 'Not so well', 'no', '1', '4', '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `e8`
--

CREATE TABLE `e8` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `subject1` varchar(100) NOT NULL,
  `skill_grade1` varchar(50) NOT NULL,
  `subject2` varchar(100) NOT NULL,
  `skill_grade2` varchar(50) NOT NULL,
  `subject3` varchar(100) NOT NULL,
  `skill_grade3` varchar(50) NOT NULL,
  `subject4` varchar(100) NOT NULL,
  `skill_grade4` varchar(100) NOT NULL,
  `subject5` varchar(100) NOT NULL,
  `skill_grade5` varchar(100) NOT NULL,
  `subject6` varchar(100) NOT NULL,
  `skill_grade6` varchar(100) NOT NULL,
  `other_special_skill` varchar(500) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e8`
--

INSERT INTO `e8` (`fk`, `c_id`, `subject1`, `skill_grade1`, `subject2`, `skill_grade2`, `subject3`, `skill_grade3`, `subject4`, `skill_grade4`, `subject5`, `skill_grade5`, `subject6`, `skill_grade6`, `other_special_skill`, `name`) VALUES
(5, 101, 'c++', 'Excellent', 'java', 'Above Avg', 'python', 'Avg', 'php', 'Below Avg', 'abc', 'Below Avg', 'pqr', 'Below Avg', 'japnese', 's1'),
(5, 101, 'c++', 'Excellent', 'java', 'Above Avg', 'python', 'Avg', 'php', 'Below Avg', 'abc', 'Below Avg', 'pqr', 'Below Avg', 'japnese', 's2'),
(6, 102, 'c++', 'Above Avg', 'java', 'Excellent', 'python', 'Excellent', '', '', '', '', '', '', 'hindi', 'java');

-- --------------------------------------------------------

--
-- Table structure for table `e9`
--

CREATE TABLE `e9` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `employer_name` varchar(30) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `company_address` varchar(70) NOT NULL,
  `supervisor_name` varchar(30) NOT NULL,
  `supervisor_phone` varchar(20) NOT NULL,
  `supervisor_email` varchar(50) NOT NULL,
  `hr_name` varchar(30) NOT NULL,
  `hr_mobile` varchar(15) NOT NULL,
  `hr_email` varchar(50) NOT NULL,
  `last_ctc` varchar(30) NOT NULL,
  `reason_for_leaving` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e9`
--

INSERT INTO `e9` (`fk`, `c_id`, `employer_name`, `from_date`, `to_date`, `company_address`, `supervisor_name`, `supervisor_phone`, `supervisor_email`, `hr_name`, `hr_mobile`, `hr_email`, `last_ctc`, `reason_for_leaving`) VALUES
(6, 102, 'abc 1', '0000-00-00', '0000-00-00', 'abc colonoy', 'a', '09149436968', 'nitinkotwal18@gmail.com', 'xyz', '09149436968', 'nitinkotwal18@gmail.com', '15222', 'reason1'),
(6, 102, 'abc 2', '0000-00-00', '0000-00-00', 'pqr colony', 'abc2', '9682636577', 'a@gmail.com', 'xyz 2', '9682636577', 'ba@gmail.com', '2000', 'reason 2'),
(5, 101, 'abc1', '0000-00-00', '0000-00-00', 'village kotli pain udhampur', 'abc2', '09149436968', 'nitinkotwal18@gmail.com', 'xyz', '09149436968', 'nitinkotwal18@gmail.com', '15222', 'far from home');

-- --------------------------------------------------------

--
-- Table structure for table `e10`
--

CREATE TABLE `e10` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `ref_name1` varchar(50) NOT NULL,
  `ref_relation1` varchar(50) NOT NULL,
  `ref_occupation1` varchar(50) NOT NULL,
  `ref_address1` varchar(100) NOT NULL,
  `ref_mobile1` varchar(20) NOT NULL,
  `ref_email1` varchar(50) NOT NULL,
  `ref_name2` varchar(50) NOT NULL,
  `ref_relation2` varchar(50) NOT NULL,
  `ref_occupation2` varchar(50) NOT NULL,
  `ref_address2` varchar(100) NOT NULL,
  `ref_mobile2` varchar(50) NOT NULL,
  `ref_email2` varchar(50) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `sig_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e10`
--

INSERT INTO `e10` (`fk`, `c_id`, `ref_name1`, `ref_relation1`, `ref_occupation1`, `ref_address1`, `ref_mobile1`, `ref_email1`, `ref_name2`, `ref_relation2`, `ref_occupation2`, `ref_address2`, `ref_mobile2`, `ref_email2`, `signature`, `sig_date`) VALUES
(5, 101, 'Nikhil Singh Kotwal', 'brother', 'farmer', 'village kotli pain udhampur', '09149436968', 'nitinkotwal18@gmail.com', 'NITIN SINGHi', 'father', 'manager', 'Village kotli pain P/o garhi', '09622325471', 'nitinkotwal18@gmail.com', '7286-20200205_095241.JPEG', '2020-08-27'),
(6, 102, 'Nikhil Singh Kotwal', 'brother', 'farmer', 'village kotli pain udhampur', '09149436968', 'nitinkotwal18@gmail.com', 'Nikhil Singh Kotwal', 'father', 'manager', 'village kotli pain udhampur', '09149436968', 'nitinkotwal18@gmail.com', '6012-20200205_095241.JPEG', '2020-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `employment_table`
--

CREATE TABLE `employment_table` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `fresher` varchar(5) NOT NULL,
  `tot_exp` varchar(30) NOT NULL,
  `rel_exp` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `curr_company` varchar(30) NOT NULL,
  `curr_ctc` varchar(20) NOT NULL,
  `exp_ctc` varchar(20) NOT NULL,
  `ctc_neg` varchar(5) NOT NULL,
  `neg_upto` varchar(20) NOT NULL,
  `notice_period` varchar(30) NOT NULL,
  `joining_period` varchar(30) NOT NULL,
  `reason_job_change` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employment_table`
--

INSERT INTO `employment_table` (`fk`, `c_id`, `fresher`, `tot_exp`, `rel_exp`, `country`, `state`, `city`, `curr_company`, `curr_ctc`, `exp_ctc`, `ctc_neg`, `neg_upto`, `notice_period`, `joining_period`, `reason_job_change`) VALUES
(1, 102, '', '5 yrs', '3 yrs', 'delhi', '', '', 'google', '3LPA', '5LPA', 'YES', '3.5LPA', ' 5 years', ' 2 years', ' no reason'),
(2, 101, 'no', '8yrs', '3yrs', 'Afghanistan', 'Helmand', 'Gereshk', 'dosa pvt ltd.', '5 LPA', '7 LPA', 'no', 'NA', '6', '5', 'less lpa provided'),
(2, 107, '', '5 yrs', '3yrs', 'Afghanistan', 'Zabul', 'Qalat', 'abc', '3LPA', '5LPA', 'YES', '5.5 lpa', '5 yrs', '2 yrs', 'xyx');

-- --------------------------------------------------------

--
-- Table structure for table `extra_details`
--

CREATE TABLE `extra_details` (
  `c_id` int(11) NOT NULL,
  `Grade` varchar(100) NOT NULL,
  `Class` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Appraisal_Due_Month` varchar(100) NOT NULL,
  `Loyalty_bonus` varchar(100) NOT NULL,
  `Function` varchar(100) NOT NULL,
  `Business_Domain` varchar(100) NOT NULL,
  `SBU` varchar(100) NOT NULL,
  `Business_Type` varchar(100) NOT NULL,
  `VIT_Experience` varchar(100) NOT NULL,
  `Total_Experience` varchar(100) NOT NULL,
  `PF_number` varchar(100) NOT NULL,
  `PF_UAN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extra_details`
--

INSERT INTO `extra_details` (`c_id`, `Grade`, `Class`, `Department`, `Appraisal_Due_Month`, `Loyalty_bonus`, `Function`, `Business_Domain`, `SBU`, `Business_Type`, `VIT_Experience`, `Total_Experience`, `PF_number`, `PF_UAN`) VALUES
(101, 'B', '1st', 'marketing', '569', '897', 'xx', 'Support(CC)', '2', 'Support', '4', '5', 'xyz', 'pqrs');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE `fileupload` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `pdf_file` varchar(200) NOT NULL,
  `upload_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`fk`, `c_id`, `pdf_file`, `upload_date`) VALUES
(1, 102, '1844-', '2020-06-18'),
(2, 101, '9785-7329_Assignment_2.png', '2020-06-19'),
(3, 0, '4509-trackerformat.xlsx', '2020-06-28'),
(2, 107, '9102-certi78.PDF', '2020-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `hr_cand_form_validation`
--

CREATE TABLE `hr_cand_form_validation` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `response` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hr_offer_letter_validation`
--

CREATE TABLE `hr_offer_letter_validation` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loginform`
--

CREATE TABLE `loginform` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `authority` int(11) NOT NULL,
  `special_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginform`
--

INSERT INTO `loginform` (`id`, `username`, `password`, `email`, `authority`, `special_id`) VALUES
(1, 'dhiraj', 'f68082b602ba9abd56a896ab8027c58bf4ce49a0ccfdcbb5e91e85956e4e748e73f5c7ad0d3f70468c8f7420f76bdaa7a70089c87557a4b3e3676d7050ad36fc', '', 2, 0),
(2, 'nikhil', '232d75b251915cdd0fc859af9f9ec86ebe42125e2aeef102ab52a279473ed4b153d4c8f8b4ef01ea0a8a6f3a83f0685d6d3957ef2904424d6aa18ee679679580', 'virusnikhil900@gmail.com', 2, 0),
(3, 'cand', '342a308e7b8b46773caabc9111ef327cf743ca22e4887770c07866089718ced6274a05721ab707ea0c4f9f8b1aaa70604e6647b6260699cf930b4ab7f1dc1268', '', 2, 0),
(4, 'mr_hr', '66d01914d40eb5ca40c0e9c836c51a1612a70a9ec36b8c727da5067b5ec6b8c87cadeb54278eb09f00735e46f8e1d48628be48c6bb4d38cd2237b81f7f716288', 'nikhilkotwalcse@gmail.com', 3, 0),
(5, 'candidate', '342a308e7b8b46773caabc9111ef327cf743ca22e4887770c07866089718ced6274a05721ab707ea0c4f9f8b1aaa70604e6647b6260699cf930b4ab7f1dc1268', 'nikhilkotwalcoc@gmail.com', 1, 101),
(6, 'mr_cand_3', '2d65baeace9a116b6c1c6b5c3c4bbad41ddedd644f4c89a60989219d9c998458c1cde5e741201ef1f646e67e43a37886d123717b3d9776366cf54738b7a100a5', '', 1, 102),
(7, 'abc', '342a308e7b8b46773caabc9111ef327cf743ca22e4887770c07866089718ced6274a05721ab707ea0c4f9f8b1aaa70604e6647b6260699cf930b4ab7f1dc1268', '', 1, 107);

-- --------------------------------------------------------

--
-- Table structure for table `offer_details`
--

CREATE TABLE `offer_details` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `offer_date` date NOT NULL,
  `ctc` varchar(20) NOT NULL,
  `doj` date NOT NULL,
  `joined` varchar(20) NOT NULL,
  `actual_doj` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer_details`
--

INSERT INTO `offer_details` (`fk`, `c_id`, `offer_date`, `ctc`, `doj`, `joined`, `actual_doj`) VALUES
(2, 101, '2020-06-05', '   6 lpa', '2020-06-14', 'yes', '1970-01-01'),
(1, 102, '2020-06-06', ' 10 LPA', '2020-06-13', 'yes', '1970-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `offer_letter_fresh`
--

CREATE TABLE `offer_letter_fresh` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `salary_inr` varchar(50) NOT NULL,
  `salary_rs` varchar(50) NOT NULL,
  `joining_date` date NOT NULL,
  `joining_time` time NOT NULL,
  `hr_name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `reply_deadline` date NOT NULL,
  `reply_by` varchar(100) NOT NULL,
  `resign_email_deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer_letter_fresh`
--

INSERT INTO `offer_letter_fresh` (`fk`, `c_id`, `position`, `grade`, `salary_inr`, `salary_rs`, `joining_date`, `joining_time`, `hr_name`, `email`, `contact`, `reply_deadline`, `reply_by`, `resign_email_deadline`) VALUES
(2, 101, 'Interni', 'A', '85000', '1930000     ', '2020-11-10', '17:35:00', 'abcabcxyz', 'nitinkotwal18@gmail.com', '09149436968', '2020-10-20', 'email to HR ', '1970-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `review_cand_docs`
--

CREATE TABLE `review_cand_docs` (
  `c_id` int(11) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `c_address` varchar(50) NOT NULL,
  `p_address` varchar(50) NOT NULL,
  `pancard` varchar(50) NOT NULL,
  `edu_certificates` varchar(50) NOT NULL,
  `pro_certificates` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `payslip` varchar(50) NOT NULL,
  `form16` varchar(50) NOT NULL,
  `exp_certificates` varchar(50) NOT NULL,
  `others` varchar(50) NOT NULL,
  `review` varchar(100) NOT NULL,
  `hr_confirmed` int(11) NOT NULL,
  `hr_review` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_cand_docs`
--

INSERT INTO `review_cand_docs` (`c_id`, `resume`, `c_address`, `p_address`, `pancard`, `edu_certificates`, `pro_certificates`, `photo`, `payslip`, `form16`, `exp_certificates`, `others`, `review`, `hr_confirmed`, `hr_review`) VALUES
(101, '1', '1', 'Bad Quality', '1', '1', '1', '1', '1', '1', '1', '1', 'great hr has verified your documents , ill send you the offer letter now', 1, 'okay good go to ctc'),
(102, '1', '1', '1', '1', '1', '', '1', '', '', '', '', 'done , sent for hr validation', 1, 'okay now move to ctc structure');

-- --------------------------------------------------------

--
-- Table structure for table `review_offer_letter`
--

CREATE TABLE `review_offer_letter` (
  `r_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `hr_confirmed` int(11) NOT NULL DEFAULT 2,
  `hr_review` text NOT NULL,
  `offer_letter` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_offer_letter`
--

INSERT INTO `review_offer_letter` (`r_id`, `c_id`, `hr_confirmed`, `hr_review`, `offer_letter`) VALUES
(2, 101, 1, 'okay now send to the candidate', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skip_module`
--

CREATE TABLE `skip_module` (
  `id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `form_number` int(11) NOT NULL,
  `skip_comment` varchar(100) NOT NULL,
  `skip_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skip_module`
--

INSERT INTO `skip_module` (`id`, `r_id`, `c_id`, `form_number`, `skip_comment`, `skip_status`) VALUES
(2, 2, 101, 2, 'nhi btaunga', 1),
(3, 2, 104, 1, 'i dont want to fill', 1),
(4, 1, 102, 1, 'hr i dont know these details', 2),
(6, 2, 101, 3, 'soory yaar', 2),
(7, 2, 101, 4, 'hr i dont know these details', 0),
(8, 2, 101, 5, 'nhi bnaya', 2),
(10, 2, 103, 2, 'please let me skip this form sir.', 1),
(11, 2, 107, 2, 'please approvemyrequest', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sourcing`
--

CREATE TABLE `sourcing` (
  `fk` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `profile_number` int(11) NOT NULL,
  `profile_date` date NOT NULL,
  `name` varchar(20) NOT NULL,
  `source` varchar(20) NOT NULL,
  `consultant_source` varchar(30) DEFAULT NULL,
  `campus_source` varchar(30) DEFAULT NULL,
  `other_source` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sourcing`
--

INSERT INTO `sourcing` (`fk`, `c_id`, `profile_number`, `profile_date`, `name`, `source`, `consultant_source`, `campus_source`, `other_source`) VALUES
(1, 102, 1, '2020-06-18', 'dhiraj', 'Walk in', ' ', ' ', ' '),
(3, 0, 3, '2020-06-19', 'cand', 'Facebook', ' ', ' ', ' '),
(2, 104, 104, '2020-07-16', 'nikhil', 'Google', NULL, NULL, NULL),
(2, 101, 101, '2020-07-16', 'nikhil', 'Campus', ' ', 'VIT', ' '),
(2, 103, 103, '2020-07-23', 'nikhil', 'Others', ' ', ' ', 'money paid'),
(2, 107, 107, '2020-08-18', 'nikhil', 'Consultant', 'xyx', ' ', ' ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1interview_detail`
--
ALTER TABLE `1interview_detail`
  ADD KEY `fk` (`fk`);

--
-- Indexes for table `2interview_detail`
--
ALTER TABLE `2interview_detail`
  ADD KEY `fk` (`fk`);

--
-- Indexes for table `3interview_detail`
--
ALTER TABLE `3interview_detail`
  ADD KEY `fk` (`fk`);

--
-- Indexes for table `4interview_detail`
--
ALTER TABLE `4interview_detail`
  ADD KEY `fk` (`fk`);

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD KEY `fk` (`fk`);

--
-- Indexes for table `candidate_documents`
--
ALTER TABLE `candidate_documents`
  ADD KEY `fk` (`fk`);

--
-- Indexes for table `candidate_info`
--
ALTER TABLE `candidate_info`
  ADD KEY `fk` (`fk`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `candidate_table`
--
ALTER TABLE `candidate_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD KEY `sourcing_id` (`fk`);

--
-- Indexes for table `cooling_details`
--
ALTER TABLE `cooling_details`
  ADD KEY `fk` (`fk`);

--
-- Indexes for table `employment_table`
--
ALTER TABLE `employment_table`
  ADD KEY `fk` (`fk`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD KEY `fk` (`fk`);

--
-- Indexes for table `hr_cand_form_validation`
--
ALTER TABLE `hr_cand_form_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr_offer_letter_validation`
--
ALTER TABLE `hr_offer_letter_validation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginform`
--
ALTER TABLE `loginform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_details`
--
ALTER TABLE `offer_details`
  ADD KEY `fk` (`fk`);

--
-- Indexes for table `skip_module`
--
ALTER TABLE `skip_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sourcing`
--
ALTER TABLE `sourcing`
  ADD KEY `fk` (`fk`),
  ADD KEY `c_id` (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_table`
--
ALTER TABLE `candidate_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `hr_cand_form_validation`
--
ALTER TABLE `hr_cand_form_validation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hr_offer_letter_validation`
--
ALTER TABLE `hr_offer_letter_validation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `loginform`
--
ALTER TABLE `loginform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `skip_module`
--
ALTER TABLE `skip_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `1interview_detail`
--
ALTER TABLE `1interview_detail`
  ADD CONSTRAINT `1interview_detail_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`);

--
-- Constraints for table `2interview_detail`
--
ALTER TABLE `2interview_detail`
  ADD CONSTRAINT `2interview_detail_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`);

--
-- Constraints for table `3interview_detail`
--
ALTER TABLE `3interview_detail`
  ADD CONSTRAINT `3interview_detail_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`),
  ADD CONSTRAINT `4interview_detail_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`);

--
-- Constraints for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD CONSTRAINT `blacklist_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`);

--
-- Constraints for table `candidate_documents`
--
ALTER TABLE `candidate_documents`
  ADD CONSTRAINT `candidate_documents_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`);

--
-- Constraints for table `candidate_info`
--
ALTER TABLE `candidate_info`
  ADD CONSTRAINT `candidate_info_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`);

--
-- Constraints for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD CONSTRAINT `contact_table_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`);

--
-- Constraints for table `cooling_details`
--
ALTER TABLE `cooling_details`
  ADD CONSTRAINT `cooling_details_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`);

--
-- Constraints for table `employment_table`
--
ALTER TABLE `employment_table`
  ADD CONSTRAINT `employment_table_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD CONSTRAINT `fileupload_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`);

--
-- Constraints for table `offer_details`
--
ALTER TABLE `offer_details`
  ADD CONSTRAINT `offer_details_ibfk_1` FOREIGN KEY (`fk`) REFERENCES `loginform` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
