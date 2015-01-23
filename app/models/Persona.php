<?php

class Persona extends Eloquent {
public $timestamps = false;
protected $table = 'personas';
protected $fillable = array('nombre', 'curp', 'sexo', 'cuis', 'cp', 'telefono', 'domicilio', 'estado', 'lada', 'observaciones', 'fechanacimiento', 'grupoetnico_id', 'localidad_id', 'rama_id');

public function Artesano(){
return $this->hasOne('Artesano');
}
public function Documentos(){
return $this->hasMany('Documento');
}
public function Grupoetnico(){
return $this->belongsTo('Grupoetnico');
}
public function Localidad(){
return $this->belongsTo('Localidad');
}
public function Rama(){
return $this->belongsTo('Rama');
}
public function Concursos(){
return $this->belongsToMany('Concurso')->withPivot('premio','numregistro','categoria','pieza','costounitario','avaluo','entrego','fechadev','calidad','recibio','fecharegistro','observaciones');
}
}
