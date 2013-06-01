# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: evolveorigin
# Generation Time: 2013-05-30 23:31:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table login_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login_tokens`;

CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `login_tokens` WRITE;
/*!40000 ALTER TABLE `login_tokens` DISABLE KEYS */;

INSERT INTO `login_tokens` (`id`, `user_id`, `token`, `duration`, `used`, `created`, `expires`)
VALUES
	(106,1,'bfdb69647925faced2d0970ba144a16a','2 weeks',1,'2013-04-17 14:34:02','2013-05-01 14:34:02'),
	(105,1,'e950a5b3266410dc63069abde1d6b50d','2 weeks',1,'2013-04-17 10:31:51','2013-05-01 10:31:51'),
	(104,1,'c60c6ecb063dfcb760ad8511943054f1','2 weeks',1,'2013-04-16 21:46:50','2013-04-30 21:46:50'),
	(4,2,'9326090b485b1de704b59508d7a5278c','2 weeks',0,'2013-03-15 20:19:48','2013-03-29 20:19:48'),
	(103,1,'baa1214d38aa3b4f85dd62f3241cfcb4','2 weeks',1,'2013-04-16 17:40:07','2013-04-30 17:40:07'),
	(102,0,'fe576c45b8a4ab2415168ae0bab94163','2 weeks',0,'2013-04-16 16:14:28','2013-04-30 16:14:28'),
	(101,1,'460e7d7ebf40bd7b06ec9209c6191549','2 weeks',1,'2013-04-16 14:37:01','2013-04-30 14:37:01'),
	(100,1,'c12018a9589c9b93d7747f69e00b1c13','2 weeks',1,'2013-04-16 13:29:53','2013-04-30 13:29:53'),
	(99,1,'ca1a648a6dce146502e9b5a2eff2a0a0','2 weeks',1,'2013-04-16 10:36:15','2013-04-30 10:36:15'),
	(98,1,'57d9ab40d2fb6099091685d048c68972','2 weeks',1,'2013-04-16 10:19:42','2013-04-30 10:19:42'),
	(97,0,'1473b3cbcfca49b9dec4ef603a867c29','2 weeks',0,'2013-04-15 21:23:46','2013-04-29 21:23:46'),
	(96,1,'4613aca0aa6148c556eb3241d00733c0','2 weeks',1,'2013-04-15 20:52:24','2013-04-29 20:52:24'),
	(95,0,'2369005bb2ad8cffcece68671ac93edd','2 weeks',0,'2013-04-15 15:18:54','2013-04-29 15:18:54'),
	(94,1,'a4b02e0c2d56b1800a5d5912a09d7cfd','2 weeks',1,'2013-04-15 14:48:18','2013-04-29 14:48:18'),
	(93,1,'a86f33b606f6413c2852e1efbbbbf6ed','2 weeks',1,'2013-04-15 10:43:12','2013-04-29 10:43:12'),
	(92,1,'545872749ac3616ebf5fc474a40d3c7f','2 weeks',1,'2013-04-14 22:37:38','2013-04-28 22:37:38'),
	(91,0,'a38dc84c7014afd4206a3c2d43b93657','2 weeks',0,'2013-04-14 20:11:40','2013-04-28 20:11:40'),
	(90,0,'6026e8b980f9e7653455288bebddabe3','2 weeks',0,'2013-04-14 20:11:40','2013-04-28 20:11:40'),
	(89,1,'c4eaa3caa06a960d6b7e5940b1b1435e','2 weeks',1,'2013-04-14 18:12:20','2013-04-28 18:12:20'),
	(88,1,'592c57509a0368ceb09a1935d0ef0c8b','2 weeks',1,'2013-04-14 10:57:26','2013-04-28 10:57:26'),
	(87,1,'2eed92df5a2db179f21c5fd4d1b87acf','2 weeks',1,'2013-04-14 01:01:13','2013-04-28 01:01:13'),
	(86,1,'e80ff7fa9f934c66ee0feee5117390a4','2 weeks',1,'2013-04-13 21:01:13','2013-04-27 21:01:13'),
	(85,1,'098bb3e3f6586f9d23c7aca721be5026','2 weeks',1,'2013-04-12 13:40:25','2013-04-26 13:40:25'),
	(84,0,'afe31e274a769368cc7ebd5b8e536ff3','2 weeks',0,'2013-04-12 13:35:58','2013-04-26 13:35:58'),
	(83,1,'4fd4e49cf10e8fc3e13b768959aa7ae1','2 weeks',1,'2013-04-12 10:19:14','2013-04-26 10:19:14'),
	(82,1,'6d5f36dc912557818a1c4011222cc82b','2 weeks',1,'2013-04-12 09:39:53','2013-04-26 09:39:53'),
	(81,0,'ff819ace9603ddc7ee1bf68e085b3414','2 weeks',0,'2013-04-11 21:33:20','2013-04-25 21:33:20'),
	(28,0,'dba5b9b110f393ba381f094d9b16ba92','2 weeks',0,'2013-03-24 22:28:46','2013-04-07 22:28:46'),
	(80,1,'61ce7b57d2c548d90888655de052070a','2 weeks',1,'2013-04-11 20:49:29','2013-04-25 20:49:29'),
	(79,1,'59a8eb6ad4b9be5ccc7176e063ffbaa0','2 weeks',1,'2013-04-11 16:43:19','2013-04-25 16:43:19'),
	(78,1,'682598a70f6af880b185d00009aee87d','2 weeks',1,'2013-04-11 12:37:59','2013-04-25 12:37:59'),
	(32,0,'545a063f3f28ebda0992e7e853612f9d','2 weeks',0,'2013-03-25 19:47:21','2013-04-08 19:47:21'),
	(77,1,'1c9f41afcb6880e3352d7e7079c50e23','2 weeks',1,'2013-04-10 18:19:25','2013-04-24 18:19:25'),
	(76,1,'d702c0a8b7d640eb20245f1fe93b9f14','2 weeks',1,'2013-04-10 17:43:45','2013-04-24 17:43:45'),
	(75,1,'dea84a680837b20a8bbb8a494f8702d4','2 weeks',0,'2013-04-10 17:05:44','2013-04-24 17:05:44'),
	(74,1,'652b431840c31e43a35339e2ded54d8f','2 weeks',1,'2013-04-10 15:53:56','2013-04-24 15:53:56'),
	(73,1,'ad4af51eeafab5b4d82acee186d7a7a3','2 weeks',1,'2013-04-10 14:19:09','2013-04-24 14:19:09'),
	(72,1,'5fe9b2dc7cd1c32dc094bb7ff14ca04c','2 weeks',1,'2013-04-10 11:49:51','2013-04-24 11:49:51'),
	(71,1,'127633e795680ba8ddea035daa2f133f','2 weeks',1,'2013-04-10 10:28:41','2013-04-24 10:28:41'),
	(70,0,'21252aeee25aae5623f5209bff40b903','2 weeks',0,'2013-04-09 21:21:40','2013-04-23 21:21:40'),
	(69,0,'85414b0c42f0b53be38b8f3a3f251166','2 weeks',0,'2013-04-09 21:21:40','2013-04-23 21:21:40'),
	(68,1,'3598e6d82fbefefb1da44d87bdfdacdc','2 weeks',1,'2013-04-09 21:15:24','2013-04-23 21:15:24'),
	(67,0,'4c0f79e78d1e97e464d727fac1c56c6d','2 weeks',0,'2013-04-09 14:40:02','2013-04-23 14:40:02'),
	(66,1,'d787eb4ed8095b18781d6e49054b134c','2 weeks',1,'2013-04-09 14:20:15','2013-04-23 14:20:15'),
	(65,1,'fb94dee51f5c352a57d90b99e53531df','2 weeks',1,'2013-04-09 10:21:29','2013-04-23 10:21:29'),
	(46,0,'2312d724eb6560f2b9730973acc30beb','2 weeks',0,'2013-04-04 22:16:40','2013-04-18 22:16:40'),
	(47,0,'e74abac12789f2cd6b30a61891b79e66','2 weeks',0,'2013-04-04 22:16:40','2013-04-18 22:16:40'),
	(64,1,'605ebc1ee58c883ef7a6eb77f0bfa46a','2 weeks',1,'2013-04-09 10:20:08','2013-04-23 10:20:08'),
	(63,1,'1e2d3c522960cdaab80fc03d08aeddac','2 weeks',1,'2013-04-08 20:36:53','2013-04-22 20:36:53'),
	(62,1,'3bcd1f33ac6902869518c1cf6e719917','2 weeks',1,'2013-04-08 16:29:50','2013-04-22 16:29:50'),
	(61,1,'311a86998442c49b0a51a8d6e3513fef','2 weeks',1,'2013-04-08 14:21:19','2013-04-22 14:21:19'),
	(52,7,'093763684ce2cb5d8511e881f9d68370','2 weeks',0,'2013-04-07 01:00:42','2013-04-21 01:00:42'),
	(53,7,'683b655cfc7e11adc00b681afc136452','2 weeks',0,'2013-04-07 01:03:47','2013-04-21 01:03:47'),
	(60,1,'5b418363a2a39dfd7a1bc1a3addf3f89','2 weeks',1,'2013-04-08 11:49:33','2013-04-22 11:49:33'),
	(55,7,'f09c12e7e3956af76f4999a6714f76a5','2 weeks',0,'2013-04-07 16:52:50','2013-04-21 16:52:50'),
	(56,7,'ca58200481b642dc465ca0f8c018af3d','2 weeks',0,'2013-04-07 16:53:23','2013-04-21 16:53:23'),
	(57,7,'a374a1ebf82be900b946b6bb551553ef','2 weeks',0,'2013-04-07 17:14:07','2013-04-21 17:14:07'),
	(59,1,'353e606fa9b94eaada868357b610f63f','2 weeks',1,'2013-04-08 10:10:19','2013-04-22 10:10:19'),
	(107,1,'a7c5fbf0c9527dcfe2425fff6666bbce','2 weeks',1,'2013-04-17 15:17:12','2013-05-01 15:17:12'),
	(108,1,'133d8e0a3f7dcf4c2ef0eed0730edc1c','2 weeks',1,'2013-04-17 21:18:11','2013-05-01 21:18:11'),
	(109,1,'90a64f64f5ce1ca746d40693565b8bdd','2 weeks',1,'2013-04-18 10:33:08','2013-05-02 10:33:08'),
	(110,1,'312afa2522a375b07d48d0bfb8236b16','2 weeks',1,'2013-04-18 14:33:46','2013-05-02 14:33:46'),
	(111,1,'e3fc78d4007bfcc9f85a7bf2a7bdca9c','2 weeks',1,'2013-04-18 21:49:26','2013-05-02 21:49:26'),
	(112,1,'58dfa78a3cb432024c127a9883e2dc35','2 weeks',1,'2013-04-19 10:30:05','2013-05-03 10:30:05'),
	(113,1,'9cac57b9afbc9a2bec3b85b3d89cbb9d','2 weeks',1,'2013-04-19 14:31:15','2013-05-03 14:31:15'),
	(114,1,'0c7bc3fbf32e0a31770e119318688e85','2 weeks',1,'2013-04-19 22:32:30','2013-05-03 22:32:30'),
	(115,0,'5b1ca000fb8fd90cb3c78d9b49ff6708','2 weeks',0,'2013-04-19 23:46:02','2013-05-03 23:46:02'),
	(116,1,'4326326f8f925a9f0bc3e7c84a2b5a41','2 weeks',1,'2013-04-20 18:39:36','2013-05-04 18:39:36'),
	(117,1,'c9fa5039898b99bed8a5cc306f02e721','2 weeks',1,'2013-04-20 22:39:24','2013-05-04 22:39:24'),
	(118,1,'050b6967ddd30d66a88f3fa19bbb4a84','2 weeks',1,'2013-04-21 14:27:46','2013-05-05 14:27:46'),
	(119,0,'1745078789638c0c9ee121483ae60513','2 weeks',0,'2013-04-21 16:37:40','2013-05-05 16:37:40'),
	(120,1,'f66705de14edd97237acc5772b4ea2a3','2 weeks',1,'2013-04-21 19:18:13','2013-05-05 19:18:13'),
	(121,0,'6eb6ff92d16b06ef5620a881516fd05b','2 weeks',0,'2013-04-21 23:04:13','2013-05-05 23:04:13'),
	(122,1,'f76169c64f3cdd1d71c343d5eac46dc8','2 weeks',0,'2013-04-22 11:53:49','2013-05-06 11:53:49'),
	(123,1,'a511daf42e512ce2e53dac18d3bba1ef','2 weeks',1,'2013-04-22 21:41:53','2013-05-06 21:41:53'),
	(124,1,'d355404a3c58ca3d45af7724bab69b91','2 weeks',1,'2013-04-23 10:24:07','2013-05-07 10:24:07'),
	(125,1,'ff7278bc4f5f9396bdc953a6b90135e4','2 weeks',1,'2013-04-23 14:29:06','2013-05-07 14:29:06'),
	(126,1,'388dac8a55a1de225acfa6b407af7e40','2 weeks',1,'2013-04-23 21:29:19','2013-05-07 21:29:19'),
	(127,1,'1c2f6ef73e8fd729f3889af4f60e1e4f','2 weeks',1,'2013-04-24 07:38:02','2013-05-08 07:38:02'),
	(128,1,'e2338b998d1f3a17e8e6a0e03f26cf9d','2 weeks',1,'2013-04-24 11:46:04','2013-05-08 11:46:04'),
	(129,1,'043cf5a9150558d653b10d0a1f078b55','2 weeks',1,'2013-04-24 15:47:02','2013-05-08 15:47:02'),
	(130,1,'354068b0c22e40979f6a85005aa697e1','2 weeks',1,'2013-04-24 21:53:26','2013-05-08 21:53:26'),
	(131,1,'a9ae7258d931e2118c0298cc6a612c2f','2 weeks',1,'2013-04-25 10:38:44','2013-05-09 10:38:44'),
	(132,1,'8a938e09a2f92473d285c0784812be29','2 weeks',1,'2013-04-25 15:09:04','2013-05-09 15:09:04'),
	(133,0,'1089584a5e14e45fb9003a4f44645aa2','2 weeks',0,'2013-04-25 18:17:01','2013-05-09 18:17:01'),
	(134,1,'f3d1728a9ac717ed7aeff6fb6ab46500','2 weeks',1,'2013-04-25 19:14:51','2013-05-09 19:14:51'),
	(135,0,'4342e93cc3e2a17b0bc3eeb44b688e0f','2 weeks',0,'2013-04-25 19:46:18','2013-05-09 19:46:18'),
	(136,1,'115a725d248f3225d8539d3912800c91','2 weeks',1,'2013-04-25 23:18:52','2013-05-09 23:18:52'),
	(137,1,'fe0c2a47bae1fb09109b16f5c66a506f','2 weeks',1,'2013-04-26 10:01:37','2013-05-10 10:01:37'),
	(138,1,'8bc2601fe5009cc9281bd6c5d8deab5e','2 weeks',1,'2013-04-26 14:02:11','2013-05-10 14:02:11'),
	(139,0,'9758e6e8f2b0e66388ae2c22e6e94fba','2 weeks',0,'2013-04-26 15:22:28','2013-05-10 15:22:28'),
	(140,1,'835b5788ac85af3fd6b1203df77522ec','2 weeks',1,'2013-04-27 19:35:37','2013-05-11 19:35:37'),
	(141,1,'c20a61dc8b8e86b0bc068b3b611a31dd','2 weeks',1,'2013-04-28 00:34:00','2013-05-12 00:34:00'),
	(142,1,'0b76087c83afe740eb8b2b6402512b31','2 weeks',1,'2013-04-28 13:29:16','2013-05-12 13:29:16'),
	(143,1,'9568c4001bf090b11ae3601ebcc0ea11','2 weeks',1,'2013-04-29 00:14:11','2013-05-13 00:14:11'),
	(144,1,'dc5cb9a3cfcf94e024ced80a6320424b','2 weeks',1,'2013-04-29 10:20:12','2013-05-13 10:20:12'),
	(145,1,'e7c3a15a3ae46f9657058bdf658ff785','2 weeks',1,'2013-04-29 14:20:37','2013-05-13 14:20:37'),
	(146,1,'685b4e344fe82e2c0262359d4d655e55','2 weeks',1,'2013-04-29 23:00:30','2013-05-13 23:00:30'),
	(147,1,'eb9c939179978c7f543480e01e6612b2','2 weeks',1,'2013-04-30 10:18:48','2013-05-14 10:18:48'),
	(148,1,'befa21540d98404c0a860ef2a3e13515','2 weeks',1,'2013-04-30 11:05:31','2013-05-14 11:05:31'),
	(149,1,'a261d43326c93d9b972c712d9dcb42f6','2 weeks',1,'2013-04-30 14:22:16','2013-05-14 14:22:16'),
	(150,1,'77a9a02cb0ce7ec5ca09334f8522c372','2 weeks',1,'2013-04-30 17:31:28','2013-05-14 17:31:28'),
	(151,1,'47fe9d777932680b9d9d292ee96ba867','2 weeks',1,'2013-04-30 23:00:54','2013-05-14 23:00:54'),
	(152,1,'7db6cb9b2f28772aefdc48831c2b9a0b','2 weeks',1,'2013-05-01 10:13:24','2013-05-15 10:13:24'),
	(153,1,'1b1ca0dddae87e0b770bd3f243b0b742','2 weeks',1,'2013-05-01 14:14:23','2013-05-15 14:14:23'),
	(154,0,'a81f6eb95b31a0c6d0d9c7bf83e7b3e5','2 weeks',0,'2013-05-01 17:56:29','2013-05-15 17:56:29'),
	(155,1,'8dc5d64c1c7bea9ffe0b69b809be0cdf','2 weeks',1,'2013-05-01 22:31:53','2013-05-15 22:31:53'),
	(156,1,'e1474662c7f37a86887fde16e36ecaa3','2 weeks',1,'2013-05-02 12:12:19','2013-05-16 12:12:19'),
	(157,1,'32f3e16f92c62d25502bd09122939636','2 weeks',1,'2013-05-02 16:22:06','2013-05-16 16:22:06'),
	(158,1,'6082498da55eb6e7cbf5c64c7a6d107a','2 weeks',1,'2013-05-02 22:55:57','2013-05-16 22:55:57'),
	(159,1,'79b990227976ba784e3af73efc8f75c5','2 weeks',1,'2013-05-03 10:03:55','2013-05-17 10:03:55'),
	(160,1,'38cebf7a41d6e59f704b10d7bf0cc8c1','2 weeks',1,'2013-05-03 10:06:52','2013-05-17 10:06:52'),
	(161,1,'1646f0e87bbc7c1aacbb07cd259f06e6','2 weeks',1,'2013-05-03 15:14:09','2013-05-17 15:14:09'),
	(162,1,'3c93e70a4053fd5692e3301b66463075','2 weeks',1,'2013-05-03 15:25:36','2013-05-17 15:25:36'),
	(163,1,'c88757a649be6f42073e1078d9e7a358','2 weeks',1,'2013-05-03 23:53:44','2013-05-17 23:53:44'),
	(164,1,'e7809fab5bc9a4d5b690c2c83b85fd66','2 weeks',1,'2013-05-04 19:37:14','2013-05-18 19:37:14'),
	(165,1,'41b4b88f4cda8b7ad8d8ade7f81685d1','2 weeks',1,'2013-05-04 23:37:43','2013-05-18 23:37:43'),
	(166,0,'1b427fdde61d8ae8d49f8a0505d01677','2 weeks',0,'2013-05-05 00:55:28','2013-05-19 00:55:28'),
	(167,1,'b1b47cb4430117c2ebf9e4369b200327','2 weeks',0,'2013-05-05 15:47:12','2013-05-19 15:47:12'),
	(168,1,'b7b1d30f2fbd450ba27961182aabff46','2 weeks',1,'2013-05-05 16:10:02','2013-05-19 16:10:02'),
	(169,0,'ef1d440b4e72730ffdc78ca4cf9cbc11','2 weeks',0,'2013-05-05 16:15:34','2013-05-19 16:15:34'),
	(170,1,'02e08522e317fbe8c10c8c66f8d670c5','2 weeks',1,'2013-05-05 19:00:13','2013-05-19 19:00:13'),
	(171,1,'3d9d2c56ebc53a0ca5cb9e6460df33d9','2 weeks',1,'2013-05-05 19:47:03','2013-05-19 19:47:03'),
	(172,1,'0d3ae2dde175c331b4d21290ef4cb26c','2 weeks',1,'2013-05-06 11:26:28','2013-05-20 11:26:28'),
	(173,1,'1abbd71b9ecae8a84628d5be5aeab06f','2 weeks',1,'2013-05-06 15:46:19','2013-05-20 15:46:19'),
	(174,1,'de3fc71337a5f52440e3e4689d5dc27d','2 weeks',0,'2013-05-07 11:37:41','2013-05-21 11:37:41'),
	(175,1,'6fae95f7fdaff1183d0dfff0be658ca4','2 weeks',1,'2013-05-08 16:07:35','2013-05-22 16:07:35'),
	(176,1,'1ebe89664dc2dd96de4cd9a0d3d474bc','2 weeks',1,'2013-05-08 20:13:45','2013-05-22 20:13:45'),
	(177,1,'eeb4062aeff6dbd216cb802594e7d1d3','2 weeks',1,'2013-05-09 10:42:09','2013-05-23 10:42:09'),
	(178,1,'be8067b9fdb08cb41073674dc3c4b6bf','2 weeks',1,'2013-05-09 15:12:22','2013-05-23 15:12:22'),
	(179,0,'9651bd0c20211f550918e5493b8c37c0','2 weeks',0,'2013-05-09 16:06:24','2013-05-23 16:06:24'),
	(180,1,'073c0bf46d7101446836f8c2e77e5203','2 weeks',1,'2013-05-09 22:10:53','2013-05-23 22:10:53'),
	(181,1,'9a20a028eebc5f3fed67442fb51ced77','2 weeks',0,'2013-05-10 08:28:44','2013-05-24 08:28:44'),
	(182,1,'1c49ec268378aaf35ad60a614c2082fe','2 weeks',1,'2013-05-10 08:28:59','2013-05-24 08:28:59'),
	(183,1,'4371763606b045925d7151e2e6c90f94','2 weeks',0,'2013-05-10 23:43:13','2013-05-24 23:43:13'),
	(184,1,'07ecf8d1b45f2db025a81979ff5663d2','2 weeks',1,'2013-05-11 00:01:45','2013-05-25 00:01:45'),
	(185,1,'619b58bf7a955648ca621e88267bdc45','2 weeks',0,'2013-05-11 16:50:57','2013-05-25 16:50:57'),
	(186,1,'489785ae12214bfc3f692c8d077f44fd','2 weeks',1,'2013-05-11 16:55:53','2013-05-25 16:55:53'),
	(187,1,'d68b40bb237c4b3b71e16b55b0367053','2 weeks',1,'2013-05-12 00:22:24','2013-05-26 00:22:24'),
	(188,0,'c53b8865261532f86b3b55c0635cb77f','2 weeks',0,'2013-05-12 00:37:30','2013-05-26 00:37:30'),
	(189,1,'d03c7adfde8e744444bfced73d90a7bb','2 weeks',1,'2013-05-12 10:51:19','2013-05-26 10:51:19'),
	(190,1,'8ab1956b477d406aa6648ffb8b7724f4','2 weeks',1,'2013-05-12 16:28:45','2013-05-26 16:28:45'),
	(191,1,'690c0706b3ce53f1c2f11a101af0d926','2 weeks',1,'2013-05-12 21:56:27','2013-05-26 21:56:27'),
	(192,1,'91059d440abb2c8d8715b862694d022c','2 weeks',1,'2013-05-13 10:36:19','2013-05-27 10:36:19'),
	(193,1,'1d50f37ee51234c9fc6b628932bf474c','2 weeks',0,'2013-05-13 14:44:36','2013-05-27 14:44:36'),
	(194,1,'2c7bb6e1d3f62b06d7489fd25b9c16e0','2 weeks',1,'2013-05-13 15:24:55','2013-05-27 15:24:55'),
	(195,1,'7c055bc32ac80da667b6d69dc10184fc','2 weeks',1,'2013-05-13 22:52:42','2013-05-27 22:52:42'),
	(196,1,'a0547771b81af01212a4d5373863b5e6','2 weeks',1,'2013-05-14 10:45:02','2013-05-28 10:45:02'),
	(197,0,'a6fde4e478d872285b42a6ae36266964','2 weeks',0,'2013-05-14 12:33:20','2013-05-28 12:33:20'),
	(198,1,'a384665aaff005e6118a21b23d5f9a92','2 weeks',1,'2013-05-14 14:45:52','2013-05-28 14:45:52'),
	(199,1,'fb9ce288f2ca45fe60b83ce85836228d','2 weeks',1,'2013-05-14 15:09:27','2013-05-28 15:09:27'),
	(200,1,'7305350ae3459fc1bc04e9f7a81d90e0','2 weeks',1,'2013-05-14 22:58:17','2013-05-28 22:58:17'),
	(201,1,'0d3f0966950e8542812262ab49d4018f','2 weeks',1,'2013-05-15 19:34:11','2013-05-29 19:34:11'),
	(202,1,'ff651c1ca134fc35dda2efc8228c8507','2 weeks',1,'2013-05-15 23:37:10','2013-05-29 23:37:10'),
	(203,1,'a943605756c77d798884d42efa8d8324','2 weeks',1,'2013-05-16 16:45:19','2013-05-30 16:45:19'),
	(204,1,'2ef4db2d0fb0b92c94b8fcc9a1f0a982','2 weeks',1,'2013-05-16 21:27:57','2013-05-30 21:27:57'),
	(205,1,'4446c57cd5cbb42822975ac3db38c2e3','2 weeks',1,'2013-05-17 15:09:09','2013-05-31 15:09:09'),
	(206,1,'5404a4f7c8f92248dcbee37965e785bc','2 weeks',1,'2013-05-17 19:15:35','2013-05-31 19:15:35'),
	(207,1,'60ad6c7a98cb3b081e026d7cb4251077','2 weeks',1,'2013-05-17 23:58:02','2013-05-31 23:58:02'),
	(208,1,'13543197a4d6a54c36a7559e544a9aec','2 weeks',1,'2013-05-19 01:00:55','2013-06-02 01:00:55'),
	(209,1,'4986e9b1e7c3e00d2312ed49fd9ed8a9','2 weeks',1,'2013-05-19 12:29:20','2013-06-02 12:29:20'),
	(210,1,'61ce2751d8103b3fcd2abb63e219c2c0','2 weeks',1,'2013-05-19 16:30:35','2013-06-02 16:30:35'),
	(211,1,'ddd2db26564f1622a3f19150c0c61417','2 weeks',1,'2013-05-19 22:11:01','2013-06-02 22:11:01'),
	(212,1,'7104b3acc0b11898a7a60628481933aa','2 weeks',1,'2013-05-20 16:59:05','2013-06-03 16:59:05'),
	(213,1,'0c9f7141e2632cc8174e68db8b4335d3','2 weeks',1,'2013-05-20 21:05:15','2013-06-03 21:05:15'),
	(214,1,'1bcb8547e40a5ccbcc06ce30932c5447','2 weeks',1,'2013-05-21 12:20:03','2013-06-04 12:20:03'),
	(215,1,'3d5f694377630b5a6de25b0c0a7818bd','2 weeks',1,'2013-05-21 17:23:59','2013-06-04 17:23:59'),
	(216,1,'8f96b2d007961992970e6491eee781f3','2 weeks',1,'2013-05-21 23:25:27','2013-06-04 23:25:27'),
	(217,1,'5836acd777c5a2062109b2fd42939f08','2 weeks',1,'2013-05-22 14:45:26','2013-06-05 14:45:26'),
	(218,1,'d61fcc9f3f50676123c51d005ee2bf4b','2 weeks',1,'2013-05-22 21:09:17','2013-06-05 21:09:17'),
	(219,1,'521631e08a5a0bddea1499cb78bf367b','2 weeks',1,'2013-05-22 21:21:12','2013-06-05 21:21:12'),
	(220,1,'d070a1955c361b43b9fea66aa5397c1e','2 weeks',1,'2013-05-23 10:10:47','2013-06-06 10:10:47'),
	(221,1,'3dc8dbe1239b7909d6eea05cb536c7a9','2 weeks',1,'2013-05-23 14:14:36','2013-06-06 14:14:36'),
	(222,1,'71f9b77b27caaed676bcfbca559bbb8c','2 weeks',1,'2013-05-23 16:37:42','2013-06-06 16:37:42'),
	(223,1,'68cb75ae06760058b0178570dd614f5b','2 weeks',1,'2013-05-23 20:10:31','2013-06-06 20:10:31'),
	(224,1,'8ca1fc770e65f731dc93c2a631560919','2 weeks',1,'2013-05-24 09:59:43','2013-06-07 09:59:43'),
	(225,1,'882954bb557ceb074636b2d62adb1efe','2 weeks',1,'2013-05-24 12:23:44','2013-06-07 12:23:44'),
	(226,0,'cadfb9a7ced0d6dc2389fe39e374984b','2 weeks',0,'2013-05-24 13:48:20','2013-06-07 13:48:20'),
	(227,0,'4e97f7756dd280795cf72fcc11dabf47','2 weeks',0,'2013-05-24 13:48:20','2013-06-07 13:48:20'),
	(228,1,'3e4ce68f888bba10f34f0639c481b406','2 weeks',1,'2013-05-24 14:03:54','2013-06-07 14:03:54'),
	(229,1,'91486df35bc82ce60fc7ab63bcb26ce8','2 weeks',1,'2013-05-24 23:24:05','2013-06-07 23:24:05'),
	(230,1,'fea42cdcc6dfee6c03acc3b9aecab9c7','2 weeks',1,'2013-05-25 22:04:47','2013-06-08 22:04:47'),
	(231,1,'3851b34d44d7a6c51c8f5817cbf55f7e','2 weeks',1,'2013-05-26 19:22:55','2013-06-09 19:22:55'),
	(232,1,'2fd9ce345b8ae3a403fce27e5012f56b','2 weeks',1,'2013-05-26 23:25:56','2013-06-09 23:25:56'),
	(233,1,'9cde18cb4ee680cbc15c04c3e5538fcd','2 weeks',0,'2013-05-27 14:25:08','2013-06-10 14:25:08'),
	(234,1,'860894c4b7fec13076f42c43b6888438','2 weeks',0,'2013-05-27 14:25:45','2013-06-10 14:25:45'),
	(235,1,'6e57472b96397a15d015aa1f6b4958ca','2 weeks',0,'2013-05-27 14:26:21','2013-06-10 14:26:21'),
	(236,1,'ba88706befaa4bfc2cc0167243387080','2 weeks',0,'2013-05-27 14:28:05','2013-06-10 14:28:05'),
	(237,1,'8ff43a8f7130989836f16cc372cb6d65','2 weeks',0,'2013-05-27 14:46:41','2013-06-10 14:46:41'),
	(238,1,'d7ba39814ee8e884c9f75a187aec4f68','2 weeks',0,'2013-05-27 15:22:26','2013-06-10 15:22:26'),
	(239,1,'645595a7abcd5fb4693837bf6e18509e','2 weeks',0,'2013-05-27 15:43:00','2013-06-10 15:43:00'),
	(240,1,'ca7521d034292fde83a104116984f459','2 weeks',0,'2013-05-27 15:45:40','2013-06-10 15:45:40'),
	(241,1,'c9c0b25c25fb1b67fe675609cbf3a9b9','2 weeks',1,'2013-05-27 20:08:22','2013-06-10 20:08:22'),
	(242,1,'5f2000884ab7c897f5894f75a1adf92e','2 weeks',0,'2013-05-28 10:22:00','2013-06-11 10:22:00'),
	(243,1,'560f91be7240b065326264e4f486fe91','2 weeks',0,'2013-05-28 11:53:32','2013-06-11 11:53:32'),
	(244,1,'e660aa4b6bbf77ce82da805f63e3fe2e','2 weeks',0,'2013-05-28 11:55:36','2013-06-11 11:55:36'),
	(245,1,'2300cb051be75bdeb55ee4f52d13dc68','2 weeks',0,'2013-05-28 12:58:47','2013-06-11 12:58:47'),
	(246,1,'18e402de4526aa11b9f1bfe66903953a','2 weeks',0,'2013-05-28 13:05:59','2013-06-11 13:05:59'),
	(247,1,'e3d62a870d69d9e31e65ae6e3ae040d0','2 weeks',0,'2013-05-28 13:46:52','2013-06-11 13:46:52'),
	(248,1,'42b82c4bcbf822774152a3cf9c2ffe3c','2 weeks',1,'2013-05-28 14:05:27','2013-06-11 14:05:27'),
	(249,1,'6736d3a975ee0e60c477fffaad1da078','2 weeks',1,'2013-05-28 14:24:26','2013-06-11 14:24:26'),
	(250,1,'f7a9cbe2d42aa6a778ac6a2c2ff27242','2 weeks',1,'2013-05-28 16:25:42','2013-06-11 16:25:42'),
	(251,1,'2f8073354db6283d32e71714cc2db145','2 weeks',1,'2013-05-29 10:19:57','2013-06-12 10:19:57'),
	(252,1,'b4da86acb65fafe80a937746361cc939','2 weeks',1,'2013-05-29 14:53:52','2013-06-12 14:53:52'),
	(253,1,'832c04902512c686f16ce9fec3cba314','2 weeks',1,'2013-05-30 10:46:14','2013-06-13 10:46:14'),
	(254,1,'93901d60155409741379a61af6d1159a','2 weeks',0,'2013-05-30 14:54:43','2013-06-13 14:54:43'),
	(255,1,'9b470a0c7b5e05da5ad2cdf75bc92637','2 weeks',0,'2013-05-30 15:19:14','2013-06-13 15:19:14');

