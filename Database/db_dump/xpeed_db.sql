/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.24 : Database - xpeed_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`xpeed_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `xpeed_db`;

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `amount` int(10) DEFAULT NULL,
  `buyer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `items` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buyer_ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `city` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hash_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `entry_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (8,50,'sunzid','aa','[\"itemOne\",\"itemTwo\",\"itemThree\",\"itemFour\"]','sunzid02@gmail.com','::1','Enter Note....','dhaka','88012456','$6$rounds=1000$t3FaJFk3EyAJMCOv$t5EF0ZY4NDaa8N7v3tcfzUekQStjO6CRf7nhSCUE0C917UroG32hY.kHDlJdygq9dWWA/cqxJNg88s1xNNJz31','2020-06-04 03:06:12',1),(9,51,'sunzida','aa','[\"itemOne\",\"itemTwo\",\"itemThree\",\"itemFour\"]','sunzid02@gmail.com','::1','Enter Note....','dhaka','88012456','$6$rounds=1000$SFGaNUAqdxmZd6lq$vY7ozHrXJlARka768AYwqpv3zElx6W/m7hKf48ETxBMQdLPhYrv2W/HS.5HS0jBIehQaHfa1Z06Xhl1RfCMV/0','2020-06-04 03:07:45',101),(10,879,'zia','zia','[\"itemTwo\",\"itemThree\"]','zia@zuna.com','::1','Enter Note....','dha','880659','$6$rounds=1000$AEdegwY5WBzksd4H$gUR6FkeRw1kJA7HbM9lSj0q2KhcadfHkKVdV4iqhKwKjQaCzrymMA/lFIhcRgfBRLG4ufAEmEgiBudU6MugAZ1','2020-06-04 03:10:57',2),(11,777,'hamid','aa','[\"itemTwo\",\"itemFour\"]','sunzid02@gmail.com','::1','Enter Note....','dhaka','880258','$6$rounds=1000$EjoFa6QVrpVSNpj5$ZUEq2tRUkqSFGxydDsFw/b8QQRoFOKU2EVJMiAvMR.YVaK.J/hs.Hz6C38h0o.ttKqMeCKGHkK1Zj2Ykg.IXf.','2020-06-04 03:13:11',1),(12,50,'nanau','nanau','[\"itemTwo\",\"itemFour\"]','sunzid02@gmail.com','::1','Enter Note....','dhaka','88012356','$6$rounds=1000$fSzWmGyCN7n.t/FN$B8AaEyOO/nvRGufbIjh8eHMvc9c2NbDmfdB1dAh1L.RuBOt7JCax98SZTRyz1vCFbr0NY6JBJbgvECjg9vr5r.','2020-06-04 03:17:56',2),(13,85,'kensin','kensin','[\"itemTwo\"]','sunzid02@gmail.com','::1','Enter Note....','dhaka','88056','$6$rounds=1000$yIMYKwfX94aEOAWb$0NuMUKccaQcQTrN8LEqtbrdf.6Ckf6XddUrPnNTCb0TR52TC0YEwFuqJTuEmT0aSmDqAilsu8fQQWJMjyKB.o/','2020-06-04 03:20:10',25),(14,50,'zai','aa','[\"itemOne\"]','sunzid02@gmail.com','::1','Enter Note....','dhaka','01912969336','$6$rounds=1000$LtM8dKvg5Z37yc0P$WkFAvqzWL5Q3VaRXbbH6Ms/pCPUX0f8jwHXKYiYHYP66yekNj.uFAgE8ZTlAUNnHd2wPuhrqNYUCR4YYOphWS1','2020-06-04 03:53:12',25),(15,21,'zai','aa','[\"itemTwo\"]','sunzid02@gmail.com','::1','Enter Note....','dhaka','01912969336','$6$rounds=1000$n6FcKYeItVv5wC9k$ariMI6YkixsUYXgrFhuOA6pTay8.h.7GyJsteM9vn0COL.3TLdW6UB6yo/VwILHLax4ocQ4UHeN2FFtjDpsXn/','2020-06-04 04:17:10',5),(16,85,'xxx','xxx','[\"itemTwo\"]','sunzid02@gmail.com','::1','Enter Note....','dhaka','01674563623','$6$rounds=1000$H8RVZqk5ASMaegY8$r2jryrBTCqbwj8K30fjKHhq2IWNHZgJhJDenBDgkzGMXPBKsilsTPPiMJW3N1vADnUE1cFrpjcocYoS.ZGXeH/','2020-06-04 20:51:52',2),(17,22,'Rahman','jexo','[\"itemThree\",\"itemFour\"]','rahman@yahoo.com','::1','22 items I am buying','Comilla','880789656410','$6$rounds=1000$Cs0TsqQzMBkq71ui$TsDZfciblJ4zxxB2v8ki3Kk1hAyDqe86yR6CZbACCZ5jKL5CPSVTSoRPqRNcP21AE/u3kJXiQCTHEDi5/pOKV1','2020-06-04 22:20:44',50),(18,58,'hamza','hazma','[\"itemOne\"]','hamza@yahoo.com','::1','no note neeeded','Chittagong','8801234556','$6$rounds=1000$bt/DpXLC92TzQT3W$eO3k1zuN2La/bns1HH3CVCFbsUXBlfoj2PtQyHm4BhpkvZOoAjQN5Td.A9ra2j.cIucKgcjmyII1M6g1e9gYn/','2020-06-04 22:28:15',25),(19,87,'Ronaldo','ronaldo','[\"itemOne\"]','ronaldo@xyz.com','::1','The best footballer','Dhaka','8801345','$6$rounds=1000$MB6r5HFuyk81rXVa$ZOE//IUk3CNU7s1W/YQHeq.vn1YRNzLubSl9Rr0fCfx7GIn0xOv/4kQqRPK.RiDEp65sg6suLVmbOEtTe.9dJ0','2020-06-04 22:39:42',7);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
