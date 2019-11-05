<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
	<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<style>
		.form{
			width: 500px;
			margin:0 auto;
		}
		.input{
			height: 50px;
		}
	</style>
</head>
<body>
	<h1 align="center">登录</h1>
	<form class="form" action="{{url('login/do')}}" method="post" class="form-horizontal" role="form">
		{{csrf_field()}}
		<div class="form-group input">
			<label for="firstname" class="col-sm-2 control-label">用户名</label>
			<div class="col-sm-10">
			   <input type="text" class="form-control" name="username" id="firstname" 
			      placeholder="请输入用户名">
			</div>
		</div>
		<div class="form-group input">
			<label for="firstname" class="col-sm-2 control-label">密码</label>
			<div class="col-sm-10">
			   <input type="password" class="form-control" name="password" id="firstname" 
			      placeholder="请输入密码">
			</div>
		</div>
		<div class="form-group input">
			<button class="btn btn-primary">提交</button>
		</div>
	</form>
</body>
</html>