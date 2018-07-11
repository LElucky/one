@include('admin/layouts/header')
@include('admin/layouts/left')
@include('admin/layouts/oper_head')
@include('admin/layouts/oper_nav')

<div>
	<table border="1" cellpadding="10" cellspacing="0" width="1000">
		<tr>
			<td colspan="2">问题标题----(悬赏金)</td>
		</tr>
		<tr>
			<td colspan="2">问题描述</td>
		</tr>
		<tr>
			<td>用户名</td>
			<td>浏览量</td>
			<td>删除</td>
		</tr>
	</table>
	<hr>
	<h3>(多少)条回答</h3>
	<table border="1" cellpadding="10" cellspacing="0" width="1000">
		<tr>
			<td colspan="5">回答内容</td>
		</tr>
		<tr>
			<td>回答者的用户名</td>
			<td>回答的时间</td>
			<td>回答的评论</td>
			<td>赞</td>
			<td>踩</td>
			<td>系统推荐回答</td>
			<td>删除</td>
		</tr>
	</table>
</div>





@include('admin/layouts/footer')