@include('index/layouts/header')
<link rel="stylesheet" href="{{asset('index/postbar')}}/css/2cc7ca0ef4464aaca08c46094fd98e9f.css" />
<link rel="stylesheet" href="{{asset('index/postbar')}}/css/3d96a371408548eb8d646c6c9536573c.css" />
<link rel="stylesheet" href="{{asset('index/postbar')}}/css/7181321436aa4a57842750af6fe5340d.css" />
<link rel="stylesheet" href="{{asset('index/postbar')}}/css/97804cd8e0294d8aab819f35cba296bf.css" />
<link rel="stylesheet" href="{{asset('index/postbar')}}/css/d112e922d1cd49c492a5ddadbee1b023.css" />
<link rel="stylesheet" href="{{asset('index/postbar')}}/css/abe366f7f75d43beb13225b94dbdeb64.css" /> 
{{-- <link rel="shortcut icon" href="https://gsp0.baidu.com/5aAHeD3nKhI2p27j8IqW0jdnxx1xbK/tb/favicon.ico"/>--}}
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });

</script>

</head>

<body>
<div class="wrap1">
    <div class="wrap2">
        
<div class="header">
    <div class="common-pagelet-userbar">
    
<div id="local_flash_cnt"></div>

</div>



<div id="head" class="search_bright clearfix">
<div class="head_inner">
    <div class="search_top clearfix">
    </div>
    <div class="search_main_wrap">
        <div class="search_main clearfix">
            <div class="search_form">
                
                <form name="f1" class="clearfix j_search_form" action="/f"
                      id="tb_header_search_form">
                                        <input class="search_ipt search_inp_border j_search_input tb_header_search_input"
                           name="kw1" value="{{$ftype->typename}}" type="text" autocomplete="off" size="42"
                           tabindex="1" id="wd1" maxlength="100" x-webkit-grammar="builtin:search"
                           x-webkit-speech="true"/>
                    <input autocomplete="off" type="hidden" name="kw" value="井陉" id="wd2"/>
                    <span class="search_btn_wrap search_btn_enter_ba_wrap">
                        <a rel="noreferrer"  class="search_btn search_btn_enter_ba j_enter_ba" href="#"
                           onclick="return false;"
                           onmousedown="this.className+=' search_btn_down'"
                           onmouseout="this.className=this.className.replace('search_btn_down','')">进入贴吧</a>
                    </span>

                    <a rel="noreferrer"  class="senior-search-link" href="//tieba.baidu.com/f/search/adv">	</a>
                                    </form>
                                <p style="display:none;" class="switch_radios">
                    <input type="radio" class="nowtb" name="tb" id="nowtb"><label
                        for="nowtb">吧内搜索</label>
                    <input type="radio" class="searchtb" name="tb" id="searchtb"><label for="searchtb">搜贴</label>
                    <input type="radio" class="authortb" name="tb" id="authortb"><label for="authortb">搜人</label>
                    <input type="radio" class="jointb" checked="checked" name="tb" id="jointb"><label
                        for="jointb">进吧</label>
                    <input type="radio" class="searchtag" name="tb" id="searchtag"
                           style="display:none;"><label for="searchtag"
                                                        style="display:none;">搜标签</label>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
<script>
if (window.alog && window.alog.fire) {
    alog('speed.set', 'c_widget_search_show', +new Date);
    alog.fire("mark");
}
</script>


<div class="head_main">
        <div class="head_top">
        

<div class="top_iframe" style="position:relative;z-index:9999;">
    </div>


    </div>
    <div class="head_middle">
        


    </div>
    <div class="head_content">
        



<div class="card_banner card_banner_link" >

  
  <div class='gift-goin'>
    <div class="gift-goin-left">
        <div class="gift-goin-con">
            <div class="gift-goin-con-start">
                <p class="gift-goin-con-title">本吧礼赞</p>
                <div class="gift-goin-con-title thanks"><em>感谢你与</em><span class="forum-name-sub">本吧</span><em>的一同成长</em></div>
            </div>
            <div class="gift-goin-con-list">
                <div class="gift-goin-con-title"><em>感谢你与</em><span class="forum-name-sub">本吧</span><em>的一同成长</em></div>
                <div class="gift-goin-con-check">
                    <ul class="gift-goin-con-check-list"></ul>
                    <a href="javascript:;" class="j-check-gift" j-check-gift>查看榜单 ></a>
                </div>
            </div>
        </div>
        <img src="{{asset('index/postbar/picture')}}/ihome_batou_icon_636b52f.png" height="50" width="50" alt="" class="gift-goin-img j-goin-gift"/>
    </div>