/*!40000 ALTER TABLE `login_tokens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_ad_desktop_initial_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_desktop_initial_contents`;

CREATE TABLE `origin_ad_desktop_initial_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `type` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `origin_ad_desktop_initial_contents` WRITE;
/*!40000 ALTER TABLE `origin_ad_desktop_initial_contents` DISABLE KEYS */;

INSERT INTO `origin_ad_desktop_initial_contents` (`id`, `origin_ad_schedule_id`, `content`, `config`, `render`, `type`, `order`)
VALUES
	(32,1,'{\"title\":\"Background\",\"type\":\"background\",\"upload\":\"\\/assets\\/creator\\/1\\/initial-2.jpg\",\"image\":\"\\/assets\\/creator\\/1\\/initial-2.jpg\"}','{\"height\":\"66px\",\"left\":\"0\",\"top\":\"0px\",\"width\":\"1500px\"}','<img src=\"/assets/creator/1/initial-2.jpg\" class=\"adContent-item background\"/>','background',0),
	(36,1,'{\"title\":\"Toggle\",\"type\":\"toggle\",\"event\":false}','{\"top\":\"6px\",\"left\":\"1037px\",\"width\":\"170px\",\"height\":\"60px\"}','<a href=\"javascript:void(0)\" class=\"cta toggle\" toggle=\"click\"></a>','toggle',2),
	(42,14,'{\"title\":\"Background\",\"type\":\"background\",\"upload\":\"\\/assets\\/creator\\/15\\/rememberme.jpg\",\"image\":\"\\/assets\\/creator\\/15\\/_initial.jpg\",\"bgUpload\":\"\\/assets\\/creator\\/15\\/_initial.jpg\"}','{\"height\":\"100%\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"100%\"}','<img src=\"/assets/creator/15/_initial.jpg\" class=\"background\"/>','background',1),
	(44,13,'{\"title\":\"Background\",\"type\":\"background\",\"upload\":\"\\/assets\\/creator\\/14\\/ac4.jpg\",\"image\":\"\\/assets\\/creator\\/14\\/_initial.jpg\",\"bgUpload\":\"\\/assets\\/creator\\/14\\/_initial.jpg\"}','{\"height\":\"100%\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"100%\"}','<img src=\"/assets/creator/14/_initial.jpg\" class=\"background\"/>','background',1),
	(58,15,'{\"title\":\"Toggle\",\"type\":\"toggle\",\"event\":true}','{\"top\":\"0px\",\"left\":\"0px\",\"width\":\"300px\",\"height\":\"249px\"}','<a href=\"javascript:void(0)\" class=\"cta toggle\" toggle=\"click\"></a>','toggle',1),
	(60,15,'{\"title\":\"Background\",\"type\":\"background\",\"image\":\"\\/assets\\/creator\\/16\\/_initial.jpg\",\"iframe\":true,\"autoplay\":true,\"automute\":true,\"autoclose\":true,\"bgUpload\":\"\\/assets\\/creator\\/16\\/_initial.jpg\"}','{\"height\":\"100%\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"100%\"}','<img src=\"/assets/creator/16/_initial.jpg\" class=\"background\"/>','background',0),
	(64,0,NULL,'{\"height\":\"169px\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"370px\"}',NULL,'springboard',2),
	(65,17,'{\"title\":\"Background\",\"type\":\"background\",\"bgUpload\":\"\\/assets\\/creator\\/20\\/_initial.jpg\",\"image\":\"\\/assets\\/creator\\/20\\/_initial.jpg\"}','{\"height\":\"100%\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"100%\"}','<img src=\"/assets/creator/20/_initial.jpg\" class=\"background\"/>','background',1),
	(66,17,'{\"title\":\"Toggle\",\"type\":\"toggle\",\"event\":true}','{\"top\":\"0px\",\"left\":\"0px\",\"width\":\"725px\",\"height\":\"88px\"}','<a href=\"javascript:void(0)\" class=\"cta toggle\" toggle=\"click\"></a>','toggle',2),
	(67,27,'{\"title\":\"Background\",\"type\":\"background\",\"bgUpload\":\"\\/assets\\/creator\\/30\\/_initial.jpg\",\"image\":\"\\/assets\\/creator\\/30\\/_initial.jpg\"}','{\"height\":\"100%\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"100%\"}','<img src=\"/assets/creator/30/_initial.jpg\" class=\"background\"/>','background',1),
	(68,27,'{\"title\":\"Toggle\",\"type\":\"toggle\",\"event\":true}','{\"top\":\"4px\",\"left\":\"10px\",\"width\":\"950px\",\"height\":\"57px\"}','<a href=\"javascript:void(0)\" class=\"cta toggle\" toggle=\"click\"></a>','toggle',2),
	(69,13,'{\"title\":\"Springboard\",\"type\":\"springboard\",\"iframe\":true,\"autoplay\":true,\"automute\":true,\"autoclose\":true,\"videoId\":\"732705\",\"preview\":\"<iframe id=\\\"evor006_732705\\\" src=\\\"http:\\/\\/cms.springboardplatform.com\\/embed_iframe\\/1307\\/video\\/732705\\/evor006\\/evolve-origin\\/10\\\" width=\\\"274\\\" height=\\\"154\\\" frameborder=\\\"0\\\" scrolling=\\\"no\\\"><\\/iframe>\",\"embed\":\"<script language=\\\"javascript\\\" type=\\\"text\\/javascript\\\" src=\\\"http:\\/\\/www.springboardplatform.com\\/jsapi\\/embed\\\"><\\/script><div class=\\\"videoPlayer\\\" id=\\\"evor001_732705\\\"><\\/div><script type=\\\"text\\/javascript\\\">$sb(\\\"evor001_732705\\\",{\\\"sbFeed\\\":{\\\"partnerId\\\":1307,\\\"type\\\":\\\"video\\\",\\\"contentId\\\":732705,\\\"cname\\\":\\\"evolve-origin\\\"},\\\"style\\\":{\\\"width\\\":\\\"620px\\\",\\\"height\\\":\\\"349px\\\"}});<\\/script><script type=\\\"text\\/javascript\\\">iframe.springboard(\\\"evor001_732705\\\", {\\\"autoplay\\\":true,\\\"automute\\\":true,\\\"autoclose\\\":true,\\\"muteplayer\\\":undefined,\\\"unmutehover\\\":undefined,\\\"unmuterestart\\\":undefined})<\\/script><script type=\\\"text\\/javascript\\\" src=\\\"http:\\/\\/s0.2mdn.net\\/instream\\/html5\\/ima3.js\\\"><\\/script>\"}','{\"top\":\"95px\",\"left\":\"118px\",\"width\":\"622px\",\"height\":\"325px\"}','<iframe class=\"embed\" src=\"http://local.evolveorigin/adIframe/OriginAdDesktopInitialContent/69\" frameborder=\"0\" scrolling=\"no\" collapseIframe></iframe>','springboard',2);

