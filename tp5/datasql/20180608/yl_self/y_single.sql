DROP TABLE IF EXISTS `y_single`;
CREATE TABLE `y_single` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `webtitle` varchar(255) DEFAULT NULL COMMENT '网站标题',
  `webkeys` varchar(255) DEFAULT NULL COMMENT '网站关键词',
  `webdesc` text COMMENT '网站描述',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `update_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='单页面信息表';
insert into `y_single` VALUES  ( '2','企业简介','企业简介1','企业简介','企业简介','<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介企业简介</p>','1527599946','1526468215','关于我们 / 企业简介' ), ( '3','企业文化','企业文化','企业文化','企业文化','<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化企业文化</p>','1526486632','1526468219','关于我们 / 企业文化' ), ( '4','联系我们','联系我们','联系我们','联系我们','<p style="outline: 0px; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " microsoft="" yahei="" font-size:="" white-space:=""><span style="font-size: 18px;">北京理事通科技发展有限公司</span><iframe class="ueditor_baidumap" src="http://localhost/luan_2018_3_22/2018_5.14_8_/tp5/public/static/admin/ueditor/dialogs/map/show.html#center=116.298373,40.155383&zoom=17&width=330&height=340&markers=116.298346,40.155307&markerStyles=l,A" frameborder="0" width="334" height="344" align="right"></iframe></p><p style="outline: 0px; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " microsoft="" yahei="" font-size:="" white-space:=""><span style="font-size: 18px;">电话：010-80707091 &nbsp;13811183641</span></p><p style="outline: 0px; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " microsoft="" yahei="" font-size:="" white-space:=""><span style="font-size: 18px;">传真：010-80707091</span></p><p style="outline: 0px; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " microsoft="" yahei="" font-size:="" white-space:=""><span style="font-size: 18px;">Q &nbsp;Q: 358688638&nbsp;</span></p><p style="outline: 0px; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " microsoft="" yahei="" font-size:="" white-space:=""><span style="font-size: 18px;">邮箱：<span style="font-size: 18px; outline: 0px;">358688638@qq.com</span></span></p><p style="outline: 0px; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " microsoft="" yahei="" font-size:="" white-space:=""><span style="font-size: 18px;">网址<span style="font-size: 18px; outline: 0px;">：http://www.lishitong.vip</span></span></p><p style="outline: 0px; margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " microsoft="" yahei="" font-size:="" white-space:=""><span style="font-size: 18px;">展厅地址：北京昌平区沙河青年创业大厦B座1602室</span></p><p><br/></p>','1526468697','1526468316','联系我们 / 联系我们' ) ;
