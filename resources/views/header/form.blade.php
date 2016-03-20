<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Header form</title>
</head>
<body>
		
	@if(Session::has('success'))
	{!! Session::get('success')!!}
	@endif
	
	{!!Form::open(array('url' =>'header/post', 'files' => true )) !!}
		<input type="text" name="title" placeholder="Tile">
		@if($errors->has('title'))

		{!!$errors->first('title')!!}
		@endif
		<br>
		<input type="text" name="sub_title" placeholder="Sub Tile">
		@if($errors->has('sub_title'))

		{!!$errors->first('sub_title')!!}
		@endif
		<br>
		<input type="file" name="image" >
		@if($errors->has('image'))

		{!!$errors->first('image')!!}
		@endif
		<br>
		<input type="submit" value="Submit">
	{!!Form::close()!!}
</body>
</html>