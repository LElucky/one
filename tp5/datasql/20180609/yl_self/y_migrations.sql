DROP TABLE IF EXISTS `y_migrations`;
CREATE TABLE `y_migrations` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
insert into `y_migrations` VALUES  ( '20170822041240','Rbac','2018-04-14 17:38:25','2018-04-14 17:38:25','0' ) ;
