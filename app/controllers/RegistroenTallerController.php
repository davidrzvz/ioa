<?php
class RegistroenTallerController extends BaseController {

public function get_nuevo()
	{
		$talleres = Taller::where('fechafin','>',date('Y-m-d'))
		->orderBy('fechafin','asc')
		->get();
		return View::make('artesano.ArtesanoEnTaller')->with('talleres',$talleres);
		
	}


	public function buscar()
{
$nombre = Input::get('artesanombre');
$paterno = Input::get('artesapaterno');
$materno = Input::get('artesamaterno');
$fecha= Input::get('fechanace');
$artesano = Artesano::whereHas('persona',function($q) use ($nombre,$paterno,$materno,$fecha)
{
$q->where('nombre','like','%'.$nombre.'%','and')
->where('nombre','like','%'.$paterno.'%','and')
->where('nombre','like','%'.$materno.'%')
->where('fechanacimiento','=',$fecha);
})
->first();

$artesano["persona"]["localidad_id"]=Localidad::find($artesano->persona->localidad_id)->nombre;
$artesano["persona"]["grupoetnico_id"]=Gruposetnico::find($artesano->persona->grupoetnico_id)->nombre;
$artesano["persona"]["rama_id"]=Rama::find($artesano->persona->rama_id)->nombre;
$artesano["organizacion"]=$artesano->organizacion;

		return Response::json($artesano);

	}
	public function post_personaconcursos(){
		if(Input::get('idartesano') == "")
			$objt = Persona::find(Input::get('idpersona'));
		else
			$objt = Artesano::find(Input::get('idartesano'));

		if(!is_null($objt->Concursos()->where('concurso_id','=',Input::get('concid'))->first()))
			return Response::json(array('error'=>true));

		$objt->Concursos()->attach(Input::get('concid'),
			array(
				'categoria' 		=> 	Input::get('categoria'),
				'pieza' 			=> 	Input::get('pieza'),
				'costounitario' 	=> 	Input::get('costo'),
				'avaluo' 			=> 	Input::get('avaluo'),
				'entrego' 			=> 	Input::get('entrego'),
				'calidad' 			=> 	Input::get('calidad'),
				'recibio' 			=> 	Input::get('recibio'),
				'fecharegistro' 	=> 	date('Y-m-d'),
				'observaciones' 	=> 	Input::get('observ')
				));
		return Response::json(array('success'=>true));
	}
}
