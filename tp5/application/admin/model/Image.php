<?php
namespace app\admin\model;
use think\Model;
class Image extends Model
{
	protected $name = 'image';
	public function sele($arr)
	{
		return Image::all($arr);
	}
}