/*!40000 ALTER TABLE `origin_ad_desktop_initial_contents` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_ad_desktop_triggered_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_desktop_triggered_contents`;

CREATE TABLE `origin_ad_desktop_triggered_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `type` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `origin_ad_desktop_triggered_contents` WRITE;
/*!40000 ALTER TABLE `origin_ad_desktop_triggered_contents` DISABLE KEYS */;

INSERT INTO `origin_ad_desktop_triggered_contents` (`id`, `origin_ad_schedule_id`, `content`, `config`, `render`, `type`, `order`)
VALUES
	(19,1,'{\"title\":\"Background\",\"type\":\"background\",\"image\":\"\\/assets\\/creator\\/1\\/triggered.jpg\",\"upload\":\"\\/assets\\/creator\\/1\\/triggered.jpg\"}','{\"height\":\"415px\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"1500px\"}','<img src=\"/assets/creator/1/triggered.jpg\" class=\"adContent-item background\"/>','background',0),
	(20,1,'{\"title\":\"Toggle\",\"type\":\"toggle\",\"event\":true}','{\"top\":\"21px\",\"left\":\"291px\",\"width\":\"91px\",\"height\":\"46px\"}','<a href=\"javascript:void(0)\" class=\"cta toggle\" toggle=\"click\"></a>','toggle',1),
	(22,15,'{\"title\":\"Background\",\"type\":\"background\",\"upload\":\"\\/assets\\/creator\\/16\\/triggered-915x515.jpg\",\"image\":\"\\/assets\\/creator\\/16\\/_triggered.jpg\",\"bgUpload\":\"\\/assets\\/creator\\/16\\/_triggered.jpg\"}','{\"height\":\"100%\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"100%\"}','<img src=\"/assets/creator/16/_triggered.jpg\" class=\"background\"/>','background',0),
	(23,15,'{\"title\":\"Toggle\",\"type\":\"toggle\",\"event\":false}','{\"top\":\"0px\",\"left\":\"0px\",\"width\":\"50px\",\"height\":\"48px\"}','<a href=\"javascript:void(0)\" class=\"cta toggle\" toggle=\"click\"></a>','toggle',2),
	(29,17,'{\"title\":\"Background\",\"type\":\"background\",\"bgUpload\":\"\\/assets\\/creator\\/20\\/_triggered.jpg\",\"image\":\"\\/assets\\/creator\\/20\\/_triggered.jpg\"}','{\"height\":\"100%\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"100%\"}','<img src=\"/assets/creator/20/_triggered.jpg\" class=\"background\"/>','background',1),
	(30,17,'{\"title\":\"Toggle\",\"type\":\"toggle\",\"event\":true}','{\"top\":\"0px\",\"left\":\"0px\",\"width\":\"49px\",\"height\":\"49px\"}','<a href=\"javascript:void(0)\" class=\"cta toggle\" toggle=\"click\"></a>','toggle',2),
	(31,27,'{\"title\":\"Background\",\"type\":\"background\",\"bgUpload\":\"\\/assets\\/creator\\/30\\/_triggered.jpg\",\"image\":\"\\/assets\\/creator\\/30\\/_triggered.jpg\"}','{\"height\":\"100%\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"100%\"}','<img src=\"/assets/creator/30/_triggered.jpg\" class=\"background\"/>','background',1),
	(32,27,'{\"title\":\"Toggle\",\"type\":\"toggle\",\"event\":true}','{\"top\":\"0px\",\"left\":\"0px\",\"width\":\"41px\",\"height\":\"42px\"}','<a href=\"javascript:void(0)\" class=\"cta toggle\" toggle=\"click\"></a>','toggle',2),
	(33,27,'{\"title\":\"Springboard\",\"type\":\"springboard\",\"iframe\":true,\"autoplay\":true,\"automute\":true,\"autoclose\":true,\"videoId\":\"732621\",\"preview\":\"<iframe id=\\\"evor006_732621\\\" src=\\\"http:\\/\\/cms.springboardplatform.com\\/embed_iframe\\/1307\\/video\\/732621\\/evor006\\/evolve-origin\\/10\\\" width=\\\"274\\\" height=\\\"154\\\" frameborder=\\\"0\\\" scrolling=\\\"no\\\"><\\/iframe>\",\"embed\":\"<script language=\\\"javascript\\\" type=\\\"text\\/javascript\\\" src=\\\"http:\\/\\/www.springboardplatform.com\\/jsapi\\/embed\\\"><\\/script><div class=\\\"videoPlayer\\\" id=\\\"evor001_732621\\\"><\\/div><script type=\\\"text\\/javascript\\\">$sb(\\\"evor001_732621\\\",{\\\"sbFeed\\\":{\\\"partnerId\\\":1307,\\\"type\\\":\\\"video\\\",\\\"contentId\\\":732621,\\\"cname\\\":\\\"evolve-origin\\\"},\\\"style\\\":{\\\"width\\\":\\\"511px\\\",\\\"height\\\":\\\"299px\\\"}});<\\/script><script type=\\\"text\\/javascript\\\">iframe.springboard(\\\"evor001_732621\\\", {\\\"autoplay\\\":true,\\\"automute\\\":true,\\\"autoclose\\\":true,\\\"muteplayer\\\":undefined,\\\"unmutehover\\\":undefined,\\\"unmuterestart\\\":undefined})<\\/script><script type=\\\"text\\/javascript\\\" src=\\\"http:\\/\\/s0.2mdn.net\\/instream\\/html5\\/ima3.js\\\"><\\/script>\"}','{\"top\":\"96px\",\"left\":\"255px\",\"width\":\"511px\",\"height\":\"299px\"}','<iframe class=\"embed\" src=\"http://local.evolveorigin/adIframe/OriginAdDesktopTriggeredContent/33\" frameborder=\"0\" scrolling=\"no\" collapseIframe></iframe>','springboard',3),
	(34,17,'{\"title\":\"Springboard\",\"type\":\"springboard\",\"iframe\":true,\"autoplay\":true,\"automute\":true,\"autoclose\":true,\"videoId\":\"732699\",\"preview\":\"<iframe id=\\\"evor006_732699\\\" src=\\\"http:\\/\\/cms.springboardplatform.com\\/embed_iframe\\/1307\\/video\\/732699\\/evor006\\/evolve-origin\\/10\\\" width=\\\"274\\\" height=\\\"154\\\" frameborder=\\\"0\\\" scrolling=\\\"no\\\"><\\/iframe>\",\"embed\":\"<script language=\\\"javascript\\\" type=\\\"text\\/javascript\\\" src=\\\"http:\\/\\/www.springboardplatform.com\\/jsapi\\/embed\\\"><\\/script><div class=\\\"videoPlayer\\\" id=\\\"evor001_732699\\\"><\\/div><script type=\\\"text\\/javascript\\\">$sb(\\\"evor001_732699\\\",{\\\"sbFeed\\\":{\\\"partnerId\\\":1307,\\\"type\\\":\\\"video\\\",\\\"contentId\\\":732699,\\\"cname\\\":\\\"evolve-origin\\\"},\\\"style\\\":{\\\"width\\\":\\\"620px\\\",\\\"height\\\":\\\"349px\\\"}});<\\/script><script type=\\\"text\\/javascript\\\">iframe.springboard(\\\"evor001_732699\\\", {\\\"autoplay\\\":true,\\\"automute\\\":true,\\\"autoclose\\\":true,\\\"muteplayer\\\":undefined,\\\"unmutehover\\\":undefined,\\\"unmuterestart\\\":undefined})<\\/script><script type=\\\"text\\/javascript\\\" src=\\\"http:\\/\\/s0.2mdn.net\\/instream\\/html5\\/ima3.js\\\"><\\/script>\"}','{\"top\":\"66px\",\"left\":\"167px\",\"width\":\"620px\",\"height\":\"364px\"}','<iframe class=\"embed\" src=\"http://local.evolveorigin/adIframe/OriginAdDesktopTriggeredContent/34\" frameborder=\"0\" scrolling=\"no\" collapseIframe></iframe>','springboard',3),
	(35,15,'{\"title\":\"Springboard\",\"type\":\"springboard\",\"iframe\":true,\"autoplay\":true,\"automute\":true,\"autoclose\":true,\"videoId\":\"732703\",\"preview\":\"<iframe id=\\\"evor006_732703\\\" src=\\\"http:\\/\\/cms.springboardplatform.com\\/embed_iframe\\/1307\\/video\\/732703\\/evor006\\/evolve-origin\\/10\\\" width=\\\"274\\\" height=\\\"154\\\" frameborder=\\\"0\\\" scrolling=\\\"no\\\"><\\/iframe>\",\"embed\":\"<script language=\\\"javascript\\\" type=\\\"text\\/javascript\\\" src=\\\"http:\\/\\/www.springboardplatform.com\\/jsapi\\/embed\\\"><\\/script><div class=\\\"videoPlayer\\\" id=\\\"evor001_732703\\\"><\\/div><script type=\\\"text\\/javascript\\\">$sb(\\\"evor001_732703\\\",{\\\"sbFeed\\\":{\\\"partnerId\\\":1307,\\\"type\\\":\\\"video\\\",\\\"contentId\\\":732703,\\\"cname\\\":\\\"evolve-origin\\\"},\\\"style\\\":{\\\"width\\\":\\\"620px\\\",\\\"height\\\":\\\"349px\\\"}});<\\/script><script type=\\\"text\\/javascript\\\">iframe.springboard(\\\"evor001_732703\\\", {\\\"autoplay\\\":true,\\\"automute\\\":true,\\\"autoclose\\\":true,\\\"muteplayer\\\":undefined,\\\"unmutehover\\\":undefined,\\\"unmuterestart\\\":undefined})<\\/script><script type=\\\"text\\/javascript\\\" src=\\\"http:\\/\\/s0.2mdn.net\\/instream\\/html5\\/ima3.js\\\"><\\/script>\"}','{\"top\":\"117px\",\"left\":\"186px\",\"width\":\"620px\",\"height\":\"349px\"}','<iframe class=\"embed\" src=\"http://local.evolveorigin/adIframe/OriginAdDesktopTriggeredContent/35\" frameborder=\"0\" scrolling=\"no\" collapseIframe></iframe>','springboard',3);

