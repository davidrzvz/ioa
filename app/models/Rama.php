<?php

class Rama extends Eloquent {
public $timestamps = false;
protected $table = 'ramas';

public function Personas(){
return $this->hasMany('Persona');
}
}

