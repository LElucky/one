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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
insert into `y_mp3` VALUES  ( '4','不仅仅是喜欢','20180628\b77a742865ffead496fd2947f4ae1a41.jpg','20180628\dac553e85f56aba53e46ca0dfdf8e869.mp3','1530195787','','2','3' ), ( '3','我的将军呀','20180628\fc4240913cdd9f9e2f47a7172982ddae.jpg','20180628\6679ad0c085d1a45430f41567fa6580b.mp3','1530195739','','1','2' ), ( '5','那个人','20180628\c3ec6da1e679ad9d40dc7f6f057b81ce.jpg','20180628\ac3cfaca7daf0e47a08c26b46f02167b.mp3','1530195811','','3','4' ) ;
