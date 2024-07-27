<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Get all obats
    public function index()
    {
        $obats = Obat::all();
        return response()->json($obats);
    }

    // Store a new obat
    public function store(Request $request)
    {
        $obat = Obat::create($request->all());
        return response()->json($obat, 201);
    }

    // Get a specific obat
    public function show($id)
    {
        $obat = Obat::find($id);
        if (is_null($obat)) {
            return response()->json(['message' => 'Obat not found'], 404);
        }
        return response()->json($obat);
    }

    // Update a specific obat
    public function update(Request $request, $id)
    {
        $obat = Obat::find($id);
        if (is_null($obat)) {
            return response()->json(['message' => 'Obat not found'], 404);
        }
        $obat->update($request->all());
        return response()->json($obat);
    }

    // Delete a specific obat
    public function destroy($id)
    {
        $obat = Obat::find($id);
        if (is_null($obat)) {
            return response()->json(['message' => 'Obat not found'], 404);
        }
        $obat->delete();
        return response()->json(null, 204);
    }
}
