<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceBuild extends Model
{
    use HasFactory;

    public function area()
    {
        return $this->belongsTo(PlaceArea::class, 'area_id');
    }

    public function rooms()
    {
        return $this->hasMany(PlaceRoom::class, 'build_id');
    }
}
