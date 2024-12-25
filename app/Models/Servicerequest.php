<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicerequest
 * 
 * @property int $id
 * @property int|null $service_id
 * @property int $users_id
 * @property string|null $servicename
 * @property float|null $budget
 * @property string|null $description
 * @property Carbon|null $service_date
 * @property string|null $works
 * @property string|null $adresse
 * @property Carbon|null $date
 * 
 * @property Service|null $service
 * @property User $user
 * @property Collection|Devi[] $devis
 *
 * @package App\Models
 */
class Servicerequest extends Model
{
	protected $table = 'servicerequest';
	public $timestamps = false;

	protected $casts = [
		'service_id' => 'int',
		'users_id' => 'int',
		'budget' => 'float',
		'service_date' => 'datetime',
		'date' => 'datetime'
	];

	protected $fillable = [
		'service_id',
		'users_id',
		'servicename',
		'budget',
		'description',
		'service_date',
		'works',
		'adresse',
		'date'
	];

	public function service()
	{
		return $this->belongsTo(Service::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function devis()
	{
		return $this->hasMany(Devi::class);
	}
}
