@include('index/layouts/header')


	<div class="hr tp-div-nexthr" style="margin-top: 0;margin-bottom: 0;padding: 0;"></div>
    
    
    
	<div class="container pb-15">
	<!-- Example row of columns -->
	<div class="row">
		<div class="span12">
        
        <div class="clearfix pb-15" style=" position:relative;">
				<div class="pull-left classifyDIV pt-10">
                    <a class="pull-left type-css nosel">创新咨讯</a>
					<a id="" class="pull-left type-css tags" href="javascript:;" title="国内">国内</a>
                    <a id="" class="pull-left type-css tags" href="javascript:;" title="国外">国外</a>
                    <a id="" class="pull-left type-css tags" href="javascript:;" title="法规">法规</a>
                    <a id="" class="pull-left type-css tags" href="javascript:;" title="专题">专题</a>
                    <a id="" class="pull-left type-css tags" href="javascript:;" title="产品">产品</a>
                    <a id="" class="pull-left type-css tags" href="javascript:;" title="技术">技术</a>
                    
                    
				</div>
				<div style="position: absolute; right:0px; background:#06f;" class="pull-right t-20 classifySearch" >
					<input type="text" value="" class="search-input pull-left span4" id="search-input">
					<a class="search-btn-css pull-left search-btn" title="搜索" href="javascript:void(0);"></a>
				</div>
	</div>
        
    
 <!--列表开始-->     
                         
    <!--第一个-->     
    @foreach($question as $q)                             
    <div class="label-div b-30 border-all pb-20 pt-5" style="position: relative; padding-left: 0;">
 
        
  	  <div class="news-list">
    

    <div class="clearfix pt-3">
      <div class="offset intro">

       <div class="user">
        <a href="{{url('index/users/center/' . $q['user_id'])}}"><img src="{{asset('index/users_image')}}/{{$q->showUserInfo->user_image}}" alt=""><span class="index_nick_name">
        @if($q->showUserInfo->nick_name != '') {{$q->showUserInfo->nick_name}} @else {{$q->showUserInfo->username}} @endif</span></a><br>
        <span class="index_signature">@if($q->showUserInfo->signature != '') {{$q->showUserInfo->signature}} @else 该用户很懒,没有填写个性签名 @endif</span>
      </div>

      <h1>
          <a class="index_qname" title="标题标题标题标题" target="_blank" href="{{url('index/question/container/' . $q['id'])}}">{{$q['qname']}}</a>
          </h1>
  	  
        <div class="clearfix" style="height: 22px;margin-top: 0px;">
  			<div class="pull-left">	
              
              <span class="index_ctime">{{date('Y年m月d日 H:i',$q['ctime'])}}</span>
          </div>
              
            <div class="pull-right">
  			<a class="follow-btn pr-10 ie6png" href="javascript:void(0);" title="{{$q->getCountCollection()}}人收藏" data-id="104417" data-type="news">{{$q->getCountCollection()}}</a>
  			<a class="read-btn ie6png" href="javascript:void(0);" title="{{$q['onclick']}}次阅读">{{$q['onclick']}}</a>
  		 </div>
  	</div>
  	<p class="index_description">{{str_limit(strip_tags($q['description']),'200','...')}}</p>
      
           <div class="clearfix">
          <a href="{{url('index/question/container/' . $q['id'])}}" title="阅读全文" target="_blank" rel="bookmark" class="read-all pull-left">阅读全文</a></div>
           </div>
      </div>
    </div>
  </div>
  @endforeach
  {{$question->render()}}
    <!--第一个结束-->      

		</div>
        
      
      <!--右侧代码-->  
       <div class="span4">
			
        
            
            <div class="label-div t-20 border-all">
      				<div class="l-15">
             		 <h3 class="label-title border-b b-15 small clearfix" style="padding-bottom: 14px;">最热话题</h3>
              </div>
      				<div class="label-main tody-hot l-15" >
      					<ul>
      					  <li><a href=""></li>
      					</ul>
      				</div>
      			</div>
            
            
            
             <div class="label-div t-20 border-all">
        				<div class="l-15">
               		 <h3 class="label-title border-b b-15 small clearfix" style="padding-bottom: 14px;">最多浏览</h3>
                </div>
        				<div class="label-main tody-hot l-15" >
        					<ul>
                    @foreach($maxOnclick as $m)
                    <li><a href="{{url('index/question/container/' . $m['id'])}}">{{str_limit($m['qname'],'30','...')}}</li>
                    @endforeach
                  </ul>
        				</div>
        			</div>
            
            
            
             <div class="label-div t-20 border-all">
				<div class="l-15">
               		 <h3 class="label-title border-b b-15 small clearfix" style="padding-bottom: 14px;">最多收藏</h3>
                </div>
				<div class="label-main tody-hot l-15" >
					<ul>
					  <li><a href="">标题标题标题标题标题标题题</li>
                      <li><a href="">标题标题标题标题标题标题标题</li>
                      <li><a href="">标题标题标题标题标题标题标题</li>
                      <li><a href="">标题标题标题标题标题标题标题</li>
                      <li><a href="">标题标题标题标题标题标题标题</li>
                      <li><a href="">标题标题标题标题标题标题标 </li>
                      <li><a href="">标题标题标题标题标题标题标题</li>
                      <li><a href="">标题标题标题标题标题标题标题</li>
                      <li><a href="">标题标题标题标题标题标题标题</li>
                      <li><a href="">标题标题标题标题标题标题标题</li>
					</ul>
				</div>
			</div>
            
          
             
            
	 
            
		</div>
	</div>
