@include('index/layouts/header')
<!--头部代码结束-->

<div class="hr tp-div-nexthr"
	style="margin-top: 0; margin-bottom: 0; padding: 0;"></div>
<div class="container pb-15">
	<!-- Example row of columns -->
	<div class="row">
		<div class="span12">


			<!--内容页面-->

			<div class="label-div b-30 border-all pt-5 t-20 container_box"
				style="position: relative; padding-left: 0;">

				<div class="mmclear"></div>




				<div style="margin-top: 14px;" class="clearfix pb-12 pl-25 pr-25">
					<h1 class="pull-left r-10">{{$question['qname']}}</h1>
					<div class="pull-left pt-5 none-768"
						style="_margin-top: -33px; _margin-left: -10px;">
						<span class="like-plug-gz clearfix pull-left r-15"> <a
							title="感兴趣，关注一下吧" href="javascript:collection({{session('usersid')}});"
							class="like-btn pull-right ie6png collection"
							data-questionid="{{$question['id']}}"
							data-url="{{url('')}}"> <span id="collection"> @if($collection != '') 取消收藏 @else 收藏 @endif </span></a> <span
							class="count pull-left t-5 d-none"></span>
						</span>
					</div>
				</div>



				<div style="margin-top: 4px;" class="clearfix pl-25 pr-25">
					<div class="pull-left">

						<span class="r-15 pull-left"><span class="fc999 l-5">
							{{date('Y-m-d H:i:s',$question['ctime'])}}
						</span></span> 
						<a class="follow-btn pr-10 ie6png collectionNum" href="javascript:void(0);" title="{{$collection_count}}人收藏" data-id="104417" data-type="news">{{$collection_count}}</a>
						<a class="read-btn ie6png" href="javascript:void(0);" title="{{$question['onclick'] + 1}}次阅读">{{$question['onclick'] + 1}}</a>
					</div>
				</div>

				<div class="view-main t-20 pl-25 pr-25">


					<div class="view-content" style="margin-top: 18px;">
						<p>{!!$question['description']!!}</p>

					</div>


				</div>


				<!--警告：切勿删除-->
				<!--[if IE 6]> <a class="follow-btn ie6png mmmzw"></a><![endif]-->

			</div>
			<!--讨论区-->

			<div id="comment_div"
				class="t-10 label-div border-all pr-20 pt-50 pl-20">
				<!-- 评论箱  -->
				<div class="comment">
					<div class="comment_box_comment" id="comment-box">
						<div class="post-div">
							<form action="javascript:;" id="form_comment" name="form_comment">
								<div class="user-img">
									<a title="游客" href="javascript:;">
										<img alt="游客" src="{{asset('index/users_image')}}/{{session('user_image')}}">
									</a>
								</div>








								<div class="weiboComments">

									<div class="com-textarea ie6png">
										<input type="hidden" value="News" id="data_obj_type"
											name="data[obj_type]"> <input type="hidden" value="104437"
											id="data_obj_id" name="data[obj_id]"> <input type="hidden"
											value="" id="data_uid" name="data[uid]"> <input type="hidden"
											value="0" id="data_pid" name="data[pid]"> <input
											type="hidden" value="" id="data_share" name="data[share]"> <input
											type="hidden"
											value="aHR0cDovL3d3dy5iaW9kaXNjb3Zlci5jb20vbmV3cy9wb2xpdGljcy8xMDQ0MzcuaHRtbCNDQw=="
											id="data_url" name="data[url]">
										<textarea
											onblur="if(this.value==''){this.value='有什么感想？你也来说说吧！';$(this).next().val('有什么感想？你也来说说吧！')};textCounter($(this), $(this).parents('form').find('#remLen'),140)"
											onfocus="if(this.value=='有什么感想？你也来说说吧！'){this.value=''};"
											onmousemove="textCounter($(this), $(this).parents('form').find('#remLen'),140)"
											onkeyup="textCounter($(this), $(this).parents('form').find('#remLen'),140);"
											onkeydown="textCounter($(this), $(this).parents('form').find('#remLen'),140);"
											id="data_content" style="_width: 98%;"
											name="comment" data-userid="{{session('usersid')}}"
											data-id="{{$question['id']}}">有什么感想？你也来说说吧！</textarea>
										<input type="hidden" value="有什么感想？你也来说说吧！" id="data_content2">
										<input type="hidden" value="comment" id="class" name="class">
										<input type="hidden" value="{{url('')}}" id="url">
										<span class="head-msg">还可以输入<span id="remLen">255</span>字
										</span> <span
											style="color: #000; position: absolute; left: 0; top: -35px; height: 22px; line-height: 20px; font-family: '微软雅黑'; font-size: 14px;">讨论区：</span>
									</div>



									<div class="post-toolbar">
										<a href="javascript:addComment();" data-url="" class="post-button-dis add_comment_submit ie6png">评&nbsp;论</a>
										<!-- loadding -->
									</div>
								</div>
							</form>
						</div>
						<div class="comments-info clearfix">
							<div class="comments-tab left">
								<a href="javascript:void(0);"><span class="rows_count">{{$count}}</span>
									条评论</a>
							</div>

						</div>
						@foreach($comments as $c)
						<ul class="comments-list clearfix">
							<li class="cleaarfix p1">
								<div class="left post-img">
									<a target="_blank" href="javascript:;" title="{{$c->getCommentUserInfo->nick_name}}">
									<img src="{{asset('index/users_image')}}/{{$c->getCommentUserInfo->user_image}}" alt="{{$c->getCommentUserInfo->nick_name}}"></a>
								</div>
								<div class="post-info">
									<div style="line-height: 16px; margin-bottom: 9px;">
										<a class="fs14 r-10" target="_blank" href="/u/16999.html"
											title="jack_radio">
											@if($c->getCommentUserInfo->nick_name != '') {{$c->getCommentUserInfo->nick_name}} @else {{$c->getCommentUserInfo->username}} @endif
										</a>
											<span class="fc999">
											{{date('Y-m-d H:i:s',$c['ctime'])}}
											</span>
									</div>
									<div class="fc666 b-5">{{$c['comment']}}</div>
									<div>
										@if($c->getCountReplay() != 0)
										<a href="{{url('index/question/replayDetail/' . $c['id'])}}" class="comment_reply_comment_{{$c['id']}}"
										 title="回复" data-fromid="{{session('usersid')}}"
										 data-toid="{{$c['userid']}}" data-questionid="{{$c['questionid']}}">评论({{$c->getCountReplay()}})</a>&nbsp;&nbsp;
										@else 
										<a href="javascript:void(0)">评论({{$c->getCountReplay()}})</a>&nbsp;&nbsp;
										@endif 

										@if(session('usersid') != $c['user_id'])
										<a href="{{url('index/question/replayContent/' . $c['id'])}}">回复</a>
										@endif
									</div>
									<!-- reply_box -->
								</div>
								<div class="clear"></div>
							</li>
						</ul>
						@endforeach

						<div data-by="desc" data-size="12"
							data-url="/comment/commentList.html?class=comment&amp;type=News&amp;id=104437"
							data-page="1" onclick="comment_list('.comment_box_comment')"
							class="load load_more d-none" style="display: none;">
							<a title="加载更多" href="javascript:void(0);">加载更多</a>
						</div>
						<div class="load load_loading" style="display: none;">
							<a title="正在加载" href="javascript:void(0);"><img
								src="/images/loadding.gif"> 正在加载</a>
						</div>
						<div class="load load_none d-none" style="display: none;">
							<a title="没有更早的了" href="javascript:void(0);">没有更早的了</a>
						</div>
					</div>


				</div>
			</div>




			<!--讨论区结束-->



		</div>








		<!--右侧代码-->
		<div class="span4">



			<div class="label-div t-20 border-all">
				<div class="l-15">
					<h3 class="label-title border-b b-15 small clearfix"
						style="padding-bottom: 14px;">关于作者</h3>
				</div>
				<div class="label-main tody-hot l-15">
					<img id="right_author_img" src="{{asset('index/users_image')}}/users_default_img.jpg" alt="">
					<div id="right_author_1">
						<a href="">用户</a>
						<p>个性签名</p>
					</div>
					<hr style="border: 0.5px solid rgb(232,232,232); margin-bottom: 10px;">
					<div id="right_author_2">
						<a href=""><span>回答</span>1</a>
						<a href=""><span>收藏</span>10</a>
						<a href=""><span>关注者</span>264</a>
					</div>
					<div id="clearfix"></div>
					<div id="right_author_3">
						<a href="">关注他</a>
						<a href="">写私信</a>
					</div>
				</div>	
			</div>



			<div class="label-div t-20 border-all">
				<div class="l-15">
					<h3 class="label-title border-b b-15 small clearfix"
						style="padding-bottom: 14px;">最多分享</h3>
				</div>
				<div class="label-main tody-hot l-15">
					<ul>
						<li><a href="">标题标题标题标题标题标题题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标 标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
					</ul>
				</div>
			</div>



			<div class="label-div t-20 border-all">
				<div class="l-15">
					<h3 class="label-title border-b b-15 small clearfix"
						style="padding-bottom: 14px;">最多评论</h3>
				</div>
				<div class="label-main tody-hot l-15">
					<ul>
						<li><a href="">标题标题标题标题标题标题题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标题标题</a></li>
						<li><a href="">标题标题标题标题标题标题标 标题</a></li>
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

<!--右侧代码结束-->


<!-- /container -->

<div class="container">

	<div class="hr"></div>

</div>

<!-- /container -->

</div>
@include('index/layouts/footer')
