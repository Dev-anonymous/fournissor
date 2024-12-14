<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $id
 * @property string|null $category
 * @property string|null $description
 * 
 * @property Collection|Business[] $businesses
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'category';
	public $timestamps = false;

	protected $fillable = [
		'category',
		'description'
	];

	public function businesses()
	{
		return $this->hasMany(Business::class);
	}
}
