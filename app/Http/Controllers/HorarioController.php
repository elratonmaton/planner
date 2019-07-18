<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;

class HorarioController extends Controller
{
    public function index() {
        $data = Tareas::all();
        return response()->json($data);
    }
    
    public function create(Request $request) {
        $data = new Tareas();

        $data->month = $request->month;
        $data->day = $request->day;
        $data->area = $request->area;
        $data->encargado = $request->encargado;
        $data->hour_init = $request->hour_init;
        $data->hour_end = $request->hour_end;
        $data->duration = $request->duration;
        $data->stock = $request->stock;

        $data->save();

        return response()->json($data);
    }

    public function edit(Request $request, $id) {
        $data = Tareas::find($id);

        $data->month = $request->month;
        $data->day = $request->day;
        $data->area = $request->area;
        $data->encargado = $request->encargado;
        $data->hour_init = $request->hour_init;
        $data->hour_end = $request->hour_end;
        $data->duration = $request->duration;
        $data->stock = $request->stock;

        $data->save();

        return response()->json($data);
    }

    public function delete($id) {
        $data = Tareas::find($id);

        $data->delete();

        return response()->json(["response", "ok"]);
    }
}
