<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style type="text/css" media="screen">
		img{
			max-height: 70px;
		}
	</style>
</head>
<body>
	@foreach($artesanos as $key => $artesano)
		<?php $persona = Persona::find($artesano); ?>
	<center>
		<h2>Instituto Oaxacaqueño <br> de las Artesanias</h2>
		<div >
			<img src="{{URL::to($persona->documentos()->where('nombre','=','Foto del artesano')->first()->ruta)}}" alt=""><br>
			{{$persona->nombre}} <br>
			Rama: <u>{{$persona->rama->nombre}}</u> <br>
			grupoetnico: <u>{{$persona->grupoetnico->nombre}}</u> <br>
			INE: <u>{{$persona->artesano->ine}}</u> <br>
			CUERP: <u>{{$persona->curp}}</u> <br>
			RFC: <u>{{$persona->artesano->rfc}}</u>
			<u> </u>
		</div>
	</center>
		<div style="height:50px;"></div>
		@if(($key+1)%3 == 0 && $key+1 < count($artesanos))
			<div style="page-break-after:always;"></div>
		@endif
	@endforeach
</body>
</html>