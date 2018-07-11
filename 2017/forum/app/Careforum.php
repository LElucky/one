<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Ftype;

class Careforum extends Model
{
    protected $table = 'careforum';
    protected $fillable = ['user_id','ftype_id'];
    public $timestamps = false;  
    
    //ftype_id 获取typename
    public function getTypeName($ftypeid)
    {
        $ftype = new Ftype();
        $data = $ftype->where('id',$ftypeid)->get();
        $num = $data->count();
        $data = json_decode($data,true);
        $data = array_column($data,'typename');
        if($num != 0){
            return $data[0];
        }else{
            return '您还没有任何关注';
        }
    }
    
    //获取关注人数
    public function getFtypeCare($forumid){
        $ftype = new Ftype();
        $num = $ftype->where('id',$forumid)->first();
        return $num->carenum;
    }
    
    
    
    //根据ftypeid 获取头像
    public function getftypeimg($ftypeid) {
         $ftype = new Ftype();
        $num = $ftype->where('id',$ftypeid)->first();
        return $num->image;
    }
}