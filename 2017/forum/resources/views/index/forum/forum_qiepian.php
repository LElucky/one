@include('index/layouts/header')
<link rel="shortcut icon" href="//tb1.bdstatic.com/tb/favicon.ico" />
<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/52a813f27e644b459fd8d5e126ad0261.css" />
<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/b623a355bbc24dfd9b3ce3844dacfb4c.css" />
<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/d9da5969fb1c4dc59b43bd998d146f13.css" />
<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/61cdc8c6e1434e0aaf3869b0b0d4ba41.css" />
<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/page.css" />

	<div id="local_flash_cnt"></div>
	<div class="wrap1">
		<div class="wrap2">
			<script>
				PageData.tbs = "71ab9769204180f51517058050";
				PageData.is_iPad = 0;
				PageData.itbtbs = "a906665dd7a0c1c7";
				PageData.userTages = {};
			</script>
			<div class="page-container">
				<div class="search-sec">
					<div id="head" class="search_bright_index search_bright clearfix" style="">
						<div class="head_inner">
							<div class="search_top clearfix">
								<div class="search_nav j_search_nav" style="">

								</div>
							</div>
							<div class="search_main_wrap">
								<div class="search_main clearfix">
									<div class="search_form">
									<img src='{{asset("index/images/logo.jpg")}}' style="width:70px; position:absolute; left:420px;">

										<form name="f1" class="clearfix j_search_form" action="/f" id="tb_header_search_form"><input class="search_ipt search_inp_border j_search_input tb_header_search_input" name="kw1" value="" type="text" autocomplete="off" size="42" tabindex="1" id="wd1" maxlength="100" x-webkit-grammar="builtin:search" x-webkit-speech="true" /><input autocomplete="off" type="hidden" name="kw" value="" id="wd2" /><span class="search_btn_wrap search_btn_enter_ba_wrap"><a rel="noopener" class="search_btn search_btn_enter_ba j_enter_ba" href="#" onclick="return false;" onmousedown="this.className+=' search_btn_down'" onmouseout="this.className=this.className.replace('search_btn_down','')">进入贴吧</a></span><span class="search_btn_wrap"><a rel="noopener" class="search_btn j_search_post" href="#" onclick="return false;" onmousedown="this.className+=' search_btn_down'" onmouseout="this.className=this.className.replace('search_btn_down','')">全吧搜索</a></span>

										</form>
										<p style="display:none;" class="switch_radios"><input type="radio" class="nowtb" name="tb" id="nowtb"><label for="nowtb">吧内搜索</label><input type="radio" class="searchtb" name="tb" id="searchtb"><label for="searchtb">搜贴</label><input type="radio" class="authortb" name="tb" id="authortb"><label for="authortb">搜人</label><input type="radio" class="jointb" checked="checked" name="tb" id="jointb"><label for="jointb">进吧</label><input type="radio" class="searchtag" name="tb" id="searchtag" style="display:none;"><label for="searchtag" style="display:none;">搜标签</label></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="main-sec clearfix">










