</div>



</div>

<div class="card_top_wrap clearfix card_top_theme ">
   <div class="card_top_right">
       
    <div class="sign_mod_bright" id="sign_mod">
        
<div class="sign_tip_container">
    <div class="j_succ_info sign_succ1" style="display:none">
        <div class="sign_tip_bdwrap clearfix">
            <div class="sign_tip_bd_arr"></div>
            <div class="sign_tip_main">
                <div class="sign_succ_calendar">
                    <div class="sign_succ_calendar_title">
                        <div class="calendar_title_month clearfix">
                            <div class="calendar_month_next j_calendar_month_next">&nbsp;</div>
                            <div class="calendar_month_prev j_calendar_month_prev">&nbsp;</div>
                            <div class="calendar_month_span j_calendar_month">&nbsp;</div>
                        </div>
                    </div>
                    <table class="sign_succ_table "
                            >
                        <thead align="center">
                       
                        </tbody>
                    </table>
                </div>

               

            </div>

        </div>
    </div>
</div>



        
            </div>
   </div>
   <div class="card_top clearfix">
              <div class="card_head">
           <a rel="noreferrer" href="/f?kw=%E4%BA%95%E9%99%89&ie=utf-8">
               <img class="card_head_img" id="forum-card-head" src="{{asset('index/TypeImg/'.$ftype->image)}}"/>
           </a>
       </div>

       <div class="card_title">
           <a rel="noreferrer" class=" card_title_fname" title=""
              href="java
:void(0)">
           	{{$ftype->typename}}
           </a>
                                 <div class="focus_btn_wrap">
               
<a rel="noreferrer" href="#" onclick="carenum({{$ftype->id}})" @if($ftype->care($ftype->id) == false) class="focus_btn islike_focus" @else class='focus_btn cancel_focus' @endif  id="j_head_focus_btn" style="margin-top:2px;"></a>
           </div>
           <script>
			function carenum($id){
				var path = $('#self_path').val();
				$.ajax({
					url:path+"/index/careforum/carenum/"+$id,
					success:function(data){
						if(data == 1){
							$('#j_head_focus_btn').removeClass("focus_btn islike_focus").addClass('focus_btn cancel_focus');
						}
						if(data == 0){
							window.alert('关注失败');
							}
						if(data == 2){
							window.alert('请登录在进行操作');
            }
						if(data == 3){
             $('#j_head_focus_btn').removeClass("focus_btn cancel_focus").addClass('focus_btn islike_focus'); 
            }
					}
				})
			}
           </script>
           
           <div class="card_num">
               <span class="">
  <span class="card_numLabel">关注：</span>
  <span class="card_menNum">{{$ftype->carenum}}</span>
  <span class="card_numLabel">贴子：</span>
  <span class="card_infoNum">{{$ftype->forumnum}}</span>
</span>
           </div>
       </div>

       <p class="card_slogan">贴吧 介绍</p>

       <div class="card_info">
           <ul class="forum_dir_info bottom_list clearfix">
                                  <li>
                                          </li>
                   <li>
                       <span class="dir_text">目录：</span>
                   </li>
                   <li>
                                                  <a rel="noreferrer" target="_blank"
                              href="">{{$ftype->getFtypeParent($ftype->fid)}}</a>
                                          </li>
                          </ul>
       </div>
   </div>
</div>



<div class="game_frs_in_head">
    </div>


<div class="nav_wrap " id="tb_nav">
        <ul class="nav_list j_nav_list">
       
                                <li class=" focus j_tbnav_tab " data-tab-main>
    <a href="{{url('index/forum/postbar/'.$ftype->id)}}" />看贴</a>
</li>                                
	<li class=" j_tbnav_tab " data-tab-group>
    <a href="#prependedInput" class="j_nav_local_tab_link j_tbnav_tab_a" stats-data="fr=tb0_forum&st_mod=frs&st_value=tabgroup">发帖</a>
