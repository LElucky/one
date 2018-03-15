@include('index/layouts/header')
			<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/9c3fc329aacb440c96eced6f69e8cab5.css" />
	<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/09d1aa4b1de54b30a4e69f7a61d67789.css" />
	<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/58b605dd30a448f5b7dd8a2b6829400f.css" />
	<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/ab985bed32e3410880e3d2e52fa8672f.css" />
	<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/c327ea2955fd4a1595497e09d012604a.css" />
	<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/36027467a6a34996b9d00e34150f7e1b.css" />
	<link rel="stylesheet" href="{{asset('index/forumstyle')}}/css/4c61f74bc0024df1bbb9349dd7d80256.css" />
		<!--[if lt IE 9]><script>(function(){    var tags = ['header','footer','figure','figcaption','details','summary','hgroup','nav','aside','article','section','mark','abbr','meter','output','progress','time','video','audio','canvas','dialog'];    for(var i=tags.length - 1;i>-1;i--){ document.createElement(tags[i]);}})();</script><![endif]-->



	</head>

	<body>

		<div id="local_flash_cnt"></div>
		<div class="wrap1">
			<div class="wrap2">
		
				<div id="head" class=" search_bright clearfix" style="">
					<div class="head_inner">
				
						<div class="search_main_wrap">
							<div class="search_main clearfix">
								<div class="search_form">
									<a rel="noopener" title="到贴吧首页" href="/" class="search_logo" style=""></a>
									<form name="f1" class="clearfix j_search_form" action="/f" id="tb_header_search_form"><input class="search_ipt search_inp_border j_search_input tb_header_search_input" name="kw1" value="恋与制作人" type="text" autocomplete="off" size="42" tabindex="1" id="wd1" maxlength="100" x-webkit-grammar="builtin:search" x-webkit-speech="true" /><input autocomplete="off" type="hidden" name="kw" value="恋与制作人" id="wd2" /><span class="search_btn_wrap search_btn_enter_ba_wrap"><a rel="noopener" class="search_btn search_btn_enter_ba j_enter_ba" href="#" onclick="return false;" onmousedown="this.className+=' search_btn_down'" onmouseout="this.className=this.className.replace('search_btn_down','')">进入贴吧</a></span><span class="search_btn_wrap"><a rel="noopener" class="search_btn j_search_post" href="#" onclick="return false;">全吧搜索</a></span>
										<a rel="noopener" class="senior-search-link j_benba_search" href="#" onclick="return false;">吧内搜索</a><span id="search_baidu_promote"><a id="search_baidu_promote_download" style="color:red;padding-left:8px;text-decoration:underline;"  pv_code="0" href="#" target="_self"></a></span></form>
									<p style="display:none;" class="switch_radios"><input type="radio" class="nowtb" name="tb" id="nowtb"><label for="nowtb">吧内搜索</label><input type="radio" class="searchtb" name="tb" id="searchtb"><label for="searchtb">搜贴</label><input type="radio" class="authortb" name="tb" id="authortb"><label for="authortb">搜人</label><input type="radio" class="jointb" checked="checked" name="tb" id="jointb"><label for="jointb">进吧</label><input type="radio" class="searchtag" name="tb" id="searchtag" style="display:none;"><label for="searchtag" style="display:none;">搜标签</label></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="container" class="l_container  ">
					<div class="content clearfix">
						<div class="card_top_wrap clearfix card_top_theme2 ">
							<div class="card_top_right">
								<div class="sign_mod_bright" id="sign_mod">
									<div class="sign_tip_container">
										<div class="j_succ_info sign_succ1" style="display:none">
											<div class="sign_tip_bdwrap clearfix">
												<div class="sign_tip_bd_arr"></div>
												<div class="sign_tip_main">
													

												</div>

											</div>
										</div>
									</div>
									
								</div>
							</div>
							<div class="card_top  clearfix">
								<div class="card_head ">
									<a href="{{url('index/forum/postbar/'.$container->type)}}"> <img class="card_head_img" src="{{asset('index/TypeImg/'.$container->image)}}" /> </a>
								</div>
								<div class="card_title ">
									<a class="card_title_fname" title="" href="{{url('index/forum/postbar/'.$container->type)}}"> {{$container->getType($container->type)}}</a> <span class="card_num "><span class="card_numLabel">关注：</span><span class="card_menNum">{{$ftype->carenum}}</span><span class="card_numLabel">贴子：</span><span class="card_infoNum">{{$ftype->forumnum}}</span></span>
								</div>
							</div>
						</div>
						<div class="nav_wrap nav_wrap_add_border" id="tb_nav">
							<ul class="nav_list j_nav_list">
								<li class=" j_tbnav_tab">
									<a href="{{url('index/forum/postbar/'.$container->type)}}" class=" j_tbnav_tab_a" id="tab_forumname" stats-data="fr=tb0_forum&st_mod=frs&st_value=tabmain">看贴</a>
								</li>
								<li class=" j_tbnav_tab">
									<a href="" class=" j_tbnav_tab_a"></a>
								</li>
								
								<li class=" j_tbnav_tab">
									<a href="/f/good?kw=%E6%81%8B%E4%B8%8E%E5%88%B6%E4%BD%9C%E4%BA%BA&tab=good" class=" j_tbnav_tab_a" stats-data="fr=tb0_forum&st_mod=frs&st_value=tabgood">精品</a>
								</li>
								

							</ul>
						</div>
						<div class="pb_content clearfix" id="pb_content">
							<div class="left_section">
								<div class="core_title_wrap_bright clearfix" id="j_core_title_wrap">
									<h3 class="core_title_txt pull-left text-overflow  " title="" style="width: 416px; margin-top:20px;"><a>{{$container->subject}}</a></h3>
									
									
									
									<script>
									function like($id){
										var path = $('#self_path').val();
										$.ajax({
											url:path+"/index/forum/like/"+$id,
											success:function($data){
													if($data == 1){
														$('#like_forum').text('已收藏');
														}
													if($data == 0){
														$('#like_forum').text('未收藏');
														}
													if($data == 7){
														window.alert('请登录后进行操作');
														}
													if($data == 4){
														window.alert('收藏失败');
													}
												}
										});
										}
									</script>
									<input type='hidden' value='{{$container->getForumLike($container->id)}}' >
									<span class="core_title_btns pull-right" style='margin:20px;'>     
									<a id='like_forum' rel="noopener" class="btn-sub btn-small j_favor"  href='#' onclick="like({{$container->id}})" >@if($container->getForumLike($container->id) == 1) 已收藏   @else 未收藏 @endif</a>
									
									</span>
									<span>浏览量 {{$container['readnum']}}</span>
									<div id="j_favthread" class="p_favthread">
										<p class="p_favthr_tip"></p>
									</div>
								</div>
								<div class="p_postlist" id="j_p_postlist">
									
									{{--forum 内容区--}}
									<style>
								        #p_content img{
	                                               width:400px;
								        	       height:400px;
								        }
								    </style>
									<div id = 'container_forum' class="l_post l_post_bright j_l_post clearfix" >
										<div class="d_author">
											<ul class="p_author">
												<li class="icon">
													<div class="icon_relative j_user_card" data-field='{"un":"picture/caa74ab1c4c241aea865a510ce330678.gifu9752picture/caa74ab1c4c241aea865a510ce330678.gifu6885picture/caa74ab1c4c241aea865a510ce330678.gifu5973picture/caa74ab1c4c241aea865a510ce330678.gifu5b69"}'>
														<a style="" target="_blank" class="p_author_face " href=""><img username="青梅女孩" class="" src="{{asset('index/users_image/'.$container->getUserImg($container->user_id))}}" data-tb-lazyload="https://gss0.bdstatic.com/6LZ1dD3d1sgCo2Kml5_Y_D3/sys/portrait/item/79ebe99d92e6a285e5a5b3e5ada9f924" /></a>

													</div>
												</li>
												<li class="d_nameplate">

												</li>
												<li class="d_name" data-field='{"user_id":620358521}'>

													<a target="_blank">楼主</a>

												</li>

												<li class="l_badge" style="display:block;">
													<div class="p_badge">
														<a href="" target="_blank" class="user_badge d_badge_bright d_badge_icon2_1" title="本吧头衔7级，经验值217，点击进入等级头衔说明页">
															<div class="d_badge_title ">{{$container->getUsersid($container->user_id)}}</div>
															<div class="d_badge_lv">7</div>
														</a>
													</div>
												</li>
											</ul>
										</div>
										<div class="d_post_content_main ">
											<div class="p_content  " id='p_content'>
												<div class="save_face_bg_hidden save_face_bg_0">
													<a rel="noopener" class="save_face_card"></a>
												</div>
												<cc>
													<div id="post_content_116635133065" class="d_post_content j_d_post_content "> {!!$container->content!!}</div><br> </cc> <br>
												<div class="user-hide-post-down" style="display: none;"></div>






                        <ul class="n_img clearfix" >
                        @if($container->getForumImg($container->id))
                            @foreach($container->getForumImg($container->id) as $img)
                            <li><img   src="{{asset('index/forumimg')}}/{{$img['image']}}" style='width:400px; height:400px;'>
                            
                            </li>
                            @endforeach
                        @endif
                       </ul>
                       









											</div>
											<div class="core_reply j_lzl_wrapper">
												<div class="core_reply_tail clearfix">
													<div class="j_lzl_r p_reply" data-field='{"pid":116635133065,"total_num":1}'>
														<a rel="noopener" href="#" class="lzl_link_unfold" style="display:none;"></a><span class="lzl_link_fold" style="display:"></span></div>
													<div class="post-tail-wrap"><span class="j_jb_ele"><a rel="noopener" href="#" onclick="window.open('//tieba.baidu.com/complaint/info?type=0&cid=0&tid=5498377664&pid=116635133065','newwindow', 'height=900, width=800, toolbar =no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no');return false;" class="tail-info" data-checkun="un">举报<i class="icon-jubao pb_list_triangle_down"></i></a>|<span class="super_jubao" style="display:none;"><a rel="noopener" href="#" onclick="window.open('//tieba.baidu.com/complaint/info?type=1&cid=0&tid=5498377664&pid=116635133065','newwindow', 'height=900, width=800, toolbar =no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no');return false;">侵权举报</a><a rel="noopener" href="#" onclick="window.open('//tieba.baidu.com/complaint/info?type=2&cid=0&tid=5498377664&pid=116635133065','newwindow', 'height=900, width=800, toolbar =no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no');return false;">有害信息举报</a></span></span><span class="tail-info">来自<a rel="noopener" data-tip="贴吧群时代开启，快到群里来！" href="http://c.tieba.baidu.com/c/s/download/pc?tab=qunliao" target="_blank">iPhone客户端</a></span><span class="tail-info">1楼</span><span class="tail-info">{{date('Y-m-d H:i:s',$container->ctime)}}</span></div>
													<ul class="p_props_tail props_appraise_wrap"></ul>
												</div>
												
											</div>
										</div>
									</div>
									
									
									
									
									
									
									
									@if(!empty($comment))
									{{--评论区--}}
									@foreach($comment as $value)
									<input type='hidden' value='{{$value->id}}' id = 'hidden{{$value->id}}'>
									<div class="l_post l_post_bright j_l_post clearfix " >
										<div class="d_author">
											<ul class="p_author">
												<li class="icon">
													<div class="icon_relative j_user_card" >
														<a style="" target="_blank" class="p_author_face " href=""><img username="" class="" src="{{asset('index/users_image/'.$value->getUserImg($value->userid))}}"  /></a>

													</div>
												</li>
												<li class="d_nameplate">

												</li>
												<li class="d_name" data-field='{"user_id":620358521}'>

													<a alog-group="p_author" class="p_author_name j_user_card" href="" target="_blank">评论用户<img src="{{asset('index/users_image/'.$value->getUserImg($value->userid))}}" class="nicknameEmoji" style="width:13px;height:13px" /></a>

												</li>

												<li class="l_badge" style="display:block;">
													<div class="p_badge">
														<a href="" target="_blank" class="user_badge d_badge_bright d_badge_icon2_1" title="本吧头衔7级，经验值217，点击进入等级头衔说明页">
															<div class="d_badge_title ">{{$value->getUsersid($value->userid)}}</div>
															<div class="d_badge_lv">7</div>
														</a>
													</div>
												</li>
											</ul>
										</div>
										<div class="d_post_content_main ">
											<div class="p_content  ">
												<div class="save_face_bg_hidden save_face_bg_0">
													<a rel="noopener" class="save_face_card"></a>
												</div>
												<cc>
													<div id="post_content_116635133065" class="d_post_content j_d_post_content ">{!!$value->content!!}</div><br> </cc> <br>
												<div class="user-hide-post-down" style="display: none;"></div>
											</div>
											<div class="core_reply j_lzl_wrapper">
												<div class="core_reply_tail clearfix">
													<div class="j_lzl_r p_reply" >
														<span class="lzl_link_fold" style="display:none;"><a href=''></a></span></div>
														
													<div class="post-tail-wrap"><span class="j_jb_ele"><a rel="noopener" href="#" onclick="window.open('//tieba.baidu.com/complaint/info?type=0&cid=0&tid=5498377664&pid=116635133065','newwindow', 'height=900, width=800, toolbar =no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no');return false;" class="tail-info" data-checkun="un">举报<i class="icon-jubao pb_list_triangle_down"></i></a>|<span class="super_jubao" style="display:none;"><a rel="noopener" href="#" onclick="window.open('//tieba.baidu.com/complaint/info?type=1&cid=0&tid=5498377664&pid=116635133065','newwindow', 'height=900, width=800, toolbar =no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no');return false;">侵权举报</a><a rel="noopener" href="#" onclick="window.open('//tieba.baidu.com/complaint/info?type=2&cid=0&tid=5498377664&pid=116635133065','newwindow', 'height=900, width=800, toolbar =no, menubar=no, scrollbars=yes, resizable=yes, location=no, status=no');return false;">有害信息举报</a></span></span><span class="tail-info">来自<a rel="noopener" data-tip="贴吧群时代开启，快到群里来！" href="http://c.tieba.baidu.com/c/s/download/pc?tab=qunliao" target="_blank">iPhone客户端</a></span><span class="tail-info">1楼</span><span class="tail-info">{{date('Y-m-d H:i:s',$value->ctime)}}</span><a rel="noopener" href="JavaScript:void(0);" class="lzl_link_unfold" style="display:;"   onclick='javascript:togglea({{$value->id}});' id='toggle_{{$value->id}}'>回复列表</a></div>
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
		<div id='comment_list{{$value->id}}' class="j_lzl_c_b_a core_reply_content" style='display:none;margin-top:50px;'>
			<ul class="j_lzl_m_w{{$value->id}}" style="display:">

	
