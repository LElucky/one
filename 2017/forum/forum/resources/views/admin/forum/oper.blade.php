@include('admin/layouts/header')
@include('admin/layouts/left')
  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">论坛</strong> / <small>管理</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">
            <div class="am-btn-group am-btn-group-xs">
              <button ="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> <a href='{{url("admin/forum/add")}}'>新增</a></button>

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
    
    
    
    
    
    
    
    <input type='hidden' id='self_path' value='{{url("")}}'>
    








    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th>
                <th class="table-id">ID</th>
                <th class="table-title">标题</th>
                <th class="table-type">类别</th>
                <th class="table-author">作者</th>
                <th class="table-author">推荐</th>
                <th class="table-date">修改日期</th>
                <th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
         @foreach($forumData as $value)
            <tr>
              <td><input type="checkbox" /></td>
              <td>{{$value->id}}</td>
              <td><a href="#">{{$value->subject}}</a></td>
              <td></td>
             {{-- <td>{{$value->TformatChange($value->typestr)}}</td>--}}
              <td>{{$value->getUsersid($value->user_id)}}</td>
              <td>
              @if($value->recommended == 0)
              	<img id='img_{{$value->id}}' src='{{asset("admin")}}/ausers/images/4.png' onclick='javascript:recommended({{$value->id}})'>
              @else
              	<img id='img_{{$value->id}}' src='{{asset("admin")}}/ausers/images/3.png' onclick='javascript:recommended({{$value->id}})'>
              @endif
              </td>
              <td>{{date('Y-m-d H:i:s',$value->ctime)}}</td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> <a href='{{url("admin/forum/edit",["id"=>$value->id])}}'>编辑</a></button>
                    <button class="am-btn am-btn-default am-btn-xs"><span class="am-icon-copy"></span> 复制</button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span> <a href='{{url("admin/forum/delete",["id"=>$value->id])}}'>删除</a></button>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
          <div class="am-cf">
  共 15 条记录
  <div class="am-fr">
    <ul class="am-pagination">
      <li class="am-disabled"><a href="#">«</a></li>
      <li class="am-active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">»</a></li>
    </ul>
  </div>
</div>
          <hr />
          <p>注：.....</p>
        </form>
      </div>

    </div>
  </div>
  <!-- content end -->
</div>

@include('admin/layouts/footer')