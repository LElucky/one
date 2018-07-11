<?php
namespace app\admin\controller;
use app\admin\model\Permission;
use app\admin\model\RolePermission;
use app\admin\model\UserRole;
use app\admin\model\Mp3;
use gmars\rbac\Rbac;
use think\Db;
use app\admin\model\Baseconfig;

class IndexController extends BaseController
{
	//后台首页
	public function index()
	{



		//获取用户id
		$user_id = session('user_id');
		//获取用户角色
		$role = UserRole::where('user_id',$user_id)->column('role_id');
// 		print_r($role);
		//根据权限id 取出对应的权限
		$obj_1 = Db::query('select p.*,r.role_id from y_role_permission as r join y_permission as p on r.role_id = ? and r.permission_id = p.id and p.pid = 0 and display = 1 and status = 1 order by sort asc',[$role[0]]);
		$obj_2 = Db::query('select p.*,r.role_id from y_role_permission as r join y_permission as p on r.role_id = ? and r.permission_id = p.id and p.pid <> 0 and display = 1 and status = 1 order by sort asc',[$role[0]]);


		$obj = new Mp3();
		$mp3 = $obj->order('sort','desc')->select();
		
		//格式化成js可以调用的 样式
        $data['mp3'] = [];
        $path =  '/static/MP3/music/';
        $imgpath = '/static/MP3/img/';
        foreach ($mp3 as $key => $value) {
            if($value['img'] != ''){
            	$data['mp3'][$key]['cover'] =  $imgpath . explode('\\', $value['img'])[0] .'/'. explode('\\', $value['img'])[1];
            }
            $data['mp3'][$key]['src']   =  $path . explode('\\', $value['filename'])[0] .'/'. explode('\\', $value['filename'])[1];
            $data['mp3'][$key]['title'] = $value['name'];
        }

       $data['mp3_a'] = str_replace("\\","",json_encode($data['mp3'],JSON_UNESCAPED_UNICODE));
		$this->assign(array(
				'list_1' => $obj_1,
				'list_2' => $obj_2,
				'mp3'    => $data['mp3_a'],
		));

		return $this->fetch();

	}

	public function base()
	{	$data['os'] = PHP_OS;
		$this->assign('web',$data);
		return $this->fetch();
	}
	

	public function config()
	{	$data['os'] = PHP_OS;
		$id = session('user_id');
		$data['user_info'] = Db::query('select last_login_time , count_login from y_user where id = ? limit 1',[$id]);
		$data['config'] = Baseconfig::all(['id'=>1]);
		$this->assign('web',$data);
		return $this->fetch();
	}

}


?>