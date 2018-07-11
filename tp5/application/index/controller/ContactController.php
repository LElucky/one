<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Message;
use app\admin\model\Column;
use app\admin\model\Image;
use app\admin\model\Single;
use think\Request;
class ContactController extends BaseController
{

	//联系我页面
	public function index()
	{  

        $column = parent::getColumn();
    	$ob = new Image();
    	$img = $ob->where('id',9)->find();
    	
    	$contact = Single::get(4);
    	$this->assign(array(
    			'total'=>$contact,
    			'column' => $column,
    			'image' => $img,
    	));
		return $this->fetch();
	}
	
	public function message()
	{
		$data = Request::instance()->param();
		$status = Message::create($data);
		if($status){
			return 1;
		}else{
			return 0;
		}
	}
}