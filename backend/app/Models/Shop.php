<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

	protected $table = 'shops';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'area_id',
		'name',
		'intro',
		'status'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [

	];

	public function area() {
		return $this->belongsTo(PlaceArea::class, 'area_id');
	}

	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}

    public function meals()
    {
        return $this->hasMany(Meal::class, 'shop_id');
    }
}
