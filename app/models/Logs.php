<?php
class Logs extends Eloquent {
    public $timestamps = false;
    protected $table = 'logs';
    protected $fillable = array('usuario', 'fecha', 'hora', 'url', 'recurso');
}
