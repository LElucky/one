DROP TABLE IF EXISTS `y_ntype`;
CREATE TABLE `y_ntype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `typename` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `commend` int(11) DEFAULT NULL COMMENT '分类权重',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
insert into `y_ntype` VALUES  ( '1','1526366174','1526366194','公司新闻','1' ), ( '2','1526366197','1526366207','行业动态','2' ) ;
