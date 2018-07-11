<div class="am-cf admin-main">
	<!-- sidebar start -->
	<div class="admin-sidebar">
		<ul class="am-list admin-sidebar-list">
			<li><a href="{{url('admin/index')}}"><span class="am-icon-home"></span> 首页</a></li>
			<li class="admin-parent">
				<a class="am-cf" data-am-collapse="{target: '#collapse-nav'}">
					<span class="am-icon-file"></span> 操作<span class="am-icon-angle-right am-fr am-margin-right"></span>
				</a>
				<ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
					<li>
						<a href="admin-user.html" class="am-cf">
							<span class="am-icon-check"></span> 个人资料(未启用)<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span>
						</a>
					</li>
					<li>
						<a href="{{url('admin/qtype/oper')}}">
							<span class="am-icon-puzzle-piece"></span> 问答分类
						</a>
					</li>
					<li>
						<a href="admin-gallery.html">
							<span class="am-icon-th"></span> 相册页面(未启用)<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span>
						</a>
					</li>
					<li>
						<a href="admin-log.html">
							<span class="am-icon-calendar"></span> 系统日志(未启用)
						</a>
					</li>
					<li>
						<a href="admin-404.html">
							<span class="am-icon-bug"></span> 404(未启用)
						</a>
					</li>
				</ul>
			</li>
			<li><a href="{{url('admin/forum/oper')}}"><span class="am-icon-table"></span> 论坛</a></li>
			<li><a href="{{url('admin/question/oper')}}"><span class="am-icon-table"></span> 问答</a></li>
			<li><a href="admin-form.html"><span class="am-icon-pencil-square-o"></span> 表单(未启用)</a></li>
			
		</ul>

		<div class="am-panel am-panel-default admin-sidebar-panel">
			<div class="am-panel-bd">
				<p>
					<span class="am-icon-bookmark"></span> 公告
				</p>
				<p>时光静好，与君语；细水流年，与君同。—— Amaze</p>
			</div>
		</div>

		<div class="am-panel am-panel-default admin-sidebar-panel">
			<div class="am-panel-bd">
				<p>
					<span class="am-icon-tag"></span> wiki
				</p>
				<p>Welcome to the Amaze wiki!</p>
			</div>
		</div>
	</div>