<?php
namespace app\admin\controller;
use think\Request;
use app\admin\model\Banner;
class BannerController extends BaseController
{
	//轮播图列表
	public function index()
	{
		$obj = Banner::order('commend desc')->paginate(10);
		$this->assign('list',$obj);
		return $this->fetch();
	}
	
	//添加轮播图
	public function add()
	{
		return $this->fetch();
	}
	
	//修改
	public function edit($id)
	{
		$obj = Banner::get($id);
		$this->assign('list',$obj);
		return $this->fetch();
	}
	
	//保存修改
	public function usave()
	{
		$obj = new Banner();
		$data = Request::instance()->param();
		$data['update_time'] = strtotime($data['update_time']);
		
		//判断是否上传图片
		//判断是否选择了文件
		$file = request()->file('img');
		if($file){
			$info =	$file->validate(['ext'=>'jpg,png,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'banner');
			if($info){
				$data['img'] = $info->getSaveName();
			}else{
				$this->error($file->getError(),url('admin/banner/index'));
			}
		}	
		$obj->update($data) ? $this->success('修改成功',url('admin/banner/index')) : $this->error('修改失败',url('admin/banner/index'));
	}
	
	//保存添加
	public function save(Request $request)
	{
		$data = Request::instance()->param();
		$data['create_time'] = strtotime($data['create_time']);
		//判断是否上传图片
		//判断是否选择了文件
		$file = request()->file('img');
		if($file){
			$info =	$file->validate(['ext'=>'jpg,png,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'banner');
			if($info){
				$data['img'] = $info->getSaveName();
			}else{
				$this->error($file->getError(),url('admin/banner/index'));
			}
		}else{
			$this->error('请选择图片',url('admin/banner/add'));
		}
		$status = Banner::create($data);
		$status ? $this->success('保存成功',url('admin/banner/index')) : $this->success('保存失败',url('admin/banner/index'));
	}
	
	//删除轮播图
	public function delete($id)
	{
		$obj = Banner::get($id);
		//删除图片
		$path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'banner' . DS . $obj['img'];
		unlink($path);		
		$obj->delete() ? $this->success('删除成功',url('admin/banner/index')) : $this->error('删除失败',url('admin/banner/index'));
	}
	
	//批量删除
	public function deletes($id)
	{
		$id = rtrim($id,',');
		$arr = explode(',',$id);
		$obj = Banner::all($arr);
		//删除图片
		foreach ($obj as $key => $value){
			$path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'banner' . DS . $value['img'];
			unlink($path);
		}
		Banner::destroy($arr) ? $this->success('删除成功',url('admin/banner/index')) : $this->error('删除失败',url('admin/banner/index'));
	}
}