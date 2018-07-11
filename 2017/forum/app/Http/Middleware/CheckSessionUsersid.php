<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use App\Users;

class CheckSessionUsersid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has('usersname') || !Session::has('usersid')) {
            if (Cookie::has('username') && Cookie::has('password')) {
                $model = new Users;
                $username = $request->cookie('username');
                $password = $request->cookie('password');
                $users = $model->where('username', $username)->where('password', $password)->first();
                if ($users) {
                    session([
                        'usersid'    => $users->id,
                        'usersname'  => $users->username,
                        'nick_name'  => $users->nick_name,
                        'signature'  => $users->signature,
                        'user_image' => $users->user_image
                    ]);
                    Cookie::queue('username', $users->username, 24*60);
                    Cookie::queue('password', $users->password, 24*60);
                }
            }
        }
        
        return $next($request);
    }
}
