<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Column;
use app\admin\model\Image;
use app\admin\model\Single;
class AboutController extends BaseController
{

	//关于我们页面
	public function index()
	{   
        $column = parent::getColumn();
    	$ob = new Image();
    	$img = $ob->where('id',6)->find();
    	$total = Single::all('2,3');
    	
    	
    	$this->assign(array(
    			'total' => $total,
    			'column' => $column,
    			'image' => $img,
    	));
		return $this->fetch();
	}
	
	public function cultural()
	{   
        $column = parent::getColumn();
    	$ob = new Image();
    	$img = $ob->where('id',6)->find();
    	$total = Single::get(3);
    	$this->assign(array(
    			'total' => $total,
    			'column' => $column,
    			'image' => $img,
    	));
		return $this->fetch();
	}
}