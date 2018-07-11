<?php
namespace app\admin\controller;
use app\admin\model\Company;
use think\Request;
//公司配置类
class CompanyController extends BaseController
{
	//后台首页
	public function index()
	{
		$obj = new Company();
		$data = $obj->get(1);
		//公司所属行业
		$arr = array('电子、电器、电工','安全、监控器材','服装、鞋帽、皮具','手机、数码、电脑','食品、饮茶、茶叶、酒类','广告、设计','拍卖、典当','风景、旅游','IT\互联网','学校、教育','自定义');
		$this->assign(array(
				'arr'  => $arr,
				'list' => $data,
		));
		return $this->fetch();
	}
	
	//公司基本设置
	public function edit(Request $request)
	{
		$obj = Company::get(1);
		$data = $request::instance()->param();
		if($obj){
			$status = $obj->save($data,['id'=>'1']);
		}else{
			$status = Company::create($data);
		}
		$status ? $this->success('操作成功',url('admin/company/index')) : $this->error('操作失败',url('admin/company/index'));
	}
}



?>