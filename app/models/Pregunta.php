<?php

class Pregunta extends Eloquent{

	protected $fillable = array('usuario_id', 'especialidad_id', 'pregunta', 'fecha_creada', 'activo', 'puntos', 'descripcion');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	/*
	+-----------------+------------+------+-----+---------+----------------+
	| Field           | Type       | Null | Key | Default | Extra          |
	+-----------------+------------+------+-----+---------+----------------+
	| id              | int(11)    | NO   | PRI | NULL    | auto_increment |
	| usuario_id      | int(11)    | NO   | MUL | NULL    |                |
	| especialidad_id | int(11)    | NO   | MUL | NULL    |                |
	| pregunta        | longtext   | NO   |     | NULL    |                |
	| fecha_creada    | datetime   | NO   |     | NULL    |                |
	| activo          | tinyint(4) | NO   |     | NULL    |                |
	| puntos          | int(11)    | YES  |     | NULL    |                |
	| descripcion     | longtext   | YES  |     | NULL    |                |
	+-----------------+------------+------+-----+---------+----------------+

	*/
	protected $table = 'pregunta';

	public function especialidad()
    {
        return $this->belongsTo('Especialidad');
    }

    public function usuario()
    {
        return $this->belongsTo('Usuario');
    }
	

}