-- MySQL dump 10.17  Distrib 10.3.23-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: ocfoxlrh_shop
-- ------------------------------------------------------
-- Server version	10.3.23-MariaDB-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `ocfoxlrh_shop`
--


--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bids` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ItemID` int(5) NOT NULL,
  `BidderID` int(4) NOT NULL,
  `BidAmount` int(6) NOT NULL,
  `BidTime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Won') NOT NULL DEFAULT 'Pending',
  `payment` enum('Paid','Pending') NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bids`
--

LOCK TABLES `bids` WRITE;
/*!40000 ALTER TABLE `bids` DISABLE KEYS */;
INSERT INTO `bids` VALUES (1,35,1,5900,'2020-05-27 11:51:48','Pending','Pending'),(2,59,1,3000,'2020-05-27 11:51:48','Pending','Pending'),(3,59,1,3200,'2020-05-27 11:51:48','Pending','Pending'),(4,68,1,3780,'2020-05-27 11:51:48','Pending','Pending'),(5,71,3,5100,'2020-05-27 11:51:48','Pending','Pending'),(6,71,2,5300,'2020-05-27 11:51:48','Won','Paid'),(7,65,3,3200,'2020-05-27 11:51:48','Pending','Pending'),(8,65,3,3290,'2020-05-27 11:51:48','Pending','Pending'),(9,65,3,3350,'2020-05-27 11:51:48','Pending','Pending'),(10,65,3,3400,'2020-05-27 11:51:48','Won','Pending'),(11,84,9,3,'2020-06-22 08:20:37','Pending','Pending'),(12,84,9,4,'2020-06-22 08:22:27','Pending','Pending'),(13,84,8,5,'2020-06-22 10:23:11','Pending','Pending'),(14,84,9,6,'2020-06-22 10:23:38','Pending','Pending'),(15,85,6,2,'2020-06-22 15:32:29','Pending','Pending'),(16,85,9,3,'2020-06-22 15:32:40','Pending','Pending'),(17,86,6,2,'2020-06-22 17:09:32','Pending','Pending'),(18,86,10,3,'2020-06-22 17:09:47','Pending','Pending'),(19,86,6,4,'2020-06-22 17:13:21','Pending','Pending');
/*!40000 ALTER TABLE `bids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `Category` varchar(20) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Electronics'),(2,'Watches'),(3,'Phones'),(4,'Fashion'),(5,'Clothes'),(6,'Shoes'),(7,'Kitchen');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counter`
--

DROP TABLE IF EXISTS `counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `counter` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `itemid` int(10) NOT NULL,
  `bidderid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counter`
--

LOCK TABLES `counter` WRITE;
/*!40000 ALTER TABLE `counter` DISABLE KEYS */;
INSERT INTO `counter` VALUES (1,71,3),(2,65,3),(3,56,3),(4,71,2);
/*!40000 ALTER TABLE `counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbackprofile`
--

DROP TABLE IF EXISTS `feedbackprofile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedbackprofile` (
  `FeedbackID` int(6) NOT NULL AUTO_INCREMENT,
  `alias` varchar(100) NOT NULL,
  `InvoiceNumber` varchar(100) NOT NULL,
  `Conditions` int(10) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Status` enum('Received','Pending') NOT NULL DEFAULT 'Pending',
  `Rating` int(10) NOT NULL,
  PRIMARY KEY (`FeedbackID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbackprofile`
--

LOCK TABLES `feedbackprofile` WRITE;
/*!40000 ALTER TABLE `feedbackprofile` DISABLE KEYS */;
INSERT INTO `feedbackprofile` VALUES (1,'BID65474','REF1613041480',5,'Good','Pending',5),(2,'BID65474','REF93629013',5,'Good','Pending',5),(3,'BID1785581299','REF93629013',5,'In order','Received',5);
/*!40000 ALTER TABLE `feedbackprofile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `ItemID` int(10) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(50) NOT NULL,
  `SellerID` int(10) DEFAULT NULL,
  `StartingPrice` int(6) NOT NULL,
  `ExpectedPrice` int(6) NOT NULL,
  `CurrentPrice` int(6) DEFAULT NULL,
  `PhotosID` varchar(200) DEFAULT NULL,
  `Description` varchar(6000) DEFAULT NULL,
  `CategoryID` int(10) NOT NULL,
  `EndDate` date NOT NULL,
  `EndTime` time NOT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (29,'Apple iPad 2 16GB',NULL,56600,63000,56600,'phone1.jpg','\r\nApple iPad 2 16GB, Wi-Fi, 9.7in - Black\r\n\r\nDescription\r\n\r\nThis Ipad is in GOOD condition\r\nThe iPad is fully tested and works perfectly. Battery is still holding charge.\r\nWill show some minor scratching, ding or dent but nothing major. We would give it 7-8 out of 10\r\nThe Ipad does not come in the original retail package. It is repacked in our own box.\r\nIt comes with Apple Certified Wall Adapter and Cable (Brand can be Apple, Belkin, or Rocket-Fish)\r\nThis is the Wifi model. No Sim card required.\r\nManual is not included and can be downloaded from Apple website\r\nWe offer 60 days warranty\r\n\r\nWhat is in the package?\r\n\r\nApple iPad 2 16GB, Wi-Fi, 9.7in - Black\r\nApple Certified Wall Charger/Adapter\r\nApple Certified Data/Sync Cable',3,'0000-00-00','00:00:00'),(30,' Samsung Galaxy S4 i545 4G LTE Smartphone ',NULL,21500,23000,21500,'phone3.jpg','Highlight Features:\r\n\r\n5\" Super AMOLED Capacitive Multi-Touchscreen w/ Protective Corning Gorilla Glass 3\r\n\r\nQuad-Core 1.9 GHz Krait 300 Processor, Chipset: Qualcomm APQ864T Snapdragon 6, Adreno 320 Graphics\r\n\r\n13 Megapixel Camera (4128 x 3096 pixels) w/ Autofocus, LED flash + Front-Facing 2 ',3,'0000-00-00','00:00:00'),(31,'Samsung Galaxy S4 MINI i257 ',NULL,18000,21600,18000,'phone4.jpg','â€œThis cell phone is in NEW Other condition, meaning there is no retail box as it was received in bulk. Cosmetically, the cell phone is in perfect or near condition, The screen is perfect, might be little minor scratches visible or not visible on housing from shipping etc. , The cell phone is tested well functional. The cell phone is UNLOCKED and is ready for all GSM carriers such as AT&T, T-Mobile Straight Talk, MetroPCS etc in the world. It does not work with any CDMA carriers such as Verizon, Sprint, Boost Mobile. Please contact us if there is any question.â€',3,'0000-00-00','00:00:00'),(32,'Apple Iphone 6 Grigio 64Gb',NULL,59000,63900,59000,'phone5.jpg','â€œ\r\nApple Iphone 6 Grigio 64Gb in buono stato, con custodia e pellicole applicate....\r\n\r\nThis cell phone is in NEW Other condition, meaning there is no retail box as it was received in bulk. Cosmetically, the cell phone is in perfect or near condition, The screen is perfect, might be little minor scratches visible or not visible on housing from shipping etc. , The cell phone is tested well functional. The cell phone is UNLOCKED and is ready for all GSM carriers such as AT&T, T-Mobile Straight Talk, MetroPCS etc in the world. It does not work with any CDMA carriers such as Verizon, Sprint, Boost Mobile. Please contact us if there is any question.â€',3,'0000-00-00','00:00:00'),(33,'UTStarcom CDM7126 - Silver black',NULL,15000,18200,15000,'phone6.jpg','\r\nProduct Information\r\nSleek, compact, and powerful, the silver and black Cricket UTStarcom CDM7126 cellular phone is an excellent choice for users who seek reliability and performance. This UTStarcom mobile phone features a stunning color screen, flip style design, tri-band support, and a Li-ion battery with up to 311 minutes of talktime and up to 248 hours of standby time. Surf the Web quickly, connect multiple devices through Bluetooth technology, and enjoy downloading everything from ringtones to games to apps via this cellular phone. Users will be entertained for hours with Cricket games and apps available on this UTStarcom mobile phone. Speakerphone functionality, voice-activated dialing, and predictive text input all make communicating easier, while calculator, alarm, and calendar applications keep users on schedule and productive. The UTStarcom CDM7126 cellular phone keeps contacts organized in an easy-to-access contact directory. Weighing just 3 oz and measuring 3.6 inches high, 1.9 inches wide, and 0.7 inches deep, this UTStarcom mobile phone easily fits into pockets, purses, and briefcases.',3,'0000-00-00','00:00:00'),(34,'Ulefone Paris X Android 5.1',NULL,13000,19200,13000,'phone7.jpg','Features:\r\n \r\nAndroid 5.1 (Lollipop) with 1.0GHz MT6735P Quad-Core processor and 2GB RAM +16GB ROM\r\nSupport 2G network: GSM 850/900/1800/1900 MHz\r\nSupport 3G network: WCDMA 900/2100 MHz              \r\nSupport 4G network: FDD-LTE Band 1/3/7/20 (2100/1800/2600/800MHz)\r\nDual SIM Card Dual Standby\r\n5.0 inch 10-point-touch IPS capacitive screen, with 1280*720 HD screen resolution\r\nRear Back Camera 8.0MP(interpolation 13.0MP) with flashlight and auto focus.\r\nFront 5.0 MP(interpolation 8.0MP) camera, make your selfies more distinctive\r\nUltra Experience--Wireless Update. Pre-installed Android 5.1 O.S. Lollipop, download plenty of apps on popular Play Store. Support wireless system update, one-stop, no pain solution for using your Ulefone ParisX.\r\nSupports most APK format Android game and applications.',3,'0000-00-00','00:00:00'),(35,'Makita N3701 6mm (1/4\") Electric Trimmer',NULL,5600,8400,5900,'elec1.jpg','\r\nProduct Details\r\n\r\nModel Number: N3701\r\nProduct Type: 1/4\" Trimmer\r\nPower Input: 440W\r\nWeight: 1.7kg\r\nNo Load Speed: 30,000rpm\r\nPower Supply Cord: 2.5m\r\nBase: 82 x 90mm\r\nOverall Length: 220mm\r\nCollet Size: 6mm (1/4\")\r\nVoltage: 220V (Corded/Plug Type C)\r\nPlease check if the voltage indicated on the item corresponds with the main voltage in your home.',1,'0000-00-00','00:00:00'),(36,'DeWALT DWE 6000 1/4\"(6mm) Trimmer',NULL,2100,2900,2100,'elec2.jpg','NEW DeWALT DWE 6000 1/4\"(6mm) Trimmer Tool  (AC 220V ) Tools Woodwork\r\n(Bits are not included)\r\n\r\nâ– Specifications\r\nâ–¶Product Type : 1/4\" Trimmer \r\nâ–¶Voltage : 220V 390W (Plug Type C) \r\nâ–¶Collet Capacity : 6mm (1/4\") \r\nâ–¶Weight : 2.1kg \r\nâ–¶No Load Speed : 30,000rpm \r\nâ–¶Size Length: 110mm x Height: 205mm\r\nâ–¶Plug type : C type\r\n',1,'0000-00-00','00:00:00'),(37,'Rockwell HD Block Planer Model 167 ',NULL,2100,2900,2100,'elec3.jpg',' We always try to provide the best service and high quality products for every customer and our goal is to make sure you have a pleasant shopping experience with us. If there is any issue, problem or unpleasant experience, please contact us to resolve any issue before leaving us a negative feedback or open any eBay or PayPal dispute. We promise to try our best to resolve the problem and usually that is what we do. Please give us the opportunity to resolve any problem because good communication is always the best way to solve any problem. If you are satisfied with our service, please leave us 5 star positive feedback. Your opinion counts and your recognition will make us more confident to develop a better business and serve you better. We will leave a positive feedback after receiving the full payment. All messages, emails or questions will be answered within 1 business day. If you do not receive our reply, please re-send your email and we will reply to you as soon as possible. We only accept payments via PayPal. So please kindly check if you have a PayPal account before purchasing. We offer 30 days money back guarantee return policy. Shipping & Refund',1,'0000-00-00','00:00:00'),(38,' TERMOMETRO DIGITALE LASER AD INFRAROSSI',NULL,3400,4200,3400,'elec4.jpg',' We always try to provide the best service and high quality products for every customer and our goal is to make sure you have a pleasant shopping experience with us. If there is any issue, problem or unpleasant experience, please contact us to resolve any issue before leaving us a negative feedback or open any eBay or PayPal dispute. We promise to try our best to resolve the problem and usually that is what we do. Please give us the opportunity to resolve any problem because good communication is always the best way to solve any problem. If you are satisfied with our service, please leave us 5 star positive feedback. Your opinion counts and your recognition will make us more confident to develop a better business and serve you better. We will leave a positive feedback after receiving the full payment. All messages, emails or questions will be answered within 1 business day. If you do not receive our reply, please re-send your email and we will reply to you as soon as possible. We only accept payments via PayPal. So please kindly check if you have a PayPal account before purchasing. We offer 30 days money back guarantee return policy. Shipping & Refund',1,'0000-00-00','00:00:00'),(39,'Makita Akku-Lampe ML 100 10,8V ML100',NULL,4100,5100,4100,'elec5.jpg',' We always try to provide the best service and high quality products for every customer and our goal is to make sure you have a pleasant shopping experience with us. If there is any issue, problem or unpleasant experience, please contact us to resolve any issue before leaving us a negative feedback or open any eBay or PayPal dispute. We promise to try our best to resolve the problem and usually that is what we do. Please give us the opportunity to resolve any problem because good communication is always the best way to solve any problem. If you are satisfied with our service, please leave us 5 star positive feedback. Your opinion counts and your recognition will make us more confident to develop a better business and serve you better. We will leave a positive feedback after receiving the full payment. All messages, emails or questions will be answered within 1 business day. If you do not receive our reply, please re-send your email and we will reply to you as soon as possible. We only accept payments via PayPal. So please kindly check if you have a PayPal account before purchasing. We offer 30 days money back guarantee return policy. Shipping & Refund',1,'0000-00-00','00:00:00'),(40,' GENERATORE INVERTER MONO STAR MIG',NULL,56800,63000,56800,'elec6.jpg',' We always try to provide the best service and high quality products for every customer and our goal is to make sure you have a pleasant shopping experience with us. If there is any issue, problem or unpleasant experience, please contact us to resolve any issue before leaving us a negative feedback or open any eBay or PayPal dispute. We promise to try our best to resolve the problem and usually that is what we do. Please give us the opportunity to resolve any problem because good communication is always the best way to solve any problem. If you are satisfied with our service, please leave us 5 star positive feedback. Your opinion counts and your recognition will make us more confident to develop a better business and serve you better. We will leave a positive feedback after receiving the full payment. All messages, emails or questions will be answered within 1 business day. If you do not receive our reply, please re-send your email and we will reply to you as soon as possible. We only accept payments via PayPal. So please kindly check if you have a PayPal account before purchasing. We offer 30 days money back guarantee return policy. Shipping & Refund',1,'0000-00-00','00:00:00'),(41,'Mens Crew Neck Casual T-Shirts Gym Wear',NULL,1200,1600,1200,'cl1.jpg','Authentic Mens Causal/Training T-Shirts\r\nFitted Lycra Cotton Blend Material \r\n\r\n\r\n\r\n\r\n       Description \r\nMade From 90% Cotton 10& Elestine \r\nMachine Washable\r\nFitted Material\r\nAvailable In S,M,L,XL, Sizes\r\nIdeal For Training Or Casual Wear\r\nYou Against Yours Self Large Logo\r\nDanimal Wear Logos On side and Back\r\nUsed By Top Pro Body builders In The UK\r\nQuick Delivery',5,'0000-00-00','00:00:00'),(42,'Vibrant Checked Shirt From Crew Clothing',NULL,1200,1600,1200,'cl2.jpg','Authentic Mens Causal/Training T-Shirts\r\nFitted Lycra Cotton Blend Material \r\n\r\n\r\n\r\n\r\n       Description \r\nMade From 90% Cotton 10& Elestine \r\nMachine Washable\r\nFitted Material\r\nAvailable In S,M,L,XL, Sizes\r\nIdeal For Training Or Casual Wear\r\nYou Against Yours Self Large Logo\r\nDanimal Wear Logos On side and Back\r\nUsed By Top Pro Body builders In The UK\r\nQuick Delivery',5,'0000-00-00','00:00:00'),(43,'KISS Hockey Jersey',NULL,2400,3100,2400,'cl4.jpg','KISS hockey style jersey\r\n\r\nItem is from 1997 but never worn and in great condition!  From a smoke free home. \r\n\r\nJersey is labeled one size fits all on tag.\r\n\r\nIf you have any questions, please ask!',5,'0000-00-00','00:00:00'),(44,'Concert All Over Art T-Shirt XL',NULL,900,1500,900,'cl5.jpg','KISS Psycho Circus Larger Than Life Mexico 1999 Concert All Over Art T-Shirt XLarge with chest measurement 44\" (armpit to armpit then doubled) and length from collar to hem of 30\". Worn and Washed from smoke free pet free home. No holes or stains.',5,'0000-00-00','00:00:00'),(45,'Hose Braun GrÃ¶ÃŸe 152 fÃ¼r Jungen',NULL,900,1500,900,'cl6.jpg','KISS Psycho Circus Larger Than Life Mexico 1999 Concert All Over Art T-Shirt XLarge with chest measurement 44\" (armpit to armpit then doubled) and length from collar to hem of 30\". Worn and Washed from smoke free pet free home. No holes or stains.',5,'0000-00-00','00:00:00'),(46,'TENNIS EVOLUTION OF MAN MENS T-SHIRT',NULL,900,1500,900,'cl7.jpg','KISS Psycho Circus Larger Than Life Mexico 1999 Concert All Over Art T-Shirt XLarge with chest measurement 44\" (armpit to armpit then doubled) and length from collar to hem of 30\". Worn and Washed from smoke free pet free home. No holes or stains.',5,'0000-00-00','00:00:00'),(47,' Fashion Jewelry Pendant Bronze',NULL,500,750,500,'fs1.jpg',' If you get defective item or we ship you the wrong item ,or the Item is not as described ,\r\n or the Item is damaged because of the international shipping ,do not worry , please contact us , we accept refund,\r\n or reshipment. Any non-received items caused by invalid address registered on PayPal are not in our \r\n full refund or replacement policy.\r\n',4,'0000-00-00','00:00:00'),(48,' Silver Women Crystal Rhinestone Cubic',NULL,500,750,500,'fs2.jpg',' If you get defective item or we ship you the wrong item ,or the Item is not as described ,\r\n or the Item is damaged because of the international shipping ,do not worry , please contact us , we accept refund,\r\n or reshipment. Any non-received items caused by invalid address registered on PayPal are not in our \r\n full refund or replacement policy.\r\n',4,'0000-00-00','00:00:00'),(49,'Real green Four Leaf Clover',NULL,600,1000,670,'fs3.jpg',' If you get defective item or we ship you the wrong item ,or the Item is not as described ,\r\n or the Item is damaged because of the international shipping ,do not worry , please contact us , we accept refund,\r\n or reshipment. Any non-received items caused by invalid address registered on PayPal are not in our \r\n full refund or replacement policy.\r\n',4,'0000-00-00','00:00:00'),(50,'Water Drop Pendant Choker Necklace',NULL,600,0,600,'fs4.jpg',' If you get defective item or we ship you the wrong item ,or the Item is not as described ,\r\n or the Item is damaged because of the international shipping ,do not worry , please contact us , we accept refund,\r\n or reshipment. Any non-received items caused by invalid address registered on PayPal are not in our \r\n full refund or replacement policy.\r\n',4,'0000-00-00','00:00:00'),(51,'Water Drop Pendant Choker Necklace',NULL,600,900,600,'fs5.jpg',' If you get defective item or we ship you the wrong item ,or the Item is not as described ,\r\n or the Item is damaged because of the international shipping ,do not worry , please contact us , we accept refund,\r\n or reshipment. Any non-received items caused by invalid address registered on PayPal are not in our \r\n full refund or replacement policy.\r\n',4,'0000-00-00','00:00:00'),(52,' DOLLAR POUCH Charm Pendant',NULL,600,900,600,'fs6.jpg',' If you get defective item or we ship you the wrong item ,or the Item is not as described ,\r\n or the Item is damaged because of the international shipping ,do not worry , please contact us , we accept refund,\r\n or reshipment. Any non-received items caused by invalid address registered on PayPal are not in our \r\n full refund or replacement policy.\r\n',4,'0000-00-00','00:00:00'),(53,'Faucet Filter Water Filter Tap',NULL,250,520,250,'kt1.jpg','Features:\r\n100% Brand new and high quality\r\n\r\nColor:Random\r\n\r\nSpecifications:\r\nMaterial: Sponge\r\n\r\nPackage Including:\r\n1 X sponge filter\r\n\r\n',7,'0000-00-00','00:00:00'),(54,' Novelty Fry Cutter Potato Cut into Strips',NULL,360,520,412,'kt2.jpg','Features:\r\n100% Brand new and high quality\r\n\r\nColor:Random\r\n\r\nSpecifications:\r\nMaterial: Sponge\r\n\r\nPackage Including:\r\n1 X sponge filter\r\n\r\n',7,'0000-00-00','00:00:00'),(55,'Utensils Set Kitchen Cooking Gadget',NULL,250,360,250,'kt3.jpg','A MAGNIFICENT ADAPTATION of a classic design that will bring a touch of elegance with functionality into your home. Set includes a Ladle, Solid Spoon, Meat Fork, Slotted Turner/Spatula and a Skimmer.',7,'0000-00-00','00:00:00'),(56,'Vegetable Fruit Potato Peeler',NULL,200,390,200,'kt4.jpg','Item NO.: K3247XX\r\nCondition: 100% Brand New and High Quality\r\nMaterial: Stainless steel+ plastic \r\nColor: Random color\r\nSize: 19.5*8*5cm/7.67*3.14*1.96inch\r\nPackage Includes: 1x Vegetable Fruit Peeler\r\nã€€\r\nFeatures:\r\n(1) Made of high quality stainless steel and plastic---durable \r\n(2) This is a multifunctional peeler with 360 degree rotatable blades.\r\n(3) It has 3 kinds of blades which can grate food into different kinds of shape.\r\n(4) Light weight, easy to use and clean',7,'0000-00-00','00:00:00'),(57,'Kitchen Leaf Shape Rice Wash Sieve',NULL,350,580,350,'kt5.jpg','Item NO.: K3247XX\r\nCondition: 100% Brand New and High Quality\r\nMaterial: Stainless steel+ plastic \r\nColor: Random color\r\nSize: 19.5*8*5cm/7.67*3.14*1.96inch\r\nPackage Includes: 1x Vegetable Fruit Peeler\r\nã€€\r\nFeatures:\r\n(1) Made of high quality stainless steel and plastic---durable \r\n(2) This is a multifunctional peeler with 360 degree rotatable blades.\r\n(3) It has 3 kinds of blades which can grate food into different kinds of shape.\r\n(4) Light weight, easy to use and clean',7,'0000-00-00','00:00:00'),(58,'Vegetable Cutter Fruit Cutlery Gadgets',NULL,350,580,350,'kt6.jpg','Item NO.: K3247XX\r\nCondition: 100% Brand New and High Quality\r\nMaterial: Stainless steel+ plastic \r\nColor: Random color\r\nSize: 19.5*8*5cm/7.67*3.14*1.96inch\r\nPackage Includes: 1x Vegetable Fruit Peeler\r\nã€€\r\nFeatures:\r\n(1) Made of high quality stainless steel and plastic---durable \r\n(2) This is a multifunctional peeler with 360 degree rotatable blades.\r\n(3) It has 3 kinds of blades which can grate food into different kinds of shape.\r\n(4) Light weight, easy to use and clean',7,'0000-00-00','00:00:00'),(59,'Mens Full gold Luxury Stainless Steel',NULL,2500,3600,3200,'wt1.jpg','specifications\r\nBrand Name:CHENXI\r\nItem Type:Quartz Wristwatches\r\nCase Material:Stainless Steel\r\nDial Window Material Type:Glass\r\nWater Resistance Depth:3Bar\r\nMovement:Quartz\r\nDial Diameter:4 mm',2,'0000-00-00','00:00:00'),(60,'Date Sport Quartz Wrist Watch',NULL,2300,3600,2300,'wt2.jpg','specifications\r\nBrand Name:CHENXI\r\nItem Type:Quartz Wristwatches\r\nCase Material:Stainless Steel\r\nDial Window Material Type:Glass\r\nWater Resistance Depth:3Bar\r\nMovement:Quartz\r\nDial Diameter:4 mm',2,'0000-00-00','00:00:00'),(61,'Retro Quartz Analog Wrist Watch',NULL,2300,3600,2300,'wt3.jpg','specifications\r\nBrand Name:CHENXI\r\nItem Type:Quartz Wristwatches\r\nCase Material:Stainless Steel\r\nDial Window Material Type:Glass\r\nWater Resistance Depth:3Bar\r\nMovement:Quartz\r\nDial Diameter:4 mm',2,'0000-00-00','00:00:00'),(62,'Quartz Black Leather Watch Strap',NULL,1500,3600,1500,'wt4.jpg','specifications\r\nBrand Name:CHENXI\r\nItem Type:Quartz Wristwatches\r\nCase Material:Stainless Steel\r\nDial Window Material Type:Glass\r\nWater Resistance Depth:3Bar\r\nMovement:Quartz\r\nDial Diameter:4 mm',2,'0000-00-00','00:00:00'),(63,'Leather Stainless Steel Wrist Watch',NULL,3100,3600,3100,'wt5.jpg','specifications\r\nBrand Name:CHENXI\r\nItem Type:Quartz Wristwatches\r\nCase Material:Stainless Steel\r\nDial Window Material Type:Glass\r\nWater Resistance Depth:3Bar\r\nMovement:Quartz\r\nDial Diameter:4 mm',2,'0000-00-00','00:00:00'),(64,'Quartz Dial Leather Wrist Watch Gift',NULL,3900,4500,3900,'wt6.jpg','specifications\r\nBrand Name:CHENXI\r\nItem Type:Quartz Wristwatches\r\nCase Material:Stainless Steel\r\nDial Window Material Type:Glass\r\nWater Resistance Depth:3Bar\r\nMovement:Quartz\r\nDial Diameter:4 mm',2,'0000-00-00','00:00:00'),(65,'Nike Men Flyknit Max Air Running Shoes',NULL,3100,3600,3400,'sh1.jpg','New Nike Men Flyknit Max Air Premium Running Shoes\r\n\r\n(New with Box)\r\n\r\nStyle #  620469-404\r\n\r\nColor:  Blue/Blck/Concord/Crimson\r\n\r\nSize: 11.5 US, 13 US\r\n\r\nRetails at $225.00\r\n\r\n \r\nBUY THEM FOR $169.99\r\n\r\nSHIPPING /HANDLING CHARGE IS FREE VIA USPS IN THE US.  ADDITIONAL CHARGES FOR INTERNATIONAL SHIPPING.\r\n\r\nI WILL SHIP AS SOON AS PAYMENT IS MADE. I ACCEPT PAYPAL,',6,'0000-00-00','00:00:00'),(66,'Work site SS608SM White Safety Trainer size 8',NULL,2600,3600,2600,'sh2.jpg','New Nike Men Flyknit Max Air Premium Running Shoes\r\n\r\n(New with Box)\r\n\r\nStyle #  620469-404\r\n\r\nColor:  Blue/Blck/Concord/Crimson\r\n\r\nSize: 11.5 US, 13 US\r\n\r\nRetails at $225.00\r\n\r\n \r\nBUY THEM FOR $169.99\r\n\r\nSHIPPING /HANDLING CHARGE IS FREE VIA USPS IN THE US.  ADDITIONAL CHARGES FOR INTERNATIONAL SHIPPING.\r\n\r\nI WILL SHIP AS SOON AS PAYMENT IS MADE. I ACCEPT PAYPAL,',6,'0000-00-00','00:00:00'),(67,' Blue White Womens Classic Trainers',NULL,2900,3600,2900,'sh3.jpg','New Nike Men Flyknit Max Air Premium Running Shoes\r\n\r\n(New with Box)\r\n\r\nStyle #  620469-404\r\n\r\nColor:  Blue/Blck/Concord/Crimson\r\n\r\nSize: 11.5 US, 13 US\r\n\r\nRetails at $225.00\r\n\r\n \r\nBUY THEM FOR $169.99\r\n\r\nSHIPPING /HANDLING CHARGE IS FREE VIA USPS IN THE US.  ADDITIONAL CHARGES FOR INTERNATIONAL SHIPPING.\r\n\r\nI WILL SHIP AS SOON AS PAYMENT IS MADE. I ACCEPT PAYPAL,',6,'0000-00-00','00:00:00'),(68,'Baretraps Winsom Women Boot',NULL,3700,5100,3780,'sh4.jpg','New Nike Men Flyknit Max Air Premium Running Shoes\r\n\r\n(New with Box)\r\n\r\nStyle #  620469-404\r\n\r\nColor:  Blue/Blck/Concord/Crimson\r\n\r\nSize: 11.5 US, 13 US\r\n\r\nRetails at $225.00\r\n\r\n \r\nBUY THEM FOR $169.99\r\n\r\nSHIPPING /HANDLING CHARGE IS FREE VIA USPS IN THE US.  ADDITIONAL CHARGES FOR INTERNATIONAL SHIPPING.\r\n\r\nI WILL SHIP AS SOON AS PAYMENT IS MADE. I ACCEPT PAYPAL,',6,'0000-00-00','00:00:00'),(69,'Women US 9 Multi Color Heels',NULL,2100,2600,2100,'sh5.jpg','New Nike Men Flyknit Max Air Premium Running Shoes\r\n\r\n(New with Box)\r\n\r\nStyle #  620469-404\r\n\r\nColor:  Blue/Blck/Concord/Crimson\r\n\r\nSize: 11.5 US, 13 US\r\n\r\nRetails at $225.00\r\n\r\n \r\nBUY THEM FOR $169.99\r\n\r\nSHIPPING /HANDLING CHARGE IS FREE VIA USPS IN THE US.  ADDITIONAL CHARGES FOR INTERNATIONAL SHIPPING.\r\n\r\nI WILL SHIP AS SOON AS PAYMENT IS MADE. I ACCEPT PAYPAL,',6,'0000-00-00','00:00:00'),(70,'Women US 6 Nude Slingback Sandal',NULL,2100,2600,2100,'sh6.jpg','New Nike Men Flyknit Max Air Premium Running Shoes\r\n\r\n(New with Box)\r\n\r\nStyle #  620469-404\r\n\r\nColor:  Blue/Blck/Concord/Crimson\r\n\r\nSize: 11.5 US, 13 US\r\n\r\nRetails at $225.00\r\n\r\n \r\nBUY THEM FOR $169.99\r\n\r\nSHIPPING /HANDLING CHARGE IS FREE VIA USPS IN THE US.  ADDITIONAL CHARGES FOR INTERNATIONAL SHIPPING.\r\n\r\nI WILL SHIP AS SOON AS PAYMENT IS MADE. I ACCEPT PAYPAL,',6,'0000-00-00','00:00:00'),(71,'Fender Guitar',2,5000,6000,5300,'phone1.jpg','Fender Squier Stratocaster',1,'0000-00-00','00:00:00'),(80,'Fender Guitar',2,5000,6000,5000,'4572-1.JPG','Fender Guitar',2,'0000-00-00','13:27:00'),(81,'Dinner Dress',5,50,35,50,'9155-20181025_1054.jpg','Long ,Maroon ,Size 28 - 30.',5,'0000-00-00','12:00:00'),(82,'Men`s Jeans',5,1,2,1,'6539-jean.jpg','Faded Blue, Ripped,Size 40',4,'0000-00-00','10:15:00'),(83,'Car Radio',8,30,45,30,'2015-radio.jpeg','Car radio, black',1,'0000-00-00','16:00:00'),(84,'iphone 11',6,2,20,6,'8948-iphone.jpg','Black,3 cameras',3,'0000-00-00','08:45:00'),(85,'Radio',12,1,4,3,'5097-radio.jpg','Orange and blue radio with a battery saver.',1,'0000-00-00','15:37:00'),(86,'Laptop Combo',9,1,50,4,'5031-laptop.jpg','Laptop, Headphones',1,'2020-06-22','17:10:00'),(87,'Motherboard',9,1,10000,1,'6916-motherboard.jpg','Wired',1,'2020-06-22','18:48:00');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `MessageID` int(6) NOT NULL,
  `SenderID` int(6) NOT NULL,
  `ReceiverID` int(6) NOT NULL,
  `Topic` varchar(500) NOT NULL,
  `Body` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `nationalid` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userid` int(10) NOT NULL,
  `alias` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'Bid','Now Admin','75-555555X48','0778419887','1 Cleveland Range','eddymanzongo@gmail.com',1,'BID65474'),(2,'Edwin','Benza','75-160429J20','0775225898','1600 Zimre Park','eddymanzongo@gmail.com',2,'BID65474'),(3,'Tafara','Mudzi','78-555886Z85','0778419887','127 Harare Str, Glen View 1','eddymanzongo@gmail.com',3,'BID65474'),(4,'Edwin','Manzongo','75-473587G50','0774546951','54 East Coast Harare','eddymanzongo@gmail.com',4,'BID65474'),(5,'Conso','Kapuya','672495683T92','0745332792','10 huku street','',5,'BID65474'),(6,'Leona','Magaya','63-567359T59','0775175498','105 Makuku Street','',6,'BID65474'),(7,'','','','','','',7,'BID65474'),(8,'Samantha','Magaya','632606329Z36','0784295262','20 Huku Street','',8,'BID65474'),(9,'Michael','Musiyiwa','672495683T92','0789668123','20 Bradley Road, Belvedere','',9,'BID65474'),(10,'Tafara','Mutembedza','636527836Z35','0759853754','105 Makuku Street','',10,'BID65474'),(11,'Yvette','Mawandu ','43-2007311n42','','','',0,'BID527643203'),(12,'Yvette','Mawandu','43-2007311n42','0784707035','westgate mall','',0,'BID1785581299');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solditems`
--

DROP TABLE IF EXISTS `solditems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solditems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `InvoiceNumber` varchar(100) NOT NULL,
  `ItemID` int(6) NOT NULL,
  `BidID` int(10) NOT NULL,
  `BuyerID` int(6) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `FinalValue` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solditems`
--

LOCK TABLES `solditems` WRITE;
/*!40000 ALTER TABLE `solditems` DISABLE KEYS */;
INSERT INTO `solditems` VALUES (3,'REF1613041480',71,6,2,'2020-06-11 12:03:43',5300),(4,'REF1747524190',71,6,2,'2020-06-11 12:12:10',5300),(5,'REF1457642773',71,6,2,'2020-06-18 10:54:52',5300),(7,'REF1897555540',71,6,2,'2020-06-18 11:10:50',5300),(11,'REF93629013',71,6,3,'2020-06-19 19:12:12',5300),(12,'REF1812708838',0,0,0,'2020-06-22 19:12:50',0);
/*!40000 ALTER TABLE `solditems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `UserRole` int(10) NOT NULL DEFAULT 2,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `alias` varchar(100) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'admin','21232f297a57a5a743894a0e4a801fc3','Active',''),(2,2,'edwin@edwin.co.zw','4e6a3bc831604faec0c555c136720b22','Active',''),(3,2,'taffy','6f6d894b6e7b0860a6bf5e7531362eb6','Inactive',''),(4,2,'edwin@gmail.com','8e6e509fba12de7be9ff1cb5333a69d2','Active',''),(5,2,'consoler@gmail.com','ca1b595f2f84b21398b359b4617b76c5','Active',''),(6,2,'leona@gmail.com','9879a692f0391c9135c2af9d99371360','Active',''),(7,2,'leona@gmail.com','21232f297a57a5a743894a0e4a801fc3','Active',''),(8,2,'samantha@gmail.com','f01e0d7992a3b7748538d02291b0beae','Active',''),(9,2,'mike@gmail.com','0acf4539a14b3aa27deeb4cbdf6e989f','Active',''),(10,2,'tafara@gmail.com','0c56c222c73204f79e31a71132f098b5','Active',''),(11,2,'','d41d8cd98f00b204e9800998ecf8427e','Active','BID527643203'),(12,2,'yvette@gmail.com','efb02011d94efa80ae173716e51bad47','Active','BID1785581299');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userroles`
--

DROP TABLE IF EXISTS `userroles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userroles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userroles`
--

LOCK TABLES `userroles` WRITE;
/*!40000 ALTER TABLE `userroles` DISABLE KEYS */;
INSERT INTO `userroles` VALUES (1,'Admin'),(2,'Buyer / Seller');
/*!40000 ALTER TABLE `userroles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-22 19:24:40

