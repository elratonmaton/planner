<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encargados;

class EncargadosController extends Controller
{
    public function index() {
        $data = Encargados::all();
        return response()->json($data);
    }
    
    public function create(Request $request) {
        $data = new Encargados();

        $data->name = $request->name;
        $data->surname = $request->surname;
        $data->dni = $request->dni;

        $data->save();

        return response()->json($data);
    }

    public function edit(Request $request, $id) {
        $data = Encargados::find($id);

        $data->name = $request->name;
        $data->surname = $request->surname;
        $data->dni = $request->dni;

        $data->save();

        return response()->json($data);
    }

    public function delete($id) {
        $data = Encargados::find($id);

        $data->delete();

        return response()->json(["response", "ok"]);
    }
}
