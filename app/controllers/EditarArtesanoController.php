<?php
class EditarArtesanoController extends BaseController {

public function ver(){
return View::make('artesano/editarartesano');
}

public function editar(){
$municipios = Municipio::all();
$municipiosArr = array();
foreach($municipios as $municipio)
{
$municipiosArr[$municipio->id] = $municipio->nombre;
}

$grupos = Gruposetnico::all();
$gruposArr = array();
foreach($grupos as $grupo)
{
$gruposArr[$grupo->id] = $grupo->nombre;
}

$ramas = Rama::all();
$ramasArr = array();
foreach($ramas as $rama)
{
$ramasArr[$rama->id] = $rama->nombre;
}
return View::make('artesano/updateArtesano')->with('municipios',$municipiosArr)->with('grupos',$gruposArr)->with('ramas',$ramasArr);
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
$artesano["documentos"]=Documento::where('persona_id','=',$artesano->persona_id)->get();
$artesano["compras"]=$artesano->comprasyventas()->get();
$artesano["organizacion"]=$artesano->organizacion;
$artesano["concursos"]=$artesano->concursos()->get();

		return Response::json($artesano);

	}

public function buscar2()
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

$artesano["persona"]["localidad_id"]=Localidad::find($artesano->persona->localidad_id)->id;
$artesano["persona"]["grupoetnico_id"]=Gruposetnico::find($artesano->persona->grupoetnico_id)->id;
$artesano["persona"]["rama_id"]=Rama::find($artesano->persona->rama_id)->id;
$artesano["documentos"]=Documento::where('persona_id','=',$artesano->persona_id)->get();
$artesano["compras"]=$artesano->comprasyventas()->get();
$artesano["organizacion"]=$artesano->organizacion;

		return Response::json($artesano);

	}

public function update() {

$personaArtesano = Persona::find(Input::get('persona_id')) -> update(array(
	'nombre' 		=> Input::get('nombre'),
	'curp' 			=> Input::get('curp'),
	'sexo' 			=> Input::get('sexo'),
	'fechanace' 	=> Input::get('nace'),
	'cuis' 			=> Input::get('cuis'),
	'cp' 			=> Input::get('cp'),
	'telefono' 		=> Input::get('tel'),
	'domicilio' 	=> Input::get('domicilio'),
	'lada' 			=> Input::get('lada'),
	'observaciones' => Input::get('observ'),
	'localidad' 	=> Input::get('localidad'),
	'grupo' 		=> Input::get('grupoetnico'),
	'rama' 			=> Input::get('rama'),
	'estado'		=> 'OAXACA',
));
$artesano = Artesano::where('persona_id','=',Input::get('persona_id')) -> update(array(
	'RFC' 			=> Input::get('RFC'),
	'estadocivil' 	=> Input::get('civil'),
	'ine' 			=> Input::get('ine'),
	'taller' 		=> Input::get('taller'),
	'tipotelefono' 	=> Input::get('tipoTel'),
	
	
));
}
}
