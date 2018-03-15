<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    Protected $table = 'Collection';
    public $timestamps = false;
    
    // 查相关话题的详情
    public function getCollectionInfo()
    {
        return $this->hasone('\App\Question', 'id', 'question_id');
    }
    
    // 获取收藏的问题有多少条评论
    public function getTotalComments()
    {
        return $this->hasmany('\App\Comments', 'question_id', 'question_id')->count();
    }
    
    // 获取收藏的问题有多少人收藏
    public function getTotalCollection()
    {
        return $this->hasmany('\App\Collection', 'question_id', 'question_id')->count();
    }
}
