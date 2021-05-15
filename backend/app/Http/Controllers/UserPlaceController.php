<?php

namespace App\Http\Controllers;

use App\Models\UserPlace;
use Illuminate\Http\Request;

class UserPlaceController extends Controller
{
    public function store(Request $request)
    {
        $place = new UserPlace;
        $place->place_id = $request->input('place_id');
        $place->user_id = $request->user()->id;
        $place->name = $request->input('name');
        $place->detail = $request->input('detail');

        $place->save();
    }

    public function index(Request $request)
    {
        return UserPlace::where('user_id', $request->user()->id)->get();
    }

    public function show($id, Request $request)
    {
        $place = UserPlace::findOrFail($id);

        if($this->authorize('store', $place)){
            return $place;
        }
    }

    public function delete($id, $request)
    {
        $place = UserPlace::findOrFail($id);
        if($request->user()->can('store', $place)){
            $place->delete();
        }
    }
}
