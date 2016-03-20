<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<table border="1px">
		<tr>
			<th>Tên</th>
			<th>Số điện thoại</th>
			<th>Địa chỉ</th>
			<th>Email</th>
			<th>Tình trạng</th>
			<th>Tổng cộng hóa đơn</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
		
		<?php foreach ($model as $value) {
	
		?>
			<tr>
				<td>{{ $value->name }}</td>
				<td>{{ $value->phone }}</td>
				<td>{{ $value->addr}}</td>
				<td>{{ $value->email}}</td>
				<td>{{ $value->status}}</td>
				<td>{{ $value->total}}</td>
				<td><image src="{{url('uploads/prescription')}}/{{ $value->image }}" 
				width="100px"/></td>
				<td>
					<link rel="stylesheet" href="" title="Update">
					<link rel="stylesheet" href="" title="Delete">
					</td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>