/*!40000 ALTER TABLE `origin_ad_desktop_triggered_contents` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_ad_mobile_initial_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_mobile_initial_contents`;

CREATE TABLE `origin_ad_mobile_initial_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `type` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table origin_ad_mobile_triggered_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_mobile_triggered_contents`;

CREATE TABLE `origin_ad_mobile_triggered_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `type` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table origin_ad_schedules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_schedules`;

CREATE TABLE `origin_ad_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_id` int(11) NOT NULL,
  `config` text,
  `type` varchar(100) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `origin_ad_schedules` WRITE;
/*!40000 ALTER TABLE `origin_ad_schedules` DISABLE KEYS */;

INSERT INTO `origin_ad_schedules` (`id`, `origin_ad_id`, `config`, `type`, `start_date`, `end_date`)
VALUES
	(1,1,NULL,'',NULL,NULL),
	(3,1,'','','2013-01-01','2013-01-31'),
	(13,14,NULL,'',NULL,NULL),
	(14,15,NULL,'',NULL,NULL),
	(15,16,NULL,'',NULL,NULL),
	(17,20,NULL,'',NULL,NULL),
	(27,30,NULL,'',NULL,NULL);

/*!40000 ALTER TABLE `origin_ad_schedules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_ad_tablet_initial_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_tablet_initial_contents`;

CREATE TABLE `origin_ad_tablet_initial_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `type` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table origin_ad_tablet_triggered_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_tablet_triggered_contents`;

CREATE TABLE `origin_ad_tablet_triggered_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `type` varchar(100) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table origin_ads
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ads`;

CREATE TABLE `origin_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `config` text,
  `content` text,
  `create_by` int(11) NOT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '1',
  `showcase` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `origin_ads` WRITE;
/*!40000 ALTER TABLE `origin_ads` DISABLE KEYS */;

