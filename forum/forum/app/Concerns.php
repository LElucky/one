<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concerns extends Model
{
    Protected $table = 'Concerns';
    public $timestamps = false;
    
    // 获取我关注的人
    public function getIConcerned()
    {
        return $this->hasone('\App\Users', 'id', 'concerned_user_id');
    }
 
    // 获取我关注的人回答的次数
    public function getAnswerIConcerned()
    {
        return $this->hasmany('App\Comments', 'user_id', 'concerned_user_id')->count();
    }
    
    // 获取我关注的人关注他的人数
    public function getConcernedIConcerned()
    {
        return $this->hasmany('\App\Concerns', 'concerned_user_id', 'concerned_user_id')->count();
    }
    
    
    
    // 获取关注我的人
    public function getConcernedMe()
    {
        return $this->hasone('\App\Users', 'id', 'user_id');
    }
    
    // 获取关注者有多少回答次数
    public function getAnswerConcernedMe()
    {
        return $this->hasmany('\App\Comments', 'user_id', 'user_id')->count();
    }
    
    // 获取关注者有多少关注者
    public function getConcernedConcernedMe()
    {
        return $this->hasmany('\App\Concerns', 'concerned_user_id', 'user_id')->count();
    }
    
    // 关注我的人我是否有关注他
    public function checkConcernedMe()
    {
        return $this->hasone('\App\Concerns', 'concerned_user_id', 'concerned_user_id');
    }
}
