DROP TABLE IF EXISTS `y_data`;
CREATE TABLE `y_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL COMMENT '文件路径',
  `name` varchar(255) DEFAULT NULL COMMENT '文件名称',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
insert into `y_data` VALUES  ( '12','20180623\d4420fc84b94169c6a1addd2ef80c9a1.mp3','英子','1529733820','1529733831','4360' ), ( '10','20180517\10b759dd114ffe5ec0974986e911b21f.','文档2','1526538774','1526538782','0' ), ( '11','20180517\bb57dde8069f1fe9c3bafb06f41db34e.','文档3','1526538783','1526538793','0' ) ;
