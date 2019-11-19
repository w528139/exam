<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table align="center" border="1" cellspacing="0">
		<tr>
			<td>id</td>
			<td>等级</td>
			<td>编辑</td>
			<td>删除</td>
		</tr>
		@foreach ($data as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td><a href="{{url('vip/lv/edit')}}?id={{$v->id}}">编辑</a></td>
			<td><a href="{{url('vip/lv/del')}}?id={{$v->id}}">删除</a></td>
		</tr>
		@endforeach
	</table>
	{{ $data->links() }}
</body>
</html>