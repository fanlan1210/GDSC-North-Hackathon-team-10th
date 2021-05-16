<?php

namespace App\Http\Controllers;

use App\Models\PlaceBuild;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PlaceBuildController extends Controller {
	public function show($id) {
		try {
			return PlaceBuild::findOrFail($id);
		} catch (ModelNotFoundException $e) {
			$result = ['status' => '404', 'msg' => 'no this area'];
			return json_encode($result);
		}
	}

	public function store($id, Request $request) {
		if ($this->authorize('store', PlaceBuild::class)) {
			$build = new PlaceBuild();

			$find = $build::where('name', $request->input('name'))->where('area_id', $id)->get();

			if ($find->isEmpty()) {
				$build->name = $request->input('name');
				$build->area_id = $id;
				$build->save();
				$result = ['status' => 'ok'];
				return json_encode($result);
			} else {
				$result = ['status' => '409', 'msg' => 'build already exist'];
				return json_encode($result);
			}
		}
	}

	public function getRooms($id) {
		try {
			$build = PlaceBuild::findOrFail($id);

			return $build->rooms;
		} catch (ModelNotFoundException $e) {
			$result = ['status' => '404', 'msg' => 'no this build'];
			return json_encode($result);
		}
	}
}
