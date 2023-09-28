<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tontine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\StoreUserRequest;

class TontineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tontines = Tontine::where('user_id', Auth::user()->id)
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

    public function addParticipant(StoreUserRequest $request, Tontine $tontine)
    {
        $data = $request->validated();
        $nbBras = $data['nombre_bras'];


        /*
        *   Si le nombre de bras n'est pas envoyé ou a une valeur égale à zero (0)
        */
        if ($nbBras == null or $nbBras == 0) {
            $errorMessage = 'Le nombre de bras doit être comprit entre 1 et ' . $tontine->number_of_members;

            sweetalert()->addError($errorMessage);

            return redirect()->back();
        }


        /*
        * Si avec l'ajout de ce participant le nombre participant est dépasser
        */
        if ($tontine->hasFull($nbBras)) {
            sweetalert()->addError('Le participant occupe trop de place');
            return redirect()->back();
        }

        // Récupère les données de l'utilisateur connecté
        $userAuth = auth()->user();

        // Si des images sont envoyer
        if (
            array_key_exists('identity_document_front', $data)
            and
            array_key_exists('identity_document_back', $data)
        ) {

            $identity_document_front = $data['identity_document_front'];
            $identity_document_back = $data['identity_document_back'];

            $participant = User::create(array_merge($data, [
                'role' => 'participant',
                'identity_document_front' => ' ',
                'identity_document_back' => ' ',
                'user_id' => $userAuth->id
            ]));


            // Si les images envoyé non pas de problème
            if (
                $identity_document_front != null && !$identity_document_front->getError()
                and
                $identity_document_back != null && !$identity_document_back->getError()
            ) {
                $identity_document_front_path = $identity_document_front->store($participant->id, 'public');
                $identity_document_back_path = $identity_document_back->store($participant->id, 'public');

                $participant->update([
                    'identity_document_front' => $identity_document_front_path,
                    'identity_document_back' => $identity_document_back_path,
                ]);

                sweetalert()->addSuccess('Nouveau participant créé !');
            } else {
                // message d'erreur
                sweetalert()->addError('Images non conforme');
            }
        } else {

            User::create(array_merge($data, [
                'role' => 'participant',
                'user_id' => $userAuth->id
            ]));

            sweetalert()->addSuccess('Nouveau participant créé !');
        }

        $tontine->participation()->create([
            'user_id' => $userAuth->id,
            'tontine_id' => $tontine->id,
            'nombre_bras' =>  $data['nombre_bras'],
            'rank' => $tontine->participationRank()
        ]);

        return redirect()->back();
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
