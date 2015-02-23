@extends('layouts.baseartesanos')
@section('titulo') Grupos Etnicos
@endsection 
 
@section('contenido')
    <div class="container wellr col-md-8 col-sm-offset-2">
        
        <div class="col-md-12">
            <div class="col-md-8">
            <h3 style="margin-bottom:20px;"><i class="fa  fa-sitemap"></i><strong> Grupos Étnicos</strong></h3>
            </div>
            <div class="col-md-2" style="margin-top:10px;">
            <button type="button" class="btn btn-success" id="bnuevo"><i class="fa fa-plus fa-lg"></i> Nuevo</button>
            </div> 
        </div>
        <div class="col-md-9 col-md-offset-1 wellr">
        <table id='grupos'class="table table-hover table-first-column-number data-table display full">
            <thead>
                <tr>
                    <th><i class="fa fa-sort-desc"></i></th>
                    <th>Nombre de la grupo <i class="fa fa-sort-desc"></i></th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($grupos))
                    @foreach($grupos as $grupo)
                    <tr>
                    <td>{{ $grupo->id }}</td>
                    <td>{{ $grupo->nombre }}</td>
                    <td>
                        <button type="button" onclick="editar(this)" class="btn btn-ioa select btn-xs">Editar</button>
                        <button type="button" class="btn btn-danger btn-xs delete" title="{{$grupo->nombre}}" onclick="eliminar(this)">Eliminar</button> 
                    </td>
                    </tr>  
                    @endforeach 
                @endif  
            </tbody>
        </table>
    </div>


    <!-- Modal -->
  <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="grupo">
            <i class="fa fa-pencil-square-o fa-lg"></i> grupo
          </h4>
        </div>
        {{ Form::open(array('url' => 'gruposetnicos/nuevogrupo','role' => 'form','id' => 'nuevo-grupo','class' => '')) }}
        <div class="modal-body">
            <center>
            <h2 name="name"><i class="fa fa-pencil"></i> Nuevo grupo</h2>
            <i class="fa fa-refresh fa-spin hidden fa-2x"></i>
            </center>            
            <div class="form-group">  
              {{ Form::label('nombre', 'Nombre',array('class' => 'control-label')) }}
              {{ Form::text('nombre', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
            </div>
        </div>
        <div class="modal-footer">
            <button id='bcancelar' type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            {{ Form::button('<i class="fa fa-floppy-o "></i> Guardar',array('class' => 'btn btn-success','id' => 'guardar','type' => 'submit')) }}
        </div> 
        {{ Form::close() }}
      </div>
    </div>
  </div>
  <!-- End Modal -->
<!-- Modal -->
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="examen">
            <i class="fa fa-pencil-square-o fa-lg"></i> grupo
          </h4>
        </div>
        {{ Form::open(array('url' => 'gruposetnicos/updategrupo','role' => 'form','id' => 'edit','class' => '')) }}
        <div class="modal-body">
            <center>
            <h2 name="name"><i class="fa fa-pencil"></i> grupo</h2>
            <i class="fa fa-refresh fa-spin hidden fa-2x"></i>
            </center>      
            {{ Form::text('id', null, array('class' => 'hidden')) }}      
            <div class="form-group">  
              {{ Form::label('nombre', 'Nombre',array('class' => 'control-label')) }}
              {{ Form::text('nombre', null, array('placeholder' => 'introduce nombre','class' => 'form-control')) }}
            </div>

        </div>
        <div class="modal-footer">
            <button id='bcancelar' type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            {{ Form::button('<i class="fa fa-floppy-o "></i> Guardar',array('class' => 'btn btn-success','id' => 'guardar','type' => 'submit')) }}
        </div> 
        {{ Form::close() }}
      </div>
    </div>
  </div>
  <!-- End Modal -->

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
{{  HTML::script('js/es_ES.js'); }}
{{  HTML::script('js/sweet-alert.js'); }}
<script type="text/javascript">
    $('#grupos').dataTable( {
        "language": {
            "lengthMenu": "grupos por página _MENU_",
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
    $('#nuevo-grupo').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok nombre',
            invalid: 'glyphicon glyphicon-remove nombre',
            validating: 'glyphicon glyphicon-refresh nombre'
        },
        fields: {
            enabled: false,
            nombre: {
                validators: {
                    notEmpty: {
                    },
                    stringLength:{
                      max: 15,
                    }
                }
            },
        }
    })
    .on('success.form.bv', function(e) {
        e.preventDefault();
        $('.fa-refresh').removeClass('hidden');
        $.post($('#nuevo-grupo').attr('action'),$('#nuevo-grupo').serialize(), function(json) {
                $('#nuevo').modal('hide');
                if(json.success)
                    swal({
                        title: 'Operacion completada correctamente',
                        text: '',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#AEDEF4',
                        confirmButtonText: 'OK',
                        cancelButtonText: 'No, regresar a revisar',
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                        window.location.reload();
                    });
                if(json.ocupado)
                    swal('Error','Ya existe un grupo con ese nombre', "error");
            $('.fa-refresh').addClass('hidden');    
            }, 'json');
    });
    $('#edit').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok nombre',
            invalid: 'glyphicon glyphicon-remove nombre',
            validating: 'glyphicon glyphicon-refresh nombre'
        },
        fields: {
            enabled: false,
            nombre: {
                validators: {
                    notEmpty: {
                    }
                }
            },
            enabled: false,
            precio: {
                validators: {
                    notEmpty: {
                    },
                    integer: {
                    }
                }
            }
        }
    })
    .on('success.form.bv', function(e) {
        e.preventDefault();
        $('.fa-refresh').removeClass('hidden');
        $.post($('#edit').attr('action'),$('#edit').serialize(), function(json) {
                $('#editar').modal('hide');
                if(json.success)
                    swal({
                        title: 'Operacion completada correctamente',
                        text: '',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#AEDEF4',
                        confirmButtonText: 'OK',
                        cancelButtonText: 'No, regresar a revisar',
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                        window.location.reload();
                    });
                if(json.ocupado)
                    swal('Error','Ya existe un grupo con ese nombre', "error");
            $('.fa-refresh').addClass('hidden');    
            }, 'json');
    });
});
$('#bnuevo').click(function(){
    $('#nuevo').modal('show');
    $("tbody").find('tr').removeClass('danger').find('button').attr('disabled',false);
    $('[name = name]').html('<i class="fa fa-pencil"></i> Nuevo grupo');
    $('[name = nombre]').val('');
});
$('#nuevo').on('hide.bs.modal', function() {
    $('#nuevo-grupo').bootstrapValidator('resetForm', true);
});
$('#editar').on('hide.bs.modal', function() {
    $('#edit').bootstrapValidator('resetForm', true);
    $("tbody").find('tr').removeClass('danger').find('button').attr('disabled',false);
});
$('#grupos, #2grupos').addClass('active');
function editar(btn){
    $(btn).closest("tbody").find('tr').removeClass('danger').find('button').attr('disabled',false);
    $(btn).attr('disabled',true).closest("tr").addClass('danger');
    $('#editar').modal('show');
    $('[name = name]').text($(btn).closest("tr").find("td:nth-child(2)").text());
    $('[name = id]').val($(btn).closest("tr").find("td:nth-child(1)").text());
    $('[name = nombre]').val($(btn).closest("tr").find("td:nth-child(2)").text());
}
function eliminar(btn) {
    swal({   title: "Estás seguro?",   text: "El grupo sólo se puede eliminar si no hay artesanos que pertenecen a el!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Sí, borrar", cancelButtonText: "¡No, cancelar!",   closeOnConfirm: false }, function(){
        
        $.post('{{URL::to("gruposetnicos/delete");}}', {grupo:$(btn).closest("tr").find("td:nth-child(1)").text()}
            .done(function(json){
                swal('Grupo Étnico eliminado', null, "success");
                $(btn).closest("tr").remove();
                location.reload();
            })
            .fail(function(xhr, textStatus, errorThrown) {
                swal('Error', 'Existen artesanos registrados en el Grupo Étnico, no se puede eliminar', "error");
            })
    });
}

</script>


@stop