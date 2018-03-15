@include('index/layouts/header')


<div class="hr tp-div-nexthr" style="margin-top: 0;margin-bottom: 0;padding: 0;"></div>
	<div class="container pb-15">
	<!-- Example row of columns -->
	<div class="row home-index">
		<div class="span13">
			<div class="span8">
				<div class="label-div t-20 border-all">
					<div class="l-15">
						<h3 class="label-title border-b b-15 small clearfix" style="padding-bottom: 14px;">
							<a href="javascript:;" title="创新项目" class="pull-left r-10">推荐</a>
							<a href="javascript:;" title="创新项目" class="pull-left r-10">我的关注</a>
							<span class="pull-left">
									            				
	            					            				 
	            			</span>
							<a href="/news.html" title="更多" class="more-add ie6png pull-right">&nbsp;</a>
						</h3>
					</div>
<div class="label-main">
    <div class="news-slides b-15 l-15">
        <div class="slides-list slides-banner">

        
            <div class="slides-css" style="display:block;">
              <a target="_blank" href="javascript:;" title="标题标题"  rel="bookmark" >
                 <img alt="标题标题" src="{{asset('index/forumimg')}}/{{$hotTwo[0]->getForumImg($hotTwo[0]['id'])[0]['image']}}" style='height:500px; width:600px;'/>
              </a>
         </div>
         <div class="slides-css" style="display:none;">
             <a target="_blank" href="javascript:;" title="标题标题"  rel="bookmark" >
                 <img alt="标题标题" src="{{asset('index/forumimg')}}/{{$hotTwo[1]->getForumImg($hotTwo[0]['id'])[1]['image']}}" style='height:500px;width:600px;'/>
              </a>
            </div>
            
          
                                                              
     
              <!--轮播图的小按钮-->
              <div class="slides-icon slides-banner-point">
                     <a href="javascript:void(0);" class="icon-css-on ie6png">&nbsp;</a>
                     <a href="javascript:void(0);" class="icon-css ie6png">&nbsp;</a>
                    
                     
             </div>
             <!--轮播图的小按钮结束-->
             
</div>
                                
				
                <!--第一组新闻开始-->				
	<div class="slides-title slides-banner-title" style="display:block">
                    <div class="intro">
                    <h1 class="t-15"><a href="{{url('index/forum/container/'.$hotTwo[0]['id'])}}" title="标题标题标题标题" rel="bookmark" target="_blank">{{$hotTwo[0]['subject']}}</a></h1>
                    </div>
                    
    <div class="clearfix t-10 related-news" style="height:45px; overflow:hidden; position:relative;">
       <a class="pr-5 fc333 ie6png" href="{{url('index/forum/postbar/'.$hotTwo[0]['type'])}}" rel="bookmark" title="标题" target="_blank">{{$hotTwo[0]->getType($hotTwo[0]['type'])}}</a>
       <a class="pr-5 fc333 ie6png" href="{{url('index/forum/container/'.$hotTwo[0]['id'])}}" rel="bookmark" title="标题" target="_blank">{{strip_tags($hotTwo[0]['content'])}}</a>
      
        </div>
     </div>
           <!--第一组新闻结束-->
         
       <!--第二组新闻结束-->                         
	   <div class="slides-title slides-banner-title" style="display:none;">
               <div class="intro">
                 <h1 class="t-15"><a href="{{url('index/forum/container/'.$hotTwo[1]['id'])}}" title="标题标题标题标题" rel="bookmark" target="_blank">{{$hotTwo[1]['subject']}}</a></h1>
                                </div>
    <div class="clearfix t-10 related-news" style="height:45px; overflow:hidden; position:relative;">
       <a class="pr-5 fc333 ie6png" href="{{url('index/forum/postbar/'.$hotTwo[0]['type'])}}" rel="bookmark" title="标题" target="_blank">{{$hotTwo[0]->getType($hotTwo[1]['type'])}}</a>
       <a class="pr-5 fc333 ie6png" href="{{url('index/forum/container/'.$hotTwo[1]['id'])}}" rel="bookmark" title="标题" target="_blank">{{strip_tags($hotTwo[1]['content'])}}</a>
      
                         </div>                  
                                                                   
       </div>
       <!--第二组新闻结束-->
       
            
