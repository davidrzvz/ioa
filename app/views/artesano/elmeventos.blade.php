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
		
		
		
			


		<div class="col-sm-12">
			
			<div class="pull-left col-md-12 hidden" id="concursos">	
				<table id='concs' class="table table-hover table-first-column-number data-table display full">
					<thead>
					<tr>
					<th><i class="fa fa-sort-desc"></i></th>
					<th>Nombre del concurso <i class="fa fa-sort-desc"></i></th>
					<th>Fecha fin</th>
					<th>Nivel</th>
					<th>Premiación</th>
					<th>Acciones</th>
					</tr>
					</thead>
					<tbody>
						@if(isset($concursos))
    						@foreach($concursos as $concurso)
    				<tr>
    				<td>{{ $concurso->id }}</td>
    				<td>{{ $concurso->nombre }}</td>
    				<td>{{ $concurso->fecha }}</td>
    				<td>{{ $concurso->nivel }}</td>
    				<td>{{ $concurso->premiacion }}</td>
    				<td>
                        <button type="button" class="btn btn-danger btn-xs delete" title="{{$concurso->nombre}}" onclick="eliminar(this)">Eliminar</button> 
                    </td>
    				</tr>  
    						@endforeach 
						@endif	
					</tbody>
		</table>
	    	</div>

	    	<div class="pull-left col-md-12" id="ferias"> 
	    	<table id='feris' class="table table-hover table-first-column-number data-table display full">
				<thead>
				<tr>
				<th><i class="fa fa-sort-desc"></i></th>
				<th>Nombre de la feria <i class="fa fa-sort-desc"></i></th>
				<th>Lugar</th>
				<th>Tipo</th>
				<th>Fecha fin</th>
				<th>Acciones</th>
				</tr>
				</thead>
				<tbody>
					@if(isset($ferias))
						@foreach($ferias as $feria)
				<tr>
				<td>{{ $feria->id }}</td>
				<td>{{ $feria->nombre }}</td>
				<td>{{ $feria->lugar }}</td>
				<td>{{ $feria->tipo }}</td>
				<td>{{ $feria->fechafin }}</td>
				<td>
                    <button type="button" class="btn btn-danger btn-xs delete" title="{{$feria->nombre}}" onclick="eliminar2(this)">Eliminar</button> 
                </td>
				</tr>  
						@endforeach 
					@endif	
				</tbody>
			</table>
 
	    	</div>


	    	<div class="pull-left col-md-12 hidden" id="talleres">
	    		<table id='tallrs' class="table table-hover table-first-column-number data-table display full">
					<thead>
					<tr>
					<th><i class="fa fa-sort-desc"></i></th>
					<th>Nombre de la feria <i class="fa fa-sort-desc"></i></th>
					<th>Maestro</th>
					<th>Fecha inicio</th>
					<th>Fecha fin</th>
					<th>Acciones</th>
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
    				<td>
                        <button type="button" class="btn btn-danger btn-xs delete" title="{{$taller->nombre}}" onclick="eliminar3(this)">Eliminar</button> 
                    </td>
    				</tr>  
    						@endforeach 
						@endif	
					</tbody>
				</table>
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
{{  HTML::script('js/tables/jquery.dataTables.min.js'); }}
{{  HTML::script('js/tables/jquery.dataTables.bootstrap.js'); }}
{{  HTML::script('js/sweet-alert.js'); }}
<script type="text/javascript">
    $('#concs, #tallrs').dataTable( {
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
     $('#feris').dataTable( {
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
    $("#menu-item-48164").addClass("current_page_item ");
    });

function eliminar(btn) {
    swal({   title: "Estás seguro?",   text: "El concurso se borrará!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Sí, borrar", cancelButtonText: "¡No, cancelar!",   closeOnConfirm: false }, function(){
        $.post('{{URL::to("eventos/concurso");}}', {concurso:$(btn).closest("tr").find("td:nth-child(1)").text()}) 
                .done(function(json){
                swal('Concurso eliminado', null, "success");
                $(btn).closest("tr").remove();
                location.reload();
            })
            .fail(function(xhr, textStatus, errorThrown) {
                swal('Error', 'Existen artesanos registrados en el concurso, no se puede eliminar', "error");
            })
    });
}
function eliminar2(btn) {
    swal({   title: "Estás seguro?",   text: "La feria se borrará!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Sí, borrar", cancelButtonText: "¡No, cancelar!",   closeOnConfirm: false }, function(){
        $.post('{{URL::to("eventos/feria");}}', {feria:$(btn).closest("tr").find("td:nth-child(1)").text()}) 
                .done(function(json){
                swal('Feria eliminada', null, "success");
                $(btn).closest("tr").remove();
                location.reload();
            })
            .fail(function(xhr, textStatus, errorThrown) {
                swal('Error', 'Existen artesanos registrados en la feria, no se puede eliminar', "error");
            })
    });
}
function eliminar3(btn) {
    swal({   title: "Estás seguro?",   text: "El taller se borrará!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Sí, borrar", cancelButtonText: "¡No, cancelar!",   closeOnConfirm: false }, function(){
        $.post('{{URL::to("eventos/taller");}}', {taller:$(btn).closest("tr").find("td:nth-child(1)").text()}) 
                .done(function(json){
                swal('Taller eliminado', null, "success");
                $(btn).closest("tr").remove();
                location.reload();
            })
            .fail(function(xhr, textStatus, errorThrown) {
                swal('Error', 'Existen artesanos registrados en el taller, no se puede eliminar', "error");
            })
    });
}

</script>
@endsection 