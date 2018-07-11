<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Forumimage extends Model
{
    protected $table = 'forumimage';
    public $timestamps = false;
    protected $fillable = ['forum_id','image'];
}