<script type="text/javascript">
$(function(){
	var Interval_control = '';
	var current_index = 0;
	$(".slides-banner .slides-css").hide();
	$(".slides-banner .slides-css:first").show();
	$(".slides-banner-title").hide();
	$(".slides-banner-title:first").show();
   
	show_pic = function(index){
		$(".slides-css").each(function(i){
			$(this).hide();       
			if(i == index)
			{
				$(this).show();       
			}              
		});
	};

	show_content = function(index){
		$(".slides-banner-title").each(function(i){
			$(this).hide();
			if(i == index)
			{
				$(this).show();
			}
		});
	};

	show_point = function(index){
		$(".slides-banner-point a").each(function(i){
			if($(this).hasClass("icon-css-on"))
			{
				$(this).removeClass("icon-css-on");
				$(this).addClass("icon-css");
			}
			if(i == index)
			{
				if($(this).hasClass("icon-css"))
				{
				   
					$(this).removeClass("icon-css");
				}
				$(this).addClass("icon-css-on");
			}
		});
	   
	};
   
	slides = function(){
		$(".slides-icon a").each(function(index){
			$(this).click(function(){
				current_index = index;
				show_point(index);
				show_content(current_index);
				show_pic(current_index);
			});                             
		});
	};
	slides();
   
	Interval_control = setInterval(
			function(){
				show_point(current_index);
				show_content(current_index);
				show_pic(current_index);
			   
				if (current_index == ($(".slides-banner .slides-css a").length - 1))
				{
					current_index = -1;
				}
			   
				current_index ++;
			}
			,
			8000
		);//设置自动切换函数

	//当触发mouseenter事件时，取消正在执行的自动切换方法，触发mouseouter事件时重新设置自动切换
	$(".slides-banner .slides-css,.slides-banner-title").mouseenter(function() {
		clearInterval(Interval_control);//停止自动切换
	}).mouseleave(function() {
		Interval_control = setInterval(
				function(){
					show_point(current_index);
					show_content(current_index);
					show_pic(current_index);
				   
					if (current_index == ($(".slides-banner .slides-css a").length - 1))
					{
						current_index = -1;
					}
				   
					current_index ++;
				}
				,
				8000
			);//设置自动切换函数
	   
	});
});
</script>
        </div>
        
	<!--图文解说开始-->
    <div class="hr l-15 t-15 b-20"></div>
	  










@foreach($readMax as $read)
<div class="news-list b-30 clearfix">
        <div class="spanm3 pull-left" style="padding-top:7px;">
            <a href="javascript:;" rel="bookmark" title="标题" style="display: block;" target="_blank">
            @if($read->getForumImg($read->id))
            <img src="{{asset('index/forumimg')}}/{{$read->getForumImg($read->id)[0]['image']}}" style='height:150px; width:200px;'>
            @else
            <img src="{{asset('index\TypeImg')}}/{{$read->getTypeInfo($read->type)['image']}}" style='height:150px; width:200px;'>
            @endif
            </a>
        </div>
        
		<div class="offsetindex3 intro">
			 <h1><a href="{{url('index/forum/container',['id'=>$read->id])}}" title="" rel="bookmark" target="_blank">{{$read->subject}}</a></h1>
		     <p class="t-5 fc666" style=" margin-bottom:0px;">{{strip_tags($read->content)}}</p>
             <div class="myxm"><span><a href="{{url('index/forum/postbar/'.$read->type)}}">{{$read->getType($read->type)}}</a></span>  <span class="two"><a href=""></a></span>{{date('Y/m/d',$read->ctime)}}</div>
			<div class="clearfix">
				<a class="follow-btn pr-10 ie6png news-follow-btn" href="javascript:void(0);" title="" data-id="104423" data-type="news">{{$read->like}}人</a>
							<a class="read-btn ie6png" href="javascript:void(0);" title="{{$read->readnum}}次阅读">{{$read->readnum}}次</a>
			 </div>
		</div>
