<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Models\Mitigation;
use Illuminate\Http\Request;

class MitigationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitigations = Mitigation::all();
        return view('mitigation.index', compact('mitigations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $risks = Risk::all();
        return view('mitigation.create', [
            'risks' => $risks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'risks_id' => 'required|integer',
            'action' => 'required|string',
        ]);

        Mitigation::create($request->all());
        return redirect()->route('mitigation.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mitigation $mitigation)
    {
        return view('mitigation.show', compact('mitigation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mitigation = Mitigation::findOrFail($id);
        $risks = Risk::All();

        return view('mitigation.edit', [
            'mitigation' => $mitigation,
            'risks' => $risks
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mitigation $mitigation)
    {
        $request->validate([
            'risks_id' => 'required|integer',
            'action' => 'required|string',
        ]);

        $mitigation->update($request->all());
        return redirect()->route('mitigation.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mitigation $mitigation)
    {
        $mitigation->delete();
        return redirect()->route('mitigation.index')->with('success');
    }
}
