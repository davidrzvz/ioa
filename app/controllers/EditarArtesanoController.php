<?php
class EditarArtesanoController extends BaseController {

	public function ver(){
		return View::make('artesano/editarartesano');
	}

	public function editar(){
		$municipios = Municipio::all();
		$municipiosArr = array();
		foreach($municipios as $municipio){
			$municipiosArr[$municipio->id] = $municipio->nombre;
		}
		$grupos = Gruposetnico::all();
		$gruposArr = array();
		foreach($grupos as $grupo){
			$gruposArr[$grupo->id] = $grupo->nombre;
		}
		$ramas = Rama::all();
		$ramasArr = array();
		foreach($ramas as $rama){
			$ramasArr[$rama->id] = $rama->nombre;
		}
		return View::make('artesano/updateArtesano')->with('municipios',$municipiosArr)->with('grupos',$gruposArr)->with('ramas',$ramasArr);
	}

	public function buscar()
	{
		$nombre 	= Input::get('artesanombre');
		$paterno 	= Input::get('artesapaterno');
		$materno 	= Input::get('artesamaterno');
		$fecha 		= Input::get('fechanace');
		$artesano 	= Artesano::whereHas('persona',function($q) use ($nombre,$paterno,$materno,$fecha)
		{
			$q->where('nombre','like','%'.$nombre.'%','and')
			->where('nombre','like','%'.$paterno.'%','and')
			->where('nombre','like','%'.$materno.'%')
			->where('fechanacimiento','=',$fecha);
		})
		->first();

		$artesano["persona"]["localidad_id"] 	= Localidad::find($artesano->persona->localidad_id)->nombre;
		$artesano["persona"]["grupoetnico_id"] 	= Gruposetnico::find($artesano->persona->grupoetnico_id)->nombre;
		$artesano["persona"]["rama_id"]	=	Rama::find($artesano->persona->rama_id)->nombre;
		$artesano["documentos"]		=	Documento::where('persona_id','=',$artesano->persona_id)->get();
		$artesano["compras"]		=	$artesano->comprasyventas()->get();
		$artesano["organizacion"]	=	$artesano->organizacion;
		$artesano["concursos"]		=	$artesano->concursos()->get();

		return Response::json($artesano);

	}

	public function buscar2()
	{
		$nombre 	= Input::get('artesanombre');
		$paterno 	= Input::get('artesapaterno');
		$materno 	= Input::get('artesamaterno');
		$fecha 		= Input::get('fechanace');
		$artesano 	= Artesano::whereHas('persona',function($q) use ($nombre,$paterno,$materno,$fecha)
		{
			$q->where('nombre','like','%'.$nombre.'%','and')
			->where('nombre','like','%'.$paterno.'%','and')
			->where('nombre','like','%'.$materno.'%')
			->where('fechanacimiento','=',$fecha);
		})
		->first();

		$artesano["persona"]["localidad_id"]	= Localidad::find($artesano->persona->localidad_id)->id;
		$artesano["persona"]["grupoetnico_id"]	= Gruposetnico::find($artesano->persona->grupoetnico_id)->id;
		$artesano["persona"]["rama_id"]	= Rama::find($artesano->persona->rama_id)->id;
		$artesano["documentos"] 	=	Documento::where('persona_id','=',$artesano->persona_id)->get();
		$artesano["compras"] 	=	$artesano->comprasyventas()->get();
		$artesano["organizacion"] = $artesano->organizacion;

		return Response::json($artesano);

	}

