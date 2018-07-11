<?php
namespace app\admin\model;
use think\Model;
class Permission extends Model
{
	protected $name = 'permission';
	public function getTypeAsSelect($pid=0)
	{
		static $arr = [];
		static $n = 0;
		$rowset = $this->where('pid',$pid)->order('sort asc')->select();
		foreach($rowset as $row){
			$row['space'] = $n;
			$arr[] = $row;
			$n++;
			$func = __FUNCTION__;
			$this->$func($row['id']);
			$n--;
		}
		return $arr	;
	}
}