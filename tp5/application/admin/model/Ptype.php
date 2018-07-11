<?php
namespace app\admin\Model;
use think\Model;
class Ptype extends Model
{
	protected $name = 'ptype';
	public function gettype()
	{
		$obj = new Ptype();
		return $obj->order('commend','desc')->select();
	}
}