@foreach($commentsom as $v)
@if($v->fid == $value->id)
<input type='hidden' name='ul_li' value='{{$v->id}}'>
				<li class="lzl_single_post j_lzl_s_p first_no_border" name='ul_li_{{$value->id}}'>
					<a   class="j_user_card lzl_p_p" href="">
						<img src="https://gss0.bdstatic.com/6LZ1dD3d1sgCo2Kml5_Y_D3/sys/portrait/item/f6b3636864313134390d">
					</a>
					<div class="lzl_cnt">
						<a class="at j_user_card "  alog-group="p_author" target="_blank" href="" username="" >
						<span id='recomment_{{$v->id}}'>{{$v->getUsersid($v->userid)}}</span>
						</a>
						:&nbsp;<span class="lzl_content_main">{{$v->content}}</span>
						<div class="lzl_content_reply">
							<span class="lzl_jb" style="display: none;">
							<a rel="noopener" href="#"  class="lzl_jb_in">
								举报
							</a>&nbsp;|&nbsp;</span><span class="lzl_op_list j_lzl_o_l"></span><span class="lzl_time">{{date('Y-m-d H:i:s',$v->ctime)}}</span>
							<a rel="noopener" href="javascript:recomment({{$v->id}},{{$value->id}},{{$v->userid}})" class="lzl_s_r">
								回复
							</a>
						</div>
					</div>
				</li>
