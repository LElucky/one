@include('index/layouts/header')
@include('index/layouts/header_img')  
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });


</script>
<!-- 整体 div -->
<div class='container'>




	<div class='navbar_beLikeTo'>
		
		<h4>你可能感兴趣的吧</h4>
		<span>
			<a href='#' class='btn btn-info'>+ 一键关注</a>
			<a href='#' class='btn btn-default'>下一页</a>
		</span>
		
		<div class='one_piece'>
			<img src="{{asset('index/images')}}/yy1.jpg"/>
			<a href='#' class='a_one'>java</a>
			<a href='#' class='btn btn-warning'>关注</a>
			<p>
				<a class="follow-btn pr-10 ie6png" href="javascript:void(0);" title="0人关注	0人分享	3人评论" data-id="104417" data-type="news">3人</a>
				<a class="read-btn ie6png" href="javascript:void(0);" title="277次阅读">277次</a>
			</p>
		</div>

		<div class='one_piece'>
			<img src="{{asset('index/images')}}/yy1.jpg"/>
			<a href='#' class='a_one'>java</a>
			<a href='#' class='btn btn-warning'>关注</a>
			<p>
				<a class="follow-btn pr-10 ie6png" href="javascript:void(0);" title="0人关注	0人分享	3人评论" data-id="104417" data-type="news">3人</a>
				<a class="read-btn ie6png" href="javascript:void(0);" title="277次阅读">277次</a>
			</p>
		</div>
		
		
		
		<div class='one_piece'>
			<img src="{{asset('index/images')}}/yy1.jpg"/>
			<a href='#' class='a_one'>java</a>
			<a href='#' class='btn btn-warning'>关注</a>
			<p>
				<a class="follow-btn pr-10 ie6png" href="javascript:void(0);" title="0人关注	0人分享	3人评论" data-id="104417" data-type="news">3人</a>
				<a class="read-btn ie6png" href="javascript:void(0);" title="277次阅读">277次</a>
			</p>
		</div>
		
		
	</div>
	
	
	
	
<!-- 	支撑塌陷 -->
	<div class='support'></div>
<!-- 	表单 -->
	<form name="example" method="post" action="{{url('index/forum/save')}}" class="form-search" style=''>
		<table >
			<tr>
				<td></td>
				<td id='input_subject'>
					<div class="input-prepend">
  						<span class="add-on">发表新帖</span>
  						
  						<input class="span5" id="prependedInput" type="text" placeholder="Sbject" style='width:770px;' name='subject'>		
  						{{csrf_field()}}
  						
					</div>		
				</td>
				<td></td>
			</tr>
		
			<tr>
				<td></td>
				<td>
      				<textarea id="editor_id" name="content" style="width:850px;height:300px;"></textarea>
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
	
<!-- 	右侧 大家都在搜 开始 -->
	<div style='border:1px gray solid;' class='issue_forum'>
		<p style="border:0px red solid;"><h5><a href='#'>大家都在搜</a></h5><p>
		
        <a class="btn btn-danger" href="#" role="button">Link</a>
         
        <a class="btn btn-danger" href="#" role="button">lol</a>
         
        <a class="btn btn-danger" href="#" role="button">PHP</a>
         
        <a class="btn btn-info" href="#" role="button">JAVA</a>
         
        <a class="btn btn-info" href="#" role="button">JavaScript</a>
         
        <a class="btn btn-info" href="#" role="button">jQuery</a>
        
        <a class="btn btn-info" href="#" role="button">boots</a>
         
        <a class="btn btn-info" href="#" role="button">C++</a>
        
        <a class="btn btn-info" href="#" role="button">德玛西亚</a>
         
        <a class="btn btn-info" href="#" role="button">英雄本色</a>
         
        <a class="btn btn-info" href="#" role="button">摔跤吧爸爸</a>
        
        <a class="btn btn-info" href="#" role="button">电锯惊魂</a>
         
        <a class="btn btn-info" href="#" role="button">比悲伤跟悲伤的故事</a>
	</div>
	<!-- 	右侧 大家都在搜 结束 -->
	
	
<!-- 	右侧热门榜 -->
	<div class='hot_right'>
		<ul>
			<p><h5><a href='#'>贴吧热议榜~~</a></h5><p>
			<li><a href='#'>有关赌王的话题越来越备受关注题越来越备</a></li>
			<li><a href='#'>有关赌王的话题越来越备受关注题越来越备</a></li>
			<li><a href='#'>有关赌王的话题越来越备受关注题越来越备</a></li>
			<li><a href='#'>有关赌王的话题越来越备受关注题越来越备</a></li>
			<li><a href='#'>有关赌王的话题越来越备受关注题越来越备</a></li>
			<li><a href='#'>有关赌王的话题越来越备受关注题越来越备</a></li>
			<li><a href='#'>有关赌王的话题越来越备受关注题越来越备</a></li>
			<li><a href='#'>有关赌王的话题越来越备受关注题越来越备</a></li>
			<li><a href='#'>有关赌王的话题越来越备受关注题越来越备</a></li>
			<li><a href='#'>有关赌王的话题越来越备受关注题越来越备</a></li>
			
		</ul>
		
	</div>
<!-- 	热门榜结束 -->

<!-- 支撑 塌陷 -->
<div style='height:80px;'></div>



</div>

@include('index/layouts/footer') 
