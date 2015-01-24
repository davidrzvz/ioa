@extends('layouts.baseartesanos')
@section('titulo') REGISTRO EN CONCURSO
@endsection 
 
@section('contenido')
	<div class="container wellr">
		<div class="pull-left col-sm-4" id="concursos">
      		@if(isset($concursos))
      			<div class="bg-orga col-sm-12 text-center">CONCURSOS PRÓXIMOS</div>
        		@foreach($concursos as $concurso)
		            <div class="container bg-evento col-sm-12">
		            	<div class="col-sm-7">
	           				<p id='idconc' class='hidden'>{{$concurso->id}}</p>
				            <h5><i class="fa fa-trophy fa-lg pull-left"></i><strong>{{$concurso->nombre}}</strong></h5>
				            <h5>FECHA: {{$concurso->fecha}}</h5>
				            <h5>NIVEL: {{$concurso->nivel}}</h5>
				            <h5>DÍA DE PREMIACIÓN: {{$concurso->premiacion}}</h5>
			          	</div>
		              	<div class="col-sm-5">
		              		<img style="border: 0pt; margin-left: 0px; margin-bottom: 10px; margin-top: 15px;" src="./imgs/event5.png"></img>
		          		</div>
            		</div>
          		@endforeach    
      		@endif
    	</div>
		<div class="col-sm-4 col-sm-offset-2 wellr" style="text-align:center;">
			<img id="123" class="botones elegido" title="Artesano" src="./imgs/nueva.png"></img>
			<img id="1234"class="botones" style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" title="Persona" src="./imgs/inscrito.png"></img>
		</div>	
 <!-- /////////////////-->		
		<div class="col-sm-8 pull-right wellr" id="divalta">
			<div class="bg-orga col-sm-12 text-center">DATOS DEL PARTICIPANTE</div>
			{{ Form::open(array('url' => 'personaConcurso','role' => 'form','id' => 'formalta','data-toggle' => 'validator')) }}
				<div class="col-sm-12">	
					<div class="col-sm-8 form-group">	
						{{ Form::label ('nombre', 'Nombre Completo',array('class' => 'control-label')) }}
						{{ Form::text('nombre', null, array('placeholder' => 'Nombre - - ApellidoPaterno - - ApellidoMaterno','class' => 'form-control mayuscula')) }}
					</div>
					<div class="col-sm-3 form-group">
						{{ Form::label('sexo', 'Sexo',array('class' => 'control-label')) }} 
						{{Form::select('sexo', array('' => 'Seleccione','Masculino' => 'Masculino','Femenino' => 'Femenino',), null, array('class' =>'form-control'))}}
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group col-sm-4 fecha">
			          {{ Form::label('fechanace', 'fechanace',array('class' => 'control-label')) }}
			          <div class="input-group date" id="datetimePicker">
			            {{ Form::text('fechanace', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
			            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			          </div>
			        </div>
					<div class="col-sm-3 form-group">
						{{ Form::label('grupoetnico', 'Grupo Étnico',array('class' => 'control-label')) }}
						{{ Form::select('grupoetnico', $grupos, null, array('class' => 'form-control')) }}
					</div>
				</div>	
				<div class="col-sm-12">
					<div id="idcurp" class="col-sm-5 form-group">	
						{{ Form::label('curp', 'CURP') }}
						{{ Form::text('curp', null, array('id' => 'curp', 'placeholder' => 'Ingrese CURP','class' => 'form-control')) }}
					</div>
					<div class="col-sm-7 form-group">
						{{ Form::label('domicilio', 'Domicilio') }}
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-home"></i></div>
								{{ Form::text('domicilio', null, array('placeholder' => 'introduce calle y número','class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="col-sm-4 form-group">
						{{ Form::label('municipio', 'Municipio') }}
						{{ Form::select('municipio',$municipios, null, array('class' => 'form-control','id'=>'selectmun')) }} 
					</div>
					<div class="form-group col-sm-4">
						{{ Form::label('localidad', 'Localidad') }}
						{{ Form::select('localidad',array(), null, array('class' => 'form-control', 'id'=>'selectloc')) }}
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group col-sm-2">
						{{ Form::label('cp', 'C.P.') }}
						{{ Form::text('cp', null, array('placeholder' => 'CP','class' => 'form-control')) }}
					</div>
					<div class="col-sm-3 form-group">
						{{ Form::label('lada', 'Lada') }}
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-phone"></i></div>
							{{ Form::text('lada', null, array('placeholder' => 'Lada','class' => 'form-control')) }}
						</div>
					</div>
					
					<div class="col-sm-3 form-group">
						{{ Form::label('tel', 'Telefono') }}
						<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-phone"></i></div>
						{{ Form::text('tel', null, array('placeholder' => 'Teléfono','class' => 'form-control')) }}
						</div>
					</div>

					<div class="col-sm-3 form-group">
						{{ Form::label('rama', 'Rama Artesanal') }} <br>
						{{Form::select('rama', $ramas, null, array('class' =>'form-control'))}}
					</div>
				</div>
				<div class="col-sm-12 wellr">
					<h4>DATOS DE LA PIEZA</h4>
					<div class="col-sm-12">
						<div class="col-sm-4 form-group">	
							{{ Form::label('categoria', 'Categoría') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-sitemap"></i></div>
								{{ Form::textarea('categoria', null, array('placeholder' => 'Ingrese categoría','class' => 'form-control', 'size' => '3x2')) }}	
							</div>
						</div>
						<div class="col-sm-7 form-group">	
							{{ Form::label('pieza', 'Pieza') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
							{{ Form::textarea('pieza', null, array('placeholder' => 'Descripción y nombre de la pieza','class' => 'form-control', 'size' => '3x2')) }}
							</div>
						</div>
						<div class="col-sm-3 form-group">
							{{ Form::label('costo', 'Costo Aprox') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-dollar"></i></div>
								{{ Form::text('costo', null, array('class' => 'form-control')) }}
							</div>
						</div>
						<div class="col-sm-3 form-group">
							{{ Form::label('avaluo', 'Avaluo') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-dollar"></i></div>
								{{ Form::text('avaluo', null, array('class' => 'form-control')) }}
							</div>
						</div>
						<div class="col-sm-6 form-group">
							{{ Form::label('entrego', 'Entregó') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-male"></i></div>
							{{ Form::text('entrego', null, array('placeholder' => 'Nombre de quien entrega la pieza','class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-7 form-group">
							{{ Form::label('observ', 'OBSERVACIONES') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-eye"></i></div>
							{{ Form::textarea('observ', null, array('placeholder' => 'Escriba las observaciones aquí','class' => 'form-control', 'size' => '6x2')) }}<br>
							</div>
						</div>
						<div class="col-sm-2 form-group hidden">
							{{ Form::label('concid', 'CONCURSO') }}
							{{ Form::text('concid', null, array('placeholder' => 'Id','class' => 'form-control')) }}
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-4 form-group">
							{{ Form::label('calidad', 'Calidad en general') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-star-half-o"></i></div>
							{{ Form::text('calidad', null, array('placeholder' => 'Calidad de la pieza','class' => 'form-control')) }}
							</div>
						</div>
						<div class="col-sm-6 form-group">
							{{ Form::label('recibio', 'Recibió') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-male"></i></div>
							{{ Form::text('recibio', null, array('placeholder' => 'Nombre de quien recibe la pieza','class' => 'form-control')) }}
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 form-group">
					<button id="btonen" type="submit" class="btn btn-ioa btn-lg pull-right">Registrar <span class="glyphicon glyphicon-ok"></span></button>
				</div>
			{{ Form::close() }}
		</div>
 <!--////////////////////////-->
		<div class="col-sm-8 pull-right hidden" id="inscritod">
			<div class="col-sm-12 wellr">
				{{ Form::open(array('id' => 'buscaconcursante', 'url' => 'buscaconcursante')) }}
					<div class="col-sm-12">
						<div class="bg-orga col-sm-12">BÚSQUEDA DEL CONCURSANTE</div>
						<div class="col-sm-6 form-group">
							{{ Form::label('artesanombre', 'Nombre(s)',array('class' => 'control-label')) }}
							{{ Form::text('artesanombre', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
						</div>
						<div class="col-sm-6 form-group">
							{{ Form::label('artesapaterno', 'Apellido paterno') }}
							{{ Form::text('artesapaterno', null, array('placeholder' => 'introduce apellido paterno','class' => 'form-control')) }}
						</div>
						<div class="form-group col-sm-6 fecha">
				         	{{ Form::label('fechanace', 'Fecha de Nacimiento',array('class' => 'control-label')) }}
				          	<div class="input-group date" id="datetimePicker1">
					            {{ Form::text('fechanace', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
					            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				          	</div>
						</div>
						<div class="col-sm-6 form-group">
							{{ Form::label('artesamaterno', 'Apellido materno') }}
							{{ Form::text('artesamaterno', null, array('placeholder' => 'introduce apellido materno','class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-ioa pull-right">
							<span class="glyphicon glyphicon-search"></span> 
							Buscar 
						</button>
					</div>
				{{Form::close()}}
			</div>
			<div id="inscrito_div" class="col-sm-12 wellr hidden">
				<h4>DATOS DE LA PIEZA</h4>
				<div class="col-sm-12">
					{{ Form::open(array('url' => 'personaConcurso2','role' => 'form','id' => 'inscrito','class' => 'class')) }}
						<div class="col-sm-4 form-group">	
							{{ Form::label('categoria', 'Categoría') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-sitemap"></i></div>
								{{ Form::textarea('categoria', null, array('placeholder' => 'Ingrese categoría','class' => 'form-control', 'size' => '3x2')) }}	
							</div>
						</div>
						<div class="col-sm-7 form-group">	
							{{ Form::label('pieza', 'Pieza') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-info-circle"></i></div>
								{{ Form::textarea('pieza', null, array('placeholder' => 'Descripción y nombre de la pieza','class' => 'form-control', 'size' => '3x2')) }}
							</div>
						</div>
						<div class="col-sm-12">
							<div class="col-sm-3 form-group">
								{{ Form::label('costo', 'Costo Aprox') }}
								<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-dollar"></i></div>
									{{ Form::text('costo', null, array('class' => 'form-control')) }}
								</div>
							</div>
							<div class="col-sm-3 form-group">
								{{ Form::label('avaluo', 'Avaluo') }}
								<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-dollar"></i></div>
									{{ Form::text('avaluo', null, array('class' => 'form-control')) }}
								</div>
							</div>
						</div>
						<div class="col-sm-7 form-group">
							{{ Form::label('observ', 'OBSERVACIONES') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-eye"></i></div>
							{{ Form::textarea('observ', null, array('placeholder' => 'Escriba las observaciones aquí','class' => 'form-control', 'size' => '6x2')) }}<br>
							</div>
						</div>
						<div class="col-sm-4 form-group">
							{{ Form::label('calidad', 'Calidad en general') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-star-half-o"></i></div>
							{{ Form::text('calidad', null, array('placeholder' => 'Calidad de la pieza','class' => 'form-control')) }}
							</div>
						</div>		
						<div class="col-sm-6 form-group">
							{{ Form::label('recibio', 'Recibió') }}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-male"></i></div>
							{{ Form::text('recibio', null, array('placeholder' => 'Nombre de quien recibe la pieza','class' => 'form-control')) }}
							</div>
						</div>
						<div class="col-sm-12 form-group">
							<button type="submit" class="btn btn-ioa btn-lg pull-right" id="btner">
								 Registrar 
								<span class="glyphicon glyphicon-ok"></span>
							</button>
						</div>
						{{ Form::text('idpersona', null, array('class' => 'hidden')) }}
						{{ Form::text('idartesano', null, array('class' => 'hidden')) }}
						{{ Form::text('concid', null, array('class' => 'hidden')) }}
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop

@section('scripts')
<style type="text/css" media="screen">
	.fecha i{
    	right: 55px !important;
  	}
	.tok{
		top: 17px !important;
		right: 23px !important;
	}
	textarea{
		resize:none !important;
	}
</style>
<script src="js/bootstrapValidator.js" type="text/javascript"></script>
<script src="js/es_ES.js" type="text/javascript"></script>
	
<script type="text/javascript">
$(document).ready(function() {

	$('#datetimePicker').datetimepicker({
        language: 'es',
        pickTime: false
    });
    $('#datetimePicker1').datetimepicker({
        language: 'es',
        pickTime: false
    });

	$('#buscaconcursante').bootstrapValidator({
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
			$('#inscrito_div').removeClass('hidden');
			if(json.error){
				swal('Error', 'Persona no encontrada', 'error');
				$('#inscrito_div').addClass('hidden');
			}
			else{
				$('#inscrito').data('bootstrapValidator').resetForm(true);
				$('[name = idpersona]').val(json.id);
				if(json.artesano)
					$('[name = idartesano]').val(json.artesano.id);
				else
					$('[name = idartesano]').val("");
				$('[name = concid]').val("");
				$('.bg-evento').removeClass('sombreado-evento');
			}
		}, 'json');
	});
	$('#formalta').bootstrapValidator({
	    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
	    feedbackIcons: {
	        valid: 'glyphicon glyphicon-ok tok',
	        invalid: 'glyphicon glyphicon-remove tok',
	        validating: 'glyphicon glyphicon-refresh tok'
	    },
	    fields: {
	        nombre: {
	            validators: {
	                notEmpty: {},
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
	        cp:{
	            validators: {
	                integer: {},
					stringLength:{
						min: 5,
						max: 5,
						message: 'El CP debe tener 5 dígitos'
					}
	            }
	        },
	        curp:{
				validators:{
	                stringLength: {
	                    min: 18,
	                    max:18,
	                    message:'Se requieren 18 caracteres para CURP'
	                },
	                notEmpty:{}
				}
	        },
	        RFC: {
	            validators: {
	                stringLength: {
	                    min: 13,
	                    max:13,
	                    message:'Se requieren 13'
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
	        },
	        tel: {
	            validators: {
	                integer:{}
	            }},
	            lada: {
	            validators: {
	                integer: {},
	                stringLength: {
	                    min: 3,
	                    max: 3,
	                    message:'Verifica'
	            }
	        }
	        },
	        sexo:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        concid:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        estado:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        grupoetnico:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        rama:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        categoria:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        pieza:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        costo:{
	        	validators: {
	        		integer: {},
	        		notEmpty:{}
	        	}
	        },
	        	avaluo:{
	        	validators: {
	        		integer: {},
	        		notEmpty:{}
	        	}
	        },
	        observ: {
	            validators: {
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
	        recibio: {
	            validators: {
	                notEmpty: {},
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
	        calidad: {
	            validators: {
	                notEmpty: {},
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }}

	    }
	})
	.on('success.form.bv', function(e) {
        e.preventDefault();
        if($('[name = concid').val() == "")
        	swal('Error', 'Aun no seleccionas un concurso', 'error');
        else
		$.post($(this).attr('action'), $(this).serialize(), function(json) {
			console.log(json);
			swal('Operacion completada correctamente', '', 'success');
					$('#formalta').data('bootstrapValidator').resetForm(true);
		}, 'json');

	});

	$('#inscrito').bootstrapValidator({
	    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
	    feedbackIcons: {
	        valid: 'glyphicon glyphicon-ok tok',
	        invalid: 'glyphicon glyphicon-remove tok',
	        validating: 'glyphicon glyphicon-refresh tok'
	    },
	    fields: {
	    	observ: {
	            validators: {
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
	        recibio: {
	            validators: {
	                notEmpty: {},
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
	        calidad: {
	            validators: {
	                notEmpty: {},
	            	regexp:{
	                regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
	                    message: 'Por favor verifica el campo'
	                }
	                }},
            categoria:{
		    	validators: {
		    		notEmpty:{}
		    	}
			        },
	        pieza:{
	        	validators: {
	        		notEmpty:{}
	        	}
	        },
	        costo:{
	        	validators: {
	        		integer: {},
	        		notEmpty:{}
	        	}
	        },
	        avaluo:{
	        	validators: {
	        		integer: {},
	        		notEmpty:{}
	        	}
	        }
	    }
	})
	.on('success.form.bv', function(e) {
        e.preventDefault();
        if($('[name = concid').val() == "")
        	swal('Error', 'Aun no seleccionas un concurso', 'error');
        else
		$.post($('#inscrito').attr('action'), $('#inscrito').serialize(), function(json) {
			if(json.error)
				swal('Error', 'Esta persona ya esta inscrita', 'error');
			else
				swal('Operacion completada correctamente', '', 'success');
			$('#inscrito').data('bootstrapValidator').resetForm(true);
			$('#inscrito_div').addClass('hidden');
			$('[name = idartesano]').val("");
			$('[name = idpersona]').val("");
			$('[name = concid]').val("");
			$('.bg-evento').removeClass('sombreado-evento');
		}, 'json');
		
	});

	$('.mayuscula').focusout(function() {
		$(this).val($(this).val().toUpperCase());
	});
});

$('#datetimePicker').on('dp.change dp.show', function(e) {
        $('#formalta').bootstrapValidator('revalidateField', 'fechanace');
    });
$('#datetimePicker1').on('dp.change dp.show', function(e) {
        $('#buscaconcursante').bootstrapValidator('revalidateField', 'fechanace');
    });
$('.bg-evento').click(function(){
	$('.bg-evento').removeClass('sombreado-evento');
	$(this).addClass('sombreado-evento');
	$('[name=concid]').val($(this).find('#idconc').text());
	$('#formalta').bootstrapValidator('revalidateField', 'concid');
	$('#btonen , #btner').prop( "disabled", false );
});

$('#123').click(function(){
	$('.botones').removeClass('elegido');
	$(this).addClass('elegido');
	$('#inscritod').addClass('hidden');
	$('#divalta').removeClass('hidden');

});

$('#1234').click(function(){
	$('.botones').removeClass('elegido');
	$(this).addClass('elegido');
	$('#inscritod').removeClass('hidden');
	$('#divalta').addClass('hidden');

});
</script>

<script type="text/javascript" charset="utf-8">
$( "#selectmun" ).change(function () {
	$.post("<?php echo URL::to('artesano/municipio'); ?>", 'id='+$( "#selectmun option:selected" ).val(), function(json) {
		 $( "#selectloc" ).html('');
		$(json).each(function(){
			$( "#selectloc" ).append( '<option value="'+this.id+'">'+this.nombre+'</option>')
		});
	}, 'json');
}).change();
</script>

<script>
	$( "#curp" ).focusout(function() {
		var curp = $(this).val();
		$.post('curp',{curp:curp}, function(json) {
			if (!json.success) {
				$('#idcurp').addClass('has-error');
				$('[name=curp]').val('');
				$('#formalta').bootstrapValidator('revalidateField','curp');
				$('[name=curp]').focus();
				$('[name=curp]').closest('div').find('small').html('La CURP '+curp+' ya se encuentra registrada');
			}
		}, 'json');
	})
</script>

@stop