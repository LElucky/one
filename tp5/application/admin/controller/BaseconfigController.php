<?php
namespace app\admin\controller;
use app\admin\model\Baseconfig;
use think\Request;

class BaseconfigController extends BaseController
{
	//基本配置页面
	public function index()
	{
		$obj = new Baseconfig();
		$data = $obj->get(1);
		$this->assign(array(
				'list' => $data,
		));
		return $this->fetch();
	}
	
	//修改或添加
	public function edit(Request $request)
	{
		//接收参数
		$data = $request::instance()->param();
		$obj = Baseconfig::get(1);
		//判断是否上传图片
		//判断是否选择了文件
		$file = request()->file('weblogo');
		if($file){
			$info =	$file->validate(['size'=>100000,'ext'=>'jpg,png,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'logo');
			if($info){
				$data['weblogo'] = $info->getSaveName();
				//删除旧的图片
				if($obj['weblogo']){
					$path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'logo'.DS. $obj['weblogo'];
					@unlink($path);
				}
			}else{
				$this->error($file->getError(),url('admin/baseconfig/index'));
			}
		}
		

		if($obj){
			$status = $obj->save($data,['id'=>1]);
		}else{
			$status = Baseconfig::create($data);
		}
		$status ? $this->success('操作成功',url('admin/baseconfig/index')) : $this->error('操作失败',url('admin/baseconfig/index'));
	}
		
}



?>