<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Header form</title>
</head>
<body>
		
	<?php if(Session::has('success')): ?>
	<?php echo Session::get('success'); ?>

	<?php endif; ?>
	
	<?php echo Form::open(array('url' =>'header/post', 'files' => true )); ?>

		<input type="text" name="title" placeholder="Tile">
		<?php if($errors->has('title')): ?>

		<?php echo $errors->first('title'); ?>

		<?php endif; ?>
		<br>
		<input type="text" name="sub_title" placeholder="Sub Tile">
		<?php if($errors->has('sub_title')): ?>

		<?php echo $errors->first('sub_title'); ?>

		<?php endif; ?>
		<br>
		<input type="file" name="image" >
		<?php if($errors->has('image')): ?>

		<?php echo $errors->first('image'); ?>

		<?php endif; ?>
		<br>
		<input type="submit" value="Submit">
	<?php echo Form::close(); ?>

</body>
</html>