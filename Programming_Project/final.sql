-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Category` ;
CREATE TABLE `mydb`.`Category`(
  `Category_id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name`VARCHAR(45) NOT NULL,
  `Number` INT(11) NOT NULL,
  PRIMARY KEY (`Category_id`))
ENGINE = InnoDB;

LOCK TABLES `mydb`.`Category` WRITE;
INSERT INTO `mydb`.`Category` VALUES (1,'Fresh Products',17),
(2,'Fridge Products',12),(3,'Liquor Products',20),(4,'Hygiene Products',13),(5,'Home Decor',14),(6,'Pet Products',11);
UNLOCK TABLES;
-- -----------------------------------------------------
-- Table `mydb`.`Product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Product` (
  `Barcode` INT(11) NOT NULL UNIQUE,
  `ProductName` VARCHAR(45) NOT NULL,
  `curr_price` DECIMAL(10,2) NOT NULL,
  `is_label` TINYINT NOT NULL,
  `unit_bought` INT(11) NULL,
  `points` INT(11) NULL,
  `rack` INT(11) NULL,
  `corridor` INT(11) NULL,
  `Category_id` INT(11) NOT NULL,
  PRIMARY KEY (`Barcode`),
  INDEX `fk_Product_Category1_idx` (`Category_id` ASC),
  CONSTRAINT `fk_Product_Category1`
    FOREIGN KEY (`Category_id`)
    REFERENCES `mydb`.`Category` (`Category_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

LOCK TABLES `mydb`.`Product` WRITE;
INSERT INTO `mydb`.`Product` VALUES (6660042,'Gkala Karyda',4.20,0,5,50,1,1,2),
(6660043,'Kefali Arni',4.3,1,1,40,2,5,2),(6660044,'Krema Ksero Gw',4.4,1,2,10,3,2,2),(6660045,'Entera',4.5,1,7,20,3,2,2),(6660046,'Patsas',4.6,0,8,18,4,3,6),
(6660069,'Salepi',6.9,1,1,60,7,7,3),(6660066,'Mastixa',6.6,0,3,20,3,1,3),(6660067,'Rodakina',6.7,0,4,10,6,6,1),(6660055,'Banana',5.50,0,5,10,1,1,1),
(6660033,'Afroloutro Dove',3.30,0,1,10,5,6,4),(6660035,'Ksirafakia Gillette',3.50,0,1,10,5,6,4),(6660034,'Skilotrofi',3.40,0,10,20,4,3,6),(6660053,'Trapezi Kipou',5.30,0,1,10,5,6,5),
(6660073,'Pensa',7.30,0,1,10,5,6,5);
UNLOCK TABLES;

-- -----------------------------------------------------
-- Table `mydb`.`Costumer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Costumer` ;
CREATE TABLE `mydb`.`Costumer`(
  `SSN` INT(11) NOT NULL UNIQUE,
  `Name` VARCHAR(45) NOT NULL,
  `Surname` VARCHAR(45) NOT NULL,
  `Birthday` DATE NOT NULL,
  PRIMARY KEY (`SSN`))
ENGINE = InnoDB;

LOCK TABLES `mydb`.`Costumer` WRITE;
INSERT INTO `mydb`.`Costumer` VALUES (21314151,'Selim','Selguk','1975-10-15'),
(21314152,'Manwlis','Sarrhs','1985-12-01'),(21314153,'Sotiris','Kontizas','1978-03-21'),(21314154,'Theios','Leonidas','1962-08-11'),
(21314155,'Panagiotis','Iliaras','1995-11-25'),(21314156,'Alexis','Barmperos','1995-12-15');
UNLOCK TABLES;

