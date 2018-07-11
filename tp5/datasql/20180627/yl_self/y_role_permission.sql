DROP TABLE IF EXISTS `y_role_permission`;
CREATE TABLE `y_role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色Id',
  `permission_id` int(11) NOT NULL DEFAULT '0' COMMENT '权限ID',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4217 DEFAULT CHARSET=utf8 COMMENT='角色权限对应表';
insert into `y_role_permission` VALUES  ( '685','2','15','1526565438','1526565438' ), ( '686','2','18','1526565438','1526565438' ), ( '687','2','1','1526565438','1526565438' ), ( '688','2','14','1526565438','1526565438' ), ( '689','2','20','1526565438','1526565438' ), ( '690','2','5','1526565438','1526565438' ), ( '691','2','8','1526565438','1526565438' ), ( '692','2','32','1526565438','1526565438' ), ( '693','2','35','1526565438','1526565438' ), ( '694','2','44','1526565438','1526565438' ), ( '695','2','39','1526565438','1526565438' ), ( '696','2','49','1526565438','1526565438' ), ( '697','2','54','1526565438','1526565438' ), ( '698','2','60','1526565438','1526565438' ), ( '699','2','57','1526565438','1526565438' ), ( '700','2','16','1526565438','1526565438' ), ( '701','2','17','1526565438','1526565438' ), ( '702','2','19','1526565438','1526565438' ), ( '703','2','4','1526565438','1526565438' ), ( '704','2','3','1526565438','1526565438' ), ( '705','2','13','1526565438','1526565438' ), ( '706','2','12','1526565438','1526565438' ), ( '707','2','21','1526565438','1526565438' ), ( '708','2','22','1526565438','1526565438' ), ( '709','2','7','1526565438','1526565438' ), ( '710','2','6','1526565438','1526565438' ), ( '711','2','10','1526565438','1526565438' ), ( '712','2','9','1526565438','1526565438' ), ( '713','2','33','1526565438','1526565438' ), ( '714','2','34','1526565438','1526565438' ), ( '715','2','37','1526565438','1526565438' ), ( '716','2','38','1526565438','1526565438' ), ( '717','2','45','1526565438','1526565438' ), ( '718','2','46','1526565438','1526565438' ), ( '719','2','47','1526565438','1526565438' ), ( '720','2','48','1526565438','1526565438' ), ( '721','2','40','1526565438','1526565438' ), ( '722','2','41','1526565438','1526565438' ), ( '723','2','42','1526565438','1526565438' ), ( '724','2','43','1526565438','1526565438' ), ( '725','2','50','1526565438','1526565438' ), ( '726','2','51','1526565438','1526565438' ), ( '727','2','52','1526565438','1526565438' ), ( '728','2','53','1526565438','1526565438' ), ( '729','2','55','1526565438','1526565438' ), ( '730','2','56','1526565438','1526565438' ), ( '731','2','61','1526565438','1526565438' ), ( '732','2','58','1526565438','1526565438' ), ( '733','2','59','1526565438','1526565438' ), ( '1006','3','14','1527424605','1527424605' ), ( '1007','3','20','1527424605','1527424605' ), ( '1008','3','13','1527424605','1527424605' ), ( '1009','3','12','1527424605','1527424605' ), ( '1010','3','21','1527424605','1527424605' ), ( '1011','3','22','1527424605','1527424605' ), ( '2202','13','66','1527430609','1527430609' ), ( '2203','13','15','1527430609','1527430609' ), ( '2204','13','67','1527430609','1527430609' ), ( '2205','13','68','1527430609','1527430609' ), ( '2206','13','16','1527430609','1527430609' ), ( '2207','13','17','1527430609','1527430609' ), ( '2282','5','66','1527513857','1527513857' ), ( '2283','5','15','1527513857','1527513857' ), ( '2284','5','18','1527513857','1527513857' ), ( '2285','5','5','1527513857','1527513857' ), ( '2286','5','8','1527513857','1527513857' ), ( '2287','5','32','1527513857','1527513857' ), ( '2288','5','35','1527513857','1527513857' ), ( '2289','5','44','1527513857','1527513857' ), ( '2290','5','39','1527513857','1527513857' ), ( '2291','5','49','1527513857','1527513857' ), ( '2292','5','54','1527513857','1527513857' ), ( '2293','5','60','1527513857','1527513857' ), ( '2294','5','57','1527513857','1527513857' ), ( '2295','5','67','1527513857','1527513857' ), ( '2296','5','68','1527513857','1527513857' ), ( '2297','5','16','1527513857','1527513857' ), ( '2298','5','17','1527513857','1527513857' ), ( '2299','5','19','1527513857','1527513857' ), ( '2300','5','69','1527513857','1527513857' ), ( '2301','5','7','1527513857','1527513857' ), ( '2302','5','6','1527513857','1527513857' ), ( '2303','5','71','1527513857','1527513857' ), ( '2304','5','72','1527513857','1527513857' ), ( '2305','5','10','1527513857','1527513857' ), ( '2306','5','9','1527513857','1527513857' ), ( '2307','5','33','1527513857','1527513857' ), ( '2308','5','34','1527513857','1527513857' ), ( '2309','5','78','1527513857','1527513857' ), ( '2310','5','79','1527513857','1527513857' ), ( '2311','5','37','1527513857','1527513857' ), ( '2312','5','38','1527513857','1527513857' ), ( '2313','5','45','1527513857','1527513857' ), ( '2314','5','46','1527513857','1527513857' ), ( '2315','5','47','1527513857','1527513857' ), ( '2316','5','48','1527513857','1527513857' ), ( '2317','5','40','1527513857','1527513857' ), ( '2318','5','41','1527513857','1527513857' ), ( '2319','5','42','1527513857','1527513857' ), ( '2320','5','43','1527513857','1527513857' ), ( '2321','5','50','1527513857','1527513857' ), ( '2322','5','51','1527513857','1527513857' ), ( '2323','5','52','1527513857','1527513857' ), ( '2324','5','53','1527513857','1527513857' ), ( '2325','5','55','1527513857','1527513857' ), ( '2326','5','56','1527513857','1527513857' ), ( '2327','5','61','1527513857','1527513857' ), ( '2328','5','58','1527513857','1527513857' ), ( '2329','5','59','1527513857','1527513857' ), ( '2330','6','66','1527514310','1527514310' ), ( '2331','6','5','1527514310','1527514310' ), ( '2332','6','8','1527514310','1527514310' ), ( '2333','6','32','1527514310','1527514310' ), ( '2334','6','35','1527514310','1527514310' ), ( '2335','6','44','1527514310','1527514310' ), ( '2336','6','39','1527514310','1527514310' ), ( '2337','6','49','1527514310','1527514310' ), ( '2338','6','54','1527514310','1527514310' ), ( '2339','6','60','1527514310','1527514310' ), ( '2340','6','57','1527514310','1527514310' ), ( '2341','6','67','1527514310','1527514310' ), ( '2342','6','7','1527514310','1527514310' ), ( '2343','6','6','1527514310','1527514310' ), ( '2344','6','71','1527514310','1527514310' ), ( '2345','6','10','1527514310','1527514310' ), ( '2346','6','9','1527514310','1527514310' ), ( '2347','6','33','1527514310','1527514310' ), ( '2348','6','34','1527514310','1527514310' ), ( '2349','6','78','1527514310','1527514310' ), ( '2350','6','79','1527514310','1527514310' ), ( '2351','6','37','1527514310','1527514310' ), ( '2352','6','38','1527514310','1527514310' ), ( '2353','6','45','1527514310','1527514310' ), ( '2354','6','46','1527514310','1527514310' ), ( '2355','6','47','1527514310','1527514310' ), ( '2356','6','48','1527514310','1527514310' ), ( '2357','6','40','1527514310','1527514310' ), ( '2358','6','41','1527514310','1527514310' ), ( '2359','6','42','1527514310','1527514310' ), ( '2360','6','43','1527514310','1527514310' ), ( '2361','6','50','1527514310','1527514310' ), ( '2362','6','51','1527514310','1527514310' ), ( '2363','6','52','1527514310','1527514310' ), ( '2364','6','53','1527514310','1527514310' ), ( '2365','6','55','1527514310','1527514310' ), ( '2366','6','56','1527514310','1527514310' ), ( '2367','6','61','1527514310','1527514310' ), ( '2368','6','58','1527514310','1527514310' ), ( '2369','6','59','1527514310','1527514310' ), ( '4118','4','66','1530023753','1530023753' ), ( '4119','4','15','1530023753','1530023753' ), ( '4120','4','18','1530023753','1530023753' ), ( '4121','4','1','1530023753','1530023753' ), ( '4122','4','14','1530023753','1530023753' ), ( '4123','4','20','1530023753','1530023753' ), ( '4124','4','5','1530023753','1530023753' ), ( '4125','4','8','1530023753','1530023753' ), ( '4126','4','32','1530023753','1530023753' ), ( '4127','4','35','1530023753','1530023753' ), ( '4128','4','39','1530023753','1530023753' ), ( '4129','4','54','1530023753','1530023753' ), ( '4130','4','119','1530023753','1530023753' ), ( '4131','4','60','1530023753','1530023753' ), ( '4132','4','125','1530023753','1530023753' ), ( '4133','4','57','1530023753','1530023753' ), ( '4134','4','67','1530023753','1530023753' ), ( '4135','4','68','1530023753','1530023753' ), ( '4136','4','16','1530023753','1530023753' ), ( '4137','4','17','1530023753','1530023753' ), ( '4138','4','19','1530023753','1530023753' ), ( '4139','4','69','1530023753','1530023753' ), ( '4140','4','4','1530023753','1530023753' ), ( '4141','4','3','1530023753','1530023753' ), ( '4142','4','64','1530023753','1530023753' ), ( '4143','4','65','1530023753','1530023753' ), ( '4144','4','83','1530023753','1530023753' ), ( '4145','4','84','1530023753','1530023753' ), ( '4146','4','91','1530023753','1530023753' ), ( '4147','4','13','1530023753','1530023753' ), ( '4148','4','12','1530023753','1530023753' ), ( '4149','4','62','1530023753','1530023753' ), ( '4150','4','63','1530023753','1530023753' ), ( '4151','4','80','1530023753','1530023753' ), ( '4152','4','86','1530023753','1530023753' ), ( '4153','4','87','1530023753','1530023753' ), ( '4154','4','88','1530023753','1530023753' ), ( '4155','4','92','1530023753','1530023753' ), ( '4156','4','21','1530023753','1530023753' ), ( '4157','4','22','1530023753','1530023753' ), ( '4158','4','77','1530023753','1530023753' ), ( '4159','4','76','1530023753','1530023753' ), ( '4160','4','81','1530023753','1530023753' ), ( '4161','4','82','1530023753','1530023753' ), ( '4162','4','85','1530023753','1530023753' ), ( '4163','4','7','1530023753','1530023753' ), ( '4164','4','6','1530023753','1530023753' ), ( '4165','4','71','1530023753','1530023753' ), ( '4166','4','72','1530023753','1530023753' ), ( '4167','4','93','1530023753','1530023753' ), ( '4168','4','94','1530023753','1530023753' ) ;
insert into `y_role_permission` VALUES  ( '4169','4','10','1530023753','1530023753' ), ( '4170','4','9','1530023753','1530023753' ), ( '4171','4','95','1530023753','1530023753' ), ( '4172','4','96','1530023753','1530023753' ), ( '4173','4','97','1530023753','1530023753' ), ( '4174','4','98','1530023753','1530023753' ), ( '4175','4','99','1530023753','1530023753' ), ( '4176','4','33','1530023753','1530023753' ), ( '4177','4','34','1530023753','1530023753' ), ( '4178','4','78','1530023753','1530023753' ), ( '4179','4','79','1530023753','1530023753' ), ( '4180','4','100','1530023753','1530023753' ), ( '4181','4','101','1530023753','1530023753' ), ( '4182','4','102','1530023753','1530023753' ), ( '4183','4','37','1530023753','1530023753' ), ( '4184','4','38','1530023753','1530023753' ), ( '4185','4','103','1530023753','1530023753' ), ( '4186','4','104','1530023753','1530023753' ), ( '4187','4','105','1530023753','1530023753' ), ( '4188','4','106','1530023753','1530023753' ), ( '4189','4','40','1530023753','1530023753' ), ( '4190','4','41','1530023753','1530023753' ), ( '4191','4','42','1530023753','1530023753' ), ( '4192','4','43','1530023753','1530023753' ), ( '4193','4','107','1530023753','1530023753' ), ( '4194','4','108','1530023753','1530023753' ), ( '4195','4','109','1530023753','1530023753' ), ( '4196','4','110','1530023753','1530023753' ), ( '4197','4','112','1530023753','1530023753' ), ( '4198','4','111','1530023753','1530023753' ), ( '4199','4','113','1530023753','1530023753' ), ( '4200','4','114','1530023753','1530023753' ), ( '4201','4','115','1530023753','1530023753' ), ( '4202','4','116','1530023753','1530023753' ), ( '4203','4','117','1530023753','1530023753' ), ( '4204','4','118','1530023753','1530023753' ), ( '4205','4','55','1530023753','1530023753' ), ( '4206','4','56','1530023753','1530023753' ), ( '4207','4','124','1530023753','1530023753' ), ( '4208','4','120','1530023753','1530023753' ), ( '4209','4','121','1530023753','1530023753' ), ( '4210','4','122','1530023753','1530023753' ), ( '4211','4','123','1530023753','1530023753' ), ( '4212','4','61','1530023753','1530023753' ), ( '4213','4','126','1530023753','1530023753' ), ( '4214','4','127','1530023753','1530023753' ), ( '4215','4','58','1530023753','1530023753' ), ( '4216','4','59','1530023753','1530023753' ) ;