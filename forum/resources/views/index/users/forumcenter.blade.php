@include('index/layouts/header')
<link href="{{asset('index/bootstrap_2/css')}}/bootstrap.min.css" rel="stylesheet">

<div class='container'>
  <div id="comment_div" class="t-10 label-div border-all pr-20 pl-20" >
    <div class="txmd">
      <h4 class="mmh4">个人中心</h4>
      <img src="{{asset('index/users_image')}}/{{$user['user_image']}}" id="user_image" alt="">
      <span id="nick_name"> @if($user['nick_name'] != '') {{$user['nick_name']}} @else {{$user['username']}} @endif </span>
      <span id="signature">{{$user['signature']}}</span>
      <br>
      <br>
      <p id="sex">
        @if($user['sex'] == '1') 男 @else 女 @endif
      </p>
      @if(session('usersid') != $user['id'])
      <p id="concerns_it" data-url="{{url('')}}" data-sex="{{$user['sex']}}">
        @if($concernedIt != '')
        <a href="javascript:concerns_it({{$user['id']}})">
          <span id="concernsIt" class="concerns_ok">√已关注</span>
        </a>
        @else
        <a href="javascript:concerns_it({{$user['id']}})">
          <span id="concernsIt" class="concerns_no">+关注@if($user['sex'] == '1')他@else她@endif</span>
        </a>
        @endif
      </p>
      @else
      <p id="edit_userinfo">
        <a href="{{url('index/users/userinfo/' . session('usersid'))}}">
          编辑个人资料
        </a>
      </p>
      @endif
    </div>
    <hr id="live_hr">

    <div id="two_live">
      <a href="" style="font-size: 17px; color: black; margin-left: 15px;">
        贴吧动态
      </a>
      <a href="{{url('index/users/center',['id'=>$user->id])}}" >
        话题动态
      </a>
    </div>

    <hr style="margin: 0;">
    <div>
      <ul class="nav nav-tabs">
        <li class="active">
          <a data-toggle="tab" href="#live">
            我的关注
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#answer">
            我的帖子
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#question">
            我的回帖
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#collection">
            我的收藏
          </a>
        </li>
 
      </ul>
      <div class="tab-content">

        {{--我的关注--}}
        <div class="tab-pane fade in active" id="live">
          <div class="live">
            <a href="{{url('index/question/container/')}}">
              <p class="topic_name">
                我的关注
              </p>
            </a>
                <div class="content">
                  <ul class='n_img clearfix'>
                    @foreach($ftype as $value1)
                    <li class="Mycare" style='margin:0px;' id='Mycare{{$value1->ftype_id}}' display:block;>
                      <a href='{{url("index/forum/postbar",["id"=>$value1->id])}}'>
                        <img src="{{asset('index/TypeImg/'.$value1->getftypeimg($value1->ftype_id))}}"  alt="" style='width:60px; height:60px;'>
                      </a>
                      <a href='{{url("index/forum/postbar",["id"=>$value1->id])}}'>
                        <font style='color:red; margin:0px; margin-top:50px;'>{{$value1->getTypeName($value1->ftype_id)}}</font>
                      </a>
                      <span style='font-size: 5px'>关注人数:{{$value1->getFtypeCare($value1->ftype_id)}}</span>
                      <span>
                      <img src='{{asset("index/images/qx.png")}}' style='width:20px;height:20px;' title='取消关注' onclick='javascript:carenum({{$value1->ftype_id}});'>
                      <a href='javascript:carenum({{$value1->ftype_id}});' style='font-size:3px '>
                        取消关注
                      </a></span>

                    </li>

                    @endforeach

                    </ul>
                      <script>
                    </script>
                </div>
          </div>
        </div>

        {{--我的帖子--}}
        <div class="tab-pane fade" id="answer">
          @foreach($forum as $value2)
          <div class="live{{$value2->id}}" display:block;>
            <a href="{{url('index/forum/container',['id'=>$value2->id])}}">
              <p class="topic_name">
                {{$value2->subject}}
              </p>
            </a>
            <div>
              @if($value2->getForumImg($value2->id))
              <img src="{{asset('index/forumimg')}}/{{$value2->getForumImg($value2->id)[0]['image']}}" alt="" style="width: 40px; height: 40px; float:left;">
              @else
              <img src="{{asset('index/TypeImg')}}/{{$value2->image}}" alt="" style="width: 40px; height: 40px; float:left;">
              @endif
              <div class="users">
                <a href="">
                  作者:{{$value2->getUsersid($value2->user_id)}}
                </a>
                <p></p>
              </div>
              <p class="goodItQuestion">
                发表时间{{date('Y-m-d H:i:s',$value2->ctime)}}
              </p>
            </div>

            <div class="content">
              <p class="comment">
                {{str_limit(strip_tags($value2->content),'60','...')}}
              </p>
            </div>

            <div class="set">
              <span>
              <a href="{{url('index/forum/container',['id'=>$value2->id])}}">
                <img src="{{asset('index/images')}}/comment.png" alt="">
                {{$value2->commentnum}}
              </a></span>
              <span>
              <a href="{{url('index/forum/container',['id'=>$value2->id])}}">
                <img src="{{asset('index/images')}}/collection.png" alt="" title="">
                {{$value2->like}}
              </a></span>
              <span>
              <a href="javascript:deleteforum({{$value2->id}});">
                <img src="{{asset('index/images')}}/delete.png" alt="" title="删除">
              </a></span>

            </div>
          </div>
          <HR/>
          @endforeach
          <hr>
        </div>

        {{--我的收藏--}}
        <div class="tab-pane fade" id="collection">
          @foreach($likeforum as $like)
          <div class="live{{$like->forum_id}}" display:block;>
            <a href="{{url('index/forum/container',['id'=>$like->forum_id])}}">
              <p class="topic_name">
                {{$like->getforumInfo($like->forum_id)['subject']}}
              </p>
            </a>
            <div>

              @if($like->getImgForum($like->forum_id))
              <img src="{{asset('index/forumimg')}}/{{$like->getImgForum($like->forum_id)}}" alt="" style="width: 40px; height: 40px; float:left;">
              @else
              <img src="{{asset('index/forumimg/default.png')}}" alt="" style="width: 40px; height: 40px; float:left;">
              @endif

              <div class="users">
                <a href="">
                  作者:{{$user->getUserInfo($like->getforumInfo($like->forum_id)['user_id'])['nick_name']}}
                </a>
                <p></p>
              </div>
              <p class="goodItQuestion">
                发表时间:{{date('Y-m-d H:i:s',$like->getforumInfo($like->forum_id)['ctime'])}}
              </p>
            </div>

            <div class="content">
              <p class="comment">
                {{str_limit(strip_tags($like->getforumInfo($like->forum_id)['content'])),'50','...'}}
              </p>
            </div>

            <div class="set">
              <span>
              <a href="{{url('index/forum/container',['id'=>$like->forum_id])}}">
                <img src="{{asset('index/images')}}/comment.png" alt="">
                ({{$like->getforumInfo($like->forum_id)['commentnum']}})
              </a></span>
              <span>
              <a href="{{url('index/forum/container',['id'=>$like->forum_id])}}">
                <img src="{{asset('index/images')}}/collection.png" alt="" title="">
                ({{$like->getforumInfo($like->forum_id)['like']}})
              </a></span>
              <span>
              <a href="javascript:carequxiao({{$like->forum_id}});">
                <img src="{{asset('index/images')}}/delete.png" alt="" title="取消收藏">
              </a></span>
              <script>
              </script>
            </div>
          </div>

          <hr>
          @endforeach
        </div>

        {{--我的回帖--}}
        <div class="tab-pane fade" id="question">
          @foreach($forumid as $forum1)
          <div class="live" display:block;>
            <a href="{{url('index/forum/container',['id'=>$forum1])}}">
              <p class="topic_name">
                {{$commentmodel->getForumName($forum1)['subject']}}
              </p>
            </a>
            <div>

              @if($commentmodel->getForumIMG1($forum1))
              <img src="{{asset('index/forumimg')}}/{{$commentmodel->getForumIMG1($forum1)[0]['image']}}" alt="" style="width: 40px; height: 40px; float:left;">
              @else
              <img src="{{asset('index/forumimg/default.png')}}" alt="" style="width: 40px; height: 40px; float:left;">
              @endif

              <div class="users">
                <a href="">
                  作者:{{$commentmodel->getUsersid($commentmodel->getForumName($forum1)['user_id'])}}
                </a>
                <p></p>
              </div>
              <p class="goodItQuestion">
                我最后评论时间:{{date('Y-m-d H:i:s',$commentmodel->getEndCommentUser1($forum1,$user->id)['ctime'])}}
              </p>
            </div>

            <div class="content">
              <p class="comment">
                我最后评论内容:{!!$commentmodel->getEndCommentUser1($forum1,$user->id)['content']!!}
              </p>
              <a href='JavaScript:togglecomment({{$forum1}});'>
                查看所有回复内容
              </a>
            </div>
            <div >
              <ul id='total_comment{{$forum1}}' style='display:none;'>

                <table>

                  @foreach($commentmodel->getEndCommentUser2($forum1,$user->id) as $key => $a)

                  <tr id='commentforum_{{$a["id"]}}'>

                    <td> 内容:<font style='color:red;'>{!!$a['content']!!}</font></td>
                    <td> {{date('m月d日 H:i:s')}} </td>
                    <td>
                      <a href="javascript:delete_comment({{$a['id']}},{{$forum1}});">
                        <img src="{{asset('index/images')}}/delete.png" style='width:10px;' alt="" title="删除评论">
                      </a></td>

                  </tr>

                  @endforeach
                </table>

              </ul>

            </div>
            <div class="set" >
              <span>
              <a href="{{url('index/forum/container')}}">
                <img src="{{asset('index/images')}}/comment.png" alt="">
                ({{$commentmodel->getForumName($forum1)['commentnum']}})
              </a></span>
              <span>
              <a href="{{url('index/forum/container')}}">
                <img src="{{asset('index/images')}}/collection.png" alt="" title="">
                ({{$commentmodel->getForumName($forum1)['like']}})
              </a></span>

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