<?php
namespace app\index\controller;
use think\Controller;
use think\cache\driver\Redis;
class IndexController extends Controller
{
	public function index()
	{	
		$redis = new Redis();


		return $this->fetch();
	}
	
}

