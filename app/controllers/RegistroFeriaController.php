<?php

class RegistroFeriaController extends BaseController {



	public function get_nuevo()
	{
		$ferias = Feria::where('fechafin','>',date('Y-m-d'))
		->orderBy('fechafin','asc')
		->get();
		return View::make('artesano.Feria')->with('ferias',$ferias);
	}

public function post_nuevo()
{


$Feria = Feria::create(array(
	'nombre'=> Input::get('feria'), 
	'fechainicio'=> Input::get('fecha1'),
	'fechafin'=> Input::get('fecha2'),
	'tipo'=> Input::get('tipo'),
	'lugar'=> Input::get('lugar')));

	
if(!is_null($Feria))
	return Redirect::back()->with('status', 'ok_create');
else
	return Redirect::back()->with('status', 'fail_create');
	 
}

public function post_updateFeria(){
	
}
}