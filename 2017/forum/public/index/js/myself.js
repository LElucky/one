function addComment()
{
	var comment = $('#data_content').val();
	var userid =  $('#data_content').attr('data-userid');
	var questionid = $('#data_content').attr('data-id');
	var url = $('#url').val();
	$.ajax({
		url: url + '/index/question/add',
		type: 'get',
		data: {'comment':comment, 'userid':userid, 'questionid':questionid},
		success: function(re){
			alert('添加成功');
		},
		error: function(re){
			alert('no');
		}

	})
}

function replay(id)
{
	var replayComment = $('.comment_reply_comment_' + id);
	var questionid = replayComment.attr('data-questionid');
	var toid = replayComment.attr('data-toid');
	var fromid =replayComment.attr('data-fromid');
	var url = $('#url').val();
	replayComment.click(function(){
		var replayContent = prompt('你想要回复什么?');
		$.ajax({
			url: url + '/index/question/replay/' + id,
			type: 'get',
			data: {questionid:questionid, toid:toid, fromid:fromid, replayContent:replayContent},
			success: function(re) {
				alert(re);
			},
			error: function(re) {
				alert(re);
			}
		})

	});
}

// 收藏
function collection(id)
{
	var questionid = $('.collection').attr('data-questionid');
	var url = $('.collection').attr('data-url');
	var collectionNum = $('.collectionNum').text();
	$.ajax({
		url: url + '/index/question/collection/' + id,
		type: 'get',
		data: {questionid:questionid},
		success: function(re) {
			if (re > collectionNum) {
				text = '';
				num = '';
				text += "<span id='collection'>取消收藏</span>";
				num += "<a class='follow-btn pr-10 ie6png collectionNum' href='javascript:void(0);' title='"+re+"人收藏' data-id='104417' data-type='news'>"+re+"</a>";
				$('#collection').replaceWith(text);
				$('.collectionNum').replaceWith(num);
			} else {
				text = '';
				num = '';
				text += "<span id='collection'>收藏</span>";
				num += "<a class='follow-btn pr-10 ie6png collectionNum' href='javascript:void(0);' title='"+re+"人收藏' data-id='104417' data-type='news'>"+re+"</a>";
				$('#collection').replaceWith(text);
				$('.collectionNum').replaceWith(num);
			}
		},
		error: function(re) {
			alert('no');
		}
	})
}

// 关注用户
function concerns_it(id)
{
	var url = $('#concerns_it').attr('data-url');
	var sex = $('#concerns_it').attr('data-sex');
	$.ajax({
		url: url + '/index/users/concernsIt/' + id,
		type: 'get',
		data: {sex:sex},
		success: function(re) {
			$('#concernsIt').replaceWith(re);
		},
		error: function(re) {
			alert(typeof(re));
		}
	})
}
