<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Business
 * 
 * @property int $id
 * @property int $users_id
 * @property int $category_id
 * @property string|null $businessname
 * @property string|null $logo
 * @property string|null $description
 * 
 * @property Category $category
 * @property User $user
 * @property Collection|Service[] $services
 *
 * @package App\Models
 */
class Business extends Model
{
	protected $table = 'business';
	public $timestamps = false;

	protected $casts = [
		'users_id' => 'int',
		'category_id' => 'int'
	];

	protected $fillable = [
		'users_id',
		'category_id',
		'businessname',
		'logo',
		'description'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function services()
	{
		return $this->hasMany(Service::class);
	}
}
