<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Ftype;
use App\Forum;

class ForumController extends BaseController
{
    //forum呈现首页
    public function oper()
    {
        $forum = new Forum();
        $forumData = $forum->all();
        return view('admin/forum/oper',['forumData'=>$forumData]);
    }
    
    //添加保存
    public function save(Request $request)
    {
        
        $arr = $request->except('_token');
        $arr['user_id'] = session('usersid');
        $arr['ctime']   = time();
        $typestr = $arr['typestr'];
        $tmp = explode('>',$typestr);
        $arr['type'] = end($tmp);
        $ftype = new Ftype();
        
        $forum = new Forum();
        $one = $ftype->where('id',$arr['type'])->first();
        $one->forumnum++;
        //dd($one->forumnum);
        $suc1 = $one->save();
        $suc = $forum->create($arr);
        //$message = $suc? '添加成功':'添加失败';
        $message = $suc1? $suc?'添加成功':'添加失败':'添加失败';
        return redirect()->back()->with('message',$message);
        
    }
    
    //呈现添加页面
    public function add()
    {
        $ftype = new Ftype();
        $type = $ftype->getOptionType();
        return view('admin/forum/add',['type'=>$type]);    
    }
    
    //删除forum
    public function delete($id)
    {
        $forum = new Forum();
        //$suc = $forum->where('id',$id)->delete();
        $dele = $forum->where('id',$id)->first();
       
        $ftype = new Ftype();
        $suc1 = $ftype->where('id',$dele->type)->delete();
        $suc = $dele->delete();
        $message = $suc? '删除成功':'删除失败';
        return redirect()->back()->with('message',$message);
    }
    
    //呈现编辑页面
    public function edit($id)
    {
        $forum = new Forum();
        $forumOne = $forum->where('id',$id)->first();
        $ftype = new Ftype();
                        
        $type = $ftype->getOptionType();
        return view('admin/forum/edit',['forumOne'=>$forumOne,'type'=>$type]);
    }
    
    //保存编辑
    public function editSave(Request $request,$id)
    {
        $forum = new Forum();
        $data = $forum->where('id',$id)->first();
        $data->subject = $request->subject;
        $data->content = $request->content;
        $data->typestr = $request->typestr;
        $suc = $data->save();
        $message = $suc? '修改成功':'修改失败';
        return redirect('admin/forum/oper')->with('message',$message);
    }
    
    //推荐的ajax
    public function recommended($id)
    {
        $forum = new Forum();
        $status = $forum->where('id',$id)->first();
        if($status->recommended == 0){
            $status->recommended = 1;
        }else{
            $status->recommended = 0;
        }
            $status->save();
            echo $status->recommended;
     }
    
}