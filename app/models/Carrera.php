<?php

class Carrera extends Eloquent{

	protected $fillable = array('nombre');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	/*
	+--------+-------------+------+-----+---------+----------------+
	| Field  | Type        | Null | Key | Default | Extra          |
	+--------+-------------+------+-----+---------+----------------+
	| id     | int(11)     | NO   | PRI | NULL    | auto_increment |
	| nombre | varchar(60) | YES  |     | NULL    |                |
	+--------+-------------+------+-----+---------+----------------+
	*/
	protected $table = 'carrera';

	public function especialidades(){
		return $this->belongsToMany('Especialidad');
	}
	

}