<!doctype html>
<html class="no-js">
<head>
<title>论坛后台管理系统</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="这是一个 index 页面">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="icon" type="image/png" href="{{asset('admin')}}/i/favicon.png">
<link rel="apple-touch-icon-precomposed" href="{{asset('admin')}}/i/app-icon72x72@2x.png">
<link rel="stylesheet" href="{{asset('admin')}}/css/amazeui.min.css" />
<link rel="stylesheet" href="{{asset('admin')}}/css/admin.css">
<link rel="stylesheet" href="{{asset('admin')}}/css/myself.css" />
<link rel="stylesheet" href="{{asset('admin')}}/css/bootstrap.min.css" />

<script src="{{asset('admin')}}/js/jquery.min.js"></script>
<script src="{{asset('admin')}}/js/forum_self.js"></script>
<script src="{{asset('admin')}}/js/amazeui.min.js"></script>
<script src="{{asset('admin')}}/js/app.js"></script>
<script src="{{asset('admin')}}/js/question.js"></script>


<script charset="utf-8" src="{{asset('admin/kindeditor')}}/kindeditor-all-min.js"></script>
<script charset="utf-8" src="{{asset('admin/kindeditor')}}/kindeditor-all.js"></script>
<script charset="utf-8" src="{{asset('admin/kindeditor')}}/lang/zh-CN.js"></script>
<script charset="utf-8" src="{{asset('admin/kindeditor')}}/plugins/code/prettify.js"></script>
<link rel="stylesheet" href="{{asset('admin/kindeditor')}}/themes/default/default.css" />
<link rel="stylesheet" href="{{asset('admin/kindeditor')}}/plugins/code/prettify.css" />










</head>
<body>
	<header class="am-topbar admin-header">
		<div class="am-topbar-brand">
			<strong>论坛</strong> <small>后台管理系统</small>
		</div>

		<button
			class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
			data-am-collapse="{target: '#topbar-collapse'}">
			<span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span>
		</button>

		<div class="am-collapse am-topbar-collapse" id="topbar-collapse">

			<ul
				class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
				<li><a href="javascript:;"><span class="am-icon-envelope-o"></span>
						收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
				<li class="am-dropdown" data-am-dropdown>
					<a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
						<span class="am-icon-users"></span>{{session('username')}} <span class="am-icon-caret-down"></span>
					</a>
					<ul class="am-dropdown-content">
						<li><a href="#"><span class="am-icon-user"></span> 资料(未启用)</a></li>
						<li><a href="#"><span class="am-icon-cog"></span> 设置(未启用)</a></li>
						<li><a href="{{url('admin/ausers/logout')}}"><span class="am-icon-power-off"></span> 退出</a></li>
					</ul>
				</li>
				<li><a href="javascript:;" id="admin-fullscreen"><span
						class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
			</ul>
		</div>
	</header>