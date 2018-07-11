<?php
namespace app\admin\model;
use think\Model;
class Role extends Model
{
	protected $name='role';
	
	public function getRoleAsSelect($pid=0)
	{
		static $arr = [];
		static $n = 0;
		$rowset = $this->where('parent_id',$pid)->order('sort_num','desc')->select();
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
?>