@include('admin/layouts/header')
@include('admin/layouts/left')
@include('admin/layouts/type_oper_head')




    <div class="am-tabs-bd">
     

      <div>

        <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">分类</div>
            <div class="am-u-sm-10">
              <select name="fid">
                <option value="0">顶级分类</option>
                @foreach($qtype as $qt)
                <option value="{{$qt['id']}}"><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$qt['space']);?>{{$qt['qtname']}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="am-g am-margin-top">
          <div class="am-u-sm-2 am-text-right">
            次级分类
          </div>
          <div class="am-u-sm-4">
            <input type="text" name="qtname" class="am-input-sm" placeholder="请写下你要添加的分类名">
          </div>
          <div class="am-u-sm-6"></div>
        </div>

    </div>

  <div class="am-margin">
    {{csrf_field()}}
    <button type="submit" id="save" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
    <button type="submit" id="nosave" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>
  </div>
  <script>
    $(function(){
      $('#save').click(function(){
        $('#form').attr('action','{{url('admin/qtype/save')}}').attr('method','post');
      });

      $('#nosave').click(function(){
        $('#form').attr('action','{{url('admin/qtype/oper')}}');
      })
    });
  </script>
</div>
<!-- content end -->

</div>
</form>

@include('admin/layouts/footer')