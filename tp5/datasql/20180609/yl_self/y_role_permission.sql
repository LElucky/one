DROP TABLE IF EXISTS `y_role_permission`;
CREATE TABLE `y_role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色Id',
  `permission_id` int(11) NOT NULL DEFAULT '0' COMMENT '权限ID',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3929 DEFAULT CHARSET=utf8 COMMENT='角色权限对应表';
insert into `y_role_permission` VALUES  ( '685','2','15','1526565438','1526565438' ), ( '686','2','18','1526565438','1526565438' ), ( '687','2','1','1526565438','1526565438' ), ( '688','2','14','1526565438','1526565438' ), ( '689','2','20','1526565438','1526565438' ), ( '690','2','5','1526565438','1526565438' ), ( '691','2','8','1526565438','1526565438' ), ( '692','2','32','1526565438','1526565438' ), ( '693','2','35','1526565438','1526565438' ), ( '694','2','44','1526565438','1526565438' ), ( '695','2','39','1526565438','1526565438' ), ( '696','2','49','1526565438','1526565438' ), ( '697','2','54','1526565438','1526565438' ), ( '698','2','60','1526565438','1526565438' ), ( '699','2','57','1526565438','1526565438' ), ( '700','2','16','1526565438','1526565438' ), ( '701','2','17','1526565438','1526565438' ), ( '702','2','19','1526565438','1526565438' ), ( '703','2','4','1526565438','1526565438' ), ( '704','2','3','1526565438','1526565438' ), ( '705','2','13','1526565438','1526565438' ), ( '706','2','12','1526565438','1526565438' ), ( '707','2','21','1526565438','1526565438' ), ( '708','2','22','1526565438','1526565438' ), ( '709','2','7','1526565438','1526565438' ), ( '710','2','6','1526565438','1526565438' ), ( '711','2','10','1526565438','1526565438' ), ( '712','2','9','1526565438','1526565438' ), ( '713','2','33','1526565438','1526565438' ), ( '714','2','34','1526565438','1526565438' ), ( '715','2','37','1526565438','1526565438' ), ( '716','2','38','1526565438','1526565438' ), ( '717','2','45','1526565438','1526565438' ), ( '718','2','46','1526565438','1526565438' ), ( '719','2','47','1526565438','1526565438' ), ( '720','2','48','1526565438','1526565438' ), ( '721','2','40','1526565438','1526565438' ), ( '722','2','41','1526565438','1526565438' ), ( '723','2','42','1526565438','1526565438' ), ( '724','2','43','1526565438','1526565438' ), ( '725','2','50','1526565438','1526565438' ), ( '726','2','51','1526565438','1526565438' ), ( '727','2','52','1526565438','1526565438' ), ( '728','2','53','1526565438','1526565438' ), ( '729','2','55','1526565438','1526565438' ), ( '730','2','56','1526565438','1526565438' ), ( '731','2','61','1526565438','1526565438' ), ( '732','2','58','1526565438','1526565438' ), ( '733','2','59','1526565438','1526565438' ), ( '1006','3','14','1527424605','1527424605' ), ( '1007','3','20','1527424605','1527424605' ), ( '1008','3','13','1527424605','1527424605' ), ( '1009','3','12','1527424605','1527424605' ), ( '1010','3','21','1527424605','1527424605' ), ( '1011','3','22','1527424605','1527424605' ), ( '2202','13','66','1527430609','1527430609' ), ( '2203','13','15','1527430609','1527430609' ), ( '2204','13','67','1527430609','1527430609' ), ( '2205','13','68','1527430609','1527430609' ), ( '2206','13','16','1527430609','1527430609' ), ( '2207','13','17','1527430609','1527430609' ), ( '2282','5','66','1527513857','1527513857' ), ( '2283','5','15','1527513857','1527513857' ), ( '2284','5','18','1527513857','1527513857' ), ( '2285','5','5','1527513857','1527513857' ), ( '2286','5','8','1527513857','1527513857' ), ( '2287','5','32','1527513857','1527513857' ), ( '2288','5','35','1527513857','1527513857' ), ( '2289','5','44','1527513857','1527513857' ), ( '2290','5','39','1527513857','1527513857' ), ( '2291','5','49','1527513857','1527513857' ), ( '2292','5','54','1527513857','1527513857' ), ( '2293','5','60','1527513857','1527513857' ), ( '2294','5','57','1527513857','1527513857' ), ( '2295','5','67','1527513857','1527513857' ), ( '2296','5','68','1527513857','1527513857' ), ( '2297','5','16','1527513857','1527513857' ), ( '2298','5','17','1527513857','1527513857' ), ( '2299','5','19','1527513857','1527513857' ), ( '2300','5','69','1527513857','1527513857' ), ( '2301','5','7','1527513857','1527513857' ), ( '2302','5','6','1527513857','1527513857' ), ( '2303','5','71','1527513857','1527513857' ), ( '2304','5','72','1527513857','1527513857' ), ( '2305','5','10','1527513857','1527513857' ), ( '2306','5','9','1527513857','1527513857' ), ( '2307','5','33','1527513857','1527513857' ), ( '2308','5','34','1527513857','1527513857' ), ( '2309','5','78','1527513857','1527513857' ), ( '2310','5','79','1527513857','1527513857' ), ( '2311','5','37','1527513857','1527513857' ), ( '2312','5','38','1527513857','1527513857' ), ( '2313','5','45','1527513857','1527513857' ), ( '2314','5','46','1527513857','1527513857' ), ( '2315','5','47','1527513857','1527513857' ), ( '2316','5','48','1527513857','1527513857' ), ( '2317','5','40','1527513857','1527513857' ), ( '2318','5','41','1527513857','1527513857' ), ( '2319','5','42','1527513857','1527513857' ), ( '2320','5','43','1527513857','1527513857' ), ( '2321','5','50','1527513857','1527513857' ), ( '2322','5','51','1527513857','1527513857' ), ( '2323','5','52','1527513857','1527513857' ), ( '2324','5','53','1527513857','1527513857' ), ( '2325','5','55','1527513857','1527513857' ), ( '2326','5','56','1527513857','1527513857' ), ( '2327','5','61','1527513857','1527513857' ), ( '2328','5','58','1527513857','1527513857' ), ( '2329','5','59','1527513857','1527513857' ), ( '2330','6','66','1527514310','1527514310' ), ( '2331','6','5','1527514310','1527514310' ), ( '2332','6','8','1527514310','1527514310' ), ( '2333','6','32','1527514310','1527514310' ), ( '2334','6','35','1527514310','1527514310' ), ( '2335','6','44','1527514310','1527514310' ), ( '2336','6','39','1527514310','1527514310' ), ( '2337','6','49','1527514310','1527514310' ), ( '2338','6','54','1527514310','1527514310' ), ( '2339','6','60','1527514310','1527514310' ), ( '2340','6','57','1527514310','1527514310' ), ( '2341','6','67','1527514310','1527514310' ), ( '2342','6','7','1527514310','1527514310' ), ( '2343','6','6','1527514310','1527514310' ), ( '2344','6','71','1527514310','1527514310' ), ( '2345','6','10','1527514310','1527514310' ), ( '2346','6','9','1527514310','1527514310' ), ( '2347','6','33','1527514310','1527514310' ), ( '2348','6','34','1527514310','1527514310' ), ( '2349','6','78','1527514310','1527514310' ), ( '2350','6','79','1527514310','1527514310' ), ( '2351','6','37','1527514310','1527514310' ), ( '2352','6','38','1527514310','1527514310' ), ( '2353','6','45','1527514310','1527514310' ), ( '2354','6','46','1527514310','1527514310' ), ( '2355','6','47','1527514310','1527514310' ), ( '2356','6','48','1527514310','1527514310' ), ( '2357','6','40','1527514310','1527514310' ), ( '2358','6','41','1527514310','1527514310' ), ( '2359','6','42','1527514310','1527514310' ), ( '2360','6','43','1527514310','1527514310' ), ( '2361','6','50','1527514310','1527514310' ), ( '2362','6','51','1527514310','1527514310' ), ( '2363','6','52','1527514310','1527514310' ), ( '2364','6','53','1527514310','1527514310' ), ( '2365','6','55','1527514310','1527514310' ), ( '2366','6','56','1527514310','1527514310' ), ( '2367','6','61','1527514310','1527514310' ), ( '2368','6','58','1527514310','1527514310' ), ( '2369','6','59','1527514310','1527514310' ), ( '3834','4','66','1527956790','1527956790' ), ( '3835','4','15','1527956790','1527956790' ), ( '3836','4','18','1527956790','1527956790' ), ( '3837','4','1','1527956790','1527956790' ), ( '3838','4','14','1527956790','1527956790' ), ( '3839','4','20','1527956790','1527956790' ), ( '3840','4','5','1527956790','1527956790' ), ( '3841','4','8','1527956790','1527956790' ), ( '3842','4','32','1527956790','1527956790' ), ( '3843','4','35','1527956790','1527956790' ), ( '3844','4','39','1527956790','1527956790' ), ( '3845','4','54','1527956790','1527956790' ), ( '3846','4','119','1527956790','1527956790' ), ( '3847','4','60','1527956790','1527956790' ), ( '3848','4','57','1527956790','1527956790' ), ( '3849','4','67','1527956790','1527956790' ), ( '3850','4','68','1527956790','1527956790' ), ( '3851','4','16','1527956790','1527956790' ), ( '3852','4','17','1527956790','1527956790' ), ( '3853','4','19','1527956790','1527956790' ), ( '3854','4','69','1527956790','1527956790' ), ( '3855','4','4','1527956790','1527956790' ), ( '3856','4','3','1527956790','1527956790' ), ( '3857','4','64','1527956790','1527956790' ), ( '3858','4','65','1527956790','1527956790' ), ( '3859','4','83','1527956790','1527956790' ), ( '3860','4','84','1527956790','1527956790' ), ( '3861','4','91','1527956790','1527956790' ), ( '3862','4','13','1527956790','1527956790' ), ( '3863','4','12','1527956790','1527956790' ), ( '3864','4','62','1527956790','1527956790' ), ( '3865','4','63','1527956790','1527956790' ), ( '3866','4','80','1527956790','1527956790' ), ( '3867','4','86','1527956790','1527956790' ), ( '3868','4','87','1527956790','1527956790' ), ( '3869','4','88','1527956790','1527956790' ), ( '3870','4','92','1527956790','1527956790' ), ( '3871','4','21','1527956790','1527956790' ), ( '3872','4','22','1527956790','1527956790' ), ( '3873','4','77','1527956790','1527956790' ), ( '3874','4','76','1527956790','1527956790' ), ( '3875','4','81','1527956790','1527956790' ), ( '3876','4','82','1527956790','1527956790' ), ( '3877','4','85','1527956790','1527956790' ), ( '3878','4','7','1527956790','1527956790' ), ( '3879','4','6','1527956790','1527956790' ), ( '3880','4','71','1527956790','1527956790' ), ( '3881','4','72','1527956790','1527956790' ), ( '3882','4','93','1527956790','1527956790' ), ( '3883','4','94','1527956790','1527956790' ), ( '3884','4','10','1527956790','1527956790' ) ;
insert into `y_role_permission` VALUES  ( '3885','4','9','1527956790','1527956790' ), ( '3886','4','95','1527956790','1527956790' ), ( '3887','4','96','1527956790','1527956790' ), ( '3888','4','97','1527956790','1527956790' ), ( '3889','4','98','1527956790','1527956790' ), ( '3890','4','99','1527956790','1527956790' ), ( '3891','4','33','1527956790','1527956790' ), ( '3892','4','34','1527956790','1527956790' ), ( '3893','4','78','1527956790','1527956790' ), ( '3894','4','79','1527956790','1527956790' ), ( '3895','4','100','1527956790','1527956790' ), ( '3896','4','101','1527956790','1527956790' ), ( '3897','4','102','1527956790','1527956790' ), ( '3898','4','37','1527956790','1527956790' ), ( '3899','4','38','1527956790','1527956790' ), ( '3900','4','103','1527956790','1527956790' ), ( '3901','4','104','1527956790','1527956790' ), ( '3902','4','105','1527956790','1527956790' ), ( '3903','4','106','1527956790','1527956790' ), ( '3904','4','40','1527956790','1527956790' ), ( '3905','4','41','1527956790','1527956790' ), ( '3906','4','42','1527956790','1527956790' ), ( '3907','4','43','1527956790','1527956790' ), ( '3908','4','107','1527956790','1527956790' ), ( '3909','4','108','1527956790','1527956790' ), ( '3910','4','109','1527956790','1527956790' ), ( '3911','4','110','1527956790','1527956790' ), ( '3912','4','112','1527956790','1527956790' ), ( '3913','4','111','1527956790','1527956790' ), ( '3914','4','113','1527956790','1527956790' ), ( '3915','4','114','1527956790','1527956790' ), ( '3916','4','115','1527956790','1527956790' ), ( '3917','4','116','1527956790','1527956790' ), ( '3918','4','117','1527956790','1527956790' ), ( '3919','4','118','1527956790','1527956790' ), ( '3920','4','55','1527956790','1527956790' ), ( '3921','4','56','1527956790','1527956790' ), ( '3922','4','120','1527956790','1527956790' ), ( '3923','4','121','1527956790','1527956790' ), ( '3924','4','122','1527956790','1527956790' ), ( '3925','4','123','1527956790','1527956790' ), ( '3926','4','61','1527956790','1527956790' ), ( '3927','4','58','1527956790','1527956790' ), ( '3928','4','59','1527956790','1527956790' ) ;