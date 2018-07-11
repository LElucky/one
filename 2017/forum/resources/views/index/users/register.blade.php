@include('index/layouts/header')

	<div class="hr tp-div-nexthr" style="margin-top: 0;margin-bottom: 0;padding: 0;"></div>
	<div class="container pb-15">
	<!-- Example row of columns -->
	<div class="row">
		<div class="span16">
			<div class="label-public-title t-30">
		    <ul class="clearfix">
				<li class="pull-left r-20 border-all"><a href="{{url('index/users/login')}}" title="登录">登录</a></li>
				<li class="pull-left selected border-all"><a href="javascript:start_form(),reg_valid();" title="注册" style="_padding: 0;">注册</a></li>
				</ul>
			</div>
			<div class="label-div t-15 border-all" style="padding: 0;">
				<div class="label-main">
					<div class="clearfix label-public pt-25">
						<div class="pull-left public-login span10" id="register-third" style="display: block;">
							<div class="fc333 l-30">使用社会化账号直接注册，无需填写任何资料，30秒完成注册</div>
							<div class="clearfix t-25 third-party l-30">
								<div class="pull-left sina-div r-10 b-10">
									<a class="ie6png" href="javascript:;">新浪微博</a>
								</div>
								<div class="pull-left tencent-div r-10 b-10">
									<a class="ie6png" href="javascript:;">腾讯微博</a>
								</div>
								<div class="pull-left renren-div r-10 b-10">
									<a class="ie6png" href="javascript:;">人人网</a>
								</div>
								<div class="pull-left linkin-div b-10">
									<a class="ie6png" href="javascript:;">LinkedIn</a>
								</div>
							</div>
							<p class="l-30 t-30 fc999">没有社会化账号？请使用<a href="javascript:start_form();"  title="邮箱注册" class="l-5 email-register-button">邮箱注册</a></p>
						</div>
                        <div class="clearfix" id="register-mail" style="display: none;">
							<form enctype="multipart/form-data" id="register-form" action="{{url('index/users/save')}}" method="post">							<div class="pull-left public-login span10">
								<div class="pl-25 fc333">没有社会化账号，使用邮箱账号注册</div>
								<div class="clearfix pl-25 pt-25">
									<div class="title pull-left fc999">昵称</div>
									<div class="pull-left l-20" style="_margin-left: 0;_width: 100px;"><input class="span4" class="form-control"  name="UcenterMember[username]" id="UcenterMember_account" type="text" maxlength="32" value="" placeholder='设置您的个性化昵称'/></div>
									<span class="pull-left l-20 fc999 info account_msg" id='username_reg'></span>
								</div>

								<div class="clearfix pl-25 pt-25">
									<div class="title pull-left fc999">密码</div>
									<div class="pull-left l-20" style="_margin-left: 0;_width: 100px;"><input type="password" id="UcenterMember_password1" name="UcenterMember[password1]" value="" class="span4" placeholder='密码最小值为6位'/></div>
									<span class="pull-left l-20 fc999 info password_msg" id='password1_reg'></span>
								</div>
								<div class="clearfix pl-25 pt-25">
									<div class="title pull-left fc999">确认密码</div>
									<div class="pull-left l-20" style="_margin-left: 0;_width: 100px;"><input type="password" id="UcenterMember_password2" name="UcenterMember[password2]" value="" class="span4" placeholder='请再次输入密码'/></div>
									<span class="pull-left l-20 fc999 info password_msg" id='password_reg1'></span>
								</div>
								
								<div class="clearfix pl-25 pt-25">
									<div class="title pull-left fc999">验证码</div>
									<div class="pull-left l-20" style="_margin-left: 0;_width: 100px;"><input type="text" value='' placeholder='请输入验证码'  style="float:left;width:105px" name='verify'/><img style="float:left;margin-left:20px;" src="{{url('index/captcha')}}" class='captcha_img' onclick='javascript:captcha()' id = 'register_captcha'/></div>
									<span class="pull-left l-20 fc999 info password_msg" id='captcha_reg'>
									</span>
								</div>
								
								
								
								
								<div class="clearfix pl-25 pt-25">
									<div class="title pull-left">&nbsp;</div>
									<div class="pull-left l-20 t-8" style="_width: auto;_margin-left: 15px;"><input type="checkbox" checked="checked" id='reg_condition' style="_width: 20px;_margin: 0;"/></div>
									<span class="pull-left l-5 info fc999" style="_width: auto;_margin: 0;">我已阅读并接受<a href="/agreement.html" title="生物探索服务条款协议" target="_blank">医疗器械创新网</a></span>
								</div>
								<div class="clearfix pl-25 pt-25 pb-30">
									<div class="title pull-left l-20" style="_margin-left: 10px;">&nbsp;</div>
									<a href="javascript:reg_validate();" title="注册" class="pull-left login-register-btn" id='register_a'>注&nbsp;册</a>
									<span class="pull-left l-20 info fc999" style="_width: auto;_margin: 0 0 0 10px;">社会化账号<a class="l-5 sina-register-button" href="javascript:void(0)" title="注册">注册</a></span>
								</div>
								{{csrf_field()}}
							</div>
							<div class="pull-left t-50 l-20">

								<div class="center t-10"></div>
							</div>
							</form>						
                          </div>
						 
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