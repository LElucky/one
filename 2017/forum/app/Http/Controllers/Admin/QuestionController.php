<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Question;
use App\Ausers;
use App\Total;

class QuestionController extends BaseController
{
    // 管理页面
    public function oper()
    {
        $model = new Question;
        $question = $model->where('audit',1)->paginate(10);
        // 序号
        $key = ($question->currentPage() - 1) * $question->perPage() + 1; 
        return view('admin/question/oper',['question' => $question,'key' => $key]);
    }
    
    // 新增页面
    public function add()
    {
        return view('admin/question/add');
    }
    
    // 保存新增问题
    public function save(Request $request)
    {
        $model3 = new Total;
        $model1 = new Question;
        $data1 = [
            'qname' => $request->qname,
            'description' => $request->description,
            'user_id' => Session('userid'),
            'ctime' => time()
        ];
        
        $id = $model1->insertGetId($data1);
        $totalData = ['question_id' => $id];
        $model3->insert($totalData);                        
                
        return redirect('admin/question/oper');
    }
    
    // 问题详情页
    public function detail($id)
    {
        $model = new Question;
        $question = $model->where('id',$id)->first();
        return view('admin/question/detail',['question' => $question]);
    }
    
    // 审核页面
    public function audit()
    {
        $model = new Question;
        $question = $model->where('audit',0)->paginate(10);
        // 序号
        $key = ($question->currentPage() - 1) * $question->perPage() + 1; 
        return view('admin/question/audit',['question' => $question,'key' => $key]);
    }
    
    // 审核未通过
    public function error($id)
    {
        $model = new Question;
        $model->where('id',$id)->update(['audit' => 1]);
        echo "<img src='http://127.0.0.1/CooperationProject/forum/public/admin/ausers/images/correct.png' class='correct' data-id='" . $id . "' alt=''>";
    }    
    
    // 审核通过
    public function correct($id)
    {
        $model = new Question;
        $model->where('id',$id)->update(['audit' => 0]);
        echo '<img src="http://127.0.0.1/CooperationProject/forum/public/admin/ausers/images/error.png" class="error" data-id="' . $id . '" alt="">';
    }
}
