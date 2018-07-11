<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Question extends Model
{
    protected $table = 'question';
    public $timestamps = false;
    
    public function showUsername()
    {
        return $this->hasone('\App\Ausers','id','user_id');
    }
    
    // 获取用户信息
    public function showUserInfo()
    {
        return $this->hasone('\App\Users', 'id', 'user_id');
    }
    
    public function total()
    {
        return $this->hasone('\App\Total', 'question_id', 'id');
    }
    
    public function getCountComments()
    {
        return $this->hasmany('\App\Comments','question_id','id')->count();
    }
    
    // 获取问题/话题关注人数
    public function getCountCollection()
    {
        return $this->hasmany('\App\Collection', 'question_id', 'id')->count();
    }
    
    // 获取自己提的问题有多少条评论
    public function getTotalComments()
    {
        return $this->hasmany('\App\Comments', 'question_id', 'id')->count();
    }
    
    // 获取自己提的问题有多少人收藏
    public function getTotalCollection()
    {
        return $this->hasmany('\App\Collection', 'question_id', 'id')->count();
    }
}
