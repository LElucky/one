DROP TABLE IF EXISTS `y_ctype`;
CREATE TABLE `y_ctype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `typename` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `commend` int(11) DEFAULT NULL COMMENT '分类权重',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
insert into `y_ctype` VALUES  ( '2','1526357233','1526357239','案例一','1' ), ( '3','1526357241','1526357251','案例二','2' ) ;
