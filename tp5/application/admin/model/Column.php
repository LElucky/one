<?php
namespace app\admin\model;
use think\Model;
class Column extends Model
{
	protected $name = 'column';
	//前台获取导航数据
	public function header_data()
	{
		$data = Column::all(function($query){
			$query->order('commend','desc')->select();
		});
		return $data;
	}
}