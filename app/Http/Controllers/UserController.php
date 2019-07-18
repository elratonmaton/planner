<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
        $data = Tareas::all();
        return response()->json($data);
    }
    
    public function create(Request $request) {
        $data = new Tareas();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);

        if ($request->admin == 1) {
            $data->assignRole('Administrator');
        }

        $data->save();

        return response()->json($data);
    }

    public function edit(Request $request, $id) {
        $data = Tareas::find($id);

        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->admin == 1) {
            $data->assignRole('Administrator');
        } else {
            $data->removeRole('Administrator');
        }

        $data->save();

        return response()->json($data);
    }

    public function changePassword(Request $request, $id) {
        $data = Tareas::find($id);

        $data->password = $request->password;

        $data->save();

        return response()->json($data);
    }

    public function delete($id) {
        $data = Tareas::find($id);

        $data->delete();

        return response()->json(["response", "ok"]);
    }
}
