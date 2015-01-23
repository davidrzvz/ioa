<?php
 class Comprasyventa extends Eloquent{
 	public $timestamps = false;
	protected $table = 'comprasyventas';
	
public function Artesanos(){
	return $this->belongsToMany('Artesano');
}

 }