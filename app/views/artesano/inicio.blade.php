
@extends('layouts.baseartesanos')
@section('titulo') INSTITUTO OAXAQUEÑO DE LAS ARTESANÑIAS
@endsection 

@section('contenido')
<div class="container wellr col-sm-8 col-sm-offset-2">

    <div class="col-md-6 wellr">
        <div class="bg-orga col-md-12 text-center">REGISTRO DE ARTESANOS EN EL IOA</div>
        <div class="col-sm-6" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="artesano">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/userr.png"></img><br>
            {{ Form::label('pororg', 'REGISTRO ÚNICO') }}
            </a>
        </div>

        <div class="col-sm-6" style="text-align: center; margin: 0 auto;">
            <a  href="por">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/users.png"></img><br>
            {{ Form::label('pororg', 'POR ORGANIZACIÓN') }}
                           
            </a>
        </div>
    </div>    
    
 <div class="col-md-6 wellr">
        <div class="bg-orga col-md-12 text-center">MÁS ACCIONES</div>
        <div class="col-sm-6" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="reportes">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/report.png"></img><br>
            {{ Form::label('reportes', 'REPORTES') }}
            </a>
        </div>

        <div class="col-sm-6" style="text-align: center; margin: 0 auto;">
            <a  href="organizacion">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/orga.png"></img><br>
            {{ Form::label('org', 'REG. ORGANIZACIÓN') }}
                           
            </a>
        </div>
    </div>


<div class="container wellr col-sm-12">

    <div class="col-md-12">
        <div class="bg-orga col-md-12 text-center">REGISTRO A EVENTOS</div>
        <div class="col-sm-4" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="{{URL::to('personaConcurso');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/trophy.png"></img><br>
            {{ Form::label('concurso', 'CONCURSOS') }}
            </a>
        </div>

        <div class="col-sm-4" style="text-align: center; margin: 0 auto;">
            <a target="_self" href="{{URL::to('ArtesanoEnFeria');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/ferias.png"></img><br>
            {{ Form::label('feria', 'FERIAS') }}
            </a>
        </div>

        <div class="col-sm-4" style="text-align: center; margin: 0 auto;">
            <a  href="{{URL::to('ArtesanoEnTaller');}}">
            <img style="border: 0pt; margin-left: 0px; margin-bottom: 10px;" src="./imgs/grupo.png"></img><br>
            {{ Form::label('taller', 'TALLERES') }}
                           
            </a>
        </div>
    </div>    
      
</div>

  
</div>
@stop
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $("#menu-item-48096").addClass("current_page_item ");
    });
</script>
@stop