<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function show($id)
    {
        return Meal::findOrFail($id);
    }

    public function store($id, Request $request)
    {
        if($request->user()->can('store', Meal::class)){
            $meal = new Meal;
            $meal->shop_id = $id;
            $meal->name = $request->input('name');
            $meal->price = $request->input('price');
            $meal->status = $request->input('status');
            $meal->note = $request->input('note');

            $meal->save();
        }
    }

    public function delete($id, Request $request)
    {
        if($request->user()->can('store', Meal::class)){
            $meal = Meal::findOrFail($id);
            $meal->delete();
        }
    }
}