-- -----------------------------------------------------
-- Table `mydb`.`Store`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Store` (
  `Store_id` INT NOT NULL AUTO_INCREMENT,
  `Street` VARCHAR(45) NOT NULL,
  `Number` INT(11) NOT NULL,
  `Zipcode` INT(11) NOT NULL,
  `City` VARCHAR(45) NOT NULL,
  `Weekdays` VARCHAR(45) NOT NULL,
  `Saturdays` VARCHAR(45) NULL,
  `Square_mtr` INT(11) NOT NULL,
  PRIMARY KEY (`Store_id`))
ENGINE = InnoDB;

LOCK TABLES `mydb`.`Store` WRITE;
INSERT INTO `mydb`.`Store` VALUES (1,'Vilara',44,45445,'Ioannina','9:00-14:00',NULL,245),
(2,'Skoufa',42,45445,'Ioannina','9:00-14:00',NULL,200),(3,'Xarilaou Trikoupi',12,45445,'Ioannina','9:00-14:00',NULL,150),(4,'Traulantwni',12,15772,'Athina','9:00-14:00',NULL,165),
(5,'Psaroudaki',13,15772,'Athina','10:00-22:00','9:00-15:00',105),(6,'Voukourestiou',17,15773,'Athina','10:00-19:00',NULL,95),(7,'Vlaxava',30,33333,'Thessaloniki','8:00-16:00',NULL,135),
(8,'Saadi Levi',8,33333,'Thessaloniki','8:00-16:00',NULL,135),(9,'Notara',37,33333,'Thessaloniki','8:00-16:00',NULL,175),(10,'Elenis Zografou',6,45445,'Ioannina','8:00-16:00',NULL,135);
UNLOCK TABLES;

-- -----------------------------------------------------
-- Table `mydb`.`Transaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Transaction` (
  `Transaction_id` INT NOT NULL AUTO_INCREMENT,
  `Totalcost` DECIMAL(10,2) NOT NULL,
  `Time` TIME NOT NULL,
  `Day` INT(2) NOT NULL,
  `Month` INT(2) NOT NULL,
  `Year` YEAR NOT NULL,
  `Cash` TINYINT NULL,
  `Card` TINYINT NULL,
  `Giftcard` TINYINT NULL,
  `SSN` INT(11) NOT NULL,
  `Store_id` INT NOT NULL,
  PRIMARY KEY (`Transaction_id`),
  INDEX `fk_Transaction_Costumer1_idx` (`SSN` ASC),
  INDEX `fk_Transaction_Store1_idx` (`Store_id` ASC),
  CONSTRAINT `fk_Transaction_Costumer1`
    FOREIGN KEY (`SSN`)
    REFERENCES `mydb`.`Costumer` (`SSN`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Transaction_Store1`
    FOREIGN KEY (`Store_id`)
    REFERENCES `mydb`.`Store` (`Store_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

LOCK TABLES `mydb`.`Transaction` WRITE;
INSERT INTO `mydb`.`Transaction` VALUES 
(1,37.70,'10:45',7,2,2020,0,1,0,21314155,1),(2,63.6,'11:05',7,3,2019,0,1,0,21314151,1),(3,24.6,'11:05',7,3,2020,0,1,0,21314151,1),
(4,39.6,'13:15',5,2,2019,1,1,0,21314156,1),(5,17.9,'11:05',9,4,2019,1,0,0,21314155,1),(6,64,'13:05',10,4,2020,0,1,0,21314151,1),
(7,24.5,'11:45',9,2,2020,1,0,1,21314155,1),(8,70.7,'11:55',11,7,2019,1,0,1,21314155,1),
(9,20.2,'11:30',29,3,2020,0,1,0,21314154,2),(10,40,'10:30',30,4,2020,0,1,0,21314154,2),(11,71.5,'10:30',19,5,2020,1,0,0,21314151,2),
(12,26.9,'12:30',29,3,2020,0,1,0,21314151,2),(13,14.6,'12:38',13,2,2019,1,1,0,21314156,2),(14,45.5,'10:30',21,3,2019,0,1,0,21314153,2),
(15,48.1,'10:45',17,2,2020,0,1,0,21314152,3),(16,40.1,'11:05',27,3,2020,0,1,0,21314152,3),(17,35.7,'11:05',6,4,2020,0,1,0,21314152,3),
(18,69.0,'13:15',15,2,2020,1,1,0,21314152,3),(19,34.5,'11:05',10,4,2020,1,0,0,21314155,3),(20,17.8,'13:05',10,4,2020,0,1,0,21314152,3),
(21,27.5,'11:45',19,2,2020,1,0,1,21314156,3),(22,19.4,'11:55',10,7,2019,1,0,1,21314151,3),
(23,53.3,'11:05',5,5,2020,0,1,1,21314152,4),(24,13.4,'13:05',10,4,2020,0,1,0,21314153,4),
(25,4.5,'11:45',9,5,2020,1,0,1,21314151,4),(26,16.5,'11:55',11,7,2020,1,0,1,21314152,4),
(27,27.9,'16:05',9,4,2019,1,0,0,21314154,5),(28,16.8,'18:05',10,10,2020,0,1,0,21314154,5),
(29,5.3,'15:45',12,6,2020,1,0,1,21314155,5),(30,22,'20:55',11,8,2020,1,1,1,21314154,5),
(31,14.2,'17:45',11,8,2020,1,1,1,21314151,6),(32,27.0,'18:55',11,8,2020,1,1,1,21314152,6),
(33,22.4,'8:45',11,7,2020,1,0,1,21314155,7),(34,18.0,'9:55',11,8,2019,1,1,1,21314154,7),
(35,34.1,'8:15',12,6,2019,0,1,1,21314156,8),(36,32.3,'11:55',11,8,2020,1,1,1,21314153,8),
(37,7.0,'8:17',12,6,2020,0,1,1,21314155,8),(38,22.0,'12:55',11,8,2020,1,1,1,21314153,8),
(39,6.7,'11:45',7,1,2019,0,1,0,21314155,9),(40,54.2,'15:05',7,1,2020,0,1,1,21314151,9),(41,15.5,'11:05',9,3,2020,0,1,0,21314151,9),
(42,22.0,'13:15',5,1,2020,1,1,0,21314156,9),(43,38.0,'13:05',9,1,2019,1,0,1,21314155,9),(44,26.5,'13:05',11,4,2020,1,1,0,21314151,9),
(45,4.2,'12:45',5,1,2020,1,0,1,21314155,9),(46,10.6,'14:55',11,3,2020,1,0,1,21314155,9),
(47,69.0,'15:51',10,12,2019,1,0,0,21314153,10);
UNLOCK TABLES;

-- -----------------------------------------------------
-- Table `mydb`.`Card`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Card` (
  `id_Card` INT(11) NOT NULL ,
  `points` INT(11) NULL,
  `SSN` INT(11) NOT NULL,
  PRIMARY KEY (`SSN`),
  CONSTRAINT `fk_Card_Costumer1`
    FOREIGN KEY (`SSN`)
    REFERENCES `mydb`.`Costumer` (`SSN`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

LOCK TABLES `mydb`.`Card` WRITE;
INSERT INTO `mydb`.`Card` VALUES ('15744589',109,21314151),('97803162',100,21314152),('97803855',69,21314153),
('97803995',50,21314154),('97805534',150,21314155);
UNLOCK TABLES;
-- -----------------------------------------------------
-- Table `mydb`.`PhoneNumber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`PhoneNumber` (
  `Phone_id` INT(11) NOT NULL ,
  `Store_id` INT(11) NOT NULL,
  PRIMARY KEY (`Phone_id`),
  INDEX `fk_PhoneNumber_Store1_idx` (`Store_id` ASC),
  CONSTRAINT `fk_PhoneNumber_Store1`
    FOREIGN KEY (`Store_id`)
    REFERENCES `mydb`.`Store` (`Store_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

LOCK TABLES `mydb`.`PhoneNumber` WRITE;
INSERT INTO `mydb`.`PhoneNumber` VALUES (980781552,1),
(907779775,2),(907561021,3),(980803333,4),(975971184,5),(651046402,6),(651046403,7),(651046404,8),(651046410,9),(651046408,10);
UNLOCK TABLES;
-- -----------------------------------------------------
-- Table `mydb`.`Email`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Email` (
  `Email_Address` VARCHAR(45) NOT NULL,
  `Store_id` INT(11) NOT NULL ,
  PRIMARY KEY (`Email_Address`),
  INDEX `fk_Email_Store_idx` (`Store_id` ASC),
  CONSTRAINT `fk_Email_Store`
    FOREIGN KEY (`Store_id`)
    REFERENCES `mydb`.`Store` (`Store_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
LOCK TABLES `mydb`.`Email` WRITE;
INSERT INTO `mydb`.`Email` VALUES ('mystore1@gmail.com',1),('mystore2@gmail.com',2),
('mystore3@gmail.com',3),('mystore4@gmail.com',4),('mystore5@gmail.com',5),
('mystore6@gmail.com',6),('mystore7@gmail.com',7),('mystore8@gmail.com',8),
('mystore9@gmail.com',9),('mystore10@gmail.com',10);
UNLOCK TABLES;

-- -----------------------------------------------------
-- Table `mydb`.`Price_History`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Price_History` (
  `Price` DECIMAL(10,2) NOT NULL,
  `Day_changed` DATE NOT NULL,
  `Barcode` INT(11) NOT NULL,
  CONSTRAINT `fk_Price_History_Product1`
    FOREIGN KEY (`Barcode`)
    REFERENCES `mydb`.`Product` (`Barcode`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

LOCK TABLES `mydb`.`Price_History` WRITE;
INSERT INTO `mydb`.`Price_History` VALUES (5.2,'2020-01-03','6660033'),(4.1,'2020-03-05','6660033'),(20.05,'2020-01-01',6660045),
(3.1,'2020:05:10',6660034),(25.99,'2020-04-10',6660069);
UNLOCK TABLES;

-- -----------------------------------------------------
-- Table `mydb`.`Contained`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Contained` (
  `Transaction_Transaction_id` INT(11) NOT NULL,
  `Product_Barcode` INT(11) NOT NULL,
  `number_of_products` INT(11) NOT NULL,
  INDEX `fk_Contained_Transaction1_idx` (`Transaction_Transaction_id` ASC),
  INDEX `fk_Contained_Product1_idx` (`Product_Barcode` ASC),
  CONSTRAINT `fk_Contained_Transaction1`
    FOREIGN KEY (`Transaction_Transaction_id`)
    REFERENCES `mydb`.`Transaction` (`Transaction_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Contained_Product1`
    FOREIGN KEY (`Product_Barcode`)
    REFERENCES `mydb`.`Product` (`Barcode`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

LOCK TABLES `mydb`.`Contained` WRITE;
INSERT INTO `mydb`.`Contained` VALUES 
-- agores katastima1
(1,6660055,1),(1,6660042,2),(1,6660043,4),(1,6660066,1),
(2,6660053,2),(2,6660073,5),(2,6660066,2),(2,6660033,1),
(3,6660046,2),(3,6660044,2),(3,6660033,2),
(4,6660066,6),
(5,6660053,2),(5,6660073,1),
(6,6660055,2),(6,6660053,10),
(7,6660033,2),(7,6660053,2),(7,6660073,1),
(8,6660042,5),(8,6660073,3),(8,6660053,4),(8,6660066,1),
-- agores katastima 2
(9,6660044,3),(9,6660035,2),
(10,6660045,1),(10,6660035,2),(10,6660053,4),(10,6660073,1),
(11,6660035,10),(11,6660073,5),
(12,6660045,5),(12,6660044,1),
(13,6660073,2),
(14,6660045,2),(14,6660073,5),
-- agores katastima 3
(15,6660055,1),(15,6660067,1),(15,6660069,6),
(16,6660034,2),(16,6660067,3),(16,6660044,3),
(17,6660045,1),(17,6660044,1),(17,6660067,4),
(18,6660069,10),
(19,6660069,5),
(20,6660067,2),(20,6660044,1),
(21,6660055,5),
(22,6660034,3),(22,6660046,2),
-- agores sto katastima 4
(23,6660042,5),(23,6660067,4),(23,6660055,1),
(24,6660067,2),
(25,6660045,1),
(26,6660055,3),
-- agores sto katastima 5
(27,6660067,1),(27,6660053,4),
(28,6660042,4),
(29,6660053,1),
(30,6660055,4),
-- agores sto katastima 6
(31,6660033,3),(31,6660043,1),
(32,6660045,6),
-- katastima 7
(33,6660055,1),(33,6660042,3),(33,6660043,1),
(34,6660045,4),
-- katastima 8
(35,6660034,1),(35,6660073,3),(35,6660044,2),
(36,6660035,2),(36,6660073,3),(36,6660034,1),
(37,6660035,2),
(38,6660044,5),
-- katastima 9
(39,6660053,1),(39,6660042,2),(39,6660044,4),(39,6660067,1),
(40,6660053,2),(40,6660042,3),(40,6660044,4),(40,6660067,2),
(41,6660044,2),(41,6660067,1),
(42,6660044,5),
(43,6660053,1),(43,6660042,2),(43,6660044,4),(43,6660067,1),
(44,6660053,5),
(45,6660042,1),
(46,6660053,2),
-- katastima 10
(47,6660069,10);
UNLOCK TABLES;


-- -----------------------------------------------------
-- Table `mydb`.`HasCategory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`HasCategory` (
  `Store_id` INT(11) NOT NULL,
  `Category_id` INT(11) NOT NULL,
  INDEX `fk_HasCategory_Store1_idx` (`Store_id` ASC),
  INDEX `fk_HasCategory_Category1_idx` (`Category_id` ASC),
  CONSTRAINT `fk_HasCategory_Store1`
    FOREIGN KEY (`Store_id`)
    REFERENCES `mydb`.`Store` (`Store_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_HasCategory_Category1`
    FOREIGN KEY (`Category_id`)
    REFERENCES `mydb`.`Category` (`Category_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

LOCK TABLES `mydb`.`HasCategory` WRITE;
INSERT INTO `mydb`.`HasCategory` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(2,2),
(2,4),(2,5),(3,1),(3,2),(3,3),(3,6),(4,1),(4,2),(4,5),(5,1),(5,2),(5,5),(6,2),(6,4),(7,1),
(7,2),(8,6),(8,5),(8,4),(8,2),(9,1),(9,5),(9,2),(10,1),(10,2),(10,3),(10,4),(10,5),(10,6);
UNLOCK TABLES;

-- -----------------------------------------------------
-- Table `mydb`.`Bought`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Bought` (
  `SSN` INT(11) NOT NULL,
  `Barcode` INT(11) NOT NULL,
   `Many` INT(11) NOT NULL,
  INDEX `fk_Bought_Costumer1_idx` (`SSN` ASC),
  INDEX `fk_Bought_Product1_idx` (`Barcode` ASC),
  CONSTRAINT `fk_Bought_Costumer1`
    FOREIGN KEY (`SSN`)
    REFERENCES `mydb`.`Costumer` (`SSN`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Bought_Product1`
    FOREIGN KEY (`Barcode`)
    REFERENCES `mydb`.`Product` (`Barcode`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


LOCK TABLES `mydb`.`Bought` WRITE;
INSERT INTO `mydb`.`Bought` VALUES 
-- customer 1
(21314151,6660033,4),(21314151,6660034,3),(21314151,6660035,10),(21314151,6660042,3),(21314151,6660043,3),(21314151,6660044,9),(21314151,6660045,6),
(21314151,6660046,4),(21314151,6660053,19),(21314151,6660055,2),(21314151,6660066,2),(21314151,6660067,3),(21314151,6660069,0),(21314151,6660073,10),
-- customer 2
(21314152,6660033,0),(21314152,6660034,2),(21314152,6660035,0),(21314152,6660042,5),(21314152,6660043,0),(21314152,6660044,5),(21314152,6660045,7),
(21314152,6660046,0),(21314152,6660053,0),(21314152,6660055,5),(21314152,6660066,0),(21314152,6660067,14),(21314152,6660069,16),(21314152,6660073,0),
-- customer 3
(21314153,6660033,0),(21314153,6660034,0),(21314153,6660035,2),(21314153,6660042,0),(21314153,6660043,0),(21314153,6660044,5),(21314153,6660045,2),
(21314153,6660046,0),(21314153,6660053,0),(21314153,6660055,0),(21314153,6660066,0),(21314153,6660067,2),(21314153,6660069,0),(21314153,6660073,18),
-- customer 4
(21314154,6660033,0),(21314154,6660034,0),(21314154,6660035,4),(21314154,6660042,4),(21314154,6660043,0),(21314154,6660044,3),(21314154,6660045,5),
(21314154,6660046,0),(21314154,6660053,8),(21314154,6660055,4),(21314154,6660066,0),(21314154,6660067,1),(21314154,6660069,0),(21314154,6660073,1),
-- customer 5
(21314155,6660033,2),(21314155,6660034,0),(21314155,6660035,2),(21314155,6660042,15),(21314155,6660043,5),(21314155,6660044,8),(21314155,6660045,0),
(21314155,6660046,0),(21314155,6660053,13),(21314155,6660055,2),(21314155,6660066,2),(21314155,6660067,2),(21314155,6660069,5),(21314155,6660073,5),
-- customer 6
(21314156,6660033,0),(21314156,6660034,1),(21314156,6660035,0),(21314156,6660042,0),(21314156,6660043,0),(21314156,6660044,7),(21314156,6660045,0),
(21314156,6660046,0),(21314156,6660053,0),(21314156,6660055,5),(21314156,6660066,6),(21314156,6660067,0),(21314156,6660069,0),(21314156,6660073,5);
UNLOCK TABLES;

-- -----------------------------------------------------
-- Table `mydb`.`FamilySSN`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FamilySSN` (
  `SSN_num` INT(11) NOT NULL,
  `SSN` INT(11) NOT NULL,
  PRIMARY KEY (`SSN_num`),
  INDEX `fk_FamilySSN_Card1_idx` (`SSN` ASC),
  CONSTRAINT `fk_FamilySSN_Card1`
    FOREIGN KEY (`SSN`)
    REFERENCES `mydb`.`Card` (`SSN`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

LOCK TABLES `mydb`.`FamilySSN` WRITE;
INSERT INTO `mydb`.`FamilySSN` VALUES (111,21314151),(666,21314151),(112,21314152),(113,21314153),
(114,21314154),(115,21314155);
UNLOCK TABLES;


-- -----------------------------------------------------
-- Table `mydb`.`Has_Product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Has_Product` (
  `Store_id` INT(11) NOT NULL,
  `Barcode` INT(11) NOT NULL,
  `Many` INT(11) NOT NULL,
  INDEX `fk_Has_Product_Store1_idx` (`Store_id` ASC),
  INDEX `fk_Has_Product_Product1_idx` (`Barcode` ASC),
  CONSTRAINT `fk_Has_Product_Store1`
    FOREIGN KEY (`Store_id`)
    REFERENCES `mydb`.`Store` (`Store_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Has_Product_Product1`
    FOREIGN KEY (`Barcode`)
    REFERENCES `mydb`.`Product` (`Barcode`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

LOCK TABLES `mydb`.`Has_Product` WRITE;
INSERT INTO `mydb`.`Has_Product` VALUES 
(1,6660055,10),(1,6660042,14),(1,6660043,11),(1,6660044,20),(1,6660066,12),(1,6660033,23),(1,6660053,14),(1,6660073,8),(1,6660046,9),
(2,6660044,3),(2,6660045,12),(2,6660035,32),(2,6660053,11),(2,6660073,12),
(3,6660055,19),(3,6660067,14),(3,6660045,14),(3,6660044,23),(3,6660069,12),(3,6660034,4),(3,6660046,5),
(4,6660055,0),(4,6660067,1),(4,6660042,6),(4,6660045,9),
(5,6660055,24),(5,6660067,31),(5,6660042,36),(5,6660045,21),(5,6660053,15),
(6,6660045,15),(6,6660043,17),(6,6660033,18),
(7,6660055,11),(7,6660042,0),(7,6660043,5),(7,6660044,2),(7,6660045,6),
(8,6660045,45),(8,6660044,23),(8,6660035,12),(8,6660073,43),(8,6660034,13),
(9,6660067,22),(9,6660042,23),(9,6660044,14),(9,6660053,16),
(10,6660033,8),(10,6660035,5),(10,6660043,9),(10,6660045,15),(10,6660046,16),(10,6660055,12),(10,6660066,15),(10,6660069,25),(10,6660073,7);
UNLOCK TABLES;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- indexies for the forth Part 
CREATE INDEX idx_transaction_ssn
ON `mydb`.`Transaction` (SSN);

CREATE INDEX idx_Contained_transaction_id
ON `mydb`.`Contained` (Transaction_Transaction_id);

CREATE INDEX idx_Contained_Product_Barcode
ON `mydb`.`Contained` (Product_Barcode);
-- end of indexies

-- views
create VIEW ourcostumers AS
select `Costumer`.`Name`, `Costumer`.`Surname`, `Costumer`.`Birthday`, `Costumer`.`SSN`
from `Costumer`;

CREATE VIEW transa AS
SELECT
`Transaction`.`Transaction_id`,
`Store`.`Store_id`,
`Category`.`Category_id`
FROM
`Category`
NATURAL JOIN `Transaction`
INNER JOIN `Store`
ON `Transaction`.`Store_id` = `Store`.`Store_id`;

-- end views 

-- start triggers
DELIMITER $$
CREATE TRIGGER giftcard
AFTER UPDATE ON `Transaction`
FOR EACH ROW 
BEGIN
UPDATE `Card`
SET points=0 
WHERE GiftCard=1 ;
END$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER newprice
AFTER UPDATE ON Product
FOR EACH ROW
BEGIN
UPDATE Price_History
SET Day_changed = curdate(), curr_price = new.curr_price
WHERE barcode=NEW.barcode;

#INSERT INTO Price_History(Price, Day_changed, Barcode)
#VALUES (new.curr_price, CURDATE(), new.Barcode)

END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER epivraveusi
AFTER UPDATE ON `Transaction`
FOR EACH ROW 
BEGIN
UPDATE `Card`
SET giftcard = 1
WHERE points>100 ;
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER Category_New 
AFTER INSERT ON Product
FOR EACH ROW
BEGIN
UPDATE Category, Product
SET `Category`.`Number` = `Category`.`Number` + 1
WHERE `Category`.`Category_id` = `Product`.`Category_id`;
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER Category_DEL
AFTER DELETE ON Product 
FOR EACH ROW
BEGIN
UPDATE Category, Product
SET `Category`.`Number` = `Category`.`Number` - 1
WHERE `Category`.`Category_id` = `Product`.`Category_id`;
END$$
DELIMITER ;

-- DELETE FROM product WHERE Barcode='6666666';

DELIMITER $$
CREATE TRIGGER ADDPoints
AFTER INSERT ON Transaction
FOR EACH ROW 
BEGIN
UPDATE `Card`
SET `Card`.points = `Card`.points + `Product`.points
WHERE `Customer`.SSN = `Transaction`.SSN;
END$$
DELIMITER ;












