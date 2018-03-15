<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Index\BaseController;
use App\Question;
use App\Total;
use App\Comments;
use App\Replay;
use App\Collection;

class QuestionController extends BaseController
{
    // 话题页
    public function index()
    {
        $model1 = new Question;
        $question = $model1->where('description', '<>' , '')->paginate(5);
        $maxOnclick = $model1->orderBy('onclick', 'desc')->limit(10)->get();

        $model2 = new Comments;
        
        return view('index/question/index', [
            'question' => $question,
            'maxOnclick' => $maxOnclick
        ]);
    }
    
    // 提问
    public function issue()
    {
        return view('index/question/issue');
    }
    
    // 保存提问
    public function store(Request $request, $id)
    {
        $model = new Question;
        $data = [
            'qname' => $request->qname,
            'description' => $request->description,
            'user_id' => $id,
            'ctime' => time()
        ];
        $questionId = $model->insertGetId($data);
        
        $totalData = ['question_id' => $questionId];
        $model2 = new Total;
        $model2->insert($totalData);
        
        return redirect('index/question/container/' . $questionId);
    }
    
    // 话题详情页
    public function container($id)
    {
        $model1 = new Question;
        $question = $model1->where('id',$id)->first();
        $onclick = $question['onclick'] + 1;
        $model1->where('id', $id)->update(['onclick' => $onclick]);
        
        
        $model2 = new Comments;
        $comments = $model2->where('question_id',$id)->get();
        $count = $model2->select('id')->where('question_id',$id)->count();

        $model3 = new Collection;
        $collection = $model3->where('question_id', $id)->where('user_id', session('usersid'))->first();
        
        $collection_count = $model3->select('id')->where('question_id', $id)->count();

        
        return view('index/question/container',[
            'question' => $question,
            'comments' => $comments,
            'count' => $count,
            'collection' => $collection,
            'collection_count' => $collection_count
        ]);
    }
    
    // 添加评论
    public function add()
    {
        $questionid = $_GET['questionid'];
        $userid = $_GET['userid'];
        $comment = $_GET['comment'];
        $data = [
            'question_id' => $questionid,
            'user_id' => $userid,
            'comment' => $comment,
            'ctime' => time()
        ];
        
        $model1 = new Comments;
        $re = $model1->insert($data);
        if($re){
            echo 1;
        }
    }
    
    // 回复详情页
    public function replayDetail($id)
    {
        $model = new Replay;
        $replay = $model->where('comment_id', $id)->get();
        return view('index/question/replayDetail', ['replay' => $replay]);
    }
    
    // 输入回复回复页面
    public function replayReplay($id)
    {
        $model = new Replay;
        $replay = $model->where('id', $id)->first();
        return view('index/question/replayReplay', ['replay' => $replay]);
    }
    
    // 输入回复内容页面
    public function replayContent($id)
    {
        $model = new Comments;
        $comment = $model->where('id', $id)->first();
        return view('index/question/replayContent', ['comment' => $comment]);
    }
    
    // 回复评论
    public function doReplay(Request $request, $id)
    {
        if(empty($_POST['content'])){
            return redirect()->back();
        }
        $model = new Replay;
        $data = [
            'question_id' => $_POST['questionId'],
            'comment_id' => $id,
            'to_user_id' => $_POST['toUsersId'],
            'from_user_id' => $_POST['fromUsersId'],
            'content' => $_POST['content'],
            'ctime' => time(),
            'replay_id' => $id
        ];
        $re = $model->insert($data);
        if ($re) {
            return redirect('index/question/container/' . $_POST['questionId']);
        } else {
            echo '回复失败';
        }
    }
    
    // 回复回复
    public function doReplayRe($id)
    {
        if (empty($_POST['content'])) {
            return redirect()->back();
        }
        
        $model = new Replay;
        $data = [
            'question_id' => $_POST['questionId'],
            'comment_id' => $_POST['commentId'],
            'to_user_id' => $_POST['toUsersId'],
            'from_user_id' => $_POST['fromUsersId'],
            'content' => $_POST['content'],
            'ctime' => time(),
            'replay_type' => 1,
            'replay_id' => $id
        ];
        $re = $model->insert($data);
        if ($re) {
            return redirect('index/question/replayDetail/' . $_POST['commentId']);
        }
    }
    
    // 关注问题/话题
    public function collection(Request $request, $id)
    {
        $model = new Collection;
        $collection = $model->where('question_id', $request->questionid)->where('user_id', $id)->first();
        if ($collection == '') {
            $data = [
                'user_id' => $id,
                'question_id' => $request->questionid
            ];
            $model->insert($data);
            
            $count = $model->select('id')->where('question_id', $request->questionid)->count();
            echo $count;
        } else {
            $model->where('question_id', $request->questionid)->where('user_id', $id)->delete();
            $count = $model->select('id')->where('question_id', $request->questionid)->count();
            if ($count != '') {
                echo $count;
            } else {
                echo 0;
            }
        }
    }
}
