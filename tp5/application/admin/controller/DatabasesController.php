<?php
namespace app\admin\controller;
use backupmysql\Backup;
use think\Request;
use think\Db;
use phpexcel\Excel;
class DatabasesController extends BaseController
{
	//数据库备份页面
	public function backup()
	{
		return $this->fetch();
	}
	
	//数据库备份操作
	public function saveback()
	{
		$data = Request::instance()->param();
		if($data['dir'] == ''){
			$time = date('Ymd',time());
			$time_path = ROOT_PATH . 'datasql' . DS . $time;
			if(!file_exists($time_path)){
				mkdir(ROOT_PATH . 'datasql' . DS . $time , 0777, true);
			}
			$backupdir = ROOT_PATH . 'datasql' . DS . $time	 . DS . $data['data'];
		}else{
			$backupdir = ROOT_PATH . $data['dir'];
		}
		
		
		if (!is_dir($backupdir))
		{
			mkdir($backupdir, 0777, true);
		}
		$backup = new Backup($data['link'], $data['data'], $data['user'], $data['pass']);
		$result = $backup->setbackdir($backupdir)
		->setvolsize(0.2)
		->ajaxbackup();
		
		return $result;
	}
	
	/**
	 * [excel excel表格管理页面]
	 * @return [type] [description]
	 */
	public function excel()
	{
		$table = Db::query('show tables');
		$this->assign([
				'table' => $table,
		]);
		return $this->fetch();
	}
	
	/**
	 * [exceldata 数据表excel导出]
	 * @param  [type] $id     [数据表名字]
	 * @param  [type] $static [0 下载 1 保存]
	 * @return [type]         [description]
	 */
	public function excelsave($id,$static)
	{
		//设置字段名为页头
		$one = Db::query('select * from '.$id.' limit 1');
		
		if($one){
			$title = [];
			foreach($one[0] as $key => $value){
				$title[] = $key;
			}
			//$title[] = 'create_table_sql';
		}
		$data = Db::query('select * from  '.$id);
		//$data[0]['Create Table'] = Db::query('show create table '.$id)[0]['Create Table'];
		
		$obj = new Excel();
		if($static == 1){
			//直接下载
			$obj->Excel_1($title,$data,$id,false);	
		}else{
			//保存到文件
			$suc = $obj->Excel_1($title,$data,$id,true);
			$suc ? $this->success('保存成功 请前往服务器查看') : $this->error('保存异常');
		}
	}

	/**
	 * [excelr excel 表格导入 选择文件页面]
	 * @return [type] [description]
	 */
	public function excelr()
	{

		return $this->fetch();
	}


	/**
	 * [exceldata Excel导入数据库]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function exceldata(Request $request)
	{
		$data = $request->param();
		$file = request()->file('excel');
		if($file){
			$info = $file->validate(['ext'=>'xlsx'])->move(ROOT_PATH . 'public' . DS .'uploads'  . DS . 'come');
			if($info){
				//文件名
				$filename = $info->getSaveName();
				//文件路径
				$filepath = ROOT_PATH . 'public' . DS .'uploads'  . DS . 'come' . DS . $filename;
				$obj = new Excel();
				$val = trim($data['val'],',');
				$value = explode(',', $val);
				//						字段		表名			 文件路径
				$data = $obj->comeExcel($value,$data['table'],$filepath);
				$data['count'] = count($data);
				return	$data;
			}else{
				echo $file->getError();
			}
		}else{
			$this->error('请选择文件');
		}
	}
}



?>