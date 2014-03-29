<?php

class Carrera_Especialidad extends Eloquent{

	/*
	+-----------------+---------+------+-----+---------+-------+
	| Field           | Type    | Null | Key | Default | Extra |
	+-----------------+---------+------+-----+---------+-------+
	| carrera_id      | int(11) | NO   | MUL | NULL    |       |
	| especialidad_id | int(11) | NO   | MUL | NULL    |       |
	+-----------------+---------+------+-----+---------+-------+
	*/
	protected $table = 'carrera_especialidad';

}