@extends('layouts.baseartesanos')
    @section('titulo') IOA-Credenciales
    @endsection 
@section('contenido')
	<div class="container wellr">			
    	<div class="col-sm-5 wellr">
    		{{ Form::open(array('url' => 'credenciales/artesano','role' => 'form','id' => 'artesano','class' => 'form')) }}
			
				<div class="col-md-12">

					<div class="bg-orga col-md-12">BÚSQUEDA DE ARTESANOS</div>
					
					<div class="col-md-12 form-group">
					{{ Form::label('artesanombre', 'Nombre(s)',array('class' => 'control-label')) }}
					{{ Form::text('artesanombre', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
					</div>

					<div class="col-md-12 form-group">
					{{ Form::label('artesapaterno', 'Apellido paterno') }}
					{{ Form::text('artesapaterno', null, array('placeholder' => 'introduce apellido paterno','class' => 'form-control')) }}
					</div>

					<div class="col-md-12 form-group">
					{{ Form::label('artesamaterno', 'Apellido materno') }}
					{{ Form::text('artesamaterno', null, array('placeholder' => 'introduce apellido materno','class' => 'form-control')) }}
					</div>
				</div>

				<div class="col-md-12 form-group">
					<div class="form-group col-sm-12 fecha">
			         	{{ Form::label('fechanace', 'Fecha de Nacimiento',array('class' => 'control-label')) }}
			          	<div class="input-group date" id="datetimePicker1">
			            {{ Form::text('fechanace', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
			            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			          	</div>
					</div>
				</div>

					<div class="form-group" style="top: 13px !important;">
						<button id="found" type="submit" class="btn btn-ioa pull-right">
							<span class="glyphicon glyphicon-search"></span> 
							Buscar 
						</button>
					</div>
			{{Form::close()}}
			<div id="imp_artesano" class="hidden col-sm-12">
				<h3>Imprimir credencial</h3>
				{{ Form::open(array('url' => 'credenciales/credencial','role' => 'form','id' => 'credencial','class' => 'class')) }}
					{{ Form::text('id', null, array('class' => 'hidden form-control')) }}
					<div class="form-group" style="top: 13px !important;">
						<button id="found" type="submit" class="btn btn-ioa pull-right">
							<span class="glyphicon glyphicon-print"></span> 
							Imprimir 
						</button>
					</div>
				{{ Form::close() }}
			</div>
		</div>
		<div class="col-sm-7 wellr">	
			<div class="col-md-12">
				{{ Form::open(array('url' => 'credenciales/organizacion','role' => 'form','id' => 'organizacion','class' => 'form')) }}
					<div class="col-md-12">
						<h3></h3>
					</div>
					<div class="bg-orga col-md-12">BUSQUEDA DE ORGANIZACIONES</div>
				
					<div class="col-xs-4 col-md-6 form-group">
						{{ Form::label ('organización', 'NOMBRE ORGANIZACIÓN') }}
						{{ Form::text('nombreorg', null, array('placeholder' => 'Escriba el nombre de la organización','class' => 'form-control')) }} 
					</div>
					<div class="col-md-4 form-group">
						{{ Form::label ('tel', 'TELÉFONO DEL MUNICIPIO') }}
						{{ Form::text('telmun', null, array('placeholder' => 'Número de telefono','class' => 'form-control')) }} 
					</div>

					<div class="col-md-1 form-group" style="top: 17px !important; ">
						<button type="submit" class="btn btn-ioa">
							<span class="glyphicon glyphicon-search"></span>
					 		Buscar 
						</button>
					</div>
				{{ Form::close() }}
			</div>
    	</div>
    	<div id="form_org" class="col-sm-5 wellr hidden" style="min-height:700px; margin:10px 0 0 30px;">
    		{{ Form::open(array('url' => 'credenciales/credenciales','role' => 'form','id' => 'form_artesanos','class' => 'class')) }}
    			{{ Form::text('org_id', null, array('class' => 'hidden')) }}
	    		<div class="checkbox col-sm-6">
	    			<label style="font-size:16px;">{{Form::checkbox('todos', 'all', false);}}Seleccionar todos</label>
	    		</div>
	    		<div class="form-group" style="top: 13px !important;">
					<button id="imprimir" type="button" class="btn btn-ioa pull-right">
						<span class="glyphicon glyphicon-print"></span> 
						Imprimir 
					</button>
				</div>
    		{{ Form::close() }}
		  <div id="artesanos"></div>
		</div>
	</div>
@stop
@section('scripts')
<style type="text/css" media="screen">
	.fecha i{
	    right: 55px !important;
	  }
	.tok{
		top: 18px !important;
		right: 23px !important;
	}
</style>
<script src="js/bootstrapValidator.js" type="text/javascript"></script>
<script src="js/es_ES.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	//$("#menu-item-49489").addClass("current_page_item ");
	$('#datetimePicker1').datetimepicker({
        language: 'es',
        pickTime: false
    });

	$('#artesano').bootstrapValidator({
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
                    }
            },
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
            fechanace: {
                validators: {
                    notEmpty: {},
                    date: {
                        format: 'YYYY-MM-DD'
                    }
                }
            }
        }
    })
    .on('success.form.bv', function(e) {
    	e.preventDefault();
		$.post($(this).attr('action'), $(this).serialize(), function(json) {
			if(json.success){
				$('#imp_artesano').removeClass("hidden");
				$('[name=id]').val(json.artesano.id);
			}
			else
				swal('Error','No se encontró el artesano','error');
		}, 'json').fail(function(){
			swal('Error','No se encontró el artesano','error');
		});
    });
    $('#organizacion').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok tok',
            invalid: 'glyphicon glyphicon-remove tok',
            validating: 'glyphicon glyphicon-refresh tok'
        },
        fields: {
        	nombreorg:{
        		validators:{
        			notEmpty:{},
        			regexp:{
		                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
		                        message: 'Por favor verifica el campo'
		                    }
        		}},
			telmun:{
				validators:{
					integer:{},
					notEmpty:{},
					stringLength: {
					    min: 7,
					    max:10,
					},
				}
			},
        }
    })
    .on('success.form.bv', function(e) {
		e.preventDefault();
		$.post($(this).attr('action'), $(this).serialize(), function(json) {
			if(json.success){
				$('#form_org').removeClass("hidden");
				$('[name=org_id]').val(json.organizacion.id);
				creartabla(json);
			}
			else
				swal('Error','No se encontró la organizacion','error');
		}, 'json').fail(function(){
			swal('Error','No se encontró la organizacion','error');
		});
    });
	$('.mayuscula').focusout(function() {
		$(this).val($(this).val().toUpperCase());
	});
	$('#datetimePicker1').on('dp.change dp.show', function(e) {
    	$('#artesano').bootstrapValidator('revalidateField', 'fechanace');
    });
    $('#credencial').submit(function(e){
    	if($('[name=id]').val() == ''){
    		e.preventDefault();
			swal('Error','No se puede imprimir','error');
    	}
    });
    $('#imprimir').click(function(){
	  if($('#artesanos_table').DataTable().rows('.success').data().length == 0 && !$('[name=todos]').is(":checked")){
	    swal('Error', "Ningun artesano seleccionado", "error");
	  }
	  else if($('[name=todos]').is(":checked")){
	  	$('#form_artesanos').submit();
	  }
	  else{
	    var artesanos = '';
	    $('#artesanos_table').DataTable().rows('.success').data().each(function( row ) {
	      artesanos += '<input class="hidden" type="checkbox" checked name="'+row[0]+'">';
	    });
	    $('#form_artesanos').html(artesanos);
	    $('#form_artesanos').submit();
	  }
	});
	$('[name=todos]').change(function(){
		if($('[name=todos]').is(":checked"))
			$('#artesanos_table').find('tbody').find('tr').addClass('success');
		else
			$('#artesanos_table').find('tbody').find('tr').removeClass('success');
	});
});
function creartabla(json){
	$('#artesanos').html('<table id="artesanos_table" class="table table-hover table-first-column-number data-table display full"></table>');
	$('#artesanos_table').dataTable( {
	  "data": json.artesanos,
	  "columns": [
	      { "title": "id" },
	      { "title": "Nombre" },
	      { "title": "Fecha de nacimiento" },
	  ],
	  "language": {
	    "lengthMenu": "Artesanos por página _MENU_",
	    "zeroRecords": "No se encontro",
	    "info": "Pagina _PAGE_ de _PAGES_",
	    "infoEmpty": "No records available",
	    "infoFiltered": "(Ver _MAX_ total records)",
	    'search': 'Buscar: ',
	    "paginate": {
	      "first":      "Inicio",
	      "last":       "Fin",
	      "next":       "Siguiente",
	      "previous":   "Anterior"
	    },
	}
	} );
	$('#artesanos_table').find('tbody').find('tr').on( 'click', function () {
		$(this).toggleClass('success');
	} );	 
}
</script>
@stop