<?php
namespace app\admin\controller;
use app\admin\model\User;
use think\Request;
use gmars\rbac\Rbac;
use app\admin\model\Role;
use app\admin\model\UserRole;
use think\Db;
class AuserController extends BaseController
{
	//增加后台管理员
	public function add()
	{
		$obj = new Role();
		$rol = $obj->getRoleAsSelect();
		foreach ($rol as $key => $value) {
			if($value['status'] == 1){
					$role[$key]['id']    = $value['id'];
					$role[$key]['name']  = $value['name'];
					$role[$key]['space'] = $value['space'];
			}
		}

		$this->assign(array(
				'role'=>$role,
		));
		return $this->fetch();
	}
	
	//管理员列表
	public function alist()
	{
		$obj = new User();
		$data = $obj->field('user_name,id,status,last_login_time,login_ip')->select();
		//对象转数组
		//$data = collection($data)->toArray();

		$this->assign(array(
				'list'=>$data,
		));
		return $this->fetch();
	}
	
	//保存管理员添加
	public function save(Request $request)
	{
		//$data = $request->post();
		$data = request::instance()->param();
		$class = $data['class'];
		unset($data['class']);
		//获取ip
		$data['login_ip'] = $this->request->ip();
		$data['status'] = 1;
		$data['password'] = md5($data['password']);
		$user = User::create($data);
		if(!$user){
			$this->error('添加失败',url('auser/add'));
		}
		$u_id = $user->id;
		$obj = new Rbac();
		$status = $obj->assignUserRole($u_id,['id'=>$class]);
		$status? $this->success('添加成功',url('auser/add')) : $this->error('添加失败',url('auser/add'));	
	}
	
	//删除 用户
	public function deleuser($id){
		$obj = new Rbac();
		$status = $obj->delUser($id);
		$status? $this->success('删除成功',url('auser/alist')) : $this->error('删除失败',url('auser/alist'));
	}

	//批量删除用户
	public function deluser($rid)
	{
		$ids = trim($rid,',');
		$ids = explode(',',$ids);
		$obj = new Rbac();
		try {
			foreach($ids as $key => $value){
				$status = $obj->delUser($value);
				if(!$status){
					Db::rollback();
					$status = false;
				}
			}
			Db::commit();
			$status =  true;
		} catch (Exception $e) {
			Db::rollback();
			$status = false;
		}
		$status? $this->success('删除成功',url('auser/alist')) : $this->error('删除失败',url('auser/alist'));
	}

	//用户编辑
	public function uedit($id)
	{
		$obj = new Role();
		$rol = $obj->getRoleAsSelect();
		foreach ($rol as $key => $value) {
			if($value['status'] == 1){
					$role[$key]['id']    = $value['id'];
					$role[$key]['name']  = $value['name'];
					$role[$key]['space'] = $value['space'];
			}
		}
		$obj2 = new User();
		$user = $obj2->where('id',$id)->find();
		$obj3 = new UserRole();
		$userrole = $obj3->where('user_id',$id)->find();
		$this->assign(array(
			'userrole'=>$userrole,
			'user'=>$user,
			'role'=>$role,
		));
		return $this->fetch();
	}

	//保存修改
	public function usave(Request $request)
	{
		$data = $request->post();
		$class['role_id'] = $data['class'];
		unset($data['class']);
		$data['password'] = md5($data['password']);
		$status = User::update($data,$data['id']);
		$obj = new UserRole();
		$status2 = $obj->where('user_id',$data['id'])->update($class);
		$status? $this->success('修改成功',url('auser/alist')) : $this->error('修改失败',url('auser/alist'));
	}
	
	//用户列表页 调整用户状态 ajax
	public function ajax_status(Request $request)
	{
		$data = $request->post();
		$obj = new User();
		$save = $data['status']==1? 0 : 1;
		$uobj = $obj->where('id',$data['user_id'])->update(['status'=>$save]);
		
		if($save == 1){
			//状态为禁用的返回
			return $status = $uobj? 1 : 0;
		}else{
			//状态为正常的返回
			return $status = $uobj? 2 : 3;
		}
		
	}
}