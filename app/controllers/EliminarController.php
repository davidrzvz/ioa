<?php
 
class EliminarController extends BaseController {

	public function postFerias()
	{
		$id = Input::get('id');
		$artesanos = Feria::find($id) -> artesanos() -> get();
		$data = array();
		foreach ($artesanos as $artesano) {
			$data[] = array(
				$artesano -> id,
				$artesano -> persona -> nombre,
				$artesano -> persona -> paterno,
				$artesano -> persona -> materno,
				$artesano -> persona -> fechanacimiento,
				$artesano -> persona -> Rama -> nombre,
				$artesano -> persona -> Grupoetnico -> nombre,
			);
		}
		return Response::json($data);
	}

	public function postConcursos()
	{
		$id = Input::get('id');
		$artesanos = Concurso::find($id) -> artesanos() -> get();
		$personas = Concurso::find($id) -> personas() -> get();
		$data = array();
		foreach ($artesanos as $artesano) {
			$data[] = array(
				$artesano -> persona -> id,
				$artesano -> persona -> nombre,
				$artesano -> persona -> paterno,
				$artesano -> persona -> materno,
				$artesano -> persona -> fechanacimiento,
				$artesano -> persona -> Rama -> nombre,
				$artesano -> persona -> Grupoetnico -> nombre,
			);
		}
		foreach ($personas as $persona) {
			$data[] = array(
				$persona -> id,
				$persona -> nombre,
				$persona -> paterno,
				$persona -> materno,
				$persona -> fechanacimiento,
				$persona -> Rama -> nombre,
				$persona -> Grupoetnico -> nombre,
			);
		}
		$log = new Logs();
			$log->usuario = Auth::user()->username;
			$log->url =  Request::url();
			$log->recurso = json_encode($data);
			$log->save();
		return Response::json($data);
	}

	public function postTalleres()
	{
		$id = Input::get('id');
		$artesanos = Taller::find($id) -> artesanos() -> get();
		$data = array();
		foreach ($artesanos as $artesano) {
			$data[] = array(
				$artesano -> id,
				$artesano -> persona -> nombre,
				$artesano -> persona -> paterno,
				$artesano -> persona -> materno,
				$artesano -> persona -> fechanacimiento,
				$artesano -> persona -> Rama -> nombre,
				$artesano -> persona -> Grupoetnico -> nombre,
			);
		}
		$log = new Logs();
			$log->usuario = Auth::user()->username;
			$log->url =  Request::url();
			$log->recurso = json_encode($data);
			$log->save();
		return Response::json($data);
	}

	public function postDetachf()
	{
		$id_artesano = Input::get('id');
		$id_feria = Input::get('feria');
		$artesano = Artesano::find($id_artesano);
		$artesano -> ferias() -> detach($id_feria);
		$log = new Logs();
			$log->usuario = Auth::user()->username;
			$log->url =  Request::url();
			$log->recurso = json_encode($artesano);
			$log->save();
		return Response::json($artesano);
	}

	public function postDetachc()
	{
		$id_persona = Input::get('id');
		$id_concurso = Input::get('concurso');
		$persona = Persona::find($id_persona);
		if ($persona -> artesano) {
			$persona -> artesano -> Concursos() -> detach($id_concurso);
		}
		// else{
			$persona -> Concursos() -> detach($id_concurso);
		// }
			$log = new Logs();
			$log->usuario = Auth::user()->username;
			$log->url =  Request::url();
			$log->recurso = json_encode($id_persona);
			$log->save();
		return Response::json($id_persona);
	}

	public function postDetacht()
	{
		$id_artesano = Input::get('id');
		$id_taller = Input::get('taller');
		$artesano = Artesano::find($id_artesano);
		$artesano -> talleres() -> detach($id_taller);
		$log = new Logs();
			$log->usuario = Auth::user()->username;
			$log->url =  Request::url();
			$log->recurso = json_encode($artesano);
			$log->save();
		return Response::json($artesano);
	}
}

?>