</div>
@endforeach

















<script type="text/javascript">
	/**
	$(".news-follow-btn").bind('mouseover', function(){
		if(!$(this).attr("title"))
		{
			var obj_id = $(this).attr("data-id");
			var obj_type = $(this).attr("type-id");
			//Ajax请求数据
			$(this).attr("title",'2人分享	6人评论	12人关注');
		}
	});**/
	</script>
		</div>
	</div>
</div>
















        
        	
<div class="span5">
    <div class="label-div t-20 border-all">
    
    	<!--栏目展示-->
        <div class="l-15 mmtop">
            <h3 class="label-title border-b small clearfix" style="padding-bottom: 14px; margin-bottom:14px;">
               <a href="javascript:;" title="创新咨讯" class="pull-left r-10">话题</a>
                <span class="pull-left">
                    <a href="javascript:;" title="分类" class="pull-left">新提问</a>
                    <a href="javascript:;" title="分类" class="pull-left">高悬赏</a>
                    <a href="javascript:;" title="分类" class="pull-left">神讨论</a>
                </span>
               <a href="/topic.html" title="更多" class="more-add ie6png pull-right">&nbsp;</a>
            </h3>
        </div>
        <!--栏目展示结束-->
        
	     
	    <div class="label-main">
    
         <!--内容介绍第一个-->
         @foreach($question as $q)
          <div class="topic">
           
			<div class="clearfix userinfo">
				<a href="{{url('index/users/center/' . $q['user_id'])}}"><img src="{{asset('index/users_image')}}/{{$q->showUserInfo->user_image}}" alt="">&nbsp; 
				@if($q->showUserInfo->nick_name != '') {{$q->showUserInfo->nick_name}} @else {{$q->showUserInfo->username}} @endif</a>
				<span>@if($q->showUserInfo->signature != '') ,&nbsp;&nbsp;{{$q->showUserInfo->signature}} @endif</span>
			</div>
			
			<div class="qname">
				<a href="{{url('index/question/container/' . $q['id'])}}">{{$q['qname']}}</a>
			</div>

			<div class="description">
				{{str_limit(strip_tags($q['description']),'100','...')}} 
			</div>

			<div class="nice_buttton">
				<span class="nice_{{$q['id']}} nice" data-id="{{$q['id']}}">{{$q->total->good}}</span>
				<a href="javascript:void(0)" class="nice_click"><img src="{{asset('index/images')}}/good.png" alt=""></a>&nbsp;&nbsp;
				<span class="bad_{{$q['id']}} bad" data-id="{{$q['id']}}">{{$q->total->bad}}</span>
				<a href="javascript:void(0)" class="bad_click"><img src="{{asset('index/images')}}/bad.png" alt=""></a>&nbsp;&nbsp;
				<span>{{$q->getCountComments()}}</span>
				<a href="javascript:void(0)"><img src="{{asset('index/images')}}/comment.png" alt=""></a>&nbsp;&nbsp;
			</div>

            <div class="clearfix">
                <div class="span1">

                </div>
                <div>
                    <h1><a href="javascript:;" title="标题" rel="bookmark" target="_blank"></a></h1>
                </div>
            </div>
            
            
        </div>
        @endforeach
       {{--{{$question->render()}}--}} 
        <script>
        	$(function(){
        		$('.nice_buttton').on('click','.nice_click',function(){
        			var id = $(this).prev(".nice").attr('data-id');
        			$.ajax({
        				url: '{{'nice'}}/' + id,
        				type: 'get',
        				success: function(re){
        					if (typeof(re) == 'number') {
        						var nice = '';
        						nice += "<span class='nice_" + id + " nice' data-id='" + id + "'>" + re + "</span>";
        						$('.nice_' + id).replaceWith(nice);
        					} else if (typeof(re) == 'object') {
        						var nice = '';
        						var bad = '';
        						nice += "<span class='nice_" + id + " nice' data-id='" + id + "'>" + re.good + "</span>";
        						bad += "<span class='bad_" + id + " bad' data-id='" + id + "'>" + re.bad + "</span>";
        						$('.nice_' + id).replaceWith(nice);
        						$('.bad_' + id).replaceWith(bad);
        					} else {
        						console.log(typeof(re));
        					}
        				},
        				error: function(no){
        					window.alert('no');
        				},
        				dataType: 'json'
        			});

        		});

        		$('.nice_buttton').on('click','.bad_click',function(){
        			var id = $(this).prev('.bad').attr('data-id');
        			$.ajax({
        				url: '{{'bad'}}/' + id,
        				type: 'get',
        				success: function(re){
        					if (typeof(re) == 'string') {
        						var bad = '';
        						bad += "<span class='bad_" + id + " bad' data-id='" + id + "'>" + re + "</span>";
        						$('.bad_' + id).replaceWith(bad);
        					} else if (typeof(re) == 'object') {
        						var nice = '';
        						var bad = '';
        						nice += "<span class='nice_" + id + " nice' data-id='" + id + "'>" + re.good + "</span>";
        						bad += "<span class='bad_" + id + " bad' data-id='" + id + "'>" + re.bad + "</span>";
        						$('.nice_' + id).replaceWith(nice);
        						$('.bad_' + id).replaceWith(bad);
        					} else {
        						console.log(typeof(re));
        					}
        				},
        				error: function(no){
        					window.alert(no);
        				}
        			});
        		});

        	});
        </script>
        <!--内容介绍第一个结束-->
        
   	 </div>
	</div>
   </div>
		   
 </div>
		
        

