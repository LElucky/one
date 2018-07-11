<?php
namespace app\admin\controller;

use think\Request;
use app\admin\model\Role;
use gmars\rbac\Rbac;
use app\admin\model\Permission;
use app\admin\model\RolePermission;
class RoleController extends BaseController
{
	//添加角色
	public function add()
	{
		$obj = new Role();
		$role = $obj->getRoleAsSelect();
		$this->assign(array(
			'role'=>$role,
		));	
		return $this->fetch();
	}
	
	//保存在数据库
	public function rsave(Request $request)
	{
		$data = $request::instance()->param();
		$obj = Role::create($data);
		$obj? $this->success('添加成功',url('Role/rlist')) : $this->error('添加失败',url('Role/rlist'));
	}
	
	//角色列表
	public function rlist()
	{
		$obj = new Role();
		$data = $obj->getRoleAsSelect();
		$this->assign(array(
				'list'=>$data,
		));
		return $this->fetch();
	}
	
	
	
	//角色列表页 调整用户状态 ajax
	public function ajax_status(Request $request)
	{
		$data = $request->post();
		$obj = new Role();
		$save = $data['status']==1? 0 : 1;
		$uobj = $obj->where('id',$data['id'])->update(['status'=>$save]);
	
		if($save == 1){
			//状态为禁用的返回
			return $status = $uobj? 1 : 0;
		}else{
			//状态为正常的返回
			return $status = $uobj? 2 : 3;
		}
	}
	
	//删除 角色
	public function deleuser($id){
		$obj = new Role();
		$stat = $obj->where('id',$id)->find();
		$data = $obj->where('parent_id',$stat['id'])->find();
		if($data){
			return $this->error('父节点禁止删除',url('role/rlist'));
		}else{
			Role::destroy($id)? $this->success('删除成功',url('role/rlist')) : $this->error('删除失败',url('role/rlist'));
		}		
	}

	//批量删除角色
	public function delrole($rid)
	{
		$ids = trim($rid,',');
		$arr = explode(',',$ids);
		$obj = new Role();
		try {
			foreach($arr as $key => $value){
				$stat = $obj->where('id',$value)->find();
				$data = $obj->where('parent_id',$stat['id'])->find();
				if($data){
					return $this->error('父节点禁止删除',url('role/rlist'));
				}else{
					$status = Role::destroy($value);
					if(!$status){
						Db::rollback();
						$status = true;
					}
				}
			}
		} catch (Exception $e) {
			Db::roleback();
			$status = false;
		}
		$status ? $this->success('删除成功',url('role/rlist')) : $this->error('删除失败',url('role/rlist'));
	}
	
	//角色编辑页面
	public function redit($id)
	{
		$obj = Role::get($id);
		$o = new Role();
		$data = $o->getRoleAsSelect();
		$this->assign(array(
				'list'=>$obj,
				'role'=>$data,
		));
		return $this->fetch();
	}
	
	//保存编辑
	public function reditsave(Request $request)
	{
		$data = $request::instance()->param();
		$obj = new Role();
		$id = $data['id'];
		$status = $obj->save($data,['id'=>$id]);
		$status ? $this->success('修改成功',url('/r/redit?id='.$id)) : $this->error('修改失败',url('/r/redit?id='.$id));
	}

	//角色权限编辑页面
	public function permission($id)
	{
		$obj = new Permission();
		$permission = $obj->where('pid',0)->order('sort')->select();
		$permission_2 = $obj->where('pid','<>',0)->order('sort')->select();
		$obj2 = new Role();
		$data = $obj2->where('id',$id)->find();
		$obj3 = new RolePermission();
		$permission_3 = $obj3->where('role_id',$id)->column('permission_id');
		foreach ($permission as $key => $value){
			//如果 该角色 有此权限 就给此权限做一个标识
			$permission[$key]['is_check'] = 0;
			foreach ($permission_3 as $id => $va){
				if($va == $value['id']){
					$permission[$key]['is_check'] = 1;
				}
			}
		}
		//如果 该角色 有此权限 就给此权限做一个标识
		foreach ($permission_2 as $ke => $val){
			$permission_2[$ke]['is_check'] = 0;
			foreach ($permission_3 as $id => $va){
				if($va == $val['id']){
					$permission_2[$ke]['is_check'] = 1;
				}
			}
		}
		$this->assign(array(
			'list'  =>$data,	
			'per'   =>$permission,
			'per_2' =>$permission_2,
		));
		return $this->fetch();
	}

	//角色列表页ajax调整排序状态
	public function sortnum(Request $request)
	{
		$data = $request::instance()->param();
		$obj = Role::get($data['id']);
		$status = $obj->where('id',$data['id'])->update($data);
		return $status;
	}

	//保存用户权限
	public function addpermission(Request $request)
	{
		$data = $request::instance()->param();
		$id = str_replace('.html','',$data['id']);
		//判断权限的两级
		//判断权限的两级
		if(isset($data['son'])){
			if(isset($data['parent'])){
				$arr = array_merge($data['parent'],$data['son']);
			}
		}else{
			if(isset($data['parent'])){
				$arr = $data['parent'];
			}else{
				$obj = new RolePermission();
				$st = $obj->where('role_id',$id)->select();
				if($st){
					$del = $obj->where('role_id',$id)->delete();
					if($del){
						$this->success('修改成功',url('/r/permission_edit?id='.$id));
					}else{
						$this->error('修改失败',url('/r/permission_edit?id='.$id));
					}
				}else{
					$this->success('修改成功',url('/r/permission_edit?id='.$id));
				}

			}
		}
		
		//遍历成可以批量插入的样式
		foreach ($arr as $key => $value) {
			$ar[$key]['permission_id'] = $value;
			$ar[$key]['role_id'] = $id;
		}
		
		//目前思路
		//查看此角色是否有权限
		//1 如果有 删除 重新插入现在的
		//2如果没有 直接插入
		$obj = new RolePermission();
		$st = $obj->where('role_id',$id)->select();
		if($st){
			$del = $obj->where('role_id',$id)->delete();
			if($del){
				$status = $obj->saveall($ar);
			}else{
				$this->error('修改失败',url('/r/permission_edit?id='.$id));
			}
		}else{
			$status = $obj->saveall($ar);
		}
		$status ? $this->success('修改成功',url('/r/permission_edit?id='.$id)) : $this->error('修改失败',url('/r/permission_edit?id='.$id));
	}

}