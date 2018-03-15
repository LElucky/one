@include('index/layouts/header')
@include('index/layouts/header_img')
 


<!--头部代码结束-->

  <div class="hr tp-div-nexthr" style="margin-top: 0;margin-bottom: 0;padding: 0;"></div>
  <div class="container pb-15">
  <!-- Example row of columns -->
  <div class="row">
    <div class="span12">
       
   
 {{--用户基本信息--}}                     
  <div id='user_info' class="label-div b-30 border-all pt-5 t-20" style="position: relative; padding-left: 0;display:block;"  >
     <div class="txmd">     
     
     
     <div  class="basic">
        您的基本资料
     </div>
     
     <div class="control-group">
                <label class="control-label" for="inputName">姓名
                    <p class="text-error"></p>
                </label>

                <div class="controls">
                    <span class="help-inline">{{$user['username']}}</span>
                </div>
                <div class="mmclear"></div>
                
            </div>
            
            
    
            
            
            <div class="control-group">
                <label class="control-label" for="inputPhone">昵称
                    <p class="text-error"></p>
                </label>

                <div class="controls">
                    <span class="help-inline">{{$user['nick_name']}}</span>
                </div>
                <div class="mmclear"></div>
            </div>
            
             
             

           <div class="control-group">
                <label class="control-label" for="avatarUpload">头像</label>

              <div class="controls">
                      <div id="avatarUpload">
                          <span class="help-inline"></span>
                      </div>
                      
                      <img id="users_image" src="{{asset('index/users_image')}}/{{$user['user_image']}}" alt="">
              </div>
              <div class="mmclear"></div>
          </div>




            
            <div class="control-group">
                <label class="control-label" for="inputPhone">性别:
                </label>

                <div class="controls">
                @if($user['sex'] == 0)
                  <p>女</p>
                @else
                  <p>男</p>  
                @endif 
                </div>
                <div class="mmclear"></div>
            </div>
            
            <div class="control-group ">
                <label class="control-label" for="inputRole">个性签名
                </label>
                <div class="controls">
                  <p>{{$user['signature']}}</p>
                </div>
                <div class="mmclear"></div>
              
            </div>    
  <div class="basic" style="border-top:0px solid #ccc; text-align:right; margin-left:15px; padding:10px 40px 20px 0px;">
     
      <input type="image" src="{{asset('index/images')}}/edit1.png" value="编辑" style="width:41px; height:41px;cursor:pointer;" disabled='disabled'/>
        <font style='font-size: 8px;'><a href="javascript:user_d();" class='  btn btn-info'>编辑</a></font>
      <div style=''></div>
    </div>
  </div>
</div>

<script>


</script>
      
  {{--用户编辑--}}                      
  <div id='user_edit' class="label-div b-30 border-all pt-5 t-20" style="position: relative; padding-left: 0;display:none; padding-bottom:100px;" >
     <div class="txmd">     
     <form action="{{url('index/users/store/' . session('usersid'))}}" method="post" enctype="multipart/form-data">
     <div  class="basic">
        您的基本资料
     </div>
     
     <div class="control-group">
                <label class="control-label" for="inputName">昵称:
                </label>

                <div class="controls">
                    <input id="inputName" type="text" name="nick_name" value="{{$user['nick_name']}}"
                           placeholder="" class="input-xlarge placeholder on" maxlength="10" rel="input-text"  >
                </div>
                <div class="mmclear"></div>
                
            </div>
            
            
       <div class="control-group">
                <label class="control-label" for="inputEmail">性别
                </label>

                <div class="controls">
                    <select name="sex" id="">
                        <option value="0">女</option>
                        <option value="1" @if($user['sex'] == 1) selected="selected" @endif>男</option>
                    </select>
                    <span class="help-inline"></span>
                </div>
                <div class="mmclear"></div>
            </div>
            
            
            <div class="control-group">
                <label class="control-label" for="inputPhone">个性签名:
                </label>

                <div class="controls">
                    <input type="text" name="signature" id="inputPhone" value="{{$user['signature']}}"
                           placeholder="" maxlength="30" rel="input-phone"
                           class="input-xlarge placeholder on" >
                    <span class="help-inline"></span>
                </div>
                <div class="mmclear"></div>
            </div>
            
            
            
                        <div class="control-group">
                <label class="control-label" for="avatarUpload">上传头像</label>

                <div class="controls">
                    <div id="avatarUpload">
                        <span class="help-inline"></span>
                    </div>
                    <input type="file" name="user_image" id="">
          <span class="help-block">
            请上传jpg/jpeg/png/gif格式文件，文件小于1MB
          </span>         
                </div>
                <div class="mmclear"></div>
            </div>
            {{csrf_field()}}
                <input type="submit" value="确认编辑" style='float:right; position:relative;bottom: -50px;' class='btn btn-primary'>
                <a href="javascript:user_d();" style='float:right;position:relative;bottom: -50px;' class='btn btn-info'>返回上一级</a>
            </form>
        </div>

    </div>       
      
        








      
      <!--右侧代码-->  
       <div  class='span4_self_userinfo'>  
            <div class="label-div t-20 border-all" class='userinfo_selfcss'>
        <div class="l-15">
                   <h3 class="label-title border-b b-15 small clearfix" style="padding-bottom: 16px;">关注咨询</h3>
                </div>
        <div class="label-main tody-hot l-15" >
          <ul>
            <li><a href="">标题标题标题标题标题标题题标题1</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题2</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标 标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标 标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
          </ul>
        </div>
      </div>
</div>

<!--右侧代码结束-->


<!-- /container -->

  <div class="container">
 
  <div class="hr"></div>
    
    </div>
  
<!-- /container -->

</div>
    
 
@include('index.layouts.footer')