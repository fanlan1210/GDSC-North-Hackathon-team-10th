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

    public function store($id, Request $request)
    {
        if($this->authorize('store', PlaceBuild::class)){
            $build = new PlaceBuild();
            $build->name = $request->input('name');
            $build->area_id = $id;

            $build->save();
        }
    }

    public function getRooms($id)
    {
        $build = PlaceBuild::findOrFail($id);

        return $build->rooms;
    }
}
