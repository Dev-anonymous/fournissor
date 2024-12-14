<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Devi
 * 
 * @property int $id
 * @property int $service_id
 * @property int $users_id
 * 
 * @property Service $service
 * @property User $user
 *
 * @package App\Models
 */
class Devi extends Model
{
	protected $table = 'devis';
	public $timestamps = false;

	protected $casts = [
		'service_id' => 'int',
		'users_id' => 'int'
	];

	protected $fillable = [
		'service_id',
		'users_id'
	];

	public function service()
	{
		return $this->belongsTo(Service::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
