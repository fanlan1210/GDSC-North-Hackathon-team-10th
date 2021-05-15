<?php

namespace App\Http\Controllers;

use App\Models\PlaceArea;
use Illuminate\Http\Request;

class PlaceAreaController extends Controller
{
    public function show($id)
    {
        return PlaceArea::findOrFail($id);
    }

    public function store(Request $request)
    {
        $area = new PlaceArea();
        $area->name = $request->input('name');

        $area->save();
    }
}
