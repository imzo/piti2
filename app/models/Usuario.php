<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {

	/*
	+---------------+--------------+------+-----+---------+----------------+
	| Field         | Type         | Null | Key | Default | Extra          |
	+---------------+--------------+------+-----+---------+----------------+
	| id            | int(11)      | NO   | PRI | NULL    | auto_increment |
	| nombre        | varchar(50)  | YES  |     | NULL    |                |
	| apellido      | varchar(50)  | YES  |     | NULL    |                |
	| fecha_nac     | datetime     | YES  |     | NULL    |                |
	| email         | varchar(50)  | YES  |     | NULL    |                |
	| username      | varchar(20)  | YES  |     | NULL    |                |
	| password      | varchar(60)  | YES  |     | NULL    |                |
	| password_temp | varchar(60)  | YES  |     | NULL    |                |
	| imagen_perfil | varchar(128) | YES  |     | NULL    |                |
	| codigo        | varchar(60)  | YES  |     | NULL    |                |
	| activo        | int(11)      | YES  |     | NULL    |                |
	| created_at    | datetime     | YES  |     | NULL    |                |
	| updated_at    | datetime     | YES  |     | NULL    |                |
	| descripcion   | longtext     | YES  |     | NULL    |                |
	| carrera_id    | int(11)      | YES  | MUL | NULL    |                |
	+---------------+--------------+------+-----+---------+----------------+
	*/

	protected $fillable = array('nombre','apellido', 'fecha_nac','email', 'username', 'password', 'password_temp','imagen_perfil', 'codigo', 'activo', 'descripcion');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuario';

	/* One to One Relation */
	public function carrera(){
		return $this->hasOne('Carrera', 'id', 'carrera_id');
	}
	/* Many to Many Relation */
	public function especialidades(){
		return $this->belongsToMany('Especialidad', 'usuario_especialidad');
	}

	public function preguntas(){
		return $this->hasMany('Pregunta');
	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}