<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    Protected $table = 'comments';
    public $timestamps = false;
    
    public function getCommentUserInfo()
    {
        return $this->hasone('\App\Users','id','user_id');
    }
    
    // 获取评论的回复总数
    public function getCountReplay()
    {
        return $this->hasMany('\App\Replay', 'comment_id', 'id')->count();
    }
        
    // 获取评论的问题详情
    public function getQuestionInfo()
    {
        return $this->hasone('\App\Question', 'id', 'question_id');
    }
    
    // 获取问题有多少个赞
    public function getTotalGood()
    {
        return $this->hasone('\App\Total', 'question_id', 'question_id');
    }
    
    // 获取问题有多少条评论
    public function getTotalComments()
    {
        return $this->hasmany('\App\Comments', 'question_id', 'question_id')->count();
    }
}
