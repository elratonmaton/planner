<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Areas;

class AreasController extends Controller
{
    public function index() {
        $data = Areas::all();
        return response()->json($data);
    }
    
    public function create(Request $request) {
        $data = new Areas();

        $data->title = $request->title;

        $data->save();

        return response()->json($data);
    }

    public function edit(Request $request, $id) {
        $data = Areas::find($id);

        $data->title = $request->title;

        $data->save();

        return response()->json($data);
    }

    public function delete($id) {
        $data = Areas::find($id);

        $data->delete();

        return response()->json(["response", "ok"]);
    }
}
