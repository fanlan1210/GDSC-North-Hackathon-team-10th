<?php

namespace App\Http\Controllers;

use App\Models\PlaceRoom;
use Illuminate\Http\Request;

class PlaceRoomController extends Controller
{
    public function show($id)
    {
        return PlaceRoom::findOrFail($id);
    }

    public function store(Request $request)
    {
        $room = new PlaceRoom();
        $room->name = $request->input('name');
        $room->build_id = $request->input('build_id');

        $room->save();
    }
}