INSERT INTO `origin_ads` (`id`, `name`, `config`, `content`, `create_by`, `modify_by`, `create_date`, `modify_date`, `status`, `showcase`)
VALUES
	(1,'Star Trek Into Darkness','{\"type\":\"outofpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"width\":\"1500\",\"height\":\"66\"}},\"Triggered\":{\"Desktop\":{\"width\":\"1500\",\"height\":\"415\"}}},\"animations\":{\"start\":\"0\",\"end\":\"415\",\"selector\":\"initial\",\"openDuration\":\"400\",\"closeDuration\":\"500\"},\"template\":\"horizon\"}','{\"img_thumbnail\":\"\\/assets\\/creator\\/1\\/ad-thumbnail.jpg\"}',1,1,'2013-03-06 22:24:15','2013-05-30 10:47:24',1,0),
	(14,'Last of Us','{\"type\":\"outofpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"width\":\"850\",\"height\":\"500\"}},\"Triggered\":{\"Desktop\":{\"width\":\"0\",\"height\":\"0\"}}},\"template\":\"postmeridian\",\"animations\":{\"closeDuration\":\"15\"}}','{\"img_thumbnail\":\"\\/assets\\/creator\\/14\\/_preview.jpg\",\"ga_id\":\"UA-12310597-73\"}',1,1,'2013-04-26 15:45:53','2013-05-30 15:16:40',1,0),
	(15,'Remember Me','{\"type\":\"outofpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"width\":\"850\",\"height\":\"500\"}},\"Triggered\":{\"Desktop\":{\"width\":\"0\",\"height\":\"0\"}}},\"template\":\"antemeridian\",\"animations\":{\"closeDuration\":\"15\"}}','{\"img_thumbnail\":\"\\/assets\\/creator\\/15\\/_preview.jpg\",\"ga_id\":\"UA-12310597-73\"}',1,1,'2013-04-28 00:58:36','2013-05-29 15:14:15',1,1),
	(16,'Transistor 300x250','{\"type\":\"inpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"width\":\"300\",\"height\":\"250\"}},\"Triggered\":{\"Desktop\":{\"width\":\"950\",\"height\":\"500\"}}},\"template\":\"nova\",\"animations\":{\"start\":\"0\",\"end\":\"0\",\"openDuration\":\"0\",\"closeDuration\":\"0\"}}','{\"img_thumbnail\":\"\\/assets\\/creator\\/16\\/_preview.jpg\",\"ga_id\":\"UA-12310597-73\"}',1,1,'2013-04-28 00:59:14','2013-05-30 15:55:35',1,1),
	(20,'Man of Steel 728x90','{\"type\":\"inpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"height\":\"90\",\"width\":\"728\"}},\"Triggered\":{\"Desktop\":{\"height\":\"500\",\"width\":\"950\"}}},\"animations\":{\"start\":\"0\",\"end\":\"0\",\"duration\":\"0\"},\"template\":\"nova\"}','{\"img_thumbnail\":\"\\/assets\\/creator\\/20\\/_preview.jpg\",\"ga_id\":\"UA-12310597-73\"}',1,1,'2013-05-29 15:14:44','2013-05-30 15:14:56',1,1),
	(30,'Beyond 2 Souls 970x66','{\"type\":\"inpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"height\":\"66\",\"width\":\"970\"},\"Tablet\":{\"height\":\"970\",\"width\":\"66\"}},\"Triggered\":{\"Desktop\":{\"height\":\"415\",\"width\":\"970\"},\"Tablet\":{\"height\":\"970\",\"width\":\"415\"}}},\"animations\":{\"start\":\"66\",\"end\":\"0\",\"duration\":\"300\",\"selector\":\"triggered\",\"openDuration\":\"400\",\"closeDuration\":\"200\"},\"template\":\"eclipse\"}','{\"img_thumbnail\":\"\\/assets\\/creator\\/30\\/_preview.jpg\",\"ga_id\":\"UA-12310597-73\"}',1,1,'2013-05-30 12:08:33','2013-05-30 15:16:49',1,1);

