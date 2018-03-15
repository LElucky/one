<?php
namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;
use App\Careforum;
use App\Ftype;
class CareforumController extends Controller
{
    //用户点击关注
    public function carenum($id) {
        if(session('usersid')){
            //如果 用户已经关注 就显示已经关注
            $care = new Careforum();
            $userid = session('usersid');
            $status = $care->where('user_id',$userid)->where('ftype_id',$id)->first();
            if(empty($status)){
                //ftype 贴吧关注人数加一
                $ftype = new Ftype();
                $type = $ftype->where('id',$id)->first();
                $type->carenum++;

                $suc = $type->save();
                //如果没有关注 就运行关注
                $careforum = new Careforum();
                $data['ftype_id'] = $id;
                $data['user_id']  = session('usersid');
                $care = $careforum->create($data);
                if($care && $suc){
                    //1代表关注成功
                    return 1;
                }else {
                    //0代表关注失败
                    return 0;
                }                
            }else{
                $a = $status->delete();
                $ftype = new Ftype();
                $type = $ftype->where('id',$id)->first();
                $type->carenum--;
                $suc = $type->save();
                    if($a && $suc){
                        //3取消关注成功
                        return 3;
                    }
            }
        }else{
            // 代表用户还没有登录
            return 2;
        }
    }
}