<?php

class RegistroTallerController extends BaseController {



	public function get_nuevo()
	{
		$talleres = Taller::where('fechafin','>',date('Y-m-d'))
		->orderBy('fechafin','asc')
		->get();
		return View::make('artesano.taller')->with('talleres',$talleres);
		
	}

public function post_nuevo()
{

$Taller = Taller::create(array(
	'nombre'=> Input::get('taller'), 
	'fechainicio'=> Input::get('fecha1'),
	'fechafin'=> Input::get('fecha2'),
	'maestro'=> Input::get('maestro'))); 

if(!is_null($Taller))
	return Redirect::back()->with('status', 'ok_create');
else
	return Redirect::back()->with('status', 'fail_create');
	 

}
}
