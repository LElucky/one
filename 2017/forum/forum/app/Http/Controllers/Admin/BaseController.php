<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        return $this->middleware('checklogin');
    }
}