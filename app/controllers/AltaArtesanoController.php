<?php

class AltaArtesanoController extends BaseController {



	public function get_nuevo()
	{
		$municipios = Municipio::all();
		$municipiosArr = array();
		foreach($municipios as $municipio)
		{
		$municipiosArr[$municipio->id] = $municipio->nombre;
		}
		
		$grupos = Gruposetnico::all();
		$gruposArr = array();
		foreach($grupos as $grupo)
		{
		$gruposArr[$grupo->id] = $grupo->nombre;
		}

		$ramas = Rama::all();
		$ramasArr = array();
		foreach($ramas as $rama)
		{
		$ramasArr[$rama->id] = $rama->nombre;
		}
		return View::make('artesano.registroArtesano')->with('municipios',$municipiosArr)->with('grupos',$gruposArr)->with('ramas',$ramasArr);

	}

	public function get_nuevopor()
	{

		$municipios = Municipio::all();
		$municipiosArr = array();
		foreach($municipios as $municipio)
		{
		$municipiosArr[$municipio->id] = $municipio->nombre;
		}
		
		$grupos = Gruposetnico::all();
		$gruposArr = array();
		foreach($grupos as $grupo)
		{
		$gruposArr[$grupo->id] = $grupo->nombre;
		}

		$ramas = Rama::all();
		$ramasArr = array();
		foreach($ramas as $rama)
		{
		$ramasArr[$rama->id] = $rama->nombre;
		}
		return View::make('artesano.PorOrganizacion')->with('municipios',$municipiosArr)->with('grupos',$gruposArr)->with('ramas',$ramasArr);
	}

