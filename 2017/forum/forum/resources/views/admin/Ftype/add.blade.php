@include('admin/layouts/header')
@include('admin/layouts/left')
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">论坛</strong> / <small>分类</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">
            <div class="am-btn-group am-btn-group-xs">
             <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> <a href='{{url("admin/forum/oper")}}'>论坛首页</a></button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> <a href='{{url("admin/ftype/add")}}'>新增</a></button>
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

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form" method='post' action='{{url("admin/ftype/save")}}' enctype='multipart/form-data'>
          <table  class="am-table am-table-striped am-table-hover table-main">
            <thead >
              <tr >
              	<td>所属分类</td>
              	<td>
					<select name='fid'>
						<option value='0'>顶级分类</option>
						{!!$type!!}
					</select>
				</td>
				<td></td>
              </tr>
          </thead>
          <tbody>
          
          
            <tr>
              <td>分类名称</td>
              <td><input type='text' name='typename'></td>
             
              <td>
               
              </td>
              <td></td>
            </tr>
            
            
            <tr>
            	<td>贴吧头像</td>
            	<td><input type='file' name='image'></td>
            	<td></td>
            	
            </tr>
            
            
            
            <tr>
            	<td></td>
            	<td><input type='submit' class='btn btn-info' value='添加' style='width:80px;'></td>
            	<td>{{csrf_field()}}</td>
            </tr>
            
            
          </tbody>
        </table>

          <hr />
          <p>
          	@if(Session::has('message'))
          	{{Session::get('message')}}
          	@endif
          </p>
        </form>
      </div>

    </div>
  </div>
  <!-- content end -->
</div>

@include('admin/layouts/footer')