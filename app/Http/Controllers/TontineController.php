<?php

namespace App\Http\Controllers;

use App\Models\Tontine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TontineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tontines = Tontine::where('user_id',Auth::user()->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

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
        Tontine::create(array_merge($request->all(), [
            'user_id' => auth()->user()->id,
            'status' => 'inactif',
        ]));
        sweetalert()->addSuccess('Une tontine a été créée !');
        return to_route('tontine.index');
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

        return to_route('tontine.index');
    }
    
}
