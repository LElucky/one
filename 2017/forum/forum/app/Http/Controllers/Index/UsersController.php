<?php
namespace App\Http\Controllers\Index;
use App\Users;
use App\Question;
use App\Comments;
use App\Collection;
use App\Concerns;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Forum;
use App\Careforum;
use App\Http\Controllers\Index\BaseController;
use App\Forumcomment;
use App\Ftype;
use App\Likeforum;

class UsersController extends BaseController
{
    //呈现登录页面
    public function login()
    {
        return view('index/users/login');
    }
    
    //用户登录
    public function loginInfo(Request $request)
    {
        if(strtolower($request->verify) != strtolower(session('code'))){
            return redirect()->back()->with('captcha','验证码异常');
        }else{
            $username = $request->Login['username'];
            $password = $request->Login['password'];
            $users = new Users();
            $valid = $users->where('username',$username)->where('password',$password)->first();
            if($valid){
                session([
                    'usersid'    => $valid->id,
                    'usersname'  => $valid->username,
                    'nick_name'  => $valid->nick_name,
                    'sex'        => $valid->sex,
                    'signature'  => $valid->signature,
                    'user_image' => $valid->user_image
                ]);
                if ($request->remember != '') {
                    Cookie::queue('username', $valid->username, 24*60);
                    Cookie::queue('password', $valid->password, 24*60);
                }
                return redirect('/');
            }else{
                return redirect()->back()->with('userinfo','账号或密码错误');
            }
        }
    }
    
    //用户退出 清空session
    public function logout(Request $request){
        $request->session()->flush();
        $cookie1 = Cookie::forget('username');
        $cookie2 = Cookie::forget('password');
        return redirect('/')->withCookie($cookie1)->withCookie($cookie2);
    }
    
    //呈现注册页面
    public function register()
    {
        return view('index/users/register');
    }
    
    //注册登录验证用户名
    public function confirmation_username($username)
    {
        $users = new Users();
        $valid = $users->where('username',$username)->first(); 
        if($valid){
            return 1;
        }else{
            return 0;
        }
        
    } 
    
    //验证码验证                
    public function captchaValid($captcha){
        if($captcha == strtolower(session('code'))){
            return 'OK';
        }else{
            return 'ON';
        }
    }
    
    //用户注册保存
    public function save(Request $request)
    {
        $userData = $request->get('UcenterMember');
        $userData['password'] = $userData['password1'];
        $users = new Users();
        $userStatus = $users->create($userData);
        $message = $userStatus? '注册成功':'注册失败';
        return redirect('index/users/login')->with('message',$message);
    }
     
    // 个人中心
    public function center($id)
    {
        $model1 = new Users;
        $user = $model1->where('id', $id)->first();
        
        $model2 = new Comments;
        $comments = $model2->where('user_id', $id)->orderBy('ctime', 'desc')->get();
        $total_comments = $model2->where('user_id', $id)->count();
        
        $model3 = new Question;
        $question = $model3->where('user_id', $id)->orderBy('ctime', 'desc')->get();
        $total_question = $model3->where('user_id', $id)->count();
        
        $model4 = new Collection;
        $collection = $model4->where('user_id', $id)->get();
        $total_collection = $model4->where('user_id', $id)->count();
        
        $model5 = new Concerns;
        $concernedIt = $model5->where('user_id', session('usersid'))->where('concerned_user_id', $id)->first();
        // 我关注的人
        $i_concerned = $model5->where('user_id', $id)->get();
        $total_i_concerned = $model5->where('user_id', $id)->count();
        
        // 关注我的人
        $concerned_me = $model5->where('concerned_user_id', $id)->get();
        $total_concerned_me = $model5->where('concerned_user_id', $id)->count();
        return view('index/users/center', [
            'user' => $user,
            'comments' => $comments,
            'total_comments' => $total_comments,
            'question' => $question,
            'total_question' => $total_question,
            'collection' => $collection,
            'total_collection' => $total_collection,
            'concernedIt' => $concernedIt,
            'i_concerned' => $i_concerned,
            'total_i_concerned' => $total_i_concerned,
            'concerned_me' => $concerned_me,
            'total_concerned_me' => $total_concerned_me
        ]);
    }
    
    // 用户信息页面
    public function userinfo($id)
    {   
        $model = new Users;
        $user = $model->where('id', $id)->first();
        return view('index/users/userinfo', ['user' => $user]);
    }
    
    // 编辑用户信息
    public function edit($id)
    {
        $model = new Users;
        $user = $model->where('id', $id)->first();
        return view('index/users/edit', ['user' => $user]);
    }
    
    // 保存用户信息
    public function store(Request $request, $id)
    {
        $data = $request->except('_token', 'user_image');
//         dd($data);
        if($request->hasFile('user_image')){
            $image = $request->user_image;
            if($image->isValid()){
                $newName = Uuid::uuid1()->toString();
                $suffix = $image->getClientOriginalExtension();
                $imageName = $newName . '.' . $suffix;
                $suc = $image->move(public_path('index/users_image'), $imageName);
                $data['user_image'] = $imageName;
                session(['user_image' => $data['user_image']]);
            }
        }
        
        $model = new Users;
        $re = $model->where('id', $id)->update($data);
        
        if ($re) {
            session([
                'nick_name' => $data['nick_name'],
                'sex'       => $data['sex'],
                'signature' => $data['signature']
            ]);
            
            return redirect('index/users/userinfo/' . $id);
        } else {
            dd('no');
        }
    }
    
    // 关注用户
    public function concernsIt(Request $request, $id)
    {
        $model = new Concerns;
        $concerned_user = $model->where('user_id', session('usersid'))->where('concerned_user_id', $id)->first();
        if ($concerned_user == '') {
            $data = [
                'user_id' => session('usersid'),
                'concerned_user_id' => $id
            ];
            $model->insert($data);
            echo "<span id='concernsIt' class='concerns_ok'>√已关注</span>";
        } else {
            $model->where('user_id', session('usersid'))->where('concerned_user_id', $id)->delete();
            if ($request->sex == '1') {
                echo "<span id='concernsIt' class='concerns_no'>+关注他</span>";
            } else {
                echo "<span id='concernsIt' class='concerns_no'>+关注她</span>";
            }
        }
    }
    
    
// 论坛个人中心
    public function forumcenter($id)
    {
        $model1 = new Users;
        $user = $model1->where('id', $id)->first();
        
        //帖子信息
        $model2 = new Forum();
        $forum = $model2->where('user_id',$id)->where('status',0)->get();
        //贴吧信息
        $model3 = new Careforum();
        $care = $model3->where('user_id',$id)->get();

        
        //我的收藏的帖子
        $model5 = new Likeforum();
        $likeforum = $model5->select('forum_id','user_id')->where('user_id',$id)->get();
        
        //我回复的帖子
        $model6 = new Forumcomment();
        $data = $model6->where('userid',$id)->get();
        $a = json_decode($data,true);
        $a = array_column($a,'forumid');
        $a = array_unique($a,SORT_REGULAR);
        
        
        
        
        
        return view('index/users/forumcenter',[
            'user' => $user,
            'forum'=> $forum,
            'ftype'=> $care,
             'likeforum'=>$likeforum,
            'commentmodel' => $model6,
            'forumid' => $a
        ]);
    } 
    
    
    
}
