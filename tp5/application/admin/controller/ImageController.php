<?php 
namespace app\admin\controller;
use think\Request;
use app\admin\model\Image;
class ImageController extends BaseController
{
	/**
	 * [index 图片列表页]
	 * @return [type] [description]
	 */
	public function index()
	{
		
		$obj = new Image();
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

		$this->assign('list',$data);
		return $this->fetch();	
	}
	
	/**
	 * [save d保存图片添加]
	 * @return [type] [description]
	 */
	public function save()
	{
		$data = Request::instance()->param();
		$data['create_time'] =  strtotime($data['create_time']);	//将日期格式化时间戳
		//判断是否上传图片
		//判断是否选择了文件
		$file = request()->file('img');
		if($file){
			$info =	$file->validate(['ext'=>'jpg,png,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'image');
			if($info){
				$data['img'] = $info->getSaveName();
			}else{
				$this->error($file->getError(),url('admin/image/index'));
			}
		}else{
			$this->error('请选择图片',url('admin/image/add'));
		}
		$status = Image::create($data);
		$status ? $this->success('保存成功',url('admin/image/index')) : $this->success('保存失败',url('admin/image/index'));
	}
	
	/**
	 * [usave 修改保存]
	 * @return [type] [description]
	 */
	public function usave()
	{
		$data = Request::instance()->param();
		$data['update_time'] =  strtotime($data['update_time']);	//将日期格式化时间戳
		//判断是否上传图片
		//判断是否选择了文件
		$file = request()->file('img');
		if($file){
			$info =	$file->validate(['ext'=>'jpg,png,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'image');
			if($info){
				$data['img'] = $info->getSaveName();
			}else{
				$this->error($file->getError(),url('admin/image/index'));
			}
		}
		$status = Image::update($data);
		$status ? $this->success('保存成功',url('admin/image/index')) : $this->success('保存失败',url('admin/image/index'));		
	}
	
	/**
	 * [add 添加图片]
	 */
	public function add()
	{
		return $this->fetch();
	}
	
	/**
	 * [edit 修改图片]
	 * @return [type] [description]
	 */
	public function edit($id)
	{
		$obj = Image::get($id);
		$this->assign(array(
				'list'=>$obj,
		));
		return $this->fetch();
	}
	
	/**
	 * [delete 删除图片]
	 * @param  [type] $id [主键 删除条件]
	 * @return [type]     [description]
	 */
	public function delete($id)
	{
		$obj = Image::get($id);
		if($obj['img']){
			$path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'image' . DS . $obj['img'];
			unlink($path);
		}
		$obj->delete() ? $this->success('删除成功',url('admin/image/index')) : $this->error('删除失败',url('admin/image/index'));
	}
	

	//批量删除
	public function deletes($id)
	{
		$id = rtrim($id,',');
		$arr = explode(',',$id);
		$obj = Image::all($arr);
		//删除图片
		foreach ($obj as $key => $value){
			$path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'image' . DS . $value['img'];
			unlink($path);
		}
		Image::destroy($arr) ? $this->success('删除成功',url('admin/banner/index')) : $this->error('删除失败',url('admin/banner/index'));
	}

}
?>