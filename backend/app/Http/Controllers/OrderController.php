<?php

namespace App\Http\Controllers;

use App\Models\OrderMeal;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class OrderController extends Controller
{
    public function index()
    {

	}

    public function store(Request $request)
    {
        $key = "car_".$request->user()->id;

        // 空值
        if(!Redis::EXISTS($key))
            return response(['msg' => 'no item in car.'], 500);

        // get shop_id;
        // 僅信任 Redis 中資料
        $random = Redis::SRANDMEMBER($key, 1);
        $shopId = Redis::hget($key."_".$random[0], 'shop_id');

        // create Order(user_orders table)
        $order = new UserOrder;
        $order->user_id = $request->user()->id;
        $order->shop_id = $shopId;
        $order->user_place_id = $request->input('user_place_id');
        $order->delivery_id = null;
        $order->note = $request->input('note');
        $order->status = 0;
        $order->save();

        // 取得 Redis 中 購物車內容
        $carController = new CarController;
        $items = $carController->index($request);

        foreach($items as $item){
            $orderMeal = new OrderMeal;
            $orderMeal->order_id = $order->id;
            $orderMeal->meal_id = $item['meal_id'];
            $orderMeal->quantity = $item['quantity'];
            $orderMeal->note = $item['note'];
            $orderMeal->save();
        }
    }
}
