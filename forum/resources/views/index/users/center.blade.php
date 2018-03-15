@include('index/layouts/header')
<link href="{{asset('index/bootstrap_2/css')}}/bootstrap.min.css" rel="stylesheet">	

<div class='container'>
	<div id="comment_div" class="t-10 label-div border-all pr-20 pl-20" >
		<div class="txmd">     
		    <h4 class="mmh4">个人中心</h4>
		    <img src="{{asset('index/users_image')}}/{{$user['user_image']}}" id="user_image" alt="">
		    <span id="nick_name">
		    	@if($user['nick_name'] != '') {{$user['nick_name']}} @else {{$user['username']}} @endif
		    </span>
			<span id="signature">{{$user['signature']}}</span>
		    <br><br>
		    <p id="sex">
		    	@if($user['sex'] == '1') 男 @else 女 @endif
		    </p>
		    @if(session('usersid') != $user['id'])
		    <p id="concerns_it" data-url="{{url('')}}" data-sex="{{$user['sex']}}">
		    	@if($concernedIt != '')
			    <a href="javascript:concerns_it({{$user['id']}})"><span id="concernsIt" class="concerns_ok">√已关注</span></a>
		    	@else
		    	<a href="javascript:concerns_it({{$user['id']}})"><span id="concernsIt" class="concerns_no">+关注@if($user['sex'] == '1')他@else她@endif</span></a>
		    	@endif
		    </p>
		    @else
		    <p id="edit_userinfo"><a href="{{url('index/users/userinfo/' . session('usersid'))}}">编辑个人资料</a></p>
		    @endif
		</div>
		<hr id="live_hr">
		
		<div id="two_live">
			<a href="{{url('index/users/forumcenter',['id'=>$user->id])}}">贴吧动态</a>
			<a href="" style="font-size: 17px; color: black; margin-left: 15px;">话题动态</a>
		</div>
		
		<hr style="margin: 0;">
		<div>
      		<ul class="nav nav-tabs">
      			<li class="active"><a data-toggle="tab" href="#live">我的动态</a></li>
      			<li><a data-toggle="tab" href="#answer">回答({{$total_comments}})</a></li>
      			<li><a data-toggle="tab" href="#question">提问({{$total_question}})</a></li>
      			<li><a data-toggle="tab" href="#collection">收藏({{$total_collection}})</a></li>
      			<li><a data-toggle="tab" href="#i_concerns">我关注的人({{$total_i_concerned}})</a></li>
      			<li><a data-toggle="tab" href="#concerns_me">关注我的人({{$total_concerned_me}})</a></li>
      		</ul>
      		<div class="tab-content">
      			<div class="tab-pane fade in active" id="live">
            		<div class="live">
        				<a href="{{url('index/question/container/')}}"><p class="topic_name">我的动态</p></a>
        				<div class="content">
        					<p class="ctime">什么歌</p>
        				</div>
        			</div>
      			</div>

      			<div class="tab-pane fade" id="answer">
      				@foreach($comments as $com)
					<div class="live">
        				<a href="{{url('index/question/container/' . $com['question_id'])}}"><p class="topic_name">{{$com->getQuestionInfo->qname}}</p></a>
        				<div>
							<img src="{{asset('index/users_image')}}/{{$user['user_image']}}" alt="" style="width: 40px; height: 40px; float: left;">
							<div class="users">
								<a href="">{{$com->getCommentUserInfo->nick_name}}</a>
								<p>{{$com->getCommentUserInfo->signature}}</p>
							</div>
							<p class="goodItQuestion">({{$com->getTotalGood->good}})人赞同了该回答</p>
        				</div>

        				<div class="content">
        					<p class="comment">{{$com['comment']}}</p>
        				</div>

        				<div class="set">
        					<span>({{$com->getTotalGood->good}})<a href=""><img src="{{asset('index/images')}}/good.png" alt=""></a></span>
        					<span>({{$com->getTotalGood->bad}})<a href=""><img src="{{asset('index/images')}}/bad.png" alt=""></a></span>
        					<span>({{$com->getTotalComments()}})<img src="{{asset('index/images')}}/comment.png" alt=""></a></span>
        					<span><a href=""><img src="{{asset('index/images')}}/collection.png" alt="" title="收藏该回答"></a></span>
					     		<span><a href=""><img src="{{asset('index/images')}}/delete.png" alt="" title="删除"></a></span>
        				</div>
        			</div>
        			<hr>
        			@endforeach
      			</div>

      			<div class="tab-pane fade" id="question">
		      	 		@foreach($question as $q)
            			<div class="live">
            				<a href="{{url('index/question/container/' . $q['id'])}}"><p class="topic_name">{{$q['qname']}}</p></a>
            				<div class="content">
            					<p class="ctime">2018-02-01 ({{$q->getTotalComments()}})个回答 ({{$q->getTotalCollection()}})个关注</p>
            				</div>
            			</div>
            			<hr>
            		@endforeach
      			</div>

      			<div class="tab-pane fade" id="collection">
      				@foreach($collection as $col)
					<div class="live">
            				<a href="{{url('index/question/container/' . $col['question_id'])}}"><p class="topic_name">{{$col->getCollectionInfo->qname}}</p></a>
            				<div class="content">
            					<p class="ctime">{{date('Y-m-d',$col->getCollectionInfo->ctime)}}&nbsp;·&nbsp; ({{$col->getTotalComments()}})个评论 ({{$col->getTotalCollection()}})人收藏</p>
            				</div>
        			</div>
        			<hr>
        			@endforeach
      			</div>

				<div class="tab-pane fade" id="i_concerns">
      				@foreach($i_concerned as $i_con)
					<div class="concerns_me">
						<img src="{{asset('index/users_image')}}/{{$i_con->getIConcerned->user_image}}" alt="">
						<div class="concerns_user">
	        				<a href="{{url('index/users/center/' . $i_con['concerned_user_id'])}}"><p class="">{{$i_con->getIConcerned->nick_name}}</p></a>
	        				<p>{{$i_con->getIConcerned->signature}}</p>
	        				<p>({{$i_con->getAnswerIConcerned()}})回答 · ({{$i_con->getConcernedIConcerned()}})关注者</p>
        				</div>
        			</div>
        			<hr>
        			@endforeach
      			</div>

      			<div class="tab-pane fade" id="concerns_me">
      				@foreach($concerned_me as $con_me)
					<div class="concerns_me">
						<img src="{{asset('index/users_image')}}/{{$con_me->getConcernedMe->user_image}}" alt="">
						<div class="concerns_user">
	        				<a href="{{url('index/users/center/' . $con_me['user_id'])}}"><p class="">{{$con_me->getConcernedMe->nick_name}}</p></a>
	        				<p>{{$con_me->getConcernedMe->signature}}</p>
	        				<p>({{$con_me->getAnswerConcernedMe()}})回答 · ({{$con_me->getConcernedConcernedMe()}})关注者</p>
        				</div>
        			</div>
        			<hr>
        			@endforeach
      			</div>
      		</div>
		</div>
		
	</div>
</div>
<script src="{{asset('bootstrap_2/js')}}/jquery-1.12.4.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('bootstrap_2/js')}}/bootstrap.min.js"></script>


@include('index/layouts/footer')