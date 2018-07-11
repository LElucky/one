<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Qtype;

class QtypeController extends Controller
{
    // 分类管理
    public function oper()
    {
        $model = new Qtype;
        $qtypeTop = $model->getTypeOper($fid = 0);
        return view('admin/qtype/oper',['qtypeTop' => $qtypeTop]);
    }   
    
    
    // 添加分类
    public function add()
    {
        $model = new Qtype;
        $qtype = $model->getTypeOper($fid = 0);
        return view('admin/qtype/add',['qtype' => $qtype]);
    }
    
    // 保存分类
    public function save(Request $request)
    {
        $qtype = $request->except('_token');
        $model = new Qtype;
        $re = $model->insert($qtype);
        if($re){
            return 'ok';
        }else{
            return 'no';
        }
    }
}
