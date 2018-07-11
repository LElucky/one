@include('admin/layouts/header')
@include('admin/layouts/left')
@include('admin/layouts/oper_head')
@include('admin/layouts/oper_nav')
  <!-- content start -->


    <div class="am-g">
      <div class="am-u-sm-12">
        
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th>
                <th class="table-id">序号</th>
                <th class="table-title">标题</th>
                <th class="table-type">类别</th>
                <th class="table-author">作者</th>
                <th class="table-date">发表日期</th>
                <th>审核</th>
                <th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          @foreach($question as $q)
            <tr>
              <td><input type="checkbox" /></td>
              <td>{{$key++}}</td>
              <td><a href="{{url('admin/question/detail/' . $q['id'])}}">{{$q['qname']}}</a></td>
              <td>default</td>
              <td>{{$q->showUsername->username}}</td>
              <td>{{date('Y-m-d H:i:s',$q['ctime'])}}</td>
              <td class="audit">
              @if($q['audit'] == 0)
                <img src="{{asset('admin')}}/ausers/images/error.png" class="error" data-id="{{$q['id']}}" alt="">
              @else
                <img src="{{asset('admin')}}/ausers/images/correct.png" class="correct" data-id="{{$q['id']}}" alt="">  
              @endif  
              </td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span> 删除</button>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach

<script>
  $(function(){

    $('.audit').on('click','.error',function(){
      var link = $(this);
      var id = link.attr('data-id');
      $.ajax({
        type: 'get',
        url: '{{url('admin/question/error')}}/' + id,
        success: function(html){
          link.replaceWith(html);
        }
      }); 
    });

    $('.audit').on('click','.correct',function(){
      var link = $(this);
      var id = link.attr('data-id');
      $.ajax({
        type: 'get',
        url: '{{url('admin/question/correct')}}/' + id,
        success: function(html){
          link.replaceWith(html);
        }
      }); 
    });
  });
</script>          
          </tbody>
        </table>
          <div class="am-cf">
  共 {{$question->total()}} 条记录
  <div class="am-fr">
    <ul class="am-pagination">
     {{$question->links()}}
    </ul>
  </div>
</div>
          <hr />
          <p>注：.....</p>
      </div>

    </div>
  </div>
  <!-- content end -->
</div>
        </form>

@include('admin/layouts/footer')