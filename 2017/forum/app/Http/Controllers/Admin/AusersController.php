<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use App\Ausers;
class AusersController extends Controller
{
    // 登录
    public function login(Request $request)
    {
        // 如果Cookie里没有用户名和密码
        if(!Cookie::has('username') && !Cookie::has('password')){
            return response()->view('admin/ausers/login');
        }else{
            // 如果有,判断cookie里的用户名密码是否和数据库里一致
            $model = new Ausers;
            $username = $request->cookie('username');
            $password = $request->cookie('password');
            $user = $model->where('username',$username)->where('password',$password)->first();
            // 如果一致
            if($user){
                session(['username' => $user->username,'userid' => $user->id]);
                Cookie::queue('username',$user->username,24*60);
                Cookie::queue('password',$user->password,24*60);                
                return redirect('admin/index');
            }else{
                // 不一致
                return response()->view('admin/ausers/login');
            }
        }
    }
    
    // 运行登录
    public function doLogin(Request $request)
    {
        // 判断用户名密码与数据库中是否一致
        $username = $request->username;
        $password = $request->password;
        $model = new Ausers;
        $user = $model->where('username',$username)->where('password',$password)->first();
        // 如果一致
        if($user){
            session(['username' => $user->username,'userid' => $user->id]);
            // 如果勾选了"记住我"选项
            if($request->remember != ''){
                Cookie::queue('username',$user->username,24*60);
                Cookie::queue('password',$user->password,24*60);
                return redirect('admin/index');
            }
            return redirect('admin/index');
        }else{
            // 不一致
            return redirect('admin/ausers/login');
        }
        
    }

    // 退出登录
    public function logout(Request $request)
    {
        //清除session和cookie
        $request->session()->flush();
        $cookie1 = Cookie::forget('username');
        $cookie2 = Cookie::forget('password');
        return redirect('admin/ausers/login')->withCookie($cookie1)->withCookie($cookie2);
    }
    
    
    // 注册
    public function register()
    {
        return view('admin/ausers/register');
    }
    
    // 运行注册
    public function doRegister(Request $request)
    {
        $data = $request->except('_token');
        
        // 如果两次密码不一致
        if($data['password'] != $data['repassword']){
            return redirect()->back();
        }
        
        // 存数据
        $data1 = [
            'username' => $data['username'],
            'password' => $data['password']
        ];
        $model = new Ausers;
        $suc = $model->insert($data1);
        $re = $suc ? '注册成功' . "<a href=" . url('admin/ausers/login') . ">返回</a>" 
            : '注册失败' . "<a href=" . url('admin/ausers/register') . ">返回</a>";
        return $re;
        
    }
}
