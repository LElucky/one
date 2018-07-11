<?php
namespace app\admin\controller;
use app\admin\model\Message;
class MessageController extends BaseController
{
	public function index()
	{
		$obj = new Message();
		$data = $obj->order('update_time','desc')->paginate(10);	
		$this->assign(array(
				'message'=>$data,
		));
		return $this->fetch();
	}
	
	public function edit($id)
	{
		$obj = new Message();
		$data = Message::get($id);

		$obj->where('id',$id)->update(['is_look'=>1]);
		$this->assign(array('list'=>$data));
		return $this->fetch();
	}
	
	public function delete($id)
	{
		Message::destroy($id) ? $this->success('删除成功',url('Message/index')) : $this->error('删除失败',url('Message/index'));
	}
	
	
}