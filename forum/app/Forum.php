<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Users;
use App\Ftype;
use App\Forum;
use App\Likeforum;
use App\Forumimage;
use App\Forumcomment;
class Forum extends Model
{
    protected $table = 'forum';
    protected $fillable = ['subject','content','ctime',
                            'onlick','user_id','commend_id',
                            'typestr','recommended','collection',
                            'like','audit','type'];
    public $timestamps = false;
    
    
    //获取forum图片
    public function getForumImg($forumid){
        $formimage = new Forumimage();
        $data = $formimage->where('forum_id',$forumid)->get();
        $num = $data->count();
        IF($num != 0){
            return $data;
        }else{
            return false;
         }
    }
    
    //通过userid  获取username
    public function getUsersid($usersid)
    {
        $users = new Users();
        $uname = $users->where('id',$usersid)->first();
        return $uname->nick_name;
    }




    //获取用户的全部信息
    public function getUserInfo($usersid)
    {
        $users = new Users();   
        $uname = $users->where('id',$usersid)->first();
        return $uname;
    }
    
    
    public function TformatChange($str){
        $arr1 = trim($str,'>');
        $arr2 = explode('>',$arr1);
        $type = new Ftype();
        $a = '';
        foreach($arr2 as $key => $value){
            $name = $type->where('id',$value)->first();
            $a.=$name->typename . '>'; 
        }
        return $a;
        
    }
    
    //根据帖子 里的 type 找 分类
    public function getType($t) {
        $type = new Ftype();
        $type = $type->where('id',$t)->first();
        return $type->typename;
    }


        //根据帖子 里的 type 找typeimg
    public function getTypeInfo($t) {
        $type = new Ftype();
        $type = $type->where('id',$t)->first();
        return $type;
    }
    
    
    //根据帖子 里的 usersid 找 头像
    public function getUserImg($t) {
        $users = new Users();
        $users = $users->where('id',$t)->first();
        return $users->user_image;
    }
    
    
    //获取最后评论人的姓名  根据forum的ID
    public  function getEndCommentUser($id) {
        $comment = new Forumcomment();
        $data = $comment->where('forumid',$id)->get();
        $data1 = json_decode($data,true);;
        $one = end($data1);
        $userid = $one['userid'];
        $users = new Users();
        $user = $users->where('id',$userid)->first();
        if(!empty($user)) {
            return $user->nick_name;
        } else {
            return '暂无评论';
        } 
    }
    

    //获取最后评论的时间  根据forum的ID
    public  function getEndCommentTime($id) {
        $comment = new Forumcomment();
        $data = $comment->where('forumid',$id)->get();
        $data1 = json_decode($data,true);
        $one = end($data1);
        $ctime = $one['ctime'];
        if(!empty($ctime)) {
            return date('Y-m-d H:i:s',$ctime);
        } else {
            return '';
        }
    }
    
    
    //通过文章forumid  查看用户是否收藏文章
    public function getForumLike($forumid) {
        if(session('usersid')){
            $usersid = session('usersid');
            $likeforum = new likeforum();
            $status = $likeforum->where('user_id',$usersid)->where('forum_id',$forumid)->first();
            if($status){
                //已经收藏
                return 1;
            }else{
                //未收藏
                return 0;
            }
        }else{
            //未登录
            return 0;
        }
    }
    
    
    //通过帖子id 求 评论条数
    public function getCountComment($forumid) {
        $comment = new Forumcomment();
        $num = $comment->where('forumid',$forumid)->count();
        return $num;
    }


    
}