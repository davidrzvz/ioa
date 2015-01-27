<?php

class ReportesController extends BaseController {



	public function getIndex()
	{
		return View::make('reportes.reportes');
	}

	public function postReporte()
	{
		$data = array();
		$hombre = Input::get('hombre');
		$mujer = Input::get('mujer');
		$region1 = Input::get('region1');
		$region2 = Input::get('region2');
		$region3 = Input::get('region3');
		$region4 = Input::get('region4');
		$region5 = Input::get('region5');
		$region6 = Input::get('region6');
		$region7 = Input::get('region7');
		$region8 = Input::get('region8');
		$rama1 = Input::get('rama1');
		$rama2 = Input::get('rama2');
		$rama3 = Input::get('rama3');
		$rama4 = Input::get('rama4');
		$rama5 = Input::get('rama5');
		$rama6 = Input::get('rama6');
		$rama7 = Input::get('rama7');
		$rama8 = Input::get('rama8');
		$rama9 = Input::get('rama9');
		$rama10 = Input::get('rama10');
		$rama11 = Input::get('rama11');
		$rama12 = Input::get('rama12');
		$rama13 = Input::get('rama13');
		$rama14 = Input::get('rama14');
		$rama15 = Input::get('rama15');
		$rama16 = Input::get('rama16');
		$rama17 = Input::get('rama17');

		$sexoArr = array();
		if (($hombre || $mujer) != null) {
			$hombres = Artesano::whereHas('persona',function($q) use ($hombre)
			{$q->where('sexo','=',$hombre);})->get();
			$mujeres = Artesano::whereHas('persona',function($q) use ($mujer)
			{$q->where('sexo','=',$mujer);})->get();
			$sexoArr = array(
				'hombres' => count($hombres),
				'mujeres' => count($mujeres),
			);
		}

		$regionArr = array();
		if (($region1||$region2||$region3||$region4||$region5||$region6||$region7||$region8)!= null) {
			if(!is_null($region1)){ $regionArr['Mixteca'] = count(ReportesController::get_artesanos_region(1));}
			if(!is_null($region2)){ $regionArr['Valles'] = count(ReportesController::get_artesanos_region(2));}
			if(!is_null($region3)){ $regionArr['Istmo'] = count(ReportesController::get_artesanos_region(3));}
			if(!is_null($region4)){ $regionArr['Papaloapan'] = count(ReportesController::get_artesanos_region(4));}
			if(!is_null($region5)){ $regionArr['Sierra Norte'] = count(ReportesController::get_artesanos_region(5));}
			if(!is_null($region6)){ $regionArr['Sierra Sur'] = count(ReportesController::get_artesanos_region(6));}
			if(!is_null($region7)){ $regionArr['Cañada'] = count(ReportesController::get_artesanos_region(7));}
			if(!is_null($region8)){ $regionArr['Costa'] = count(ReportesController::get_artesanos_region(8));}
		}

		$ramaArr = array();
		if(($rama1||$rama2||$rama3||$rama4||$rama5||$rama6||$rama7||$rama8||$rama9||$rama10||$rama11||$rama12||$rama13||$rama14||$rama15||$rama16||$rama17)!= null){
			if(!is_null($rama1)){$ramaArr['Alfarería y cerámica'] = (ReportesController::get_artesanos_ramas(1));}
			if(!is_null($rama2)){$ramaArr['Textiles'] = (ReportesController::get_artesanos_ramas(2));}
			if(!is_null($rama3)){$ramaArr['Madera'] = (ReportesController::get_artesanos_ramas(3));}
			if(!is_null($rama4)){$ramaArr['Cerería'] = (ReportesController::get_artesanos_ramas(4));}
			if(!is_null($rama5)){$ramaArr['Metalisteria'] = (ReportesController::get_artesanos_ramas(5));}
			if(!is_null($rama6)){$ramaArr['Orfebreria'] = (ReportesController::get_artesanos_ramas(6));}
			if(!is_null($rama7)){$ramaArr['Joyería'] = (ReportesController::get_artesanos_ramas(7));}
			if(!is_null($rama8)){$ramaArr['Fibras vegetales'] = (ReportesController::get_artesanos_ramas(8));}
			if(!is_null($rama9)){$ramaArr['Cartoneria y papel'] = (ReportesController::get_artesanos_ramas(9));}
			if(!is_null($rama10)){$ramaArr['Talabartería y peletería'] = (ReportesController::get_artesanos_ramas(10));}
			if(!is_null($rama11)){$ramaArr['Maque y laca'] = (ReportesController::get_artesanos_ramas(11));}
			if(!is_null($rama12)){$ramaArr['Lapidaría y cantería'] = (ReportesController::get_artesanos_ramas(12));}
			if(!is_null($rama13)){$ramaArr['Arte huichol'] = (ReportesController::get_artesanos_ramas(13));}
			if(!is_null($rama14)){$ramaArr['Hueso y cuerno'] = (ReportesController::get_artesanos_ramas(14));}
			if(!is_null($rama15)){$ramaArr['Concha y caracoles'] = (ReportesController::get_artesanos_ramas(15));}
			if(!is_null($rama16)){$ramaArr['Vidrio'] = (ReportesController::get_artesanos_ramas(16));}
			if(!is_null($rama17)){$ramaArr['Plumaria'] = (ReportesController::get_artesanos_ramas(17));}
		}
		if(($sexoArr||$regionArr||$ramaArr) != null){
			if ($sexoArr != null) { $data['sexo'] = $sexoArr;}
			if ($regionArr != null) { $data['region'] = $regionArr;}
			if ($ramaArr != null) { $data['rama'] = $ramaArr;}
		}
		return Response::json($data);
	}

	public function get_artesanos_region($id)
	{
		$count = array();
		$distritos = Region::find($id) -> distritos;
		foreach ($distritos as $distrito) {
			$municipios = $distrito -> municipios;
			foreach ($municipios as $municipio) {
				$localidades = $municipio -> localidades;
				foreach ($localidades as $localidad) {
					$personas = $localidad -> personas;
					foreach ($personas as $persona) {
						if ($persona -> artesano) {
							$count[] = $persona;
						}
					}
				}
			}
		}
		return $count;
	}
	public function get_artesanos_ramas($id)
	{
		$cc = 0;
		$personas = Rama::find($id) -> personas() -> get();
		foreach ($personas as $persona) {
			if ($persona -> artesano) {
				$cc++;
			}
		}
		return $cc;
	}
	public function getFerias(){
		return View::make('reportes.ferias');
	}
	public function postFerias(){
		$fechainicio 	= Input::get('inicio');
		$fechafin 		= Input::get('fin');

		$ferias = Feria::where('fechainicio','>=',$fechainicio)->where('fechafin','<=',$fechafin)->get();
		$data = array();
		foreach ($ferias as $feria) {
			$data[] = array($feria->nombre,$feria->fechainicio,$feria->fechafin,$feria->tipo,$feria->lugar);
		}
		return Response::json($data);
	}
}
