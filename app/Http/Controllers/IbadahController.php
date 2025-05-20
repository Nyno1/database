<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ibadah;

class IbadahController extends Controller
{
    public function index()
    {
        return Ibadah::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'category' => 'required|in:wajib,sunah',
            'date' => 'required|date',
        ]);

        $ibadah = Ibadah::create($validated);

        return response()->json($ibadah, 201);
    }
}
