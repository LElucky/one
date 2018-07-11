//ajax 判断 用户名是否-->弃用 暂时
function confirmation_username1(){
	var username = $('#username').val();
	var path = $('#self_path').val();
	$.ajax({
		url:path+"/index/users/confirmation_username/"+username,
		success:function(data){
			if(data == 1){
				$('#username_login').text('');
			}else{
				$('#username_login').text('账号异常');
			}
		}
	})
}


//ajax 判断密码是否正确  必须配合 上面 confirmation_username 使用
function confirmation_password1(){
	var password = $('#password').val();
	var username = $('#username').val();
	var path     = $('#self_path').val();
	if($('#loginChecked').prop('checked') == true){
		var checked = '1';
	}else{
		var checked = '0';
	}
	$.ajax({
		url:path+"/index/users/confirmation_password",
		data:{'username':username,'password':password,'checked':checked},
		success:function(data){
			if(data == 1){
				$('#password_login').text('');
				self.location = path;
			}else{
				$('#username_login').text('账号或密码异常');
//				$('#password_login').text('密码异常');
			}
		}
	})
}

function confirmation_captcha1(){
	//验证码校验
		var captcha = $('[name=verify]').val();
		var path = $('#self_path').val();
		$.ajax({
			url:path+'/index/users/captchaValid/'+captcha,
			success:function(data){
				if(data == 'OK'){
					$('#captcha_login').text('校验成功');
					login_flow();
				}else{
					$('#captcha_login').text('校验失败');
				}
			}
		})
}





//点击登录->验证验证码 ->验证码正确后  走login_flow()方法   验证用户名  密码 
function submit_form(){
	confirmation_captcha1();
}


//登录验证码检测完成后的所有流程
function login_flow(){

	$(function(){
		
		if($('#password').val() == ''){
			$('#password').focus();
		}
		if($('#username').val() == ''){
			$('#username').focus();
			$('#username_login').text('账号异常');
		}else{
			$('#username_login').text('');
		}
		//账号失去焦点 后    错误 的提示语
		$('#username').blur(function(){
			if($('#username').val() == ''){
				$('#username').focus();
				$('#username_login').text('账号异常');
			}else{
				$('#username_login').text('');
			}
		})
		//密码失去焦点后  不正确的提示语
		$('#password').blur(function(){
			if($('#password').val() == ''){
				$('#password').focus();
				$('#password_login').text('密码异常');
			}else{
				$('#password_login').text('');
			}
		})
//			confirmation_username1();
			confirmation_password1();
	})

}

//用修改页面
function user_d(){
  $('#user_info').toggle();
  $('#user_edit').toggle();
}


//forumcenter 用户取消关注功能
function carenum(id) {
  var path = $('#self_path').val();
  $.ajax({
    url: path + "/index/careforum/carenum/" + id,
    success: function(data) {
      if(data == 3) {
        $('#Mycare' + id).toggle();
      }
      if(data == 0) {
        window.alert('操作失败');
      }
      if(data == 2) {
        window.alert('请登录在进行操作');
      }
    }
  })
}


//forumcenter 用户删除我的帖子的功能
function deleteforum(id) {
    var path = $('#self_path').val();
    $.ajax({
      type: 'GET',
      url: path + '/index/forum/delete/' + id,
      data: {
        'id': id
      },
      success: function(data) {
        if(data == 1) {
          $('.live' + id).toggle();
        } else {
          window.alert('系统繁忙 稍后重试');
        }
      }
    });
  }


  //forumcenter 取消收藏功能
  function carequxiao($id) {
  var path = $('#self_path').val();
  $.ajax({
    url: path + "/index/forum/like/" + $id,
    success: function(data) {
      if(data == 0) {
        $('.live' + $id).toggle();
      } else {
        window.alert('系统繁忙 稍后重试');
      }

    }
  })
}