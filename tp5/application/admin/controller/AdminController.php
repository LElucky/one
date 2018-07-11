<?php 
namespace app\admin\controller;
use app\admin\model\Admin;
use think\Request;
use app\admin\model\User;
use think\Controller;
use think\Cookie;
use think\db;
use gmars\rbac\Rbac;
class AdminController extends Controller
{

	
	//后台登录页面显示
	public function login()
	{	
		$login['username'] = '';
		$login['password'] = '';
		if(Cookie::has('username')){
			$login['username'] = cookie('username');
			$login['password'] = cookie('password');
		}
		$this->assign('login',$login);
		return $this->fetch();
	}

	//退出
	public function logout()
	{
		session(null,'think');
		return $this->redirect(url('/a/login'));
	}

	//验证登录
	public function validlogin(Request $request)
	{
		//获取访问者ip地址
		$cip = $request->ip();
		
		$data = $request->post();

			$obj = new User();
			$status = $obj->where('user_name',$data['username'])->where('password',md5($data['password']))->where('status = 1')->find();
		if($status){
							
			//通过验证
			
			$rbac = new Rbac();
			$rbac->cachePermission($status['id']);
			session('userinfo',true,'think');
			session('username',$data['username'],'think');
			session('user_id',$status['id'],'think');
			session('last_login_time',$status['last_login_time'],'think');
			$count = $status['count_login'] + 1;
			$suc = $obj->where('id',$status['id'])->update(['last_login_time'=>time(),'login_ip'=>$cip,'count_login'=>$count]);
			if($data['chebox'] == 'on'){
				cookie('username',$data['username'],7200);
				cookie('password',$data['password'],7200);
			}else{
				cookie('username',null);
				cookie('password',null);
			}
			return 1;
		}else{
			//用户账号异常
			return 2;
			}
	}
}
?>