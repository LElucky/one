@include('index/layouts/header')

<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });

</script>
<div class='container'>


	<form id="replay_form" method="post" action="{{url('index/question/doReplayRe/' . $replay['id'])}}">
		<table >
			<tr>
				<td></td>
				<td id='input_subject'>
				</td>
				<td></td>
			</tr>
		
			<tr>
				<td></td>
				<td>
      				<textarea id="editor_id" name="content" style="width:850px;height:300px;"></textarea>
				</td>
				<td></td>
			</tr>
		

			<tr>
				<td></td>
				<td>
					{{csrf_field()}}
					<input type="hidden" name="questionId" value="{{$replay['question_id']}}">
					<input type="hidden" name="toUsersId" value="{{$replay['from_user_id']}}">
					<input type="hidden" name="fromUsersId" value="{{session('usersid')}}">
					<input type="hidden" name="commentId" value="{{$replay['comment_id']}}">
					<a href="{{url('index/question/replayDetail/' . $replay['comment_id'])}}" class='btn btn-info' style='float:right; margin:10px;'>取消回复</a>
					<input type="submit" value="回复" class='btn btn-info' style='float:right; margin:10px;'/>
				</td>
				<td>
				</td>
			</tr>
			
		</table>
	</form>
	</div>
</div>
@include('index/layouts/footer')