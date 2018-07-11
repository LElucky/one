@include('admin/layouts/header')
@include('admin/layouts/left')
@include('admin/layouts/oper_head')
<!-- content start -->

    <div class="am-tabs-bd">
     

      <div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              标题
            </div>
            <div class="am-u-sm-4">
              <input type="text" name="qname" class="am-input-sm" placeholder="标题:请写下你的问题">
            </div>
            <div class="am-u-sm-6"></div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-2 am-text-right">
              内容描述
            </div>
            <div class="am-u-sm-10">
              <textarea rows="10" name="description" placeholder="问题描述"></textarea>
            </div>
          </div>

      </div>


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
        $('#form').attr('action','{{url('admin/question/save')}}').attr('method','post');
      });

      $('#nosave').click(function(){
        $('#form').attr('action','{{url('admin/question/oper')}}');
      })
    });
  </script>
</div>
<!-- content end -->

</div>
</form>

@include('admin/layouts/footer')