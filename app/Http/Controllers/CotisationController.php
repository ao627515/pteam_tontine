<?php

namespace App\Http\Controllers;

use App\Models\Cotisation;
use Illuminate\Http\Request;

class CotisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cotisations = Cotisation::orderBy('created_at', 'desc');

        return view('', compact('cotisations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cotisation::create($request->all());

        return to_route('');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cotisation $cotisation)
    {
        return view('', compact('cotisation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cotisation $cotisation)
    {
        return view('', compact('cotisation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cotisation $cotisation)
    {
        $cotisation->update($request->all());

        return to_route('');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cotisation $cotisation)
    {
        $cotisation->delete();

        return to_route('');
    }
}
