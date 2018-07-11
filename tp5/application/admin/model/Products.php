<?php
namespace app\admin\Model;
use think\Model;
use app\admin\model\Pimage;
use app\admin\model\Ptype;
class Products extends Model
{
	protected $name = 'products';
	
	//通过商品id  获取商品图片
	public function get_img($id)
	{
		$obj = Pimage::all(['products_id'=>$id]);
		return $obj;	
	}
	
	//获取产品图片
	public function getoneimg($id)
	{
		$obj = new Pimage();
		return $obj->where('products_id',$id)->order('commend','desc')->find();
	}
	
	//获取产品所属分类
	public function gettype($type_id)
	{
		$obj = new Ptype();
		return $obj->where('id',$type_id)->find();
	}

	public function gettotalimg($id)
	{
		return $this->hasMany('pimage','products_id','id')->where('products_id',$id)->select();
	}

	//一对一关联 
	public function getonetype($type_id)
	{
		return $this->hasOne('ptype','id','type_id')->find($type_id);
	}
	
}