<?php
namespace app\admin\controller;
use think\Request;
use app\admin\model\Friend;
//案例分类 类
class FriendController extends BaseController
{
	public function index()
	{
		$list = Friend::all();
		$this->assign(array(
				'friend'=>$list,
		));
		return $this->fetch();
	}
	
	public function add()
	{
		return $this->fetch();
	}
	
	public function edit($id)
	{
		
	}
	
	public function save()
	{
		$data = Request::instance()->param();
		$data['create_time'] = strtotime($data['create_time']);
		Friend::create($data) ? $this->success('添加成功',url('admin/Ctype/index')) : $this->error('保存失败',url('admin/Ctype/index'));
	}
	
	public function usave()
	{
		$data = Request::instance()->param();
		$data['update_time'] = strtotime($data['update_time']);
		Friend::update($data) ? $this->success('修改成功',url('admin/Ctype/index')) : $this->error('修改失败',url('admin/Ctype/index'));
	}
	
	public function delete($id)
	{
		Friend::destroy($id) ? $this->success('删除成功',url('admin/Ctype/index')) : $this->error('删除失败',url('admin/Ctype/index'));
	}
	
	public function deletes($id)
	{
		$id = rtrim($id,',');
		$arr = explode(',',$id);
		Friend::destroy($arr) ? $this->success('删除成功',url('admin/Ctype/index')) : $this->error('删除失败',url('admin/Ctype/index'));
	}
}