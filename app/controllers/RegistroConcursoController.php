<?php

class RegistroConcursoController extends BaseController {



	public function get_nuevo()
	{
		$concursos = Concurso::where('fecha','>',date('Y-m-d'))
		->orderBy('fecha','asc')
		->get();
		return View::make('artesano.registroConcurso')->with('concursos',$concursos);
	}
	

public function post_nuevo()
{

$Concurso = Concurso::create(array(
	'nombre'=> Input::get('concurso'), 
	'fecha'=> Input::get('fecha1'),
	'nivel'=> Input::get('nivel'), 
	'premiacion'=> Input::get('fecha2'))); 
	 
if(!is_null($Concurso))
	return Redirect::back()->with('status', 'ok_create');
else
	return Redirect::back()->with('status', 'fail_create');	

}}