<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Column;
use app\admin\model\Image;
class ProductsController extends BaseController
{
	//产品页面
	public function index()
	{   $obj = new Column();
    	$column = $obj->header_data();

    	$ob = new Image();
    	$img = $ob->where('id',7)->find();
    	$this->assign(array(
    			'column' => $column,
    			'image' => $img,
    	));
		return $this->fetch();
	}
	
	//产品信息表
	public function productsinfo()
	{   $obj = new Column();
    	$column = $obj->header_data();

    	$ob = new Image();
    	$img = $ob->where('id',7)->find();
    	$this->assign(array(
    			'column' => $column,
    			'image' => $img,
    	));
		return $this->fetch();
	}
}