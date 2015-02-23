<?php
 
class eliminareventosController extends BaseController {
 	
    public function tablas(){
       
       return View::make('artesano/eliminareventos')->with('ferias',Feria::all())->with('concursos',Concurso::all())->with('talleres',Taller::all());
    }

   
}

?>