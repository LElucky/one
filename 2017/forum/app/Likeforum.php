<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Forum;
use App\Forumimage;
class Likeforum extends  Model
{
	public $timestamps = false;
	protected $table = 'likeforum';
	protected $fillable = ['user_id','forum_id'];
	//根据用户的收藏  获取forum信息
	public function getforumInfo($forumid) {
	    $forum = new Forum();
	    $data = $forum->where('id',$forumid)->first();
	    return $data;
	}
	
	//获取帖子的图片
	public function getImgForum($forumid){
	    $img = new Forumimage();
	    $data = $img->where('forum_id',$forumid)->get();
	    $num = $data->count();
	    IF($num != 0){
	        return $data[0]->image;
	    }else{
	        return false;
	    }
	    
	}
}


?>