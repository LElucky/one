<?php
namespace app\index\controller;
use think\Controller;
use app\admin\model\Column;
class BaseController extends Controller
{
	public function getColumn()
	{
		$obj = new Column();
    	$column = $obj->header_data();
    	return $column;
	}
}