	public function post_nuevo()
	{
	///////////////////////////////////////////////////Artesano
		$personaArtesano = Persona::create(array(
			'nombre'			=> Input::get('nombre'),
			'curp' 				=> Input::get('curp'),
			'sexo'				=> Input::get('sexo'), 
			'cuis'				=> Input::get('cuis'),
			'cp'				=> Input::get('cp'), 
			'telefono'			=> Input::get('tel'), 
			'domicilio'			=> Input::get('domicilio'), 
			'lada'				=> Input::get('lada'), 
			'observaciones'		=> Input::get('observ'), 
			'fechanacimiento'	=> Input::get('fechanace'), 
			'grupoetnico_id'	=> Input::get('grupoetnico'), 
			'localidad_id'		=> Input::get('localidad'),
			'estado'			=> 'OAXACA', 
			'rama_id'			=> Input::get('rama')));

		$artesano = Artesano::create(array(
			'persona_id' 	=> $personaArtesano->id,
		    'ine'			=> Input::get('ine'),
			'RFC' 			=> Input::get('RFC'),
			'estadocivil' 	=> Input::get('civil'),
			'fecharegistro' => date('Y-m-d'),
			'taller' 		=> Input::get('taller'),
			'tipotelefono' 	=> Input::get('tipoTel'),
			'observaciones' => Input::get('observ'),
			));

			$checks = array();
			$checks[] = Input::get('matprim1');
			$checks[] = Input::get('matprim2');
			$checks[] = Input::get('matprim3');
			$checks[] = Input::get('venta1');
			$checks[] = Input::get('venta2');
			$checks[] = Input::get('venta3');
			$checks[] = Input::get('compr1');
			$checks[] = Input::get('compr2');
			$checks[] = Input::get('compr3');

			$artesano = Artesano::find($artesano->id);

			foreach ($checks as $check) {
				if ($check != '') {
					$artesano->comprasyventas()->attach($check);	
				}
			}
		
		$producto = Producto::create(array(
			'artesano_id' => $artesano->id,
		    'nombre'=> Input::get('producto1'),
			'produccionmensual' => Input::get('prod1'),
			'costoaprox' => Input::get('costo1'),));

		if (Input::file("fotoperfil") != '') {
			$file = Input::file("fotoperfil")->move("imgs/perfil/",$personaArtesano->id.'.'.Input::file('fotoperfil')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'Foto del artesano';
			$documento -> ruta = 'imgs/perfil/'.$personaArtesano->id.'.'.Input::file('fotoperfil')->guessClientExtension();
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();
		}
		else{
			$documento = new Documento;
			$documento -> nombre = 'Foto del artesano';
			$documento -> ruta = 'imgs/perfil/default.png';
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();
		}

		if (Input::file("curppic") != '') {
			$file = Input::file("curppic")->move("imgs/curps/",$personaArtesano->id.'.'.Input::file('curppic')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'CURP';
			$documento -> ruta = 'imgs/curps/'.$personaArtesano->id.'.'.Input::file('curppic')->guessClientExtension();
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();
		}
		
		if (Input::file("inepic") != '') {
			$file = Input::file("inepic")->move("imgs/ine/",$personaArtesano->id.'.'.Input::file('inepic')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'Credencial INE';
			$documento -> ruta = 'imgs/ine/'.$personaArtesano->id.'.'.Input::file('inepic')->guessClientExtension();
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();
		}
		if (Input::file("actapic") != '') {
			$file = Input::file("actapic")->move("imgs/actas/",$personaArtesano->id.'.'.Input::file('actapic')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'Acta de nacimiento';
			$documento -> ruta = 'imgs/actas/'.$personaArtesano->id.'.'.Input::file('actapic')->guessClientExtension();
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();
		}
	return Response::json(array('success' => true,'artesano' => $personaArtesano));
	}

	public function post_nuevopor()
	{
		///////////////////////////////////////////////////Artesano
		$personaArtesano = Persona::create(array(
			'nombre'=> Input::get('nombre'),
			'curp' => Input::get('curp'),
			'sexo'=> Input::get('sexo'), 
			'cuis'=> Input::get('cuis'),
			'cp'=> Input::get('cp'), 
			'telefono'=> Input::get('tel'), 
			'domicilio'=> Input::get('domicilio'), 
			'lada'=> Input::get('lada'), 
			'observaciones'=> Input::get('observ'), 
			'fechanacimiento'=> Input::get('fechanace'), 
			'grupoetnico_id'=> Input::get('grupoetnico'), 
			'localidad_id'=> Input::get('localidad'), 
			'rama_id'=> Input::get('rama')));

		$artesano = Artesano::create(array(
			'persona_id' => $personaArtesano->id,
		    'ine'=> Input::get('ine'),
			'RFC' => Input::get('RFC'),
			'estadocivil' => Input::get('civil'),
			'fecharegistro' => date('Y-m-d'),
			'taller' => Input::get('taller'),
			'tipotelefono' => Input::get('tipoTel'),
			'observaciones' => Input::get('observ'),
			));

			$checks = array();
			$checks[] = Input::get('matprim1');
			$checks[] = Input::get('matprim2');
			$checks[] = Input::get('matprim3');
			$checks[] = Input::get('venta1');
			$checks[] = Input::get('venta2');
			$checks[] = Input::get('venta3');
			$checks[] = Input::get('compr1');
			$checks[] = Input::get('compr2');
			$checks[] = Input::get('compr3');

			$artesano = Artesano::find($artesano->id);

			foreach ($checks as $check) {
				if ($check != '') {
					$artesano->comprasyventas()->attach($check);	
				}
			}

			if (Input::file("fotoperfil") != '') {
				$file = Input::file("fotoperfil")->move("imgs/perfil/",$personaArtesano->id.'.'.Input::file('fotoperfil')->guessClientExtension());
				$documento = new Documento;
				$documento -> nombre = 'Foto del artesano';
				$documento -> ruta = 'imgs/perfil/'.$personaArtesano->id.'.'.Input::file('fotoperfil')->guessClientExtension();
				$documento -> persona_id = $personaArtesano->id;
				$documento -> save();
			}
			else{
				$documento = new Documento;
				$documento -> nombre = 'Foto del artesano';
				$documento -> ruta = 'imgs/perfil/default.png';
				$documento -> persona_id = $personaArtesano->id;
				$documento -> save();
			}

			if (Input::file("curppic") != '') {
				$file = Input::file("curppic")->move("imgs/curps/",$personaArtesano->id.'.'.Input::file('curppic')->guessClientExtension());
				$documento = new Documento;
				$documento -> nombre = 'CURP';
				$documento -> ruta = 'imgs/curps/'.$personaArtesano->id.'.'.Input::file('curppic')->guessClientExtension();
				$documento -> persona_id = $personaArtesano->id;
				$documento -> save();
			}

			if (Input::file("inepic") != '') {
				$file = Input::file("inepic")->move("imgs/ine/",$personaArtesano->id.'.'.Input::file('inepic')->guessClientExtension());
				$documento = new Documento;
				$documento -> nombre = 'Credencial INE';
				$documento -> ruta = 'imgs/ine/'.$personaArtesano->id.'.'.Input::file('inepic')->guessClientExtension();
				$documento -> persona_id = $personaArtesano->id;
				$documento -> save();
			}
			if (Input::file("actapic") != '') {
			$file = Input::file("actapic")->move("imgs/actas/",$personaArtesano->id.'.'.Input::file('actapic')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'Acta de nacimiento';
			$documento -> ruta = 'imgs/actas/'.$personaArtesano->id.'.'.Input::file('actapic')->guessClientExtension();
			$documento -> persona_id = $personaArtesano->id;
			$documento -> save();
		}

		//////////////Productos

		if (Input::get('producto1') != '') {
				
		$producto = Producto::create(array(
				'artesano_id' 		=> $artesano->id,
			    'nombre'			=> Input::get('producto1'),
				'produccionmensual' => Input::get('prod1'),
				'costoaprox' 		=> Input::get('costo1'),
			));
		}

		if (Input::get('producto2') != '') {
				
			$producto = Producto::create(array(
			'artesano_id' => $artesano->id,
		    'nombre'=> Input::get('producto2'),
			'produccionmensual' => Input::get('prod2'),
			'costoaprox' => Input::get('costo2'),));
		}

		if (Input::get('producto1') != '') {
				
			$producto = Producto::create(array(
			'artesano_id' => $artesano->id,
		    'nombre'=> Input::get('producto3'),
			'produccionmensual' => Input::get('prod3'),
			'costoaprox' => Input::get('costo3'),));
		}

		//////////////////////////////////////////////////////
		$artesano = Artesano::find($artesano->id);
		$artesano->Organizacion()->attach(Input::get('orgid'));
			if ((Input::get('cargo')) != '') {
				$artesano->Comite()->attach(Input::get('comiteid'),array('cargo' => Input::get('cargo'),));	
				}
		return Response::json(array('success' => true));	
	}

	public function post_buscorg(){
		$nombre = Input::get('nombreorg');
		$telefono = Input::get('telmun');

		$comite = Comite::whereHas('organizacion',function($q) use ($nombre,$telefono){ 
			$q->where('nombre','like',$nombre.'%','and')
			->where('telmunicipio','=',$telefono);
		})->get();
		
		return Response::json($comite);

		
	}
}
