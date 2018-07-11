<?php 
namespace app\admin\model;
use think\Model;
use muisc\MP3File;
Class Mp3 extends Model{
	protected $name = 'mp3';

	public function getLongTime($filename)
	{
			// 调用方法：
		$path = 'static/MP3/music/'.$filename;
		// echo $path;
		$mp3 = new MP3File($path);
		$a = $mp3->getDurationEstimate();
		$b = $mp3->getDuration();
		$duration = $mp3::formatTime($b);
		// 返回的是一个包含时分秒的数组
		// PRINT_R($duration);
		IF($duration){
			$hours   = strlen($duration['hours'])   == 1 ? '0'.$duration['hours'] : $duration['hours'];
			$minutes = strlen($duration['minutes']) == 1 ? '0'.$duration['minutes'] : $duration['minutes'];
			$seconds = $duration['seconds'] == 0 ? 00 : $duration['seconds']; 
		}
		return $hours. ':' . $minutes .':'. $seconds;
	}
}

?>