
@extends('layouts.baseartesanos')
@section('titulo') Reportes
@endsection
@section('contenido')

<div class="container wellr">
    <div class="col-sm-12">
    {{ Form::open(array('url' => 'reportes/ferias','role' => 'form','id' => 'ferias','class' => 'class')) }}
        <div class="col-sm-6 col-sm-offset-3">
            <div class="col-sm-6 form-group fecha">
                {{ Form::label('birthday', 'Fecha de inicio') }}
                <div class="input-group" id="datetimePicker">
                    {{ Form::text('inicio', null, array('id' => 'fechainicio','class' => 'form-control', 'placeholder' => 'AAAA-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
            <div class="col-sm-6 form-group fecha">
                {{ Form::label('birthday2', 'Fecha de fin') }}
                <div class="input-group" id="datetimePicker2">
                    {{ Form::text('fin', null, array('id' => 'fechafin','class' => 'form-control', 'placeholder' => 'AAAA-MM-DD', 'data-date-format' => 'YYYY-MM-DD')) }}
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>
            <button type="submit" class="btn btn-ioa col-sm-4 col-sm-offset-4" style="margin-top:10px;"><i class="fa fa-line-chart"></i> Generar reporte</button>
        </div>
    {{ Form::close() }}
    </div>
    <div class="row">
        <div id="grafica" class="col-md-6 col-md-offset-3 hidden" style="height: 300px; margin-bottom: 50px; margin-top:50px; background-color: rgb(252, 252, 252);"></div>
    </div>
    <div class="col-sm-8 col-sm-offset-2" id="dtabla">
    </div>
</div>
@stop
@section('scripts')
<style type="text/css" media="screen">
    .fecha i{
        right: 50px !important;
    }
</style>
{{HTML::script('js/bootstrapValidator.js');}}
{{HTML::script('js/es_ES.js');}}
    <script>
    $(document).ready(function() {
            $('#datetimePicker ,#datetimePicker2').datetimepicker({
                language: 'es',
                pickTime: false
            });
            $('#ferias').bootstrapValidator({
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    inicio: {
                        validators: {
                            notEmpty: {},
                            date: {
                                format: 'YYYY-MM-DD',
                            }
                        }
                    },
                    fin: {
                        validators: {
                            notEmpty: {},
                            date: {
                                format: 'YYYY-MM-DD',
                            }
                        }
                    },
                }
            })
            .on('success.form.bv', function(e) {
              e.preventDefault();
                $.post('ferias',$('#ferias').serialize(), function(json) {
                    $('#grafica').html('');
                    $('#grafica').removeClass('hidden');
                        Morris.Bar({
                            element: 'grafica',
                            data: data(json),
                            xkey: 'label',
                            ykeys: ['value'],
                            labels: ['No. de Ferias'],
                            barColors: ['rgb(11, 98, 164)'],
                            grid:true,
                            gridTextColor:['#000']
                        });
                        $('#dtabla').html('<table id="tabla" class="table table-hover table-first-column-number data-table display full"></table>');
                        $('#tabla').dataTable( {
                          "data": json,
                          "columns": [
                              { "title": "Nombre" },
                              { "title": "Fecha Inicio" },
                              { "title": "Fecha Fin" },
                              { "title": "Tipo" },
                              { "title": "lugar" },
                          ],
                          "language": {
                            "lengthMenu": "Ferias por página _MENU_",
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
                }, 'json');
            });
            $('#datetimePicker').on('dp.change dp.show', function(e) {
                $('#ferias').bootstrapValidator('revalidateField', 'inicio');
            });
            $('#datetimePicker2').on('dp.change dp.show', function(e) {
                $('#ferias').bootstrapValidator('revalidateField', 'fin');
            });
    });
    function data (json) {
        var data = [];
        var Internacional = 0;
        var Pabellon = 0;
        var Nacional = 0;
        var Regional = 0;
        $.each(json,function(index,val){
            console.log(val)
            if(val[3] == 'INTERNACIONAL')
                Internacional++;
            if(val[3] == 'PABELLÓN FONART')
                Pabellon++;
            if(val[3] == 'NACIONAL')
                Nacional++;
            if(val[3] == 'REGIONAL')
                Regional++;
        });

        data.push({label:'Internacional',value:Internacional});
        data.push({label:'Pabellon',value:Pabellon});
        data.push({label:'Nacional',value:Nacional});
        data.push({label:'Regional',value:Regional});
        return data;
    }
    </script>
@endsection