/*!40000 ALTER TABLE `origin_ads` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_components
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_components`;

CREATE TABLE `origin_components` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `group` varchar(100) DEFAULT NULL,
  `content` text,
  `config` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `origin_components` WRITE;
/*!40000 ALTER TABLE `origin_components` DISABLE KEYS */;

INSERT INTO `origin_components` (`id`, `name`, `alias`, `group`, `content`, `config`, `create_date`, `modify_date`, `create_by`, `modify_by`, `status`)
VALUES
	(1,'Embed','embed','embed','{\"alias\":\"embed\",\"description\":\"Embed code\"}','{\"img_icon\":\"\\/assets\\/components\\/embed.png\",\"group\":\"embed\"}','2013-03-28 23:10:31','2013-04-21 16:28:26',1,1,1),
	(3,'Link','link','cta','{\"alias\":\"link\",\"description\":\"Click-out link\"}','{\"img_icon\":\"\\/assets\\/components\\/link.png\",\"group\":\"link\"}','2013-04-07 21:45:18','2013-04-10 17:40:11',1,1,1),
	(4,'Toggle','toggle','cta','{\"description\":\"Switch between initial and triggered state\"}','{\"img_icon\":\"\\/assets\\/components\\/toggle.png\",\"group\":\"cta\"}','2013-04-07 21:45:51','2013-04-21 16:43:03',1,1,1),
	(5,'Image','image','media','{\"description\":\"Image\"}','{\"img_icon\":\"\\/assets\\/components\\/image.png\",\"group\":\"media\"}','2013-04-08 15:45:06','2013-04-08 15:45:06',1,1,1),
	(7,'DoubleClick Link','dfp-link','cta','{\"description\":\"DoubleClick pass-thru link\"}','{\"group\":\"link\",\"img_icon\":\"\\/assets\\/components\\/dc.png\"}','2013-04-10 11:25:22','2013-04-21 16:43:27',1,1,1),
	(10,'Background','background','media','{\"description\":\"Sets the current ad unit state\'s background image\"}','{\"img_icon\":\"\\/assets\\/components\\/background.png\"}','2013-04-18 17:07:54','2013-04-21 16:43:32',1,1,1),
	(11,'Springboard','springboard','video','{\"description\":\"Springboard Video plugin\"}','{\"img_icon\":\"\\/assets\\/components\\/springboard.png\"}','2013-05-21 14:58:50','2013-05-21 15:00:48',1,1,1);

/*!40000 ALTER TABLE `origin_components` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_demos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_demos`;

CREATE TABLE `origin_demos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `origin_ad_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `config` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `origin_demos` WRITE;
/*!40000 ALTER TABLE `origin_demos` DISABLE KEYS */;

INSERT INTO `origin_demos` (`id`, `origin_ad_id`, `name`, `alias`, `config`, `create_date`, `modify_date`, `create_by`, `modify_by`, `status`)
VALUES
	(18,15,'GR','7j0TnG','{\"embedOptions\":{\"auto\":0,\"close\":0,\"hover\":0,\"id\":\"15\",\"type\":\"antemeridian\"},\"placement\":\"embedOutOfPage\",\"templateAlias\":\"gamerevolution\",\"type\":\"antemeridian\"}','2013-05-26 00:35:28','2013-05-26 00:35:28',1,1,1),
	(20,17,'GR - Killer is Dead','MMS5Y4','{\"embedOptions\":{\"auto\":0,\"close\":0,\"hover\":0,\"id\":\"17\",\"type\":\"eclipse\"},\"placement\":\"embedLeaderboard\",\"templateAlias\":\"gamerevolution\",\"type\":\"eclipse\"}','2013-05-26 20:11:35','2013-05-26 20:11:35',1,1,1),
	(30,17,'tfytdt','XXg8K6','{\"embedOptions\":{\"auto\":0,\"close\":0,\"hover\":0,\"id\":\"17\",\"type\":\"eclipse\"},\"reskin_img\":\"\\/assets\\/demos\\/902337_10151386772613716_522245502_o.jpg\",\"reskin_color\":\"#fff\",\"templateAlias\":\"gamerevolution\",\"type\":\"eclipse\"}','2013-05-28 16:57:44','2013-05-28 16:57:44',1,1,1),
	(31,30,'CR-US','9rOwCV','{\"embedOptions\":{\"auto\":0,\"close\":0,\"hover\":0,\"id\":\"30\",\"type\":\"eclipse\"},\"placement\":\"embedLeaderboard\",\"templateAlias\":\"craveonline\",\"type\":\"eclipse\"}','2013-05-30 12:38:48','2013-05-30 12:38:48',1,1,1),
	(32,20,'Cinemablend','mB7k4u','{\"embedOptions\":{\"auto\":0,\"close\":0,\"hover\":0,\"id\":\"20\",\"type\":\"nova\"},\"placement\":\"embedLeaderboard\",\"templateAlias\":\"cinemablend\",\"type\":\"nova\"}','2013-05-30 15:17:36','2013-05-30 15:17:36',1,1,1),
	(33,16,'GameRevolution','OUqXxJ','{\"embedOptions\":{\"auto\":0,\"close\":0,\"hover\":0,\"id\":\"16\",\"type\":\"nova\"},\"placement\":\"embedSidebar\",\"templateAlias\":\"gamerevolution\",\"type\":\"nova\"}','2013-05-30 15:17:58','2013-05-30 15:17:58',1,1,1);

