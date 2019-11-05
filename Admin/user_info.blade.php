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
	<h1 align="center">个人中心</h1>
	
	<form class="form" action="{{url('userinfo/change')}}" method="post" class="form-horizontal" role="form">
		{{csrf_field()}}
		<a href="{{url('repass')}}?id={{$info->id}}">重置密码</a>
		<input type="hidden" value="{{$info->id}}" name="id">
		<div class="form-group input">
			<label for="firstname" class="col-sm-2 control-label">用户名</label>
			<div class="col-sm-10">
			   <input type="text" class="form-control" value="{{$info->username}}" name="username" id="firstname" 
			      placeholder="请输入用户名">
			</div>
		</div>
		<div class="form-group input">
			<label for="firstname" class="col-sm-2 control-label">手机号</label>
			<div class="col-sm-10">
			   <input type="text" class="form-control" value="{{$info->tel}}" name="tel" id="firstname" 
			      placeholder="请输入用户名">
			</div>
		</div>
		<div class="form-group input">
			<label for="firstname" class="col-sm-2 control-label">真实姓名</label>
			<div class="col-sm-10">
			   <input type="text" class="form-control" value="{{$info->name}}" name="name" id="firstname" 
			      placeholder="请输入用户名">
			</div>
		</div>
		<div class="form-group input">
			<label for="firstname" class="col-sm-2 control-label">电子邮箱</label>
			<div class="col-sm-10">
			   <input type="text" class="form-control" value="{{$info->email}}" name="email" id="firstname" 
			      placeholder="请输入用户名">
			</div>
		</div>
		<div class="form-group input">
			<label for="firstname" class="col-sm-2 control-label">注册时间</label>
			<div class="col-sm-10">
				<p>{{$info->reg_time}}</p>
			</div>
		</div>
		<div class="form-group input">
			<button class="btn btn-primary">提交</button>
		</div>
	</form>
</body>
</html>