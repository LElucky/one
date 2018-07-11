<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
// 
// 后台列表页的查询
function search_admin($GET,$obj)
{
			if(!empty($GET['search'])){
			//查询字段
			if(isset($GET['bzb'])){
				$keys = $GET['bzb'];
				$base = $GET['search_bzb'];
				if($keys != null){
					$where[$base] = ['like','%'.$keys.'%'];
				}
			}
			
			//状态
			if(isset($GET['status']) && $GET['status'] != 'void'){
				$status = $GET['status'];
				$where['status'] = ['=',$status];
			}
			
			//分组
			if(isset($GET['type_id']) && $GET['type_id'] != 'void'){
				$group = 'type_id';
				$where[$group] = ['=',$GET['type_id']];
			}
			
			//排序
			if(isset($GET['search_tdb'])){
				$val = $GET['search_tdb'];
				$or = $GET['order'];
				$order = $val. ' '. $or;
			}
			

			
			//条件判断
			if(isset($where) && isset($order)){
				//字段  排序
				$data = $obj->where($where)->order($order)->paginate(10,false,['query'=>request()->param()]);
				
			}elseif( isset($where)){
				//字段 
				$data = $obj->where($where)->paginate(10,false,['query'=>request()->param()]);
				
			}elseif( !isset($where) && !isset($order)){
				//点击搜索  没有条件
				$data = $obj->order('update_time','desc')->paginate(10,false,['query'=>request()->param()]);
			}elseif(isset($order)){
				$data = $obj->order($order)->paginate(10,false,['query'=>request()->param()]);
			}
		}else{
			$data = $obj->order('update_time','desc')->paginate(10,false,['query'=>request()->param()]);
		}
		if(isset($base)){
			foreach ($data as $key => $value) {
				$data[$key][$base] = str_replace($keys,"<span style='color:red;'>$keys<span>" ,$value[$base]);
			}
		}	
		return $data;
}