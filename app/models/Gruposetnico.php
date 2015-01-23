<?php
 class Gruposetnico extends Eloquent{
 	public $timestamps = false;
 	protected $table = 'gruposetnicos';
 	
public function Personas(){
	return $this->hasMany('Persona');
}
 }