<?php
class RegistroenConcursoController extends BaseController {

	public function get_nuevo() {
		$municipios 	= 	Municipio::all();
		$municipiosArr 	= 	array();
		foreach($municipios as $municipio){
		$municipiosArr[$municipio->id] = $municipio->nombre;
		}
		
		$grupos 	= 	Gruposetnico::all();
		$gruposArr 	= 	array();
		foreach($grupos as $grupo){
		$gruposArr[$grupo->id] = $grupo->nombre;
		}

		$ramas 		= 	Rama::all();
		$ramasArr 	= 	array();
		foreach($ramas as $rama){
		$ramasArr[$rama->id] = $rama->nombre;
		}
		/*return View::make('artesano.personaConcurso')->with('municipios',$municipiosArr)->with('grupos',$gruposArr)->with('ramas',$ramasArr);*/

		$concursos = Concurso::where('fecha','>',date('Y-m-d'))
					->orderBy('fecha','asc')
					->get();
		return View::make('artesano.personaConcurso')->with('municipios',$municipiosArr)
		->with('grupos',$gruposArr)->with('ramas',$ramasArr)->with('concursos',$concursos);
	}

	public function post_nuevo(){
		///////////////////////////////////////////////////Artesano
		$persona = Persona::create(array(
			'nombre'			=> 	Input::get('nombre'),
			'curp' 				=> 	Input::get('curp'),
			'sexo'				=> 	Input::get('sexo'), 
			'cuis'				=> 	Input::get('cuis'),
			'cp'				=> 	Input::get('cp'), 
			'telefono'			=> 	Input::get('tel'), 
			'domicilio'			=> 	Input::get('domicilio'),
			'estado'			=> 	Input::get('estado'), 
			'lada'				=> 	Input::get('lada'), 
			'observaciones'		=> 	Input::get('observ'), 
			'fechanacimiento'	=> 	Input::get('fechanace'), 
			'grupoetnico_id'	=> 	Input::get('grupoetnico'), 
			'localidad_id'		=> 	Input::get('localidad'), 
			'rama_id'			=> 	Input::get('rama')));

		$persona = Persona::find($persona->id);
		$persona->Concursos()->attach(Input::get('concid'),
			array(
				'categoria' 	=> 	Input::get('categoria'),
				'pieza' 		=> 	Input::get('pieza'),
				'costounitario' => 	Input::get('costo'),
				'avaluo' 		=> 	Input::get('avaluo'),
				'entrego' 		=> 	Input::get('entrego'),
				'calidad' 		=> 	Input::get('calidad'),
				'recibio' 		=> 	Input::get('recibio'),
				'fecharegistro' => 	date('Y-m-d'),
				'observaciones' => 	Input::get('observ')
				));	
		return Response::json($persona);
	}
		
	public function buscaConcurso(){

		$nombre 	= Input::get('nombreconc');
		$fecha 		= Input::get('fechaprem');
		$concurso 	= Concurso::where('nombre','like',$nombre.'%','and')
						->where('fecha','=',$fecha)->get();
			
		return Response::json($concurso);
	}

	public function post_Curp(){
		$curp = $_POST['curp'];
		if(Persona::where('curp','=',$curp)->count()){
			$dato = array('success' => false,);
		}
		else{
			$dato = array('success' => true,);
		}
			return ($dato);
	}

	public function getConcursos(){
		$concursos = array();
		foreach (Concurso::all() as $concurso) {
			$concursos[$concurso->id] = $concurso->nombre;
		}
		return View::make('artesano.personaConcurso')
			->with('concursos',Concurso::where('fecha','>',date('Y-m-d'))
			->orderBy('fecha','asc')
			->get())->with('concursos',$concursos);
	}

	public function post_buscaconcursante(){
		$nombre = Input::get('artesanombre');
		$paterno = Input::get('artesapaterno');
		$materno = Input::get('artesamaterno');
		$fecha= Input::get('fechanace');

		$persona = Persona::where('nombre','like','%'.$nombre.'%','and')
		->where('nombre','like','%'.$paterno.'%','and')
		->where('nombre','like','%'.$materno.'%')
		->where('fechanacimiento','=',$fecha)->first();
		if($persona){
			$persona->artesano;
			return Response::json($persona);
		}
		else
			return Response::json(array('error'=>true));
	}
	
	public function post_personaconcursos(){
		if(Input::get('idartesano') == "")
			$objt = Persona::find(Input::get('idpersona'));
		else
			$objt = Artesano::find(Input::get('idartesano'));

		if(!is_null($objt->Concursos()->where('concurso_id','=',Input::get('concid'))->first()))
			return Response::json(array('error'=>true));
		$numeroregistro = DB::table('artesano_concurso')
			->select('numregistro')
			->where('concurso_id','=',Input::get('concid'))
			->orderBy('numregistro','desc')
			->first();
			if(is_null($numeroregistro))
				$numeroregistro = 20500;
			else
				$numeroregistro = $numeroregistro->numregistro;
		$numeroregistro2 = DB::table('concurso_persona')
			->select('numregistro')
			->where('concurso_id','=',Input::get('concid'))
			->orderBy('numregistro','desc')
			->first();
			if(is_null($numeroregistro2))
				$numeroregistro = 20500;
			else
				$numeroregistro2 = $numeroregistro2->numregistro;
		if($numeroregistro2 > $numeroregistro)
				$numeroregistro =	$numeroregistro2;			
			//return Response::json(array('nums'=>$numregistro));
		$objt->Concursos()->attach(Input::get('concid'),
			array(
				'categoria' 		=> 	Input::get('categoria'),
				'pieza' 			=> 	Input::get('pieza'),
				'costounitario' 	=> 	Input::get('costo'),
				'avaluo' 			=> 	Input::get('avaluo'),
				'entrego' 			=> 	Input::get('entrego'),
				'calidad' 			=> 	Input::get('calidad'),
				'recibio' 			=> 	Input::get('recibio'),
				'fecharegistro' 	=> 	date('Y-m-d'),
				'observaciones' 	=> 	Input::get('observ'),
				'numregistro'		=>	$numeroregistro+1
				));
		return Response::json(array('success'=>true));
	}
}
