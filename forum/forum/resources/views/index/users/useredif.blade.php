@include('index/layouts/header')
@include('index/layouts/header_img')
 


<!--头部代码结束-->

 	<div class="hr tp-div-nexthr" style="margin-top: 0;margin-bottom: 0;padding: 0;"></div>
	<div class="container pb-15">
	<!-- Example row of columns -->
	<div class="row">
		<div class="span12">
       
   
 <!--内容页面-->     
                        
  <div class="label-div b-30 border-all pt-5 t-20" style="position: relative; padding-left: 0;">
     <div class="txmd">     
     
     <h4 class="mmh4">提交项目基本信息</h4>
     <h6 class="mmh6">平均用时3分钟，您的项目即可以被收录到数据库中</h6>
     
     <form action="###" method="post">
     <div  class="basic">
        您的基本资料
     </div>
     
     <div class="control-group">
                <label class="control-label" for="inputName">姓名
                    <p class="text-error">必填项</p>
                </label>

                <div class="controls">
                    <input id="inputName" type="text" name="username" value=""
                           placeholder="请填写真实姓名" class="input-xlarge placeholder on" maxlength="10" rel="input-text"  >
                    <span class="help-inline">请填写真实姓名</span>
                </div>
                <div class="mmclear"></div>
                
            </div>
            
            
       <div class="control-group">
                <label class="control-label" for="inputEmail">E-mail
                    <p class="text-error">必填项</p>
                </label>

                <div class="controls">
                    <input id="inputEmail" type="text" placeholder="邮箱格式不正确" value=""
                           class="input-xlarge placeholder on" rel="input-email" >
                    <span class="help-inline"></span>
                </div>
                <div class="mmclear"></div>
            </div>
            
            
            <div class="control-group">
                <label class="control-label" for="inputPhone">电话
                    <p class="text-error">必填项</p>
                </label>

                <div class="controls">
                    <input type="text" id="inputPhone" value=""
                           placeholder="请填写真实手机号，我们会联系您确认信息" maxlength="30" rel="input-phone"
                           class="input-xlarge placeholder on" >
                    <span class="help-inline"></span>
                </div>
                <div class="mmclear"></div>
            </div>
            
             
             
            
            <div class="control-group ">
                <label class="control-label" for="inputRole">职务
                    <p class="text-error">必填项</p>
                </label>
                <div class="controls">
                    <input id="inputRole" type="text" name="userrole" value="" placeholder="创始团队成员或高管才能创建项目"
                           class="input-xlarge placeholder on" maxlength="10" rel="input-text">
                    <span class="help-inline"></span>
                </div>
                <div class="mmclear"></div>
            </div>
            
            
                        <div class="control-group">
                <label class="control-label" for="avatarUpload">上传头像<p class="text-error">必填项</p></label>

                <div class="controls">
                    <div id="avatarUpload">
                        <img src="{{asset('index/images')}}/uphoto.jpg" rel="img-target-avatar"
                             data-value="0" data-check="eb1ae6331b63d1ad95006586c4add55b"
                             class="active img-target img-on">
                        <span class="help-inline"></span>
                    </div>
                    
                    <button type="button" modal-target="#img-modal" rel="ajax-upload-avatar" class="btn btn-primary uploadphoto" onclick="uphoto()">
                        上传头像
                    </button>
                    <input type="file" id="uphototx" value="update"  style="display:none;"/>
          <span class="help-block">
            请上传jpg/jpeg/png/gif格式文件，文件小于1MB
          </span>         
                </div>
                <div class="mmclear"></div>
            </div>
            
      
      
      
  <div class="basic" style="border-top:0px solid #ccc; text-align:right; margin-left:15px; padding:10px 40px 20px 0px;">
     
      <input type="image" src="{{asset('index/images')}}/blutbottom.jpg" value="" style="width:81px; height:46px;"/>
      <div style='height:20px;'></div>
    </div>
   </form>

</div>
  
 


</div>
 





        
      
      <!--右侧代码-->  
       <div  class='span4_self_userinfo'>
			
        
            
            <div class="label-div t-20 border-all" class='userinfo_selfcss'>
				<div class="l-15">
               		 <h3 class="label-title border-b b-15 small clearfix" style="padding-bottom: 14px;">关注咨询</h3>
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
					</ul>
				</div>
			</div>
            
                         <div class="label-div t-20 border-all">
        <div class="l-15">
                   <h3 class="label-title border-b b-15 small clearfix" style="padding-bottom: 14px;">最多评论</h3>
                </div>
        <div class="label-main tody-hot l-15" >
          <ul>
            <li><a href="">标题标题标题标题标题标题题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标 标题</a></li>
                      <li><a href="">标题标题标题标题标题标题标题标题</a></li>
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