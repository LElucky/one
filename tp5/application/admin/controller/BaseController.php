<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
use gmars\rbac\Rbac;
use think\Request;
class BaseController extends Controller
{
	public function _initialize()
	{
		//后台错误级别
		error_reporting(E_ALL);
		//验证用户是否登录
		if(!Session::has('userinfo')){
			$this->redirect(url('/a/login'));
		}
		
		$rbac = new Rbac();
		$request = Request::instance();
		$url = $request->path();

		if(strpos($url,'/id') !== false){
			$url = substr($url,0,strrpos($url,'/id'));  
		}
		$url = trim($url,'/');
		
		$status = $rbac->can($url);
		if(!$status){
			// echo $url;
			//$this->error('请勿尝试越界  , 您没有该操作权限');
		}	
	}

	
}


?>