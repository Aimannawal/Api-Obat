<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Obat::all();
        return response()->json($todos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dosis' => 'required',
            'stok' => 'required',
        ]);

        $todo = Obat::create([
            'name' => $request->name,
            'dosis' => $request->dosis,
            'stok' => $request->stok,
        ]);

        return response()->json($todo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $todo = Obat::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        return response()->json($todo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'dosis' => 'required',
            'stok' => 'required',
        ]);

        $todo = Obat::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $todo->update([
            'name' => $request->name,
            'dosis' => $request->dosis,
            'stok' => $request->stok,
        ]);

        return response()->json($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todo = Obat::find($id);
        if (is_null($todo)) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $todo->delete();

        return response()->json(['message' => 'Todo deleted successfully']);
    }
}
