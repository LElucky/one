@include('admin.layouts.header')
@include('admin.layouts.left')

<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });


</script>

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">论坛</strong> / <small>编辑</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> <a href='{{url("admin/forum/oper")}}'>首页</a></button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> <a href='{{url("admin/forum/add")}}'>新增</a></button>

              <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> <a href='{{url("admin/ftype/oper")}}'>分类管理</a></button>
            </div>

            <div class="am-form-group am-margin-left am-fl">

            </div>
          </div>
        </div>
      </div>
      <div class="am-u-md-3 am-cf">
        <div class="am-fr">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field">
                <span class="am-input-group-btn">
                  <button class="am-btn am-btn-default" type="button">搜索</button>
                </span>
          </div>
        </div>
      </div>
    </div>







<!-- 	表单 -->
	<form id='admin_addforum' method="post" action="{{url('admin/forum/editSave',['id'=>$forumOne->id])}}" class="form-search" >
		<table >
			<tr>
				<td style='width:80px;'><h5 style='width:80px;'>标题:</h5> </td>
				<td id='input_subject'>
					<input type='text' class='span3' style='width:1220px;' value='{{$forumOne->subject}}' name='subject'>	
				</td>
				<td></td>
			</tr>{{csrf_field()}}
		
			<tr>
				<td><h5>分类:</h5></td>
				<td id='input_subject'>
					<select class='span5' style='width:1220px;' name='typestr'>
						{!!$type!!}
					</select>	
				</td>
				<td></td>
			</tr>
		
			
			<tr>
				<td><h5>内容:</h5></td>
				<td>
      				<textarea id="editor_id" name="content" style="width:1220px;height:300px;">{{$forumOne->content}}</textarea>
				</td>
				<td></td>
			</tr>
		
			<tr>
				<td></td>
				<td><input type="submit"  value="提交内容" class='btn btn-info' style='float:right; margin:10px;'/></td>
				<td>
				</td>
			</tr>
			
		</table>
	</form>




















@include('admin/layouts/footer')