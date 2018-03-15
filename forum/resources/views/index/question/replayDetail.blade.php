@include('index/layouts/header')
<div class='container'>
			<div id="comment_div"
				class="t-10 label-div border-all pr-20 pt-50 pl-20" >
				<!-- 评论箱  -->
				<a href="{{url('index/question/container/' . $replay[0]['question_id'])}}">返回上一级</a>

					<div class="comment_box_comment" id="comment-box">
						
						<div class="comments-info clearfix">
							<div class="comments-tab left">
								<a href="javascript:void(0);"><span class="rows_count"></span>
									条回复</a>
							</div>

						</div>
						@foreach($replay as $r)
						<ul class="comments-list clearfix">
							<li class="cleaarfix p1">
								<div class="left post-img">
									<a target="_blank" href="javascript:;" title="标题标题"><img
										src="{{asset('index/users_image')}}/{{$r->getReplayUserInfo->user_image}}" alt="标题标题"></a>
								</div>
								<div class="post-info">
									<div style="line-height: 16px; margin-bottom: 9px;">
										<a class="fs14 r-10" target="_blank" href="/u/16999.html" title="jack_radio">
											@if($r->getReplayUserInfo->nick_name != '') {{$r->getReplayUserInfo->nick_name}} @else {{$r->getReplayUserInfo->username}} @endif
										</a>
										@if($r['replay_type'] == 1) 回复:
										<a href="">
											@if($r->getReplayToUserInfo->nick_name != '') {{$r->getReplayToUserInfo->nick_name}} @else {{$r->getReplayToUserInfo->username}} @endif
										</a>
										@endif	
											<span class="fc999">
											时间
											</span>
									</div>
									<div class="fc666 b-5">{{$r['content']}}</div>
									<div>
										@if(session('usersid') != $r['from_user_id'])
										<a href="{{url('index/question/replayReplay/' . $r['id'])}}">回复</a>
										@endif
									</div>
									<!-- reply_box -->
								</div>
								<div class="clear"></div>
							</li>
						</ul>
						@endforeach

				</div>
			</div>
</div>
@include('index/layouts/footer')