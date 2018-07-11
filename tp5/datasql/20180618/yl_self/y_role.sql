DROP TABLE IF EXISTS `y_role`;
CREATE TABLE `y_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父角色id',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '角色状态',
  `sort_num` int(11) NOT NULL DEFAULT '0' COMMENT '排序值',
  `left_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的左值',
  `right_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的右值',
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '所处层级',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='角色';
insert into `y_role` VALUES  ( '3','神级存在','0','神级存在','0','3','0','0','0','1527430280','' ), ( '4','超级管理员','0','超级管理员','1','0','0','0','0','1527320598','1527203236' ), ( '5','高级编辑员','4','高级编辑员','1','0','0','0','0','1527514098','1527513824' ), ( '6','普通编辑员','4','普通编辑员','1','0','0','0','0','1527514118','1527514118' ) ;
DROP TABLE IF EXISTS `y_role`;
CREATE TABLE `y_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父角色id',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '角色状态',
  `sort_num` int(11) NOT NULL DEFAULT '0' COMMENT '排序值',
  `left_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的左值',
  `right_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的右值',
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '所处层级',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='角色';
insert into `y_role` VALUES  ( '3','神级存在','0','神级存在','0','3','0','0','0','1527430280','' ), ( '4','超级管理员','0','超级管理员','1','0','0','0','0','1527320598','1527203236' ), ( '5','高级编辑员','4','高级编辑员','1','0','0','0','0','1527514098','1527513824' ), ( '6','普通编辑员','4','普通编辑员','1','0','0','0','0','1527514118','1527514118' ) ;
DROP TABLE IF EXISTS `y_role`;
CREATE TABLE `y_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父角色id',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '角色状态',
  `sort_num` int(11) NOT NULL DEFAULT '0' COMMENT '排序值',
  `left_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的左值',
  `right_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的右值',
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '所处层级',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='角色';
insert into `y_role` VALUES  ( '3','神级存在','0','神级存在','0','3','0','0','0','1527430280','' ), ( '4','超级管理员','0','超级管理员','1','0','0','0','0','1527320598','1527203236' ), ( '5','高级编辑员','4','高级编辑员','1','0','0','0','0','1527514098','1527513824' ), ( '6','普通编辑员','4','普通编辑员','1','0','0','0','0','1527514118','1527514118' ) ;
DROP TABLE IF EXISTS `y_role`;
CREATE TABLE `y_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父角色id',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '角色状态',
  `sort_num` int(11) NOT NULL DEFAULT '0' COMMENT '排序值',
  `left_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的左值',
  `right_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的右值',
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '所处层级',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='角色';
insert into `y_role` VALUES  ( '3','神级存在','0','神级存在','0','3','0','0','0','1527430280','' ), ( '4','超级管理员','0','超级管理员','1','0','0','0','0','1527320598','1527203236' ), ( '5','高级编辑员','4','高级编辑员','1','0','0','0','0','1527514098','1527513824' ), ( '6','普通编辑员','4','普通编辑员','1','0','0','0','0','1527514118','1527514118' ) ;
DROP TABLE IF EXISTS `y_role`;
CREATE TABLE `y_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父角色id',
  `description` varchar(200) NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '角色状态',
  `sort_num` int(11) NOT NULL DEFAULT '0' COMMENT '排序值',
  `left_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的左值',
  `right_key` int(11) NOT NULL DEFAULT '0' COMMENT '用来组织关系的右值',
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '所处层级',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='角色';
insert into `y_role` VALUES  ( '3','神级存在','0','神级存在','0','3','0','0','0','1527430280','' ), ( '4','超级管理员','0','超级管理员','1','0','0','0','0','1527320598','1527203236' ), ( '5','高级编辑员','4','高级编辑员','1','0','0','0','0','1527514098','1527513824' ), ( '6','普通编辑员','4','普通编辑员','1','0','0','0','0','1527514118','1527514118' ) ;