<div class="content-sec clearfix">

    <div class="left-sec">
        <div class="left-cont-wraper" id="left-cont-wraper" class='sidebar'>

            <div class="u-f-t ufw-gap">
                <div class="title">贴吧分类</div>
                <div class="gap" style="width:125px"></div>
            </div>
            <div class="f-d-w" id="f-d-w" alog-alias="left-forums-category" alog-group="left-forums-category">





            @foreach($type as $ftype)
                <div class="" data-for="entertainment">
                    <div class="f-d-item-content">
                        <div class="title"><span class="typeicon entertainment"></span>
                            <a rel="noopener" title="{{$ftype['typename']}}" target="_blank" href="">{{$ftype['typename']}}</a>
                        </div>
                        <div class="directory-wraper">

                        @foreach($typeson as $types)
							@if($types['fid'] == $ftype['id'])
                            <a rel="noopener" title="{{$types['typename']}}" target="_blank" href="{{url('index/forum/postbar/'.$types['id'])}}">


                            	{{$types['typename']}}


                            </a>
                            @endif
                        @endforeach

                        </div>
                    </div>
                </div>
		@endforeach










                <div class="all-wraper">
                    <a rel="noopener" target="_blank" href="/f/index/forumclass" class="all"><span class="more-txt">查看全部</span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="right-sec clearfix">
        <div class="r-top-sec">
            <div class="forum_recommend" alog-alias="forum_recommend">
                <div class="day_rcmd clearfix" id="day_rcmd" alog-group="day_rcmd"><span class="class_title">朵朵奇吧</span>

                @foreach($forum1 as $one)
                    <div class="rcmd_forum_list">
                        <div class="rcmd_forum clearfix">
                            <a rel="noopener" href="{{asset('index/forum/postbar/'.$one->id)}}" target="_blank" class="rcmd_forum_img"><img src="{{asset('index/TypeImg/'.$one->image)}}" style='width:95px;height:95px;' alt="" /></a>
                            <div class="rcmd_forum_desc">
                                <p class="rcmd_f_name">
                                    <a rel="noopener" href="{{asset('index/forum/postbar/'.$one->id)}}" target="_blank">{{$one->typename}}</a>
                                </p>
                                <p class="rcmd_f_reason">要发家，上贴吧！</p>
                                <p class="rcmd_f_num"><span class="rcmd_f_m_num">{{$one->carenum}}</span><span class="rcmd_f_p_num">{{$one->commentnum}}</span></p>
                            </div>
                        </div>
                    </div>
				@endforeach




                </div>
                <div class="good_rcmd" id="good_rcmd" alog-group="good_rcmd"><span class="class_title">一月新番</span>
                    <div class="good_forum_list clearfix">
                        <a rel="noopener" class="good_rcmd_left" id="good_rcmd_left" href="#" onclick="return false;"></a>
                        <div class="good_rcmd_center" id="good_rcmd_center">





                            <ul id="gr_f_list" class="gr_f_list clearfix">

							@foreach($forum2 as $two)
                                <li class="clearfix">
                                    <a rel="noopener" class="good_forum clearfix" href="{{url('index/forum/postbar/'.$two->id)}}" target="_blank"><img src="{{asset('index/TypeImg/'.$two->image)}}" width="65" height="65" class="gf_pic" />
                                        <div class="gf_desc">
                                            <p class="gf_fname">{{$two->typename}}</p>
                                            <p class="gf_m_num">{{$two->carenum}}</p>
                                            <p class="gf_tag">贴吧动态</p>
                                        </div>
                                    </a>
                         	@endforeach



                                </li>
                            </ul>
                        </div>
                        <a rel="noopener" class="good_rcmd_right" id="good_rcmd_right" href="#" onclick="return false;"></a>
                    </div>
                </div>
            </div>
            <script>
                void
                function(e, t) {
                    for(var n = t.getElementsByTagName("img"), a = +new Date, i = [], o = function() {
                            this.removeEventListener && this.removeEventListener("load", o, !1), i.push({
                                img: this,
                                time: +new Date
                            })
                        }, s = 0; s < n.length; s++) ! function() {
                        var e = n[s];
                        e.addEventListener ? !e.complete && e.addEventListener("load", o, !1) : e.attachEvent && e.attachEvent("onreadystatechange", function() {
                            "complete" == e.readyState && o.call(e, o)
                        })
                    }();
                    alog("speed.set", {
                        fsItems: i,
                        fs: a
                    })
                }(window, document);
            </script>
        </div>
        <div class="r-left-sec">

            <div class="sub_nav_wrap clearfix" id="sub_nav_wrap" alog-alias="sub_nav_wrap" alog-group="sub_nav_wrap">
                <ul class="sub_nav_list">
                    <li style="margin-left:8px">
                        <a rel="noopener" href="#" tag_id="all" hot_index="0" id="j_remen_nav" class="nav_li nav_li_all cur">热门动态</a>
                    </li>
                    <li class="nav_hover" style=""></li>
                </ul>
            </div>
            <div id="like-tag-nav"><span></span>
                <a rel="noopener" href="#" class=""></a>
            </div>
            <div id="info-section"></div>
            <ul class="new_list" id="new_list" alog-alias="feedlist0" alog-group="feedlist0">



