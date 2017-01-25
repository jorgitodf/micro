CREATE TABLE `tb_user` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `posts` (
  `idposts` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `posts` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idposts`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE DATABASE `micro` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;


