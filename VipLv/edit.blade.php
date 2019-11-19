<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.wrapper{
			width: 400px;
			margin:0 auto;
		}
		.btn{
			width: 100px;
			height: 50px;
			border: none;
			background: #f32;
			border-radius: 5px;
			color:#fff;	
			font-size: 18px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<h1 align="center">会员等级修改</h1>
		<form action="{{url('vip/lv/edit')}}" method="post">
			<p>请输入会员等级:<input type="text" name="name"></p>
			<input type="hidden" name="id" value="{{$id}}">
			<button class="btn">提交</button>
		</form>
	</div>
</body>
</html>