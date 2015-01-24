
@extends('layouts.baseartesanos')
    @section('titulo') IOA-Concursos
    @endsection 

@section('contenido')
<?php $status=Session::get('status'); ?>

	<div class="container wellr">
		<div class="col-sm-5">
		<form role="form" method='POST' id="concursoform">
			<div class="col-sm-12">
					<div class="bg-orga col-md-12">REGISTRO DE CONCURSOS</div>
						
					<div class="col-sm-12">
						<div class="col-sm-11 form-group">
						{{ Form::label ('concurso', 'NOMBRE CONCURSO') }}
						{{ Form::text('concurso', null, array('placeholder' => 'Escriba el nombre del concurso','class' => 'form-control mayuscula')) }} 
						</div>
					</div>

					<div class="col-sm-12">
						<div class="col-md-11 form-group">
							{{ Form::label('nivel', 'NIVEL DEL CONCURSO') }} 
							{{Form::select('nivel', array(''=>'Seleccione nivel','ESTATAL' => 'ESTATAL','NACIONAL' => 'NACIONAL',), null, array('class' =>'form-control'))}}
						</div>
					</div>

					<div class="col-sm-12">
						<div class="form-group col-sm-11 fecha">
			        		{{ Form::label('fecha', 'FECHA LÍMITE DE REGISTRO',array('class' => 'control-label')) }}
			        	<div class="input-group date" id="datetimePicker1">
			        		{{ Form::text('fecha1', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
			        		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			        	</div>
			    		</div>
					</div>

					<div class="col-sm-12">
			        	<div class="form-group col-sm-11 fecha">
			        		{{ Form::label('fecha', 'FECHA DE LA PREMIACIÓN',array('class' => 'control-label')) }}
			        	<div class="input-group date" id="datetimePicker2">
			            {{ Form::text('fecha2', null, array('class' => 'form-control','placeholder' => 'YYYY-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
			            	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			        	</div>
			        	</div>
			    	</div>
					
					<div class="col-md-11">
						<div class="form-group col-sm-12">
						<button type="submit" class="btn btn-ioa pull-right">Registrar
						<span class="glyphicon glyphicon-ok"></span></button>
						</div>
					</div>
			</div>
		</form>

		 <div class="message col-md-8 col-md-offset-2" style="">
        @if($status == 'fail_create')
        <div id="error" style="margin-top:10px;">
            <p class="alert alert-danger"><i class="fa fa-exclamation-triangle fa-lg"></i> Ocurrio un error 
            </p>
        </div>
        @elseif(($status == 'ok_create'))
        <div id="error" style="margin-top:10px;">
            <p class="alert alert-success"><i class="fa fa-check-square-o fa-lg"></i> Operacion completada correctamente
            </p>
        </div>
        @endif
    </div> 
	</div>

	<div class="col-sm-4 col-sm-offset-2" id="concursos">
      		@if(isset($concursos))
      		<div class="bg-orga col-md-12 text-center">CONCURSOS PRÓXIMOS</div>
        	@foreach($concursos as $concurso)
            <div class="container bg-evento col-md-12 onClick="update('{{ $concurso->id }}')"">
            <div class="col-md-7">
           	<p id='idconc' class='hidden'>{{$concurso->id}}</p>
              
	            <h5><i class="fa fa-trophy fa-lg pull-left"></i><strong>{{$concurso->nombre}}</strong></h5>
	            <h5>FECHA: {{$concurso->fecha}}</h5>
	            <h5>NIVEL: {{$concurso->nivel}}</h5>
	            <h5>DÍA DE PREMIACIÓN: {{$concurso->premiacion}}</h5>
          	</div>
              	<div class="col-md-5">
              		<img style="border: 0pt; margin-left: 0px; margin-bottom: 10px; margin-top: 15px;" src="./imgs/event5.png"></img>
          		</div>            
            </div>
          	@endforeach    
      		@endif
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
			$('#datetimePicker1').datetimepicker({
		        language: 'es',
		        pickTime: false,
		        minDate: moment().add(7, 'days'),
		        defaultDate: moment().add(7, 'days').format("YYYY-MM-DD")
		    });
		    $('#datetimePicker2').datetimepicker({
		        language: 'es',
		        pickTime: false,
		        defaultDate: moment().add(8, 'days').format("YYYY-MM-DD")
		    });

			$('#concursoform').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok tok',
            invalid: 'glyphicon glyphicon-remove tok',
            validating: 'glyphicon glyphicon-refresh tok'
        },
        fields: {
        	concurso:{
        		validators:{
        			notEmpty:{},
        			regexp:{
		                    regexp:/^[a-zA-Z áéíóúñÑÁÉÍÓÚ]+$/,
		                        message: 'Por favor verifica el campo'
		                    }
        		}},
			fecha1:{
				validators:{
					notEmpty:{},
					date: {
		            format: 'YYYY-MM-DD'
		            },
		            callback: {
                        message: 'The date is not in the range',
                        callback: function(value, validator) {
                            var m = new moment(value, 'YYYY-MM-DD', true);
                            if (!m.isValid()) {
                                return false;
                            }
                            // Check if the date in our range
                            return m.isAfter(moment().add(7, 'D').format("YYYY-MM-DD")) && m.isBefore(moment().add(6, 'M').format("YYYY-MM-DD"));
                        }
                    }
				}

			},
			fecha2:{
				validators:{
					notEmpty:{},
					date: {
		            format: 'YYYY-MM-DD'
		            }
				}

			},
			nivel:{
				validators:{
					notEmpty:{},
				}

			}
        		}
        	})
			$('.mayuscula').focusout(function() {
				$(this).val($(this).val().toUpperCase());
			});
			$('#datetimePicker1').on('dp.change dp.show', function(e) {
        $('#concursoform').bootstrapValidator('revalidateField', 'fecha1');
    });
			$('#datetimePicker2').on('dp.change dp.show', function(e) {
        $('#concursoform').bootstrapValidator('revalidateField', 'fecha2');
    });

		});
</script>
<script type="text/javascript">
function update(id){
	
}
</script>
@stop