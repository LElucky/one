<?php
namespace app\admin\controller;
use app\admin\model\News;
use app\admin\model\Ntype;
use think\Request;
use think\Db;
//新闻 类
class NewsController extends BaseController
{
	public function index()
	{
		$obj = new News();
		//点击查询
		if(!empty($_GET['search'])){
			//查询字段
			if(isset($_GET['bzb'])){
				$keys = $_GET['bzb'];
				$base = $_GET['search_bzb'];
				if($keys != null){
					$where[$base] = ['like','%'.$keys.'%'];
				}
			}
			
			//状态
			if(isset($_GET['status']) && $_GET['status'] != 'void'){
				$status = $_GET['status'];
				$where['status'] = ['=',$status];
			}
			
			//分组
			if(isset($_GET['type_id']) && $_GET['type_id'] != 'void'){
				$group = 'type_id';
				$where[$group] = ['=',$_GET['type_id']];
			}
			
			//排序
			if(isset($_GET['search_tdb'])){
				$val = $_GET['search_tdb'];
				$or = $_GET['order'];
				$order = $val. ' '. $or;
			}
			

			
			//条件判断
			if(isset($where) && isset($order)){
				//字段  排序
				$data = $obj->where($where)->order($order)->paginate(10);
				
			}elseif( isset($where)){
				//字段 
				$data = $obj->where($where)->paginate(10);
				
			}elseif( !isset($where) && !isset($order)){
				//点击搜索  没有条件
				$data = $obj->order('update_time','desc')->paginate(10);
			}
		}else{
			$data = $obj->order('update_time','desc')->paginate(10);
		}	
		
		
		$type = Ntype::all();
		$this->assign(array(
				'type' => $type,
				'list' => $data,
		));
		return $this->fetch();
	}

	public function add()
	{
		$type = Ntype::all(function($query){
			$query->order('commend desc')->select();
		});
		$this->assign(array(
				'type'=>$type,
		));
		return $this->fetch();
	}

	public function edit($id)
	{
		$list = News::get($id);
		
		$type = Ntype::all(function($query){
			$query->order('commend asc')->select();
		});
			$this->assign(array(
					'type' => $type,
					'list' => $list,
			));
			return $this->fetch();
	}

	public function save()
	{
		$data = Request::instance()->param();
		$data['create_time'] = strtotime($data['create_time']);
		//判断是否上传图片
		//判断是否选择了文件
		$file = request()->file('img');
		if($file){
			$info =	$file->validate(['ext'=>'jpg,png,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'news');
			if($info){
				$data['img'] = $info->getSaveName();
			}else{
				$this->error($file->getError(),url('admin/banner/index'));
			}
		}
		News::create($data) ? $this->success('添加成功',url('admin/News/index')) : $this->error('添加失败',url('admin/News/index'));

	}

	public function usave()
	{
		$obj = new News();
		$data = Request::instance()->param();
		$data['update_time'] = strtotime($data['update_time']);
		
		//判断是否上传图片
		//判断是否选择了文件
		$file = request()->file('img');
		if($file){
			$info =	$file->validate(['ext'=>'jpg,png,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'news');
			if($info){
				$data['img'] = $info->getSaveName();
			}else{
				$this->error($file->getError(),url('admin/News/edit'));
			}
		}
		$obj->update($data) ? $this->success('修改成功',url('admin/News/edit?id='.$data['id'])) : $this->error('修改失败',url('admin/News/edit?id='.$data['id']));
	}

	public function delete($id)
	{
		$obj =News::get($id);
		if($obj){
			$path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'News' . DS . $obj['img'];
			unlink($path);
		}
		$obj->delete() ? $this->success('删除成功',url('admin/news/index')) : $this->error('删除失败',url('admin/news/index'));		
	}
}