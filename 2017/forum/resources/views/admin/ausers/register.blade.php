
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<title>管理员注册</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link rel="shortcut icon" href="{{asset('admin')}}/ausers/favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{asset('admin')}}/ausers/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('admin')}}/ausers/css/animate.css">
	<link rel="stylesheet" href="{{asset('admin')}}/ausers/css/style.css">
	<!-- Modernizr JS -->
	
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					
					<!-- Start Sign In Form -->
					<form action="{{url('admin/ausers/doRegister')}}" method="post" class="fh5co-form animate-box" data-animate-effect="fadeIn">
						<h2>注册</h2>
						@if(count($errors)>0)
						<div class="form-group">
							<div class="alert alert-success" role="alert">验证码错误</div>
						</div>
						@endif
						<div class="form-group">
							<label for="name" class="sr-only">Name</label>
							<input type="text" name="username" class="form-control" id="name" placeholder="管理名" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="密码" autocomplete="off">
						</div>
						<div class="form-group">
							<label for="re-password" class="sr-only">Re-type Password</label>
							<input type="password" name="repassword" class="form-control" id="re-password" placeholder="确认密码" autocomplete="off">
						</div>
						<div class="form-group">
							<p>已注册? <a href="{{url('admin/ausers/login')}}">登录</a></p>
						</div>
						<div class="form-group">
							{{csrf_field()}}
							<input type="submit" value="注册" class="btn btn-primary">
						</div>
					</form>
					<!-- END Sign In Form -->

				</div>
			</div>
		</div>
	</body>

	<script src="{{asset('admin')}}/ausers/js/modernizr-2.6.2.min.js"></script>
	<script src="{{asset('admin')}}/ausers/js/jquery.min.js"></script>
	<script src="{{asset('admin')}}/ausers/js/bootstrap.min.js"></script>
	<script src="{{asset('admin')}}/ausers/js/jquery.placeholder.min.js"></script>
	<script src="{{asset('admin')}}/ausers/js/jquery.waypoints.min.js"></script>
	<script src="{{asset('admin')}}/ausers/js/main.js"></script>

</html>