</li>
            </ul>
                            <form class="search_internal_wrap pull_right j_search_internal_forum">
                <input class="search_internal_input j_search_internal_input" value="" placeholder="吧内搜索" type="text"/>
                <button class="search_internal_btn" type="submit"/>
                <i></i></button>
            </form>
            </div>

    </div>
</div>
</div>
<div class="content" id="content">
        <div class="forum_content clearfix">
        <div class="main" id="content_wrap">
            <div id="content_leftList" class="content_leftList j-content-leftList clearfix">
    






<ul id="thread_list" class="threadlist_bright j_threadlist_bright">
    <ul id="thread_top_list" class="thread_top_list">
                






@if(!empty($forum))
@foreach($forum as $f)
                                <li  class=" j_thread_list clearfix" 
                                 >
                                            <div class="t_con cleafix"  style='border-top:1px gray solid;'>
                                                            <div class="col2_left j_threadlist_li_left">
                                                 
                                                        <span class="threadlist_rep_num center_text"
                                                            title="回复">0修改</span>
                                                            </div>
                                                <div class="col2_right j_threadlist_li_right ">
                                            <div class="threadlist_lz clearfix">
                                                <div class="threadlist_title pull_left j_th_tit ">
                                    
                                    
                                    <a rel="noreferrer"  href="{{url('index/forum/container',['id'=>$f->id])}}" target="_blank" class="j_th_tit ">{{$f->subject}} </a>
                                </div><div class="threadlist_author pull_right">
                                    <span class="tb_icon_author "
                                          title="主题作者: {{$f->getUsersid($f->user_id)}}"
                                         ><i class="icon_author"></i><span class="frs-author-name-wrap"><a rel="noreferrer"   class="frs-author-name j_user_card " href="/home/main/?un=%E9%BB%AF%E5%BD%B1%E6%B1%9F&ie=utf-8&fr=frs" target="_blank">{{$f->getUsersid($f->user_id)}}</a></span><span class="icon_wrap  icon_wrap_theme1 frs_bright_icons "></span>    </span>
                                    <span class="pull-right is_show_create_time" title=""></span>
                                </div>
                                            </div>
                                                            <div class="threadlist_detail clearfix">
                                                    <div class="threadlist_text pull_left">
                                                                <div class="threadlist_abs threadlist_abs_onlyline ">
                                            			{{strip_tags($f->content)}}
                                        </div>

                                                    </div>

                                                    
                                <div class="threadlist_author pull_right">
                                        <span class="tb_icon_author_rely j_replyer" title="最后回复人:{{$f->getEndCommentUser($f->id)}} ">
                                            <i class="icon_replyer"></i>
                                            <a rel="noreferrer"   class="frs-author-name j_user_card " href="/home/main/?un=%E9%BB%AF%E5%BD%B1%E6%B1%9F&ie=utf-8&fr=frs" target="_blank">{{$f->getEndCommentUser($f->id)}}</a>        </span>
                                        <span class="threadlist_reply_date pull_right j_reply_data" title="最新更新时间">
           {{--{{$f->getEndCommentTime($f->id)}}--}}    @if(!empty($f->getEndCommentTime($f->id))) {{$f->getEndCommentTime($f->id)}}  @else  {{date('Y-m-d H:i:s',$f->ctime)}} @endif                                     </span>
                                </div>
                                                </div>
                                                    </div>
                                    </div>
                                </li>
                              
                               
