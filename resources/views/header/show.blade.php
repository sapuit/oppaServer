<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Show image</title>
</head>
<body>
	
	<table border="1px">
		<tr>
			<th>Title</th>
			<th>Sub title</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
		<?php 

			foreach ($model as  $value) {
				# code...
			
		?>
		<tr>
			<td><?php echo $value->title; ?></td>
			<td><?php echo $value->sub_title; ?></td>
			<td><img src="<?php echo url('uploads/logo') ?>/<?php echo $value->image; ?>" 
			alt="" width="100px"></td>
			<td>Action</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>