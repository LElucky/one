<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="zh-CN" />
	<script type="text/javascript" src="{{asset('index/js')}}/jquery1.4.js"></script>
	<title>医疗器械创新网</title>
	<meta name="Keywords" content="医疗器械创新网,医疗"/>
	<meta name="Description" content="医疗器械创新网,网站简介。"/>
	<!-- Le styles -->
	<link rel="stylesheet" type="text/css" href="{{asset('index/style')}}/basic.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('index/style')}}/index.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('index/style')}}/comment.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('index/style')}}/list1.css"/>
	<link rel='stylesheet' type='text/css' href="{{asset('index/style/index_self.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('index/style')}}/xm_write.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('index/style')}}/xmdata.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('index/style')}}/kun_center.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('index/style')}}/kun_right.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('index/bootstrap')}}/css/bootstrap_but.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('index/bootstrap')}}/css/bootstrap_form.css"/>
	<link rel="stylesheet" type="text/css" href="{{asset('index/bootstrap')}}/css/bootstrap.icon.css"/>
    
	
	<script type="text/javascript" src="{{asset('index/js')}}/bioV4.min.js"></script>
	<script type="text/javascript" src="{{asset('index/js')}}/register.js"></script>
	<script type="text/javascript" src="{{asset('index/js')}}/jquery.lazyload.mini.js"></script>
	<script type="text/javascript" src="{{asset('index/js')}}/function.js"></script>
	<script type="text/javascript" src="{{asset('index/js')}}/list.js"></script>
	<script type="text/javascript" src="{{asset('index/js')}}/project_self.js"></script>
	<script type="text/javascript" src="{{asset('index/js')}}/xmdata.js"></script>
	<script type="text/javascript" src="{{asset('index/js')}}/myself.js"></script>
	<script type="text/javascript" src="{{asset('index/js')}}/forumcomment.js"></script>
	
	
	
	
	
	
	
	
	<script charset="utf-8" src="{{asset('index/kindeditor')}}/kindeditor-all-min.js"></script>
	<script charset="utf-8" src="{{asset('index/kindeditor')}}/kindeditor-all.js"></script>
	<script charset="utf-8" src="{{asset('index/kindeditor')}}/lang/zh-CN.js"></script>
	<script charset="utf-8" src="{{asset('index/kindeditor')}}/plugins/code/prettify.js"></script>
	<link rel="stylesheet" href="{{asset('index/kindeditor')}}/themes/default/default.css" />
	<link rel="stylesheet" href="{{asset('index/kindeditor')}}/plugins/code/prettify.css" />
	
	
	
	
	<!--[if IE 6]>
	<script type="text/javascript" src="js/DD_belatedPNG.js"></script>
	<script type="text/javascript">
	DD_belatedPNG.fix('img,.ie6png');
	</script>
	<![endif]--> 
	<link type="text/css" rel="stylesheet" href="{{asset('index/style')}}/biobox2.css" />
	<script type="text/javascript" src="{{asset('index/js')}}/biobox.js"></script>
 
	
</head>
<body>
<script type="text/javascript" src="{{asset('index/js')}}/borsertocss.js"> </script><!-- 判断在IE9以下浏览器中根据像素的不同而设置的样式 -->		


 <!--头部代码开始-->

<div class="navbar navbar-fixed-top" style="_position: relative;_z-index: 10000;">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="nav-collapse">
					<ul class="nav" id="navID">
                    	<li>
                    		<a href="#" style="margin:0px; padding:0px;">
                    			<img src="{{asset('index/images')}}/logo.jpg" width="70" height="38" alt="" />
                    		</a>	
                    	</li>
                        <li class="active"><a href="{{url('/')}}"><b>首页</b></a></li>
						<li class=""><a href="{{url('index/forum/forum')}}"><b>论坛</b></a></li>
						<li class=""><a href="{{url('index/question/index')}}"><b>问答</b></a></li>				
	               		<li>
	               			<form action="?" method="get" style="margin:0px; padding:5px;"> 
            					<input id="search-input" type="text" class="search-input pull-left span4" value=""/>
            					<a href="javascript:void(0);" style="margin:5px; padding:0px 0 0 0;width:35px;" title="搜索" class="search-btn-css pull-left search-btn"></a>
                            </form>	
	               		</li>
	               		
	               		
					</ul>
                  
					
				</div><!--/.nav-collapse -->
				<ul class="nav pull-right login-none nav-tips">

	</ul>
