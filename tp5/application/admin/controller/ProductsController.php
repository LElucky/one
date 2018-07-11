<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Ptype;
use think\Request;
use think\Db;
use app\admin\model\Products;
use app\admin\model\Pimage;
class ProductsController extends Controller
{
	public function index()
	{	
		$obj = new Products();
		//点击查询

		$data = search_admin($_GET,$obj);

		echo Db::table('y_products')->getLastSql();
		$image = Pimage::all();
		$type = Ptype::all();
		$this->assign(array(
				'type' =>$type,
				'image'=>$image,
				'list' => $data,
		));

		return $this->fetch();
	}
	
	public function add()
	{
		$type = Ptype::all(function($query){
			$query->order('commend desc')->select();
		});
		$this->assign(array(
				'type'=>$type,
		));
		return $this->fetch();
	}
	
	public function edit($id)
	{
		$list = Products::get($id);
		
		$obj = new Pimage();
		$image = $obj->where('products_id',$id)->order('commend','asc')->select();
		
		$type = Ptype::all(function($query){
			$query->order('commend asc')->select();
		});
		$this->assign(array(
				'image'=> $image,
				'type' => $type,
				'list' => $list,
		));
		return $this->fetch();		
	}
	
	public function save()
	{
		//事物  产品图片和产品信息一起上传成功或者  全部都失败;
		Db::startTrans();
		try{
			$data = Request::instance()->param();
			if($data['type_id'] == 0){
				$this->error('请选择产品分类',url('admin/products/add'));
			}
			$data['create_time'] = strtotime($data['create_time']);
			$data['update_time'] = $data['create_time'];
		    $id = Db::name('products')->insertGetId($data);
		     
		    $files = request()->file('img');
		    if($files){
		    	foreach ($files as $key => $file ){
		    		$info =	$file->validate(['ext'=>'jpg,png,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'products');
		    		if($info){
		    			$arr['products_id'] = $id;
		    			$arr['img'] = $info->getSaveName();
		    			$arr['create_time'] = $data['create_time'];
		    			$arr['update_time'] = $data['create_time'];
		    			$arr['commend'] = $key;
		    		}else{
		    			$this->error($file->getError(),url('admin/products/add'));
		    		}
		    	}
		    	$status = Db::name('pimage')->insertAll($arr);
		    	    // 提交事务
				    Db::commit(); 
		    }else{
		    	$this->error('请选择产品图片',url('admin/products/add'));
		    }
		    
		}catch (\Exception $e) {
		    // 回滚事务
   			 Db::rollback();
   			 $this->error('保存失败');
		}
		$this->success('保存成功');
	}
	
	public function usave()
	{
		//事物  产品图片和产品信息一起上传成功或者  全部都失败;
		Db::startTrans();
		try{
			$data = Request::instance()->param();
			$id = $data['id'];
			if($data['type_id'] == 0){
				$this->error('请选择产品分类',url('admin/products/edit?id='.$id));
			}
			$data['update_time'] = strtotime($data['update_time']);
			$status = Db::name('products')->update($data);
			
			$files = request()->file('img');
			
			//获取当前图片的最大排序 然后+1;
			$obj = new Pimage();
			$ob = $obj->where('products_id',$id)->order('commend','desc')->find();
			$px = $ob['commend'];
			
			
			//如果用户上传了图片
			if($files){
				foreach ($files as $key => $file ){
					//循环验证图片是否正常
					$info =	$file->validate(['ext'=>'jpg,png,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'products');
					if($info){
						$px++;
						$arr[$key]['products_id'] = $id;
						$arr[$key]['img'] = $info->getSaveName();
						$arr[$key]['update_time'] = $data['update_time'];
						$arr[$key]['commend'] = $px;
					}else{
						$this->error($file->getError(),url('admin/products/edit?id='.$id));
					}
				}
				$status = Db::name('pimage')->insertAll($arr);
			}
					 // 提交事务
				    Db::commit(); 
		}catch (\Exception $e) {
		   		 // 回滚事务
   			 	Db::rollback();
   				 $this->error('保存失败');
				}
			$this->success('保存成功');
	}
	
	public function delete($id)
	{
		$data = Pimage::all(['products_id'=>$id]);
		foreach ($data as $key => $value){
			$path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'products' . DS . $value['img'];
			@unlink($path);
		}
		Pimage::destroy(['products_id'=>$id]);
		Products::destroy($id) ? $this->success('删除成功',url('admin/products/index')) : $this->error('删除失败',url('admin/products/index'));
	}
	
	//批量删除
	public function deletes($id)
	{
		$ids = rtrim($id,',');
		$arr = explode(',', $ids);
		$obj = new Pimage();
		foreach($arr as $key => $value){
			$ob = Pimage::all(['products_id'=>$value]);
			foreach($ob as $k => $v)
			{
				$path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'products' . DS . $v['img'];
				@unlink($path);
				$pid[$k] = $v['id'];
			}
			Pimage::destroy($pid);	

		}
	
		Products::destroy($arr) ? $this->success('删除成功',url('admin/products/index')) : $this->error('删除失败',url('admin/products/index'));
		
	}
	
	
	//编辑页ajax删除图片
	public function imgdelete()
	{
		$data = Request::instance()->param();
		$value = $data['value'];
		$arr = explode('_',$value);
		//0 图片id
		//1 产品id
		$obj = Pimage::get($arr[0]);
		if($obj){
			$path = ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'products' . DS . $obj['img'];
			@unlink($path);
		}
		$obj->delete() ? $status = 1 : $status = 0;
		return $status;
	}
	
	
	//ajax 改变产品页的图片的排序
	public function quick_commend()
	{
		$data = Request::instance()->param();
		$status = Pimage::where('id',$data['id'])->update(['commend'=>$data['value']]);
		return $status;
	}


	public function webuploader()
	{
		static $px = 0;
		$file = request()->file('file');
		if($file){
			$info =	$file->validate(['ext'=>'jpg,png,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'admin' . DS . 'webuploader');
					if($info){
						$arr['img'] = $info->getSaveName();
					}else{
						$this->error($file->getError(),url('admin/products/edit?id='.$id));
					}
				Pimage::create($arr);
		}
	}

}