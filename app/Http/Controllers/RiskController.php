<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Risk;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $risks = Risk::all();
        return view('risk.index', compact('risks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assets = Asset::all();
        return view('risk.create', [
            'assets' => $assets
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'assets_id' => 'required|integer',
            'description' => 'required|string',
            'frequency' => 'required|integer',
            'impact' => 'required|integer',
            'level' => 'required|string',
        ]);

        Risk::create($request->all());
        return redirect()->route('risk.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Risk $risk)
    {
        return view('risk.show', compact('risk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $risk = Risk::findOrFail($id);
        $assets = Asset::All();

        return view('risk.edit', [
            'risk' => $risk,
            'assets' => $assets
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Risk $risk)
    {
        $request->validate([
            'assets_id' => 'required|integer',
            'description' => 'required|string',
            'frequency' => 'required|integer|min:1|max:5',
            'impact' => 'required|integer|min:1|max:5',
            'level' => 'required|string|in:Low,Medium,High',
        ]);    

        $risk->update($request->all());
        return redirect()->route('risk.index')->with('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Risk $risk)
    {
        $risk->delete();
        return redirect()->route('risk.index')->with('success');
    }
    
}
