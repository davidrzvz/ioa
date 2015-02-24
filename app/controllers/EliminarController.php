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
				$artesano -> id,
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
				$persona -> id * -1,
				$persona -> nombre,
				$persona -> paterno,
				$persona -> materno,
				$persona -> fechanacimiento,
				$persona -> Rama -> nombre,
				$persona -> Grupoetnico -> nombre,
			);
		}
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
		return Response::json($data);
	}
}

?>