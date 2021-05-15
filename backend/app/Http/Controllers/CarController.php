<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CarController extends Controller
{
    public function append(Request $request)
    {
        $key = "car_".$request->user()->id;

        $mealId = $request->input('meal_id');
        $number = $request->input('number');

        // if(!Redis::hExists($key, $mealId)){
        Redis::hset($key, $mealId, $number);
        // }else{
            // $origin_num = Redis::hget($key, $mealId);
            // Redis::hset($key, $mealId, $number+$origin_num);
        // }

        Redis::expire($key, 60*30); // 30 mins

        return $this->index($request);
    }

    public function index(Request $request)
    {
        $key = "car_".$request->user()->id;

        $keys = Redis::hgetall($key);
        $ans = [];
        foreach ($keys as $key => $value) {
            array_push($ans, [
                'meal_id' => $key,
                'quantity' =>$value
            ]);
        }
        return $ans;
    }
}
