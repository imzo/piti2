<?php
class Especialidad extends Eloquent{

	protected $fillable = array('nombre');

	/*
	+--------+-------------+------+-----+---------+----------------+
	| Field  | Type        | Null | Key | Default | Extra          |
	+--------+-------------+------+-----+---------+----------------+
	| id     | int(11)     | NO   | PRI | NULL    | auto_increment |
	| nombre | varchar(60) | YES  |     | NULL    |                |
	+--------+-------------+------+-----+---------+----------------+
	*/
	protected $table = 'especialidad';



}