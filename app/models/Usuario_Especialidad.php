<?php

class Usuario_Especialidad extends Eloquent{

	/*
	+-----------------+---------+------+-----+---------+-------+
	| Field           | Type    | Null | Key | Default | Extra |
	+-----------------+---------+------+-----+---------+-------+
	| usuario_id      | int(11) | NO   | MUL | NULL    |       |
	| especialidad_id | int(11) | NO   | MUL | NULL    |       |
	| puntos          | int(11) | YES  |     | NULL    |       |
	+-----------------+---------+------+-----+---------+-------+
	*/

	protected $table = 'usuario_especialidad';

}