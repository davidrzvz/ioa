<?php

class ReportesController extends BaseController {



	public function getIndex()
	{
		return View::make('reportes.reportes');
	}

	public function postReporte()
	{
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
			$sexoArr = array(
				'hombre' => count(Persona::where('sexo','=',$hombre) -> get()),
				'mujer' => count(Persona::where('sexo','=',$mujer) -> get()),
			);
		}

		$regionArr = array();
		if (($region1||$region2||$region3||$region4||$region5||$region6||$region7||$region8)!= null) {
			if(!is_null($region1)){
				$regionArr['Mixteca'] = count(ReportesController::get_personas(1));
			}
			if(!is_null($region2)){
				$regionArr['Valles'] = count(ReportesController::get_personas(2));
			}
			if(!is_null($region3)){
				$regionArr['Istmo'] = count(ReportesController::get_personas(3));
			}
			if(!is_null($region4)){
				$regionArr['Papaloapan'] = count(ReportesController::get_personas(4));
			}
			if(!is_null($region5)){
				$regionArr['Sierra Norte'] = count(ReportesController::get_personas(5));
			}
			if(!is_null($region6)){
				$regionArr['Sierra Sur'] = count(ReportesController::get_personas(6));
			}
			if(!is_null($region7)){
				$regionArr['Cañada'] = count(ReportesController::get_personas(7));
			}
			if(!is_null($region8)){
				$regionArr['Costa'] = count(ReportesController::get_personas(8));
			}
		}

		$ramaArr = array();
		$erer = '';
		if(($rama1||$rama2||$rama3||$rama4||$rama5||$rama6||$rama7||$rama8||$rama9||$rama10||$rama11||$rama12||$rama13||$rama14||$rama15||$rama16||$rama17)!= null){
			if(!is_null($rama1)){$ramaArr['Alfarería y cerámica'] = }
			if(!is_null($rama2)){$ramaArr['Textiles'] = }
			if(!is_null($rama3)){$ramaArr['Madera'] = }
			if(!is_null($rama4)){$ramaArr['Cerería'] = }
			if(!is_null($rama5)){$ramaArr['Metalisteria'] = }
			if(!is_null($rama6)){$ramaArr['Orfebreria'] = }
			if(!is_null($rama7)){$ramaArr['Joyería'] = }
			if(!is_null($rama8)){$ramaArr['Fibras vegetales'] = }
			if(!is_null($rama9)){$ramaArr['Cartoneria y papel'] = }
			if(!is_null($rama10)){$ramaArr['Talabartería y peletería'] = }
			if(!is_null($rama11)){$ramaArr['Maque y laca'] = }
			if(!is_null($rama12)){$ramaArr['Lapidaría y cantería'] = }
			if(!is_null($rama13)){$ramaArr['Arte huichol'] = }
			if(!is_null($rama14)){$ramaArr['Hueso y cuerno'] = }
			if(!is_null($rama15)){$ramaArr['Concha y caracoles'] = }
			if(!is_null($rama16)){$ramaArr['Vidrio'] = }
			if(!is_null($rama17)){$ramaArr['Plumaria'] = }
		}
		return Response::json($erer);
	}

	public function get_personas($id)
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
						$count[] = $persona;
					}
				}
			}
		}
		return $count;
	}
}
