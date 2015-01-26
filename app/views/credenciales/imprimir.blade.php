<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	@foreach($artesanos as $artesano)
		<h2>IOA</h2>
		<div style="text-alignt:center">
			{{$artesano}} <br>
			Nombre del artesano <br>
			rama <br>
			grupo etnico <br>
			ine <br>
			curp <br>
			rfc
		</div>
	@endforeach
</body>
</html>