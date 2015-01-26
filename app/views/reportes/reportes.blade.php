
@extends('layouts.baseartesanos')
@section('titulo') Reportes
@endsection
@section('contenido')
    <form id="filtros" class="col-md-12">
        <div class="row col-md-12">
            <label class="checkbox-inline">
              <input name="hombre" type="checkbox" value="Masculino"> Hombres
            </label>
            <label class="checkbox-inline">
              <input name="mujer" type="checkbox" value="Femenino"> Mujeres
            </label>
        </div>
        <hr>
        <div class="row col-md-12">
            <label class="checkbox-inline">
              <input name="region1" type="checkbox" value="1"> Mixteca
            </label>
            <label class="checkbox-inline">
              <input name="region2" type="checkbox" value="2"> Valles
            </label>
            <label class="checkbox-inline">
              <input name="region3" type="checkbox" value="3"> Istmo
            </label>
            <label class="checkbox-inline">
              <input name="region4" type="checkbox" value="4"> Papaloapan
            </label>
            <label class="checkbox-inline">
              <input name="region5" type="checkbox" value="5"> Sierra Norte
            </label>
            <label class="checkbox-inline">
              <input name="region6" type="checkbox" value="6"> Sierra Sur
            </label>
            <label class="checkbox-inline">
              <input name="region7" type="checkbox" value="7"> Cañada
            </label>
            <label class="checkbox-inline">
              <input name="region8" type="checkbox" value="8"> Costa
            </label>
        </div>
        <div class="row col-md-12">
            <hr>
            <label class="checkbox-inline">
              <input name="rama1" type="checkbox" value="1"> Rama 1
            </label>
            <label class="checkbox-inline">
              <input name="rama2" type="checkbox" value="2"> Rama 2
            </label>
            <label class="checkbox-inline">
              <input name="rama3" type="checkbox" value="3"> Rama 3
            </label>
            <label class="checkbox-inline">
              <input name="rama4" type="checkbox" value="4"> Rama 4
            </label>
            <label class="checkbox-inline">
              <input name="rama5" type="checkbox" value="5"> Rama 5
            </label>
            <label class="checkbox-inline">
              <input name="rama6" type="checkbox" value="6"> Rama 6
            </label>
            <label class="checkbox-inline">
              <input name="rama7" type="checkbox" value="7"> Rama 7
            </label>
            <label class="checkbox-inline">
              <input name="rama8" type="checkbox" value="8"> Rama 8
            </label>
            <label class="checkbox-inline">
              <input name="rama9" type="checkbox" value="9"> Rama 9
            </label>
            <label class="checkbox-inline">
              <input name="rama10" type="checkbox" value="10"> Rama 10
            </label>
            <label class="checkbox-inline">
              <input name="rama11" type="checkbox" value="11"> Rama 11
            </label>
            <label class="checkbox-inline">
              <input name="rama12" type="checkbox" value="12"> Rama 12
            </label>
            <label class="checkbox-inline">
              <input name="rama13" type="checkbox" value="13"> Rama 13
            </label>
            <label class="checkbox-inline">
              <input name="rama14" type="checkbox" value="14"> Rama 14
            </label>
            <label class="checkbox-inline">
              <input name="rama15" type="checkbox" value="15"> Rama 15
            </label>
            <label class="checkbox-inline">
              <input name="rama16" type="checkbox" value="16"> Rama 16
            </label>
            <label class="checkbox-inline">
              <input name="rama17" type="checkbox" value="17"> Rama 17
            </label>
        </div>
        <button type="button" class="btn btn-xs btn-ioa" style="margin-top:10px;" onclick="reporte()"><i class="fa fa-line-chart"></i> Generar reporte</button>
        <div class="row">
            <div id="grafica1" class="col-md-6" style="height: 500px; margin-bottom: 20px;"></div>
            <div id="grafica2" class="col-md-6" style="height: 500px; margin-bottom: 20px;"></div>
            <div id="grafica3" class="col-md-12" style="height: 500px; margin-bottom: 20px;"></div>
        </div>
    </form>
@stop
@section('scripts')
    <script>
        function reporte () {
            $.post('reportes/reporte',$('#filtros').serialize(), function(json) {
                // console.log(json);
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
                            '#2196F3',
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
                        labels: ['Mixteca'],
                        xLabelAngle: 90,
                        barColors : ['#987543' ,'#826496'],
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
            console.log(data);
            return data;
        }
    </script>
@endsection