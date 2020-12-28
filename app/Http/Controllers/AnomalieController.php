<?php

namespace App\Http\Controllers;

use App\Models\Anomalie;
use App\Models\Anomalie_commentaire;
use App\Models\Client;
use Illuminate\Http\Request;

class AnomalieController extends Controller
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

        $insert = Anomalie::create([
            'code_client' => $data['code_client'],
            'code_dossier' => $data['code_dossier'],
            'created_at' => $data['date_envoi'],
            'statut' => $data['statut'],
            'type' => $data['type'],
            'dernier_utilisateur' => $data['dernier_utilisateur'],
            'code_agence' => $data['code_agence']
        ]);
        $insert->save();

        $recup_action_id = Anomalie::orderBy('created_at', 'DESC')
                                ->first();

        $recup_user_id = Client::where('code_client', $data['code_client'])
                            ->where('code_dossier', $data['code_dossier'])
                            ->first();

        $commentaire_anomalie = Anomalie_commentaire::create([
            'action_id' => $recup_action_id->id,
            'user_id' => $recup_user_id->id,
            'contenu' => $data['commentaire']
        ]);
        $commentaire_anomalie->save();
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
