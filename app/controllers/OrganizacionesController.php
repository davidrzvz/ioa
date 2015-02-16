<?php
 
class OrganizacionesController extends BaseController {
 	
    public function Organizaciones(){
       
       return View::make('catalogos/organizaciones')->with('organizaciones',Organizacion::all());
    }

    public function NuevaOrg(){
		$rules = array(
			'nombre' 	=> 'required',
			);
		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		  return Redirect::back()->withInput()->with('status', 'fail_create');
		}
		if(is_null(Organizacion::where('nombre','=',Input::get('nombre'))->first()) ){
			$org = new Organizacion;
				$org->nombre 	= Input::get('nombre');
			$org->save();
			return Response::json(array('success' => true));
		}
		else
			return Response::json(array('ocupado' => true));
	}
	public function UpdateOrg(){
		$rules = array(
			'nombre' 		=>	'required',
			'id'			=>	'integer|required',
			'tel' 			=>	'integer|required');
		
		$validation = Validator::make(Input::all(), $rules);
		if($validation->fails())
		{		
		 return Response::json(array('success' => false));
		}
		$org = Organizacion::where('nombre','=',Input::get('nombre'))->first();
		if(!is_null($org) )
			if($org->id != Input::get('id'))
					return Response::json(array('ocupado' => true));
			$org = Organizacion::find(Input::get('id'));
			$org->update(array(
				'nombre' 	=> Input::get('nombre'),
				'telefono' 	=> Input::get('tel'),
				));
		return Response::json(array('success' => true));
	}
	public function EliminarOrg()
		{
			$rules = array(
				'org' => 'integer|required',
				);
			$validation = Validator::make(Input::all(), $rules);
			if($validation->fails()){		
			  return Response::json(array('success' => false));
			}
			//buscamos la org en la base de datos segun la id enviada
			$org = Organizacion::find(Input::get('org'));
			$org->delete();
			return Response::json(array('success' => true));
		}

	
}


?>