{{--右侧栏目--}}   
        <div class="span3">

		<div class="label-div t-20 border-all">
			<div class="l-15">
                <h3 class="label-title border-b b-15 small clearfix" style="padding-bottom: 14px;">热门板块</h3></div>
				<div class="label-main tody-hot l-15" >
					<ul>
					  <li><a href="">标题标题标题标题标题标题题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
					</ul>
				</div>
		</div>
            
		           
			
			<div class="label-div t-30 border-all">
				<div class="l-15">
                <h3 class="label-title border-b b-15 small clearfix" style="padding-bottom: 14px;">热门帖子</h3></div>
				<div class="label-main tody-hot l-15" >
					<ul>
					  <li><a href="">标题标题标题标题标题标题题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
					</ul>
				</div>
			</div>
            
            
            <div class="label-div t-30 border-all">
				<div class="l-15">
               		 <h3 class="label-title border-b b-15 small clearfix" style="padding-bottom: 14px;">学识大牛</h3>
                </div>
				<div class="label-main tody-hot l-15" >
					<ul>
					  <li><a href="">标题标题标题标题标题标题题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标 标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
					</ul>
				</div>
			</div>
            
               
            <div class="label-div t-30 border-all">
				<div class="l-15"><h3 class="label-title border-b b-15 small clearfix" style="padding-bottom: 14px;">合作机构</h3></div>
				<div class="label-main tody-hot l-15" >
					<ul>
					  <li><a href="">标题标题标题标题标题标题题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>             
					</ul>
				</div>
			</div>
             
             
             
             
		</div>
	</div>
</div>



<!-- /container -->
 <div class="container">
 
 	<div class="hr"></div>
    
    </div>
  
<!-- /container -->

</div>

@include('index/layouts/footer')