@foreach($hotforum as $forum)
                <li class="clearfix j_feed_li " fid="649787" data-forum-id="649787" data-thread-id="5501335377">
                    <div class="n_right">
                        <div>
                            <div class="title-tag-wraper">
                                <a rel="noopener" href="{{url('index/forum/postbar/'.$forum->type)}}" target="_blank" class="n_name feed-forum-link" title="{{$forum->getType($forum->type)}}" data-id="649787" data-type="forum">{{$forum->getType($forum->type)}}</a>
                            </div>

                            <div class="thread-name-wraper">
                                <a rel="noopener" href="{{url('index/forum/container',['id'=>$forum->id])}}" target="_blank" class="title feed-item-link" title="【美食】在上海一定要吃的50个地标性美食" data-id="5501335377" data-type="thread" data-locate="10">{{$forum->subject}}</a><span class="list-post-num"><em data-num="{{$forum->getCountComment($forum->id)}}">{{$forum->getCountComment($forum->id)}}</em><span class="list-triangle-border"></span><span class="list-triangle-body"></span></span>
                            </div>
                        </div>
                        <div class="n_txt"> </div>
                        <ul class="n_img clearfix" >
                        @if($forum->getForumImg($forum->id))
                            @foreach($forum->getForumImg($forum->id) as $img)
                            <li><img   src="{{asset('index/forumimg')}}/{{$img['image']}}" style='width:100px; height:80px;'>

                            </li>
                            @endforeach
                        @endif
                       </ul>

                        <div class="n_reply">
                            <a rel="noopener" href="" title="主题作者" target="_blank" class="post_author">{{$forum->getUsersid($forum->user_id)}}</a><span class="time">{{date('Y-m-d H:i:s')}}</span></div>
                    </div>
                </li>
@endforeach

