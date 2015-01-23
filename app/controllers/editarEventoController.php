<?php
class EditarEventoController extends BaseController {


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

return View::make('artesano/editarEventos')->with('concursos',$concursos)->with('ferias',$ferias)->with('talleres',$talleres);
}
}
