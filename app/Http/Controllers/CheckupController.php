<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Pet;
use App\Models\Treatment;
use Illuminate\Http\Request;

class CheckupController extends Controller
{
    public function index()
    {
        $checkups = Checkup::with(['pet', 'treatment'])->paginate(10);
        return view('checkups.index', compact('checkups'));
    }

    public function create()
    {
        $pets = Pet::with('owner')->get();
        $treatments = Treatment::all();
        return view('checkups.create', compact('pets', 'treatments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'treatment_id' => 'required|exists:treatments,id',
            'checkup_date' => 'required|date',
            'notes' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'prescription' => 'nullable|string',
            'cost' => 'required|numeric|min:0',
        ]);

        Checkup::create($validated);

        return redirect()->route('checkups.index')
            ->with('success', 'Checkup created successfully.');
    }

    public function show(Checkup $checkup)
    {
        $checkup->load(['pet.owner', 'treatment']);
        return view('checkups.show', compact('checkup'));
    }

    public function edit(Checkup $checkup)
    {
        $pets = Pet::with('owner')->get();
        $treatments = Treatment::all();
        return view('checkups.edit', compact('checkup', 'pets', 'treatments'));
    }

    public function update(Request $request, Checkup $checkup)
    {
        $validated = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'treatment_id' => 'required|exists:treatments,id',
            'checkup_date' => 'required|date',
            'notes' => 'nullable|string',
            'diagnosis' => 'nullable|string',
            'prescription' => 'nullable|string',
            'cost' => 'required|numeric|min:0',
        ]);

        $checkup->update($validated);

        return redirect()->route('checkups.index')
            ->with('success', 'Checkup updated successfully.');
    }

    public function destroy(Checkup $checkup)
    {
        $checkup->delete();

        return redirect()->route('checkups.index')
            ->with('success', 'Checkup deleted successfully.');
    }
}
