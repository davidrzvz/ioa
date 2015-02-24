<?php
 
class eliminarEventosController extends BaseController {
 	
    public function verEventos(){
       
       return View::make('artesano/elmeventos')->with('ferias',Feria::all())->with('concursos',Concurso::all())->with('talleres',Taller::all());
    }

    public function EliminarConcurso()
		{
			$rules = array(
				'concurso' => 'integer|required',
				);
			$validation = Validator::make(Input::all(), $rules);
			if($validation->fails()){		
			  return Response::json(array('success' => false));
			}
			//buscamos el concurso en la base de datos segun la id enviada
			$concurso = Concurso::find(Input::get('concurso'));
			$concurso->delete();
			$log = new Logs();
			$log->usuario = Auth::user()->username;
			$log->url =  Request::url();
			$log->recurso = json_encode($concurso);
			$log->save();
			return Response::json(array('success' => true));
		}

    public function EliminarFeria()
		{
			$rules = array(
				'feria' => 'integer|required',
				);
			$validation = Validator::make(Input::all(), $rules);
			if($validation->fails()){		
			  return Response::json(array('success' => false));
			}
			//buscamos la feria en la base de datos segun la id enviada
			$feria = Feria::find(Input::get('feria'));
			$feria->delete();
			$log = new Logs();
			$log->usuario = Auth::user()->username;
			$log->url =  Request::url();
			$log->recurso = json_encode($feria);
			$log->save();
			return Response::json(array('success' => true));
		}

	public function EliminarTaller()
		{
			$rules = array(
				'taller' => 'integer|required',
				);
			$validation = Validator::make(Input::all(), $rules);
			if($validation->fails()){		
			  return Response::json(array('success' => false));
			}
			//buscamos el taller en la base de datos segun la id enviada
			$taller = Taller::find(Input::get('taller'));
			$taller->delete();
			$log = new Logs();
			$log->usuario = Auth::user()->username;
			$log->url =  Request::url();
			$log->recurso = json_encode($taller);
			$log->save();
			return Response::json(array('success' => true));
		}

   
}

?>