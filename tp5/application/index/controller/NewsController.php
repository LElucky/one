<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Column;
use app\admin\model\Image;
class NewsController extends BaseController
{
	//新闻页面
	public function index()
	{   $obj = new Column();
    	$column = $obj->header_data();

    	$ob = new Image();
    	$img = $ob->where('id',9)->find();
    	$this->assign(array(
    			'column' => $column,
    			'image' => $img,
    	));
		return $this->fetch();
	}
}