{{$hotforum->links()}}

            </ul>

            <div id="data_loading" class="data_loading"><img src="{{asset('index/forumstyle/picture')}}//loading.gif" width="22" height="22" /><span class="load_tip">.</span></div>
            <div id="btn_more" class="btn_more">
                <a href="#" style="text-decoration:none">更多精彩贴子</a>
            </div>
            <div id="data_error_bar" class="data_error_bar">
                <a href="#">数据加载失败，请点击重试</a>
            </div>
        </div>
        <div class="r-right-sec">
            <div class="right_wrap" id="right_wrap">
                <div>
                    <div class="app_download_box">
                        <div class="item_hd"><span class="title">扫二维码下载贴吧客户端</span></div>
                        <div class="clearfix app_download_wrap">
                            <div class="app_download_icon"></div>
                            <div class="app_download_info">下载贴吧APP<br />看高清直播、视频！</div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="nani_app_download_box">
                        <div class="item_hd"><span class="title">扫二维码下载Nani客户端</span></div>
                        <div class="clearfix app_download_wrap">
                            <div class="app_download_icon"><img src="{{asset('index/forumstyle/picture')}}//icon_202fd91.png" width="75" /></div>
                            <div class="app_download_info">Nani小视频<br />1遍不过瘾，越刷越开心</div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="topic_list_box">
                        <div class="item_hd"><span class="title">贴吧热议榜</span>
                            <a rel="noopener" class="verify_link" target="_blank" href="/hottopic/browse/topicList?res_type=1">{{--查看榜单--}}</a>
                        </div>
                        <ul class="topic_list_hot topic_list j_topic_toplist">
                        @foreach($hot1 as $a)
                                <li><a href='{{url("index/forum/container",["id"=>$a->id])}}'>{{str_limit($a->subject,'25','...')}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div> </div>





























<div class="item media_item" id="media_item" alog-alias="media_item">
  <div class="item_hd">
            <span class="title">贴吧娱乐</span>
            <a class="verify_link" target="_blank" href="">合作沟通</a>
  </div>
  <a class="media" href=""∠ target="_blank">
        <img src="{{asset('index/forumstyle/picture')}}//229f5351f0806d20d49089a086434cba.jpeg" height="90" width="220">
  </a>
  <ul class="media_list">
   <li>
          <a href="">盘点那些闪瞎眼的明星夫妇!</a>
      </li>
     <li>
          <a href="" target="_blank">同样是参加综艺，有人获赞有人被骂，差距在哪？</a>
      </li>

      <li>
          <a href="" target="_blank">回忆杀！昔日台湾偶像剧中的“男神们”今何在？</a>
      </li>


  </ul>
</div>

<div alog-alias="notice_item" id="notice_item" class="item notice_item">
   <div class="item_hd">
      <span class="title">公告板</span>
  </div>
<a class="notice" href="">
      <img width="220" height="90" src="{{asset('index/forumstyle/picture')}}//公告板.jpg">
  </a>
  <ul alog-group="notice_list" class="notice_list">

       <li>
          <a href="">贴吧全面打击儿童色情信息</a>
        </li>

        <li>
          <a href=" ">贴吧积极配合网信办整改</a>
        </li>

    </ul>
</div>



<script>
var pv_img = new Image();
pv_img.src = "https://gsp0.baidu.com/5aAHeD3nKhI2p27j8IqW0jdnxx1xbK/tb/img/pv.gif?fr=tb0_forum&st_mod=new_spage&st_type=pv_sum&_t="+(new Date().getTime());
</script></div></div></div></div><div class="bottom-bg"></div></div></div><div class="footer" alog-alias="footer">    <p alog-group="copy">©2018 Baidu<a  rel="noreferrer" href="//www.baidu.com/duty/">使用百度前必读</a><a  rel="noreferrer" href="https://gsp0.baidu.com/5aAHeD3nKhI2p27j8IqW0jdnxx1xbK/tb/eula.html">贴吧协议</a><a  rel="noreferrer" href="//tieba.baidu.com/hermes/feedback">投诉反馈</a>信息网络传播视听节目许可证 0110516<a  rel="noreferrer" href="http://net.china.cn/chinese/index.htm" target="_blank"><img src="{{asset('index/forumstyle/picture')}}//net_0d27e51.png" width="20"></a><a  rel="noreferrer" href="http://www.bj.cyberpolice.cn/index.htm" target="_blank"><img title="首都网络110报警服务" src="{{asset('index/forumstyle/picture')}}//110_3adf20a.png" width="20"></a></p></div><script>window.alogObjectConfig = {  product: '14',     page: '14_3',        monkey_page: 'tieba-index', speed_page: '3',         speed: {            sample: '0.2'   },        monkey: {            sample: '0.01',      hid: '762'       },        exception: {                 sample: '0.1'   },    };</script>
 </div></div><script type="text/javascript">alog&&alog("speed.set","drt",+new Date);</script><script>PageUnitData={"search_input_tip":"\u8f93\u5165\u4f60\u611f\u5174\u8da3\u7684\u4e1c\u4e1c","dasense_messenger_whitelist":[["http:\/\/fedev.baidu.com"],["http:\/\/jiaoyu.baidu.com"],["http:\/\/caifu.baidu.com"],["http:\/\/jiankang.baidu.com"],["http:\/\/tieba.dre8.com"],["http:\/\/tdsp.nuomi.com"],["http:\/\/baiju.baidu.com"],["http:\/\/temai.baidu.com"],["http:\/\/tieba.baidu.com"],["http:\/\/zt.chuanke.com"],["http:\/\/window.sturgeon.mopaas.com"],["http:\/\/api.union.vip.com"],["http:\/\/api.dongqiudi.com"],["http:\/\/www.chuanke.com"],["http:\/\/dcp.kuaizitech.com\/"]],"like_tip_svip_black_list":"","icons_category":{"101":["\u5df4\u897f\u4e16\u754c\u676f"],"102":["\u661f\u5ea7\u5370\u8bb0"],"104":["\u8d34\u5427\u5370\u8bb0"]}};</script>
<script src="{{asset('index/forumstyle')}}/js/4b37361121ef4660a68a59a7e5b4732f.js"></script>
<script></script><script src="{{asset('index/forumstyle')}}/js/3bdbc8d4072e437eae933fa3c5add669.js"></script>
<script src="{{asset('index/forumstyle')}}/js/56a5272caa8f419fbf8678ef35276513.js"></script>
<script src="{{asset('index/forumstyle')}}/js/5c524637c49a44e4b5a513033f3b6b5c.js"></script>
<script src="{{asset('index/forumstyle')}}/js/1.js"></script>
<script>window.modDiscardTemplate={};</script>
</body>
</html>
<script> var _trace_page_logid = 0050339780; </script>