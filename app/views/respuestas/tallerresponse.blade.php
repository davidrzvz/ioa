@extends('layouts.baseartesanos')
	@section('titulo')REGISTRO
	@endsection

		@section('contenido')
		<div class="container wellr col-sm-4 col-sm-offset-4" style="margin-top:50px;">

			


			<div class="col-sm-12">
				<div class="bg-orga col-md-12" style="text-align:center;">REGISTRO EXITOSO</div>

				<div class="col-md-12">
				
					<h3>
					<label class="elementos">Nombre del Taller: </label><br>
					<label id="nombretaller" class="label label-primary">{{$Taller['nombre']}}</label>
					</h3>

					<h3>
					<label class="elementos">Maestro: </label><br>
					<label id="maestro" class="label label-primary">{{$Taller['maestro']}}</label>
					</h3>

					<h3>
					<label class="elementos">Fecha de inicio: </label><br>
					<label id="fechainicio" class="label label-primary">{{$Taller['fechainicio']}}</label>
					</h3>

					<h3>
					<label class="elementos">Fecha de finalización: </label><br>
					<label id="fechafin" class="label label-primary">{{$Taller['fechafin']}}</label>
					</h3>

				</div>

			</div>
		</div>
		
		@endsection


@section('scripts')
@stop 