<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $users = User::orderBy('created_at', 'desc');
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        if (auth()->user()->role == 'organizer') {
            $identity_document_front = $data['identity_document_front'];
            $identity_document_back = $data['identity_document_back'];

            $participant = User::create(array_merge($data,[
                'role' => 'participant',
                'identity_document_front' => ' ',
                'identity_document_back' => ' ',
                'user_id' => auth()->user()->id
            ]));



            if ($identity_document_front != null && !$identity_document_front->getError()
                                        or
                $identity_document_back != null && !$identity_document_back->getError()
                ) {



                $identity_document_front_path = $identity_document_front->store( $participant->id, 'public');
                $identity_document_back_path = $identity_document_back->store( $participant->id, 'public');

                $participant->update([
                    'identity_document_front' => $identity_document_front_path,
                    'identity_document_back' => $identity_document_back_path,
                ]);
                sweetalert()->addSuccess('Nouveau participant créé !');
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
