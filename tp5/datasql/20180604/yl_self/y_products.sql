DROP TABLE IF EXISTS `y_products`;
CREATE TABLE `y_products` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '产品名称',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL COMMENT '产品型号',
  `brand` varchar(255) DEFAULT NULL COMMENT '产品品牌',
  `content` text COMMENT '产品综述',
  `webkeys` varchar(255) DEFAULT NULL,
  `webtitle` varchar(255) DEFAULT NULL,
  `webdesc` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL COMMENT '分类id',
  `status` tinyint(1) DEFAULT NULL,
  `commend` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='产品表';
insert into `y_products` VALUES  ( '9','产品','1527685935','','','','','','','','2','1','0' ), ( '10','产品','1527999947','','','','','','','','5','1','0' ), ( '11','产品','','','','','','','','','','1','1' ), ( '12','产品','','','','','','','','','','1','1' ), ( '13','产品','1527999962','','','','','','','','6','1','0' ), ( '14','产品','1528009044','','','','','','','','2','1','0' ), ( '15','产品','','','','','','','','','','1','1' ), ( '16','产品','1528032544','','','','','','','','2','1','0' ), ( '17','产品','','','','','','','','','','1','1' ), ( '18','产品','','','','','','','','','','1','1' ), ( '19','产品','','','','','','','','','','1','1' ), ( '20','产品','','','','','','','','','','1','1' ), ( '27','','1527999587','1527685975','','','','','','','2','1','0' ), ( '28','','1528021479','1527686304','','','','','','','2','1','0' ) ;
