<?php

class RegistrarEventosController extends BaseController {

public function get_nuevo(){

		$concursos = Concurso::where('fecha','>',date('Y-m-d'))
		->orderBy('fecha','asc')
		->get();
		$ferias = Feria::where('fechafin','>',date('Y-m-d'))
		->orderBy('fechafin','asc')
		->get();
		$talleres = Taller::where('fechafin','>',date('Y-m-d'))
		->orderBy('fechafin','asc')
		->get();

		return View::make('artesano/registrareventos')->with('concursos',$concursos)->with('ferias',$ferias)->with('talleres',$talleres);
	}
public function feria(){

$Feria = Feria::create(array(
	'nombre'=> Input::get('ferianombre'), 
	'fechainicio'=> Input::get('fecha1'),
	'fechafin'=> Input::get('fecha2'),
	'tipo'=> Input::get('tipo'),
	'lugar'=> Input::get('ferialugar')));
$log = new Logs();
	$log->usuario = Auth::user()->username;
	$log->url =  Request::url();
	$log->recurso = json_encode($Feria);
	$log->save();

return Response::json(array('success' => true));
	 
}
public function taller(){

$Taller = Taller::create(array(
	'nombre'=> Input::get('tallernombre'), 
	'fechainicio'=> Input::get('fecha1'),
	'fechafin'=> Input::get('fecha2'),
	'maestro'=> Input::get('maestro'))); 
$log = new Logs();
	$log->usuario = Auth::user()->username;
	$log->url =  Request::url();
	$log->recurso = json_encode($Taller);
	$log->save();
return Response::json(array('success' => true));

}

public function concurso()
{

$Concurso = Concurso::create(array(
	'nombre'=> Input::get('concursonombre'), 
	'fecha'=> Input::get('fecha1'),
	'nivel'=> Input::get('nivel'), 
	'premiacion'=> Input::get('fecha2'))); 
$log = new Logs();
	$log->usuario = Auth::user()->username;
	$log->url =  Request::url();
	$log->recurso = json_encode($Concurso);
	$log->save();
return Response::json(array('success' => true));
}
}
