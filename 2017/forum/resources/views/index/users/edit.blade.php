@include('index.layouts.header')
<div class="hr tp-div-nexthr" style="margin-top: 0;margin-bottom: 0;padding: 0;"></div>
<div class="container pb-15">
<!-- Example row of columns -->
<div class="row">
    <div class="span12">
       
   
 <!--内容页面-->     
                        
  <div class="label-div b-30 border-all pt-5 t-20" style="position: relative; padding-left: 0;">
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
                <input type="submit" value="确认编辑">
                <a href="{{url('index/users/userinfo/' . session('usersid'))}}">返回上一级</a>
            </form>
        </div>

    </div>
    </div>
    </div>
</div>
@include('index/layouts/footer')