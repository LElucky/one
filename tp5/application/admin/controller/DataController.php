<?php
namespace app\admin\controller;
use think\Request;
use app\admin\model\Data;
class DataController extends BaseController
{
	public function index()
	{
		$list = Data::all();
		$this->assign(array(
				'list' => $list,
		));
		return $this->fetch();
	}
	
	public function add()
	{
		return $this->fetch();	
	}
	
	public function save()
	{
		$data = Request::instance()->param();
				
		$file = request()->file('files');
		if($file){
			// 移动到服务器的上传目录  
			//大小限制 10M
			$info =	$file->validate()->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'data');
			if($info){
				$data['path'] = $info->getSaveName();
				$data['create_time'] = strtotime($data['create_time']);
				//获取文件大小  KB 单位
				$data['size'] = $_FILES['files']['size'] / 1024;
				Data::create($data) ? $this->success('保存成功',url('admin/data/index')) : $this->error('保存失败',url('admin/data/index'));
			}else{
				$this->error($file->getError(),url('admin/data/add'));
			}
		}else{
			$this->error('文件上传故障',url('admin/data/add'));
		}
	}
	
	public function delete($id)
	{
		$obj = Data::get($id);
		if($obj){
			$path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'data' . DS . $obj['path'];
			@unlink($path);
		}
		$obj->delete() ? $this->success('删除成功',url('admin/data/index')) : $this->error('删除失败',url('admin/data/index'));
	}
	
	public function deletes($id)
	{
		$id = rtrim($id,',');
		$arr = explode(',', $id);
		$obj = Data::all($arr);
		foreach($obj as $key => $value)
		{
			$path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'data' . DS . $value['path'];
			@unlink($path);
		}
		Data::destroy($arr) ? $this->success('删除成功',url('admin/data/index')) : $this->error('删除失败',url('admin/data/index'));
	}
}