/*!40000 ALTER TABLE `origin_demos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_sites
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_sites`;

CREATE TABLE `origin_sites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `content` text,
  `config` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `origin_sites` WRITE;
/*!40000 ALTER TABLE `origin_sites` DISABLE KEYS */;

INSERT INTO `origin_sites` (`id`, `name`, `alias`, `content`, `config`, `create_date`, `modify_date`, `create_by`, `modify_by`, `status`)
VALUES
	(1,'Origin','origin',NULL,NULL,'2013-04-15 21:30:33','2013-04-15 21:57:59',1,1,1),
	(2,'CraveOnline','craveonline','{\"description\":\"CraveOnline demo site\"}','[]','2013-04-15 21:58:40','2013-04-15 22:07:23',1,1,1),
	(3,'GameRevolution','gamerevolution','{\"description\":\"Game Revolution demo site.\"}','[]','2013-04-15 22:07:38','2013-05-24 14:25:19',1,1,1),
	(4,'Cinemablend','cinemablend','{\"description\":\"Cinemablend\"}',NULL,'2013-05-24 12:14:25','2013-05-24 12:14:25',1,1,1),
	(5,'TheFashionSpot','thefashionspot','{\"description\":\"TFS\"}',NULL,'2013-05-24 12:14:34','2013-05-24 12:14:34',1,1,1),
	(6,'anemul','anemul','{\"description\":\"anemul\"}',NULL,'2013-05-24 13:46:52','2013-05-24 13:46:52',1,1,1);

/*!40000 ALTER TABLE `origin_sites` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_templates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_templates`;

CREATE TABLE `origin_templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `content` text,
  `config` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `origin_templates` WRITE;
/*!40000 ALTER TABLE `origin_templates` DISABLE KEYS */;

INSERT INTO `origin_templates` (`id`, `name`, `alias`, `content`, `config`, `create_date`, `modify_date`, `create_by`, `modify_by`, `status`)
VALUES
	(1,'Sliver','horizon','{\"alias\":\"horizon\",\"description\":\"This out-of-page unit appears above the site. Triggering the expansion will pushdown the site to reveal the contents.\",\"file_storyboard\":\"\\/assets\\/templates\\/horizon.png\",\"file_specs\":\"\",\"file_logo\":\"\"}','{\"type\":\"outofpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"width\":\"1500\",\"height\":\"66\"},\"Tablet\":{\"width\":\"1500\",\"height\":\"66\"}},\"Triggered\":{\"Desktop\":{\"width\":\"1500\",\"height\":\"415\"},\"Tablet\":{\"width\":\"1500\",\"height\":\"415\"}}},\"animations\":{\"start\":\"0\",\"end\":\"415\",\"selector\":\"initial\",\"openDuration\":\"500\",\"closeDuration\":\"400\"}}','2013-04-20 23:35:45','2013-05-03 11:37:15',1,1,1),
	(10,'Overlay - 728x90','nova','{\"alias\":\"nova\",\"description\":\"In page unit with an out-of-page triggered state.\",\"file_storyboard\":\"\\/assets\\/templates\\/nova.png\",\"file_specs\":\"\",\"file_logo\":\"\"}','{\"type\":\"inpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"height\":\"90\",\"width\":\"728\"}},\"Triggered\":{\"Desktop\":{\"height\":\"500\",\"width\":\"950\"}}},\"animations\":{\"start\":\"0\",\"end\":\"0\",\"duration\":\"0\"}}','2013-03-20 17:09:06','2013-05-14 23:00:22',1,1,1),
	(22,'Pushdown - 970x66','eclipse','{\"alias\":\"eclipse\",\"description\":\"Inspired by the IAB Pushdown, unit lives inline with the site content. The triggered state will pushdown the site, revealing it\'s contents.\",\"file_storyboard\":\"\\/assets\\/templates\\/nova.png\",\"file_specs\":\"\",\"file_logo\":\"\"}','{\"type\":\"inpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"height\":\"66\",\"width\":\"970\"},\"Tablet\":{\"height\":\"970\",\"width\":\"66\"}},\"Triggered\":{\"Desktop\":{\"height\":\"415\",\"width\":\"970\"},\"Tablet\":{\"height\":\"970\",\"width\":\"415\"}}},\"animations\":{\"start\":\"66\",\"end\":\"0\",\"duration\":\"300\",\"selector\":\"triggered\",\"openDuration\":\"400\",\"closeDuration\":\"200\"}}','2013-03-20 17:09:06','2013-05-14 23:03:34',1,1,1),
	(23,'Interstitial','postmeridian','{\"description\":\"Interstitial type unit. Triggers upon an user clicking on an internal site link.\"}','{\"type\":\"outofpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"width\":\"850\",\"height\":\"500\"}},\"Triggered\":{\"Desktop\":{\"width\":\"0\",\"height\":\"0\"}}},\"animations\":{\"closeDuration\":\"15\"}}','2013-05-01 18:01:02','2013-05-14 12:32:44',1,1,1),
	(24,'Prestitial','antemeridian','{\"description\":\"Interstital type unit. This unit appears upon page load.\"}','{\"type\":\"outofpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"width\":\"850\",\"height\":\"500\"}},\"Triggered\":{\"Desktop\":{\"width\":\"0\",\"height\":\"0\"}}},\"animations\":{\"closeDuration\":\"15\"}}','2013-05-01 18:01:55','2013-05-14 12:32:38',1,1,1),
	(25,'INgage','gemini','{\"description\":\"In page unit that can contain a variety of content pieces\"}','{\"type\":\"inpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"width\":\"300\",\"height\":\"600\"}},\"Triggered\":{\"Desktop\":{\"width\":\"0\",\"height\":\"0\"}}}}','2013-05-01 18:02:35','2013-05-24 16:12:49',1,1,0),
	(26,'Discovery','discovery','{\"description\":\"Editorial content piece. Allows ease of sharing.\"}','{\"type\":\"inpage\"}','2013-05-02 16:24:35','2013-05-02 16:24:37',1,1,0),
	(27,'Overlay - 300x250','nova','{\"description\":\"In page 300x250 unit with an out-of-page triggered state\"}','{\"type\":\"inpage\",\"dimensions\":{\"Initial\":{\"Desktop\":{\"width\":\"300\",\"height\":\"250\"}},\"Triggered\":{\"Desktop\":{\"width\":\"950\",\"height\":\"500\"}}}}','2013-05-14 22:59:40','2013-05-14 22:59:52',1,1,1);

/*!40000 ALTER TABLE `origin_templates` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_group_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_group_permissions`;

CREATE TABLE `user_group_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user_group_permissions` WRITE;
/*!40000 ALTER TABLE `user_group_permissions` DISABLE KEYS */;

