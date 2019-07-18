<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tareas;

class TareasController extends Controller
{
    public function index() {
        $data = Tareas::all();
        return response()->json($data);
    }
    
    public function create(Request $request) {
        $data = new Tareas();

        $data->title = $request->title;

        $data->save();

        return response()->json($data);
    }

    public function edit(Request $request, $id) {
        $data = Tareas::find($id);

        $data->title = $request->title;

        $data->save();

        return response()->json($data);
    }

    public function delete($id) {
        $data = Tareas::find($id);

        $data->delete();

        return response()->json(["response", "ok"]);
    }
}
