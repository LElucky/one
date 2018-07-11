DROP TABLE IF EXISTS `y_user`;
CREATE TABLE `y_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户账号',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '用户密码',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `last_login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `login_ip` varchar(15) DEFAULT NULL COMMENT '登录ip',
  `user_img` varchar(40) DEFAULT NULL COMMENT '用户头像',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `count_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='用户表';
insert into `y_user` VALUES  ( '6','admin','be1100494bcc925a86934851d7f2ee13','','','1529321532','1','0.0.0.0','','1527514385','1527320335','68' ), ( '7','luan','dd960d42bb47da21af3b3b0c31684540','','','1527514764','1','0.0.0.0','','1527514754','1527514713','1' ) ;
DROP TABLE IF EXISTS `y_user`;
CREATE TABLE `y_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户账号',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '用户密码',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `last_login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `login_ip` varchar(15) DEFAULT NULL COMMENT '登录ip',
  `user_img` varchar(40) DEFAULT NULL COMMENT '用户头像',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `count_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='用户表';
insert into `y_user` VALUES  ( '6','admin','be1100494bcc925a86934851d7f2ee13','','','1529321532','1','0.0.0.0','','1527514385','1527320335','68' ), ( '7','luan','dd960d42bb47da21af3b3b0c31684540','','','1527514764','1','0.0.0.0','','1527514754','1527514713','1' ) ;
DROP TABLE IF EXISTS `y_user`;
CREATE TABLE `y_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户账号',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '用户密码',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `last_login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `login_ip` varchar(15) DEFAULT NULL COMMENT '登录ip',
  `user_img` varchar(40) DEFAULT NULL COMMENT '用户头像',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `count_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='用户表';
insert into `y_user` VALUES  ( '6','admin','be1100494bcc925a86934851d7f2ee13','','','1529321532','1','0.0.0.0','','1527514385','1527320335','68' ), ( '7','luan','dd960d42bb47da21af3b3b0c31684540','','','1527514764','1','0.0.0.0','','1527514754','1527514713','1' ) ;
DROP TABLE IF EXISTS `y_user`;
CREATE TABLE `y_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户账号',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '用户密码',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `last_login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `login_ip` varchar(15) DEFAULT NULL COMMENT '登录ip',
  `user_img` varchar(40) DEFAULT NULL COMMENT '用户头像',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `count_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='用户表';
insert into `y_user` VALUES  ( '6','admin','be1100494bcc925a86934851d7f2ee13','','','1529321532','1','0.0.0.0','','1527514385','1527320335','68' ), ( '7','luan','dd960d42bb47da21af3b3b0c31684540','','','1527514764','1','0.0.0.0','','1527514754','1527514713','1' ) ;
DROP TABLE IF EXISTS `y_user`;
CREATE TABLE `y_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户账号',
  `password` varchar(64) NOT NULL DEFAULT '' COMMENT '用户密码',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `last_login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '用户状态',
  `login_ip` varchar(15) DEFAULT NULL COMMENT '登录ip',
  `user_img` varchar(40) DEFAULT NULL COMMENT '用户头像',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `count_login` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='用户表';
insert into `y_user` VALUES  ( '6','admin','be1100494bcc925a86934851d7f2ee13','','','1529321532','1','0.0.0.0','','1527514385','1527320335','68' ), ( '7','luan','dd960d42bb47da21af3b3b0c31684540','','','1527514764','1','0.0.0.0','','1527514754','1527514713','1' ) ;
