<?php

namespace App\Http\Controllers;

use App\Models\Tontine;
use Illuminate\Http\Request;

class TontineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tontines = Tontine::orderBy('created_at', 'desc')->get();

        return view('tontine.tontine', compact('tontines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tontine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tontine::create($request->all());

        return to_route('');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tontine $tontine)
    {
        return view('tontine.detail', compact('tontine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tontine $tontine)
    {
        return view('');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tontine $tontine)
    {
        $tontine->update($request->all());

        return to_route('');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tontine $tontine)
    {
        $tontine->delete();

        return to_route('');
    }
}
