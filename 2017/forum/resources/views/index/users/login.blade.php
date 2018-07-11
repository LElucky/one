@include('index/layouts/header')
 
  	    
	<div class="hr tp-div-nexthr" style="margin-top: 0;margin-bottom: 0;padding: 0;"></div>
	<div class="container pb-15">
	<!-- Example row of columns -->
	<div class="row">
		<div class="span16">
			<div class="label-public-title t-30">
				<ul class="clearfix">
					<li class="pull-left selected border-all r-20"><a href="javascript:;" title="登录" style="_padding: 0;">登录</a></li>
					<li class="pull-left border-all"><a href="{{url('index/users/register')}}" title="注册">注册</a></li>
				 
				</ul>
			</div>
			<div class="label-div t-15 border-all" style="padding: 0;">
				<div class="label-main">
					<div class="clearfix label-public">
						<div class="pull-left third-party l-30 pt-25">
							<div class="fc333">
							


							社会化账号直接登录

							</div>
							<div class="clearfix t-25">
								<div class="pull-left sina-div r-10 b-10" style="_width: 110px;">
									<a class="ie6png" href="/oauth/sina.html?url=aHR0cDovL3d3dy5iaW9kaXNjb3Zlci5jb20vZG9jdW1lbnQuaHRtbA%3D%3D">新浪微博</a>
								</div>
								<div class="pull-left tencent-div r-10 b-10" style="_width: 110px;">
									<a class="ie6png" href="/oauth/qq.html?url=aHR0cDovL3d3dy5iaW9kaXNjb3Zlci5jb20vZG9jdW1lbnQuaHRtbA%3D%3D">腾讯微博</a>
								</div>
								<div class="pull-left renren-div r-10 b-10" style="_width: 110px;">
									<a class="ie6png" href="/oauth/renren.html?url=aHR0cDovL3d3dy5iaW9kaXNjb3Zlci5jb20vZG9jdW1lbnQuaHRtbA%3D%3D">人人网</a>
								</div>
								<div class="pull-left linkin-div b-10" style="_width: 110px;">
									<a class="ie6png" href="/oauth/linkin.html?url=aHR0cDovL3d3dy5iaW9kaXNjb3Zlci5jb20vbG9naW4uaHRtbD91cmw9YUhSMGNEb3ZMM2QzZHk1aWFXOWthWE5qYjNabGNpNWpiMjB2Wkc5amRXMWxiblF1YUhSdGJBJTNEJTNE">LinkedIn</a>
								</div>
							</div>
							<p class="fc999" style="max-width: 470px;">欢迎加入生物探索，这里有最新的资讯、丰富的产品、贴心的服务，还有你正在寻找的圈子和朋友。</p>
						</div>
						<form id="login_form1" action="{{url('index/users/loginInfo')}}" method="post">	
						<div class="pull-left border-l public-login span7" style="min-height: 385px;">
							<div class="t-25 pl-30 fc333">
							@if(Session::has('message'))
							{{Session::get('message')}}
							@else
							没有社会化账号，使用邮箱账号登录
							@endif
							</div>
							<div class="clearfix pt-25">
								<div class="title pull-left fc999" style="width: 60px;">用户名</div>
								<div class="pull-left l-20" style="_margin-left: 0;width: 100px;"><input type="text" id="username" name="Login[username]" value="" class="span4" 
								placeholder='请输入账号'/>
									<span id='username_login'>
										@if(Session::has('userinfo'))
										{{Session::get('userinfo')}}
										@endif
									</span>
								</div>
								<span class="pull-left l-20 fcCF261F info username_msg"></span>
							</div>
							<div class="clearfix pt-25">
								<div class="title pull-left fc999" style="width: 60px;">密码</div>
								<div class="pull-left l-20" style="_margin-left: 0;width: 100px;"><input type="password" id="password" name="Login[password]" value="" class="span4" placeholder='请输入密码'/></div>
								<span id='password_login'></span>
							</div>

							
							<div class="clearfix pt-25">
								<div class="title pull-left fc999" style="width: 60px;">验证</div>
								<div class="pull-left l-20" style="_margin-left: 0;width: 100px;">
									<input type="text" class="span4" style='width:110px;'  name='verify' placeholder='请输入验证码'/>
									<img src='{{url("index/captcha")}}' class='login_captcha' class='captcha_img' onclick='javascript:captcha()' id='register_captcha' />
									<span id='captcha_login'>
										@if(Session::has('captcha'))
										{{Session::get('captcha')}}
										@endif
										
									</span>
								</div>
								<div class="pull-left l-20 fcCF261F info password_msg"></div>
							</div>




							
							
							
							<div class="clearfix pt-25">
							{{csrf_field()}}
								<div class="title pull-left" style="margin-left: 6px;_margin-left: 3px;">&nbsp;</div>
								
<script>

</script>
								<input type='submit' value='登录' class="pull-left login-register-btn">
								
								<div class="pull-left l-20 t-8" style="_width: auto;_margin-left: 15px;"><input type="checkbox" name="remember" checked="checked" style="_width: 20px;_margin: 0;"/></div>
								<span class="pull-left l-5 info fc999" style="_width: auto;_margin: 0;">七天免登录<!-- <span class="l-10 fcccc">|</span><a class="fc999 l-10" href="" title="忘记密码">忘记密码</a> --></span>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





<!-- /container -->
 <div class="container">
 
 	<div class="hr"></div>
    
    </div>
  
<!-- /container -->


	</div>
     
 
@include('index/layouts/footer')