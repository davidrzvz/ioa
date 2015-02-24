@extends('layouts.baseartesanos')
@section('titulo') Talleres
@endsection 
 
@section('contenido')
    <div class="container wellr">
        
        <div class="col-md-12">
            <div class="col-md-8">
            <h3 style="margin-bottom:20px;"><i class="fa  fa-sitemap"></i><strong> Eliminar artesanos de talleres</strong></h3>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 wellr">
        <table id='tallrs' class="table table-hover table-first-column-number data-table display full">
                    <thead>
                    <tr>
                    <th><i class="fa fa-sort-desc"></i></th>
                    <th>Nombre de la feria <i class="fa fa-sort-desc"></i></th>
                    <th>Maestro</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(isset($talleres))
                            @foreach($talleres as $taller)
                    <tr>
                    <td>{{ $taller->id }}</td>
                    <td>{{ $taller->nombre }}</td>
                    <td>{{ $taller->maestro }}</td>
                    <td>{{ $taller->fechainicio }}</td>
                    <td>{{ $taller->fechafin }}</td>
                    
                    </tr>  
                            @endforeach 
                        @endif  
                    </tbody>
                </table>

    </div>
    <div class="col-md-10 col-md-offset-1 wellr hidden" id="datos">
            <div id="organizacion">
                
            </div>
            <div id="taller">
                
            </div>
            <div id="artesanos">
                
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
{{  HTML::script('js/tables/jquery.dataTables.min.js'); }}
{{  HTML::script('js/tables/jquery.dataTables.bootstrap.js'); }}
{{  HTML::script('js/bootstrapValidator.js'); }}
{{  HTML::script('js/sweet-alert.js'); }}
<script type="text/javascript">
    $('#tallrs').dataTable( {
        "language": {
            "lengthMenu": "Elementos por página _MENU_",
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
</script>
    <script type="text/javascript">
$(document).ready(function() {
    
$('#tallrs').addClass('active');


function datos(tr){
    var id = $(tr).find("td:nth-child(1)").text();
    $('#taller').html('<h1>Taller: '+$(tr).find("td:nth-child(2)").text()+'</h1><h2>Maestro: '+$(tr).find("td:nth-child(3)").text()+'</h2>');
    $.post('{{URL::to("taller");}}','id='+id, function(json) {
            if(json.artesanos.length > 0)
                $('#datos').removeClass('hidden');
            else
                swal('Error','No se encontraron registros','error');
            $('#artesanos').html('<table id="tartesanos" class="table table-hover table-first-column-number data-table display full"></table>');
            $('#tartesanos').dataTable( {
              "data": json.artesanos,
              "columns": [
                          { "title": "Nombre" },
                          { "title": "Apellido paterno" },
                          { "title": "Apellido materno" },
                          { "title": "Fecha nace" },
                          { "title": "Sexo" },
                          { "title": "Cuis" },
                          { "title": "Telefono" },
                      ],
              "language": {
                    "lengthMenu": "concursantes por página _MENU_",
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
                },
                dom: 'T<"clear">lfrtip',
                tableTools : {
                    "sSwfPath": "{{URL::to('swf/copy_csv_xls_pdf.swf')}}",
                    aButtons: [
                        "copy",
                        "xls",
                        {
                            "sExtends": "pdf",
                            "sPdfOrientation": "landscape",
                            "sPdfMessage": 'PDF'
                        },
                    ]
                },
            } );
        }, 'json').fail(function(){
            $('#grafica').addClass('hidden');
            swal('Error','No se encontró','error');
        });
}
</script>

@stop