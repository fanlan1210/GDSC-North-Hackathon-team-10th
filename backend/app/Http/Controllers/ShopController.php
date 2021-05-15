<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ShopController extends Controller {
	public function index() {
		return Shop::all();
	}

	public function store(Request $request) {
		$shop = new Shop();

		$user_shop_search = $shop::where('user_id', $request->input('user_id'))->get();
		if ($user_shop_search->isEmpty() && $request->user()->can('store', Shop::class)) {

			$shop_name_search = $shop::where('name', $request->input('name'))->where('area_id', $request->input('area_id'))->get();
			if ($shop_name_search->isEmpty()) {
				$shop->name = $request->input('name');
				$shop->intro = $request->input('intro');
				$shop->user_id = $request->input('user_id');
				$shop->area_id = $request->input('area_id');
				$shop->status = 1;
				$shop->save();
				$result = ['status' => 'ok', 'id' => $shop->id];
				return json_encode($result);
			} else {
				return response(['msg' => 'already have this shop in this area'], 403);
			}
		} else {
			return response(['msg' => 'user already have a shop'], 403);
		}
	}

	public function show($id)
	{
		return Shop::findOrFail($id);
	}

	public function getMeals($id) {
		$shop = Shop::findOrFail($id);

		return $shop->meals;
	}
}
