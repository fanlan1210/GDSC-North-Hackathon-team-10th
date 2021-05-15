<?php

namespace App\Http\Controllers;

use App\Models\PlaceArea;
use Illuminate\Http\Request;

class PlaceAreaController extends Controller
{
    public function index()
    {
        return PlaceArea::all();
    }

    public function show($id)
    {
        return PlaceArea::findOrFail($id);
    }

    public function store(Request $request)
    {
        if($request->user()->can('store', PlaceArea::class)){
            $area = new PlaceArea();
            $area->name = $request->input('name');

            $area->save();
        }
    }

    public function getBuilds($id)
    {
        $area = PlaceArea::findOrFail($id);

        return $area->builds;
    }
}
