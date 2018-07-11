@include('index/layouts/header')
<script>
    KindEditor.ready(function(K) {
            window.editor = K.create('#editor_id');
    });
</script>
<!-- 整体 div -->
<div class='container'>
<!-- 	表单 -->
	<form name="example" method="post" action="{{url('index/question/store/' . session('usersid'))}}" class="form-search" style=''>
		<table >
			<tr>
				<td></td>
				<td id='input_subject'>
					<div class="input-prepend">
  						<span class="add-on">问题标题</span>
  						<input class="span5" id="prependedInput" type="text" placeholder="请输入你的问题" style='width:770px;' name='qname'>		
  						{{csrf_field()}}
  						
					</div>		
				</td>
				<td></td>
			</tr>
		
			<tr>
				<td></td>
				<td>
      				<textarea placeholder="可选:问题背景,条件等详细信息" id="editor_id" name="description" style="width:850px;height:300px;"></textarea>
				</td>
				<td></td>
			</tr>
		
			<tr>
				<td></td>
				<td>
					<input type="submit"  value="确认提问" class='btn btn-info' style='float:right; margin:10px;'/>
				</td>
				<td></td>
			</tr>
			
		</table>
	</form>
</div>

@include('index/layouts/footer') 
