<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * 
 * @property int $id
 * @property int $business_id
 * @property string|null $service
 * @property string|null $description
 * @property string|null $image
 * @property Carbon|null $date
 * 
 * @property Business $business
 * @property Collection|Devi[] $devis
 *
 * @package App\Models
 */
class Service extends Model
{
	protected $table = 'service';
	public $timestamps = false;

	protected $casts = [
		'business_id' => 'int',
		'date' => 'datetime'
	];

	protected $fillable = [
		'business_id',
		'service',
		'description',
		'image',
		'date'
	];

	public function business()
	{
		return $this->belongsTo(Business::class);
	}

	public function devis()
	{
		return $this->hasMany(Devi::class);
	}
}
