<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 后台
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){
    Route::get('index','IndexController@index');
    
    // 登录&注册
    Route::group(['prefix' => 'ausers'],function(){
        Route::get('login','AusersController@login');
        Route::post('doLogin','AusersController@doLogin');
        Route::get('logout','AusersController@logout');
        Route::get('register','AusersController@register');
        Route::post('doRegister','AusersController@doRegister');        
    });
    
    // 论坛
            Route::group(['prefix' => 'forum'],function(){
                Route::get('oper','ForumController@oper');
                Route::get('add','ForumController@add');
                Route::post('save','ForumController@save');
                Route::get('delete/{id}','ForumController@delete');
                Route::get('edit/{id}','ForumController@edit');
                Route::post('editSave/{id}','ForumController@editSave');
                Route::get('recommended/{id}','ForumController@recommended');
            });
    
    // 问答
    Route::group(['prefix' => 'question'],function(){
        Route::get('oper','QuestionController@oper');
        Route::get('add','QuestionController@add');
        Route::post('save','QuestionController@save');
        Route::get('detail/{id}','QuestionController@detail');
        Route::get('audit','QuestionController@audit');
        Route::get('error/{id}','QuestionController@error');
        Route::get('correct/{id}','QuestionController@correct');
    });
    
    // 问答分类
    Route::group(['prefix' => 'qtype'],function(){
        Route::get('oper','QtypeController@oper');
        Route::get('add','QtypeController@add');
        Route::post('save','QtypeController@save');
    });
    
    
        //论坛分类
        Route::group(['prefix'=>'ftype'],function(){
            Route::get('oper','FtypeController@oper');
            Route::get('add','FtypeController@add');
            Route::post('save','FtypeController@save');
            Route::get('delete/{id}','FtypeController@delete');
        });
    
    
    
    
});


// 前台
Route::get('/', 'IndexController@index');

Route::get('nice/{id}','IndexController@nice');
Route::get('bad/{id}','IndexController@bad');

Route::group(['prefix' => 'index','namespace'=>'Index'] ,function(){
    
    Route::get("captcha","CodeController@captcha");
    
    // 登录
    Route::group(['prefix'=>'users'],function(){
        Route::get('captchaValid/{captcha}','UsersController@captchaValid');
        Route::get('login','UsersController@login');
        Route::post('loginInfo','UsersController@loginInfo');        
        Route::get('logout','UsersController@logout');
        Route::get('center/{id}', 'UsersController@center');
        Route::get('forumcenter/{id}', 'UsersController@forumcenter');
        Route::get('userinfo/{id}','UsersController@userinfo');
        Route::get('edit/{id}','UsersController@edit');
        Route::post('store/{id}','UsersController@store');
        Route::get('register','UsersController@register');
        Route::post('save','UsersController@save');
        Route::get('confirmation_password/{password?}','UsersController@confirmation_password');
        Route::get('confirmation_username/{username}','UsersController@confirmation_username');
    });
    
    
        //论坛模块
        Route::group(['prefix'=>'forum'],function(){
            Route::get('help','ForumController@help');
            Route::get('forum','ForumController@forum');
            Route::get('container/{id}','ForumController@container');
            Route::get('issuc','ForumController@issuc');
            Route::post('save','ForumController@save');
            Route::get('delete/{id}','ForumController@delete');
           
            Route::get('postbar/{id}','ForumController@postbar');
            Route::get('like/{id}','ForumController@like');
        });
    
        
        Route::group(['prefix'=>'careforum'],function(){
            Route::get('carenum/{id}','CareforumController@carenum');
        });
    
        //forum评论模块
        Route::group(['prefix'=>'forumcomment'],function(){
            Route::post('save','ForumcommentController@save');
            Route::post('savesom','ForumcommentController@savesom');
            Route::get('deletecomment/{id?}','ForumcommentController@deletecomment');
        });
    
        
    // 话题
    Route::group(['prefix' => 'question'],function(){
        Route::get('index','QuestionController@index'); 
        Route::get('issue','QuestionController@issue');
        Route::post('store/{id}','QuestionController@store');
        Route::get('container/{id}','QuestionController@container');
        Route::get('add','QuestionController@add');
        Route::get('replayDetail/{id}', 'QuestionController@replayDetail');
        Route::get('replayReplay/{id}', 'QuestionController@replayReplay');
        Route::get('replayContent/{id}','QuestionController@replayContent');
        Route::post('doReplay/{id}', 'QuestionController@doReplay');
        Route::post('doReplayRe/{id}', 'QuestionController@doReplayRe');
        Route::get('collection/{id}','QuestionController@collection');
    });    Route::group(['prefix' => 'question'],function(){
        Route::get('index','QuestionController@index'); 
        Route::get('issue','QuestionController@issue');
        Route::post('store/{id}','QuestionController@store');
        Route::get('container/{id}','QuestionController@container');
        Route::get('add','QuestionController@add');
        Route::get('replayDetail/{id}', 'QuestionController@replayDetail');
        Route::get('replayReplay/{id}', 'QuestionController@replayReplay');
        Route::get('replayContent/{id}','QuestionController@replayContent');
        Route::post('doReplay/{id}', 'QuestionController@doReplay');
        Route::post('doReplayRe/{id}', 'QuestionController@doReplayRe');
        Route::get('collection/{id}','QuestionController@collection');
    });
});