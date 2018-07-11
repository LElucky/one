<?php
namespace app\admin\controller;
use think\Request;
use app\admin\model\Column;
/**
 * 栏目类
 */
class ColumnController extends BaseController
{
	/**
	 * [add 添加栏目]
	 */
	public function add()
	{
		return $this->fetch();
	}
	
	/**
	 * [save 保存添加]
	 * @return [type] [description]
	 */
	public function save()
	{
		$data = Request::instance()->param();
		$data['create_time'] = strtotime($data['create_time']);
		$status = Column::create($data);
		$status ? $this->success('添加成功',url('admin/column/index')) : $this->error('添加失败',url('admin/column/index'));
	}
	
	/**
	 * [index 栏目列表]
	 * @return [type] [description]
	 */
	public function index()
	{
		$obj = Column::order('commend asc')->paginate(10);
		$this->assign(array(
				'list'=>$obj,
		));
		return $this->fetch();
	}
	
	/**
	 * [edit 修改栏目]
	 * @return [type] [description]
	 */
	public function edit($id)
	{
		$obj = Column::get($id);
		$obj==''  ? $this->error('参数错误',url('admin/column/index')) : '';
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
		$status = Column::update($data);
		$status ? $this->success('修改成功',url('admin/column/index')) : $this->error('修改失败',url('admin/column/index'));
	}
	
	/**
	 * [delete 删除栏目]
	 * @return [type] [description]
	 */
	public function delete($id)
	{
		Column::destroy($id) ? $this->success('删除成功',url('admin/column/index')) : $this->error('删除失败',url('admin/column/index'));
	}
	
	/**
	 * [deletes 后台批量删除栏目功能]
	 * @param  [type] $id [连号id]
	 * @return [type]     [description]
	 */
	public function deletes($id)
	{
		$id = rtrim($id,',');
		$arr = explode(',', $id);
		Column::destroy($arr) ? $this->success('删除成功',url('admin/banner/index')) : $this->error('删除失败',url('admin/banner/index'));
	}
}