<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qtype extends Model
{
    protected $table = "qtype";
    public $timestamps = false;
    
    public function getTypeOper($fid = 0)
    {
        static $arr = [];
        static $n = 0;
        $rowset = $this->where('fid',$fid)->get();
        foreach($rowset as $row){
            $row['space'] = $n;
            $arr[] = $row;
            $n++;
            $func = __FUNCTION__;
            $this->$func($row['id']);
            $n--;
        }
        return $arr;
    }
}
