
    <div class="am-g">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">

          <div class="am-btn-toolbar am-fl">
            <div class="am-btn-group am-btn-group-xs">
              <button type="submit" id="add" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
<script>
  $(function(){
    $('#add').click(function(){
      $('#form').attr('action','{{url('admin/question/add')}}');
    });
  });
</script>

              <button type="submit" id="audit" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 审核</button>

<script>
  $(function(){
    $('#audit').click(function(){
      $('#form').attr('action','{{url('admin/question/audit')}}');
    });
  });
</script>              
              <button type="submit" id="delete" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
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