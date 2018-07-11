<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Total;
use App\Good;
use App\Bad;
use App\Forum;
use App\Http\Controllers\Index\BaseController;

class IndexController extends BaseController
{
    // 首页
    public function index()
    {
        // 模块--问答
        $model1 = new Question;
        $question = $model1->where('audit',1)->paginate(10);

        //论坛模块
        $forum1 = new Forum();
        $data1 = $forum1->where('recommended',1)->paginate(2);
        
        $data2 = $forum1->orderBy('readnum','DESC')->paginate(6);
        
        return view('index',[
            'question' => $question,
            'hotTwo'=> $data1,
            'readMax' => $data2
        ]);
    }
    
    // 赞
    public function nice(Request $request,$id)
    {
        $model1 = new Total;
        $model2 = new Good;
        $model3 = new Bad;
        $checkGood = $model2->where('question_id', $id)->where('user_id', session('usersid'))->first();
        $checkBad = $model3->where('question_id', $id)->where('user_id', session('usersid'))->first();
        
        if ($checkBad == ''){
            if ($checkGood == '') {
                $total = $model1->where('question_id', $id)->first();
                $good = $total['good'] + 1;
                $model1->where('question_id', $id)->update(['good' => $good]);
                
                $goodData = [
                    'user_id' => session('usersid'),
                    'question_id' => $id
                ];
                $model2->insert($goodData);
                return $good;
            } else {
                $model2->where('question_id', $id)->where('user_id', session('usersid'))->delete();
                
                $total = $model1->where('question_id', $id)->first();
                $good = $total['good'] - 1;
                $model1->where('question_id', $id)->update(['good' => $good]);
                return $good;            
            }
        } else {
            $model3->where('question_id', $id)->where('user_id', session('usersid'))->delete();
            
            $total = $model1->where('question_id', $id)->first();
            $good = $total['good'] + 1;
            $bad  = $total['bad'] - 1;
            $model1->where('question_id', $id)->update(['good' => $good, 'bad' => $bad]);
            
            $goodData = [
                'user_id' => session('usersid'),
                'question_id' => $id
            ];
            $model2->insert($goodData);
            $totalData = [
                'good' => $good,
                'bad' => $bad
            ];
            return $totalData;
        }
    }
    
    // 踩
    public function bad(Request $request,$id)
    {
        $model1 = new Total;
        $model2 = new Good;
        $model3 = new Bad;
        $checkGood = $model2->where('question_id', $id)->where('user_id', session('usersid'))->first();
        $checkBad = $model3->where('question_id', $id)->where('user_id', session('usersid'))->first();
        
        if ($checkGood == '') {
            if ($checkBad == '') {
                $total = $model1->where('question_id', $id)->first();
                $bad = $total['bad'] + 1;
                $model1->where('question_id', $id)->update(['bad' => $bad]);
                
                $badData = [
                    'user_id' => session('usersid'),
                    'question_id' => $id
                ];
                $model3->insert($badData);
                return $bad;
            } else {
                $re = $model3->where('question_id', $id)->where('user_id', session('usersid'))->delete();
                
                $total = $model1->where('question_id', $id)->first();
                $bad = $total['bad'] - 1;
                $model1->where('question_id', $id)->update(['bad' => $bad]);
                return $bad;            
            }
        } else {
            $model2->where('question_id', $id)->where('user_id', session('usersid'))->delete();
            
            $total = $model1->where('question_id', $id)->first();
            $good = $total['good'] - 1;
            $bad  = $total['bad'] + 1;
            $model1->where('question_id', $id)->update(['good' => $good, 'bad' => $bad]);
            
            $badData = [
                'user_id' => session('usersid'),
                'question_id' => $id
            ];
            $model3->insert($badData);
            $totalData = [
                'good' => $good,
                'bad' => $bad
            ];
            return $totalData;
        }
    }
}
