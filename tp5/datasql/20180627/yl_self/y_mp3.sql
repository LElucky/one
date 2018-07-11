DROP TABLE IF EXISTS `y_mp3`;
CREATE TABLE `y_mp3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(244) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
insert into `y_mp3` VALUES  ( '1','爱情错觉','','20180626\254f2f31b67abb4d2aae555b58d04dd6.mp3','1530027168','','','' ), ( '2','不仅仅是喜欢','20180627\617c16334fb6607397c5761571a10c5a.jpg','20180627\68f5cf21a005110d6d43f9ee2243b685.mp3','1530030023','','','3' ) ;
