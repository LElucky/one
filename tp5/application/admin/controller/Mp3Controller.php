<?php
namespace app\admin\controller;
use app\admin\model\Mp3;
use think\Request;
use think\Db;
class Mp3Controller extends BaseController
{
	/**
	 * [index 首页]
	 * @return [type] [description]
	 */
	public function index()
	{
		$obj = new Mp3();
		$list = search_admin($_GET,$obj);
		$this->assign([
				'list' => $list,
		]);

		return $this->fetch();
	}

	/**
	 * [add 添加页面]
	 */
	public function add()
	{
		return $this->fetch();
	}

	/**
	 * [save 保存添加]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function save(Request $request)
	{
		$data = $request->param();
		$data['create_time'] = strtotime($data['create_time']);

			//上传图片
			$isImg = request()->file('img');
			if($isImg){
				$info = $isImg->validate(['ext'=>'png,jpg,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'img');
				if($info){
					$data['img'] = $info->getSaveName();
				}else{
					echo $isImg->getError();
				}
			}

			//上传mp3
			$isMp3 = request()->file('mp3');
			if($isMp3){
				$minfo = $isMp3->validate(['ext'=>'mp3'])->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'music');
				if($minfo){
					//文件名
					$data['filename'] = $minfo->getSaveName();
					//大小 mb
					$data['size'] = ($minfo->getInfo()['size'] / 1024) / 1024;
					//时长
				}else{
					echo $isMp3->getError();
				}
			}

			Db::table('y_mp3')->insert($data) ? $this->success('添加成功') : $this->error('添加失败');
	}


	/**
	 * [edit 修改页面]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id){
		$data = MP3::get($id);
		$this->assign([
			'list' => $data,
		]);
		return $this->fetch();
	}
	


	/**
	 * [usave mp3修改保存]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function usave(Request $request)
	{

		$data = $request->param();
		$data['update_time'] = strtotime($data['update_time']);
		$old = MP3::get($data['id']);
			//上传图片
			$isImg = request()->file('img');
			if($isImg){
				$info = $isImg->validate(['ext'=>'png,jpg,jpeg,gif'])->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'img');
				if($info){
					$data['img'] = $info->getSaveName();
					//删除旧的图片
					if($old){
						//获取文件夹名字
						//之后会判断是否为空
						$arr = explode('\\', $old['img']);
						//删除图片
						$pathimg = ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'img' . DS . $old['img'];
						@unlink($pathimg);
						//判断文件夹是否为空
						if($arr[0]){
							$path = $pathimg = ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'img' . DS . $arr[0];
							$isempty = array_diff(scandir($path),array('..','.'));
							if($isempty == []){
								@rmdir($path);
							}
						}
					}
				}else{
					echo $isImg->getError();
				}
			}

			//上传mp3
			$isMp3 = request()->file('mp3');
			if($isMp3){
				$minfo = $isMp3->validate(['ext'=>'mp3'])->move(ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'music');
				if($minfo){
					//文件名
					$data['filename'] = $minfo->getSaveName();
					//大小 mb
					$data['size'] = ($minfo->getInfo()['size'] / 1024) / 1024;
					
					//删除文件
					if($old){
					//之后会判断是否为空
						$arr = explode('\\', $old['filename']);
						$pathimg = ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'music' . DS . $old['filename'];
						@unlink($pathimg);
						if($arr[0]){
							$path = $pathimg = ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'img' . DS . $arr[0];
							$isempty = array_diff(scandir($path),array('..','.'));
							if($isempty == []){
								@rmdir($path);
							}
						}
					}
				}else{
					echo $isMp3->getError();
				}
			}

			Db::table('y_mp3')->update($data) ? $this->success('修改成功') : $this->error('修改失败');
	}


	/**
	 * [delete 单个删除MP3]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delete($id)
	{
		$data = Mp3::get($id);
		if($data){
			$filename =  ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'img' . DS . $data['img'];
			$filemp3 = ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'music' . DS . $data['filename'];
			@unlink($filename);
			@unlink($filemp3);

			//之后会判断是否为空
			$arr = explode('\\', $data['filename']);
			$arr_img = explode('\\', $data['img']);
			$img =  ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'img' . DS . $arr[0];
			$filemp3 = ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'music' . DS . $arr_img[0];
			$isempty_img = array_diff(scandir($img),array('..','.'));
			$isempty_mp3 = array_diff(scandir($filemp3),array('..','.'));
				if($isempty_img == []){
					@rmdir($isempty_img);
				}elseif($isempty_mpe == []){
					@rmdir($isempty_mp3);
				}
		}
		Mp3::destroy($id) ? $this->success('删除成功') : $this->error('删除失败');
	}


	/**
	 * [delnews 批量删除]
	 * @return [type] [description]
	 */
	public function deletes($id)
	{
		$ids = rtrim($id,',');
		$arr = explode(',', $ids);
		foreach ($arr as $key => $value) {
			$data = Mp3::get($value);
			if($data){
				$pathimg = ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'img' . DS . $data['img'];
				$pathmp3 = ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'music' . DS . $data['filename'];
				@unlink($pathimg);
				@unlink($pathmp3);

					//如果文件夹为空 则删除
					$mp3 = explode('\\', $data['filename'])[0];
					$img = explode('\\', $data['img'])[0];

					$path_img =  ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'img' . DS . $img;
					$path_mp3 = ROOT_PATH . 'public' . DS . 'static' . DS . 'MP3' . DS . 'music' . DS . $mp3;

					$isempty_img = array_diff(scandir($path_img),array('..','.'));
					$isempty_mp3 = array_diff(scandir($path_mp3),array('..','.'));

					if($isempty_img == [])@rmdir($path_img);
					if($isempty_mp3 == [])@rmdir($path_mp3);
			}

		}
		Mp3::destroy($arr) ? $this->success('删除成功') : $this->error('删除失败');
	}


	//ajax 改变 排序
	public  function sort_status()
	{
		
		$data = Request::instance()->param();
		$data['sort'] = $data['commend'];
		unset($data['commend']);
		$n = Mp3::update($data);
		if($n){
			return  1;
		}else{
			return  0;
		}
	}
}

?>