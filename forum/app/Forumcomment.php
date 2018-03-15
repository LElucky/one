<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Users;
use App\Forum;
use App\Forumimage;
class Forumcomment extends Model
{
    public $timestamps = false;
    protected $table = 'forumcomment';
    protected $fillable = ['userid','forumid','content','ctime','to_userid','fid'];
    
    
    
    
    
    //通过userid  获取username
    public function getUsersid($usersid)
    {
        $users = new Users();
        $uname = $users->where('id',$usersid)->first();
        return $uname->nick_name;
    }
    
    //根据帖子 里的 usersid 找 头像
    public function getUserImg($t) {
        $users = new Users();
        $user = $users->where('id',$t)->first();
        return $user->user_image;
    }
    
    //根据forumid 查询 forum名字
    public function getForumName($forumid)
    {
        $forum = new Forum();
        $data = $forum->where('id',$forumid)->first();
        return $data;
    }

    
    //获取帖子图片的信息
    public function getForumIMG1($forumid){
        $formimage = new Forumimage();
        $data = $formimage->where('forum_id',$forumid)->get();
        $num = $data->count();
        IF($num != 0){
            return $data;
        }else{
            return false;
        }
    }
    
    
    
    
    
    
    //获取某人的最后评论  根据forum的ID 和 userID
    public  function getEndCommentUser1($forumid,$id) {
        $comment = new Forumcomment();
        $data = $comment->where('forumid',$forumid)->where('userid',$id)->get();
        $data1 = json_decode($data,true);;
        $one = end($data1);
        if(!empty($one)) {
            return $one;
        } else {
            return false;
        }
    }
    
    
    //获取某人的所有评论  根据forum的ID 和 userID
    public  function getEndCommentUser2($forumid,$id) {
        $comment = new Forumcomment();
        $data = $comment->select('id','ctime','content')->where('forumid',$forumid)->where('userid',$id)->get();
        $data1 = json_decode($data,true);;
        if(!empty($data1)) {
            return $data1;
        } else {
            return false;
        }
    }
    
    
    
    
    
}