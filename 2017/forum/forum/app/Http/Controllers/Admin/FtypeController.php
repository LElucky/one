<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Ftype;
use Ramsey\Uuid\Uuid;
use App\Careforum;
class FtypeController extends BaseController
{
    public function oper()
    {
        $ftype = new Ftype();
        $allFtype = $ftype->all();
        return view('admin/Ftype/oper',['allFtype'=>$allFtype]);
    }
    
    public function add()
    {
        $ftype = new Ftype();
        $type = $ftype->getFtypeOption();
        return view('admin/Ftype/add',['type'=>$type]);
    }
    
    public function save(Request $request)
    {
        $ftype = new Ftype();
        $typeInfo = $request->except('_token');
        $typeInfo['image'] = 'default.png';
        if($request->hasFile('image')){
            $image = $request->image;
            if($image->isValid()) {
                //生成文件名
                $newName = Uuid::uuid1()->toString();
                //获取后缀
                $suffix = $image->getClientOriginalExtension();
                $imgName = $newName . '.' . $suffix;
                $suc = $image->move(public_path('index/TypeImg'),$imgName);
                $typeInfo['image'] = $imgName;
            } 
        }
            
        
        
        $typeInfo['adminid'] = session('userid');
        $typeInfo['ctime']   = time();
        $suc = $ftype->create($typeInfo);
        $message = $suc? '添加成功':'添加失败';    
        return redirect('admin/ftype/add')->with('message',$message);
        
    }
    
    //删除分类
    public function delete($id)
    {
        $ftype = new Ftype();
        $status = $ftype->where('fid',$id)->first();
        $message = $status? '父级分类不可删除':'删除成功';
        if($status){
            return redirect()->back()->with('message',$message);
        }else{
            $ob = $ftype->where('id',$id)->first()->delete();
            if($ob){
                return redirect()->back()->with('message',$message);
            }
        }
    }
    
    

}