@endif				
@endforeach

			</ul>
			<div class="lzl_editor_container j_lzl_e_c lzl_editor_container_s" style="">
				
						<div class="edui-editor-top"></div>
						<div class="edui-editor-middle">
						<form action='{{url("index/forumcomment/savesom")}}' method='post'>
							<input type='text' name='content' style="width: 497px; min-height: 40px; z-index: 0;" id='commenttwo{{$value->id}}'>

						</div>
						<div class="edui-editor-bottom"></div>
						<div class="edui-editor-msg"></div>
					<div class="wordlimit-holder" style="visibility: hidden;"></div>
				
				<p class="lzl_panel_error" style="display: none;"></p>
				<table class="lzl_panel_wrapper">
					<tbody>
						<tr>
							<td style="width: 85%;">
								<p style="color:#666;"></p></td>
								<td style="width: 15%; position:relative">
									{{csrf_field()}}
									<input type='hidden' name='userid' value='{{$value->userid}}' id='to_userid{{$value->id}}'>
									<input type='hidden' name='forumid' value='{{$container->id}}'>
									<input type='hidden' name='fid' value='{{$value->id}}'>
									<input type='button' value='发表' class='btn' onclick='javaScript:forumcomment({{$container->id}},{{$value->id}});'>
								</td>
						</tr>
					</tbody>
				</table>
				</form>
			</div>
			
		</div>
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
															<script>
															function togglea($id) {
																$('#comment_list'+$id).toggle();
																
																}
														</script>

												</div>
												
											</div>
										</div>
									</div>
									@endforeach
									@endif
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									{{--回复区--}}
									<div style='padding:50px 0;'>
									<input type='bottom' value='评论区' class='btn' disabled='disabled'>
										<form method='post' action='{{url("index/forumcomment/save")}}'  id='comment_form'>
										{{csrf_field()}}
											<textarea style='width:740px;height:100px;' name='content' id='content{{$container->id}}'></textarea>
											<input type='hidden' name='forumid' value='{{$container->id}}'>

											<input type='submit' value='发表回复'   class='btn btn-primary'>
										</form>
									</div>
									

									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
