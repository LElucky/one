<?php
namespace app\index\controller;
use think\Controller;

class DownloadController extends BaseController
{
	//关于我们页面
	public function index()
	{
		echo 'enenne';
		return $this->fetch();
	}
}