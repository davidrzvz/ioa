
@extends('layouts.baseartesanos')
@section('titulo') Reportes
@endsection
@section('contenido')

<div class="container wellr">
    <div class="col-sm-12">
    <form id="filtros">
        
        <div class="col-md-8 wellr col-md-offset-2">
            <h3>SELECCIONE 1 O MÁS OPCIONES EN AL MENOS 2 CATEGORÍAS</h3>
            <div class="bg-orga col-md-12 text-center">REGIONES</div>

            <label class="checkbox-inline">
              <input name="region1" type="checkbox" value="1"><strong> Mixteca</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region2" type="checkbox" value="2"><strong> Valles</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region3" type="checkbox" value="3"> <strong>Istmo</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region4" type="checkbox" value="4"><strong> Papaloapan</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region5" type="checkbox" value="5"> <strong>Sierra Norte</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region6" type="checkbox" value="6"> <strong>Sierra Sur</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region7" type="checkbox" value="7"><strong> Cañada</strong>
            </label>
            <label class="checkbox-inline">
              <input name="region8" type="checkbox" value="8"><strong> Costa</strong>
            </label>
        </div>


        <div class="row col-md-8 wellr col-md-offset-2">
            <div class="bg-orga col-md-12 text-center">RAMAS ARTESANALES</div>
            <label class="checkbox-inline">
              <input name="rama1" type="checkbox" value="1"> <strong>Rama 1
            </label>
            <label class="checkbox-inline">
              <input name="rama2" type="checkbox" value="2"> <strong>Rama 2</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama3" type="checkbox" value="3"> <strong>Rama 3</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama4" type="checkbox" value="4"> <strong>Rama 4</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama5" type="checkbox" value="5"> <strong>Rama 5</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama6" type="checkbox" value="6"> <strong>Rama 6</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama7" type="checkbox" value="7"> <strong>Rama 7</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama8" type="checkbox" value="8"> <strong>Rama 8</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama9" type="checkbox" value="9"> <strong>Rama 9</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama10" type="checkbox" value="10"> <strong>Rama 10</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama11" type="checkbox" value="11"> <strong>Rama 11</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama12" type="checkbox" value="12"> <strong>Rama 12</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama13" type="checkbox" value="13"> <strong>Rama 13</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama14" type="checkbox" value="14"> <strong>Rama 14</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama15" type="checkbox" value="15"> <strong>Rama 15</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama16" type="checkbox" value="16"> <strong>Rama 16</strong>
            </label>
            <label class="checkbox-inline">
              <input name="rama17" type="checkbox" value="17"> <strong>Rama 17</strong>
            </label>
        </div>

        <div class="wellr col-sm-2 col-md-offset-5">
           <div class="bg-orga col-md-12 text-center">GÉNERO</div>
            <label class="checkbox-inline">
              <input name="hombre" type="checkbox" value="Masculino"><strong> Hombres</strong>
            </label>
            <label class="checkbox-inline">
              <input name="mujer" type="checkbox" value="Femenino"><strong> Mujeres</strong>
            </label>
        </div>

        <div class="col-md-2 col-md-offset-5">
        <div class="col-md-12">
        <button type="button" class="btn btn-ioa" style="margin-top:10px;" onclick="reporte()"><i class="fa fa-line-chart"></i> Generar reporte</button>
        </div>
        </div>
    </form>
</div>
<div class="row">
            <div id="grafica1" class="col-md-5" style="height: 500px; margin-bottom: 20px;"></div>
            <div id="grafica2" class="col-md-5 col-md-offset-2" style="height: 500px; margin-bottom: 20px;"></div>
            <div id="grafica3" class="col-md-8" style="height: 500px; margin-bottom: 20px;"></div>
        </div>
</div>
@stop
@section('scripts')
    <script>
        function reporte () {
            $.post('reportes/reporte',$('#filtros').serialize(), function(json) {
                console.log(json);
                $('#grafica1').html('');
                $('#grafica2').html('');
                $('#grafica3').html('');
                if (json.sexo) {
                    Morris.Donut({
                        element: 'grafica1',
                        data: data(json.sexo),
                        backgroundColor: '#F7F7F7',
                        labelColor: '#2B2B2B',
                        colors: [
                            '#00CC00',
                            '#F50057',
                        ],
                    });
                };
                if (json.region) {
                    Morris.Bar({
                        element: 'grafica2',
                        data: data(json.region),
                        xkey: 'label',
                        ykeys: ['value'],
                        labels: ['Cantidad'],
                        xLabelAngle: 90,
                        barColor: [
                            '#00cc00',
                            '#3399ff',
                        ],
                    });
                };
                if (json.rama) {
                    Morris.Bar({
                        element: 'grafica3',
                        data: data(json.rama),
                        xkey: 'label',
                        ykeys: ['value'],
                        labels: ['Cantidad'],
                        xLabelAngle: 90,
                    });
                };
            }, 'json');
        }
        function data (json) {
            var data = [];
            ii = 0;
            $.each(json,function(index,i){
                var obj = {label:Object.keys(json)[ii++],value:i}
                data.push(obj);
            });
            return data;
        }
    </script>
@endsection