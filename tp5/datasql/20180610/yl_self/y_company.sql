DROP TABLE IF EXISTS `y_company`;
CREATE TABLE `y_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(50) NOT NULL COMMENT '公司名称',
  `industry` varchar(50) NOT NULL COMMENT '行业',
  `address` varchar(50) DEFAULT NULL COMMENT '公司地址',
  `tel` varchar(50) DEFAULT NULL COMMENT '公司电话',
  `phone` varchar(50) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `url` varchar(50) DEFAULT NULL COMMENT '网址',
  `recordnum` varchar(50) DEFAULT NULL COMMENT '备案号',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='公司基本信息表';
insert into `y_company` VALUES  ( '1','北京理事通科技发展有限公司','电子、电器、电工','2北京昌平区沙河青年创业大厦B座1602室','010-80707091','13811183641','358688638@qq.com','www.baidu.com','京ICP备16047301号-2 1','','1527414455','010-80707091' ) ;
