<?php
namespace app\admin\controller;
use app\admin\model\Permission;
use think\Request;
use gmars\rbac\Rbac;
//节点类
class PermissionController extends BaseController
{
	//节点列表
	public function index()
	{
		$obj = new Permission();
		$data = $obj->getTypeAsSelect();
		$this->assign(array(
			'node'=>$data,	
		));
		return $this->fetch();
	}
	
	//添加节点页设置
	public function add()
	{
		$obj = new Permission();
		$list = $obj->where('status',1)->where('pid',0)->order('sort asc')->select();
		$son = $obj->where('status',1)->where('pid','<>',0)->order('sort asc')->select();
		$this->assign(array(
				'node'=>$list,
				'son' =>$son,
		));
		return $this->fetch();
	}
	
	//保存添加
	public function save(Request $request)
	{
		$data = $request::instance()->param();
		$status = Permission::create($data);
		$status? $this->success('添加成功',url('permission/index')) : $this->error('添加失败',url('permission/index'));
	}
	
	//修改页
	public function edit($id)
	{
		$per = Permission::get($id);
		$obj = new Permission();
		$list = $obj->where('status',1)->where('pid',0)->order('sort asc')->select();
		$son = $obj->where('status',1)->where('pid','<>',0)->order('sort asc')->select();
		$this->assign(array(
				'list'=>$per,
				'node'=>$list,
				'son' =>$son,
		));
		return $this->fetch();
	}
	
	//保存修改
	public function psave(Request $request)
	{
		$data = $request::instance()->param();
 		$status = Permission::update($data);
 		//RBAC 删除操作 也可以使用
// 		$rbac = new Rbac();
// 		$status = $rbac->editPermission($data);
		$status? $this->success('修改成功',url('permission/index')) : $this->error('修改失败',url('permission/index'));
	}
	
	//删除节点
	public function dele($id)
	{
		$obj = new Permission();
		$son = $obj->where('pid',$id)->find();
		if($son){
			$this->error('父节点不可删除',url('Permission/index'));
		}else{
			$obj1 = new Rbac();
			$status = $obj1->delPermission($id);
			$status? $this->success('修改成功',url('permission/index')) : $this->error('修改失败',url('permission/index'));
		}
	}
	
	//批量删除
	public function deletenode($id)
	{
		$id = rtrim($id,',');
		$data = explode(',',$id);
		$obj = new Permission();
		foreach($data as $key => $value){
			$son = $obj->where('pid',$value)->column('id');
			foreach($son as $key => $s){
				if($s != $value){
					$this->error('父节点不可批量删除');
					exit;
				}			
			}
		}
		$status = Permission::destroy($data);
		$status? $this->success('删除成功',url('permission/index')) : $this->error('删除失败',url('permission/index'));
	}
	

	public function display_status(Request $request)
	{
		$data = $request::instance()->param();
		$arr = explode('_',$data['value']);
		//$arr[0] 数据id
		//$arr[1] 数据值
		$arr[1] == 1? $val = 0 : $val = 1;
		Permission::update(['id'=>$arr[0],'display'=>$val]) ? $status = 1 : $status = 0;
		return $status;
	}
}



?>