@extends('layouts.baseartesanos')
	@section('titulo')BÚSQUEDA ARTESANO
	@endsection

@section('contenido')
<div class="container wellr">

	<div class="col-sm-4 wellr">
		{{ Form::open(array('id' => 'buscarartesano')) }}
		
			<div class="col-md-12">

				<div class="bg-orga col-md-12">BÚSQUEDA DE ARTESANOS</div>
				
				<div class="col-md-12 form-group">
				{{ Form::label('artesanombre', 'Nombre(s)',array('class' => 'control-label')) }}
				{{ Form::text('artesanombre', 'eliel', array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
				</div>

				<div class="col-md-12 form-group">
				{{ Form::label('artesapaterno', 'Apellido paterno') }}
				{{ Form::text('artesapaterno', 'nava', array('placeholder' => 'introduce apellido paterno','class' => 'form-control')) }}
				</div>

				<div class="col-md-12 form-group">
				{{ Form::label('artesamaterno', 'Apellido materno') }}
				{{ Form::text('artesamaterno', null, array('placeholder' => 'introduce apellido materno','class' => 'form-control')) }}
				</div>
			</div>

				<div class="form-group" style="top: 13px !important;">
					<button id="found" type="submit" class="btn btn-ioa pull-right">
						<span class="glyphicon glyphicon-search"></span> 
						Buscar 
					</button>
				</div>
		{{Form::close()}}
	</div>
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title">Artesanos</h3>
				</div>
				<div class="modal-body">
					<h5 class="text-center">Elige una opción</h5>
					<table class="table table-hover">
					<thead id="tblHead">
					<tr>
					<th>Nombre</th>
					<th>Paterno</th>
					<th>Materno</th>
					<th>Fecha Nacimiento</th>
					<th>Rama</th>
					<th>Seleccionar</th>
					</tr>
					</thead>
					<tbody id="elementobody">
					</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default " data-dismiss="modal">Cerrar</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<div class="pull-left wellr col-md-3 hidden" id="documentos">      
	</div>
	<div class="col-sm-5 hidden wellr" id="datitos">
		<div class="bg-orga col-md-12">DATOS DEL ARTESANO</div>

		<div class="col-md-12">
		
			<h4>
			<label class="elementos">Nombre: </label>
			<label id="nombre" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Fecha de nacimiento: </label>
			<label id="nace" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Sexo: </label>
			<label id="sexo" class="label btn-ioa"></label>
			</h4>
			
			<h4>
			<label class="elementos">Localidad: </label>
			<label id="localidad" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Rama: </label>
			<label id="rama" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="grupo">Grupo Étnico: </label>
			<label id="nace" class="label btn-ioa"></label>
			</h4>

			<h4>
			<label class="elementos">Fecha registro: </label>
			<label id="fecharegistro" class="label btn-ioa"></label>
			</h4>

		</div>

	</div>
	<div class="wellr hidden anadidos col-sm-4">
		<div class="bg-orga col-md-12">CONCURSOS</div>
		<div id="concursos"></div>
		
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
	.elementos{
		font-size: 90%;
	}
</style>
<script src="js/bootstrapValidator.js" type="text/javascript"></script>
<script src="js/es_ES.js" type="text/javascript"></script>

<script type="text/javascript">
			$(document).ready(function() {
			
		    $('#buscarartesano').bootstrapValidator({
		        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
		        feedbackIcons: {
		            valid: 'glyphicon glyphicon-ok tok',
		            invalid: 'glyphicon glyphicon-remove tok',
		            validating: 'glyphicon glyphicon-refresh tok'
		        },
		        fields: {
		            artesanombre: {
		                validators: {
		                    regexp:{
		                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
		                        message: 'Por favor verifica el campo'
		                    }
		                    }},
		            artesapaterno:{
		                validators: {
		                    notEmpty: {},
		                	regexp:{
		                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
		                        message: 'Por favor verifica el campo'
		                    }
		                    }},
		            artesamaterno:{
						validators: {
		                    regexp:{
		                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
		                        message: 'Por favor verifica el campo'
		                    }
		                    }
		                },		            

		        }
		    })
			.on('success.form.bv', function(e) {
	            e.preventDefault();
				$.post($(this).attr('action'), $(this).serialize(), function(json) {
					if(json.length > 1){
						$.each(json,function(index,artesano){
								$('#elementobody').append('<tr>'+
								'<td>'+artesano.nombre+'</td>'+
								'<td>'+artesano.paterno+'</td>'+
								'<td>'+artesano.materno+'</td>'+
								'<td>'+artesano.cumple+'</td>'+
								'<td><button class="btn-ioa btn-xs" onClick="encontrado('+artesano.id+')" data-dismiss="modal">Seleccionar</button></td>');
						});
						$("#myModal").modal('show');
					}
					else if(json.length == 1)
						encontrado(json[0].id);
					else
						swal('Error','No se encontró el artesano','error');
				}, 'json').fail(function(){
					swal('Error','No se encontró el artesano','error');
				});
			});
		$('#myModal').on('hide.bs.modal', function() {
		    $('#elementobody').html('');
		});
		
});
    function encontrado (id) {
    	$.post('encontrado', {id:id}, function(json) {
			$('#buscarartesano').closest(".wellr").addClass('hidden');
			$(".anadidos").removeClass('hidden')
			console.log(json.persona.telefono);
			$.each(json.concursos,function(index,concurso){
				$('#concursos').append('<div class="wellr"><h4><label class="elementos nombreconcurso">Nombre: <strong>'+concurso.nombre+'</strong></label></h4><h4><label class="elementos fechaconcurso">Fecha: <strong>'+concurso.fecha+'</strong></label></h4><h4><label class="elementos">Premiación: <strong>'+concurso.premiacion+'</strong></label></h4><h4><label class="elementos nivelconcurso">Nivel: <strong>'+concurso.nivel+'</strong></label></h4></div>');
			});
			
			$('#datitos').removeClass("hidden");
			$('#nombre').text(json.persona.nombre+' '+json.persona.paterno+' '+json.persona.materno);
			$('#nace').text(json.persona.fechanacimiento);
			$('#sexo').text(json.persona.sexo);
			$('#grupo').text(json.persona.grupoetnico_id);
			$('#localidad').text(json.persona.localidad_id);
			$('#rama').text(json.persona.rama_id);
			$('#fecha').text(json.fecharegistro);
		}, 'json').fail(function(){
			swal('Error','No se encontró el artesano','error');
		});
    }
	</script>


<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48175").addClass("current_page_item ");
    });
</script>
@stop 