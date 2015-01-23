
@extends('layouts.baseartesanos')
    @section('titulo') IOA-Padrón
    @endsection 

@section('contenido')
	<div class="container wellr">
		<form class="form-horizontal" role="form" method="POST">
				<div class="col-md-12">
				
						
						<div class="bg-orga col-md-12">COMITÉ</div>
						

					<div class="col-md-12">
						<div class="col-md-1">
							{{ Form::label('id', 'ARTESANO') }}
							{{ Form::text('artesano1', null, array('placeholder' => 'ID','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nombre', ' ') }}
							{{ Form::text('artesano1', null, array('placeholder' => 'Nombre(s)','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano1', null, array('placeholder' => 'Apellido Paterno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano1', null, array('placeholder' => 'Apellido Materno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nace', 'FECHA NAC') }}
							{{ Form::text('artesano1', null, array('class' => 'form-control')) }}
						</div>
						<div class="col-md-1"><br>
							<button type="button" class="btn btn-success">
								Buscar</button>
						</div>
						<div class="col-md-2">
							{{ Form::label('cargo', 'CARGO') }} 
							{{Form::select('cargo1', array('1' => 'Presidente',), null, array('class' =>'form-control'))}}<br>
						</div>
					</div>

					<div class="col-md-12">
						<div class="col-md-1">
							{{ Form::label('id', 'ARTESANO') }}
							{{ Form::text('artesano2', null, array('placeholder' => 'ID','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nombre', ' ') }}
							{{ Form::text('artesano2', null, array('placeholder' => 'Nombre(s)','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano2', null, array('placeholder' => 'Apellido Paterno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano2', null, array('placeholder' => 'Apellido Materno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nace', 'FECHA NAC') }}
							{{ Form::text('artesano2', null, array('class' => 'form-control')) }}
						</div>
						<div class="col-md-1"><br>
							<button type="button" class="btn btn-success">
								Buscar</button>
						</div>
						<div class="col-md-2">
							{{ Form::label('cargo', 'CARGO') }} 
							{{Form::select('cargo2', array('1' => 'Secretario',), null, array('class' =>'form-control'))}}<br>
						</div>
					</div>

					<div class="col-md-12">
						<div class="col-md-1">
							{{ Form::label('id', 'ARTESANO') }}
							{{ Form::text('artesano3', null, array('placeholder' => 'ID','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nombre', ' ') }}
							{{ Form::text('artesano3', null, array('placeholder' => 'Nombre(s)','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano3', null, array('placeholder' => 'Apellido Paterno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano3', null, array('placeholder' => 'Apellido Materno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nace', 'FECHA NAC') }}
							{{ Form::text('artesano3', null, array('class' => 'form-control')) }}
						</div>
						<div class="col-md-1"><br>
							<button type="button" class="btn btn-success">
								Buscar</button>
						</div>
						<div class="col-md-2">
							{{ Form::label('cargo', 'CARGO') }} 
							{{Form::select('cargo3', array('1' => 'Tesorero',), null, array('class' =>'form-control'))}}<br>
						</div>
					</div>

					<div class="col-md-12">
						<div class="col-md-1">
							{{ Form::label('id', 'ARTESANO') }}
							{{ Form::text('artesano4', null, array('placeholder' => 'ID','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nombre', ' ') }}
							{{ Form::text('artesano4', null, array('placeholder' => 'Nombre(s)','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano4', null, array('placeholder' => 'Apellido Paterno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano4', null, array('placeholder' => 'Apellido Materno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nace', 'FECHA NAC') }}
							{{ Form::text('artesano4', null, array('class' => 'form-control')) }}
						</div>
						<div class="col-md-1"><br>
							<button type="button" class="btn btn-success">
								Buscar</button>
						</div>
						<div class="col-md-2">
							{{ Form::label('cargo', 'CARGO') }} 
							{{Form::select('cargo4', array('1' => 'Vocal de control y vigilancia',), null, array('class' =>'form-control'))}}<br>
						</div>
					</div>
						
					<div class="col-md-12">
						<div class="col-md-1">
							{{ Form::label('id', 'ARTESANO') }}
							{{ Form::text('artesano5', null, array('placeholder' => 'ID','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nombre', ' ') }}
							{{ Form::text('artesano5', null, array('placeholder' => 'Nombre(s)','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano5', null, array('placeholder' => 'Apellido Paterno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano5', null, array('placeholder' => 'Apellido Materno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nace', 'FECHA NAC') }}
							{{ Form::text('artesano5', null, array('class' => 'form-control')) }}
						</div>
						<div class="col-md-1"><br>
							<button type="button" class="btn btn-success">
								Buscar</button>
						</div>
						<div class="col-md-2">
							{{ Form::label('cargo', 'CARGO') }} 
							{{Form::select('cargo5', array('1' => 'Vocal 1',), null, array('class' =>'form-control'))}}<br>
						</div>
					</div>

					<div class="col-md-12">
						<div class="col-md-1">
							{{ Form::label('id', 'ARTESANO') }}
							{{ Form::text('artesano6', null, array('placeholder' => 'ID','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nombre', ' ') }}
							{{ Form::text('artesano6', null, array('placeholder' => 'Nombre(s)','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano6', null, array('placeholder' => 'Apellido Paterno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('ap1', ' ') }}
							{{ Form::text('artesano6', null, array('placeholder' => 'Apellido Materno','class' => 'form-control')) }}
						</div>
						<div class="col-md-2">
							{{ Form::label('nace', 'FECHA NAC') }}
							{{ Form::text('artesano6', null, array('class' => 'form-control')) }}
						</div>
						<div class="col-md-1"><br>
							<button type="button" class="btn btn-success">
								Buscar</button>
						</div>
						<div class="col-md-2">
							{{ Form::label('cargo', 'CARGO') }} 
							{{Form::select('cargo6', array('1' => 'Vocal 2',), null, array('class' =>'form-control'))}}<br>
						</div>
					</div>
						
						
					</div>
				
				<div class="col-md-12">
					<button type="submit" class="btn btn-ioa btn-lg pull-right">
						 Registrar 
						<span class="glyphicon glyphicon-pencil"></span>
						<span class="glyphicon glyphicon-ok"></span></button>
				</div>
			</div>
		</form>
	</div>
@stop

@section('scripts')

@stop