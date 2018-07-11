<?php
namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        return $this->middleware('checksessionusersid');
    }
}
