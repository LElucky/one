<?php
namespace app\admin\model;
use think\Model;
use app\admin\model\UserRole;
use app\admin\model\Role;
class User extends Model{
   protected $name='user';
   	//获取后台用户的角色
	public function get_user_role($userid)
	{
			$obj = new UserRole();
			$role_id = $obj->field('role_id')->where('user_id',$userid)->find();
			// print_r($role_id);
			$obj2 = new Role();
			return $obj2->where('id',$role_id['role_id'])->find();
	}
	

}


?>