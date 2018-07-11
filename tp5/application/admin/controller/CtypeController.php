<?php
namespace app\admin\controller;
use think\Request;
use app\admin\model\Ctype;
//案例分类 类
class CtypeController extends BaseController
{
	public function index()
	{
		$obj = Ctype::order('commend desc')->paginate(10);
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
		$obj = Ctype::get($id);
		if(!$obj){
			$this->error('参数错误',url('admin/Ctype/index'));
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
		Ctype::create($data) ? $this->success('添加成功',url('admin/Ctype/index')) : $this->error('保存失败',url('admin/Ctype/index'));
	}
	
	public function usave()
	{
		$data = Request::instance()->param();
		$data['update_time'] = strtotime($data['update_time']);
		Ctype::update($data) ? $this->success('修改成功',url('admin/Ctype/index')) : $this->error('修改失败',url('admin/Ctype/index'));
	}
	
	public function delete($id)
	{
		Ctype::destroy($id) ? $this->success('删除成功',url('admin/Ctype/index')) : $this->error('删除失败',url('admin/Ctype/index'));
	}
	
	public function deletes($id)
	{
		$id = rtrim($id,',');
		$arr = explode(',',$id);
		Ctype::destroy($arr) ? $this->success('删除成功',url('admin/Ctype/index')) : $this->error('删除失败',url('admin/Ctype/index'));
	}
}