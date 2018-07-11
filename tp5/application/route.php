<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
//后天首页
Route::rule('admin.php','admin/admin/login');
//后台登录模块
Route::group('a',[
	'login'      => ['admin/admin/login',['method' => 'get']],
	'validlogin' => ['admin/admin/Validlogin',['method' => 'post']],
	'logout'      => ['admin/admin/logout',['method' => 'get']],
]);
//后台首页页面
Route::group('i',[
	'index'      => ['admin/index/index',['method' => 'get']],
	'base'      => ['admin/index/base',['method' => 'get']],
	'config'      => ['admin/index/config',['method' => 'get']],
]);
//用户管理模块
Route::group('u',[
	'deleuser' =>['admin/auser/deleuser',['method' => 'get'],['id' => '\d+']],
	'uedit' =>['admin/auser/uedit',['method' => 'get'],['id' => '\d+']],
	'usave' =>['admin/auser/usave',['method' => 'post']],
	'astatus' =>['admin/auser/ajax_status',['method' => 'post']],
]);
//角色 用户管理模块
Route::group('r',[
		'rstatus' => ['admin/role/ajax_status',['method'=>'post']],
		'rsave' => ['admin/role/rsave',['method'=>'post']],
		'deleuser' =>['admin/role/deleuser',['method' => 'get'],['id' => '\d+']],
		'redit' =>['admin/role/redit',['method' => 'get'],['id' => '\d+']],
		'permission_edit' => ['admin/role/permission',['method' => 'get'],['id' => '\d+']],
		'sortnum' => ['admin/role/sortnum',['method' => 'post']],
]);



//前台页面
Route::rule('/','Index/index/index');
//前台路由匹配规则
Route::group('o',[
	//关于我们
		'a' => ['Index/about/index',['method'=>'get']],
		'ab' => ['Index/about/cultural',['method'=>'get']],
	//产品首页	
		'p' => ['Index/products/index',['method'=>'get'],['id'=>'\d+']],

		'f' => ['Index/products/type',['method'=>'get'],['id'=>'\d+']],
	//产品详情页	
		'd' => ['Index/products/productsinfo',['method'=>'get'],['id' => '\d+']],
	//案例页	
		'c' => ['Index/cases/index',['method'=>'get'],['id'=>'\d+']],
	//案例详情页
		's' => ['Index/cases/info',['method' => 'get'] ,['id' => '\d+']],	
	//新闻页	
		'n' => ['Index/news/index',['method'=>'get']],
	//新闻详情页
		'z' => ['Index/news/info' , ['method' => 'get'] ,['id' => '\d+']],	
		'x' => ['Index/download/index',['method'=>'get']],
		'l' => ['Index/contact/index',['method'=>'get']],
]);
