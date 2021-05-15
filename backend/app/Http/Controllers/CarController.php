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
        $note = $request->input('note');

        $meal = Meal::findOrFail($mealId);

        # 處理 不同商店的問題
        $datas = Redis::SMEMBERS($key);
        foreach($datas as $data){
            if (Redis::hget($key."_".$data, 'shop_id') != $meal->shop_id){
                return response(['msg' => 'different shop'], 500);
            }
        }
        # 存入 redis
        Redis::sadd($key, $mealId);
        Redis::hmset($key."_".$mealId,
            'meal_id', $mealId,
            'shop_id', $meal->shop_id,
            'quantity', $number,
            'note', $note
        );

        # reset time expired
        Redis::expire($key, 60*30); // 30 mins
        $datas = Redis::SMEMBERS($key);
        foreach($datas as $data){
            Redis::expire($key."_".$data, 60*30);
        }

        return $this->index($request);
    }

    public function index(Request $request)
    {
        $key = "car_".$request->user()->id;

        $keys = Redis::SMEMBERS($key);
        $ans = [];
        foreach ($keys as $orderId) {
            $temp_key = $key."_".$orderId;
            array_push($ans, [
                'meal_id' => Redis::hget($temp_key, 'meal_id'),
                'quantity' => Redis::hget($temp_key, 'quantity'),
                'shop_id' => Redis::hget($temp_key, 'shop_id'),
                'note' => Redis::hget($temp_key, 'note'),
            ]);
        }
        return $ans;
    }
}