@endforeach
@else





							 <li  class=" j_thread_list clearfix"  >
                                            <div class="t_con cleafix"  style='border-top:1px gray solid;'>
                                                            <div class="col2_left j_threadlist_li_left">
                                                 
                                                        <span class="threadlist_rep_num center_text"
                                                            title="回复">0xiugai</span>
                                                            </div>
                                                <div class="col2_right j_threadlist_li_right ">
                                            <div class="threadlist_lz clearfix">
                                                <div class="threadlist_title pull_left j_th_tit ">
                                    本吧还没有任何动态,快来发表第一条动态吧
                                    
                                    <a rel="noreferrer"  href="" target="_blank" class="j_th_tit "> </a>
                                </div><div class="threadlist_author pull_right">
                                    <span class="tb_icon_author "
                                          title="主题作者: 黯影江"
                                          data-field='{&quot;user_id&quot;:824568182}' ><i class="icon_author"></i><span class="frs-author-name-wrap"><a rel="noreferrer"   class="frs-author-name j_user_card " href="" target="_blank">黯影江</a></span><span class="icon_wrap  icon_wrap_theme1 frs_bright_icons "></span>    </span>
                                    <span class="pull-right is_show_create_time" title="创建时间">19:03</span>
                                </div>
                                            </div>
                                                            <div class="threadlist_detail clearfix">
                                                    <div class="threadlist_text pull_left">
                                                                <div class="threadlist_abs threadlist_abs_onlyline ">
                                            			
                                        </div>

                                                    </div>

                                                    
                                <div class="threadlist_author pull_right">
                                        <span class="tb_icon_author_rely j_replyer" title="最后回复人: 黯影江">
                                            <i class="icon_replyer"></i>
                                            <a rel="noreferrer"   class="frs-author-name j_user_card " href="/home/main/?un=%E9%BB%AF%E5%BD%B1%E6%B1%9F&ie=utf-8&fr=frs" target="_blank">黯影江</a>        </span>
                                        <span class="threadlist_reply_date pull_right j_reply_data" title="最后回复时间">
                                            19:03        </span>
                                </div>
                                                </div>
                                                    </div>
                                    </div>
                                </li>

















@endif












                                </ul>

<div class="thread_list_bottom clearfix">
           <div class="th_footer_bright">
        <div class="th_footer_l">
                          贴子数
                <span class="red_text">{{$ftype->forumnum}}</span>篇
                <a rel="noreferrer"  class="fans_name" href="/bawu2/platform/listMemberInfo?word=%E4%BA%95%E9%99%89&ie=utf-8"
                   target="_blank">{{$ftype->typename}}家人共</a><span
                    class="red_text">{{$ftype->carenum}}</span>
                    </div>
    </div>
</div>

<div id="forum_recommend" class="forum_recommend">
    


    
</div>







	<form name="example" method="post" action="{{url('index/forum/save')}}" class="form-search" enctype="multipart/form-data">
		<table >
			<tr>
				<td></td>
				<td id='input_subject'>
					<div class="input-prepend">
  						<span class="add-on">发表新帖</span>
  						
  						<input class="span5" id="prependedInput" type="text" placeholder="Sbject" style='width:650px;' name='subject'>		
  						{{csrf_field()}}
  						
					</div>		
				</td>
				<td></td>
			</tr>
		
			<tr>
				<td></td>
				<td>
      				<textarea id="editor_id" name="content" style="width:730px;height:150px;"></textarea>
				</td>
				<td></td>
			</tr>
        <input type='hidden' name='type' value='{{$ftype->id}}'>
      <tr>
        <td></td>
        <td><input type='file' name='forumImg[]' multiple='multiple' ><input type="submit"  value="提交内容" class='btn btn-info' style='float:right; margin:10px;'/></td>
        <td></td>
      </tr>
		</table>
	</form>
































</div>
        </div>
        <div class="aside" id="aside">
            <div class="aside_region celebrity" id="">
    <h4 class="region_header clearfix">
                <span class="pull_right j_op"> </span>
    </h4>

    <div class="region_footer"></div>
</div>





<div class="aside_region zyq_mod_link j_zyq_mod_link" id="">
    <h4 class="region_header clearfix">
        服务吧友专栏        <span class="pull_right j_op"> </span>
    </h4>
    <div class="region_cnt clearfix">
            <ul class="unordered_list_dot">
                    <li><a rel="noreferrer"  href="http://www.sjzjx.gov.cn/Index.html" target="_blank" class="j_mod_item">井陉县政务网</a></li>
            </ul>
    </div>
    <div class="region_footer"></div>
</div>
<div class="aside_region zyq_mod_friend j_zyq_mod_friend" id="">
    <h4 class="region_header clearfix">
        友情贴吧        <span class="pull_right j_op"> </span>
    </h4>
    <div class="region_cnt clearfix">
            <ul class="aside_media_horizontal clearfix">
              
            </ul>
    </div>
    <div class="region_footer"></div>
</div>


</body>
</html>
