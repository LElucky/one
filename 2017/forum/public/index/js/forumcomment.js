//评论的互相 传参
//id  ------------    所回复的评论的id    
//valueid	------    当前内容所属的最大的boos(当前评论的顶级评论id)
//userid    ------    被回复用户的userid
function recomment(id,valueid,userid){
	var username = $('#recomment_'+id).text();
	$('#to_userid'+valueid).val(userid);
	$('#commenttwo'+valueid).val('回复'+username+':');
	
}

//ajax添加一级评论
function forumcomment(id,valueid){
	var fid = $('[name=fid]').val();
	var to_userid = $('#to_userid'+valueid).val();
	var content = $('#commenttwo'+valueid).val();
	var path = $('#self_path').val();
	var _token = $('[name=_token]').val();
	var nick_name = $('#self_nick_name').val();
	$.ajax({
		type:'POST',
		url:path+'/index/forumcomment/savesom',
		data:{'_token':_token,'fid':valueid,'to_userid':to_userid,'content':content,'forumid':id},
		success:function(data){
			if(data == valueid){
				// window.alert(data);
				var id = $('[name=ul_li]').val();
				$(".j_lzl_m_w"+valueid).eq(-1).after("<li class='lzl_single_post j_lzl_s_p first_no_border'><img src='https://gss0.bdstatic.com/6LZ1dD3d1sgCo2Kml5_Y_D3/sys/portrait/item/f6b3636864313134390d'>&nbsp;&nbsp;"+nick_name+"&nbsp;&nbsp;:"+content+"<li>");
			}
		}
	})	
}

//论坛个人中心 显示我的全部评论
function togglecomment($id){
	$('#total_comment'+$id).toggle();
}
//论坛删除自己的评论
function delete_comment($id,$forumid){
	var path = $('#self_path').val();
	$.ajax({
		url:path+'/index/forumcomment/deletecomment',
		data:{'id':$id,'forumid':$forumid},
		success:function(data){
			if(data == 1){
				$('#commentforum_'+$id).css('display','none');
			}else{
				window.alert('系统异常');
			}
		}
	})
	
}