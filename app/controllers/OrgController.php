<?php
class OrgController extends BaseController {
 	
    public function getIndex(){  
       return View::make('organizaciones/organizaciones')->with('organizaciones',Organizacion::all());
    }
    public function postListar()
    {
		$artesanos = Organizacion::find(Input::get('id')) -> artesanos() -> get();
		$artesanoArr = array();
		foreach ($artesanos as $artesano) {
			$artesanoArr [] = array(
				$artesano -> id,
				$artesano -> persona -> nombre,
				$artesano -> persona -> paterno,
				$artesano -> persona -> materno,
				$artesano -> persona -> fechanacimiento,
				$artesano -> rfc,
				
			);
		}
		$log = new Logs();
			$log->usuario = Auth::user()->username;
			$log->url =  Request::url();
			$log->recurso = json_encode($artesanos);
			$log->save();
		return Response::json($artesanoArr);
    }
    public function postEliminar()
    {
    	if(Artesano::find(Input::get('artesano')) -> Organizacion() -> detach(Input::get('organizacion')))return Response::json(array('success' => true));
    	else 
    		return Response::json(array('error' => true));
    }
}