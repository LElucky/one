<?php
namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Forumcomment;
use App\Forum;
class ForumcommentController extends Controller
{
    
    //涓�绾ц瘎璁烘坊鍔�
    public function save(Request $request) {
        $comment['content'] = $request->content;
        $comment['userid']  = session('usersid');
        $comment['forumid'] = $request->forumid;
        $comment['ctime']   = time();
        $forumcomment = new Forumcomment();
        $forum = new Forum();
        $data = $forum->where('id',$comment['forumid'])->first();
        $data->commentnum++;
          $data->save();
        if($forumcomment->create($comment)){
            return redirect()->back();
        };
    }
    
    
    
    //ajax浜岀骇璇勮鐨勬坊鍔�
    public function savesom1(Request $request) {
        $comment['to_userid'] = $request->to_userid;
        $comment['fid']     = $request->fid;
        $comment['content'] = $request->content;
        $comment['userid']  = session('usersid');
        $comment['forumid'] = $request->forumid;
        $comment['ctime']   = time();
        $forumcomment = new Forumcomment();
        $forum = new Forum();
        $data = $forum->where('id',$comment['forumid'])->first();
        $data->commentnum++;
        $data->save();
        if($forumcomment->create($comment)){
            return redirect()->back();
        };
    }

    
    //鍝佽鐨勫垹闄�
    public function deletecomment()
    {   
        $id = $_GET['id'];
        $forumid = $_GET['forumid'];
        $forum = new Forum();
        $suc = $forum->where('id',$forumid)->first();
        $suc->commentnum--;
        $status1 = $suc->save();
        $comment = new Forumcomment();
        $suc = $comment->where('id',$id)->delete();
        if($status1 && $suc){
            return 1;    
        }else{
            return 0;
        }
    
    }
    
    
    
    
    
  
//  ajax 娣诲姞浜岀骇璇勮
    public function savesom(Request $request) {
        $comment['to_userid'] = $_POST['to_userid'];
        $comment['fid']     = $_POST['fid'];
        $comment['content'] = $_POST['content'];
        $comment['userid']  = session('usersid');
        $comment['forumid'] = $_POST['forumid'];
        $comment['ctime']   = time();
        $forumcomment = new Forumcomment();
        $forum = new Forum();
        $data = $forum->where('id',$comment['forumid'])->first();
        $data->commentnum++;
        $data->save();
        $id = $forumcomment->create($comment)->fid;
        if($id){
            return $id;
        };
    }
    
    
    
    
    
}