	public function update() 
	{

		$personaArtesano = Persona::find(Input::get('persona_id')) -> update(array(
			'nombre' 		=> Input::get('nombre'),
			'curp' 			=> Input::get('curp'),
			'sexo' 			=> Input::get('sexo'),
			'fechanace' 	=> Input::get('nace'),
			'cuis' 			=> Input::get('cuis'),
			'cp' 			=> Input::get('cp'),
			'telefono' 		=> Input::get('tel'),
			'domicilio' 	=> Input::get('domicilio'),
			'lada' 			=> Input::get('lada'),
			'observaciones' => Input::get('observ'),
			'localidad' 	=> Input::get('localidad'),
			'grupo' 		=> Input::get('grupoetnico'),
			'rama' 			=> Input::get('rama'),
			'estado'		=> 'OAXACA',
		));
		$Personartesano = Persona::find(Input::get('persona_id'));
		$artesano = Artesano::where('persona_id','=',Input::get('persona_id')) -> update(array(
			'RFC' 			=> Input::get('RFC'),
			'estadocivil' 	=> Input::get('civil'),
			'ine' 			=> Input::get('ine'),
			'taller' 		=> Input::get('taller'),
			'tipotelefono' 	=> Input::get('tipoTel'),
		));
		if (Input::file("fotoperfil") != '') {
			$file = Input::file("fotoperfil")->move("imgs/perfil/",$Personartesano->id.'.'.Input::file('fotoperfil')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'Foto del artesano';
			$documento -> ruta = 'imgs/perfil/'.$Personartesano->id.'.'.Input::file('fotoperfil')->guessClientExtension();
			$documento -> persona_id = $Personartesano->id;
			$documento -> save();

			EditarArtesanoController::resizeImagen('', $documento->ruta, 300, 300,$documento->ruta,Input::file('fotoperfil')->guessClientExtension(),75);
		}
		else{
			$documento = new Documento;
			$documento -> nombre = 'Foto del artesano';
			$documento -> ruta = 'imgs/perfil/default.png';
			$documento -> persona_id = $Personartesano->id;
			$documento -> save();
		}

		if (Input::file("curppic") != '') {
			$file = Input::file("curppic")->move("imgs/curps/",$Personartesano->id.'.'.Input::file('curppic')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'CURP';
			$documento -> ruta = 'imgs/curps/'.$Personartesano->id.'.'.Input::file('curppic')->guessClientExtension();
			$documento -> persona_id = $Personartesano->id;
			$documento -> save();
		}
		
		if (Input::file("inepic") != '') {
			$file = Input::file("inepic")->move("imgs/ine/",$Personartesano->id.'.'.Input::file('inepic')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'Credencial INE';
			$documento -> ruta = 'imgs/ine/'.$Personartesano->id.'.'.Input::file('inepic')->guessClientExtension();
			$documento -> persona_id = $Personartesano->id;
			$documento -> save();
		}
		if (Input::file("actapic") != '') {
			$file = Input::file("actapic")->move("imgs/actas/",$Personartesano->id.'.'.Input::file('actapic')->guessClientExtension());
			$documento = new Documento;
			$documento -> nombre = 'Acta de nacimiento';
			$documento -> ruta = 'imgs/actas/'.$Personartesano->id.'.'.Input::file('actapic')->guessClientExtension();
			$documento -> persona_id = $Personartesano->id;
			$documento -> save();
		}
	}

		public function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension,$ppp){
        $rutaImagenOriginal = $ruta.$nombre;
        if($extension == 'GIF' || $extension == 'gif'){
        $img_original = imagecreatefromgif($rutaImagenOriginal);
        }
        if($extension == 'jpg' || $extension == 'JPG'){
        $img_original = imagecreatefromjpeg($rutaImagenOriginal);
        }
        if($extension == 'png' || $extension == 'PNG'){
        $img_original = imagecreatefrompng($rutaImagenOriginal);
        }
        if($extension == 'jpeg' || $extension == 'JPEG'){
        $img_original = imagecreatefromjpeg($rutaImagenOriginal);
        }
        $max_ancho = $ancho;
        $max_alto = $alto;
        list($ancho,$alto)=getimagesize($rutaImagenOriginal);
        $x_ratio = $max_ancho / $ancho;
        $y_ratio = $max_alto / $alto;
        if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
        $ancho_final = $ancho;
            $alto_final = $alto;
        } elseif (($x_ratio * $alto) < $max_alto){
            $alto_final = ceil($x_ratio * $alto);
            $ancho_final = $max_ancho;
        } else{
            $ancho_final = ceil($y_ratio * $ancho);
            $alto_final = $max_alto;
        }
        $tmp=imagecreatetruecolor($ancho_final,$alto_final);
        imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
        imagedestroy($img_original);
        $calidad=$ppp;
        imagejpeg($tmp,$ruta.$nombreN,$calidad);
        
    }
}
