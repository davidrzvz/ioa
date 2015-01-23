<?php
 class Municipio extends Eloquent{
 	public $timestamps = false;
 	protected $table = 'municipios';

public function Distritos(){
	return $this->belongsTo('Distrito');
}
 public function Localidades(){
 	return $this->hasMany('Localidad');
 }
 }