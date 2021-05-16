<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceArea extends Model
{
    use HasFactory;

    public function builds()
    {
        return $this->hasMany(PlaceBuild::class, 'area_id');
    }
}
