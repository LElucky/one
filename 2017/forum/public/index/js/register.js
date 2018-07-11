
		//注册基本验证

function username_verify(){
	var username = $('#UcenterMember_username').val();
	var reg_username = /^[a-zA-Z0-9]{6,9}$/;
	if(reg_username.test(username) == false){
		$('#username_reg').text('昵称不合法');
	}else{
		$('#username_reg').text('设置您的个性昵称');
			password_verify();
	}
}				
	
		
//密码验证
function password_verify(){
	var password1 = $('#UcenterMember_password1').val();
	var reg_password1 = /^[a-zA-Z0-9]{6,9}/;
	if(reg_password1.test(password1) == false){
		$('#password1_reg').text('密码不合法');
	}else{
		$('#password1_reg').text('密码最小值为6位（字母区分大小写）');
			password_verify1();
	}
}
		
		
//密码相同验证
function password_verify1(){
	var password2 = $('#UcenterMember_password2').val();
	var password1 = $('#UcenterMember_password1').val();
	if(password1 != password2){
		$('#password_reg1').text('两次密码不相同');
	}else{
		$('#password_reg1').text('密码一致');
		confirmation_username();
		
	}
};
					

function captcha1(){
		var captcha = $('[name=verify]').val();
		var path = $('#self_path').val();
		
		$.ajax({
			url:path+'/index/users/captchaValid/'+captcha,
			success:function(data){
				if(data == 'OK'){
					$('#captcha_reg').text('校验成功');
					username_verify();
				}else{
					$('#captcha_reg').text('校验失败');
				}
			}
		})
}	






//显示/隐藏->注册form表单
function start_form(){
	$('#register-mail').toggle();
	$('#register-third').toggle();
	$('#UcenterMember_account').focus();
}



//表单提交的验证 用户名是否存在
function reg_validate(){
	//验证注册条件单选框
	if(!$('#reg_condition').attr('checked')){
		window.alert('请勾选注册条款协议');
	}else{
		captcha1();
		
	}
}


//ajax 判断 用户名是否
function confirmation_username(){
	var username = $('#UcenterMember_account').val();
	var path = $('#self_path').val();
	$.ajax({
		url:path+"/index/users/confirmation_username/"+username,
		success:function(data){
			if(data == 1){
				$('#username_reg').text('用户名已存在');
			}else{
				$('#register-form').submit();	
			}
		}
	});
}



	
//点击验证码  刷新
function captcha(){
	var path = $('#self_path').val();
	$('#register_captcha').attr('src',path+"/index/captcha?="+Math.random());
}



				