<script>
		var editor;
		KindEditor.ready(function(K) {
			editor = K.create('textarea[name="content"]', {
				resizeType : 1,
				allowPreviewEmoticons : false,
				allowImageUpload : false,
				items : [
					'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
					'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
					'insertunorderedlist', '|', 'emoticons', 'image', 'link']
			});
		});
</script>






									
									
									
									
									
									
									
								</div>
							</div>
							<div class="right_section right_bright">
								<div class="region-login" id="embedded-login" style="display:none;">
									<h4 class="login-header clearfix"><i class="baidu-logo-small"></i>登录百度帐号</h4>
									<div id="login-form-wrapper"></div>
								</div>
								<div class="region_bright app_download_box">
									<h4 class="region_header"><span class="title">扫二维码下载贴吧客户端</span></h4>
									<div class="clearfix app_download_wrap region_cnt">
										<div class="app_download_icon"></div>
										<div class="app_download_info">下载贴吧APP<br />看高清直播、视频！</div>
									</div>
								</div>
								
								<div>
									<div class="topic_list_box">
										<div class="item_hd"><span class="title">贴吧热议榜</span></div>
										<ul class="topic_list_hot topic_list j_topic_toplist">
										@foreach($hot as $forumhot)
											<li class="topic_item"><span class="topic_flag_hot">1</span>
												<a target="_blank" href="{{url('index/forum/container',['id'=>$forumhot->id])}}" class="topic_name">{{$forumhot->subject}}</a><span class="topic_num">{{$forumhot->readnum}}</span></li>
										@endforeach	
											
										</ul>
									</div>
								</div>
	
								<div class="region_bright" id="tieba-notice">
									<ul class="unordered-list">
										<li class="text-overflow"><i class="notice-icon notice-icon-feedback"></i>
											<a pv_code="0" href="http://tieba.baidu.com/f?ie=utf-8&kw=%E8%B4%B4%E5%90%A7%E6%84%8F%E8%A7%81%E5%8F%8D%E9%A6%88" target="_blank">贴吧页面意见反馈</a>
										</li>
										<li class="text-overflow"><i class="notice-icon notice-icon-screen"></i>
											<a pv_code="0" href="http://tieba.baidu.com/f?ie=utf8&kw=%E8%B4%B4%E5%90%A7%E6%9B%9D%E5%85%89%E5%8F%B0&fr=wwwt" target="_blank">违规贴吧举报反馈通道</a>
										</li>
										<li class="text-overflow"><i class="notice-icon notice-icon-trash"></i>
											<a pv_code="0" href="http://tieba.baidu.com/tb/zt/notice.html" target="_blank">贴吧违规信息处理公示</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						
	</body>

</html>
