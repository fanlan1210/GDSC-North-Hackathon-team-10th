<?php

namespace App\Http\Controllers;

use App\Models\PlaceBuild;
use Illuminate\Http\Request;

class PlaceBuildController extends Controller
{
    public function show($id)
    {
        return PlaceBuild::findOrFail($id);
    }

    public function store(Request $request)
    {
        $build = new PlaceBuild();
        $build->name = $request->input('name');
        $build->area_id = $request->input('area_id');

        $build->save();
    }
}
