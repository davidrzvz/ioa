@extends('layouts.baseartesanos')
	@section('titulo')ELIMINAR EVENTOS
	@endsection

		@section('contenido')
		<div class="container wellr"> 
			<div class="col-sm-12 bg-titulo">ELIMINAR EVENTOS</div>
		
			<div class="col-sm-6 col-md-offset-3 wellr">

				<div class="col-sm-12">
					<div class="btn-group btn-group-justified" role="group">
					<div class="btn-group" role="group">
					    <button id="btnferias" type="button" class="btn btn-xs btn-ioa">FERIAS</button>
					</div>
					<div class="btn-group" role="group">
						<button id="btnconcursos" type="button" class="btn btn-xs btn-ioa">CONCURSOS</button>
					</div>
					<div class="btn-group" role="group">
					    <button id="btntalleres" type="button" class="btn btn-xs btn-ioa">TALLERES</button>
					</div>
					</div>
				</div>
			</div>
		
		
		
			


		<div class="col-sm-6">
			
			<div class="pull-left col-md-10 hidden" id="concursos">	
				<table id='concs'class="table table-hover table-first-column-number data-table display full">
					<thead>
					<tr>
					<th><i class="fa fa-sort-desc"></i></th>
					<th>Nombre del concurso <i class="fa fa-sort-desc"></i></th>
					<th>Acciones</th>
					</tr>
					</thead>
					<tbody>
						@if(isset($concursos))
    						@foreach($concursos as $concurso)
    				<tr>
    				<td>{{ $concurso->id }}</td>
    				<td>{{ $concurso->nombre }}</td>
    				<td>
                        <button type="button" class="btn btn-danger btn-xs delete" title="{{$concurso->nombre}}" onclick="eliminar(this)">Eliminar</button> 
                    </td>
    				</tr>  
    						@endforeach 
						@endif	
					</tbody>
		</table>
	    	</div>

	    	<div class="pull-left col-md-10" id="ferias">  
	    	</div>


	    	<div class="pull-left col-md-10 hidden" id="talleres">
			</div>
		</div>
	</div>
		@endsection


@section('scripts')
<style type="text/css" media="screen">
	.fecha i{
	    right: 55px !important;
	  }
	.tok{
		top: 17px !important;
		right: 23px !important;
	}
</style>
<script src="js/bootstrapValidator.js" type="text/javascript"></script>
<script src="js/es_ES.js" type="text/javascript"></script>

<script type="text/javascript">

$('.mayuscula').focusout(function() {
				$(this).val($(this).val().toUpperCase());
			});
	</script>

<script>

$('#btnferias').click(function(){
	$('#ferias').removeClass('hidden');
	$('#concursos').addClass('hidden');
	$('#talleres').addClass('hidden');
	;
});
$('#btnconcursos').click(function(){
	$('#concursos').removeClass('hidden');
	$('#talleres').addClass('hidden');
	$('#ferias').addClass('hidden');
});
$('#btntalleres').click(function(){
	$('#talleres').removeClass('hidden');
	$('#ferias').addClass('hidden');
	$('#concursos').addClass('hidden');
});



</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48164").addClass("current_page_item ");
    });
</script>
@stop 