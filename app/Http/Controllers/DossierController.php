<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Action_commentaire;
use App\Models\Client;
use Illuminate\Http\Request;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $insert = Action::create([
            'type' => $data['type'],
            'commentaire' => $data['commentaire'],
            'contact' => $data['contact'],
            'code_dossier' => $data['code_dossier'],
            'code_client' => $data['code_client'],
            'code_agence' => $data['code_agence'],
            'action_commentaire' => $data['action_commentaire'],
            'specialite' => $data['specialite'],
        ]);
        $insert->save();

        $recup_action_id = Action::orderBy('created_at', 'DESC')
                                ->first();

        $recup_user_id = Client::where('code_client', $data['code_client'])
                            ->where('nom_client', $data['nom_client'])
                            ->first();

        $commentaire_action = Action_commentaire::create([
            'action_id' => $recup_action_id->id,
            'user_id' => $recup_user_id->id,
        ]);
        $commentaire_action->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