</div>

<!--右侧代码结束-->


<!-- /container -->

  <div class="container">
 
 	<div class="hr"></div>
    
    </div>
  
<!-- /container -->

</div>
    
 
<div class="footer">
		 
			<!--<p class="fc999 b-5 footer-info">致力于前沿生物科技和成功商业模式的传播</p>-->
			<div class="clearfix" style="background:#EDEDED;">
				
                <!--<p class="fc999 pull-left footer-info">Copyright © 2013 生物探索网站<span class="l-20">苏ICP备11025281号</span></p>-->
				
                <ul class="about-ul">
					<li>客服电话 400-100-8884 - More Templates <a href="http://www.adminbuy.cn/" target="_blank" title="模板王">模板王</a></li>
					<li><span>|</span></li>
					<li><a title="广告投放" href="javascript:;" class="fc666" target="_blank">广告投放</a></li>
					<li><span>|</span></li>
					<li><a title="企业服务" href="javascript:;" class="fc666" target="_blank">企业服务</a></li>
					<li><span>|</span></li>
					<li><a title="公司博客" href="javascript:;" class="fc666" target="_blank" >公司博客</a></li>
					<li><span>|</span></li>
					<li><a title="加入我们" href="javascript:;" class="fc666" target="_blank">加入我们</a></li>
					<li><span>|</span></li>
					<li><a title="服务协议" href="javascript:;" class="fc666" target="_blank">服务协议</a></li>
					<li><span>|</span></li>
                     <li id="zk_btn" class="ie6png down-class">
                   	 <a title="友情链接" href="javascript:void(0);" class="fc666">友情链接</a>
                    </li>
				    <div class="clear"></div>
				</ul>
			</div>
    
    <div class="friend-link border-all t-20 b-20">
		<ul class="clearfix">
		
	</ul>
</div>
  <script type="text/javascript">
	$(document).ready(function(){
		var flag = 0;
		$(".friend-link").hide();
		//Down
		$("#zk_btn").click(function(){
			if(flag == 0){
				$(".friend-link").slideDown(400); 
				$(this).removeClass('down-class');
				$(this).addClass('up-class');
				$("html,body").animate({scrollTop:($(".friend-link").offset().top+2000)},600);
				flag = 1;
			}else{
				$(".friend-link").slideUp(400);  
				$(this).removeClass('up-class');
				$(this).addClass('down-class'); 
				flag = 0;
			}
		});
	});
</script>
<p>Copyright ©2013　　备8888888888号</p>
    
		</div> 










<script type="text/javascript">
//回到顶部
backToTop('body');
</script>
</body>
</html>