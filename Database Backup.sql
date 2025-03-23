-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for java_assignment
CREATE DATABASE IF NOT EXISTS `java_assignment` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `java_assignment`;

-- Dumping structure for table java_assignment.acadamic_profile_img
CREATE TABLE IF NOT EXISTS `acadamic_profile_img` (
  `academic_officer_email` varchar(100) NOT NULL,
  `path` varchar(150) DEFAULT NULL,
  KEY `fk_table2_academic_officer1_idx` (`academic_officer_email`),
  CONSTRAINT `fk_table2_academic_officer1` FOREIGN KEY (`academic_officer_email`) REFERENCES `academic_officer` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.acadamic_profile_img: ~1 rows (approximately)
INSERT INTO `acadamic_profile_img` (`academic_officer_email`, `path`) VALUES
	('tharinduchanaka6@gmail.com', 'resource/proimg/Tharindu_63a5dc1dba454.jpeg');

-- Dumping structure for table java_assignment.academic_officer
CREATE TABLE IF NOT EXISTS `academic_officer` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `gender_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_academic_officer_gender1_idx` (`gender_id`) USING BTREE,
  CONSTRAINT `fk_academic_officer_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.academic_officer: ~0 rows (approximately)
INSERT INTO `academic_officer` (`email`, `fname`, `lname`, `password`, `mobile`, `join_date`, `verification_code`, `status`, `gender_id`) VALUES
	('tharinduchanaka6@gmail.com', 'Tharindu', 'Chanaka', 'thariya2244', '0766135782', '2022-12-21 11:39:58', NULL, 1, 1);

-- Dumping structure for table java_assignment.academic_officer_has_address
CREATE TABLE IF NOT EXISTS `academic_officer_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` text,
  `line2` text,
  `postal_code` varchar(5) DEFAULT NULL,
  `city_id` int NOT NULL,
  `academic_officer_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_has_address_city1_idx` (`city_id`),
  KEY `fk_academic_officer has_address_academic_officer1_idx` (`academic_officer_email`),
  CONSTRAINT `fk_academic_officer has_address_academic_officer1` FOREIGN KEY (`academic_officer_email`) REFERENCES `academic_officer` (`email`),
  CONSTRAINT `fk_student_has_address_city11` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.academic_officer_has_address: ~1 rows (approximately)
INSERT INTO `academic_officer_has_address` (`id`, `line1`, `line2`, `postal_code`, `city_id`, `academic_officer_email`) VALUES
	(1, '291/1', 'Uduhulpotha', '90100', 1, 'tharinduchanaka6@gmail.com');

-- Dumping structure for table java_assignment.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `path` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.admin: ~0 rows (approximately)
INSERT INTO `admin` (`email`, `fname`, `lname`, `verification_code`, `path`) VALUES
	('tharibro2211@gmail.com', 'Tharindu', 'Chanaka', '63ae7fd546728', '');

-- Dumping structure for table java_assignment.assignment_mark
CREATE TABLE IF NOT EXISTS `assignment_mark` (
  `id` int NOT NULL AUTO_INCREMENT,
  `marks` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'No Marks Yet',
  `as_files_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assignment_mark_as_files1_idx` (`as_files_id`),
  CONSTRAINT `fk_assignment_mark_as_files1` FOREIGN KEY (`as_files_id`) REFERENCES `as_files` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.assignment_mark: ~5 rows (approximately)
INSERT INTO `assignment_mark` (`id`, `marks`, `as_files_id`) VALUES
	(4, '68', 5),
	(5, '100', 5),
	(6, '35', 6),
	(7, '54', 1),
	(8, '87', 2),
	(9, '24', 3);

-- Dumping structure for table java_assignment.as_files
CREATE TABLE IF NOT EXISTS `as_files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_code` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.as_files: ~5 rows (approximately)
INSERT INTO `as_files` (`id`, `file_code`) VALUES
	(1, 'What-is-Academic-Writing.pdf'),
	(2, 'resource-1-Harvard-Referencing-Guide (1).pdf'),
	(3, 'Web Programming 1 - Research.pdf'),
	(5, '_English - Grade 8 - Third Term Test 2019 - Welimada Zone.pdf'),
	(6, '_English - Grade 8 - Third Term Test 2019 - Welimada Zone.pdf');

-- Dumping structure for table java_assignment.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) DEFAULT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_district1_idx` (`district_id`),
  CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.city: ~11 rows (approximately)
INSERT INTO `city` (`id`, `city_name`, `district_id`) VALUES
	(1, 'Bandarawela', 1),
	(2, 'Badulla', 1),
	(3, 'Welimada', 1),
	(4, 'Anuradhapura', 11),
	(5, 'Pollonnaruwa', 12),
	(6, 'Nugegoda', 3),
	(7, 'Kotte', 3),
	(8, 'Colombo', 3),
	(9, 'Dompe', 5),
	(10, 'Gampha', 5),
	(11, 'Kaluthara', 4);

-- Dumping structure for table java_assignment.district
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `district_name` varchar(50) DEFAULT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.district: ~14 rows (approximately)
INSERT INTO `district` (`id`, `district_name`, `province_id`) VALUES
	(1, 'badulla', 1),
	(2, 'Monaragala', 1),
	(3, 'Colombo', 2),
	(4, 'Kaluthara', 2),
	(5, 'Gampha', 2),
	(6, 'Galle', 4),
	(7, 'Mathara', 4),
	(8, 'Rathnapura', 6),
	(9, 'Kurunegala', 8),
	(10, 'Jaffna', 3),
	(11, 'Anuradhapura', 5),
	(12, 'Pollonnaruwa', 5),
	(13, 'Trincomalee', 9),
	(14, 'Kandy', 7);

-- Dumping structure for table java_assignment.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `gender_id` int NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.gender: ~2 rows (approximately)
INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
	(1, 'male'),
	(2, 'Female');

-- Dumping structure for table java_assignment.grade
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(45) DEFAULT NULL,
  `subject_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_grade_subject1_idx` (`subject_id`),
  CONSTRAINT `fk_grade_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.grade: ~8 rows (approximately)
INSERT INTO `grade` (`id`, `grade_name`, `subject_id`) VALUES
	(1, '6', 1),
	(13, '7', 1),
	(14, '8', 2),
	(15, '9', 2),
	(16, '10', 2),
	(17, '11', 2),
	(18, '12', 2),
	(19, '13', 3);

-- Dumping structure for table java_assignment.note
CREATE TABLE IF NOT EXISTS `note` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(300) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.note: ~1 rows (approximately)
INSERT INTO `note` (`id`, `path`) VALUES
	(1, 'English - Grade 7 _ 8 - Third Term Test 2019 - Thondamannaru.pdf');

-- Dumping structure for table java_assignment.profile_img
CREATE TABLE IF NOT EXISTS `profile_img` (
  `path` varchar(100) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_profile_img_student1_idx` (`student_email`),
  CONSTRAINT `fk_profile_img_student1` FOREIGN KEY (`student_email`) REFERENCES `student` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.profile_img: ~1 rows (approximately)
INSERT INTO `profile_img` (`path`, `student_email`) VALUES
	('resource/proimg/Tharindu_63a214a0d9e29.jpeg', 'tharinduchanaka6@gmail.com');

-- Dumping structure for table java_assignment.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `province_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.province: ~9 rows (approximately)
INSERT INTO `province` (`id`, `province_name`) VALUES
	(1, 'Uva'),
	(2, 'Western'),
	(3, 'Nothern'),
	(4, 'southern'),
	(5, 'North central'),
	(6, 'sabaragamuwa'),
	(7, 'central'),
	(8, 'North western'),
	(9, 'eastern');

-- Dumping structure for table java_assignment.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.status: ~2 rows (approximately)
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'Deactive');

-- Dumping structure for table java_assignment.student
CREATE TABLE IF NOT EXISTS `student` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `gender_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_student_gender_idx` (`gender_id`) USING BTREE,
  CONSTRAINT `fk_student_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.student: ~0 rows (approximately)
INSERT INTO `student` (`email`, `fname`, `lname`, `password`, `mobile`, `join_date`, `verification_code`, `status`, `gender_id`) VALUES
	('tharinduchanaka6@gmail.com', 'Tharindu', 'Chanaka', 'tharinduchajeewa', '0751441764', '2022-12-21 01:16:18', NULL, 1, 1);

-- Dumping structure for table java_assignment.student_has_address
CREATE TABLE IF NOT EXISTS `student_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` text,
  `line2` text,
  `postal_code` varchar(5) DEFAULT NULL,
  `student_email` varchar(100) NOT NULL,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_has_address_student1_idx` (`student_email`),
  KEY `fk_student_has_address_city1_idx` (`city_id`),
  CONSTRAINT `fk_student_has_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_student_has_address_student1` FOREIGN KEY (`student_email`) REFERENCES `student` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.student_has_address: ~1 rows (approximately)
INSERT INTO `student_has_address` (`id`, `line1`, `line2`, `postal_code`, `student_email`, `city_id`) VALUES
	(2, '291/1', 'Uduhulpotha', '90100', 'tharinduchanaka6@gmail.com', 1);

-- Dumping structure for table java_assignment.student_mark
CREATE TABLE IF NOT EXISTS `student_mark` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mark` varchar(10) NOT NULL DEFAULT '0',
  `assignment_mark_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_mark_assignment_mark1_idx` (`assignment_mark_id`),
  CONSTRAINT `fk_student_mark_assignment_mark1` FOREIGN KEY (`assignment_mark_id`) REFERENCES `assignment_mark` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.student_mark: ~6 rows (approximately)
INSERT INTO `student_mark` (`id`, `mark`, `assignment_mark_id`) VALUES
	(1, '87', 8),
	(2, '100', 5),
	(3, '54', 7),
	(4, '35', 6),
	(5, '24', 9),
	(6, '68', 4);

-- Dumping structure for table java_assignment.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.subject: ~6 rows (approximately)
INSERT INTO `subject` (`id`, `subject_name`) VALUES
	(1, 'Science'),
	(2, 'Mathematics'),
	(3, 'Sinhala language & litreture'),
	(4, 'History'),
	(5, 'Citizenship Education'),
	(6, 'English Language');

-- Dumping structure for table java_assignment.teacher
CREATE TABLE IF NOT EXISTS `teacher` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `gender_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_teacher_gender1_idx` (`gender_id`) USING BTREE,
  CONSTRAINT `fk_teacher_gender1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.teacher: ~0 rows (approximately)
INSERT INTO `teacher` (`email`, `fname`, `lname`, `password`, `mobile`, `join_date`, `verification_code`, `status`, `gender_id`) VALUES
	('tharinduchanaka6@gmail.com', 'Tharindu', 'Chanaka', 'tharindu', '0751441764', '2022-12-21 10:46:06', '63ad7ca96fb9f', 1, 1);

-- Dumping structure for table java_assignment.teacher_has_address
CREATE TABLE IF NOT EXISTS `teacher_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` text,
  `line2` text,
  `postal_code` varchar(5) DEFAULT NULL,
  `city_id` int NOT NULL,
  `teacher_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_has_address_city1_idx` (`city_id`),
  KEY `fk_teacher_has_address_teacher1_idx` (`teacher_email`),
  CONSTRAINT `fk_student_has_address_city10` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_teacher_has_address_teacher1` FOREIGN KEY (`teacher_email`) REFERENCES `teacher` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.teacher_has_address: ~1 rows (approximately)
INSERT INTO `teacher_has_address` (`id`, `line1`, `line2`, `postal_code`, `city_id`, `teacher_email`) VALUES
	(1, '291/1', 'Uduhulpotha', '90100', 1, 'tharinduchanaka6@gmail.com');

-- Dumping structure for table java_assignment.teacher_profile_img
CREATE TABLE IF NOT EXISTS `teacher_profile_img` (
  `teacher_email` varchar(100) NOT NULL,
  `path` varchar(150) DEFAULT NULL,
  KEY `fk_table2_teacher1_idx` (`teacher_email`),
  CONSTRAINT `fk_table2_teacher1` FOREIGN KEY (`teacher_email`) REFERENCES `teacher` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.teacher_profile_img: ~1 rows (approximately)
INSERT INTO `teacher_profile_img` (`teacher_email`, `path`) VALUES
	('tharinduchanaka6@gmail.com', 'resource/proimg/Tharindu_63a5b77d6b700.jpeg');

-- Dumping structure for table java_assignment.upload_answer
CREATE TABLE IF NOT EXISTS `upload_answer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `path` varchar(300) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table java_assignment.upload_answer: ~0 rows (approximately)
INSERT INTO `upload_answer` (`id`, `path`) VALUES
	(1, 'English - Grade 8 - Third Term Test 2019 - Southern Province.pdf');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
