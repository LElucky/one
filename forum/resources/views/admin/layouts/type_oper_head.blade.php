<form class="am-form" id="form" method="get">
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><a href="{{url('admin/qtype/oper')}}">问答</a></strong> /
		
       <small>Table</small></div>
    </div>
    
    
    
    <div class="am-g">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">

          <div class="am-btn-toolbar am-fl">
            <div class="am-btn-group am-btn-group-xs">
              <button type="submit" id="add" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
<script>
  $(function(){
    $('#add').click(function(){
      $('#form').attr('action','{{url('admin/qtype/add')}}');
    });
  });
</script>	

              <button type="submit" id="audit" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 管理</button>

<script>
  $(function(){
    $('#audit').click(function(){
      $('#form').attr('action','{{url('admin/qtype/oper')}}');
    });
  });
</script>              
            </div>

          </div>
        </div>
      </div>
    </div>