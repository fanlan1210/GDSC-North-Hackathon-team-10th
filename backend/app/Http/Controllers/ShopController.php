<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
	public function index()
	{
		return Shop::all();
	}

    public function getMeals($id)
    {
        $shop = Shop::findOrFail($id);

        return $shop->meals;
    }
}
