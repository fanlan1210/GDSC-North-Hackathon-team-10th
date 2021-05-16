<?php

namespace App\Http\Controllers;

use App\Models\PlaceArea;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PlaceAreaController extends Controller {
	public function index() {
		return PlaceArea::all();
	}

	public function show($id) {
		try {
			return PlaceArea::findOrFail($id);
		} catch (ModelNotFoundException $e) {
			$result = ['status' => '404', 'msg' => 'no this area'];
			return json_encode($result);
		}
	}

	public function store(Request $request) {
		if ($this->authorize('store', PlaceArea::class)) {
			$area = new PlaceArea();

			$find = $area::where('name', $request->input('name'))->get();

			if ($find->isEmpty()) {
				$area->name = $request->input('name');

				$area->save();
				$result = ['status' => 'ok'];
				return json_encode($result);
			} else {
				$result = ['status' => '409', 'msg' => 'area already exist'];
				return json_encode($result);
			}

		}
	}

	public function getBuilds($id) {
		try {
			$area = PlaceArea::findOrFail($id);
			return $area->builds;
		} catch (ModelNotFoundException $e) {
			$result = ['status' => '404', 'msg' => 'no this area'];
			return json_encode($result);
		}
	}
}
