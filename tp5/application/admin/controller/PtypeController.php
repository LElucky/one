<?php
namespace app\admin\controller;
use think\Request;
use app\admin\model\Ptype;

//产品分类 类
class PtypeController extends BaseController
{
	public function index()
	{
		$obj = new Ptype();
		$data = search_admin($_GET,$obj);
		$this->assign(array(
				'list' => $data,
		));
		return $this->fetch();
	}
	
	public function add()
	{
		return $this->fetch();
	}
	
	public function edit($id)
	{
		$obj = Ptype::get($id);
		if(!$obj){
			$this->error('参数错误',url('admin/ptype/index'));
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
		Ptype::create($data) ? $this->success('添加成功',url('admin/ptype/index')) : $this->error('保存失败',url('admin/ptype/index'));
	}
	
	public function usave()
	{
		$data = Request::instance()->param();
		$data['update_time'] = strtotime($data['update_time']);
		Ptype::update($data) ? $this->success('修改成功',url('admin/ptype/index')) : $this->error('修改失败',url('admin/ptype/index'));
	}
	
	public function delete($id)
	{
		Ptype::destroy($id) ? $this->success('删除成功',url('admin/ptype/index')) : $this->error('删除失败',url('admin/ptype/index'));
	}
	
	public function deletes($id)
	{
		$id = rtrim($id,',');
		$arr = explode(',',$id);
		Ptype::destroy($arr) ? $this->success('删除成功',url('admin/ptype/index')) : $this->error('删除失败',url('admin/ptype/index'));
	}

	public  function commend_status()
	{
		
		$data = Request::instance()->param();
		$n = Ptype::update($data);
		if($n){
			return  1;
		}else{
			return  0;
		}
	}

}