DROP TABLE IF EXISTS `y_banner`;
CREATE TABLE `y_banner` (
  `id` smallint(6) NOT NULL,
  `commend` smallint(6) DEFAULT '0' COMMENT '排序',
  `url` varchar(255) DEFAULT NULL COMMENT '链接',
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `img` varchar(255) DEFAULT NULL COMMENT '图片',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='轮播图信息表';
insert into `y_banner` VALUES  ( '19','1','#','banner1','20180516/f76e8ece65978b56b3fdeb103cc2d0bb.jpg','1','1526463100','1526463103' ), ( '20','2','#','banner2','20180516/c3261f2ed3406dd35ee3fdb921219b94.jpg','1','1526463104','1526463119' ), ( '21','3','#','banner3','20180516/0bc023836c297d263e8a2bb6d384826a.jpg','1','1526463120','1527518323' ) ;
