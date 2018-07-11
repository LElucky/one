<?php 
namespace app\admin\controller;
use think\Request;
use app\admin\model\Single;
//单页类
class SingleController extends BaseController
{
	/**
	 * [index 单页信息列表]
	 * @return [type] [description]
	 */
	public function index()
	{
		
		
		$obj = new Single();
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
		$this->assign(array(
				'list' => $data,
		));
		return $this->fetch();
	}
	
	/**
	 * [add 单页添加页面]
	 */
	public function add()
	{
		return $this->fetch();
	}
	
	/**
	 * [save 单页添加保存]
	 * @return [type] [description]
	 */
	public function save()
	{
		$data = Request::instance()->param();
		$data['create_time'] = strtotime($data['create_time']);
		$status = Single::create($data);
		$status ? $this->success('添加成功',url('admin/single/index')) : $this->error('添加失败',url('admin/single/index'));
	}
	
	/**
	 * [edit 修改单页信息]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id)
	{
		$obj = Single::get($id);
		if(!$obj){
			$this->error('参数错误',url('admin/single/index'));
		}
		$this->assign(array(
			'list' => $obj,
		));
		return $this->fetch();
	}
	
	/**
	 * [usave 保存修改]
	 * @return [type] [description]
	 */
	public function usave()
	{
		$data = Request::instance()->param();
		$data['update_time'] = strtotime($data['update_time']);
		$status = Single::update($data);
		$status ? $this->success('修改成功',url('admin/single/index')) : $this->error('修改失败',url('admin/single/index'));
	}
	
	/**
	 * [delete 删除单页信息]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete($id)
	{
		Single::destroy($id) ? $this->success('删除成功',url('admin/single/index')) : $this->error('删除失败',url('admin/single/index'));
	}
}
?>