INSERT INTO `user_group_permissions` (`id`, `user_group_id`, `controller`, `action`, `allowed`)
VALUES
	(1,1,'Pages','display',1),
	(2,2,'Pages','display',1),
	(3,3,'Pages','display',1),
	(4,1,'UserGroupPermissions','index',1),
	(5,2,'UserGroupPermissions','index',0),
	(6,3,'UserGroupPermissions','index',0),
	(7,1,'UserGroupPermissions','update',1),
	(8,2,'UserGroupPermissions','update',0),
	(9,3,'UserGroupPermissions','update',0),
	(10,1,'UserGroups','index',1),
	(11,2,'UserGroups','index',0),
	(12,3,'UserGroups','index',0),
	(13,1,'UserGroups','addGroup',1),
	(14,2,'UserGroups','addGroup',0),
	(15,3,'UserGroups','addGroup',0),
	(16,1,'UserGroups','editGroup',1),
	(17,2,'UserGroups','editGroup',0),
	(18,3,'UserGroups','editGroup',0),
	(19,1,'UserGroups','deleteGroup',1),
	(20,2,'UserGroups','deleteGroup',0),
	(21,3,'UserGroups','deleteGroup',0),
	(22,1,'Users','index',1),
	(23,2,'Users','index',1),
	(24,3,'Users','index',0),
	(25,1,'Users','viewUser',1),
	(26,2,'Users','viewUser',0),
	(27,3,'Users','viewUser',0),
	(28,1,'Users','myprofile',1),
	(29,2,'Users','myprofile',1),
	(30,3,'Users','myprofile',0),
	(31,1,'Users','login',1),
	(32,2,'Users','login',1),
	(33,3,'Users','login',1),
	(34,1,'Users','logout',1),
	(35,2,'Users','logout',1),
	(36,3,'Users','logout',1),
	(37,1,'Users','register',1),
	(38,2,'Users','register',1),
	(39,3,'Users','register',1),
	(40,1,'Users','changePassword',1),
	(41,2,'Users','changePassword',1),
	(42,3,'Users','changePassword',0),
	(43,1,'Users','changeUserPassword',1),
	(44,2,'Users','changeUserPassword',0),
	(45,3,'Users','changeUserPassword',0),
	(46,1,'Users','addUser',1),
	(47,2,'Users','addUser',0),
	(48,3,'Users','addUser',0),
	(49,1,'Users','editUser',1),
	(50,2,'Users','editUser',0),
	(51,3,'Users','editUser',0),
	(52,1,'Users','dashboard',1),
	(53,2,'Users','dashboard',1),
	(54,3,'Users','dashboard',0),
	(55,1,'Users','deleteUser',1),
	(56,2,'Users','deleteUser',0),
	(57,3,'Users','deleteUser',0),
	(58,1,'Users','makeActive',1),
	(59,2,'Users','makeActive',0),
	(60,3,'Users','makeActive',0),
	(61,1,'Users','accessDenied',1),
	(62,2,'Users','accessDenied',1),
	(63,3,'Users','accessDenied',1),
	(64,1,'Users','userVerification',1),
	(65,2,'Users','userVerification',1),
	(66,3,'Users','userVerification',1),
	(67,1,'Users','forgotPassword',1),
	(68,2,'Users','forgotPassword',1),
	(69,3,'Users','forgotPassword',1),
	(70,1,'Users','makeActiveInactive',1),
	(71,2,'Users','makeActiveInactive',0),
	(72,3,'Users','makeActiveInactive',0),
	(73,1,'Users','verifyEmail',1),
	(74,2,'Users','verifyEmail',0),
	(75,3,'Users','verifyEmail',0),
	(76,1,'Users','activatePassword',1),
	(77,2,'Users','activatePassword',1),
	(78,3,'Users','activatePassword',1),
	(79,1,'Creator','index',1),
	(80,2,'Creator','index',1),
	(81,3,'Creator','index',0),
	(82,1,'Origin','index',1),
	(83,2,'Origin','index',1),
	(84,3,'Origin','index',0),
	(85,1,'Creator','jsonList',1),
	(86,2,'Creator','jsonList',1),
	(87,3,'Creator','jsonList',1),
	(88,1,'Creator','edit',1),
	(89,2,'Creator','edit',1),
	(90,3,'Creator','edit',0),
	(91,1,'Creator','adList',1),
	(92,2,'Creator','adList',0),
	(93,3,'Creator','adList',0),
	(94,1,'Origin','templateList',1),
	(95,2,'Origin','templateList',1),
	(96,3,'Origin','templateList',0),
	(97,4,'Origin','templateList',1),
	(98,4,'Users','index',0),
	(99,1,'Origin','ad',0),
	(100,2,'Origin','ad',0),
	(101,3,'Origin','ad',1),
	(102,4,'Origin','ad',0),
	(103,5,'Origin','ad',0),
	(104,1,'Origin','adIframe',0),
	(105,2,'Origin','adIframe',0),
	(106,3,'Origin','adIframe',1),
	(107,4,'Origin','adIframe',0),
	(108,5,'Origin','adIframe',0),
	(109,1,'Origin','post',1),
	(110,2,'Origin','post',1),
	(111,3,'Origin','post',1),
	(112,4,'Origin','post',1),
	(113,5,'Origin','post',1),
	(114,1,'Origin','upload',1),
	(115,2,'Origin','upload',1),
	(116,3,'Origin','upload',0),
	(117,4,'Origin','upload',1),
	(118,5,'Origin','upload',1),
	(119,4,'Origin','index',1),
	(120,5,'Origin','index',1),
	(121,1,'Origin','templateEdit',1),
	(122,2,'Origin','templateEdit',0),
	(123,3,'Origin','templateEdit',0),
	(124,4,'Origin','templateEdit',0),
	(125,5,'Origin','templateEdit',0),
	(126,1,'Origin','guidelines',0),
	(127,2,'Origin','guidelines',0),
	(128,3,'Origin','guidelines',1),
	(129,4,'Origin','guidelines',0),
	(130,5,'Origin','guidelines',0),
	(131,1,'Origin','componentList',1),
	(132,2,'Origin','componentList',1),
	(133,3,'Origin','componentList',0),
	(134,4,'Origin','componentList',1),
	(135,5,'Origin','componentList',1),
	(136,1,'Origin','loadComponent',1),
	(137,2,'Origin','loadComponent',1),
	(138,3,'Origin','loadComponent',0),
	(139,4,'Origin','loadComponent',1),
	(140,5,'Origin','loadComponent',1),
	(141,5,'Origin','templateList',1),
	(142,1,'Origin','demo',0),
	(143,2,'Origin','demo',0),
	(144,3,'Origin','demo',1),
	(145,4,'Origin','demo',0),
	(146,5,'Origin','demo',0),
	(147,1,'Origin','demoList',0),
	(148,2,'Origin','demoList',0),
	(149,3,'Origin','demoList',1),
	(150,4,'Origin','demoList',0),
	(151,5,'Origin','demoList',0),
	(152,1,'Origin','demoEdit',1),
	(153,2,'Origin','demoEdit',1),
	(154,3,'Origin','demoEdit',0),
	(155,4,'Origin','demoEdit',1),
	(156,5,'Origin','demoEdit',1),
	(157,1,'Origin','demoOrigin',0),
	(158,2,'Origin','demoOrigin',0),
	(159,3,'Origin','demoOrigin',1),
	(160,4,'Origin','demoOrigin',0),
	(161,5,'Origin','demoOrigin',0),
	(162,1,'Origin','demoLoadTemplate',1),
	(163,2,'Origin','demoLoadTemplate',1),
	(164,3,'Origin','demoLoadTemplate',0),
	(165,4,'Origin','demoLoadTemplate',1),
	(166,5,'Origin','demoLoadTemplate',1),
	(167,1,'Origin','demoManager',1),
	(168,2,'Origin','demoManager',1),
	(169,3,'Origin','demoManager',0),
	(170,4,'Origin','demoManager',1),
	(171,5,'Origin','demoManager',1),
	(172,1,'Origin','siteList',1),
	(173,2,'Origin','siteList',1),
	(174,3,'Origin','siteList',0),
	(175,4,'Origin','siteList',1),
	(176,5,'Origin','siteList',1),
	(177,1,'Origin','settings',1),
	(178,2,'Origin','settings',0),
	(179,3,'Origin','settings',0),
	(180,4,'Origin','settings',0),
	(181,5,'Origin','settings',0),
	(182,1,'Origin','dashboardAccess',1),
	(183,2,'Origin','dashboardAccess',0),
	(184,3,'Origin','dashboardAccess',0),
	(185,4,'Origin','dashboardAccess',0),
	(186,5,'Origin','dashboardAccess',0),
	(187,1,'Origin','jsonActivity',1),
	(188,2,'Origin','jsonActivity',1),
	(189,3,'Origin','jsonActivity',0),
	(190,4,'Origin','jsonActivity',1),
	(191,5,'Origin','jsonActivity',1),
	(192,1,'Origin','edit',1),
	(193,2,'Origin','edit',1),
	(194,3,'Origin','edit',0),
	(195,4,'Origin','edit',0),
	(196,5,'Origin','edit',0),
	(197,1,'Origin','ad_list',1),
	(198,2,'Origin','ad_list',1),
	(199,3,'Origin','ad_list',0),
	(200,4,'Origin','ad_list',1),
	(201,5,'Origin','ad_list',1),
	(202,1,'Origin','jsonTemplate',1),
	(203,2,'Origin','jsonTemplate',1),
	(204,3,'Origin','jsonTemplate',1),
	(205,4,'Origin','jsonTemplate',1),
	(206,5,'Origin','jsonTemplate',1),
	(207,1,'Origin','jsonSite',1),
	(208,2,'Origin','jsonSite',1),
	(209,3,'Origin','jsonSite',0),
	(210,4,'Origin','jsonSite',1),
	(211,5,'Origin','jsonSite',1),
	(212,1,'Origin','jsonComponent',1),
	(213,2,'Origin','jsonComponent',1),
	(214,3,'Origin','jsonComponent',0),
	(215,4,'Origin','jsonComponent',1),
	(216,5,'Origin','jsonComponent',1),
	(217,1,'Origin','jsonList',1),
	(218,2,'Origin','jsonList',1),
	(219,3,'Origin','jsonList',1),
	(220,4,'Origin','jsonList',1),
	(221,5,'Origin','jsonList',1),
	(222,1,'Origin','jsonLibrary',1),
	(223,2,'Origin','jsonLibrary',1),
	(224,3,'Origin','jsonLibrary',0),
	(225,4,'Origin','jsonLibrary',1),
	(226,5,'Origin','jsonLibrary',1),
	(227,1,'Origin','jsonDemo',1),
	(228,2,'Origin','jsonDemo',1),
	(229,3,'Origin','jsonDemo',0),
	(230,4,'Origin','jsonDemo',1),
	(231,5,'Origin','jsonDemo',1),
	(232,1,'Origin','jsonAdTemplate',1),
	(233,2,'Origin','jsonAdTemplate',1),
	(234,3,'Origin','jsonAdTemplate',0),
	(235,4,'Origin','jsonAdTemplate',1),
	(236,5,'Origin','jsonAdTemplate',1),
	(237,1,'Origin','jsonAdUnit',1),
	(238,2,'Origin','jsonAdUnit',1),
	(239,3,'Origin','jsonAdUnit',0),
	(240,4,'Origin','jsonAdUnit',1),
	(241,5,'Origin','jsonAdUnit',1);

/*!40000 ALTER TABLE `user_group_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user_groups` WRITE;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;

INSERT INTO `user_groups` (`id`, `name`, `alias_name`, `allowRegistration`, `created`, `modified`)
VALUES
	(1,'System Administrator','superadmin',0,'2013-01-18 16:07:52','2013-03-20 19:37:28'),
	(2,'Developers','developers',0,'2013-01-18 16:07:52','2013-03-15 20:13:16'),
	(3,'Guest','Guest',0,'2013-01-18 16:07:52','2013-01-18 16:07:52'),
	(4,'Analytics','Analytics',1,'2013-03-15 20:13:49','2013-03-15 20:13:49'),
	(5,'Designers','designers',1,'2013-04-07 15:56:03','2013-04-07 15:56:03');

/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) unsigned DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` text,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email_verified` int(1) DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`username`),
  KEY `mail` (`email`),
  KEY `users_FKIndex1` (`user_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `user_group_id`, `username`, `password`, `salt`, `email`, `first_name`, `last_name`, `email_verified`, `active`, `ip_address`, `created`, `modified`)
VALUES
	(1,1,'admin','b2fb79d2c626c626fe20a6f0935f8610','1ec19cc78624d8d4e7ec2e53c889666c','willie.fu@evolvemediallc.com','Admin','',1,1,'','2013-01-18 16:07:52','2013-04-07 20:07:24'),
	(7,2,'willie.fu','6b6e7dc3c8b1e5d8c2cb136ca97570d3','7e44879c0d3555975350f16ebc621f7b','willie.fu@gorillanation.com','Will','Fu',1,1,NULL,'2013-04-05 18:05:01','2013-05-02 18:49:15');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