<div class="popup-div tips-div" style="position: absolute;z-index: 10000001;display: none;"></div>
<script type="text/javascript">
var tip_show = 1;
//头部下拉
var timer1 = "";
$('#dropdownID-0').hover(function(){
	var obj = $(this);
	if(timer1)
	{
		clearTimeout(timer1);
	}
	timer1 = setTimeout(function(){
		obj.find('.dropdown-menu').show();
		tip_show = 0;
		$(".tips-div").hide();
		obj.find('.other-icon').css({"background":"#2E2E2E"});
	}, 500);
},function(){
	var obj = $(this);
	if(timer1)
	{
		clearTimeout(timer1);
	}
	timer1 = setTimeout(function(){
		obj.find('.dropdown-menu').hide();
		$(".tips-div").hide();
		tip_show = 1;
		getTips();
		obj.find('.other-icon').css({"background":"none"});
	}, 500);
});

var timer2 = "";
$('#dropdownID-1').hover(function(){
	var obj = $(this);
	if(timer2)
	{
		clearTimeout(timer2);
	}
	timer2 = setTimeout(function(){
		obj.find('.dropdown-menu').show();
		tip_show = 0;
		$(".tips-div").hide();
		obj.find('.other-icon').css({"background":"#2E2E2E"});
	}, 500);
},function(){
	var obj = $(this);
	if(timer2)
	{
		clearTimeout(timer2);
	}
	timer2 = setTimeout(function(){
		obj.find('.dropdown-menu').hide();
		tip_show = 1;
		getTips();
		$(".tips-div").hide();
		obj.find('.other-icon').css({"background":"none"});
	}, 500);
});
</script>	   


<ul class="nav pull-right pl-20 myul">
	<li class=""><a href="{{url('index/forum/issuc')}}">发帖</a></li>
	<li class=""><a href="{{url('index/question/issue')}}">提问</a></li>
	<li class=""><a href="#">关注</a></li>
@if(!Session::has('usersid'))
    <li class=""><a href="{{url('index/users/register')}}" >注册</a></li>
    <li class="l10"><a href="{{url('index/users/login')}}">登录</a></li>
@else
	<li class=''><a href="{{url('index/users/center/' . session('usersid'))}}">你好, @if(session('nick_name') == '') {{Session::get('usersname')}} @else {{session('nick_name')}} @endif</a></li>
    <li class="l10"><a href="{{url('index/users/logout')}}">退出</a></li>
@endif
</ul>
				
	     </div>
		</div>
	</div>
	

<script type="text/javascript">
	$(function(){
		var Interval_control = '';
		var current_index = 0;
		show_pic_ad = function(index){
			$(".top-ad .pull-left").each(function(i){
				$(this).hide();
				if(i == index){

					$(this).show(); 
				}
			});
		};
		show_point_ad = function(index){
			$(".top-ad .slides-ad-point a").each(function(i){
				if($(this).hasClass("icon-css-on")){
					$(this).removeClass("icon-css-on");
					$(this).addClass("icon-css");
				}
				if(i == index){
					if($(this).hasClass("icon-css")){
						$(this).removeClass("icon-css");
					}
					$(this).addClass("icon-css-on");
				}
			});
		};
		slides = function(){
			$(".slides-ad-point a").each(function(index){
				$(this).click(function(){
					current_index = index;
					show_point_ad(index);
					show_pic_ad(current_index);
				});
			});
		};
		slides();
		Interval_control = setInterval(function(){
			show_point_ad(current_index);
			show_pic_ad(current_index);
			if (current_index == ($(".slides-icon-ad a").length - 1)){
				current_index = -1;
			}
			current_index ++;
		},5000);//设置自动切换函数
		//当触发mouseenter事件时，取消正在执行的自动切换方法，触发mouseouter事件时重新设置自动切换
		$(".top-ad .pull-left").mouseenter(function() {
			clearInterval(Interval_control);//停止自动切换
		}).mouseleave(function(){
			Interval_control = setInterval(function(){
				show_point_ad(current_index);
				show_pic_ad(current_index);
				if (current_index == ($(".top-ad .pull-left").length - 1)){
					current_index = -1;
				}
				current_index ++;
			},5000);//设置自动切换函数
		});
	});
</script>

{{--js 获取绝对路径--}}
<input type='hidden' id='self_path' value='{{url("")}}'>
{{-- 要登录用户的名字 --}}
<input type='hidden' id='self_nick_name' value='{{session("nick_name")}}'>

<!--头部代码结束-->