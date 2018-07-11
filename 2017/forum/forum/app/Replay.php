<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comments;
use App\Replay;

class Replay extends Model
{
    protected $table = 'replay';
    public $timestamps = false;
    
    // 获取用户的信息
    public function getReplayUserInfo()
    {
        return $this->hasone('\App\Users', 'id', 'from_user_id');
    }
    
    // 获取目标用户的信息
    public function getReplayToUserInfo()
    {
        return $this->hasone('\App\Users', 'id', 'to_user_id');
    }
    
    //
    public function replayCount($id)
    {
        $model1 = new Comments;
        $comments = $model2->where('question_id',$id)->get();
        foreach ($comments as $c) {
            $commentId = $c['id'];
            $model2 = new Replay;
            $replayCount = $model2->where('comment_id', $commentId)->count();
        }
        return $replayCount;
    }
}
