<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Http\Middleware\TrimStrings;
class Ftype extends Model
{
    protected $table = 'ftype';
    public $timestamps = false;
    protected $fillable = ['typename','fid','ctime','adminid','image'];
    
    
    //option 样式的 下拉选择框 
    public function getFtypeOption($fid = 0,$num = 0){
        $data = $this->where('fid',$fid)->get();
        $str = '';
        $strtwo = '';
        $repeat = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$num);
        $num++;
        foreach($data as $key => $value){
            $str.= "<option value='$value->id'>$repeat$value->typename.</option>";
            $strtwo = $this->getFtypeOption($value->id,$num);
        $str = $str.$strtwo;
        }
        return $str;
    }
    
    
    
    
    //option >a>b>c>d样式的 下拉选择框
    function getOptionType($fid = 0, $num = 0,$fstr = ''){
        $cols = $this->where('fid',$fid)->get();
        $str = '';
        $repeat = str_repeat('---',$num);
        $num++;
        foreach($cols as $data){
            $newIdStr = $fstr. '>' . $data->id;
            $str.="<option value='{$newIdStr}'>{$repeat}{$data->typename}</option>";
            $html = $this->getOptionType($data->id,$num,$newIdStr);
            $str.=$html;
        }
        return $str;
    }
    

    //进入贴吧后判读是否关注了本吧
    function care($typeid){
        $care = new Careforum();
        $userid = session('usersid');
        $suc = $care->where('user_id',$userid)->where('ftype_id',$typeid)->first();
        if($suc){
            return 1;
        }else {
            return false;
        }
    }
    
    //根据ftypeid  找目录
    function getFtypeParent($ftypefid){
        $ftype = new Ftype();
        $parent = $ftype->where('id',$ftypefid)->first();
        return $parent->typename;
    }
    
    
    
}