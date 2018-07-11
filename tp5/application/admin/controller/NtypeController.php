<?php
namespace app\admin\controller;
use think\Request;
use app\admin\model\Ntype;
//新闻分类 类
class NtypeController extends BaseController
{
	public function index()
	{
		$obj = Ntype::order('commend desc')->paginate(10);
		$this->assign(array(
				'list' => $obj,
		));
		return $this->fetch();
	}
	
	public function add()
	{
		return $this->fetch();
	}
	
	public function edit($id)
	{
		$obj = Ntype::get($id);
		if(!$obj){
			$this->error('参数错误',url('admin/Ntype/index'));
		}
		$this->assign(array(
				'list' => $obj,
		));
		return $this->fetch();
	}
	
	public function save()
	{
		$data = Request::instance()->param();
		$data['create_time'] = strtotime($data['create_time']);
		Ntype::create($data) ? $this->success('添加成功',url('admin/Ntype/index')) : $this->error('保存失败',url('admin/Ntype/index'));
	}
	
	public function usave()
	{
		$data = Request::instance()->param();
		$data['update_time'] = strtotime($data['update_time']);
		Ntype::update($data) ? $this->success('修改成功',url('admin/Ntype/index')) : $this->error('修改失败',url('admin/Ntype/index'));
	}
	
	public function delete($id)
	{
		Ntype::destroy($id) ? $this->success('删除成功',url('admin/Ntype/index')) : $this->error('删除失败',url('admin/Ntype/index'));
	}
	
	public function deletes($id)
	{
		$id = rtrim($id,',');
		$arr = explode(',',$id);
		Ntype::destroy($arr) ? $this->success('删除成功',url('admin/Ntype/index')) : $this->error('删除失败',url('admin/Ntype/index'));
	}
}