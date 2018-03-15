@include('admin/layouts/header')
@include('admin/layouts/left')
@include('admin/layouts/type_oper_head')
  <!-- content start -->


    <div class="am-g">
      <div class="am-u-sm-12">
        
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-title">分类</th>
                <th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          @foreach($qtypeTop as $qtTop)
            <tr>
                <td><a href=""><?php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $qtTop['space']) ?> {{$qtTop['qtname']}}</a></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑(update未启用)</button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span> 删除</button>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach           
          </tbody>
        </table>
          <div class="am-cf">
  共123123条记录
  <div class="am-fr">
    <ul class="am-pagination">
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