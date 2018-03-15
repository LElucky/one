<?php
namespace App\Http\Controllers\Index;
use App\Http\Controllers\Index\BaseController;
use Illuminate\Http\Request;
use App\Ftype;
use App\Forum;
use App\Forumimage;
use Ramsey\Uuid\Uuid;
use App\Likeforum;
use App\Forumcomment;

class ForumController extends BaseController
{
    //论坛分类页
    public function forum(){
        //分类
        $ftype = new Ftype();
        $typeData = $ftype->where('fid',0)->get();
        $typeson = $ftype->where('fid','<>',0)->get();
        $object1 =  json_decode( json_encode($typeData),true);
        $object2 =  json_decode( json_encode($typeson),true);
        
        //推荐吧
        $data1 = $ftype->orderBy('id','DESC')->paginate(2);
        //最新吧
        $data2 = $ftype->orderBy('id','DESC')->paginate(20);
        
        //热文章
        $forum = new Forum();
        $hotData = $forum->orderBy('readnum','DESC')->where('status',0)->paginate(6);
        
        //评论最多文章
        $forum = new Forum();
        $hot1 = $forum->orderBy('commentnum','DESC')->where('status',0)->paginate(5);

        
        return view('index.forum.forum',[
            'type'=>$object1,
            'typeson'=>$object2,
            'forum1'=>$data1,
            'forum2'=>$data2,
            'hotforum'=>$hotData,
            'hot1'=>$hot1
            
        ]);
    }
    

    
    //发帖
    public function issuc(){
       if(session('usersid')){
          return view('index.forum.issue');
        }else{
          return view('index.users.login');
        }
    }
    
    //保存内容 发帖->
    public function save(Request $request){
       //保存帖子内容
      $forum['type'] = $request->type;
      $forum['subject'] = $request->subject;
      $forum['content'] = $request->content;
      $forum['user_id'] = session('usersid');
      $forum['ctime'] = time();
      
      //贴吧贴子加一
      $ftype = new Ftype();
      $one = $ftype->where('id',$forum['type'])->first();
      $one->forumnum++;
      $f = $one->save();      
      $foru = new Forum();
      $suc = $foru->create($forum)->id;
      
      
      //图片的保存
      $forumimage = new Forumimage();
      if($request->hasFile('forumImg')){
          foreach($request->forumImg as $forumimg){
              if($forumimg->isValid()){
                  $newName = Uuid::uuid1()->toString();
                  //获取后缀
                  $suffix = $forumimg->getClientOriginalExtension();
                  $imgName = $newName . '.' . $suffix;
                  $forumimg->move(public_path('index/forumimg'),$imgName);
                  $fimg['forum_id'] = $suc;
                  $fimg['image'] = $imgName;
                  $forumimage->create($fimg);
              }
          }
      }
      if($suc && $f){
          return redirect()->back();
      }
    }
    
    
    //进吧
    public function postbar($type) {
        //当前吧
        $ftype = new Ftype();
        $ftype = $ftype->where('id',$type)->first();
    
        //属于当前吧的帖子
        $forum = new Forum();
        $forum = $forum->where('type',$ftype->id)->where('status',0)->get();
        
        
        return view('index/forum/postbar',['ftype'=>$ftype,'forum'=>$forum]);
    }
    
    
    //文章内容=
    public function container($id){
        //帖子信息
        $forum = new Forum();
        $data = $forum->where('id',$id)->first();
        $num = $data['readnum'] + 1;
        $data['readnum'] = $num;
        $data->where('id',$id)->update(['readnum'=>$num]);      
        
        //浏览量最热帖子
        $forum = new Forum();
        $hot = $forum->orderBy('readnum','DESC')->paginate(5);
        
        
    
         //贴吧信息
        $ftype = new Ftype();
        $ftype = $ftype->where('id',$data['type'])->first();
        
        //评论
        $forumcomment = new Forumcomment();
        $comment = $forumcomment->where('forumid',$data->id)->where('fid',0)->get();
        $commentsom = $forumcomment->where('forumid',$data->id)->where('fid','<>',0)->get();
        return view('index.forum.container',[
            'container'=>$data,
            'comment'=>$comment,
            'commentsom'=>$commentsom,
            'ftype'=>$ftype,
            'hot'=>$hot
        ]);
    }
    
    //收藏 
    public function like($forumid){
      //判断用户是否登录
      if(!session('usersid')){
          return 7;
      }else{
        //判断登录用户是否收藏
        $usersid = session('usersid');
        $likeforum = new Likeforum();
        $like = $likeforum->where('user_id',$usersid)->where('forum_id',$forumid)->first();

        
        if(!$like){
          //如果用户没有收藏过->
            //1.帖子表收藏++1
            $forum = new Forum();
            $like = $forum->where('id',$forumid)->first();
            $like->like++;
            $suc1 = $like->save();
            //2.收藏表添加资料
            $data['user_id']  = $usersid;
            $data['forum_id'] = $forumid;
            $suc2 = $likeforum->create($data);     
            if($suc1 && $suc2){
              //表示收藏成功
              return 1;  
            }else{
              //表示收藏失败;
              return 4;
            }
            
        }else{
            //如果用户收藏了 就取消收藏
            $forum = new Forum();
            $status = $forum->where('id',$forumid)->first();
            $f =$status->like--;
            $status->save();
            $dele = $like->delete();
            if($f && $dele){
              return 0;  
            }
        }
    }
  } 
  
  //个人中心的软删除帖子
  public function delete($id) {
      $forum = new Forum();
      $status = $forum->where('id',$id)->update(['status' => 1]);
      if($status){
          return 1;
      }else{
          return 0;
      }
      
      
  }
    
}