<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Column;
use app\admin\model\Image;
class CasesController extends BaseController
{

	//案例页面
	public function index()
	{   
    	$column = parent::getColumn();
        $ob = new Image();
    	$img = $ob->where('id',8)->find();
    	$this->assign(array(
    			'column' => $column,
    			'image' => $img,
    	));
		return $this->fetch();
	}
}