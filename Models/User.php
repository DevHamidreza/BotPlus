<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

/**
* Class user
*
*
*/
class User extends Model
{

	/**
	* Indicates if the model should be timestamped.
	*
	* @var bool
	*/
	public $timestamps = true;

	/**
	* The database table used by the model.
	*
	* @var string
	*/
	protected $table = 'users';

  /**
  *  The table primary id
  * 
  * @var string
  */
  protected $primaryKey = 'user_id';

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [//TODO: edit fillable
   'user_id'
	];

	/**
	* The attributes excluded from the model's JSON form.
	*
	* @var array
	*/
	protected $hidden = [

	];
}