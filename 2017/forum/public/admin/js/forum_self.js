function recommended(id){
	$(function(){
		var path = $('#self_path').val();
		$.ajax({
			url:path+'/admin/forum/recommended/'+id,
			success:function(data){
				if(data == 1){
					$('#img_'+id).attr('src',path+'/admin/ausers/images/3.png');
					}else{
					$('#img_'+id).attr('src',path+'/admin/ausers/images/4.png');
						}
			}
		})
	})
}
